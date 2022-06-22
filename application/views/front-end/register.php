<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?= base_url() ?>">Home</a></li>
				<li class='active'>Register</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<div class="col-md-6">
					<center>
						<img src="<?= base_url() ?>assets/fe/register.webp" alt="" width="100%">
					</center>

				</div>
				<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="checkout-subtitle">
						<div class="alert alert-info">
							<i class="fa fa-info-circle" aria-hidden="true"></i> Create a new account
						</div>
					</h4>

					<form class="register-form outer-top-xs" role="form" method="POST" action="<?=base_url() ?>web/doRegister">
						<div class="form-group">
							<label class="info-title" for="username">Username <span>*</span></label>
							<input style="box-shadow: 0 0 5pt 2pt #D3D3D3;
                                    outline-width: 0px;" type="text" name="username" autocomplete="off" value="" class="form-control unicase-form-control text-input" id="username" required>
						</div>

						<div class="form-group">
							<label class="info-title" for="ktp">NIK KTP <span>*</span></label>
							<input style="box-shadow: 0 0 5pt 2pt #D3D3D3;
                                    outline-width: 0px;" type="ktp" name="ktp" autocomplete="off" value="" class="form-control unicase-form-control text-input " id="ktp" required >
						</div>
						<div class="form-group">
							<label class="info-title" for="nama_member">Nama Lengkap <span>*</span></label>
							<input style="box-shadow: 0 0 5pt 2pt #D3D3D3;
                                    outline-width: 0px;" type="text" name="nama_member" autocomplete="off" value="" class="form-control unicase-form-control text-input" id="nama_member" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="password">Password <span>*</span></label>
							<input style="box-shadow: 0 0 5pt 2pt #D3D3D3;
                                    outline-width: 0px;" type="password" name="password" autocomplete="off" class="form-control unicase-form-control text-input" id="password" required>
						</div>

						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
					</form>


				</div>
				<!-- create a new account -->
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->
