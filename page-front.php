<?php

/*
Template Name: Front
*/

get_header();

if ( !is_alumni() ) {
	?>
<div class="front-title first">
	<h2>Explore Ripon</h2>
</div>
	<?php 
	the_phototiles(); 
}
?>

<div class="front-title<?php print ( is_alumni() ? ' first' : '' ); ?>">
	<h2>News & Events</h2>
</div>
<div class="front-columns">
	<div class="front-articles">
		<?php 
		if ( is_alumni() ) {
			print do_shortcode( '[articles feed="https://ripon.edu/category/alumni/feed/" posts_per_page=4 /]' ); 
			?>
		<div class="buttons">
			<a href="https://ripon.edu/category/alumni" class="btn red-dark large">View All News</a>
		</div>
			<?php
		} else {
			print do_shortcode( '[articles /]' );
			?>
		<div class="buttons">
			<a href="/news" class="btn red-dark large">View All News</a>
		</div>
			<?php
		}
		?>
	</div>
	<div class="front-events">
		<?php print do_shortcode( '[events limit=4 /]' ); ?>
		<div class="buttons">
			<a href="/events" class="btn yellow large">View All Events</a>
		</div>
	</div>
</div>

<?php if ( is_alumni() ) { ?>
<div class="front-title">
	<h2>Subscribe</h2>
</div>
<?php the_content(); ?>
<?php } ?>

<?php

the_call_to_action();

get_footer();

