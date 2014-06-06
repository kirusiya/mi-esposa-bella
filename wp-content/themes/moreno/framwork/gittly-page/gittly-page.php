<?php
/*
Plugin Name: Gittly Page
Plugin URI: #
Description: page Plugin.
Version: 1.0.1
Author: Sazzad H
Author URI: #
License: GPL2+
*/

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

// windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
$fslashed_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$fslashed_abs = trailingslashit(str_replace('\\','/',ABSPATH));

if ( ! defined( 'GITTLY_PAGE_URL' ) ) define( 'GITTLY_PAGE_URL', site_url(str_replace( $fslashed_abs, '', $fslashed_dir )) );
if ( ! defined( 'GITTLY_PAGE_DIR' ) ) define( 'GITTLY_PAGE_DIR', $fslashed_dir );






/*Register Meta Box
--------------------------------------------------------------------------*/
$metabox = array(
	array(
        'id'          => 'wpage_subtitle',
        'label'       => __('Sub Title', 'gittly'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'wpage_images',
        'label'       => __('Balckground Slider Images', 'gittly'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'portfolio_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
	),

);
new gittly_option_tree_metabox(array('page', 'post', 'wpz_gallery'), __('Page Setting', 'gittly'), 'page_setting', $metabox);