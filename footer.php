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
	
	<div class="container custom-sidebar" id="widget_area">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>Latest news</h4>
					<div class="dashed">
						<aside id="sidebar-primary" class="sidebar">
							<?php dynamic_sidebar( 'primary' ); ?>
						</aside><!-- #news -->
					</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Recent Projects</h4>
					<div class="dashed" id="recent_projects">
						<aside id="sidebar-secondary" class="sidebar">
							<?php 
							dynamic_sidebar( 'secondary' ); ?>
						</aside><!-- #projects -->
					</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Stay in Touch</h4>
					<div class="dashed" id="stay_in_touch">
						<aside id="sidebar-ternary" class="sidebar">
						
							<?php require_once('lib/inc/socialmedia-widget.php'); 
							dynamic_sidebar( 'ternary' ); ?>
						</aside><!-- Social Media Profile -->
					</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Security & Privacy</h4>
					<div class="dashed" id="security">
					<?php 
							dynamic_sidebar( 'security' ); ?>	
					</div>
			</div>
		</div>
	</div>
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
