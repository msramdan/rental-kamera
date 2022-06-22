
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Penyewaan Kamera</h4>
			</div>
			<div class="modal-body" >
				<table class="table table-bordered" style="line-height: 7px;">
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
				</table>

				<h4>Detail Item</h4>
				<div class="table-responsive" style="overflow-x: scroll; ">
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


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class="active">Pembelian</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3 sidebar">
				<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head" style="background-color: #5A98BF; border:white"><i class="icon fa fa-align-justify fa-fw"></i> <span style="color: white"></span> </div>
					<nav class="yamm megamenu-horizontal" role="navigation">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#pembayaran" aria-controls="pembayaran" role="tab" data-toggle="tab">Daftar Penyewaan</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-9">
				<div class="search-result-container ">
					<div class="tab-content category-list">
						<div class="card-body" style="overflow: scroll">
							<table class="table table-striped table-sm">
								<thead>
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
												<button class="btn btn-success btn-xs me-1 btn-edit" type="button" id="detailtransaksi" title="Detail Item" data-toggle="modal" data-target="#modal-default" data-sewa_id="<?php echo $rows['sewa_id']; ?>" data-kode_sewa="<?php echo $rows['kode_sewa']; ?>" data-nama_member="<?php echo $rows['nama_member']; ?>" data-tanggal_sewa="<?php echo $rows['tanggal_sewa']; ?>" data-tanggal_req="<?php echo $rows['tanggal_req']; ?>" data-username="<?php echo $rows['username']; ?>" data-grand_total="<?php echo $rows['grand_total']; ?>">
													<i class="fa fa-eye"></i>
												</button>
											</td>
										</tr>
										<?php $no++ ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="clearfix">
				</div>
			</div>
		</div>
	</div>

</div>
</div>



