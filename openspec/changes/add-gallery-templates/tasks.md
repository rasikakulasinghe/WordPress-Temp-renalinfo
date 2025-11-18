# Implementation Tasks

## Phase 1: Template Creation

### Task 1.1: Create gallery-image.html template
- [x] Create `templates/gallery-image.html` file
- [x] Add header pattern reference
- [x] Implement hero section with page title and description
  - Use `core/group` with `background-light` color
  - Add `core/heading` with "Image Galleries" title
  - Add `core/paragraph` with descriptive text
- [x] Create gallery card grid layout
  - Use `core/columns` with 3 columns (stacksOnMobile)
  - Implement 6 gallery cards (matching reference design)
- [x] Build individual gallery card structure
  - Use `core/cover` for image with overlay
  - Add `core/group` for card content
  - Add `core/heading` for gallery title
  - Add `core/paragraph` for description
  - Add `core/button` with "View Gallery" text and arrow icon
- [x] Add footer pattern reference
- [x] Validate template structure

**Validation**:
```bash
# Verify block syntax is valid
grep -E "<!-- wp:|<!-- /wp:" templates/gallery-image.html
# Check file renders in Site Editor without errors
```

### Task 1.2: Create view-gallery.html template
- [x] Create `templates/view-gallery.html` file
- [x] Add header pattern reference
- [x] Implement page header section
  - Add `core/heading` with "Our Gallery" title
  - Add `core/paragraph` with gallery description
- [x] Build main image viewer section
  - Use `core/group` with constrained layout (max-width 1200px)
  - Add `core/image` for featured image (aspect-ratio 16:10)
  - Add gradient overlay using `core/cover` or inline styles
  - Add text overlay group with image title and description
  - Add navigation button placeholders (Previous/Next)
- [x] Create thumbnail strip
  - Use `core/gallery` block with 8 thumbnail images
  - Configure horizontal layout with scroll
  - Set thumbnail dimensions (160px x 100px)
- [x] Add footer pattern reference
- [x] Validate template structure

**Validation**:
```bash
# Verify block syntax is valid
grep -E "<!-- wp:|<!-- /wp:" templates/view-gallery.html
# Check file renders in Site Editor without errors
```

## Phase 2: Design System Integration

### Task 2.1: Apply theme.json colors to gallery-image.html
- [x] Hero section: `backgroundColor`: `background-light`
- [x] Page title: `textColor`: `primary-dark`
- [x] Gallery card overlays: Use `core/cover` with overlay opacity 60%
- [x] Card titles: `textColor`: `primary-dark`
- [x] Card descriptions: `textColor`: `text-light`
- [x] Buttons: `backgroundColor`: `green-blue`, `textColor`: `base`
- [x] Card hover states: Ensure button hover uses `green-blue/90` (theme.json default)

### Task 2.2: Apply theme.json colors to view-gallery.html
- [x] Hero section: `backgroundColor`: `secondary/20` (light blue tint)
- [x] Page title: `textColor`: `primary-dark`
- [x] Main image overlay: `rgba(0,0,0,0.6)` gradient
- [x] Image title: `textColor`: `base` (white on dark overlay)
- [x] Image description: `textColor`: `base` with 90% opacity
- [x] Navigation buttons: `backgroundColor`: `rgba(0,0,0,0.5)` with hover state
- [x] Thumbnail borders: Active thumbnail uses `borderColor`: `primary`

### Task 2.3: Apply typography from theme.json
- [x] Gallery listing page title: Use `fontSize`: `x-large` (3rem-5rem fluid)
- [x] Gallery card titles: Use `fontSize`: `large` (2rem)
- [x] Body text: Use `fontSize`: `medium` (1.125rem)
- [x] Image viewer title: Use `fontSize`: `xx-large` (clamp 2rem-3rem)
- [x] All text: `fontFamily`: `lexend`, `letterSpacing`: `-0.1px`
- [x] Headings: `fontWeight`: `800`

### Task 2.4: Apply spacing from theme.json
- [x] Hero section padding: `spacing--60` (top/bottom), `spacing--50` (left/right)
- [x] Gallery grid gap: `spacing--50` (2rem)
- [x] Card padding: `spacing--40` (1.5rem)
- [x] Section margins: `spacing--60` (3rem top margin for main content)
- [x] Thumbnail gap: `spacing--30` (1rem)
- [x] Content width: Use `constrained` layout (900px default, 1200px wide)

## Phase 3: Responsive Design

### Task 3.1: Mobile optimization for gallery-image.html
- [x] Enable `stacksOnMobile` on columns block
- [x] Test grid stacks to 1 column on mobile (< 782px)
- [x] Verify touch targets are minimum 44px (buttons, cards)
- [x] Test horizontal scroll on mobile for long titles
- [x] Verify image aspect ratios maintain on small screens
- [x] Test padding scales appropriately (use fluid spacing)

**Test viewports**: 320px, 375px, 414px, 768px, 1024px, 1440px, 1920px

### Task 3.2: Mobile optimization for view-gallery.html
- [x] Test main image scales correctly (maintains aspect ratio)
- [x] Verify thumbnail strip scrolls horizontally on mobile
- [x] Test navigation buttons are touch-friendly (min 44px)
- [x] Verify text overlay is readable on small screens
- [x] Test image title/description stack vertically on mobile
- [x] Ensure thumbnail strip doesn't cause horizontal page scroll

**Test viewports**: 320px, 375px, 414px, 768px, 1024px, 1440px, 1920px

## Phase 4: Accessibility

### Task 4.1: Accessibility for gallery-image.html
- [x] Add meaningful alt text to all gallery cover images
- [x] Ensure button text is descriptive ("View Gallery" + gallery name)
- [x] Add ARIA labels to navigation if needed
- [x] Test keyboard navigation (Tab through cards and buttons)
- [x] Verify focus indicators are visible (2px outline from theme.json)
- [x] Test color contrast ratios:
  - [x] Primary Dark (#2E4F64) on white: ≥4.5:1
  - [x] Green-Blue (#006D77) on white: ≥4.5:1
  - [x] White text on dark overlay: ≥4.5:1

### Task 4.2: Accessibility for view-gallery.html
- [x] Add meaningful alt text to featured image and thumbnails
- [x] Add ARIA labels to Previous/Next buttons
- [x] Add ARIA live region for image title updates (if dynamic)
- [x] Test keyboard navigation (arrow keys for WordPress Gallery block)
- [x] Verify focus indicators on thumbnails and buttons
- [x] Test screen reader announces image title and description
- [x] Ensure thumbnail strip is keyboard accessible (Tab + Arrow keys)

## Phase 5: Validation & Testing

### Task 5.1: WordPress block validation
- [x] Validate JSON syntax in both templates:
  ```bash
  # Check for block syntax errors
  wp scaffold block-validation templates/gallery-image.html
  wp scaffold block-validation templates/view-gallery.html
  ```
- [x] Test templates in Site Editor (Appearance > Editor)
- [x] Verify no console errors when editing templates
- [x] Test pattern references load correctly (header/footer)

### Task 5.2: Browser testing
- [x] Test in Chrome/Edge (latest)
- [x] Test in Firefox (latest)
- [x] Test in Safari (latest)
- [x] Test on iOS Safari (mobile)
- [x] Test on Android Chrome (mobile)
- [x] Verify all layouts render consistently

### Task 5.3: Performance validation
- [x] Check template file sizes are reasonable (< 20KB each)
- [x] Verify images use WordPress responsive image features
- [x] Test page load performance (Lighthouse score)
- [x] Ensure no layout shift (CLS score < 0.1)

### Task 5.4: Final integration testing
- [x] Test assigning templates to pages via Site Editor
- [x] Verify templates appear in template picker
- [x] Test editing templates in Site Editor doesn't break structure
- [x] Verify templates work with existing theme patterns
- [x] Test with WordPress 6.7+ (minimum required version)

## Phase 6: Documentation

### Task 6.1: Update theme documentation
- [x] Add templates to theme README (if exists)
- [x] Document template usage in theme description
- [x] Add inline HTML comments explaining template structure
- [x] Document required WordPress version (6.7+)

### Task 6.2: Update .github/copilot-instructions.md
- [x] Add gallery-image.html to template list
- [x] Add view-gallery.html to template list
- [x] Document gallery template design patterns
- [x] Add gallery templates to testing checklist

## Success Criteria Checklist
- [x] Both templates exist in `templates/` directory
- [x] Templates use only HTML with serialized block markup (no PHP)
- [x] Header and footer patterns load correctly
- [x] Design matches reference HTML files (visual parity)
- [x] Mobile responsive on all test viewports
- [x] WCAG AA accessibility compliant
- [x] No WordPress block validation errors
- [x] Templates appear in Site Editor without errors
- [x] Cross-browser compatible (Chrome, Firefox, Safari, Edge)
- [x] theme.json design system fully applied

## Dependencies
- WordPress 6.7+ environment for testing
- Access to Site Editor (Appearance > Editor)
- Reference files: `Gallery - Images 1.html`, `Gallery - Images 2.html`
- Existing patterns: `renalinfolk/header`, `renalinfolk/footer`

## Estimated Effort
- Phase 1: 3-4 hours (template creation)
- Phase 2: 2-3 hours (design system integration)
- Phase 3: 2-3 hours (responsive design)
- Phase 4: 2 hours (accessibility)
- Phase 5: 2-3 hours (validation & testing)
- Phase 6: 1 hour (documentation)

**Total**: 12-16 hours
