<?php


// include the main.js script in the header on the front-end.
function theme_scripts() {
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri().'/js/main.js?v=140', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// parse the query string
function parse_query_string() {
	$url_parts = wp_parse_url( $_SERVER['REQUEST_URI'] );
	parse_str( $url_parts['query'], $query_args );
	return $query_args;
}


// pagination
function pagination( $prev = '&laquo;', $next = '&raquo;' ) {
    global $wp_query, $wp_rewrite;

    echo '<div class="pagination">' . paginate_links() . '</div>';
}


// function to register a visit
function register_visit() {

	// if this isn't a page of some kind (it's an image or other resource), don't store a visit for it
	if ( !is_singular() && !is_page() && !is_single() && !is_archive() && !is_home() && !is_front_page() ) {
		return false;
	}

	// if our visit tracker isn't set
	if ( !isset( $_SESSION['ripon_visit'] ) ) {

		// we don't have a tracker, make it
		$visits = array();

	} else {

		// get the visits from session
		$visits = json_decode( $_SESSION['ripon_visit'], true );
	}

	// add the current page to the tracker
	array_push( $visits, $_SERVER['REQUEST_URI'] );

	// store the tracker in the session
	$_SESSION['ripon_visit'] = json_encode( $visits );

}
add_action( 'template_redirect', 'register_visit' );


// check the last visited page
function check_visited( $url ) {

	// get the visits array from the session
	$visits = array_reverse( json_decode( $_SESSION['ripon_visit'] ) );

	// if it's an array
	if ( is_array( $visits ) ) {
		foreach ( $visits as $visit ) {
			if ( stristr( $visit, $url ) ) return $visit;
		}
	}

	// otherwise return false
	return false;

}

