<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                   <a href="<?php echo base_url(); ?>transaksi/adddata" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah Pinjam</a>
                <tr>
                  <th>No</th>
                  <th>Kode Peminjaman</th>
                  <th>ID Anggota</th>
                  <th>Nama Peminjam</th>
                  <th>Title</th>
                  <th>Lama Pinjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Balik</th>
                  <th>Status</th>
                  <th>Tanggal Kembali</th>
                  <th>Keterlambatan</th>
                  <th>Denda</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($transaksi as $rows) {
                  $pinjam_id = $rows['pinjam_id'];
                  $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
                  $total_denda = $denda->row(); ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows ['pinjam_id']; ?></td>
                  <td><?php echo $rows ['anggota_id']; ?></td>
                  <td><?php echo $rows ['nama']; ?></td>
                  <td><?php echo $rows ['title']; ?></td>
                  <td><?php echo $rows ['lama_pinjam']; ?> Hari</td>
                  <td><?php echo $rows ['tgl_pinjam']; ?></td>
                  <td><?php echo $rows ['tgl_balik']; ?></td>
                  <td><?php echo $rows ['status']; ?></td>
                  <?php if ($rows['tgl_kembali']==0 || $rows['tgl_kembali']==null) { ?>
                    <td style="color: red">Belum Dikembalikan</td>
                  <?php }else{ ?>
                    <td><?php echo $rows ['tgl_kembali']; ?></td>

                  <?php } ?>
                  <td>
                    <?php   
                      $date1 = date('Ymd');
                      $date2 = preg_replace('/[^0-9]/','',$rows['tgl_balik']);
                      $diff = $date1 - $date2;
                      if ($diff >0) {
                        echo $diff." Hari";
                      }else{
                        echo "Tidak Terlambat";
                      }
                    ?>
                  </td>
                <td>
                    <?php 
                      if($diff > 0 )
                      {
                        if ($harga_denda->stat=='Aktive') {
                          $denda = $diff * $harga_denda->harga_denda;
                          echo $this->M_transaksi->rp($denda);
                        }else{
                          $denda = $diff * 0;
                          echo $this->M_transaksi->rp($denda);
                        }
                      }else{
                        echo '<p style="color:green;text-align:center;">
                        Tidak Ada Denda</p>';
                      }
                  ?>
                  </td>
                  <td <?php if($this->session->userdata('level') == 'A'){ ?>style="width:22%;"<?php }?>>
                  <center>
                  <?php if($this->session->userdata('level') == 'A'){ ?>
                  <a href="<?= base_url('transaksi/view_transaksi/'.$rows['id_pinjam']);?>">
                  <button class="btn btn-primary" title="detail pinjam"><i class="fa fa-eye"></i></button></a>
                  
                  <?php 
                    if($rows['tgl_kembali'] == '0')
                    {
                  ?>
                    <a href="<?= base_url('transaksi/kembalikan_buku/'.$rows['id_pinjam']);?>">
                    <button class="btn btn-warning" title="pengembalian buku">
                      <i class="fa fa-sign-out"></i>Kembalikan</button></a>
                    <?php
                    }else{
                  ?>
                    <a href="javascript:void(0)">
                    <button class="btn btn-success" title="pengembalian buku">
                      <i class="fa fa-check"></i> Dikembalikan</button></a>
                  <?php
                    }
                  
                  ?>
                  <a href="<?= base_url('transaksi/prosespinjam?id_pinjam='.$rows['id_pinjam']);?>" 
                   onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');">
                  <button class="btn btn-danger" title="hapus pinjam"><i class="fa fa-trash"></i></button></a>
                  <?php }else{?>
                    <a href="<?= base_url('transaksi/detailpinjam/'.$rows['pinjam_id']);?>">
                    <button class="btn btn-primary" title="detail pinjam"><i class="fa fa-eye"></i> Detail Pinjam</button></a>
                  <?php }?>
                  </center>
                </td>





















                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>


