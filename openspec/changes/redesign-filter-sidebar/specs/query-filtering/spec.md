## MODIFIED Requirements

### Requirement: Collapsible Filter Toolbar
The block SHALL render a fixed sidebar filter section on the frontend without toggle functionality.

#### Scenario: Fixed sidebar displays on page load
- **WHEN** a visitor loads a gallery page with the filter block
- **THEN** the filter sidebar is visible and fixed to the left side of the page
- **AND** the sidebar occupies 33.33% of the page width (320px on 1200px+ screens)
- **AND** the sidebar has gradient background from teal (#0d9488) to dark blue (#0c4a6e)
- **AND** the sidebar is positioned fixed with full viewport height

#### Scenario: Sidebar remains visible during scroll
- **WHEN** a visitor scrolls the main content area
- **THEN** the sidebar remains fixed in position
- **AND** filter controls are always accessible without scrolling back to top

### Requirement: Taxonomy Filter (Multi-Select)
The block SHALL provide a button-style tag selector grid when the `showTaxonomy` attribute is `true`.

#### Scenario: Tag buttons render in grid layout
- **WHEN** `showTaxonomy` is `true` and `targetTaxonomy` is `"post_tag"`
- **THEN** tags are displayed as interactive button elements in a 3-column grid
- **AND** each tag button shows the term name and post count (e.g., "CKD (1)")
- **AND** the tag container is scrollable if tags exceed available height
- **AND** custom scrollbar styling is applied (6px width, blue thumb)

#### Scenario: Tag button selection with visual feedback
- **WHEN** a visitor clicks an unselected tag button
- **THEN** the tag button background changes to blue (#3b82f6)
- **AND** the tag button text color changes to white
- **AND** the tag slug is added to the form submission array

#### Scenario: Tag button deselection
- **WHEN** a visitor clicks a selected (blue) tag button
- **THEN** the tag button reverts to default styling (white/gray background)
- **AND** the tag slug is removed from the form submission array

#### Scenario: Multiple tag selection
- **WHEN** a visitor selects multiple tag buttons (e.g., "CKD" and "AKI")
- **AND** clicks "Apply Filters"
- **THEN** the browser navigates to `?tag=ckd,aki`
- **AND** both selected tags remain visually active (blue background)
- **AND** the Query Loop displays posts with either tag (OR logic)

#### Scenario: Tags pre-populate from URL
- **WHEN** the page URL includes `?tag=ckd,aki`
- **THEN** the "CKD" and "AKI" tag buttons are rendered with blue background
- **AND** other tag buttons remain in default state

### Requirement: Responsive Layout
The block SHALL use a fixed sidebar layout on desktop and adapt to a collapsible/stacked layout on smaller screens.

#### Scenario: Desktop layout (1024px and above)
- **WHEN** the viewport width is 1024px or greater
- **THEN** the filter sidebar is fixed at left with 320px width (33.33% of 1200px container)
- **AND** the main content area displays at 66.66% width with left margin equal to sidebar width
- **AND** the sidebar height is 100vh (full viewport)

#### Scenario: Tablet layout (768px to 1023px)
- **WHEN** the viewport width is between 768px and 1023px
- **THEN** the sidebar reduces to 280px width
- **AND** the main content area adjusts margin accordingly
- **AND** tag grid may reduce to 2 columns for better touch targets

#### Scenario: Mobile layout (<768px)
- **WHEN** the viewport width is less than 768px
- **THEN** the fixed sidebar converts to collapsible drawer or stacks above content
- **AND** filter inputs maintain full-width styling
- **AND** tag grid reduces to 2 columns or single column for optimal touch interaction

## MODIFIED Requirements

### Requirement: Apply and Reset Action Buttons
The block SHALL provide "Apply Filters" and "Reset" buttons at the bottom of the fixed sidebar.

#### Scenario: Apply button submits filter form
- **WHEN** a visitor configures filters and clicks "Apply Filters"
- **THEN** the browser navigates to a URL with all selected filter parameters
- **AND** the sidebar remains fixed in position after navigation
- **AND** the form inputs retain their values

#### Scenario: Reset button clears filters
- **WHEN** a visitor has active filters (URL has parameters like `?sort=date-desc&tag=ckd`)
- **AND** clicks the "Reset" button
- **THEN** the browser navigates to the base page URL (no query parameters)
- **AND** all filter inputs are cleared to default states
- **AND** all tag buttons revert to unselected state
- **AND** the Query Loop displays all posts without filters

#### Scenario: Button styling in sidebar
- **WHEN** the buttons are rendered in the sidebar
- **THEN** the "Apply Filters" button uses full-width yellow CTA style (`--wp--preset--color--cta-yellow`)
- **AND** the "Reset" button uses full-width transparent style with white border
- **AND** buttons have `border-radius: 9999px` (pill shape)
- **AND** buttons stack vertically with 12px gap between them
- **AND** buttons are positioned at the bottom of the sidebar (below scrollable tag area)

## REMOVED Requirements

### Requirement: Configurable Filter Visibility
**Reason**: The `toggleLabel` attribute is removed because the sidebar is always visible without toggle functionality.

**Migration**: Remove the `toggleLabel` attribute from block.json. Admin InspectorControls will no longer show "Filter Toggle Button Label" text input. Existing instances with `toggleLabel` set will ignore this attribute.

## ADDED Requirements

### Requirement: Sidebar Gradient Background Styling
The block SHALL apply a vertical gradient background to the fixed sidebar using theme-compatible colors.

#### Scenario: Gradient renders correctly
- **WHEN** the filter sidebar is displayed
- **THEN** the background uses `linear-gradient(to bottom, #0d9488, #155e75, #0c4a6e)`
- **AND** the gradient transitions smoothly from teal at top to dark blue at bottom
- **AND** all text labels are white/light colored for proper contrast against gradient

### Requirement: Custom Scrollbar for Tag Container
The block SHALL apply custom scrollbar styling to the scrollable tag button container.

#### Scenario: Custom scrollbar renders in tag area
- **WHEN** the tag list exceeds the available container height
- **THEN** a custom scrollbar appears on the right edge
- **AND** the scrollbar track is transparent
- **AND** the scrollbar thumb is blue (#3b82f6) with 3px border-radius
- **AND** the scrollbar width is 6px
- **AND** the scrollbar thumb changes to darker blue (#2563eb) on hover

### Requirement: Enhanced Date Input with Calendar Icon
The block SHALL provide date inputs with overlaid calendar icon for better UX.

#### Scenario: Date input renders with calendar icon
- **WHEN** `showDate` is `true`
- **THEN** each date input field displays a calendar icon on the right side
- **AND** the calendar icon is positioned absolutely within the input container
- **AND** clicking the icon opens the browser's native date picker
- **AND** the input placeholder text is "mm/dd/yyyy"

### Requirement: Sidebar Fixed Positioning and Z-Index Management
The block SHALL use CSS fixed positioning with appropriate z-index to ensure sidebar visibility.

#### Scenario: Sidebar stays above content
- **WHEN** the page is rendered with sidebar and main content
- **THEN** the sidebar has `position: fixed` with `z-index: 50`
- **AND** the sidebar is positioned at `left: 0` and `top: 0`
- **AND** the sidebar does not overlap or conflict with WordPress admin bar or other fixed UI elements
- **AND** the main content area has appropriate left margin/padding to prevent overlap
