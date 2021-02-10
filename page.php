<?php

get_header();


// determine template to use
if ( has_cmb_value( 'menu_primary' ) ) {
	get_template_part( 'parts/two-column' );
} else {
	get_template_part( 'parts/single' );
}


// out[ut the calls to action]
the_call_to_action();


get_footer();

