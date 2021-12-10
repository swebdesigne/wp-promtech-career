<?php
require ("vendor/autoload.php"); 
/**
 * promtech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package promtech
 */

if ( ! function_exists( 'promtech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function promtech_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on promtech, use a find and replace
		 * to change 'promtech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'promtech', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header menu', 'promtech' ),
		) );

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
		add_theme_support( 'custom-background', apply_filters( 'promtech_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
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
add_action( 'after_setup_theme', 'promtech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function promtech_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'promtech_content_width', 640 );
}
add_action( 'after_setup_theme', 'promtech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function promtech_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'promtech' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'promtech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'promtech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function promtech_scripts() {
	wp_enqueue_style( 'promtech-style', get_stylesheet_uri() );

	wp_enqueue_style( 'promtech-font-style', get_template_directory_uri() . '/assets/fonts/font.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-slick_slider-style', get_template_directory_uri() . '/assets/libs/slick/slick.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-slick_slider-theme', get_template_directory_uri() . '/assets/libs/slick/slick-theme.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-slick_slider-theme', get_template_directory_uri() . '/assets/libs/slick/slick-theme.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-fancybox-style', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-style', get_template_directory_uri() . '/assets/css/main.css', array(), '20151215', true );
	
	wp_enqueue_style( 'promtech-bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap/css/bootstrap.min.css', array(), '20151215', false );
	
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '' );
    wp_enqueue_script( 'jquery', '', '', false, true);

    wp_enqueue_script( 'promtech-bootstrap', get_template_directory_uri() . '/assets//libs/jquery-3.3.1.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-migrate', get_template_directory_uri() . '/assets/libs/jquery-migrate-3.0.1.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-inputmask', get_template_directory_uri() . '/assets/libs/jquery.inputmask.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-marquee', get_template_directory_uri() . '/assets/libs/marque/jquery.marquee.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-slick', get_template_directory_uri() . '/assets/libs/slick/slick.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-bundle', get_template_directory_uri() . '/assets/libs/bootstrap/js/bootstrap.bundle.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-easypiechart', get_template_directory_uri() . '/assets/libs/easy-pie-chart/jquery.easypiechart.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );
	
    wp_enqueue_script('promtech-html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');
    wp_script_add_data('promtech-html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('promtech-respond', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');
    wp_script_add_data('promtech-respond', 'conditional', 'lt IE 9');
	
}
add_action( 'wp_enqueue_scripts', 'promtech_scripts' );

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

// подключаем настройки для фдминки 
new SettingsAdminPanel();

// убираем редактор Gutenberg
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 ); 

// отключаем автообновлние плагина Custom Post Type UI
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
function filter_plugin_updates( $value ) {
	unset( $value->response['advanced-custom-fields-pro/acf.php'] );
	return $value;
}


add_action( 'after_setup_theme', 'true_add_image_size' );
 
function true_add_image_size() {
	add_image_size( 'post-photo', 680, 340, true );
	add_image_size( 'post-news-big', 920, 460, true );
	add_image_size( 'post-news-small', 560, 340, true );
}

// wp_get_attachment_image( 651, 'medium');
// $attach_id = get_post_thumbnail_id(355 );
// $ex = wp_get_attachment_image( $attach_id, 'medium');
// print_r($ex);
// die('123');