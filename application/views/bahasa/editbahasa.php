
<div class="box-header with-border">
              <h3 class="box-title">Edit Bahasa</h3>
            </div>
            <form action="<?php echo base_url(); ?>bahasa/simpan_edit_data/<?php echo $data_bahasa['bahasa_id']; ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Bahasa</label>
                  <input type="hidden" name="id" value="<?php echo $data_bahasa['bahasa_id']; ?>">
                  <input type="text" class="form-control" name="bahasa" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_bahasa['nama']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Alternatif Bahasa</label>
                  <input type="text" class="form-control" name="alt" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_bahasa['nama_alt'] ?>">
                </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
