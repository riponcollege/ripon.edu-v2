<?php

function sharethis_shortcode() {
	return '<div class="sharethis-inline-share-buttons"></div>';
}
add_shortcode('sharethis_buttons', 'sharethis_shortcode');

