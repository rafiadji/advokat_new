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
					<li class="breadcrumb-item active">Non - Aktifkan Perkara</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form role="form" action="<?php echo site_url('admin/nonaktifPerkaraSubmit') ?>" method="post" enctype="multipart/form-data">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Non - Aktifkan Perkara</h3>

				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara ?>">
				<div class="form-group"> <label>Status Perkara</label>
					<select class="form-control" name="status">
						<option value="aktif">AKTIF</option>
						<option value="nonaktif">NON-AKTIF</option>
					</select>
				</div>
				<div class="form-group"> <label>Keterangan</label>
					<textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
		</div>
	</form>
</section>