<!--
Sync Impact Report:
Version: 0.0.0 → 1.0.0 (MAJOR)
Rationale: Initial constitution creation for WordPress block theme development

Modified Principles:
- NEW: All principles created from scratch for WordPress block theme standards

Added Sections:
- Core Principles (7 principles)
- WordPress Standards Compliance
- Development Workflow
- Governance

Templates Requiring Updates:
✅ plan-template.md - Updated with WordPress-specific technical context, constitution check gates, and block theme directory structure
✅ spec-template.md - Updated functional requirements examples for WordPress themes, added theme component section, WordPress-specific success criteria
✅ tasks-template.md - Updated path conventions, setup/foundational phases for WordPress block themes, WordPress-specific implementation tasks
⚠️ checklist-template.md - Pending manual review for WordPress-specific validation checks
⚠️ agent-file-template.md - Pending manual review for WordPress theme development guidance

Follow-up TODOs:
- None - all placeholders filled
-->

# WordPress Block Theme Constitution

## Core Principles

### I. Schema Compliance (NON-NEGOTIABLE)

All `theme.json` modifications MUST validate against the WordPress 6.8 schema at `https://schemas.wp.org/wp/6.8/theme.json`.

**Rules:**
- The `version` property MUST be integer `3` (WordPress 6.8 requirement)
- ONLY schema-defined properties permitted at all levels (settings, styles, customTemplates, templateParts, patterns, blockTypes)
- Block targeting MUST use correct namespace format: `core/blockname` for WordPress core blocks, `namespace/blockname` for custom blocks
- CSS property references MUST use dot notation: `styles.color.text`, `var:preset|color|accent-1`
- NO arbitrary properties outside schema - WordPress will reject invalid theme.json files

**Rationale:** Invalid theme.json breaks the entire theme in WordPress Site Editor. Schema compliance is the foundation of all block theme functionality.

### II. Block Markup Exclusivity

All templates, template parts, and patterns MUST use WordPress block markup exclusively.

**Rules:**
- Templates (`.html` files in `/templates/`) consist entirely of block markup: `<!-- wp:blockName -->...<!-- /wp:blockName -->`
- NO custom HTML outside block syntax
- NO inline styles - use block attributes and theme.json settings
- Template parts and patterns referenced via blocks: `<!-- wp:pattern {"slug":"theme/pattern-name"} /-->`
- The `index.html` template is MANDATORY - its presence signals block theme to WordPress

**Rationale:** WordPress parses block markup into HTML. Custom HTML breaks the Site Editor and template hierarchy.

### III. theme.json as Single Source of Truth

Global styling configuration MUST be centralized in `theme.json` and style variation files.

**Rules:**
- Colors, typography, spacing, layout defined in theme.json `settings`
- Block-specific styles in theme.json `styles.blocks`
- Element styles in theme.json `styles.elements` (button, link, headings)
- Style variations in `/styles/` directory follow same schema
- Use CSS custom properties: `var(--wp--preset--color--accent-1)`
- Use preset slugs: `var:preset|spacing|50`
- NO hardcoded colors, font sizes, or spacing values in templates or patterns

**Rationale:** Centralized configuration enables consistent design system, user customization via Site Editor, and maintainable theme variations.

### IV. Minimal PHP Logic

PHP code in `functions.php` MUST be limited to WordPress integration points only.

**Rules:**
- Theme setup hooks: `after_setup_theme`, `init`, `wp_enqueue_scripts`
- Register block styles, pattern categories, block bindings
- Enqueue theme assets (style.css, editor-style.css)
- Add theme support (post formats, custom features)
- NO custom post types, taxonomies, or complex business logic
- NO database queries outside WordPress core functions
- Let theme.json handle styling - avoid CSS enqueuing where possible

**Rationale:** Block themes are presentation layer. Complex PHP logic belongs in plugins, not themes. Minimal PHP ensures theme portability and WordPress compatibility.

### V. Template Hierarchy Compliance

Template organization MUST follow WordPress template hierarchy and naming conventions.

**Rules:**
- Templates in `/templates/` directory
- Template parts in `/parts/` directory
- Core templates: `index.html` (required), `404.html`, `archive.html`, `page.html`, `single.html`, `search.html`, `home.html`
- Custom templates registered in theme.json `customTemplates` with unique names (avoid standard template names)
- Template parts registered in theme.json `templateParts` with area designation (header, footer, uncategorized)
- WordPress searches: database → child theme → parent theme (first match wins)

**Rationale:** WordPress uses template hierarchy to match page types to templates. Violation breaks content rendering and theme functionality.

### VI. Accessibility Standards (WCAG 2.1 Level AA)

All theme components MUST meet WCAG 2.1 Level AA accessibility requirements.

**Rules:**
- Semantic HTML markup via WordPress blocks
- Proper heading hierarchy (h1-h6)
- Sufficient color contrast ratios (4.5:1 for normal text, 3:1 for large text)
- Focus indicators visible on interactive elements
- ARIA labels where semantic markup insufficient
- Keyboard navigation support
- Images with alt text (content images) or decorative designation
- Responsive design across viewport sizes (320px to 1920px+)

**Rationale:** Accessibility is a WordPress theme review requirement and ethical obligation. Ensures usable experience for all users regardless of ability.

### VII. Pattern-Based Composition

Reusable content structures MUST be implemented as block patterns.

**Rules:**
- Patterns in `/patterns/` directory as PHP files
- Pattern categories: template (full pages), hidden (components), features (sections)
- Pattern file naming: kebab-case with category prefix (e.g., `template-home-blog.php`, `hidden-post-meta.php`)
- Register custom pattern categories in functions.php
- Patterns use block markup with `<!-- wp:blockName -->` syntax
- Reference patterns in templates: `<!-- wp:pattern {"slug":"theme/pattern-name"} /-->`
- Text domain consistent: `renalinfo-web` throughout theme

**Rationale:** Patterns enable content reuse, user customization via Site Editor, and maintainable theme structure. Core WordPress pattern philosophy.

## WordPress Standards Compliance

All theme development MUST adhere to official WordPress standards and best practices.

**Coding Standards:**
- Follow WordPress PHP Coding Standards for functions.php
- Use WordPress core hooks exclusively (no custom action/filter namespaces in theme)
- Prefix all theme functions with text domain (e.g., `twentytwentyfive_`)
- Consistent text domain throughout theme (style.css header, functions, patterns)

**Theme Review Requirements:**
- GPL v2+ licensing (required for WordPress.org distribution)
- Security: sanitize inputs, escape outputs, validate data
- No external dependencies (scripts/styles from third-party CDNs) without user consent
- No phone home functionality or data collection
- Proper asset licensing (fonts: SIL OFL, images: CC0 or compatible)

**Performance:**
- Fluid typography with `clamp()` for responsive scaling
- Optimize images (WebP format where appropriate)
- Minimal CSS (theme.json generates most styles)
- No render-blocking resources

**Compatibility:**
- WordPress 6.7+ (minimum requirement for block theme features)
- PHP 7.2+ (WordPress minimum)
- Test with core WordPress blocks
- Verify RTL language support if applicable

## Development Workflow

**No Build Process Required:**
- Pure block theme - no compilation, bundling, or transpilation
- Edit `theme.json` directly for styling changes
- Edit `.html` files in `/templates/` and `/parts/` for structure
- Edit `.php` files in `/patterns/` for reusable content
- Edit `.json` files in `/styles/` for style variations

**Testing Requirements:**
- Test in WordPress Site Editor (Appearance → Editor)
- Test all style variations (verify color palettes, typography, spacing)
- Test responsive behavior (verify clamp() values across viewports)
- Test with different content types (posts, pages, archives, single posts)
- Test accessibility with keyboard navigation and screen readers
- Validate theme.json against schema before committing

**Version Control:**
- Commit after each logical feature or fix
- Meaningful commit messages (e.g., "Add footer newsletter pattern", "Fix button spacing in evening style")
- Branch for experimental features
- Never commit database-saved templates without migrating to files

**Documentation:**
- Document custom templates in theme.json
- Document pattern categories and their purpose
- Maintain README with style variation descriptions
- Reference schema sources and WordPress documentation

## Governance

**Amendment Process:**
1. Propose constitution changes with justification
2. Validate against WordPress standards and theme review guidelines
3. Update version following semantic versioning
4. Propagate changes to dependent templates (plan, spec, tasks)
5. Document in Sync Impact Report

**Versioning Policy:**
- **MAJOR**: Backward incompatible changes (remove principles, change non-negotiable rules)
- **MINOR**: New principles added or materially expanded guidance
- **PATCH**: Clarifications, wording improvements, typo fixes

**Compliance Review:**
- All theme modifications MUST pass constitution principles check
- theme.json changes MUST validate against WP 6.8 schema
- Template changes MUST use block markup exclusively
- PHP changes MUST be minimal and use WordPress hooks
- Accessibility MUST be verified for all user-facing components
- Pattern naming MUST follow kebab-case convention

**Constitution Supersedes All Other Practices:**
- In case of conflict between this constitution and other guidance, constitution takes precedence
- Violations require explicit justification documented in plan.md Complexity Tracking section
- Use CLAUDE.md for runtime development guidance that complements (not contradicts) constitution

**Version**: 1.0.0 | **Ratified**: 2025-01-11 | **Last Amended**: 2025-01-11
