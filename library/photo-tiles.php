<?php


function the_phototiles() {
	$tiles = get_cmb_value( 'phototile' );

    // only do the thing if we have to
	if ( !empty( $tiles ) ) {
		?>
		<div class="phototiles">
		<?php
		foreach ( $tiles as $tile ) {
			if ( !empty( $tile['title'] ) && !empty( $tile['background'] ) && !empty( $tile['content'] ) ) {
				if ( !empty( $tile['link'] ) ) { ?><a href="<?php print $tile['link'] ?>"><?php } 
				?>
			<div class="phototile" style="background-image: url(<?php print $tile['background'] ?>);">
				<div class="phototile-title"><?php print $tile['title'] ?></div>
				<div class="phototile-subtitle"><?php print $tile['subtitle'] ?></div>
				<div class="phototile-content <?php print $tile['color'] ?>"><?php print $tile['content'] ?></div>
			</div>
				<?php
				if ( !empty( $tile['link'] ) ) { ?></a><?php } 
			}
		}
        ?>
        </div>
        <?php
	}
}


function phototiles_metabox() {

    // phototiles metabox
    $phototiles = new_cmb2_box( array(
        'id' => 'phototiles_metabox',
        'title' => 'Photo Tiles',
        'desc' => 'A 4-column component with background images for each of 4 columns, colors, and text displaying for each.',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high'
    ) );

    $phototiles_group = $phototiles->add_field( array(
        'id' => CMB_PREFIX . 'phototile',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Tile', 'cmb'),
            'remove_button' => __('Remove Tile', 'cmb'),
            'group_title'   => __( 'Tile {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $phototiles->add_group_field( $phototiles_group, array(
        'name' => 'Background',
        'desc' => 'Select a photo for the background of this tile.',
        'id'   => 'background',
        'type' => 'file',
        'preview_size' => array( 350, 150 )
    ) );

    $phototiles->add_group_field( $phototiles_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text'
    ) );

    $phototiles->add_group_field( $phototiles_group, array(
        'name' => 'Subtitle',
        'id'   => 'subtitle',
        'type' => 'text'
    ) );

    $phototiles->add_group_field( $phototiles_group, array(
        'name' => 'Hover Text',
        'desc' => 'Enter the content that will display when a user mouses over the tile.',
        'id'   => 'content',
        'type' => 'wysiwyg'
    ) );

    $phototiles->add_group_field( $phototiles_group, array(
        'name' => 'Hover Color',
        'id'   => 'color',
        'type' => 'select',
        'options' => array(
            'red-dark' => 'Red (Dark)',
            'red-light' => 'Red (Light)',
            'teal' => 'Teal',
            'grey' => 'Grey (Dark)',
            'grey-light' => 'Grey (Light)',
            'orange' => 'Orange'
        ),
        'default' => 'red-dark'
    ) );

    $phototiles->add_group_field( $phototiles_group, array(
        'name' => 'Link',
        'desc' => 'Enter a URL for where this tile should go.',
        'id'   => 'link',
        'type' => 'text'
    ) );

}
add_filter( 'cmb2_admin_init', 'phototiles_metabox' );


