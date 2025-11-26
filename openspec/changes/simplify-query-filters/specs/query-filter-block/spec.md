# Query Filter Block Specification

## MODIFIED Requirements

### Requirement: Filter Configuration Options
The block SHALL provide configuration options for enabling/disabling specific filter sections through the WordPress Block Editor InspectorControls panel. Available filters are: Sort Order, Date Range, and Tag Filter.

#### Scenario: Block inserted with default settings
- **WHEN** user inserts the Query Filter Container block
- **THEN** Sort Order filter is enabled by default
- **AND** Tag Filter is enabled by default
- **AND** Date Range filter is disabled by default

#### Scenario: Admin toggles sort order filter
- **WHEN** admin disables "Enable Sort Order" in InspectorControls
- **THEN** sort order dropdown does not display on frontend
- **AND** form does not include sort parameter

#### Scenario: Admin toggles date range filter
- **WHEN** admin enables "Enable Date Range" in InspectorControls
- **THEN** start date and end date inputs display on frontend
- **AND** form includes date_after and date_before parameters

#### Scenario: Admin toggles tag filter
- **WHEN** admin disables "Enable Tag Filter" in InspectorControls
- **THEN** tag multi-select does not display on frontend
- **AND** form does not include tag parameter

### Requirement: Tag Filter Display
The block SHALL display a multi-select dropdown for filtering posts by tags when the tag filter is enabled.

#### Scenario: Tag filter with available tags
- **WHEN** tag filter is enabled and site has tags
- **THEN** display multi-select dropdown with all non-empty tags
- **AND** show post count next to each tag name
- **AND** allow selection of multiple tags using Ctrl/Cmd + click
- **AND** display help text: "Hold Ctrl (Windows) or Cmd (Mac) to select multiple"

#### Scenario: Tag filter form submission
- **WHEN** user selects one or more tags and submits form
- **THEN** add `tag` URL parameter with comma-separated tag slugs
- **AND** Query Loop filters posts by selected tags

#### Scenario: No tags available
- **WHEN** tag filter is enabled but site has no tags
- **THEN** tag filter section does not display

### Requirement: Block Attributes
The block SHALL define the following attributes in block.json:
- `showSortOrder` (boolean, default: true) - Enable/disable sort order filter
- `showDate` (boolean, default: false) - Enable/disable date range filter
- `showTaxonomy` (boolean, default: true) - Enable/disable tag filter
- `toggleLabel` (string, default: "Filter & Sort") - Custom toggle button text

#### Scenario: Block saves configuration
- **WHEN** admin configures block settings in editor
- **THEN** settings are saved to block attributes
- **AND** settings persist when page is saved and reloaded

## REMOVED Requirements

### Requirement: Search Filter
**Reason**: Simplifying UI to focus on most commonly used filters (sort, date, tags). Search functionality adds complexity and is less frequently needed.

**Migration**: Remove `showSearch` attribute from block.json. Remove search input UI from render.php. Update edit.js to remove search toggle control. Existing blocks will continue to work but search option will be ignored.

### Requirement: Author Filter
**Reason**: Author filtering is rarely used for public-facing post galleries and adds unnecessary complexity.

**Migration**: Remove `showAuthor` attribute from block.json. Remove author dropdown UI from render.php. Update edit.js to remove author toggle control. Existing blocks will continue to work but author option will be ignored.

### Requirement: Taxonomy Type Selection
**Reason**: Simplifying to tags-only filtering. Categories can be handled through separate navigation or page structure.

**Migration**: Remove `targetTaxonomy` attribute from block.json. Hardcode taxonomy to `post_tag` in render.php. Remove taxonomy selector UI from edit.js. Existing blocks configured for categories will automatically switch to tags.

## ADDED Requirements

### Requirement: Simplified URL Parameters
The block SHALL support only the following URL parameters for filtering:
- `sort` - Sort order (date-desc, date-asc, title-asc, title-desc)
- `date_after` - Start date (YYYY-MM-DD format)
- `date_before` - End date (YYYY-MM-DD format)
- `tag` - Tag slugs (comma-separated for multiple tags)

#### Scenario: Tag filtering with multiple tags
- **WHEN** user selects tags "cardiology" and "research" and submits
- **THEN** URL includes `?tag=cardiology,research`
- **AND** Query Loop displays posts with either tag
- **AND** selected tags remain highlighted in multi-select

#### Scenario: Combined filters
- **WHEN** user selects sort "Newest First", date range "2024-01-01 to 2024-12-31", and tag "pediatrics"
- **THEN** URL includes `?sort=date-desc&date_after=2024-01-01&date_before=2024-12-31&tag=pediatrics`
- **AND** Query Loop displays pediatrics posts from 2024 sorted by newest first

#### Scenario: Reset filters
- **WHEN** user clicks "Reset" button
- **THEN** all URL parameters are removed
- **AND** form fields are cleared
- **AND** Query Loop returns to default display
