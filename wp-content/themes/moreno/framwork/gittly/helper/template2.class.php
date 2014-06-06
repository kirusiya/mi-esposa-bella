<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class gittly_template2{
	
	public $settings;
	public $loop_query;
	
	public $loop_template;
	public $page_template;
	public $single_template;
	
	function __construct($item){
		/*
		array(
			'loop' => 'url',
			'loop_deafult' => 'url',
			'page' => 'url',
			'page_deafult' => 'url',
			'single' => 'url',
			'single_deafult' => 'url',
			'query' => array(),
			'query_deafult' => array(),
			'setting' => array(),
			'setting_deafult' => array(),
			'' => '',
		);
		*/		
		if(file_exists($item['loop'])){ $this->loop_template = $item['loop']; }else{ $this->loop_template = $item['loop_deafult']; }
		if(file_exists($item['page'])){ $this->page_template = $item['page']; }else{ $this->page_template = $item['page_deafult']; }
		if(file_exists($item['single'])){ $this->single_template = $item['single']; }else{ $this->single_template = $item['single_deafult']; }
		
		$this->settings = wp_parse_args( $item['setting'], $item['setting_deafult'] );
		$this->loop_query = wp_parse_args( $item['query'], $item['query_deafult'] );
		
	}
	
	function loop(){
		$loop_query = new WP_Query($this->loop_query);
		
		$output = '';
		$output .= $this->settings['start_warp'];
		while ( $loop_query->have_posts() ) : $loop_query->the_post();
			ob_start();
			include($this->loop_template);
			$output .= ob_get_contents();
			ob_end_clean();
		endwhile;
		$output .= $this->settings['end_warp'];
		//if($this->settings['paging'] == 'true'){ $output .= gittly_pagination($loop_query->max_num_pages); }
		if($this->settings['paging'] == 'true'){ 
			$output .= '<div class="gittly_pagination">';
			$big = 999999999; // need an unlikely integer
			$output .= paginate_links(array(
							'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $loop_query->max_num_pages 
						) ); 
			$output .= '</div>';
		}
		
		return $output;
		wp_reset_postdata(); // Reset Post Data
	}
	
	
	
	function page(){
		ob_start();
		include($this->page_template);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	
	
	function single(){
		ob_start();
		include($this->single_template);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}


	
	
	
}//end class