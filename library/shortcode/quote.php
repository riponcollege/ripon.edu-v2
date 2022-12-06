<?php


function quote_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'by' => false,
		'photo' => false,
		'style' => 'left'
	), $atts );

	// if we have content and an attribution
	if ( !empty( $a['by'] ) && !empty( $content ) ) {
		
		// start the quote block	
		$return .= '<div class="quote ' . $a['style'] . '">';

		// if we have a photo
		if ( $a['photo'] ) {
			$return .= '<div class="quote-photo"><img src="' . $a['photo'] . '" /></div>';
		}

		// add the quote content and by line
		$return .= '<div class="quote-content"><div class="quote-content-inner">' . $content . '</div><div class="quote-attribution">' . $a['by'] . '</div></div>';
		
		// close the quote
		$return .= '</div>';

		return $return;
	}
}
add_shortcode( 'quote', 'quote_shortcode' );


function the_quote_showcase() {
	// get the background video
    $quote_showcase = get_cmb_value( 'quote' );
    
    if ( !empty( $quote_showcase ) ) {
    	print '<div class="quote-showcase">';
	    foreach ( $quote_showcase as $a_quote ) {
	    	print '<div class="quote-slide">' . apply_filters( 'the_content', $a_quote['content'] ) . '</div>';
	    }
	    print '</div>';
	}

}


add_action( 'cmb2_init', 'quote_metabox' );
function quote_metabox() {

    // tab metabox
    $tab_metabox = new_cmb2_box( array(
        'id' => 'quote_metabox',
        'title' => 'Quote Showcase',
        'desc' => 'A quote section on a page that allows you to add multiple quotes to be faded between.',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tab_metabox_group = $tab_metabox->add_field( array(
        'id' => CMB_PREFIX . 'quote',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Quote', 'cmb'),
            'remove_button' => __('Remove Quote', 'cmb'),
            'group_title'   => __( 'Quote {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Quote Content',
        'id'   => 'content',
        'type' => 'textarea_small',
        'show_names' => false,
    ) );

}
