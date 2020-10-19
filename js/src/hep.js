

// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// if the company search field is found in the form
	if ( $( '.company-search' ) ) {

		// add a div to contain the results from the API
		$( '.company-search' ).append( '<div class="company-results"></div>' );

		// when user types in search field
		$( '.company-search input[type=text]' ).on( 'keyup', function(){

			// store the search term
			var search_term = $(this).val();

			// if the search term is less than 3 characters
			if ( search_term.length < 3 ) {

				// empty and hide the results
				$('.company-results').html('').hide();

			} else {

				// otherwise, fetch the results for that search term.
				$('.company-results').load( '/wp-content/themes/ripon/library/hep/company-search.php?company_search=' + $(this).val() ).show();
			}
		});
	}

});


// handler for setting the company from the results overlay
var setCompany = function( company_id ){

	// fetch the specific result based on company ID
	var company_result = jQuery('.company-results li[data-id='+company_id+']');

	// set the search term to the appropriate value based on what they clicked.
	jQuery('.company-search input[type=text]').val( company_result.text() + ' - ' + company_result.attr('data-id') );

	// hide the results 
	jQuery('.company-results').hide();
	
}


