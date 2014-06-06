<?php
define('THEME_URL', get_template_directory_uri());

if ( ! isset( $content_width ) ) $content_width = 900;

add_theme_support( 'automatic-feed-links' );


add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );


include_once( 'framwork/gittly/gittly.php' );
include_once( 'framwork/gittly-page/gittly-page.php' );
include_once( 'framwork/gittly-shortcodes/gittly-shortcodes.php' );
include_once( 'framwork/options/theme-options.php');

new gittly_frontend_js('easing');

/*fitvids*/
new gittly_frontend_js('fitvids');

/*selectnav*/
new gittly_frontend_js('selectnav');

/*modernizr*/
new gittly_frontend_js('modernizr');

/*mediaqueries*/
new gittly_frontend_js('mediaqueries');

/*comment-reply*/
new gittly_frontend_js('comment-reply');

new gittly_frontend_css('supersized', THEME_URL.'/css/supersized.css', '');
new gittly_frontend_js('supersized', THEME_URL.'/js/supersized.3.2.7.min.js', array('jquery'), '');
new gittly_frontend_js('supersized-shutter', THEME_URL.'/js/supersized.shutter.min.js', array('supersized'), '');

new gittly_frontend_js('script', THEME_URL.'/js/script.js', array('jquery'), '', true);

// Localization Support
add_action('after_setup_theme', 'gittly_load_theme_textdomain');
function gittly_load_theme_textdomain(){
	load_theme_textdomain( 'gittly', get_template_directory().'/languages' );	
}


/*add thumbnails support*/
add_theme_support( 'post-thumbnails' );
add_image_size( "blog_thumb", 800, 330, true );
add_image_size( "gallery_thumb", 247, 242, true );

add_filter('widget_text', 'do_shortcode');

/*Remove junk*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/*Register Menu*/
register_nav_menus( array(
	'main_menu' => 'Main Menu',
) );

/*Refister Sidebar*/
register_sidebar( array(
	'name' => __('Footer Widget #1', 'gittly'),
	'id' => 'footer_widgets_1',
	'description' => __('Footer Widgets One', 'gittly'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div><div class='clear' style='height:30px;'></div>",
	'before_title' => '<h3 class="heading">',
	'after_title' => '</h3>',
));
register_sidebar( array(
	'name' => __('Footer Widget #2', 'gittly'),
	'id' => 'footer_widgets_2',
	'description' => __('Footer Widgets 2', 'gittly'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div><div class='clear' style='height:30px;'></div>",
	'before_title' => '<h3 class="heading">',
	'after_title' => '</h3>',
));
register_sidebar( array(
	'name' => __('Footer Widget #3', 'gittly'),
	'id' => 'footer_widgets_3',
	'description' => __('Footer Widgets 3', 'gittly'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div><div class='clear' style='height:30px;'></div>",
	'before_title' => '<h3 class="heading">',
	'after_title' => '</h3>',
));





function theme_logo($logo = '', $des = 'yes'){
	?>
    <div id="logo">
		<?php if($logo != ''): ?>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="logo"></a>
		<?php else: ?>
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php endif; ?>
        <?php if($des == 'yes'){ ?> <div class="dea"></div><span><?php bloginfo( 'description' ); ?></span><?php } ?>
	</div>
    <?php	
}


add_action('wp_head', 'supersized_gallery');
function supersized_gallery(){
	$images = get_post_meta(get_the_ID(), 'wpage_images', true);
	if(!is_array($images)){ $images = ot_get_option('wpage_images'); }
	
	if(is_array($images)):
		
	?>
    <script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval          :   4000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	900,		// Speed of transition
															   
					// Components							
					slide_links				:	false,	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[			// Slideshow Images
														<?php foreach($images as $images): ?>
														{image : '<?php echo $images['image']; ?>'},
														<?php endforeach; ?>
												]
					
				});
		    });
		    
		</script>
    <?php
		
	endif;
}


$gallery_args=array(
	'rewrite' => array( 'slug' => 'gallery-link' ),
	'supports' => array( 'title','thumbnail'),
);
new gittly_register_postType('wpz_gallery', 'Gallery', '', $gallery_args);


/*Register Meta Box
--------------------------------------------------------------------------*/
$metabox = array(
	array(
        'id'          => 'gallery_slideshow',
        'label'       => __('Enable Galley Slideshow', 'gittly'),
        'desc'        => __('This will allow prettyPhoto Slideshow', 'gittly'),
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
	array(
        'id'          => 'gallery_images',
        'label'       => __('Images Of The Gallery', 'gittly'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
			array(
				'id'          => 'image',
				'label'       =>  __('Upload an Image', 'gittly'),
				'desc'        => '',
				'std'         => '',
				'type'        => 'upload',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'link',
				'label'       =>  __('Link', 'gittly'),
				'desc'        => __('If you want to link the image instead of Popup', 'gittly'),
				'std'         => '',
				'type'        => 'text',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
		)
	)

);
new gittly_option_tree_metabox(array('wpz_gallery'), __('Gallery Images', 'gittly'), 'gallery_setting', $metabox);


function get_attachment_id_by_src ($image_src) {

    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;

}

/* Output Theme title
-------------------------------------------------*/
function gittly_title() {
	
	global $wp_query;
	
	$output = '';

	if (is_archive()) {
		if (is_category()) $output = __('Category Archive', 'gittly') . ' &raquo; ' . single_cat_title('', false);
		if (is_author()) {
			$curauth = get_userdata(get_query_var('author'));			
			$output = __('Author Archive', 'gittly') . ' &raquo; ' . $curauth->display_name;
		}
		if (is_tag()) $output = __('Tag Archive', 'gittly') . ' &raquo; ' . single_tag_title('', false);
		if (is_year()) $output = __('Yearly Archive', 'gittly') . ' &raquo; ' . get_the_date('Y');
		if (is_month()) $output = __('Monthly Archive', 'gittly') . ' &raquo; ' . get_the_date('F Y');
		if (is_day()) $output = __('Daily Archive', 'gittly') . ' &raquo; ' . get_the_date('d F Y');
	}
	elseif (is_search()) $output = __('Search Results', 'gittly') . ' &quot;' . get_search_query() . '&quot;';
	elseif (!(is_404()) && (is_single()) || (is_page())) $output = get_the_title();
	elseif (is_404()) $output = __('Not Found', 'gittly');
	elseif (is_home()) $output = get_bloginfo('name') . ' - ' . get_bloginfo('description');
	else $output = get_the_title();
	
	echo $output;
}