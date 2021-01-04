<?php

/*
Template Name: Academics
*/

get_header();

?>
	
	<?php page_header(); ?>
	
	<div class="two-column area-listing">

		<div class="sidebar">
		<?php
		// show the sidebar menus.
		left_menu_display();
		?>
		</div>

		<div class="right-column">
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
					<table cellspacing=0 cellpadding=3>
						<tr>
							<td><span class="ma">MA</span></td>
							<td>
								Major
								<span class="term-description"><?php echo term_description( 502, "area_cat" ); ?></span>
							</td>
						</tr>
						<tr>
							<td><span class="mi">MI</span></td>
							<td>
								Minor
								<span class="term-description"><?php echo term_description( 503, "area_cat" ); ?></span>
							</td>
						</tr>
						<tr>
							<td><span class="pa">PA</span></td>
							<td>
								Pre-Professional Advising
								<span class="term-description"><?php echo term_description( 5297, "area_cat" ); ?></span>
							</td>
						</tr>
						<tr>
							<td><span class="tc">TC</span></td>
							<td>
								Teaching Certification
								<span class="term-description"><?php echo term_description( 5316, "area_cat" ); ?></span>
							</td>
						</tr>
						<tr>
							<td><span class="dd">DD</span></td>
							<td>
								Dual Degree<br>
								<span class="term-description"><?php echo term_description( 5552, "area_cat" ); ?></span>
							</td>
						</tr>
					</table>
				</div>
				<div class="group area-tabs">
					<?php list_area_category() ?>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>