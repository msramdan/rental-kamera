<div class="box-body" style="overflow-x: scroll; ">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<!-- <a href="<?php echo base_url(); ?>transaksi/adddata" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i> Tambah Penyewaan</a> -->
			<a href="#" id="detailtransaksi2" title="Detail Item" data-toggle="modal" data-target="#modal-default2" class="btn btn-danger" style="margin-bottom:20px;margin-left:5px; "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Laporan Penyewaan</a>
			<tr>
				<th>No</th>
				<th>Kode Sewa</th>
				<th>Member</th>
				<th>Tanggal Sewa</th>
				<th>Lama Sewa</th>
				<th>Tanggal di Kembali</th>
				<th>Status Pengembelian</th>

				<th><span style="color: red;">Denda</span> </th>
				<th style="width: 100px;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			$denda = $this->db->query("SELECT * FROM tbl_biaya_denda WHERE id_biaya_denda  = 1");
			$dataDenda = $denda->row();
			$valueDenda = $dataDenda->harga_denda;
			?>
			<?php foreach ($transaksi as $rows) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $rows['kode_sewa']; ?></td>
					<td><?php echo $rows['nama_member']; ?></td>
					<!-- tanggal seharus nya di kembalikan -->

					<?php
					$tgl1    = $rows['tanggal_sewa'];
					$lama = $rows['lama_sewa'];
					$x = '+' . $lama . ' days';
					$tanggalHarusKembali    = date('Y-m-d', strtotime($x, strtotime($tgl1)));
					?>
					<td><?php echo $rows['tanggal_sewa']; ?> s.d <span style="color: red;"><?= $tanggalHarusKembali ?></span> </td>
					<td><?php echo $rows['lama_sewa']; ?> Hari</td>

					<?php if ($rows['tanggal_kembali'] == null) { ?>
						<td>-</td>
						<td>Belum Di Kembalikan</td>
					<?php } else { ?>
						<td><?php echo $rows['tanggal_kembali']; ?></td>
						<td>Sudah Di Kembalikan</td>
					<?php } ?>

					<?php
					$dateNow = date('Y-m-d');
					$cek = $tanggalHarusKembali < $dateNow;

					if ($rows['tanggal_kembali'] == null && $tanggalHarusKembali < $dateNow) { ?>
						<!-- belum di kembalikan sampai today -->
						<!-- hitang keterlambatan dan denda -->
						<?php
						$tgl1 = strtotime($tanggalHarusKembali);
						$tgl2 = strtotime($dateNow);
						$jarak = $tgl2 - $tgl1;
						$keterlambatanHari = $jarak / 60 / 60 / 24;
						?>
						<td><?= $keterlambatanHari ?> Hari</td>
						<td><?= $keterlambatanHari * $valueDenda  ?></td>
					<?php } else if ($rows['tanggal_kembali'] != null && $tanggalHarusKembali < $rows['tanggal_kembali']) { ?>
						<!-- sudah di kembalikan tapi terlambat -->
						<?php
						$tgl1 = strtotime($tanggalHarusKembali);
						$tgl2 = strtotime($rows['tanggal_kembali']);
						$jarak = $tgl2 - $tgl1;
						$keterlambatanHari = $jarak / 60 / 60 / 24;
						?>
						<td><?= $keterlambatanHari ?> Hari</td>
						<td><?= $keterlambatanHari * $valueDenda  ?></td>
					<?php } else if ($rows['tanggal_kembali'] != null && $tanggalHarusKembali >= $rows['tanggal_kembali']) { ?>
						<!-- sudah di kembalikan tapi tepat waktu -->
						<td>Tidak Ada Keterlambatan</td>
						<td>Tidak Ada Denda</td>
					<?php } else { ?>
						<td>-</td>
						<td>-</td>
					<?php } ?>
					<td>

						<?php if ($rows['tanggal_kembali'] == null) { ?>
							<a href="<?= base_url() ?>transaksi/verifikasi/<?= $rows['sewa_id'] ?>" class="btn btn-primary btn-xs" type="button" title="Verifikasi" onclick="return confirm('Barang sudah dikembalikan?')">
								<i class="fa fa-check" aria-hidden="true"></i> Verifikasi
							</a>
						<?php } ?>
						<button class="btn btn-success btn-xs me-1 btn-edit" type="button" id="detailtransaksi" title="Detail Item" data-toggle="modal" data-target="#modal-default" data-sewa_id="<?php echo $rows['sewa_id']; ?>" data-kode_sewa="<?php echo $rows['kode_sewa']; ?>" data-nama_member="<?php echo $rows['nama_member']; ?>" data-tanggal_sewa="<?php echo $rows['tanggal_sewa']; ?>" data-lama_sewa="<?php echo $rows['lama_sewa']; ?>" data-tanggal_kembali="<?php echo $rows['tanggal_kembali']; ?>" data-username="<?php echo $rows['username']; ?>" data-total="<?php echo $rows['total']; ?>" data-diskon="<?php echo $rows['diskon']; ?>" data-grand_total="<?php echo $rows['grand_total']; ?>">
							<i class="fa fa-eye"></i>
						</button>
						<a href="<?= base_url() ?>transaksi/delete/<?= $rows['sewa_id'] ?>" class="btn btn-danger btn-xs btn-delete" type="button" title="Delete">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
				<?php $no++ ?>
			<?php } ?>
	</table>
</div>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Penyewaan Kamera</h4>
			</div>
			<div class="modal-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<td>Kode Sewa</td>
							<td><span id="kode_sewa"></td>
						</tr>
						<tr>
							<td>Nama Member</td>
							<td><span id="nama_member"></td>
						</tr>
						<tr>
							<td>Tanggal Sewa</td>
							<td><span id="tanggal_sewa"></span></td>
						</tr>
						<tr>
							<td>Lama Sewa</td>
							<td><span id="lama_sewa"></span> Hari</td>
						</tr>
						<tr>
							<td>Tangal Di Kembalikan</td>
							<td><span id="tanggal_kembali"></span></td>
						</tr>
						<tr>
							<td>Status Pengembalian</td>
							<td><span id="status_pengembalian"></span></td>
						</tr>
						<tr>
							<td>Total</td>
							<td><span id="total"></span></td>
						</tr>
						<tr>
							<td>Diskon</td>
							<td><span id="diskon"></span></td>
						</tr>
						<tr>
							<td>Grand Total</td>
							<td><span id="grand_total"></span></td>
						</tr>
					</thead>
				</table>

				<h4>Detail Item</h4>
				<div class="table-responsive">
					<span id="result"></span>
					<div id="result_tunggu"></div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>

</div>

<!-- modal 2 -->
<div class="modal fade" id="modal-default2">
	<div class="modal-dialog">
		<form action="<?= base_url() ?>transaksi/pdf" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Laporan Transaksi</h4>
				</div>
				<div class="modal-body">
					<div class="box-body">

						<div class="form-group">
							<label for="kode_kamera">Tanggal Awal</label>
							<input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
						</div>
						<div class="form-group">
							<label for="nama_kamera">Tanggal Akhir</label>
							<input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger pull-left">Cetak Laporan</button>
				</div>
			</div>
		</form>

	</div>

</div>

<script type="text/javascript">
	$(document).on('click', '#detailtransaksi', function() {
		var sewa_id = $(this).data('sewa_id');
		var kode_sewa = $(this).data('kode_sewa');
		var nama_member = $(this).data('nama_member');
		var lama_sewa = $(this).data('lama_sewa');
		var tanggal_sewa = $(this).data('tanggal_sewa');
		var tanggal_kembali = $(this).data('tanggal_kembali');
		var username = $(this).data('username');
		var total = $(this).data('total');
		var diskon = $(this).data('diskon');
		var grand_total = $(this).data('grand_total');
		console.log(tanggal_kembali)

		if (tanggal_kembali) {
			var kembali = $(this).data('tanggal_kembali');
			var status_pengembalian = 'Sudah Di Kembalikan';
		} else {
			var kembali = '-';
			var status_pengembalian = 'Belum Di Kembalikan';
		}


		$('#modal-default #kode_sewa').text(kode_sewa);
		$('#modal-default #nama_member').text(nama_member);
		$('#modal-default #lama_sewa').text(lama_sewa);
		$('#modal-default #tanggal_sewa').text(tanggal_sewa);
		$('#modal-default #tanggal_kembali').text(kembali);
		$('#modal-default #username').text(username);
		$('#modal-default #total').text(total);
		$('#modal-default #diskon').text(diskon);
		$('#modal-default #grand_total').text(grand_total);
		$('#modal-default #status_pengembalian').text(status_pengembalian);

		$.ajax({
			url: '<?= base_url() ?>transaksi/getById/' + sewa_id,
			type: 'GET',
			data: {},
			success: function(html) {
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});


	})
</script>
