<?php
/**
 * RenalInfoLK Web Theme Functions
 *
 * Minimal PHP setup for WordPress block theme.
 * Theme styling controlled by theme.json.
 *
 * @package RenalInfoLK_Web
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup
 * 
 * Register theme support features
 */
function renalinfo_web_setup() {
	// Add support for block templates
	add_theme_support( 'block-templates' );
	
	// Add support for post thumbnails (featured images)
	add_theme_support( 'post-thumbnails' );
	
	// Add support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	
	// Add support for responsive embeds
	add_theme_support( 'responsive-embeds' );
	
	// Add support for HTML5 markup
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	
	// Add support for editor styles
	add_theme_support( 'editor-styles' );
	
	// Register responsive image sizes for mobile optimization
	add_image_size( 'mobile-hero', 800, 450, true );       // 16:9 for mobile hero images
	add_image_size( 'mobile-content', 600, 400, true );    // Content images on mobile
	add_image_size( 'mobile-thumbnail', 400, 300, true );  // Small thumbnails
}
add_action( 'after_setup_theme', 'renalinfo_web_setup' );

/**
 * Enqueue theme stylesheet
 * 
 * Load the main stylesheet with proper versioning
 */
function renalinfo_web_enqueue_styles() {
	// Get theme version from style.css header
	$theme_version = wp_get_theme()->get( 'Version' );
	
	// Enqueue main stylesheet
	wp_enqueue_style(
		'renalinfo-web-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);
}
add_action( 'wp_enqueue_scripts', 'renalinfo_web_enqueue_styles' );

/**
 * Enqueue mobile menu assets
 * 
 * Load mobile menu CSS and JavaScript for responsive navigation
 * 
 * @since 1.0.0
 */
function renalinfo_web_enqueue_mobile_menu() {
	// Get theme version
	$theme_version = wp_get_theme()->get( 'Version' );
	
	// Enqueue mobile menu CSS in header
	wp_enqueue_style(
		'renalinfo-web-mobile-menu',
		get_template_directory_uri() . '/assets/css/mobile-menu.css',
		array(),
		$theme_version
	);
	
	// Enqueue mobile menu JS in footer
	wp_enqueue_script(
		'renalinfo-web-mobile-menu-js',
		get_template_directory_uri() . '/assets/js/mobile-menu.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'renalinfo_web_enqueue_mobile_menu' );

/**
 * Register block pattern categories
 * 
 * Create custom pattern categories for organizing theme patterns
 */
function renalinfo_web_pattern_categories() {
	// Heroes category
	register_block_pattern_category(
		'renalinfo-web-heroes',
		array(
			'label'       => __( 'RenalInfo Heroes', 'renalinfo-web' ),
			'description' => __( 'Hero sections for landing pages and headers', 'renalinfo-web' ),
		)
	);
	
	// CTA (Call-to-Action) category
	register_block_pattern_category(
		'renalinfo-web-cta',
		array(
			'label'       => __( 'RenalInfo CTAs', 'renalinfo-web' ),
			'description' => __( 'Call-to-action sections and promotional banners', 'renalinfo-web' ),
		)
	);
	
	// Content category
	register_block_pattern_category(
		'renalinfo-web-content',
		array(
			'label'       => __( 'RenalInfo Content', 'renalinfo-web' ),
			'description' => __( 'Content sections for articles and pages', 'renalinfo-web' ),
		)
	);
}
add_action( 'init', 'renalinfo_web_pattern_categories' );

/**
 * Enqueue editor stylesheet
 * 
 * Load custom styles for the Site Editor interface
 * 
 * @since 1.0.0
 */
function renalinfo_web_editor_styles() {
	// Get theme version
	$theme_version = wp_get_theme()->get( 'Version' );
	
	// Enqueue editor stylesheet
	wp_enqueue_style(
		'renalinfo-web-editor-style',
		get_template_directory_uri() . '/assets/css/editor-style.css',
		array(),
		$theme_version
	);
}
add_action( 'enqueue_block_editor_assets', 'renalinfo_web_editor_styles' );

/**
 * Register custom block styles
 * 
 * Add custom style variations for core blocks
 * 
 * @since 1.0.0
 */
function renalinfo_web_register_block_styles() {
	// Medical list style with custom checkmark icon
	register_block_style(
		'core/list',
		array(
			'name'  => 'medical-checkmark',
			'label' => __( 'Medical Checkmark', 'renalinfo-web' ),
		)
	);
	
	// Medical information list with special icon
	register_block_style(
		'core/list',
		array(
			'name'  => 'medical-info',
			'label' => __( 'Medical Info', 'renalinfo-web' ),
		)
	);
	
	// Button style variations for CTAs
	register_block_style(
		'core/button',
		array(
			'name'  => 'cta-primary',
			'label' => __( 'CTA Primary', 'renalinfo-web' ),
		)
	);
	
	register_block_style(
		'core/button',
		array(
			'name'  => 'cta-secondary',
			'label' => __( 'CTA Secondary', 'renalinfo-web' ),
		)
	);
	
	register_block_style(
		'core/button',
		array(
			'name'  => 'cta-large',
			'label' => __( 'CTA Large', 'renalinfo-web' ),
		)
	);
}
add_action( 'init', 'renalinfo_web_register_block_styles' );

