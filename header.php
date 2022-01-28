<!DOCTYPE html>
<html <?php language_attributes(  );?> >

<head>

	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<?php wp_head(); ?>
</head>
<body <?php body_class();?> >

	<!-- Start Page Wrapper -->
	<div class="page-wrapper">

		<!-- Start Preloader -->
		<div class="preloader">
			<div class="wrap">
				<div class="loading">
					<div class="bounceball"></div>
					<div class="text"><?php _e( 'LOADING ...',  'event' ); ?></div>
				</div>
			</div>
		</div>
		<!-- End Preloader -->


		<!-- Start Header Area -->
		<header class="header fixed-top">
			<div class="container">
				<div class="row position-relative justify-content-between">
					<div class="col-4">
						<!-- Start Logo -->
						<div class="logo d-flex align-items-center">
							<a href="index.html">
								<?php
								 if ( function_exists( 'the_custom_logo' ) ) {
								    the_custom_logo();
									}
								?>
							</a>
						</div>
						<!-- End Logo -->
					</div>
					<!-- navigation menu -->
						<?php get_template_part("sections-templates/common/navigation");?>
				</div>
			</div>
		</header>
		<!-- End Header Area -->