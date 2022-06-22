<div class="box-body" style="overflow-x: scroll; ">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<!-- <a href="<?php echo base_url(); ?>transaksi/adddata" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i> Tambah Penyewaan</a> -->
			<a href="#" id="detailtransaksi2" title="Detail Item" data-toggle="modal" data-target="#modal-default2" class="btn btn-danger" style="margin-bottom:20px;margin-left:5px; "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Laporan Penyewaan</a>
			<tr>
				<th>No</th>
				<th>Kode Sewa</th>
				<th>Member</th>
				<th>Grand Total</th>
				<th>Tanggal Request</th>
				<th>Tanggal Sewa</th>
				<th>User Approved</th>
				<th>Status Pengembalian</th>
				<th style="width: 120px;">Aksi</th>
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
					<td><?php echo rupiah($rows['grand_total']); ?></td>
					<td><?php echo $rows['tanggal_req']; ?></td>
					<td><?php echo $rows['tanggal_sewa']; ?></td>
					<td><?php echo $rows['username']; ?></td>
					<?php
					$sewa_id = $rows['sewa_id'];
					$cekJml = $this->db->query("SELECT * from tbl_sewa_detail where tanggal_kembali IS null and sewa_id='$sewa_id'")->num_rows();
					?>
					<?php if ($rows['tanggal_sewa'] == '' || $rows['tanggal_sewa'] == null) { ?>
						<td></td>
					<?php } else { ?>
						<?php if ($cekJml > 0) { ?>
							<td>Ada <?= $cekJml ?> Barang Belum dikembalikan</td>
						<?php } else { ?>
							<td>Semua barang sudah dikembalikan</td>
						<?php } ?>

					<?php } ?>


					<td>
						<?php if ($rows['tanggal_sewa'] == '' || $rows['tanggal_sewa'] == null) { ?>
							<a href="<?= base_url() ?>transaksi/approved/<?= $rows['sewa_id'] ?>" class="btn btn-primary btn-xs" type="button" title="Verifikasi" onclick="return confirm('Yakin sudah verifikasi data dan bayar sewa ?')">
								<i class="fa fa-check" aria-hidden="true"></i> Approved
							</a>
						<?php } ?>
						<button class="btn btn-success btn-xs me-1 btn-edit" type="button" id="detailtransaksi" title="Detail Item" data-toggle="modal" data-target="#modal-default" data-sewa_id="<?php echo $rows['sewa_id']; ?>" data-kode_sewa="<?php echo $rows['kode_sewa']; ?>" data-nama_member="<?php echo $rows['nama_member']; ?>" data-tanggal_sewa="<?php echo $rows['tanggal_sewa']; ?>" data-tanggal_req="<?php echo $rows['tanggal_req']; ?>" data-username="<?php echo $rows['username']; ?>" data-grand_total="<?php echo $rows['grand_total']; ?>">
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
							<td>Grand Total</td>
							<td><span id="grand_total"></span></td>
						</tr>
						<tr>
							<td>Tanggal Request</td>
							<td><span id="tanggal_req"></span></td>
						</tr>
						<tr>
							<td>Tanggal Sewa</td>
							<td><span id="tanggal_sewa"></span></td>
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
							<label for="kode_kamera">Tanggal Awal Request</label>
							<input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
						</div>
						<div class="form-group">
							<label for="nama_kamera">Tanggal Akhir Request</label>
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
		var tanggal_sewa = $(this).data('tanggal_sewa');
		var tanggal_req = $(this).data('tanggal_req');
		var username = $(this).data('username');
		var grand_total = $(this).data('grand_total');
		$('#modal-default #kode_sewa').text(kode_sewa);
		$('#modal-default #nama_member').text(nama_member);
		$('#modal-default #tanggal_sewa').text(tanggal_sewa);
		$('#modal-default #tanggal_req').text(tanggal_req);
		$('#modal-default #username').text(username);
		$('#modal-default #grand_total').text(grand_total);

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
