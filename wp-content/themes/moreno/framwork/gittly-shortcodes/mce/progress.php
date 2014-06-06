<script type="text/javascript">
var progressDialog = {
	local_ed : 'ed',
	init : function(ed) {
		progressDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertprogress(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var c_text = jQuery('textarea#progress-text').val();
		var c_percentage = jQuery('input#progress-percentage').val();
		
		if(c_text){c_text = c_text;}else{c_text = mceSelected;}
		if(c_percentage){ c_percentage = 'percentage="'+c_percentage+'" ' }
		
		var output = '';
		
		// setup the output of our shortcode
		output = '[progress '+ c_percentage +']' + c_text + '[/progress]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(progressDialog.init, progressDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="progress-text">Text</label>
        <textarea type="text" name="progress-text" value="" id="progress-text"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="progress-percentage">Percentage</label>
        <input type="text" name="progress-percentage" value="75" id="progress-percentage" /> %
    </div>
	<a href="javascript:progressDialog.insert(progressDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>