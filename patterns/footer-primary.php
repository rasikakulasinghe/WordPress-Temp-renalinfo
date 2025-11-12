<?php
/**
 * Title: Footer Primary
 * Slug: renalinfo-web/footer-primary
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Multi-column footer with links, contact info with icons, and copyright
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|50"}}},"backgroundColor":"footer-dark","textColor":"background-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-light-color has-footer-dark-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size">Quick Links</h3>
			<!-- /wp:heading -->
			
			<!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-default"} -->
			<ul class="is-style-default" style="padding-left:0">
				<li><a href="/about">About Us</a></li>
				<li><a href="/articles">Articles</a></li>
				<li><a href="/videos">Videos</a></li>
				<li><a href="/posters">Posters</a></li>
				<li><a href="/contact">Contact</a></li>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size">Resources</h3>
			<!-- /wp:heading -->
			
			<!-- wp:list {"style":{"spacing":{"padding":{"left":"0"}}},"className":"is-style-default"} -->
			<ul class="is-style-default" style="padding-left:0">
				<li><a href="/resources/guidelines">Medical Guidelines</a></li>
				<li><a href="/resources/research">Research Papers</a></li>
				<li><a href="/resources/education">Patient Education</a></li>
				<li><a href="/resources/tools">Clinical Tools</a></li>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size">Contact Info</h3>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<p style="margin-bottom:var(--wp--preset--spacing--20)">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" style="display:inline-block;vertical-align:middle;margin-right:0.5rem">
					<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
				</svg>
				<a href="mailto:info@renalinfo.lk">info@renalinfo.lk</a>
			</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<p style="margin-bottom:var(--wp--preset--spacing--20)">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" style="display:inline-block;vertical-align:middle;margin-right:0.5rem">
					<path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
				</svg>
				<a href="tel:+94112345678">+94 11 234 5678</a>
			</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:paragraph -->
			<p>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" style="display:inline-block;vertical-align:middle;margin-right:0.5rem">
					<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
				</svg>
				Colombo, Sri Lanka
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	
	<!-- wp:separator {"backgroundColor":"accent-dark","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}}} -->
	<hr class="wp-block-separator has-text-color has-accent-dark-color has-alpha-channel-opacity has-accent-dark-background-color has-background" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--50)"/>
	<!-- /wp:separator -->
	
	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size">
		© 2025 RenalInfoLK Web. All rights reserved. | 
		<a href="/privacy-policy">Privacy Policy</a> | 
		<a href="/terms-of-service">Terms of Service</a>
	</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
