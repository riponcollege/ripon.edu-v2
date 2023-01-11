<?php
/**
 * The Template for displaying all single posts
 */

get_header();


	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
			?>
	<div id="primary" class="wrap group">
		<div class="event content-wide" role="main">
			<div class="group">
				<div class="two-third entry-content">
				<?php
					global $post;
					$post_id = $post->ID;
					?>
					<h1><?php the_title(); ?></h1>
					<?php
					$all_day = get_cmb_value( 'event_all_day' );
					$is_all_day = ( $all_day == 'on' ? true : false );
					// display event date
					if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
						$start = get_cmb_value( 'event_start' );
						$end = get_cmb_value( 'event_end' );
						if ( date( 'Ymd', $start ) != date( 'Ymd', $end ) ) {
							print "<h4>" . date( "F jS g:i a", $start ) . " - ";
							print date( "F jS g:i a", $end ) . ( has_cmb_value( 'event_location' ) ? " @ " . get_cmb_value( 'event_location' ) : '' ) . "</h4>";
						} else {
							print "<h4>" . date( "F jS", $start ) . ( !$is_all_day ? ': ' . date( "g:i a", $start ) . " - " . date( "g:i a", $end ) : '' ) . ( has_cmb_value( 'event_location' ) ? " @ " . get_cmb_value( 'event_location' ) : '' ) . "</h4>";
						}
					}
					?>
					<?php the_content(); ?>
					<hr>
					<h2>Upcoming Events</h2>
					<?php
					print do_shortcode( '[events /]' );
					?>
			 	</div>
			 	<div class="third event-image">
					<?php the_post_thumbnail(); ?>
			 	</div>
			 </div>
		</div>
	</div>

			<?php
		endwhile;
	endif;
	?>
<?php

get_footer();

?>