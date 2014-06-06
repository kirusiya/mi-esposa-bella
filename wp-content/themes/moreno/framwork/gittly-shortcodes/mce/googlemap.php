<script type="text/javascript">
var GoogleMapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		GoogleMapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertGoogleMap(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var maptype = jQuery('select#gmap-url').val();
		var height = jQuery('input#gmap-height').val();
		var width = jQuery('input#gmap-width').val();
		var latitude = jQuery('input#gmap-latitude').val();
		var longitude = jQuery('input#gmap-longitude').val();
		var address = jQuery('input#gmap-address').val();
		var the_html = jQuery('textarea#gmap-html').val();
		var icon_url = jQuery('input#gmap-icon_url').val();
		var iconsize = jQuery('input#gmap-iconsize').val();
		var scrollwheel = jQuery('input#gmap-scrollwheel').val();
		var panControl = jQuery('input#gmap-panControl').val();
		var zoomControl = jQuery('input#gmap-zoomControl').val();
		var mapTypeControl = jQuery('input#gmap-mapTypeControl').val();
		var scaleControl = jQuery('input#gmap-scaleControl').val();
		var streetViewControl = jQuery('input#gmap-streetViewControl').val();
		var overviewMapControl = jQuery('input#gmap-overviewMapControl').val();
		var zoom = jQuery('input#gmap-zoom').val();
		
		if(maptype){maptype = 'maptype="'+maptype+'" ';}else{ maptype = '';}
		if(height){height = 'h="'+height+'" ';}else{ height = '';}
		if(width){width = 'w="'+width+'" ';}else{ width = '';}
		if(latitude){latitude = 'latitude="'+latitude+'" ';}else{ latitude = '';}
		if(longitude){longitude = 'longitude="'+longitude+'" ';}else{ longitude = '';}
		if(the_html){the_html = 'html="'+the_html+'" ';}else{ the_html = '';}
		if(icon_url){icon_url = 'icon_url="'+icon_url+'" ';}else{ icon_url = '';}
		if(iconsize){iconsize = 'iconsize="'+iconsize+'" ';}else{ iconsize = '';}
		if(scrollwheel){scrollwheel = 'scrollwheel="'+scrollwheel+'" ';}else{ scrollwheel = '';}
		if(panControl){panControl = 'panControl="'+panControl+'" ';}else{ panControl = '';}
		if(zoomControl){zoomControl = 'zoomControl="'+zoomControl+'" ';}else{ zoomControl = '';}
		if(mapTypeControl){mapTypeControl = 'mapTypeControl="'+mapTypeControl+'" ';}else{ mapTypeControl = '';}
		if(scaleControl){scaleControl = 'scaleControl="'+scaleControl+'" ';}else{ scaleControl = '';}
		if(streetViewControl){streetViewControl = 'streetViewControl="'+streetViewControl+'" ';}else{ streetViewControl = '';}
		if(overviewMapControl){overviewMapControl = 'overviewMapControl="'+overviewMapControl+'" ';}else{ overviewMapControl = '';}
		if(zoom){zoom = 'zoom="'+zoom+'" ';}else{ zoom = '';}
		if(address){address = 'address="'+address+'" ';}else{ address = '';}
		 
		var output = '[gmap '+ maptype + height + width + latitude + longitude + the_html + icon_url + iconsize + scrollwheel + panControl + zoomControl + mapTypeControl + scaleControl + streetViewControl + overviewMapControl + zoom + address + ' /]';
		
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(GoogleMapDialog.init, GoogleMapDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="gmap-url">Map Type</label>
        <select name="gmap-url" id="gmap-url">
        	<option value="">TERRAIN</option>
            <option value="HYBRID">HYBRID</option>
            <option value="SATELLITE">SATELLITE</option>
            <option value="ROADMAP">ROADMAP</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="gmap-width">Width</label>
        <input type="text" name="gmap-width" value="" id="gmap-width" />
    </div>
	<div class="form-section clearfix">
        <label for="gmap-height">height</label>
        <input type="text" name="gmap-height" value="" id="gmap-height" />
    </div>
    <div class="form-section clearfix">
        <label for="gmap-latitude">Latitude</label>
        <input type="text" name="gmap-latitude" value="" id="gmap-latitude" />
    </div>
	<div class="form-section clearfix">
        <label for="gmap-longitude">Longitude</label>
        <input type="text" name="gmap-longitude" value="" id="gmap-longitude" />
    </div>
    <div class="form-section clearfix">
        <label for="gmap-html">Html</label>
        <textarea  name="gmap-html" id="gmap-html"></textarea>
    </div>
    <div class="form-section clearfix">
        <label for="gmap-icon_url">Icon URL</label>
        <input type="text" name="gmap-icon_url" value="" id="gmap-icon_url" />
    </div>
    <div class="form-section clearfix">
        <label for="gmap-iconsize">Icon Size</label>
        <input type="text" name="gmap-iconsize" value="" id="gmap-iconsize" />
    </div>
    <div class="form-section clearfix">
        <label for="gmap-scrollwheel">scrollwheel</label>
        <select name="gmap-scrollwheel" id="gmap-scrollwheel">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    
    <div class="form-section clearfix">
        <label for="gmap-panControl">panControl</label>
        <select name="gmap-panControl" id="gmap-panControl">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="gmap-zoomControl">zoomControl</label>
        <select name="gmap-zoomControl" id="gmap-zoomControl">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="gmap-mapTypeControl">mapTypeControl</label>
        <select name="gmap-mapTypeControl" id="gmap-mapTypeControl">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="gmap-scaleControl">scaleControl</label>
        <select name="gmap-scrollwheel" id="gmap-scaleControl">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    
    <div class="form-section clearfix">
        <label for="gmap-streetViewControl">streetViewControl</label>
        <select name="gmap-streetViewControl" id="gmap-streetViewControl">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="gmap-overviewMapControl">overviewMapControl</label>
        <select name="gmap-overviewMapControl" id="gmap-overviewMapControl">
        	<option value="">true</option>
            <option value="false">false</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="gmap-zoom">Zoom</label>
        <input type="text" name="gmap-zoom" value="" id="gmap-zoom" />
    </div>
    <div class="form-section clearfix">
        <label for="gmap-address">Address</label>
        <input type="text" name="gmap-address" value="" id="gmap-address" />
    </div>
    
	<a href="javascript:GoogleMapDialog.insert(GoogleMapDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>