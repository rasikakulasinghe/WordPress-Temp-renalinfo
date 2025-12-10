# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

<!-- OPENSPEC:START -->
# OpenSpec Instructions

These instructions are for AI assistants working in this project.

Always open `@/openspec/AGENTS.md` when the request:
- Mentions planning or proposals (words like proposal, spec, change, plan)
- Introduces new capabilities, breaking changes, architecture shifts, or big performance/security work
- Sounds ambiguous and you need the authoritative spec before coding

Use `@/openspec/AGENTS.md` to learn:
- How to create and apply change proposals
- Spec format and conventions
- Project structure and guidelines

Keep this managed block so 'openspec update' can refresh the instructions.

<!-- OPENSPEC:END -->

## Project Overview

Renalinfolk is a WordPress **block theme** (Full Site Editing) for pediatric nephrology departments. This is NOT a classic WordPress theme - all layout is controlled by `theme.json`, templates are HTML (not PHP), and styling uses WordPress Global Styles.

**Core Requirements:**
- WordPress 6.7+, PHP 7.2+
- Text domain: `renalinfolk`, Function prefix: `renalinfolk_`
- Schema: https://schemas.wp.org/wp/6.7/theme.json

## Architecture Overview

### Critical Files

**theme.json** (846 lines)
Central configuration for the entire theme. Invalid JSON breaks the Site Editor.
- 17-color medical palette (Primary Blue #359EFF, Green-Blue #006D77, CTA Yellow #FFC300)
- Lexend typography (variable 400-900), fluid spacing with clamp()
- Block-specific styles under `styles.blocks.core/*`
- Must validate against WordPress 6.7 schema version 3

**functions.php** (520 lines)
Minimal PHP for block theme support:
- Line 119: Custom block styles (`checkmark-list`, `cta-highlight`)
- Line 156: Pattern categories (`renalinfolk_medical_pages`, `renalinfolk_medical_content`, `renalinfolk_post-format`)
- Line 194: Block binding for post format names
- Line 285: Video meta fields (`renalinfolk_video_url`, `renalinfolk_video_duration`)
- Line 332: Gallery query filtering (category/tag parameters)
- Line 444: Video embed rendering (YouTube, Vimeo, iframe fallbacks)

**style.css** (213 lines)
Supplementary styles only (theme.json is primary):
- Card components (resource-card, news-card, article-card, video-card)
- Focus states, hover effects, gradient header
- Use theme.json for all other styling

### Directory Structure

```
/templates/          - 18 HTML templates (NO PHP CODE - use block syntax)
/parts/              - header.html, footer.html (template parts)
/patterns/           - 52 PHP block patterns
/styles/             - 01-evening.json, 02-dark.json (style variations)
/assets/fonts/       - Lexend, Fira Code (variable fonts)
/assets/js/          - video-embed.js, video-meta-editor.js
/blocks/             - Custom blocks (query-filter-container)
/openspec/           - Change management specs
```

## Development Commands

### Validation (Required Before Commits)

```bash
# Validate theme.json (CRITICAL - invalid JSON breaks Site Editor)
node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"

# Validate PHP (Windows XAMPP)
C:/xampp/php/php.exe -l functions.php

# Validate style variations
node -e "JSON.parse(require('fs').readFileSync('styles/01-evening.json', 'utf8'))"
node -e "JSON.parse(require('fs').readFileSync('styles/02-dark.json', 'utf8'))"
```

### Custom Block Development

```bash
# Install dependencies (required before building blocks)
npm install --legacy-peer-deps

# Build custom blocks for production
npm run build

# Start development mode with auto-rebuild
npm start
```

### WordPress CLI (if available)

```bash
# Generate translation POT file
wp i18n make-pot . languages/renalinfolk.pot

# List registered patterns
wp block-pattern list

# Export theme as ZIP
wp theme export renalinfolk
```

## Block Theme Development

### Template Files (.html)

**CRITICAL:** Templates are HTML with block markup - NEVER add PHP code.

Block syntax: `<!-- wp:block-name {"attribute":"value"} -->Content<!-- /wp:block-name -->`

Edit via:
1. Site Editor (Appearance > Editor) - preferred
2. Direct HTML editing (use block comment syntax only)

Changes sync between editor and files.

### Block Patterns (patterns/*.php)

Structure:
```php
<?php
/**
 * Title: Pattern Name
 * Slug: renalinfolk/pattern-slug
 * Categories: renalinfolk_medical_pages
 * Description: Brief description
 */
?>
<!-- wp:group {...} -->
Block markup here
<!-- /wp:group -->
```

**Rules:**
- Slug MUST start with `renalinfolk/`
- Use registered categories only
- Test in Site Editor before committing
- 52 patterns exist - avoid duplicates

### Modifying theme.json

**Process:**
1. Make changes
2. Validate JSON syntax (see commands above)
3. Update related `styles.blocks.*` if changing colors
4. Test in Site Editor (Appearance > Editor)

**Color Changes:**
- Update `settings.color.palette` AND any hardcoded references
- Maintain WCAG AA contrast (4.5:1 text, 3:1 UI)
- Use semantic slugs (`primary`, not `blue`)

**Block Styles:**
- Add to `styles.blocks.core/block-name` (not style.css)
- Custom variations: `styles.blocks.core/block-name.variations.variation-name`

### CSS Variables

Access theme.json settings via CSS custom properties:

```css
background-color: var(--wp--preset--color--primary);
padding: var(--wp--preset--spacing--50);
font-family: var(--wp--preset--font-family--lexend);
```

## Medical Design System

**Color Palette (17 colors):**
- Primary: `#359EFF` (3.36:1 on white - large text only)
- Contrast: `#0d121b` (17.36:1 - AAA)
- Green-Blue: `#006D77` (5.71:1 - AA)
- CTA Yellow: `#FFC300` (8.35:1 on footer-dark - AAA)
- Footer Dark: `#1C2541`

**Full contrast ratios documented in Accessibility section below.**

**Design Features:**
- Buttons: border-radius 9999px (pill shape)
- Navigation: linear-gradient(135deg, green-blue to footer-dark)
- Cards: box-shadow, hover lift (translateY)
- Spacing: Fluid clamp() - Tiny (10px) to XX-Large (clamp(70px, 10vw, 140px))
- Content width: 900px, Wide: 1200px

## Video Gallery System

Custom implementation for video posts:

**Meta Fields:**
- `renalinfolk_video_url` - Video URL (YouTube, Vimeo)
- `renalinfolk_video_duration` - Duration string (e.g., "5:30")

**Implementation:**
- Registration: functions.php:285
- Editor UI: assets/js/video-meta-editor.js (enqueued at 415)
- Embed rendering: functions.php:444 (YouTube/Vimeo auto-detect)
- Query filtering: functions.php:332 (supports `?tag=event&orderby=date`)

## Icon System

The theme uses **inline SVG icons** for optimal performance (2-3KB total vs 100-300KB for icon fonts).

**Available Icons (17):**
- `arrow_forward` - Navigation arrows
- `article` - Article/document icon
- `biotech` - Diagnostic/medical science
- `call` - Phone/contact
- `campaign` - Announcements
- `celebration` - Events/celebrations
- `check_circle` - Checkmarks/confirmation
- `diversity_3` - Community/diversity
- `family_restroom` - Family services
- `image` - Image/gallery
- `local_hospital` - Hospital/medical
- `location_on` - Location/maps
- `mail` - Email/contact
- `medical_information` - Medical info
- `play_circle` - Video/media
- `psychology` - Counseling/mental health
- `schedule` - Calendar/scheduling

### Usage in PHP (Patterns)

```php
<?php
// Basic usage
echo renalinfolk_get_icon_svg( 'campaign', 40, 'var(--wp--preset--color--green-blue)' );

// With additional CSS class
echo renalinfolk_get_icon_svg( 'arrow_forward', 16, 'currentColor', 'inline-icon' );

// With custom attributes
echo renalinfolk_get_icon_svg( 'biotech', 48, '#006D77', '', array( 'role' => 'img' ) );
?>
```

**Function Parameters:**
- `$name` (string, required) - Icon name from list above
- `$size` (int, optional) - Size in pixels, default 24
- `$color` (string, optional) - CSS color value or variable, default 'currentColor'
- `$class` (string, optional) - Additional CSS classes, default ''
- `$attr` (array, optional) - Additional HTML attributes, default array()

### Usage in Templates (HTML)

Since templates are HTML files, use inline SVG directly:

```html
<!-- wp:html -->
<svg width="40" height="40" viewBox="0 0 24 24" fill="var(--wp--preset--color--green-blue)" aria-hidden="true" class="renalinfolk-icon renalinfolk-icon--biotech" xmlns="http://www.w3.org/2000/svg">
  <path d="M7 19c-1.1 0-2 .9-2 2h14c0-1.1-.9-2-2-2h-4v-2h3c1.1 0 2-.9 2-2h-8c-1.66 0-3-1.34-3-3 0-1.09.59-2.04 1.47-2.57L8 9.86V19H7zm5-10.5l-.83.83c-.54.54-.83 1.25-.83 2 0 .55.45 1 1 1h3c0-.55-.45-1-1-1l-2-.83-.83-.83L12 8.5zm0-5.5l3 3H9l3-3z"/>
</svg>
<!-- /wp:html -->
```

### Usage in Block Editor

Insert icon patterns via the inserter:
1. Open Block Inserter (`/`)
2. Search for "Icon - " to see available icons
3. Insert and customize colors/sizes via HTML edit

**Available Icon Patterns:**
- `renalinfolk/icon-campaign` - Campaign icon (40px, green-blue)
- `renalinfolk/icon-biotech` - Biotech icon (40px, green-blue)
- `renalinfolk/icon-arrow-forward` - Arrow icon (16px, currentColor)

### Adding New Icons

**Step 1: Get SVG Path**
1. Go to [Google Fonts Icons](https://fonts.google.com/icons)
2. Search for your icon (Material Symbols Outlined)
3. Download SVG and extract the `<path d="..."/>` content

**Step 2: Add to functions.php**

Edit `functions.php`, find the `renalinfolk_get_icon_svg()` function (around line 825), and add your icon to the `$icons` array:

```php
$icons = array(
	// ... existing icons ...
	'new_icon_name' => '<path d="YOUR_SVG_PATH_DATA_HERE"/>',
);
```

**Step 3: Create Block Pattern (Optional)**

Create `patterns/icon-new-icon-name.php`:

```php
<?php
/**
 * Title: Icon - New Icon Name
 * Slug: renalinfolk/icon-new-icon-name
 * Categories: renalinfolk_medical_content
 * Description: Description of the icon.
 */
?>
<!-- wp:html -->
<?php echo renalinfolk_get_icon_svg( 'new_icon_name', 40, 'var(--wp--preset--color--green-blue)' ); ?>
<!-- /wp:html -->
```

**Step 4: Use in Templates/Patterns**
- PHP files: `<?php echo renalinfolk_get_icon_svg( 'new_icon_name', 40, 'currentColor' ); ?>`
- HTML files: Copy the SVG output and paste inline

**Icon Sizing Guide:**
- Small inline: 16px (arrows, small indicators)
- Medium: 24px (default, list icons, checkmarks)
- Large: 40px (feature cards, service icons)
- Extra large: 48px (hero sections, announcements)

**Performance:**
- Each icon adds ~100-200 bytes
- All 17 icons = ~2.5KB total
- No external requests
- Instant rendering

## Accessibility (WCAG AA)

**Tested Contrast Ratios:**

| Color Combination | Ratio | Status |
|------------------|-------|--------|
| Primary Blue (#359EFF) on White | 3.36:1 | ⚠️ Large text only |
| Contrast (#0d121b) on White | 17.36:1 | ✅ AAA |
| Text Light (#4A4A4A) on White | 9.24:1 | ✅ AAA |
| CTA Yellow on Footer Dark | 8.35:1 | ✅ AAA |
| Green-Blue on White | 5.71:1 | ✅ AA |
| Text Dark on Background Dark | 11.18:1 | ✅ AAA |

**Requirements:**
- Focus indicators: 2px outline on all interactive elements
- Keyboard navigation throughout
- ARIA labels on navigation blocks
- Semantic HTML5 landmarks

**Testing Tools:**
- WebAIM Contrast Checker: https://webaim.org/resources/contrastchecker/
- axe DevTools browser extension
- Chrome Lighthouse audit

## Common Pitfalls

1. **Don't add PHP to .html templates** - Block templates use HTML comment syntax only
2. **Don't add styles to style.css first** - Use theme.json for primary styling
3. **Don't skip JSON validation** - Invalid theme.json breaks Site Editor completely
4. **Don't hardcode colors** - Use CSS variables: `var(--wp--preset--color--primary)`
5. **Don't use wrong namespace** - All functions: `renalinfolk_`, patterns: `renalinfolk/`, text domain: `renalinfolk`
6. **Don't forget contrast ratios** - Primary blue (#359EFF) requires large text (18px+)

## Naming Conventions

**Strictly enforce:**
- PHP functions: `renalinfolk_function_name()`
- Pattern slugs: `renalinfolk/pattern-name`
- Block categories: `renalinfolk_category_name`
- Text domain: `renalinfolk` (in all `__()`, `_e()`, `_x()` calls)
- Never use `twentytwentyfive` or other theme domains

## Custom Blocks

### Query Filter Container Block

**Location:** `blocks/query-filter-container/`

A custom dynamic block that renders a fixed sidebar filter for Query Loop blocks with button-style tag selection.

**Features:**
- Fixed sidebar layout (320px width, full viewport height)
- Gradient background (teal to dark blue)
- Sort by date (ascending/descending)
- Filter by date range with calendar icon overlays
- Button-style tag filter in 3-column grid (scrollable)
- Custom blue scrollbar for tag container
- Fully responsive (mobile-first design)
- Accessible (WCAG AA compliant)
- Vanilla JavaScript for tag button selection

**Block Attributes:**
- `showSortOrder` (boolean, default: true) - Enable sort dropdown
- `showDate` (boolean, default: false) - Enable date range inputs with calendar icons
- `showTaxonomy` (boolean, default: true) - Enable button-style tag filter

**URL Parameters:**
The block filters posts via URL parameters that WordPress Query Loop automatically respects:
- `?sort=date-desc|date-asc` - Sort order
- `?date_after=YYYY-MM-DD&date_before=YYYY-MM-DD` - Date range
- `?tag=slug1,slug2` - Filter by tag slugs (comma-separated for multiple tags)

**Usage in Templates:**
```html
<!-- wp:renalinfolk/query-filter-container {
  "showSortOrder": true,
  "showDate": true,
  "showTaxonomy": true
} /-->

<!-- wp:group with margin-left: 340px for content -->
  <!-- wp:query {...} -->
    <!-- Query Loop displays filtered posts here -->
  <!-- /wp:query -->
<!-- /wp:group -->
```

**Admin Configuration:**
1. Insert block in Site Editor (Appearance > Editor)
2. Use InspectorControls sidebar to enable/disable filters (sort order, date range, tags)
3. Sidebar is always visible - no toggle functionality

**Build Process:**
```bash
# Development (auto-rebuild on save)
npm start

# Production build
npm run build
```

Built assets are output to `blocks/query-filter-container/build/`:
- `index.js` - Editor JavaScript
- `view.js` - Frontend Interactivity API
- `style-index.css` - Frontend + Editor styles
- `index.css` - Editor-only styles

**Implementation Details:**
- Registration: functions.php:540 (`renalinfolk_register_query_filter_block()`)
- Query filtering: functions.php:555 (`renalinfolk_handle_query_filters()`)
- Frontend rendering: blocks/query-filter-container/render.php
- Tag button selection: Vanilla JavaScript (blocks/query-filter-container/build/view.js)
- Date picker sync: JavaScript syncs hidden date picker with display input

**Tag Button Selection:**
- Click tag button to select/deselect (blue background = selected)
- Multiple tags can be selected simultaneously
- Selected tags persist on page load via URL parameters
- Hidden input stores comma-separated tag slugs for form submission
- Keyboard accessible: Space/Enter keys toggle selection

**Responsive Behavior:**
- Desktop (1024px+): Fixed sidebar 320px wide, content margin-left: 340px
- Tablet (768-1023px): Fixed sidebar 280px wide
- Mobile (<768px): Sidebar becomes relative positioning, full-width
- Tag grid: 3 columns desktop, 2 columns mobile

**Testing:**
- Keyboard navigation: Tab through all inputs, Enter/Space to select tags
- Screen readers: ARIA attributes (`aria-pressed` on tag buttons)
- Mobile: Tag buttons have 44px min-height for touch targets
- Contrast: White text on gradient background meets WCAG AA standards
- Calendar icons: Clickable to open native date picker

## WordPress Resources

- Block Theme Handbook: https://developer.wordpress.org/themes/block-themes/
- theme.json Reference: https://developer.wordpress.org/themes/global-settings-and-styles/
- Schema: https://schemas.wp.org/wp/6.7/theme.json
- Block Patterns: https://developer.wordpress.org/themes/features/block-patterns/
- Core Blocks: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
- Full Site Editing: https://wordpress.org/documentation/article/site-editor/
- Interactivity API: https://developer.wordpress.org/block-editor/reference-guides/interactivity-api/
