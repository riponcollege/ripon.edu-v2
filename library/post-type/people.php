<?php


// only show faculty tab on ripmn proper
if ( is_ripon() || is_alumni() ) {
	

	// Flush rewrite rules for custom post types
	add_action( 'after_switch_theme', 'flush_rewrite_rules' );



	// let's create the function for the custom type
	function people_post_type() { 
		// creating (registering) the custom type 
		register_post_type( 'people', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array(
				'labels' => array(
					'name' => __( 'People', 'ptheme' ), /* This is the Title of the Group */
					'singular_name' => __( 'People', 'ptheme' ), /* This is the individual type */
					'all_items' => __( 'All People', 'ptheme' ), /* the all items menu item */
					'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
					'add_new_item' => __( 'Add New Person', 'ptheme' ), /* Add New Display Title */
					'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
					'edit_item' => __( 'Edit Person', 'ptheme' ), /* Edit Display Title */
					'new_item' => __( 'New Person', 'ptheme' ), /* New Display Title */
					'view_item' => __( 'View Person', 'ptheme' ), /* View Display Title */
					'search_items' => __( 'Search Faculty', 'ptheme' ), /* Search Custom Type Title */ 
					'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
					'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
					'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'Manage the people directory.', 'ptheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => 'dashicons-businessperson', /* the icon for the custom post type menu */
				'has_archive' => true, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array(
					'slug' => 'bio'
				),
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' )
			) /* end of options */
		); /* end of register post type */
		
		// add post tags to our cpt
		register_taxonomy_for_object_type( 'post_tag', 'people' );
		
	}


	// adding the function to the Wordpress init
	add_action( 'init', 'people_post_type');



	// now let's add custom categories (these act like categories)
	register_taxonomy( 'people_cat', 
		array('people'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'People Categories', 'ptheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'People Category', 'ptheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search People Categories', 'ptheme' ), /* search title for taxomony */
				'all_items' => __( 'All People Categories', 'ptheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent People Category', 'ptheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent People Category:', 'ptheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit People Category', 'ptheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update People Category', 'ptheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New People Category', 'ptheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New People Category Name', 'ptheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
		)
	);


	// People metabox
	add_action( 'cmb2_admin_init', 'person_metaboxes' );
	function person_metaboxes() {

		// get the counselor states
		global $states_counselor;

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_p_';


	    // area of interest information
	    $person_box = new_cmb2_box( array(
	        'id' => 'person_info',
	        'title' => 'Person Details',
	        'object_types' => array( 'people' ), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	    ) );
	    $person_box->add_field( array(
	        'name' => 'First Name',
	        'id' => $prefix . 'person_fname',
	        'type' => 'text_medium'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Last Name',
	        'id' => $prefix . 'person_lname',
	        'type' => 'text_medium'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Title',
	        'id' => $prefix . 'person_title',
	        'type' => 'text'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Office Number',
	        'id' => $prefix . 'person_office',
	        'type' => 'text_medium'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Phone Number',
	        'id' => $prefix . 'person_phone',
	        'type' => 'text_medium'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Email Address',
	        'id' => $prefix . 'person_email',
	        'type' => 'text_email'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Website',
	        'id' => $prefix . 'person_website',
	        'type' => 'text',
	        'desc' => 'Include the Full URL (including "http(s)") to this People members website.'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Publications',
	        'id' => $prefix . 'person_publications_pdf',
	        'type' => 'file',
	        'desc' => 'Upload a publications PDF file.'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'CV/Resume',
	        'id' => $prefix . 'person_cv',
	        'type' => 'file',
	        'desc' => 'Upload a CV/Resume file.'
	    ) );
	    $person_box->add_field( array(
	        'name' => 'Counselor Regions',
	        'id' => $prefix . 'person_states',
	        'type' => 'multicheck_inline',
	        'desc' => 'Check the states/territories this person is an admission counselor for (if applicable).',
	        'options' => $states_counselor,
	    ) );

	}


	// add a people shortcode
	function people_shortcode( $atts ) {

		// set default params and override with those in shortcode
		extract( shortcode_atts( array(
			'category' => '',
			'link' => 1,
			'photo' => 1
		), $atts ));

		// [people category="mycat" link=0 /]


		// set some query vars
		$vars = array( 
			"posts_per_page" => 200,
			"post_type" => 'people',
			"orderby" => 'meta_value',
			"meta_key" => '_p_person_lname',
			"order" => 'ASC'
		);

		if ( !empty( $category ) ) {
			$vars["tax_query"] = array(
		        array (
		            'taxonomy' => 'people_cat',
		            'field' => 'slug',
		            'terms' => $category,
		        )
		    );
		}

		// run the query
	    $p = new WP_Query( $vars );

	    $people_content = '<section class="people">';

		$people_content .= '<div class="people-search"><input type="text" name="people-search-term" id="s" placeholder="Search Name, Academic Department, or Title"></div>';

		if ( $p->have_posts() ) : 

			$people_content .='<div class="people-listing">';

			// Start the Loop.
			while ( $p->have_posts() ) : $p->the_post();
				$post = get_the_ID();

				$people_content .='<div class="person-entry visible">' . 
					( $photo ? ( $link ? '<a href="' . get_the_permalink() . '">' : '' ) . get_the_post_thumbnail() . ( $link ? '</a>' : '' ) : '' ) .
					'<div class="info">
						<h4>' . ( $link ? '<a href="' . get_the_permalink() . '">' : '' ) . get_cmb_value( "person_lname", $post ) . ', ' . get_cmb_value( "person_fname" ) . ( $link ? '</a>' : '' ) . '</h4>
						<p class="person-title">' . get_cmb_value( "person_title" ) . '</p>
						<p class="person-email"><a href="mailto:' . get_cmb_value( "person_email" ) . '">' . get_cmb_value( "person_email" ) . '</a></p>
					</div>
				</div>';

			endwhile;

			$people_content .="</div>";

		else :
			
			$people_content .= '<p>No people found in database.</p>';

		endif;

		$people_content .='</section>';

		wp_reset_postdata();

		return $people_content;
	}
	add_shortcode( 'people', 'people_shortcode' );



	// add a people shortcode
	function person_shortcode( $atts ) {

		// set default params and override with those in shortcode
   		extract( shortcode_atts( array(
			'link' => true,
			'id' => ''
		), $atts ) );

		if ( !empty( $id ) ) {

			// set some query vars
			$person = get_post( $id );

		    $person_content = '<section class="person-single">';

			$person_content .='<div class="person-entry visible">' . 
				( $link ? '<a href="' . get_the_permalink( $id ) . '">' : '') . get_the_post_thumbnail( $id ) . ( $link ? '</a>' : '') .
				'<div class="info">
					<h4>' . ( $link ? '<a href="' . get_the_permalink( $id ) . '">' : ''). get_cmb_value( "person_lname", $id ) . ', ' . get_cmb_value( "person_fname", $id ) . ( $link ? '</a>' : '') . '</h4>
					<p class="person-title">' . get_cmb_value( "person_title", $id ) . '</p>
					<p class="person-email"><a href="mailto:' . get_cmb_value( "person_email", $id ) . '">' . get_cmb_value( "person_email", $id ) . '</a></p>
				</div>
			</div>';

			$person_content .='</section>';

			wp_reset_postdata();

			return $person_content;

		} else {
			return '';
		}
	}
	add_shortcode( 'person', 'person_shortcode' );
	

	// get people by category
	function get_people_by_category( $category ) {
		return get_posts( array(
			'post_type' => 'people',
			'posts_per_page' => -1,
			'tax_query' => array(
		        array(
		            'taxonomy' => 'people_cat',
		            'field'    => 'slug',
		            'terms'    => $category
		        )
		    )
		) );
	}


	// get the counselor dropdown and filtering features
	function shortcode_counselors() {

		// get the counselor states/territories
		global $states_counselor;

		// start building the dropdown
		$counselors_dropdown = "<div class='counselor-state'><label>Select a State/Territory:</label> <select class='counselor-state-select'>";
		$counselors_dropdown .= "<option value='0'>-- All Counselors --</option>";

		// loop through the states/territories and generate the options
		foreach ( $states_counselor as $counselor_state_key => $counselor_state_name ) {
			$counselors_dropdown .= "<option value='" . $counselor_state_key . "'>" . $counselor_state_name . "</option>";
		}

		// end the counselors dropdown
		$counselors_dropdown .= "</select></div>";

		// start a people listing to filter based on the dropdown selection
		$counselors_dropdown .= "<div class='counselors'>";

		// get the counselors
		$counselors = get_people_by_category( 'admission-counselor' );

		// start generating the code to output the counselors
		foreach ( $counselors as $a_counselor ) {

			// get the states for this person
			$states = get_cmb_value( 'person_states', $a_counselor->ID );

			// start the output of this person's information
			$counselors_dropdown .= "<div class='counselor'" . ( !empty( $states ) ? " data-states='" . implode( $states, ',' ) . "'" : '' ) . "><div class='counselor-photo'>" . get_the_post_thumbnail( $a_counselor->ID ) . "</div><div class='counselor-info'><h3>" . $a_counselor->post_title . "</h3><p>" . get_cmb_value( 'person_phone', $a_counselor->ID ) . "</p><p><a href='mailto:" . get_cmb_value( 'person_email', $a_counselor->ID ) . "'>" . get_cmb_value( 'person_email', $a_counselor->ID ) . "</a></p></div></div>";

		}

		// end the admission-counselors content area
		$counselors_dropdown .= "</div>";

		// return the counselor dropdown
		return $counselors_dropdown;

	}
	add_shortcode( 'counselors', 'shortcode_counselors' );

}


