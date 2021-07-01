<?php

/*
Template Name: Map
*/

get_header();

?>
	<div class="content-wide">
		<?php the_content(); ?>
	</div>

	<div class="map">
	    <iframe src="https://cdn-map1.nucloud.com/nucloudmap/index.html?map=216" class="map-frame"></iframe>
	</div>

<?php 

get_footer(); 

?>