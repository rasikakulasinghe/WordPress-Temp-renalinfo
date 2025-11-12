<?php
/**
 * Title: News Grid
 * Slug: renalinfo-web/content-news-grid
 * Categories: renalinfo-web-content
 * Keywords: news, blog, posts, grid, recent, articles
 * Block Types: core/query
 * Viewport Width: 1440
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--x-large)","fontWeight":"700"},"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"primary-dark"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-dark-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60);font-size:var(--wp--preset--font-size--x-large);font-weight:700">Latest Medical Updates</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"var(--wp--preset--border--radius--xl)"}}} /-->

			<!-- wp:post-date {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--small)"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"text-light"} /-->

			<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--large)","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|30"}}},"textColor":"primary-dark"} /-->

			<!-- wp:post-excerpt {"moreText":"Read More →","excerptLength":20,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"text-light"} /-->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
