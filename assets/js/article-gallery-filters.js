/**
 * Article Gallery Filter and Sort System
 * Handles client-side filtering, sorting, and search for the article gallery
 */

(function() {
	'use strict';

	// Wait for DOM to be ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initGalleryFilters);
	} else {
		initGalleryFilters();
	}

	function initGalleryFilters() {
		console.log('Initializing gallery filters...');

		// Get elements
		const filterButtons = document.querySelectorAll('.filter-category-btn .wp-block-button__link');
		const sortDropdown = document.querySelector('.sort-dropdown');
		const sortOptions = document.querySelectorAll('.sort-option');
		const sortLabel = document.querySelector('.sort-label');
		const searchInput = document.querySelector('.article-search-input input[type="search"]');
		const clearButton = document.querySelector('.clear-filters-btn .wp-block-button__link');
		const articleCards = document.querySelectorAll('.article-card');
		const noResultsMessage = document.querySelector('.wp-block-query-no-results');
		const filterToggle = document.getElementById('article-filter-toggle');
		const filterContent = document.querySelector('.filter-content');

		console.log('Filter buttons found:', filterButtons.length);
		console.log('Article cards found:', articleCards.length);
		console.log('Sort dropdown found:', !!sortDropdown);
		console.log('Search input found:', !!searchInput);

		// State
		let activeCategory = 'all';
		let activeSortBy = 'date';
		let activeSortOrder = 'desc';
		let searchTerm = '';

		// Initialize even if no cards (for debugging)
		if (filterButtons.length === 0) {
			console.warn('No filter buttons found - check template structure');
			return;
		}

		// Category filter click handlers
		filterButtons.forEach(button => {
			button.addEventListener('click', function(e) {
				e.preventDefault();
				console.log('Filter clicked:', this.getAttribute('data-category'));

				// Update active state - work with parent .filter-category-btn div
				const parentBtn = this.closest('.filter-category-btn');
				document.querySelectorAll('.filter-category-btn').forEach(btn => btn.classList.remove('is-active'));
				if (parentBtn) {
					parentBtn.classList.add('is-active');
				}

				// Get category
				activeCategory = this.getAttribute('data-category') || 'all';

				// Apply filters
				applyFilters();
			});
		});

		// Sort dropdown functionality
		if (sortDropdown) {
			const sortButton = sortDropdown.querySelector('.sort-dropdown-toggle');

			if (sortButton) {
				sortButton.addEventListener('click', function(e) {
					e.preventDefault();
					sortDropdown.classList.toggle('is-open');
					console.log('Sort dropdown toggled:', sortDropdown.classList.contains('is-open'));
				});
			}

			// Sort option click handlers
			sortOptions.forEach(option => {
				option.addEventListener('click', function(e) {
					e.preventDefault();

					// Update active state
					sortOptions.forEach(opt => opt.classList.remove('is-active'));
					this.classList.add('is-active');

					// Get sort parameters
					activeSortBy = this.dataset.sortby || 'date';
					activeSortOrder = this.dataset.order || 'desc';

					console.log('Sort changed:', activeSortBy, activeSortOrder);

					// Update label
					if (sortLabel) {
						sortLabel.textContent = this.textContent;
					}

					// Close dropdown
					sortDropdown.classList.remove('is-open');

					// Apply filters
					applyFilters();
				});
			});

			// Close dropdown when clicking outside
			document.addEventListener('click', function(e) {
				if (sortDropdown && !sortDropdown.contains(e.target)) {
					sortDropdown.classList.remove('is-open');
				}
			});
		}

		// Search input handler with debounce
		if (searchInput) {
			let searchTimeout;
			searchInput.addEventListener('input', function() {
				clearTimeout(searchTimeout);
				searchTimeout = setTimeout(() => {
					searchTerm = this.value.toLowerCase().trim();
					console.log('Search term:', searchTerm);
					applyFilters();
				}, 300);
			});
		}

		// Clear filters button
		if (clearButton) {
			clearButton.addEventListener('click', function(e) {
				e.preventDefault();
				console.log('Clearing all filters');

				// Reset state
				activeCategory = 'all';
				activeSortBy = 'date';
				activeSortOrder = 'desc';
				searchTerm = '';

				// Reset UI
				document.querySelectorAll('.filter-category-btn').forEach(btn => btn.classList.remove('is-active'));
				const allButton = document.querySelector('[data-category="all"]');
				if (allButton) {
					const parentBtn = allButton.closest('.filter-category-btn');
					if (parentBtn) {
						parentBtn.classList.add('is-active');
					}
				}

				if (searchInput) {
					searchInput.value = '';
				}

				if (sortLabel) {
					sortLabel.textContent = 'Most Recent';
				}

				sortOptions.forEach(opt => opt.classList.remove('is-active'));
				const defaultSort = document.querySelector('[data-sortby="date"][data-order="desc"]');
				if (defaultSort) {
					defaultSort.classList.add('is-active');
				}

				// Apply filters
				applyFilters();
			});
		}

		// Mobile filter toggle
		if (filterToggle && filterContent) {
			filterToggle.addEventListener('change', function() {
				if (this.checked) {
					filterContent.style.display = 'flex';
				} else {
					filterContent.style.display = 'none';
				}
			});

			// Set initial state based on screen size
			handleResponsive();
			window.addEventListener('resize', handleResponsive);
		}

		// Apply filters and sorting
		function applyFilters() {
			const cardsArray = Array.from(articleCards);
			let visibleCount = 0;

			console.log('Applying filters - Category:', activeCategory, 'Search:', searchTerm);

			// Filter cards
			cardsArray.forEach(card => {
				let isVisible = true;

				// Category filter
				if (activeCategory !== 'all') {
					const categories = card.dataset.categories ? card.dataset.categories.split(',') : [];
					console.log('Card categories:', categories, 'Looking for:', activeCategory);
					if (!categories.includes(activeCategory)) {
						isVisible = false;
					}
				}

				// Search filter
				if (searchTerm && isVisible) {
					const title = card.querySelector('.wp-block-post-title')?.textContent.toLowerCase() || '';
					const excerpt = card.querySelector('.wp-block-post-excerpt')?.textContent.toLowerCase() || '';

					if (!title.includes(searchTerm) && !excerpt.includes(searchTerm)) {
						isVisible = false;
					}
				}

				// Show/hide card
				if (isVisible) {
					card.style.display = '';
					visibleCount++;
				} else {
					card.style.display = 'none';
				}
			});

			console.log('Visible cards:', visibleCount, 'Total cards:', cardsArray.length);

			// Sort visible cards
			const visibleCards = cardsArray.filter(card => card.style.display !== 'none');
			sortCards(visibleCards);

			// Show/hide no results message
			if (noResultsMessage) {
				noResultsMessage.style.display = visibleCount === 0 ? 'block' : 'none';
			}

			// Update URL with filters (optional - for bookmarkability)
			updateURL();
		}

		// Sort cards
		function sortCards(cards) {
			const parent = cards[0]?.parentElement;
			if (!parent) return;

			cards.sort((a, b) => {
				let aValue, bValue;

				switch (activeSortBy) {
					case 'title':
						aValue = a.querySelector('.wp-block-post-title')?.textContent || '';
						bValue = b.querySelector('.wp-block-post-title')?.textContent || '';
						break;

					case 'modified':
						aValue = a.dataset.modified || a.dataset.date || '';
						bValue = b.dataset.modified || b.dataset.date || '';
						break;

					case 'date':
					default:
						aValue = a.dataset.date || '';
						bValue = b.dataset.date || '';
						break;
				}

				// Compare values
				if (activeSortBy === 'title') {
					return activeSortOrder === 'asc'
						? aValue.localeCompare(bValue)
						: bValue.localeCompare(aValue);
				} else {
					// Date comparison
					return activeSortOrder === 'asc'
						? new Date(aValue) - new Date(bValue)
						: new Date(bValue) - new Date(aValue);
				}
			});

			// Re-append in sorted order
			cards.forEach(card => parent.appendChild(card));
		}

		// Update URL with current filters
		function updateURL() {
			const params = new URLSearchParams();

			if (activeCategory !== 'all') {
				params.set('category', activeCategory);
			}

			if (activeSortBy !== 'date') {
				params.set('orderby', activeSortBy);
			}

			if (activeSortOrder !== 'desc') {
				params.set('order', activeSortOrder);
			}

			if (searchTerm) {
				params.set('search', searchTerm);
			}

			const newURL = params.toString()
				? window.location.pathname + '?' + params.toString()
				: window.location.pathname;

			window.history.replaceState({}, '', newURL);
		}

		// Handle responsive behavior
		function handleResponsive() {
			if (!filterContent) return;

			if (window.innerWidth >= 768) {
				// Desktop - always show filters
				filterContent.style.display = 'flex';
				const toggleLabel = document.querySelector('.filter-toggle-label');
				if (toggleLabel) {
					toggleLabel.style.display = 'none';
				}
			} else {
				// Mobile - hide by default
				const toggleLabel = document.querySelector('.filter-toggle-label');
				if (toggleLabel) {
					toggleLabel.style.display = 'flex';
				}
				if (filterToggle && !filterToggle.checked) {
					filterContent.style.display = 'none';
				}
			}
		}

		// Initialize from URL parameters
		function initFromURL() {
			const params = new URLSearchParams(window.location.search);

			const category = params.get('category');
			if (category) {
				activeCategory = category;
				const button = document.querySelector(`[data-category="${category}"]`);
				if (button) {
					const parentBtn = button.closest('.filter-category-btn');
					document.querySelectorAll('.filter-category-btn').forEach(btn => btn.classList.remove('is-active'));
					if (parentBtn) {
						parentBtn.classList.add('is-active');
					}
				}
			}

			const orderby = params.get('orderby');
			const order = params.get('order') || 'desc';
			if (orderby) {
				activeSortBy = orderby;
				activeSortOrder = order;

				const option = document.querySelector(`[data-sortby="${orderby}"][data-order="${order}"]`);
				if (option && sortLabel) {
					sortLabel.textContent = option.textContent;
					sortOptions.forEach(opt => opt.classList.remove('is-active'));
					option.classList.add('is-active');
				}
			}

			const search = params.get('search');
			if (search && searchInput) {
				searchTerm = search;
				searchInput.value = search;
			}

			// Apply initial filters
			applyFilters();
		}

		// Run initialization from URL
		console.log('Running initial setup...');
		initFromURL();
	}
})();
