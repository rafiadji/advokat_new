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
					<li class="breadcrumb-item active">Tambah Klien</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form role="form" action="<?php echo site_url('admin/tambahKlienSubmit') ?>" method="post" enctype="multipart/form-data">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tambah Klien</h3>

				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nomor KTP Klien</label>
					<input type="text" class="form-control" name="ktp" placeholder="Nomor KTP Klien">
				</div>
				<div class="form-group">
					<label>Nama Klien </label>
					<input type="text" class="form-control" name="nama_klien" placeholder="Nama Lengkap Klien">
				</div>
				<div class="form-group"> <label>Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option value="p">Perempuan</option>
						<option value="l">Laki - Laki</option>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" class="form-control" name="alamat" placeholder="Alamat Pribadi Klien">
				</div>
				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan Klien">
				</div>
				<div class="form-group">
					<label>Nomor SIUP / NPWP Perusahaan</label>
					<input type="text" class="form-control" name="no_siupperusahaan" placeholder="Nomor SIUP / NPWP Perusahaan Klien">
				</div>
				<div class="form-group">
					<label>Alamat Perusahaan</label>
					<input type="text" class="form-control" name="alm_perusahaan" placeholder="Alamat Perusahaan">
				</div>
				<div class="form-group">
					<label>Email Klien</label>
					<input type="text" class="form-control" name="email_klien" placeholder="Email Klien">
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
		</div>
	</form>
</section>