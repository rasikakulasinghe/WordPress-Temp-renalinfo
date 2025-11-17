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
<!-- wp:group {"align":"full","className":"header-gradient","style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"#ffffff"}}}},"backgroundColor":"footer-dark","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull header-gradient has-footer-dark-background-color has-background has-link-color" style="padding-top:15px;padding-right:0;padding-bottom:15px;padding-left:0"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":50} /-->

<!-- wp:site-title /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:navigation {"ref":4,"textColor":"secondary","overlayBackgroundColor":"green-blue","overlayTextColor":"secondary","layout":{"type":"flex","justifyContent":"right"}} /-->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search resources...","width":240,"widthUnit":"px","buttonText":"Search","buttonPosition":"no-button","buttonUseIcon":true,"style":{"border":{"radius":"9999px"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->