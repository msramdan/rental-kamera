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
                  <label for="kode_kamus">Anggota ID</label>
                  <input type="" class="form-control" name="anggota_id" id="exampleInputtext1" required="" value="<?= $kodeunik; ?>" readonly>
                </div>
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
                  <label for="exampleInputEmail1">Nama User</label>
                  <input required="" type="text" class="form-control" name="user" id="exampleInputtext1" placeholder="" value="<?=set_value('user')?>"  >
                  <div class="warna"><?php echo form_error('user');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input  type="email" class="form-control" name="email" id="exampleInputtext1" placeholder="" value="<?=set_value('email')?>"  >
                  <div class="warna"><?php echo form_error('email');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea name="alamat" class="form-control" ><?= set_value('alamat')?></textarea>
                  <div class="warna"><?php echo form_error('alamat');?></div>
                  <!-- <input type="text" class="form-control" name="alamat" id="exampleInputtext1" placeholder="ex.sensor_rpm" > -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kota </label>
                  <input type="text" class="form-control" name="kota" id="exampleInputtext1" placeholder="" value="<?=set_value('kota')?>" >
                  <div class="warna"><?php echo form_error('kota');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" id="exampleInputtext1" value="<?=set_value('provinsi')?>"  >
                  <div class="warna"><?php echo form_error('provinsi');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode POS</label>
                  <input type="number" class="form-control" name="kodepos" id="exampleInputtext1" placeholder="" value="<?=set_value('kodepos')?>" >
                  <div class="warna"><?php echo form_error('kodepos');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <input type="number" class="form-control" name="telepon" id="exampleInputtext1" placeholder="" value="<?=set_value('telepon')?>" >
                  <div class="warna"><?php echo form_error('telepon');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" >Level Akses Aplikasi</label>
                  <select class="form-control" name="level" required="">
                    <option value="">-- Pilih --</option>
                    <option value="A">Admin</option>
                    <option value="U">User</option>
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
                  <label for="exampleInputEmail1">img_user</label>
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

            