<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class="active">Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th colspan="4" class="heading-title">My Wishlist</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($wish as $rows) { ?>
									<tr>
										<td class="col-md-2"><a href=""><img src="<?= base_url() ?>assets/admin/dist/img/kamera/<?= $rows['photo'] ?>" alt="imga"></a></td>
										<td class="col-md-7">
											<div class="product-name"><a href=""><?php echo $rows['kode_kamera']; ?>
													- <?php echo $rows['nama_kamera']; ?></a></div>
											<div class="price">Harga Sewa/hari :
												<?php echo rupiah($rows['harga']) ; ?></div>
										</td>
										<td class="col-md-2">
											<form action="<?= base_url() ?>web/addToCart" method="POST" enctype="multipart/form-data">
												<input type="hidden" value="1" name="quantity">
												<input type="hidden" value="<?php echo $rows['id_kamera']; ?>" name="id_kamera">
												<input type="hidden" value="<?php echo $rows['nama_kamera']; ?>" name="nama_kamera">
												<input type="hidden" value="<?php echo $rows['harga']; ?>" name="harga">
												<input type="hidden" value="<?= $rows['photo'] ?>" name="photo">
												<button class="btn btn-primary icon"><i class="fa fa-shopping-cart"></i> Add to cart
												</button>
											</form>
										</td>
										<td class="col-md-1 close-btn">
											<form action="<?= base_url() ?>web/doDeleteWish/<?php echo $rows['wishlist_id']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
												<button class="btn btn-danger">
													<i class="fa fa-times"></i>
												</button>
											</form>
										</td>
									</tr>
								<?php } ?>



							</tbody>
						</table>
					</div>
				</div>
			</div><!-- /.row -->
		</div>
	</div><!-- /.container -->
</div>
