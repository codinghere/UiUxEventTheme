<?php

function event_banner_section_metabox($metaboxes)
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
    if ('banner' != $section_type) {
        return $metaboxes;
    }
    $metaboxes[] = array(
        'id'        => 'event-section-banner',
        'title'     => __('Banner Settings', 'event'),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'id'     => 'event-banner-section_section_one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'              => 'banner_image',
                        'title'           => __('Banner Image', 'event'),
                        'type'            => 'image',
                    ),
                    array(
                        'id'              => 'button_title',
                        'title'           => __('Button  title', 'event'),
                        'type'            => 'text',
                    ),
                    array(
                        'id'              => 'button_target',
                        'title'           => __('Button target', 'event'),
                        'type'            => 'text',
                    ),
                    array(
                        'id'              => 'date_picker',
                        'title'           => __('Date Picker', 'event'),
                        'type'            => 'text',
                    ),
                    array(
                        'id'              => 'places',
                        'title'           => __('Place', 'event'),
                        'type'            => 'text',
                    ),
                   
                )
            ),

        )
    );
    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_banner_section_metabox');