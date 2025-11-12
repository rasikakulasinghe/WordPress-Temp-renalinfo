<?php
/**
 * Title: Two Column Content
 * Slug: renalinfo-web/content-two-column
 * Categories: renalinfo-web-content
 * Keywords: two column, content, image, text, columns
 * Block Types: core/columns
 * Viewport Width: 1440
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--x-large)","fontWeight":"700"}},"textColor":"primary-dark"} -->
			<h2 class="wp-block-heading has-primary-dark-color has-text-color" style="font-size:var(--wp--preset--font-size--x-large);font-weight:700">Comprehensive Kidney Care for Children</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="margin-top:var(--wp--preset--spacing--40)">Our pediatric nephrology platform provides evidence-based medical information about childhood kidney conditions, treatment options, and ongoing care requirements.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color">We support families through every stage of their journey, from initial diagnosis to long-term management, with accessible resources designed for both medical professionals and parents.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color">Access expert guidance on symptoms recognition, diagnostic procedures, treatment protocols, and lifestyle adaptations for children with kidney conditions.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"var(--wp--preset--border--radius--xl)"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-illustration.webp" alt="Medical care illustration" style="border-radius:var(--wp--preset--border--radius--xl);aspect-ratio:16/9;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var(--wp--preset--font-size--small)"}},"textColor":"text-light"} -->
			<p class="has-text-align-center has-text-light-color has-text-color" style="font-size:var(--wp--preset--font-size--small)">Specialized care for pediatric kidney health</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
