<?php
/*-------------------------------------------
***dropcap***
-------------------------------------------*/
add_shortcode('dropcap', 'big_shortcode_dropcap');
function big_shortcode_dropcap($atts, $content = null, $code) {
	extract( shortcode_atts( array(
   		'style' => '1', //1,  2, 3, 4
   ), $atts ) );
	
	return '<span class="dropcap'.$style.'">'.$content.'</span>';
}