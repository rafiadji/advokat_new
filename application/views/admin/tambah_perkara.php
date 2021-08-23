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
                    <li class="breadcrumb-item active">Tambah Perkara</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <form action="<?php echo site_url('admin/tambahPerkaraSubmit') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Perkara</h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nomor Perkara </label>
                    <input type="text" class="form-control" name="nomor_perkara" placeholder="Nomor Perkara Baru">
                </div>
                <div class="form-group">
                    <label>Judul Perkara </label>
                    <input type="text" class="form-control" name="judul_perkara" placeholder="Judul Perkara Baru">
                </div>
                <div class="form-group">
                    <label>Tanggal Daftar Perkara</label>
                    <input type="date" class="form-control" name="tgl_daftar">
                </div>
                <div class="form-group"> <label>Jenis Perkara</label>
                    <select class="form-control" name="jns_perkara">
                        <option value="perdata">PERDATA</option>
                    </select>
                </div>
                <div class="form-group"> <label>Kategori</label>
                    <select class="form-control" name="kategori">
                        <option value="sengketa">Sengketa</option>
                        <option value="kekerasan">Kekerasan</option>
                        <option value="pencurian">Pencurian</option>
                        <option value="perceraian">Perceraian</option>
                        <option value="pencemaran nama baik">Pencemaran Nama Baik</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Legal Opini</label>
                    <input type="file" class="form-control" name="legal_opini">
                </div>
                <div class="form-group">
                    <label>Klien</label>
                    <select class="form-control" name="id_klien">
                        <option disabled selected value="">Pilih Klien</option>
                        <?php foreach ($klien as $k) { ?>
                            <option value='<?php echo $k->id_klien ?>'><?php echo $k->nama_klien ?></option>";
                            <!-- <option value="<?= $k->id_klien ?>"><?= ' (Klien : ' . $k->nama_klien . ')'; ?></option> -->
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tergugat</label>
                    <input type="text" class="form-control" name="tergugat" placeholder="Nama Tergugat">
                </div>
                <div class="form-group">
                    <label>Alamat tergugat</label>
                    <input type="text" class="form-control" name="alamat_tergugat" placeholder="Alamat Tergugat">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </form>
</section>