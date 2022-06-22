<div class="box-header with-border">
	<h3 class="box-title">Transaksi Penyewaan</h3>
</div>
<form action="" method="POST" id="form-purchase">
	<div class="box-body">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Kode Penyewaan</label>
				<input class="form-control" id="kode_sewa" type="text" value="<?= $kode ?>" name="kode_sewa" autocomplete="off" readonly>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="exampleInputEmail1">Tanggal Awal Penyewaan</label>
						<input class="form-control" id="tanggal_sewa" type="date" value="" name="tanggal_sewa" autocomplete="off">
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1">Lama Penyewaan (Hari)</label>
						<input class="form-control" id="lama_sewa" type="number" value="" min="0" name="lama_sewa" autocomplete="off">
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Member</label>
				<select class="form-control" name="member_id" id="member_id">
					<option value="" disabled selected>-- Pilih --</option>
					<?php foreach ($member as $rows) { ?>
						<option value="<?php echo $rows['member_id']; ?>"><?php echo $rows['nama_member']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="exampleInputEmail1">Daftar Barang</label>
						<input type="hidden" name="kode_kamera" id="kode_kamera">
						<input type="hidden" name="nama_kamera" id="nama_kamera">
						<input type="hidden" name="index_tr" id="index-tr">

						<select class="form-control" name="kamera" id="kamera">
							<option value="" disabled selected>-- Pilih --</option>
							<?php foreach ($kamera as $rows) { ?>
								<option value="<?php echo $rows['id_kamera']; ?>"><?php echo $rows['nama_kamera']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1">Harga Sewa/hari</label>
						<input type="number" id="harga" name="harga" class="form-control" placeholder="">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="input-group input-group">
					<span class="input-group-btn">
						<button type="button" class="btn btn-info pull-right" id="btn-add"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add</button>
						<button type="button" class="btn btn-success pull-right" id="btn-update" style="display: none;"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<table class="table table-hover table-bordered table-sm mt-3" id="tbl-cart">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Kamera</th>
						<th>Harga Sewa/hari</th>
						<th>Lama Sewa</th>
						<th>Total Harga Sewa</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="exampleInputEmail1">Total</label>
						<input class="form-control" id="total" type="text" value="" placeholder="" name="total" autocomplete="off" disabled="">
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1">Diskon</label>
						<input class="form-control" id="diskon" type="number" value="" placeholder="" min="1" name="diskon" autocomplete="off">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Grand Total</label>
				<input class="form-control" id="grand-total" type="text" value="" placeholder="" name="grand-total" autocomplete="off" readonly>
				<input type="hidden" id="grand-total-hidden" name="grand_total_hidden" value="">
				<input type="hidden" id="total-hidden" name="total_hidden" value="">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="exampleInputEmail1">Catatan</label>
				<textarea class="form-control" id="catatan" type="text" rows="5" value="" placeholder="" name="catatan" autocomplete="off"></textarea>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<button type="submit" style="margin-top:25px;" class="btn btn-primary" id="btn-save" disabled=""><i class="fa fa-save" aria-hidden="true"></i> Simpan Transaksi</button>
				<a href="<?= base_url() ?>transaksi" type="submit" style="margin-top:25px;" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Cancel</a>
			</div>
		</div>
	</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
	const btnAdd = $('#btn-add')
	const kode_sewa = $('#kode_sewa')
	const tanggal_sewa = $('#tanggal_sewa')
	const lama_sewa = $('#lama_sewa')
	const member_id = $('#member_id')
	const kamera = $('#kamera')
	const harga = $('#harga')
	const kode_kamera = $('#kode_kamera')
	const nama_kamera = $('#nama_kamera')
	const diskon = $('#diskon')
	const grandTotal = $('#grand-total')
	const catatan = $('#catatan')
	const tblCart = $('#tbl-cart')
	const btnSave = $('#btn-save')
	const btnUpdate = $('#btn-update')

	$('#form-purchase').submit(function(e) {
		e.preventDefault()
		let penyewaan = {
			tanggal_sewa: tanggal_sewa.val(),
			member_id: member_id.val(),
			lama_sewa: lama_sewa.val(),
			kode_sewa: kode_sewa.val(),
			diskon: diskon.val(),
			catatan: catatan.val(),
			total: $('#total-hidden').val(),
			grand_total: $('#grand-total-hidden').val(),
			kamera: $('input[name="kamera[]"]').map(function() {
				return $(this).val()
			}).get(),
			harga: $('input[name="harga[]"]').map(function() {
				return $(this).val()
			}).get(),
			lama: $('input[name="lama[]"]').map(function() {
				return $(this).val()
			}).get(),
			subtotal: $('input[name="subtotal[]"]').map(function() {
				return $(this).val()
			}).get(),
		}

		// If
		if (!tanggal_sewa.val()) {
			tanggal_sewa.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Tanggal Sewa tidak boleh kosong'
			})
		} else if (!lama_sewa.val() || lama_sewa.val() < 1) {
			lama_sewa.focus()
			lama_sewa.val('')
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Lama sewa tidak boleh kosong dan minimal 1 Hari'
			})
		} else if (!member_id.val()) {
			member_id.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Member tidak boleh kosong'
			})
		} else {
			$.ajax({
				type: 'POST',
				url: '<?= base_url() ?>transaksi/simpan',
				data: penyewaan,
				success: function(res) {
					// console.log(res)
					Swal.fire({
						icon: 'success',
						title: 'Simpan data',
						text: 'Berhasil'
					}).then(function() {
						window.location = '<?= base_url() ?>transaksi'
					})
				},
				error: function(xhr, status, error) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong!'
					})
				}
			})
		}
	})

	kamera.change(function() {
		$.ajax({
			url: '<?= base_url() ?>transaksi/getBarangById/' + $(this).val(),
			type: "GET",
			contentType: "application/json",
			dataType: "json",
			success: function(res) {
				kode_kamera.val(res.kode_kamera)
				nama_kamera.val(res.nama_kamera)
			}
		})
	})

	btnAdd.click(function() {
		if (!tanggal_sewa.val()) {
			tanggal_sewa.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Tanggal Sewa tidak boleh kosong'
			})
		} else if (!lama_sewa.val() || lama_sewa.val() < 1) {
			lama_sewa.focus()
			lama_sewa.val('')
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Lama sewa tidak boleh kosong dan minimal 1 Hari'
			})
		} else if (!member_id.val()) {
			member_id.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Member tidak boleh kosong'
			})
		} else if (!kamera.val()) {
			kamera.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Barang tidak boleh kosong'
			})
		} else if (!harga.val() || harga.val() < 1) {
			harga.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Harga Sewa/Hari tidak boleh kosong'
			})
		} else {
			$('input[name="kamera[]"]').each(function() {
				let index = $(this).parent().parent().index()
				if ($(this).val() == kamera.val()) {
					tblCart.find('tbody tr:eq(' + index + ')').remove()
					generateNo()
				}
			})

			let subtotal = harga.val() * lama_sewa.val()

			tblCart.find('tbody').append(`
                    <tr>
                        <td>${tblCart.find('tbody tr').length + 1}</td>
                        <td>
                            ${kamera.find('option:selected').text()}
                            <input type="hidden" class="kamera-hidden" name="kamera[]" value="${kamera.val()}">
                        </td>
                        <td>
                            ${formatRibuan(harga.val())}
                            <input type="hidden" class="harga-hidden" name="harga[]" value="${harga.val()}">
                        </td>
						<td>
                            ${lama_sewa.val()} Hari
                            <input type="hidden" class="lama-hidden" name="lama[]" value="${lama_sewa.val()}">
                        </td>
						<td>
                            ${formatRibuan(subtotal)}
                            <input type="hidden" class="subtotal-hidden" name="subtotal[]" value="${subtotal}">
                        </td>
                        <td>
                            <button class="btn btn-warning btn-xs me-1 btn-edit" type="button">
                                <i class="fa fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btn-xs btn-delete" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                `)
			generateNo()
			hitungTotal()
			hitungDiskon()
			clearForm()
			cekTableLength()
			kamera.focus()

		}
	})

	btnUpdate.click(function() {
		if (!tanggal_sewa.val()) {
			tanggal_sewa.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Tanggal Sewa tidak boleh kosong'
			})
		} else if (!lama_sewa.val() || lama_sewa.val() < 1) {
			lama_sewa.focus()
			lama_sewa.val('')
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Lama sewa tidak boleh kosong dan minimal 1 Hari'
			})
		} else if (!member_id.val()) {
			member_id.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Member tidak boleh kosong'
			})
		} else if (!kamera.val()) {
			kamera.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Barang tidak boleh kosong'
			})
		} else if (!harga.val() || harga.val() < 1) {
			harga.focus()
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Harga Sewa/Hari tidak boleh kosong'
			})
		} else {
			$('input[name="kamera[]"]').each(function() {
				let index = $(this).parent().parent().index()
				if ($(this).val() == kamera.val()) {
					tblCart.find('tbody tr:eq(' + index + ')').remove()
				}
			})

			let subtotal = harga.val() * lama_sewa.val()

			tblCart.find('tbody').append(`
                    <tr>
                        <td>${tblCart.find('tbody tr').length + 1}</td>
                        <td>
                            ${kamera.find('option:selected').text()}
                            <input type="hidden" class="kamera-hidden" name="kamera[]" value="${kamera.val()}">
                        </td>
                        <td>
                            ${formatRibuan(harga.val())}
                            <input type="hidden" class="harga-hidden" name="harga[]" value="${harga.val()}">
                        </td>
						<td>
                            ${lama_sewa.val()} Hari
                            <input type="hidden" class="lama-hidden" name=lama[]" value="${lama_sewa.val()}">
                        </td>
						<td>
                            ${formatRibuan(subtotal)}
                            <input type="hidden" class="subtotal-hidden" name="subtotal[]" value="${subtotal}">
                        </td>
                        <td>
                            <button class="btn btn-warning btn-xs me-1 btn-edit" type="button">
                                <i class="fa fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btn-xs btn-delete" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                `)
			hitungTotal()
			hitungDiskon()
			clearForm()
			cekTableLength()
			generateNo()
			kamera.focus()
			btnUpdate.hide()
			btnAdd.show()

		}
	})

	$(document).on('click', '.btn-edit', function(e) {
		e.preventDefault()
		let index = $(this).parent().parent().index()

		btnAdd.hide()
		btnUpdate.show()
		kamera.val($('.kamera-hidden:eq(' + index + ')').val())
		lama_sewa.val($('.lama-hidden:eq(' + index + ')').val())
		harga.val($('.harga-hidden:eq(' + index + ')').val())

		$('#index-tr').val(index)
	})

	$(document).on('click', '.btn-delete', function(e) {
		$(this).parent().parent().remove()
		generateNo()
		hitungTotal()
		hitungDiskon()
		cekTableLength()
	})

	function generateNo() {
		let no = 1
		tblCart.find('tbody tr').each(function() {
			$(this).find('td:nth-child(1)').html(no)
			no++
		})
	}

	function clearForm() {
		kode_kamera.val('')
		kamera.val('')
		nama_kamera.val('')
		harga.val('')
	}

	function cekTableLength() {
		let cek = tblCart.find('tbody tr').length

		if (cek > 0) {
			btnSave.prop('disabled', false)
		} else {
			btnSave.prop('disabled', true)
		}
	}

	function hitungTotal() {
		let xTotal = 0
		$('input[name="subtotal[]"]').map(function() {
			xTotal += parseInt($(this).val())
		}).get()

		$('#total').val(formatRibuan(xTotal))
		$('#grand-total').val(formatRibuan(xTotal))

		$('#grand-total-hidden').val(xTotal)
		$('#total-hidden').val(xTotal)
		getVal()

	}

	function getVal() {
		var value = $("#grand-total-hidden").val();
		if (value > 0){
			$("#lama_sewa").prop("readonly",true);
		}else{
			$("#lama_sewa").prop("readonly",false);
		}
	}

	function formatRibuan(number) {
		return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}

	function hitungDiskon() {
		xTotal = parseInt($('#total-hidden').val())
		xDiskon = (xTotal - parseInt($('#diskon').val()))

		if (Number.isNaN(xDiskon)) {
			grandTotal.val(formatRibuan(xTotal))
			$('#grand-total-hidden').val(xTotal)
		} else {
			grandTotal.val(formatRibuan(xDiskon))

			$('#grand-total-hidden').val(xDiskon)
		}
	}
	diskon.on('change keyup', function() {
		hitungDiskon()
	})
</script>
