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
                    <li class="breadcrumb-item"><a href="<?php echo site_url('ketua') ?>">Dashboard</a></li>
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
                    <?php foreach($perkara as $p):?>
                        <tr>
                            <td></td>
                            <td><?php echo $p->nomor_perkara?></td>
                            <td><?php echo $p->judul?></td>
                            <td><?php echo $p->nama_klien?></td>
                            <td><?php echo tgl_indo($p->tgl_daftar_perkara)?></td>
                            <td><?php echo $p->kategori?></td>
                            <td><?php echo $p->tergugat?></td>
                            <td><?php echo $p->status?></td>
                            <td>
                                <a href="<?php echo site_url ('ketua/rangkumanPerkara/'.$p->id_perkara)?>" class="btn btn-xs btn-warning" ><i class="fa fa-folder-open"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>