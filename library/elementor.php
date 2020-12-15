<?php


function ripon_register_elementor_locations( $elementor_theme_manager ) {

	// register a new elementor location for the content of the page.
	$elementor_theme_manager->register_location( 'main-content',
		[
			'label' => __( 'Main Content', 'ripon' ),
			'multiple' => true,
			'edit_in_content' => false,
		]
	);

}
add_action( 'elementor/theme/register_locations', 'ripon_register_elementor_locations' );

