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
			
				<div>
					
					<div class="bg-grey-light" style="padding: 5px 10px; border: 1px solid #888; margin: 10px 0;">MA = Major &nbsp; &nbsp; MI = Minor &nbsp; &nbsp; PA = Pre-Professional Advising &nbsp; &nbsp; T = Teaching Certification</div>
					<div class="group area-tabs">
						<?php list_area_category() ?>
					</div>

				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>