<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo $this->template->page->title; ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo site_url('admin') ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo site_url('admin/perkara') ?>"><?php echo $this->template->page->title; ?></a></li>
					<li class="breadcrumb-item active">DETAIL DATA KARYAWAN</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form class="" method="post" action="<?php echo site_url('admin/ubahKaryawanSubmit/' . $karyawan->id_karyawan) ?>" style="opacity:1;">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">DETAIL DATA KARYAWAN</h3>

				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<div class="form-group"> <label class="">Nomor Induk Advokat</label>
					<input type="number" name="no_induk_advokat" class="form-control" placeholder="Nomor Induk Anggota Advokat" value="<?php echo $karyawan->no_induk_advokat ?>" disabled>
				</div>
				<div class="form-group"> <label class="">Nomor KTP</label>
					<input type="text" name="ktp" class="form-control" placeholder="Nomor KTP" value="<?php echo $karyawan->no_ktp ?>" disabled>
				</div>
				<div class="form-group"> <label class="">Nama Lengkap</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $karyawan->nama ?>">
				</div>
				<div class="form-group"> <label>Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $karyawan->tgl_lahir ?>">
				</div>
				<div class="form-group"> <label>Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option value="P">Perempuan</option>
						<option value="L">Laki-laki</option>
					</select>
				</div>
				<div class="form-group"> <label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $karyawan->alamat ?>">
				</div>
				<div class="form-group"> <label>Username</label>
					<input type="text" name="uname" class="form-control" placeholder="Username" value="<?php echo $karyawan->username ?>">
				</div>
				<div class="form-group"> <label>Password</label>
					<input type="text" name="pass" class="form-control" placeholder="Password" value="<?php echo $karyawan->password ?>">
				</div>
				<div class="form-group"> <label>Jabatan</label>
					<select class="form-control" name="jabatan" disabled="">
						<option value="ADM">Admin</option>
						<option value="ADV">Advokat</option>
						<option value="K">Ketua</option>
					</select>
				</div>
				<div class="form-group"> <label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-phone"></i></span>
						</div>
						<input type="number" class="form-control" value="<?php echo $karyawan->telepon ?>">
					</div>
				</div>
				<div class="form-group"> <label>Spesialis</label>
					<select class="form-control" name="spesialis">
						<option value="PDT">Perdata</option>
						<option value="PDN">Pidana</option>
						<option value="PDTN">Perdata & Pidana</option>
					</select>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
		</div>
	</form>
</section>