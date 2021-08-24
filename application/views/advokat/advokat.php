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
                    <li class="breadcrumb-item active">Dashboard</li>
                    <!-- <li class="breadcrumb-item active">Legacy User Menu</li> -->
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            Selamat Datang di Sistem Informasi Administrasi Perkara Hukum Advokat
            <br>Mari bersama sama kita wujudkan pengelolaan perkara secara akurat, cepat dan terstruktur.
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ada Sidang Hari Ini</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID Persidangan</th>
                    <th>Sidang</th>
                    <th>Tanggal Sidang</th>
                    <th>Jam Mulai Sidang</th>
                    <th>Jam Selesai Sidang</th>
                    <th>Lokasi</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($sidangToday as $p):?>
                    <tr class="">
                        <td><?php echo $p->id_persidangan?></td>
                        <td><?php echo $p->sidang_ke?></td> 
                        <td><?php echo tgl_indo($p->tgl_sidang)?></td>
                        <td><?php echo $p->jam_sidang?></td>
                        <td><?php echo $p->jam_selesai_sidang?></td>
                        <td><?php echo $p->lokasi_pn?></td>
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
?>
<!-- EndJS -->