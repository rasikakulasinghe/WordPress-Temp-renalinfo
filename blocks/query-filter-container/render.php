<?php
/**
 * Query Filter Container Block - Frontend Rendering
 *
 * @package Renalinfolk
 * @since 2.0
 *
 * @var array $attributes Block attributes
 * @var string $content Block content
 * @var WP_Block $block Block instance
 */

// Get block attributes with defaults
$show_search = isset( $attributes['showSearch'] ) ? $attributes['showSearch'] : true;
$show_sort_order = isset( $attributes['showSortOrder'] ) ? $attributes['showSortOrder'] : true;
$show_date = isset( $attributes['showDate'] ) ? $attributes['showDate'] : false;
$show_taxonomy = isset( $attributes['showTaxonomy'] ) ? $attributes['showTaxonomy'] : true;
$target_taxonomy = isset( $attributes['targetTaxonomy'] ) ? $attributes['targetTaxonomy'] : 'category';
$show_author = isset( $attributes['showAuthor'] ) ? $attributes['showAuthor'] : false;
$toggle_label = isset( $attributes['toggleLabel'] ) ? $attributes['toggleLabel'] : __( 'Filter & Sort', 'renalinfolk' );

// Get current URL parameters
$current_search = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
$current_orderby = isset( $_GET['orderby'] ) ? sanitize_text_field( $_GET['orderby'] ) : '';
$current_order = isset( $_GET['order'] ) ? sanitize_text_field( $_GET['order'] ) : '';
$current_date_after = isset( $_GET['date_after'] ) ? sanitize_text_field( $_GET['date_after'] ) : '';
$current_date_before = isset( $_GET['date_before'] ) ? sanitize_text_field( $_GET['date_before'] ) : '';
$current_author = isset( $_GET['author'] ) ? absint( $_GET['author'] ) : 0;

// Get current taxonomy terms
$current_tax_terms = array();
if ( $target_taxonomy === 'category' && isset( $_GET['category'] ) ) {
	$current_tax_terms = array_map( 'sanitize_text_field', explode( ',', $_GET['category'] ) );
} elseif ( $target_taxonomy === 'post_tag' && isset( $_GET['tag'] ) ) {
	$current_tax_terms = array_map( 'sanitize_text_field', explode( ',', $_GET['tag'] ) );
}

// Generate unique ID for ARIA attributes
$filter_id = 'query-filter-' . wp_unique_id();

// Get base URL for reset button
$base_url = strtok( $_SERVER['REQUEST_URI'], '?' );
?>

<div class="wp-block-renalinfolk-query-filter-container">
	<button
		type="button"
		class="query-filter-toggle"
		aria-expanded="false"
		aria-controls="<?php echo esc_attr( $filter_id ); ?>"
	>
		<span class="query-filter-toggle__icon" aria-hidden="true">⚙️</span>
		<span><?php echo esc_html( $toggle_label ); ?></span>
		<span class="query-filter-toggle__arrow" aria-hidden="true">▼</span>
	</button>

	<div
		id="<?php echo esc_attr( $filter_id ); ?>"
		class="query-filter-drawer"
		role="region"
		aria-labelledby="<?php echo esc_attr( $filter_id ); ?>-label"
		hidden
	>
		<form method="GET" action="" class="query-filter-form">
			<div class="query-filter-grid">
				<?php if ( $show_search ) : ?>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-search">
							<?php echo esc_html__( 'Search', 'renalinfolk' ); ?>
						</label>
						<input
							type="text"
							id="<?php echo esc_attr( $filter_id ); ?>-search"
							name="s"
							value="<?php echo esc_attr( $current_search ); ?>"
							placeholder="<?php echo esc_attr__( 'Enter keywords...', 'renalinfolk' ); ?>"
							class="query-filter-input"
						/>
					</div>
				<?php endif; ?>

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
							<option value="date-desc" <?php selected( $current_orderby === 'date' && $current_order === 'desc' ); ?>>
								<?php echo esc_html__( 'Newest First', 'renalinfolk' ); ?>
							</option>
							<option value="date-asc" <?php selected( $current_orderby === 'date' && $current_order === 'asc' ); ?>>
								<?php echo esc_html__( 'Oldest First', 'renalinfolk' ); ?>
							</option>
							<option value="title-asc" <?php selected( $current_orderby === 'title' && $current_order === 'asc' ); ?>>
								<?php echo esc_html__( 'A-Z', 'renalinfolk' ); ?>
							</option>
							<option value="title-desc" <?php selected( $current_orderby === 'title' && $current_order === 'desc' ); ?>>
								<?php echo esc_html__( 'Z-A', 'renalinfolk' ); ?>
							</option>
						</select>
					</div>
				<?php endif; ?>

				<?php if ( $show_date ) : ?>
					<div class="query-filter-field">
						<label for="<?php echo esc_attr( $filter_id ); ?>-date-after">
							<?php echo esc_html__( 'Start Date', 'renalinfolk' ); ?>
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
							<?php echo esc_html__( 'End Date', 'renalinfolk' ); ?>
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
					<div class="query-filter-field query-filter-field--full">
						<?php
						$tax_label = $target_taxonomy === 'category' ? __( 'Categories', 'renalinfolk' ) : __( 'Tags', 'renalinfolk' );
						$terms = get_terms( array(
							'taxonomy' => $target_taxonomy,
							'hide_empty' => true,
						) );

						if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) :
						?>
							<label for="<?php echo esc_attr( $filter_id ); ?>-taxonomy">
								<?php echo esc_html( $tax_label ); ?>
							</label>
							<select
								id="<?php echo esc_attr( $filter_id ); ?>-taxonomy"
								name="<?php echo esc_attr( $target_taxonomy === 'category' ? 'category' : 'tag' ); ?>"
								class="query-filter-select"
								multiple
								size="5"
							>
								<?php foreach ( $terms as $term ) : ?>
									<option
										value="<?php echo esc_attr( $term->slug ); ?>"
										<?php echo in_array( $term->slug, $current_tax_terms, true ) ? 'selected' : ''; ?>
									>
										<?php echo esc_html( $term->name ); ?> (<?php echo absint( $term->count ); ?>)
									</option>
								<?php endforeach; ?>
							</select>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $show_author ) : ?>
					<div class="query-filter-field">
						<?php
						$authors = get_users( array(
							'who' => 'authors',
							'orderby' => 'display_name',
							'order' => 'ASC',
						) );

						if ( ! empty( $authors ) ) :
						?>
							<label for="<?php echo esc_attr( $filter_id ); ?>-author">
								<?php echo esc_html__( 'Author', 'renalinfolk' ); ?>
							</label>
							<select
								id="<?php echo esc_attr( $filter_id ); ?>-author"
								name="author"
								class="query-filter-select"
							>
								<option value=""><?php echo esc_html__( 'All Authors', 'renalinfolk' ); ?></option>
								<?php foreach ( $authors as $author ) : ?>
									<option
										value="<?php echo esc_attr( $author->ID ); ?>"
										<?php selected( $current_author, $author->ID ); ?>
									>
										<?php echo esc_html( $author->display_name ); ?>
									</option>
								<?php endforeach; ?>
							</select>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

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

	<script>
	(function() {
		'use strict';

		// Initialize toggle functionality
		function initToggle() {
			var button = document.querySelector('[aria-controls="<?php echo esc_js( $filter_id ); ?>"]');
			var drawer = document.getElementById('<?php echo esc_js( $filter_id ); ?>');

			if (!button || !drawer) {
				return;
			}

			button.addEventListener('click', function(e) {
				e.preventDefault();
				var isExpanded = this.getAttribute('aria-expanded') === 'true';
				var newState = !isExpanded;

				this.setAttribute('aria-expanded', newState);

				if (newState) {
					drawer.removeAttribute('hidden');
				} else {
					drawer.setAttribute('hidden', '');
				}
			});
		}

		// Run on DOM ready
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initToggle);
		} else {
			initToggle();
		}
	})();
	</script>
</div>

<script>
(function() {
	'use strict';

	// Wait for DOM to be ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initToggle);
	} else {
		initToggle();
	}

	function initToggle() {
		const toggleBtn = document.querySelector('[aria-controls="<?php echo esc_js( $filter_id ); ?>"]');
		const drawer = document.getElementById('<?php echo esc_js( $filter_id ); ?>');

		if (!toggleBtn || !drawer) {
			console.warn('Query filter toggle elements not found');
			return;
		}

		toggleBtn.addEventListener('click', function() {
			const isExpanded = this.getAttribute('aria-expanded') === 'true';
			const newState = !isExpanded;

			// Update button state
			this.setAttribute('aria-expanded', newState);

			// Toggle drawer visibility
			if (newState) {
				drawer.removeAttribute('hidden');
			} else {
				drawer.setAttribute('hidden', '');
			}
		});
	}
})();
</script>
