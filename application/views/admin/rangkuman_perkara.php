
<div class="box">
  <div class="box-header with-border">
    <h2 class="box-title"><b>Rangkuman Perkara</b></h2>
    <div class="box-tools pull-right">
    </div>
  </div>
  <div class="box-body">
    <table class="table table-condensed">
      <tbody>
        <tr>
          <td>ID Perkara</td>
          <td> : </td>
          <td><?= $rangkuman->id_perkara ?></td>
        </tr>
        <tr>
          <td>Judul Perkara</td>
          <td> : </td>
          <td><?= $rangkuman->judul ?></td>
        </tr>
        <tr>
          <td>Nama Klien</td>
          <td> : </td>
          <td><?= $rangkuman->nama_klien ?></td>
        </tr>
        <tr>
          <td>Jenis Perkara</td>
          <td> : </td>
          <td><?= $rangkuman->jenis_perkara ?></td>
        </tr>
        <tr>
          <td>Tanggal Daftar Perkara</td>
          <td> : </td>
          <td><?= tgl_indo($rangkuman->tgl_daftar_perkara) ?></td>
        </tr>
        <tr>
          <td>Tanggal Putusan Perkara</td>
          <td> : </td>
          <td><?= $resume->tgl_putusan != '' ? tgl_indo($resume->tgl_putusan) : '' ?></td>
        </tr>
        <tr>
          <td>Keterangan Perkara</td>
          <td> : </td>
          <td><?= $rangkuman->keterangan_putusan ?></td>
        </tr>
        <tr>
          <td>File Resume Perkara</td>
          <td> : </td>
          <td><a href="<?= site_url('admin/downloadResume?filename=' . $rangkuman->file_resume) ?>"><?= $rangkuman ->file_resume ?></a></td>
        </tr>
      </tbody>
    </table> </br>
  </div><!-- detail [perkara] -->
</div>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">1. Dasar Hukum</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo site_url('admin/tambahDasarHukumSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
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
  </form><!-- dasar hukum -->
</div>

    <!-- AWAL SELURUH KONTEN SURAT KUASA -->
<?php if ($dasar_hukum) { ?>
<div class="box box-primary">
<!-- AWAL TAB SURAT KUASA -->
  <div class="nav-tabs-custom">
    <div class="box-header with-border">
      <h3 class="box-title">2. Surat Kuasa</h3>
    </div>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Non - Litigasi</a></li>
      <li><a href="#tab_2" data-toggle="tab">Litigasi</a></li>
    </ul>
    <!-- SURAT KUASA  -->
    <div class="tab-content">
      <!-- SURAT KUASA NON LITIGASI -->
      <div class="tab-pane active" id="tab_1">
        <b>Surat Kuasa Non - Litigasi</b>
          <div class="box-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/skNonLitigasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
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
      <!-- AKHIR SURAT KUASA NON LITIGASI -->

      <!-- SURAT KUASA LITIGASI -->
      <div class="tab-pane" id="tab_2">
        <b>Surat Kuasa Litigasi</b>
          <div class="box-body">
          <form class="form-horizontal" method="post" action="<?php echo site_url('admin/skLitigasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
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
      <!-- AKHIR SURAT KUASA LITIGASI -->   
    </div>
    <!-- AKHIR KONTEN SURAT KUASA -->     
  </div>
  <!-- AKHIR TAB SURAT KUASA -->
</div>
<?php } 
if ($dasar_hukum && $surat_kuasa_1) { ?>
<div class="box box-primary">
  <div class="nav-tabs-custom">
    <div class="box-header with-border">
      <h3 class="box-title">3. Somasi</h3>
    </div>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tabPeringatan" data-toggle="tab">Surat Peringatan</a></li>
      <li><a href="#tabBalasan" data-toggle="tab">Surat Balasan</a></li>
      <li><a href="#tabPerjanjian" data-toggle="tab">Perjanjian Damai</a></li>
    </ul>
      <!-- SOMASI  -->
    <div class="tab-content">
        <!-- SURAT Peringatan -->
      <div class="tab-pane active" id="tabPeringatan">
        <b>Surat Peringatan</b>
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/somasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
          <div class="box-body">
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
      <!-- Surat peringatan -->
      <!-- SURAt balasan -->
      <div class="tab-pane" id="tabBalasan">
        <b>Surat Balasan</b>
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/somasiSuratBalasan/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
          <div class="box-body">
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
        <!-- AKHIR SURAT balasan -->
      <div class="tab-pane" id="tabPerjanjian">
        <b>Perjanjian Damai</b>
        <p>Perjanjian Damai ada jika kedua belah pihak menyepakati untuk berdamai</p>
        <form class="form-horizontal" method="post" action="<?php echo site_url('admin/somasiAktaDamai/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
          <div class="box-body">
            <input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
            <div class="form-group"> 
              <label class="col-md-3 control-label">File Perjanjian Damai(*jika mediasi saat somasi berhasil)</label>
              <div class="col-md-9">
                <input type="file" name="file_somasi" <?= $somasi ? 'disabled' : '' ?>disabled>
                <input type="text" class="form-control" name="file_somasi" disabled value="<?php echo $somasi ? $somasi->file_somasi  : "Belum Ada File" ?>" disabled>
              </div>
            </div>
          </div>
        </form>
      </div>   
    </div>
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