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

## WordPress Resources

- Block Theme Handbook: https://developer.wordpress.org/themes/block-themes/
- theme.json Reference: https://developer.wordpress.org/themes/global-settings-and-styles/
- Schema: https://schemas.wp.org/wp/6.7/theme.json
- Block Patterns: https://developer.wordpress.org/themes/features/block-patterns/
- Core Blocks: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
- Full Site Editing: https://wordpress.org/documentation/article/site-editor/
