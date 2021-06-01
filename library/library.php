<?php


// get library hours and open status
function get_library_hours() {

	// select the times for each day, and do a little formatting
	$times = array(
		'monday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_monday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_monday_close" ) )
		),
		'tuesday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_tuesday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_tuesday_close" ) )
		),
		'wednesday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_wednesday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_wednesday_close" ) )
		),
		'thursday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_thursday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_thursday_close" ) )
		),
		'friday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_friday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_friday_close" ) )
		),
		'saturday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_saturday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_saturday_close" ) )
		),
		'sunday' => array(
			'open' => str_replace( ':00', '', get_cmb_value( "hr_sunday_open" ) ),
			'close' => str_replace( ':00', '', get_cmb_value( "hr_sunday_close" ) )
		)
	);


	// get current day and a timestamp
	$date = new DateTime( date_default_timezone_get() );

	$current_timestamp = $date->getTimestamp();
	$current_day = strtolower( date( 'l' ) );

	// get the open datetime as a strong and convert to timestamp
	$today_open_string = date( "m/d/Y", $current_timestamp ) . " " . $times[$current_day]['open'];
	$today_open_timestamp = strtotime( $today_open_string );
	
	// get the closing datetime as a string and convert to timestamp
	$today_close_string = date( "m/d/Y", $current_timestamp ) . " " . $times[$current_day]['close'];
	$today_close_timestamp = strtotime( $today_close_string );

	// is_open boolean
	$is_open = ( $current_timestamp > $today_open_timestamp && $current_timestamp < $today_close_timestamp ? true : false );

    print $current_timestamp . ' ' . $today_open_timestamp;

	// a human-readable status for open/close
	$status = ( $is_open ? 'open' : 'closed' );

	return array(
		'hours' => $times,
		'current_timestamp' => $current_timestamp,
		'current_day' => $current_day,
		'today_open_timestamp' => $today_open_timestamp,
		'today_open_string' => $today_open_string,
		'today_close_timestamp' => $today_close_timestamp,
		'today_close_string' => $today_close_string,
		'is_open' => $is_open,
		'status' => $status
	);

}



// metabox for library page
add_action( 'cmb2_admin_init', 'cmb2_library_metaboxes' );
function cmb2_library_metaboxes() {

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
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Monday Close',
        'id'   => CMB_PREFIX . 'hr_monday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Tuesday Open',
        'id'   => CMB_PREFIX . 'hr_tuesday_open',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Tuesday Close',
        'id'   => CMB_PREFIX . 'hr_tuesday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Wednesday Open',
        'id'   => CMB_PREFIX . 'hr_wednesday_open',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Wednesday Close',
        'id'   => CMB_PREFIX . 'hr_wednesday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Thursday Open',
        'id'   => CMB_PREFIX . 'hr_thursday_open',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Thursday Close',
        'id'   => CMB_PREFIX . 'hr_thursday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Friday Open',
        'id'   => CMB_PREFIX . 'hr_friday_open',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Friday Close',
        'id'   => CMB_PREFIX . 'hr_friday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Saturday Open',
        'id'   => CMB_PREFIX . 'hr_saturday_open',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Saturday Close',
        'id'   => CMB_PREFIX . 'hr_saturday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Sunday Open',
        'id'   => CMB_PREFIX . 'hr_sunday_open',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );
    $libhrs_box->add_field( array(
        'name' => 'Sunday Close',
        'id'   => CMB_PREFIX . 'hr_sunday_close',
        'type' => 'text_time',
        'time_format' => 'g:ia',
    ) );

}


