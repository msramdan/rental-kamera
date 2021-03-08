<div class="alert alert-info alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <marquee direction="left" scrollamount="4" align="center" font-size="50px"><h4>Web Aplikasi Perpustakaan SMP XII Sukabumi</h4></marquee>

</div>

<!-- Script Untuk Menampilkan waktu real time -->
<center>

<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat object date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);"> 
  <center>
<h1>              
<span id="clock"></span></h1> 
</center>
<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
  echo "Minggu";
}elseif ($hari=="Monday") {
  echo "Senin";
}elseif ($hari=="Tuesday") {
  echo "Selasa";
}elseif ($hari=="Wednesday") {
  echo "Rabu";
}elseif ($hari=="Thursday") {
  echo("Kamis");
}elseif ($hari=="Friday") {
  echo "Jum'at";
}elseif ($hari=="Saturday") {
  echo "Sabtu";
}
?>,
<?php
$tgl =date('d');
echo $tgl;
$bulan =date('F');
if ($bulan=="January") {
  echo " Januari ";
}elseif ($bulan=="February") {
  echo " Februari ";
}elseif ($bulan=="March") {
  echo " Maret ";
}elseif ($bulan=="April") {
  echo " April ";
}elseif ($bulan=="May") {
  echo " Mei ";
}elseif ($bulan=="June") {
  echo " Juni ";
}elseif ($bulan=="July") {
  echo " Juli ";
}elseif ($bulan=="August") {
  echo " Agustus ";
}elseif ($bulan=="September") {
  echo " September ";
}elseif ($bulan=="October") {
  echo " Oktober ";
}elseif ($bulan=="November") {
  echo " November ";
}elseif ($bulan=="December") {
  echo " Desember ";
}
$tahun=date('Y');
echo $tahun;
?>
</center>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $count_buku;?></h3>
              <p>Data Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url() ?>buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $count_jml_buku;?></h3>
              <p>Total Jumlah Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $count_dipinjam;?></h3>
              <p>Total Buku Dipinjam</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count_jml_buku - $count_dipinjam; ?></h3>
              <p>Total Buku Di Rak</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>rak" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $count_pengguna;?></h3>
              <p>Data Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url() ?>user/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->

      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <section class="content">
      <div class="row">

        <div class="col-md-6" style="height: 450px">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Statistika Buku</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div><br><br>
              <div class="box-body" style="overflow-x: scroll; ">
              <div id="container"></div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">4 Transaksi Terbaru</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div><br><br>
               <div class="box-body" style="overflow-x: scroll; ">
              <table style="font-size: 12px;" id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pinjam</th>
                  <th>Nama Peminjam</th>
                  <th>Title</th>
                  <th>Tanggal Pinjam</th>
                  <th>Lama Pinjam</th>

                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($list_transaksi as $rows) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['pinjam_id'] ?></td>
                  <td><?php echo $rows['nama'] ?></td>
                  <td><?php echo $rows['title'] ?></td>
                  <td><?php echo $rows['tgl_pinjam'] ?></td>
                  <td><?php echo $rows['lama_pinjam'] ?></td>
                  
                </tr>
                <?php $no++ ?>
              <?php } ?> 
              </table>
             
            </div>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
          <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">4 Pengguna Terbaru</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div><br><br>
               <div class="box-body" style="overflow-x: scroll; ">
              <table style="font-size: 12px;" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Anggota ID</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telepon</th>

                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($list_pengguna as $rows) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['anggota_id'] ?></td>
                  <td><?php echo $rows['username'] ?></td>
                  <td><?php echo $rows['nama'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['telepon'] ?></td>
                  
                </tr>
                <?php $no++ ?>
              <?php } ?> 
              </table>
            </div>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
          <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">4 Buku Terbaru</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div><br><br>
              <div class="box-body" style="overflow-x: scroll; ">
              <table style="font-size: 12px;" id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Buku ID</th>
                  <th>TITLE</th>
                  <th>Kategori</th>
                  <th>Pengarang</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach ($list_buku as $rows) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rows['buku_id'] ?></td>
                  <td><?php echo $rows['title'] ?></td>
                  <td><?php echo $rows['nama_kategori'] ?></td>
                  <td><?php echo $rows['pengarang'] ?></td>
                  <td><?php echo $rows['jml'] ?></td>
                </tr>
                <?php $no++ ?>
              <?php } ?> 
              </table>
             
            </div>

            </div>
          </div>
          <!-- /.box -->

        </div>

        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>

    <script type="text/javascript">
      Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persetase Buku Di pinjam & buku di Rak'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Buku di RAK ' + <?php echo $count_jml_buku - $count_dipinjam; ?> + ' Buku' ,
            y: <?php echo $count_jml_buku - $count_dipinjam; ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Buku di Pinjam ' + <?= $count_dipinjam;?> + ' Buku',
            y: <?= $count_dipinjam;?>
        }]
    }]
});
    </script>
