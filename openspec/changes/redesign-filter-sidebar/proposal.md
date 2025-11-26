# Change: Redesign Query Filter Container with Fixed Sidebar Layout

## Why
The current horizontal filter layout creates a cramped, less-intuitive user experience, especially on smaller screens. Users need a more spacious, visually prominent sidebar filter interface that provides better organization and usability for filtering articles by sort order, date range, and tags.

The reference design shows a modern, professional fixed-sidebar approach with:
- Dedicated space for each filter control
- Better visual hierarchy with a gradient background
- Improved tag selection with button-style multi-select tags in a scrollable grid
- Fixed positioning that keeps filters always visible
- Clear Apply/Reset actions at the bottom

## What Changes
- **Transform layout**: Change from horizontal collapsible bar to fixed left sidebar (33.33% width)
- **Update sidebar styling**: Apply gradient background (`linear-gradient(to bottom, #0d9488, #155e75, #0c4a6e)`)
- **Redesign tag filter**: Replace native multi-select dropdown with custom button-style tag grid (3 columns)
- **Add scrollable tag container**: Allow tags to scroll independently with custom scrollbar styling
- **Improve form controls**: Enhanced date inputs with calendar icon overlays
- **Update action buttons**: Move Apply (yellow CTA) and Reset buttons to bottom of sidebar with full-width styling
- **Adjust main content area**: Update template to show content at 66.66% width with left margin for sidebar
- **Remove collapsible functionality**: Sidebar is always visible (no toggle button)

## Impact
- Affected specs: `query-filtering`
- Affected code:
  - `templates/page-gallery-article.html` - Update column widths and sidebar placement
  - `blocks/query-filter-container/render.php` - Replace HTML structure with fixed sidebar layout
  - `blocks/query-filter-container/src/style.scss` - Complete style rewrite for sidebar layout
  - `blocks/query-filter-container/src/view.js` - Update JavaScript for custom tag selection (replace native multi-select)
  - `blocks/query-filter-container/block.json` - Remove `toggleLabel` attribute (no longer needed)
  - `blocks/query-filter-container/src/edit.js` - Remove toggle label control from editor
  - Documentation in `CLAUDE.md` - Update block documentation with new layout details
