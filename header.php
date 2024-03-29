<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rtcamp_assignment
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="site-branding">
					<?php
						// No Custom Logo, just display the default logo
			if (!has_custom_logo()) {
				?>
				<div class=default-logo>
					<h1> <a href="#"> <img src="<?php bloginfo( 'template_directory' ) ?>/lib/Slices/logo.png" alt="logo"/>  </a> </h1>
				</div>
				<?php
				
			}else{
				the_custom_logo();
			}
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
					</div><!-- .site-branding -->
				</div>
				<!-- This is a WordPress 3.0 Menu. It is a 2 level menu -->
				<div class="col-md-8">
				<nav class="navbar navbar-expand-lg navbar-light">	
					<div id="site-navigation" class="main-navigation">
						<div class="menu-main_menu-container">
							<button class="navbar-toggler" aria-controls="primary-menu" data-target="primary-menu" aria-expanded="false">   
								 <span class="navbar-toggler-icon"><?php esc_html_e( '-', '_s' ); ?></span></button>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								) );
							?>
						</div>
					</div>
				</nav>
				</div><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
