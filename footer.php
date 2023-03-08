<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	
		</section>
		
		<?php do_action( 'before_footer' ); ?>
	
		<footer>
			
			<div class="address">
				<?php if ( is_alumni() ) { ?>
				<strong>Ripon College</strong><br>
				300 W. Seward St. | Ripon, WI 54971<br>
				920-748-8126 | <a href="mailto:alumni@ripon.edu">alumni@ripon.edu</a>
				<?php } else { ?>
				<strong>Ripon College</strong><br>
				300 W. Seward St.<br>
				Ripon, WI 54971
				<?php } ?>
			</div>

			<?php if ( !has_call_to_action() ) { ?>
			<a href="#top" class="btn back-to-top">^</a>
			<?php } ?>

			<div class="social">
				<?php if ( !is_alumni() && !is_events() ) { ?>
				<a href="tel:9207488115"><img src="<?php bloginfo('template_url') ?>/img/social-phone.webp"></a>
				<a href="mailto:adminfo@ripon.edu"><img src="<?php bloginfo('template_url') ?>/img/social-email.webp"></a>
				<?php } ?>
				<?php if ( is_events() ) { ?>
				<a href="tel:9207488164"><img src="<?php bloginfo('template_url') ?>/img/social-phone.webp"></a>
				<a href="mailto:conferenceservices@ripon.edu"><img src="<?php bloginfo('template_url') ?>/img/social-email.webp"></a>
				<a href="http://www.facebook.com/RCConferences"><img src="<?php bloginfo('template_url') ?>/img/social-facebook.webp"></a>
				<a href="http://instagram.com/rcconferences"><img src="<?php bloginfo('template_url') ?>/img/social-instagram.webp"></a>
				<?php } else { ?>
				<a href="http://www.facebook.com/ripon.college"><img src="<?php bloginfo('template_url') ?>/img/social-facebook.webp"></a>
				<a href="http://www.linkedin.com/groups?home=&gid=4646327&trk=anet_ug_hm"><img src="<?php bloginfo('template_url') ?>/img/social-linkedin.webp"></a>
				<a href="https://twitter.com/riponcollege"><img src="<?php bloginfo('template_url') ?>/img/social-twitter.webp"></a>
				<a href="http://www.youtube.com/riponcollegevideo"><img src="<?php bloginfo('template_url') ?>/img/social-youtube.webp"></a>
				<a href="http://instagram.com/riponcollege"><img src="<?php bloginfo('template_url') ?>/img/social-instagram.webp"></a>
				<?php } ?>
				<div style="clear:both"></div>
			</div>

			<div class="colophon">
				Copyright &copy; <?php print date('Y'); ?>. All Rights Reserved. <a href="/privacy-policy">Privacy Policy</a>.
			</div>
		</footer>

	</div><!-- #page -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script async="async" src="https://apply.ripon.edu/ping"></script>
<script async="async" defer="defer" src="https://www.youvisit.com/tour/Embed/js3" type="text/javascript"></script>
</body>
</html>