<script type="text/javascript">
var codeDialog = {
	local_ed : 'ed',
	init : function(ed) {
		codeDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertcode(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var text = jQuery('textarea#code-text').val();
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		output = '[code';
				
		//insert text
		if(text) {	
			output += ']'+ text + '[/code]';
		}
		else {
			
		// if it is blank, use selected content
			output += ']' + mceSelected + '[/code]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(codeDialog.init, codeDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="code-text">Text</label>
        <textarea type="text" name="code-text" value="" id="code-text"></textarea>
    </div>
	<a href="javascript:codeDialog.insert(codeDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>