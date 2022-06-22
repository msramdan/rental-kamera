<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class="active">Setting Akun</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>


<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3 sidebar">
				<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head" style="background-color: #5A98BF; border:white"><i class="icon fa fa-align-justify fa-fw"></i> <span style="color: white">Data Akun</span>
					</div>
					<nav class="yamm megamenu-horizontal" role="navigation">
						<ul class="nav">
							<li class="menu-item">
								<a href="<?= base_url() ?>web/akun">PROFILE</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-9">

				<form action="<?= base_url() ?>web/updateAKun" method="POST" >
					<div class="search-result-container ">
						<div id="myTabContent" class="tab-content category-list">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control " id="username" name="username" placeholder="Username" value="<?php echo $data_member['username'] ?>">
							</div>

							<div class="form-group">
								<label for="ktp">NIK KTP</label>
								<input type="text" class="form-control " id="ktp" name="ktp" placeholder="NIK KTP" value="<?php echo $data_member['ktp'] ?>">
							</div>

							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control " id="nama_member" name="nama_member" placeholder="Nama Lengkap" value="<?php echo $data_member['nama_member'] ?>">
							</div>
							<div class="form-group">
								<label for="jk_kelamin">Jenis Kelamin</label>
								<select class="form-control " name="jk_kelamin">
									<option value="">-- Pilih --</option>
									<option value="Laki-Laki" <?= $data_member['jk_kelamin'] == 'Laki-Laki' ? 'selected' : 'null' ?>>Laki-Laki</option>
									<option value="Perempuan" <?= $data_member['jk_kelamin'] == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="no_hp">No Telpon</label>
								<input type="text" class="form-control " id="no_hp" name="no_hp" placeholder="No Telpon" value="<?php echo $data_member['no_hp'] ?>">
							</div>

							<div class="form-group">
								<label for="no_hp">Alamat</label>
								<textarea name="alamat" id="alamat" class="form-control " cols="20" rows="5"><?php echo $data_member['alamat'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<span style="color: red">*kosongkan jika tidak ingin merubah password</span>
							</div>
							<button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-floppy-save"></i> UPDATE</button>
				</form>
			</div>
			<div class="clearfix">
			</div>
		</div>
		</form>

	</div>
</div>

</div>
</div>
