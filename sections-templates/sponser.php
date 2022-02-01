<?php
global $section_id;
$event_section_metas        = get_post_meta( $section_id, 'event-sponser-type', true );
$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;

?>


<!-- Start Sponsors Section -->
	<section class="section section-sponsors position-relative section-padding">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/sponsors-icon.png" alt="" class="icon-bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<!-- Start Section Title -->
					<div class="section-title text-center">
						<h2><?php echo esc_html($event_section_title); ?></h2>
                            <p><?php echo esc_html($event_section_description); ?></p>
					</div>
					<!-- End Section Title -->
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<?php
				
				 if ($event_section_metas): 
				 	// $event_sponsers_images= explode(",", $event_section_metas['opt-gallery-1']);

				 	foreach($event_section_metas['sponsers'] as $event_section_meta):
				 	 
				 		
					?>
					<!-- Start Platinum Carousel Heading -->
					<h3 class="sponsor-heading text-center"><?php echo esc_html($event_section_meta['name']);?></h3>
					<!-- End Platinum Carousel Heading -->

					<!-- Start Platinum Carousel -->
					<div class="owl-carousel platinum-carousel">

						<!-- Start Platinum Single Sponsor Logo -->
						<div class="sponsor-logo d-flex justify-content-center">
							<?php 
							$event_sponsers_images = explode(",", $event_section_meta['sponsers-gallery']);
							echo "<br>";
							print_r($event_sponsers_images);
							?>
							<img src="<?php echo wp_get_attachment_image_url( $event_sponsers_images,'medium' ); ?>" alt="">
						</div>
						<!-- End Platinum Single Sponsor Logo -->
					</div>
					<!-- End Platinum Carousel -->

					
					<!-- End Gold Carousel -->
					
					<?php
				endforeach;
			 	endif;
			 	?>
				</div>

			</div>
		</div>
	</section>
<!-- End Sponsors Section -->