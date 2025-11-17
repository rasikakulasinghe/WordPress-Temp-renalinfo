<?php
/**
 * Title: Footer with columns
 * Slug: renalinfolk/footer-columns
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Multi-column footer with branding, quick links, resources, and contact information.
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"footer-dark","textColor":"base","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-footer-dark-background-color has-base-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--70);padding-top:0;padding-bottom:0">

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3rem","bottom":"2rem"},"blockGap":"2rem"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:3rem;padding-bottom:2rem">

		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"2rem","left":"2rem"}}}} -->
		<div class="wp-block-columns alignwide">

			<!-- wp:column {"width":"40%","style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-column" style="flex-basis:40%">

				<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">

					<!-- wp:html -->
					<span class="material-symbols-outlined" style="color: var(--wp--preset--color--base); font-size: 1.5rem;" aria-hidden="true">health_and_safety</span>
					<!-- /wp:html -->

					<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} /-->

				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"1rem"}}},"textColor":"base"} -->
				<p class="has-base-color has-text-color" style="margin-top:1rem;font-size:0.875rem;line-height:1.6;opacity:0.8"><?php esc_html_e( 'Providing compassionate care and valuable resources for families navigating childhood kidney health.', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"0.75rem"}}} -->
			<div class="wp-block-column" style="flex-basis:20%">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"base"} -->
				<h3 class="wp-block-heading has-base-color has-text-color" style="font-size:0.875rem;font-weight:700;letter-spacing:0.05em;text-transform:uppercase"><?php esc_html_e( 'Quick Links', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:navigation {"ariaLabel":"<?php esc_attr_e( 'Quick Links', 'renalinfolk' ); ?>","overlayMenu":"never","style":{"spacing":{"blockGap":"0.75rem"},"typography":{"fontSize":"0.875rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'About Us', 'renalinfolk' ); ?>","url":"#"} /-->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Our Team', 'renalinfolk' ); ?>","url":"#"} /-->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'News & Events', 'renalinfolk' ); ?>","url":"#"} /-->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Contact Us', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- /wp:navigation -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"0.75rem"}}} -->
			<div class="wp-block-column" style="flex-basis:20%">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"base"} -->
				<h3 class="wp-block-heading has-base-color has-text-color" style="font-size:0.875rem;font-weight:700;letter-spacing:0.05em;text-transform:uppercase"><?php esc_html_e( 'Resources', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:navigation {"ariaLabel":"<?php esc_attr_e( 'Resources', 'renalinfolk' ); ?>","overlayMenu":"never","style":{"spacing":{"blockGap":"0.75rem"},"typography":{"fontSize":"0.875rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Articles', 'renalinfolk' ); ?>","url":"#"} /-->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Videos', 'renalinfolk' ); ?>","url":"#"} /-->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'Posters', 'renalinfolk' ); ?>","url":"#"} /-->
					<!-- wp:navigation-link {"label":"<?php esc_html_e( 'FAQs', 'renalinfolk' ); ?>","url":"#"} /-->
				<!-- /wp:navigation -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"0.75rem"}}} -->
			<div class="wp-block-column" style="flex-basis:20%">

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"base"} -->
				<h3 class="wp-block-heading has-base-color has-text-color" style="font-size:0.875rem;font-weight:700;letter-spacing:0.05em;text-transform:uppercase"><?php esc_html_e( 'Contact Info', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"base"} -->
					<p class="has-base-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.6;opacity:0.8"><span class="material-symbols-outlined" style="vertical-align: middle; font-size: 1rem; margin-right: 0.5rem;" aria-hidden="true">location_on</span><?php esc_html_e( '123 Health St, Medville, USA', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"base"} -->
					<p class="has-base-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.6;opacity:0.8"><span class="material-symbols-outlined" style="vertical-align: middle; font-size: 1rem; margin-right: 0.5rem;" aria-hidden="true">call</span><?php esc_html_e( '(123) 456-7890', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"base"} -->
					<p class="has-base-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.6;opacity:0.8"><span class="material-symbols-outlined" style="vertical-align: middle; font-size: 1rem; margin-right: 0.5rem;" aria-hidden="true">mail</span><?php esc_html_e( 'contact@pednephunit.org', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"2rem","bottom":"3rem"},"margin":{"top":"0"}},"border":{"top":{"color":"#ffffff33","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="border-top-color:#ffffff33;border-top-width:1px;margin-top:0;padding-top:2rem;padding-bottom:3rem">

		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"base"} -->
			<p class="has-base-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;opacity:0.6">
				<?php
				printf(
					/* translators: %s: current year */
					esc_html__( '© %s Pediatric Nephrology Unit. All Rights Reserved.', 'renalinfolk' ),
					date_i18n( 'Y' )
				);
				?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"base"} -->
				<p class="has-base-color has-text-color has-link-color" style="font-size:0.875rem;opacity:0.6"><a href="#"><?php esc_html_e( 'Privacy Policy', 'renalinfolk' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"base"} -->
				<p class="has-base-color has-text-color has-link-color" style="font-size:0.875rem;opacity:0.6"><a href="#"><?php esc_html_e( 'Medical Disclaimer', 'renalinfolk' ); ?></a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
