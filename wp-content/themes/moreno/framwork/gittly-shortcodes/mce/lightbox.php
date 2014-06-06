<script type="text/javascript">
var LightboxDialog = {
	local_ed : 'ed',
	init : function(ed) {
		LightboxDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertLightbox(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var src = jQuery('input#lightbox-src').val();
		var title = jQuery('input#lightbox-title').val();
		var group = jQuery('input#lightbox-group').val();
		var width = jQuery('input#lightbox-width').val();
		var height = jQuery('input#lightbox-height').val();
		var iframe = jQuery('select#lightbox-iframe').val();
		var text = jQuery('textarea#lightbox-text').val();
		
		
		if(src){src = 'src="'+src+'" ';}else{ src = '';}
		if(title){title = 'title="'+title+'" ';}else{ title = '';}
		if(group){group = 'group="'+group+'" ';}else{ group = '';}
		if(width){width = 'width="'+width+'" ';}else{ width = '';}
		if(height){height = 'height="'+height+'" ';}else{ height = '';}
		if(iframe){iframe = 'iframe="'+iframe+'" ';}else{ iframe = '';}
		if(text){ the_text = text; }else{ the_text = mceSelected;}
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[lightbox '+ src + title + group + width + height + iframe + ']'+ the_text +'[/lightbox]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(LightboxDialog.init, LightboxDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="lightbox-src">SRC</label>
        <input type="text" name="lightbox-src" value="" id="lightbox-src"  />
    </div>
    <div class="form-section clearfix">
        <label for="lightbox-title">Title</label>
        <input type="text" name="lightbox-title" value="" id="lightbox-title"  />
    </div>
    <div class="form-section clearfix">
        <label for="lightbox-group">Group</label>
        <input type="text" name="lightbox-group" value="" id="lightbox-group"  />
    </div>
    <div class="form-section clearfix">
        <label for="lightbox-width">Width</label>
        <input type="text" name="lightbox-width" value="" id="lightbox-width"  />
    </div>
    <div class="form-section clearfix">
        <label for="lightbox-height">Height</label>
        <input type="text" name="lightbox-height" value="" id="lightbox-height"  />
    </div>
	<div class="form-section clearfix">
        <label for="lightbox-iframe">iframe</label>
        <select name="lightbox-iframe" id="lightbox-iframe" size="1">
            <option value="">Flase</option>
             <option value="true">True</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="lightbox-text">Text</label>
        <textarea type="text" name="lightbox-text" value="" id="lightbox-text"></textarea>
    </div>
	<a href="javascript:LightboxDialog.insert(LightboxDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>