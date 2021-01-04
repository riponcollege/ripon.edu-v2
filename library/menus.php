<?php


// register a couple nav menus
register_nav_menus( array(
	'main-menu' => 'Main Menu',
	'buttons' => 'Header Buttons',
	'library-databases' => 'Library - Databases',
	'library-guides' => 'Library - Guides',
) );



function get_all_menus(){
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 

	$generated = array( '' => '- select a menu -' );
	foreach ( $menus as $menu ) {
		$generated[$menu->slug] = $menu->name;
	}

	return $generated;
}



function left_menu_display( $mode = 'both' ) {

	// grab the menu the user selected in the menus metabox.
	$menu_title = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_title", 1 );

	// primary menu
	$menu_primary = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_primary", 1 );
	$menu_primary_info = wp_get_nav_menu_object( $menu_primary );

	// buttons menu
	// $menu_buttons = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_buttons", 1 );

	print '<button class="toggle-sidebar-menu">Section Navigation</button>';
	print '<div class="sidebar-menu-container">';

	// verify that the menu exists by checking the menu name to see if it's empty
	if ( !empty( $menu_primary ) && ( $mode == 'both' || $mode == 'primary' ) ) {
		print '<div class="menu-primary">';

		// display the menu title
		if ( !empty( $menu_name ) ) {
			print '<h5 class="menu-title">' . $menu_name . '</h5>';
		} else if ( !empty( $menu_primary_info ) ) {
			print '<h5 class="menu-title">' . $menu_primary_info->name . '</h5>';
		}

		// display the menu
		wp_nav_menu( array( 
			'menu' => $menu_primary, 
			'menu_class' => 'nav-menu' )
		);

		print '</div>';
	}
	print '</div>';

}



// a simple function to output a nav menu as a select list
function quick_nav_menu( $theme_location, $first_item ) {
	$menu_items = wp_get_nav_menu_items( $theme_location );
	if ( !empty( $menu_items ) ) {	
		print "<select class='quick-nav'>";
		if ( !empty( $first_item ) ) print "<option value='none'>" . $first_item . "</option>";
		foreach ( $menu_items as $item ) {
			print "<option value='" . $item->url . "'>" . $item->title . "</option>";
		}
		print "</select>";
	}
}




