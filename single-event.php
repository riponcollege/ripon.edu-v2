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
			<div class="two-third entry-content">
			<?php
				global $post;
				$post_id = $post->ID;
				?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<hr>
				<h2>Upcoming Events</h2>
				<?php
				print do_shortcode( '[events /]' );
				?>
		 	</div>
		 	<div class="third">
				<?php the_post_thumbnail(); ?>
		 		<p>&nbsp;</p>
				<?php
					// display credit union name
					if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
						$start = get_cmb_value( 'event_start' );
						$end = get_cmb_value( 'event_end' );
						if ( date( 'Ymd', $start ) != date( 'Ymd', $end ) ) {
							print "<p>" . date( "F jS g:i a", $start ) . " -";
							print date( "F jS g:i a", $end ) . "</p>";
						} else {
							print "<h4>" . date( "F jS", $start ) . "</h4>";
							print "<p>" . date( "g:i a", $start );
							print " - " . date( "g:i a", $end ) . "</p>";
						}
					}

					// display the event duration.
					if ( has_cmb_value( 'event_start' ) && has_cmb_value( 'event_end' ) ) {
						print "<p><strong>Duration:</strong> " . duration( get_cmb_value( 'event_start' ), get_cmb_value( 'event_end' ) ) . "</p>";
					}

				?>
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