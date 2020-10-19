<?php
/*
Template Name: Generic 1-column (No Title, Full Width)
*/
get_header();

?>

	<?php the_showcase(); ?>

	<?php 
	while ( have_posts() ) : the_post(); ?>
	
	<div class="entry-content no-margin">
		<?php the_content(); ?>
	</div>

		<?php
	endwhile; 
	?>
	
	<?php the_phototiles(); ?>
	
	<?php the_buttons(); ?>

<?php

get_footer();

?>