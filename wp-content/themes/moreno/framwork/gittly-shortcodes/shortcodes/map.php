<?php
/*-------------------------------------------
***dropcap***
-------------------------------------------*/
add_shortcode('gmap', 'big_shortcode_map');
function big_shortcode_map($atts, $content = null, $code) {
	extract( shortcode_atts( array(
   		'maptype' => 'TERRAIN', //TERRAIN, HYBRID, SATELLITE, ROADMAP
		'latitude' => '',
		'longitude' => '',
		'address' => 'USA',
		'html' => '',
		'icon_url' => 'http://www.google.com/mapfiles/marker.png',
		'iconsize' => '20, 46',
		'scrollwheel' => 'true',
		'panControl' => 'true',
		'zoomControl' => 'true',
		'mapTypeControl' => 'true',
		'scaleControl' => 'true',
		'streetViewControl' => 'true',
		'overviewMapControl' => 'true',
		'w' => '787',
		'h' => '500',
		'zoom' => '10',
   ), $atts ) );
   
	$id = 'map_'.rand();
	
	$point = '';
	$the_address = '';
	$the_html = '';
	
	if($latitude && $longitude){
		$point = 'latitude: '.$latitude.', 
				longitude: '.$longitude.', ';   
	}elseif($address){
		$the_address = 'address: "'.$address.'", ';
	}
	
	if($html){
		$the_html = 'html: "'.$html.'", ';   
	}
	
	$output = '';
	$output .= '<div id="'.$id.'" style=" width:'.$w.'px; height:'.$h.'px; max-width: 100%;"></div>';
	$script = '<script type="text/javascript">
					jQuery(document).ready(function($){
						$("#'.$id.'").gMap({
							controls: {
								   panControl: '.$panControl.',
								   zoomControl: '.$zoomControl.',
								   mapTypeControl: '.$mapTypeControl.',
								   scaleControl: '.$scaleControl.',
								   streetViewControl: '.$streetViewControl.',
								   overviewMapControl: '.$overviewMapControl.'
							   },
							scrollwheel: '.$scrollwheel.',
							maptype: "'.$maptype.'",
							markers: [
								{
									'.$the_address.$the_html.$point.'
								}
							],
							icon: {
								image: "'.$icon_url.'",
								iconsize: ['.$iconsize.'],
								iconanchor: [9, 34],
							},
							zoom: '.$zoom.'	
						});	
					});
				</script>';
	$output .= $script;
	return wpautop(trim($output));
}