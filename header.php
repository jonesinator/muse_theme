<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<meta property="og:image" content='<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } else { echo get_template_directory_uri() . '/images/logo.png'; } ?>' />
	<meta property="og:description" content='<?php the_excerpt(); ?>' />
	<meta property="og:title" content='<?php the_title(); ?> – The Muse Collaborative' />
	<meta property="og:type" content="website" />
	<meta name="twitter:card" content="summary_large_image">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css?family=Archivo:400,400i,500,500i,700|Saira:300,600,700" rel="stylesheet">
	<link rel="icon" href="/favicon.ico">
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark mc-header">

		<?php if ( 'container' == $container ) : ?>
			<div class="container mc-header__container">
		<?php endif; ?>
				<h1 class="navbar-brand mb-0" style="display: none;"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if(get_field('root_page_banner')) : ?>
					<a href="/" class="mc-header__logo-link">
						<!-- Hide this logo on mobile -->
						<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'; ?>" class="d-none d-lg-block mc-header__logo" alt="The Muse Collaborative"/>
						<!-- Show this logo on mobile -->
						<img src="<?php echo get_template_directory_uri() . '/images/logo-mobile.svg'; ?>" class="d-block d-lg-none mc-header__logo" alt="The Muse Collaborative"/>
					</a>

				<?php else:  ?>
					<a href="/" class="mc-header__logo-link">
						<!-- Hide this logo on mobile -->
						<img src="<?php echo get_template_directory_uri() . '/images/logo-dark.svg'; ?>" class="d-none d-lg-block mc-header__logo" alt="The Muse Collaborative"/>
						<!-- Show this logo on mobile -->
						<img src="<?php echo get_template_directory_uri() . '/images/logo-mobile.svg'; ?>" class="d-block d-lg-none mc-header__logo" alt="The Muse Collaborative"/>
					</a>
				<?php endif;?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<div class="d-block navbar-collapse d-md-none">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'mobile',
							'container_class' => 'collapse mc-header__menu',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => '58',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
				<div class="d-none d-md-block">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse mc-header__menu',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>

			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

		<!-- ************Custom Banner Image Include ************ -->
		<?php
			$image = get_field('root_page_banner');
			if( !empty($image) ): ?>
				<div class="mc-banner-image" style="background-image: url(<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>)">
				</div>

		<!-- ************Custom Banner Image Overlay Include ************ -->
		<?php
			$image_overlay = get_field('root_page_banner_bottom_overlay');
			if(!empty($image_overlay)) : ?>
				<div class="mc-banner-image-bottom-border" style="background-image: url(<?php echo $image_overlay['url']; ?>)" alt="<?php echo $image_overlay['alt']; ?>">
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div><!-- .wrapper-navbar end -->
