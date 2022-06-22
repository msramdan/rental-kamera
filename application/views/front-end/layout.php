<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from olshop.ip-komputer.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jun 2022 16:47:43 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('oke'); ?>"></div>
	<?php if ($this->session->flashdata('oke')) : ?>
	<?php endif; ?>

	<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
	<?php if ($this->session->flashdata('error')) : ?>
	<?php endif; ?>


	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">
	<title>Rent Camera</title>

	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/main.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/blue.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/owl.transitions.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/rateit.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fe/assets/css/lightbox.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>

<body>

	<header class="header-style-1">
		<div class="top-bar animate-dropdown">
			<div class="container">
				<div class="header-top-inner">

					<div class="cnt-account">
						<ul class="list-unstyled">
							<?php if ($this->session->userdata('webMemberId')) { ?>
								<li><a href="<?= base_url() ?>web/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
										Logout</a></li>
							<?php } else { ?>
								<li><a href="<?= base_Url() ?>web/login"><i class="fa fa-sign-in" aria-hidden="true"></i>
										Login</a></li>
								<li><a href="<?= base_url() ?>web/register"><i class="fa fa-wpforms" aria-hidden="true"></i>
										Register</a></li>
							<?php } ?>
						</ul>
					</div>

					<?php if ($this->session->userdata('webMemberId')) { ?>
						<div class="cnt-block">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"><?= ucfirst($this->fungsi->user_login()->nama_member) ?></span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="<?= base_url() ?>web/akun">Akun Profile</a></li>
										<li><a href="<?= base_url() ?>web/penyewaan">Penyewaan</a></li>
										<li><a href="<?= base_url() ?>web/wishList">Wishlist</a></li>
									</ul>
								</li>
							</ul>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
		<div class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
						<div class="logo">
							<a href="<?= base_url() ?>">
								<img src="<?= base_url() ?>assets/fe/assets/images/logo.png" alt="" style="width: 70%;">
							</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
						<div class="search-area">
							<form action="https://olshop.ip-komputer.com/pencarian" method="GET">
								<div class="control-group">
									<input required class="search-field typeahead" name="search" id="search" autocomplete="off" placeholder="Cari Barang" />
									<button type="submit" class="search-button">
									</button>
								</div>
							</form>
						</div>
					</div>



				</div>

			</div>
			<div class="header-nav animate-dropdown">
				<div class="container">
					<div class="yamm navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="nav-bg-class">
							<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
								<div class="nav-outer">
									<ul class="nav navbar-nav">
										<li class="dropdown hidden-sm">
											<a href="<?= base_url() ?>"><span class="menu-label hot-menu hidden-xs">hot</span>DAFTAR BARANG</a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</header>

	<?php
	if (isset($content_page)) {
		$this->load->view($content_page);
	}
	?>


	<footer id="footer" class="footer color-bg">
		<div class="footer-bottom">
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/echo.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/bootstrap-slider.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/jquery.rateit.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/lightbox.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/bootstrap-select.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/wow.min.js"></script>
	<script src="<?= base_url() ?>assets/fe/assets/js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/dataflash.js"></script>

	<script type="text/javascript">
		var path = "autocomplete-search-query.json";
		$('input.typeahead').typeahead({
			source: function(query, process) {
				return $.get(path, {
					term: query
				}, function(data) {
					return process(data);
				});
			}
		});
	</script>
</body>


<!-- Mirrored from olshop.ip-komputer.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jun 2022 16:48:11 GMT -->

</html>
