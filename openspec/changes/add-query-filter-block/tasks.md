# Implementation Tasks: Query Filter Container Block

## 1. Project Setup and Build Tooling
- [ ] 1.1 Initialize `package.json` if it doesn't exist (`npm init -y`)
- [ ] 1.2 Install `@wordpress/scripts` as dev dependency (`npm install --save-dev @wordpress/scripts`)
- [ ] 1.3 Add build scripts to `package.json`: `"build": "@wordpress/scripts build"`, `"start": "@wordpress/scripts start"`
- [ ] 1.4 Create `.gitignore` entry for `node_modules/` and optionally `build/` (or commit built assets for deployments without Node.js)
- [ ] 1.5 Update `CLAUDE.md` with build instructions and npm commands

## 2. Block Directory and Core Files
- [ ] 2.1 Create directory `blocks/query-filter-container/`
- [ ] 2.2 Create `block.json` with metadata (name, title, category, icon, attributes, supports, textdomain, editorScript, script, style)
- [ ] 2.3 Define attributes in `block.json`: `showSearch`, `showDate`, `showTaxonomy`, `targetTaxonomy`, `showAuthor`, `showSortOrder`, `toggleLabel`
- [ ] 2.4 Create `src/index.js` as entry point (imports `edit.js`, `save.js`, registers block)
- [ ] 2.5 Create `src/edit.js` placeholder with basic structure
- [ ] 2.6 Create `src/save.js` returning `null` (dynamic block renders via PHP)
- [ ] 2.7 Verify `package.json` has correct `main` entry pointing to `src/index.js`

## 3. Admin Interface (Inspector Controls)
- [ ] 3.1 Import `InspectorControls`, `PanelBody`, `ToggleControl`, `TextControl`, `SelectControl` from `@wordpress/components` in `edit.js`
- [ ] 3.2 Add PanelBody titled "Filter Settings" in InspectorControls
- [ ] 3.3 Implement ToggleControl for "Enable Search" binding to `attributes.showSearch`
- [ ] 3.4 Implement ToggleControl for "Enable Sort Order" binding to `attributes.showSortOrder`
- [ ] 3.5 Implement ToggleControl for "Enable Date Range" binding to `attributes.showDate`
- [ ] 3.6 Implement ToggleControl for "Enable Taxonomy Filter" binding to `attributes.showTaxonomy`
- [ ] 3.7 Add conditional SelectControl for "Select Taxonomy" (options: category, post_tag) shown only when `showTaxonomy` is true
- [ ] 3.8 Implement ToggleControl for "Enable Author Filter" binding to `attributes.showAuthor`
- [ ] 3.9 Implement TextControl for "Filter Toggle Button Label" binding to `attributes.toggleLabel` with default "Filter & Sort"
- [ ] 3.10 Test all controls update attributes correctly in Site Editor

## 4. Editor Preview Component
- [ ] 4.1 Import `useBlockProps` from `@wordpress/block-editor` in `edit.js`
- [ ] 4.2 Create placeholder preview component showing "Query Filter Container" title
- [ ] 4.3 Display active filter indicators (e.g., "Active: Search, Taxonomy (category), Sort Order") based on enabled attributes
- [ ] 4.4 Add editor-only styles in `src/editor.scss` (border, padding, background to make placeholder visible)
- [ ] 4.5 Test preview renders correctly in Site Editor

## 5. PHP Rendering Template
- [ ] 5.1 Create `render.php` in block directory
- [ ] 5.2 Access block attributes via `$attributes` variable
- [ ] 5.3 Implement form opening tag with `method="GET"` and `action=""` (submits to current URL)
- [ ] 5.4 Add toggle button with `data-wp-interactive` attributes for Interactivity API
- [ ] 5.5 Wrap filter inputs in a container div with `aria-labelledby`, `role="region"`, and conditional `hidden` attribute
- [ ] 5.6 Conditionally render search input if `$attributes['showSearch']` is true
- [ ] 5.7 Pre-populate search input value from `$_GET['s']` if present
- [ ] 5.8 Conditionally render sort order dropdown if `$attributes['showSortOrder']` is true
- [ ] 5.9 Pre-select sort option based on `$_GET['orderby']` and `$_GET['order']`
- [ ] 5.10 Conditionally render date range inputs if `$attributes['showDate']` is true
- [ ] 5.11 Pre-populate date inputs from `$_GET['date_after']` and `$_GET['date_before']`
- [ ] 5.12 Conditionally render taxonomy multi-select if `$attributes['showTaxonomy']` is true
- [ ] 5.13 Fetch taxonomy terms using `get_terms()` for `$attributes['targetTaxonomy']`
- [ ] 5.14 Pre-select taxonomy terms from `$_GET['category']` or `$_GET['tag']`
- [ ] 5.15 Conditionally render author dropdown if `$attributes['showAuthor']` is true
- [ ] 5.16 Fetch authors using `get_users()` with `who => 'authors'` parameter
- [ ] 5.17 Pre-select author from `$_GET['author']`
- [ ] 5.18 Render "Apply" button with `type="submit"` and primary styling
- [ ] 5.19 Render "Reset" button linking to base page URL (removes all query parameters)
- [ ] 5.20 Test all form inputs render correctly on frontend

## 6. Frontend Interactivity (Interactivity API)
- [ ] 6.1 Create `src/view.js` for Interactivity API directives
- [ ] 6.2 Define `wp.interactivity()` store with namespace `renalinfolk/query-filter-container`
- [ ] 6.3 Add state property `isExpanded` with default `false`
- [ ] 6.4 Add action `toggleFilters` to flip `isExpanded` state
- [ ] 6.5 Add `data-wp-interactive` attribute to toggle button in `render.php`
- [ ] 6.6 Add `data-wp-on--click="actions.toggleFilters"` to toggle button
- [ ] 6.7 Add `data-wp-bind--aria-expanded="state.isExpanded"` to toggle button
- [ ] 6.8 Add `data-wp-bind--hidden="!state.isExpanded"` to filter drawer container
- [ ] 6.9 Test toggle functionality works without page reload
- [ ] 6.10 Verify ARIA attributes update correctly (use browser inspector)

## 7. Styling (Frontend and Editor)
- [ ] 7.1 Create `src/style.scss` for shared frontend + editor styles
- [ ] 7.2 Use theme.json CSS variables for colors (`var(--wp--preset--color--primary)`)
- [ ] 7.3 Use theme.json spacing variables for padding/margin
- [ ] 7.4 Style toggle button with pill shape (`border-radius: 9999px`)
- [ ] 7.5 Implement responsive grid layout for filter inputs (CSS Grid or Flexbox)
- [ ] 7.6 Add media query for mobile (<768px) to stack inputs vertically
- [ ] 7.7 Style "Apply" button with primary color and "Reset" button with secondary/outline style
- [ ] 7.8 Add focus states with 2px outline (per theme accessibility standards)
- [ ] 7.9 Ensure minimum 44x44px tap targets for mobile
- [ ] 7.10 Add hover effects for buttons (e.g., slight scale or shadow)
- [ ] 7.11 Test styles in Site Editor and frontend

## 8. Block Registration in functions.php
- [ ] 8.1 Create new function `renalinfolk_register_query_filter_block()` in `functions.php`
- [ ] 8.2 Call `register_block_type( __DIR__ . '/blocks/query-filter-container' )` inside the function
- [ ] 8.3 Wrap function in `if ( ! function_exists() )` check for child theme safety
- [ ] 8.4 Hook function to `init` action with `add_action( 'init', 'renalinfolk_register_query_filter_block' )`
- [ ] 8.5 Validate PHP syntax: `C:/xampp/php/php.exe -l functions.php`
- [ ] 8.6 Test block appears in Site Editor Block Inserter

## 9. Query Loop Integration and URL Parameter Handling
- [ ] 9.1 Add filter hook for `pre_get_posts` to ensure URL parameters are parsed (if needed)
- [ ] 9.2 Test that `?s=keyword` filters posts correctly with core Query Loop
- [ ] 9.3 Test that `?orderby=title&order=asc` sorts posts alphabetically
- [ ] 9.4 Test that `?category=research` filters by category slug
- [ ] 9.5 Test that `?date_after=2023-01-01&date_before=2023-12-31` filters by date range
- [ ] 9.6 Test that `?author=5` filters by author ID
- [ ] 9.7 Test multiple filters combined (e.g., `?s=test&category=research&orderby=date`)
- [ ] 9.8 Verify Query Loop pagination works with active filters

## 10. Gallery Template Integration
- [ ] 10.1 Open `templates/page-gallery-article.html` in editor
- [ ] 10.2 Add `<!-- wp:renalinfolk/query-filter-container -->` block before the Query Loop block
- [ ] 10.3 Configure block attributes (enable search, taxonomy: category, sort order)
- [ ] 10.4 Save template and test in Site Editor
- [ ] 10.5 Repeat for `templates/page-gallery-image.html` (taxonomy: post_tag)
- [ ] 10.6 Repeat for `templates/page-gallery-publications.html` (taxonomy: category)
- [ ] 10.7 Repeat for `templates/page-gallery-video.html` (taxonomy: category)
- [ ] 10.8 Test each gallery page on frontend with filters

## 11. Internationalization (i18n)
- [ ] 11.1 Review all user-facing strings in `edit.js`, `render.php`, `view.js`
- [ ] 11.2 Replace hardcoded strings with `wp.i18n.__()` in JavaScript files
- [ ] 11.3 Replace hardcoded strings with `esc_html__()` in `render.php`
- [ ] 11.4 Ensure all translation functions use `'renalinfolk'` text domain
- [ ] 11.5 Run `wp i18n make-pot . languages/renalinfolk.pot` (if WP-CLI available)
- [ ] 11.6 Verify all block strings are included in POT file

## 12. Accessibility Testing
- [ ] 12.1 Test keyboard navigation (Tab through all inputs, Enter/Space to toggle)
- [ ] 12.2 Verify all inputs have associated `<label>` elements
- [ ] 12.3 Test with screen reader (NVDA or JAWS) - verify announcements
- [ ] 12.4 Check ARIA attributes: `aria-expanded`, `aria-labelledby`, `role="region"`
- [ ] 12.5 Validate color contrast ratios using WebAIM Contrast Checker (4.5:1 text, 3:1 UI)
- [ ] 12.6 Ensure focus indicators are visible (2px outline)
- [ ] 12.7 Test on mobile with TalkBack (Android) or VoiceOver (iOS)
- [ ] 12.8 Run Lighthouse accessibility audit in Chrome DevTools (target score: 100)

## 13. Responsive Design Testing
- [ ] 13.1 Test on desktop (1920x1080) - verify grid layout
- [ ] 13.2 Test on tablet (768x1024) - verify responsive breakpoints
- [ ] 13.3 Test on mobile (375x667) - verify stacked layout
- [ ] 13.4 Test on small mobile (320x568) - verify minimum width support
- [ ] 13.5 Verify touch targets meet 44x44px minimum on mobile
- [ ] 13.6 Test landscape orientation on mobile and tablet

## 14. Browser Compatibility Testing
- [ ] 14.1 Test in Chrome (latest)
- [ ] 14.2 Test in Firefox (latest)
- [ ] 14.3 Test in Safari (latest) - verify native date input styling
- [ ] 14.4 Test in Edge (latest)
- [ ] 14.5 Test on mobile Safari (iOS)
- [ ] 14.6 Test on Chrome for Android
- [ ] 14.7 Verify Interactivity API works across all browsers

## 15. Build and Deployment
- [ ] 15.1 Run `npm run build` to generate production assets
- [ ] 15.2 Verify `build/index.js`, `build/index.asset.php`, `build/style-index.css`, `build/view.js` are created
- [ ] 15.3 Check file sizes (JS should be <50KB, CSS <10KB)
- [ ] 15.4 Test built version on staging environment
- [ ] 15.5 Decide whether to commit `build/` directory to Git or rebuild on deployment
- [ ] 15.6 Update README or CLAUDE.md with deployment instructions

## 16. Documentation
- [ ] 16.1 Add block usage instructions to CLAUDE.md (Admin section)
- [ ] 16.2 Document all block attributes and their effects
- [ ] 16.3 Document URL parameter mappings (e.g., `?s=` for search, `?orderby=` for sort)
- [ ] 16.4 Add troubleshooting section (common issues, solutions)
- [ ] 16.5 Document build process and npm commands
- [ ] 16.6 Add example block markup for reference

## 17. Validation and Quality Assurance
- [ ] 17.1 Run `openspec validate add-query-filter-block --strict` and resolve any issues
- [ ] 17.2 Validate `block.json` against WordPress block schema
- [ ] 17.3 Validate PHP syntax for all PHP files
- [ ] 17.4 Run ESLint on JavaScript files (if configured via `@wordpress/scripts`)
- [ ] 17.5 Test block unregistration (remove from `functions.php`, verify no errors)
- [ ] 17.6 Test rollback scenario (delete block directory, verify theme still works)
- [ ] 17.7 Perform final smoke test on all gallery pages

## 18. Approval and Deployment Preparation
- [ ] 18.1 Request user/stakeholder approval of proposal
- [ ] 18.2 Address any feedback or requested changes
- [ ] 18.3 Update `tasks.md` to mark all completed items with `[x]`
- [ ] 18.4 Create Git commit with message following project conventions
- [ ] 18.5 Tag release version if applicable
- [ ] 18.6 Deploy to production environment
- [ ] 18.7 Monitor for errors or issues post-deployment

## Dependencies and Parallelizable Work

**Sequential Dependencies:**
- Tasks 1-2 must complete before task 3 (need build tooling before creating components)
- Task 8 depends on task 2 (need `block.json` before registration)
- Task 10 depends on tasks 5-9 (need working block before adding to templates)
- Task 17 depends on all prior tasks (final validation)

**Parallelizable Work:**
- Tasks 3 and 4 can be done in parallel (admin UI and preview)
- Tasks 5 and 6 can be done in parallel (PHP rendering and Interactivity API)
- Tasks 12, 13, 14 can be done in parallel (accessibility, responsive, browser testing)

**External Dependencies:**
- `@wordpress/scripts` npm package
- WordPress 6.7+ with Interactivity API support
- Node.js 18+ for build process
- WP-CLI (optional, for i18n POT file generation)
