<?php
/*-------------------------------------------
***Code***
-------------------------------------------*/
add_shortcode('code', 'big_shortcode_code');
function big_shortcode_code($atts, $content = null, $code) {
	extract( shortcode_atts( array(
   		'style' => '1', //1,  2, 3, 4
   ), $atts ) );
	
	return '<code>'.wpautop(trim($content)).'</code>';
}