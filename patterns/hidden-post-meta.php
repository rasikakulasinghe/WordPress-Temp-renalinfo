<?php
/**
 * Title: Post Meta
 * Slug: renalinfo-web/hidden-post-meta
 * Categories: hidden
 * Inserter: no
 * Keywords: post, meta, date, category, tag, author
 * Block Types: core/template-part/post-meta
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:post-date {"format":"M j, Y","isLink":false,"fontSize":"sm","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-light"}}}},"textColor":"text-light"} /-->
	
	<!-- wp:paragraph {"fontSize":"sm","textColor":"text-light"} -->
	<p class="has-text-light-color has-text-color has-sm-font-size">·</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:post-terms {"term":"category","separator":" , ","fontSize":"sm","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->
	
	<!-- wp:post-terms {"term":"post_tag","prefix":"Tags: ","separator":" , ","fontSize":"sm","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"left":"var:preset|spacing|30"}}}} /-->
</div>
<!-- /wp:group -->
