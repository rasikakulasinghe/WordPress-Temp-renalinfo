<?php
/**
 * Renalinfolk functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'renalinfolk_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'renalinfolk_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'renalinfolk_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'renalinfolk_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'renalinfolk_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_enqueue_styles() {
		wp_enqueue_style(
			'renalinfolk-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue Material Symbols Outlined from Google Fonts CDN.
		// TODO: Self-host this font for better performance, privacy (GDPR compliance),
		// and to add Subresource Integrity (SRI) protection.
		// Download from: https://fonts.google.com/icons
		wp_enqueue_style(
			'material-symbols-outlined',
			'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap',
			array(),
			null
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'renalinfolk_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'renalinfolk_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'renalinfolk' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'  => 'cta-highlight',
				'label' => __( 'CTA Highlight', 'renalinfolk' ),
			)
		);
	}
endif;
add_action( 'init', 'renalinfolk_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'renalinfolk_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_pattern_categories() {

		register_block_pattern_category(
			'renalinfolk_medical_pages',
			array(
				'label'       => __( 'Medical Pages', 'renalinfolk' ),
				'description' => __( 'Full page layouts for medical departments, services, and resources.', 'renalinfolk' ),
			)
		);

		register_block_pattern_category(
			'renalinfolk_medical_content',
			array(
				'label'       => __( 'Medical Content', 'renalinfolk' ),
				'description' => __( 'Content sections for articles, publications, and patient resources.', 'renalinfolk' ),
			)
		);
	}
endif;
add_action( 'init', 'renalinfolk_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'renalinfolk_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_register_block_bindings() {
		register_block_bindings_source(
			'renalinfolk/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'renalinfolk' ),
				'get_value_callback' => 'renalinfolk_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'renalinfolk_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'renalinfolk_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function renalinfolk_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;
