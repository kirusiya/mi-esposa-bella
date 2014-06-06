<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;



/*
=================================================================
****Image thubble
=================================================================
*/	
function gittly_thumb($src, $w = '', $h = '', $cz = '1'){
	$the_src = gittly_image_src ($src);
	return GITTLY_THUMB.'?src='.$the_src.'&amp;w='.$w.'&amp;h='.$h.'&amp;cz='.$cz;
}






/*
=================================================================
****Pagination
=================================================================
*/	
function gittly_pagination($pages = '', $range = 2){  
	 $showitems = ($range * 2)+1;  
	$output = '';
	 
	 if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
		
	} else {
		$paged = 1;
	}
		 
		 
	 if(empty($paged)) $paged = 1;

	 if($pages == '')
	 {
		 global $wp_query;
		 $pages = $wp_query->max_num_pages;
		 if(!$pages)
		 {
			 $pages = 1;
		 }
	 }   
	
	 if(1 != $pages)
	 {
		 $output .= "<div class='gittly_pagination'>";
		 if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
		 if($paged > 1 && $showitems < $pages) $output .= "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

		 for ($i=1; $i <= $pages; $i++)
		 {
			 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			 {
				 $output .= ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			 }
		 }
	
		 if ($paged < $pages && $showitems < $pages) $output .= "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
		 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		 $output .= "</div>\n";
	 }
		 
	 return $output;
}
	
	
	

	
/*
=================================================================
****get_the_terms
=================================================================
*/		
function gittly_get_the_terms($id, $taxonomy, $name = 'name', $markup =  array('start'=>'', 'end'=>'')){
	$terms = get_the_terms( $id, $taxonomy);
	if ( $terms && ! is_wp_error( $terms ) ){
		$output = '';
		foreach ( $terms as $term ) {
			$output .= $markup['start'].$term->$name.$markup['end'];
		}
		return $output;
	}
}
	



/*
=================================================================
****Featured Image Src function
=================================================================
*/	
function gittly_featured_image_src($id, $w=150, $h=150){
	if(!$id){$id = get_the_ID();}
	$get_image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full');
		
	if(($w == '')&&($w == '')){
		$src = $get_image[0];
	}else{
		$src = GITTLY_THUMB.'?src='.$get_image[0].'&amp;w='.$w.'&amp;h='.$h;
	}
	return $src;
}
	




/*
=================================================================
****taxonomy list with any layout
=================================================================
*/
function gittly_taxonomy_list($id, $taxonomy = 'post_tag', $name = 'Tags', $html = '<a href="%link%">%name%</a>'){
	$terms = get_the_terms( $id, $taxonomy);
	if ( $terms && ! is_wp_error( $terms ) ){
		$output = $name;
		foreach ( $terms as $term ) {
			$link = get_term_link( $term->slug, $taxonomy);
			$output .= str_replace(
						array('%name%', '%link%', '%slug%'),
						array($term->name, $link, $term->slug),
						$html
					);//str_replace
		}
		return $output;
	}
}






/*
=================================================================
****Add support for multi wordpress
=================================================================
*/	
function gittly_image_src ($src) {
	$theImageSrc = $src;
	global $blog_id;
	if (isset($blog_id) && $blog_id > 0) {
		$imageParts = explode('/files/', $theImageSrc);
		if (isset($imageParts[1])) {
			$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $theImageSrc;
}





/*
=================================================================
****Post excerpt
=================================================================
*/	
function gittly_excerpt($len = 50, $query = null ){
	global $post;
	$newExcerpt = substr(get_the_excerpt(), 0, $len); //truncate excerpt according to $len
	if(strlen($newExcerpt) < strlen($post->post_excerpt)) {
		$newExcerpt = $newExcerpt;
	}
	return "<p>".$newExcerpt."</p>"; //finally display excerpt
}







/*
=================================================================
****Breadcrumbs
=================================================================
*/	
function dimox_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '/'; // delimiter between crumbs &raquo;
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = home_url();
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'gittly') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end dimox_breadcrumbs()



function themeoption_color($class, $color){
	echo '<style type="text/css">';
	
		foreach($class as $the_class){
			
			if($the_class['mood'] == 'c'){
				
				echo $the_class['ids'].'{color:'.$color.';}';
				
			}elseif($the_class['mood'] == 'b'){
				
				echo $the_class['ids'].'{border-color:'.$color.';}';
				
			}elseif($the_class['mood'] == 'bg'){
				
				echo $the_class['ids'].'{background-color:'.$color.';}';
			}
			
		}
		
	echo '</style>';
}