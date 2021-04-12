<?php

// get header template
get_header();

// show the section menu
section_menu();

?>
<div class="section-content">
	<?php
	// output page content
	while ( have_posts() ) : the_post(); 
		the_content(); 
	endwhile; 
	?>
</div>
<?php
// output the calls to action
the_call_to_action();

// get the footer template
get_footer();
