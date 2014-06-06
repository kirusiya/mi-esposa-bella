		<?php if(ot_get_option('enable_footer')=='yes'): ?>
        	<?php if(is_front_page() == false): ?>
                <div class="content_area con_style shadow radius margin_top"><div class="clear"></div>
                    <div class="content_inner" style="width:90%; margin-bottom:20px;">
                        <div class="clear" style="height:25px;"></div>
                        <div class="container">
                            <div class="col col_1_3"><?php dynamic_sidebar('footer_widgets_1'); ?></div>
                            <div class="col col_1_3"><?php dynamic_sidebar('footer_widgets_2'); ?></div>
                            <div class="col col_1_3"><?php dynamic_sidebar('footer_widgets_3'); ?></div>
                        </div>
                        <div class="clear"></div>
                    </div><!--#footer_widget_inner-->
                    <div class="clear"></div>
                </div><!--#footer_widget-->
        	<?php endif; ?>
		<?php endif; ?>
		
        <?php if(ot_get_option('social_enable')=='yes'): ?>
        <div class="social_bar">
        	 <?php if(ot_get_option('social_facebook') != ''): ?><a href="<?php echo ot_get_option('social_facebook'); ?>" target="_blank"><img src="<?php echo THEME_URL; ?>/images/facebook-icon.png"></a><?php endif; ?>
            <?php if(ot_get_option('social_twitter') != ''): ?><a href="<?php echo ot_get_option('social_twitter'); ?>" target="_blank"><img src="<?php echo THEME_URL; ?>/images/twitter-icon.png"></a><?php endif; ?>
            <?php if(ot_get_option('social_vimeo') != ''): ?><a href="<?php echo ot_get_option('social_vimeo'); ?>" target="_blank"><img src="<?php echo THEME_URL; ?>/images/vimeo-icon.png"></a><?php endif; ?>
            <?php if(ot_get_option('social_dribbble') != ''): ?><a href="<?php echo ot_get_option('social_dribbble'); ?>" target="_blank"><img src="<?php echo THEME_URL; ?>/images/dribbble-icon.png"></a><?php endif; ?>
        </div><!--.social_bar-->
        <?php endif; ?>
        
        <div class="copyright <?php if(is_front_page()){ echo 'front_page'; } ?>">
        	<?php echo ot_get_option('footer_copyright_text'); ?>
        </div><!--.copyright-->
        
	</div><!--#wrapper_inner-->
</div><!--#wrapper-->

<!--Arrow Navigation-->
<a id="prevslide" class="load-item <?php if(is_front_page()){ echo 'front_page'; }else{ echo 'inner_page';} ?>"></a>
<a id="nextslide" class="load-item <?php if(is_front_page()){ echo 'front_page'; }else{ echo 'inner_page';} ?>"></a>
        
<!--Time Bar-->
<div id="progress-back" class="load-item">
	<div id="progress-bar"></div>
</div>
<p>Web Hosting Bolivia: <a href="http://www.hostingbo.net" target="_blank" title="web hosting bolivia">HostingBO.net</a></p> </div>

<?php wp_footer(); ?>
</body>
</html>