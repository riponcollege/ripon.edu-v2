<?php


$states = array(
    '0' =>'State',
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'FM'=>'Federated States of Micronesia',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
    'AE'=>'Armed Forces Africa \ Canada \ Europe \ Middle East',
    'AA'=>'Armed Forces America (Except Canada)',
    'AP'=>'Armed Forces Pacific',
    'UK'=>'United Kingdom'
);


// set up an array of years from 1940 to current
$years = array();
$years[0] = '- none -';
$n = 1950;
while ( $n < ( date( 'Y' ) + 1 ) ) {
    $years[$n] = $n;
    $n++;
}


if ( file_exists( __DIR__ . '/cmb2/init.php' ) ) {
  require_once __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once __DIR__ . '/CMB2/init.php';
}


add_action( 'cmb2_admin_init', 'cmb2_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_p_';


    $all_menus = get_all_menus();

    // menu metabox
    $menu_box = new_cmb2_box( array(
        'id' => 'menu_box',
        'title' => 'Page Menus',
        'object_types' => array( 'page' ), // Post type
        'context' => 'normal',
        'priority' => 'default',
        'show_names' => true // Show field names on the left
    ) );
    $menu_box->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'menu_title',
        'type' => 'text'
    ) );
    $menu_box->add_field( array(
        'name'    => 'Sidebar Menu',
        'id'      => CMB_PREFIX . 'menu_primary',
        'type'    => 'select',
        'options' => $all_menus,
    ) );

    /*
	$cmb = new_cmb2_box( array(
		'id' => 'map_metabox',
		'title' => __( 'Map Information', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'show_on' => array( 
			'key' => 'page-template', 
			'value' => 'page-map.php'
		),
		'context' => 'normal', //  'normal', 'advanced', or 'side'
		'priority' => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names' => true, // Show field names on the left
	) );

	// Regular text field
	$cmb->add_field( array(
		'name' => 'Button 1 Text',
		'id' => $prefix . 'map-button-1-text',
		'type' => 'text',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Button 1 URL',
		'id'   => $prefix . 'map-button-1-url',
		'type' => 'text_url',
	) );

	// Regular text field
	$cmb->add_field( array(
		'name' => 'Button 2 Text',
		'id' => $prefix . 'map-button-2-text',
		'type' => 'text',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Button 2 URL',
		'id'   => $prefix . 'map-button-2-url',
		'type' => 'text_url',
	) );

	// Regular text field
	$cmb->add_field( array(
		'name' => 'Button 3 Text',
		'id' => $prefix . 'map-button-3-text',
		'type' => 'text',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Button 3 URL',
		'id'   => $prefix . 'map-button-3-url',
		'type' => 'text_url',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Embed URL',
		'id'   => $prefix . 'map-url',
		'type' => 'text_url',
	) );
    */



    $args = array( 'post_type' => 'faculty', 'posts_per_page' => -1 );
    $loop = new WP_Query( $args );
    $faculty = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $faculty[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();


    $categories = get_categories();

    // area of interest information
    $area_box = new_cmb2_box( array(
        'id' => 'area_info',
        'title' => 'Area of Interest Details',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $area_box->add_field( array(
        'name' => 'Faculty',
        'desc' => 'Select the faculty related to this area of interest.',
        'id' => CMB_PREFIX . 'area_faculty_list',
        'type' => 'multicheck_inline',
        'options' => $faculty,
    ) );
    $area_box->add_field( array(
        'name' => 'Requirements',
        'id' => CMB_PREFIX . 'area_requirements',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 10
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Sidebar Video',
        'id' => CMB_PREFIX . 'area_sidebar_video',
        'type' => 'text_url'
    ) );

    $all_tags = get_tags();
    $tag_options = array(
        '' => '-- None --'
    );
    foreach ( $all_tags as $tag ) {
        $tag_options[$tag->slug] = $tag->name;
    }
    $area_box->add_field( array(
        'name' => 'Post Tag',
        'id' => CMB_PREFIX . 'area_post_tag',
        'type' => 'select',
        'options' => $tag_options,
        'default' => get_cmb_value( 'area_post_tag' )
    ));


    $area_box->add_field( array(
        'name' => 'Overview Document URL',
        'id' => CMB_PREFIX . 'area_facebook',
        'type' => 'file'
    ) );
    $area_box->add_field( array(
        'name' => 'Career Tracks',
        'id' => CMB_PREFIX . 'area_tracks',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Unique Opportunities',
        'id' => CMB_PREFIX . 'area_opportunities',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Ensembles',
        'id' => CMB_PREFIX . 'area_ensembles',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Events',
        'id' => CMB_PREFIX . 'area_events',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Past Productions',
        'id' => CMB_PREFIX . 'area_productions',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Alumni Profiles',
        'id' => CMB_PREFIX . 'area_alumni',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Graduate Success',
        'id' => CMB_PREFIX . 'area_success',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Clinical Supervisors',
        'id' => CMB_PREFIX . 'area_supervisors',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Be a Teacher',
        'id' => CMB_PREFIX . 'area_teacher',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );

    
    // accordion metabox
    $tab_metabox = new_cmb2_box( array(
        'id' => 'tab_metabox',
        'title' => 'Tab Boxes',
        'desc' => 'Boxes of content that are accessed via tabs on the left column.',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tab_metabox_group = $tab_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tab',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Tab', 'cmb'),
            'remove_button' => __('Remove Tab', 'cmb'),
            'group_title'   => __( 'Tab {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );


    /*
    // area of interest information
    $tour_info_box = new_cmb2_box( array(
        'id' => 'tour_info',
        'title' => 'Main Tour Page Info',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-tour.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $tour_info_box->add_field( array(
        'name' => 'Background Image',
        'id' => CMB_PREFIX . 'tour_info_background_image',
        'type' => 'file'
    ) );
    $tour_info_box->add_field( array(
        'name' => 'Background Video',
        'id' => CMB_PREFIX . 'tour_info_background_video',
        'type' => 'file'
    ) );
    $tour_info_box->add_field( array(
        'name' => 'Mission Statement',
        'id' => CMB_PREFIX . 'tour_info_mission',
        'type' => 'wysiwyg',
        'options' => array (
            'textarea_rows' => 3
        )
    ) );



    // tour (about) metabox
    $tour_about_metabox = new_cmb2_box( array(
        'id' => 'tour_about_metabox',
        'title' => 'Tour (About)',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-tour.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tour_about_metabox_group = $tour_about_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tour_about',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Link', 'cmb'),
            'remove_button' => __('Remove Link', 'cmb'),
            'group_title'   => __( 'Link {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Video',
        'id'   => 'video',
        'desc' => 'Enter the video URL (from Vimeo/Youtube)',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Photo 1',
        'id'   => 'photo1',
        'desc' => 'Select a photo - photos will only be used if the video is not set.',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Caption 1',
        'id'   => 'caption1',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Photo 2',
        'id'   => 'photo2',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Caption 2',
        'id'   => 'caption2',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Photo 3',
        'id'   => 'photo3',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Caption 3',
        'id'   => 'caption3',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Photo 4',
        'id'   => 'photo4',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Caption 4',
        'id'   => 'caption4',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Photo 5',
        'id'   => 'photo5',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Caption 5',
        'id'   => 'caption5',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_about_metabox->add_group_field( $tour_about_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );



    // tour (academics) metabox
    $tour_academics_metabox = new_cmb2_box( array(
        'id' => 'tour_academics_metabox',
        'title' => 'Tour (Academics)',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-tour.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tour_academics_metabox_group = $tour_academics_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tour_academics',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Link', 'cmb'),
            'remove_button' => __('Remove Link', 'cmb'),
            'group_title'   => __( 'Link {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Video',
        'id'   => 'video',
        'desc' => 'Enter the video URL (from Vimeo/Youtube)',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Photo 1',
        'id'   => 'photo1',
        'desc' => 'Select a photo - photos will only be used if the video is not set.',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Caption 1',
        'id'   => 'caption1',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Photo 2',
        'id'   => 'photo2',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Caption 2',
        'id'   => 'caption2',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Photo 3',
        'id'   => 'photo3',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Caption 3',
        'id'   => 'caption3',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Photo 4',
        'id'   => 'photo4',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Caption 4',
        'id'   => 'caption4',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Photo 5',
        'id'   => 'photo5',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Caption 5',
        'id'   => 'caption5',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_academics_metabox->add_group_field( $tour_academics_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );



    // tour (student) metabox
    $tour_student_metabox = new_cmb2_box( array(
        'id' => 'tour_student_metabox',
        'title' => 'Tour (Student Life)',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-tour.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tour_student_metabox_group = $tour_student_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tour_student',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Link', 'cmb'),
            'remove_button' => __('Remove Link', 'cmb'),
            'group_title'   => __( 'Link {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Video',
        'id'   => 'video',
        'desc' => 'Enter the video URL (from Vimeo/Youtube)',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Photo 1',
        'id'   => 'photo1',
        'desc' => 'Select a photo - photos will only be used if the video is not set.',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Caption 1',
        'id'   => 'caption1',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Photo 2',
        'id'   => 'photo2',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Caption 2',
        'id'   => 'caption2',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Photo 3',
        'id'   => 'photo3',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Caption 3',
        'id'   => 'caption3',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Photo 4',
        'id'   => 'photo4',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Caption 4',
        'id'   => 'caption4',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Photo 5',
        'id'   => 'photo5',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Caption 5',
        'id'   => 'caption5',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_student_metabox->add_group_field( $tour_student_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );



    // tour (wellness) metabox
    $tour_wellness_metabox = new_cmb2_box( array(
        'id' => 'tour_wellness_metabox',
        'title' => 'Tour (Health & Wellness)',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-tour.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tour_wellness_metabox_group = $tour_wellness_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tour_wellness',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Link', 'cmb'),
            'remove_button' => __('Remove Link', 'cmb'),
            'group_title'   => __( 'Link {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Video',
        'id'   => 'video',
        'desc' => 'Enter the video URL (from Vimeo/Youtube)',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Photo 1',
        'id'   => 'photo1',
        'desc' => 'Select a photo - photos will only be used if the video is not set.',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Caption 1',
        'id'   => 'caption1',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Photo 2',
        'id'   => 'photo2',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Caption 2',
        'id'   => 'caption2',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Photo 3',
        'id'   => 'photo3',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Caption 3',
        'id'   => 'caption3',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Photo 4',
        'id'   => 'photo4',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Caption 4',
        'id'   => 'caption4',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Photo 5',
        'id'   => 'photo5',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Caption 5',
        'id'   => 'caption5',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_wellness_metabox->add_group_field( $tour_wellness_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );



    // tour (map) metabox
    $tour_map_metabox = new_cmb2_box( array(
        'id' => 'tour_map_metabox',
        'title' => 'Tour (Campus Map)',
        'object_types' => array( 'page' ), // Post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-tour.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tour_map_metabox_group = $tour_map_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tour_map',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Link', 'cmb'),
            'remove_button' => __('Remove Link', 'cmb'),
            'group_title'   => __( 'Link {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Video',
        'id'   => 'video',
        'desc' => 'Enter the video URL (from Vimeo/Youtube)',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Photo 1',
        'id'   => 'photo1',
        'desc' => 'Select a photo - photos will only be used if the video is not set.',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Caption 1',
        'id'   => 'caption1',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Photo 2',
        'id'   => 'photo2',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Caption 2',
        'id'   => 'caption2',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Photo 3',
        'id'   => 'photo3',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Caption 3',
        'id'   => 'caption3',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Photo 4',
        'id'   => 'photo4',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Caption 4',
        'id'   => 'caption4',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Photo 5',
        'id'   => 'photo5',
        'type' => 'file',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Caption 5',
        'id'   => 'caption5',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tour_map_metabox->add_group_field( $tour_map_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
            'textarea_rows' => 10
        )
    ) );

    

    // accordion metabox
    $phototiles = new_cmb2_box( array(
        'id' => 'phototiles_metabox',
        'title' => 'Photo Tiles',
        'desc' => 'A 4-column component with background images for each of 4 columns, colors, and text displaying for each.',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high'
    ) );

    $phototiles_group = $cmb->add_field( array(
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
        'id'   => 'subtitle',
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




	// showcase metabox
	$showcase = new_cmb2_box( array(
		'id' => 'showcase_metabox',
		'title' => 'Showcase',
		'object_type' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false // Show field names on the left
	) );

    $showcase->add_field( 
        array(
            'name'    => 'Slider Type',
            'description' => "Select the type of slider to display.",
            'id'      => $prefix . 'showcase-type',
            'type'    => 'radio_inline',
            'options' => array(
                'photo-large'   => __( 'Large Photo', 'cmb' ),
                'photo-medium'  => __( 'Medium Photo', 'cmb' ),
                'photo-small'   => __( 'Small Photo', 'cmb' ),
                'two-column'    => __( 'Two Column', 'cmb' ),
            ),
            'default' => 'photo-medium'
        )
    );
    
    $showcase_group = $cmb->add_field( array(
        'id' => $prefix . 'showcase',
        'type' => 'group',
        'description' => __('Add images/videos into a slider on any page.', 'cmb'),
        'options' => array(
            'add_button' => __('Add Slide', 'cmb'),
            'remove_button' => __('Remove Slide', 'cmb'),
            'sortable' => true, // beta
        )
    ) );

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Title',
			'description' => 'Enter a slide title.',
			'id'   => 'title',
			'type' => 'text',
		)
	);

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Subtitle',
			'description' => 'Enter the slide content.',
			'id'   => 'subtitle',
			'type' => 'wysiwyg',
		)
	);

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Link',
			'description' => 'Enter a slide link.',
			'id'   => 'link',
			'type' => 'text',
		)
	);

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Image/Video',
			'description' => 'Select an image or paste in a video URL.',
			'id'   => 'image',
			'type' => 'file',
			'preview_size' => array( 350, 150 )
		)
	);

	$showcase->add_group_field( $showcase_group, 
        array(
            'name' => 'Button Text',
            'description' => 'Enter button text for the call to action button. Leave empty for no button.',
            'id'   => 'button',
            'type' => 'text',
        )
	);
	*/


    /*
    global $states, $years;

    // area of interest information
    $alum_box = new_cmb2_box( array(
        'id' => 'alum_info',
        'title' => 'Alumnus Details',
        'object_types' => array( 'alum' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $alum_box->add_field( array(
        'name' => 'First Name',
        'id'   => $prefix . 'alum_name_first',
        'type' => 'text',
    ) );
    $alum_box->add_field( array(
        'name' => 'Last Name',
        'id'   => $prefix . 'alum_name_last',
        'type' => 'text',
    ) );
    $alum_box->add_field( array(
        'name' => 'Maiden Name',
        'id'   => $prefix . 'alum_name_maiden',
        'type' => 'text',
    ) );
    $alum_box->add_field( array(
        'name' => 'City',
        'id'   => $prefix . 'alum_city',
        'type' => 'text',
    ) );
    $alum_box->add_field( array(
        'name' => 'State',
        'id'   => $prefix . 'alum_state',
        'type' => 'select',
        'options' => $states,
        'default' => 0
    ) );
    $alum_box->add_field( array(
        'name' => 'Email',
        'id'   => $prefix . 'alum_email',
        'type' => 'text_email',
    ) );
    $alum_box->add_field( array(
        'name' => 'Type of Update',
        'id'   => $prefix . 'alum_category',
        'type' => 'select',
        'options' => array(
            'class-letter' => 'Class Letter',
            'obituary' => 'Obituary',
            'news' => 'News',
            'sightings' => 'Sightings'
        ),
        'default' => 'personal'
    ) );
    /*
    $alum_box->add_field( array(
        'name' => 'Status',
        'id'   => $prefix . 'alum_status',
        'type' => 'select',
        'options' => array(
            'alive' => 'Alive',
            'deceased' => 'Deceased',
        ),
        'default' => 'alive'
    ) );
    $alum_box->add_field( array(
        'name' => 'Class Year',
        'id'   => $prefix . 'alum_year',
        'type' => 'select',
        'options' => $years,
        'default' => date( 'Y' )
    ) );
    $alum_box->add_field( array(
        'name' => 'Submitted By',
        'id'   => $prefix . 'alum_submitter',
        'type' => 'text',
    ) );




    // year information
    $year_box = new_cmb2_box( array(
        'id' => 'year_info',
        'title' => 'Class Year Details',
        'object_types' => array( 'yr' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $year_box->add_field( array(
        'name' => 'President',
        'id'   => $prefix . 'year_president',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Graduation Date',
        'id'   => $prefix . 'year_grad_date',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Graduating Seniors',
        'id'   => $prefix . 'year_grad_seniors',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Commencement Theme',
        'id'   => $prefix . 'year_commencement_theme',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Commencement Speakers',
        'id'   => $prefix . 'year_commencement_speakers',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Honorary Degree Recipient(s)',
        'id'   => $prefix . 'year_honorary_degrees',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Medal of Merit Recipient(s)',
        'id'   => $prefix . 'year_medal',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent (1)',
        'id'   => $prefix . 'year_agent_current_name',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent Email (1)',
        'id'   => $prefix . 'year_agent_current_email',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent (2)',
        'id'   => $prefix . 'year_agent_current_name_2',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent Email (2)',
        'id'   => $prefix . 'year_agent_current_email_2',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent (3)',
        'id'   => $prefix . 'year_agent_current_name_3',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent Email (3)',
        'id'   => $prefix . 'year_agent_current_email_3',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent (4)',
        'id'   => $prefix . 'year_agent_current_name_4',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Current Class Agent Email (4)',
        'id'   => $prefix . 'year_agent_current_email_4',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Former Class Agent',
        'id'   => $prefix . 'year_agent_former_name',
        'type' => 'text',
    ) );
    $year_box->add_field( array(
        'name' => 'Has Memory Book',
        'id' => $prefix . 'year_memory',
        'type' => 'checkbox'
    ) );
    $year_box->add_field( array(
        'name' => 'Has Green List',
        'id' => $prefix . 'year_green',
        'type' => 'checkbox'
    ) );
    $year_box->add_field( array(
        'name' => 'Reunion Memory Book PDF (50th)',
        'id' => $prefix . 'year_memory_50',
        'type' => 'file',
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Reunion Memory Book PDF (40th)',
        'id' => $prefix . 'year_memory_40',
        'type' => 'file',
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Reunion Memory Book PDF (35th)',
        'id' => $prefix . 'year_memory_35',
        'type' => 'file',
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Reunion Memory Book PDF (25th)',
        'id' => $prefix . 'year_memory_25',
        'type' => 'file',
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Reunion Memory Book PDF (10th)',
        'id' => $prefix . 'year_memory_10',
        'type' => 'file',
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Reunion Photo',
        'id' => $prefix . 'year_photo_reunion',
        'type' => 'file',
        'query_args' => array(
            'type' => 'image/jpeg',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Archived Class Letters PDF (10th)',
        'id' => $prefix . 'year_letters',
        'type' => 'file',
        'query_args' => array(
            'type' => 'application/pdf',
        ),
        'preview_size' => 'small',
    ) );
    $year_box->add_field( array(
        'name' => 'Facebook Page',
        'id'   => $prefix . 'year_facebook',
        'type' => 'text',
    ) );
    */

}




// get CMB value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}





?>