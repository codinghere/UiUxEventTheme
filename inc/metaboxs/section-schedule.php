<?php


function event_schedule_section_type_metabox($metaboxes)
{
    $metaboxes[] = array(
        'id'        => 'event-schedule-type',
        'title'     => __('Schedule type', 'event'),
        'post_type' => 'schedule',
        'context'    => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'     => 'event-schedule-section-one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                     array(
                        'id'    => 'name',
                        'title'   => __('Select Speaker Name', 'event'),
                        'type'    => 'text'

                    ),
                    array(
                        'id'    => 'designation',
                        'title'   => __('Select Schedule Designation', 'event'),
                        'type'    => 'text'

                    ),
                    array(
                        'id'    => 'time',
                        'title'   => __('Select Schedule Time', 'event'),
                        'type'    => 'text'

                    ),
                    array(
                        'id'    => 'venue',
                        'title'   => __('Select Schedule Venue', 'event'),
                        'type'    => 'text'

                    ),
                    
                )
            ),

        )
    );
    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_schedule_section_type_metabox');