



// area controls
jQuery(document).ready(function($){

	// function to set active section
	var set_active_tab = function(){

		// get the scroll position
		var scroll_position = $( window ).scrollTop();

		// clear current active
		$( '.area .tab-nav li.active' ).removeClass( 'active' );

		// get all tab nav classes
		var tabs = [];
		$( '.area .tab-nav li' ).each(function(){
			tabs.push( $(this).attr( 'class' ) );
		});
		tabs.reverse();

		// cycle through the tabs
		$.each( tabs, function( k, t ){

			// get the tab object
			var the_tab = $( '.tab-content.' + t );
			var the_tab_nav = $( '.tab-nav li.' + t );

			// get the top position of that element
			var tab_position = the_tab.offset().top;

			// if we're scrolled past the top of that tab element
			if ( scroll_position > tab_position ) {

				// add the 'active' class to the corresponding tab
				the_tab_nav.addClass( 'active' );

				// and stop looping so we don't add the class to any others
				return false;

			}
		});

		// if no tab was selected, we haven't scrolled, and the first tab should be active.
		if ( $( '.tab-nav li.active' ).length == 0 ) {
			$( '.tab-nav li:first-child' ).addClass('active');
		}

	}

	// back to main areas list?
	$( '.back-to-areas' ).click(function(){
		location.href = "/areas-of-study";
	});


	// set some initial variables on load.
	var area_top = $( '.area' ).offset();


	// update values when the window resizes.
	$( window ).on( 'resize', function(){
		area_top = $( '.area' ).offset();
	});


	// when the page scrolls
	$( window ).on( 'scroll', function(){

		// get the scroll position
		var scroll_position = $( window ).scrollTop();

		// if we're on the applicable screen size.
		if ( $( window ).innerWidth() >= 768 ) {

			// if we're scrolled past the top of the area div
			if ( scroll_position > area_top.top ) {

				// tell the nav we're scrolled
				$( '.area .tab-nav' ).addClass( 'scrolled' );

			} else {

				// otherwise remove the scrolled class
				$( '.area .tab-nav' ).removeClass( 'scrolled' );

			}

			// set the active item.
			set_active_tab();

		}

	});

	// set the active tab on load
	set_active_tab();

});

