<?php


// set a custom field prefix
define( "CMB_PREFIX", "_p_" );


// include the faculty content type
include( "library/post-type/area.php" );
include( "library/post-type/faculty.php" );
include( "library/post-type/fund.php" );
include( "library/post-type/alum.php" );
include( "library/post-type/year.php" );


// include some theme-related things
include( "library/menus.php" );
include( "library/scripts.php" );


// an extra image manipulation function
include( "library/images.php" );


// include our metaboxes library
include( "library/metabox.php" );


// include quote metaboxes/functions
include( "library/search.php" );


// include HEPdata stuff
include( "library/hep/send-donation.php" );


// make excerpts shorter
function ripon_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'ripon_excerpt_length', 999 );

