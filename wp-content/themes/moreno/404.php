<?php $gittly_radius = 'radius_top'; $gittly_shadow = ''; ?>
<?php get_header(); ?>

<div class="content_area con_style shadow radius_buttom">
	<div class="clear"></div>
	<div class="content_inner">
		<center>
			<p style="font-size:180px; line-height:200px;"><?php _e('404', 'gittly'); ?></p>
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'gittly' ); ?></p>
			<?php get_search_form(); ?>
		</center>
	</div><!--.content_inner-->
    <div class="clear"></div>
</div><!--.content_area-->

<?php get_footer(); ?>      