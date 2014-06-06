<?php
/*
Template Name: Contact Template
*/
 $gittly_radius = 'radius'; $gittly_shadow = 'shadow';?>
<?php get_header(); ?>

<div class="content_area con_style shadow radius margin_top conatct_page"><div class="clear"></div>
	<div class="contact_inner">
        <div class="clear" style="height:25px;"></div>
        <div class="content_inner">
            <?php if(have_posts() ): ?>
                <?php while ( have_posts() ): the_post(); ?> 
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

<?php wp_reset_postdata(); // Reset Post Data ?>

<?php get_footer(); ?>      