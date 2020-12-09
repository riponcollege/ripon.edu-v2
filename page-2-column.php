<?php

/*
Template Name: Two-Column
*/

get_header();

?>
	
	<div class="two-column">
		<div class="sidebar">
			<?php
			// show the sidebar menus.
			left_menu_display();
			?>			
		</div>

		<div class="right-column">

			<div class="page-title group">
				<h1><?php the_title() ?></h1>
			</div>

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<div class="entry-content">
				<?php if ( has_cmb2_value('left_content') ) { ?>
				<div class="aux-box">
					<?php show_cmb2_wysiwyg_value('left_content'); ?>
				</div>
				<?php } ?>

	 			<?php the_content(); ?>
			</div>

				<?php
			endwhile; 
			?>

		</div>
	</div>

<?php get_footer(); ?>