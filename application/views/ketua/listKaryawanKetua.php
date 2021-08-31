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
					<li class="breadcrumb-item active">Data Karyawan</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
			<h3 class="card-title">Data Karyawan</h3>
			<div class="card-tools">
               
			</div>
		</div>
        <div class="card-body">
            <table class="table table-bordered table-striped dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIA</th>
                        <th>KTP </th>
                        <th>NAMA</th>
                        <th>JABATAN </th>
                        <th>EMAIL</th>
                        <th>No.HP</th>
                        <th>SPESIALIS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($karyawan as $k):?>
                    <tr class="">
                        <td><?php echo $k->id_karyawan?></td>
                        <td><?php echo $k->no_induk_advokat?></td> 
                        <td><?php echo $k->no_ktp?></td>
                        <td><?php echo $k->nama?></td> 
                        <td><?php echo $k->jabatan?></td>
                        <td><?php echo $k->email?></td>
                        <td><?php echo $k->telepon?></td> 
                        <td><?php echo $k->spesialis?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>