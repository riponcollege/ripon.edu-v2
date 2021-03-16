<?php


if ( file_exists( __DIR__ . '/cmb2/init.php' ) ) {
    require_once __DIR__ . '/cmb2/init.php';
}


// eventually move this to the new 'research guide' cpt
add_action( 'cmb2_admin_init', 'guide_metaboxes' );
function guide_metaboxes() {

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

}


// get cmb value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// check if cmb value exists
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// show the cmb value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// show cmb value from a wysiwyg field (allows shortcodes and oembeds)
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}


