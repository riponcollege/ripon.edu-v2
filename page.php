<?php

// get header template
get_header();

page_header();

$menu_position = get_menu_position();

if ( $menu_position == 'left' ) {
	?>
<div class="two-column">
	<div class="sidebar">
		<?php section_menu(); ?>
	</div>
	<div class="right-column">
	<?php
} else {
	// show the section menu
	section_menu();
	?>
<div class="content-wide">
	<?php
}

// output page content
while ( have_posts() ) : the_post(); 
	the_content();

	the_accordions();
endwhile; 

if ( $menu_position == 'left' ) {
	?>
	</div>
</div>
	<?php
} else {
	?>
</div>
	<?php
}

// output the calls to action
the_call_to_action();

// get the footer template
get_footer();
