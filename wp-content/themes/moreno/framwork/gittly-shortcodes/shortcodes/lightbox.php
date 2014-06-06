<?php
/*-------------------------------------------
***Lightbox***
-------------------------------------------*/
add_shortcode('lightbox', 'big_shortcode_lightbox');
function big_shortcode_lightbox( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'src' => '',
		'title' => '',
		'group' => '',
		'width' => '100%',
		'height' => '100%',
		'iframe' => '',
	), $atts ) );
   
	if($group){
		$group = '['.$group.']';
	}
	
	if($iframe){
		$iframe = '?iframe=true&width='.$width.'&height='.$width.'';	
		$src = $src.$iframe;
	}
	
	ob_start();
	?><a href="<?php echo $src ?>" rel="prettyPhoto<?php echo $group ?>" title="<?php echo $title ?>"><?php echo do_shortcode($content); ?></a><?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}