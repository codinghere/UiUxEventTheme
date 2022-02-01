<?php

function event_ticket_section_metabox($metaboxes)
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
    if ('ticket' != $section_type) {
        return $metaboxes;
    }
    $metaboxes[] = array(
        'id'        => 'event-ticket-section',
        'title'     => __('Ticket ', 'event'),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'id'     => 'event-ticket-section_section_one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'           => 'ticket',
                        'type'         => 'group',
                        'title'        => __('Ticket Pricing','event'),
                        'button_title' => __('Add New', 'event'),
                        'according_title'=> __('Add New Field','event'),
                        'fields'       => array(
                            array(
                                'id'    => 'pricing',
                                'title' => __('Price', 'event'),
                                'type'  => 'text',
                            ),
                            array(
                                'id'    => 'persons',
                                'title' => __('Persons ', 'event'),
                                'type'  => 'textarea',
                            ),

                            array(
                                'id'    => 'designation',
                                'title' => __('Designation', 'event'),
                                'type'  => 'textarea',
                            ), array(
                                'id'    => 'button-action',
                                'title'   => __( 'Button Url', 'meal' ),
                                'type'    => 'text',
                            )

                        )
                    )
                )
            )
        )

    );

    return $metaboxes;
}

add_filter('cs_metabox_options', 'event_ticket_section_metabox');

