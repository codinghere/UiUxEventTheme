
	<!-- Start Footer Section -->
		<footer class="footer position-relative">
		

			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-icon.png" alt="" class="icon-bg">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/footer.svg" alt="Footer Shaped Image" class="svg footer-svg">
			<div class="container">
				<!-- Start Footer Top -->
				<div class="footer-top">
					<div class="row">
						<div class="col-12">

							<!-- Start Footer Logo -->
							<div class="footer-logo d-flex flex-wrap justify-content-center">
								<a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.png" alt=""></a>
							</div>
							<!-- End Footer Logo -->

							<!-- Start Footer Social -->
							<?php

								if (is_active_sidebar( "before-footer-right" )) {
									dynamic_sidebar("before-footer-right");
								}
								
							?>
							<!-- End Footer Social -->

							<!-- Start Footer Menu -->
							<?php 
								 wp_nav_menu(
								  array(
						        'theme_location'=>'footer-menu',
						        'menu_id'=>'',
						        'menu_class'=>'nav footer-menu flex-wrap justify-content-center'
						    	 )
									 );
							?>
							<!-- End Footer Menu -->
						</div>
					</div>
				</div>
				<!-- End Footer Top -->

				<!-- Start Footer Bottom -->
				<div class="footer-bottom text-center position-relative">
						<?php

								if (is_active_sidebar( "footer-bottom" )) {
									dynamic_sidebar("footer-bottom");
								}
								
							?>
				</div>
				<!-- End Footer Bottom -->
			</div>
		</footer>
		<!-- End Footer Section -->


		<!-- Start Scroll to top -->
		<div class="scrollToTop rounded-circle position-fixed">
			<i class="fa fa-angle-up position-absolute"></i>
		</div>
		<!-- End Scroll to top -->

	</div>
	<!-- End Page Wrapper -->

	<?php wp_footer();?>

</body>

</html>