<?php
/*-------------------------------------------
***Divider***
-------------------------------------------*/
add_shortcode('hr', 'big_shortcode_divider');
function big_shortcode_divider($atts, $content = null, $code) {
	extract( shortcode_atts( array(
   		'type' => 'hr', //hr,  hr2, hr3, hr4
		'margin_top' => '',
		'margin_bottom' => ''
   ), $atts ) );
   $con = '';
	if($type == 'hr4'){
		$con .= '<span class="seperator"></span>';
		$con .= '<span class="lightborder"></span>';
	}
	if($margin_top){
		$margin_top = 'margin-top:'.$margin_top.'px;';
	}
	
	if($margin_bottom){
		$margin_bottom = ' margin-bottom:'.$margin_bottom.'px;';
	}
	
	return '<div style="clear:both;"></div><div class="'.$type.'" style="'.$margin_top.$margin_bottom.'">'.$con.'</div>';
}