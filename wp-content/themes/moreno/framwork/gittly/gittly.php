<?php
/*
Plugin Name: Gittly()
Plugin URI: #
Description: This ia theme framework plugin.
Version: 1.0.8
Author: Sazzad H
Author URI: #
License: GPL2+
*/

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

// windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
$fslashed_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$fslashed_abs = trailingslashit(str_replace('\\','/',ABSPATH));

if ( ! defined( 'GITTLY_URL' ) ) define( 'GITTLY_URL', site_url(str_replace( $fslashed_abs, '', $fslashed_dir )) );
if ( ! defined( 'GITTLY_DIR' ) ) define( 'GITTLY_DIR', $fslashed_dir );

if ( ! defined( 'GITTLY_STYLE' ) ) define( 'GITTLY_STYLE', true);

if ( ! defined( 'GITTLY_ASSETS' ) ) define( 'GITTLY_ASSETS', GITTLY_URL.'assets' );
if ( ! defined( 'GITTLY_CSS' ) ) define( 'GITTLY_CSS', GITTLY_ASSETS.'/css' );
if ( ! defined( 'GITTLY_JS' ) ) define( 'GITTLY_JS', GITTLY_ASSETS.'/js' );
if ( ! defined( 'GITTLY_IMG' ) ) define( 'GITTLY_IMG', GITTLY_ASSETS.'/mages' );
if ( ! defined( 'GITTLY_SWF' ) ) define( 'GITTLY_SWF', GITTLY_ASSETS.'/swf');

if ( ! defined( 'GITTLY_HELPER_URL' ) ) define( 'GITTLY_HELPER_URL', GITTLY_URL.'/helper' );
if ( ! defined( 'GITTLY_HELPER_DRI' ) ) define( 'GITTLY_HELPER_DRI', GITTLY_DIR.'/helper' );

if ( ! defined( 'GITTLY_THUMB' ) ) define( 'GITTLY_THUMB', GITTLY_URL.'thumb/thumb.php' );


/*Include all files*/
include('helper/custom-function.php');
include('helper/script.class.php');
include('helper/template.class.php');
include('helper/template2.class.php');
include('helper/typs.class.php');
include('helper/option-tree-metabox.class.php');
include('TinyMCE/tinyMCE.class.php');






/*Load Admin CSS & JavaScript
----------------------------------------------------------*/
new gittly_admin_js('gittly-admin', GITTLY_JS.'/gittly-admin.js', array('jquery'), '1.0.0', true);
new gittly_admin_css('gittly-admin', GITTLY_CSS.'/gittly-admin.css', '', '1.0.0', '');



/*Load Frontend CSS & JavaScript
----------------------------------------------------------*/
new gittly_frontend_css('gittly',  GITTLY_CSS.'/gittly.css', '', '1.0.0', 'all');
new gittly_frontend_css('gittly-responsive', GITTLY_CSS.'/gittly-responsive.css', '', '1.0.0', 'all');
new gittly_frontend_js('gittly', GITTLY_JS.'/gittly.js', array('jquery'), '1.0.0', true);



/*Load extranal script
----------------------------------------------------------*/
/*flexslider*/
new gittly_frontend_css('flexslider', GITTLY_CSS.'/flexslider.css', '', 'v2.0', 'all', true);
new gittly_frontend_js('flexslider', GITTLY_JS.'/jquery.flexslider-min.js', array('jquery'), 'v2.0', true, true);

/*easing*/
new gittly_frontend_js('easing', GITTLY_JS.'/jquery.easing.1.3.js', array('jquery'), '1.3', true, true);

/*quicksand*/
new gittly_frontend_js('quicksand', GITTLY_JS.'/jquery.quicksand.js', array('jquery'), '1.2.2', true, true);

/*prettyPhoto*/
new gittly_frontend_css('prettyPhoto', GITTLY_CSS.'/prettyPhoto.css', '', '3.1.4', 'all', true);
new gittly_frontend_js('prettyPhoto', GITTLY_JS.'/jquery.prettyPhoto.js', array('jquery'), '3.1.4', true, true);

/*jplayer*/
new gittly_frontend_js('jplayer', GITTLY_JS.'/jquery.jplayer.min.js', array('jquery'), '2.2.0', true, true);
new gittly_frontend_css('jplayer', GITTLY_CSS.'/jplayer.css', '', '4.2', 'all', true);

/*flowplayer*/
new gittly_frontend_js('flowplayer', GITTLY_JS.'/flowplayer.min.js', array('jquery'), '5.2', true, true);
new gittly_frontend_css('flowplayer', GITTLY_CSS.'/flowplayer.css', '', '5.2', 'all', true);

/*GoogleMap*/
new gittly_frontend_js('GoogleMap', 'http://maps.google.com/maps/api/js?sensor=true', '', '', '', true);

/*gmap*/
new gittly_frontend_js('gmap', GITTLY_JS.'/jquery.gmap.min.js', array('jquery'), '2.1.2', true, true);

/*fitvids*/
new gittly_frontend_js('fitvids', GITTLY_JS.'/jquery.fitvids.js', array('jquery'), '1.0', true, true);

/*selectnav*/
new gittly_frontend_js('selectnav', GITTLY_JS.'/selectnav.min.js', '', '0.1', true, true);

/*modernizr*/
new gittly_frontend_js('modernizr', GITTLY_JS.'/modernizr.js', '', '2.0.6', false, true);

/*mediaqueries*/
new gittly_frontend_js('mediaqueries', GITTLY_JS.'/mediaqueries.js', '', '1.0', true, true);


/*tweet*/
new gittly_frontend_js('jquery-tweet', GITTLY_JS.'/jquery.tweet.js', array('jquery'), '1.0', true, true);

/*masonry*/
new gittly_frontend_js('masonry', GITTLY_JS.'/jquery.masonry.min.js', array('jquery'), '2.1.07', true, true);

/*wookmark*/
new gittly_frontend_js('wookmark', GITTLY_JS.'/jquery.wookmark.min.js', array('jquery'), '1.0.0', true, true); 

/*isotope*/
new gittly_frontend_js('isotope', GITTLY_JS.'/jquery.isotope.min.js', array('jquery'), '1.0.0', true, true);