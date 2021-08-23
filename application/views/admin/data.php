<!-- BeginCSS -->
<?php
$this->template->stylesheet->add('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
$this->template->stylesheet->add('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
?>
<!-- EndCSS -->

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo $this->template->page->title; ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo site_url('admin') ?>">Dashboard</a></li>
					<li class="breadcrumb-item active"><?php echo $this->template->page->title; ?></li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card card-tabs">
		<h3 class="card-title">1. Surat Kuasa</h3>
		<div class="card-header p-0 pt-1 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="nonlitigasi-tab" data-toggle="pill" href="#nonlitigasi" role="tab" aria-controls="tab-nonlitigasi" aria-selected="true">Non - Litigasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="litigasi-tab" data-toggle="pill" href="#litigasi" role="tab" aria-controls="tab-litigasi" aria-selected="false">Litigasi</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="custom-tabs-three-tabContent">
				<div class="tab-pane fade show active" id="nonlitigasi" role="tabpanel" aria-labelledby="nonlitigasi-tab">
					<b>Surat Kuasa Non - Litigasi</b>
					<form class="" method="post" action="<?php echo site_url('admin/skNonLitigasiSubmit') ?>" style="opacity:1;">
						<div class="card-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Jenis Surat Kuasa</label>
								<input type="text" name="jenis_skNon" class="form-control" disabled value="Non - Litigasi">
							</div>
							<div class="form-group"> <label>File</label>
								<input type="file" class="form-control" name="surat_kuasa">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<div class="tab-pane fade" id="litigasi" role="tabpanel" aria-labelledby="litigasi-tab">
					<b>Surat Kuasa Litigasi</b>
					<form class="" method="post" action="<?php echo site_url('admin/skLitigasiSubmit') ?>" style="opacity:1;">
						<div class="card-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Jenis Surat Kuasa</label>
								<input type="text" name="jenis_skLit" class="form-control" disabled value="Litigasi">
							</div>
							<div class="form-group"> <label>File</label>
								<input type="file" class="form-control" name="surat_kuasa">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">1. Surat Kuasa</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped table-responsive datatable">
				<thead>
					<tr>
						<th>ID Perkara</th>
						<th>Judul</th>
						<th>Nama Klien</th>
						<th>ID Karyawan</th>
						<th>Nama Karyawan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tim as $t) : ?>
						<tr>
							<td><?php echo $t->id_perkara ?></td>
							<td><?php echo $t->judul ?></td>
							<td><?php echo $t->nama_klien ?></td>
							<td><?php echo $t->id_karyawan ?></td>
							<td><?php echo $t->nama ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- BeginJS -->
<?php
$this->template->javascript->add('assets/plugins/datatables/jquery.dataTables.min.js');
$this->template->javascript->add('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
$this->template->javascript->add('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');
$this->template->javascript->add('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
?>
<!-- EndJS -->
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Pengelolaan Perkara</h2>
		<!-- Custom Tabs -->
		<!-- SURAT KUASA -->
		<div class="nav-tabs-custom">
			<div class="box-header with-border">
				<h3 class="box-title">1. Surat Kuasa</h3>
			</div>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Non - Litigasi</a></li>
				<li><a href="#tab_2" data-toggle="tab">Litigasi</a></li>
			</ul>
			<!-- SURAT KUASA NON LITIGASI -->
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<b>Surat Kuasa Non - Litigasi</b>

					<form class="" method="post" action="<?php echo site_url('admin/skNonLitigasiSubmit') ?>" style="opacity:1;">
						<div class="box-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Jenis Surat Kuasa</label>
								<input type="text" name="jenis_skNon" class="form-control" disabled value="Non - Litigasi">
							</div>
							<div class="form-group"> <label>File</label>
								<input type="file" class="form-control" name="surat_kuasa">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<!-- AKHIR SURAT KUASA NON LITIGASI -->
				<!-- /.tab-pane -->

				<!-- SURAT KUASA LITIGASI -->
				<div class="tab-pane" id="tab_2">
					<b>Surat Kuasa Litigasi</b>

					<form class="" method="post" action="<?php echo site_url('admin/skLitigasiSubmit') ?>" style="opacity:1;">
						<div class="box-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Jenis Surat Kuasa</label>
								<input type="text" name="jenis_skLit" class="form-control" disabled value="Litigasi">
							</div>
							<div class="form-group"> <label>File</label>
								<input type="file" class="form-control" name="surat_kuasa">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<!-- AKHIR SURAT KUASA LITIGASI -->
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
		<!-- nav-tabs-custom -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">2. Somasi</h3>
			</div>
			<form class="" method="post" action="<?php echo site_url('ketua/buatTimAdvokatSubmit') ?>" style="opacity:1;">
				<div class="box-body">
					<div class="form-group"> <label>ID Perkara</label>
						<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
					</div>
					<div class="form-group"> <label>Tanggal Terbit Surat Peringatan</label>
						<input type="date" name="tgl_terbit_surat_peringatan" class="form-control" placeholder="Tanggal Terbit Surat Peringatan">
					</div>
					<div class="form-group"> <label>File</label>
						<input type="file" class="form-control" name="surat_peringatan">
					</div>
					<div class="form-group"> <label>Tanggal Terima Surat Balasan</label>
						<input type="date" name="tgl_terima_surat_balasan" class="form-control" placeholder="Tanggal Terima Surat Balasan">
					</div>
					<div class="form-group"> <label>File</label>
						<input type="file" class="form-control" name="surat_balasan">
					</div>
					<div class="form-group"> <label>Status</label>
						<select class="form-control" name="status_somasi">
							<option value="mediasi_non_pn">Mediasi Non Pengadilan</option>
							<option value="pengadilan_negeri">Pengadilan Negeri</option>
						</select>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
			</form>
		</div>

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">3. Mediasi Pengadilan Negeri</h3>
			</div>
			<form class="" method="post" action="<?php echo site_url('ketua/buatTimAdvokatSubmit') ?>" style="opacity:1;">
				<div class="box-body">
					<div class="form-group"> <label>ID Perkara</label>
						<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
					</div>
					<div class="form-group"> <label>Status</label>
						<input type="text" name="status" class="form-control" placeholder="Status Perkara">
					</div>
					<div class="form-group"> <label>Akta Damai</label>
						<input type="file" class="form-control" name="akta_damai">
					</div>
					<div class="form-group"> <label>Keterangan</label>
						<textarea class="form-control" name="keterangan" placeholder="Keterangan Mediasi"></textarea>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
			</form>
		</div>

		<div class="nav-tabs-custom">
			<div class="box-header with-border">
				<h3 class="box-title">4. Persidangan</h3>
			</div>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Sidang 1</a></li>
				<li><a href="#tab_2" data-toggle="tab">Penugasan Sidang 1</a></li>
				<li><a href="#tab_3" data-toggle="tab">Sidang 2</a></li>
				<li><a href="#tab_4" data-toggle="tab">Penugasan Sidang 2</a></li>
				<li><a href="#tab_5" data-toggle="tab">Sidang 3</a></li>
				<li><a href="#tab_6" data-toggle="tab">Penugasan Sidang 3</a></li>
				<li><a href="#tab_7" data-toggle="tab">Sidang 4</a></li>
				<li><a href="#tab_8" data-toggle="tab">Penugasan Sidang 4</a></li>
				<li><a href="#tab_9" data-toggle="tab">Sidang 5</a></li>
				<li><a href="#tab_10" data-toggle="tab">Penugasan Sidang 5</a></li>
				<li><a href="#tab_11" data-toggle="tab">Sidang 6</a></li>
				<li><a href="#tab_12" data-toggle="tab">Penugasan Sidang 6</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<b>Sidang Ke - 1</b>

					<form class="" method="post" action="<?php echo site_url('admin/skNonLitigasiSubmit') ?>" style="opacity:1;">
						<div class="box-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Sidang Ke</label>
								<select class="form-control" name="sidang_ke">
									<option value="1">Sidang Ke-1</option>
									<option value="2">Sidang Ke-2</option>
									<option value="3">Sidang Ke-3</option>
									<option value="4">Sidang Ke-4</option>
									<option value="5">Sidang Ke-5</option>
									<option value="6">Sidang Ke-6</option>
								</select>
							</div>
							<div class="form-group"> <label>Tanggal Persidangan</label>
								<input type="date" class="form-control" name="tgl_sidang">
							</div>
							<div class="form-group"> <label>Jam Persidangan</label>
								<input type="text" class="form-control timepicker" name="jam_sidang">
							</div>
							<div class="form-group"> <label>Notulen</label>
								<textarea class="form-control" name="notulen" placeholder="Notulen Mediasi"></textarea>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>

				<!-- /.tab-pane -->
				<div class="tab-pane" id="tab_2">
					<b>Penugasan Advokat Sidang Ke - 1</b>

					<form class="" method="post" action="<?php echo site_url('admin/skLitigasiSubmit') ?>" style="opacity:1;">
						<div class="box-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Advokat</label>
								<select class="form-control" name="sidang_ke">
									<option value="1">Sidang Ke-1</option>
									<option value="2">Sidang Ke-2</option>
									<option value="3">Sidang Ke-3</option>
									<option value="4">Sidang Ke-4</option>
									<option value="5">Sidang Ke-5</option>
									<option value="6">Sidang Ke-6</option>
								</select>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>

				<div class="tab-pane" id="tab_3">
					<b>Sidang Ke - 2</b>

					<form class="" method="post" action="<?php echo site_url('admin/skNonLitigasiSubmit') ?>" style="opacity:1;">
						<div class="box-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Sidang Ke</label>
								<select class="form-control" name="sidang_ke">
									<option value="1">Sidang Ke-1</option>
									<option value="2">Sidang Ke-2</option>
									<option value="3">Sidang Ke-3</option>
									<option value="4">Sidang Ke-4</option>
									<option value="5">Sidang Ke-5</option>
									<option value="6">Sidang Ke-6</option>
								</select>
							</div>
							<div class="form-group"> <label>Tanggal Persidangan</label>
								<input type="date" class="form-control" name="tgl_sidang">
							</div>
							<div class="form-group"> <label>Jam Persidangan</label>
								<input type="text" class="form-control timepicker" name="jam_sidang">
							</div>
							<div class="form-group"> <label>Notulen</label>
								<textarea class="form-control" name="notulen" placeholder="Notulen Mediasi"></textarea>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>

				<!-- /.tab-pane -->
				<div class="tab-pane" id="tab_4">
					<b>Penugasan Advokat Sidang Ke - 2</b>

					<form class="" method="post" action="<?php echo site_url('admin/skLitigasiSubmit') ?>" style="opacity:1;">
						<div class="box-body">
							<div class="form-group"> <label>ID Perkara</label>
								<input type="text" name="id_perkara" class="form-control" disabled value="<?php echo $perkara->id_perkara ?>">
							</div>
							<div class="form-group"> <label>Advokat</label>
								<select class="form-control" name="sidang_ke">
									<option value="1">Sidang Ke-1</option>
									<option value="2">Sidang Ke-2</option>
									<option value="3">Sidang Ke-3</option>
									<option value="4">Sidang Ke-4</option>
									<option value="5">Sidang Ke-5</option>
									<option value="6">Sidang Ke-6</option>
								</select>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /.tab-content -->
		</div>

	</div>
</div>
</div>