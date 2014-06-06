<?php
add_shortcode('pricing_table', 'big_shortcode_pricing_table');
function big_shortcode_pricing_table( $atts, $content = null ) {
   extract( shortcode_atts( array(
   		'col' => '4',
   ), $atts ) );
   
   $output .= '<div class="pricing-table col-'.$col.'">';
   		$output .= remove_wpautop($content);
   $output .= '</div>';
	
	return $output;
}

add_shortcode('plan', 'big_shortcode_pricing_plan');
function big_shortcode_pricing_plan( $atts, $content = null ) {
   extract( shortcode_atts( array(
   		'name' => 'Free Edition',
		'link' => '#',
		'linkname' => 'Sign Up',
		'price' => '$512',
		'per' => 'per year',
		'color' => '#83b732',
		'featured' => '',
   ), $atts ) );
   
   $output .= '<div class="plan '.$featured.'">';
		$output .= '<div class="plan-head"><h3 style="color:'.$color.';">'.$name.'</h3>';
		$output .= '<div class="price" style="color:'.$color.';">'.$price.' <span>'.$per.'</span></div></div>';
		$output .= $content;
		$output .= '<div class="signup"><a class="button light" href="'.$link.'">'.$linkname.'<span></span></a></div>';
   $output .= '</div>';
	return $output;		
}