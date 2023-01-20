

// calls to action
jQuery(document).ready(function($){

	// if we have a call to action bar
	if ( $('.call-to-action').length ) {

		// when the page is scrolled
		$(window).scroll(function() {

			// store some variables
	        var scroll_position = $(window).scrollTop();

	        if ( $( '.two-column' ).length ) {
	        	var content_top = $('.two-column').offset().top;
	        } else {
		        var content_top = $('.content').offset().top;
	        }

	        // if scrolled past the top of the content div, show the ctas
	       	if ( scroll_position > content_top ) {
	       		$( 'body' ).addClass( 'cta-active' );
	       	} else {
	       		$( 'body' ).removeClass( 'cta-active' );
	       	}

	       	// if scroll has reached near the bottom of the page, return ctas to static
	       	var bottom = parseInt( $( document ).height() ) - parseInt( $( window ).height() ) - 140;
	       	if ( scroll_position > bottom ) {
	       		$( 'body' ).removeClass( 'cta-active' );
	       	}

	    });

	} else {

		$(window).scroll(function() {

			// store some variables
	        var scroll_position = $(window).scrollTop();

	        // if scrolled past the top of the content div, show the ctas
	       	if ( scroll_position > 400 ) {
	       		$( 'footer .back-to-top' ).show();
	       	} else {
	       		$( 'footer .back-to-top' ).hide();
	       	}

	    });

	}

});

