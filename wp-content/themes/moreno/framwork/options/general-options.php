<?php
$the_array = array();
	
	$the_array[] = array(
        'id'          => 'logo',
        'label'       => __('Logo Image', 'gittly'),
        'desc'        => __('Upload an image, specify an image URL, or leave blank to use title and description.', 'gittly'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  $the_array[] = array(
        'id'          => 'logo_top_margin',
        'label'       => __('Margin top of the Logo / Title(Home Page Only)', 'gittly'),
        'desc'        => __('PX', 'gittly'),
        'std'         => '170',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  $the_array[] = array(
        'id'          => 'logo_top_margin_inner',
        'label'       => __('Margin top of the Logo / Title(Inner pages only)', 'gittly'),
        'desc'        => __('PX', 'gittly'),
        'std'         => '70',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	$the_array[] = array(
        'id'          => 'show_description',
        'label'       => __('Show Description', 'gittly'),
        'desc'        => '',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general',
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
        'id'          => 'favicon',
        'label'       => __('Favicon Icon', 'gittly'),
        'desc'        => __('Upload a 16px x 16px png / gif image that will represent your website\'s favicon.', 'gittly'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
		
return $the_array;	