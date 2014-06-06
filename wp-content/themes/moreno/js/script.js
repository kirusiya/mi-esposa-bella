jQuery(document).ready(function($){
	$(".entry-video").fitVids();
	
	selectnav('nav');
	
	/* prettyPhoto */
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false /* html or false to disable */
	});
});
