<div class="box-header with-border">
	<h3 class="box-title">Tambah Barang</h3>
</div>
<form action="<?php echo base_url(); ?>kamera/SimpanData" method="post" enctype="multipart/form-data" role="form">
	<div class="box-body">
		<div class="form-group">
			<label for="kode_kamera">Kode Barang</label>
			<input type="" class="form-control" name="kode_kamera" id="kode_kamera" required="" value="<?= $kodeunik; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="nama_kamera">Nama Barang</label>
			<input type="text" class="form-control" name="nama_kamera" id="exampleInputtext1" placeholder="" required="">
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input type="number" class="form-control" name="harga" id="exampleInputtext1" placeholder="" required="">
		</div>
		<div class="form-group">
			<label>Kategori Barang</label>
			<select class="form-control" name="id_kategori" required="">
				<option value=''>-- Pilih --</option>
				<?php foreach ($kategori as $rows) { ?>
					<option value="<?php echo $rows['id_kategori'] ?>"><?php echo $rows['nama_kategori'] ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Deskripsi</label>
			<textarea type="text" class="form-control" name="deskripsi" id="exampleInputtext1" placeholder="" required=""></textarea>
		</div>



		<div class="form-group">
			<label for="exampleInputEmail1">Jumlah kamera</label>
			<input type="text" class="form-control" name="jml" id="exampleInputtext1" placeholder="" required="">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Photo</label>
			<input type="file" class="form-control" name="photo" id="exampleInputtext1" required="">
		</div>
	</div>
	<div class="box-footer">
		<button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
	</div>
</form>
