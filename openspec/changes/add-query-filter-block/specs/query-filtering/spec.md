# Specification: Query Filtering

## ADDED Requirements

### Requirement: Block Registration and Metadata
The theme SHALL register a custom dynamic block named `renalinfolk/query-filter-container` with proper metadata and internationalization support.

#### Scenario: Block appears in Site Editor
- **WHEN** an admin opens the Site Editor (Appearance > Editor)
- **THEN** the block appears in the Block Inserter under "Renalinfolk" category
- **AND** the block title is "Query Filter Container"
- **AND** the block description explains its purpose ("Adds a collapsible filter toolbar for Query Loop blocks")

#### Scenario: Block metadata validation
- **WHEN** the block is registered via `register_block_type()`
- **THEN** `block.json` includes required fields: `apiVersion`, `name`, `title`, `category`, `icon`, `attributes`, `textdomain`
- **AND** `textdomain` is set to `renalinfolk`
- **AND** all translatable strings use `renalinfolk` text domain

### Requirement: Configurable Filter Visibility
The block SHALL provide admin controls to show or hide specific filter inputs on a per-instance basis.

#### Scenario: Admin toggles search filter
- **WHEN** an admin selects the block in the Site Editor
- **THEN** the InspectorControls panel displays a toggle labeled "Enable Search"
- **WHEN** the admin toggles it on
- **THEN** the `showSearch` attribute is set to `true`
- **AND** the search input appears in the frontend filter toolbar

#### Scenario: Admin configures taxonomy filter
- **WHEN** an admin enables "Enable Taxonomy Filter" toggle
- **THEN** a dropdown appears labeled "Select Taxonomy"
- **WHEN** the admin selects "category" from the dropdown
- **THEN** the `targetTaxonomy` attribute is set to `"category"`
- **AND** the frontend displays a category multi-select dropdown

#### Scenario: Admin hides date range filter
- **WHEN** an admin sets "Enable Date Range" toggle to off
- **THEN** the `showDate` attribute is set to `false`
- **AND** the date range inputs do NOT appear in the frontend filter toolbar

#### Scenario: Admin customizes toggle button label
- **WHEN** an admin enters "Filters" in the "Filter Toggle Button Label" text input
- **THEN** the `toggleLabel` attribute is set to `"Filters"`
- **AND** the frontend button displays "Filters" instead of default "Filter & Sort"

### Requirement: Collapsible Filter Toolbar
The block SHALL render a collapsible filter section on the frontend with a toggle button.

#### Scenario: Default collapsed state on page load
- **WHEN** a visitor loads a gallery page with the filter block
- **THEN** the filter toolbar is hidden (collapsed)
- **AND** a button labeled "Filter & Sort" (or custom label) is visible
- **AND** the button has ARIA attributes `aria-expanded="false"` and `aria-controls="filter-drawer"`

#### Scenario: Visitor expands filter drawer
- **WHEN** a visitor clicks the "Filter & Sort" button
- **THEN** the filter inputs become visible (drawer expands)
- **AND** the button's `aria-expanded` attribute changes to `"true"`
- **AND** the expansion happens instantly without page reload (using Interactivity API)

#### Scenario: Visitor collapses filter drawer
- **WHEN** the filter drawer is expanded
- **AND** the visitor clicks the toggle button again
- **THEN** the filter inputs become hidden (drawer collapses)
- **AND** the button's `aria-expanded` attribute changes to `"false"`

### Requirement: Search Filter Input
The block SHALL provide a text search input when the `showSearch` attribute is `true`.

#### Scenario: Search input renders with correct attributes
- **WHEN** `showSearch` is `true`
- **THEN** an `<input type="text">` field is rendered in the filter drawer
- **AND** the input has `name="s"` (WordPress standard search parameter)
- **AND** the input has a `<label>` element with text "Search" (internationalized)
- **AND** the input has `placeholder` text "Enter keywords..." (internationalized)

#### Scenario: Search input pre-populates from URL parameter
- **WHEN** the page URL includes `?s=nephrology`
- **AND** the filter block is rendered
- **THEN** the search input's value is pre-populated with "nephrology"

#### Scenario: Search query filters posts
- **WHEN** a visitor enters "kidney disease" in the search input
- **AND** clicks the "Apply" button
- **THEN** the browser navigates to `?s=kidney+disease`
- **AND** the Query Loop displays only posts matching "kidney disease" in title or content

### Requirement: Sort Order Dropdown
The block SHALL provide a sort order dropdown when `showSortOrder` attribute is `true`.

#### Scenario: Sort dropdown renders with options
- **WHEN** `showSortOrder` is `true`
- **THEN** a `<select>` element is rendered with label "Sort By"
- **AND** the dropdown includes options: "Newest First", "Oldest First", "A-Z", "Z-A"
- **AND** each option has corresponding `value` attributes: `date-desc`, `date-asc`, `title-asc`, `title-desc`

#### Scenario: Sort order filters posts
- **WHEN** a visitor selects "Oldest First" and clicks "Apply"
- **THEN** the browser navigates to `?orderby=date&order=asc`
- **AND** the Query Loop displays posts sorted by publish date ascending

#### Scenario: Alphabetical sort filters posts
- **WHEN** a visitor selects "A-Z" and clicks "Apply"
- **THEN** the browser navigates to `?orderby=title&order=asc`
- **AND** the Query Loop displays posts sorted alphabetically by title

### Requirement: Date Range Filter Inputs
The block SHALL provide start and end date inputs when the `showDate` attribute is `true`.

#### Scenario: Date inputs render with correct types
- **WHEN** `showDate` is `true`
- **THEN** two `<input type="date">` fields are rendered
- **AND** the first input has `name="date_after"` with label "Start Date"
- **AND** the second input has `name="date_before"` with label "End Date"

#### Scenario: Date range filters posts
- **WHEN** a visitor selects Start Date "2023-01-01" and End Date "2023-12-31"
- **AND** clicks "Apply"
- **THEN** the browser navigates to `?date_after=2023-01-01&date_before=2023-12-31`
- **AND** the Query Loop displays only posts published within that date range

#### Scenario: Date inputs pre-populate from URL parameters
- **WHEN** the page URL includes `?date_after=2023-06-01&date_before=2023-12-31`
- **THEN** the Start Date input shows "2023-06-01"
- **AND** the End Date input shows "2023-12-31"

### Requirement: Taxonomy Filter (Multi-Select)
The block SHALL provide a taxonomy term selector when the `showTaxonomy` attribute is `true`.

#### Scenario: Category multi-select renders
- **WHEN** `showTaxonomy` is `true` and `targetTaxonomy` is `"category"`
- **THEN** a multi-select dropdown or checkbox list is rendered
- **AND** the label reads "Categories"
- **AND** all public category terms are listed as options

#### Scenario: Tag multi-select renders
- **WHEN** `targetTaxonomy` is `"post_tag"`
- **THEN** the label reads "Tags"
- **AND** all post tag terms are listed as options

#### Scenario: Taxonomy filter with single selection
- **WHEN** a visitor selects "Research" category and clicks "Apply"
- **THEN** the browser navigates to `?category=research` (term slug)
- **AND** the Query Loop displays only posts in the "Research" category

#### Scenario: Taxonomy filter with multiple selections
- **WHEN** a visitor selects "Research" and "Patient Resources" categories
- **AND** clicks "Apply"
- **THEN** the browser navigates to `?category=research,patient-resources`
- **AND** the Query Loop displays posts in either category (OR logic)

#### Scenario: Taxonomy terms pre-populate from URL
- **WHEN** the page URL includes `?category=research`
- **THEN** the "Research" category option is pre-selected in the multi-select

### Requirement: Author Filter Dropdown
The block SHALL provide an author selector dropdown when the `showAuthor` attribute is `true`.

#### Scenario: Author dropdown renders
- **WHEN** `showAuthor` is `true`
- **THEN** a `<select>` element is rendered with label "Author"
- **AND** the dropdown includes an option for each user who has published posts
- **AND** the first option is "All Authors" with empty value

#### Scenario: Author filter applies
- **WHEN** a visitor selects "Dr. Smith" (user ID 5) and clicks "Apply"
- **THEN** the browser navigates to `?author=5`
- **AND** the Query Loop displays only posts by user ID 5

#### Scenario: Author pre-populates from URL
- **WHEN** the page URL includes `?author=5`
- **THEN** the author dropdown shows "Dr. Smith" selected

### Requirement: Apply and Reset Action Buttons
The block SHALL provide "Apply" and "Reset" buttons at the bottom of the filter drawer.

#### Scenario: Apply button submits filter form
- **WHEN** a visitor configures filters and clicks "Apply"
- **THEN** the browser navigates to a URL with all selected filter parameters
- **AND** the filter drawer remains expanded after navigation
- **AND** the form inputs retain their values

#### Scenario: Reset button clears filters
- **WHEN** a visitor has active filters (URL has parameters like `?s=test&category=research`)
- **AND** clicks the "Reset" button
- **THEN** the browser navigates to the base page URL (no query parameters)
- **AND** all filter inputs are cleared to default states
- **AND** the Query Loop displays all posts without filters

#### Scenario: Button styling follows design system
- **WHEN** the buttons are rendered
- **THEN** the "Apply" button uses the `primary` style (theme.json `--wp--preset--color--primary`)
- **AND** the "Reset" button uses the `secondary` or `outline` style
- **AND** buttons have `border-radius: 9999px` (pill shape per theme design)

### Requirement: Responsive Layout
The block SHALL adapt its layout for mobile, tablet, and desktop screen sizes.

#### Scenario: Desktop layout (>768px)
- **WHEN** the viewport width is 768px or greater
- **THEN** filter inputs are displayed in a horizontal grid (2-3 columns)
- **AND** the "Apply" and "Reset" buttons are side-by-side

#### Scenario: Mobile layout (<768px)
- **WHEN** the viewport width is less than 768px
- **THEN** filter inputs stack vertically (1 column)
- **AND** the "Apply" and "Reset" buttons stack vertically and are full-width

#### Scenario: Touch-friendly targets on mobile
- **WHEN** rendered on a mobile device
- **THEN** all interactive elements (buttons, inputs, dropdowns) have minimum tap target size of 44x44px

### Requirement: Accessibility Compliance
The block SHALL meet WCAG AA accessibility standards for keyboard navigation, screen readers, and color contrast.

#### Scenario: Keyboard navigation support
- **WHEN** a visitor navigates with the Tab key
- **THEN** focus moves sequentially through toggle button, filter inputs, and action buttons
- **AND** all focusable elements have visible 2px outline (per theme design)
- **WHEN** the toggle button is focused and Enter or Space is pressed
- **THEN** the filter drawer expands or collapses

#### Scenario: Screen reader announcements
- **WHEN** a screen reader user activates the toggle button
- **THEN** the screen reader announces "Filter & Sort, button, collapsed" (or "expanded")
- **WHEN** the drawer state changes
- **THEN** the screen reader announces "Filters expanded" or "Filters collapsed"

#### Scenario: Form labels and ARIA attributes
- **WHEN** the filter form is rendered
- **THEN** every input has an associated `<label>` element
- **AND** the filter drawer has `role="region"` and `aria-labelledby` pointing to the toggle button
- **AND** required inputs have `aria-required="true"`

#### Scenario: Color contrast compliance
- **WHEN** the filter UI is rendered
- **THEN** all text meets 4.5:1 contrast ratio (WCAG AA)
- **AND** all interactive elements (buttons, inputs) meet 3:1 contrast ratio

### Requirement: Theme Integration and Styling
The block SHALL use theme.json design tokens for colors, spacing, typography, and follow WordPress block styling conventions.

#### Scenario: Block uses theme.json colors
- **WHEN** the block styles are applied
- **THEN** colors reference CSS custom properties like `var(--wp--preset--color--primary)`
- **AND** no hardcoded color hex values are used in stylesheets

#### Scenario: Block uses theme.json spacing
- **WHEN** the block layout is rendered
- **THEN** spacing uses CSS clamp() values from theme.json (e.g., `var(--wp--preset--spacing--50)`)
- **AND** responsive spacing scales with viewport size

#### Scenario: Block uses theme.json typography
- **WHEN** text is rendered in the filter UI
- **THEN** the font family is Lexend (`var(--wp--preset--font-family--lexend)`)
- **AND** font sizes use theme.json presets (e.g., `var(--wp--preset--font-size--medium)`)

#### Scenario: Editor preview matches frontend
- **WHEN** an admin views the block in the Site Editor
- **THEN** the block preview displays the same visual styling as the frontend
- **AND** placeholder text indicates "Filter toolbar will appear here"

### Requirement: Build and Asset Management
The block SHALL use `@wordpress/scripts` for building assets and follow WordPress block asset enqueuing conventions.

#### Scenario: Block assets are built correctly
- **WHEN** `npm run build` is executed
- **THEN** `build/` directory contains `index.js`, `index.asset.php`, `style-index.css`, `view.js`
- **AND** all JavaScript is minified and optimized
- **AND** SCSS files are compiled to CSS with autoprefixer

#### Scenario: Block assets are enqueued correctly
- **WHEN** the block is registered via `register_block_type()`
- **THEN** WordPress automatically enqueues `index.js` in the editor
- **AND** WordPress enqueues `view.js` on the frontend when the block is present
- **AND** WordPress enqueues `style-index.css` on both editor and frontend

#### Scenario: Build dependencies are documented
- **WHEN** a developer clones the theme repository
- **THEN** the README or CLAUDE.md includes instructions: `npm install && npm run build`
- **AND** `package.json` includes `@wordpress/scripts` as a dev dependency

### Requirement: Internationalization (i18n)
The block SHALL ensure all user-facing strings are translatable using the `renalinfolk` text domain.

#### Scenario: JavaScript strings are translatable
- **WHEN** strings are defined in `edit.js` or `view.js`
- **THEN** they use `wp.i18n.__()` or `wp.i18n._x()` functions
- **AND** the text domain parameter is `'renalinfolk'`

#### Scenario: PHP strings are translatable
- **WHEN** strings are defined in `render.php`
- **THEN** they use `__()`, `_e()`, or `esc_html__()` functions
- **AND** the text domain parameter is `'renalinfolk'`

#### Scenario: POT file generation
- **WHEN** `wp i18n make-pot` is run (if WP-CLI is available)
- **THEN** all block strings are included in `languages/renalinfolk.pot`
- **AND** translators can provide translations for all filter labels and messages

### Requirement: Backward Compatibility and Safe Rollback
The block SHALL be implemented as a purely additive change with no breaking modifications to existing functionality.

#### Scenario: Existing gallery templates continue to work
- **WHEN** the block is deployed but NOT added to a gallery template
- **THEN** the gallery page continues to display the Query Loop without filters
- **AND** no JavaScript errors occur
- **AND** no styling conflicts arise

#### Scenario: Block can be removed cleanly
- **WHEN** the block registration is removed from `functions.php`
- **AND** the `blocks/query-filter-container/` directory is deleted
- **THEN** the theme continues to function normally
- **AND** pages containing the block show no errors (block markup is ignored)

#### Scenario: No database migrations required
- **WHEN** the block is deployed or removed
- **THEN** no database schema changes are required
- **AND** block attributes are stored in post_content as serialized HTML comments
