/**
 * Mobile Menu Functionality
 * 
 * Handles drawer open/close, backdrop interactions,
 * keyboard navigation, and body scroll locking.
 *
 * @package RenalInfoLK_Web
 * @since 1.0.0
 */

(function() {
	'use strict';

	/**
	 * Initialize mobile menu when DOM is ready
	 */
	document.addEventListener('DOMContentLoaded', function() {
		initMobileMenu();
	});

	/**
	 * Main initialization function
	 */
	function initMobileMenu() {
		const menuToggle = document.querySelector('.mobile-menu-toggle');
		const menuClose = document.querySelector('.mobile-menu-close');
		const menuDrawer = document.querySelector('.mobile-menu-drawer');
		const menuBackdrop = document.querySelector('.mobile-menu-backdrop');

		// Exit if required elements don't exist
		if (!menuToggle || !menuDrawer || !menuBackdrop) {
			return;
		}

		// Open menu
		menuToggle.addEventListener('click', function(e) {
			e.preventDefault();
			openMenu();
		});

		// Close menu via close button
		if (menuClose) {
			menuClose.addEventListener('click', function(e) {
				e.preventDefault();
				closeMenu();
			});
		}

		// Close menu via backdrop click
		menuBackdrop.addEventListener('click', function() {
			closeMenu();
		});

		// Close menu on Escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && menuDrawer.classList.contains('is-open')) {
				closeMenu();
			}
		});

		// Close menu when clicking links (navigate away)
		const menuLinks = menuDrawer.querySelectorAll('a');
		menuLinks.forEach(function(link) {
			link.addEventListener('click', function() {
				// Small delay to allow navigation
				setTimeout(closeMenu, 100);
			});
		});

		/**
		 * Open mobile menu drawer
		 */
		function openMenu() {
			menuDrawer.classList.add('is-open');
			menuBackdrop.classList.add('is-visible');
			document.body.classList.add('mobile-menu-open');
			
			// Update ARIA states
			menuToggle.setAttribute('aria-expanded', 'true');
			menuDrawer.setAttribute('aria-hidden', 'false');
			
			// Focus first focusable element in drawer
			const firstFocusable = menuDrawer.querySelector('button, a, [tabindex]:not([tabindex="-1"])');
			if (firstFocusable) {
				setTimeout(function() {
					firstFocusable.focus();
				}, 100);
			}

			// Trap focus within drawer
			trapFocus(menuDrawer);
		}

		/**
		 * Close mobile menu drawer
		 */
		function closeMenu() {
			menuDrawer.classList.remove('is-open');
			menuBackdrop.classList.remove('is-visible');
			document.body.classList.remove('mobile-menu-open');
			
			// Update ARIA states
			menuToggle.setAttribute('aria-expanded', 'false');
			menuDrawer.setAttribute('aria-hidden', 'true');
			
			// Return focus to toggle button
			menuToggle.focus();

			// Remove focus trap
			document.removeEventListener('keydown', handleFocusTrap);
		}

		/**
		 * Trap focus within menu drawer
		 * 
		 * @param {HTMLElement} container - The drawer element
		 */
		function trapFocus(container) {
			// Get all focusable elements
			const focusableElements = container.querySelectorAll(
				'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
			);
			const firstFocusable = focusableElements[0];
			const lastFocusable = focusableElements[focusableElements.length - 1];

			// Handle focus trap on Tab key
			document.addEventListener('keydown', handleFocusTrap);

			function handleFocusTrap(e) {
				if (e.key !== 'Tab') {
					return;
				}

				// Shift + Tab (going backwards)
				if (e.shiftKey) {
					if (document.activeElement === firstFocusable) {
						e.preventDefault();
						lastFocusable.focus();
					}
				} 
				// Tab (going forwards)
				else {
					if (document.activeElement === lastFocusable) {
						e.preventDefault();
						firstFocusable.focus();
					}
				}
			}
		}
	}

	/**
	 * Handle window resize - close menu if desktop size
	 */
	let resizeTimer;
	window.addEventListener('resize', function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			if (window.innerWidth > 768) {
				const menuDrawer = document.querySelector('.mobile-menu-drawer');
				const menuBackdrop = document.querySelector('.mobile-menu-backdrop');
				
				if (menuDrawer && menuDrawer.classList.contains('is-open')) {
					menuDrawer.classList.remove('is-open');
					menuBackdrop.classList.remove('is-visible');
					document.body.classList.remove('mobile-menu-open');
				}
			}
		}, 250);
	});

})();
