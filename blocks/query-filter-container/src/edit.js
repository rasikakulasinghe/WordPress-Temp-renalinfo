import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl, TextControl, SelectControl } from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const {
		showSearch,
		showSortOrder,
		showDate,
		showTaxonomy,
		targetTaxonomy,
		showAuthor,
		toggleLabel
	} = attributes;

	const blockProps = useBlockProps({
		className: 'renalinfolk-query-filter-preview'
	});

	const activeFilters = [];
	if (showSearch) activeFilters.push(__('Search', 'renalinfolk'));
	if (showSortOrder) activeFilters.push(__('Sort Order', 'renalinfolk'));
	if (showDate) activeFilters.push(__('Date Range', 'renalinfolk'));
	if (showTaxonomy) {
		const taxonomyName = targetTaxonomy === 'category'
			? __('Categories', 'renalinfolk')
			: __('Tags', 'renalinfolk');
		activeFilters.push(`${__('Taxonomy', 'renalinfolk')} (${taxonomyName})`);
	}
	if (showAuthor) activeFilters.push(__('Author', 'renalinfolk'));

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Filter Settings', 'renalinfolk')} initialOpen={true}>
					<ToggleControl
						label={__('Enable Search', 'renalinfolk')}
						checked={showSearch}
						onChange={(value) => setAttributes({ showSearch: value })}
						help={__('Allow visitors to search posts by keyword', 'renalinfolk')}
					/>
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
						label={__('Enable Taxonomy Filter', 'renalinfolk')}
						checked={showTaxonomy}
						onChange={(value) => setAttributes({ showTaxonomy: value })}
						help={__('Allow visitors to filter by category or tag', 'renalinfolk')}
					/>
					{showTaxonomy && (
						<SelectControl
							label={__('Select Taxonomy', 'renalinfolk')}
							value={targetTaxonomy}
							options={[
								{ label: __('Categories', 'renalinfolk'), value: 'category' },
								{ label: __('Tags', 'renalinfolk'), value: 'post_tag' }
							]}
							onChange={(value) => setAttributes({ targetTaxonomy: value })}
							help={__('Choose which taxonomy to display', 'renalinfolk')}
						/>
					)}
					<ToggleControl
						label={__('Enable Author Filter', 'renalinfolk')}
						checked={showAuthor}
						onChange={(value) => setAttributes({ showAuthor: value })}
						help={__('Allow visitors to filter by author', 'renalinfolk')}
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
