<?php


function page_header( $title_override = '', $image_override = '', $subtitle_override = '' ) {
	global $post;
	
	// grab the values from the metabox
	$metabox_title = get_cmb_value( 'page_header_title');
	$metabox_subtitle = get_cmb_value( 'page_header_subtitle' );
	

	// get the background image
	$background = ( !empty( $image_override ) ? $image_override : get_page_header_background() );


	// get final header elements
	$title = !empty( $title_override ) ? $title_override : ( !empty( $metabox_title ) ? $metabox_title : get_the_title() );
	$subtitle = strip_tags( !empty( $subtitle_override ) ? $subtitle_override : ( !empty( $metabox_subtitle ) ? $metabox_subtitle : '' ) );


	if ( is_search() ) $subtitle = 'Use our advanced search to help you find anything you need on our site.';


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
	<div class="page-header"<?php print ( !empty( $background ) ? ' style="background-image: url(' . $background . ')"' : '' ); ?>>
		<div class="page-header-overlay"></div>
		<div class="page-header-content">
			<?php if ( !is_search() ) { ?>
			<div class="breadcrumbs">
				<?php print_r( $crumb_code ); ?>
			</div>
			<?php } ?>
			<h1 class="page-title"><?php print $title; ?></h1>
			<?php if ( !empty( $subtitle ) ) { ?><h3 class="page-subtitle"><?php print $subtitle ?></h3><?php } ?>
		</div>
		<?php the_call_to_action() ?>
	</div>
	<?php
}



// function to get the page header background url
function get_page_header_background() {
	global $post;

	// get the metabox value
	$metabox_background = get_cmb_value( 'page_header_background' );

	// get featured image.
	$featured_background = get_the_post_thumbnail_url( null, 'full' );

	// check to see if the override, metabox value, or featured image are set, and if not, lets grab some parent page info
	if ( empty( $image_override ) && empty( $metabox_background ) && empty( $featured_background ) ) {
		// get page parent featured image
		$page_parent_id = wp_get_post_parent_id( get_the_ID() );
		$page_parent_background = get_the_post_thumbnail_url( $page_parent_id, 'full' );

		// if the page parent doesn't have a featured image, then get the parent of the parent and see if that has one
		if ( empty( $page_parent_background ) ) {
			$page_parent_parent_id = wp_get_post_parent_id( $page_parent_id );
			$page_parent_background = get_the_post_thumbnail_url( $page_parent_parent_id, 'full' );
		}
	}

	$background = !empty( $image_override ) ? $image_override : ( !empty( $metabox_background ) ? $metabox_background : ( !empty( $featured_background ) ? $featured_background : ( !empty( $page_parent_background ) ? $page_parent_background : get_bloginfo('template_url') . '/img/bg-header.webp' ) ) );

	return $background;
}



// eventually move this to the new 'research guide' cpt
add_action( 'cmb2_admin_init', 'page_header_metabox' );
function page_header_metabox() {

    // accordion metabox
    $page_header_metabox = new_cmb2_box( array(
        'id' => 'page_header_metabox',
        'title' => 'Page Header',
        'desc' => 'Select the librarian for this study guide.',
        'object_types' => array( 'page', 'people', 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );
    $page_header_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'page_header_title',
        'desc' => 'Enter a title that overrides the page title above if set.',
        'type' => 'text'
    ) );
    $page_header_metabox->add_field( array(
        'name' => 'Subtitle',
        'id'   => CMB_PREFIX . 'page_header_subtitle',
        'desc' => 'Enter a bit of text to override the subtitle pulled from the excerpt.',
        'type' => 'textarea_small'
    ) );
    $page_header_metabox->add_field( array(
        'name' => 'Background',
        'id' => CMB_PREFIX . 'page_header_background',
        'type' => 'file',
        'desc' => 'Upload a background photo that will override the default image used for the section in which this page/content is.'
    ) );

}


