<script type="text/javascript">
var TabsDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TabsDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function inserttabs(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var wrap = jQuery('select#tabs-wrap').val();
		var title = jQuery('input#tabs-title').val();
		var content = jQuery('textarea#tabs-content').val();
		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var output = '';
		
		// setup the output of our shortcode
		output = '';
		
		if(wrap == 'yes') {
			output += '[tabs]';
		}
		
				output += '[tab title=\"';
				if(title){
					output += title+'\"';
				} else {
					output += 'Sample Title\"';
				}
				
				if(content) {	
					output += ']'+ content;
				}
				else {
					output += ']' + mceSelected;
				}
					
				output += '[/tab]';
		
		if(wrap == 'yes') {
			output += '[/tabs]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TabsDialog.init, TabsDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
        <div class="form-section clearfix">
            <label for="tabs-wrap">New Tab</label>
            <select name="tabs-wrap" id="tabs-wrap" size="1">
                <option value="no" selected="selected">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="form-section clearfix">
            <label for="tabs-title">Tab Title</label>
            <input type="text" name="tabs-title" value="" id="tabs-title" />
        </div>
        <div class="form-section clearfix">
            <label for="tabs-content">Tab Content<br /><small>Leave Blank To Use Highlighted</small></label>
            <textarea type="text" name="tabs-content" value="" id="tabs-content"></textarea>
        </div>
    
    <a href="javascript:TabsDialog.insert(TabsDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
    
</form>