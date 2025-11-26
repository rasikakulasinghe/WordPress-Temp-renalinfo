# Change: Add Query Filter Container Block

## Why

The theme currently lacks a user-facing filtering system for the Gallery pages (Articles, Images, Publications, Videos). Site visitors cannot search, sort, or filter content by taxonomy, date, or author, limiting content discoverability. A reusable dynamic block that interacts with WordPress Query Loop blocks would provide this functionality across all gallery templates while maintaining block theme architecture.

## What Changes

- Create a new custom dynamic block `renalinfolk/query-filter-container` using WordPress Block API
- Implement collapsible filter toolbar with configurable inputs (search, date range, taxonomy, author, sort order)
- Add React-based frontend UI using WordPress Interactivity API for instant toggle responses
- Integrate with core `core/query` block context to filter posts via URL parameters
- Provide InspectorControls for admin to show/hide specific filter inputs per block instance
- Add responsive design with mobile-first layout (stacked filters on small screens)
- Enqueue block scripts and styles following `@wordpress/scripts` conventions
- Register block with proper text domain (`renalinfolk`) and theme integration

## Impact

**Affected specs:**
- New capability: `query-filtering` (no existing spec - this is a new feature)

**Affected code:**
- New directory: `blocks/query-filter-container/` with `block.json`, `edit.js`, `save.js`, `view.js`, `style.scss`, `editor.scss`
- `functions.php` - Register custom block and enqueue scripts (new function `renalinfolk_register_query_filter_block()`)
- `theme.json` - May need to add block-specific styles under `styles.blocks` (optional)
- Gallery templates (`templates/page-gallery-*.html`) - Update to include the new filter block above Query Loop blocks

**Breaking changes:**
- None (this is a purely additive change)

**Dependencies:**
- Requires WordPress 6.7+ (already a theme requirement)
- Requires `@wordpress/scripts` build tooling (new dev dependency)
- May benefit from WordPress Interactivity API (WordPress 6.5+, already available)

**User-facing changes:**
- Visitors will see a new "Filter & Sort" button above gallery listings
- Admins will have new block available in Site Editor under "Renalinfolk" category
- Gallery pages become dynamically filterable without page reloads
