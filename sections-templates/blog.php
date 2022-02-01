<?php $args = array(
	    'post_type' 		=> 'post',
	    'post_status' 		=> 'publish',
	    'posts_per_page' 	=> 4,
		'cat' 				=> 10,
	);
	$query = new WP_Query($args);
	// $post_data = array();


	// if ( $query->have_posts() ) :
// endif;
		
		
		?>



<!-- Start Blog Section -->
	<section class="section section-blog position-relative section-padding">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-icon.png" alt="" class="icon-bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<!-- Start Section Title -->
					<div class="section-title text-center">
						  
					</div>
					<!-- End Section Title -->
				</div>
			</div>

			<div class="row">
				<?php 
			while ( $query -> have_posts()  ) :
			$query -> the_post();


			?>
				<div class="col-md-4 col-12">
					<!-- Start Single Blog Box -->
					<div class="single-blog-box first-item">

						<!-- Start Single Blog Image -->
						<div class="blog-image position-relative d-flex align-items-center justify-content-center">
							<div class="plus-sign position-absolute"></div>
							<a href="blog_details.html" class="d-block"><img src="<?php the_post_thumbnail(); ?>"
									data-rjs="2" alt=""></a>
						</div>
						<!-- End Single Blog Image -->

						<!-- Start Single Blog Content -->
						<div class="blog-content position-relative">
							<p class="single-blog-meta"><a href="#" class="date"><?php the_date( );?></a><?php _e( ' by','event' );?> <a
									class="category" href="<?php the_permalink(); ?>"><?php the_author();?></a> </p>
							<h3><a href="blog_details.html"><?php the_title( );?></a></h3>
							<p><?php the_content();?></p>
						</div>
						<!-- End Single Blog Content -->
					</div>
					<!-- End Single Blog Box -->
				</div>
			<?php

				endwhile;

				?>
				

				
			</div>
		</div>
	</section>
<!-- End Blog Section -->