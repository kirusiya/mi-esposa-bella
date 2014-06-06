<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

/*Post Type Register Class
--------------------------------------------------------------------------*/
class gittly_register_postType{
	public $post_type, $name, $labels, $args;
	
	function __construct($post_type, $name, $labels=array(), $args=array()){
		$this->post_type = $post_type;
		$this->name = $name;
		$this->labels = $labels;
		$this->args = $args;
		
		if( ! post_type_exists( $this->post_type ) ){
			add_action( 'init', array( &$this, 'register' ) );
		}
	}
	
	function register(){
		$name = $this->name;
		
		$deafults_labels = array(
		'name' => sprintf( __( '%s', 'gittly' ), $name ),
		'singular_name' => sprintf( __( '%s', 'gittly' ), $name ),
		'add_new' => sprintf( __( 'Add New %s', 'gittly' ), $name ),
		'add_new_item' => sprintf( __( 'Add New %s', 'gittly' ), $name ),
		'edit_item' => sprintf( __( 'Edit %s', 'gittly' ), $name ),
		'new_item' => sprintf( __( 'New %s', 'gittly' ), $name ),
		'all_items' => sprintf( __( 'All %s', 'gittly' ), $name ),
		'view_item' => sprintf( __( 'View %s', 'gittly' ), $name ),
		'search_items' => sprintf( __( 'Search %s s', 'gittly' ), $name ),
		'not_found' =>  sprintf( __( 'No %s found', 'gittly' ), $name ),
		'not_found_in_trash' => sprintf( __( 'No %s found in Trash', 'gittly' ), $name ), 
		'parent_item_colon' => '',
		'menu_name' => sprintf( __( '%s', 'gittly' ), $name )
	  );
	  $labels = wp_parse_args( $this->labels, $deafults_labels );
	  
	  
	  $deafults_args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array( 'slug' => _x( 'book', 'URL slug', 'gittly' ) ),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	  ); 
	  $args = wp_parse_args( $this->args, $deafults_args );
	 
	 
	  register_post_type($this->post_type, $args);
	}
}






/*Taxonomy Register Class
--------------------------------------------------------------------------*/
class gittly_register_taxonomy{
	public $taxonomy, $name, $typs, $labels, $args;
	
	function __construct($taxonomy, $name, $typs, $labels=array(), $args=array()){
		$this->taxonomy = $taxonomy;
		$this->name = $name;
		$this->typs = $typs;
		$this->labels = $labels;
		$this->args = $args;
		
		if( ! taxonomy_exists( $this->taxonomy ) ){
			add_action( 'init', array( &$this, 'register' ) );
		}
	}
	
	function register(){
		$name = $this->name;
		
		$deafults_labels = array(
			'name' =>  sprintf( __( '%s', 'gittly'  ), $name ),
			'singular_name' =>  sprintf( __( '%s', 'gittly' ), $name ),
			'search_items' =>   sprintf( __( 'Search %s', 'gittly' ), $name ),
			'all_items' =>  sprintf( __( 'All %s', 'gittly'  ), $name ),
			'parent_item' =>  sprintf( __( 'Parent %s', 'gittly'  ), $name ),
			'parent_item_colon' =>  sprintf( __( 'Parent %s:', 'gittly'  ), $name ),
			'edit_item' =>  sprintf( __( 'Edit %s', 'gittly'  ), $name ), 
			'update_item' =>  sprintf( __( 'Update %s', 'gittly'  ), $name ),
			'add_new_item' =>  sprintf( __( 'Add New %s', 'gittly'  ), $name ),
			'new_item_name' =>  sprintf( __( 'New %s Name', 'gittly'  ), $name ),
			'menu_name' =>  sprintf( __( '%s', 'gittly'  ), $name ),
		); 
		$labels = wp_parse_args( $this->labels, $deafults_labels );
		
		$deafults_args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			//'rewrite' => array( 'slug' => 'genre' ),
		); 
		$args = wp_parse_args( $this->args, $deafults_args );
		
		register_taxonomy($this->taxonomy ,$this->typs, $args);
	}
}




/*Add Taxonomy Filter
--------------------------------------------------------------------------*/
class gittly_taxonomy_filter{
	public $post_type, $taxonomy;
	
	function __construct($post_type, $taxonomy){
		$this->taxonomy = $taxonomy;
		$this->post_type = $post_type;
		
		add_action( 'restrict_manage_posts', array( &$this, 'filter_restrict_manage_posts' ) );
	}
	
	
	
	function filter_restrict_manage_posts() {
		global $typenow;
		
		$taxonomy = $this->taxonomy;
		$post_type = $this->post_type;
		
		if ($typenow == $post_type) {
			$filters = array($taxonomy);
			foreach ($filters as $tax_slug) {
				// retrieve the taxonomy object
				$tax_obj = get_taxonomy($tax_slug);
				$tax_name = $tax_obj->labels->name;
				// retrieve array of term objects per taxonomy
				$terms = get_terms($tax_slug);
	
				// output html for taxonomy dropdown filter
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) {
					// output each select option line, check against the last $_GET to show the current option selected
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}//function
}