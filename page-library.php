<?php

/*
Template Name: Library
*/

get_header();


// get today's date
$lib = get_library_hours();

page_header();

$menu_position = get_menu_position();

if ( $menu_position == 'left' ) {
	?>
<div class="two-column">
	<div class="sidebar">
		<?php section_menu(); ?>
	</div>
	<div class="right-column library">
	<?php
} else {
	// show the section menu
	section_menu();
	?>
	<div class="section-content library">
	<?php
}

?>

		<div class="icon-header pad bg-red-dark">
			<div class="icon">
				<img src="<?php bloginfo( 'template_url' ); ?>/img/icon-book.webp" />
			</div>
			<div class="intro">
				<?php print get_snippet( 'library-intro' ); ?>
			</div>
		</div>
		<div class="hours">
			<div class="hours-inner">
				<div class="status"><?php print $lib['status'] ?></div>
				<div class="day monday"><span>Monday</span> <span><?php print ( $lib['hours']['monday']['open'] != $lib['hours']['monday']['close'] ? $lib['hours']['monday']['open'] . " - " . $lib['hours']['monday']['close'] : 'Closed' ); ?></span></div>
				<div class="day tuesday"><span>Tuesday</span> <span><?php print ( $lib['hours']['tuesday']['open'] != $lib['hours']['tuesday']['close'] ? $lib['hours']['tuesday']['open'] . " - " . $lib['hours']['tuesday']['close'] : 'Closed' ); ?></span></div>
				<div class="day wednesday"><span>Wednesday</span> <span><?php print ( $lib['hours']['wednesday']['open'] != $lib['hours']['wednesday']['close'] ? $lib['hours']['wednesday']['open'] . " - " . $lib['hours']['wednesday']['close'] : 'Closed' ); ?></span></div>
				<div class="day thursday"><span>Thursday</span> <span><?php print ( $lib['hours']['thursday']['open'] != $lib['hours']['thursday']['close'] ? $lib['hours']['thursday']['open'] . " - " . $lib['hours']['thursday']['close'] : 'Closed' ); ?></span></div>
				<div class="day friday"><span>Friday</span> <span><?php print ( $lib['hours']['friday']['open'] != $lib['hours']['friday']['close'] ? $lib['hours']['friday']['open'] . " - " . $lib['hours']['friday']['close'] : 'Closed' ); ?></span></div>
				<div class="day saturday"><span>Saturday</span> <span><?php print ( $lib['hours']['saturday']['open'] != $lib['hours']['saturday']['close'] ? $lib['hours']['saturday']['open'] . " - " . $lib['hours']['saturday']['close'] : 'Closed' ); ?></span></div>
				<div class="day sunday"><span>Sunday</span> <span><?php print ( $lib['hours']['sunday']['open'] != $lib['hours']['sunday']['close'] ? $lib['hours']['sunday']['open'] . " - " . $lib['hours']['sunday']['close'] : 'Closed' ); ?></span></div>
				<div class="contact"><strong>Email:</strong> <a href="mailto:library@ripon.edu">library@ripon.edu</a><br><strong>Phone:</strong> <a href="tel:9207488175">(920)-748-8175</a></div>
			</div>

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
					<?php print do_shortcode( '[snippet slug="library-databases" /]' ) ?>
					<!--<?php quick_nav_menu( 'library-databases', '- select a database -' ); ?>-->
				</div>

				<div class="guides">
					Research Guides
					<select class="quick-nav">
						<option value="">- select a research guide -</option>
						<?php
						$guides = get_posts( array( 'post_type' => 'guide', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => '-1' ) );
						if ( !empty( $guides ) ) {
							foreach ( $guides as $guide ) { ?>
						<option value="/guide/<?php print $guide->post_name ?>"><?php print $guide->post_title ?></option>
								<?php
							}
						}
						?>
					</select>
				</div>

				<div class="group"></div>
			</div>
		</div>

		<?php

		the_icon_showcase();

		while ( have_posts() ) : the_post(); ?>
		
		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<?php
		endwhile; 
		?>

	</div>

<?php
	
if ( $menu_position == 'left' ) {
	?>
	</div>
</div>
	<?php
}

get_footer(); ?>