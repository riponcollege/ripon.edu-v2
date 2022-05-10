<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
	<div class="aux-breadcrumb">
		<a href="/news">&laquo; View All News</a>
	</div>
	<div class="content-wide" role="main">
	<?php 
	if ( have_posts() ) : ?>
		<div class="two-third entry-content">
		<?php
		while ( have_posts() ) : the_post(); 
			global $post;
			$post_id = $post->ID;
			?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<p class="post-meta">
				Posted <?php the_date(); ?> in <?php print get_the_category_list( ", ", "", get_the_ID() ); ?>.
			</p>
			<hr>
			<?php
			$cat_list = get_the_category_list( ",", "", get_the_ID() );
			$categories = wp_get_post_categories( $post_id, array( 'fields' => 'all' ) );
			if ( !empty( $categories ) ) {
				$cats = array();
				foreach ( $categories as $acat ) {
					$cats[] = $acat->slug;
				}
				print "<h2>Related Posts</h2>";
				print do_shortcode( '[articles cats="' . implode( ',', $cats ) . '" post__not_in="' . $post_id . '" /]' );
			}
			?>
	 	</div>
	 	<div class="third">
			<?php the_post_thumbnail(); ?>
	 		<p>&nbsp;</p>
			<?php
			if ( $post->post_type == 'post' ) {

				$tags = wp_get_post_tags( $post->ID );
				$tag_array = array();
				foreach ( $tags as $t ) {
					$tag_array[] = str_replace( '-2', '', $t->slug );
				}

				if ( !empty( $tag_array ) ) {
					$areas = get_posts( array(
						'post_type' => 'area',
						'post_name__in' => $tag_array
					) );

					print "<hr />";
					print "<h3>Related Areas of Study</h3>";
					print "<ul class='display-posts-listing'>";
					foreach ( $areas as $a ) {
						print "<li><a href='/area/" . $a->post_name . "/'>" . $a->post_title . "</a></li>";
					}
					print "</ul>";
				}
				
			}
			?>
			<!-- here -->
			<?php
		endwhile;
		?>
	 	</div>
	 	<?php
	endif;
	?>
	</div><!-- #content -->

<?php

get_footer();

?>