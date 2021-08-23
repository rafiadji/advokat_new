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
			<h3 class="card-title">Transaksi Masuk</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th></th>
						<th>ID Transaksi</th>
						<th>ID Perkara</th>
						<th>Perkara</th>
						<th>Tanggal Transaksi</th>
						<th>Nominal</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembayaran as $pem) : ?>
						<tr class="">
							<td></td>
							<td><?php echo $pem->id_pembayaran ?></td>
							<td><?php echo $pem->id_perkara ?></td>
							<td><?php echo $pem->judul ?></td>
							<td><?php echo tgl_indo($pem->tgl_transaksi) ?></td>
							<td><?php echo $pem->nominal ?></td>
							<td><?php echo $pem->keterangan ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Transaksi Masuk Perusahaan</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-md-1 control-label">Bulan </label>
					<div class="col-md-3">
						<select name="namaMat" class="form-control select2" id="bulan" onchange="filterBulan()">
							<option selected value="">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Febuari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped datatable" id="dataTable">
				<thead>
					<tr>
						<th></th>
						<th>ID Transaksi</th>
						<th>Bulan</th>
						<th>Keterangan</th>
						<th>Nominal</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($laba as $l) : ?>
						<tr class="">
							<td></td>
							<td><?php echo $l->id_trans_masuk ?></td>
							<td><?php echo $l->bulan ?></td>
							<td><?php echo $l->keterangan ?></td>
							<td><?php echo $l->nominal ?></td>

						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-md-2 control-label">Total Pemasukan : </label>
					<input type="text" name="total_pemasukan" disabled="" id="total">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- BeginJS -->
<script>
	function filterBulan() {
		var filBulan = document.getElementById('bulan');
		var value = filBulan.value;
		var total = document.getElementById('total');
		table = document.getElementById("dataTable");
		tr = table.getElementsByTagName("tr");
		var ttl = 0;
		if (value != "") {
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				tl = tr[i].getElementsByTagName("td")[3];
				if (td) {
					txtValue = td.textContent || td.innerText;
					txtTl = tl.textContent || tl.innerText;
					if (txtValue == value) {
						tr[i].style.display = "";
						ttl += parseInt(txtTl);
					} else {
						tr[i].style.display = "none";
					}
				}
			}
			total.value = ttl;
		} else {
			for (i = 0; i < tr.length; i++) {
				tr[i].style.display = "";
			}
		}
	}
</script>
<?php
$this->template->javascript->add('assets/plugins/datatables/jquery.dataTables.min.js');
$this->template->javascript->add('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
$this->template->javascript->add('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');
$this->template->javascript->add('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
?>
<!-- EndJS -->