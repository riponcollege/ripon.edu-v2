<?php

session_start();

// set a custom field prefix
define( "CMB_PREFIX", "_p_" );


// set the timezone
date_default_timezone_set( 'America/Chicago' );


// colors array, for use in metaboxes
global $colors;
$colors = array(
	'red-dark' => 'Ripon Red',
	'red-light' => 'Redhawks Red',
	'orange' => 'Orange',
	'yellow' => 'Yellow',
	'teal' => 'Teal',
	'grey' => 'Grey (Dark)',
	'grey-light' => 'Grey (Light)',
);



// require multiple - a little helper function to require multiple files from the library directory in a one 
function require_multi( $files ) {
    $files = func_get_args();
    foreach ( $files as $file )
        require_once 'library/' . $file . '.php';
}



// include utility functions
require_multi(

	// include the essential components
	'core', 'site', 'metabox', 

	'post-type/people', 'post-type/fund', 'post-type/alum', 'post-type/year','post-type/event', 'post-type/guide', 'post-type/area', 

	'video-showcase', 'emergency', 'menus', 'page-header', 'library', 'icons', 'photo-tiles', 'images', 'search', 
	'articles', 'accordion', 'button', 'call-to-action', 'hep/send-donation', 'alum-attendees'

);



// make excerpts shorter
function ripon_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'ripon_excerpt_length', 999 );



