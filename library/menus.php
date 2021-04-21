<?php


// register a couple nav menus
register_nav_menus( array(
	'menu-main' => 'Menu - Main',
	'menu-buttons' => 'Menu - Buttons',
	'menu-info' => 'Menu - Information',
	'search-popular' => 'Search - Popular',
	'library-databases' => 'Library - Databases',
	'library-guides' => 'Library - Guides',
	'info-for' => 'Header - Information For',
	'info-for-aux' => 'Header - Information For Auxiliary'
) );



// cmb2 fields for managing the menu
add_action( 'cmb2_admin_init', 'menu_metaboxes' );
function menu_metaboxes() {

    $all_menus = get_all_menus();

    // menu metabox
    $menu_box = new_cmb2_box( array(
        'id' => 'menu_box',
        'title' => 'Sidebar Menu',
        'object_types' => array( 'page', 'guide' ), // Post type
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true // Show field names on the left
    ) );
    
    $menu_box->add_field( array(
        'name' => 'Menu Position',
        'id'   => CMB_PREFIX . 'menu_position',
        'type' => 'radio',
        'options' => array(
        	'top' => 'Top',
        	'left' => 'Left'
        )
    ) );

    $menu_box->add_field( array(
        'name'    => 'Section Menu',
        'id'      => CMB_PREFIX . 'menu_primary',
        'type'    => 'select',
        'options' => $all_menus,
    ) );

}



// get all wp menus in an array.
function get_all_menus(){
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 

	$generated = array( '' => '- select a menu -' );
	foreach ( $menus as $menu ) {
		$generated[$menu->slug] = $menu->name;
	}

	return $generated;
}



// get the menu mode
function get_menu_position() {
	$menu_position = get_cmb_value( "menu_position" );
	if ( $menu_position != 'top' ) {
		$menu_position = 'left';
	}
	return $menu_position;
}



// output the left menu
function section_menu( $mode = 'both' ) {

	// primary menu
 	$menu_primary = get_cmb_value( "menu_primary" );

	// make sure there's a menu for this page before displaying
	if ( !empty( $menu_primary ) ) {
		wp_nav_menu( array( 'menu' => $menu_primary, 'container_class' => 'section-menu' ) );
	}

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




