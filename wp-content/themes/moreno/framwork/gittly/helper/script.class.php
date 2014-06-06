<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;



/*Call frontend css only
---------------------------------*/
class gittly_frontend_css{
	public $handle, $src, $deps, $ver, $media, $register_only;
	function __construct($handle, $src = '', $deps = '', $ver = '', $media = 'all', $register_only = false){
		$this->handle = $handle; 
		$this->src = $src;  
		$this->deps = $deps; 
		$this->ver = $ver; 
		$this->media = $media; 
		$this->register_only = $register_only;
		add_action('wp_enqueue_scripts', array(&$this, 'script'));
	}
	
	function script(){
		wp_register_style($this->handle, $this->src, $this->deps, $this->ver, $this->media);
		if($this->register_only == false){
			wp_enqueue_style($this->handle);
		}
	}
}



/*Call frontend JavaScript only
---------------------------------*/
class gittly_frontend_js{
	public $handle, $src, $deps, $ver, $in_footer, $register_only;
	function __construct($handle, $src = '', $deps = '', $ver = '', $in_footer = '', $register_only = false){
		$this->handle = $handle; 
		$this->src = $src;  
		$this->deps = $deps; 
		$this->ver = $ver; 
		$this->in_footer = $in_footer; 
		$this->register_only = $register_only;
		add_action('wp_enqueue_scripts', array(&$this, 'script'));
	}
	
	function script(){
		wp_register_script($this->handle, $this->src, $this->deps, $this->ver, $this->in_footer);
		if($this->register_only == false){
			wp_enqueue_script($this->handle);
		}
	}
}



/*Call admin CSS only
---------------------------------*/
class gittly_admin_css{
	public $handle, $src, $deps, $ver, $media, $register_only;
	function __construct($handle, $src = '', $deps = '', $ver = '', $media = 'all', $register_only = false){
		$this->handle = $handle; 
		$this->src = $src;  
		$this->deps = $deps; 
		$this->ver = $ver; 
		$this->media = $media; 
		$this->register_only = $register_only;
		add_action('admin_enqueue_scripts', array(&$this, 'script'));
	}
	
	function script(){
		if($this->src != ''){
			wp_register_style($this->handle, $this->src, $this->deps, $this->ver, $this->media);
		}
		if($this->register_only == false){
			wp_enqueue_style($this->handle);	
		}
	}
}



/*Call admin JavaScript only
---------------------------------*/
class gittly_admin_js{
	public $handle, $src, $deps, $ver, $in_footer, $register_only;
	function __construct($handle = '', $src = '', $deps = '', $ver = '', $in_footer = '', $register_only = false){
		$this->handle = $handle; 
		$this->src = $src;  
		$this->deps = $deps; 
		$this->ver = $ver; 
		$this->in_footer = $in_footer; 
		$this->register_only = $register_only; 
		add_action('admin_enqueue_scripts', array(&$this, 'script'));
	}
	
	function script(){
		wp_register_script($this->handle, $this->src, $this->deps, $this->ver, $this->in_footer);
		if($this->register_only == false){
			wp_enqueue_script($this->handle);
		}
	}
}


/*
Sample use

new gittly_frontend_js($handle, $src, $deps, $ver, $in_footer, register_only);
new gittly_admin_js($handle, $src, $deps, $ver, $in_footer, register_only);

new gittly_frontend_css($handle, $src, $deps, $ver, $media, register_only);
new gittly_admin_css($handle, $src, $deps, $ver, $media, register_only);


new gittly_frontend_css('wpzoom-css',  gittly_CSS.'/wpzoom.css', '', '1.0.0', '', true);
new gittly_frontend_css('wpzoom-css');

new gittly_frontend_js('wpzoom-js', gittly_JS.'/wpzoom.js', array('jquery'), '1.0.0', true, true);
new gittly_frontend_js('wpzoom-js');
*/