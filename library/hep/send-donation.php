<?php


// a function to send a donation object to the HEPData API.
function send_donation( $data_obj ) {

	// init curl
	$ch = curl_init();

	// set the path string from our HEP_KEY var definition in wp-config
	$path = "https://gpc.matchinggifts.com/api/portal/donation/create/?key=" . HEP_KEY;

	// set the curl path
	curl_setopt( $ch, CURLOPT_URL, $path );

	// this is a post request
	curl_setopt( $ch, CURLOPT_POST, 1 );

	// set the app/json header so the API knows what format the data is in
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json'
	) );

	// encode the data object into a json string
	$data_json = json_encode( $data_obj );

	// set the postdata
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_json );

	// ask for a response from the api
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	// execute the call and store the response
	$response = curl_exec( $ch );

	// decode the json response
	$response_json = json_decode( $response );

	// exit curl
	curl_close ( $ch );

	// return the response
	return $response_json->success;

}


// a hook function that hooks into a specific gravity form via its ID
function hep_hook( $entry, $form ) {

	// split the company name field by the ' - ' string
	$re = '/(.*) - (.*)/s';
	preg_match_all( $re, $entry['24'], $company_info );

	// create the data object from the form entry data
	$data_obj = (object) [
	    'name' => $entry['7.3'] . ' ' . $entry['7.6'],
	    'email' => $entry['9'],
	    'amount' => $entry['23'],
	    'phone' => $entry['30'],
	    'company_name' => str_replace( "&", "%26", $company_info[1][0] ),
	    'foundation_id' => $company_info[2][0],
	    'send_email' => false
	];

	// send the actual donation to HEPdata's API
	send_donation( $data_obj );

}

// hookie hookie (test)
// add_action( 'gform_after_submission_207', 'hep_hook', 10, 2 );

// hookie hookie (production)
add_action( 'gform_after_submission_251', 'hep_hook', 10, 2 );


