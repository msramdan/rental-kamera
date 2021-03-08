<div class="box-header with-border">
              <h3 class="box-title">Tambah kategori</h3>
            </div>
            <form action="<?php echo base_url(); ?>kategori/SimpanData" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" id="exampleInputtext1" placeholder=""  required="">
                </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
            