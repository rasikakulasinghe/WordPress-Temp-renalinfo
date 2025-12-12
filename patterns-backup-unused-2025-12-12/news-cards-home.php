<?php
/**
 * Title: News Cards - Home
 * Slug: renalinfolk/news-cards-home
 * Categories: renalinfolk_medical_content, featured
 * Description: Three-column news and updates cards with featured images, dates, titles, and descriptions
 * Keywords: news, updates, blog, posts, articles, announcements
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50","margin":{"top":"var:preset|spacing|60","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0","margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(1.75rem, 4vw, 2.25rem)","fontWeight":"700"}}} -->
		<h2 class="wp-block-heading" style="font-size:clamp(1.75rem, 4vw, 2.25rem);font-weight:700"><?php esc_html_e( 'Latest News & Updates', 'renalinfolk' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|primary-dark"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"primary-dark"} -->
		<p class="has-primary-dark-color has-text-color has-link-color" style="font-size:0.875rem;font-weight:700"><a href="#"><?php esc_html_e( 'View All News', 'renalinfolk' ); ?> →</a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"},"border":{"radius":"1rem"},"shadow":"0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"},"backgroundColor":"base","className":"news-card","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-column news-card has-base-background-color has-background" style="border-radius:1rem;box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)">

			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"top":"1rem","right":"1rem"}}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/news-research.jpg" alt="<?php esc_attr_e( 'Medical research laboratory with scientist examining samples', 'renalinfolk' ); ?>" style="border-top-left-radius:1rem;border-top-right-radius:1rem;aspect-ratio:16/9;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"blockGap":"0.75rem"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"text-light"} -->
				<p class="has-text-light-color has-text-color" style="font-size:0.75rem;font-weight:500;letter-spacing:0.05em;text-transform:uppercase"><?php esc_html_e( 'October 15, 2023', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700","lineHeight":"1.4"},"spacing":{"margin":{"top":"0.5rem"}}},"textColor":"primary-dark"} -->
				<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="margin-top:0.5rem;font-size:1.125rem;font-weight:700;line-height:1.4"><?php esc_html_e( 'New Study on Early Detection Methods', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0.75rem"}}},"textColor":"text-light"} -->
				<p class="has-text-light-color has-text-color" style="margin-top:0.75rem;font-size:0.875rem;line-height:1.6"><?php esc_html_e( 'Researchers at our unit have published findings on improved screening techniques for pediatric kidney disease.', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"margin":{"top":"1rem"}},"elements":{"link":{"color":{"text":"var:preset|color|green-blue"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"green-blue","layout":{"selfStretch":"fit","flexSize":null}} -->
				<p class="has-green-blue-color has-text-color has-link-color" style="margin-top:1rem;font-size:0.875rem;font-weight:700"><a href="#"><span class="material-symbols-outlined" style="vertical-align: middle; font-size: 1rem; margin-right: 0.25rem;" aria-hidden="true">arrow_forward</span><?php esc_html_e( 'Read More', 'renalinfolk' ); ?></a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"},"border":{"radius":"1rem"},"shadow":"0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"},"backgroundColor":"base","className":"news-card","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-column news-card has-base-background-color has-background" style="border-radius:1rem;box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)">

			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"top":"1rem","right":"1rem"}}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/news-team.jpg" alt="<?php esc_attr_e( 'Hospital medical staff team smiling together', 'renalinfolk' ); ?>" style="border-top-left-radius:1rem;border-top-right-radius:1rem;aspect-ratio:16/9;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"blockGap":"0.75rem"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"text-light"} -->
				<p class="has-text-light-color has-text-color" style="font-size:0.75rem;font-weight:500;letter-spacing:0.05em;text-transform:uppercase"><?php esc_html_e( 'September 28, 2023', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700","lineHeight":"1.4"},"spacing":{"margin":{"top":"0.5rem"}}},"textColor":"primary-dark"} -->
				<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="margin-top:0.5rem;font-size:1.125rem;font-weight:700;line-height:1.4"><?php esc_html_e( 'Welcoming Dr. Elena Vance to Our Team', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0.75rem"}}},"textColor":"text-light"} -->
				<p class="has-text-light-color has-text-color" style="margin-top:0.75rem;font-size:0.875rem;line-height:1.6"><?php esc_html_e( 'We are pleased to announce Dr. Elena Vance has joined our pediatric nephrology team as a senior consultant.', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"margin":{"top":"1rem"}},"elements":{"link":{"color":{"text":"var:preset|color|green-blue"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"green-blue","layout":{"selfStretch":"fit","flexSize":null}} -->
				<p class="has-green-blue-color has-text-color has-link-color" style="margin-top:1rem;font-size:0.875rem;font-weight:700"><a href="#"><span class="material-symbols-outlined" style="vertical-align: middle; font-size: 1rem; margin-right: 0.25rem;" aria-hidden="true">arrow_forward</span><?php esc_html_e( 'Learn More', 'renalinfolk' ); ?></a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"},"border":{"radius":"1rem"},"shadow":"0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"},"backgroundColor":"base","className":"news-card","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
		<div class="wp-block-column news-card has-base-background-color has-background" style="border-radius:1rem;box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)">

			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"top":"1rem","right":"1rem"}}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/news-health-fair.jpg" alt="<?php esc_attr_e( 'Community health fair with kidney health illustration booth', 'renalinfolk' ); ?>" style="border-top-left-radius:1rem;border-top-right-radius:1rem;aspect-ratio:16/9;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"blockGap":"0.75rem"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"stretch"}} -->
			<div class="wp-block-group" style="padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"text-light"} -->
				<p class="has-text-light-color has-text-color" style="font-size:0.75rem;font-weight:500;letter-spacing:0.05em;text-transform:uppercase"><?php esc_html_e( 'August 12, 2023', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700","lineHeight":"1.4"},"spacing":{"margin":{"top":"0.5rem"}}},"textColor":"primary-dark"} -->
				<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="margin-top:0.5rem;font-size:1.125rem;font-weight:700;line-height:1.4"><?php esc_html_e( 'Community Health Fair Success', 'renalinfolk' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0.75rem"}}},"textColor":"text-light"} -->
				<p class="has-text-light-color has-text-color" style="margin-top:0.75rem;font-size:0.875rem;line-height:1.6"><?php esc_html_e( 'Over 300 families attended our annual kidney health screening and education fair. Thank you to all who participated!', 'renalinfolk' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"margin":{"top":"1rem"}},"elements":{"link":{"color":{"text":"var:preset|color|green-blue"},":hover":{"typography":{"textDecoration":"underline"}}}}},"textColor":"green-blue","layout":{"selfStretch":"fit","flexSize":null}} -->
				<p class="has-green-blue-color has-text-color has-link-color" style="margin-top:1rem;font-size:0.875rem;font-weight:700"><a href="#"><span class="material-symbols-outlined" style="vertical-align: middle; font-size: 1rem; margin-right: 0.25rem;" aria-hidden="true">arrow_forward</span><?php esc_html_e( 'View Highlights', 'renalinfolk' ); ?></a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
