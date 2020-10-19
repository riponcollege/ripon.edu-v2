<?php


// include the WP config file so we have access to the api key
include( '../../../../../wp-config.php' );

// grab the search query from the request.
$search = $_REQUEST['company_search'];

// store the json results returned from the API for the search term provided.
$results = file_get_contents( 'https://gpc.matchinggifts.com/api/V2/company_name_search_list_result/?format=json&key=' . HEP_KEY . '&parent_only=yes&name=' . urlencode( $search ) );

// decode the json string into an object
$results = json_decode( $results );

// begin the results listing
print "<ul class='result-list'>";

// loop through the results
foreach ( $results as $result ) {

	// display the result with the company ID and name
	print "<li data-id='" . $result->company_id . "' onClick=\"setCompany(" . $result->company_id . ")\">" . $result->name . "</li>";

}

// end the results listing ul
print "</ul>";

