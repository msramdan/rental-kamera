<!DOCTYPE html>
 <html><head>
    <title>Laporan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
            #table {
                font-family: sans-serif;
                border-collapse: collapse;
                width: 100%;
                font-size: 12px;
                text-align: center;
                /* line-height: 10px */
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 4px;
            }
            #table th {
                padding-top: 5px;
                padding-bottom: 5px;
                text-align: left;
                background-color: #fff;
                color: black;
                text-align: left;
            }

        </style>
</head><body >
	<center>
		<h3>Laporan Transaksi Penyewaan Kamera </h3>
		<br><br>
		<hr >
	</center>

	<table id="table" style="margin-top:10px;">
			<tr>
				<th>No</th>
				<th>Kode Sewa</th>
				<th>Member</th>
				<th>Tanggal Sewa</th>
				<th>Lama Sewa</th>
				<th>Tanggal di Kembali</th>
				<th>Status Pengembelian</th>
				<th><span style="color: red;">Keterlambatan</span> </th>
				<th><span style="color: red;">Denda</span> </th>
			</tr>
			<?php $no = 1;
			$denda = $this->db->query("SELECT * FROM tbl_biaya_denda WHERE id_biaya_denda  = 1");
			$dataDenda = $denda->row();
			$valueDenda = $dataDenda->harga_denda;
			?>
			<?php foreach ($transaksi as $rows) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $rows['kode_sewa']; ?></td>
					<td><?php echo $rows['nama_member']; ?></td>
					<!-- tanggal seharus nya di kembalikan -->

					<?php
					$tgl1    = $rows['tanggal_sewa'];
					$lama = $rows['lama_sewa'];
					$x = '+' . $lama . ' days';
					$tanggalHarusKembali    = date('Y-m-d', strtotime($x, strtotime($tgl1)));
					?>
					<td><?php echo $rows['tanggal_sewa']; ?> s.d <span style="color: red;"><?= $tanggalHarusKembali ?></span> </td>
					<td><?php echo $rows['lama_sewa']; ?> Hari</td>

					<?php if ($rows['tanggal_kembali'] == null) { ?>
						<td>-</td>
						<td>Belum Di Kembalikan</td>
					<?php } else { ?>
						<td><?php echo $rows['tanggal_kembali']; ?></td>
						<td>Sudah Di Kembalikan</td>
					<?php } ?>

					<!-- <td><?php echo $rows['total']; ?></td>
					<td><?php echo $rows['diskon']; ?></td>
					<td><?php echo $rows['grand_total']; ?></td> -->

					<?php
					$dateNow = date('Y-m-d');
					$cek = $tanggalHarusKembali < $dateNow;

					if ($rows['tanggal_kembali'] == null && $tanggalHarusKembali < $dateNow) { ?>
						<!-- belum di kembalikan sampai today -->
						<!-- hitang keterlambatan dan denda -->
						<?php
						$tgl1 = strtotime($tanggalHarusKembali);
						$tgl2 = strtotime($dateNow);
						$jarak = $tgl2 - $tgl1;
						$keterlambatanHari = $jarak / 60 / 60 / 24;
						?>
						<td><?= $keterlambatanHari ?> Hari</td>
						<td><?= $keterlambatanHari * $valueDenda  ?></td>
					<?php } else if ($rows['tanggal_kembali'] != null && $tanggalHarusKembali < $rows['tanggal_kembali']) { ?>
						<!-- sudah di kembalikan tapi terlambat -->
						<?php
						$tgl1 = strtotime($tanggalHarusKembali);
						$tgl2 = strtotime($rows['tanggal_kembali']);
						$jarak = $tgl2 - $tgl1;
						$keterlambatanHari = $jarak / 60 / 60 / 24;
						?>
						<td><?= $keterlambatanHari ?> Hari</td>
						<td><?= $keterlambatanHari * $valueDenda  ?></td>
					<?php } else if ($rows['tanggal_kembali'] != null && $tanggalHarusKembali >= $rows['tanggal_kembali']) { ?>
						<!-- sudah di kembalikan tapi tepat waktu -->
						<td>Tidak Ada Keterlambatan</td>
						<td>Tidak Ada Denda</td>
					<?php } else { ?>
						<td>-</td>
						<td>-</td>
					<?php } ?>
				</tr>
				<?php $no++ ?>
			<?php } ?>
	

