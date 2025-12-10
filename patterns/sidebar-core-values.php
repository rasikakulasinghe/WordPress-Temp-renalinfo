<?php
/**
 * Title: Core Values Sidebar
 * Slug: renalinfolk/sidebar-core-values
 * Categories: renalinfolk_medical_content
 * Description: A sticky sidebar card with image and core values list with checkmarks
 * Keywords: values, sidebar, about, mission
 * Viewport Width: 400
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"},"shadow":"0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:0.75rem;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem;position:sticky;top:7rem;box-shadow:0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)">

	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"0.5rem"}}} -->
	<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/team-placeholder.jpg" alt="<?php esc_attr_e( 'A friendly pediatric doctor talking to a young patient', 'renalinfolk' ); ?>" style="border-radius:0.5rem"/></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"1.25rem","bottom":"1rem"}}},"textColor":"primary-dark"} -->
	<h3 class="wp-block-heading has-primary-dark-color has-text-color" style="margin-top:1.25rem;margin-bottom:1rem;font-size:1.25rem;font-weight:700"><?php esc_html_e( 'Our Core Values', 'renalinfolk' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:list {"style":{"spacing":{"padding":{"left":"0"},"margin":{"top":"1rem","bottom":"0"}},"typography":{"lineHeight":"1.6"}},"className":"is-style-checkmark-list"} -->
	<ul style="margin-top:1rem;margin-bottom:0;padding-left:0;line-height:1.6" class="wp-block-list is-style-checkmark-list">
		
		<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0.75rem","bottom":"0.75rem"}}}} -->
		<li style="margin-top:0.75rem;margin-bottom:0.75rem">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<?php echo renalinfolk_get_icon_svg( 'check_circle', 24, 'var(--wp--preset--color--green-blue)' ); ?>
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

		<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0.75rem","bottom":"0.75rem"}}}} -->
		<li style="margin-top:0.75rem;margin-bottom:0.75rem">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<?php echo renalinfolk_get_icon_svg( 'check_circle', 24, 'var(--wp--preset--color--green-blue)' ); ?>
				<!-- /wp:html -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"text-light"} -->
					<p class="has-text-light-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.5"><strong><?php esc_html_e( 'Excellence:', 'renalinfolk' ); ?></strong> <?php esc_html_e( 'We pursue the highest standards in all aspects of our care.', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</li>
		<!-- /wp:list-item -->

		<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0.75rem","bottom":"0.75rem"}}}} -->
		<li style="margin-top:0.75rem;margin-bottom:0.75rem">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<?php echo renalinfolk_get_icon_svg( 'check_circle', 24, 'var(--wp--preset--color--green-blue)' ); ?>
				<!-- /wp:html -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"text-light"} -->
					<p class="has-text-light-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.5"><strong><?php esc_html_e( 'Collaboration:', 'renalinfolk' ); ?></strong> <?php esc_html_e( 'We work as a team with families and referring physicians.', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</li>
		<!-- /wp:list-item -->

		<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0.75rem","bottom":"0.75rem"}}}} -->
		<li style="margin-top:0.75rem;margin-bottom:0.75rem">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<?php echo renalinfolk_get_icon_svg( 'check_circle', 24, 'var(--wp--preset--color--green-blue)' ); ?>
				<!-- /wp:html -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"text-light"} -->
					<p class="has-text-light-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.5"><strong><?php esc_html_e( 'Innovation:', 'renalinfolk' ); ?></strong> <?php esc_html_e( 'We are dedicated to advancing pediatric kidney care through research.', 'renalinfolk' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</li>
		<!-- /wp:list-item -->

	</ul>
	<!-- /wp:list -->

</div>
<!-- /wp:group -->
