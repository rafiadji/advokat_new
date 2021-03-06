<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo $this->template->page->title; ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo site_url('advokat') ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo site_url('advokat/perkara') ?>"><?php echo $this->template->page->title; ?></a></li>
					<li class="breadcrumb-item active">Pengelolaan Perkara</li>
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
	if ($this->session->flashdata('ERROR')) { ?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Kesalahan !!! </h4>
			<?php echo $this->session->flashdata('ERROR'); ?>
		</div>
	<?php } ?>
	<!-- detail perkara -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">DATA PERKARA</h3>

			<div class="card-tools">

			</div>
		</div>
		<div class="card-body">
			<b> ID Perkara&nbsp;: <?= $detail->id_perkara ?></b> <br>
			judul&nbsp;: <?= $detail->judul ?><br>
			Nama Klien&nbsp;: <?= $detail->nama_klien ?><br>
			Tanggal Daftar&nbsp;: <?= tgl_indo($detail->tgl_daftar_perkara) ?><br>
			Jenis Perkara&nbsp;: <?= $detail->jenis_perkara ?><br>
			Status Perkara&nbsp;: <?= $detail->status ?><br>
		</div>
	</div>
	<!-- Dasar Hukum -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">1. Dasar Hukum</h3>

			<div class="card-tools">

			</div>
		</div>
		<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/tambahDasarHukumSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
			<div class="card-body">
				<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
				<div class="form-group">
					<label class="col-md-1 control-label">Deskripsi</label>
					<div class="col-md-11">
						<textarea class="form-control" name="deskripsi" placeholder="Deskripsi Dasar Hukum" <?= $dasar_hukum ? 'disabled' : '' ?>><?php echo $dasar_hukum ? $dasar_hukum->deskripsi : 'Belum Ada' ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label">File</label>
					<div class="col-md-11">
          				<input type="file" name="file_dasar_hukum" <?= $dasar_hukum ? 'disabled' : '' ?>>
          				<input type="text" class="form-control" value="<?php echo $dasar_hukum ? $dasar_hukum->file_dasar_hukum : 'Belum Ada File' ?>" <?= $dasar_hukum ? 'disabled' : '' ?>>
        			</div>
				</div>
			</div>
			<?php if (!$dasar_hukum) : ?>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">SIMPAN</button>
				</div>
			<?php endif; ?>
		</form>
	</div>
	<!-- Surat Kuasa -->
	<?php if ($dasar_hukum) : ?>
		<div class="card card-tabs">
			<h3 class="card-title">2. Surat Kuasa</h3>
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
					<!-- SK non Litigasi-->
					<div class="tab-pane fade show active" id="nonlitigasi" role="tabpanel" aria-labelledby="nonlitigasi-tab">
						<b>Surat Kuasa Non - Litigasi</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/skNonLitigasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara ?>">
								<input type="hidden" name="jenis_skNon" value="non-litigasi">
								<div class="form-group">
									<label class="col-md-1 control-label">File</label>
									<div class="col-md-11">
										<input type="file" name="surat_kuasa" <?= $surat_kuasa_1 ? 'disabled' : '' ?>>
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
							<?php if (!$surat_kuasa_1) : ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							<?php endif; ?>
						</form>
					</div>
					<!-- SK Litigasi-->
					<div class="tab-pane fade" id="litigasi" role="tabpanel" aria-labelledby="litigasi-tab">
						<b>Surat Kuasa Litigasi</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/skLitigasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
								<input type="hidden" name="jenis_skLit" value="litigasi">
								<div class="form-group">
									<label class="col-md-1 control-label">File</label>
									<div class="col-md-11">
										<input type="file" name="surat_kuasa" <?= $surat_kuasa ? 'disabled' : '' ?>>
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
							<?php if (!$surat_kuasa) : ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
	<?php endif;
	if ($dasar_hukum && $surat_kuasa_1) : ?>
	<!-- Somasi -->
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
					<!-- Surat Peringatan -->
					<div class="tab-pane fade show active" id="peringatan" role="tabpanel" aria-labelledby="peringatan-tab">
						<b>Surat Peringatan</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/somasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara ?>">
								<div class="form-group">
									<label class="col-md-3 control-label">Tanggal Terbit Surat Peringatan</label>
									<div class="col-md-3">
										<input type="date" name="tgl_terbit_surat_peringatan" class="form-control" placeholder="Tanggal Terbit Surat Peringatan" value="<?php echo $peringatan ? $peringatan->tgl_terbit_surat_peringatan : "" ?>" <?= $peringatan ? 'disabled' : '' ?>> 
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">File Surat Peringatan</label>
									<div class="col-md-9">
										<input type="file" name="surat_peringatan" multiple <?= $peringatan ? 'disabled' : '' ?>>
										<input type="text" class="form-control" name="surat_peringatan" <?= $peringatan ? 'disabled' : '' ?> value="<?php echo $peringatan ? $peringatan->file_surat_peringatan  : "Belum Ada File" ?>">
									</div>
								</div>
							</div>
							<?php if (!$peringatan) : ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							<?php endif; ?>
						</form>
					</div>
					<!-- Surat Balasan -->
					<div class="tab-pane fade" id="balasan" role="tabpanel" aria-labelledby="balasan-tab">
						<b>Surat Balasan</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/somasiSuratBalasan/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
								<div class="form-group">
									<label class="col-md-3 control-label">Tanggal Terima Surat Balasan</label>
									<div class="col-md-3">
										<input type="date" name="tgl_terima_surat_balasan" class="form-control" placeholder="Tanggal Terima Surat Balasan" value="<?php echo $balasan ? $balasan->tgl_surat_balasan : "" ?>" <?= $balasan ? 'disabled' : '' ?>> 
									</div>  
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">File Surat Balasan</label>
									<div class="col-md-9">
										<input type="file" name="surat_balasan" <?= $balasan ? 'disabled' : '' ?>>
										<input type="text" class="form-control" name="surat_balasan" disabled value="<?php echo $balasan ? $balasan->file_surat_balasan  : "Belum Ada File" ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-3">
										<select class="form-control" name="status_somasi" <?= $balasan ? 'disabled' : '' ?>>
										<option value="mediasi_non_pn" <?php echo $balasan && $balasan->status == 'mediasi_non_pn' ? 'selected' : '' ?>>Mediasi Non Pengadilan</option>
										<option value="pengadilan_negeri" <?php echo $balasan && $balasan->status == 'pengadilan_negeri' ? 'selected' : '' ?>>Pengadilan Negeri</option>
										</select>
									</div> 
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Notulen Somasi</label>
									<div class="col-md-9">
										<textarea class="form-control" name="notulen_somasi" placeholder="Notulen Somasi" <?= $balasan ? 'disabled' : '' ?>><?php echo $balasan ? $balasan->notulen_somasi : '' ?></textarea>
									</div>
								</div>
							</div>
							<?php if (!$balasan) : ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							<?php endif; ?>
						</form>
					</div>
					<!-- PErjanjan Damai -->
					<div class="tab-pane fade" id="perjanjian" role="tabpanel" aria-labelledby="perjanjian-tab">
						<b>Perjanjian Damai</b>
						<p>Perjanjian Damai ada jika kedua belah pihak menyepakati untuk berdamai</p>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/somasiAktaDamai/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>">
								<div class="form-group">
									<label class="col-md-3 control-label">File Perjanjian Damai(*jika mediasi saat somasi berhasil)</label>
									<div class="col-md-9">
										<input type="file" name="file_somasi" <?= $somasi ? 'disabled' : '' ?>>
										<input type="text" class="form-control" name="file_somasi" disabled value="<?php echo $somasi ? $somasi->file_somasi  : "Belum Ada File" ?>">
									</div>
								</div>
							</div>
							<?php if (!$somasi) : ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
	<?php endif;
	if ($dasar_hukum && $surat_kuasa && ($balasan && $balasan->status == 'pengadilan_negeri')) : ?>
	<!-- mediasi pengadilan negeri -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">4. Mediasi Pengadilan Negeri</h3>

				<div class="card-tools">

				</div>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/mediasiSubmit')?>" style="opacity:1;" enctype="multipart/form-data">
				<div class="card-body">
					<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara ?>">
					<div class="form-group">
						<label class="col-md-3 control-label">Status (Damai / Sidang)</label>
						<div class="col-md-9">
							<select class="form-control" name="status" <?= $mediasi ? 'disabled' : '' ?>>
								<option value="sidang" <?php echo $mediasi && $mediasi->status == 'sidang' ? 'selected' : '' ?>>Sidang</option>
								<option value="damai" <?php echo $mediasi && $mediasi->status == 'damai' ? 'selected' : '' ?>>Damai</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Akta Damai (* jika perkara menemui titik damai)</label>
						<div class="col-md-9">
							<input type="file" name="akta_damai" <?= $mediasi ? 'disabled' : '' ?>>
							<input type="text" class="form-control" disabled name="akta_damai" value="<?php echo $mediasi ? $mediasi->akta_damai  : "Belum Ada File" ?>">
						</div> 
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Keterangan</label>
						<div class="col-md-9">
							<textarea class="form-control" name="keterangan" placeholder="Keterangan Mediasi" <?= $mediasi ? 'disabled' : '' ?>><?php echo $mediasi ? $mediasi->keterangan : '' ?></textarea>
						</div>
					</div>
				</div>
				<?php if (!$mediasi) : ?>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">SIMPAN</button>
					</div>
				<?php endif; ?>
			</form>
		</div>
	<?php endif;
	if ($dasar_hukum && $surat_kuasa && ($balasan && $balasan->status == 'pengadilan_negeri') && ($mediasi && $mediasi->status == 'sidang')) : ?>
		<div class="card card-tabs">
			<h3 class="card-title">5. Persidangan Pengadilan Negeri</h3>
			<div class="card-header p-0 pt-1 border-bottom-0">
				<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="s1-tab" data-toggle="pill" href="#s1" role="tab" aria-controls="tab-s1" aria-selected="true">Sidang 1</a>
					</li>
					<?php if ($sidang1) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s2-tab" data-toggle="pill" href="#s2" role="tab" aria-controls="tab-s2" aria-selected="false">Sidang 2</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s3-tab" data-toggle="pill" href="#s3" role="tab" aria-controls="tab-s3" aria-selected="false">Sidang 3</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s4-tab" data-toggle="pill" href="#s4" role="tab" aria-controls="tab-s4" aria-selected="false">Sidang 4</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3 && $sidang4) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s5-tab" data-toggle="pill" href="#s5" role="tab" aria-controls="tab-s5" aria-selected="false">Sidang 5</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s6-tab" data-toggle="pill" href="#s6" role="tab" aria-controls="tab-s6" aria-selected="false">Sidang 6</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s7-tab" data-toggle="pill" href="#s7" role="tab" aria-controls="tab-s7" aria-selected="false">Sidang 7</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s8-tab" data-toggle="pill" href="#s8" role="tab" aria-controls="tab-s8" aria-selected="false">Sidang 8</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7 && $sidang8) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s9-tab" data-toggle="pill" href="#s9" role="tab" aria-controls="tab-s9" aria-selected="false">Sidang 9</a>
						</li>
					<?php endif;
					if ($sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7 && $sidang8 && $sidang9) : ?>
						<li class="nav-item">
							<a class="nav-link" id="s10-tab" data-toggle="pill" href="#s10" role="tab" aria-controls="tab-s10" aria-selected="false">Sidang 10</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="custom-tabs-three-tabContent">
					<!-- sidang 1-->
					<div class="tab-pane fade show active" id="s1" role="tabpanel" aria-labelledby="s1-tab">
						<b>Sidang Ke - 1</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara ?>">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang1 ? $sidang1->tgl_sidang : "" ?>" <?= $sidang1 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="input-group date" id="timepicker" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input" data-target="#timepicker">
									<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="far fa-clock"></i></div>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang1 ? $sidang1->jam_sidang : "" ?>" <?= $sidang1 ? 'disabled' : '' ?> readonly>
											<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
											</div>
										</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang1 ? $sidang1->jam_selesai_sidang : "" ?>" <?= $sidang1 ? 'disabled' : '' ?> readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang1 ? $sidang1->lokasi_pn : "" ?>" <?= $sidang1 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Penugasan Advokat :</label>
									<div class="col-md-9">
										<?php foreach ($tim_perkara as $tp){ ?>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo1) ? 'checked' : ''; ?> <?= $sidang1 ? 'disabled' : '' ?> disabled>
													<?php echo $tp->nama; ?>
												</label>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">Notulen</label>
										<div class="col-md-9">
											<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang1 ? $sidang1->notulen : "" ?></textarea>
										</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang1 ? $sidang1->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang1 ? $sidang1->file_persidangan : "" ?>" <?= $sidang1 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang1->notulen) && !isset($sidang1->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 2-->
					<div class="tab-pane fade" id="s2" role="tabpanel" aria-labelledby="s2-tab">
						<b>Sidang Ke - 2</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang2 ? $sidang2->tgl_sidang : "" ?>" <?= $sidang2 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang2 ? $sidang2->jam_sidang : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>readonly>
											<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
											</div>
										</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang2 ? $sidang2->jam_selesai_sidang : "" ?>" <?= $sidang2 ? 'disabled' : '' ?> readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang2 ? $sidang2->lokasi_pn : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang2 ? $sidang2->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang2 ? $sidang2->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang2 ? $sidang2->file_persidangan : "" ?>" <?= $sidang2 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang2->notulen) && !isset($sidang2->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 3-->
					<div class="tab-pane fade" id="s3" role="tabpanel" aria-labelledby="s3-tab">
						<b>Sidang Ke - 3</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang3 ? $sidang3->tgl_sidang : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang3 ? $sidang3->jam_sidang : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>readonly>
											<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
											</div>
										</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang3 ? $sidang3->jam_selesai_sidang : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang3 ? $sidang3->lokasi_pn : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang3 ? $sidang3->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang3 ? $sidang3->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang3 ? $sidang3->file_persidangan : "" ?>" <?= $sidang3 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang3->notulen) && !isset($sidang3->file_persidangan)){ ?>
								<div class="card-footer">
								<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 4-->
					<div class="tab-pane fade" id="s4" role="tabpanel" aria-labelledby="s4-tab">
						<b>Sidang Ke - 4</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
											<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang4 ? $sidang4->tgl_sidang : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang4 ? $sidang4->jam_sidang : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>readonly>
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
											</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang4 ? $sidang4->jam_selesai_sidang : "" ?>" <?= $sidang4 ? 'disabled' : '' ?> readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang4 ? $sidang1->lokasi_pn : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang4 ? $sidang4->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang4 ? $sidang4->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang4 ? $sidang4->file_persidangan : "" ?>" <?= $sidang4 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang4->notulen) && !isset($sidang4->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 5-->
					<div class="tab-pane fade" id="s5" role="tabpanel" aria-labelledby="s5-tab">
						<b>Sidang Ke - 5</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang5 ? $sidang5->tgl_sidang : "" ?>" <?= $sidang5 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang5 ? $sidang5->jam_sidang : "" ?>" <?= $sidang5 ? 'disabled' : '' ?> readonly>
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
											</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang5 ? $sidang5->jam_selesai_sidang : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang5 ? $sidang5->lokasi_pn : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang5 ? $sidang5->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang5 ? $sidang5->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang5 ? $sidang5->file_persidangan : "" ?>" <?= $sidang5 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang5->notulen) && !isset($sidang5->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 6-->
					<div class="tab-pane fade" id="s6" role="tabpanel" aria-labelledby="s6-tab">
						<b>Sidang Ke - 6</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang6 ? $sidang6->tgl_sidang : "" ?>" <?= $sidang6 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang6 ? $sidang6->jam_sidang : "" ?>" <?= $sidang6 ? 'disabled' : '' ?> readonly>
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
											</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang6 ? $sidang6->jam_selesai_sidang : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang6 ? $sidang6->lokasi_pn : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" <?= $sidang6 ? 'disabled' : '' ?>><?php echo $sidang6 ? $sidang5->notulen : "" ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang6 ? $sidang6->file_persidangan : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>>
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang6 ? $sidang6->file_persidangan : "" ?>" <?= $sidang6 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang6->notulen) && !isset($sidang6->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 7-->
					<div class="tab-pane fade" id="s7" role="tabpanel" aria-labelledby="s7-tab">
						<b>Sidang Ke - 7</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang7 ? $sidang7->tgl_sidang : "" ?>" <?= $sidang7 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang7 ? $sidang7->jam_sidang : "" ?>" <?= $sidang7 ? 'disabled' : '' ?> readonly>
											<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
											</div>
										</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
										<div class="input-group">
											<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang7 ? $sidang7->jam_selesai_sidang : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang7 ? $sidang7->lokasi_pn : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang7 ? $sidang7->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang7 ? $sidang7->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang7 ? $sidang7->file_persidangan : "" ?>" <?= $sidang7 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang7->notulen) && !isset($sidang7->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 8-->
					<div class="tab-pane fade" id="s8" role="tabpanel" aria-labelledby="s8-tab">
						<b>Sidang Ke - 8</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang8 ? $sidang8->tgl_sidang : "" ?>" <?= $sidang8 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang8 ? $sidang8->jam_sidang : "" ?>" <?= $sidang8 ? 'disabled' : '' ?> readonly>
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
											</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang8 ? $sidang8->jam_selesai_sidang : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang8 ? $sidang8->lokasi_pn : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>readonly>
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
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang8 ? $sidang8->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang8 ? $sidang8->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang8 ? $sidang8->file_persidangan : "" ?>" <?= $sidang8 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang8->notulen) && !isset($sidang8->file_persidangan)){ ?>
								<div class="card-footer">
								<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 9-->
					<div class="tab-pane fade" id="s9" role="tabpanel" aria-labelledby="s9-tab">
						<b>Sidang Ke - 9</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
								<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara ?>">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang9 ? $sidang9->tgl_sidang : "" ?>" <?= $sidang9 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang9 ? $sidang9->jam_sidang : "" ?>" <?= $sidang9 ? 'disabled' : '' ?> readonly>
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
											</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang9 ? $sidang9->jam_selesai_sidang : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang9 ? $sidang9->lokasi_pn : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Penugasan Advokat :</label>
									<div class="col-md-9">
										<?php foreach ($tim_perkara as $tp){ ?>
											<div class="checkbox">
											<label>
												<input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo9) ? 'checked' : ''; ?> <?= $sidang9 ? 'disabled' : '' ?>disabled>
												<?php echo $tp->nama; ?>
											</label>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">Notulen</label>
									<div class="col-md-9">
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang9 ? $sidang9->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
								<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
								<div class="col-md-9">
									<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang9 ? $sidang9->file_persidangan : "" ?>" >
									<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang9 ? $sidang9->file_persidangan : "" ?>" <?= $sidang9 ? 'disabled' : '' ?>>
								</div>
								</div>
							</div>
							<?php if (!isset($sidang9->notulen) && !isset($sidang9->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
					<!-- sidang 10-->
					<div class="tab-pane fade" id="s10" role="tabpanel" aria-labelledby="s10-tab">
						<b>Sidang Ke - 10</b>
						<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/ubahSidangbyAdvo')?>" style="opacity:1;" enctype="multipart/form-data">
							<div class="card-body">
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
										<input type="date" class="form-control" name="tgl_sidang" value="<?php echo $sidang10 ? $sidang10->tgl_sidang : "" ?>" <?= $sidang10 ? 'disabled' : '' ?> readonly>
									</div>
								</div>
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label class="col-md-3 control-label">Jam Persidangan</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang" value="<?php echo $sidang10 ? $sidang10->jam_sidang : "" ?>" <?= $sidang10 ? 'disabled' : '' ?> readonly>
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
											</div>
										</div>
										<label class="control-label" style="float: left;">s.d.</label>
										<div class="col-md-2">
											<div class="input-group">
												<input type="text" class="form-control timepicker" name="jam_sidang_selesai" value="<?php echo $sidang10 ? $sidang10->jam_selesai_sidang : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>readonly>
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
										<input type="text" class="form-control" name="pn" value="<?php echo $sidang10 ? $sidang10->lokasi_pn : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Penugasan Advokat :</label>
									<div class="col-md-9">
										<?php foreach ($tim_perkara as $tp){ ?>
											<div class="checkbox">
											<label>
												<input type="checkbox" name="nama_advokat[]" value="<?php echo $tp->nama; ?>" <?= in_array($tp->nama, $namaadvo10) ? 'checked' : ''; ?> <?= $sidang10 ? 'disabled' : '' ?>disabled>
												<?php echo $tp->nama; ?>
											</label>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">Notulen</label>
									<div class="col-md-9">
										<textarea class="form-control" name="notulen" placeholder="Notulen Persidangan" ><?php echo $sidang10 ? $sidang10->notulen : "" ?></textarea>
									</div>            
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">File Persidangan (* jika ada dokumen baru)</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="file_sidang" value="<?php echo $sidang10 ? $sidang10->file_persidangan : "" ?>" >
										<input type="text" class="form-control" name="file_sidang" disabled value="<?php echo $sidang10 ? $sidang10->file_persidangan : "" ?>" <?= $sidang10 ? 'disabled' : '' ?>>
									</div>
								</div>
							</div>
							<?php if (!isset($sidang10->notulen) && !isset($sidang10->file_persidangan)){ ?>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">SIMPAN</button>
								</div>
							<?php } ?>
						</form>
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
	<?php
	if ($dasar_hukum && $surat_kuasa && $mediasi && $sidang1 && $sidang2 && $sidang3 && $sidang4 && $sidang5 && $sidang6 && $sidang7 && $sidang8 && $sidang9 && $sidang10) : ?>
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">6. Putusan</h3>

				<div class="card-tools">

				</div>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo site_url('advokat/resumeSubmit/' . $perkara->id_perkara)?>" style="opacity:1;" enctype="multipart/form-data">
				<div class="card-body">
					<input type="hidden" name="id_perkara" value="<?php echo $perkara->id_perkara?>"> 
					<div class="form-group"> 
						<label class="col-md-2 control-label">Tanggal Putusan</label>
						<div class="col-md-10">
							<input type="date" name="tgl_putusan" class="form-control" placeholder="tanggal putusan" value="<?php echo $perkara ? $perkara->tgl_putusan : "" ?>"> 
						</div>
					</div>
					<div class="form-group"> 
						<label class="col-md-2 control-label">Keterangan Putusan</label>
						<div class="col-md-10">
							<textarea class="form-control" name="keterangan_putusan" placeholder="Keterangan Putusan"><?php echo $perkara ? $perkara->keterangan_putusan : 'Belum Ada' ?></textarea>
						</div>
					</div>
					<div class="form-group"> 
						<label class="col-md-2 control-label">File Resume</label>
						<div class="col-md-10">
							<input type="file" name="file_resume">
							<input type="text" class="form-control" value="<?php echo $perkara ? $perkara->file_resume : 'Belum Ada File' ?>">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">SIMPAN</button>
				</div>
			</form>
		</div>
	<?php endif;
	endif; ?>
</section>