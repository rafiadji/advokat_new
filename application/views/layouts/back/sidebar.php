<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?php echo site_url('assets/dist/img/logo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Buyung LawFirm</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php if($this->session->userdata('jabatan') == "ADM") : ?>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatPerkara')?>" class="nav-link">
						<i class="nav-icon fa fa-balance-scale"></i>
						<p>Perkara</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatKlien')?>" class="nav-link">
						<i class="nav-icon fas fa-portrait"></i>
						<p>Data Klien</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatKaryawan')?>" class="nav-link">
						<i class="nav-icon fa fa-id-card"></i>
						<p>Data Karyawan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihattim')?>" class="nav-link">
						<i class="nav-icon fas fa-comment-dots"></i>
						<p>Data Tim Advokat</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatjadwal')?>" class="nav-link">
						<i class="nav-icon fas fa-calendar-check"></i>
						<p>Jadwal Sidang</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatKonsultasi')?>" class="nav-link">
						<i class="nav-icon fas fa-balance-scale"></i>
						<p>Konsultasi</p>
					</a>
				</li>
				<?php endif;
				if($this->session->userdata('jabatan') == "ADV") :?>
				<li class="nav-item">
					<a href="<?php echo site_url('advokat/lihatPerkara')?>" class="nav-link">
						<i class="nav-icon fas fa-archive"></i>
						<p>Data Perkara Advokat</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('advokat/lihatKonsultasi')?>" class="nav-link">
						<i class="nav-icon fas fa-balance-scale"></i>
						<p>Konsultasi (Advokat)</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('advokat/lihatJadwal')?>" class="nav-link">
						<i class="nav-icon fas fa-calendar-alt"></i>
						<p>Jadwal Sidang Advokat</p>
					</a>
				</li>
				<?php endif;
				if($this->session->userdata('jabatan') == "K") :?>
				<li class="nav-item">
					<a href="<?php echo site_url('ketua/buatTimAdvokat')?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Tim Kuasa Hukum (menu ketua)</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('ketua/lihatKlien')?>" class="nav-link">
						<i class="nav-icon fas fa-portrait"></i>
						<p>Data Klien (menu ketua)</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('ketua/lihatKaryawan')?>" class="nav-link">
						<i class="nav-icon fas fa-id-card"></i>
						<p>Data Karyawan (menu ketua)</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('ketua/lihatPerkara')?>" class="nav-link">
						<i class="nav-icon fas fa-balance-scale"></i>
						<p>Data Perkara (menu ketua)</p>
					</a>
				</li>
				<?php endif;?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
