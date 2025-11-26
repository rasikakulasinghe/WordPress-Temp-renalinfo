/**
 * Query Filter Container - Frontend JavaScript
 *
 * Handles form cleanup before submission
 */

document.addEventListener('DOMContentLoaded', function() {
	// Get all filter forms
	const forms = document.querySelectorAll('.query-filter-form');

	forms.forEach(function(form) {
		// Clean up empty form fields before submit
		form.addEventListener('submit', function() {
			// Remove empty text inputs and date inputs
			const inputs = form.querySelectorAll('input[type="text"], input[type="date"], input[type="search"]');
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

			// Remove multi-select if nothing is selected
			const multiSelects = form.querySelectorAll('select[multiple]');
			multiSelects.forEach(function(select) {
				const selectedOptions = Array.from(select.selectedOptions);
				if (selectedOptions.length === 0) {
					select.removeAttribute('name');
				}
			});
		});
	});
});
