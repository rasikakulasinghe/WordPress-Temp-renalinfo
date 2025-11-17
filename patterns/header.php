<?php
/**
 * Title: Header
 * Slug: renalinfolk/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with gradient background, logo, navigation, and search.
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 2.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"position":{"type":"sticky","top":"0px"}},"className":"site-header","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull site-header" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"1.25rem","bottom":"1.25rem","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"footer-dark","className":"header-gradient","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull header-gradient has-footer-dark-background-color has-background has-link-color" style="padding-top:1.25rem;padding-right:var(--wp--preset--spacing--50);padding-bottom:1.25rem;padding-left:var(--wp--preset--spacing--50)">

		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignwide">

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">

				<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
			<div class="wp-block-group">

				<!-- wp:navigation {"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'renalinfolk' ); ?>","textColor":"base","overlayBackgroundColor":"footer-dark","overlayTextColor":"base","style":{"typography":{"fontSize":"0.875rem","fontWeight":"700"},"spacing":{"blockGap":"2rem"}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"}} /-->

				<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'renalinfolk' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Search resources...', 'renalinfolk' ); ?>","width":240,"widthUnit":"px","buttonText":"<?php esc_attr_e( 'Search', 'renalinfolk' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"9999px"}}} /-->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
