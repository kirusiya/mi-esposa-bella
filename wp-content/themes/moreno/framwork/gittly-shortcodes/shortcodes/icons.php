<?php
/*-------------------------------------------
***Icons***
-------------------------------------------*/
add_shortcode('icon', 'big_shortcode_icons');
function big_shortcode_icons( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'src' => '',
		'title' => '',
		'width' => '',
		'height' => '',
		'class' => '',
	), $atts ) );
	
	
   
	$output = '<i class="scicon icon-'.$name.' '.$size.' '.$circle.'" style="background-color:#'.$bg.' !important; color: #'.$color.' !important;"></i>';		
	return $output;
}