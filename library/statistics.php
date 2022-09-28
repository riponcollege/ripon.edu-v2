<?php



// statistic output function
function the_statistics() {

	// get the slides
	$statistics = get_post_meta( get_the_ID(), CMB_PREFIX . "statistics", 1 );

	if ( !empty( $statistics ) ) {
		?>
		<div class="statistics">
			<?php
			foreach ( $statistics as $key => $statistic ) {
				if ( !empty( $statistic["title"] ) ) {

					// store the title and subtitle
					$title = ( isset( $statistic["title"] ) ? $statistic["title"] : '' );
                    $content = ( isset( $statistic["content"] ) ? $statistic["content"] : '' );

					?>
			<div class="statistic">
				<h3 class="stat-number"><?php print $title ?></h3>
				<div class="stat-content"><?php print $content; ?></div>
			</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}



// statistic metaboxes
add_action( 'cmb2_admin_init', 'statistic_metaboxes' );
function statistic_metaboxes() {

    global $colors;

    // area of interest information
    $statistic_metabox = new_cmb2_box( array(
        'id' => 'statistics',
        'title' => 'Statistics',
        'object_types' => array( 'area' ), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $statistic_metabox_group = $statistic_metabox->add_field( array(
        'id' => CMB_PREFIX . 'statistics',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Statistic', 'cmb'),
            'remove_button' => __('Remove Statistic', 'cmb'),
            'group_title'   => __( 'Statistic {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $statistic_metabox->add_group_field( $statistic_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $statistic_metabox->add_group_field( $statistic_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );

}


