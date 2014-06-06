<?php
/*-------------------------------------------
***Twitter Feed Wedget***
-------------------------------------------*/
add_shortcode('twitter_feed', 'big_shortcode_twitter_feed');
function big_shortcode_twitter_feed( $atts, $content = null ) {
   extract( shortcode_atts( array(
   		'user' => '',
		'w' => 'auto',
		'h' => '300',
		'cunt' => '4',
		'shell_bg_coler' => '999999',
		'shell_text_color' => '000000',
		'tweet_bg_color' => 'ffffff',
		'tweet_text_color' => '333333',
		'tweet_link_color' => '0c8bcf',
   ), $atts ) );
   
   if($size){$size = 'data-size="large"';}
   if($show_name == 'false'){$the_show_name = 'data-show-screen-name="false"';}
   
   $output .= "<script charset='utf-8' src='http://widgets.twimg.com/j/2/widget.js'></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: ".$cunt.",
  interval: 30000,
  width: '".$w."',
  height: '".$h."',
  theme: {
    shell: {
      background: '#".$shell_bg_coler."',
      color: '#".$shell_text_color."'
    },
    tweets: {
      background: '#".$tweet_bg_color."',
      color: '#".$tweet_text_color."',
      links: '#".$tweet_link_color."'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('".$user."').start();
</script>";
	
	if($user = ''){
		return 'Please enter twitter username';
	}else{
		return $output;
	}
}