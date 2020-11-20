<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$advising = get_cmb_value( "area_advising" );
$faculty = get_cmb_value( "area_faculty_list" );

// mis-named - already populated in test, leaving to prevent forcing re-entry.
$overview_url = get_cmb_value( "area_facebook" );

// get video URL
$sidebar_video_url = get_cmb_value( "area_sidebar_video" );


?>
	<div id="primary" class="area group" role="main">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
			<!--<button class="back-to-areas">Back to All Areas</button>-->
			<div class="tab-nav">
				<ul>
					<li class="area-overview active">Overview</li>
					<li class="area-faculty">Faculty</li>
					<?php do_area_tab_nav( "Requirements", "requirements" ) ?>
					<?php do_area_tab_nav( "Sample Schedule", "schedule" ) ?>
					<?php do_area_tab_nav( "Advising", "advising" ) ?>
					<?php do_area_tab_nav( "Career Tracks", "tracks" ) ?>
					<?php do_area_tab_nav( "Off-Campus Study", "off_campus" ) ?>
					<?php do_area_tab_nav( "Unique Opportunities", "opportunities" ) ?>
					<?php do_area_tab_nav( "Ensembles", "ensembles" ) ?>
					<?php do_area_tab_nav( "Facilities", "facilities" ) ?>
					<?php do_area_tab_nav( "Events Schedule", "events" ) ?>
					<?php do_area_tab_nav( "Past Productions", "productions" ) ?>
					<?php do_area_tab_nav( "Alumni Profiles", "alumni" ) ?>
					<?php do_area_tab_nav( "Graduate Success", "success" ) ?>
					<?php do_area_tab_nav( "Clinical Supervisors", "supervisors" ) ?>
					<?php do_area_tab_nav( "Be a Teacher", "teacher" ) ?>
					<?php do_area_tabs_nav(); ?>
				</ul>
			</div>
			
			<div class="area-inner">

				<?php
				if ( has_cmb_value( 'area_facebook' ) ) {
					?><a href="<?php show_cmb_value( 'area_facebook' ); ?>" class="btn sample-schedule">View Sample<br> Course Schedule</a><?php
				}
				?>
				<h1 class="area-title"><?php the_title(); ?></h1>
				<h3 class="area-subtitle"><?php 
				$terms = wp_get_post_terms( get_the_ID(), 'area_cat' );
				$terms_array = array();
				foreach ( $terms as $term ) {
					$terms_array[] = str_replace( 'Minors', 'Minor', str_replace( 'Majors', 'Major', $term->name ) );
				}
				// print_r( $terms_array );
				print implode( ', ', $terms_array );
				?></h3>
				<div class="tab-content first area-overview">
					<h2>Overview</h2>
					<?php the_content(); ?>
					<hr />
					
					<div class="half video">
						<h3>Program Spotlight</h3>
						<?php
						if ( !empty( $sidebar_video_url ) ) {
							print apply_filters( 'the_content', $sidebar_video_url );
						}
						?>
					</div>
					<?php if ( !empty( get_cmb_value( 'area_post_tag' ) ) ) { ?>
					<div class="half">
						<h3>Featured Articles</h3>
						<?php
						print do_shortcode( '[display-posts tag="' . get_cmb_value( 'area_post_tag' ) . '" posts_per_page="5"]' );
						?>
					</div>
					<?php } ?>

				</div>

				<div class="tab-content area-faculty">
					<h2>Faculty</h2>

					<?php 
					$faculty_query = new WP_Query( array(
						"post__in" => $faculty,
						"post_type" => 'faculty',
						"posts_per_page" => -1,
						"order" => "ASC",
						"orderby" => "title"
					) );

					if ( $faculty_query->have_posts() ) : 
						?>

					<div class="area-faculty">
					<?php

						// Start the Loop.
						while ( $faculty_query->have_posts() ) : $faculty_query->the_post();
							?>
							<div class="faculty-entry">
								<a href="<?php the_permalink(); ?>">
								<div class="photo" style="background-image: url(<?php the_post_thumbnail_url( array( 500, 500 ) ); ?>);"></div>
								<div class="info">
									<h4><?php the_title(); ?></h4>
									<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
								</div>
								</a>
							</div>
							<?php

						endwhile;

						?>
					</div>
					<?php
					endif;

					wp_reset_query();
					
					?>

				</div>

				<?php do_area_tab_content( "Requirements", "requirements" ) ?>
				<?php do_area_tab_content( "Sample Schedule", "schedule" ) ?>
				<?php do_area_tab_content( "Advising", "advising" ) ?>
				<?php do_area_tab_content( "Career Tracks", "tracks" ) ?>
				<?php do_area_tab_content( "Off-Campus Study", "off_campus" ) ?>
				<?php do_area_tab_content( "Unique Opportunities", "opportunities" ) ?>
				<?php do_area_tab_content( "Ensembles", "ensembles" ) ?>
				<?php do_area_tab_content( "Facilities", "facilities" ) ?>
				<?php do_area_tab_content( "Events Schedule", "events" ) ?>
				<?php do_area_tab_content( "Past Productions", "productions" ) ?>
				<?php do_area_tab_content( "Alumni Profiles", "alumni" ) ?>
				<?php do_area_tab_content( "Graduate Success", "success" ) ?>
				<?php do_area_tab_content( "Clinical Supervisors", "supervisors" ) ?>
				<?php do_area_tab_content( "Be a Teacher", "teacher" ) ?>
				<?php do_area_tabs_content(); ?>
			<?php
			endwhile;
		endif;
		 ?>
		</div>

	</div><!-- #primary -->
<?php

get_footer();

?>