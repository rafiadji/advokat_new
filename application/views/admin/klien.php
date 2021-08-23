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
			<h3 class="card-title">DATA KLIEN</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<a class="btn btn-success" href="<?php echo site_url('admin/tambahKlien') ?>"><i class="fa fa-fw fa-plus"></i> Tambah</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped table-responsive datatable">
				<thead>
					<tr>
						<th></th>
						<th>ID Klien</th>
						<th>Nomor KTP</th>
						<th>Nama </th>
						<th>Alamat</th>
						<th>Nama Perusahaan </th>
						<th>No.SIUP/NPWP</th>
						<th>Alamat Perusahaan</th>
						<th>E-Mail</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($klien as $k) : ?>
						<tr class="">
							<td></td>
							<td><?php echo $k->id_klien ?></td>
							<td><?php echo $k->ktp ?></td>
							<td><?php echo $k->nama_klien ?></td>
							<td><?php echo $k->alamat ?></td>
							<td><?php echo $k->nama_perusahaan ?></td>
							<td><?php echo $k->siup_npwp ?></td>
							<td><?php echo $k->alamat_perusahaan ?></td>
							<td><?php echo $k->email_klien ?></td>
							<td>
								<a href="<?php echo site_url('admin/ubahKlien/' . $k->id_klien) ?>" class="btn btn-primary btn-xs" onclick="return confirm('Apakah Anda ingin mengubah data klien <?php echo trim($k->nama_klien) ?>')">Ubah</a>

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