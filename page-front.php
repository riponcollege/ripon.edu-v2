<?php

/*
Template Name: Homepage
*/

get_header();

?>

	<div class="wrap group">

		<div class="news">
			<h3>Ripon <span>News</span></h3>
			<?php
			query_posts( 'posts_per_page=2&cat=-5508' );
			if ( have_posts() ) {
				$num = 1;
				while ( have_posts() ) {
					the_post();
					?>
			<article<?php print ( $num == 1 ? ' class="first"' : '' ); ?>>
				<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
				<?php the_excerpt() ?>
			</article>
					<?php
					$num++;
				} // end while
			} // end if

			wp_reset_query();
			?>
			<p><a href="/news/" class="more">Read more news stories</a></p>
		</div>
	</div>

<?php

get_footer();

?>