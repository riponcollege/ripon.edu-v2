<?php

/*
Template Name: Trustees
*/

get_header();

page_header();

?>

<div class="two-column">
	<div class="sidebar">
		<?php section_menu(); ?>
	</div>
	<div class="right-column">

		<?php 
		while ( have_posts() ) : the_post(); ?>
		
		<div class="entry-content">
			<?php the_content(); ?>
			<h2>Officers</h2>
			<?php
			// get the file contents
			$doc = file_get_contents( "https://my.ripon.edu/trustees/trustee_directory_external_officers_partial.php" );

			// replace image URLs so they're correct
			$doc = str_replace( './images/', 'https://my.ripon.edu/trustees/images/', $doc );

			print $doc;
			?>
			<hr>
			<h2>Members of the Board</h2>
			<?php
			// get the file contents
			$doc = file_get_contents( "https://my.ripon.edu/trustees/trustee_directory_external_members_partial.php" );

			// replace image URLs so they're correct
			$doc = str_replace( './images/', 'https://my.ripon.edu/trustees/images/', $doc );

			print $doc;
			?>
			<hr>
			<h2>Honorary Life Trustees</h2>
			<?php
			// get the file contents
			$doc = file_get_contents( "https://my.ripon.edu/trustees/trustee_directory_external_Honorary_partial.php" );

			// replace image URLs so they're correct
			$doc = str_replace( './images/', 'https://my.ripon.edu/trustees/images/', $doc );

			print $doc;
			?>
		</div>

			<?php
		endwhile; 
		?>

	</div>
</div>

<?php

get_footer();

?>