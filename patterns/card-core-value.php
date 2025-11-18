<?php
/**
 * Title: Core Value Card (List Item)
 * Slug: renalinfolk/card-core-value
 * Categories: renalinfolk_medical_content
 * Description: A single core value list item with checkmark icon, bold title, and description
 * Keywords: value, mission, about, list
 * Viewport Width: 400
 */
?>
<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0.75rem","bottom":"0.75rem"}}}} -->
<li style="margin-top:0.75rem;margin-bottom:0.75rem">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group">
		
		<!-- wp:html -->
		<span class="material-symbols-outlined" style="color:var(--wp--preset--color--green-blue);font-size:1.5rem;line-height:1;">check_circle</span>
		<!-- /wp:html -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"text-light"} -->
			<p class="has-text-light-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.5"><strong><?php esc_html_e( 'Compassion:', 'renalinfolk' ); ?></strong> <?php esc_html_e( 'We treat every child and family with empathy and respect.', 'renalinfolk' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->
</li>
<!-- /wp:list-item -->
