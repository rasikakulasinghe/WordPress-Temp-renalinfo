<?php
/**
 * Title: Resource Cards - Home
 * Slug: renalinfolk/resource-cards-home
 * Categories: renalinfolk_medical_content, featured
 * Description: Three-column resource cards with icons for articles, videos, and posters
 * Keywords: resources, cards, articles, videos, posters, materials
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0","margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(1.75rem, 4vw, 2.25rem)","fontWeight":"700"}}} -->
		<h2 class="wp-block-heading" style="font-size:clamp(1.75rem, 4vw, 2.25rem);font-weight:700"><?php esc_html_e( 'Featured Resources', 'renalinfolk' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"primary-dark"} -->
		<p class="has-primary-dark-color has-text-color has-link-color" style="font-size:0.875rem;font-weight:700"><a href="#"><?php esc_html_e( 'View All', 'renalinfolk' ); ?> →</a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"1.25rem","bottom":"1.25rem","left":"1.25rem","right":"1.25rem"}},"border":{"radius":"1rem"},"shadow":"0 1px 3px 0 rgba(0, 0, 0, 0.1)"},"backgroundColor":"base","className":"resource-card"} -->
		<div class="wp-block-column resource-card has-base-background-color has-background" style="border-radius:1rem;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem;box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1)">

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:html -->
				<span class="material-symbols-outlined" style="color: var(--wp--preset--color--green-blue); font-size: 2rem;" aria-hidden="true">article</span>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}}} -->
				<h3 class="wp-block-heading" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Articles', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0.5rem","bottom":"0.5rem"}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="margin-top:0.5rem;margin-bottom:0.5rem;font-size:0.875rem;line-height:1.5"><?php esc_html_e( 'In-depth information on conditions, treatments, and lifestyle advice', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"margin":{"top":"1rem"}},"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"primary-dark"} -->
			<p class="has-primary-dark-color has-text-color has-link-color" style="margin-top:1rem;font-size:0.875rem;font-weight:700"><a href="#"><?php esc_html_e( 'Browse Articles', 'renalinfolk' ); ?> →</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"1.25rem","bottom":"1.25rem","left":"1.25rem","right":"1.25rem"}},"border":{"radius":"1rem"},"shadow":"0 1px 3px 0 rgba(0, 0, 0, 0.1)"},"backgroundColor":"base","className":"resource-card"} -->
		<div class="wp-block-column resource-card has-base-background-color has-background" style="border-radius:1rem;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem;box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1)">

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:html -->
				<span class="material-symbols-outlined" style="color: var(--wp--preset--color--green-blue); font-size: 2rem;" aria-hidden="true">play_circle</span>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}}} -->
				<h3 class="wp-block-heading" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Videos', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0.5rem","bottom":"0.5rem"}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="margin-top:0.5rem;margin-bottom:0.5rem;font-size:0.875rem;line-height:1.5"><?php esc_html_e( 'Watch our specialists explain complex topics in an easy-to-understand format', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"margin":{"top":"1rem"}},"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"primary-dark"} -->
			<p class="has-primary-dark-color has-text-color has-link-color" style="margin-top:1rem;font-size:0.875rem;font-weight:700"><a href="#"><?php esc_html_e( 'Watch Videos', 'renalinfolk' ); ?> →</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"1.25rem","bottom":"1.25rem","left":"1.25rem","right":"1.25rem"}},"border":{"radius":"1rem"},"shadow":"0 1px 3px 0 rgba(0, 0, 0, 0.1)"},"backgroundColor":"base","className":"resource-card"} -->
		<div class="wp-block-column resource-card has-base-background-color has-background" style="border-radius:1rem;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem;box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1)">

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:html -->
				<span class="material-symbols-outlined" style="color: var(--wp--preset--color--green-blue); font-size: 2rem;" aria-hidden="true">image</span>
				<!-- /wp:html -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}}} -->
				<h3 class="wp-block-heading" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Posters', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0.5rem","bottom":"0.5rem"}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="margin-top:0.5rem;margin-bottom:0.5rem;font-size:0.875rem;line-height:1.5"><?php esc_html_e( 'Downloadable posters and infographics for quick reference and learning', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"margin":{"top":"1rem"}},"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"primary-dark"} -->
			<p class="has-primary-dark-color has-text-color has-link-color" style="margin-top:1rem;font-size:0.875rem;font-weight:700"><a href="#"><?php esc_html_e( 'View Posters', 'renalinfolk' ); ?> →</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
