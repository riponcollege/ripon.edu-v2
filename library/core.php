<?php


// include the main.js script in the header on the front-end.
function theme_scripts() {
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri().'/js/main.js?v=144', array( 'jquery' ), false, true );
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

