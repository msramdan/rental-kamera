
<div class="box-header with-border">
              <h3 class="box-title">Edit kategori</h3>
            </div>
            <form action="<?php echo base_url(); ?>kategori/simpan_edit_data/<?php echo $data_kategori['id_kategori']; ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama kategori</label>
                  <input type="hidden" name="id" value="<?php echo $data_kategori['id_kategori']; ?>">
                  <input type="text" class="form-control" name="nama_kategori" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_kategori['nama_kategori']; ?>">
                </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
