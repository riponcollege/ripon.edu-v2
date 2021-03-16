<?php


// icon showcase
function the_icon_showcase() {

    $icons = get_cmb_value( 'icon_showcase' );

    if ( !empty( $icons ) ) {
        ?>
        <div class="icons text-center group">
        <?php
        $num=1;
        foreach ( $icons as $icon ) {
            if ( !empty( $icon['image'] ) ) { ?>
            <?php if ( !empty( $icon['link'] ) ) { ?><a href="<?php print $icon['link']; ?>"><?php } ?>
                <div class="icon bg-<?php print $icon['color'] ?> icon-<?php print $num ?>">
                    <img src="<?php print $icon['image']; ?>" alt="Icon for: <?php print strip_tags( $icon['title'] ); ?>">
                    <?php if ( !empty( $icon['title'] ) ) { print apply_filters( 'the_content', $icon['title'] ); } ?>
                </div>
            <?php if ( !empty( $icon['link'] ) ) { ?></a><?php } ?>
                <?php 
                $num++;
            }
        }
        ?>
        </div>
        <?php
    }

}


// icon showcase
function has_icon_showcase() {

    $icons = get_cmb_value( 'icon_showcase' );

    if ( !empty( $icons ) ) {
        return true;
    } else {
        return false;
    }

}



// add metabox(es)
add_filter( 'cmb2_init', 'icon_metabox' );
function icon_metabox( $meta_boxes ) {

    global $colors;

    // thumb showcase metabox
    $icon_showcase_metabox = new_cmb2_box( array(
        'id' => 'icon_showcase_metabox',
        'title' => 'Icon Showcase',
        'object_types' => array( 'area', 'faculty' ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $icon_showcase_metabox_group = $icon_showcase_metabox->add_field( array(
        'id' => CMB_PREFIX . 'icon_showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Icon', 'cmb2'),
            'remove_button' => __('Remove Icon', 'cmb2'),
            'group_title'   => __( 'Icon {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $icon_showcase_metabox->add_group_field( $icon_showcase_metabox_group, array(
        'name' => 'Color',
        'id' => 'color',
        'type' => 'select',
        'options' => $colors,
        'default' => 'red-dark'
    ));

    $icon_showcase_metabox->add_group_field( $icon_showcase_metabox_group, array(
        'name' => 'Photo',
        'desc' => 'Upload a 500x500 pixel icon image.',
        'id'   => 'photo',
        'type' => 'file',
        'preview_size' => array( 100, 100 )
    ) );

    $icon_showcase_metabox->add_group_field( $icon_showcase_metabox_group, array(
        'name' => 'Icon',
        'desc' => 'Upload a 100x100 pixel icon image. Ideally a transparent PNG.',
        'id'   => 'icon',
        'type' => 'file',
        'preview_size' => array( 100, 100 )
    ) );

    $icon_showcase_metabox->add_group_field( $icon_showcase_metabox_group, array(
        'name' => 'Title',
        'desc' => 'Set a title to display below this icon.',
        'id'   => 'title',
        'type' => 'wysiwyg',
        'options' => array (
            'textarea_rows' => 4
        )
    ) );

    $icon_showcase_metabox->add_group_field( $icon_showcase_metabox_group, array(
        'name' => 'Link',
        'desc' => 'Specify a URL to which this icon box should link. (Optional)',
        'id'   => 'link',
        'type' => 'text',
    ) );

}


