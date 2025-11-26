# Query Filter Container Block

A custom WordPress dynamic block for the Renalinfolk theme that adds a collapsible filter toolbar for Query Loop blocks.

## Features

- ✅ Search by keyword
- ✅ Sort by date or title (A-Z/Z-A)
- ✅ Filter by date range
- ✅ Filter by taxonomy (category or tag)
- ✅ Filter by author
- ✅ Fully responsive (mobile-first design)
- ✅ WCAG AA accessible
- ✅ WordPress Interactivity API for instant UI toggle
- ✅ URL parameter-based filtering (shareable, SEO-friendly)

## Installation

This block is built into the Renalinfolk theme. No separate installation is required.

## Development

### Prerequisites

- Node.js 18+ and npm
- WordPress 6.7+
- Renalinfolk theme installed

### Build Process

```bash
# Install dependencies (first time only)
npm install --legacy-peer-deps

# Development mode (auto-rebuild on save)
npm start

# Production build
npm run build
```

### File Structure

```
blocks/query-filter-container/
├── block.json          # Block metadata and attributes
├── render.php          # Server-side rendering template
├── README.md           # This file
├── src/
│   ├── index.js        # Entry point, registers block
│   ├── edit.js         # Editor component with InspectorControls
│   ├── save.js         # Returns null (dynamic block)
│   ├── view.js         # Frontend Interactivity API
│   ├── style.scss      # Frontend + Editor styles
│   └── editor.scss     # Editor-only styles
└── build/              # Generated files (do not edit)
    ├── index.js
    ├── view.js
    ├── style-index.css
    └── index.css
```

## Usage

### In Site Editor

1. Open Appearance > Editor in WordPress admin
2. Edit a gallery template (e.g., page-gallery-article.html)
3. Click "+" to add a block
4. Search for "Query Filter Container"
5. Insert the block **above** your Query Loop block
6. Configure filters in the InspectorControls sidebar

### Block Attributes

Configure these in the InspectorControls panel:

- **Enable Search** (boolean, default: `true`) - Show keyword search input
- **Enable Sort Order** (boolean, default: `true`) - Show sort dropdown
- **Enable Date Range** (boolean, default: `false`) - Show date pickers
- **Enable Taxonomy Filter** (boolean, default: `true`) - Show category/tag selector
- **Select Taxonomy** (string, default: `"category"`) - Choose "category" or "post_tag"
- **Enable Author Filter** (boolean, default: `false`) - Show author dropdown
- **Filter Toggle Button Label** (string, default: `"Filter & Sort"`) - Customize button text

### Example Block Markup

```html
<!-- wp:renalinfolk/query-filter-container {
  "showSearch": true,
  "showTaxonomy": true,
  "targetTaxonomy": "category",
  "showSortOrder": true,
  "toggleLabel": "Filter & Sort"
} /-->

<!-- wp:query {"queryId":1,"query":{"perPage":12,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
  <!-- Query Loop posts here -->
<!-- /wp:query -->
```

## URL Parameters

The block filters posts using URL query parameters:

| Parameter | Description | Example |
|-----------|-------------|---------|
| `s` | Search keyword | `?s=nephrology` |
| `sort` | Sort order | `?sort=date-desc` (Newest), `date-asc` (Oldest), `title-asc` (A-Z), `title-desc` (Z-A) |
| `date_after` | Start date | `?date_after=2023-01-01` |
| `date_before` | End date | `?date_before=2023-12-31` |
| `category` | Category slugs (comma-separated) | `?category=research,patient-resources` |
| `tag` | Tag slugs (comma-separated) | `?tag=kidney,dialysis` |
| `author` | Author ID | `?author=5` |

### Combined Example

`?s=kidney&category=research&sort=date-desc&date_after=2023-01-01`

This URL searches for "kidney" in the "research" category, sorted by newest first, from January 1, 2023 onwards.

## Accessibility

- **Keyboard Navigation**: Tab through all controls, Enter/Space to toggle drawer
- **Screen Readers**: Full ARIA support (`aria-expanded`, `aria-labelledby`, `role="region"`)
- **Color Contrast**: Meets WCAG AA standards (4.5:1 text, 3:1 UI elements)
- **Focus Indicators**: 2px outline on all interactive elements
- **Responsive**: Stacks vertically on mobile (<768px)

## Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile Safari (iOS)
- Chrome for Android

## Troubleshooting

### Block doesn't appear in Site Editor

1. Ensure `functions.php` includes the block registration (around line 540)
2. Run `npm run build` to generate block assets
3. Clear WordPress cache and reload the editor

### Filters don't work on frontend

1. Check that URL parameters are being passed (inspect browser address bar)
2. Verify `renalinfolk_handle_query_filters()` is registered in `functions.php` (line 555)
3. Ensure the Query Loop block is using `inherit: false` so it respects URL parameters

### Interactivity API not working

1. Verify WordPress 6.5+ is installed (required for Interactivity API)
2. Check browser console for JavaScript errors
3. Ensure `view.js` is enqueued (check page source for `renalinfolk-query-filter-container-view-script`)

### Build errors

```bash
# Clean reinstall dependencies
rm -rf node_modules package-lock.json
npm install --legacy-peer-deps

# Try building again
npm run build
```

## Implementation Details

- **Registration**: `functions.php:540` - `renalinfolk_register_query_filter_block()`
- **Query Handler**: `functions.php:555` - `renalinfolk_handle_query_filters()`
- **Frontend Rendering**: `render.php` - Dynamic PHP template
- **Editor Component**: `src/edit.js` - React component with InspectorControls
- **Interactivity**: `src/view.js` - WordPress Interactivity API store

## Contributing

This block follows WordPress coding standards and the Renalinfolk theme conventions:

- **Text Domain**: `renalinfolk`
- **Function Prefix**: `renalinfolk_`
- **Coding Style**: WordPress Coding Standards (WPCS)
- **CSS Variables**: Use theme.json presets (`var(--wp--preset--color--primary)`)

## License

GPL-2.0-or-later (same as WordPress)

## Credits

Built for the Renalinfolk pediatric nephrology theme.
