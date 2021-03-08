<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th style="width: 20%;">Kode Kamus <font style="color: red">(Yang dipanggil getteks)</font></th>
                  <th>Terjemahan Bahasa</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($library_kamus as $rows) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows ['kode_kamus']; ?></td>
                  <td><?php echo $rows ['teks']; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>kamus/edit_kamus/<?php echo $rows['bahasa_id'] ?>/<?php echo $rows['kode_kamus'] ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                  </td>
                </tr>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>


