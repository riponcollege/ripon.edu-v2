<?php


// store the domain in a defined constant
function set_domain() {

	// make sure we don't already have a DOMAIN constant
	if ( !defined( 'DOMAIN' ) ) {

		// if there's a host set in server constants
		if ( isset( $_SERVER['HTTP_HOST'] ) ) {

			// store the domain temporarily after stripping some common stuff out
			define( 'DOMAIN', str_replace( ".jpederson.io", "", str_replace( ".edu", "", $_SERVER['HTTP_HOST'] ) ) );
			
		} else {

			// set a default this will be what gets set during wpcli commands.
			define( 'DOMAIN', 'ripon' );

		}
	}
	
}


// boolean function to determine if we're on ripon proper
function is_ripon() {

	// set the domain if we don't already have it
	set_domain();

	// check if we're on ripon proper
	if ( DOMAIN == 'www.ripon' || DOMAIN == 'ripon' ) {
		return true;
	}

	// false if not
	return false;

}


// a boolean function to determine if we're on the alumni site
function is_alumni() {

	// set the domain if we don't already have it
	set_domain();

	// check for alumni domain
	if ( DOMAIN == 'alumni.ripon' || DOMAIN == 'ripon-alumni' ) {
		return true;
	}

	// false if not
	return false;

}


// a boolean function to determine if we're on the alumni site
function is_events() {

	// set the domain if we don't already have it
	set_domain();

	// check for events domain
	if ( DOMAIN == 'events.ripon' ||  DOMAIN == 'ripon-events' ) {
		return true;
	}

	// false if not
	return false;

}


// a boolean function to determine if we're on the employee site
function is_employees() {

	// set the domain if we don't already have it
	set_domain();

	// check for events domain
	if ( DOMAIN == 'employees.ripon' || DOMAIN == 'ripon-employees' ) {
		return true;
	}

	// false if not
	return false;

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

