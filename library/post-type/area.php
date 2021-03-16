<?php


// only enable this functionality if on ripon proper
if ( is_ripon() ) {


	// Flush rewrite rules for custom post types
	add_action( 'after_switch_theme', 'flush_rewrite_rules' );



	// let's create the function for the custom type
	function area_post_type() { 
		// creating (registering) the custom type 
		register_post_type( 'area', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 
				'labels' => array(
					'name' => __( 'Areas of Study', 'ptheme' ), /* This is the Title of the Group */
					'singular_name' => __( 'Area of Study', 'ptheme' ), /* This is the individual type */
					'all_items' => __( 'All Areas', 'ptheme' ), /* the all items menu item */
					'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
					'add_new_item' => __( 'Add New Area', 'ptheme' ), /* Add New Display Title */
					'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
					'edit_item' => __( 'Edit Area', 'ptheme' ), /* Edit Display Title */
					'new_item' => __( 'New Area', 'ptheme' ), /* New Display Title */
					'view_item' => __( 'View Area', 'ptheme' ), /* View Display Title */
					'search_items' => __( 'Search Areas', 'ptheme' ), /* Search Custom Type Title */ 
					'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
					'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
					'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'Manage the areas of study listed on the viewbook.', 'ptheme' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'menu_icon' => 'dashicons-welcome-learn-more', /* the icon for the custom post type menu */
				'rewrite'	=> array( 
					'slug' => 'area', 
					'with_front' => false 
				), /* you can specify its url slug */
				'has_archive' => false, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
			) /* end of options */
		); /* end of register post type */
		
		/* this adds your post tags to your custom post type */
		register_taxonomy_for_object_type( 'post_tag', 'area' );
		
	}


	// adding the function to the Wordpress init
	add_action( 'init', 'area_post_type');



	// now let's add custom categories (these act like categories)
	register_taxonomy( 'area_cat', 
		array('area'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Area Categories', 'ptheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Area Category', 'ptheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Area Categories', 'ptheme' ), /* search title for taxomony */
				'all_items' => __( 'All Area Categories', 'ptheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Area Category', 'ptheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Area Category:', 'ptheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Area Category', 'ptheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Area Category', 'ptheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Area Category', 'ptheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Area Category Name', 'ptheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 
				'slug' => 'area-category'
			)
		)
	);



	function the_area_lists() {

		$interests_col_1 = get_post_meta( get_the_ID(), CMB_PREFIX . "interests_col_1", 1 );
		$interests_col_2 = get_post_meta( get_the_ID(), CMB_PREFIX . "interests_col_2", 1 );

		if ( !empty( $interests_col_1 ) || !empty( $interests_col_2 ) ) {
			?>
		<div id="search-box" class="search-box group">
			
			<?php if ( is_page( 'beyond-ripon' ) ) { ?>
			<h2>Where will you go?</h2>
			<?php } else { ?>
			<h2>What are you interested in?</h2>
			<?php get_search_form(); ?>
			<?php } ?>
			
			<?php if ( !empty( $interests_col_1	) ) { ?>
			<div class="column">
				<?php 
				foreach ( $interests_col_1 as $cat ) {
					list_interest_category( $cat );
				}
				?>
			</div>
			<?php } ?>
			
			<?php if ( !empty( $interests_col_2	) ) { ?>
			<div class="column">
				<?php 
				foreach ( $interests_col_2 as $cat ) {
					list_interest_category( $cat );
				}
				?>
			</div>
			<?php } ?>

			<?php wp_reset_postdata(); ?>
			
		</div><!-- #content -->
			<?php
		}

	}



	function list_area_category() {

		// select the areas of interest in the category
		$areas = get_areas();

		// count em
		$area_count = count( $areas );

		// determine what a quarter of the total records is so we can make columns
		$quarter = ceil( $area_count / 2 );

		// loop through the post results
		$num = 1;
		?>
		<ul>
		<?php
		foreach ( $areas as $area ) {
			$categories = wp_get_object_terms( $area->ID, 'area_cat' );
			/*
			if ( $num == 1 || $num == $quarter+1 || $num == ( $quarter * 2 )+1 || $num == ( $quarter * 3 )+1 ) {
				?>
		<ul class="column<?php print ( $num == 1 ? ' one' : '' ); print ( $num == $quarter+1 ? ' two' : '' ); print ( $num == ($quarter*2)+1 ? ' three' : '' ); print ( $num == ($quarter*3)+1 ? ' four' : '' ); ?>">
				<?php
			}
			*/
			$cats = array();
			$classes = array();
			foreach ( $categories as $cat ) {
	 			switch ( $cat->slug ) {
	 				case "major":
	 					$cats[] = '<span class="ma">MA</span>';
	 					$classes[] = 'ma';
	 				break;
	 				case "minor":
	 					$cats[] = '<span class="mi">MI</span>';
	 					$classes[] = 'mi';
	 				break;
	 				case "pre-professional-advising":
	 					$cats[] = '<span class="pa">PA</span>';
	 					$classes[] = 'pa';
	 				break;
	 				case "teaching-certification":
	 					$cats[] = '<span class="tc">TC</span>';
	 					$classes[] = 'tc';
	 				break;
	 				case "dual-degree":
	 					$cats[] = '<span class="dd">DD</span>';
	 					$classes[] = 'dd';
	 				break;
	 			}
			}
			?>
			<li class="<?php print implode( ' ', $classes ); ?>"><a href="/area/<?php print $area->post_name ?>"><?php print $area->post_title; ?></a> <?php
			if ( !empty( $categories ) ) {
				?><?php
				print implode( ' ', $cats );
				?><?php
			}
			?></li>
			<?php 
			/*
			if ( $num == $quarter || $num == ( $quarter * 2 ) || $num == ( $quarter * 3 ) || $num == $area_count ) {
				?>
		</ul>
				<?php
			}
			*/
			$num++;
		}
		?>
		</ul>
		<?php
		
		// reset the post data
		wp_reset_postdata();

	}



	function get_areas() {
		global $wpdb;

		// Count custom post type by custom taxonomy
		$sql = "SELECT * FROM $wpdb->posts p
		WHERE p.post_type = 'area'
		AND ( p.post_status = 'publish' )
		AND p.post_date < NOW() ORDER BY p.post_title;";

		$rows = $wpdb->get_results( $sql );

		return $rows;
	}



	function get_area_category( $category ) {
		global $wpdb;

		// Count custom post type by custom taxonomy
		$sql = "SELECT * FROM $wpdb->posts p
		JOIN $wpdb->term_relationships tr ON (p.ID = tr.object_id)
		JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'area_cat')
		JOIN $wpdb->terms t ON (tt.term_id = t.term_id AND t.slug = '$category' )
		WHERE p.post_type = 'area'
		AND (p.post_status = 'publish')
		AND p.post_date < NOW() ORDER BY p.post_title;";

		$rows = $wpdb->get_results( $sql );

		return $rows;
	}



	function do_area_tab_nav( $title, $key ) {
		$content = get_cmb_value( "area_" . $key );
		if ( !empty( $content ) ) { 
		?>
						<li class="area-<?php print $key; ?>"><?php print $title ?></li>
		<?php
		} 
	}



	function do_area_tabs_nav() {
		$tabs = get_cmb_value( "tab" );
		if ( !empty( $tabs ) ) {
			foreach ( $tabs as $a_tab ) {
				?>
				<li class="area-<?php print sanitize_title( $a_tab['title'] ); ?>"><?php print $a_tab['title'] ?></li>
				<?php
			}
		}
	}



	function do_area_tabs_content() {
		$tabs = get_cmb_value( "tab" );
		if ( !empty( $tabs ) ) {
			foreach ( $tabs as $a_tab ) {
				?>
					<div class="tab-content area-<?php print sanitize_title( $a_tab['title'] ); ?>">
						<h2><?php print $a_tab['title'] ?></h2>
						<?php print wpautop( do_shortcode( $a_tab['content'] ) ); ?>
					</div>
				<?php
			}	
		}
	}



	function do_area_tab_content( $title, $key ) {
		$content = get_cmb_value( "area_" . $key );
		if ( !empty( $content ) ) { 
		?>
				<div class="tab-content area-<?php print $key; ?>">
					<h2><?php print $title ?></h2>
					<?php print wpautop( do_shortcode( $content ) ); ?>
				</div>
		<?php
		} 
	}

}



add_action( 'cmb2_init', 'area_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function area_metaboxes() {

	// get all the colors so they can pick one for each highlight box
	global $colors;


	// select all faculty so they can choose which ones are part of this area of study
    $args = array( 'post_type' => 'faculty', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' );
    $loop = new WP_Query( $args );
    $faculty = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $faculty[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();


    // area of interest information
    $area_box = new_cmb2_box( array(
        'id' => 'area_info',
        'title' => 'Area of Interest Details',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );



    // overview video and doc
    $area_box->add_field( array(
        'name' => 'Overview Video',
        'id' => CMB_PREFIX . 'area_sidebar_video',
        'type' => 'text_url'
    ) );
    $area_box->add_field( array(
        'name' => 'Overview Document URL',
        'id' => CMB_PREFIX . 'area_facebook',
        'type' => 'file'
    ) );


	$args = array(
		'taxonomy' => 'people_cat',
		'orderby' => 'name',
		'order'   => 'ASC'
	);
	$cats = get_categories($args);
	$people_cats[''] = '- none -';
    foreach ( $cats as $cat ) {
        $people_cats[$cat->slug] = $cat->name;
    }
    $area_box->add_field( array(
        'name' => 'People to List',
        'desc' => 'Which category of people to display as the faculty list for the faculty list for this area.',
        'id' => $prefix . 'area_faculty_list',
        'type' => 'select',
        'options' => $people_cats,
    ) );


    // get all the tags so they can select one to display related posts on individual area pages.
    $all_tags = get_tags();
    $tag_options = array(
        '' => '-- None --'
    );
    foreach ( $all_tags as $tag ) {
        $tag_options[$tag->slug] = $tag->name;
    }
    $area_box->add_field( array(
        'name' => 'Post Tag',
        'id' => CMB_PREFIX . 'area_post_tag',
        'type' => 'select',
        'options' => $tag_options,
        'default' => get_cmb_value( 'area_post_tag' )
    ));



    $area_box->add_field( array(
        'name' => 'Faculty',
        'desc' => 'Select the faculty related to this area of interest.',
        'id' => CMB_PREFIX . 'area_faculty_list',
        'type' => 'multicheck_inline',
        'options' => $faculty,
    ) );
    $area_box->add_field( array(
        'name' => 'Requirements',
        'id' => CMB_PREFIX . 'area_requirements',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 10
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Career Tracks',
        'id' => CMB_PREFIX . 'area_tracks',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Unique Opportunities',
        'id' => CMB_PREFIX . 'area_opportunities',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );



    /*
    $area_box->add_field( array(
        'name' => 'Ensembles',
        'id' => CMB_PREFIX . 'area_ensembles',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Events',
        'id' => CMB_PREFIX . 'area_events',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Past Productions',
        'id' => CMB_PREFIX . 'area_productions',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Alumni Profiles',
        'id' => CMB_PREFIX . 'area_alumni',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Graduate Success',
        'id' => CMB_PREFIX . 'area_success',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Clinical Supervisors',
        'id' => CMB_PREFIX . 'area_supervisors',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Be a Teacher',
        'id' => CMB_PREFIX . 'area_teacher',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Be a Teacher',
        'id' => CMB_PREFIX . 'area_teacher',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    */

}


