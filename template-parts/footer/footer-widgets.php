<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<div class="wrapper off-white-background">
	<div class="container--narrow">

     <div class="row  row--equal-height-at-large ">

        <div class="row__medium-3 row--r-padding">
        	<h3 class="headline">Latest News</h3>
        	<hr />
        	<div class="site-footer__news">
			    
			        	 <?php
			      $news = new WP_Query(array(
			        'category_name' => 'news',
			        'posts_per_page' => 3,
			      ));

			      while ($news->have_posts()){
			      	?><p><?php
			        $news->the_post(); ?>
			        	<a href="<?php the_permalink()?>"><?php get_my_excerpt(array(18));?></a>
			        <?php } ?>
			    </p>
			</div>
        </div>
        
	    <div class="row__medium-3 row--r-padding site-footer__recent-projects">
	        
	        <?php 
	        if ( is_active_sidebar( 'custom-side-bar' ) ) :
				
				if ( is_active_sidebar( 'custom-side-bar' ) ) : 
				     dynamic_sidebar( 'custom-side-bar' ); 
				 endif; 
			endif;
				?>
	    </div>
        <div class="row__medium-3 row--r-padding site-footer__contact">
        	<h4 class="headline">Stay in Touch</h4>
        	<hr />
        	
			<?php 
	        if ( is_active_sidebar( 'social-side-bar' ) ) :
				
				if ( is_active_sidebar( 'social-side-bar' ) ) : 
				     dynamic_sidebar( 'social-side-bar' ); 
				 endif; 
			endif;
				?>
			
		</div> <!-- columnn 3 -->
			
		<div class="row__medium-3">
          <h4 class="headline">Security & Privacy</h4>
          <hr />
          <?php if ( has_nav_menu( 'privacy' ) ) : ?>
          	
          	<nav class="privacy-navigation" >
          		<?php
				wp_nav_menu(
					array(
						'theme_location' => 'privacy',
						'menu_class'     => 'min-list  group ',	
					)
				);
				?>
			</nav>
			<?php  endif; ?>
		</div> <!-- col 4 -->
		
	</div>  <!-- row -->
  </div>
</div>
