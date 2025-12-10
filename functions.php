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

// Enqueue gallery filter script for all gallery types.
if ( ! function_exists( 'renalinfolk_enqueue_gallery_filters' ) ) :
	/**
	 * Enqueues JavaScript for gallery filtering and sorting (articles, images, news, publications, videos).
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_enqueue_gallery_filters() {
		// Enqueue on all gallery page templates.
		$gallery_templates = array(
			'templates/page-gallery-article.html',
			'templates/page-gallery-image.html',
			'templates/page-gallery-news.html',
			'templates/page-gallery-publication.html',
			'templates/page-gallery-video.html',
			'page-gallery-article',
			'page-gallery-image',
			'page-gallery-news',
			'page-gallery-publication',
			'page-gallery-video',
		);

		$is_gallery_page = false;
		foreach ( $gallery_templates as $template ) {
			if ( is_page_template( $template ) ) {
				$is_gallery_page = true;
				break;
			}
		}

		// Gallery filter functionality is now handled by the Query Filter Container custom block
	}
endif;
add_action( 'wp_enqueue_scripts', 'renalinfolk_enqueue_gallery_filters' );

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
			return '<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube"><div class="wp-block-embed__wrapper" style="padding: 2rem; background: #f5f7f8; border-radius: 8px; text-align: center; color: #4A4A4A;">
				<p>No video URL provided. Please add a video URL in the post editor sidebar.</p>
			</div></figure>';
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

// Register custom Query Filter Container block.
if ( ! function_exists( 'renalinfolk_register_query_filter_block' ) ) :
	/**
	 * Registers the Query Filter Container custom block.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @return void
	 */
	function renalinfolk_register_query_filter_block() {
		// Register the view script
		wp_register_script(
			'renalinfolk-query-filter-view',
			get_theme_file_uri( 'blocks/query-filter-container/build/view.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);

		// Register the block
		register_block_type( __DIR__ . '/blocks/query-filter-container', array(
			'view_script' => 'renalinfolk-query-filter-view',
		) );
	}
endif;
add_action( 'init', 'renalinfolk_register_query_filter_block' );

// Handle query parameter filtering for Query Loop.
if ( ! function_exists( 'renalinfolk_handle_query_filters' ) ) :
	/**
	 * Modifies the main query to respect filter parameters from URL.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @param WP_Query $query The WordPress Query instance.
	 * @return void
	 */
	function renalinfolk_handle_query_filters( $query ) {
		// Skip admin queries
		if ( is_admin() ) {
			return;
		}

		// Only modify main query or Query Loop blocks on frontend
		// Query Loop blocks are not main queries but should still be filtered
		if ( ! $query->is_main_query() ) {
			// Check if this is a Query Loop block query by verifying it's a WP_Query
			// and has filter parameters in the URL
			$has_filters = isset( $_GET['sort'] ) || isset( $_GET['date_after'] ) ||
			               isset( $_GET['date_before'] ) || isset( $_GET['category'] ) ||
			               isset( $_GET['tag'] ) || isset( $_GET['author'] ) || isset( $_GET['s'] );

			if ( ! $has_filters ) {
				return;
			}
		}

		// Handle search FIRST - this is critical for Query Loop blocks
		if ( isset( $_GET['s'] ) && ! empty( $_GET['s'] ) ) {
			$search_term = sanitize_text_field( $_GET['s'] );
			$query->set( 's', $search_term );
			// Ensure post type is set for search (respect existing post_type if set)
			$current_post_type = $query->get( 'post_type' );
			if ( empty( $current_post_type ) ) {
				$query->set( 'post_type', 'post' );
			}
		}

		// Handle sort parameter
		if ( isset( $_GET['sort'] ) ) {
			$sort = sanitize_text_field( $_GET['sort'] );
			switch ( $sort ) {
				case 'date-desc':
					$query->set( 'orderby', 'date' );
					$query->set( 'order', 'DESC' );
					break;
				case 'date-asc':
					$query->set( 'orderby', 'date' );
					$query->set( 'order', 'ASC' );
					break;
				case 'title-asc':
					$query->set( 'orderby', 'title' );
					$query->set( 'order', 'ASC' );
					break;
				case 'title-desc':
					$query->set( 'orderby', 'title' );
					$query->set( 'order', 'DESC' );
					break;
			}
		}

		// Handle date range filtering
		if ( isset( $_GET['date_after'] ) || isset( $_GET['date_before'] ) ) {
			$date_query = array();

			if ( isset( $_GET['date_after'] ) && ! empty( $_GET['date_after'] ) ) {
				$date_query['after'] = sanitize_text_field( $_GET['date_after'] );
			}

			if ( isset( $_GET['date_before'] ) && ! empty( $_GET['date_before'] ) ) {
				$date_query['before'] = sanitize_text_field( $_GET['date_before'] );
			}

			if ( ! empty( $date_query ) ) {
				$date_query['inclusive'] = true;
				$query->set( 'date_query', array( $date_query ) );
			}
		}

		// Handle category filtering (array or comma-separated slugs)
		if ( isset( $_GET['category'] ) && ! empty( $_GET['category'] ) ) {
			if ( is_array( $_GET['category'] ) ) {
				$category_slugs = array_map( 'sanitize_text_field', $_GET['category'] );
			} else {
				$category_slugs = array_map( 'sanitize_text_field', explode( ',', $_GET['category'] ) );
			}
			// Remove empty values
			$category_slugs = array_filter( $category_slugs );
			if ( ! empty( $category_slugs ) ) {
				// Use tax_query to allow combining with existing taxonomy constraints
				$existing_tax_query = $query->get( 'tax_query' );
				if ( ! is_array( $existing_tax_query ) ) {
					$existing_tax_query = array();
				}

				// Add our category filter
				$existing_tax_query[] = array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $category_slugs,
					'operator' => 'IN',
				);

				// Set relation to AND if multiple taxonomies
				if ( count( $existing_tax_query ) > 1 && ! isset( $existing_tax_query['relation'] ) ) {
					$existing_tax_query['relation'] = 'AND';
				}

				$query->set( 'tax_query', $existing_tax_query );
			}
		}

		// Handle tag filtering (array or comma-separated slugs)
		if ( isset( $_GET['tag'] ) && ! empty( $_GET['tag'] ) ) {
			if ( is_array( $_GET['tag'] ) ) {
				$tag_slugs = array_map( 'sanitize_text_field', $_GET['tag'] );
			} else {
				$tag_slugs = array_map( 'sanitize_text_field', explode( ',', $_GET['tag'] ) );
			}
			// Remove empty values
			$tag_slugs = array_filter( $tag_slugs );
			if ( ! empty( $tag_slugs ) ) {
				// Use tax_query to allow combining with existing taxonomy constraints
				$existing_tax_query = $query->get( 'tax_query' );
				if ( ! is_array( $existing_tax_query ) ) {
					$existing_tax_query = array();
				}

				// Add our tag filter
				$existing_tax_query[] = array(
					'taxonomy' => 'post_tag',
					'field'    => 'slug',
					'terms'    => $tag_slugs,
					'operator' => 'IN',
				);

				// Set relation to AND if multiple taxonomies
				if ( count( $existing_tax_query ) > 1 && ! isset( $existing_tax_query['relation'] ) ) {
					$existing_tax_query['relation'] = 'AND';
				}

				$query->set( 'tax_query', $existing_tax_query );
			}
		}

		// Handle author filtering
		if ( isset( $_GET['author'] ) && ! empty( $_GET['author'] ) ) {
			$author_id = absint( $_GET['author'] );
			if ( $author_id > 0 ) {
				$query->set( 'author', $author_id );
			}
		}
	}
endif;
add_action( 'pre_get_posts', 'renalinfolk_handle_query_filters' );

// Add data attributes to article cards for filtering.
if ( ! function_exists( 'renalinfolk_add_article_card_data' ) ) :
	/**
	 * Adds data attributes to article cards for JavaScript filtering.
	 *
	 * @since Renalinfolk 2.0
	 *
	 * @param string $block_content The block content.
	 * @param array  $block The block data.
	 * @return string Modified block content.
	 */
	function renalinfolk_add_article_card_data( $block_content, $block ) {
		// Only process group blocks with article-card class.
		if ( 'core/group' !== $block['blockName'] ) {
			return $block_content;
		}

		if ( ! isset( $block['attrs']['className'] ) || false === strpos( $block['attrs']['className'], 'article-card' ) ) {
			return $block_content;
		}

		// Get post data within the query loop.
		global $post;
		if ( ! $post ) {
			return $block_content;
		}

		// Get post date.
		$post_date     = get_the_date( 'c', $post );
		$post_modified = get_the_modified_date( 'c', $post );

		// Get categories as comma-separated slugs.
		$categories      = get_the_category( $post->ID );
		$category_slugs  = array();
		if ( ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				$category_slugs[] = $category->slug;
			}
		}
		$categories_string = implode( ',', $category_slugs );

		// Add data attributes to the article-card div.
		$block_content = str_replace(
			'data-date=""',
			'data-date="' . esc_attr( $post_date ) . '"',
			$block_content
		);

		$block_content = str_replace(
			'data-modified=""',
			'data-modified="' . esc_attr( $post_modified ) . '"',
			$block_content
		);

		$block_content = str_replace(
			'data-categories=""',
			'data-categories="' . esc_attr( $categories_string ) . '"',
			$block_content
		);

		return $block_content;
	}
endif;
add_filter( 'render_block', 'renalinfolk_add_article_card_data', 10, 2 );

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

/**
 * Get inline SVG icon.
 *
 * Returns inline SVG markup for icons used throughout the theme.
 * Replaces Material Symbols font with optimized inline SVG for better performance.
 *
 * @since Renalinfolk 2.0
 *
 * @param string $name  Icon name (e.g., 'biotech', 'arrow_forward').
 * @param int    $size  Icon size in pixels. Default 24.
 * @param string $color Icon color (CSS color value or CSS variable). Default 'currentColor'.
 * @param string $class Additional CSS classes. Default ''.
 * @param array  $attr  Additional HTML attributes as key => value pairs. Default array().
 *
 * @return string SVG markup or empty string if icon not found.
 */
function renalinfolk_get_icon_svg( $name, $size = 24, $color = 'currentColor', $class = '', $attr = array() ) {
	// Icon SVG path definitions from Material Symbols Outlined
	$icons = array(
		'arrow_forward' => '<path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>',
		'article' => '<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>',
		'biotech' => '<path d="M7 19c-1.1 0-2 .9-2 2h14c0-1.1-.9-2-2-2h-4v-2h3c1.1 0 2-.9 2-2h-8c-1.66 0-3-1.34-3-3 0-1.09.59-2.04 1.47-2.57L8 9.86V19H7zm5-10.5l-.83.83c-.54.54-.83 1.25-.83 2 0 .55.45 1 1 1h3c0-.55-.45-1-1-1l-2-.83-.83-.83L12 8.5zm0-5.5l3 3H9l3-3z"/>',
		'call' => '<path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>',
		'campaign' => '<path d="M18 11v2h4v-2h-4zm-2 6.61c.96.71 2.21 1.65 3.2 2.39.4-.53.8-1.07 1.2-1.6-.99-.74-2.24-1.68-3.2-2.4-.4.54-.8 1.08-1.2 1.61zM20.4 5.6c-.4-.53-.8-1.07-1.2-1.6-.99.74-2.24 1.68-3.2 2.4.4.53.8 1.07 1.2 1.6.96-.72 2.21-1.65 3.2-2.4zM4 9c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h1v4h2v-4h1l5 3V6L8 9H4zm11.5 3c0-1.33-.58-2.53-1.5-3.35v6.69c.92-.81 1.5-2.01 1.5-3.34z"/>',
		'celebration' => '<path d="M2 22l14-5-9-9zM5.5 13.5l6 6 5.5-2-9.5-9.5zM19 12l-1.6-1.6c-.2-.2-.2-.5 0-.7l.3-.3c.2-.2.5-.2.7 0L20 11l3.6-3.6c.2-.2.2-.5 0-.7l-.3-.3c-.2-.2-.5-.2-.7 0L19 10l-1.6-1.6c-.2-.2-.2-.5 0-.7l.3-.3c.2-.2.5-.2.7 0L20 9l2.6-2.6c.2-.2.2-.5 0-.7l-.3-.3c-.2-.2-.5-.2-.7 0L19 8 17.4 6.4c-.2-.2-.2-.5 0-.7l.3-.3c.2-.2.5-.2.7 0L20 7l3.6-3.6c.2-.2.2-.5 0-.7l-.3-.3c-.2-.2-.5-.2-.7 0L19 6l-1.6-1.6c-.2-.2-.2-.5 0-.7l.3-.3c.2-.2.5-.2.7 0L20 5l2.6-2.6c.2-.2.2-.5 0-.7l-.3-.3c-.2-.2-.5-.2-.7 0L19 4z"/>',
		'check_circle' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>',
		'diversity_3' => '<path d="M6.32 13.01c.96.02 1.85.5 2.45 1.34A3.961 3.961 0 0112 12.5c1.47 0 2.76.81 3.45 2.0.28-.48.77-.87 1.34-1.07-.72-.75-1.63-1.29-2.66-1.52.65-.48 1.09-1.24 1.09-2.11 0-1.45-1.18-2.63-2.63-2.63-1.45 0-2.63 1.18-2.63 2.63 0 .87.44 1.63 1.09 2.11-1.03.23-1.94.77-2.66 1.52.57.2 1.06.59 1.34 1.07-.7-1.19-1.99-2.0-3.45-2.0s-2.76.81-3.45 2.0c-.28-.48-.77-.87-1.34-1.07.72-.75 1.63-1.29 2.66-1.52-.65-.48-1.09-1.24-1.09-2.11 0-1.45 1.18-2.63 2.63-2.63 1.45 0 2.63 1.18 2.63 2.63 0 .87-.44 1.63-1.09 2.11 1.03.23 1.94.77 2.66 1.52-.57.2-1.06.59-1.34 1.07zM2 17.5c0-1.38 1.12-2.5 2.5-2.5S7 16.12 7 17.5 5.88 20 4.5 20 2 18.88 2 17.5zm10 0c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5zm5-3c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5z"/>',
		'family_restroom' => '<path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63C19.68 7.55 18.92 7 18.06 7h-.12c-.86 0-1.62.55-1.9 1.37L13.5 16H16v6h4zM8 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm1 10.5h1.5v6c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5v-6H15V9c0-.83-.67-1.5-1.5-1.5h-3C9.67 7.5 9 8.17 9 9v5.5zm-6-3c0-.83.67-1.5 1.5-1.5S6 10.67 6 11.5V17h1v-5.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v8.5h-2v-3H4v3H2v-8.5zM3 7c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>',
		'image' => '<path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>',
		'local_hospital' => '<path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/>',
		'location_on' => '<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>',
		'mail' => '<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>',
		'medical_information' => '<path d="M20 7h-5V4c0-1.1-.9-2-2-2h-2c-1.1 0-2 .9-2 2v3H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zM11 4h2v5h-2V4zm0 12H9v2H7v-2H5v-2h2v-2h2v2h2v2zm7-1h-6v-2h6v2z"/>',
		'play_circle' => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>',
		'psychology' => '<path d="M13 8.57c-.79 0-1.43.64-1.43 1.43s.64 1.43 1.43 1.43 1.43-.64 1.43-1.43-.64-1.43-1.43-1.43z"/><path d="M13 3C9.25 3 6.2 5.94 6.02 9.64L4.1 12.2c-.25.33-.01.8.4.8H6v3c0 1.1.9 2 2 2h1v3h7v-4.68c2.36-1.12 4-3.53 4-6.32 0-3.87-3.13-7-7-7zm3 7c0 .13-.01.26-.02.39l.83.66c.08.06.1.16.05.25l-.8 1.39c-.05.09-.16.12-.24.09l-.99-.4c-.21.16-.43.29-.67.39L14 13.83c-.01.1-.1.17-.2.17h-1.6c-.1 0-.18-.07-.2-.17l-.15-1.06c-.25-.1-.47-.23-.68-.39l-.99.4c-.09.03-.2 0-.25-.09l-.8-1.39c-.05-.09-.03-.19.05-.25l.84-.66c-.01-.13-.02-.26-.02-.39s.01-.26.02-.39l-.84-.66c-.08-.06-.1-.16-.05-.26l.8-1.38c.05-.09.15-.12.24-.09l.99.4c.21-.16.43-.29.68-.39L11.8 6.17c.02-.1.1-.17.2-.17h1.6c.1 0 .18.07.2.17l.15 1.06c.24.1.46.23.67.39l.99-.4c.09-.03.2 0 .24.09l.8 1.38c.05.09.03.19-.05.26l-.83.66c.01.13.02.26.02.39z"/>',
		'schedule' => '<path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>',
	);

	// Check if icon exists
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	// Build attributes
	$svg_attrs = array(
		'width'       => absint( $size ),
		'height'      => absint( $size ),
		'viewBox'     => '0 0 24 24',
		'fill'        => esc_attr( $color ),
		'aria-hidden' => 'true',
		'class'       => 'renalinfolk-icon renalinfolk-icon--' . esc_attr( $name ) . ( $class ? ' ' . esc_attr( $class ) : '' ),
	);

	// Merge additional attributes
	$svg_attrs = array_merge( $svg_attrs, $attr );

	// Build attribute string
	$attr_string = '';
	foreach ( $svg_attrs as $key => $value ) {
		$attr_string .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
	}

	// Return SVG markup
	return sprintf(
		'<svg%s xmlns="http://www.w3.org/2000/svg">%s</svg>',
		$attr_string,
		$icons[ $name ]
	);
}

/**
 * Echo inline SVG icon.
 *
 * Wrapper for renalinfolk_get_icon_svg() that echoes the output.
 *
 * @since Renalinfolk 2.0
 *
 * @param string $name  Icon name.
 * @param int    $size  Icon size in pixels. Default 24.
 * @param string $color Icon color. Default 'currentColor'.
 * @param string $class Additional CSS classes. Default ''.
 * @param array  $attr  Additional HTML attributes. Default array().
 *
 * @return void
 */
function renalinfolk_icon_svg( $name, $size = 24, $color = 'currentColor', $class = '', $attr = array() ) {
	echo renalinfolk_get_icon_svg( $name, $size, $color, $class, $attr );
}
