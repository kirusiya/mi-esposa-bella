<script type="text/javascript">
var DropcapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		DropcapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertDropcap(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var text = jQuery('textarea#dropcap-text').val();
		var style = jQuery('select#dropcap-style').val();
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		output = '[dropcap style="'+style+'" ';
				
		//insert text
		if(text) {	
			output += ']'+ text + '[/dropcap]';
		}
		else {
			
		// if it is blank, use selected content
			output += ']' + mceSelected + '[/dropcap]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(DropcapDialog.init, DropcapDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="dropcap-style">Type</label>
        <select name="dropcap-style" id="dropcap-style" size="1">
            <option value="1">Style #1</option>
             <option value="2">Style #2</option>
            <option value="3">Style #3</option>
            <option value="4">Style #4</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="dropcap-text">Text</label>
        <textarea type="text" name="dropcap-text" value="" id="dropcap-text"></textarea>
    </div>
	<a href="javascript:DropcapDialog.insert(DropcapDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>