<?php
/**
 * Title: Announcement Banner
 * Slug: renalinfolk/banner-announcement
 * Categories: renalinfolk_medical_content
 * Description: Event or announcement banner with icon, title, description, and call-to-action button
 * Keywords: announcement, event, banner, webinar, notice
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"2rem","right":"2rem"},"blockGap":"1.5rem","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}},"border":{"radius":"1rem"}},"backgroundColor":"accent","className":"announcement-banner","layout":{"type":"flex","orientation":"horizontal","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide announcement-banner has-accent-background-color has-background" style="border-radius:1rem;margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:1.5rem;padding-right:2rem;padding-bottom:1.5rem;padding-left:2rem">

	<!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">

		<!-- wp:html -->
		<div style="flex-shrink: 0; width: 6rem; height: 6rem; border-radius: 9999px; background-color: var(--wp--preset--color--accent-text); display: flex; align-items: center; justify-content: center;">
			<?php echo renalinfolk_get_icon_svg( 'campaign', 48, 'var(--wp--preset--color--base)' ); ?>
		</div>
		<!-- /wp:html -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(1.25rem, 3vw, 1.5rem)","fontWeight":"700","lineHeight":"1.3"}},"textColor":"accent-text"} -->
			<h2 class="wp-block-heading has-accent-text-color has-text-color" style="font-size:clamp(1.25rem, 3vw, 1.5rem);font-weight:700;line-height:1.3"><?php esc_html_e( 'Upcoming Webinar: Understanding Childhood Kidney Health', 'renalinfolk' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"}},"textColor":"accent-text"} -->
			<p class="has-accent-text-color has-text-color" style="font-size:0.875rem;line-height:1.5"><?php esc_html_e( 'Join us on December 15th at 2 PM EST for an informative session with Dr. Sarah Mitchell. Learn about early detection, prevention strategies, and when to seek specialist care.', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:button {"backgroundColor":"accent-text","textColor":"base","style":{"border":{"radius":"9999px"},"spacing":{"padding":{"top":"0.75rem","bottom":"0.75rem","left":"1.5rem","right":"1.5rem"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontWeight":"700"},"layout":{"selfStretch":"fit","flexSize":null}},"className":"announcement-cta"} -->
	<div class="wp-block-button announcement-cta"><a class="wp-block-button__link has-base-color has-accent-text-background-color has-text-color has-background has-link-color wp-element-button" style="border-radius:9999px;padding-top:0.75rem;padding-right:1.5rem;padding-bottom:0.75rem;padding-left:1.5rem;font-weight:700"><?php esc_html_e( 'Register Now', 'renalinfolk' ); ?></a></div>
	<!-- /wp:button -->

</div>
<!-- /wp:group -->
