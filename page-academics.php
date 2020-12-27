<?php

/*
Template Name: Academics
*/

get_header();

?>
	

	<div class="two-column area-listing">

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
				<?php the_content(); ?>
			</div>

				<?php
			endwhile; 
			?>
			<div class="wrap group two-column academics">
			
				<div class="area-legend">
					<span class="ma">MA</span> Major &nbsp; &nbsp; <span class="mi">MI</span> Minor &nbsp; &nbsp; <span class="pa">PA</span> Pre-Professional Advising &nbsp; &nbsp; <span class="tc">TC</span> Teaching Certification &nbsp; &nbsp; <span class="dd">DD</span> Dual Degree
				</div>
				<div class="group area-tabs">
					<?php list_area_category() ?>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>