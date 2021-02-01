

// calls to action
jQuery(document).ready(function($){

	/*
	var footer_reached = function(){
		if ( $(window).scrollTop() + $(window).height() > $(document).height() - $('footer').height() ) {
			return true;
		} else {
			return false;
		}
	}
	*/


	if ( $('.call-to-action').length ) {
		// when the page is scrolled
		$(window).scroll(function() {

			// store some variables
	        var scroll_position = $(window).scrollTop();
	        var content_top = $('.content').offset().top;

	        // if scrolled past the top of the content div, show the ctas
	       	if ( scroll_position > content_top ) {
	       		$( 'body' ).addClass( 'cta-active' );
	       	} else {
	       		$( 'body' ).removeClass( 'cta-active' );
	       	}
	    });
	}

});

