<?php

/*
Template Name: Research Guide
*/

get_header();

?>
	<div class="page-header" style="background-image: url(/wp-content/uploads/2021/01/tour_graphic-3.jpg);">
		<div class="page-header-overlay"></div>
		<div class="page-header-content">
			<div class="breadcrumbs">
				<a href="/library/">Library</a> &raquo; <a href="/guides/">Research Guides</a> &raquo; 
			</div>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="content-wide guide">

		<div class="two-third entry-content">

			<?php 

			the_content();
			
			the_accordions();
			
			?>

		</div>

		<div class="third librarian">
			<?php
			$librarian_id = get_cmb_value( 'guide_librarian' );
			print do_shortcode( '[person id="' . $librarian_id. '" link=0 /]' );
			?>
		</div>

	</div>

<?php

get_footer();

