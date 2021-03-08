<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <a href="<?php echo base_url(); ?>kategori/tambah_data" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah Kategori</a>&nbsp;
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($kategori as $rows) { ?>
               
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['nama_kategori']; ?></td>
                  <td style="width: 20%;">
                    <a href="<?php echo base_url(); ?>kategori/edit_kategori/<?php echo $rows['id_kategori']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>kategori/DataHapus/<?php echo $rows['id_kategori'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?') "><i class="fa fa-trash"></i>Hapus</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>

