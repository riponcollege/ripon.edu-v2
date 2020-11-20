<?php

/*
Template Name: Generic 2-column
*/

get_header();

?>

	<div class="sidebar">
		<?php
		// show the sidebar menus.
		left_menu_display();

		// only show the widget area of they haven't populated the box.
		if ( !has_cmb2_value('left_content') ) {
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif;
		}
		?>			
	</div>

	<div class="right-column">

		<div class="page-title group">
			<div class="wrap">
				<div class="quarter">&nbsp;</div>
				<div class="three-quarter">
					<h1><?php the_title() ?></h1>
				</div>
			</div>
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

<?php get_footer(); ?>