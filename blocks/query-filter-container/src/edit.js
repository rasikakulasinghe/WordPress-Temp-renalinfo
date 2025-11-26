import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl, TextControl } from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const {
		showSortOrder,
		showDate,
		showTaxonomy,
		toggleLabel
	} = attributes;

	const blockProps = useBlockProps({
		className: 'renalinfolk-query-filter-preview'
	});

	const activeFilters = [];
	if (showSortOrder) activeFilters.push(__('Sort Order', 'renalinfolk'));
	if (showDate) activeFilters.push(__('Date Range', 'renalinfolk'));
	if (showTaxonomy) activeFilters.push(__('Tags', 'renalinfolk'));

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Filter Settings', 'renalinfolk')} initialOpen={true}>
					<ToggleControl
						label={__('Enable Sort Order', 'renalinfolk')}
						checked={showSortOrder}
						onChange={(value) => setAttributes({ showSortOrder: value })}
						help={__('Allow visitors to sort posts by date or title', 'renalinfolk')}
					/>
					<ToggleControl
						label={__('Enable Date Range', 'renalinfolk')}
						checked={showDate}
						onChange={(value) => setAttributes({ showDate: value })}
						help={__('Allow visitors to filter by date range', 'renalinfolk')}
					/>
					<ToggleControl
						label={__('Enable Tag Filter', 'renalinfolk')}
						checked={showTaxonomy}
						onChange={(value) => setAttributes({ showTaxonomy: value })}
						help={__('Allow visitors to filter by tags', 'renalinfolk')}
					/>
					<TextControl
						label={__('Filter Toggle Button Label', 'renalinfolk')}
						value={toggleLabel}
						onChange={(value) => setAttributes({ toggleLabel: value })}
						help={__('Custom label for the filter toggle button', 'renalinfolk')}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div className="renalinfolk-query-filter-preview__header">
					<span className="renalinfolk-query-filter-preview__icon">⚙️</span>
					<h3>{__('Query Filter Container', 'renalinfolk')}</h3>
				</div>
				<div className="renalinfolk-query-filter-preview__content">
					<p>
						<strong>{__('Toggle Label:', 'renalinfolk')}</strong> {toggleLabel || __('Filter & Sort', 'renalinfolk')}
					</p>
					{activeFilters.length > 0 ? (
						<>
							<p><strong>{__('Active Filters:', 'renalinfolk')}</strong></p>
							<ul>
								{activeFilters.map((filter, index) => (
									<li key={index}>{filter}</li>
								))}
							</ul>
						</>
					) : (
						<p><em>{__('No filters enabled. Use the sidebar to configure filters.', 'renalinfolk')}</em></p>
					)}
				</div>
				<div className="renalinfolk-query-filter-preview__note">
					{__('This block will display a collapsible filter toolbar on the frontend.', 'renalinfolk')}
				</div>
			</div>
		</>
	);
}
