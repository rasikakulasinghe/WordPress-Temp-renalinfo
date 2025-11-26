<?php
/**
 * Query Filter Container Block - Fixed Sidebar Layout
 *
 * @package Renalinfolk
 * @since 2.0
 *
 * @var array $attributes Block attributes
 * @var string $content Block content
 * @var WP_Block $block Block instance
 */

// Get block attributes with defaults
$show_sort_order = isset( $attributes['showSortOrder'] ) ? $attributes['showSortOrder'] : true;
$show_date = isset( $attributes['showDate'] ) ? $attributes['showDate'] : false;
$show_taxonomy = isset( $attributes['showTaxonomy'] ) ? $attributes['showTaxonomy'] : true;

// Get current URL parameters
$current_sort = isset( $_GET['sort'] ) ? sanitize_text_field( $_GET['sort'] ) : '';
$current_date_after = isset( $_GET['date_after'] ) ? sanitize_text_field( $_GET['date_after'] ) : '';
$current_date_before = isset( $_GET['date_before'] ) ? sanitize_text_field( $_GET['date_before'] ) : '';

// Get current tag terms (handle both array and comma-separated string)
$current_tag_terms = array();
if ( isset( $_GET['tag'] ) ) {
	if ( is_array( $_GET['tag'] ) ) {
		$current_tag_terms = array_map( 'sanitize_text_field', $_GET['tag'] );
	} else {
		$current_tag_terms = array_map( 'sanitize_text_field', explode( ',', $_GET['tag'] ) );
	}
}

// Generate unique ID for form elements
$filter_id = 'query-filter-' . wp_unique_id();

// Get base URL for reset button and form action
$base_url = strtok( $_SERVER['REQUEST_URI'], '?' );
?>

<aside class="wp-block-renalinfolk-query-filter-container query-filter-sidebar">
	<div class="query-filter-sidebar__inner">
		<h2 class="query-filter-sidebar__title"><?php echo esc_html__( 'Filters', 'renalinfolk' ); ?></h2>

		<form method="GET" action="<?php echo esc_url( $base_url ); ?>" class="query-filter-form">
			<div class="query-filter-controls">

				<?php if ( $show_sort_order ) : ?>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-sort" class="query-filter-label">
							<?php echo esc_html__( 'Sort By', 'renalinfolk' ); ?>
						</label>
						<div class="query-filter-select-wrapper">
							<select
								id="<?php echo esc_attr( $filter_id ); ?>-sort"
								name="sort"
								class="query-filter-select"
							>
								<option value=""><?php echo esc_html__( 'Default', 'renalinfolk' ); ?></option>
								<option value="date-desc" <?php selected( $current_sort, 'date-desc' ); ?>>
									<?php echo esc_html__( 'Date Descending', 'renalinfolk' ); ?>
								</option>
								<option value="date-asc" <?php selected( $current_sort, 'date-asc' ); ?>>
									<?php echo esc_html__( 'Date Ascending', 'renalinfolk' ); ?>
								</option>
							</select>
							<span class="query-filter-select-icon" aria-hidden="true">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
							</span>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $show_date ) : ?>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-date-after" class="query-filter-label">
							<?php echo esc_html__( 'From Date', 'renalinfolk' ); ?>
						</label>
						<div class="query-filter-date-wrapper">
							<input
								type="text"
								id="<?php echo esc_attr( $filter_id ); ?>-date-after"
								class="query-filter-input query-filter-date-display"
								value="<?php echo esc_attr( $current_date_after ); ?>"
								placeholder="mm/dd/yyyy"
								readonly
							/>
							<label for="<?php echo esc_attr( $filter_id ); ?>-date-after-picker" class="query-filter-calendar-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
							</label>
							<input
								type="date"
								id="<?php echo esc_attr( $filter_id ); ?>-date-after-picker"
								name="date_after"
								value="<?php echo esc_attr( $current_date_after ); ?>"
								class="query-filter-date-picker"
							/>
						</div>
					</div>

					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-date-before" class="query-filter-label">
							<?php echo esc_html__( 'To Date', 'renalinfolk' ); ?>
						</label>
						<div class="query-filter-date-wrapper">
							<input
								type="text"
								id="<?php echo esc_attr( $filter_id ); ?>-date-before"
								class="query-filter-input query-filter-date-display"
								value="<?php echo esc_attr( $current_date_before ); ?>"
								placeholder="mm/dd/yyyy"
								readonly
							/>
							<label for="<?php echo esc_attr( $filter_id ); ?>-date-before-picker" class="query-filter-calendar-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
							</label>
							<input
								type="date"
								id="<?php echo esc_attr( $filter_id ); ?>-date-before-picker"
								name="date_before"
								value="<?php echo esc_attr( $current_date_before ); ?>"
								class="query-filter-date-picker"
							/>
						</div>
					</div>
				<?php endif; ?>

			</div>

			<?php if ( $show_taxonomy ) : ?>
				<div class="query-filter-tags-section">
					<label class="query-filter-label">
						<?php echo esc_html__( 'Filter By Tags', 'renalinfolk' ); ?>
					</label>
					<p class="query-filter-tags-help">
						<?php echo esc_html__( 'Select multiple tags to refine.', 'renalinfolk' ); ?>
					</p>

					<?php
					$terms = get_terms( array(
						'taxonomy' => 'post_tag',
						'hide_empty' => true,
					) );

					if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) :
					?>
						<div class="query-filter-tags-container">
							<div class="query-filter-tags-grid">
								<?php foreach ( $terms as $term ) :
									$is_selected = in_array( $term->slug, $current_tag_terms, true );
									$button_class = $is_selected ? 'query-filter-tag-button query-filter-tag-button--selected' : 'query-filter-tag-button';
								?>
									<button
										type="button"
										class="<?php echo esc_attr( $button_class ); ?>"
										data-tag-slug="<?php echo esc_attr( $term->slug ); ?>"
										aria-pressed="<?php echo $is_selected ? 'true' : 'false'; ?>"
									>
										<?php echo esc_html( $term->name ); ?> (<?php echo absint( $term->count ); ?>)
									</button>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Hidden input to store selected tags -->
						<input type="hidden" name="tag" id="<?php echo esc_attr( $filter_id ); ?>-tags-input" value="<?php echo esc_attr( implode( ',', $current_tag_terms ) ); ?>" />
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="query-filter-actions">
				<button type="submit" class="query-filter-button query-filter-button--primary">
					<?php echo esc_html__( 'Apply Filters', 'renalinfolk' ); ?>
				</button>
				<a href="<?php echo esc_url( $base_url ); ?>" class="query-filter-button query-filter-button--secondary">
					<?php echo esc_html__( 'Reset', 'renalinfolk' ); ?>
				</a>
			</div>
		</form>
	</div>
</aside>
