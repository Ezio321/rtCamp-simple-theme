
<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<div class="site-branding sticky-header">
	<?php
	$bannerBackground = get_theme_file_uri('/images/body-map-927x300.jpg');
	?>
	
	<div class="wrapper site-branding--wrapper" style='background-image: url(<?php echo $bannerBackground ?>);'>
		<div class="container--narrow" >
		<?php	
			if (ot_get_option('header_logo')) { 
				?>
				<div class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo (ot_get_option('header_logo')); ?>"></a></div>
				<?php
			} else {
			 
			if ( has_custom_logo() ) {  ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			
			<?php } 
		} ?>
		<?php $blog_info = get_bloginfo( 'name' ); ?>

		<?php if ( ! empty( $blog_info ) ) : ?>
			<div class="site-title--container">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			<?php endif; ?>
		</div> <!-- site-title--container-->
		<?php endif; ?>

		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description">
					<?php echo $description; ?>
				</p>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'topNav' ) ) : ?>
	    <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
	    <div class="site-header">
	    <div class="site-header__menu group">
	      <nav id="site-navigation" class="main-navigation " aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
	        
	        <?php
	        wp_nav_menu(
	          array(
	            'theme_location' => 'topNav',
	            'menu_class'     => 'min-list group main-menu',
	            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	          )
	        );
	        ?>
	      </nav><!-- #site-navigation -->
	   
	    </div> <!-- site-header__menu-content-->
	</div>
	  <?php endif; ?>
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_class'     => 'social-links-menu',
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>
	</div> <!-- container-->	
</div> <!--wrapper -->
</div><!-- .site-branding -->
<div class="sticky-header-trigger"></div>