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
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatPerkara')?>" class="nav-link">
						<i class="nav-icon fa fa-balance-scale"></i>
						<p>Perkara</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatKlien')?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Data Klien</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatKaryawan')?>" class="nav-link">
						<i class="nav-icon fa fa-user"></i>
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
					<a href="<?php echo site_url('admin/lihatkeuangan')?>" class="nav-link">
						<i class="nav-icon fas fa-money-bill"></i>
						<p>Keuangan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('admin/lihatjadwal')?>" class="nav-link">
						<i class="nav-icon fas fa-calendar-check"></i>
						<p>Jadwal Sidang</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
