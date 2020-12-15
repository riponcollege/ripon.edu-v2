<?php

get_header();

// default page styles
while ( have_posts() ) : the_post(); 
	the_content(); 
endwhile; 

get_footer();

?>