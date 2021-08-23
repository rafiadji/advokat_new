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
					<li class="breadcrumb-item active">Ubah Data Klien</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form role="form" action="<?php echo site_url('admin/ubahKlienSubmit/' . $klien->id_klien) ?>" method="post" enctype="multipart/form-data">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Ubah Data Klien</h3>

				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nomor KTP </label>
					<input type="text" class="form-control" name="no_ktp" value="<?php echo $klien->ktp ?>">
				</div>
				<div class="form-group">
					<label>Nama Klien</label>
					<input type="text" class="form-control" name="nama" value="<?php echo $klien->nama_klien ?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<input type="text" class="form-control" name="jk" value="<?php echo $klien->jk ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" value="<?php echo $klien->tgl_lahir ?>">
				</div>
				<div class="form-group">
					<label>Alamat </label>
					<input type="text" class="form-control" name="alamat" value="<?php echo $klien->alamat ?>">
				</div>
				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $klien->nama_perusahaan ?>">
				</div>
				<div class="form-group">
					<label>No. SIUP/NPWP</label>
					<input type="text" class="form-control" name="siup_npwp" value="<?php echo $klien->siup_npwp ?>">
				</div>
				<div class="form-group">
					<label>Alamat Perusahaan</label>
					<input type="text" class="form-control" name="alamat_perusahaan" value="<?php echo $klien->alamat_perusahaan ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" value="<?php echo $klien->email_klien ?>">
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
		</div>
	</form>
</section>