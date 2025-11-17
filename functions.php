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

// Theme setup.
if ( ! function_exists( 'renalinfolk_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_theme_setup() {
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for post formats.
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height.
		add_theme_support( 'custom-line-height' );

		// Add support for custom spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for SVG uploads (for social icons).
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

		// Register navigation menus.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'renalinfolk' ),
				'footer'  => __( 'Footer Navigation', 'renalinfolk' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'renalinfolk_theme_setup' );

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
	}
endif;
add_action( 'wp_enqueue_scripts', 'renalinfolk_enqueue_styles' );

// Enqueues Material Icons font.
if ( ! function_exists( 'renalinfolk_enqueue_material_icons' ) ) :
	/**
	 * Enqueues Material Icons font on the front.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_enqueue_material_icons() {
		wp_enqueue_style(
			'material-symbols-outlined',
			'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200',
			array(),
			null
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'renalinfolk_enqueue_material_icons' );
add_action( 'admin_enqueue_scripts', 'renalinfolk_enqueue_material_icons' );

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

		register_block_pattern_category(
			'renalinfolk_post-format',
			array(
				'label'       => __( 'Post Formats', 'renalinfolk' ),
				'description' => __( 'Patterns for different post format types (audio, link, etc.).', 'renalinfolk' ),
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

// Ensure social icons SVG rendering.
if ( ! function_exists( 'renalinfolk_social_link_block_render' ) ) :
	/**
	 * Ensures social link blocks render SVG icons properly.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @param string $block_content The block content.
	 * @param array  $block The block data.
	 * @return string Modified block content.
	 */
	function renalinfolk_social_link_block_render( $block_content, $block ) {
		if ( 'core/social-link' === $block['blockName'] ) {
			// Ensure the SVG icon is present and visible.
			$block_content = str_replace( 'class="wp-block-social-link', 'class="wp-block-social-link has-icon', $block_content );
		}
		return $block_content;
	}
endif;
add_filter( 'render_block', 'renalinfolk_social_link_block_render', 10, 2 );

// Force enable SVG support for social icons.
if ( ! function_exists( 'renalinfolk_enable_svg_support' ) ) :
	/**
	 * Enables SVG rendering for social media icons.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_enable_svg_support() {
		// Add inline CSS to ensure SVG visibility.
		$inline_css = '
		.wp-block-social-links .wp-social-link svg {
			display: inline-block !important;
			visibility: visible !important;
			opacity: 1 !important;
			width: 1em !important;
			height: 1em !important;
		}
		.wp-block-social-links .wp-social-link {
			display: inline-flex !important;
		}
		.wp-block-social-links.has-icon-color .wp-social-link svg {
			fill: currentColor !important;
		}
		';
		wp_add_inline_style( 'renalinfolk-style', $inline_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'renalinfolk_enable_svg_support', 20 );
