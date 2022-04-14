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
<link href="<?php bloginfo( "template_url" ) ?>/css/main.css?v=280" rel="stylesheet" type="text/css">

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

<?php if ( is_ripon() ) { ?>
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
<?php } ?>

<?php if ( is_alumni() ) { ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YVD4XWQ2P3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-YVD4XWQ2P3');
</script>
<?php } ?>

<!-- simpli.fi pixel -->
<script async src='https://tag.simpli.fi/sifitag/cc2c15f0-40d8-013a-4f92-06abc14c0bc6'></script>
<!-- end simpli.fi pixel -->

<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

</head>
<body <?php body_class(); ?>>
<?php if ( is_ripon() ) { ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Q9X26"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php } ?>
<?php if ( is_events() ) { ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VCS5HW7JEF"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-VCS5HW7JEF');
</script>
<?php } ?>

<div class="menu-pane pane">
	<button class="close">Close</button>

	<?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_class' => 'nav-menu main-menu' ) ); ?>

	<div class="menu-aux">
		<?php if ( !is_alumni() ) { ?>
		<div class="info-for">
			<h4>Information For</h4>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-info', 'menu_class' => 'nav-menu' ) ); ?>
		</div>
		<?php } ?>

		<div class="buttons">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-buttons', 'menu_class' => 'nav-menu' ) ); ?>
		</div>
	</div>
</div>
<div class="search-pane pane">
	<button class="close">Close</button>

	<div class="search-form"><?php print get_search_form(); ?></div>

	<h4>Popular Searches</h4>
	<div class="popular-searches">
		<?php wp_nav_menu( array( 'theme_location' => 'search-popular', 'menu_class' => 'nav-menu' ) ); ?>
	</div>
</div>
<div class="menu-photo"></div>
<div class="container">
	<?php 
	if ( has_video_showcase() ) { 
		the_video_showcase();
	} else { ?>
	<header>

		<div class="logo">
			<a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php bloginfo( "template_url" ) ?>/img/logo.webp" alt="<?php bloginfo( 'name' ); ?>">
			</a>
		</div>

		<div class="slogan">
			<?php bloginfo('description'); ?>
		</div>

		<button class="menu-show">menu</button>

		<button class="search-show">search</button>

		<div class="buttons">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-buttons', 'menu_class' => 'nav-menu' ) ); ?>
		</div>

	</header>
		<?php 
		the_emergency_bar();
	} 
	?>

	<?php do_action( 'after_header' ); ?>

	<section class="content">
		<?php do_action( 'before_content' ); ?>
		