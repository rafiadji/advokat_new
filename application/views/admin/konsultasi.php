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
	<?php
	if ($this->session->flashdata('success_message')) { ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>BERHASIL !</h4>
			<?php echo $this->session->flashdata('success_message') ?>
		</div>
	<?php
	}
	if ($this->session->flashdata('error_message')) { ?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Kesalahan !!! </h4>
			<?php echo $this->session->flashdata('error_message'); ?>
		</div>
	<?php } ?>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">DATA KONSULTASI</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th></th>
						<th>ID Konsultasi</th>
						<th>Tanggal Konsultasi</th>
						<th>Jam Konsultasi</th>
						<th>Room Meeting</th>
						<th>Nama Calon Klien</th>
						<th>Nama Pengacara</th>
						<th>Kronologi </th>
						<th>Notulen Konsul</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($konsultasi as $k) : ?>
						<tr class="">
							<td></td>
							<td><?php echo $k->id_konsultasi ?></td>
							<td><?php echo $k->tanggal_konsul ?></td>
							<td><?php echo $k->jam_konsul ?></td>
							<td><?php echo $k->room_konsul ?></td>
							<td><?php echo $k->nama ?></td>
							<td><?php echo $k->namaadvo ?></td>
							<td><?php echo $k->kronologi ?></td>
							<td><?php echo $k->catatan?></td>
							<td>
								<a href="<?php echo site_url('admin/editKonsultasi/' . $k->id_konsultasi) ?>" class="btn btn-primary btn-xs" onclick="
									return confirm('Apakah Anda ingin melihat detail data Konsultasi')">SET KONSULTASI</a>
							</td>
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