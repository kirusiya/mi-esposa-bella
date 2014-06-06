<?php
/*-------------------------------------------
***Columns***
-------------------------------------------*/
function big_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . do_shortcode(wpautop(trim($content))) . '</div>';
}
function big_shortcode_column_last($atts, $content = null, $code) {
	return '<div class="'.str_replace('_last','',$code).' last">' . do_shortcode(wpautop(trim($content))) . '</div><div class="clearboth"></div>';
}

add_shortcode('one_half', 'big_shortcode_column');
add_shortcode('one_third', 'big_shortcode_column');
add_shortcode('one_fourth', 'big_shortcode_column');
add_shortcode('one_fifth', 'big_shortcode_column');
add_shortcode('one_sixth', 'big_shortcode_column');

add_shortcode('two_third', 'big_shortcode_column');
add_shortcode('three_fourth', 'big_shortcode_column');
add_shortcode('two_fifth', 'big_shortcode_column');
add_shortcode('three_fifth', 'big_shortcode_column');
add_shortcode('four_fifth', 'big_shortcode_column');
add_shortcode('five_sixth', 'big_shortcode_column');

add_shortcode('one_half_last', 'big_shortcode_column_last');
add_shortcode('one_third_last', 'big_shortcode_column_last');
add_shortcode('one_fourth_last', 'big_shortcode_column_last');
add_shortcode('one_fifth_last', 'big_shortcode_column_last');
add_shortcode('one_sixth_last', 'big_shortcode_column_last');

add_shortcode('two_third_last', 'big_shortcode_column_last');
add_shortcode('three_fourth_last', 'big_shortcode_column_last');
add_shortcode('two_fifth_last', 'big_shortcode_column_last');
add_shortcode('three_fifth_last', 'big_shortcode_column_last');
add_shortcode('four_fifth_last', 'big_shortcode_column_last');
add_shortcode('five_sixth_last', 'big_shortcode_column_last');