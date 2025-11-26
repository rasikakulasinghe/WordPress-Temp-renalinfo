/**
 * Query Filter Container - Frontend JavaScript
 *
 * Handles tag button selection and date picker synchronization
 */

document.addEventListener('DOMContentLoaded', function() {
	// Get all filter forms
	const forms = document.querySelectorAll('.query-filter-form');

	forms.forEach(function(form) {
		// Handle tag button selection
		const tagButtons = form.querySelectorAll('.query-filter-tag-button');
		const tagInput = form.querySelector('input[name="tag"]');

		if (tagButtons.length > 0 && tagInput) {
			tagButtons.forEach(function(button) {
				// Handle click events
				button.addEventListener('click', function(e) {
					e.preventDefault();
					toggleTagSelection(button, tagInput);
				});

				// Handle keyboard events (Space and Enter)
				button.addEventListener('keydown', function(e) {
					if (e.key === ' ' || e.key === 'Enter') {
						e.preventDefault();
						toggleTagSelection(button, tagInput);
					}
				});
			});
		}

		// Handle date picker synchronization
		const datePickers = form.querySelectorAll('.query-filter-date-picker');
		datePickers.forEach(function(picker) {
			// Sync date picker value to display input
			picker.addEventListener('change', function() {
				const pickerId = picker.id;
				const displayId = pickerId.replace('-picker', '');
				const displayInput = form.querySelector('#' + displayId);

				if (displayInput) {
					displayInput.value = picker.value;
				}
			});

			// Direct click on hidden picker
			picker.addEventListener('click', function() {
				if (typeof picker.showPicker === 'function') {
					try {
						picker.showPicker();
					} catch (err) {
						// Silently fail if showPicker is not supported
					}
				}
			});
		});

		// Handle calendar icon clicks to open date picker
		const calendarIcons = form.querySelectorAll('.query-filter-calendar-icon');
		calendarIcons.forEach(function(icon) {
			icon.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				const pickerId = icon.getAttribute('for');
				const picker = form.querySelector('#' + pickerId);

				if (picker) {
					// Focus the picker first
					picker.focus();

					// Try showPicker() for modern browsers
					if (typeof picker.showPicker === 'function') {
						try {
							picker.showPicker();
						} catch (err) {
							console.warn('showPicker failed:', err);
							// Create and dispatch click event
							const clickEvent = new MouseEvent('click', {
								bubbles: true,
								cancelable: true,
								view: window
							});
							picker.dispatchEvent(clickEvent);
						}
					} else {
						// Create and dispatch click event for older browsers
						const clickEvent = new MouseEvent('click', {
							bubbles: true,
							cancelable: true,
							view: window
						});
						picker.dispatchEvent(clickEvent);
					}
				}
			});
		});

		// Handle display input clicks to open date picker
		const displayInputs = form.querySelectorAll('.query-filter-date-display');
		displayInputs.forEach(function(displayInput) {
			displayInput.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				const displayId = displayInput.id;
				const pickerId = displayId + '-picker';
				const picker = form.querySelector('#' + pickerId);

				if (picker) {
					// Focus the picker first
					picker.focus();

					// Try showPicker() for modern browsers
					if (typeof picker.showPicker === 'function') {
						try {
							picker.showPicker();
						} catch (err) {
							console.warn('showPicker failed:', err);
							// Create and dispatch click event
							const clickEvent = new MouseEvent('click', {
								bubbles: true,
								cancelable: true,
								view: window
							});
							picker.dispatchEvent(clickEvent);
						}
					} else {
						// Create and dispatch click event for older browsers
						const clickEvent = new MouseEvent('click', {
							bubbles: true,
							cancelable: true,
							view: window
						});
						picker.dispatchEvent(clickEvent);
					}
				}
			});
		});

		// Clean up empty form fields before submit
		form.addEventListener('submit', function() {
			// Remove empty text inputs and date inputs
			const inputs = form.querySelectorAll('input[type="text"], input[type="date"]:not(.query-filter-date-picker)');
			inputs.forEach(function(input) {
				if (!input.value || input.value.trim() === '') {
					input.removeAttribute('name');
				}
			});

			// Remove empty single selects
			const selects = form.querySelectorAll('select:not([multiple])');
			selects.forEach(function(select) {
				if (!select.value || select.value === '') {
					select.removeAttribute('name');
				}
			});

			// Remove tag input if empty
			if (tagInput && (!tagInput.value || tagInput.value.trim() === '')) {
				tagInput.removeAttribute('name');
			}
		});
	});

	/**
	 * Toggle tag button selection state
	 *
	 * @param {HTMLElement} button - The tag button element
	 * @param {HTMLInputElement} input - The hidden input for tag slugs
	 */
	function toggleTagSelection(button, input) {
		const tagSlug = button.getAttribute('data-tag-slug');
		const isSelected = button.classList.contains('query-filter-tag-button--selected');

		// Get current tags from hidden input
		let currentTags = input.value ? input.value.split(',').filter(Boolean) : [];

		if (isSelected) {
			// Deselect: remove from array
			currentTags = currentTags.filter(function(slug) {
				return slug !== tagSlug;
			});
			button.classList.remove('query-filter-tag-button--selected');
			button.setAttribute('aria-pressed', 'false');
		} else {
			// Select: add to array
			if (!currentTags.includes(tagSlug)) {
				currentTags.push(tagSlug);
			}
			button.classList.add('query-filter-tag-button--selected');
			button.setAttribute('aria-pressed', 'true');
		}

		// Update hidden input value
		input.value = currentTags.join(',');
	}
});
