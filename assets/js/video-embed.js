/**
 * Video Embed Handler
 * Converts video URLs from custom fields into responsive embedded players.
 * Supports YouTube, Vimeo, and other oEmbed providers.
 *
 * @package Renalinfolk
 * @since 2.0
 */

(function() {
	'use strict';

	/**
	 * Extract video ID from YouTube URL
	 * Supports: youtube.com/watch?v=ID, youtu.be/ID, youtube.com/embed/ID
	 */
	function getYouTubeId(url) {
		const patterns = [
			/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\?\/]+)/,
			/youtube\.com\/watch\?.*v=([^&]+)/
		];
		
		for (let pattern of patterns) {
			const match = url.match(pattern);
			if (match && match[1]) {
				return match[1];
			}
		}
		return null;
	}

	/**
	 * Extract video ID from Vimeo URL
	 * Supports: vimeo.com/ID, player.vimeo.com/video/ID
	 */
	function getVimeoId(url) {
		const patterns = [
			/vimeo\.com\/(\d+)/,
			/player\.vimeo\.com\/video\/(\d+)/
		];
		
		for (let pattern of patterns) {
			const match = url.match(pattern);
			if (match && match[1]) {
				return match[1];
			}
		}
		return null;
	}

	/**
	 * Create responsive video embed
	 */
	function createVideoEmbed(url) {
		const youtubeId = getYouTubeId(url);
		const vimeoId = getVimeoId(url);

		let embedHtml = '';

		if (youtubeId) {
			embedHtml = `
				<div class="wp-block-embed__wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
					<iframe 
						src="https://www.youtube.com/embed/${youtubeId}"
						style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen
						loading="lazy"
						title="YouTube video player"
					></iframe>
				</div>
			`;
		} else if (vimeoId) {
			embedHtml = `
				<div class="wp-block-embed__wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
					<iframe 
						src="https://player.vimeo.com/video/${vimeoId}"
						style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
						allow="autoplay; fullscreen; picture-in-picture"
						allowfullscreen
						loading="lazy"
						title="Vimeo video player"
					></iframe>
				</div>
			`;
		} else {
			// Fallback: display link if format not recognized
			embedHtml = `
				<div class="wp-block-embed__wrapper">
					<p style="padding: 2rem; background: #f5f7f8; border-radius: 8px; text-align: center;">
						<a href="${url}" target="_blank" rel="noopener noreferrer" style="color: #359EFF; text-decoration: none; font-weight: 600;">
							Watch Video &#8594;
						</a>
					</p>
				</div>
			`;
		}

		return embedHtml;
	}

	/**
	 * Initialize video embeds on page load
	 */
	function initVideoEmbeds() {
		const videoWrapper = document.querySelector('.renalinfolk-video-embed-wrapper');
		
		if (!videoWrapper) {
			return;
		}

		const videoUrl = videoWrapper.textContent.trim();
		
		if (!videoUrl) {
			videoWrapper.innerHTML = `
				<div class="wp-block-embed__wrapper">
					<p style="padding: 2rem; background: #f5f7f8; border-radius: 8px; text-align: center; color: #4A4A4A;">
						No video URL provided. Please add a video URL in the post editor.
					</p>
				</div>
			`;
			return;
		}

		// Convert URL to embed
		const embedHtml = createVideoEmbed(videoUrl);
		
		// Create container with proper WordPress embed classes
		const container = document.createElement('figure');
		container.className = 'wp-block-embed alignwide is-type-video wp-embed-aspect-16-9 wp-has-aspect-ratio';
		container.innerHTML = embedHtml;
		
		// Replace the wrapper with the embed
		videoWrapper.parentNode.replaceChild(container, videoWrapper);
	}

	// Run on DOM ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initVideoEmbeds);
	} else {
		initVideoEmbeds();
	}

})();
