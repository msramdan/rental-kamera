<div class="box-header with-border">
	<h3 class="box-title">Edit Data Member</h3>
</div>
<style type="text/css">
	.warna {
		color: #FF0000;
	}
</style>
<form action="<?php echo base_url(); ?>member/submit_edit_member/<?php echo $data_member['member_id'] ?>" method="post" enctype="multipart/form-data" role="form">
	<div class="box-body">
		<div class="form-group">
			<label for="exampleInputEmail1">No KTP</label>
			<input required="" type="text" class="form-control" name="ktp" id="ktp" placeholder="" value="<?php echo $data_member['ktp'] ?>">
			<div class="warna"><?php echo form_error('ktp'); ?></div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Nama Member</label>
			<input type="text" class="form-control" required name="nama_member" id="nama_member" placeholder="" value="<?php echo $data_member['nama_member'] ?>">
			<div class="warna"><?php echo form_error('nama_member'); ?></div>
		</div>
		<div class="form-group">
			<td>
				<label for="exampleInputEmail1">Jenis Kelamin</label>
				<select class="form-control" name="jk_kelamin" required="">
					<option value="">-- Pilih --</option>
					<option value="Laki-Laki" <?= $data_member['jk_kelamin'] == 'Laki-Laki' ? 'selected' : 'null' ?>>Laki-Laki</option>
					<option value="Perempuan" <?= $data_member['jk_kelamin'] == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
				</select>
			</td>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">No HP</label>
			<input type="text" class="form-control" name="no_hp" id="no_hp" required placeholder="" value="<?php echo $data_member['no_hp'] ?>">
			<div class="warna"><?php echo form_error('no_hp'); ?></div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat</label>
			<textarea class="form-control" required name="alamat" id="alamat" placeholder=""><?php echo $data_member['alamat'] ?></textarea>

			<div class="warna"><?php echo form_error('alamat'); ?></div>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Password</label>
			<input id="password" class="form-control" name="password" type="password">
			<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
		</div>



		<div class="box-footer">
			<button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
		</div>
</form>
