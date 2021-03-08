<div class="box-header with-border">
              <h3 class="box-title">Tambah Buku</h3>
            </div>
            <form action="<?php echo base_url(); ?>buku/SimpanData" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Buku ID</label>
                  <input type="" class="form-control" name="buku_id" id="exampleInputtext1" required="" value="<?= $kodeunik; ?>" readonly>
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputtext1" placeholder=""  required="">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">ISBN</label>
                  <input type="text" class="form-control" name="isbn" id="exampleInputtext1" placeholder=""  required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Penerbit</label>
                  <input type="text" class="form-control" name="penerbit" id="exampleInputtext1" placeholder=""  required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pengarang</label>
                  <input type="text" class="form-control" name="pengarang" id="exampleInputtext1" placeholder=""  required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun Buku</label>
                  <input type="text" class="form-control" name="thn_buku" id="exampleInputtext1" placeholder=""  required="">
                </div>
                 <div class="form-group">
                  <label>Kategori Buku</label>
                  <select class="form-control" name="id_kategori" required="" >
                      <option value=''>-- Pilih --</option>
                    <?php foreach ($kategori as $rows) { ?>
                      <option value="<?php echo $rows['id_kategori']?>"><?php echo $rows['nama_kategori'] ?></option>         
                    <?php } ?>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Rak Buku</label>
                  <select class="form-control" name="id_rak" required="" >
                      <option value=''>-- Pilih --</option>
                    <?php foreach ($rak as $rows) { ?>
                      <option value="<?php echo $rows['id_rak']?>"><?php echo $rows['nama_rak'] ?></option>         
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jumlah Buku</label>
                  <input type="text" class="form-control" name="jml" id="exampleInputtext1" placeholder=""  required="">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Sampul</label>
                  <input type="file" class="form-control" name="sampul" id="exampleInputtext1" required="">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
            