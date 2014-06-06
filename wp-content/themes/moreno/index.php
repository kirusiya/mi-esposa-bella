<?php $gittly_radius = 'radius'; $gittly_shadow = 'shadow';?>
<?php get_header(); ?>

<?php if( have_posts() ): ?>
	<?php while ( have_posts() ): the_post(); ?> 
        <div <?php post_class('content_area con_style shadow radius margin_top blog_item '); ?>>
        	<div class="featured">
            	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
				<a href="<?php echo $large_image_url[0]; ?>" rel="prettyPhoto"><?php echo get_the_post_thumbnail(get_the_ID(), 'blog_thumb'); ?></a>
            </div>
            
            <div class="clear"></div>
            <div class="content_inner">
            
            	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div align="center">
                	<span class="date"><?php _e('Posted By', 'gittly'); ?> <?php the_author_posts_link(); ?> <?php _e('On', 'gittly'); ?> <?php the_time('d M Y'); ?></span>
                    <div class="clear"></div>
                </div>

                <?php the_excerpt(); ?>
                
            </div><!--.content_inner-->
            <div class="clear"></div>
        </div><!--.content_area-->
	<?php endwhile; ?>
    
    <?php 
		$big = 999999999; // need an unlikely integer
		$paginate_links = paginate_links(array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages ,
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
<?php get_footer(); ?>  

<?php get_footer(); ?>      