<?php

/*
Template Name: Two-Column
*/

get_header();

// get featured image.
$featured_image_url = get_the_post_thumbnail_url( null, 'full' );

?>
	
	<div class="page-header"<?php print ( !empty( $featured_image_url ) ? ' style="background-image: url(' . $featured_image_url . ')"' : '' ); ?>>
		<div class="breadcrumbs">
			<!--<div class="crumbs"><a href="/academics">Academics</a> &raquo; <a href="/areas-of-study">Areas of Study</a> &raquo;</div>-->
			<div class="page-title"><?php the_title(); ?></div>
		</div>
	</div>
	<div class="two-column">
		<div class="sidebar">
			<?php
			// show the sidebar menus.
			left_menu_display();
			?>			
		</div>

		<div class="right-column">

			<?php 
			while ( have_posts() ) : 
				the_post();
				the_content();
			endwhile; 
			?>

		</div>
	</div>

<?php get_footer(); ?>