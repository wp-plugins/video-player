jQuery(document).ready(function () {
	jQuery('#arrows-type input[name="params[slider_navigation_type]"]').change(function(){
		jQuery(this).parents('ul').find('li.active').removeClass('active');
		jQuery(this).parents('li').addClass('active');
	});
	jQuery('input[data-gallery="true"]').bind("gallery:changed", function (event, data) {
		 jQuery(this).parent().find('span').html(parseInt(data.value)+"%");
		 jQuery(this).val(parseInt(data.value));
	});
	
	jQuery('#gallery-view-tabs li a').click(function(){
		jQuery('#gallery-view-tabs > li').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery('#gallery-view-tabs-contents > li').removeClass('active');
		var liID=jQuery(this).attr('href').replace('#','');
		jQuery('#gallery-view-tabs-contents > li[data-id="'+liID+'"').addClass('active');
		jQuery('#adminForm').attr('action',"admin.php?page=Options_gallery_styles&task=save#"+liID);
	});
	
	jQuery('#huge_it_sl_effects').change(function(){
		
		jQuery('.gallery-current-options').removeClass('active');
		jQuery('#gallery-current-options-'+jQuery(this).val()).addClass('active');
	});
	
});