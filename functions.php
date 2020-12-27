<?php


// set a custom field prefix
define( "CMB_PREFIX", "_p_" );


// increment to break cache on css+js
define( "ASSET_VERSION", "181" );


// require multiple - a little helper function to require multiple files from the library directory in a one 
function require_multi( $files ) {
    $files = func_get_args();
    foreach ( $files as $file )
        require_once 'library/' . $file . '.php';
}


// include utility functions
require_multi( 'site', 'post-type/area', 'post-type/faculty', 'post-type/fund', 'post-type/alum', 'post-type/year', 'menus', 'scripts', 'images', 'metabox', 'search', 'button', 'hep/send-donation' );



// make excerpts shorter
function ripon_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'ripon_excerpt_length', 999 );

