<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package juancarloswebsites
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'juancarloswebsites' ); ?></a>

	<header id="masthead" class="site-header">
		<?php
		if ( get_theme_mod( 'enable_topbar' ) ) : ?>
			<div class="row topbar-notice" style="background:<?php echo get_theme_mod( 'topbar_color', '#000' ); ?>;">
				<div class="col col-12">
					<span class="topbar-message-text"><?php echo get_theme_mod( 'topbar_message', 'Please set notice in customizer.' ); ?> </span>
				</div><!-- col col-12 -->
			</div><!-- topbar-notice -->
		<?php endif; ?>
		<div class="row brand-nav-bar site-contianer">
			<div class="col col-10 col-lg-3 branding">
				<div class="site-branding">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php
					$apera_bags_description = get_bloginfo( 'description', 'display' );
					if ( $apera_bags_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $apera_bags_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div> <!-- .col-4 -->

			<div class="col col-12 col-lg-9 div-nav">

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="hang-a-bur hang-a-bur-top"></span>
						<span class="hang-a-bur hang-a-bur-mid"></span>
						<span class="hang-a-bur hang-a-bur-bottom"></span>
					</button>
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'menu-primary',
						'menu_id'        		=> 'primary-menu',
						'menu_class'     => 'nav-menu',
					) );
					// wp_nav_menu( array(
					// 	'theme_location' 	=> 'menu-cart',
					// 	'menu_id'        	=> 'cart-menu-desktop',
					// 	'menu_class'        => 'wonka-cart-menu header-cart-menu d-none d-md-flex',
					// 	'items_wrap'      => '',
					// ) );
					?>
				</nav><!-- #site-navigation -->
			</div> <!-- .col-8 -->
		</div> <!-- .row -->
	</header><!-- #masthead -->

<div id="content" class="site-content">