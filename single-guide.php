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

		<div class="right-column guide">

			<div class="librarian">
				<?php
				$librarian_id = get_cmb_value( 'guide_librarian' );
				print do_shortcode( '[person id="' . $librarian_id. '" /]' );
				?>
			</div>

			<div class="accordion-container">
			<?php 
			the_content();

			the_accordions();
			?>
			</div>

		</div>
	</div>

<?php

get_footer();

