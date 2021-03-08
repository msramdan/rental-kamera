<!DOCTYPE html>
<html>
<head>

   <div class="flash-data" data-flashdata="<?= $this->session->flashdata('oke'); ?>"></div>

<?php if ($this->session->flashdata('oke') ) : ?>
 <?php endif; ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Apps Perpustakaan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.idle.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.idle.min"></script>
  <script>
    $(document).idle({
        onIdle: function(){
            window.location="<?php echo base_url(); ?>login/logout";                
        },
        idle: 1800000
    });
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
                    <!--===========================FreiChat=======START=========================-->
<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code
	 Then remove FreiChat tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

<?php
$ses=null;

if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("/home/binains/public_html/monitoring/freichat/hardcode.php")){

               require "/home/binains/public_html/monitoring/freichat/hardcode.php";

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not found!');</script>";
       }

       return 0;
}
}
?>
<!--===========================FreiChatX=======END=========================-->                                
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>home/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Web</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Web</b>Apps</span>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
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
              <span class="hidden-xs"><?php echo ucwords( getTeks(1)) ?>, <?php  echo ucfirst($this->session->userdata('nama')); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/admin/dist/img/<?php echo $this->session->userdata('img_user') ?>" class="img-circle" alt="User Image">

                <p>
                  <?php  echo ucfirst($this->session->userdata('username')); ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>user/editprofile/<?php echo $this->session->userdata('username') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
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
          <p><?php  echo ucfirst($this->session->userdata('nama')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="margin-top: 10px;">MAIN NAVIGATION</li>
        <li <?= $this->uri->segment(1) =='home' || $this->uri->segment(1) =='' ? 'class ="active"' :'' ?>><a href="<?php echo base_url(); ?>home/">
          <i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <?php if ($this->session->userdata('level')=='A') { ?>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Data Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>buku"><i class="fa fa-circle-o"></i>Data Buku</a></li>
            <li><a href="<?php echo base_url() ?>kategori"><i class="fa fa-circle-o"></i>Kategori</a></li>
            <li><a href="<?php echo base_url() ?>rak"><i class="fa fa-circle-o"></i>Rak</a></li>
          </ul>
        </li>

        <li  <?= $this->uri->segment(1) =='transaksi' ? 'class ="active"' :'' ?> ><a href="<?php echo base_url(); ?>transaksi"><i class="fa fa-exchange"></i> <span>Transaksi Peminjaman</span></a></li>  

          <li  <?= $this->uri->segment(1) =='user' ? 'class ="active"' :'' ?> ><a href="<?php echo base_url(); ?>user/user"><i class="fa fa-users"></i> <span>Data Pengguna</span></a></li>      
          <li  <?= $this->uri->segment(1) =='bahasa' ? 'class ="active"' :'' ?>><a href="<?php echo base_url() ?>bahasa/tampillistbahasa"><i class="fa fa-circle-o text-blue"></i> <span>Setting Bahasa</span></a></li>
          <li  <?= $this->uri->segment(1) =='denda' ? 'class ="active"' :'' ?>><a href="<?php echo base_url() ?>denda"><i class="fa fa-money"></i> <span>Denda</span></a></li>
          <li  <?= $this->uri->segment(1) =='history' ? 'class ="active"' :'' ?>><a href="<?php echo base_url() ?>history"><i class="fa  fa-history"></i> <span>History Login</span></a></li>
          <li  <?= $this->uri->segment(1) =='backup' ? 'class ="active"' :'' ?>><a href="<?php echo base_url() ?>backup"><i class="fa  fa-download"></i> <span>Back UP Database</span></a></li>
          <?php } else { ?>
          <?php }?>
      </ul>
    </section>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
            <?php 
                if (isset($content_page)){
                  $this->load->view($content_page);
                }
             ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
//   <script type="text/javascript">
//   window.__lc = window.__lc || {};
//   window.__lc.license = 11823498;
//   (function() {
//     var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
//     lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
//     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
//   })();
// </script>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="">MsRamdan</a>.</strong> All rights
    reserved.
  </footer>
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
<script src="<?php echo base_url(); ?>assets/admin/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/js/sweetalert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type=”text/javascript” src=”http://www.google.com/jsapi”></script>
<script type=”text/javascript” src=”http://x.translateth.is/translate-this.js”></script>
<script type=”text/javascript”>
TranslateThis();
</script>
<script src="<?php echo base_url();?>assets/admin/js/dataflash.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>