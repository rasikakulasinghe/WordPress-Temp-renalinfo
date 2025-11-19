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

// Register custom meta fields for video posts.
if ( ! function_exists( 'renalinfolk_register_video_meta_fields' ) ) :
	/**
	 * Registers custom meta fields for video posts (URL and duration).
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_register_video_meta_fields() {
		// Register video URL field.
		register_post_meta(
			'post',
			'renalinfolk_video_url',
			array(
				'show_in_rest'      => true,
				'single'            => true,
				'type'              => 'string',
				'description'       => __( 'Video URL (YouTube, Vimeo, etc.) for video format posts', 'renalinfolk' ),
				'sanitize_callback' => 'esc_url_raw',
				'auth_callback'     => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		// Register video duration field.
		register_post_meta(
			'post',
			'renalinfolk_video_duration',
			array(
				'show_in_rest'      => true,
				'single'            => true,
				'type'              => 'string',
				'description'       => __( 'Video duration (e.g., 5:30, 12 min) for video format posts', 'renalinfolk' ),
				'sanitize_callback' => 'sanitize_text_field',
				'auth_callback'     => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
endif;
add_action( 'init', 'renalinfolk_register_video_meta_fields' );

// Filter gallery queries by category, tag, and sorting.
if ( ! function_exists( 'renalinfolk_filter_gallery_query' ) ) :
	/**
	 * Filters the query for gallery pages based on URL parameters.
	 * Handles category filtering, tag filtering, and custom sorting.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @param WP_Query $query The WordPress query object.
	 * @return void
	 */
	function renalinfolk_filter_gallery_query( $query ) {
		// Only modify main query on gallery templates, not in admin.
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		// Get current page template.
		$template_slug = get_page_template_slug();

		// Handle gallery-image page.
		if ( 'gallery-image' === $template_slug || is_page_template( 'templates/gallery-image.html' ) ) {
			// Set category to 'gallery-image'.
			$query->set( 'category_name', 'gallery-image' );
		}

		// Handle gallery-video page.
		if ( 'gallery-video' === $template_slug || is_page_template( 'templates/gallery-video.html' ) ) {
			// Set category to 'gallery-video'.
			$query->set( 'category_name', 'gallery-video' );
		}

		// Handle tag filtering from URL parameter (?tag=event).
		if ( isset( $_GET['tag'] ) && ! empty( $_GET['tag'] ) ) {
			$tag = sanitize_text_field( wp_unslash( $_GET['tag'] ) );
			$query->set( 'tag', $tag );
		}

		// Handle custom sorting from URL parameters (?orderby=date&order=desc).
		if ( isset( $_GET['orderby'] ) && ! empty( $_GET['orderby'] ) ) {
			$orderby = sanitize_text_field( wp_unslash( $_GET['orderby'] ) );

			// Allowed orderby values.
			$allowed_orderby = array( 'date', 'title', 'comment_count', 'modified', 'rand' );

			if ( in_array( $orderby, $allowed_orderby, true ) ) {
				$query->set( 'orderby', $orderby );
			}
		}

		if ( isset( $_GET['order'] ) && ! empty( $_GET['order'] ) ) {
			$order = sanitize_text_field( wp_unslash( $_GET['order'] ) );

			// Only allow ASC or DESC.
			if ( in_array( strtoupper( $order ), array( 'ASC', 'DESC' ), true ) ) {
				$query->set( 'order', strtoupper( $order ) );
			}
		}
	}
endif;
add_action( 'pre_get_posts', 'renalinfolk_filter_gallery_query' );

// Enqueue video embed script.
if ( ! function_exists( 'renalinfolk_enqueue_video_embed_script' ) ) :
	/**
	 * Enqueues JavaScript to convert video URLs to embedded iframes.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_enqueue_video_embed_script() {
		if ( is_singular( 'post' ) && has_post_format( 'video' ) ) {
			wp_enqueue_script(
				'renalinfolk-video-embed',
				get_template_directory_uri() . '/assets/js/video-embed.js',
				array(),
				wp_get_theme()->get( 'Version' ),
				true
			);
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'renalinfolk_enqueue_video_embed_script' );

// Enqueue video meta editor script in the block editor.
if ( ! function_exists( 'renalinfolk_enqueue_video_meta_editor' ) ) :
	/**
	 * Enqueues JavaScript to add video meta fields UI in the block editor.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_enqueue_video_meta_editor() {
		wp_enqueue_script(
			'renalinfolk-video-meta-editor',
			get_template_directory_uri() . '/assets/js/video-meta-editor.js',
			array(
				'wp-plugins',
				'wp-edit-post',
				'wp-element',
				'wp-components',
				'wp-data',
			),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
endif;
add_action( 'enqueue_block_editor_assets', 'renalinfolk_enqueue_video_meta_editor' );

// Render video embed from custom field.
if ( ! function_exists( 'renalinfolk_render_video_embed' ) ) :
	/**
	 * Renders video embed block with URL from custom field.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @param string $block_content The block content.
	 * @param array  $block The block data.
	 * @return string Modified block content.
	 */
	function renalinfolk_render_video_embed( $block_content, $block ) {
		// Only process embed blocks with our custom binding
		if ( 'core/embed' !== $block['blockName'] ) {
			return $block_content;
		}

		// Check if this block has our video URL binding
		$has_video_binding = isset( $block['attrs']['metadata']['bindings']['url']['args']['key'] ) 
			&& 'renalinfolk_video_url' === $block['attrs']['metadata']['bindings']['url']['args']['key'];

		if ( ! $has_video_binding ) {
			return $block_content;
		}

		// Get the video URL from post meta
		$video_url = get_post_meta( get_the_ID(), 'renalinfolk_video_url', true );

		if ( empty( $video_url ) ) {
			return '<div class="wp-block-embed__wrapper" style="padding: 2rem; background: #f5f7f8; border-radius: 8px; text-align: center; color: #4A4A4A;">
				<p>No video URL provided. Please add a video URL in the post editor.</p>
			</div>';
		}

		// Use WordPress oEmbed to get the embed HTML
		$embed_html = wp_oembed_get( $video_url, array( 'width' => 800 ) );

		if ( false === $embed_html ) {
			// Fallback: create manual embed for YouTube/Vimeo
			$embed_html = renalinfolk_create_manual_embed( $video_url );
		}

		// Wrap in proper WordPress embed structure
		return sprintf(
			'<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">%s</div></figure>',
			$embed_html
		);
	}
endif;
add_filter( 'render_block', 'renalinfolk_render_video_embed', 10, 2 );

// Create manual video embed.
if ( ! function_exists( 'renalinfolk_create_manual_embed' ) ) :
	/**
	 * Creates manual iframe embed for YouTube or Vimeo URLs.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @param string $url Video URL.
	 * @return string Embed HTML.
	 */
	function renalinfolk_create_manual_embed( $url ) {
		// Extract YouTube ID
		if ( preg_match( '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\?\/]+)/', $url, $youtube_match ) ) {
			$video_id = $youtube_match[1];
			return sprintf(
				'<iframe width="800" height="450" src="https://www.youtube.com/embed/%s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>',
				esc_attr( $video_id )
			);
		}

		// Extract Vimeo ID
		if ( preg_match( '/vimeo\.com\/(\d+)/', $url, $vimeo_match ) ) {
			$video_id = $vimeo_match[1];
			return sprintf(
				'<iframe src="https://player.vimeo.com/video/%s" width="800" height="450" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe>',
				esc_attr( $video_id )
			);
		}

		// Fallback: display link
		return sprintf(
			'<p style="padding: 2rem; background: #f5f7f8; border-radius: 8px; text-align: center;"><a href="%s" target="_blank" rel="noopener noreferrer" style="color: #359EFF; text-decoration: none; font-weight: 600;">Watch Video →</a></p>',
			esc_url( $url )
		);
	}
endif;
