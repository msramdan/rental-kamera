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
                text-align: left;
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

	<table id="table" style="margin-top:10px;" class="table-sm">
			<tr>
			<th>No</th>
				<th>Kode Sewa</th>
				<th>Member</th>
				<th>Grand Total</th>
				<th>Tanggal Request</th>
				<th>Tanggal Sewa</th>
				<th>User Approved</th>
				<th>Status Pengembalian</th>
				<th>Item Disewa</th>
			</tr>
			<?php $loop = 1;
			$denda = $this->db->query("SELECT * FROM tbl_biaya_denda WHERE id_biaya_denda  = 1");
			$dataDenda = $denda->row();
			$valueDenda = $dataDenda->harga_denda;
			?>
			<?php foreach ($transaksi as $rows) { ?>
				<tr>
					<td style="width: 5%;"><?php echo $loop; ?></td>
					<td style="width: 5%;"><?php echo $rows['kode_sewa']; ?></td>
					<td style="width: 10%;"><?php echo $rows['nama_member']; ?></td>
					<td style="width: 10%;"><?php echo rupiah($rows['grand_total']); ?></td>
					<td style="width: 10%;"> <?php echo $rows['tanggal_req']; ?></td>
					<td style="width: 10%;"><?php echo $rows['tanggal_sewa']; ?></td>
					<td style="width: 10%;"><?php echo $rows['username']; ?></td><?php
					$sewa_id = $rows['sewa_id'];
					$cekJml = $this->db->query("SELECT * from tbl_sewa_detail where tanggal_kembali IS null and sewa_id='$sewa_id'")->num_rows();
					?>
					<?php if ($rows['tanggal_sewa'] == '' || $rows['tanggal_sewa'] == null) { ?>
						<td style="width: 20%;"></td>
					<?php } else { ?>
						<?php if ($cekJml > 0) { ?>
							<td style="width: 20%;">Ada <?= $cekJml ?> Barang Belum dikembalikan</td>
						<?php } else { ?>
							<td style="width: 20%;">Semua barang sudah dikembalikan</td>
						<?php } ?>
					<?php } ?>
					<td>
						<?php
						$sewa_id = $rows['sewa_id'];
						$no =1;
						$detail = $this->db->query("Select *,tbl_kamera.nama_kamera from tbl_sewa_detail join tbl_kamera on tbl_kamera.id_kamera = tbl_sewa_detail.kamera_id where sewa_id='$sewa_id'")->result();
						foreach ($detail as $value) {
							echo '<pre>' .$no ++.'. ' .$value->nama_kamera. '<br>Lama Sewa : '.$value->lama_sewa.' Hari
							<br>Harga/hari : '.rupiah($value->harga).'
							<br>Sub Total : '.rupiah($value->total).'
							</pre>';
						}
						?>
					</td>
				</tr>
				<?php $loop++ ?>
			<?php } ?>
	

