<?php
/*-------------------------------------------
***Quotes***
-------------------------------------------*/
add_shortcode('quote', 'big_shortcode_quote');
function big_shortcode_quote( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
		'id' => '',
	), $atts ) );
	
	if($id){ $id = 'id="'.$id.'" ';}
	if($class){ $class = 'class="'.$class.'" ';}
   
	$output = '<blockquote '. $id . $class . '>'.$content.'</blockquote>';
		
	return $output;
}