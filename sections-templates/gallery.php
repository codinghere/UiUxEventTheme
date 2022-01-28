<?php

global $section_id;
$event_section_meta        = get_post_meta( $section_id, 'event-gallery-type', true );
$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;

?>


<!-- Start Gallery Section -->
        <section class="section gallery-section section-padding position-relative">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery-icon.png" alt="" class="icon-bg">
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
            </div>

            <!-- Start Gallery Wrapper -->
            <div class="gallery-image-wrapper d-flex flex-wrap">
                <?php if ($event_section_meta['opt-gallery-1']){
                    $event_gallery_images = explode(",", $event_section_meta['opt-gallery-1']);
                    foreach ($event_gallery_images as $event_gallery_image) {  
                      ?>
                        <!-- Start Single Gallery Image -->
                       <a href="<?php echo wp_get_attachment_image_url( $event_gallery_image,'medium' ); ?>" class="single-gallery-image position-relative d-flex align-items-center justify-content-center">
                            <div class="plus-sign position-absolute"></div>
                            <img src="<?php echo wp_get_attachment_image_url( $event_gallery_image,'medium' ); ?>" data-rjs="2" alt="">
                        </a>
                           <!-- End Single Gallery Image -->
                      <?php
                    }
                }?>    

            </div>
            <!-- End Gallery Wrapper -->
        </section>
<!-- End Gallery Section -->






