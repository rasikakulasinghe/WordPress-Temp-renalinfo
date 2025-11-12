<?php
/**
 * Title: Header Primary
 * Slug: renalinfo-web/header-primary
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Primary header with gradient background, logo, navigation, and search
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"background":{"backgroundImage":{"url":"","source":"gradient","gradient":"linear-gradient(135deg,#006D77 0%,#1C2541 100%)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);background:linear-gradient(135deg,#006D77 0%,#1C2541 100%)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":50,"shouldSyncIcon":true} /-->
			
			<!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background-light"}}}},"textColor":"background-light","fontSize":"xl"} /-->
		</div>
		<!-- /wp:group -->
		
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"textColor":"background-light","overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
				<!-- wp:navigation-link {"label":"Home","url":"/"} /-->
				<!-- wp:navigation-link {"label":"Articles","url":"/articles"} /-->
				<!-- wp:navigation-link {"label":"Videos","url":"/videos"} /-->
				<!-- wp:navigation-link {"label":"Posters","url":"/posters"} /-->
				<!-- wp:navigation-link {"label":"About","url":"/about"} /-->
				<!-- wp:navigation-link {"label":"Contact","url":"/contact"} /-->
			<!-- /wp:navigation -->
			
			<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search...","width":240,"widthUnit":"px","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"radius":"2rem"}}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
