<?php
$the_array = array();

	$the_array[] = array(
        'id'          => 'wpage_images',
        'label'       => __('Slideshow Images', 'gittly'),
        'desc'        => __('This is the Default Background Gallery of the site.', 'gittly'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
	);
return $the_array;	