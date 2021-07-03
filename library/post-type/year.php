<?php


// only include this functionality on alumni site.
if ( is_alumni() ) {


	// Flush rewrite rules for custom post types
	add_action( 'after_switch_theme', 'flush_rewrite_rules' );


	// let's create the function for the custom type
	function yr_post_type() { 
		// creating (registering) the custom type 
		register_post_type( 'yr', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array(
				'labels' => array(
					'name' => __( 'Year', 'ptheme' ), /* This is the Title of the Group */
					'singular_name' => __( 'Year', 'ptheme' ), /* This is the individual type */
					'all_items' => __( 'All Years', 'ptheme' ), /* the all items menu item */
					'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
					'add_new_item' => __( 'Add New Year', 'ptheme' ), /* Add New Display Title */
					'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
					'edit_item' => __( 'Edit Year', 'ptheme' ), /* Edit Display Title */
					'new_item' => __( 'New Year', 'ptheme' ), /* New Display Title */
					'view_item' => __( 'View Year', 'ptheme' ), /* View Display Title */
					'search_items' => __( 'Search Years', 'ptheme' ), /* Search Custom Type Title */ 
					'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
					'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
					'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'Manage class years.', 'ptheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => 'dashicons-groups', /* the icon for the custom post type menu */
				'has_archive' => false, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'sticky')
			) /* end of options */
		); /* end of register post type */	
	}


	// adding the function to the Wordpress init
	add_action( 'init', 'yr_post_type');


	// add the metabox for the year post type
	add_action( 'cmb2_admin_init', 'year_metaboxes' );
	function year_metaboxes() {

	    global $states, $years;


	    // year information
	    $year_box = new_cmb2_box( array(
	        'id' => 'year_info',
	        'title' => 'Class Year Details',
	        'object_types' => array( 'yr' ), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	    ) );
	    $year_box->add_field( array(
	        'name' => 'President',
	        'id'   => $prefix . 'year_president',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Graduation Date',
	        'id'   => $prefix . 'year_grad_date',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Graduating Seniors',
	        'id'   => $prefix . 'year_grad_seniors',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Commencement Theme',
	        'id'   => $prefix . 'year_commencement_theme',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Commencement Speakers',
	        'id'   => $prefix . 'year_commencement_speakers',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Honorary Degree Recipient(s)',
	        'id'   => $prefix . 'year_honorary_degrees',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Medal of Merit Recipient(s)',
	        'id'   => $prefix . 'year_medal',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent (1)',
	        'id'   => $prefix . 'year_agent_current_name',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent Email (1)',
	        'id'   => $prefix . 'year_agent_current_email',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent (2)',
	        'id'   => $prefix . 'year_agent_current_name_2',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent Email (2)',
	        'id'   => $prefix . 'year_agent_current_email_2',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent (3)',
	        'id'   => $prefix . 'year_agent_current_name_3',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent Email (3)',
	        'id'   => $prefix . 'year_agent_current_email_3',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent (4)',
	        'id'   => $prefix . 'year_agent_current_name_4',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Current Class Agent Email (4)',
	        'id'   => $prefix . 'year_agent_current_email_4',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Former Class Agent',
	        'id'   => $prefix . 'year_agent_former_name',
	        'type' => 'text',
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Has Memory Book',
	        'id' => $prefix . 'year_memory',
	        'type' => 'checkbox'
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Has Green List',
	        'id' => $prefix . 'year_green',
	        'type' => 'checkbox'
	    ) );
	    $year_box->add_field( array(
	        'name' => 'Facebook Page',
	        'id'   => $prefix . 'year_facebook',
	        'type' => 'text',
	    ) );

	}


}

