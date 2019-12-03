
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
<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rtcamp_assignment
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary 
