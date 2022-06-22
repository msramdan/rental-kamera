<?php
if ($this->session->userdata('level')=='A') { ?>
<div class="box-header with-border">
              <h3 class="box-title">Tambah Data User</h3>
            </div>
            <style type="text/css">
              .warna{
                color: #FF0000;
              }
            </style>
            <form action="<?php echo base_url(); ?>user/simpan_user" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input required="" type="text" class="form-control" name="username" id="exampleInputtext1" placeholder="" value="<?=set_value('username')?>"  >
                  <div class="warna"><?php echo form_error('username');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                    <input id="password" class="form-control" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" required value="<?=set_value('password')?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirmasi Password</label>
                    <input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" required value="<?=set_value('passcon')?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input  type="email" class="form-control" name="email" id="exampleInputtext1" placeholder="" value="<?=set_value('email')?>"  >
                  <div class="warna"><?php echo form_error('email');?></div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1" >Level Akses Aplikasi</label>
                  <select class="form-control" name="level" required="">
                    <option value="">-- Pilih --</option>
                    <option value="A">Admin</option>
                    <option value="U">Pegawai</option>
                  </select>
                  <div class="warna"><?php echo form_error('level');?></div>
                </div>

                <div class="form-group">
                  <td>
                    <label for="exampleInputEmail1">Status User</label>
                     <select class="form-control" name="is_aktive" required="">
                        <option value="">-- Pilih --</option>
                        <option value="1">Aktive</option>
                        <option value="2">Non Aktive</option>
                    </select>
                  </td>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file" class="form-control" name="img_user" id="exampleInputtext1">
                  <div class="warna"><?php echo form_error('img_user');?></div>
                </div>
              </div>
              
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
            <?php } else { ?>
          <?php redirect('error'); ?>
        <?php }?>

            