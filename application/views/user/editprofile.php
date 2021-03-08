
<div class="box-header with-border">
  <h3 class="box-title">Ubah Password User</h3>
</div>
  <form action="<?php echo base_url(); ?>user/submit_edit_profile/<?php echo $data_user['username'] ?>" method="post" enctype="multipart/form-data" role="form">
    <div class="box-body">
      <?php if ($this->session->userdata('level')=='U') { ?><!-- KOndisi ketika yang login level nya U ketika rumah password dia harus masukan password lama -->
      <div class="form-group">
        <label for="password">Password Lama</label>
        <input id="password" class="form-control" name="lama" type="password" placeholder="Password Lama">
      </div>
      <?php } else { ?>
      <?php }?>
      <div class="form-group">
        <label for="password">Password Baru</label>
        <input id="password" class="form-control" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
      </div>
      <div class="form-group">
        <label for="passcon">Confimasi Password Baru</label>
        <input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Verify Password" required>
      </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-success nilai "  name="submit" value="Update Password" onClick="javascript: return confirm('Are you sure to Update Password');" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?')">
    </div>
  </form>
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data User</h3>
      </div>
      <style type="text/css">
      .warna{color: #FF0000;}
      </style>
        <form action="<?php echo base_url(); ?>user/submit_edit/<?php echo $data_user['username'] ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="box-body">
            <div class="form-group">
                  <label for="kode_kamus">Anggota ID</label>
                  <input type="" class="form-control" name="anggota_id" id="exampleInputtext1" required="" value="<?= $data_user['anggota_id']?>" readonly>
                </div>
                <div class="form-group">
                   <input type="hidden" name="username" value="<?php echo $data_user['username'] ?>">
                  <label for="exampleInputEmail1">Username</label>
                  <input readonly="" type="text" class="form-control" id="exampleInputtext1" placeholder="" required="" value="<?= $data_user['username']?>" >
                  <div class="warna"><?php echo form_error('username');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama User</label>
                  <input type="text" class="form-control" name="user" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_user['nama']?>"  >
                  <div class="warna"><?php echo form_error('user');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email User</label>
                  <input type="email" class="form-control" name="email" id="exampleInputtext1" placeholder="" required="" value="<?= $data_user['email']?>" >
                  <div class="warna"><?php echo form_error('email');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea name="alamat" class="form-control" required="" ><?= $data_user['alamat']?></textarea>
                  <div class="warna"><?php echo form_error('alamat');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kota </label>
                  <input type="text" class="form-control" name="kota" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_user['kota']?>" >
                  <div class="warna"><?php echo form_error('kota');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" id="exampleInputtext1"  required="" required="" value="<?= $data_user['provinsi']?>"  >
                  <div class="warna"><?php echo form_error('provinsi');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode POS</label>
                  <input type="number" class="form-control" name="kodepos" id="exampleInputtext1" placeholder="" required="" value="<?= $data_user['kode_pos']?>" >
                  <div class="warna"><?php echo form_error('kodepos');?></div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <input type="number" class="form-control" name="telepon" id="exampleInputtext1" placeholder="" required="" value="<?= $data_user['telepon']?>" >
                  <div class="warna"><?php echo form_error('telepon');?></div>
                </div>
                   <?php if ($this->session->userdata('level')=='A') { ?> <!-- jika yang login user biasa pilihan level User/admin tidak di tampilkan -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Level</label>
                  <input type="" readonly="" name="level" class="form-control" value="<?php echo $data_user['level']== 'A' ? "Admin" :"User"; ?>">
                </div>
                <?php } else { ?>
                  <div class="form-group">
                  <input type="hidden" class="form-control" name="level" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_user['level']?>"  >
                </div>
                <?php }?>
                    <div class="form-group">
                  <img width="200" height="200" src="<?php echo base_url();?>assets/admin/dist/img/<?= $data_user['img_user'] ?>">
                  <input type="hidden" name="gambar_lama" value="<?php echo $data_user['img_user'] ?>">
                  <input type="file" class="form-control" name="img_user" id="exampleInputtext1">
                  <p class="help-block" style="color: #FF0000;">*Pilih img_user Jika Ingin Merubah img_user Profile</p>
                  <div class="warna"><?php echo form_error('img_user');?></div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
