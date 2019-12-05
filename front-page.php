<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rtcamp_assignment
 */

get_header();
?>
	<div class="covercarousel">
			<div class="container">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li><br/>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li><br/>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li><br/>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
				<img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_one_setting'));?>" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<div class="cover">
						<h3 class="post_title"><?php echo get_theme_mod('featured_image_one_title');?></h3>
						<p class="post_content"><?php echo get_theme_mod('features_post_content_one');?></p>
					</div>
				</div>
				</div>
				<div class="carousel-item">
				<img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_two_setting'));?>" alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
				<div class="cover">
					<h3 class="post_title"><?php echo get_theme_mod('featured_image_two_title');?></h3>
					<p class="post_content"><?php echo get_theme_mod('features_post_content_two');?></p>
				</div>
				</div>
				</div>
				<div class="carousel-item">
				<img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_three_setting'));?>" alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
				<div class="cover">
					<h3 class="post_title"><?php echo get_theme_mod('featured_image_three_title');?></h3>
					<p class="post_content"><?php echo get_theme_mod('features_post_content_three');?></p>
				</div>
				</div>
				</div>
				<div class="carousel-item">
				<img class="d-block img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('featured_post_image_four_setting'));?>" alt="Fourth slide">
				<div class="carousel-caption d-none d-md-block">
				<div class="cover">
					<h3 class="post_title"><?php echo get_theme_mod('featured_image_four_title');?></h3>
					<p class="post_content"><?php echo get_theme_mod('features_post_content_four');?></p>
				</div>
				</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				
				<span class="sr-only">Next</span>
			</a>
			</div>
			</div>
			</div>

		
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

                <div class="container child-pages-container">
				<div class="row">
					<div class="col-md-3 col-4-pad">
					<div class="button-container">	
					  <button class="buttonlinks" onmouseover="Page(event, 'Page1')" onClick="Page(event, 'Page1')" id="default">FINDING</button>
					  <button class="buttonlinks" onmouseover="Page(event, 'Page2')">PROMOTIONAL ACTIVITIES</button>
					  <button class="buttonlinks" onmouseover="Page(event, 'Page3')">ENVIRONMENT</button>
					</div>
					</div>

					<div id="Page1" class="col-md-9 tabcontent">
					<?php 
							$wp_query = new WP_Query();
							$all_pages = $wp_query->query(array(
								'post_type' => 'page',
								'posts_per_page' => '-1',
							));
							if(get_page_title_for_slug('FINDING') == FALSE ) {
								?>
									<div class="notice">
										<p> Create  a page with title FINDING </p>
									</div>
								<?php
							}
							else{
							$Home_finding = get_page_by_title( 'FINDING');
							$child_pages = get_page_children($Home_finding->ID, $all_pages);

							foreach ( $child_pages as $pages ){
								$page_id    = $pages->ID;
								$page_link  = get_permalink( $page_id );
								$page_img   = get_the_post_thumbnail( $page_id, 'medium' ); 
								$page_title = $pages->post_title;
								$page_excerpt = $pages->post_excerpt; 
						?>
						<div class="col-md-4 child-pages-box-right">  
							<a class="featured-post-title simple-link" href="<?php echo $page_link; ?>">
								<?php echo $page_img; ?>
	                 	      	<p class="featured-post-title simple-link"><?php echo $page_title; ?></p>
								<br/>
	                 	      	<p class="post-excerpt"><?php echo $page_excerpt; ?></p>
	                       	</a>
						</div>	
						<?php }
							}
						?>
					</div>
					

					<div id="Page2" class="col-md-9 tabcontent">
					<?php 
							$wp_query = new WP_Query();
							$all_pages = $wp_query->query(array(
								'post_type' => 'page',
								'posts_per_page' => '-1',
							));
							if(get_page_title_for_slug(' PROMOTIONAL ACTIVITIES ') == FALSE ) {
								?>
									<div class="notice">
										<p> Create  a page with title ENVIORNMENT </p>
									</div>
								<?php
							}
							else{
							$Home_finding = get_page_by_title( 'PROMOTIONAL ACTIVITIES');
							$child_pages = get_page_children($Home_finding->ID, $all_pages);

							foreach ( $child_pages as $pages ){
								$page_id    = $pages->ID;
								$page_link  = get_permalink( $page_id );
								$page_img   = get_the_post_thumbnail( $page_id, 'medium' ); 
								$page_title = $pages->post_title;
								$page_excerpt = $pages->post_excerpt; 
						?>
						<div class="col-md-4 child-pages-box-right">  
							<a class="featured-post-title simple-link" href="<?php echo $page_link; ?>">
								<?php echo $page_img; ?>
	                 	      	<p class="featured-post-title simple-link"><?php echo $page_title; ?></p>
								<br/>
	                 	      	<p class="post-excerpt"><?php echo $page_excerpt; ?></p>
	                       	</a>
						</div>	
						<?php }
							}
						?>
                    </div>

					<div id="Page3" class="col-md-9 tabcontent">
					<?php 
							$wp_query = new WP_Query();
							$all_pages = $wp_query->query(array(
								'post_type' => 'page',
								'posts_per_page' => '-1',
							));
							if(get_page_title_for_slug(' ENVIORNMENT ') == FALSE ) {
								?>
									<div class="notice">
										<p> Create  a page with title ENVIORNMENT </p>
									</div>
								<?php
							}
							else{
							$Home_finding = get_page_by_title( 'ENVIORNMENT');
							$child_pages = get_page_children($Home_finding->ID, $all_pages);

							foreach ( $child_pages as $pages ){
								$page_id    = $pages->ID;
								$page_link  = get_permalink( $page_id );
								$page_img   = get_the_post_thumbnail( $page_id, 'medium' ); 
								$page_title = $pages->post_title;
								$page_excerpt = $pages->post_excerpt; 
						?>
						<div class="col-md-4 child-pages-box-right">  
							<a class="featured-post-title simple-link" href="<?php echo $page_link; ?>">
								<?php echo $page_img; ?>
	                 	      	<p class="featured-post-title simple-link"><?php echo $page_title; ?></p>
								<br/>
	                 	      	<p class="post-excerpt"><?php echo $page_excerpt; ?></p>
	                       	</a>
						</div>	
						<?php }
							}
						?>
                    </div>
				
				<div class="clearclass">
				</div>
				</div>
		    </div>
	
            <script>
function Page(evt, PageName) {
    var i, tabcontent, buttonlinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    buttonlinks = document.getElementsByClassName("buttonlinks");
    for (i = 0; i < buttonlinks.length; i++) {
        buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
    }
    document.getElementById(PageName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="default" and click on it
document.getElementById("default").click();
</script>
				</main><!-- #main -->
			</div><!-- #primary -->
			<hr>
<?php
get_sidebar();
get_footer();
