<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rtcamp_assignment
 */

?>
	</div><!-- #content -->
	<hr id="site-footer-hr">
	
	<div id="site-footer">
		<div class="container" >
			<div class="row">
				<div class="col-md-8">
				<nav id="site-navigation" class="main-navigation">
						<div class="bottomMenu">
						<?php wp_nav_menu( array(
										'theme_location' => 'menu-2',
										'menu_id'        => 'secondary-menu',
									) ); ?>  
						</div>
				</nav><!-- #site-navigation -->
					<footer id="colophon" class="container site-footer copyright-text">
						<div class="site-info">
							<?php
							echo get_theme_mod('footer_edit_setting');
							?>
						</div><!-- .site-info -->
					</footer><!-- #colophon -->
				</div>

				<div class="col-md-4 footer-logo">
					<aside id="sidebar-footerlogo" class="sidebar">
							<?php if ( is_active_sidebar( 'footerlogo' ) ) { ?>
   							     <?php dynamic_sidebar( 'footerlogo' ); ?>
							<?php }
								else{
							?>
								<div class=default-logo>
								<h1> <a href="#"> <img src="<?php bloginfo( 'template_directory' ) ?>/lib/Slices/footer-logo.png" alt="footerlogo"/>  </a> </h1>
								</div>
							<?php } ?>
					</aside><!-- #touch 3-->
				</div>
			</div>
		</div>
	</div>						
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
