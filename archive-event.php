<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$request = parse_query_string();

?>
	<?php page_header( "Events Calendar", get_bloginfo( 'template_url' ) . '/img/bg-header-events.webp', get_snippet( 'header-events' ) ); ?>
	
	<?php if ( !is_search() ) { ?>
	<div class="event-filter content-wide bg-grey">
		<h3>Filter by Category</h3>
		<?php filter_by_event_type(); ?></p>
	</div>
	<?php } ?>

	<div id="content" class="wrap content-wide" role="main">

		<h3>Search All Events</h3>
		<form role="search" method="get" id="searchform" class="searchform" action="/" _lpchecked="1">
			<input type="text" value="<?php print ( isset( $_REQUEST['s'] ) ? strip_tags( $_REQUEST['s'] ) : '' ) ?>" name="s" id="s" placeholder="Search">
			<input type="hidden" value="event" name="post_type">
			<input type="submit" id="searchsubmit" value="Search Events" class="btn-arrow">
		</form>
		<hr>
		<?php
		if ( is_search() ) {

			if ( have_posts() ) {
				$count = 1;
				while ( have_posts() ) : the_post();
					?>
					<div class="entry entry-event">
						<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
						<p class="quiet"><strong>Event Date:</strong> <?php print date( 'n/j/Y \a\t g:ia', get_cmb_value( 'event_start' ) ); ?></p>
						<?php echo wpautop( wp_trim_words( strip_tags( get_the_excerpt() ), 50 ) ); ?>
					</div>
					<hr />
					<?php
					$count++;
				endwhile;
			} else {
				print "<p>Sadly, your search returned no results. Please try another or navigate using the main menu.</p>";
			}

		} else {
			?>
			<?php 

			// get URL parameters and default to current month.
			$month = ( !empty( $request['mo'] ) ? $request['mo'] : date( "n" ) );
			$year = ( !empty( $request['yr'] ) ? $request['yr'] : date( "Y" ) );
			$category = ( isset( $request['event_category'] ) ? $request['event_category'] : 0 );

			// output month
			show_month_events( $month, $year, $category );
		}
		?>


	</div><!-- #content -->

<?php

get_footer();

?>