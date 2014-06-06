<?php $gittly_radius = 'radius'; $gittly_shadow = 'shadow';?>
<?php get_header(); ?>

<?php if( have_posts() ): ?>
	<?php while ( have_posts() ): the_post(); ?> 
        <div class="content_area con_style shadow radius margin_top blog_item">
        	<div class="featured">
            	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); $image = $large_image_url[0] ?>
				<a href="<?php echo $image; ?>" rel="prettyPhoto"><?php echo get_the_post_thumbnail(get_the_ID(), 'blog_thumb'); ?></a>
            </div>
            
            <div class="clear"></div>
            <div class="content_inner">
            
            	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div align="center">
                	<span class="date"><?php _e('Posted By', 'gittly'); ?> <?php the_author_posts_link(); ?> <?php _e('On', 'gittly'); ?> <?php the_time('d M Y'); ?></span>
                    <div class="clear"></div>
                </div>

                <?php the_content(); ?>
                <div class="clear"></div>
                <hr />
                <div class="tags_area"><strong><?php _e('Categorys:', 'gittly'); ?>&nbsp;</strong><?php the_category(', '); ?></div><br />
                <div class="tags_area"><strong><?php _e('Tags:', 'gittly'); ?>&nbsp;</strong><?php the_tags('',', '); ?></div>
                
            </div><!--.content_inner-->
            <div class="clear"></div>
        </div><!--.content_area-->
	<?php endwhile; ?>
    	<?php if(ot_get_option('blog_comment') == 'yes'): ?>
    	<div class="content_area con_style shadow radius margin_top blog_item">
             <?php if ( comments_open() ) : ?>
            <div class="clear" style="height:20px"></div>
            <div class="content_inner">
            
            	<?php comments_template( '', true ); ?>
                <div class="clear"></div>
            </div><!--.content_inner-->
            <div class="clear"></div>
            <?php endif; ?>
        </div><!--.content_area-->
        <?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>  

<?php get_footer(); ?>      