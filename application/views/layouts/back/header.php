<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="<?php echo site_url('assets/dist/img/logoadvokat.jpg'); ?>" class="user-image img-circle elevation-2" alt="User Image">
				<span class="d-none d-md-inline"><?php echo $this->session->userdata('nama'); ?></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<!-- User image -->
				<li class="user-header bg-primary">
					<img src="<?php echo site_url('assets/dist/img/logoadvokat.jpg'); ?>" class="img-circle elevation-2" alt="User Image">

					<p>
						<?php echo $this->session->userdata('nama') . " - " . $this->session->userdata('jabatan') ; ?>
					</p>
				</li>
				<!-- Menu Body -->
				<!-- <li class="user-body">
					
				</li> -->
				<!-- Menu Footer-->
				<li class="user-footer">
					<a href="<?php echo site_url('login/logout') ?>" class="btn btn-default btn-flat float-right">Sign out</a>
				</li>
			</ul>
		</li>
	</ul>
</nav>