<?php
/**
 * The Template for displaying all single posts
 */

get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
			?>

		<div class="event" role="main">
			<div class="event-header">
				<?php 
				$event_thumbnail_url = get_the_post_thumbnail_url();
				if ( empty( $event_thumbnail_url ) ) $event_thumbnail_url = '/wp-content/uploads/2021/05/clocktower-500x500.jpg';
				?>
				<div class="event-thumbnail" style="background-image: url(<?php print $event_thumbnail_url; ?>);">
					&nbsp;
				</div>
				<div class="event-info">
					<h2><?php the_title(); ?></h2>
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
			<div class="content-wide">
				<?php the_content(); ?>
			</div>
		</div>

			<?php
		endwhile;
	endif;
	?>
<?php

get_footer();

?>