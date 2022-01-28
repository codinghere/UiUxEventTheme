<?php


function event_section_type_metabox($metaboxes)
{
    $metaboxes[] = array(
        'id'        => 'event-section-type',
        'title'     => __('section type', 'event'),
        'post_type' => 'section',
        'context'    => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'     => 'event-section-type_section_one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'    => 'type',
                        'title'   => __('Select section type', 'event'),
                        'type'    => 'select',
                        'options' => array(

                                'banner'       => __('Banner', 'event'),
                                'about'     => __('About Conference', 'event'),
                                'speaker'      => __('Event Speaker', 'event'),
                                'schedule'         => __('Schedule Plane', 'event'),
                                'gallery'         => __('Latest Gallery', 'event'),
                                'ticket'     => __('Event Ticket', 'event'),
                                'sponsor'  => __('Our Sponser', 'event'),


                        )

                    )
                )
            ),

        )
    );
    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_section_type_metabox');