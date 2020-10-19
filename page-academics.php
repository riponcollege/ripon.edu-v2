<?php

/*
Template Name: Academics
*/

get_header();

?>

	<?php the_showcase(); ?>
	
	<div class="page-title group">
		<div class="wrap">
			<div class="quarter">&nbsp;</div>
			<div class="three-quarter">
				<h1><?php the_title() ?></h1>
			</div>
		</div>
	</div>
	<div class="wrap group two-column academics">

		<div class="quarter left-menu">

			<button class="toggle-sidebar-menu">Section Navigation</button>
			<div class="sidebar-menu-container">
				<div class="menu-primary">
					<h5 class="menu-title">Academics</h5>
					<?php wp_nav_menu( array( 'theme_location' => 'academics-primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>
				<div class="menu-buttons"><?php wp_nav_menu( array( 'theme_location' => 'academics-buttons', 'menu_class' => 'nav-menu' ) ); ?></div>
			</div>

		</div>
	
		<div class="three-quarter">

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

				<?php
			endwhile; 
			?>
			
			<div class="bg-grey-light" style="padding: 5px 10px; border: 1px solid #888; margin: 10px 0;">MA = Major &nbsp; &nbsp; MI = Minor &nbsp; &nbsp; PA = Pre-Professional Advising &nbsp; &nbsp; T = Teaching Certification</div>
			<div class="group area-tabs">
				<?php list_area_category() ?>
			</div>

		</div>

	</div>
	
	<?php the_phototiles(); ?>

	<?php the_buttons(); ?>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>