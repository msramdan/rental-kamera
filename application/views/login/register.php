
<!DOCTYPE html>
<html>
<style type="text/css">
              .warna{
                color: #FF0000;
              }
            </style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Apps Perpustakaan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
<!--       <img style="width: 90%;height: auto;margin-bottom: -10px;margin-left:-5px;" src="<?php echo base_url(); ?>assets/admin/images/logobiu.png"> -->
    <a href=""><b>Web</b> <b>Apps</b> Perpustakaan</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?php echo base_url() ?>login/simpan_user" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required="" value="<?=set_value('username')?>">
        <div class="warna"><?php echo form_error('username');?></div>
      </div>
       <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full Name" name="nama" required="" value="<?=set_value('nama')?>">
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?=set_value('email')?>">
        <div class="warna"><?php echo form_error('email');?></div>
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Telepon" name="telepon" required="" value="<?=set_value('telepon')?>">
      </div>
      <div class="form-group">
        <input id="password" class="form-control" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required value="<?=set_value('password')?>">
      </div>
      <div class="form-group">
        <input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Verify Password" required value="<?=set_value('passcon')?>">
      </div>
       <div class="form-group">
                  <input type="file" class="form-control" name="img_user" id="exampleInputtext1" required="">
                  <P>*Pilih Photo Profil</P>
                </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="<?php echo base_url() ?>login" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
