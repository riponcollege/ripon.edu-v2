<?php



// accordion output function
function the_accordions() {

	// get the slides
	$accordions = get_post_meta( get_the_ID(), CMB_PREFIX . "accordions", 1 );

	if ( !empty( $accordions ) ) {
		?>
		<div class="accordions">
			<?php
			foreach ( $accordions as $key => $accordion ) {
				if ( !empty( $accordion["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $accordion["title"] ) ? $accordion["title"] : '' );
					$content = ( isset( $accordion["content"] ) ? $accordion["content"] : '' );

					?>
			<div class="accordion<?php print ( isset( $accordion['open'] ) ? ( $accordion['open'] == 'on' ? " open" : "" ) : "" ); ?>">
				<h3 class="accordion-handle"><?php print $title ?></h3>
				<div class="accordion-content">
					<?php print do_shortcode( wpautop( $content ) ); ?>
				</div>
			</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}



// accordion metaboxes
add_action( 'cmb2_admin_init', 'accordion_metaboxes' );
function accordion_metaboxes() {

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


