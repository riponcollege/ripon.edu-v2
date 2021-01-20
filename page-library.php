<?php

/*
Template Name: Library
*/

get_header();


// get today's date



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

			<div class="group library">

				<div class="hours">
					<div class="library-search">
				
						<div class="everything">
							Search Everything:
							<?php print do_shortcode( '[snippet slug="library-search-everything" /]' ) ?>
						</div>

						<div class="books">
							Search Books:
							<?php print do_shortcode( '[snippet slug="library-search-books" /]' ) ?>
						</div>

						<div class="databases">
							Search Databases
							<?php quick_nav_menu( 'library-databases', '- select a database -' ); ?>
						</div>

						<div class="guides">
							Research Guides
							<?php quick_nav_menu( 'library-guides', '- select a guide -' ); ?>
						</div>

						<div class="group"></div>
					</div>

					<div class="hours-inner">
						<div class="status">OPEN</div>
						<div class="day monday">Monday <span>8am - 5pm</span></div>
						<div class="day tuesday">Tuesday <span>8am - 5pm</span></div>
						<div class="day wednesday">Wednesday <span>8am - 5pm</span></div>
						<div class="day thursday">Thursday <span>8am - 5pm</span></div>
						<div class="day friday">Friday <span>8am - 5pm</span></div>
						<div class="day saturday">Saturday <span>8am - 5pm</span></div>
						<div class="day sunday">Sunday <span>8am - 5pm</span></div>
					</div>
				</div>


			</div>

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php
			endwhile; 
			?>
		</div>
	</div>

<?php get_footer(); ?>