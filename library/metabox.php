<?php


// get cmb value
function get_cmb_value( $field, $post_id = null ) {
    return get_post_meta( ( !is_null( $post_id ) ? $post_id : get_the_ID() ), CMB_PREFIX . $field, 1 );
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


