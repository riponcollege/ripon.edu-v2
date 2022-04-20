

// counselor select control
jQuery(document).ready(function($){

	// if we have the counselor state select on this page
	if ( $('.counselor-state-select').length ) {

		// monitor changes to the state select
		$('.counselor-state-select').change(function(){

			// store the selected state
			var state = $(this).val();

			// whenever we change states, hide all counselors first.
			$( '.counselors .counselor').css( 'display', 'none' );

			// if they selected 'all counselors'
			if ( state == 0 ) {

				$( '.counselors .counselor').css( 'display', 'flex' );

			} else {

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

			}

		});
	}

});

