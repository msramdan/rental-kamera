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
<!-- 	<img style="width: 90%;height: auto;margin-bottom: -30px; margin-top: -40px;margin-left:-15px;" src="<?php echo base_url(); ?>assets/admin/images/logobiu.png"> -->
	<a href=""><b>Web</b> <b>Apps</b> Perpustakaan</a>
</div>
  <div class="login-box-body" style="margin-top: -30px;">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php base_url(); ?>Login/loginsubmit" method="post">
         <center>
            <p style="color: red">
                <?php echo validation_errors(); ?>
                <?php if(isset($pesanerror)){ ?>
                <?php echo $pesanerror; ?>
                <?php redirect(base_url(). 'Login'); ?>
                <?php } ?>
           </p>
         </center>
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="form-group">
        <label>Bahasa</label>
        <select class="form-control" name="bahasa" required="">
            <option value='1'>-- Pilih Bahasa --</option>
          <?php foreach ($bahasa as $bahasa) { ?>
            <option value="<?php echo $bahasa['bahasa_id']?>"><?php echo $bahasa['nama'] ?></option>         
          <?php } ?>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
      <a href="<?php echo base_url() ?>login/lupa_password">I forgot my password</a><br>
      <a href="<?php echo base_url() ?>login/register" class="text-center">Register a new membership</a>
    </form>
    
  </div>
</div>
</body>
</html>
