<?php
/**
 * Title: Home Hero - Medical
 * Slug: renalinfolk/hero-home-medical
 * Categories: renalinfolk_medical_pages, featured
 * Description: Two-column hero section for the home page with heading, description, CTA buttons, and featured image
 * Keywords: hero, home, medical, pediatric, welcome
 * Viewport Width: 1400
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","className":"hero-home-medical","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull hero-home-medical has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(2.25rem, 6vw, 3.75rem)","fontWeight":"900","lineHeight":"1.1"}},"textColor":"primary-dark"} -->
			<h1 class="wp-block-heading has-primary-dark-color has-text-color" style="font-size:clamp(2.25rem, 6vw, 3.75rem);font-weight:900;line-height:1.1"><?php esc_html_e( 'Compassionate Care for Young Kidneys', 'renalinfolk' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);font-size:1.125rem;line-height:1.6"><?php esc_html_e( 'Expert pediatric nephrology care, trusted resources, and support for families navigating childhood kidney health.', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-buttons">

				<!-- wp:button {"backgroundColor":"cta-yellow","textColor":"footer-dark","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}},"elements":{"link":{"color":{"text":"var:preset|color|footer-dark"}}},"typography":{"fontWeight":"700"},"shadow":"0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"},"className":"cta-primary"} -->
				<div class="wp-block-button cta-primary"><a class="wp-block-button__link has-footer-dark-color has-cta-yellow-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:9999px;padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem;font-weight:700;box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"><span class="material-symbols-outlined" style="vertical-align: middle; margin-right: 0.5rem;" aria-hidden="true">family_restroom</span><?php esc_html_e( 'Explore Parent Resources', 'renalinfolk' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"backgroundColor":"base","textColor":"primary-dark","style":{"border":{"radius":"9999px","width":"2px","color":"var:preset|color|primary-dark"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}},"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"}}},"typography":{"fontWeight":"700"}},"className":"cta-secondary"} -->
				<div class="wp-block-button cta-secondary"><a class="wp-block-button__link has-primary-dark-color has-base-background-color has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:var(--wp--preset--color--primary-dark);border-width:2px;border-radius:9999px;padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem;font-weight:700"><span class="material-symbols-outlined" style="vertical-align: middle; margin-right: 0.5rem;" aria-hidden="true">medical_information</span><?php esc_html_e( 'Access Professional Guidelines', 'renalinfolk' ); ?></a></div>
				<!-- /wp:button -->

			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"hero-image","style":{"border":{"radius":"1rem"},"shadow":"0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)"}} -->
			<figure class="wp-block-image size-large has-custom-border hero-image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-pediatric-care.jpg" alt="<?php esc_attr_e( 'Friendly doctor in a sunlit pediatric clinic smiling with a young child and their parent', 'renalinfolk' ); ?>" style="border-radius:1rem;aspect-ratio:4/3;object-fit:cover;box-shadow:0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)"/></figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
