<?php

/*
Template Name: Areas of Study - Graduate
*/

// get the header template
get_header();

// output the page header
page_header();

// get the menu position
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
	section_menu();
	?>
<div class="section-content area-listing">
	<?php 
}

	while ( have_posts() ) : the_post(); ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<div class="wrap group academics">
	
		<div class="group area-listing">
			<?php list_graduate_programs(); ?>
		</div>

    </div>
	<div class="entry-content">
        <?php the_icon_showcase(); ?>
		<?php print get_snippet( 'areas-masters-bottom' ); ?>
	</div>
		<?php
	endwhile; 
	?>
<?php

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

// get the footer template
get_footer();

?>