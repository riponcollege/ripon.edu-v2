<?php

/*
Template Name: Areas of Study
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

		<?php
	endwhile; 
	?>
	<div class="wrap group academics">
	
		<div class="area-legend">
			<div class="area-filter">
				<select><option value="all">-- All Areas --</option><option value="ma">Major</option><option value="mi">Minor</option><option value="pa">Pre-Professional Advising</option><option value="tc">Teaching Certification</option><option value="dd">Dual Degree</option></select>
			</div>
			<div class="mini-legend">
				<dd><?php print do_shortcode( '[snippet slug="areas-select-intro" /]' ); ?></dd>
			</div>
			<div class="term ma">
				<dt><span class="ma">Major</span></dt>
				<dd>
					<span class="term-description"><?php echo term_description( 502, "area_cat" ); ?></span>
				</dd>
			</div>
			<div class="term mi">
				<dt><span class="mi">Minor</span></dt>
				<dd>
					<span class="term-description"><?php echo term_description( 503, "area_cat" ); ?></span>
				</dd>
			</div>
			<div class="term pa">
				<dt><span class="pa">Pre-Professional Advising</span></dt>
				<dd>
					<span class="term-description"><?php echo term_description( 5297, "area_cat" ); ?></span>
				</dd>
			</div>
			<div class="term tc">
				<dt><span class="tc">Teaching Certification</span></dt>
				<dd>
					<span class="term-description"><?php echo term_description( 5316, "area_cat" ); ?></span>
				</dd>
			</div>
			<div class="term dd">
				<dt><span class="dd">Dual Degree</span></dt>
				<dd>
					<span class="term-description"><?php echo term_description( 5552, "area_cat" ); ?></span>
				</dd>
			</div>
		</div>
		<div class="group area-listing">
			<?php list_area_category() ?>
		</div>

	</div>
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