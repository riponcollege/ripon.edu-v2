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
		<div class="event-columns">
			<div class="event-column">
				<form role="search" method="get" id="searchform" class="searchform event-search-form" action="/" _lpchecked="1">
					<input type="text" value="<?php print ( isset( $_REQUEST['s'] ) ? strip_tags( $_REQUEST['s'] ) : '' ) ?>" name="s" id="s" placeholder="Search" class="event-search-text">
					<input type="hidden" value="event" name="post_type">
					<input type="submit" id="searchsubmit" value="Search Events" class="btn-arrow event-search-button">
				</form>
			</div>
			<div class="event-column buttons">
				<a href="https://riponredhawks.com" class="btn red-light">Athletics Events</a>
				<?php if ( !is_ripon() ) { ?>
					<a href="https://ripon.edu/events" class="btn red-dark">All College Events</a>
				<?php } ?>
				<?php if ( !is_alumni() ) { ?>
					<a href="https://alumni.ripon.edu/events" class="btn red-dark">Alumni Events</a>
				<?php } ?>
			</div>
		</div>
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

			$moyr = explode( '-', ( !empty( $request['moyr'] ) ? $request['moyr'] : date( "n" ) . '-' . date( "Y" ) ) );
			list( $month, $year ) = $moyr;
			
			$category = ( isset( $request['event_category'] ) ? $request['event_category'] : 0 );

			// output month
			show_month_events( $month, $year, $category );
		}
		?>


	</div><!-- #content -->

<?php

the_call_to_action();

get_footer();

?>