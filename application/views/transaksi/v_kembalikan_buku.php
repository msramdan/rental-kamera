
<div class="box-header with-border">
  <h3 class="box-title">Kembalikan Piminjaman Buku</h3>
</div>
  <form action="<?php echo base_url() ?>transaksi/submit_kembalikan_buku/<?= $data_transaksi['id_pinjam']; ?>" method="post" enctype="multipart/form-data" role="form">
    <div class="box-body">
      <div class="form-group" style="background: yellowgreen">
        <h3>Data Transaksi</h3>
      </div>
      <div class="form-group">
        <label for="nopinjam">No Peminjaman</label>
        <input type="text" class="form-control" name="nopinjam" id="nopinjam" required="" value="<?= $data_transaksi['pinjam_id']; ?>" readonly>
        <input type="hidden" class="form-control" name="id_pinjam" id="id_pinjam" required="" value="<?= $data_transaksi['id_pinjam']; ?>" readonly>
        <input type="hidden" class="form-control" name="tgl_balik" id="tgl_balik" required="" value="<?= $data_transaksi['tgl_balik']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="tgl">Tanggal Pinjam</label>
        <input type="" class="form-control" name="tgl" id="tgl" placeholder="ex.Bahasa"  required="" value="<?= $data_transaksi['tgl_pinjam']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="ina">ID Anggota</label>
          <input type="" class="form-control" name="tgl" id="tgl" placeholder="ex.Bahasa"  required="" value="<?= $data_transaksi['anggota_id']; ?>" readonly>
      </div>

       <div class="form-group">
        <label for="">Biodata</label>
        <table class="table">
          <tr><td>Nama Anggota</td><td><?= $data_transaksi['nama']; ?></td></tr>
          <tr><td>Telepon</td><td><?= $data_transaksi['email']; ?></td></tr>
          <tr><td>E-mail</td><td><?= $data_transaksi['telepon']; ?></td></tr>      
        </table>
      </div>
      <div class="form-group">
        <label for="lama">Lama Minjam</label>
        <input type="number" class="form-control" name="lama" id="lama" placeholder="Lama Pinjam Contoh : 2 Hari (2)"  required="" value="<?= $data_transaksi['lama_pinjam']; ?>" readonly>
      </div>

        <div class="form-group" style="background: yellowgreen">
        <h3>Pinjam Buku</h3>
      </div>
        <div class="form-group">
        <label for="buku_id">Kode Buku</label>
         <input type="" class="form-control" name="tgl" id="tgl" placeholder="ex.Bahasa"  required="" value="<?= $data_transaksi['buku_id']; ?>" readonly>
        </div>
       <div class="form-group">
        <label for="ina">Data Buku</label>
          <table class="table">
          <tr><td>Title Buku</td><td><?= $data_transaksi['title']; ?></td></tr>
          <tr><td>Penerbit</td><td><?= $data_transaksi['penerbit']; ?></td></tr>
          <tr><td>Pengarang</td><td><?= $data_transaksi['pengarang']; ?></td></tr>
          <tr><td>Tahun</td><td><?= $data_transaksi['thn_buku']; ?></td></tr>      
        </table>
      </div>
      </div>
      <?php
     $date1 = date('Ymd');
     $date2 = preg_replace('/[^0-9]/','',$data_transaksi['tgl_balik']);
     $diff = $date1 - $date2;
     if($diff > 0 )
                      {
                        if ($harga_denda->stat=='Aktive') {
                          $denda = $diff * $harga_denda->harga_denda;
                            echo '<h1 style="color: red">Denda :'.$this->M_transaksi->rp($denda);
                        }else{
                          $denda = $diff * 0;
                          echo '<h1 style="color: red">Denda :'.$this->M_transaksi->rp($denda);
                        }
                      }else{
                        echo '<h1 style="color: red">Denda : Tidak Ada Denda';
                      }

    ?>
                  


     <div class="box-footer">
            
                <button onClick="javascript: return confirm('Kembalikan Buku ?');" type="submit" name="submit" class="btn btn-success btn" title="Update"></i>Kembalikan</button>
                <a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Cancel</a>
              </div>
  </form>
