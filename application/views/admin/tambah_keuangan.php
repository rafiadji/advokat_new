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
					<li class="breadcrumb-item active">Tambah Pembayaran</li>
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
	<form role="form" action="<?php echo site_url('admin/tambahKeuanganSubmit') ?>" method="post" enctype="multipart/form-data">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tambah Pembayaran</h3>

				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Perkara</label>
					<select class="form-control" name="id_perkara">
						<option disabled selected value="">Pilih Perkara</option>
						<?php foreach ($perkara as $p) { ?>
							<option value="<?= $p->id_perkara ?>"><?= $p->judul . ' (Klien : ' . $p->nama_klien . ')'; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal Transaksi</label>
					<input type="date" class="form-control" name="tgl_transaksi">
				</div>
				<div class="form-group">
					<label>Nominal</label>
					<input type="text" class="form-control" name="nominal" placeholder="1xxxxxxx" id="nominal" onkeyup="sum();" required />
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" class="form-control" name="keterangan" placeholder="Keterangan Pembayaran">
				</div>
				<div class="form-group">
					<label>Nominal Gaji Advokat (75% dari Pembayaran *belum dibagi 3)</label>
					<input type="text" class="form-control" name="gaji3advokat" placeholder="xxxxxxx" id="gaji60" onkeyup="sum();" / readonly>
				</div>
				<div class="form-group">
					<label>Laba Firma (25% dari Pembayaran)</label>
					<input type="text" class="form-control" name="laba" placeholder="xxxxxxx" id="laba" onkeyup="sum();" / readonly="">
				</div>
				<div class="form-group">
					<label>Gaji @Advokat</label>
					<input type="text" class="form-control" name="honor" placeholder="xxxxxxx" id="gajiadvo" onkeyup="sum();" / readonly="">
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
		</div>
	</form>
</section>

<script>
	function sum() {
		var hitungnominal = document.getElementById('nominal').value;
		//perhitungan jumlah dan rata 
		var hitung60 = parseFloat(hitungnominal) * 0.75;
		var hitung40 = parseFloat(hitungnominal) * 0.25;
		var bagi3 = parseFloat(hitung60) / 3;
		//hasilhitung
		document.getElementById('gaji60').value = hitung60;
		document.getElementById('laba').value = hitung40;
		document.getElementById('gajiadvo').value = bagi3;
	}
</script>