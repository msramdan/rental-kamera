<div class="alert alert-info alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<marquee direction="left" scrollamount="4" align="center" font-size="50px">
		<h4>Selamat datang di aplikasi management penyewaan kamera</h4>
	</marquee>

</div>

<!-- Script Untuk Menampilkan waktu real time -->
<center>

	<script type="text/javascript">
		//fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
		function tampilkanwaktu() {
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
			document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
		}
	</script>

	<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
		<center>
			<h1>
				<span id="clock"></span>
			</h1>
		</center>
		<?php
		$hari = date('l');
		/*$new = date('l, F d, Y', strtotime($Today));*/
		if ($hari == "Sunday") {
			echo "Minggu";
		} elseif ($hari == "Monday") {
			echo "Senin";
		} elseif ($hari == "Tuesday") {
			echo "Selasa";
		} elseif ($hari == "Wednesday") {
			echo "Rabu";
		} elseif ($hari == "Thursday") {
			echo ("Kamis");
		} elseif ($hari == "Friday") {
			echo "Jum'at";
		} elseif ($hari == "Saturday") {
			echo "Sabtu";
		}
		?>,
		<?php
		$tgl = date('d');
		echo $tgl;
		$bulan = date('F');
		if ($bulan == "January") {
			echo " Januari ";
		} elseif ($bulan == "February") {
			echo " Februari ";
		} elseif ($bulan == "March") {
			echo " Maret ";
		} elseif ($bulan == "April") {
			echo " April ";
		} elseif ($bulan == "May") {
			echo " Mei ";
		} elseif ($bulan == "June") {
			echo " Juni ";
		} elseif ($bulan == "July") {
			echo " Juli ";
		} elseif ($bulan == "August") {
			echo " Agustus ";
		} elseif ($bulan == "September") {
			echo " September ";
		} elseif ($bulan == "October") {
			echo " Oktober ";
		} elseif ($bulan == "November") {
			echo " November ";
		} elseif ($bulan == "December") {
			echo " Desember ";
		}
		$tahun = date('Y');
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
					<h3><?= $count_camera; ?></h3>
					<p>Data Barang</p>
				</div>
				<div class="icon">
					<i class="fa fa-camera"></i>
				</div>
				<a href="<?php echo base_url() ?>kamera" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $count_kategori; ?></h3>
					<p>Data Kategori Kamera</p>
				</div>
				<div class="icon">
					<i class="fa fa-list"></i>
				</div>
				<a href="<?php echo base_url() ?>kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?php echo $count_member ?></h3>
					<p>Data Member</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="<?php echo base_url() ?>member" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?= $count_pengguna; ?></h3>
					<p>Data User</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<?php if ($this->session->userdata('level') == 'A') { ?>
					<a href="<?php echo base_url() ?>user/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				<?php }else{ ?>
					<a href="#" class="small-box-footer">Only For Admin <i class="fa fa-arrow-circle-right"></i></a>
				<?php } ?>

				
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Status Penyewaan Barang</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div><br><br>
					<div class="box-body" style="overflow-x: scroll; ">
						<script src="https://code.highcharts.com/highcharts.js"></script>
						<script src="https://code.highcharts.com/modules/exporting.js"></script>
						<script src="https://code.highcharts.com/modules/export-data.js"></script>
						<script src="https://code.highcharts.com/modules/accessibility.js"></script>
						<figure class="highcharts-figure">
							<div id="container"></div>
						</figure>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">10 Transaksi Penyewaan Terbaru</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div><br><br>
					<div class="box-body" style="overflow-x: scroll; ">
						<table style="font-size: 12px;" id="example3" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Sewa</th>
									<th>Nama Penyewa</th>
									<th>Tanggal Sewa</th>
								</tr>
							</thead>
							<?php $no = 1; ?>
							<?php $data = $this->db->query("SELECT * From tbl_sewa join tbl_member on tbl_member.member_id = tbl_sewa.member_id order BY sewa_id desc limit 10")->result() ?>
							<tbody>

							<?php foreach ($data as $value) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $value->kode_sewa ?></td>
									<td><?php echo $value->nama_member ?></td>
									<td><?php echo $value->tanggal_sewa ?></th>
								</tr>
							<?php } ?>
								
							</tbody>
						</table>

					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<?php 
// total all
$query=$this->db->query('SELECT * FROM tbl_sewa');
$totalAll = $query->num_rows();


// total belum
$query=$this->db->query('SELECT * FROM tbl_sewa where tanggal_kembali Is null');
$totalBelum = $query->num_rows();
if ($totalAll !=0){
	$persentaseBelum = (0 /  0) * 100;
}else{
	$persentaseBelum=0;
}

// total Sudah
$query=$this->db->query('SELECT * FROM tbl_sewa where tanggal_kembali Is NOT null');
$totalSudah= $query->num_rows();

if ($totalAll !=0){
	$persentaseSudah = (0 /  0) *100;
}else{
	$persentaseSudah=0;
}
?>

<script>
	// Radialize the colors
	Highcharts.setOptions({
		colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
			return {
				radialGradient: {
					cx: 0.5,
					cy: 0.3,
					r: 0.7
				},
				stops: [
					[0, color],
					[1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
				]
			};
		})
	});

	// Build the chart
	Highcharts.chart('container', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Sudah Di Kembalikan Vs Belum Di Kembalikan'
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
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					connectorColor: 'silver'
				}
			}
		},
		series: [{
			name: 'Share',
			data: [{
					name: 'Sudah Di Kembalikan',
					y: <?= $persentaseSudah ?>
				},
				{
					name: 'Belum Di Kembalikan',
					y: <?= $persentaseBelum ?>
				}
			]
		}]
	});
</script>
