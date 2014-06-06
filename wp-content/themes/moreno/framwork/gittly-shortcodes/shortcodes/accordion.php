<?php
/*-------------------------------------------
***accordion***
-------------------------------------------*/
add_shortcode('accordion', 'big_shortcode_accordion');
function big_shortcode_accordion( $atts, $content = null ) {
	$output = '';
	$output .= '<div class="accordion">';
		$output .= do_shortcode(wpautop(trim($content)));
	$output .= '</div>';
   
	return $output;
}

add_shortcode('ac_tab', 'big_shortcode_accordion_tab');
function big_shortcode_accordion_tab( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Tab Title',
	), $atts ) );
   
	$id = rand();
	$output = '';
		
	$output .= '<div class="title">';
		$output .= '<a href="#acc-'.$id.'">'.$title.'</a>';
	$output .= '</div>';
	
	$output .= '<div class="inner" id="acc-'.$id.'">';
		$output .= do_shortcode(wpautop(trim($content)));
		$output .= '<div class="clear"></div>';
	$output .= '</div>';
	
	return $output;
}