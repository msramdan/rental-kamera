<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Daftar Barang</li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>

			<div class='col-md-3 sidebar'>
				<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Kategori</div>
					<nav class="yamm megamenu-horizontal" role="navigation">
						<ul class="nav">
							<?php foreach ($kategori as $rows) { ?>
								<li class="">
									<a href="<?= base_url() ?>web/kategori/<?php echo $rows['id_kategori']; ?>/<?php echo $rows['nama_kategori']; ?>"><?php echo $rows['nama_kategori']; ?></a>
								</li>
							<?php } ?>


						</ul>
					</nav>
				</div>
			</div>
			<div class='col-md-9'>
				<div id="category" class="category-carousel hidden-xs">
					<div class="item">
						<div class="image">
							<img src="<?= base_url() ?>assets/fe/assets/images/banners/banner.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="search-result-container ">
					<div id="myTabContent" class="tab-content category-list">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product">
								<div class="row">
									<?php foreach ($kamera as $rows) { ?>
										<form action="https://olshop.ip-komputer.com/cart" method="POST" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="ktGsrOWJxlvh3FdsjlQLeryqfUgYZe16LkDg2BHY">
											<div class="col-sm-6 col-md-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="#">
																	<img style="height: 250px" src="<?= base_url() ?>assets/admin/dist/img/kamera/<?= $rows['photo'] ?>" alt=""></a>
															</div>
															<div class="tag new"><span>new</span></div>
														</div>
														<div class="product-info text-left">
															<h3 class="name"><a href="#"><?php echo $rows['kode_kamera']; ?>
																	- <?php echo $rows['nama_kamera']; ?></a>
															</h3>
															<div class="description"></div>
															<div class="product-price">
																<span class="price">
																	Harga Sewa / Hari <?php echo $rows['harga']; ?></span>
															</div>
														</div>
														<div class="cart clearfix animate-effect">
															<div class="action">
																<ul class="list-unstyled">
																	<li class="add-cart-button btn-group">
																		<input type="hidden" value="1" name="quantity">
																		<input type="hidden" value="<?php echo $rows['id_kamera']; ?>" name="id">
																		<input type="hidden" value="<?php echo $rows['nama_kamera']; ?>" name="nama">
																		<input type="hidden" value="<?php echo $rows['harga']; ?>" name="harga">
																		<input type="hidden" value="<?= $rows['photo'] ?>" name="photo">
																		<button class="btn btn-primary icon"><i class="fa fa-shopping-cart"></i>
																		</button>
																	</li>
																	<li class="lnk wishlist">
																		<a class="add-to-cart" href="#" title="Wishlist">
																			<i class="icon fa fa-heart"></i>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix filters-container">

						<div class="text-right">
							<div class="pagination-container">
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
