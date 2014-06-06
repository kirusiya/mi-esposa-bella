<?php
/*-------------------------------------------
***Link***
-------------------------------------------*/
add_shortcode('link', 'big_shortcode_link');
function big_shortcode_link( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'link' => '',
		'title' => '',
		'rel' => '',
		'class' => '',
		'id' => '',
	), $atts ) );
	
	if($title){$title='title="'.$title.'"';}
	if($rel){$rel='rel="'.$rel.'"';}
	if($class){$class='class="'.$class.'"';}
	if($id){$id='id="'.$id.'"';}
   
   $output .= '<a href="'.$link.'" '.$title.' '.$rel.' '.$class.' '.$id.'>';
		$output .= $content;
	$output .= '</a>';
		
	return $output;
}