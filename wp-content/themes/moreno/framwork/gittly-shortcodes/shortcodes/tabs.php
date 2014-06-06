<?php
/*-------------------------------------------
***Tabs***
-------------------------------------------*/
add_shortcode('tabs', 'big_shortcode_tabs');
function big_shortcode_tabs( $atts, $content = null ) {
   
   		if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
			return do_shortcode($content);
		} else {
			for($i = 0; $i < count($matches[0]); $i++) {
				$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
			}
			
			$output = '<ul class="tabNavigation">';
				for($i = 0; $i < count($matches[0]); $i++) {
					$output .= '<li><a href="#tab-'.$i.'">' . $matches[3][$i]['title'] . '</a></li>';
				}
			$output .= '</ul>';
			
			
			
			for($i = 0; $i < count($matches[0]); $i++) {
				$output .= '<div id="tab-'.$i.'">' . do_shortcode(trim($matches[5][$i])) . '</div>';
			}
			
		}
		
   return '<div class="tabs">'.$output.'</div>';

 }