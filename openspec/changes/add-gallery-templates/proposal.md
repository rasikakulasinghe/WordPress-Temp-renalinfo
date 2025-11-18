# Proposal: Add Image Gallery Templates

## Overview
Create two new WordPress block theme templates for displaying image galleries:
1. `gallery-image.html` - Gallery listing page showing multiple gallery collections
2. `view-gallery.html` - Individual gallery viewer with lightbox-style image navigation

## Motivation
The theme currently lacks dedicated templates for displaying image galleries. Medical institutions need to showcase:
- Facility tours
- Community events
- Staff photos
- Educational infographics
- Patient activity images (with privacy considerations)

The reference designs provide user-friendly, accessible gallery experiences with:
- Grid-based gallery collection cards
- Large image viewer with thumbnail navigation
- Responsive mobile layouts
- Medical design system consistency

## Goals
- Implement gallery listing template (`gallery-image.html`) matching reference design
- Implement gallery viewer template (`view-gallery.html`) matching reference design
- Maintain WordPress block theme standards (HTML templates with serialized block markup)
- Use existing header/footer patterns for consistency
- Apply theme.json design system (colors, typography, spacing)
- Ensure full mobile responsiveness (mobile-first approach)
- Maintain WCAG AA accessibility standards

## Non-Goals
- Dynamic JavaScript gallery functionality (WordPress handles interactivity)
- Custom PHP template logic (block theme uses HTML templates)
- Backend gallery post type creation (focuses on templates only)
- Image upload/management features (uses WordPress media library)

## Technical Approach

### Template Structure
Both templates will use:
- WordPress block comment syntax: `<!-- wp:block-name {...} -->`
- Existing header pattern: `<!-- wp:pattern {"slug":"renalinfolk/header"} /-->`
- Existing footer pattern: `<!-- wp:pattern {"slug":"renalinfolk/footer"} /-->`
- Core WordPress blocks (Group, Columns, Image, Button, etc.)

### Gallery Listing Template (gallery-image.html)
**Reference**: Gallery - Images 1.html

**Structure**:
1. Header (existing pattern)
2. Hero section with page title and description
3. Grid layout (3 columns desktop, 2 tablet, 1 mobile) of gallery cards
4. Each card contains:
   - Cover image with overlay
   - Title and description
   - "View Gallery" button
5. Footer (existing pattern)

**Key WordPress Blocks**:
- `core/group` for sections
- `core/columns` for grid layout
- `core/cover` for image cards with overlay
- `core/button` for CTA buttons
- `core/heading` and `core/paragraph` for text content

**Responsive Strategy**:
- Use `core/columns` with responsive column counts (stacksOnMobile)
- Fluid typography using theme.json font sizes
- Flexible spacing using theme.json spacing scale
- Mobile-optimized padding/margins

### Gallery Viewer Template (view-gallery.html)
**Reference**: Gallery - Images 2.html

**Structure**:
1. Header (existing pattern)
2. Page title and description
3. Large image viewer section:
   - Main featured image
   - Image title and description overlay
   - Previous/Next navigation buttons (placeholder - WordPress Gallery block handles interaction)
4. Thumbnail strip (horizontal scrollable)
5. Footer (existing pattern)

**Key WordPress Blocks**:
- `core/group` for sections and layout containers
- `core/image` for featured image
- `core/gallery` for thumbnail strip (built-in WordPress block with native navigation)
- `core/buttons` with icon buttons for navigation placeholders
- `core/heading` and `core/paragraph` for image metadata

**Responsive Strategy**:
- Large image scales to container (aspect-ratio via theme.json)
- Thumbnail strip uses horizontal scroll on mobile
- Touch-friendly button sizes (minimum 44px touch target)
- Stacked layout for image metadata on mobile

### Design System Integration
Both templates will use:

**Colors**:
- `primary-dark` (#2E4F64) - Headings
- `green-blue` (#006D77) - CTA buttons (existing button style)
- `background-light` (#f5f7f8) - Hero section background
- `footer-dark` (#1C2541) - Footer (existing pattern)
- `text-light` (#4A4A4A) - Body text
- `base` (#FFFFFF) - Card backgrounds

**Typography**:
- Lexend font (existing theme font)
- Heading sizes: `font-size--x-large` (3rem-5rem fluid)
- Body sizes: `font-size--medium` (1.125rem)
- Letter spacing: -0.1px (existing theme standard)

**Spacing**:
- Section padding: `spacing--60` (3rem-4rem)
- Card gaps: `spacing--40` (2rem)
- Content width: 1200px (wide), 900px (constrained)

**Components**:
- Rounded buttons: border-radius 9999px (existing theme style)
- Card shadows: `box-shadow` on hover (existing post card style)
- Gradient overlays: `rgba(0,0,0,0.6)` for image overlays

## Implementation Plan
See `tasks.md` for detailed implementation checklist.

## Success Criteria
- [ ] Templates validate as proper WordPress block theme HTML
- [ ] JSON syntax validation passes (no serialized block errors)
- [ ] Templates display correctly in Site Editor
- [ ] Mobile responsive (320px - 1920px viewports)
- [ ] Accessibility: WCAG AA compliant (keyboard navigation, focus states, ARIA labels)
- [ ] Design consistency with existing theme patterns
- [ ] No PHP template logic (pure HTML block templates)

## Dependencies
- Existing header pattern: `renalinfolk/header`
- Existing footer pattern: `renalinfolk/footer`
- theme.json color palette and spacing scale
- WordPress 6.7+ core blocks

## Risks & Mitigations
**Risk**: Complex JavaScript interactions from reference designs  
**Mitigation**: Use WordPress core Gallery block which provides native lightbox/navigation

**Risk**: Responsive layout breakage  
**Mitigation**: Test on multiple viewports; use WordPress block responsive settings

**Risk**: Accessibility issues with image navigation  
**Mitigation**: Use semantic HTML, ARIA labels, keyboard navigation support from core blocks

## Open Questions
1. Should gallery templates use Query Loop blocks to dynamically load galleries, or static placeholder content?
   - **Recommendation**: Static placeholder content (easier to customize per page)
   
2. Should we create custom block patterns for gallery cards to improve reusability?
   - **Recommendation**: Create patterns after templates are validated (can be future enhancement)

3. What should trigger the use of these templates?
   - **Recommendation**: Templates can be assigned to pages via Site Editor (standard WordPress approach)
