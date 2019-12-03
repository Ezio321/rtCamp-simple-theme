<div class="hero-slider hero-slider--equal-height">
     <?php 
        $homepageSlides = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'slick-slideshow'

        ));
        while ($homepageSlides->have_posts()){
          $homepageSlides->the_post(); ?>

          <div class="hero-slider__slide" style="background-image: url(<?php the_post_thumbnail_url('slideshow'); ?>)">
          <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
              
              <a href="<?php the_permalink(); ?>"><h2 class="headline headline--medium t-center"><?php the_title(); ?></h2></a>
              <p class="t-center">
                <?php
                get_my_excerpt(array(18));
                ?>
                </p>
              <div class="slick-dots--container"></div>
            </div>
          </div>
        </div> <!-- end hero-slider__slide-->
<?php } wp_reset_postdata();
        ?>
</div>

