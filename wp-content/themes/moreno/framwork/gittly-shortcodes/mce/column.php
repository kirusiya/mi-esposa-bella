<script type="text/javascript">
var ColumnDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ColumnDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertColumn(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var the_name = jQuery('select#column-name').val();
		var the_type = jQuery('select#column-type').val();
		var content = jQuery('textarea#column-content').val();
		 
		var output = '';
		
		if(the_type){the_type='_'+the_type;}
		
		if(content){  }else{ content= mceSelected;}
		
		// setup the output of our shortcode
		output += '['+the_name+the_type+' ]'+content+'[/'+the_name+the_type+']';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ColumnDialog.init, ColumnDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="column-name">Size</label>
        <select name="column-name" id="column-name" size="1">
            <option value="one_half" selected="selected">1/2</option>
            <option value="one_third">1/3</option>
            <option value="one_fourth">1/4</option>
            <option value="one_fifth">1/5</option>
            <option value="one_sixth">1/6</option>
            
            <option value="two_third">2/3</option>
            <option value="three_fourth">3/4</option>
            <option value="two_fifth">2/5</option>
            <option value="three_fifth">3/5</option>
            <option value="four_fifth">4/5</option>
            <option value="five_sixth">5/6</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="column-position">Position</label>
        <select name="column-type" id="column-type" size="1">
            <option value="" selected="selected">First</option>
            <option value="last">last</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="column-content">Content<br /><small>Leave Blank To Use Highlighted</small></label>
        <textarea type="text" name="column-content" value="" id="column-content"></textarea>
    </div>
    <a href="javascript:ColumnDialog.insert(ColumnDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>