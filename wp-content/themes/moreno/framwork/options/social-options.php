<?php
$the_array = array();
	$the_array[] = array(
        'id'          => 'social_enable',
        'label'       => __('Enable Social Bar', 'gittly'),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      );
	
	  $the_array[] = array(
        'id'          => 'social_twitter',
        'label'       => __('Twitter Profile URL', 'gittly'),
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  
	  $the_array[] = array(
        'id'          => 'social_dribbble',
        'label'       => __('Dribbble Profile URL', 'gittly'),
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  
	  $the_array[] = array(
        'id'          => 'social_facebook',
        'label'       => __('Facebook Profile URL', 'gittly'),
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  
	  $the_array[] = array(
        'id'          => 'social_vimeo',
        'label'       => __('Vimeo Profile URL', 'gittly'),
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
return $the_array;	