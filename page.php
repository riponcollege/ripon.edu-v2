<?php

get_header();


if ( has_cmb_value( 'menu_primary' ) ) {
	get_template_part( 'parts/two-column' );
} else {
	get_template_part( 'parts/single' );
}


call_to_action();


get_footer();

