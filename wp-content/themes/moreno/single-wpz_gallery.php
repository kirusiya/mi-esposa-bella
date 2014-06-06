<?php $gittly_radius = 'radius_top'; $gittly_shadow = ''; ?>
<?php get_header(); ?>

<div class="content_area con_style shadow radius_buttom">
	<div class="clear"></div>
	<div class="content_inner" style="width:90%;">
		<?php 
			if( have_posts() ){
				while ( have_posts() ){ the_post(); 
				$prettyPhoto_grouping = '';
				if(get_post_meta($post->ID, 'gallery_slideshow', true) == 'yes'){ $prettyPhoto_grouping = '[g]'; }
				?> 
					<?php the_content(); ?>
                    <?php 
						global $post;
						$args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'post_parent' => $post->ID
						);
						
						$gallery_images = get_post_meta($post->ID, 'gallery_images', true);
						if ( $gallery_images ) {
							foreach ( $gallery_images as $gallery_image ) {
								$image_url = $gallery_image['image'];
								$image_id = get_attachment_id_by_src ($image_url);
								
								$image_thumb = wp_get_attachment_image_src($image_id, 'gallery_thumb');
								$image_full = wp_get_attachment_image_src($image_id, 'full');
								
								if($gallery_image['link']){
									echo '<a href="'.$gallery_image['link'].'" class="g_img" title="'.$gallery_image['title'].'"><img src="' . $image_thumb[0] . '"/></a>';
								}else{
									echo '<a href="'.$image_full[0].'" rel="prettyPhoto'.$prettyPhoto_grouping.'" class="g_img" title="'.$gallery_image['title'].'"><img src="' . $image_thumb[0] . '"/></a>';
								}
							}
						}
					 ?>
                    <?php wp_link_pages(array('before' => '<p class="page_nav_link">' . __('Pages:', 'gittly'), 'after' => '</p>',)); ?>
				<?php }
			}
		?>
        <div class="clear"></div>
	</div><!--.content_inner-->
    <div class="clear"></div>
</div><!--.content_area-->

<?php get_footer(); ?>      