<?php
/*-------------------------------------------
***Toggles***
-------------------------------------------*/
add_shortcode('toggle', 'big_shortcode_toggle');
function big_shortcode_toggle( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Toggle Title',
	), $atts ) );
   
	$output = '<div class="toggle">';
   		$output .= '<div class="title">' . $title . ' <span></span> </div>';
			
		$output .= '<div class="inner"><div>' .do_shortcode(wpautop(trim($content))) . '</div></div>';
	$output .= '</div>';
		
	return $output;
}