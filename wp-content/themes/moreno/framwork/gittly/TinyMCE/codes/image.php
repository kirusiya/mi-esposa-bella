<script type="text/javascript">
var ImageDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ImageDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertImage(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var img_src = jQuery('input#image-src').val();
		var img_title = jQuery('textarea#image-title').val();
		var img_width = jQuery('input#image-width').val();
		var img_height = jQuery('input#image-height').val();
		var img_class = jQuery('input#image-class').val();
		var img_id = jQuery('input#image-id').val();


		if(img_src){img_src = 'src="'+img_src+'" ';}else{ img_src = '';}
		if(img_title){img_title = 'title="'+img_title+'" ';}else{ img_title = '';}
		if(img_width){img_width = 'width="'+img_width+'" ';}else{ img_width = '';}
		if(img_height){img_height = 'height="'+img_height+'" ';}else{ img_height = '';}
		if(img_class){img_class = 'class="'+img_class+'" ';}else{ img_class = '';}
		if(img_id){img_id = 'id="'+img_id+'" ';}else{ img_id = '';}
		 
		var output = '[image '+ img_src + img_height + img_width + img_title + img_class + img_id + ' /]';
		
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ImageDialog.init, ImageDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="image-src">Image URL</label>
        <input type="text" name="image-src" value="" id="image-src" />
    </div>
	<div class="form-section clearfix">
        <label for="image-width">Width</label>
        <input type="text" name="image-width" value="" id="image-width" />
    </div>
	<div class="form-section clearfix">
        <label for="image-height">Height</label>
        <input type="text" name="image-height" value="" id="image-height" />
    </div>
    <div class="form-section clearfix">
        <label for="image-title">Title</label>
        <textarea  name="image-title" id="image-title"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="image-class">Class</label>
        <input type="text" name="image-class" value="" id="image-class" />
    </div>
    <div class="form-section clearfix">
        <label for="image-id">ID</label>
        <input type="text" name="image-id" value="" id="image-id" />
    </div> 
	<a href="javascript:ImageDialog.insert(ImageDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>