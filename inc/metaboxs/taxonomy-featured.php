<?php

function event_featured_category($metaboxes){
	$metaboxes[]   = array(
		'id'       => 'event-tax-featured',
		'taxonomy' => 'category',
		'fields'   => array(
			array(
				'id'    => 'featured',
				'type'  => 'switcher',
				'title' => __('Featured','event')
			),
		),
	);

	return $metaboxes;
}
add_filter('cs_taxonomy_options','event_featured_category');