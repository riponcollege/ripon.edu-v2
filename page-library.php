<?php

/*
Template Name: Library
*/

get_header();

?>
	
	
	<?php page_header(); ?>
	<div class="two-column area-listing">

		<div class="sidebar">
		<?php
		// show the sidebar menus.
		left_menu_display();
		?>
		</div>

		<div class="right-column">
			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php
			endwhile; 
			?>
			<div class="wrap group library">

				<div class="library-search">
			
					<div class="everything">
						Search Everything:
						<?php print do_shortcode( '[snippet slug="library-search" /]' ) ?>
					</div>

					<div class="databases">
						Search Databases
						<?php quick_nav_menu( 'library-databases', '- select a database -' ); ?>
					</div>

					<div class="guides">
						Research Guides
						<?php quick_nav_menu( 'library-guides', '- select a guide -' ); ?>
					</div>

				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>