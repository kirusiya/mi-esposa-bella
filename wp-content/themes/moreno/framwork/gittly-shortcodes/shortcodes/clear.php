<?php
/*-------------------------------------------
***Link***
-------------------------------------------*/
add_shortcode('clear', 'big_shortcode_clear');
function big_shortcode_clear( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'height' => '1',
		'class' => '',
		'id' => '',
	), $atts ) );
	
	if($class){$class='class="'.$class.'"';}
	if($id){$id='id="'.$id.'"';}
   
	$output = '<div '.$class.' '.$id.' style="height:'.$height.'px; width:100%; clear:both;"></div>';
		
	return $output;
}