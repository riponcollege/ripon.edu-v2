<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$education = get_cmb_value( "faculty_education" );
$courses = get_cmb_value( "faculty_courses" );

?>
	<div class="page-header" style="background-image: url(<?php bloginfo(); ?>/img/)">
		<div class="page-header-overlay"></div>
		<div class="breadcrumbs">
			<div class="crumbs">
				<a href="/faculty">Faculty &amp; Staff</a> &raquo; 
			</div>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="two-column faculty">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
		<div class="sidebar">
			<div class="faculty-info">
				<?php the_post_thumbnail() ?>
				<h2><?php the_title(); ?></h2>
				<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
				<p class="faculty-contact">
					<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a><br>
					<?php print get_cmb_value( "faculty_phone" ); ?><br>
					<?php if ( has_cmb_value( "faculty_office" ) ) { ?>Office: <?php print get_cmb_value( "faculty_office" ); ?><br><?php } ?>
					<?php if ( has_cmb_value( "faculty_website" ) ) { ?><br><a href='" . get_cmb_value( "faculty_website" ) . "' target='_blank'>Website</a><?php } ?>
				</p>
				<p class="cv-link"><a href="<?php show_cmb_value( "faculty_cv" ); ?>">View CV/Resume</a></p>
			</div>
		</div>
		<div class="right-column">
			<?php the_icon_showcase(); ?>
			<?php the_content(); ?>
		</div>
			<?php
			endwhile;
		endif;
		 ?>

	</div><!-- #primary -->
<?php

get_footer();

?>