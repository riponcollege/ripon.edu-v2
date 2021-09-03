

// counselor select control
jQuery(document).ready(function($){

	// if we have the counselor state select on this page
	if ( $('.counselor-state-select').length ) {

		// monitor changes to the state select
		$('.counselor-state-select').change(function(){

			// store the selected state
			var state = $(this).val();

			// if they selected 'all counselors'
			if ( state == 0 ) {

				$( '.counselors .counselor').css( 'display', 'flex' );

			} else {

				// loop through the counselors and check if the selected state is in the 'data-states' attribute
				$( '.counselors .counselor' ).each(function(){

					var $counselor = $(this);

					// split the states into an array
					var states = $counselor.data('states').split(',');

					// hide this counselor until we know if the selected state is theirs
				 	$counselor.css( 'display', 'none' );

				 	// if there are states selected for this counselor
				 	if ( states.length > 0 ) {

					 	// loop through the states
					 	$.each( states, function( index, value ){

					 		// if this state matches the selection
					 		if ( value == state ) {

					 			// show the counselor
					 			$counselor.css( 'display', 'flex' );

					 		}

					 	});

				 	}
				});

			}

		});
	}

});

