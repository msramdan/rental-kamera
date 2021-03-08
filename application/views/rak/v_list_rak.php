<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <a href="<?php echo base_url(); ?>rak/tambah_data" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah Rak</a>&nbsp;
                <tr>
                  <th>No</th>
                  <th>Nama Rak</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($rak as $rows) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['nama_rak']; ?></td>
                  <td style="width: 20%;">
                    <a href="<?php echo base_url(); ?>rak/edit_rak/<?php echo $rows['id_rak']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>rak/DataHapus/<?php echo $rows['id_rak'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?') "><i class="fa fa-trash"></i>Hapus</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>

