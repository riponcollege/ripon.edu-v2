<?php

/*
Template Name: Research Guide
*/

get_header();


page_header();

?>
	<div class="two-column">
		<div class="sidebar">
			<?php
			// show the sidebar menus.
			left_menu_display();
			?>			
		</div>

		<div class="right-column guide">

			<div class="librarian">
				<?php
				$post = get_post( get_cmb_value( 'guide_librarian' ) );
				print get_the_post_thumbnail( $post->ID );
				print "<h4>" . $post->post_title . "</h4>";
				?>
				<p class="faculty-contact">
					<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a><br>
					<?php print get_cmb_value( "faculty_phone" ); ?><br>
					Office: <?php print get_cmb_value( "faculty_office" ); ?>
					<?php 
					if ( !empty( get_cmb_value( "faculty_website" ) ) ) {
						print "<br><a href='" . get_cmb_value( "faculty_website" ) . "' target='_blank'>Website</a>";
					}
					?>
				</p>
				<?php
				wp_reset_postdata();
				?>
			</div>

			<div class="accordion-container">
			<?php 
			the_accordions();
			?>
			</div>

		</div>
	</div>

<?php

get_footer();

