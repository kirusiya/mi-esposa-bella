<script type="text/javascript">
var TitleDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TitleDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function inserttitle(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var text = jQuery('textarea#title-text').val();
		var style = jQuery('select#title-style').val();
		var t_class = jQuery('input#title-class').val();
		var t_id = jQuery('input#title-id').val();
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		output = '[title style="'+style+'" class="" id="" ';
				
		//insert text
		if(text) {	
			output += ']'+ text + '[/title]';
		}
		else {
			
		// if it is blank, use selected content
			output += ']' + mceSelected + '[/title]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TitleDialog.init, TitleDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="title-style">Type</label>
        <select name="title-style" id="title-style" size="1">
            <option value="1">Style #1</option>
             <option value="2">Style #2</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="title-text">Text</label>
        <textarea type="text" name="title-text" value="" id="title-text"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="title-text">Class</label>
        <input type="text" name="title-class" value="" id="title-class" />
    </div>
    <div class="form-section clearfix">
        <label for="title-text">ID</label>
        <input type="text" name="title-id" value="" id="title-id" />
    </div>
	<a href="javascript:TitleDialog.insert(TitleDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>