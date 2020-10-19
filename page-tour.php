<?php

/*
Template Name: Tour
*/

?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?> Ripon College</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<?php if ( is_search() ) { ?><meta name="robots" content="noindex" /><?php } ?>
<link href="<?php bloginfo( "template_url" ) ?>/css/main.css?v=162" rel="stylesheet" type="text/css">

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '737054459766387'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=737054459766387&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Start Google Analytics Universal Tracking Code -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37190446-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('require', 'GTM-WT6LM9H');
gtag('config', 'UA-37190446-2');
</script>
<!-- End Analytics Code -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5Q9X26');</script>
<!-- End Google Tag Manager -->

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Q9X26"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>

	<div class="wrap">

		<div class="logo">
			<a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php bloginfo( "template_url" ) ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>">
			</a>
		</div>

		<div class="main-menus">
			<?php wp_nav_menu( array( 'theme_location' => 'tour', 'menu_class' => 'aux-menu' ) ); ?>
		</div>
		

		<div class="translate">
			<div id="google_translate_element"></div><script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-37190446-2'}, 'google_translate_element');
			}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		</div>

	</div>

</header>

<section class="content">

<?php 

// get all the tour box links
$tour_about = get_cmb2_value( 'tour_about' );
$tour_academics = get_cmb2_value( 'tour_academics' );
$tour_student = get_cmb2_value( 'tour_student' );
$tour_wellness = get_cmb2_value( 'tour_wellness' );
$tour_map = get_cmb2_value( 'tour_map' );

$tour_background_image = get_cmb2_value( 'tour_info_background_image' );
$tour_background_video = get_cmb2_value( 'tour_info_background_video' );


function do_section( $section_label, $tour ) {
	if ( !empty( $tour ) ) { ?>
		<ul>
		<?php foreach ( $tour as $key => $link ) { ?>
			<li><a class="show-video <?php print $section_label; ?>-<?php print $key ?>"><?php print $link['title']; ?></a></li>
		<?php } ?>
		</ul>
		<?php 
	}
}

function do_section_videos( $section_label, $tour ) {
	if ( !empty( $tour ) ) {
			foreach ( $tour as $key => $link ) {
				?>
		<div class="section-video <?php print $section_label; ?>-<?php print $key ?>">
			<a class="section-close">Back to Tour Home</a>
			<div class="video">
				<?php
				if ( !empty( $link['video'] ) ) {
					print apply_filters( 'the_content', $link['video'] );
				} else if ( !empty( $link['photo1'] ) ) {
					print "<div class='photo'><img src='" . $link['photo1'] . "' alt='" . $link['title'] . "'>
						<div class='photo-caption'>" . $link['caption1'] . "</div></div>";
					if ( !empty( $link['photo2']) ) {
						print "<div class='photo'><img src='" . $link['photo2'] . "' alt='" . $link['title'] . "'>
							<div class='photo-caption'>" . $link['caption2'] . "</div></div>";
					}
					if ( !empty( $link['photo3']) ) {
						print "<div class='photo'><img src='" . $link['photo3'] . "' alt='" . $link['title'] . "'>
							<div class='photo-caption'>" . $link['caption3'] . "</div></div>";
					}
					if ( !empty( $link['photo4']) ) {
						print "<div class='photo'><img src='" . $link['photo4'] . "' alt='" . $link['title'] . "'>
							<div class='photo-caption'>" . $link['caption4'] . "</div></div>";
					}
					if ( !empty( $link['photo5']) ) {
						print "<div class='photo'><img src='" . $link['photo5'] . "' alt='" . $link['title'] . "'>
							<div class='photo-caption'>" . $link['caption5'] . "</div></div>";
					}
					if ( !empty( $link['photo1'] ) && !empty( $link['photo2'] ) ) print "<a class='prev-photo'>&laquo;</a><a class='next-photo'>&raquo;</a>";
				}
				?>
			</div>
			<div class="caption">
				<h3><?php print $link['title'] ?></h3>
				<div class="caption-inner">
					<?php print apply_filters( 'the_content', $link['content'] ); ?>
				</div>
			</div>
		</div>
			<?php 
		}
	}
}

?>
	
	<div class="tour"<?php print ( !empty( $tour_background_image ) ? ' style="background-image: url(' . $tour_background_image . ')"' : '' ) ?>>
		
		<?php if ( !empty( $tour_background_video) ) { ?>
		<video autoplay muted loop class="tour-background"><source src="https://www.ripon.edu/wp-content/uploads/2018/11/Website-Background-General-720.mp4" type="video/mp4"></video>
		<?php } ?>

		<div class="tour-sections">
			<div class="section about">
				<a class="handle">About Ripon</a>
				<div class="links">
					<?php do_section( 'about', $tour_about ); ?>
				</div>
			</div>

			<div class="section academics">
				<a class="handle">Academics</a>
				<div class="links">
					<?php do_section( 'academics', $tour_academics ); ?>
				</div>
			</div>

			<div class="section student">
				<a class="handle">Student Life</a>
				<div class="links">
					<?php do_section( 'student', $tour_student ); ?>
				</div>
			</div>

			<div class="section wellness">
				<a class="handle">Athletics</a>
				<div class="links">
					<?php do_section( 'wellness', $tour_wellness ); ?>
				</div>
			</div>

			<div class="section map">
				<a class="handle">Campus Map</a>
				<div class="links">
					<?php do_section( 'map', $tour_map ); ?>
				</div>
			</div>
		</div>

		<?php if ( has_cmb2_value( 'tour_info_mission' ) ) { ?>
		<div class="tour-mission">
			<strong>Our Mission:</strong> <?php show_cmb2_value( 'tour_info_mission' ); ?>
		</div>
		<?php } ?>

		<div class="tour-videos">
			<?php do_section_videos( 'about', $tour_about ); ?>
			<?php do_section_videos( 'academics', $tour_academics ); ?>
			<?php do_section_videos( 'student', $tour_student ); ?>
			<?php do_section_videos( 'wellness', $tour_wellness ); ?>
			<?php do_section_videos( 'map', $tour_map ); ?>
		</div>

	</div>


<?php 

get_footer(); 

?>