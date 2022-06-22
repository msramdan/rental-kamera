<!DOCTYPE html>
<html>

<head>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('oke'); ?>"></div>
	<?php if ($this->session->flashdata('oke')) : ?>
	<?php endif; ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Camera Rental</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo base_url(); ?>home/" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>C</b>R</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Camera</b>Rent</span>

			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>assets/admin/dist/img/<?php echo $this->session->userdata('img_user') ?>" class="user-image" alt="User Image">
								<span class="hidden-xs">Selamat datang, <?php echo ucfirst($this->session->userdata('username')); ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?php echo base_url(); ?>assets/admin/dist/img/<?php echo $this->session->userdata('img_user') ?>" class="img-circle" alt="User Image">

									<p>
										<?php echo ucfirst($this->session->userdata('username')); ?>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-right">
										<a href="<?php echo base_url(); ?>Login/logout" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url(); ?>assets/admin/dist/img/<?php echo $this->session->userdata('img_user') ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo ucfirst($this->session->userdata('nama')); ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<ul class="sidebar-menu" data-widget="tree">
					<li class="header" style="margin-top: 10px;">MAIN NAVIGATION</li>
					<li <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class ="active"' : '' ?>><a href="<?php echo base_url(); ?>home/">
							<i class="fa fa-home"></i> <span>Dashboard</span></a></li>
					<?php if ($this->session->userdata('level') == 'A') { ?>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-camera"></i> <span>Data Barang</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url() ?>kamera"><i class="fa fa-circle-o"></i>Data Barang</a></li>
								<li><a href="<?php echo base_url() ?>kategori"><i class="fa fa-circle-o"></i>Kategori Kamera</a></li>
							</ul>
						</li>

						<li <?= $this->uri->segment(1) == 'transaksi' ? 'class ="active"' : '' ?>><a href="<?php echo base_url(); ?>transaksi"><i class="fa fa-exchange"></i> <span>Transaksi Penyewaan</span></a></li>
						<li <?= $this->uri->segment(1) == 'member' ? 'class ="active"' : '' ?>><a href="<?php echo base_url(); ?>member"><i class="fa fa-users"></i> <span>Data Member</span></a></li>
						<li <?= $this->uri->segment(1) == 'user' ? 'class ="active"' : '' ?>><a href="<?php echo base_url(); ?>user/user"><i class="ion ion-person-add"></i> <span>Data User</span></a></li>
						<li <?= $this->uri->segment(1) == 'denda' ? 'class ="active"' : '' ?>><a href="<?php echo base_url() ?>denda"><i class="fa fa-money"></i> <span>Denda</span></a></li>
						<li <?= $this->uri->segment(1) == 'history' ? 'class ="active"' : '' ?>><a href="<?php echo base_url() ?>history"><i class="fa  fa-history"></i> <span>History Login</span></a></li>
						<li <?= $this->uri->segment(1) == 'backup' ? 'class ="active"' : '' ?>><a href="<?php echo base_url() ?>backup"><i class="fa  fa-download"></i> <span>Back UP Database</span></a></li>
					<?php } else { ?>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-camera"></i> <span>Data Barang</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url() ?>kamera"><i class="fa fa-circle-o"></i>Data Barang</a></li>
								<li><a href="<?php echo base_url() ?>kategori"><i class="fa fa-circle-o"></i>Kategori Kamera</a></li>
							</ul>
						</li>

						<li <?= $this->uri->segment(1) == 'transaksi' ? 'class ="active"' : '' ?>><a href="<?php echo base_url(); ?>transaksi"><i class="fa fa-exchange"></i> <span>Transaksi Penyewaan</span></a></li>
						<li <?= $this->uri->segment(1) == 'member' ? 'class ="active"' : '' ?>><a href="<?php echo base_url(); ?>member"><i class="fa fa-users"></i> <span>Data Member</span></a></li>
					<?php } ?>
				</ul>
			</section>
		</aside>
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<?php
								if (isset($content_page)) {
									$this->load->view($content_page);
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>


		<div class="control-sidebar-bg"></div>
	</div>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/dataflash.js"></script>

	<script>
		$(function() {
			$('#example1').DataTable()
			$('#example3').DataTable()
			$('#example4').DataTable()
			$('#example2').DataTable({
				'paging': true,
				'lengthChange': false,
				'searching': false,
				'ordering': true,
				'info': true,
				'autoWidth': false
			})
		})
	</script>
</body>

</html>
