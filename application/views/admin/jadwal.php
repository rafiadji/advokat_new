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
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Jadwal Sidang</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th></th>
						<th>Sidang Ke</th>
						<th>Judul</th>
						<th>Klien</th>
						<th>Tanggal Sidang</th>
						<th>Jam Mulai</th>
						<th>Jam Selesai</th>
						<th>Lokasi</th>
						<th>Pengacara</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($jadwal as $p) : ?>
						<tr class="">
							<td></td>
							<td><?php echo $p->sidang_ke ?></td>
							<td><?php echo $p->judul ?></td>
							<td><?php echo $p->nama_klien ?></td>
							<td><?php echo tgl_indo($p->tgl_sidang) ?></td>
							<td><?php echo $p->jam_sidang ?></td>
							<td><?php echo $p->jam_selesai_sidang ?></td>
							<td><?php echo $p->lokasi_pn ?></td>
							<td><?php echo $p->nama ?></td>
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