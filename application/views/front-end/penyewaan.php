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
										<th>Tanggal Sewa</th>
										<th>Lama Sewa</th>
										<th>Tanggal di Kembali</th>
										<th>Status Pengembelian</th>
										<th><span style="color: red;">Keterlambatan</span> </th>
										<th><span style="color: red;">Denda</span> </th>
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

											<!-- <td><?php echo $rows['total']; ?></td>
					<td><?php echo $rows['diskon']; ?></td>
					<td><?php echo $rows['grand_total']; ?></td> -->

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