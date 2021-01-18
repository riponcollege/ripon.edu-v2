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



    $args = array( 'post_type' => 'faculty', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' );
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



    // area of interest information
    $libhrs_box = new_cmb2_box( array(
        'id' => 'libhrs_info',
        'title' => 'Library Hours',
        'object_types' => array( 'page' ), // post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-library.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Monday Open',
        'id'   => CMB_PREFIX . 'hr_monday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Monday Close',
        'id'   => CMB_PREFIX . 'hr_monday_close',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Tuesday Open',
        'id'   => CMB_PREFIX . 'hr_tuesday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Tuesday Close',
        'id'   => CMB_PREFIX . 'hr_tuesday_close',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Wednesday Open',
        'id'   => CMB_PREFIX . 'hr_wednesday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Wednesday Close',
        'id'   => CMB_PREFIX . 'hr_wednesday_close',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Thursday Open',
        'id'   => CMB_PREFIX . 'hr_thursday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Thursday Close',
        'id'   => CMB_PREFIX . 'hr_thursday_close',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Friday Open',
        'id'   => CMB_PREFIX . 'hr_friday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Friday Close',
        'id'   => CMB_PREFIX . 'hr_friday_close',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Saturday Open',
        'id'   => CMB_PREFIX . 'hr_saturday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Saturday Close',
        'id'   => CMB_PREFIX . 'hr_saturday_close',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Sunday Open',
        'id'   => CMB_PREFIX . 'hr_sunday_open',
        'type' => 'text_time',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Sunday Close',
        'id'   => CMB_PREFIX . 'hr_sunday_close',
        'type' => 'text_time',
    ) );


    
    // accordion metabox
    $guide_metabox = new_cmb2_box( array(
        'id' => 'guide_metabox',
        'title' => 'Guide Librarian',
        'desc' => 'Select the librarian for this study guide.',
        'object_types' => array( 'page' ), // post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => 'page-guide.php'
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );
    $guide_metabox->add_field( array(
        'name' => 'Guide Librarian',
        'id'   => CMB_PREFIX . 'guide_librarian',
        'type' => 'select',
        'options' => $faculty,
    ) );


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