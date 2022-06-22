<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <a href="<?php echo base_url(); ?>kamera/tambah_data" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah kamera</a>&nbsp;
                <tr>
                  <th>No</th>
                  <th>Kode Kamera</th>
                  <th>Nama Kamera</th>
									<th>Harga</th>
                  <th>Kategori</th>
                  <th>Gambar Kamera</th>
                  <th>Jumlah kamera</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($kamera as $rows) { ?>
               
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['kode_kamera']; ?></td>
                  <td><?php echo $rows['nama_kamera']; ?> </td>
									<td><?php echo $rows['harga']; ?> </td>
                  <td><?php echo $rows['nama_kategori']; ?> </td>
                   <td>
                    <?php if ($rows['photo'] == null) { ?>
                      <p>No File</p>
                    <?php }else{ ?>
                    <a href="<?php echo base_url().'kamera/download/'.$rows['photo'] ?>"><i class="ace-icon fa fa-download"></i>
                    <?php } ?></a>
                  </td>
                  <td><?php echo $rows['jml']; ?> </td>
                  <td style="width: 20%;">
                    <a href="<?php echo base_url(); ?>kamera/edit_kamera/<?php echo $rows['id_kamera']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>kamera/DataHapus/<?php echo $rows['id_kamera'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?') "><i class="fa fa-trash"></i>Hapus</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>

