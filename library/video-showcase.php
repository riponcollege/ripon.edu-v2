<?php


// add metabox(es)
function video_showcase_metabox( $meta_boxes ) {

    $all_menus = get_all_menus();

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
        'name' => 'Header Menu',
        'id' => CMB_PREFIX . 'video_showcase_menu_header',
        'type' => 'select',
        'options' => $all_menus,
    ) );

    $video_showcase_metabox->add_field( array(
        'name' => 'Call to Action Buttons Menu',
        'id' => CMB_PREFIX . 'video_showcase_menu_calls',
        'type' => 'select',
        'options' => $all_menus,
    ) );

}
add_filter( 'cmb2_admin_init', 'video_showcase_metabox' );



// emergency bar output function
function the_video_showcase() {

    // get the background video
    $video_showcase_bg = get_cmb_value( 'video_showcase_bg' );
    $video_showcase_menu_header = get_cmb_value( 'video_showcase_menu_header' );
    $video_showcase_menu_calls = get_cmb_value( 'video_showcase_menu_calls' );

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

            <?php if ( !empty( $video_showcase_menu_header ) ) { ?>
            <div class="header-menu">
                <?php
                wp_nav_menu( array( 
                    'menu' => $video_showcase_menu_header, 
                    'menu_class' => 'nav-menu' )
                );
                ?>
            </div>
            <?php } else { ?>
            <div class="slogan">
                <?php bloginfo('description'); ?>
            </div>
            <?php } ?>

            <button class="menu-show">menu</button>

            <button class="search-show">search</button>

            <div class="buttons">
                <?php
                wp_nav_menu( array( 
                    'menu' => $video_showcase_menu_calls, 
                    'menu_class' => 'nav-menu' )
                );
                ?>
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

