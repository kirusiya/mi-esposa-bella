<?php
/*-------------------------------------------
***Title***
-------------------------------------------*/
add_shortcode('title', 'big_shortcode_title');
function big_shortcode_title( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'style' => '1',
		'tag' => 'h2',
		'class' => '',
		'id' => '',
	), $atts ) );
	
	if($id){ $id = 'id="'.$id.'"';}
 
	$output = '<'.$tag.' class="title_'.$style.' '.$class.'" '.$id.'><span>'.do_shortcode(wpautop(trim($content))).'</span></'.$tag.'>';
		
	return $output;
}