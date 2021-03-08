
<div class="box-header with-border">
              <h3 class="box-title">Edit kategori</h3>
            </div>
            <form action="<?php echo base_url(); ?>buku/simpan_edit_data/<?php echo $data_buku['id_buku']; ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Buku ID</label>
                  <input readonly="" type="text" class="form-control" name="buku_id" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['buku_id']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['title']; ?>">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">ISBN</label>
                  <input type="text" class="form-control" name="isbn" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['isbn']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Penerbit</label>
                  <input type="text" class="form-control" name="penerbit" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['penerbit']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pengarang</label>
                  <input type="text" class="form-control" name="pengarang" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['pengarang']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun Buku</label>
                  <input type="text" class="form-control" name="thn_buku" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['thn_buku']; ?>">
                </div>

                <div class="form-group">
                  <label>Kategori Buku</label>
                  <select class="form-control" name="id_kategori">
                      <?php foreach ($kategori as $rows) { ?>
                      <?php if ($data_buku['nama_kategori']==$rows['nama_kategori']) { ?>
                        <option value="<?php echo $rows['id_kategori'] ?>" selected><?php echo $rows['nama_kategori']; ?></option>
                      <?php }else{ ?>
                        <option value="<?php echo $rows['id_kategori']?>"><?php echo $rows['nama_kategori'] ?></option>      
                      <?php } ?>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                  <label>Rak Buku</label>
                  <select class="form-control" name="id_rak">
                      <?php foreach ($rak as $rows) { ?>
                      <?php if ($data_buku['nama_rak']==$rows['nama_rak']) { ?>
                        <option value="<?php echo $rows['id_rak'] ?>" selected><?php echo $rows['nama_rak']; ?></option>
                      <?php }else{ ?>
                        <option value="<?php echo $rows['id_rak']?>"><?php echo $rows['nama_rak'] ?></option>      
                      <?php } ?>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jumlah Buku</label>
                  <input type="text" class="form-control" name="jml" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_buku['jml']; ?>">
                </div>
                <?php if ( $data_buku['sampul']==null) { ?>
                  <label for="exampleInputEmail1">Sampul</label>
                  <input type="file" class="form-control" name="sampul" id="exampleInputtext1" required="">
                <?php }else{ ?>
                  <div class="form-group">
                  <img width="200" height="200" src="<?php echo base_url();?>assets/admin/dist/img/buku/<?= $data_buku['sampul'] ?>">
                  <input type="hidden" name="gambar_lama" value="<?php echo $data_buku['sampul'] ?>">
                  <input type="file" class="form-control" name="sampul" id="exampleInputtext1">
                  <p class="help-block" style="color: #FF0000;">*Pilih sampul Jika Ingin Merubah sampul buku</p>
                </div >
                <?php } ?>
              </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
