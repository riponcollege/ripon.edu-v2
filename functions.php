<?php


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
	'site', 'metabox', 

	// include custom post types
	'post-type/area', 'post-type/faculty', 'post-type/fund', 'post-type/alum', 'post-type/year', 

	// include theme functions and metaboxes
	'menus', 'library', 'scripts', 'images', 'search', 'icons', 'accordion', 'button', 'page-header', 'call-to-action', 'hep/send-donation'

);



// make excerpts shorter
function ripon_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'ripon_excerpt_length', 999 );

