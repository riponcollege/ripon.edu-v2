<?php
/*
Home/catch-all template
*/

get_header(); 

while ( have_posts() ) : the_post();
	?>
	<div class="entry-content">
		<div class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
		<p class="post-meta">
			Posted <?php the_date(); ?> in <?php print get_the_category_list( ", ", "", get_the_ID() ); ?> by <?php the_author_link() ?>.
		</p>
	</div>
	<?php
endwhile;

get_footer();

