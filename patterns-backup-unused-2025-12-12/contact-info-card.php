<?php
/**
 * Title: Contact Information Card
 * Slug: renalinfolk/contact-info-card
 * Categories: renalinfolk_medical_content
 * Description: A single contact information card with icon, heading, and content for addresses, phone numbers, emails, or hours
 * Keywords: contact, card, info, address, phone, email, hours
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"},"color":{"background":"#f5f7f8"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-background" style="border-radius:0.75rem;background-color:#f5f7f8;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

	<!-- wp:html -->
	<span class="material-symbols-outlined" style="font-size:1.5rem;color:#2E4F64;">location_on</span>
	<!-- /wp:html -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group">
		
		<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}},"textColor":"primary-dark"} -->
		<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Visit Us', 'renalinfolk' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem"}},"textColor":"text-light"} -->
		<p class="has-text-light-color has-text-color" style="font-size:1rem"><?php esc_html_e( '123 Health Street, Medville, USA 12345', 'renalinfolk' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
