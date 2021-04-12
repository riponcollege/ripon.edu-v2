<?php

/*
Template Name: Areas of Study
*/

// get the header template
get_header();

// output the page header
page_header();
	
// output the section menu
section_menu(); 

?>
<div class="section-content area-listing">
	<?php 
	while ( have_posts() ) : the_post(); ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

		<?php
	endwhile; 
	?>
	<div class="wrap group two-column academics">
	
		<div class="area-legend">
			<dl>
				<div class="area-filter">
					<select><option value="all">-- All Areas --</option><option value="ma">Major</option><option value="mi">Minor</option><option value="pa">Pre-Professional Advising</option><option value="tc">Teaching Certification</option><option value="dd">Dual Degree</option></select>
				</div>
				<div class="mini-legend">
				</div>
				<div class="term ma">
					<dd>
						<span class="term-description"><?php echo term_description( 502, "area_cat" ); ?></span>
					</dd>
				</div>
				<div class="term mi">
					<dd>
						<span class="term-description"><?php echo term_description( 503, "area_cat" ); ?></span>
					</dd>
				</div>
				<div class="term pa">
					<dd>
						<span class="term-description"><?php echo term_description( 5297, "area_cat" ); ?></span>
					</dd>
				</div>
				<div class="term tc">
					<dd>
						<span class="term-description"><?php echo term_description( 5316, "area_cat" ); ?></span>
					</dd>
				</div>
				<div class="term dd">
					<dd>
						<span class="term-description"><?php echo term_description( 5552, "area_cat" ); ?></span>
					</dd>
				</div>
			</dl>
		</div>
		<div class="group area-listing">
			<?php list_area_category() ?>
		</div>

	</div>
</div>
<?php

// get the footer template
get_footer();

?>