<?php
/*-------------------------------------------
***Progess Bar***
-------------------------------------------*/
add_shortcode('progress', 'shortcode_progress');
function shortcode_progress($atts, $content = null) {
	$html = '';
	$html .= '<div class="progress-bar">';
	$html .= '<div class="progress-bar-content" data-percentage="'.$atts['percentage'].'" style="width: ' . $atts['percentage'] . '%">';
	$html .= '</div>';
	$html .= '<span class="progress-title">' . $content . ' ' . $atts['percentage'] . '%</span>';
	$html .= '</div>';

	return $html;
}
