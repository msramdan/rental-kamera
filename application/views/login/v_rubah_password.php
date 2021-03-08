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
<!--   <img style="width: 90%;height: auto;margin-bottom: -10px;margin-left:-5px;" src="<?php echo base_url(); ?>assets/admin/images/logobiu.png"> -->
</div>
  <div class="login-box-body" style="margin-top: -30px;">
    <p class="login-box-msg">Reset Password For : <?php echo $this->session->userdata('reset_email') ?></p>
    <form action="<?php base_url(); ?>rubah_password" method="post">

      <div class="form-group">
        <label for="password">Password Baru</label>
        <input id="password" class="form-control" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
      </div>
      <div class="form-group">
        <label for="passcon">Confimasi Password Baru</label>
        <input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Verify Password" required>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary ">Reset Password</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
