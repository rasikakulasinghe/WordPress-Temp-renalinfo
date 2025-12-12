<?php
/**
 * Title: Team Member Card
 * Slug: renalinfolk/card-team-member
 * Categories: renalinfolk_medical_content
 * Description: A single team member card with circular image, name, title, and description
 * Keywords: team, card, staff, doctor, medical
 * Viewport Width: 400
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"border":{"radius":"0.75rem"},"shadow":"0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:0.75rem;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem;box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)">
	
	<!-- wp:image {"width":"128px","height":"128px","scale":"cover","sizeSlug":"large","linkDestination":"none","align":"center","style":{"border":{"radius":"100px"}}} -->
	<figure class="wp-block-image aligncenter size-large is-resized has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/team-placeholder.jpg" alt="<?php esc_attr_e( 'Team member', 'renalinfolk' ); ?>" style="border-radius:100px;object-fit:cover;width:128px;height:128px"/></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"1.25rem","bottom":"0.25rem"}}},"textColor":"primary-dark"} -->
	<h3 class="wp-block-heading has-text-align-center has-primary-dark-color has-text-color" style="margin-top:1.25rem;margin-bottom:0.25rem;font-size:1.25rem;font-weight:700"><?php esc_html_e( 'Dr. Anna Miller, MD', 'renalinfolk' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem","fontWeight":"500"},"spacing":{"margin":{"top":"0.25rem","bottom":"0.75rem"}}},"textColor":"green-blue"} -->
	<p class="has-text-align-center has-green-blue-color has-text-color" style="margin-top:0.25rem;margin-bottom:0.75rem;font-size:0.875rem;font-weight:500"><?php esc_html_e( 'Chief of Pediatric Nephrology', 'renalinfolk' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0.75rem"}}},"textColor":"text-light"} -->
	<p class="has-text-align-center has-text-light-color has-text-color" style="margin-top:0.75rem;font-size:0.875rem;line-height:1.6"><?php esc_html_e( 'Dr. Miller is a renowned expert in childhood kidney diseases with over 20 years of experience.', 'renalinfolk' ); ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
