(function() {
	tinymce.create('tinymce.plugins.gittly_shortcodesPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceo_gittly_shortcodes', function() {
				ed.windowManager.open({
					file : url + '/shortcodes-iframe.php', // file that contains HTML for our modal window
					width : 600 + parseInt(ed.getLang('zzz_video_shortcodes.delta_width', 0)), // size of our window
					height : 600 + parseInt(ed.getLang('gittlys.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register gittly_shortcode
			ed.addButton('gittly_shortcode', {title : 'Insert Shortcode', cmd : 'mceo_gittly_shortcodes', image: url + '/images/shortcodes.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'Big shortcode Insert Shortcode',
				author : 'SazzadH',
				authorurl : 'http://digitasolution.com',
				infourl : 'http://digitasolution.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	 
	// Register plugin
	// first parameter is the office_shortcodes ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('gittly_shortcode', tinymce.plugins.gittly_shortcodesPlugin);

})();