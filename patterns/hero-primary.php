<?php
/**
 * Title: Hero Primary
 * Slug: renalinfo-web/hero-primary
 * Categories: renalinfo-web-heroes
 * Description: Main hero section with heading, description, CTA buttons, and hero illustration
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"level":1,"fontSize":"3xl","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
			<h1 class="wp-block-heading has-3-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--40)">
				Empowering Healthcare Through Knowledge
			</h1>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph {"fontSize":"lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
			<p class="has-lg-font-size" style="margin-bottom:var(--wp--preset--spacing--50)">
				Access comprehensive pediatric nephrology resources, research articles, educational videos, and clinical tools designed for healthcare professionals and educators.
			</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"cta-yellow","textColor":"accent-text"} -->
				<div class="wp-block-button">
					<a class="wp-block-button__link has-accent-text-color has-cta-yellow-background-color has-text-color has-background wp-element-button" href="/articles">
						Browse Articles
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" style="display:inline-block;vertical-align:middle;margin-left:0.5rem">
							<path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
						</svg>
					</a>
				</div>
				<!-- /wp:button -->
				
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link wp-element-button" href="/videos">Watch Videos</a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"0.5rem"}}} -->
			<figure class="wp-block-image size-full has-custom-border">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-illustration.svg' ); ?>" 
				     alt="Pediatric Nephrology Knowledge Platform Illustration" 
				     style="border-radius:0.5rem"/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
