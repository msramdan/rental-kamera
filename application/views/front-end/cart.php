<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<form name="prosesForm" id="prosesForm" action="<?= base_url() ?>web/proses" method="POST">
					<div class="shopping-cart-table ">
						<div class="table-responsive">
							<table class="table" id="table-cart">
								<thead>
									<tr>
										<th class="">Hapus</th>
										<th>Photo</th>
										<th class="">Nama Produk</th>
										<th class="">Lama sewa (hari)</th>
										<th class="">Harga Sewa/hari</th>
										<th class="">Subtotal</th>
									</tr>
								</thead>
								<?php $loop = 1;
								foreach ($this->cart->contents() as $items) { ?>
									<tr>
										<td style="text-align:center;">
											<a href="<?= base_url() ?>web/remove_cart/<?php echo $items['rowid']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
										</td>
										<td style="text-align:center;"><img style="width:45px ;" src="<?= base_url() ?>assets/admin/dist/img/kamera/<?php echo $items['options']['photo'] ?>" alt=""></td>
										<td style="text-align:center;"><?php echo $items['name']; ?></td>
										<form action=""></form>
										<td>
											<div class="form-group">
												<div class="col-xs-10">
													<div class="form-inline">
														<div class="form-group3">
															<form id="updateForm<?= $loop ?>" action="<?= base_url() ?>web/update_cart" method="POST">
																<input style="width:80px" type="number" name="qty" class="form-control" value="<?php echo $items['qty']; ?>" />
																<input style="" type="hidden" name="rowid" class="form-control" value="<?php echo $items['rowid']; ?>" />
																<button type="submit" form="updateForm<?= $loop ?>" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
															</form>
															<?php $loop++ ?>
														</div>
													</div>
												</div>
										</td>
										<td style="text-align:center;"><?php echo rupiah($items['price']); ?></th>
										<td style="text-align:center;"><?php echo rupiah($items['price'] *  $items['qty']); ?></th>
									</tr>

								<?php } ?>
							</table>

						</div>
					</div>
					<?php if (count($this->cart->contents()) > 0) { ?>
						<div class="col-md-12">
							<div class="input-group" style="float: right">
								<div class="cart-checkout-btn pull-right">
									<button type="submit" id="prosesForm" class="btn btn-primary checkout-btn">PROCCED TO
										CHEKOUT</button>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="alert alert-danger">
							<strong>Cart Kosong !!! Silahkan pilih barang untuk di sewa terlebih dahulu</strong>
						</div>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>
