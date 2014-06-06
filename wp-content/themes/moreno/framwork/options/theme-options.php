<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'gittly_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function gittly_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
	
    'sections'        => array( 
     array( 'id' => 'general','title' => 'General'),
	 array( 'id' => 'styling','title' => 'Background Slideshow'),
	 array( 'id' => 'blog_page','title' => 'Blog Page'),
	 array( 'id' => 'social','title' => 'Social Profiles'),
  	 array( 'id' => 'integration','title' => 'Integration'),
	 array( 'id' => 'footer','title' => 'Footer'),
	 ),

    'settings' => array()
  );
  
  $custom_settings ['settings'] = array_merge($custom_settings['settings'], include('general-options.php'));
  $custom_settings ['settings'] = array_merge($custom_settings['settings'], include('styling-options.php'));
  $custom_settings ['settings'] = array_merge($custom_settings['settings'], include('blog-options.php'));
  $custom_settings ['settings'] = array_merge($custom_settings['settings'], include('social-options.php'));
  $custom_settings ['settings'] = array_merge($custom_settings['settings'], include('integration-options.php'));
  $custom_settings ['settings'] = array_merge($custom_settings['settings'], include('footer-options.php'));

  
  //print_r($custom_settings ['settings']);
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}


add_action('wp_head', 'option_header_code');
function option_header_code(){
	?>
    <style type="text/css">
		.logo_area .gap{ height:<?php echo ot_get_option('logo_top_margin_inner'); ?>px !important; }
		.logo_area.front_page .gap{ height:<?php echo ot_get_option('logo_top_margin'); ?>px !important; }
	</style>
    
    <?php if(ot_get_option('custom_css')): ?>
	<style type="text/css">
		<?php echo ot_get_option('custom_css'); ?>
	</style>
    <?php endif; ?>
    
    <?php if(ot_get_option('custom_js')): ?>
	<script type="text/javascript">
		<?php echo ot_get_option('custom_js'); ?>
	</script>
    <?php endif; ?>
    
    <?php if(ot_get_option('google_analytics')): ?>
		<?php echo ot_get_option('google_analytics'); ?>
    <?php endif; ?>
    
    <?php
}