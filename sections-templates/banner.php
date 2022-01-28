<?php

global $section_id;
$event_section_meta = get_post_meta( $section_id, 'event-section-banner', true );
$event_banner_image = wp_get_attachment_image_src( $event_section_meta['banner_image'], 'full' );
$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;

?>

<!-- Start Hero Section -->
	<section class="section hero-section section-overlay d-table position-relative"
		data-bg-img="<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg.jpg">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/hero.svg" class="svg hero-svg" alt="Hero Shaped Image">
		<div class="hero-inner d-table-cell">
			<!-- Start Float Icon Image -->
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-icon-bg.png" alt="" class="icon-bg">
			<!-- End Float Icon Image -->
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-12 text-center text-lg-left">
						<!-- Start Hero Content -->
						<div class="hero-content">
							<h1 data-animate="fadeInUp" data-delay=".5"><?php echo esc_html($event_section_title ); ?>
							</h1> 
							<h1>  </h1>
							<p data-animate="fadeInUp" data-delay=".7">
								<span class="d-inline-block"><i class="fa fa-calendar"></i>
									<?php echo esc_html($event_section_meta['date_picker']); ?></span>
								<span class="d-inline-block"><i class="fa fa-map-marker"></i>
									<?php echo esc_html($event_section_meta['places']); ?></span>
							</p>
							<a href="<?php echo esc_url($event_section_meta['button_target']) ?>" class="button wbg" data-animate="fadeInUp" data-delay=".9"><?php echo esc_html($event_section_meta['button_title']); ?></a>
						</div>
						<!-- End Hero Content -->
					</div>
					<div class="col-lg-6 col-12 text-center text-lg-right">
						<!-- Start Hero Object Image -->
						<div class="hero-object-img">
							<img src="<?php  echo esc_url( $event_banner_image[0] ); ?>" data-rjs="2" alt="" class="v-move">
						</div>
						<!-- End Hero Object Image -->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End Hero Section -->