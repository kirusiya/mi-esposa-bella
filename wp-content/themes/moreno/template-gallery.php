<?php
/*
Template Name: Gallery Template
*/
 $gittly_radius = 'radius'; $gittly_shadow = 'shadow';?>
<?php get_header(); ?>
<?php 
	$paged = 1;  
	if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	if ( get_query_var('page') ) $paged = get_query_var('page');  
?>
<?php $query = new WP_Query( 'post_type=wpz_gallery&paged=' . $paged ); ?>
<?php if( $query->have_posts() ): ?>
	<div class="gallery_area">
   		<div class="gallery_area_inner">
			<?php while ( $query->have_posts() ): $query->the_post(); ?> 
                <div class="gallery_item shadow radius">
                	
                    <a href="<?php the_permalink(); ?>">
                    <div class="overly"><div class="clear"></div><?php the_title(); ?></div>
						<?php echo get_the_post_thumbnail($query->post->ID, 'gallery_thumb', array('alt'=> get_the_title())); ?>
                    </a>
                </div>
			<?php endwhile; ?>
        </div>
	</div>
    <div class="clear"></div>
 
	<?php 
		$big = 999999999; // need an unlikely integer
		$paginate_links = paginate_links(array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $query->max_num_pages ,
			'type' => 'array'
		));
		
		if(is_array($paginate_links)){ ?>
        <div class="paginate_area shadow radius con_style margin_top">
            <div class="paginate">
            <?php
                foreach($paginate_links as $paginate_link){
                    echo $paginate_link;
                }
			?>
            </div>
		</div>
	<?php } ?>
<?php endif; ?>
<?php wp_reset_postdata(); // Reset Post Data ?>

<?php get_footer(); ?>      