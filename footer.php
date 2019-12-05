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
	<!-- Starting Point of Custom Footer Widget Area -->
	
	<footer id="widget_area" class="site-footer">
			<div class="site-info">
				<div class="footer-widget-area">
					<div class="container">
						<div class="row" >
							<div class="col-3 footer-area-1">
								<h4>Latest news</h4>
								<div class="dashed" id="latest_news">
									<?php
									if(is_active_sidebar('primary')){
									dynamic_sidebar('primary');
									}
									?>
								</div>
							</div><!-- .footer-widget-area-1 -->
							<div class="col-3 footer-area-2">
							<h4>Recent Project</h4>
								<div class="dashed" id="recent_projects">
									<?php
									if(is_active_sidebar('secondary')){
									dynamic_sidebar('secondary');
									}
									?>
								</div>
							</div><!-- .footer-widget-area-2 -->
							<div class="col-3 footer-area-3">
							<h4>Stay in touch</h4>
								<div class="dashed" id="stay_in_touch">
									<?php
										require_once('lib/inc/socialmedia-widget.php');
										if(is_active_sidebar('ternary')){
										dynamic_sidebar('ternary');
									}
									?>
								</div>
							</div><!-- .footer-widget-area-3 -->
							<div class="col-3 footer-area-4">
							<h4>Security and Privacy</h4>
								<div class="dashed" id="security">
									<?php
									if(is_active_sidebar('security')){
									dynamic_sidebar('security');
									}
									?>
								</div>
							</div><!-- .footer-widget-area-4 -->  
						</div><!-- .row -->
					</div><!-- .container-->
				</div><!-- .footer-widget-area -->
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

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
							<?php dynamic_sidebar( 'footerlogo' ); ?>
					</aside><!-- #touch 3-->
				</div>
			</div>
		</div>
	</div>						
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
