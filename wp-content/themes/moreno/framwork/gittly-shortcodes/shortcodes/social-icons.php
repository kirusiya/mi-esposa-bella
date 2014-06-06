<?php
/*-------------------------------------------
***Icons***
-------------------------------------------*/
add_shortcode('social_icon', 'big_shortcode_social_icons');
function big_shortcode_social_icons( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'link' => '',
		'title' => '',
		'class' => '',
		'type' => '', /* dribbble, facebook, flickr, linkedin, picasa, rss, stumbleupon, twitter, viemo */
	), $atts ) );
	
   	$icon = '';
	
	
	$output = '<a href="'.$link.'" target="_blank" title="'.$title.'" class="'.$class.'"><img class="social_hover" src="'.GITTLY_SHORTCODE_IMG.'/social-icons/'.$type.'.png" alt="'.$title.'" /></a>';		
	return $output;
}