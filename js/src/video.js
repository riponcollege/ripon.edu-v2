

// background video scripting
jQuery(document).ready(function($){

	var set_video_sizes = function(){
		var window_height = $(window).height();
		var window_width = $(window).width();
		var target_width = 1920 * ( 1080 / window_height );
		var target_margin = ( target_width - window_width ) / 2;
	}

	if ( $('.video-showcase-container') ) {
		set_video_sizes();
	}

});

