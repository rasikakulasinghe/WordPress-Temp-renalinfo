# Project Context

## Purpose
Renalinfolk is a professional WordPress block theme (Full Site Editing) designed for pediatric nephrology departments and medical institutions. It follows WordPress block theme standards and emphasizes accessibility, medical design patterns, and family-friendly aesthetics targeting healthcare organizations, educational content, and patient resources.

## Tech Stack
- **WordPress**: 6.7+ (Full Site Editing / Block Theme)
- **PHP**: 7.2+
- **HTML**: Block-based HTML templates in `templates/` and `parts/` directories (not PHP templates)
- **CSS**: Primarily in `theme.json`; minimal supplementary CSS in `style.css` (focus states, progressive enhancements)
- **theme.json**: Schema version 3 (https://schemas.wp.org/wp/6.7/theme.json) - 16KB, ~785 lines
- **JavaScript**: Minimal (WordPress block editor handles interactivity)
- **Fonts**: Lexend (variable 400-900), Fira Code (variable 300-700)

## Project Conventions

### Code Style
- **PHP Standards**: Follow WordPress Coding Standards (WPCS)
- **Function Naming**: Prefix ALL functions with `renalinfolk_` (NEVER `twentytwentyfive_`)
- **Function Documentation**: Use PHPDoc blocks with `@since`, `@return`, and `@param` tags
- **Text Domain**: `renalinfolk` for all translatable strings (STRICTLY enforced)
- **Escaping**: Always use WordPress escaping functions (`esc_html__()`, `esc_attr__()`, etc.)
- **Conditional Function Loading**: Wrap functions in `if ( ! function_exists() )` checks
- **Hook Priority**: Use standard WordPress action/filter priority conventions
- **Indentation**: Tabs for PHP, as per WordPress standards
- **File Organization**:
  - Core functionality in `functions.php` (167 lines - minimal for block themes)
  - Block patterns in `patterns/` directory (98 PHP files)
  - HTML templates in `templates/` (10 templates) and `parts/` (7 template parts)
  - Style variations in `styles/` (JSON files: 01-evening.json, 02-dark.json)
  - Assets in `assets/fonts/` and `assets/css/`

### Architecture Patterns
- **Full Site Editing (FSE)**: WordPress block theme architecture (NOT classic theme)
- **Template Hierarchy**: HTML templates (NOT PHP) with serialized block markup
- **Template Parts**: Reusable components in `parts/` (header variants, footer variants, sidebar)
- **Block Patterns**: 98 pre-designed medical/healthcare layouts organized by category
- **Block Styles**: Custom block variations (`checkmark-list`, `cta-highlight`) registered in `functions.php`
- **Block Bindings**: Custom data source `renalinfolk/format` for post format names
- **theme.json Schema**: Centralized design system (21-color medical palette, Lexend typography, fluid spacing)
- **Pattern Categories**: `renalinfolk_medical_pages`, `renalinfolk_medical_content`
- **Post Formats**: Support for aside, audio, chat, gallery, image, link, quote, status, video
- **Progressive Enhancement**: CSS features (color-mix, text-wrap: pretty) with fallbacks

### Design System (theme.json)

**Color Palette** (21 colors - medical-focused):
- **Primary**: `primary` (#359EFF - Primary Blue), `base` (#FFFFFF), `contrast` (#0d121b)
- **Semantic**: `background-light` (#f5f7f8), `background-dark` (#0f1923), `text-light` (#4A4A4A), `text-dark` (#E0E0E0)
- **Theme**: `accent` (#FFD28E), `primary-dark` (#2E4F64), `secondary` (#BDE0FE), `green-blue` (#006D77), `footer-dark` (#1C2541), `cta-yellow` (#FFC300)
- **Numbered** (backwards compatibility): `accent-1` through `accent-6`
- **Accessibility**: WCAG AA compliant (4.5:1 text, 3:1 UI components)

**Spacing Scale**:
- 7 sizes: Tiny (10px) → XX-Large (clamp(70px, 10vw, 140px))
- Content width: 645px, Wide width: 1340px
- Fluid spacing using CSS clamp() for responsive design

**Typography**:
- Primary: Lexend (sans-serif, variable 400-900)
- Monospace: Fira Code (variable 300-700)
- Headings: weight 800, letter-spacing -0.1px
- Body: weight 400, line-height 1.5, letter-spacing -0.1px
- Fluid sizing with clamp() for responsive scaling

**Key Design Features**:
- Rounded buttons: border-radius 9999px (fully rounded pills)
- Navigation gradient: linear-gradient(135deg, accent-4 to accent-6)
- Post cards: white background, box-shadow, hover lift effect (translateY)
- Search inputs: rounded (border-radius 3.125rem)
- Dark footer backgrounds (accent-5: #1C2541)

### Testing Strategy
- **Pre-Commit Validation**:
  1. JSON Syntax: `node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"`
  2. PHP Syntax: `php -l functions.php` (if available)
  3. Style Variations: Validate each JSON in `styles/`
  4. Site Editor Test: Verify no errors in Appearance > Editor
  5. Pattern Test: Insert patterns to verify block markup
- **Browser Testing**: Navigation gradient, rounded buttons, post card hover, search inputs, color-mix()
- **Accessibility Testing**: WCAG AA compliance, screen readers, keyboard navigation, 2px focus indicators
- **Responsive Testing**: Mobile, tablet, desktop viewports
- **RTL Testing**: Right-to-left language support
- **Block Editor Testing**: Patterns render correctly in editor and frontend

### Git Workflow
- Standard WordPress theme development workflow
- Version tracking in `style.css` header
- Follow semantic versioning for releases
- Test changes in local WordPress 6.7+ environment before committing

## Domain Context

### WordPress Block Theme Concepts
- **Block Patterns**: Reusable pre-designed block compositions stored as PHP files in `patterns/`
  - Format: `<!-- wp:namespace/block-name {"attribute":"value"} -->`
  - Must include header with Title, Slug (renalinfolk/pattern-name), Categories, Description
  - 98 existing patterns (avoid duplicates)
- **Template Parts**: Reusable sections (header, footer) stored in `parts/` as HTML files
  - 7 template parts: header variants (3), footer variants (3), sidebar (1)
- **Templates**: Full page templates in `templates/` directory (HTML files, NOT PHP)
  - 10 templates: index, home, archive, single, page (3 variants), 404, search
- **Global Styles**: Design tokens and presets defined in `theme.json`
- **Block Styles**: Custom styling variations for core blocks (registered in functions.php)
- **Block Bindings**: Dynamic data sources bound to block attributes (WP 6.5+)

### Pattern Categories
- **Medical Pages** (`renalinfolk_medical_pages`): Full page layouts for healthcare, services, about, contact
- **Medical Content** (`renalinfolk_medical_content`): Services sections, team bios, testimonials, FAQs
- **Post Formats**: Templates for different post types (audio, link, gallery, quote, etc.)
- **Headers/Footers**: Gradient navigation header, vertical header, large title header, dark footer, columns footer, newsletter footer
- **Heroes/Banners**: Large intro sections with medical imagery
- **CTAs**: Newsletter signups, appointment booking, resource downloads
- **Contact**: Location info, phone/email, social links

### Template Inventory
**Templates** (`templates/*.html`):
- index.html - Main fallback template
- home.html - Front page (blog listing)
- archive.html - Category/tag/date archives
- single.html - Single post view
- page.html - Default page template
- page-about.html - Custom template for About pages
- page-contact.html - Custom template for Contact pages
- page-no-title.html - Page template without title
- 404.html - Error page
- search.html - Search results

**Template Parts** (`parts/*.html`):
- header.html - Gradient navigation header
- vertical-header.html - Alternative vertical layout
- header-large-title.html - Article layout header
- footer.html - Dark footer (default)
- footer-columns.html - Multi-column footer
- footer-newsletter.html - Footer with newsletter signup
- sidebar.html - Resources sidebar

## Important Constraints

### WordPress Requirements
- **Minimum WordPress**: 6.7
- **Minimum PHP**: 7.2
- **Block Editor**: MUST use FSE/Gutenberg (no classic editor support)
- **No jQuery**: Avoid jQuery dependencies; use vanilla JS if needed
- **Performance**: Minimize HTTP requests, optimize assets

### Theme Standards
- **i18n Ready**: All strings MUST be translatable with `renalinfolk` text domain
- **Accessibility Ready**: MUST meet WordPress accessibility requirements (WCAG AA)
- **No Plugin Dependencies**: Theme MUST work without additional plugins
- **Child Theme Safe**: Functions wrapped in `function_exists()` checks
- **GPL Licensed**: All code MUST be GPL v2+ compatible

### File Structure Constraints
- Block patterns MUST be PHP files in `patterns/` directory (NOT archived patterns in `patterns/archive/`)
- Templates MUST be HTML files in `templates/` directory (NOT PHP files)
- Template parts MUST be HTML files in `parts/` directory
- `theme.json` MUST validate against WordPress 6.7 schema
- `style.css` header MUST contain required theme metadata
- Style variations MUST be JSON files in `styles/` directory

### Critical Don'ts
1. **NEVER add styles to style.css** - Use theme.json instead (block theme best practice)
2. **NEVER create PHP templates** - Use HTML templates with block markup
3. **NEVER use `twentytwentyfive_` prefix** - ALL functions MUST use `renalinfolk_`
4. **NEVER skip JSON validation** - Invalid theme.json breaks Site Editor
5. **NEVER modify archived patterns** - Files in `patterns/archive/` are deprecated
6. **NEVER hardcode colors** - Use CSS variables: `var(--wp--preset--color--primary)`
7. **NEVER use wrong text domain** - STRICTLY `renalinfolk`, not `twentytwentyfive`

## External Dependencies

### WordPress Core APIs
- **Block Editor (Gutenberg)**: Core block library
  - Common blocks: `core/group`, `core/columns`, `core/paragraph`, `core/heading`, `core/image`, `core/list`
  - Template blocks: `core/template-part`, `core/post-title`, `core/post-content`, `core/post-featured-image`
  - Navigation: `core/navigation`, `core/navigation-link`, `core/navigation-submenu`
- **Full Site Editing API**: Template editing, global styles
- **Theme JSON API**: Design system configuration (schema version 3)
- **Block Patterns API**: Pattern registration and rendering
- **Block Styles API**: Custom block style variations (`register_block_style()`)
- **Block Bindings API**: Dynamic data binding (WP 6.5+, `register_block_bindings_source()`)

### Browser Features (Progressive Enhancement)
- **CSS Custom Properties**: For design tokens (required)
- **CSS Grid/Flexbox**: For layouts (required)
- **CSS Clamp**: For responsive sizing (required)
- **CSS color-mix()**: For dynamic color generation (progressive enhancement)
- **text-wrap: pretty**: Progressive enhancement for typography

### WordPress Functions Used
- `add_theme_support()`: Feature enablement
- `register_block_style()`: Custom block styles (checkmark-list, cta-highlight)
- `register_block_pattern_category()`: Pattern organization (renalinfolk_medical_pages, renalinfolk_medical_content)
- `register_block_bindings_source()`: Custom data sources (renalinfolk/format)
- `wp_enqueue_style()`: Asset loading (style.css, editor-style.css)
- `add_editor_style()`: Editor stylesheet
- Theme template hierarchy functions

## Validation & Resources

### Validation Commands
```bash
# Validate theme.json syntax (REQUIRED before commit)
node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"

# Validate PHP syntax
php -l functions.php

# Validate all pattern files
for file in patterns/*.php; do php -l "$file"; done

# Validate style variations
node -e "JSON.parse(require('fs').readFileSync('styles/01-evening.json', 'utf8'))"
node -e "JSON.parse(require('fs').readFileSync('styles/02-dark.json', 'utf8'))"
```

### Official Documentation
- Block Theme Handbook: https://developer.wordpress.org/themes/block-themes/
- theme.json Reference: https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/
- Schema Documentation: https://schemas.wp.org/wp/6.7/theme.json
- Pattern Development: https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
- Block Editor Handbook: https://developer.wordpress.org/block-editor/
- Core Blocks Reference: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
- Full Site Editing: https://wordpress.org/documentation/article/site-editor/

### Accessibility Testing
- WebAIM Contrast Checker: https://webaim.org/resources/contrastchecker/
- axe DevTools browser extension
- Lighthouse audit in Chrome DevTools
- See `TESTING.md` for comprehensive checklist
