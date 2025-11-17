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

Renalinfolk is a professional WordPress block theme (Full Site Editing) designed for pediatric nephrology departments and medical institutions. It follows WordPress block theme standards and emphasizes accessibility, medical design patterns, and family-friendly aesthetics.

**Key Information:**
- WordPress Version: 6.7+
- PHP Requirement: 7.2+
- Text Domain: `renalinfolk`
- Function Prefix: `renalinfolk_`
- Theme Schema: https://schemas.wp.org/wp/6.7/theme.json
- Primary Font: Lexend (variable weight 400-900)
- Monospace Font: Fira Code (variable weight 300-700)

## WordPress Block Theme Architecture

This is a **block theme** (not a classic theme), which means:
- All layout is controlled by `theme.json`, not CSS files
- Templates are HTML files (not PHP), located in `templates/`
- Template parts are HTML files in `parts/`
- Patterns are PHP files in `patterns/`
- No `header.php`, `footer.php`, `sidebar.php` - these are template parts
- Styling is primarily configured in `theme.json` using WordPress Global Styles

### Core Files

**theme.json** (16KB, ~785 lines)
- Central configuration for colors, typography, spacing, and block styles
- Must validate against WordPress 6.7 schema
- Contains medical design system: 21-color palette (blues/greens/yellows), Lexend typography, fluid spacing
- Block-specific styles for navigation, buttons, search, post templates, etc.
- Validation command: `node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"`

**functions.php** (167 lines)
- Minimal PHP - block themes need very little server-side code
- Registers custom block styles (`checkmark-list`, `cta-highlight`)
- Registers pattern categories (`renalinfolk_medical_pages`, `renalinfolk_medical_content`)
- Registers block binding source (`renalinfolk/format` for post format names)
- Enqueues `style.css` and `assets/css/editor-style.css`
- All functions use `renalinfolk_` prefix

**style.css** (62 lines)
- Contains theme header metadata (name, version, description, tags)
- Only includes supplementary styles (focus states, link decoration, text-wrap)
- Primary styling comes from `theme.json`, not this file

### Directory Structure

```
/templates/          - Page templates (HTML): index, single, archive, 404, page, search
/parts/              - Template parts (HTML): header, footer variations, sidebar
/patterns/           - Block patterns (PHP): 98 reusable content layouts
/patterns/archive/   - Archived/unused patterns (do not modify)
/styles/             - Style variations (JSON): dark mode, evening mode
/assets/fonts/       - Font files: Lexend (variable 400-900), Fira Code (variable 300-700)
/assets/css/         - Supplementary CSS (editor-style.css)
/openspec/           - Project spec and change management
```

## Medical Design System

**Color Palette** (21 colors total, medical-focused):

*Primary Colors:*
- `base`: #FFFFFF (white backgrounds)
- `contrast`: #0d121b (primary text)
- `primary`: #359EFF (Primary Blue - main brand color)

*Semantic Colors:*
- `background-light`: #f5f7f8 (Light backgrounds)
- `background-dark`: #0f1923 (Dark backgrounds)
- `text-light`: #4A4A4A (Secondary text on light backgrounds)
- `text-dark`: #E0E0E0 (Text on dark backgrounds)

*Theme Colors:*
- `accent`: #FFD28E (Warm accent)
- `accent-dark`: #1d2c33 (Dark accent variant)
- `accent-text`: #332A1C (Accent text color)
- `primary-dark`: #2E4F64 (Darker primary variant)
- `secondary`: #BDE0FE (Secondary blue)
- `green-blue`: #006D77 (Teal accent)
- `footer-dark`: #1C2541 (Footer background)
- `cta-yellow`: #FFC300 (Call-to-action buttons)

*Numbered Accents (for backwards compatibility):*
- `accent-1`: #359EFF (Primary Blue - interactive elements)
- `accent-2`: #004d40 (Primary Dark Green - headers)
- `accent-3`: #FFC300 (CTA Yellow - call-to-action buttons)
- `accent-4`: #006D77 (Green-Blue - accents)
- `accent-5`: #1C2541 (Footer Dark - footer backgrounds)
- `accent-6`: #1a237e (Primary Dark Blue - gradients)

**Typography:**
- Primary: Lexend (sans-serif, variable weight 400-900)
- Monospace: Fira Code (variable weight 300-700)
- Fluid sizing with clamp() for responsive scaling
- Headings: weight 800, letter-spacing -0.1px
- Body: weight 400, line-height 1.5, letter-spacing -0.1px

**Spacing Scale:**
- Uses fluid spacing with clamp() for responsive design
- 7 sizes: Tiny (10px) → XX-Large (clamp(70px, 10vw, 140px))
- Content width: 645px, Wide width: 1340px

**Key Design Features:**
- Rounded buttons: border-radius 9999px (fully rounded pills)
- Navigation gradient: linear-gradient(135deg, accent-4 to accent-6)
- Post cards: white background, box-shadow, hover lift effect
- Search inputs: rounded (border-radius 3.125rem)
- Dark footer backgrounds (accent-5: #1C2541)

## Development Guidelines

### When Modifying theme.json

1. **Always validate JSON syntax** after edits:
   ```bash
   node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"
   ```

2. **Schema compliance**: Ensure all properties match https://schemas.wp.org/wp/6.7/theme.json

3. **Color changes**: Update both `settings.color.palette` AND any hardcoded color references in `styles.blocks.*` CSS

4. **Block styles**: Use `styles.blocks.core/block-name` for block-specific styling, not custom CSS files

5. **Backup before major changes**: A `theme.json.backup` exists for reference

### Pattern Development

Patterns in `patterns/*.php` follow this structure:

```php
<?php
/**
 * Title: Pattern Name
 * Slug: renalinfolk/pattern-slug
 * Categories: renalinfolk_medical_pages, featured
 * Description: Brief description
 */
?>
<!-- wp:group {...} -->
<!-- Block markup here -->
<!-- /wp:group -->
```

**Important:**
- Slug MUST start with `renalinfolk/`
- Use registered categories: `renalinfolk_medical_pages`, `renalinfolk_medical_content`
- 98 existing patterns - avoid duplicates
- Test in Site Editor (Appearance > Editor > Patterns) before committing

### Custom Block Styles

Registered in `functions.php`:
- **checkmark-list**: Adds checkmark bullets to list blocks
- **cta-highlight**: Yellow CTA button style (defined in theme.json)

To add new block styles:
1. Register in `functions.php` using `register_block_style()`
2. Add corresponding styles in `theme.json` under `styles.blocks.core/block-name.variations`

### Template Editing

Templates in `templates/` and `parts/` are HTML with block markup:
- Edit via Site Editor (Appearance > Editor) when possible
- Or directly edit HTML files (use block comment syntax)
- Changes sync between editor and files

**Template Parts:**
- `header.html` - Gradient navigation header
- `vertical-header.html` - Alternative vertical layout
- `header-large-title.html` - Article layout header
- `footer.html` - Dark footer (default)
- `footer-columns.html` - Multi-column footer
- `footer-newsletter.html` - Footer with newsletter signup
- `sidebar.html` - Resources sidebar

## Testing & Validation

### Required Validation Before Commits

1. **JSON Syntax**: `node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"`
2. **PHP Syntax**: `php -l functions.php` (if PHP is available)
3. **Site Editor Test**: Load Appearance > Editor and verify no errors

### Browser Testing

Test these features across browsers:
- Navigation gradient background
- Rounded button borders (9999px radius)
- Post card hover effects (translateY, box-shadow)
- Search input rounded borders
- Color-mix() functions (modern CSS, may need fallbacks)

### Accessibility Requirements

**WCAG AA Compliance:**
- Primary Blue (#135bec) on white: 4.5:1 contrast minimum
- CTA Yellow (#FFC300) with Footer Dark (#1C2541): 3:1+ for large text
- All interactive elements must have visible focus indicators (2px outline)
- Keyboard navigation must work throughout

**Testing Tools:**
- WebAIM Contrast Checker: https://webaim.org/resources/contrastchecker/
- axe DevTools browser extension
- Lighthouse audit in Chrome DevTools

See `TESTING.md` for comprehensive testing checklist.

## Namespace & Naming Conventions

**Strictly enforce:**
- PHP functions: `renalinfolk_function_name()`
- Pattern slugs: `renalinfolk/pattern-name`
- Text domain: `renalinfolk` (never `twentytwentyfive` or other domains)
- CSS classes: Follow WordPress core block conventions
- Block categories: `renalinfolk_category_name`

## Translation & Internationalization

- Text domain: `renalinfolk`
- All translatable strings use `__()`, `_e()`, `_x()` with `renalinfolk` domain
- POT file generation: `wp i18n make-pot . languages/renalinfolk.pot`
- Patterns contain ~200+ translatable strings

## Common Pitfalls

1. **Don't add styles to style.css** - Use theme.json instead (block theme best practice)
2. **Don't create PHP templates** - Use HTML templates with block markup
3. **Don't use old function names** - All must be `renalinfolk_` prefixed
4. **Don't skip JSON validation** - Invalid theme.json breaks Site Editor
5. **Don't modify archived patterns** - Files in `patterns/archive/` and `styles/archive/` are deprecated
6. **Don't hardcode colors** - Use CSS variables: `var(--wp--preset--color--accent-1)`

## WordPress Block Theme Resources

- Block Theme Handbook: https://developer.wordpress.org/themes/block-themes/
- theme.json Reference: https://developer.wordpress.org/themes/global-settings-and-styles/
- Schema Documentation: https://schemas.wp.org/wp/6.7/theme.json
- Pattern Development: https://developer.wordpress.org/themes/features/block-patterns/
- Full Site Editing: https://wordpress.org/documentation/article/site-editor/
