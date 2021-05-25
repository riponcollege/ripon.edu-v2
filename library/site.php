<?php


// boolean function to determine if we're on ripon proper
function is_ripon() {

	// get the host name
	$host = str_replace( ".test", "", str_replace( ".edu", "", $_SERVER['HTTP_HOST'] ) );

	// check if we're on ripon proper
	if ( $host == 'test.ripon' || $host == 'www.ripon' || $host == 'ripon' ) {
		return true;
	}

}


// a boolean function to determine if we're on the alumni site
function is_alumni() {

	// get the host name
	$host = str_replace( ".test", "", str_replace( ".edu", "", $_SERVER['HTTP_HOST'] ) );

	// check for alumni domain
	if ( $host == 'alumni.ripon' ) {
		return true;
	}

}


// a boolean function to determine if we're on the alumni site
function is_events() {

	// get the host name
	$host = str_replace( ".test", "", str_replace( ".edu", "", $_SERVER['HTTP_HOST'] ) );

	// check for events domain
	if ( $host == 'events.ripon' ) {
		return true;
	}

}


// a boolean function to determine if we're on the employee site
function is_employees() {

	// get the host name
	$host = str_replace( ".test", "", str_replace( ".edu", "", $_SERVER['HTTP_HOST'] ) );

	// check for events domain
	if ( $host == 'employees.ripon' ) {
		return true;
	}

}



add_filter( 'body_class','site_classes' );
function site_classes( $classes ) {
 	
 	// use our site-specific boolean functions to include body classes
 	if ( is_ripon() ) $classes[] = 'site-ripon';
 	if ( is_alumni() ) $classes[] = 'site-alumni';
 	if ( is_events() ) $classes[] = 'site-events';
 	if ( is_employees() ) $classes[] = 'site-employees';
     
    return $classes;
}

