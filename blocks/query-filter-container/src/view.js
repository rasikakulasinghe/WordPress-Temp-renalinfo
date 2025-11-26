/**
 * WordPress Interactivity API for Query Filter Container
 */

// Use simple vanilla JavaScript for toggle functionality
// since Interactivity API may not be available in all WordPress versions
document.addEventListener('DOMContentLoaded', function() {
	const toggleButtons = document.querySelectorAll('.query-filter-toggle');

	toggleButtons.forEach(function(button) {
		button.addEventListener('click', function() {
			const drawerId = this.getAttribute('aria-controls');
			const drawer = document.getElementById(drawerId);

			if (!drawer) return;

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
	});
});
