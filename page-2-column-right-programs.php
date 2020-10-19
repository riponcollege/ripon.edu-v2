<?php

/*
Template Name: Generic 2-column (Programs)
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="page-title group">
		<div class="wrap">
			<div class="three-quarter">
				<h1><?php the_title() ?></h1>
			</div>
			<div class="quarter">&nbsp;</div>
		</div>
	</div>
	<div class="wrap group two-column">

		<div class="third sidebar right">

			<?php
			// show the sidebar menus.
			left_menu_display();

			// only show the widget area of they haven't populated the box.
			if ( !has_cmb2_value('left_content') ) {
 				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif;
 			}
 			?>
 			
		</div>

		<div class="two-third">

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
			<div class="bg-grey-light" style="padding: 5px 10px; border: 1px solid #888; margin: 10px 0;">MA = Major &nbsp; &nbsp; MI = Minor &nbsp; &nbsp; PA = Pre-Professional Advising &nbsp; &nbsp; T = Teaching Certification</div>
			<div class="group area-tabs">
				<?php list_area_category() ?>
			</div>

			<?php
			the_tab_box();

			the_accordions();
			?>

		</div>

		<div class="content-wide">
			<?php the_wide_content(); ?>
		</div>

	</div>

	<?php the_phototiles(); ?>

	<?php the_buttons(); ?>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>