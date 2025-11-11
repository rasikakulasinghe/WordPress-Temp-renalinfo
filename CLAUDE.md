# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Theme Overview

This is a **WordPress Block Theme** (Twenty Twenty-Five variant) that uses Full Site Editing (FSE). The theme emphasizes simplicity and adaptability with flexible design options for personal blogs, professional portfolios, online magazines, or business websites.

**Key characteristics:**
- WordPress 6.7+ required (tested up to 6.8)
- PHP 7.2+ required
- Pure block-based theme (no classic templates)
- Uses `theme.json` for all styling and configuration
- Text domain: `twentytwentyfive`

## Critical Schema Reference

**MANDATORY: Always use the WordPress 6.8 theme.json schema when modifying theme.json:**
```
https://schemas.wp.org/wp/6.8/theme.json
```

The schema is already referenced in `theme.json` at line 733. **All modifications to theme.json MUST conform to this schema.**

### Schema Compliance Rules

**Required properties:**
- `version`: Must be integer `3` (WordPress 6.8 requirement)

**Allowed top-level properties ONLY:**
- `$schema`, `version`, `title`, `slug`, `description`
- `settings`, `styles`, `customTemplates`, `templateParts`, `patterns`, `blockTypes`

**NEVER add properties outside the schema** - WordPress will reject invalid theme.json files.

**Block targeting format:**
- Core blocks: `core/button`, `core/paragraph`, etc.
- Custom blocks: `namespace/blockname`

**CSS property references:**
- Use dot notation: `styles.color.text`, `styles.elements.button.color.background`
- Reference preset values: `var:preset|color|accent-1`

## Directory Structure

```
/
├── assets/
│   ├── css/           # Editor styles
│   ├── fonts/         # Variable fonts (Manrope, Fira Code)
│   └── images/        # Theme images (CC0 licensed)
├── parts/             # Template parts (header, footer, sidebar)
├── patterns/          # Block patterns (.php files)
├── styles/            # Style variations (.json files)
│   ├── blocks/        # Block-specific styles
│   ├── colors/        # Color palette variations
│   ├── sections/      # Section variations
│   └── typography/    # Typography presets
├── templates/         # Block templates (.html files)
├── functions.php      # Theme setup and customization
├── style.css          # Theme metadata and minimal CSS
└── theme.json         # Global theme configuration (PRIMARY)
```

## Working with theme.json

`theme.json` is the **single source of truth** for:
- Color palettes (6 accent colors + base/contrast)
- Typography settings (font families, sizes, fluid typography)
- Spacing scale (20-80 slugs with clamp() responsive values)
- Layout settings (contentSize: 645px, wideSize: 1340px)
- Block-level styling for ALL WordPress core blocks
- Custom templates and template parts registration

**Structure:**
- `settings`: Global configuration (colors, typography, spacing, layout)
- `styles`: Default styling for blocks and elements
- `styles.blocks`: Per-block customization
- `styles.elements`: Styling for semantic elements (button, link, headings)
- `customTemplates`: Custom template definitions
- `templateParts`: Template part areas (header, footer, sidebar)

**Important patterns:**
- Use CSS custom properties: `var(--wp--preset--color--accent-1)`
- Fluid typography uses clamp(): `clamp(30px, 5vw, 50px)`
- Spacing uses preset slugs: `var(--wp--preset--spacing--50)`
- Color uses palette slugs: `var(--wp--preset--color--contrast)`

## Style Variations System

Style variations are stored in `/styles/` as JSON files:
- **Root level** (01-evening.json, 02-noon.json, etc.): Complete theme variations
- **blocks/**: Block-specific style overrides
- **colors/**: Color palette variations only
- **sections/**: Section-level style variations (section-1 through section-5)
- **typography/**: Typography preset variations (7 presets)

Each variation file follows the same theme.json schema but typically contains only `settings.color.palette` and `styles` overrides.

## Block Patterns

Located in `/patterns/` as PHP files. Patterns are categorized:
- **Template patterns**: Full page layouts (prefix: `template-`)
- **Hidden patterns**: Reusable components (prefix: `hidden-`)
- **Feature patterns**: Specific features (hero, footer, header, cta, etc.)

Pattern files use WordPress block markup with `<!-- wp:blockName -->` syntax.

**Custom pattern categories registered in functions.php:**
- `twentytwentyfive_page`: Full page layouts
- `twentytwentyfive_post-format`: Post format patterns

## Templates & Template Parts

**Templates** (`/templates/*.html`):
- Core templates: index.html, home.html, single.html, page.html, archive.html, search.html, 404.html
- Custom template: page-no-title.html
- Use WordPress block markup exclusively

**Template Parts** (`/parts/*.html`):
- header.html, footer.html, sidebar.html
- header-large-title.html, vertical-header.html
- footer-columns.html, footer-newsletter.html
- Most parts reference patterns: `<!-- wp:pattern {"slug":"twentytwentyfive/header"} /-->`

## PHP Functions (functions.php)

The theme uses minimal PHP for:
1. **Post format support**: `twentytwentyfive_post_format_setup()`
2. **Editor styles**: `twentytwentyfive_editor_style()` - enqueues `assets/css/editor-style.css`
3. **Frontend styles**: `twentytwentyfive_enqueue_styles()` - enqueues `style.css`
4. **Custom block styles**: `twentytwentyfive_block_styles()` - registers checkmark list style
5. **Pattern categories**: `twentytwentyfive_pattern_categories()`
6. **Block bindings**: `twentytwentyfive_register_block_bindings()` - post format name binding

**All functions use proper WordPress hooks:**
- `after_setup_theme`: Theme setup
- `wp_enqueue_scripts`: Frontend asset loading
- `init`: Block styles, patterns, bindings

## Typography System

**Font families:**
- **Manrope** (primary): Variable font (200-800 weight), sans-serif
- **Fira Code** (code): Variable font (300-700 weight), monospace
- Fonts stored in `assets/fonts/` as .woff2 files

**Font sizes:**
- Small: 0.875rem (static)
- Medium: 1rem → 1.125rem (fluid)
- Large: 1.125rem → 1.375rem (fluid)
- X-Large: 1.75rem → 2rem (fluid)
- XX-Large: 2.15rem → 3rem (fluid)

Fluid typography enabled globally: `settings.typography.fluid: true`

## Color System

**Base palette (6 accents + base/contrast):**
- Base: #FFFFFF (background)
- Contrast: #111111 (foreground)
- Accent 1: #FFEE58 (yellow)
- Accent 2: #F6CFF4 (pink)
- Accent 3: #503AA8 (purple)
- Accent 4: #686868 (gray)
- Accent 5: #FBFAF3 (off-white)
- Accent 6: color-mix() (20% contrast + transparent)

Style variations override these colors with new palettes.

## Spacing Scale

7 spacing presets with responsive values:
- 20 (Tiny): 10px
- 30 (X-Small): 20px
- 40 (Small): 30px
- 50 (Regular): clamp(30px, 5vw, 50px)
- 60 (Large): clamp(30px, 7vw, 70px)
- 70 (X-Large): clamp(50px, 7vw, 90px)
- 80 (XX-Large): clamp(70px, 10vw, 140px)

## Layout System

- **contentSize**: 645px (default content width)
- **wideSize**: 1340px (wide alignment width)
- **useRootPaddingAwareAlignments**: true (modern alignment system)
- Default horizontal padding: `var(--wp--preset--spacing--50)`

## Development Workflow

**No build process required** - this is a pure block theme:
- Edit `theme.json` for global styling changes
- Create/edit .html files in `/templates/` and `/parts/` for structure
- Create/edit .php files in `/patterns/` for reusable patterns
- Create/edit .json files in `/styles/` for style variations
- Minimal PHP changes in `functions.php` only when needed

**Testing:**
- Test in WordPress Site Editor (Appearance → Editor)
- Test all style variations (8 total: evening, noon, dusk, afternoon, twilight, morning, sunrise, midnight)
- Verify responsive behavior using spacing clamp() values
- Test with different content types (posts, pages, archives)

**Common modifications:**
- Colors: Edit `theme.json` → `settings.color.palette`
- Typography: Edit `theme.json` → `settings.typography`
- Spacing: Edit `theme.json` → `settings.spacing.spacingSizes`
- Block styles: Edit `theme.json` → `styles.blocks.core/{blockName}`
- New patterns: Add .php file to `/patterns/`
- Style variations: Add .json file to `/styles/` or subdirectories

## Important Conventions

1. **NEVER break WordPress standards** - Follow official WordPress coding standards and theme review requirements
2. **ALWAYS validate against WP 6.8 schema** when editing theme.json - Invalid JSON will break the theme
3. **Use WordPress block markup exclusively** in templates/patterns - No custom HTML outside block syntax
4. **Follow WordPress naming conventions**:
   - Patterns: kebab-case with category prefix
   - Functions: `twentytwentyfive_` prefix (must match text domain)
   - Text domain: `twentytwentyfive` (consistent everywhere)
   - Hooks: Use WordPress core hooks only (`after_setup_theme`, `init`, `wp_enqueue_scripts`)
5. **Maintain accessibility standards**: WCAG 2.1 Level AA compliance, semantic markup, proper ARIA labels
6. **Keep it minimal**: Block themes should avoid PHP logic where possible - let theme.json handle styling
7. **Test fluid typography**: Verify clamp() values work across viewport sizes (320px to 1920px+)
8. **Preserve existing block variation structure**: Don't remove variations (buttons, quotes, separators)
9. **Valid CSS only**: Use CSS custom properties and color-mix() - no invalid CSS that breaks the editor
10. **No inline styles in patterns**: Use block attributes and theme.json settings instead

## WordPress Block Theme Rules

**DO:**
- Validate all theme.json changes against the schema
- Use preset values via CSS custom properties: `var(--wp--preset--color--accent-1)`
- Reference spacing via slugs: `var:preset|spacing|50`
- Use block variations for styling options
- Register block styles in functions.php when needed
- Use WordPress core blocks whenever possible

**DON'T:**
- Add properties not in the WordPress 6.8 theme.json schema
- Use arbitrary CSS class names outside WordPress block classes
- Add custom post types, taxonomies, or complex PHP logic
- Hardcode colors, font sizes, or spacing values
- Use deprecated WordPress functions or hooks
- Break the template hierarchy (WordPress will ignore invalid templates)
