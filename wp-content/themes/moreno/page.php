<?php $gittly_radius = 'radius_top'; $gittly_shadow = ''; ?>
<?php get_header(); ?>

<div class="content_area con_style shadow radius_buttom">
	<div class="clear"></div>
	<div class="content_inner">
		<?php 
			if( have_posts() ){
				while ( have_posts() ){ the_post(); ?> 
					<?php the_content(); ?>
                    <?php wp_link_pages(array('before' => '<p class="page_nav_link">' . __('Pages:', 'gittly'), 'after' => '</p>',)); ?>
				<?php }
			}
		?><div class="clear"></div>
	</div><!--.content_inner-->
    <div class="clear"></div>
</div><!--.content_area-->

<?php get_footer(); ?>      