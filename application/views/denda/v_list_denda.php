            <div class="box-body" style="overflow-x: scroll; ">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Harga Denda</th>
                  <th>Status Denda</th>
                  <th>Update Tanggal Denda</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($denda as $rows) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['harga_denda']; ?></td>
                  <td><?php echo $rows['stat']; ?></td>
                  <td><?php echo $rows['tgl_tetap']; ?></td>
                  <td>
               <a href="<?php echo base_url(); ?>denda/edit_denda/<?php echo $rows['id_biaya_denda'] ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
                  </td>
                <?php $no++ ?>
              <?php } ?>
              </table>
            </div>


