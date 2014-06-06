<?php
/*-------------------------------------------
***Video***
-------------------------------------------*/
add_shortcode('video', 'big_shortcode_video');
function big_shortcode_video($atts){
	extract( shortcode_atts( array(
		'type' => '',
		'url' => '',
		'h' => '',
		'w' => '',
		'thumb' => '',
		'mp4' => '',
		'webm' => '',
		'ogg' => '',
	), $atts ) );
	
	
	
	if($type != ''){
		if($type=='youtube'){
			if($url != ''){
				$youtube_id = str_replace("http://www.youtube.com/watch?v=","",$url);
				$output .= '<iframe src="http://www.youtube.com/embed/'.$youtube_id.'?rel=0" frameborder="0" allowfullscreen height="'.$h.'" width="'.$w.'"></iframe>';
			}else{
				$output .= 'Please defile the youtube video URL.';
			}
		}//youtube
		
		if($type=='vimeo'){
			if($url != ''){
				$vimeo_id = str_replace("http://vimeo.com/","",$url);
				$output .= '<iframe src="http://player.vimeo.com/video/'.$vimeo_id.'" width="'.$w.'" height="'.$h.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
			}else{
				$output .= 'Please defile the vimeo video URL.';
			}
		}//vimeo
		
		if($type=='flv'){
			if($url != ''){
				$id = rand();
				$output .= '<a href="'.$url.'" style="display:block;width:'.$w.'px;height:'.$h.'px" id="player_'.$id.'"></a> ';
				$output .= '<script>
								flowplayer("player_'.$id.'", "'.big_shortcode_ASSETS_URL.'/swf/flowplayer-3.2.11.swf");
							</script>';
			}else{
				$output .= 'Please defile the FLV video URL.';
			}	
		}//flv
		
		if($type=='html5'){
			$id = rand();
			$output .= '<video id="my_video_'.$id.'" class="video-js vjs-default-skin" controls preload="auto" width="'.$w.'" height="'.$h.'" poster="'.$thumb.'" data-setup="{}">
						  <source src="'.$mp4.'" type="video/mp4">
						  <source src="'.$webm.'" type="video/webm">
						  <source src="'.$ogg.'" type="video/ogg">
						</video>';
		}//html5
	}else{
		$output .= 'Please define the video type';
	}
	
	return $output;
}