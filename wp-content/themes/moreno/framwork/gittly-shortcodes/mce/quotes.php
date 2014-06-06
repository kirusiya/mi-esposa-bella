<script type="text/javascript">
var quotesDialog = {
	local_ed : 'ed',
	init : function(ed) {
		quotesDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertquotes(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var c_text = jQuery('textarea#quotes-text').val();
		var c_class = jQuery('input#quotes-class').val();
		var c_id = jQuery('input#quotes-id').val();
		
		if(c_text){c_text = c_text;}else{c_text = mceSelected;}
		if(c_class){ c_class = 'class="'+c_class+'" ' }
		if(c_id){ c_id = 'id="'+c_id+'" ' }
		
		var output = '';
		
		// setup the output of our shortcode
		output = '[quote '+ c_class + c_id +']' + c_text + '[/quote]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(quotesDialog.init, quotesDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="quotes-text">Text</label>
        <textarea type="text" name="quotes-text" value="" id="quotes-text"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="quotes-class">Class</label>
        <input type="text" name="quotes-class" value="" id="quotes-class" />
    </div>
    <div class="form-section clearfix">
        <label for="quotes-id">id</label>
        <input type="text" name="quotes-id" value="" id="quotes-id" />
    </div>
	<a href="javascript:quotesDialog.insert(quotesDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>