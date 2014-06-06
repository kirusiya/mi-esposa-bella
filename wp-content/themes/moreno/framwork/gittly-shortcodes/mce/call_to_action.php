<script type="text/javascript">
var CallToActionDialog = {
	local_ed : 'ed',
	init : function(ed) {
		CallToActionDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertcalltoaction(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var cta_button_color = jQuery('select#calltoaction-button_color').val();
		var cta_title = jQuery('input#calltoaction-title').val();
		var cta_text = jQuery('textarea#calltoaction-text').val();
		var cta_link = jQuery('input#calltoaction-link').val();
		var cta_class = jQuery('input#calltoaction-class').val();
		var cta_id = jQuery('input#calltoaction-id').val();
		var cta_button_text = jQuery('input#calltoaction-button_text').val();
		var cta_button_top_margin = jQuery('input#calltoaction-button_top_margin').val();


		if(cta_button_color){cta_button_color = 'button_color="'+cta_button_color+'" ';}else{ cta_button_color = '';}
		if(cta_title){cta_title = 'title="'+cta_title+'" ';}else{ cta_title = '';}
		if(cta_text){cta_text = 'text="'+cta_text+'" ';}else{ cta_text = '';}
		if(cta_link){cta_link = 'link="'+cta_link+'" ';}else{ cta_link = '';}
		if(cta_class){cta_class = 'class="'+cta_class+'" ';}else{ cta_class = '';}
		if(cta_id){cta_id = 'id="'+cta_id+'" ';}else{ cta_id = '';}
		if(cta_button_text){cta_button_text = 'button_text="'+cta_button_text+'" ';}else{ cta_button_text = '';}
		if(cta_button_top_margin){cta_button_top_margin = 'button_top_margin="'+cta_button_top_margin+'" ';}else{ cta_button_top_margin = '';}
		 
		var output = '[call_to_action '+ cta_button_color + cta_link + cta_title + cta_class + cta_id + cta_button_text + cta_button_top_margin + cta_text + ' /]';
		
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(CallToActionDialog.init, CallToActionDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="calltoaction-title">Title</label>
        <input type="text" name="calltoaction-title" value="" id="calltoaction-title" />
    </div>
    
    <div class="form-section clearfix">
        <label for="calltoaction-text">Description</label>
        <textarea  name="calltoaction-text" id="calltoaction-text"></textarea>
    </div>
    
    <div class="form-section clearfix">
        <label for="calltoaction-button_text">Button Text</label>
        <input type="text" name="calltoaction-button_text" value="" id="calltoaction-button_text" />
       
    </div>
    
    <div class="form-section clearfix">
        <label for="calltoaction-link">Button link</label>
        <input type="text" name="calltoaction-link" value="" id="calltoaction-link" />
    </div>
    
    <div class="form-section clearfix">
        <label for="calltoaction-link">Button Top Margin</label>
        <input type="text" name="calltoaction-button_top_margin" value="20" id="calltoaction-button_top_margin" />
    </div>
    
	<div class="form-section clearfix">
        <label for="calltoaction-button_color">Button Color</label>
         <select name="calltoaction-button_color" id="calltoaction-button_color">
        	<option value=""></option>
        	<option value="black">black</option>
            <option value="gray">gray</option>
            <option value="white">white</option>
            <option value="orange">orange</option>
            <option value="red">red</option>
            <option value="blue">blue</option>
            <option value="rosy">rosy</option>
            <option value="green">green</option>
            <option value="pink">pink</option>
           
        </select>
    </div>
    
    <div class="form-section clearfix">
        <label for="calltoaction-class">Class</label>
        <input type="text" name="calltoaction-class" value="" id="calltoaction-class" />
    </div>
    
    <div class="form-section clearfix">
        <label for="calltoaction-id">ID</label>
        <input type="text" name="calltoaction-id" value="" id="calltoaction-id" />
    </div> 
     
	<a href="javascript:CallToActionDialog.insert(CallToActionDialog.local_ed)" id="insert" style="display: block; line-link: 24px;">Insert</a>
</form>