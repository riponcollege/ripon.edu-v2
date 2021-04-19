<?php

/*
Template Name: Research Guide
*/

get_header();


page_header();

?>
	<div class="two-column guide">
		<div class="sidebar">
			<?php
			// show the sidebar menus.
			section_menu();
			?>			
		</div>

		<div class="right-column section-content guide">

			<div class="librarian">
				<?php
				$librarian_id = get_cmb_value( 'guide_librarian' );
				print do_shortcode( '[person id="' . $librarian_id. '" link=0 /]' );
				?>
			</div>

			<?php the_content(); ?>

			<div class="accordion-container">
			<?php 
			the_accordions();
			?>
			</div>

		</div>
	</div>

<?php

get_footer();

