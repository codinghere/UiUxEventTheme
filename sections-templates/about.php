<?php 
global $section_id;
$event_section_meta = get_post_meta( $section_id, 'event-section-about', true );
$event_about_image = wp_get_attachment_image_src( $event_section_meta['about_image'], 'full' );
$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;

?>
<!-- Start About Section -->
	<section class="section about-section section-padding position-relative">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-12">
					<!-- Start About Content -->
					<div class="about-content">
						<h2 class="position-relative"><?php echo esc_html($event_section_title ); ?></h2>
						<p><?php echo esc_html($event_section_description); ?></p>
						<a href="#" class="button shadow"><?php echo esc_html($event_section_meta['button_title']); ?></a>
					</div>
					<!-- End About Content -->
				</div>
				<div class="col-lg-6 col-md-12 d-flex justify-content-center">
					<!-- Start About PopUp Video Area -->
					<div
						class="about-popup-area d-flex justify-content-center align-items-center position-relative">
						<img src="<?php echo esc_url($event_about_image[0]); ?>" data-rjs="2" alt="" class="about-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/about.svg" alt="" class="svg about-svg">
						<!-- Start PopUp Play Button -->
						<a class="mfp-iframe video-play-button d-flex justify-content-center align-items-center position-absolute"
							href="<?php echo $event_section_meta['youtube_link']?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/play.png" alt="">
						</a>
						<!-- End PopUp Play Button -->

					</div>
					<!-- End About PopUp Video Area -->
				</div>
			</div>
		</div>
	</section>
<!-- End About Section -->