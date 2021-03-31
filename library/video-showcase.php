<?php


// add metabox(es)
function video_showcase_metabox( $meta_boxes ) {

    global $colors;

    // emergency metabox
    $video_showcase_metabox = new_cmb2_box( array(
        'id' => 'video_showcase_metabox',
        'title' => 'Video Showcase',
        'desc' => "An optional override to the header and page header for a page that displays a full window background video with optional calls to action.",
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $video_showcase_metabox->add_field( array(
        'name' => 'Background Video',
        'desc' => 'Select a video file (webm only!) to display in the background.',
        'id'   => CMB_PREFIX . 'video_showcase_bg',
        'type' => 'file',
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Primary Call to Action Text',
        'id'   => CMB_PREFIX . 'video_showcase_cta1_text',
        'type' => 'text',
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Primary Call to Action Link',
        'id'   => CMB_PREFIX . 'video_showcase_cta1_link',
        'type' => 'text',
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Secondary Call to Action Text',
        'id'   => CMB_PREFIX . 'video_showcase_cta2_text',
        'type' => 'text',
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Secondary Call to Action Link',
        'id'   => CMB_PREFIX . 'video_showcase_cta2_link',
        'type' => 'text',
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Tertiary Call to Action Text',
        'id'   => CMB_PREFIX . 'video_showcase_cta3_text',
        'type' => 'text',
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Tertiary Call to Action Link',
        'id'   => CMB_PREFIX . 'video_showcase_cta3_link',
        'type' => 'text',
    ) );
}
add_filter( 'cmb2_init', 'video_showcase_metabox' );



// emergency bar output function
function the_video_showcase() {

    // get the background video
    $video_showcase_bg = get_cmb_value( 'video_showcase_bg' );
    $video_showcase_cta1_text = get_cmb_value( 'video_showcase_cta1_text' );
    $video_showcase_cta1_link = get_cmb_value( 'video_showcase_cta1_link' );
    $video_showcase_cta2_text = get_cmb_value( 'video_showcase_cta2_text' );
    $video_showcase_cta2_link = get_cmb_value( 'video_showcase_cta2_link' );
    $video_showcase_cta3_text = get_cmb_value( 'video_showcase_cta3_text' );
    $video_showcase_cta3_link = get_cmb_value( 'video_showcase_cta3_link' );

	if ( !empty( $video_showcase_bg ) ) {
		?>
	<div class="video-showcase-container">
        <img src="<?php bloginfo( 'template_url' ); ?>/img/video-thumbnail.webp" class="video-thumbnail" />

        <video autoplay muted loop class="video-showcase">
            <source src="<?php print $video_showcase_bg; ?>" type="video/webm">
        </video>

        <!-- Optional: some overlay text to describe the video -->
        <header class="video">
            <div class="logo">
                <a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php bloginfo( "template_url" ) ?>/img/logo.webp" alt="<?php bloginfo( 'name' ); ?>">
                </a>
            </div>

            <div class="slogan">
                <?php bloginfo('description'); ?>
            </div>

            <button class="menu-show">menu</button>

            <button class="search-show">search</button>

            <div class="buttons">
                <ul>
                    <?php if ( !empty( $video_showcase_cta1_link ) ) { ?><li><a href="<?php print $video_showcase_cta1_link; ?>"><?php print $video_showcase_cta1_text; ?></a></li><?php } ?>
                    <?php if ( !empty( $video_showcase_cta2_link ) ) { ?><li><a href="<?php print $video_showcase_cta2_link; ?>"><?php print $video_showcase_cta2_text; ?></a></li><?php } ?>
                    <?php if ( !empty( $video_showcase_cta3_link ) ) { ?><li><a href="<?php print $video_showcase_cta3_link; ?>"><?php print $video_showcase_cta3_text; ?></a></li><?php } ?>
                </ul>
            </div>
        </header>
	</div>
		<?php
	}

}



// boolean function to check if there's a video showcase
function has_video_showcase() {
    if ( has_cmb_value( 'video_showcase_bg' ) ) {
        return true;
    }
    return false;
}

