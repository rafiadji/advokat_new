<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $this->template->title->prepend("Buyung Lawfirm | "); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Begin CSS Default -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
	<!-- End CSS Default -->
	<?php echo $this->template->stylesheet; ?>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php
		echo $this->template->widget("b_header");
		echo $this->template->widget("b_sidebar");
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php echo $this->template->content; ?>
		</div>
		<!-- /.content-wrapper -->

		<?php echo $this->template->widget("b_footer"); ?>
	</div>
	<!-- ./wrapper -->
	<!-- Begin JS Default -->
	<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<!-- End JS Default -->
	<?php echo $this->template->javascript; ?>
	<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
	<script>
		$(function() {
			$(".datatable").DataTable({
				"ordering":false,
				"responsive": true,
			});
		});
	</script>
</body>

</html>