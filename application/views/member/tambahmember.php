<div class="box-header with-border">
	<h3 class="box-title">Tambah Data Member</h3>
</div>
<style type="text/css">
	.warna {
		color: #FF0000;
	}
</style>
<form action="<?php echo base_url(); ?>member/simpan_member" method="post" enctype="multipart/form-data" role="form">
	<div class="box-body">
		<div class="form-group">
			<label for="username">Username</label>
			<input required="" type="text" class="form-control" name="username" id="username" placeholder="" value="<?= set_value('username') ?>">
			<div class="warna"><?php echo form_error('username'); ?></div>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">No KTP</label>
			<input required="" type="text" class="form-control" name="ktp" id="ktp" placeholder="" value="<?= set_value('ktp') ?>">
			<div class="warna"><?php echo form_error('ktp'); ?></div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Nama Member</label>
			<input type="text" class="form-control" required name="nama_member" id="nama_member" placeholder="" value="<?= set_value('nama_member') ?>">
			<div class="warna"><?php echo form_error('nama_member'); ?></div>
		</div>
		<div class="form-group">
			<td>
				<label for="exampleInputEmail1">Jenis Kelamin</label>
				<select class="form-control" name="jk_kelamin" required="">
					<option value="">-- Pilih --</option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</td>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">No HP</label>
			<input type="text" class="form-control" name="no_hp" id="no_hp" required placeholder="" value="<?= set_value('no_hp') ?>">
			<div class="warna"><?php echo form_error('no_hp'); ?></div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat</label>
			<textarea class="form-control" required name="alamat" id="alamat" placeholder="" value="<?= set_value('alamat') ?>"></textarea>

			<div class="warna"><?php echo form_error('alamat'); ?></div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Password</label>
			<input id="password" class="form-control" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" required value="<?= set_value('password') ?>">
		</div>


		<div class="box-footer">
			<button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
		</div>
</form>
