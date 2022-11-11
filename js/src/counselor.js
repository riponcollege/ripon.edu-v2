

// counselor select control
jQuery(document).ready(function($){

	var $state_select = $('.counselor-state-select');
	var $county_search = $( '.counselor-search' );
	var $county_search_text = $( '.counselor-search-text' );

	// if we have the counselor state select on this page
	if ( $state_select.length ) {

		// monitor changes to the state select
		$state_select.change(function(){

			// store the selected state
			var state = $(this).val();

			// whenever we change states, hide all counselors first.
			$( '.counselors .counselor').css( 'display', 'none' );

			// if they selected 'all counselors'
			if ( state == 0 ) {

				$( '.counselors .counselor').css( 'display', 'flex' );

			} else {

				// if it's WI
				if ( state == 'WI' ) {

					// make the county search visible
					$county_search.addClass( 'visible' );

					// show counties on individual counselors for just WI
					$( '.counselors .counselor.wi .counties' ).addClass( 'visible' );

				} else {

					// make the county search visible
					$county_search.removeClass( 'visible' );

					// show counties on individual counselors for just WI
					$( '.counselors .counselor.wi .counties' ).removeClass( 'visible' );

				}

				// loop through the counselors and check if the selected state is in the 'data-states' attribute
				$( '.counselors .counselor' ).each(function(){

					// store the counselor
					var $counselor = $(this);

					if ( $counselor.data('states') ) {

						// store the states data
						var states = $counselor.data('states');

					 	// if there are states selected for this counselor
					 	if ( states.length > 0 ) {

					 		// if the states contain a comma
							if ( states.match( ',' ) ) {

								// split the states into an array
								var states_array = states.split(',');

								// hide this counselor until we know if the selected state is theirs
							 	$counselor.css( 'display', 'none' );

							 	// loop through the states
							 	$.each( states_array, function( index, value ){

							 		// if this state matches the selection
							 		if ( value == state ) {

							 			// show the counselor
							 			$counselor.css( 'display', 'flex' );

							 		}

							 	});

							} else {

								// since we don't have a comma in the state, lets just check and see if its value matches the selected state.
								if ( states == state ) {

						 			// show the counselor
						 			$counselor.css( 'display', 'flex' );

								}

							}

					 	}

					}

				});
				

				// handle county search
				$county_search_text.keyup(function(){

					// get the search term
					var search_term = $(this).val();

					// if the search term is 
					if ( search_term.length > 0 ) {

						// whenever we change states, hide all counselors first.
						$( '.counselors .counselor.wi').css( 'display', 'none' );

						// loop through the counselors and check if the selected state is in the 'data-states' attribute
						$( '.counselors .counselor.wi' ).each(function(){

							// get the counseler
							var $counselor = $(this);

							// there's a string match with what's been typed
							if ( $counselor.data('counties').search(new RegExp( search_term, "i" )) > 0 ) {

								// display the counselor
								$counselor.css( 'display', 'flex' );

							}

						});

					} else {

						// if there's no search term, show all the WI counselors
						$( '.counselors .counselor.wi' ).css( 'display', 'flex' );

					}


				});

			}

		});
	}



});

