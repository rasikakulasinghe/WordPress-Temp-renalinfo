<?php
/**
 * Title: Contact Information Cards Set
 * Slug: renalinfolk/contact-info-cards-set
 * Categories: renalinfolk_medical_pages
 * Description: Complete set of four contact information cards (location, phone, email, hours) with icons and proper styling
 * Keywords: contact, cards, information, address, phone, email, hours
 * Viewport Width: 600
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">

	<!-- LOCATION CARD -->
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

	<!-- PHONE CARD -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"},"color":{"background":"#f5f7f8"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-background" style="border-radius:0.75rem;background-color:#f5f7f8;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

		<!-- wp:html -->
		<span class="material-symbols-outlined" style="font-size:1.5rem;color:#2E4F64;">call</span>
		<!-- /wp:html -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}},"textColor":"primary-dark"} -->
			<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Call Us', 'renalinfolk' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem"},"elements":{"link":{"color":{"text":"var:preset|color|text-light"}}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color has-link-color" style="font-size:1rem"><a href="tel:1234567890"><?php esc_html_e( '(123) 456-7890', 'renalinfolk' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- EMAIL CARD -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"},"color":{"background":"#f5f7f8"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-background" style="border-radius:0.75rem;background-color:#f5f7f8;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

		<!-- wp:html -->
		<span class="material-symbols-outlined" style="font-size:1.5rem;color:#2E4F64;">mail</span>
		<!-- /wp:html -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}},"textColor":"primary-dark"} -->
			<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Email Us', 'renalinfolk' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem"},"elements":{"link":{"color":{"text":"var:preset|color|text-light"}}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color has-link-color" style="font-size:1rem"><a href="mailto:contact@pednephunit.org"><?php esc_html_e( 'contact@pednephunit.org', 'renalinfolk' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- HOURS CARD -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"},"color":{"background":"#f5f7f8"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-background" style="border-radius:0.75rem;background-color:#f5f7f8;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">

		<!-- wp:html -->
		<span class="material-symbols-outlined" style="font-size:1.5rem;color:#2E4F64;">schedule</span>
		<!-- /wp:html -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700"}},"textColor":"primary-dark"} -->
			<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="font-size:1.125rem;font-weight:700"><?php esc_html_e( 'Office Hours', 'renalinfolk' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem"}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="font-size:1rem"><?php esc_html_e( 'Monday - Friday: 8:00 AM - 5:00 PM', 'renalinfolk' ); ?><br><?php esc_html_e( 'Saturday: 9:00 AM - 1:00 PM', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
