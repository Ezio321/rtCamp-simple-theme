<?php
 
class News_widget extends WP_Widget {
 
  public function __construct() {
		$widget_ops = array(
			'classname'                   => 'news_entries',
			'description'                 => __( 'Your site&#8217;s news Posts.'),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'news-posts', __( 'News Posts'), $widget_ops );
		$this->alt_option_name = 'news_entries';
	}
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );
 
    public function widget( $args, $instance ) {
 
          if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
          }
          $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'News Posts');
          $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
          $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
          if ( ! $number ) {
            $number = 5;
          }
          $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
          $news_posts_query = new WP_Query(
            apply_filters(
              'widget_posts_args',
              array(
                'posts_per_page'      => $number,
                          'category_name' => 'news',
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
              ),
              $instance
            )
          );
          if ( ! $news_posts_query->have_posts() ) {
            return;
          }
          echo $args['before_widget']; 
          
          ?>
      <ul>
          <?php foreach ( $news_posts_query->posts as $news_post ) : ?>
          <?php
              $post_title = get_the_title( $news_post->ID );
              $title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)');
              ?>
          <li>
              <a href="<?php the_permalink( $news_post->ID ); ?>">
                  <?php echo $title; ?></a>
              <?php if ( $show_date ) : ?>
              <span class="post-date">
                  <?php echo get_the_date( '', $news_post->ID ); ?></span>
              <?php endif; ?>
          </li>
          <?php endforeach; ?>
      </ul>
      <?php
      echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
      $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
      $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
      $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
      ?>
         <p><label for="<?php echo $this->get_field_id( 'number' ); ?>">
              <?php _e( 'Number of posts to show:'); ?></label>
          <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
      
      <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="
          <?php echo $this->get_field_id( 'show_date' ); ?>" name="
          <?php echo $this->get_field_name( 'show_date' ); ?>" />
          <label for="<?php echo $this->get_field_id( 'show_date' ); ?>">
              <?php _e( 'Display post date?' ); ?></label></p>
      <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
      $instance              = $old_instance;
      $instance['title']     = sanitize_text_field( $new_instance['title'] );
      $instance['number']    = (int) $new_instance['number'];
      $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
      return $instance; 
    }
 
}
add_action( 'widgets_init', function() {
  register_widget('News_widget');
} );
?>

<?php

/**
 *  Social Media Widget
 */

    class socialmedia_widget extends WP_Widget{
        //set up widget name, description, etc ...
        public function __construct(){
            $widget_ops = array(
                'classname' => 'social-media-widget',
                'description' => 'Custom Social Media profile widget',
                'customize_selective_refresh' => true,
            );
            parent::__construct( 'social-media', __( 'Social Media', 'socialmedia' ), $widget_ops );
		        $this->alt_option_name = 'social_media';
        }

        // shows output of widget
        public function widget($args, $instance) {
          if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
          }
          
          $facebook = $instance['facebook'];
          $twitter = $instance['twitter'];
          $linkedin = $instance['linkedin'];
          $rss = $instance['rss'];
          // social media links
          $facebook_link = '<a target="_blank" class=" social_link" id="facebook" href="' . $facebook . '">
          <img id="facebook-logo">
          <span>Facebook</span></a>';
          $twitter_link = '<a target="_blank" class=" social_link" id="twitter" href="' . $twitter . '"><img id="twitter-logo"><span>Twitter</span></a>';
          $linkedin_link = '<a target="_blank" class=" social_link" id="linkedin" href="' . $linkedin . '"><img id="linkedin-logo"><span>LinkedIn</span></a>';
          $rss_link = '<a target="_blank" class=" social_link" id= "rss" href="' . $rss . '"><img id="rss-logo"><span>RSS</span></a>';
          echo $args['before_widget'];
          
        ?>
        <div class="social-media">
          <?php
            if(!empty($facebook))
            echo '<div id="icon"><li><a class="icon-link" href="'.$facebook.'"><p class="face"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> Facebook</p></a></li></div><br/>';
        
            if(!empty($twitter))
            echo '<div id="icon"><li><a class="icon-link" href="'. $twitter.'"><p class="twit"><i class="fa fa-twitter-square fa-2x " aria-hidden="true"></i> Twitter</p></a></div><br/>';

            if(!empty($linkedin))
            echo '<div id="icon"><li><a class="icon-link" href="'. $linkedin.'"><p class="linkedin"><i class="fa fa-linkedin-square fa-2x " aria-hidden="true"></i> Linkedin</p></a></div><br/>'; 

            if(!empty($rss))
            echo '<div id="icon"><li><a class="icon-link" href="'. $rss.'"><p class="rssfeed"><i class="fa fa-rss-square fa-2x" aria-hidden="true"></i> RSS feed</p></a></div><br/>';

          ?>
        </div>
        <?php
          echo $args['after_widget'];
          }
          // handles widget form settings
          public function update($new_instance, $old_instance) {
              $instance = $old_instance;
          $instance['title'] = sanitize_text_field( $new_instance['title'] );
              $instance['facebook'] = sanitize_text_field( $new_instance['facebook'] );
              $instance['twitter'] = sanitize_text_field( $new_instance['twitter'] );
              $instance['linkedin'] = sanitize_text_field( $new_instance['linkedin'] );
              $instance['rss'] = sanitize_text_field( $new_instance['rss'] );
              return $instance;
          }
          
          // form settings on widget menu
          public function form($instance) {
              $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
              $facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
              $twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
              $linkedin = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
              $rss = isset( $instance['rss'] ) ? esc_attr( $instance['rss'] ) : '';
        ?>

        

        

        <p>
          <label for="<?php echo $this->get_field_id('facebook'); ?>">
              <?php _e('Facebook:','socialmedia'); ?></label>
          <input class="Title" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="url" value="<?php echo ($facebook); ?>">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('twitter'); ?>">
              <?php _e('Twitter:', 'socialmedia'); ?></label>
          <input class="Title" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="url" value="<?php echo ($twitter); ?>">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('linkedin'); ?>">
              <?php _e('LinkedIn:','socialmedia'); ?></label>
          <input class="Title" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="url" value="<?php echo esc_attr($linkedin); ?>">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('rss'); ?>">
              <?php _e('RSS:','socialmedia'); ?></label>
          <input class="Title" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="url" value="<?php echo esc_attr($rss); ?>">
        </p>
<?php
  }
}
    

    add_action( 'widgets_init', function() {
        register_widget('socialmedia_widget');
    } );
?>

