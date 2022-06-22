<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?= base_url() ?>">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
				<div class="col-md-6">
					<center>
						<img src="<?= base_url()?>assets/fe/login.webp" alt="" width="80%">
					</center>
				</div>
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="checkout-subtitle">
						<div class="alert alert-info">
							<i class="fa fa-info-circle" aria-hidden="true"></i> Login User
						</div>
					</h4>
					<form class="register-form outer-top-xs" method="post" action="<?= base_url() ?>web/doLogin">
						<input type="hidden" name="_token" value="REyI0EiYPJvORNc8Hm6V8jZMP4cIrLQFCBdpmN5I">
						<div class="form-group">
							<label class="info-title" for="email">Username<span>*</span></label>
							<input type="text" name="username" value="" class="form-control unicase-form-control text-input" id="username" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="password">Password <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="password" id="password" required>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
					</form>
				</div>

				<!-- Sign-in -->
			</div><!-- /.sigin-in-->
		</div><!-- /.container -->
	</div><!-- /.body-content -->
</div>
