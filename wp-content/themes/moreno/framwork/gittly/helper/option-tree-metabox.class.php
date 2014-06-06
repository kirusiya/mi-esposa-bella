<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;


class gittly_option_tree_metabox{
	public $post_type, $title, $id, $options, $context, $priority;
	
	function __construct($post_type, $title, $id, $options, $context = 'normal', $priority='high' ){
		$this->post_type = $post_type; 
		$this->title = $title; 
		$this->id = $id; 
		$this->options = $options;
		$this->context = $context;
		$this->priority = $priority;
		 
		add_action('admin_init', array(&$this, 'meta_boxes'));
	}
	
	function meta_boxes(){
		$my_meta_box = array(
		'id'        => $this->id,
		'title'     => $this->title,
		'desc'      => '',
		'pages'     => $this->post_type,
		'context'   => $this->context,
		'priority'  => $this->priority,
		'fields'    => $this->options,
	  );
	  
	  ot_register_meta_box( $my_meta_box );
	}
}