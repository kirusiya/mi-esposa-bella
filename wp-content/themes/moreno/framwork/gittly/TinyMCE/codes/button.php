<script type="text/javascript">
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton2(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var n_url = jQuery('input#button-url').val();
		var n_text = jQuery('input#button-text').val();
		var n_color = jQuery('select#button-color').val(); 
		var n_size = jQuery('select#button-size').val(); 
		var n_target = jQuery('select#button-target').val(); 
		var n_icon = jQuery('input#button-icon').val(); 
		var n_class = jQuery('input#button-class').val();
		var n_id = jQuery('input#button-id').val();
		var n_title = jQuery('input#button-title').val(); 
		
		
		if(n_url){ n_url = 'link="'+n_url+'" '; }
		if(n_text){ n_text = 'text="'+n_text+'" '; }
		if(n_color){ n_color = 'color="'+n_color+'" '; }
		if(n_size){ n_size = 'size="'+n_size+'" '; }
		if(n_target){ n_target = 'target="'+n_target+'" '; }
		if(n_icon){ n_icon = 'icon="'+n_icon+'" '; }
		if(n_class){ n_class = 'class="'+n_class+'" '; }
		if(n_id){ n_id = 'id="'+n_id+'" '; }
		if(n_title){ n_title = 'title="'+n_title+'" '; }
		
		// setup the output of our shortcode
		var output = '[button ' + n_url + n_text + n_color + n_size + n_target + n_icon + n_class + n_id + n_title + '/]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="button-url">Link</label>
        <input type="text" name="button-url" value="" id="button-url" />
    </div>
    <div class="form-section clearfix">
        <label for="button-text">Button Text<br /></label>
        <input type="text" name="button-text" value="" id="button-text" />
    </div>
	<div class="form-section clearfix">
        <label for="button-color">Color</label>
        <select name="button-color" id="button-color" size="1">
            <option value="" selected="selected">Desfult</option>
            <option value="gray">Gray</option>
            <option value="white">White</option>
            <option value="orange">Orange</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="rosy">Rosy</option>
            <option value="green">Green</option>
            <option value="pink">Pink</option>
            <option value="purple">Purple</option>
            <option value="black">Black</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="button-size">Size</label>
        <select name="button-size" id="button-size" size="1">
            <option value="" selected="selected">Deafult</option>
            <option value="small">Small</option>
            <option value="big">big</option>
            <option value="extrabig">extra big</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="button-target">target</label>
        <select name="button-target" id="button-target" size="1">
            <option value="" selected="selected">_parent</option>
            <option value="_blank">_blank</option>     
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="button-icon">Icon<br /><small>Enter full URL of the icon</small></label>
        <input type="text" name="button-icon" value="" id="button-icon" />
    </div>
    <div class="form-section clearfix">
        <label for="button-class">Class<br /><small>Enter calss name</small></label>
        <input type="text" name="button-class" value="" id="button-class" />
    </div>
    <div class="form-section clearfix">
        <label for="button-id">ID<br /><small>Enter ID name.</small></label>
        <input type="text" name="button-id" value="" id="button-id" />
    </div>
    <div class="form-section clearfix">
        <label for="button-title">Title<br /><small>Title of the button</small></label>
        <input type="text" name="button-title" value="" id="button-title" />
    </div>
	<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>