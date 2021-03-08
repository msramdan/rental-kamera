
<div class="box-header with-border">
  <h3 class="box-title">Tambah Pinjam</h3>
</div>
  <form action="<?php echo base_url(); ?>transaksi/prosespinjam" method="post" enctype="multipart/form-data" role="form">
    <div class="box-body">
      <div class="form-group" style="background: yellowgreen">
        <h3>Data Transaksi</h3>
      </div>
      <div class="form-group">
        <label for="nopinjam">No Peminjaman</label>
        <input type="" class="form-control" name="nopinjam" id="nopinjam" required="" value="<?= $kodeunik; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="tgl">Tanggal Pinjam</label>
        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="ex.Bahasa"  required="">
      </div>
      <div class="form-group">
        <label for="ina">ID Anggota</label>
          <div class="input-group">
            <input type="text" class="form-control" required autocomplete="off" name="anggota_id" id="search-box" placeholder="Contoh ID Anggota : AG0001" type="text" value="">
            <span class="input-group-btn">
              <a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
            </span>
          </div>
      </div>
       <div class="form-group">
        <label for="ina">Biodata</label>
          <div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
          <div id="result"></div>
      </div>
      <div class="form-group">
        <label for="lama">Lama Minjam</label>
        <input type="number" class="form-control" name="lama" id="lama" placeholder="Lama Pinjam Contoh : 2 Hari (2)"  required="">
      </div>

        <div class="form-group" style="background: yellowgreen">
        <h3>Pinjam Buku</h3>
      </div>
        <div class="form-group">
        <label for="buku_id">Kode Buku</label>
          <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" name="buku_id" id="buku-search" placeholder="Contoh ID Buku : BK001" type="text" value="">
                        <span class="input-group-btn">
                          <a data-toggle="modal" data-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
                        </span>
                      </div>
                    </div>
       <div class="form-group">
        <label for="ina">Data Buku</label>
          <div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
          <div id="result_buku"></div>
      </div>
    </div>
    <div class="box-footer">
      <div class="pull-right">
              <input type="hidden" name="tambah" value="tambah">
              <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    
              <a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
            </div>
    </div>
  </form>



  <!-- start Modal Anggota -->
  <div class="modal fade" id="TableAnggota">
  <div class="modal-dialog" style="width:80%;">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Daftar Anggota</h4>
  </div>
  <div id="modal_body" class="modal-body fileSelection1">
  <div class="box-body" style="overflow-x: scroll; ">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Anggota</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;foreach($user as $isi){
      if($isi['level'] == 'U'){ ?>
      <tr>
        <td><?= $no;?></td>
        <td><?= $isi['anggota_id'];?></td>
        <td><?= $isi['nama'];?></td>
        <td><?= $isi['telepon'];?></td>
        <td><?= $isi['email'];?></td>
        <td style="width:20%;">
          <button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['anggota_id'];?>">
          <i class="fa fa-check"> </i> Pilih
          </button>
        </td>
      </tr>
    <?php $no++;}}?>
   
    </table>
  </div>
</div>
  <div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
    <!-- End Modal Anggota -->

  <script>
  $(".fileSelection1 #Select_File1").click(function (e) {
    document.getElementsByName('anggota_id')[0].value = $(this).attr("data_id");
    $('#TableAnggota').modal('hide');
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('transaksi/result');?>",
      data:'kode_anggota='+$(this).attr("data_id"),
      beforeSend: function(){
        $("#result").html("");
        $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
      },
      success: function(html){
        $("#result").html(html);
        $("#result_tunggu").html('');
      }
    });
  });
  </script>
    <script>
  // AJAX call for autocomplete 
  $(document).ready(function(){
    $("#search-box").keyup(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('transaksi/result');?>",
        data:'kode_anggota='+$(this).val(),
        beforeSend: function(){
          $("#result").html("");
          $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
        },
        success: function(html){
          $("#result").html(html);
          $("#result_tunggu").html('');
        }
      });
    });
  });
  </script>

  <!-- MOdal Buku -->
<div class="modal fade" id="TableBuku">
<div class="modal-dialog" style="width:80%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Buku</h4>
</div>
<div id="modal_body" class="modal-body fileSelection1">
<table id="example3" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>kode Buku</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Penerbit</th>
        <th>Tahun Buku</th>
        <th>Stok Buku</th>
        <th>Tanggal Masuk</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1;foreach($buku->result_array() as $isi){?>
      <tr>
        <td><?= $no;?></td>
        <td><?= $isi['buku_id'];?></td>
        <td><?= $isi['isbn'];?></td>
        <td><?= $isi['title'];?></td>
        <td><?= $isi['penerbit'];?></td>
        <td><?= $isi['thn_buku'];?></td>
        <td><?= $isi['jml'];?></td>
        <td><?= $isi['tgl_masuk'];?></td>
        <td style="width:17%">
        <button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['buku_id'];?>">
          <i class="fa fa-check"> </i> Pilih
        </button>
        <a href="<?php echo base_url(); ?>buku/view_buku/<?php echo $isi['id_buku']; ?>" target="_blank">
          <button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
        </td>
      </tr>
    <?php $no++;}?>
    </tbody>
  </table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
  $(".fileSelection1 #Select_File2").click(function (e) {
    document.getElementsByName('buku_id')[0].value = $(this).attr("data_id");
    $('#TableBuku').modal('hide');
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('transaksi/buku');?>",
      data:'kode_buku='+$(this).attr("data_id"),
      beforeSend: function(){
        $("#result_buku").html("");
        $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
      },
      success: function(html){
        $("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
        $("#result_tunggu_buku").html('');
      }
    });
  });
  </script>
    
  <script>
  // AJAX call for autocomplete 
  $(document).ready(function(){
    $("#buku-search").keyup(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('transaksi/buku');?>",
        data:'kode_buku='+$(this).val(),
        beforeSend: function(){
          $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
        },
        success: function(html){
          $("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
          $("#result_tunggu_buku").html('');
        }
      });
    });
  });
  </script>
