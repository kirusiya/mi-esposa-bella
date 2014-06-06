<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class gittly_template{
	
	public $loop;
	public $page;
	public $single;
	
	function loop($query, $fav){
		$defaults = array(
			'start_warp' => '<div class="loop_warp">',
			'end_warp' => '</div>',
			'paging' => false,
		);
		$fav = wp_parse_args( $fav, $defaults );
		
		
		//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		$query_defaults = array(
			'post_type' => 'post',
			'paged'=>$paged,
			'posts_per_page'=> 10,
			'order'=> 'ASC',
			'orderby'=> 'date',
			);
		$query = wp_parse_args( $query, $query_defaults );	
		
		$loop_query = new WP_Query($query);
		$output = '';
		$output .= $fav['start_warp'];
		while ( $loop_query->have_posts() ) : $loop_query->the_post();
			ob_start();
			include($this->loop);
			$output .= ob_get_contents();
			ob_end_clean();
		endwhile;
		$output .= $fav['end_warp'];
		
		if($fav['paging'] == 'true'){ $output .= gittly_pagination($loop_query->max_num_pages); }
		
		return $output;
		wp_reset_postdata(); // Reset Post Data
	}
	
	
	
	function page($fav){
		ob_start();
		include($this->page);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	
	
	function single($fav=array()){
		ob_start();
		include($this->single);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	
	
	
	
}//end class