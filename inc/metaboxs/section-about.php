<?php

function event_about_section_metabox($metaboxes)
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
    if ('about' != $section_type) {
        return $metaboxes;
    }
    $metaboxes[] = array(
        'id'        => 'event-section-about',
        'title'     => __('About Settings', 'event'),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'id'     => 'event-about-section_section_one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'              => 'about_image',
                        'title'           => __('About Image', 'event'),
                        'type'            => 'image',
                    ),
                    array(
                        'id'              => 'button_title',
                        'title'           => __('Button  title', 'event'),
                        'type'            => 'text',
                    ),
                    array(
                        'id'              => 'youtube_link',
                        'title'           => __('Youtube Link', 'event'),
                        'type'            => 'text',
                    ),
                 
                   
                )
            ),

        )
    );
    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_about_section_metabox');