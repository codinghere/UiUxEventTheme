<?php


function event_sponser_section_type_metabox($metaboxes)
{
    $section_id = 0;
    if (isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])) {
        $section_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if ('section' != get_post_type($section_id)){
        return $metaboxes;
    }
    $section_meta = get_post_meta($section_id, 'event-section-type', true);
    $section_type = $section_meta['type'];
    if ('sponsor' != $section_type) {
        return $metaboxes;
    }
    $metaboxes[] = array(
        'id'        => 'event-sponser-type',
        'title'     => __('Sponsers ', 'event'),
        'post_type' => 'section',
        'context'    => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'id'     => 'event-speaker-section_section_one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'           => 'sponsers',
                        'type'         => 'group',
                        'title'        => __('Sponsers','event'),
                        'button_title' => __('Add New', 'event'),
                        'according_title'=> __('Add New Field','event'),
                        'fields'       => array(
                            array(
                                'id'    => 'name',
                                'title' => __('Name ', 'event'),
                                'type'  => 'text',
                            ),
                            array(
                              'id'    => 'sponsers-gallery',
                              'type'  => 'gallery',
                              'title' => __( 'Gallery',  'event' ),
                              'add_title' => __( 'Add an Image',  'event' ),
                              'edit_title' => __( 'Edit Gallery',  'event' ),
                              'clear_title' => __( 'Clear Gallery',  'event' )
                            ),

                         

                        )
                    )
                )
            )
        )
    );
    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_sponser_section_type_metabox');