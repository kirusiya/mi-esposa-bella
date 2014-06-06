<?php
class gittly_tinyMCE{
	public $template_url;
	public $name;
	public $id;
	
	function __construct(){
		add_action('gittly_option_list', array(&$this, 'option_list_action'));
	}
	
	
	function option_list_action(){
		echo '<option value="'.$this->template_url.'">'.$this->name.'</option>';
	}
	
}




add_filter( 'tiny_mce_version', 'gittly_refresh_mce');
add_action('init', 'gittly_shortcode_button');

// filters the tinyMCE buttons and adds our custom buttons
function gittly_shortcode_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
		 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		// filter the tinyMCE buttons and add our own
		add_filter("mce_external_plugins", 'gittly_add_tinymce_plugin');
		add_filter('mce_buttons', 'gittly_register_button');
	}
}

// registers the buttons for use
function gittly_register_button($buttons) {
	array_push($buttons, "|", "gittly_shortcode");
	return $buttons;
}	
	
// add the button to the tinyMCE bar
function gittly_add_tinymce_plugin($plugin_array) {
	$plugin_array['gittly_shortcode'] = GITTLY_URL. '/TinyMCE/shortcodes-popup.js';
	return $plugin_array;
}
	
function gittly_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}