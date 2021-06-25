<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

page_header( 'Research Guides', get_bloginfo('template_url') . '/img/bg-header-news.webp', $page_subtitle );


// parse the query string
$request = parse_query_string();

// lets globalize the wp_query var
global $wp_query;

// set the args based on current query
$args = $wp_query->query_vars;

// set paged value based on request
$args['paged'] = $request['paged'];

// rerun the query
query_posts( $args );


// calculate results range to show above the result listing
if ( $paged > 0 ) {
	$result_range_start = ( ( $paged - 1 ) * $args['posts_per_page'] ) + 1;
	$result_range_end = ( $result_range_start + ( $args['posts_per_page'] - 1 ) );
	if ( $wp_query->found_posts > $result_range_end ) {
		$result_range = $result_range_start . ' - ' . $result_range_end; 
	} else {
		$result_range = $result_range_start . ' - ' . $wp_query->found_posts;
	}
} else {
	if ( $wp_query->found_posts > $args['posts_per_page'] ) {
		$result_range = '1 - ' . $args['posts_per_page'];
	} else {
		$result_range = '1 - ' . $wp_query->found_posts;
	}
}


?>

<div class="content-wide">
	<div class="quiet total-results">
		<strong><?php echo $wp_query->found_posts; ?></strong> total research guides. Showing results <strong><?php print $result_range; ?></strong>.
	</div>
	<hr />
	<div class="article-cards blog-listing">
	<?php

	while ( have_posts() ) : the_post();
		?>
		<div class="entry">
			<div class="thumbnail">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="entry-inner">
				<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
			</div>
		</div>
		<?php
	endwhile;

	?>
	</div>

	<div class="pagination">
		<?php pagination(); ?>
	</div>

</div>

<?php

get_footer();

?>