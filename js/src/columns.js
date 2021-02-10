

// columns controls
jQuery(document).ready(function($){

	if ( $( '.two-column' ).length > 0 ) {

		// set some initial variables on load.
		var columns_top = $( '.two-column' ).offset();


		// update values when the window resizes.
		$( window ).on( 'resize', function(){

			// get the columns offset.top
			columns_top = $( '.two-column' ).offset();
			
		});


		// when the page scrolls
		$( window ).on( 'scroll', function(){

			// set some initial variables on load.
			var columns_top = $( '.two-column' ).offset();

			// get the scroll position
			var scroll_position = $( window ).scrollTop();

			// if we're on the applicable screen size.
			if ( $( window ).innerWidth() >= 768 ) {

				// if we're scrolled past the top of the columns div
				if ( scroll_position > columns_top.top ) {

					// tell the nav we're scrolled
					$( '.two-column .sidebar' ).addClass( 'scrolled' );

				} else {

					// otherwise remove the scrolled class
					$( '.two-column .sidebar' ).removeClass( 'scrolled' );

				}

			}

		});

	}

});

