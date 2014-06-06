<?php global $gittly_radius, $gittly_shadow; ?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="bignet">
<meta charset="utf-8">
<title>
	<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'gittly' ), max( $paged, $page ) );
	?>
</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="shortcut icon" href="<?php echo ot_get_option('favicon'); ?>">
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    
<!--[if gte IE 9]>
	<style type="text/css">
		.gradient {
			filter: none;
         }
	</style>
<![endif]-->
<?php wp_head(); ?>
		
		
		
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="wrapper_inner">
    
    	<?php if(is_front_page()): ?>
            <div class="front_menu">
            	 <?php if(has_nav_menu('main_menu')){
					wp_nav_menu( array('container'=>false, 'menu_id'=>'nav', 'theme_location'=>'main_menu') );
				 } ?>
            </div>
		<?php endif; ?>
    	<div class="<?php if(is_front_page()){ echo 'logo-warper'; } ?>">
            <div class="logo_area <?php if(is_front_page()){ echo 'front_page'; } ?>">
                <div class="gap"></div>
                <?php theme_logo(ot_get_option('logo'), ot_get_option('show_description')); ?>
            </div><!--.logo_area-->
        </div>
        
        <div class="header_area <?php if(!is_front_page()){ echo $gittly_radius.' '.$gittly_shadow.' con_style'; } ?>">
        	<div class="clear" style="height:1px"></div>
            
            <?php if(!is_front_page()): ?>
            <div class="main_menu">
            	 <?php if(has_nav_menu('main_menu')){
					wp_nav_menu( array('container'=>false, 'menu_id'=>'nav', 'theme_location'=>'main_menu') );
				 } ?>
            </div>
            <?php endif; ?>
            
            <div class="clear" style="height:1px"></div>
            
            <?php if(!is_front_page()): ?>
            <div class="page_title">
				<?php if(is_home()): ?><h1><?php echo ot_get_option('blog_title'); ?></h1><span><?php echo ot_get_option('blog_subtitle'); ?></span><?php else: ?><h1><?php gittly_title() ?></h1><span><?php echo get_post_meta(get_the_ID(), 'wpage_subtitle', true) ?></span><?php endif; ?>
                 <div class="dea"></div>
                 <div class="clear"<?php if($gittly_shadow){ echo 'style="height:26px;"'; } ?>></div>
            </div>
            <?php endif; ?>
            
        </div><!--.header_area-->