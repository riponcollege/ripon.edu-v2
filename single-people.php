<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$education = get_cmb_value( "faculty_education" );
$courses = get_cmb_value( "faculty_courses" );

?>
	<div class="page-header" style="background-image: url(<?php bloginfo('template_url') ?>/img/bg-header.webp);">
		<div class="page-header-overlay"></div>
		<div class="page-header-content">
			<div class="breadcrumbs">
				<a href="/faculty">Faculty &amp; Staff</a> &raquo; 
			</div>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="two-column bio">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
		<div class="sidebar">
			<?php the_post_thumbnail() ?>
			<div class="person-info">
				<div class="person-info-inner">
					<h2><?php the_title(); ?></h2>
					<h4 class="person-title"><?php print get_cmb_value( "person_title" ); ?></h4>
					<p><a href="mailto:<?php print get_cmb_value( "person_email" ); ?>"><?php print get_cmb_value( "person_email" ); ?></a></p>
					<p><?php print get_cmb_value( "person_phone" ); ?></p>
					<?php if ( has_cmb_value( "person_office" ) ) { ?><p>Office: <?php print get_cmb_value( "person_office" ); ?></p><?php } ?>
					<?php if ( has_cmb_value( "person_website" ) ) { ?><p><a href='" . get_cmb_value( "person_website" ) . "' target='_blank'>Website</a></p><?php } ?>
					<?php if ( has_cmb_value( "person_cv" ) ) { ?><p class="cv-link"><a href="<?php show_cmb_value( "person_cv" ); ?>" class="btn red-dark">View CV/Resume</a></p><?php } ?>
				</div>
			</div>
		</div>
		<div class="right-column">
			<div class="box white">
				<h2>Meet <?php the_title(); ?></h2>
				<?php the_excerpt(); ?>		
			</div>
			<hr class="no-mobile" />
			<?php 
			if ( has_icon_showcase() ) {
				the_icon_showcase(); 
				print '<hr class="no-mobile" />';
			}
			?>
			<div class="person-content">
				<?php the_content(); ?>
			</div>
		</div>
			<?php
			endwhile;
		endif;
		 ?>

	</div><!-- #primary -->
<?php

get_footer();

?>