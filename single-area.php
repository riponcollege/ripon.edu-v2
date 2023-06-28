<?php
/**
 * The Template for displaying all single posts
 */


get_header();

$advising = get_cmb_value( "area_advising" );
$people = get_cmb_value( "area_people_list" );

// mis-named - already populated in test, leaving to prevent forcing re-entry.
$overview_url = get_cmb_value( "area_facebook" );

// get video URL
$sidebar_video_url = get_cmb_value( "area_sidebar_video" );

// get featured image.
$featured_image_url = get_the_post_thumbnail_url( null, 'full' );

// get area categories
$categories = wp_get_object_terms( get_the_ID(), 'area_cat' );

?>
	<div class="page-header area-header" style="background-image: url(<?php print get_page_header_background(); ?>)">
		<div class="page-header-overlay"></div>
		<div class="page-header-content">
			<div class="breadcrumbs">
				<a href="/academics">Academics</a> &raquo; <a href="/areas">Areas of Study</a> &raquo;
			</div>
			<div class="page-title"><?php the_title(); ?></div>
			<div class="area-categories">
			<?php
			if ( !empty( $categories ) ) {
				?><?php
				$cats = array();
				foreach ( $categories as $cat ) {
		 			switch ( $cat->slug ) {
		 				case "major":
		 					$cats[] = '<span class="ma">Major</span>';
		 				break;
		 				case "minor":
		 					$cats[] = '<span class="mi">Minor</span>';
		 				break;
		 				case "pre-professional-advising":
		 					$cats[] = '<span class="pa">Pre-Professional Advising</span>';
		 				break;
		 				case "teaching-certification":
		 					$cats[] = '<span class="tc">Teaching Certification</span>';
		 				break;
		 				case "dual-degree":
		 					$cats[] = '<span class="dd">Dual Degree</span>';
		 				break;
		 			}
				}
				print implode( ' ', $cats );
				?><?php
			}
			?>
			</div>
		</div>
		<?php the_call_to_action() ?>
	</div>
	<div id="primary" class="area group two-column" role="main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				global $post;
				?>
		<!--<button class="back-to-areas">Back to All Areas</button>-->
		<div class="sidebar">
			<div class="tab-nav">
				<!--<h3>Overview</h3>-->
				<ul>
					<li class="area-overview active">Overview</li>
					<?php if ( !empty( $people ) ) { ?><li class="area-faculty">Faculty</li><?php } ?>
					<?php do_area_tab_nav( "Requirements", "requirements" ) ?>
					<?php do_area_tab_nav( "Career Tracks", "tracks" ) ?>
					<?php do_area_tab_nav( "Unique Opportunities", "opportunities" ) ?>
					<?php do_area_tab_nav( "Ensembles", "ensembles" ) ?>
					<?php do_area_tab_nav( "Events Schedule", "events" ) ?>
					<?php do_area_tab_nav( "Past Productions", "productions" ) ?>
					<?php do_area_tab_nav( "Alumni Profiles", "alumni" ) ?>
					<?php do_area_tab_nav( "Graduate Success", "success" ) ?>
					<?php do_area_tab_nav( "Clinical Supervisors", "supervisors" ) ?>
					<?php do_area_tab_nav( "Be a Teacher", "teacher" ) ?>
					<?php do_area_tabs_nav(); ?>
					<li class="area-advising">Advising</li>
					<!--<li class="area-offcampus">Off-Campus</li>-->
				</ul>
			</div>

			<div class="area-buttons">
				<?php wp_nav_menu( array( 'theme_location' => 'area-buttons' ) ); ?>
			</div>
		</div>
			
		<div class="right-column">

			<div class="tab-content active area-overview">
				<?php the_content(); ?>

				<?php the_quote_showcase() ?>

				<div class="statistics-container">
					<h2>Achieve More</h2>
					<?php the_statistics(); ?>
				</div>

				<?php if ( has_cmb_value( "area_mission" ) ) { ?>
				<div class="area-mission">
					<?php if ( $post->ID == 204474 ) { ?>
					<h3>Create a Career with Endurance</h3>
					<?php } else { ?>
					<h3>Department Mission Statement</h3>
					<?php } ?>
					<?php print apply_filters( 'the_content', get_cmb_value( "area_mission" ) ); ?>
				</div>
				<?php } ?>

				<?php the_icon_showcase(); ?>

				<?php if ( !empty( get_cmb_value( 'area_post_tag' ) ) ) { ?>
				<div class="area-news">
					<h2>Latest News</h2>
					<?php print do_shortcode( '[articles tag="' . get_cmb_value( 'area_post_tag' ) . '" posts_per_page=3 /]' ); ?>
				</div>
				<?php } ?>
			</div>

			<?php if ( !empty( $people ) ) { ?>
			<div class="tab-content area-faculty">
				<h2>Faculty</h2>
				<div class="area-faculty">
					<?php print do_shortcode( '[people category="' . get_cmb_value( 'area_people_list' ) . '" /]' ); ?>
				</div>
			</div>
			<?php } ?>

			<div class="tab-content area-advising">
				<h2>Advising</h2>
				<?php print do_shortcode( '[snippet slug="areas-advising" /]' ); ?>
			</div>

			<!--
			<div class="tab-content area-offcampus">
				<h2>Off-Campus Study</h2>
				<?php print do_shortcode( '[snippet slug="areas-off-campus" /]' ); ?>
			</div>
			-->

			<?php do_area_tab_content( "Requirements", "requirements" ) ?>
			<?php do_area_tab_content( "Career Tracks", "tracks" ) ?>
			<?php do_area_tab_content( "Unique Opportunities", "opportunities" ) ?>
			<?php do_area_tab_content( "Ensembles", "ensembles" ) ?>
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

the_call_to_action();

get_footer();

?>