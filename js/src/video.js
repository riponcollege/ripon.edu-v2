

// background video scripting
jQuery(document).ready(function($){

	var set_video_sizes = function(){
		var window_height = $(window).height();
		var window_width = $(window).width();
		var target_width = 1920 * ( 1080 / window_height );
		var target_margin = ( target_width - window_width ) / 2;

		//$('.video-showcase-container').height( window_height );

		/*
		console.log( target_margin );

		$('.video-showcase-container .video-showcase').css( 'margin-left', target_margin * -1 ).css( 'margin-right', target_margin * -1 );
		*/
	}

	if ( $('.video-showcase-container') ) {
		set_video_sizes();
	}

});

