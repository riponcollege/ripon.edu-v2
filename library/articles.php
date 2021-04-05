<?php


// articles shortcode
function articles_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'style' => "card",
		'tags' => '',
		'cats' => ''
	), $atts );

	$args = array(
	    'posts_per_page' => 4
	);

	if ( !empty($a['tags']) ) {
		$tags = explode( ',', $a['tags'] );
		$args['tag__in'] = $tags;
	}

	if ( !empty($a['cats']) ) {
		$cats = explode( ',', $a['cats'] );
		$args['category__in'] = $cats;
	}

	$query = new WP_Query( $args );

	// Check that we have query results.
	if ( $query->have_posts() ) {

		$return = '<div class="article-cards">';
	  
	    // Start looping over the query results.
	    while ( $query->have_posts() ) {
	        $query->the_post();
	        $return .= '<div class="entry">';
	        $return .= '<div class="entry-thumbnail">';
	        $return .= get_the_post_thumbnail( null, 'post-thumbnail' );
	        $return .= '</div>';
	        $return .= '<div class="entry-inner">';
		    $return .= '<h4>' . get_the_title() . '</h4>';
		    $return .= wpautop( get_the_excerpt() );
		    $return .= '</div></div>';
	    }

		$return .= '</div>';
	  
	} else {
		return '';
	}

	  
	// Restore original post data.
	wp_reset_postdata();
	  

	return $return;
}
add_shortcode( 'articles', 'articles_shortcode' );

