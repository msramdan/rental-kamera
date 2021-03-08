
    <body>
        <h2 style="margin-top:0px">View Data Buku</h2>
    <table class="table">
	    <tr><td>Buku ID</td><td><?= $data_buku['buku_id']; ?></td></tr>
        <tr><td>Title</td><td><?= $data_buku['title']; ?></td></tr>
        <tr><td>Nama Kategori</td><td><?= $data_buku['nama_kategori']; ?></td></tr>
        <tr><td>ISBN</td><td><?= $data_buku['isbn']; ?></td></tr>
        <tr><td>Penerbit</td><td><?= $data_buku['penerbit']; ?></td></tr>
        <tr><td>Pengarang</td><td><?= $data_buku['pengarang']; ?></td></tr>
        <tr><td>Tahun</td><td><?= $data_buku['thn_buku']; ?></td></tr>
        <tr><td>Posisi Rak</td><td><?= $data_buku['nama_rak']; ?></td></tr>
        <tr><td>Jumlah</td><td><?= $data_buku['jml']; ?></td></tr>
        <tr><td>Tanggal Masuk</td><td><?= $data_buku['tgl_masuk']; ?></td></tr>
        <?php if ($data_buku['sampul']==null) { ?>
            <tr><td style="color: red">Tidak ada Gambar Sampul</td></tr>
        <?php }else{ ?>
            <tr><td>Sampul</td><td> <img width="200" height="200" src="<?php echo base_url();?>assets/admin/dist/img/buku/<?= $data_buku['sampul'] ?>"></td></tr>
         <?php } ?>
        
	    <tr><td></td><td><a href="<?php echo site_url('buku') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
