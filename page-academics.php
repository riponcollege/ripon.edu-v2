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
					<div class="area-legend-header bg-red-dark">
						<div class="icon">
							<img src="<?php bloginfo( 'template_url' ); ?>/img/icon-area-legend.webp" />
						</div>
						<div class="intro">
							<p>At Ripon College, you choose your path. In fact, Ripon offers students the chance to develop a self-designed major (listed below) with the guidance of a faculty advisor. Recent self-design majors have included: Film Studies, Criminal Justice and Journalism. So, if you’re undecided, maybe this is the choice for you!</p>
						</div>
					</div>
					<dl>
						<div class="term">
							<dt><span class="ma">MA</span></dt>
							<dd>
								Major
								<span class="term-description"><?php echo term_description( 502, "area_cat" ); ?></span>
							</dd>
						</div>
						<div class="term">
							<dt><span class="mi">MI</span></dt>
							<dd>
								Minor
								<span class="term-description"><?php echo term_description( 503, "area_cat" ); ?></span>
							</dd>
						</div>
						<div class="term">
							<dt><span class="pa">PA</span></dt>
							<dd>
								Pre-Professional Advising
								<span class="term-description"><?php echo term_description( 5297, "area_cat" ); ?></span>
							</dd>
						</div>
						<div class="term">
							<dt><span class="tc">TC</span></dt>
							<dd>
								Teaching Certification
								<span class="term-description"><?php echo term_description( 5316, "area_cat" ); ?></span>
							</dd>
						</div>
						<div class="term">
							<dt><span class="dd">DD</span></dt>
							<dd>
								Dual Degree<br>
								<span class="term-description"><?php echo term_description( 5552, "area_cat" ); ?></span>
							</dd>
						</div>
					</dl>
				</div>
				<div class="group area-tabs">
					<?php list_area_category() ?>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>