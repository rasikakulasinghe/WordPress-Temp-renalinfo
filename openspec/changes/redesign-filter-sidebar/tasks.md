# Implementation Tasks

## 1. Block Configuration Updates
- [x] 1.1 Remove `toggleLabel` attribute from `blocks/query-filter-container/block.json`
- [x] 1.2 Update `showTaxonomy` attribute description to clarify it now renders button-style tags
- [x] 1.3 Remove toggle label control from `blocks/query-filter-container/src/edit.js` InspectorControls
- [x] 1.4 Update block preview in editor to show sidebar layout placeholder

## 2. Template Structure Updates
- [x] 2.1 Update `templates/page-gallery-article.html` column widths (33.33% sidebar, 66.66% content)
- [x] 2.2 Ensure proper main content margin/padding to accommodate fixed sidebar
- [x] 2.3 Test template in Site Editor to verify layout renders correctly

## 3. Render PHP Rewrite
- [x] 3.1 Replace collapsible drawer HTML structure in `blocks/query-filter-container/render.php`
- [x] 3.2 Add fixed sidebar wrapper with gradient background classes
- [x] 3.3 Update tag rendering from `<select multiple>` to button grid HTML
- [x] 3.4 Add calendar icon overlays to date inputs (using Material Icons or inline SVG)
- [x] 3.5 Update action buttons section to render at bottom with full-width styling
- [x] 3.6 Remove toggle button HTML and related ARIA attributes
- [x] 3.7 Add hidden input fields for selected tags (to support custom button selection)

## 4. SCSS Complete Rewrite
- [x] 4.1 Remove horizontal layout styles from `blocks/query-filter-container/src/style.scss`
- [x] 4.2 Add fixed sidebar positioning styles (`position: fixed`, `left: 0`, `top: 0`, `height: 100vh`, `width: 320px`, `z-index: 50`)
- [x] 4.3 Apply gradient background: `background: linear-gradient(to bottom, #0d9488, #155e75, #0c4a6e)`
- [x] 4.4 Style tag button grid (3 columns, gap, hover states, selected state with blue background)
- [x] 4.5 Add scrollable tag container styles with custom scrollbar (`::-webkit-scrollbar` rules)
- [x] 4.6 Style date inputs with calendar icon positioning (absolute positioning for icon overlay)
- [x] 4.7 Update action button styles for full-width, stacked layout at sidebar bottom
- [x] 4.8 Add responsive breakpoints for tablet (768-1023px) and mobile (<768px) sidebar adjustments
- [x] 4.9 Ensure proper text color contrast (white/light colors on gradient background)
- [x] 4.10 Test and fix any layout issues with long tag names or many tags

## 5. JavaScript Updates for Custom Tag Selection
- [x] 5.1 Update `blocks/query-filter-container/src/view.js` to remove toggle functionality
- [x] 5.2 Add click handlers for tag button selection/deselection
- [x] 5.3 Implement visual feedback for selected tags (add/remove CSS class for blue background)
- [x] 5.4 Update form submission to collect selected tag slugs from button states
- [x] 5.5 Populate hidden input fields with selected tag slugs on tag button clicks
- [x] 5.6 Ensure tag buttons reflect URL parameters on page load (add selected class if tag in URL)
- [x] 5.7 Test keyboard accessibility for tag button interaction (Space/Enter keys)

## 6. Build and Validation
- [x] 6.1 Run `npm run build` to compile updated JavaScript and SCSS
- [x] 6.2 Validate JavaScript syntax and ensure no console errors
- [x] 6.3 Run PHP syntax check: `C:/xampp/php/php.exe -l blocks/query-filter-container/render.php`
- [x] 6.4 Test in multiple browsers (Chrome, Firefox, Safari, Edge)

## 7. Responsive and Accessibility Testing
- [x] 7.1 Test desktop layout (1200px+) - verify sidebar is 320px and content is properly margined
- [x] 7.2 Test tablet layout (768-1023px) - verify sidebar adjusts appropriately
- [x] 7.3 Test mobile layout (<768px) - verify sidebar converts to collapsible or stacks above content
- [x] 7.4 Test keyboard navigation through all filter controls and tag buttons
- [x] 7.5 Test screen reader announcements for tag selection and form submission
- [x] 7.6 Verify color contrast meets WCAG AA standards (white text on gradient background)
- [x] 7.7 Test touch interaction on mobile devices (44px minimum tap targets)

## 8. Functional Testing
- [x] 8.1 Test Sort By dropdown - verify posts sort correctly on Apply
- [x] 8.2 Test From Date and To Date inputs - verify date range filtering works
- [x] 8.3 Test single tag selection - verify URL parameter and filtered results
- [x] 8.4 Test multiple tag selection - verify comma-separated tag parameter and OR logic
- [x] 8.5 Test Apply Filters button - verify form submission with all active filters
- [x] 8.6 Test Reset button - verify all filters clear and URL resets to base
- [x] 8.7 Test filter persistence - verify selected filters remain after page navigation
- [x] 8.8 Test tag button state on page load with URL parameters present

## 9. Documentation Updates
- [x] 9.1 Update `CLAUDE.md` Custom Blocks section with new sidebar layout details
- [x] 9.2 Document tag button selection behavior (click to select/deselect)
- [x] 9.3 Update responsive design notes for fixed sidebar vs collapsible mobile
- [x] 9.4 Remove references to `toggleLabel` attribute
- [x] 9.5 Add screenshots or usage examples if helpful

## 10. Final Validation
- [x] 10.1 Validate theme.json syntax: `node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"`
- [x] 10.2 Validate OpenSpec proposal: `openspec validate redesign-filter-sidebar --strict`
- [x] 10.3 Test on live XAMPP server at localhost
- [x] 10.4 Verify no console errors or warnings in browser DevTools
- [x] 10.5 Confirm WordPress admin bar does not conflict with fixed sidebar (check z-index)
