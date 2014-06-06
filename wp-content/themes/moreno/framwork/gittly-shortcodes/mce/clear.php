<script type="text/javascript">
var ClearDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ClearDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertclear(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var c_height = jQuery('textarea#clear-height').val();
		var c_class = jQuery('input#clear-class').val();
		var c_id = jQuery('input#clear-id').val();
		
		if(c_height){ c_height = 'height="'+c_height+'" ' }
		if(c_class){ c_class = 'class="'+c_class+'" ' }
		if(c_id){ c_id = 'id="'+c_id+'" ' }
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[clear '+c_height+c_class+c_id+' /]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ClearDialog.init, ClearDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="clear-text">Height</label>
        <textarea type="text" name="clear-text" value="" id="clear-height"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="clear-text">Class</label>
        <input type="text" name="clear-class" value="" id="clear-class" />
    </div>
    <div class="form-section clearfix">
        <label for="clear-text">ID</label>
        <input type="text" name="clear-id" value="" id="clear-id" />
    </div>
	<a href="javascript:ClearDialog.insert(ClearDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>