<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <a href="<?php echo base_url(); ?>buku/tambah_data" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah Buku</a>&nbsp;
                <tr>
                  <th>No</th>
                  <th>Buku ID</th>
                  <th>TITLE</th>
                  <th>Kategori</th>
                  <th>RAK</th>
                  <th>Sampul</th>
                  <th>ISBN</th>
                  <th>Pengarang</th>
                  <th>Jumlah Buku</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($buku as $rows) { ?>
               
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['buku_id']; ?></td>
                  <td><?php echo $rows['title']; ?> </td>
                  <td><?php echo $rows['nama_kategori']; ?> </td>
                  <td><?php echo $rows['nama_rak']; ?> </td>
                   <td>
                    <?php if ($rows['sampul'] == null) { ?>
                      <p>No File</p>
                    <?php }else{ ?>
                    <a href="<?php echo base_url().'buku/download/'.$rows['sampul'] ?>"><i class="ace-icon fa fa-download"></i>
                    <?php } ?></a>
                  </td>
                  <td><?php echo $rows['isbn']; ?> </td>
                  <td><?php echo $rows['pengarang']; ?> </td>
                  <td><?php echo $rows['jml']; ?> </td>
                  <td style="width: 20%;">
                    <a href="<?php echo base_url(); ?>buku/view_buku/<?php echo $rows['id_buku']; ?>" class="btn btn-success btn-xs" title="View"><i class="fa fa-eye"></i>View</a>
                    <a href="<?php echo base_url(); ?>buku/edit_buku/<?php echo $rows['id_buku']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>buku/DataHapus/<?php echo $rows['id_buku'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?') "><i class="fa fa-trash"></i>Hapus</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
              <h4>Total Jumlah Buku : <?= $count_jml_buku;?></h4>
            </div>

