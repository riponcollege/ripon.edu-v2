

// area controls
jQuery(document).ready(function($){


	// set faculty photo height to same as width
	var set_photo_height = function() {
		$( '.area-faculty .photo' ).height( $( '.area-faculty .photo' ).width() );
	}


	// back to main areas list?
	$( '.back-to-areas' ).click(function(){
		location.href = "/areas-of-study";
	});


	// handle clicks on the tab-nav items
	$( '.area .tab-nav li' ).on( 'click', function(){

		// remove active class from main item
		$( '.area .tab-nav li.active' ).removeClass( 'active' );

		// get class of clicked tab
		var tab_class = $(this).attr( 'class' );

		// set clicked tab to 'active'
		$(this).addClass( 'active' );

		// hide visible content divs
		$( '.area .tab-content:visible' ).removeClass( 'active' );

		// get content div based on that class
		$( '.area .tab-content.'+tab_class ).addClass( 'active' );

		// set faculty photo height equal to width.
		set_photo_height();

	});


	// if we're in the tab area
	if ( $('.area').length > 0 ) {

		// set some initial variables on load.
		var area_top = $( '.area' ).offset();

		// update values when the window resizes.
		$( window ).on( 'resize', function(){

			// get the area offset.top
			area_top = $( '.area' ).offset();

			// resize faculty photo div.
			set_photo_height();
			
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

			}

		});

		// set faculty photo height equal to width.
		set_photo_height();
	}


	// handle area filtering on the main areas-of-study page
	if ( $('.area-listing').length > 0 ) {

		// store some sections of the page
		var area_list = $('.area-listing');
		var area_filter = $('.area-filter select');
		var area_legend = $('.area-legend');

		// function to reset the list if they choose 'all'
		var reset_list = function(){
			area_list.find('li').show();
		}

		// area filter select list change
		area_filter.on( 'change', function(){

			// reset the listing
			reset_list();

			// get the filter value
			var filter_value = $(this).val();


			// if they choose all.
			if ( $(this).val() == 'all' ) {
				// reset the mini legend and term visibility to initial settings
				area_legend.find('.mini-legend').show();
				area_legend.find('.term').hide();
			} else {
				// loop through and hide all items that don't fit the filter
				area_list.find( 'li:not(.'+filter_value+')' ).each(function(){
					$(this).hide();
				});

				// hide all terms that aren't the one they chose.
				area_legend.find( '.term:not(.'+filter_value+')' ).hide();

				// show the legend item for the area category they chose
				area_legend.find( '.term.'+filter_value+'' ).css('display','flex');

				// hide the legend
				area_legend.find( '.mini-legend' ).hide();
			}

		});

	}
	
});

