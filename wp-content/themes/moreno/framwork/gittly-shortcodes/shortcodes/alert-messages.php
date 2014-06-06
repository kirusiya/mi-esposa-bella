<?php
/*-------------------------------------------
***Alert & Block Messages***
-------------------------------------------*/
add_shortcode('alert', 'big_shortcode_aleart_message');
function big_shortcode_aleart_message( $atts, $content = null ) {
   extract( shortcode_atts( array(
   		'type' => 'notice',
   ), $atts ) );
   
   $output = '<div class="alert-message '.$type.'">';
   		$output .= '<a hidden="#" class="close">x</a>';
		$output .= do_shortcode(wpautop(trim($content)));
	$output .= '</div>';
		
	return $output;
}