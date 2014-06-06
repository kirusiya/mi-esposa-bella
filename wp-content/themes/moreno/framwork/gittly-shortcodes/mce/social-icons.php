<script type="text/javascript">
var SocialIconsDialog = {
	local_ed : 'ed',
	init : function(ed) {
		SocialIconsDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSocialIcons(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var s_type = jQuery('#SocialIcons-type').val();
		var s_title = jQuery('#SocialIcons-title').val();
		var s_link = jQuery('#SocialIcons-link').val();
		var s_class = jQuery('#SocialIcons-class').val();
		
		if(s_type){ s_type = 'type="'+s_type+'" ';}
		if(s_title){ s_title = 'title="'+s_title+'" ';}
		if(s_link){ s_link = 'link="'+s_link+'" ';}
		if(s_class){ s_class = 'class="'+s_class+'" ';}
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		output = '[social_icon '+s_type+s_title+s_link+s_class+' /]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(SocialIconsDialog.init, SocialIconsDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="SocialIcons-type">Type</label>
        <select name="SocialIcons-type" id="SocialIcons-type" size="1">
            <option value="dribbble">dribbble</option>
            <option value="facebook">facebook</option>
            <option value="flickr">flickr</option>
            <option value="linkedin">linkedin</option>
            <option value="picasa">picasa</option>
            <option value="rss">rss</option>
            <option value="stumbleupon">stumbleupon</option>
            <option value="twitter">twitter</option>
            <option value="viemo">viemo</option>
            <option value="yahoo">yahoo</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="SocialIcons-link">Profile Link</label>
        <textarea type="text" name="SocialIcons-link" value="" id="SocialIcons-link"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="SocialIcons-title">Title</label>
        <input type="text" name="SocialIcons-title" value="" id="SocialIcons-title" />
    </div>
    <div class="form-section clearfix">
        <label for="SocialIcons-text">Class</label>
        <input type="text" name="SocialIcons-class" value="" id="SocialIcons-class" />
    </div>
	<a href="javascript:SocialIconsDialog.insert(SocialIconsDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>