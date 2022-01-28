
<?php


global $section_id;
// $event_section_meta = get_post_meta( $section_id, 'event-section-', true );
// $event_about_image = wp_get_attachment_image_src( $event_section_meta['about_image'], 'full' );
$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;



?>
	

<!-- Start Schedule Section -->
<section class="section schedule-section section-padding position-relative">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/img/schedule-icon-bg.png" alt="" class="icon-bg">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-6">
				<!-- Start Section Title -->
				<div class="section-title text-center">
					<h2><?php echo esc_html($event_section_title ); ?></span></h2>
					<p><?php echo esc_html($event_section_description); ?></p>
				</div>
				<!-- End Section Title -->
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-12">
				<div class="tab-title d-flex justify-content-center">
					<!-- Start Tab Menu -->
					<ul class="nav tab-menu justify-content-center shadow" id="myTab" role="tablist">
						<?php
						$event_counter = 0;
						$event_feat_categories = get_terms(array(
							'taxonomy'=> 'category',
							'meta_key'=> 'event-tax-featured',
							'meta_value'=> 'a:1:{s:8:"featured";b:1;}'
						)); 
						if ($event_feat_categories) :
							foreach ($event_feat_categories as $event_feat_category) :
								$event_counter++;
									?>
									<li class="nav-item">
										<a class="nav-link <?php if($event_counter ==1){ echo 'active';}?>" data-toggle="tab" href="#<?php echo esc_attr($event_feat_category->slug); ?>" role="tab"aria-selected="<?php if($event_counter ==1){ echo 'true';}?>"><?php echo esc_html($event_feat_category->name) ;?></a>
									</li>
								<?php
							endforeach;
						endif;
						?>
						
					</ul>
					<!-- End Tab Menu -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<!-- Start Tab Content -->
				<div class="tab-content" id="myTabContent">
					<?php 
					$event_counter = 0;
					foreach ($event_feat_categories as $event_feat_category) :
					$event_counter++;
					 ?>
					<!-- Start Tab Pane -->
					<div class="tab-pane fade show <?php if($event_counter ==1){ echo 'active';}?>" id="<?php echo esc_attr($event_feat_category->slug); ?>" aria-labelledby="<?php echo esc_attr($event_feat_category->slug);?>">
						<?php 
						$event_arguments = array(
							'post_type'=>'schedule',
							'post_per_page'=>-1,
							'tax_query'=>array(
								array(
									'taxonomy'=>'category',
									'field'=>'slug',
									'terms'=>$event_feat_category->name
								)
							)
						);
						$event_featured_schedule = new WP_Query($event_arguments);
						while ($event_featured_schedule->have_posts()):
							$event_featured_schedule->the_post();
							?>
							<!-- Start Tab Pane Single Box -->
							<div class="tab-pane-single-box d-flex flex-wrap align-items-center">
								<!-- Start Tab Pane Single Box Img Area -->
								<div class="tab-pane-single-box-img d-flex align-items-center">
									<div class="img-wrap rounded-circle">
										<!-- <img src="" alt="" class="rounded-circle"> -->
											<?php
											 the_post_thumbnail( 'post-thumbnail',['160','160','class' => 'rounded-circle'] ) ;
										// the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']);
											 ?>
									</div>
									<h6 class="text-center"> <?php
										  $event_schedule_meta =get_post_meta( get_the_ID(), 'event-schedule-type',true ) ;
										  echo $event_schedule_meta['name'];
										?>
										<span class="d-block">
										<?php
										  $event_schedule_meta =get_post_meta( get_the_ID(), 'event-schedule-type',true ) ;
										  echo $event_schedule_meta['designation'];
										?> 
										</span>
									</h6>
								</div>
								<!-- End Tab Pane Single Box Img Area -->

								<!-- Start Tab Pane Single Box Content -->
								<div class="tab-pane-single-box-content">
									<h4>
										<a href="<?php the_permalink();?>">
										<?php the_title( );?>"</a>
									</h4>
									<?php the_content();?>
									<div class="d-flex flex-wrap tab-pane-content-meta">
										<p><span><?php _e('time','event' )?> &#58;</span>
										 <?php
										  $event_schedule_meta =get_post_meta( get_the_ID(), 'event-schedule-type',true ) ;
										  echo $event_schedule_meta['time'];
										?>
										</p>
										<p><span><?php _e('venue','event' )?></span>
										  <?php
										  $event_schedule_meta =get_post_meta( get_the_ID(), 'event-schedule-type',true ) ;
										  echo $event_schedule_meta['venue'];
											?>
										</p>
									</div>
								</div>
								<!-- End Tab Pane Single Box Content -->
							</div>
							<!-- End Tab Pane Single Box -->
						</div>
							<?php

					 	endwhile; ?>
					 <?php wp_reset_query();?>

					

					 <!-- Start Tab Pane Button -->
						<div class="tab-pane-btn d-flex justify-content-center">
							<a href="#" class="button shadow">view full schedule</a>
						</div>
						<!-- End Tab Pane Button -->

					</div>
					<!-- End Tab Pane -->

				</div>
				<!-- End Tab Content -->
			<?php endforeach;?>
			</div>
		</div>
	</div>
</section>
<!-- End Schedule Section -->