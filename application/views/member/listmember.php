
	<div class="box-body" style="overflow-x: scroll; ">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<a href="<?php echo base_url(); ?>member/adddata" class="btn btn-primary" style="margin-bottom:20px; "><i class="fa fa-plus"></i>Tambah Member</a>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>No KTP</th>
					<th>Nama Member</th>
					<th>Jenis Kelamin</th>
					<th>No HP</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($member as $rows) { ?>

					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rows['username']; ?></td>
						<td><?php echo $rows['ktp']; ?></td>
						<td><?php echo $rows['nama_member']; ?> </td>
						<td><?php echo $rows['jk_kelamin']; ?> </td>
						<td><?php echo $rows['no_hp']; ?> </td>
						<td><?php echo $rows['alamat']; ?> </td>
						<td>
							<a href="<?php echo base_url(); ?>member/editmember/<?php echo $rows['member_id']; ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
							<a onClick="javascript: return confirm('Are you sure to Delete Data');" href="<?php echo base_url(); ?>member/datahapus/<?php echo $rows['member_id'] ?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('apakah anda yakin data ingin dihapus ?') "><i class="fa fa-trash"></i></a>
			
						</td>


						<?php $no++ ?>
					<?php } ?>
		</table>
	</div>
