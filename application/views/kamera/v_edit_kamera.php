<div class="box-header with-border">
	<h3 class="box-title">Edit Barang</h3>
</div>
<form action="<?php echo base_url(); ?>kamera/simpan_edit_data/<?php echo $data_kamera['id_kamera']; ?>" method="post" enctype="multipart/form-data" role="form">
	<div class="box-body">
		<div class="form-group">
			<label for="kode_kamera">Kode Barang</label>
			<input type="" class="form-control" name="kode_kamera" id="kode_kamera" required="" value="<?= $data_kamera['kode_kamera']; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="nama_kamera">Nama Barang</label>
			<input type="text" class="form-control" name="nama_kamera" id="nama_kamera" placeholder="" required="" value="<?= $data_kamera['nama_kamera']; ?>">
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input type="number" class="form-control" name="harga" id="exampleInputtext1" placeholder="" required="" value="<?= $data_kamera['harga']; ?>">
		</div>
		<div class="form-group">
			<label>Kategori Barang</label>
			<select class="form-control" name="id_kategori">
				<?php foreach ($kategori as $rows) { ?>
					<?php if ($data_kamera['nama_kategori'] == $rows['nama_kategori']) { ?>
						<option value="<?php echo $rows['id_kategori'] ?>" selected><?php echo $rows['nama_kategori']; ?></option>
					<?php } else { ?>
						<option value="<?php echo $rows['id_kategori'] ?>"><?php echo $rows['nama_kategori'] ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Deskripsi</label>
			<textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="" required=""><?= $data_kamera['deskripsi']; ?></textarea>
		</div>



		<div class="form-group">
			<label for="exampleInputEmail1">Jumlah kamera</label>
			<input type="text" class="form-control" name="jml" id="jml" placeholder="" required="" value="<?= $data_kamera['jml']; ?>">
		</div>
		<?php if ( $data_kamera['photo']==null) { ?>
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file" class="form-control" name="photo" id="exampleInputtext1" required="">
                <?php }else{ ?>
                  <div class="form-group">
                  <img width="200" height="200" src="<?php echo base_url();?>assets/admin/dist/img/kamera/<?= $data_kamera['photo'] ?>">
                  <input type="hidden" name="gambar_lama" value="<?php echo $data_kamera['photo'] ?>">
                  <input type="file" class="form-control" name="photo" id="exampleInputtext1">
                  <p class="help-block" style="color: #FF0000;">*Pilih photo Jika Ingin Merubah photo kamera</p>
                </div >
                <?php } ?>
	</div>
	<div class="box-footer">
		<button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
	</div>
</form>
