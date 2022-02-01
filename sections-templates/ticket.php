
<?php global $section_id;
$event_section_meta        = get_post_meta( $section_id, 'event-ticket-section', true );
$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;
?>
<!-- Start Ticket Section -->
	<section class="section section-ticket position-relative section-padding">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ticket-icon.png" alt="" class="icon-bg">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-lg-6">
					<!-- Start Section Title -->
					<div class="section-title text-center">
						<h2>
                            <?php
                                echo esc_html($event_section_title);
                            ?>

                         </h2>
                         <p><?php echo apply_filters('the_content',$event_section_description);?></p>
					<!-- End Section Title -->
				</div>
			</div>

			<div class="row">

				<?php

				$event_pricings=$event_section_meta['ticket'];
				// echo "<br>";
				// print_r($event_pricing['pricing']);
				// $event_persons=explode("\n",$event_section_meta['persons']) ;
				// $event_designation=explode("\n",$event_section_meta['designation']) ;
				
			
				foreach ($event_pricings as $event_pricing) :
				
					?>
						
					<div class="col-md-4 col-12">
						<!-- Start Single Pricing Box  -->
						<div class="single-pricing-box active second-item">
							<div class="pricing-box-header position-relative">
								<h2>&#36; <?php echo esc_html( $event_pricing['pricing'])?></h2>
								<p><?php echo $event_pricing['persons']; ?></p>
							</div>
							<div class="pricing-box-body">
								<ul class="pricing-list">
									

									
										<li><i class="fa fa-caret-right"></i><?php echo $event_pricing['designation']; ?></li>
										<?php
									// endforeach; ?>
									
								

								</ul>
								<a href="<?php echo esc_url( $event_pricing['button-action'])?>" class="button wbg pricing-box-btn">buy ticket</a>
							</div>
						</div>
					 </div> 
					<?php

				endforeach;

				?>
			

			</div>
		</div>
	</section>
<!-- End Ticket Section -->

