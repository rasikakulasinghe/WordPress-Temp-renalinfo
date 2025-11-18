# Design Document: Gallery Templates

## Architecture Overview

### High-Level Design
This change introduces two new page templates to the Renalinfolk WordPress block theme:

1. **Gallery Listing Page** (`gallery-image.html`)
   - Displays a grid of gallery collections
   - Each card links to a detailed gallery view
   - Similar to an archive/index page for galleries

2. **Gallery Viewer Page** (`view-gallery.html`)
   - Displays a single gallery with large image preview
   - Includes thumbnail navigation strip
   - Provides lightbox-style viewing experience

Both templates follow WordPress Full Site Editing (FSE) block theme architecture:
- Pure HTML templates (no PHP)
- Serialized block markup syntax
- Reuse existing header/footer patterns
- Leverage theme.json design system

### Technical Architecture

```
┌─────────────────────────────────────────────────┐
│           WordPress Block Theme                  │
├─────────────────────────────────────────────────┤
│                                                  │
│  templates/                                      │
│  ├── gallery-image.html (NEW)                   │
│  │   ├── Header Pattern                         │
│  │   ├── Hero Section                           │
│  │   ├── Gallery Cards Grid                     │
│  │   │   ├── Cover Block (Image + Overlay)      │
│  │   │   ├── Group (Content)                    │
│  │   │   │   ├── Heading                        │
│  │   │   │   ├── Paragraph                      │
│  │   │   │   └── Button                         │
│  │   └── Footer Pattern                         │
│  │                                               │
│  └── view-gallery.html (NEW)                    │
│      ├── Header Pattern                         │
│      ├── Hero Section                           │
│      ├── Main Image Viewer                      │
│      │   ├── Cover/Group (Featured Image)       │
│      │   ├── Text Overlay                       │
│      │   └── Navigation Buttons                 │
│      ├── Thumbnail Gallery Strip                │
│      └── Footer Pattern                         │
│                                                  │
├─────────────────────────────────────────────────┤
│  patterns/                                       │
│  ├── header.php (EXISTING - reused)             │
│  └── footer.php (EXISTING - reused)             │
│                                                  │
├─────────────────────────────────────────────────┤
│  theme.json (EXISTING - provides design tokens) │
│  ├── Color Palette (21 medical colors)          │
│  ├── Typography (Lexend font system)            │
│  ├── Spacing Scale (7 fluid sizes)              │
│  └── Block Styles (buttons, cards)              │
└─────────────────────────────────────────────────┘
```

## Design Decisions

### Decision 1: Pure HTML Templates vs PHP Templates

**Decision**: Use HTML templates with serialized block markup (WordPress FSE standard)

**Rationale**:
- Renalinfolk is a block theme, not a classic theme
- Block themes use HTML templates exclusively
- Maintains consistency with existing theme architecture
- Allows visual editing in WordPress Site Editor
- No server-side logic needed for static gallery layouts

**Alternatives Considered**:
- PHP templates with template tags → Rejected (violates block theme standards)
- Custom Gutenberg blocks → Rejected (overkill for static layouts)

**Trade-offs**:
- ✅ Pro: Visual editing in Site Editor
- ✅ Pro: Standards-compliant
- ❌ Con: Less dynamic (no PHP logic)
- ❌ Con: Must use WordPress blocks for all functionality

### Decision 2: Static Content vs Query Loop

**Decision**: Use static placeholder content in templates

**Rationale**:
- Templates serve as starting points for page customization
- Users can edit via Site Editor to add their own gallery content
- No custom post type needed (simpler implementation)
- Matches existing page template patterns in theme

**Alternatives Considered**:
- Query Loop blocks to dynamically load galleries → Rejected (requires custom post type)
- Custom taxonomy for gallery categories → Rejected (out of scope)

**Trade-offs**:
- ✅ Pro: Simple, no backend changes
- ✅ Pro: Users control content via Site Editor
- ❌ Con: Not dynamic (must edit manually)
- ❌ Con: Cannot auto-generate from media library

### Decision 3: WordPress Gallery Block vs Custom Gallery

**Decision**: Use core `wp:gallery` block for thumbnail strip in viewer template

**Rationale**:
- Built-in lightbox functionality (WordPress 6.7+)
- Native keyboard/touch navigation
- Responsive image support
- Accessibility features included
- No custom JavaScript needed

**Alternatives Considered**:
- Custom thumbnail grid with individual images → Rejected (no built-in navigation)
- Third-party gallery plugin → Rejected (adds dependency)

**Trade-offs**:
- ✅ Pro: Zero custom code
- ✅ Pro: Built-in accessibility
- ✅ Pro: WordPress updates improve it
- ❌ Con: Limited styling customization
- ❌ Con: Tied to WordPress core features

### Decision 4: Image Navigation Implementation

**Decision**: Use placeholder navigation buttons with core Gallery block handling interaction

**Rationale**:
- WordPress Gallery block provides lightbox with prev/next navigation
- Static templates can't implement true JavaScript interaction
- Buttons serve as visual indicators; actual navigation uses Gallery block
- Maintains block theme principles (no custom JS)

**Alternatives Considered**:
- Custom JavaScript for image switching → Rejected (violates block theme standards)
- Enqueued script for navigation → Rejected (theme has minimal JS by design)

**Trade-offs**:
- ✅ Pro: No custom JavaScript
- ✅ Pro: Uses WordPress core features
- ❌ Con: Navigation buttons are decorative (not functional in template)
- ❌ Con: Relies on Gallery block lightbox for actual navigation

### Decision 5: Mobile Responsive Strategy

**Decision**: Use WordPress block responsive settings + theme.json fluid spacing

**Rationale**:
- WordPress blocks have built-in responsive behavior (`stacksOnMobile`)
- theme.json fluid spacing scales automatically
- No custom CSS media queries needed
- Matches existing theme responsive patterns

**Implementation**:
- `core/columns` with `stacksOnMobile: true` for gallery grid
- Fluid typography: `clamp()` values in theme.json
- Fluid spacing: `var(--wp--preset--spacing--*)` tokens
- Mobile-first padding/margin adjustments

**Trade-offs**:
- ✅ Pro: Zero custom CSS
- ✅ Pro: Consistent with theme patterns
- ❌ Con: Less fine-grained control
- ❌ Con: Relies on WordPress block breakpoints

## Component Design

### Gallery Card Component

**Structure**:
```html
<!-- wp:cover (image + overlay) -->
  <!-- wp:group (content container) -->
    <!-- wp:heading (gallery title) -->
    <!-- wp:paragraph (description) -->
    <!-- wp:button (CTA) -->
  <!-- /wp:group -->
<!-- /wp:cover -->
```

**Styling**:
- Cover block: Overlay opacity 60%, gradient from black/80 to transparent
- Title: `primary-dark` color, font-size `large`, font-weight 800
- Description: `text-light` color, font-size `medium`
- Button: `green-blue` background, rounded-full (9999px), font-weight 700

**Responsive**:
- Card height: Fixed aspect ratio (16:10 for images)
- Text scales with viewport (fluid typography)
- Touch target: Entire card is clickable (button + card)

### Image Viewer Component

**Structure**:
```html
<!-- wp:group (main viewer container) -->
  <!-- wp:cover or wp:image (featured image) -->
    <!-- Gradient overlay -->
    <!-- wp:group (text overlay) -->
      <!-- wp:heading (image title) -->
      <!-- wp:paragraph (image description) -->
    <!-- /wp:group -->
  <!-- /wp:cover -->
  <!-- wp:buttons (navigation) -->
    <!-- wp:button (Previous) -->
    <!-- wp:button (Next) -->
  <!-- /wp:buttons -->
<!-- /wp:group -->
```

**Styling**:
- Featured image: aspect-ratio 16:10, max-width 1200px
- Overlay: `linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, transparent 100%)`
- Text overlay: Positioned bottom-left, padding 3rem
- Nav buttons: Semi-transparent black, white icons, hover state darkens

**Responsive**:
- Image: 100% width on mobile, max-width on desktop
- Text overlay: Full-width on mobile, left-aligned on desktop
- Nav buttons: Smaller on mobile (2rem), larger on desktop (3rem)

### Thumbnail Strip Component

**Structure**:
```html
<!-- wp:gallery {"columns":8,"linkTo":"none"} -->
  <!-- 8x wp:image blocks -->
<!-- /wp:gallery -->
```

**Styling**:
- Gallery layout: Horizontal flex, no wrapping
- Thumbnail size: 160px x 100px (aspect-ratio 16:10)
- Gap: 1rem between thumbnails
- Active state: 4px border in `primary` color

**Responsive**:
- Horizontal scroll on overflow (mobile)
- Touch-friendly: min 44px touch targets
- Snap scroll on mobile (CSS scroll-snap)

## Data Flow

Since these are static HTML templates (not dynamic):

1. **Template Assignment**:
   - User creates new page in WordPress
   - Assigns `gallery-image.html` or `view-gallery.html` template
   - Page editor loads template structure

2. **Content Editing**:
   - User edits blocks via Site Editor
   - Changes image sources in Cover/Image blocks
   - Updates text in Heading/Paragraph blocks
   - Customizes button links

3. **Rendering**:
   - WordPress renders serialized block markup
   - theme.json applies styles
   - Core blocks handle responsive behavior
   - Gallery block manages lightbox interaction

**No server-side logic** - All content is static HTML that users customize per-page.

## Integration Points

### 1. Header Pattern Integration
- Both templates use: `<!-- wp:pattern {"slug":"renalinfolk/header"} /-->`
- Pattern provides: Gradient navigation, site logo, search bar
- Styling: Controlled by pattern's inline styles + theme.json

### 2. Footer Pattern Integration
- Both templates use: `<!-- wp:pattern {"slug":"renalinfolk/footer"} /-->`
- Pattern provides: 5-column footer, contact info, links
- Styling: `footer-dark` background from theme.json

### 3. theme.json Design System
- Colors: All colors reference `var(--wp--preset--color--*)` tokens
- Typography: Font sizes use `var(--wp--preset--font-size--*)` tokens
- Spacing: Padding/margins use `var(--wp--preset--spacing--*)` tokens
- Fonts: Lexend font family auto-applied to all blocks

### 4. WordPress Core Blocks
- All blocks are core WordPress blocks (no custom blocks)
- Block styles inherit from theme.json `styles.blocks.*` configuration
- No custom CSS files needed

## Accessibility Considerations

### WCAG AA Compliance

**Color Contrast** (minimum 4.5:1 for text):
- Primary Dark (#2E4F64) on White: 9.16:1 ✅
- Green-Blue (#006D77) on White: 5.71:1 ✅
- White text on overlay (rgba(0,0,0,0.8)): ~11:1 ✅

**Keyboard Navigation**:
- All interactive elements (buttons, links) are keyboard accessible
- Gallery thumbnails: Tab + Arrow key navigation (WordPress Gallery block)
- Focus indicators: 2px outline from theme.json

**Screen Readers**:
- All images have alt text (required in Image/Cover blocks)
- Navigation buttons have ARIA labels
- Gallery cards have descriptive link text ("View [Gallery Name] Gallery")

**Touch Targets**:
- Minimum 44x44px touch targets (WCAG AAA)
- Card buttons: 48px height
- Navigation buttons: 48px x 48px

**Responsive Text**:
- Text scales with viewport (fluid typography)
- No horizontal scrolling for text content
- Line length < 80 characters (readable)

## Performance Considerations

### File Size
- Each template: ~10-15KB (minimal for HTML)
- No custom CSS/JS (relies on theme.json + WordPress core)

### Image Optimization
- Use WordPress responsive images (srcset)
- Recommended: WebP format for gallery images
- Lazy loading: Enabled by default (WordPress 6.7+)

### Rendering Performance
- No custom JavaScript = no JS parsing overhead
- Minimal DOM depth (semantic block structure)
- CSS Grid/Flexbox for layouts (GPU-accelerated)

### Core Web Vitals Targets
- **LCP** (Largest Contentful Paint): < 2.5s (hero images with lazy load)
- **CLS** (Cumulative Layout Shift): < 0.1 (fixed aspect ratios prevent shift)
- **FID** (First Input Delay): < 100ms (no blocking JavaScript)

## Testing Strategy

### Unit Testing
Not applicable - HTML templates don't have testable logic

### Visual Regression Testing
1. Screenshot reference pages at multiple viewports
2. Compare against reference HTML designs
3. Verify on: 320px, 768px, 1024px, 1440px viewports

### Accessibility Testing
1. axe DevTools browser extension scan
2. Keyboard navigation test (Tab, Arrow, Enter keys)
3. Screen reader test (NVDA/JAWS)
4. Color contrast validation (WebAIM checker)

### Cross-Browser Testing
- Chrome 120+ ✅
- Firefox 121+ ✅
- Safari 17+ ✅
- Edge 120+ ✅
- Mobile Safari iOS 17+ ✅
- Chrome Android 120+ ✅

### WordPress Compatibility Testing
- WordPress 6.7.0 (minimum required)
- WordPress 6.8+ (latest)
- Gutenberg plugin latest
- Site Editor functionality

## Rollback Plan

If templates cause issues:

1. **Immediate Rollback**:
   - Delete `templates/gallery-image.html`
   - Delete `templates/view-gallery.html`
   - No database changes = no cleanup needed

2. **Partial Rollback**:
   - Keep one template, remove problematic one
   - Templates are independent (no dependencies)

3. **Recovery**:
   - Templates don't affect existing pages
   - Users who assigned templates can reassign to different template
   - No data loss risk

## Future Enhancements

### Potential Improvements (Out of Scope)
1. **Gallery Custom Post Type**:
   - Create CPT for galleries
   - Use Query Loop blocks for dynamic loading
   - Requires: functions.php updates, database schema

2. **Gallery Block Patterns**:
   - Extract gallery cards as reusable patterns
   - Create pattern variations (2-column, 4-column, etc.)
   - Requires: New PHP files in `patterns/` directory

3. **Advanced Gallery Features**:
   - Filtering by category/tag
   - Masonry layout option
   - Video gallery support
   - Requires: Custom block development

4. **Gallery Management UI**:
   - Admin interface for gallery creation
   - Bulk image upload
   - Gallery metadata (date, location, photographer)
   - Requires: Custom admin screens, REST API endpoints

### Compatibility Notes
- WordPress 6.7+ required (Gallery block lightbox feature)
- PHP 7.2+ (theme requirement)
- No plugin dependencies
- No custom database tables

## Security Considerations

### Threats & Mitigations

**Threat**: Malicious image uploads
**Mitigation**: WordPress handles file validation (not template responsibility)

**Threat**: XSS via user-editable content
**Mitigation**: WordPress auto-escapes block content; no custom PHP

**Threat**: Broken access control
**Mitigation**: Templates use standard WordPress capability checks

**No security risks introduced** - Templates only contain static HTML structure.

## Maintenance Plan

### Ongoing Maintenance
- **Frequency**: Review after major WordPress releases
- **Scope**: Verify block markup compatibility, test new core features
- **Effort**: 1-2 hours per WordPress major version

### Deprecation Strategy
If templates become obsolete:
1. Mark as deprecated in theme documentation
2. Provide migration path to new templates
3. Keep files for backward compatibility (1-2 versions)
4. Remove after 12 months deprecation period

### Update Strategy
- Templates can be updated via Site Editor (user-facing)
- Theme updates: Preserve user customizations (WordPress core behavior)
- Breaking changes: Version in filename (`gallery-image-v2.html`)
