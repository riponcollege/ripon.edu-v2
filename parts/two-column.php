
	<?php page_header(); ?>
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
