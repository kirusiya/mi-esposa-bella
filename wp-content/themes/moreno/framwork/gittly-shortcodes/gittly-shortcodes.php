<?php
/*
Plugin Name: Gittly Shortcodes
Plugin URI: #
Description: Shortcode Plugin.
Version: 1.0.2
Author: Sazzad H
Author URI: #
License: GPL2+
*/

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

// windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
$fslashed_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$fslashed_abs = trailingslashit(str_replace('\\','/',ABSPATH));

if ( ! defined( 'GITTLY_SHORTCODE_URL' ) ) define( 'GITTLY_SHORTCODE_URL', site_url(str_replace( $fslashed_abs, '', $fslashed_dir )) );
if ( ! defined( 'GITTLY_SHORTCODE_DIR' ) ) define( 'GITTLY_SHORTCODE_DIR', $fslashed_dir );

if ( ! defined( 'GITTLY_SHORTCODE_STYLE' ) ) define( 'GITTLY_SHORTCODE_STYLE', true);

if ( ! defined( 'GITTLY_SHORTCODE_ASSETS' ) ) define( 'GITTLY_SHORTCODE_ASSETS', GITTLY_SHORTCODE_URL.'assets' );
if ( ! defined( 'GITTLY_SHORTCODE_CSS' ) ) define( 'GITTLY_SHORTCODE_CSS', GITTLY_SHORTCODE_ASSETS.'/css' );
if ( ! defined( 'GITTLY_SHORTCODE_JS' ) ) define( 'GITTLY_SHORTCODE_JS', GITTLY_SHORTCODE_ASSETS.'/js' );
if ( ! defined( 'GITTLY_SHORTCODE_IMG' ) ) define( 'GITTLY_SHORTCODE_IMG', GITTLY_SHORTCODE_ASSETS.'/images' );
if ( ! defined( 'GITTLY_SHORTCODE_SWF' ) ) define( 'GITTLY_SHORTCODE_SWF', GITTLY_SHORTCODE_ASSETS.'/swf');



/*include shortcodes
--------------------------------------------------------------------------*/
include('shortcodes/accordion.php');
include('shortcodes/title.php');
include('shortcodes/alert-messages.php');
include('shortcodes/buttons.php');
include('shortcodes/columns.php');
include('shortcodes/dividers.php');
include('shortcodes/dropcaps.php');
include('shortcodes/icons.php');
include('shortcodes/image.php');
include('shortcodes/lightbox.php');
include('shortcodes/link.php');
include('shortcodes/map.php');
include('shortcodes/pricing-table.php');
include('shortcodes/tabs.php');
include('shortcodes/toggle.php');
include('shortcodes/twitter-feed.php');
include('shortcodes/video.php');
include('shortcodes/call-to-action.php');
include('shortcodes/clear.php');
include('shortcodes/quotes.php');
include('shortcodes/code.php');
include('shortcodes/progess-bar.php');
include('shortcodes/social-icons.php');



/*Register Scripts
--------------------------------------------------------------------------*/
if(GITTLY_SHORTCODE_STYLE == true){
	new gittly_frontend_css('gittly-shortcode', GITTLY_SHORTCODE_CSS.'/gittly-shortcode.css', '', '1.0.0', 'all');
	new gittly_frontend_js('gittly-shortcode', GITTLY_SHORTCODE_JS.'/gittly-shortcode.js', array('jquery'), '1.0.0', true);
	
	new gittly_frontend_js('easing');
	new gittly_frontend_js('GoogleMap');
	new gittly_frontend_js('gmap');
	
	new gittly_frontend_js('flowplayer');
	new gittly_frontend_css('flowplayer');
	
	new gittly_frontend_js('prettyPhoto');
	new gittly_frontend_css('prettyPhoto');
}




/*Register TinyMCE
--------------------------------------------------------------------------*/
$shortcode_mce_accordion = new gittly_tinyMCE;
$shortcode_mce_accordion->name = 'Accordion';
$shortcode_mce_accordion->template_url = GITTLY_SHORTCODE_URL.'/mce/accordion.php';

$shortcode_mce_title = new gittly_tinyMCE;
$shortcode_mce_title->name = 'Title';
$shortcode_mce_title->template_url = GITTLY_SHORTCODE_URL.'/mce/title.php';

$shortcode_mce_clear = new gittly_tinyMCE;
$shortcode_mce_clear->name = 'Clear';
$shortcode_mce_clear->template_url = GITTLY_SHORTCODE_URL.'/mce/clear.php';

$shortcode_mce_alert = new gittly_tinyMCE;
$shortcode_mce_alert->name = 'Alert Box';
$shortcode_mce_alert->template_url = GITTLY_SHORTCODE_URL.'/mce/alert.php';

$shortcode_mce_button = new gittly_tinyMCE;
$shortcode_mce_button->name = 'Button';
$shortcode_mce_button->template_url = GITTLY_SHORTCODE_URL.'/mce/button.php';

$shortcode_mce_column = new gittly_tinyMCE;
$shortcode_mce_column->name = 'Column';
$shortcode_mce_column->template_url = GITTLY_SHORTCODE_URL.'/mce/column.php';

$shortcode_mce_dropcaps = new gittly_tinyMCE;
$shortcode_mce_dropcaps->name = 'Dropcaps';
$shortcode_mce_dropcaps->template_url = GITTLY_SHORTCODE_URL.'/mce/dropcaps.php';

$shortcode_mce_googlemap = new gittly_tinyMCE;
$shortcode_mce_googlemap->name = 'Google Map';
$shortcode_mce_googlemap->template_url = GITTLY_SHORTCODE_URL.'/mce/googlemap.php';

$shortcode_mce_hr = new gittly_tinyMCE;
$shortcode_mce_hr->name = 'Divider';
$shortcode_mce_hr->template_url = GITTLY_SHORTCODE_URL.'/mce/hr.php';

$shortcode_mce_image = new gittly_tinyMCE;
$shortcode_mce_image->name = 'Image';
$shortcode_mce_image->template_url = GITTLY_SHORTCODE_URL.'/mce/image.php';

$shortcode_mce_lightbox = new gittly_tinyMCE;
$shortcode_mce_lightbox->name = 'Lightbox';
$shortcode_mce_lightbox->template_url = GITTLY_SHORTCODE_URL.'/mce/lightbox.php';

$shortcode_mce_tabs = new gittly_tinyMCE;
$shortcode_mce_tabs->name = 'Tabs';
$shortcode_mce_tabs->template_url = GITTLY_SHORTCODE_URL.'/mce/tabs.php';

$shortcode_mce_toggle = new gittly_tinyMCE;
$shortcode_mce_toggle->name = 'Toggle';
$shortcode_mce_toggle->template_url = GITTLY_SHORTCODE_URL.'/mce/toggle.php';

$shortcode_mce_callToAction = new gittly_tinyMCE;
$shortcode_mce_callToAction->name = 'Call To Action';
$shortcode_mce_callToAction->template_url = GITTLY_SHORTCODE_URL.'/mce/call_to_action.php';

$shortcode_mce_BlockQuote = new gittly_tinyMCE;
$shortcode_mce_BlockQuote->name = 'BlockQuote';
$shortcode_mce_BlockQuote->template_url = GITTLY_SHORTCODE_URL.'/mce/quotes.php';

$shortcode_mce_progress = new gittly_tinyMCE;
$shortcode_mce_progress->name = 'Progress Bar';
$shortcode_mce_progress->template_url = GITTLY_SHORTCODE_URL.'/mce/progress.php';

$shortcode_mce_socialIcon = new gittly_tinyMCE;
$shortcode_mce_socialIcon->name = 'Social Icon';
$shortcode_mce_socialIcon->template_url = GITTLY_SHORTCODE_URL.'/mce/social-icons.php';

/*
$shortcode_mce_BlockQuote = new gittly_tinyMCE;
$shortcode_mce_BlockQuote->name = 'Progess Bar';
$shortcode_mce_BlockQuote->template_url = GITTLY_SHORTCODE_URL.'/mce/progess-bar.php';
*/
