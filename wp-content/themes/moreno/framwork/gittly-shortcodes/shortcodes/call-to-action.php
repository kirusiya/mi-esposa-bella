<?php
/*-------------------------------------------
***Call To Action***
-------------------------------------------*/
add_shortcode('call_to_action', 'big_shortcode_call_to_action');
function big_shortcode_call_to_action( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Sample Title Text Is here.',
		'text' => '',
		'link' => '#',
		'button_text' => 'Call To Action',
		'button_color' => '',
		'button_top_margin' => '20',
		'class' => '',
		'id' => '',
	), $atts ) );
	
	if($id){ $id = 'id="'.$id.'" ';}
   
	$output = '';
	$output .= '<div class="call-to-action" '.$id.'>';
		$output .= '<div><a href="'.$link.'" class="button '.$button_color.' big" style="margin-top: '.$button_top_margin.'px;">'.$button_text.'</a></div>';
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.$text.'</p>';
	$output .= '</div>';
		
	return $output;
}