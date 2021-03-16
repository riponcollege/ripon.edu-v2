<?php


function page_header( $title_override = '', $image_override = '' ) {
	global $post;
	
	// get featured image.
	$featured_image_url = ( !empty( $image_override ) ? $image_override : get_the_post_thumbnail_url( null, 'full' ) );
 
	// get page ancestors
	$ancestors = get_post_ancestors( get_the_ID() );

	// get ancestor info
	$crumbs = array();
	if ( !empty( $ancestors ) ) {
		foreach ( $ancestors as $anc ) {
			$crumbs[] = get_page( $anc );
		}
	}

	// reverse the order of the ancestors in the crumbs
	$crumbs = array_reverse( $crumbs );


	// if the ancestor array isn't empty, compile crumb code
	if ( !empty( $crumbs ) ) {

		// empty string to start from
		$crumb_code = '';

		// loop through the crumbs
		foreach ( $crumbs as $crumb ) {
			$crumb_code .= "<a href='" . get_permalink( $crumb->ID ) . "'>" . $crumb->post_title . "</a> &raquo; ";
		}
	}
	?>
	<div class="page-header"<?php print ( !empty( $featured_image_url ) ? ' style="background-image: url(' . $featured_image_url . ')"' : '' ); ?>>
		<div class="page-header-overlay"></div>
		<div class="breadcrumbs">
			<div class="crumbs">
				<?php print_r( $crumb_code ); ?>
				<!--<a href="/academics">Academics</a> &raquo; <a href="/areas-of-study">Areas of Study</a> &raquo; -->
			</div>
			<h1 class="page-title"><?php print ( !empty( $title_override ) ? $title_override : get_the_title() ); ?></h1>
		</div>
		<?php the_call_to_action() ?>
	</div>
	<?php
}


