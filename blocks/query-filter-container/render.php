<?php
/**
 * Query Filter Container Block - Professional Horizontal Layout
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

// Get current URL parameters for sort
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

<div class="wp-block-renalinfolk-query-filter-container">
	<div class="query-filter-bar">
		<form method="GET" action="<?php echo esc_url( $base_url ); ?>" class="query-filter-form">
			<div class="query-filter-grid">
				<?php if ( $show_sort_order ) : ?>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-sort">
							<?php echo esc_html__( 'Sort By', 'renalinfolk' ); ?>
						</label>
						<select
							id="<?php echo esc_attr( $filter_id ); ?>-sort"
							name="sort"
							class="query-filter-select"
						>
							<option value=""><?php echo esc_html__( 'Default', 'renalinfolk' ); ?></option>
							<option value="date-desc" <?php selected( $current_sort, 'date-desc' ); ?>>
								<?php echo esc_html__( 'Newest First', 'renalinfolk' ); ?>
							</option>
							<option value="date-asc" <?php selected( $current_sort, 'date-asc' ); ?>>
								<?php echo esc_html__( 'Oldest First', 'renalinfolk' ); ?>
							</option>
							<option value="title-asc" <?php selected( $current_sort, 'title-asc' ); ?>>
								<?php echo esc_html__( 'Title (A-Z)', 'renalinfolk' ); ?>
							</option>
							<option value="title-desc" <?php selected( $current_sort, 'title-desc' ); ?>>
								<?php echo esc_html__( 'Title (Z-A)', 'renalinfolk' ); ?>
							</option>
						</select>
					</div>
				<?php endif; ?>

				<?php if ( $show_date ) : ?>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-date-after">
							<?php echo esc_html__( 'From Date', 'renalinfolk' ); ?>
						</label>
						<input
							type="date"
							id="<?php echo esc_attr( $filter_id ); ?>-date-after"
							name="date_after"
							value="<?php echo esc_attr( $current_date_after ); ?>"
							class="query-filter-input"
						/>
					</div>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-date-before">
							<?php echo esc_html__( 'To Date', 'renalinfolk' ); ?>
						</label>
						<input
							type="date"
							id="<?php echo esc_attr( $filter_id ); ?>-date-before"
							name="date_before"
							value="<?php echo esc_attr( $current_date_before ); ?>"
							class="query-filter-input"
						/>
					</div>
				<?php endif; ?>

				<?php if ( $show_taxonomy ) : ?>
					<div class="query-filter-field query-filter-field--tags">
						<?php
						$terms = get_terms( array(
							'taxonomy' => 'post_tag',
							'hide_empty' => true,
						) );

						if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) :
						?>
							<label for="<?php echo esc_attr( $filter_id ); ?>-tags">
								<?php echo esc_html__( 'Filter by Tags', 'renalinfolk' ); ?>
							</label>
							<select
								id="<?php echo esc_attr( $filter_id ); ?>-tags"
								name="tag[]"
								class="query-filter-select"
								multiple
								aria-label="<?php echo esc_attr__( 'Select one or more tags to filter articles', 'renalinfolk' ); ?>"
							>
								<?php foreach ( $terms as $term ) : ?>
									<option
										value="<?php echo esc_attr( $term->slug ); ?>"
										<?php echo in_array( $term->slug, $current_tag_terms, true ) ? 'selected' : ''; ?>
									>
										<?php echo esc_html( $term->name ); ?> (<?php echo absint( $term->count ); ?>)
									</option>
								<?php endforeach; ?>
							</select>
							<span class="query-filter-help-text">
								<?php echo esc_html__( 'Hold Ctrl (Windows) or Cmd (Mac) to select multiple', 'renalinfolk' ); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="query-filter-field query-filter-field--actions">
					<button type="submit" class="query-filter-button query-filter-button--primary">
						<?php echo esc_html__( 'Apply Filters', 'renalinfolk' ); ?>
					</button>
					<a href="<?php echo esc_url( $base_url ); ?>" class="query-filter-button query-filter-button--secondary">
						<?php echo esc_html__( 'Reset', 'renalinfolk' ); ?>
					</a>
				</div>
			</div>
		</form>
	</div>
</div>
