<?php

function event_speaker_section_metabox($metaboxes)
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
    if ('speaker' != $section_type) {
        return $metaboxes;
    }
    $metaboxes[] = array(
        'id'        => 'event-section-speaker',
        'title'     => __('Speakers ', 'event'),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'id'     => 'event-speaker-section_section_one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'           => 'speaker',
                        'type'         => 'group',
                        'title'        => __('Speakers','event'),
                        'button_title' => __('Add New', 'event'),
                        'according_title'=> __('Add New Field','event'),
                        'fields'       => array(
                            array(
                                'id'    => 'image',
                                'title' => __('Image', 'event'),
                                'type'  => 'image',
                            ),
                            array(
                                'id'    => 'name',
                                'title' => __('Name', 'event'),
                                'type'  => 'text',
                            ),

                            array(
                                'id'    => 'designation',
                                'title' => __('Designation', 'event'),
                                'type'  => 'text',
                            ),
                            array(
                                'id'     => 'social-links',
                                'type'   => 'fieldset',
                                'title'  => __('Social Links','event'),
                                'fields' => array(
                                    array(
                                        'id'    => 'facebook',
                                        'type'  => 'text',
                                        'title' => __('Facebook','event'),
                                    ),
                                    array(
                                        'id'    => 'twitter',
                                        'type'  => 'text',
                                        'title' => __('Twitter','event'),
                                    ),
                                    array(
                                        'id'    => 'instagram',
                                        'type'  => 'text',
                                        'title' => __('Instagram','event'),
                                    ),
                                     array(
                                        'id'    => 'vimeo',
                                        'type'  => 'text',
                                        'title' => __('Vimeo','event'),
                                    ),

                                ),
                            ),

                        )
                    )
                )
            )
        )

    );

    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_speaker_section_metabox');

