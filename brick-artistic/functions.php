<?php
/**
 * brick functions and definitions.
 *
 * @package brick
 */

/**
 * The current version of the theme.
 */
define( 'brick_VERSION', '1.2.0' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brick_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'brick_content_width', 2560 );
}
add_action( 'after_setup_theme', 'brick_content_width', 0 );

if ( ! function_exists( 'brick_setup' ) ) :
/**
 * Sets up defaults and registers support for various features.
 *
 * Note that this function is hooked into the after_setup_theme hook,
 * which runs before the init hook. The init hook is too late for some
 * features, such as indicating support for post thumbnails.
 */
function brick_setup() {
	// Make the theme available for translation.
	load_theme_textdomain( 'brick', get_template_directory() . '/languages' );

	 // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for theme logo.
	add_theme_support( 'custom-logo', array(
		'width' => 96,
		'height' => 96,
		'flex-width' => true,
		'flex-height' => false,
		'header-text' => true,
	) );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add necessary image sizes.
	add_image_size( 'brick-blog-thumbnail', 648, 410, true );
	add_image_size( 'brick-blog-thumbnail-2x', 1296, 820, true );
	add_image_size( 'brick-single-thumbnail', 1440, 0, false );
	add_image_size( 'brick-single-thumbnail-2x', 2880, 0, false );

	// Register menu locations.
	register_nav_menus( array(
		'primary' => __( 'Primary', 'brick' ),
		'footer' => __( 'Footer', 'brick' ),
	) );

	// Enable HTML5 markup for the listed features.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'assets/css/editor-style.css' ) );

	// Add support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add Content Options feature.
	add_theme_support( 'jetpack-content-options', array(
		'blog-display' => 'content',
		'post-details' => array(
			'stylesheet' => 'brick-style',
			'date' => '.posted-on',
			'categories' => '.cat-links',
			'tags' => '.tags-links',
			'author' => '.byline',
			'comment' => '.comments-link',
		),
		'featured-images' => array(
			'archive' => true,
			'archive-default' => true,
			'post' => true,
			'post-default' => true,
			'page' => true,
			'page-default' => false,
		),
	) );

	// Add support for Pageviews plugin.
	add_theme_support( 'pageviews' );
}
endif;
add_action( 'after_setup_theme', 'brick_setup' );

/**
 * Register the widget area.
 */
function brick_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer #1', 'brick' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer #2', 'brick' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Before Post Content', 'brick' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'After Post Content', 'brick' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'brick_widgets_init' );

if ( ! function_exists( 'brick_fonts_url' ) ) :
/**
 * Register Google fonts for brick.
 *
 * @return string Google fonts URL for the theme.
 */
function brick_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/**
	 * Translators: If there are characters in your languagethat are not
	 * supported by Open Sans, translate this to 'off'.
	 * Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'brick' ) ) {
		$fonts[] = 'Open Sans:400,400i,700,700i,800,800i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function brick_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'brick_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function brick_scripts() {
	wp_enqueue_style(
		'brick-fonts',
		brick_fonts_url(),
		array(),
		brick_VERSION,
		false
	);

	wp_enqueue_style(
		'brick-style',
		get_stylesheet_uri(),
		array(),
		brick_VERSION,
		false
	);

	wp_style_add_data( 'brick-style', 'rtl', 'replace' );

	wp_enqueue_script(
		'brick-js',
		get_template_directory_uri() . '/assets/js/theme.js',
		false,
		brick_VERSION,
		true
	);

	$brick_i18n_strings = array(
		'menu' => esc_html__( 'Menu', 'brick' ),
		'close' => esc_html__( 'Close', 'brick' ),
		'expandChild' => esc_html__( 'Expand child menu', 'brick' ),
		'collapseChild' => esc_html__( 'Collapse child menu', 'brick' ),
	);

	wp_localize_script( 'brick-js', 'brickI18n', $brick_i18n_strings );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*
	 * Remove the CSS registered with the Contact Form 7 plugin.
	 */
	if ( wp_style_is( 'contact-form-7', 'registered' ) ) {
		wp_deregister_style( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'brick_scripts' );

/**
 * Enqueue custom scripts for customizer preview screen.
 */
function brick_customize_preview_js() {
	wp_enqueue_script(
		'brick-customize-preview',
		get_template_directory_uri() . '/assets/js/customize-preview.js',
		array( 'customize-preview' ),
		brick_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'brick_customize_preview_js' );

/**
 * Disable Jetpack styles.
 */
function brick_disable_scripts() {
	if ( wp_style_is( 'the-neverending-homepage', 'registered' ) ) {
		wp_deregister_style( 'the-neverending-homepage' );
	}
}
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
add_action( 'wp_enqueue_scripts', 'brick_disable_scripts' );

/**
 * Remove Jetpack Contact Form CSS.
 */
function brick_disable_jetpack_contact_form_css() {
	wp_deregister_style( 'grunion.css' );
}
add_action( 'wp_print_styles', 'brick_disable_jetpack_contact_form_css' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer settings.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer Custom Controls.
 */
require get_template_directory() . '/inc/class-brick-customize-control-message.php';
