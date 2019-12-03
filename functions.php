<?php
/**
 * rtcamp_assignment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rtcamp_assignment
 */

if ( ! function_exists( 'assignment_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function assignment_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rtcamp_assignment, use a find and replace
		 * to change 'assignment-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'assignment-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-imgs-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'assignment-theme' ),
		) );

		register_nav_menus( array(
			'menu-2' => esc_html__( 'Secondary', 'assignment-theme' ),
		) );

		register_nav_menu ('topNav', 'Top Navigation');

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'assignment_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-img' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'assignment_theme_setup' );


// Adding excerpt for page
add_post_type_support( 'page', 'excerpt' );

// Get Page Title by Slug
function get_page_title_for_slug($page_slug) {

	$page = get_page_by_path( $page_slug , OBJECT );

	if ( isset($page) )
	   return $page->post_title;
	else
	   return FALSE;
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function assignment_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'assignment_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'assignment_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function assignment_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'assignment-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'assignment-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	
}
add_action( 'widgets_init', 'assignment_theme_widgets_init' );

add_action('widgets_init', 'custom_widget_init');

function custom_widget_init(){
	register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Latest News Sidebar' ),
            'description'   => __( 'Edit Latest News by category' ),
            'before_widget' => '<div id="latest_news"><div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
	);
	
	register_sidebar(
        array(
            'id'            => 'secondary',
            'name'          => __( 'Recent Projects Sidebar' ),
            'description'   => __( 'Edit Projects .' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
	);
	register_sidebar(
        array(
            'id'            => 'ternary',
            'name'          => __( 'Social Media Sidebar' ),
            'description'   => __( 'Social Media Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
	);
	
	register_sidebar(
        array(
            'id'            => 'security',
            'name'          => __( 'Security and Policy Sidebar' ),
            'description'   => __( 'Edit Security and Policy.' ),
            'before_widget' => '<div id="security"><div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
	);

	register_sidebar(
        array(
            'id'            => 'footerlogo',
            'name'          => __( 'Footer Logo' ),
            'description'   => __( 'Edit Footer Logo.' ),
            'before_widget' => '<div id="security"><div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
	);

}

/**
 * Enqueue scripts and styles.
 */
function assignment_theme_scripts() {
	wp_enqueue_style( 'assignment-theme-style', get_stylesheet_uri() );

	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
		
	wp_enqueue_style( 'custom2', get_template_directory_uri() . '/lib/css/custom.css', array(), microtime(), 'all');
	
	wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
	
	wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
	
	wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );

	wp_enqueue_script( 'font-awesome','https://use.fontawesome.com/f8d1c4eca1.js', array( 'jquery' ),'',true );
	
	wp_enqueue_script( 'assignment-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'assignment-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'assignment_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Social Media widget
 */
require get_template_directory() . '/lib/inc/socialmedia-widget.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*Featured posts*/
function Custom_feature_edit($wp_customize){
	$wp_customize->add_section('featured_post_image_one_section', array(
	'title' => 'Featured Posts Slider'
	));
	
	$wp_customize->add_setting('featured_post_image_one_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_one_control', array(
	'label' => 'Featured post image 1',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_one_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_post_image_two_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_two_control', array(
	'label' => 'Featured post image 2',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_two_setting',
	'width' => 960,
	'height' => 300
	)));
	
	$wp_customize->add_setting('featured_post_image_three_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_three_control', array(
	'label' => 'Featured post image 3',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_three_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_post_image_four_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_four_control', array(
	'label' => 'Featured post image 4',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_four_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_image_one_title', array(
	'default' => 'Title one'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_one_title', array(
	'label' => 'Title Text 1',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_one_title'
	)));
	
	
	$wp_customize->add_setting('featured_image_two_title', array(
	'default' => 'Title two'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_two_title', array(
	'label' => 'Title Text 2',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_two_title'
	)));
	
	
	
	$wp_customize->add_setting('featured_image_three_title', array(
	'default' => 'Title three'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_three_title', array(
	'label' => 'Title Text 3',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_three_title'
	)));
	

	$wp_customize->add_setting('featured_image_four_title', array(
	'default' => 'Title four'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_four_title', array(
	'label' => 'Title Text 4',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_four_title'
	)));
	
	$wp_customize->add_setting('features_post_content_one', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_one_control', array(
	'label' => 'Content for post 1',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_one',
	'type'=>'textarea'
	)));
	
	$wp_customize->add_setting('features_post_content_two', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_two_control', array(
	'label' => 'Content for post 2',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_two',
	'type'=>'textarea'
	)));
	
		$wp_customize->add_setting('features_post_content_three', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_three_control', array(
	'label' => 'Content for post 3',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_three',
	'type'=>'textarea'
	)));
	
	$wp_customize->add_setting('features_post_content_four', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_four_control', array(
	'label' => 'Content for post 4',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_four',
	'type'=>'textarea'
	)));
}
add_action('customize_register', 'Custom_feature_edit');




/**
 * Custom Footer 
 */

 function custom_footer($wp_customize){
	$wp_customize->add_section('footer_edit_section', array(
		'title' => 'Footer Edit'
		));
		
		$wp_customize->add_setting('footer_edit_setting', array(
		'default' => '&copy; 2011 rtPanel. All Rights Reserved. Designed by rtCamp'
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_edit_control', array(
		'label' => 'Footer Text',
		'section' => 'footer_edit_section',
		'settings' => 'footer_edit_setting'
		)));
 }

 add_action('customize_register', 'custom_footer');


