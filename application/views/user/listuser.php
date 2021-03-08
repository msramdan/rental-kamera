<?php
if ($this->session->userdata('level')=='A') { ?>
<div class="box-body" style="overflow-x: scroll; ">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <a href="<?php echo base_url(); ?>user/adddata" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah User</a>
                <tr>
                  <th>No</th>
                  <th>Anggota ID</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email User</th>
                  <th>No Telepon</th>
                  <th>Level</th>
                  <th>Status User</th>
                  <th>Photo User</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($user as $rows) { ?>
               
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['anggota_id']; ?></td>
                  <td><?php echo $rows['username']; ?></td>
                  <td><?php echo $rows['nama']; ?> </td>
                  <td><?php echo $rows['email']; ?> </td>
                  <td><?php echo $rows['telepon']; ?> </td>
                  <?php if ($rows['level']=='A') { ?>
                   <td><?php echo "Admin";?></td>
                  <?php } else if($rows['level']=='U'){?>
                    <td><?php echo "User";?></td>
                  <?php } else if($rows['level']=='S'){?>
                    <td><?php echo "Super User";?></td>
                  <?php }else{?>
                    <td><?php echo "Atasan";?></td>
                  <?php } ?>
                  <?php if($rows['is_aktive']=='1'){ ?>
                      <td><?php echo "Aktive"; ?></td>
                  <?php }else{ ?>
                      <td><?php echo "Non Aktive"; ?></td>
                  <?php } ?>
                  <td>
                    <?php if ($rows['img_user'] == null) { ?>
                      <p>No File</p>
                    <?php }else{ ?>
                    <a href="<?php echo base_url().'user/download/'.$rows['img_user'] ?>"><i class="ace-icon fa fa-download"></i>
                    <?php } ?>
        </a></td>
                  <td>
                    <a href="<?php echo base_url(); ?>user/edituser/<?php echo $rows['username']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>user/datahapus/<?php echo $rows['username'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ber id=<?php //ubah ?> ingin dihapus ?') "><i class="fa fa-trash"></i></a>
                    <a href="<?php echo base_url(); ?>user/cetak_kartu/<?php echo $rows['username']; ?>" target="_blank"><button class="btn btn-success btn-xs">
                    <i class="fa fa-print"></i></button></a>
                  </td>
            
             
                <?php $no++ ?>
              <?php } ?>
              </table>
              </div>
              <?php } else { ?>
          <?php redirect('error'); ?>
        <?php }?>



