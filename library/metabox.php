<?php


if ( file_exists( __DIR__ . '/cmb2/init.php' ) ) {
    require_once __DIR__ . '/cmb2/init.php';
}


add_action( 'cmb2_init', 'cmb2_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_metaboxes() {
    
    /*
    // accordion metabox
    $tab_metabox = new_cmb2_box( array(
        'id' => 'tab_metabox',
        'title' => 'Tab Boxes',
        'desc' => 'Boxes of content that are accessed via tabs on the left column.',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tab_metabox_group = $tab_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tab',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Tab', 'cmb'),
            'remove_button' => __('Remove Tab', 'cmb'),
            'group_title'   => __( 'Tab {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );
    */

    
    // select all faculty for the study guide picklists
    $args = array( 'post_type' => 'faculty', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' );
    $loop = new WP_Query( $args );
    $faculty = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $faculty[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();


    // accordion metabox
    $guide_metabox = new_cmb2_box( array(
        'id' => 'guide_metabox',
        'title' => 'Guide Librarian',
        'desc' => 'Select the librarian for this study guide.',
        'object_types' => array( 'page' ), // post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-guide.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );
    $guide_metabox->add_field( array(
        'name' => 'Guide Librarian',
        'id'   => CMB_PREFIX . 'guide_librarian',
        'type' => 'select',
        'options' => $faculty,
    ) );



    // area of interest information
    $accordion_metabox = new_cmb2_box( array(
        'id' => 'accordions',
        'title' => 'Accordions',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-guide.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $accordion_metabox_group = $accordion_metabox->add_field( array(
        'id' => CMB_PREFIX . 'accordions',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Accordion', 'cmb'),
            'remove_button' => __('Remove Accordion', 'cmb'),
            'group_title'   => __( 'Accordion {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Open By Default',
        'id'   => 'open',
        'type' => 'checkbox',
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
    ) );

}


// get CMB value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}


