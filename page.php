<?php

get_header();

if ( has_cmb_value( "menu_primary" ) ) {

	// include the two-column part
	include( 'parts/two-column.php' );

} else {

	// default page styles
	while ( have_posts() ) : the_post(); 
		the_content(); 
	endwhile; 

}

get_footer();

?>