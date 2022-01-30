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
					<li class="breadcrumb-item"><a href="<?php echo site_url('ketua') ?>">Ketua</a></li>
					<li class="breadcrumb-item active">Pengelolaan Tim Kuasa Hukum</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
    <!-- ALERT -->
    <?php
    if ($this->session->flashdata('success_message')){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>BERHASIL !</h4>
            <?php echo $this->session->flashdata('success_message')?>
        </div>
    <?php
    }
    if ($this->session->flashdata('error_message')){ ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Kesalahan !!! </h4>
        <?php echo $this->session->flashdata('error_message'); ?>
    </div>
    <?php }
    ?>
    <!-- ALERT -->
    <!-- Data Konsultasi -->
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
						<th>Tanggal Konsultasi</th>
						<th>Jam Konsultasi</th>
						<th>Room Meeting</th>
						<th>Nama Calon Klien</th>
						<th>Nama Advokat</th>
						<th>Kronologi </th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($konsultasi as $k) : ?>
						<tr class="">
							<td></td>
							<td><?php echo $k->tanggal_konsul ?></td>
							<td><?php echo $k->jam_konsul ?></td>
							<td><?php echo $k->room_konsul ?></td>
							<td><?php echo $k->nama ?></td>
							<td><?php echo $k->namaadvo ?></td>
							<td><?php echo $k->kronologi ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
    <!-- Input Tim Kuasa Hukum -->
    <div class="card">
        <div class="card-header">
			<h3 class="card-title">Bentuk Tim Kuasa Hukum</h3>
			<div class="card-tools">
			</div>
		</div>
        <form class="" method="post" action="<?php echo site_url('ketua/buatTimAdvokatSubmit')?>" style="opacity:1;">
        <div class="card-body">
            <div class="form-group"> <label class="">Beban Advokat</label>
                <table class="table table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Advokat</th>
                            <th>Beban Perkara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($karyawan as $advb):?>
                            <tr>
                                <td><?php echo $advb->nama?></td>
                                <td><?php echo $advb->BEBAN?> Perkara</td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="form-group"> <label class="">Perkara</label>
                <select class="form-control" name="id_perkara">
                <option disabled selected value="">Pilih Perkara</option>
                <?php foreach($perkara as $p){ ?>
                    <option value="<?= $p->id_perkara ?>"><?= $p->judul . ' (Klien : ' . $p->nama_klien . ')'; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group"> <label class="">Pengacara 1*</label>
                <select name="advo1" class="form-control select2">
                <option disabled selected>Pilih Pengacara</option>
                    <?php foreach($karyawan as $adv):?>
                        <option value='<?php echo $adv->id_karyawan ?>' ><?php echo $adv->nama?></option>;
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group"> <label class="">Pengacara 2*</label>
                <select name="advo2" class="form-control select2">
                <option disabled selected>Pilih Pengacara</option>
                </select>
            </div>
            <div class="form-group"> <label class="">Pengacara 3*</label>
                <select name="advo3" class="form-control select2">
                <option disabled selected>Pilih Pengacara</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </div>

    <!-- Tabel tim -->
    <div class = "card">
        <div class="card-header">
			<h3 class="card-title">Tim Kuasa Hukum</h3>
			<div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
			</div>
		</div>
        <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
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
                    <?php foreach($tim as $t):?>
                    <tr class="">
                        <td><?php echo $t->id_perkara?></td>
                        <td><?php echo $t->judul?></td> 
                        <td><?php echo $t->nama_klien?></td>
                        <td><?php echo $t->id_karyawan?></td>
                        <td><?php echo $t->nama?></td>
                    </tr>
                    <?php endforeach;?>
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
$this->template->javascript->add('assets/js/timadvokat.js');
?>
<!-- EndJS -->