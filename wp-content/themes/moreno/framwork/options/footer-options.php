<?php
$the_array = array();
	
	  $the_array[] = array(
        'id'          => 'footer_copyright_text',
        'label'       => __('Copyright Text', 'gittly'),
        'desc'        => '',
        'std'         => '&copy; Copyright 2013 <span>Moreno Geremetta</span> |  All Rights Reserved ',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  
	  $the_array[] = array(
        'id'          => 'enable_footer',
        'label'       => __('Enable Footer', 'gittly'),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'footer',
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
return $the_array;	