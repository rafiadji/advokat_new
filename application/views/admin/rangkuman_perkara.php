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
					<li class="breadcrumb-item"><a href="<?php echo site_url('admin/perkara') ?>"><?php echo $this->template->page->title; ?></a></li>
					<li class="breadcrumb-item active">Rangkuman Perkara</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
  <div class="card">
		<div class="card-header">
			<h3 class="card-title">RANGKUMAN PERKARA</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<b> ID Perkara&nbsp;: <?= $rangkuman->id_perkara ?></b> <br>
			judul&nbsp;: <?= $rangkuman->judul ?><br>
			Nama Klien&nbsp;: <?= $rangkuman->nama_klien ?><br>
			Tanggal Daftar&nbsp;: <?= tgl_indo($rangkuman->tgl_daftar_perkara) ?><br>
			Jenis Perkara&nbsp;: <?= $rangkuman->jenis_perkara ?><br>
      Tanggal Putusan Perkara&nbsp;: <?= $resume->tgl_putusan != '' ? tgl_indo($resume->tgl_putusan) : '' ?><br>
      Keterangan Perkara&nbsp;: <?= $rangkuman->keterangan_putusan ?><br>
      File Resume Perkara&nbsp;: <a href="<?= site_url('admin/downloadResume?filename=' . $rangkuman->file_resume) ?>"><?= $rangkuman ->file_resume ?></a><br>
		</div>
	</div>

  <!-- AWAL DASAR HUKUM -->
  <div class="card">
    <div class="card-header">
			<h3 class="card-title">1. Dasar Hukum</h3>

			<div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i>
        </button>
			</div>
		</div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDasarHukumSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
      <div class="card-body">
        <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">  
        <div class="form-group"> 
          <label class="col-md-1 control-label">Deskripsi</label>
          <div class="col-md-11">
            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Dasar Hukum" <?= $dasar_hukum ? 'disabled' : '' ?>disabled><?php echo $dasar_hukum ? $dasar_hukum->deskripsi : 'Belum Ada' ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-1 control-label">File</label>
          <div class="col-md-11">
            <input type="file" name="file_dasar_hukum" <?= $dasar_hukum ? 'disabled' : '' ?>disabled>
            <input type="text" class="form-control" value="<?php echo $dasar_hukum ? $dasar_hukum->file_dasar_hukum : 'Belum Ada File' ?>" <?= $dasar_hukum ? 'disabled' : '' ?>disabled>
          </div>
        </div>
      </div>
  </div>
  <!-- AKHIR DASAR HUKUM -->

  <?php if ($dasar_hukum) { ?>

  <!-- AWAL SURAT KUASA -->
  <div class="card card-tabs">
    <h3 class="card-title">2. Surat Kuasa Litigasi - Non Litigasi</h3>
    <div class="card-header p-0 pt-1 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="nonlitigasi-tab" data-toggle="pill" href="#nonlitigasi" role="tab" aria-controls="tab-nonlitigasi" aria-selected="true">Non - Litigasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="litigasi-tab" data-toggle="pill" href="#litigasi" role="tab" aria-controls="tab-litigasi" aria-selected="false">Litigasi</a>
				</li>
			</ul>
		</div>
    <div class="card-body">
			<div class="tab-content" id="custom-tabs-three-tabContent">
				<div class="tab-pane fade show active" id="nonlitigasi" role="tabpanel" aria-labelledby="nonlitigasi-tab">
          <!-- SK NON LITIGASI -->
          <b>Surat Kuasa Non - Litigasi</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/skNonLitigasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
              <input type="hidden" name="jenis_skNon" value="non-litigasi">
              <div class="form-group"> 
                <label class="col-md-1 control-label">File</label>
                <div class="col-md-11">
                  <input type="file" name="surat_kuasa" <?= $surat_kuasa_1 ? 'disabled' : '' ?> disabled>
                  <input type="text" class="form-control" name="surat_kuasa" value="<?php
                  if ($surat_kuasa_1){
                    foreach ($surat_kuasa_1 as $ska){
                      echo $ska->file;
                    }
                  } else {
                    echo "Belum Ada File"; 
                  }
                  ?>" <?= $surat_kuasa_1 ? 'disabled' : '' ?>>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- SK LITIGASI -->
        <div class="tab-pane fade" id="litigasi" role="tabpanel" aria-labelledby="litigasi-tab">
          <b>Surat Kuasa Litigasi</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/skLitigasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="card-body"></div>
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
              <input type="hidden" name="jenis_skLit" value="litigasi">
              <div class="form-group"> 
                <label class="col-md-1 control-label">File</label>
                <div class="col-md-11">
                  <input type="file" name="surat_kuasa" <?= $surat_kuasa ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="surat_kuasa" disabled value="<?php 
                  if ($surat_kuasa){
                    foreach ($surat_kuasa as $sk){
                      echo $sk->file;
                    }
                  } else {
                    echo "Belum Ada File";
                  } ?>">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- AKHIR SURAT KUASA -->

  <?php } 
  if ($dasar_hukum && $surat_kuasa_1) { ?>

  <!-- AWAL SOMASI-->
  <div class="card card-tabs">
		<h3 class="card-title">3. Somasi</h3>
		<div class="card-header p-0 pt-1 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="peringatan-tab" data-toggle="pill" href="#peringatan" role="tab" aria-controls="tab-peringatan" aria-selected="true">Surat Peringatan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="balasan-tab" data-toggle="pill" href="#balasan" role="tab" aria-controls="tab-balasan" aria-selected="false">Surat Balasan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="perjanjian-tab" data-toggle="pill" href="#perjanjian" role="tab" aria-controls="tab-perjanjian" aria-selected="false">Perjanjian Damai</a>
				</li>
			</ul>
		</div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-three-tabContent">
        <!-- SURAT PERINGATAN -->
				<div class="tab-pane fade show active" id="peringatan" role="tabpanel" aria-labelledby="peringatan-tab">
					<b>Surat Peringatan</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/somasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Terbit Surat Peringatan</label>
                <div class="col-md-3">
                  <input type="date" name="tgl_terbit_surat_peringatan" class="form-control" placeholder="Tanggal Terbit Surat Peringatan" value="<?php echo $peringatan ? $peringatan->tgl_terbit_surat_peringatan : "" ?>" <?= $peringatan ? 'disabled' : '' ?>disabled> 
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">File Surat Peringatan</label>
                <div class="col-md-9">
                  <input type="file" name="surat_peringatan" multiple <?= $peringatan ? 'disabled' : '' ?> disabled >
                  <input type="text" class="form-control" name="surat_peringatan" <?= $peringatan ? 'disabled' : '' ?> value="<?php echo $peringatan ? $peringatan->file_surat_peringatan  : "Belum Ada File" ?>" disabled>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- SURAT BALASAN -->
        <div class="tab-pane fade" id="balasan" role="tabpanel" aria-labelledby="balasan-tab">
					<b>Surat Balasan</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/somasiSuratBalasan/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Terima Surat Balasan</label>
                <div class="col-md-3">
                <input type="date" name="tgl_terima_surat_balasan" class="form-control" placeholder="Tanggal Terima Surat Balasan" value="<?php echo $balasan ? $balasan->tgl_surat_balasan : "" ?>" <?= $balasan ? 'disabled' : '' ?> disabled> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">File Surat Balasan</label>
                <div class="col-md-9">
                  <input type="file" name="surat_balasan" <?= $balasan ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="surat_balasan" disabled value="<?php echo $balasan ? $balasan->file_surat_balasan  : "Belum Ada File" ?>" disabled>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Status</label>
                <div class="col-md-3">
                  <select class="form-control" name="status_somasi" <?= $balasan ? 'disabled' : '' ?>disabled>
                    <option value="mediasi_non_pn" <?php echo $balasan && $balasan->status == 'mediasi_non_pn' ? 'selected' : '' ?>>Mediasi Non Pengadilan</option>
                    <option value="pengadilan_negeri" <?php echo $balasan && $balasan->status == 'pengadilan_negeri' ? 'selected' : '' ?>>Pengadilan Negeri</option>
                  </select>
                </div> 
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen Somasi</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen_somasi" placeholder="Notulen Somasi" <?= $balasan ? 'disabled' : '' ?> disabled><?php echo $balasan ? $balasan->notulen_somasi : '' ?></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- PERJANJIAN DAMAI -->
        <div class="tab-pane fade" id="perjanjian" role="tabpanel" aria-labelledby="perjanjian-tab">
					<b>Perjanjian Damai</b>
					<p>Perjanjian Damai ada jika kedua belah pihak menyepakati untuk berdamai</p>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/somasiSuratBalasan/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Terima Surat Balasan</label>
                <div class="col-md-3">
                <input type="date" name="tgl_terima_surat_balasan" class="form-control" placeholder="Tanggal Terima Surat Balasan" value="<?php echo $balasan ? $balasan->tgl_surat_balasan : "" ?>" <?= $balasan ? 'disabled' : '' ?> disabled> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">File Surat Balasan</label>
                <div class="col-md-9">
                  <input type="file" name="surat_balasan" <?= $balasan ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="surat_balasan" disabled value="<?php echo $balasan ? $balasan->file_surat_balasan  : "Belum Ada File" ?>" disabled>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Status</label>
                <div class="col-md-3">
                  <select class="form-control" name="status_somasi" <?= $balasan ? 'disabled' : '' ?>disabled>
                    <option value="mediasi_non_pn" <?php echo $balasan && $balasan->status == 'mediasi_non_pn' ? 'selected' : '' ?>>Mediasi Non Pengadilan</option>
                    <option value="pengadilan_negeri" <?php echo $balasan && $balasan->status == 'pengadilan_negeri' ? 'selected' : '' ?>>Pengadilan Negeri</option>
                  </select>
                </div> 
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen Somasi</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen_somasi" placeholder="Notulen Somasi" <?= $balasan ? 'disabled' : '' ?> disabled><?php echo $balasan ? $balasan->notulen_somasi : '' ?></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- AKHIR SOMASI -->

  
  <?php } 
  if ($dasar_hukum && $surat_kuasa && ($balasan && $balasan->status == 'pengadilan_negeri')){ ?>
  <!-- KONTEN MEDIASI PENGADILAN NEGERI -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">4. Mediasi Pengadilan Negeri</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/mediasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
        <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">  
        <div class="form-group"> 
          <label class="col-md-3 control-label">Status (Damai / Sidang)</label>
          <div class="col-md-9">
            <select class="form-control" name="status" <?= $mediasi ? 'disabled' : '' ?> disabled >
              <option value="sidang" <?php echo $mediasi && $mediasi->status == 'sidang' ? 'selected' : '' ?>>Sidang</option>
              <option value="damai" <?php echo $mediasi && $mediasi->status == 'damai' ? 'selected' : '' ?>>Damai</option>
            </select>
          </div>
        </div>
        <div class="form-group"> 
          <label class="col-md-3 control-label">Akta Damai (* jika perkara menemui titik damai)</label>
          <div class="col-md-9">
            <input type="file" name="akta_damai" <?= $mediasi ? 'disabled' : '' ?>disabled>
            <input type="text" class="form-control" disabled name="akta_damai" value="<?php echo $mediasi ? $mediasi->akta_damai  : "Belum Ada File" ?>"disabled>
          </div>        
        </div>
        <div class="form-group"> 
          <label class="col-md-3 control-label">Keterangan</label>
          <div class="col-md-9">
            <textarea class="form-control" name="keterangan" placeholder="Keterangan Mediasi" <?= $mediasi ? 'disabled' : '' ?>disabled><?php echo $mediasi ? $mediasi->keterangan : '' ?></textarea>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php } 
  if ($dasar_hukum && $surat_kuasa && ($balasan && $balasan->status == 'pengadilan_negeri') && ($mediasi && $mediasi->status == 'sidang')) {?>
  <!-- AWAL SELURUH KONTEN PERSIDANGAN -->
  <div class="box box-primary">
    <div class="nav-tabs-custom">
      <div class="box-header with-border">
        <h3 class="box-title">5. Persidangan Pengadilan Negeri</h3>
      </div>
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Sidang 1</a></li>
        <?php if ($sidang1){ ?>
          <li><a href="#tab2" data-toggle="tab">Sidang 2</a></li>
        <?php } 
        if ($sidang1 && $sidang2){ ?>
          <li><a href="#tab3" data-toggle="tab">Sidang 3</a></li>
        <?php  } 
        if ($sidang1 && $sidang2 && $sidang3){ ?>
          <li><a href="#tab4" data-toggle="tab">Sidang 4</a></li>
        <?php  } 
        if ($sidang1 && $sidang2 && $sidang3 && $sidang4){ ?>
          <li><a href="#tab5" data-toggle="tab">Sidang 5</a></li>
        <?php  }
        if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5){  ?>
          <li><a href="#tab6" data-toggle="tab">Sidang 6</a></li>
        <?php }
        if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6){  ?>
          <li><a href="#tab7" data-toggle="tab">Sidang 7</a></li>
        <?php }
        if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7){  ?>
          <li><a href="#tab8" data-toggle="tab">Sidang 8</a></li>
        <?php
        if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7 && $sidang8){  ?>
          <li><a href="#tab9" data-toggle="tab">Sidang 9</a></li>
        <?php }
        if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7 && $sidang8 && $sidang9){  ?>
          <li><a href="#tab10" data-toggle="tab">Sidang 10</a></li>
        <?php } } ?>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          <b>Sidang Ke - 1</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang1 ? $sidang1->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="1" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang1 ? $sidang1->tgl_sidang : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang1 ? $sidang1->jam_sidang : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang1 ? $sidang1->jam_selesai_sidang : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang1 ? $sidang1->lokasi_pn : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo1) ? 'checked' : ''; ?> <?= $sidang1 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" <?= $sidang1 ? 'disabled' : '' ?>disabled><?php echo $sidang1 ? $sidang1->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang1 ? $sidang1->file_persidangan : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang1 ? $sidang1->file_persidangan : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab2">
          <b>Sidang Ke - 2</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang2 ? $sidang2->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="2" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang2 ? $sidang2->tgl_sidang : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang2 ? $sidang2->jam_sidang : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang2 ? $sidang2->jam_selesai_sidang : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang2 ? $sidang2->lokasi_pn : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo2) ? 'checked' : ''; ?> <?= $sidang2 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" <?= $sidang2 ? 'disabled' : '' ?>disabled><?php echo $sidang2 ? $sidang2->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang2 ? $sidang2->file_persidangan : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang2 ? $sidang2->file_persidangan : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab3">
          <b>Sidang Ke - 3</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang3 ? $sidang3->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="3" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang3 ? $sidang3->tgl_sidang : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang3 ? $sidang3->jam_sidang : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang3 ? $sidang3->jam_selesai_sidang : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang3 ? $sidang3->lokasi_pn : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo3) ? 'checked' : ''; ?> <?= $sidang3 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" <?= $sidang3 ? 'disabled' : '' ?>disabled><?php echo $sidang3 ? $sidang3->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang3 ? $sidang3->file_persidangan : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang3 ? $sidang3->file_persidangan : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab4">
          <b>Sidang Ke - 4</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang4 ? $sidang4->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="4" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang4 ? $sidang4->tgl_sidang : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang4 ? $sidang4->jam_sidang : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang4 ? $sidang4->jam_selesai_sidang : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang4 ? $sidang4->lokasi_pn : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo4) ? 'checked' : ''; ?> <?= $sidang4 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" <?= $sidang4 ? 'disabled' : '' ?>disabled><?php echo $sidang4 ? $sidang4->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang4 ? $sidang4->file_persidangan : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang4 ? $sidang4->file_persidangan : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab5">
          <b>Sidang Ke - 5</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang5 ? $sidang5->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="5" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang5 ? $sidang5->tgl_sidang : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang5 ? $sidang5->jam_sidang : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang5 ? $sidang5->jam_selesai_sidang : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang5 ? $sidang5->lokasi_pn : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo5) ? 'checked' : ''; ?> <?= $sidang5 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" <?= $sidang5 ? 'disabled' : '' ?>disabled><?php echo $sidang5 ? $sidang5->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang5 ? $sidang5->file_persidangan : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang5 ? $sidang5->file_persidangan : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab6">
          <b>Sidang Ke - 6</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang6 ? $sidang6->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="6" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang6 ? $sidang6->tgl_sidang : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang6 ? $sidang6->jam_sidang : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang6 ? $sidang6->jam_selesai_sidang : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang6 ? $sidang6->lokasi_pn : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo6) ? 'checked' : ''; ?> <?= $sidang6 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" disabled placeholder="Notulen Persidangan" <?= $sidang6 ? 'disabled' : '' ?>><?php echo $sidang6 ? $sidang6->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang6 ? $sidang6->file_persidangan : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang6 ? $sidang6->file_persidangan : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab7">
          <b>Sidang Ke - 7</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang7 ? $sidang7->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="7" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang7 ? $sidang7->tgl_sidang : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang7 ? $sidang7->jam_sidang : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang7 ? $sidang7->jam_selesai_sidang : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang7 ? $sidang7->lokasi_pn : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo7) ? 'checked' : ''; ?> <?= $sidang7 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" disabled placeholder="Notulen Persidangan" <?= $sidang7 ? 'disabled' : '' ?>><?php echo $sidang7 ? $sidang7->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang7 ? $sidang7->file_persidangan : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang7 ? $sidang7->file_persidangan : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab8">
          <b>Sidang Ke - 8</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang8 ? $sidang8->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="8" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang8 ? $sidang8->tgl_sidang : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang8 ? $sidang8->jam_sidang : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang8 ? $sidang8->jam_selesai_sidang : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang8 ? $sidang8->lokasi_pn : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo8) ? 'checked' : ''; ?> <?= $sidang8 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" disabled placeholder="Notulen Persidangan" <?= $sidang8 ? 'disabled' : '' ?>><?php echo $sidang8 ? $sidang8->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang8 ? $sidang8->file_persidangan : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang8 ? $sidang8->file_persidangan : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab9">
          <b>Sidang Ke - 9</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang9 ? $sidang9->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="9" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang9 ? $sidang9->tgl_sidang : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang9 ? $sidang9->jam_sidang : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang9 ? $sidang9->jam_selesai_sidang : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>disabled>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" value="<?php echo $sidang9 ? $sidang9->lokasi_pn : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" disabled name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo9) ? 'checked' : ''; ?> <?= $sidang9 ? 'disabled' : '' ?>disabled>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" disabled placeholder="Notulen Persidangan" <?= $sidang9 ? 'disabled' : '' ?>><?php echo $sidang9 ? $sidang9->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang9 ? $sidang9->file_persidangan : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>disabled>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang9 ? $sidang9->file_persidangan : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="tab-pane" id="tab10">
          <b>Sidang Ke - 10</b>
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDataPersidanganSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
              <input type="hidden" name="id_persidangan" value="<?php echo $sidang10 ? $sidang10->id_persidangan : "" ?>">
              <div class="form-group"> 
                <label class="col-md-3 control-label">Sidang Ke</label>
                <div class="col-md-1">
                  <input type="text" class="form-control" value="10" name="sidang_ke" readonly> 
                </div>            
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Tanggal Persidangan</label>
                <div class="col-md-3">
                  <input type="date" class="form-control" name="tgl_sidang" disabled value="<?php echo $sidang10 ? $sidang10->tgl_sidang : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label class="col-md-3 control-label">Jam Persidangan</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang" disabled value="<?php echo $sidang10 ? $sidang10->jam_sidang : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                  <label class="control-label" style="float: left;">s.d.</label>
                  <div class="col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" name="jam_sidang_selesai" disabled value="<?php echo $sidang10 ? $sidang10->jam_selesai_sidang : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>>
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Lokasi Pengadilan Negeri</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="pn" disabled value="<?php echo $sidang10 ? $sidang10->lokasi_pn : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Penugasan Advokat :</label>
                <div class="col-md-9">
                <?php foreach ($tim_perkara as $tp){ ?>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" disabled name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo10) ? 'checked' : ''; ?> <?= $sidang10 ? 'disabled' : '' ?>>
                      <?php echo $tp->nama; ?>
                    </label>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="form-group"> 
                <label class="col-md-3 control-label">Notulen</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notulen" readonly placeholder="Notulen Persidangan" <?= $sidang10 ? 'disabled' : '' ?>><?php echo $sidang10 ? $sidang10->notulen : "" ?></textarea>
                </div>            
              </div>
              <div class="form-group"> 
              <label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="file_sidang" disabled value="<?php echo $sidang10 ? $sidang10->file_persidangan : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>>
                  <input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang10 ? $sidang10->file_persidangan : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>disabled>
                </div>
              </div>
            </div>
          </form>
        </div>

    </div>
  </div>
  </div>
  <?php 
  if ($dasar_hukum && $surat_kuasa && $mediasi && $sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7 && $sidang8 && $sidang9 && $sidang10) { ?>
  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">6. Putusan</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
    <div class="box-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('admin/resumeSubmit/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
        <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
        <div class="form-group"> 
          <label class="col-md-2 control-label">Nomor Putusan</label>
          <div class="col-md-10">
            <input type="text" name="no_putusan" class="form-control" placeholder="nomor putusan" value="<?php echo isset($perkara->nomor_putusan) ? $perkara->nomor_putusan : "" ?>"> 
          </div>
        </div>    
        <div class="form-group"> 
          <label class="col-md-2 control-label">Tanggal Putusan</label>
          <div class="col-md-10">
            <input type="date" name="tgl_putusan" class="form-control" placeholder="tanggal putusan" value="<?php echo $perkara ? $perkara->tgl_putusan : "" ?>"disabled> 
          </div>
        </div>
        <div class="form-group"> 
          <label class="col-md-2 control-label">Keterangan Putusan</label>
          <div class="col-md-10">
            <textarea class="form-control" name="keterangan_putusan" placeholder="Keterang Putusan"disabled><?php echo $perkara ? $perkara->keterangan_putusan : 'Belum Ada' ?></textarea>
          </div>
        </div>
        <div class="form-group"> 
          <label class="col-md-2 control-label">File Resume</label>
          <div class="col-md-10">
            <input type="file" name="file_resume" disabled>
            <input type="text" class="form-control" value="<?php echo $perkara ? $perkara->file_resume : 'Belum Ada File' ?>">
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php } } ?>

</section>