import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const {
		showSortOrder,
		showDate,
		showTaxonomy
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
						help={__('Show button-style tag filter in sidebar', 'renalinfolk')}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div className="renalinfolk-query-filter-preview__header">
					<span className="renalinfolk-query-filter-preview__icon">⚙️</span>
					<h3>{__('Query Filter Sidebar', 'renalinfolk')}</h3>
				</div>
				<div className="renalinfolk-query-filter-preview__content">
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
					{__('This block will display a fixed sidebar filter on the frontend.', 'renalinfolk')}
				</div>
			</div>
		</>
	);
}
