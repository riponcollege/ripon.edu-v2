<?php

/*
Template Name: Library
*/

get_header();


// get today's date
$lib = get_library_hours();

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

				<div class="icon-header pad bg-red-dark">
					<div class="icon">
						<img src="<?php bloginfo( 'template_url' ); ?>/img/icon-book.webp" />
					</div>
					<div class="intro">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					</div>
				</div>
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
						<div class="status"><?php print $lib['status'] ?></div>
						<div class="day monday">Monday <span><?php print $lib['hours']['monday']['open'] . " - " . $lib['hours']['monday']['close']; ?></span></div>
						<div class="day tuesday">Tuesday <span><?php print $lib['hours']['tuesday']['open'] . " - " . $lib['hours']['tuesday']['close']; ?></span></div>
						<div class="day wednesday">Wednesday <span><?php print $lib['hours']['wednesday']['open'] . " - " . $lib['hours']['wednesday']['close']; ?></span></div>
						<div class="day thursday">Thursday <span><?php print $lib['hours']['thursday']['open'] . " - " . $lib['hours']['thursday']['close']; ?></span></div>
						<div class="day friday">Friday <span><?php print $lib['hours']['friday']['open'] . " - " . $lib['hours']['friday']['close']; ?></span></div>
						<div class="day saturday">Saturday <span><?php print $lib['hours']['saturday']['open'] . " - " . $lib['hours']['saturday']['close']; ?></span></div>
						<div class="day sunday">Sunday <span><?php print $lib['hours']['sunday']['open'] . " - " . $lib['hours']['sunday']['close']; ?></span></div>
						<div class="contact">Email: <a href="mailto:library@ripon.edu">library@ripon.edu</a><br>Phone: <a href="tel:9207488175">(920)-748-8175</a></div>
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