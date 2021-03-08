<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <a href="<?php echo base_url(); ?>bahasa/tambahbahasa" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah Bahasa Baru</a>&nbsp;
                  <a href="<?php echo base_url(); ?>kamus/tambah_kamus_kata" class="btn btn-primary" style="margin-bottom:20px; ">Tambah Kamus</a>
                <tr>
                  <th>No</th>
                  <th>Nama Bahasa</th>
                  <th>Nama ALternatif</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($bahasa as $rows) { ?>
               
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['nama']; ?></td>
                  <td><?php echo $rows['nama_alt']; ?> </td>
                  <td style="width: 20%;">
                    <a href="<?php echo base_url(); ?>bahasa/editbahasa/<?php echo $rows['bahasa_id']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                    <a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>bahasa/datahapus/<?php echo $rows['bahasa_id'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?') "><i class="fa fa-trash"></i>Hapus</a>
                    <a href="<?php echo base_url(); ?>kamus/library_kamus/<?php echo $rows['bahasa_id'] ?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-universal-access"></i>Library Kamus</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>

