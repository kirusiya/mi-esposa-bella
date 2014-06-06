function wpz_quicksand(filter_warp, container_warp, container_sub) {
		/*
		<ul class="filter">
			<li><a href="javascript:void(0)" class="comic-art">Comic Art</a></li>
			<li><a href="javascript:void(0)" class="comic-aasas">scds Art</a></li>
			<li><a href="javascript:void(0)" class="comwqic-art">ds</a></li>
			<li><a href="javascript:void(0)" class="cqwomic-art">sds Art</a></li>
		</ul>
		
		<ul class="filterable-grid ">
			<li data-id="id_1" data-type="class_name name">html goes here</li>
			<li data-id="id_1" data-type="class_name name">html goes here</li>
			<li data-id="id_1" data-type="class_name name">html goes here</li>
			<li data-id="id_1" data-type="class_name name">html goes here</li>
			<li data-id="id_1" data-type="class_name name">html goes here</li>
		</ul>
		
		jQuery(document).ready(function() {
			if(jQuery().quicksand) {
				wpz_quicksand(".filter li", "ul.filterable-grid", "li");	
			}
		});
		*/
		
		
		var $ = jQuery;
		// Setting Up Our Variables
		var $filter;
		var $container;
		var $containerClone;
		var $filterLink;
		var $filteredItems
		
		// Set Our Filter
		$filter = $(filter_warp+'.active a').attr('class');
		
		// Set Our Filter Link
		$filterLink = $(filter_warp+' a');
		
		// Set Our Container
		$container = $(container_warp);
		
		// Clone Our Container
		$containerClone = $container.clone();
		
		// Apply our Quicksand to work on a click function
		// for each for the filter li link elements
		$filterLink.click(function(e) 
		{
			// Remove the active class
			$(filter_warp).removeClass('active');
			
			// Split each of the filter elements and override our filter
			$filter = $(this).attr('class').split(' ');
			
			// Apply the 'active' class to the clicked link
			$(this).parent().addClass('active');
			
			// If 'all' is selected, display all elements
			// else output all items referenced to the data-type
			if ($filter == 'all') {
				$filteredItems = $containerClone.find(container_sub); 
			}
			else {
				$filteredItems = $containerClone.find(container_sub+'[data-type~=' + $filter + ']'); 
			}
			
			// Finally call the Quicksand function
			$container.quicksand($filteredItems, 
			{
				// The Duration for animation
				duration: 750,
				// the easing effect when animation
				easing: 'swing',
				// height adjustment becomes dynamic
				adjustHeight: 'dynamic' 
			}, function() { // callback function
				/*--Hover Effect--*/	
				$('.hover-active').hover(
					function () {
						$(this).animate({opacity:'1'});
					},
					function () {
						$(this).animate({opacity:'0'});
					}
				);
				$("a[rel^='prettyPhoto']").prettyPhoto();
		    });
			
						
		});
	}//



jQuery(document).ready(function($) {
	
	$(".faq_item .title").toggle(function(){
		$(this).addClass("active").closest('.faq_item').find('.inner').slideDown(400);
		}, function () {
		$(this).removeClass("active").closest('.faq_item').find('.inner').slideUp(400);
	});
	
	//Support prettyPhoto
	if(jQuery().prettyPhoto) {
		$("a[rel^='prettyPhoto']").prettyPhoto();	
	}

});