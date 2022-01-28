<?php

global $section_id;
$event_section_meta        = get_post_meta( $section_id, 'event-section-speaker', true );

$event_section             = get_post( $section_id );
$event_section_title       = $event_section->post_title;
$event_section_description = $event_section->post_content;



// $event_speakers = $event_section_meta['speaker']; 
//                 echo "</br>";
//                print_r($event_speakers);
//                echo "</br/";

?>



<!-- Start Speaker Section -->
        <section class="section speaker-section section-padding position-relative">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/speaker-icon.png" alt="" class="icon-bg">
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
                        </div>
                        <!-- End Section Title -->
                    </div>
                </div>

                <?php

                    $event_speakers = $event_section_meta['speaker']; 
                    // print_r($event_speakers);
                    // $event_speaker_image = wp_get_attachment_image_src( $event_speakers['image'], 'medium' );
                    // print_r($event_speaker_image[1]);
                    if ($event_speakers):                       
                ?>

                <div class="row">
                    <?php foreach ($event_speakers as $event_speaker):

                        $event_speaker_img = wp_get_attachment_image_src($event_speaker['image'],'large');

                        ?>
                    <div class="col-lg-4 col-md-6">
                        <!-- Start Speaker Gallery -->
                        <div class="speaker-gallery speaker-gallery2 rounded-circle position-relative">
                            <div class="gallery-inner">
                                <div class="speaker">
                                    <img src="<?php echo esc_url($event_speaker_img[0]); ?>" data-rjs="2" alt="<?php echo esc_html($event_speaker['name']); ?>">
                                </div>
                                <div class="speaker-hover d-flex flex-wrap">
                                    <div class="speaker-social position-relative d-flex flex-wrap">
                                        <a href="<?php echo esc_url( $event_speaker['social-links']['vimeo'] ); ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
                                        <a href="<?php echo esc_url( $event_speaker['social-links']['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="<?php echo esc_url( $event_speaker['social-links']['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="<?php echo esc_url( $event_speaker['social-links']['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                    <div class="speaker-meta text-center">
                                        <h5><?php echo esc_html($event_speaker['name']); ?>  <span ><?php echo esc_html($event_speaker['designation']); ?> </span></h5>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Speaker Gallery -->
                    </div>
                <?php endforeach;?>

                    
                </div>
            <?php endif;?>

            </div>
        </section>
        <!-- End Speaker Section -->
