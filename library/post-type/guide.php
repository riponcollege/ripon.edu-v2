<?php


// only show guide tab on ripon proper
if ( is_ripon() ) {


	// let's create the function for the custom type
	function guide_post_type() { 

		// creating (registering) the custom type 
		register_post_type( 'guide', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 
				'labels' => array(
					'name' => __( 'Guides', 'ptheme' ), /* This is the Title of the Group */
					'singular_name' => __( 'Guide', 'ptheme' ), /* This is the individual type */
					'all_items' => __( 'All Guides', 'ptheme' ), /* the all items menu item */
					'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
					'add_new_item' => __( 'Add New Guide', 'ptheme' ), /* Add New Display Title */
					'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
					'edit_item' => __( 'Edit Guide', 'ptheme' ), /* Edit Display Title */
					'new_item' => __( 'New Guide', 'ptheme' ), /* New Display Title */
					'view_item' => __( 'View Guide', 'ptheme' ), /* View Display Title */
					'search_items' => __( 'Search Guide', 'ptheme' ), /* Search Custom Type Title */ 
					'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
					'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
					'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'Manage the research guides listed on the site.', 'ptheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => 'dashicons-format-aside', /* the icon for the custom post type menu */
				'rewrite'	=> array( 
					'slug' => 'guide', 
					'with_front' => false 
				), /* you can specify its url slug */
				'has_archive' => 'research-guides', /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' )
			) /* end of options */
		); /* end of register post type */

		// register_taxonomy_for_object_type( 'category', 'event' );	
		
	}


	// adding the function to the Wordpress init
	add_action( 'init', 'guide_post_type');



	// eventually move this to the new 'research guide' cpt
	add_action( 'cmb2_admin_init', 'guide_metaboxes' );
	function guide_metaboxes() {

	    // select all faculty for the study guide picklists
	    $args = array( 
	    	'post_type' => 'people', 
	    	'posts_per_page' => -1, 
	    	'orderby' => 'title', 
	    	'order' => 'ASC', 
			'tax_query' => array(
				array(
					'taxonomy' => 'people_cat',
					'field' => 'slug', 
					'terms' => 'librarian',
				)
			)
		);
	    $loop = new WP_Query( $args );
	    $faculty = array(
	    	'' => '-- select a librarian --'
	    );
	    while ( $loop->have_posts() ) : $loop->the_post();
	        $faculty[get_the_ID()] = get_the_title();
	    endwhile;
	    wp_reset_query();


	    // accordion metabox
	    $guide_metabox = new_cmb2_box( array(
	        'id' => 'guide_metabox',
	        'title' => 'Guide Librarian',
	        'desc' => 'Select the librarian for this study guide.',
	        'object_types' => array( 'guide' ), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	    ) );
	    $guide_metabox->add_field( array(
	        'name' => 'Guide Librarian',
	        'id'   => CMB_PREFIX . 'guide_librarian',
	        'type' => 'select',
	        'options' => $faculty,
	    ) );

	}


}

