<?php
$the_array = array();
	
	$the_array[] = array(
        'id'          => 'blog_title',
        'label'       => __('Blog Page Title', 'gittly'),
        'desc'        => '',
        'std'         => 'Our Blog',
        'type'        => 'text',
        'section'     => 'blog_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );
	  
	$the_array[] = array(
        'id'          => 'blog_subtitle',
        'label'       => __('Blog Page Sub Title', 'gittly'),
        'desc'        => '',
        'std'         => 'See What is going on!',
        'type'        => 'text',
        'section'     => 'blog_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      );

	$the_array[] = array(
        'id'          => 'blog_comment',
        'label'       => __('Enable Comment', 'gittly'),
        'desc'        => __('You can enable or disable comment On Single Post page', 'gittly'),
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'blog_page',
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