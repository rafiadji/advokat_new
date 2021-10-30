<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootstrap.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/style.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/dark.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/font-icons.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/animate.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/magnific-popup.css'); ?>" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url('assets/front/css/custom.css'); ?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>BUYUNG LAW FIRM</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

    <!-- Header
        ============================================= -->
        <header id="header" class="page-section dark" data-sticky-class="dark">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo
                        ============================================= -->
                        <div id="logo">
                            <a href="index.html" class="standard-logo" data-dark-logo="<?php echo base_url('assets/front/images/logo.png'); ?>"><img src="<?php echo base_url('assets/front/images/logo.png'); ?>" alt="Canvas Logo"></a>
                            <a href="index.html" class="retina-logo" data-dark-logo="<?php echo base_url('assets/front/images/logo.png'); ?>"><img src="<?php echo base_url('assets/front/images/logo@2x.png'); ?>" alt="Canvas Logo"></a>
                        </div><!-- #logo end -->

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                        </div>

                        <!-- Primary Navigation
                        ============================================= -->
                        <nav class="primary-menu">

                            <ul class="menu-container one-page-menu">
                                <li class="menu-item current"><a class="menu-link" href="<?php echo site_url(''); ?>"><div>Home</div></a></li>
								<?php if($this->session->userdata('username') != NULL) : ?>
									<li class="menu-item"><a class="menu-link" href="<?php echo site_url('client/daftarkonsultasi'); ?>"><div>Daftar Kosultasi</div></a></li>
									<li class="menu-item"><a class="menu-link" href="<?php echo site_url('client/konsultasi'); ?>"><div>Kosultasi</div></a></li>
									<li class="menu-item"><a class="menu-link" href="<?php echo site_url('client/profile'); ?>"><div>Profil</div></a></li>
									<li class="menu-item"><a class="menu-link" href="<?php echo site_url('logincalonklien/logout'); ?>"><div>Logout</div></a></li>
								<?php else: ?>
									<li class="menu-item"><a href="#myModal1" data-lightbox="inline" class="menu-link"><div>Login</div></a></li>
								<?php endif; ?>
                            </ul>

                        </nav><!-- #primary-menu end -->

                        <!-- Modal -->
                        <div class="modal1 mfp-hide" id="myModal1">
                            <div class="block mx-auto" style="background-color: #FFF; max-width: 700px;">
                                <div class="row m-0">
                                    <div class="col-md-6" data-height-xl="456" data-height-lg="456" data-height-md="456" data-height-sm="0" data-height-xs="0" style="background-image: url(<?php echo base_url('assets/front/images/4.jpg'); ?>); background-size: cover;"></div>
                                    <div class="col-md-6 col-padding" data-height-xl="456" data-height-lg="456" data-height-md="456" data-height-sm="456" data-height-xs="456">
                                        <div>
                                        <h4 class="text-uppercase ls1">Login</h4>
                                        <form action="<?php echo site_url('logincalonklien/proses')?>" class="row mb-0" style="max-width: 300px;" method="post">
                                            <div class="col-12 form-group">
                                                <label for="" class="text-capitalize font-weight-semibold">Username:</label>
                                                <input type="text" id="template-op-form-email" name="username" value="" class="sm-form-control" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="" class="text-capitalize font-weight-semibold">Password:</label>
                                                <input type="password" id="template-op-form-password" name="password" value="" class="sm-form-control" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <button type="submit" class="button button-rounded button-small button-dark m-0" value="submit">Login</button>
                                            </div>
                                        </form>
                                        <p class="mb-0"><small class="font-weight-light"><em>* No Credit Card Required</em></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->

		<?php echo $this->template->content; ?>

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-8">

							<div class="row col-mb-50">
								<div class="col-md-4">

									<div class="widget clearfix">

										<img src="images/footer-widget-logo.png" alt="Image" class="footer-logo">

										<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

										<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
											<address>
												<strong>Headquarters:</strong><br>
												795 Folsom Ave, Suite 600<br>
												San Francisco, CA 94107<br>
											</address>
											<abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
											<abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
											<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
										</div>

									</div>

								</div>

								<div class="col-md-4">

									<div class="widget widget_links clearfix">

										<h4>Blogroll</h4>

										<ul>
											<li><a href="https://codex.wordpress.org/">Documentation</a></li>
											<li><a href="https://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
											<li><a href="https://wordpress.org/extend/plugins/">Plugins</a></li>
											<li><a href="https://wordpress.org/support/">Support Forums</a></li>
											<li><a href="https://wordpress.org/extend/themes/">Themes</a></li>
											<li><a href="https://wordpress.org/news/">Canvas Blog</a></li>
											<li><a href="https://planet.wordpress.org/">Canvas Planet</a></li>
										</ul>

									</div>

								</div>

								<div class="col-md-4">

									<div class="widget clearfix">
										<h4>Recent Posts</h4>

										<div class="posts-sm row col-mb-30" id="post-list-footer">
											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>10th July 2021</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>10th July 2021</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>10th July 2021</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>

						<div class="col-lg-4">

							<div class="row col-mb-50">
								<div class="col-md-4 col-lg-12">
									<div class="widget clearfix" style="margin-bottom: -20px;">

										<div class="row">
											<div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
												<h5 class="mb-0">Total Downloads</h5>
											</div>

											<div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
												<h5 class="mb-0">Clients</h5>
											</div>
										</div>

									</div>
								</div>

								<div class="col-md-5 col-lg-12">
									<div class="widget subscribe-widget clearfix">
										<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
										<div class="widget-subscribe-form-result"></div>
										<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
											<div class="input-group mx-auto">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="icon-email2"></i></div>
												</div>
												<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
												<div class="input-group-append">
													<button class="btn btn-success" type="submit">Subscribe</button>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="col-md-3 col-lg-12">
									<div class="widget clearfix" style="margin-bottom: -20px;">

										<div class="row">
											<div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
												<a href="#" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
											</div>
											<div class="col-6 col-md-12 col-lg-6 clearfix">
												<a href="#" class="social-icon si-dark si-colored si-rss mb-0" style="margin-right: 10px;">
													<i class="icon-rss"></i>
													<i class="icon-rss"></i>
												</a>
												<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
											</div>
										</div>

									</div>
								</div>

							</div>

						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row col-mb-30">

						<div class="col-md-6 text-center text-md-left">
							Copyrights &copy; 2020 All Rights Reserved by Canvas Inc.<br>
							<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
						</div>

						<div class="col-md-6 text-center text-md-right">
							<div class="d-flex justify-content-center justify-content-md-end">
								<a href="#" class="social-icon si-small si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-vimeo">
									<i class="icon-vimeo"></i>
									<i class="icon-vimeo"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-github">
									<i class="icon-github"></i>
									<i class="icon-github"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-yahoo">
									<i class="icon-yahoo"></i>
									<i class="icon-yahoo"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
							</div>

							<div class="clear"></div>

							<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
						</div>

					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="<?php echo base_url('assets/front/js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/front/js/plugins.min.js'); ?>"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url('assets/front/js/functions.js'); ?>"></script>

	<script>
		$(function() {
			$( "#side-navigation" ).tabs({ show: { effect: "fade", duration: 400 } });
		});
	</script>

</body>
</html>