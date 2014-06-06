<script type="text/javascript">
var alertDialog = {
	local_ed : 'ed',
	init : function(ed) {
		alertDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertalert(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var type = jQuery('select#alert-type').val();			
		var content = jQuery('textarea#alert-content').val(); 
		 
		 
		// setup the output of our shortcode
		var output = '[alert type="'+type+'"]'+content+'[/alert]';

			
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(alertDialog.init, alertDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="alert-type">Type</label>
        <select name="alert-type" id="alert-type" size="1">
            <option value="warning">warning</option>
            <option value="error">error</option>
            <option value="success">success</option>
            <option value="info">info</option>
            <option value="notice" selected="selected">notice</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="alert-content">Content<br /><small>Leave Blank To Use Highlighted</small></label>
        <textarea type="text" name="alert-content" value="" id="alert-content"></textarea>
    </div>
	<a href="javascript:alertDialog.insert(alertDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>