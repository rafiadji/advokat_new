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
			<div class="meet embed-responsive embed-responsive-16by9"></div>
			<form role="form" action="<?php echo site_url('advokat/save_konsul') ?>" method="post">
				<input type="hidden" name="id_konsultasi" value="<?php echo $konsultasi->id_konsultasi?>">
				<div class="form-group"> <label class="">Catatan</label>
					<textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</form>
		</div>
		<div class="card-footer">
			<a href="<?php echo site_url('advokat/lihatKonsultasi') ?>" class="btn btn-danger">Keluar</a>
		</div>
	</div>
</section>
<script src="https://meet.jit.si/external_api.js"></script>
<script>
	var domain = "meet.jit.si";
	var options = {
		roomName: "<?php echo $konsultasi->room_konsul?>",
		parentNode: document.querySelector('.meet'),
		configOverwrite: {},
		interfaceConfigOverwrite: {},
		userInfo: {
			displayName: '<?php echo $this->session->userdata('nama')?>'
		}
	}
	var api = new JitsiMeetExternalAPI(domain, options);
</script>

<!-- BeginJS -->
<?php
$this->template->javascript->add('assets/plugins/datatables/jquery.dataTables.min.js');
$this->template->javascript->add('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
$this->template->javascript->add('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');
$this->template->javascript->add('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
?>
<!-- EndJS -->