<?php


// cmb2 fields for managing the menu
add_action( 'cmb2_admin_init', 'cta_metabox' );
function cta_metabox() {

    // menu metabox
    $cta_box = new_cmb2_box( array(
        'id' => 'cta_box',
        'title' => 'Calls to Action',
        'object_types' => array( 'page', 'area' ), // Post type
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true // Show field names on the left
    ) );
    $cta_box->add_field( array(
        'name' => 'Button One Text',
        'id'   => CMB_PREFIX . 'cta_1_text',
        'type' => 'text'
    ) );
    $cta_box->add_field( array(
        'name' => 'Button One Link',
        'id'   => CMB_PREFIX . 'cta_1_link',
        'type' => 'text'
    ) );
    $cta_box->add_field( array(
        'name' => 'Button Two Text',
        'id'   => CMB_PREFIX . 'cta_2_text',
        'type' => 'text'
    ) );
    $cta_box->add_field( array(
        'name' => 'Button Two Link',
        'id'   => CMB_PREFIX . 'cta_2_link',
        'type' => 'text'
    ) );

}



// output the calls to action
function the_call_to_action() {
    $button_one_text = get_cmb_value( 'cta_1_text' );
    $button_one_link = get_cmb_value( 'cta_1_link' );
    $button_two_text = get_cmb_value( 'cta_2_text' );
    $button_two_link = get_cmb_value( 'cta_2_link' );
    if ( !empty( $button_one_text ) && !empty( $button_one_link ) ) {
        ?>
        <div class="call-to-action">
            <a href="#top" class="btn back-to-top">^</a>
            <a href="<?php print $button_one_link ?>" class="btn one teal"><?php print $button_one_text ?></a>
            <?php if ( !empty( $button_two_text ) && !empty( $button_two_link ) ) { ?><a href="<?php print $button_two_link ?>" class="btn two grey-light"><?php print $button_two_text ?></a><?php } ?></a>
        </div>
        <?php
    }

    if ( stristr( $_SERVER['REQUEST_URI'], '/events' ) ) { ?>
        <div class="call-to-action">
            <a href="#top" class="btn back-to-top">^</a>
            <?php print get_snippet( 'events-cta' ); ?>
        </div>
        <?php 
    }
}



// boolean function to check if there's a call to action
function has_call_to_action() {
    $button_one_text = get_cmb_value( 'cta_1_text' );
    $button_one_link = get_cmb_value( 'cta_1_link' );
    if ( !empty( $button_one_text ) && !empty( $button_one_link ) ) {
        return true;
    }
    return false;
}


