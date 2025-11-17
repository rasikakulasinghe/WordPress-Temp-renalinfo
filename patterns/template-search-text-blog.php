<?php
/**
 * Title: Text blog search results
 * Slug: renalinfolk/template-search-text-blog
 * Template Types: search
 * Categories: renalinfolk_medical_pages
 * Viewport width: 1400
 * Inserter: yes
 *
 * @package WordPress
 * @subpackage Renalinfolk
 * @since Renalinfolk 1.0
 */

?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:query-title {"type":"search","align":"wide","fontSize":"x-large"} /-->
		<!-- wp:pattern {"slug":"renalinfolk/hidden-search"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->
	<!-- wp:pattern {"slug":"renalinfolk/template-query-loop-text-blog"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
