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
					<li class="breadcrumb-item active">SET JADWAL KONSULTASI</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form class="" method="post" action="<?php echo site_url('admin/setkonsulSubmit/') ?>" style="opacity:1;">
    <input type="hidden" name="id_konsul" value="<?php echo $konsultasi->id_konsultasi?>">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Set Jadwal Konsultasi</h3>

				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<div class="form-group"> <label class="">Tanggal</label>
					<input type="date" name="tanggal" class="form-control" placeholder="Nomor Induk Anggota Advokat" value="<?php echo $karyawan->no_induk_advokat ?>" disabled>
				</div>
				<div class="form-group"> <label class="">Jam</label>
					<input type="time" name="jam" class="form-control" placeholder="Nomor KTP" value="<?php echo $karyawan->no_ktp ?>" disabled>
				</div>
				<div class="form-group"> <label class="">Nama Room</label>
					<input type="text" name="room" class="form-control" placeholder="Nama Lengkap" value="<?php echo $karyawan->nama ?>">
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
		</div>
	</form>
</section>