/**
 * Video Meta Editor
 * Adds custom meta field controls to the block editor sidebar for video posts.
 *
 * @package Renalinfolk
 * @since 2.0
 */

(function(wp) {
	'use strict';

	if (!wp || !wp.plugins || !wp.editPost || !wp.element || !wp.components || !wp.data) {
		return;
	}

	const { registerPlugin } = wp.plugins;
	const { PluginDocumentSettingPanel } = wp.editPost;
	const { PanelRow, TextControl, TextareaControl } = wp.components;
	const { useSelect, useDispatch } = wp.data;
	const { createElement: el } = wp.element;

	/**
	 * Video Meta Fields Panel Component
	 */
	const VideoMetaPanel = function() {
		// Get current post format and meta values
		const postFormat = useSelect(function(select) {
			const editor = select('core/editor');
			return editor.getEditedPostAttribute('format');
		}, []);

		const videoUrl = useSelect(function(select) {
			return select('core/editor').getEditedPostAttribute('meta')?.renalinfolk_video_url || '';
		}, []);

		const videoDuration = useSelect(function(select) {
			return select('core/editor').getEditedPostAttribute('meta')?.renalinfolk_video_duration || '';
		}, []);

		// Get function to update meta
		const { editPost } = useDispatch('core/editor');

		// Only show for video format posts
		if (postFormat !== 'video') {
			return null;
		}

		// Update video URL
		const onChangeVideoUrl = function(value) {
			editPost({
				meta: { renalinfolk_video_url: value }
			});
		};

		// Update video duration
		const onChangeVideoDuration = function(value) {
			editPost({
				meta: { renalinfolk_video_duration: value }
			});
		};

		return el(
			PluginDocumentSettingPanel,
			{
				name: 'video-meta-panel',
				title: 'Video Settings',
				icon: 'video-alt3'
			},
			el(
				PanelRow,
				{},
				el(TextareaControl, {
					label: 'Video URL',
					help: 'Enter the full YouTube or Vimeo video URL (e.g., https://www.youtube.com/watch?v=...)',
					value: videoUrl,
					onChange: onChangeVideoUrl,
					placeholder: 'https://www.youtube.com/watch?v=...',
					rows: 3
				})
			),
			el(
				PanelRow,
				{},
				el(TextControl, {
					label: 'Duration',
					help: 'Video length (e.g., "5:30" or "12 min")',
					value: videoDuration,
					onChange: onChangeVideoDuration,
					placeholder: '5:30'
				})
			),
			el(
				PanelRow,
				{},
				el('div', {
					style: {
						fontSize: '12px',
						color: '#757575',
						marginTop: '8px',
						padding: '12px',
						background: '#f0f0f1',
						borderRadius: '4px',
						borderLeft: '3px solid #359EFF'
					}
				},
					el('strong', {}, '💡 Tip: '),
					'Copy the full video URL from your browser address bar when viewing the video on YouTube or Vimeo.'
				)
			)
		);
	};

	// Register the plugin
	registerPlugin('renalinfolk-video-meta', {
		render: VideoMetaPanel,
		icon: 'video-alt3'
	});

})(window.wp);
