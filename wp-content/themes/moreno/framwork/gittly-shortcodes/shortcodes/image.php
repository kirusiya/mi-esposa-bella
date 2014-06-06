<?php
/*-------------------------------------------
***Image***
-------------------------------------------*/
add_shortcode('image', 'big_shortcode_image');
function big_shortcode_image( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'src' => '',
		'title' => '',
		'width' => '',
		'height' => '',
		'class' => '',
		'id' => '',
		'style' => '',
		'align' => ''
	), $atts ) );
	
	if($title){ $title = 'title="'.$title.'" alt="'.$title.'" ';}
	if($height){ $height = 'height="'.$height.'" ';}
	if($width){ $width = 'width="'.$width.'" ';}
	if($id){ $id = 'id="'.$id.'" ';}
	if($align){ $align = 'align'.$align;}
   
	$output = '<div><img class="'.$align.' '.$class.'" src="' . $src . '" ' . $height . $width . $id . $title . ' /></div>';
		
	return $output;
}