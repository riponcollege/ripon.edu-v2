<?php


function alum_attendees() {
	
	$sorting = array(
		'key' => '43.6',
		'direction' => 'ASC',
		'is_numeric' => false
	);

	$paging = array( 
		'page_size' => 400
	);

	$entries = GFAPI::get_entries( 261, null, $sorting, $paging );

	// return print_r( $entries, 1 );

	$attendee_list = '<ul class="alum-attendees">';

	foreach ( $entries as $entry ) {
		if ( $entry[120] == 'Yes' ) {
			$attendee_list .= '<li><strong>' . $entry['43.6'] . ', ' . $entry['43.3'] . '</strong> (' . $entry['44'] . ')' . ( !empty( $entry['103.3'] ) ? '<br>w/ ' . $entry['103.6'] . ', ' . $entry['103.3'] . ( !empty( $entry['104'] ) ? ' (' . $entry['104'] . ') ' : '' ) : '' ) . '</li>';
		}
	}

	$attendee_list .= "</ul>";

	return $attendee_list;

}
add_shortcode( 'alum-attendees', 'alum_attendees' );

