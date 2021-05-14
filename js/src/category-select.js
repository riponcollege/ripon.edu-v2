

// external links in new tabs
jQuery(document).ready(function($){

	$('.quick-category-nav').on('change',function(){
		location.href = '/category/' + $(this).val();
	});

});

