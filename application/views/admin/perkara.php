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
            <h3 class="card-title">DATA PERKARA</h3>

            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="<?php echo site_url('admin/tambahPerkara') ?>"><i class="fa fa-fw fa-plus"></i> Tambah </a>
            <a class="btn btn-info" href="<?php echo site_url('export/printPerkara') ?>"><i class="fa fa-fw fa-print"></i> Export PDF </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th></th>
                        <th>No.Perkara</th>
                        <th>Judul</th>
                        <th>Klien</th>
                        <th>Tanggal Daftar</th>
                        <th>Kategori</th>
                        <th>Tergugat</th>
                        <th>Status</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perkara as $p) : ?>
                        <tr>
                            <td></td>
                            <td><?php echo $p->nomor_perkara ?></td>
                            <td><?php echo $p->judul ?></td>
                            <td><?php echo $p->nama_klien ?></td>
                            <td><?php echo tgl_indo($p->tgl_daftar_perkara); ?></td>
                            <td><?php echo $p->kategori ?></td>
                            <td><?php echo $p->tergugat ?></td>
                            <td><?php echo $p->status ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/kelolaPerkara/' . $p->id_perkara) ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo site_url('admin/rangkumanPerkara/' . $p->id_perkara) ?>" class="btn btn-xs btn-info"><i class="fa fa-book"></i></a>
                                <a href="<?php echo site_url('admin/keNonaktif/' . $p->id_perkara) ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Perkara Putus</h3>

            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th></th>
                        <th>No.Perkara</th>
                        <th>Judul</th>
                        <th>Klien</th>
                        <th>Tanggal Daftar</th>
                        <th>Kategori</th>
                        <th>Tergugat</th>
                        <th>Amar</th>
                        <th>No.Putusan</th>
                        <th>Tanggal Putusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perkaraPutus as $pp) : ?>
                        <tr>
                            <td></td>
                            <td><?php echo $pp->nomor_perkara ?></td>
                            <td><?php echo $pp->judul ?></td>
                            <td><?php echo $pp->nama_klien ?></td>
                            <td><?php echo tgl_indo($pp->tgl_daftar_perkara) ?></td>
                            <td><?php echo $pp->kategori ?></td>
                            <td><?php echo $pp->tergugat ?></td>
                            <td><?php echo $pp->amar ?></td>
                            <td><?php echo $pp->nomor_putusan ?></td>
                            <td><?php echo tgl_indo($pp->tgl_putusan) ?></td>
                            <td><?php echo $pp->status ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/rangkumanPerkara/' . $pp->id_perkara) ?>" class="btn btn-xs btn-warning"><i class="fa fa-folder-open"></i></a>
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