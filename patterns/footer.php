<?php
/**
 * Title: Footer
 * Slug: renalinfolk/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer with 5-column layout, logo, menus, and contact information.
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"4rem"}}},"backgroundColor":"footer-dark","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-footer-dark-background-color has-text-color has-background" style="margin-top:4rem;padding-top:3rem;padding-right:var(--wp--preset--spacing--50);padding-bottom:3rem;padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"2rem"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:html -->
				<span class="material-symbols-outlined" style="font-size:1.5rem;color:var(--wp--preset--color--base, #ffffff);">health_and_safety</span>
				<!-- /wp:html -->

				<!-- wp:site-title {"level":2,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"1rem"}}},"textColor":"text-dark"} -->
			<p class="has-text-dark-color has-text-color" style="margin-top:1rem;font-size:0.875rem"><?php esc_html_e( 'Providing compassionate care and valuable resources for families.', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"15%"} -->
		<div class="wp-block-column" style="flex-basis:15%">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"base"} -->
			<h3 class="wp-block-heading has-base-color has-text-color" style="margin-bottom:1rem;font-size:1rem;font-weight:700"><?php esc_html_e( 'Quick Links', 'renalinfolk' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"blockGap":"0.75rem"}},"textColor":"text-dark","layout":{"type":"flex","orientation":"vertical"}} -->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'About Us', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Our Team', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'News & Events', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Contact Us', 'renalinfolk' ); ?>","url":"#"} /-->
			<!-- /wp:navigation -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"15%"} -->
		<div class="wp-block-column" style="flex-basis:15%">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"base"} -->
			<h3 class="wp-block-heading has-base-color has-text-color" style="margin-bottom:1rem;font-size:1rem;font-weight:700"><?php esc_html_e( 'Resources', 'renalinfolk' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:navigation {"overlayMenu":"never","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"blockGap":"0.75rem"}},"textColor":"text-dark","layout":{"type":"flex","orientation":"vertical"}} -->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Articles', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Videos', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Posters', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php esc_html_e( 'FAQs', 'renalinfolk' ); ?>","url":"#"} /-->
			<!-- /wp:navigation -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"30%"} -->
		<div class="wp-block-column" style="flex-basis:30%">

			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1rem","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"base"} -->
			<h3 class="wp-block-heading has-base-color has-text-color" style="margin-bottom:1rem;font-size:1rem;font-weight:700"><?php esc_html_e( 'Contact Info', 'renalinfolk' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">

				<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:html -->
					<span class="material-symbols-outlined" style="font-size:1rem;color:var(--wp--preset--color--text-dark, #E0E0E0);">location_on</span>
					<!-- /wp:html -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"text-dark"} -->
					<p class="has-text-dark-color has-text-color" style="font-size:0.875rem"><?php esc_html_e( '123 Health St, Medville, USA', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:html -->
					<span class="material-symbols-outlined" style="font-size:1rem;color:var(--wp--preset--color--text-dark, #E0E0E0);">call</span>
					<!-- /wp:html -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"text-dark"} -->
					<p class="has-text-dark-color has-text-color" style="font-size:0.875rem"><a href="tel:1234567890"><?php esc_html_e( '(123) 456-7890', 'renalinfolk' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:html -->
					<span class="material-symbols-outlined" style="font-size:1rem;color:var(--wp--preset--color--text-dark, #E0E0E0);">mail</span>
					<!-- /wp:html -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"text-dark"} -->
					<p class="has-text-dark-color has-text-color" style="font-size:0.875rem"><a href="mailto:contact@pednephunit.org"><?php esc_html_e( 'contact@pednephunit.org', 'renalinfolk' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"backgroundColor":"text-dark","className":"is-style-wide","style":{"spacing":{"margin":{"top":"2rem","bottom":"2rem"}}}} -->
	<hr class="wp-block-separator has-text-color has-text-dark-background-color has-alpha-channel-opacity has-text-dark-color has-background is-style-wide" style="margin-top:2rem;margin-bottom:2rem"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"text-dark"} -->
		<p class="has-text-dark-color has-text-color" style="font-size:0.875rem"><?php echo esc_html( '© ' . gmdate( 'Y' ) . ' ' ); ?><?php esc_html_e( 'Pediatric Nephrology Unit. All Rights Reserved.', 'renalinfolk' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"elements":{"link":{"color":{"text":"var:preset|color|text-dark"}}}},"textColor":"text-dark"} -->
			<p class="has-text-dark-color has-text-color has-link-color" style="font-size:0.875rem"><a href="#"><?php esc_html_e( 'Privacy Policy', 'renalinfolk' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"elements":{"link":{"color":{"text":"var:preset|color|text-dark"}}}},"textColor":"text-dark"} -->
			<p class="has-text-dark-color has-text-color has-link-color" style="font-size:0.875rem"><a href="#"><?php esc_html_e( 'Medical Disclaimer', 'renalinfolk' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
