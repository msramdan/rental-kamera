<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Apps Perpustakaan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
<!-- 	<img style="width: 90%;height: auto;margin-bottom: -10px;margin-left:-5px;" src="<?php echo base_url(); ?>assets/admin/images/logobiu.png"> -->
	<a href=""> Halaman Reset Password</a>
</div>
  <div class="login-box-body" style="margin-top: -30px;">
    <form action="<?php base_url(); ?>lupa_password" method="post">
      <div class="form-group has-feedback">
        <label>Masukan Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukan email anda" required autofocus value="<?=set_value('email')?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary ">Reset Password</button>
        </div>
      </div>
      <a href="<?php echo base_url() ?>login" class="text-center">Back to login</a><br>
    </form>
  </div>
</div>
</body>
</html>
