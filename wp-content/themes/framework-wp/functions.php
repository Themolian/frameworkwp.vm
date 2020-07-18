<?php
/**
 * Framework WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Framework_WP
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'framework_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function framework_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Framework WP, use a find and replace
		 * to change 'framework-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'framework-wp', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'framework-wp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'framework_wp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'framework_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function framework_wp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'framework_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'framework_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function framework_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'framework-wp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'framework-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'framework_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function framework_wp_scripts() {
	wp_enqueue_style( 'framework-wp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'framework-wp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'framework-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'framework_wp_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

wp_register_style("stylesheet", get_template_directory_uri() . "/css/stylesheet.css", '', '1.0.0');
wp_enqueue_style('stylesheet');

wp_register_style("normalise", get_template_directory_uri() . "/css/normalise.css", '', '1.0.0');
wp_enqueue_style('normalise');

wp_register_style("reset", get_template_directory_uri() . "/css/reset.css", '', '1.0.0');
wp_enqueue_style('reset');

wp_register_style("flexslider", get_template_directory_uri() . "/css/flexslider.css", '', '1.0.0');
wp_enqueue_style('flexslider');

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('production', get_theme_file_uri() . '/js/main-dist.js', ['jquery'], '', true);
    wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/731f5cd381.js', [], '', true );
});


define('THEME_IMG_PATH', get_stylesheet_directory_uri() . '/uploads');


if ( ! function_exists( 'create_post_type' ) ) :

	function create_post_type() {
		
		register_post_type( 'testimonials',
			array(
				'labels' => array(
					'name' => __( 'Testimonials' ),
					'singular_name' => __( 'Testimonial' ),
					'menu_icon'      => 'dashicons-smiley',
				),
				'public' => true,
				'supports' => array ( 'title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail' ),
				'taxonomies' => array( 'category', 'post_tag' ),
				'hierarchical' => true,
				'menu_icon' => get_bloginfo( 'template_directory' ) . "/images/icon.png",
				'rewrite' => array ( 'slug' => __( 'Testimonials' ) ) 
			)
		);
	
	}
	add_action( 'init', 'create_post_type' );
	
	endif;

	add_action('init', 'register_custom_posts_init');

	function register_custom_posts_init() {
		$site_options_labels = array(
			'name'               => 'Site Options',
			'singular_name'      => 'Site Option',
			'menu_name'          => 'Site Options'
		);
		$site_options_args = array(
			'labels'             => $site_options_labels,
			'public'             => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' )
		);
		register_post_type('site_options', $site_options_args);

	}

	register_nav_menus( array(
		'primary' => __( 'leospa-nav', 'framework-wp' ),
	) );

?>

