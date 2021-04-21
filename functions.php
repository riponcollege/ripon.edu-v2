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

	'post-type/people', 'post-type/fund', 'post-type/alum', 'post-type/year','post-type/event', 'post-type/guide',

	'emergency', 'menus', 'video-showcase', 'page-header', 'library', 'icons', 'photo-tiles', 'scripts', 'images', 'search', 'articles', 'post-type/area', 'accordion', 'button', 'call-to-action', 'hep/send-donation', 'share'

);



// make excerpts shorter
function ripon_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'ripon_excerpt_length', 999 );

