
<div class="box-header with-border">
              <h3 class="box-title">Edit Harga Denda</h3>
            </div>
            <form action="<?php echo base_url(); ?>denda/simpan_edit_data/<?php echo $data_denda['id_biaya_denda']; ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga Denda</label>
                  <input type="text" class="form-control" name="harga_denda" id="exampleInputtext1" placeholder=""  required="" value="<?= $data_denda['harga_denda']; ?>">
                </div>

                 <div>
                  <td>
                    <label for="exampleInputEmail1">Status Denda</label>
                     <select class="form-control" name="stat">
                                <?php $is_aktive = $data_denda['stat'] ?>
                                <?php if ($is_aktive=='Aktive') { ?>
                                  <option value="Aktive" selected>Aktive</option>
                                  <option value="Non Aktive">Non Aktive</option>
                                <?php }else {?>
                                  <option value="Aktive">Aktive</option>
                                  <option value="Non Aktive" selected="">Non Aktive</option>
                                <?php } ?>
                    </select>
                  </td>
                </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn"><i class="fa fa-paper-plane"></i>Save</button>
              </div>
            </form>
