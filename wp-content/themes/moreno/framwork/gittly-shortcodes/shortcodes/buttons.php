<?php
/*-------------------------------------------
***Buttons***
-------------------------------------------*/
add_shortcode('button', 'big_shortcode_button');
function big_shortcode_button( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'text' => 'Button',
		'link' => '#',
		'color' => '',
		'size' => 'medium',
		'target' => '_parent',
		'icon' => '',
		'class' => '',
		'id' => '',
		'title' => '',
	), $atts ) );
	
	if($target){$target='target="'.$target.'" ';}
	if($title){$title='title="'.$title.'" ';}
	if($id){$id='id="'.$id.'" ';}
	
	$the_class = 'class="button '.$color.' '.$size.' '.$class.'" ';
   
	$output = '<a href="'.$link.'" '. $the_class . $id . $title . $target .' >'.$text.'</a>';
		
	return $output;
}