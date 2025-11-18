# Gallery Templates Capability

## ADDED Requirements

### Requirement: Gallery Listing Template

The theme MUST provide a `gallery-image.html` template for displaying multiple gallery collections in a grid layout.

#### Scenario: User views gallery listing page

**Given** a WordPress page using the `gallery-image.html` template  
**When** the page is rendered  
**Then** the page displays:
- A hero section with page title "Image Galleries" and descriptive text
- A responsive grid of gallery collection cards (3 columns on desktop, 2 on tablet, 1 on mobile)
- Each card contains a cover image with overlay, title, description, and "View Gallery" button
- The existing theme header pattern
- The existing theme footer pattern

**And** the layout uses theme.json design system:
- Colors: `primary-dark` for headings, `green-blue` for buttons, `background-light` for hero section
- Typography: Lexend font family, fluid font sizes from theme.json
- Spacing: Fluid spacing tokens from theme.json spacing scale
- Button style: Rounded-full (border-radius 9999px) from theme design system

#### Scenario: Gallery cards are keyboard accessible

**Given** a user navigating with keyboard  
**When** they press Tab key on gallery listing page  
**Then** focus moves through all gallery cards and buttons  
**And** focus indicators are visible (2px outline)  
**And** pressing Enter activates the "View Gallery" button

#### Scenario: Gallery listing is mobile responsive

**Given** a mobile device with viewport width 375px  
**When** the gallery listing page is rendered  
**Then** gallery cards stack vertically (1 column)  
**And** all touch targets are minimum 44x44px  
**And** text remains readable without horizontal scrolling  
**And** images maintain aspect ratio

---

### Requirement: Gallery Viewer Template

The theme MUST provide a `view-gallery.html` template for displaying a single gallery with large image preview and thumbnail navigation.

#### Scenario: User views individual gallery

**Given** a WordPress page using the `view-gallery.html` template  
**When** the page is rendered  
**Then** the page displays:
- A hero section with gallery title and description
- A large featured image with 16:10 aspect ratio
- A dark gradient overlay on the featured image (bottom to top, 80% to transparent)
- Image title and description text overlaid on the image
- Previous/Next navigation button placeholders
- A horizontal thumbnail strip using WordPress Gallery block
- The existing theme header pattern
- The existing theme footer pattern

#### Scenario: Gallery viewer is responsive

**Given** a desktop viewport (1440px width)  
**When** the gallery viewer page is rendered  
**Then** the featured image displays at maximum 1200px width  
**And** the thumbnail strip displays 8 thumbnails horizontally  
**And** navigation buttons are positioned on left/right sides of image

**Given** a mobile viewport (375px width)  
**When** the gallery viewer page is rendered  
**Then** the featured image scales to 100% viewport width  
**And** the thumbnail strip scrolls horizontally  
**And** text overlay remains readable with responsive padding

#### Scenario: Gallery viewer uses WordPress Gallery block for thumbnails

**Given** the `view-gallery.html` template  
**When** the template is rendered  
**Then** the thumbnail strip uses the `core/gallery` block  
**And** the Gallery block provides built-in lightbox functionality  
**And** users can click thumbnails to view full-size images in lightbox  
**And** the Gallery block handles keyboard navigation (Arrow keys)

---

### Requirement: Template Integration with Theme Patterns

Both gallery templates MUST integrate with existing theme patterns for consistency.

#### Scenario: Gallery templates use existing header pattern

**Given** either `gallery-image.html` or `view-gallery.html` template  
**When** the template is rendered  
**Then** the header uses the pattern reference: `<!-- wp:pattern {"slug":"renalinfolk/header"} /-->`  
**And** the header displays with gradient background from `green-blue` to `footer-dark`  
**And** the header includes site logo, navigation menu, and search bar

#### Scenario: Gallery templates use existing footer pattern

**Given** either `gallery-image.html` or `view-gallery.html` template  
**When** the template is rendered  
**Then** the footer uses the pattern reference: `<!-- wp:pattern {"slug":"renalinfolk/footer"} /-->`  
**And** the footer displays with `footer-dark` background color  
**And** the footer includes 5-column layout with links and contact information

---

### Requirement: WordPress Block Theme Standards Compliance

Gallery templates MUST follow WordPress block theme architecture standards.

#### Scenario: Templates use only HTML with serialized block markup

**Given** either gallery template file  
**When** the file is inspected  
**Then** the file extension is `.html` (not `.php`)  
**And** all markup uses WordPress block comment syntax: `<!-- wp:block-name {...} -->`  
**And** no PHP code exists in the template  
**And** all content is defined using core WordPress blocks

#### Scenario: Templates validate in WordPress Site Editor

**Given** a WordPress 6.7+ installation  
**When** an administrator navigates to Appearance > Editor  
**And** opens either `gallery-image.html` or `view-gallery.html` template  
**Then** the template loads without errors  
**And** all blocks render correctly in the editor  
**And** the template is editable via visual editor

#### Scenario: Templates use theme.json design tokens

**Given** either gallery template  
**When** styling is applied to blocks  
**Then** colors reference CSS custom properties: `var(--wp--preset--color--*)`  
**And** font sizes reference: `var(--wp--preset--font-size--*)`  
**And** spacing uses: `var(--wp--preset--spacing--*)`  
**And** no hardcoded color values or pixel dimensions exist (except border-radius)

---

### Requirement: Accessibility Compliance (WCAG AA)

Gallery templates MUST meet WCAG AA accessibility standards.

#### Scenario: Color contrast meets WCAG AA

**Given** either gallery template with applied theme colors  
**When** text elements are rendered  
**Then** Primary Dark (#2E4F64) text on white background has contrast ratio ≥ 4.5:1  
**And** Green-Blue (#006D77) text/buttons on white background has contrast ratio ≥ 4.5:1  
**And** White text on dark overlay (rgba(0,0,0,0.8)) has contrast ratio ≥ 4.5:1

#### Scenario: Images have meaningful alt text

**Given** either gallery template  
**When** images are added to Cover blocks, Image blocks, or Gallery blocks  
**Then** all images include descriptive alt text attributes  
**And** alt text describes the image content (not generic "image" text)

#### Scenario: Interactive elements have ARIA labels

**Given** the gallery viewer template  
**When** navigation buttons are rendered  
**Then** Previous button has `aria-label="Previous image"`  
**And** Next button has `aria-label="Next image"`  
**And** thumbnail gallery has `aria-label="Gallery thumbnails"`

---

### Requirement: Mobile Responsive Design

Gallery templates MUST be fully responsive across all viewport sizes.

#### Scenario: Gallery listing adapts to mobile viewports

**Given** the `gallery-image.html` template  
**When** rendered on viewports 320px, 375px, 414px, 768px, 1024px, 1440px  
**Then** layout adjusts appropriately for each viewport size  
**And** columns stack at mobile breakpoints (< 782px)  
**And** no horizontal scrolling occurs (except thumbnail strip on mobile)  
**And** text scales with fluid typography

#### Scenario: Gallery viewer adapts to mobile viewports

**Given** the `view-gallery.html` template  
**When** rendered on viewports 320px, 375px, 414px, 768px, 1024px, 1440px  
**Then** featured image scales to viewport width on mobile  
**And** text overlay remains readable with responsive padding  
**And** thumbnail strip scrolls horizontally on mobile  
**And** navigation buttons remain touch-friendly (min 44px)

---

### Requirement: Cross-Browser Compatibility

Gallery templates MUST render consistently across modern browsers.

#### Scenario: Templates render in all major browsers

**Given** either gallery template  
**When** rendered in Chrome 120+, Firefox 121+, Safari 17+, Edge 120+  
**Then** layout appears identical across browsers  
**And** all interactive elements function correctly  
**And** CSS Grid and Flexbox layouts work as expected  
**And** font rendering is consistent

#### Scenario: Templates work on mobile browsers

**Given** either gallery template  
**When** rendered on mobile Safari iOS 17+ and Chrome Android 120+  
**Then** touch interactions work correctly  
**And** responsive layouts adapt properly  
**And** no layout overflow or text cutoff occurs

---

### Requirement: Template Assignment and Usage

Gallery templates MUST be assignable to WordPress pages via Site Editor.

#### Scenario: User assigns gallery listing template to page

**Given** a WordPress administrator creating a new page  
**When** they access the page template selector  
**Then** `gallery-image.html` appears in the template list  
**And** selecting it applies the gallery listing layout  
**And** the page can be customized via Site Editor

#### Scenario: User assigns gallery viewer template to page

**Given** a WordPress administrator creating a new page  
**When** they access the page template selector  
**Then** `view-gallery.html` appears in the template list  
**And** selecting it applies the gallery viewer layout  
**And** the page can be customized via Site Editor

#### Scenario: Template content is editable

**Given** a page using either gallery template  
**When** edited in Site Editor  
**Then** users can modify image sources in Image/Cover blocks  
**And** users can edit text in Heading/Paragraph blocks  
**And** users can customize button links  
**And** changes persist after saving

---

### Requirement: Performance Optimization

Gallery templates MUST meet performance best practices.

#### Scenario: Template file sizes are minimal

**Given** either gallery template file  
**When** the file size is measured  
**Then** the file size is less than 20KB  
**And** no unnecessary bloat or duplicate markup exists

#### Scenario: Images use responsive image features

**Given** gallery templates with Image/Cover/Gallery blocks  
**When** images are rendered  
**Then** WordPress generates responsive image srcset attributes  
**And** images lazy-load by default (WordPress 6.7+ behavior)  
**And** images maintain aspect ratios to prevent layout shift

#### Scenario: Core Web Vitals targets are met

**Given** a page using either gallery template  
**When** performance is measured with Lighthouse  
**Then** Largest Contentful Paint (LCP) < 2.5 seconds  
**And** Cumulative Layout Shift (CLS) < 0.1  
**And** First Input Delay (FID) < 100 milliseconds

---

## Dependencies

- WordPress 6.7+ (required for Gallery block lightbox feature)
- PHP 7.2+ (theme requirement)
- Existing patterns: `renalinfolk/header`, `renalinfolk/footer`
- theme.json design system (colors, typography, spacing)

## Related Capabilities

None (first capability in the project)

## References

- [WordPress Block Theme Documentation](https://developer.wordpress.org/themes/block-themes/)
- [theme.json Reference](https://developer.wordpress.org/themes/global-settings-and-styles/)
- [Core Blocks Reference](https://developer.wordpress.org/block-editor/reference-guides/core-blocks/)
- [WCAG 2.1 Level AA Guidelines](https://www.w3.org/WAI/WCAG21/quickref/?currentsidebar=%23col_customize&levels=aaa)
- Reference designs: `Gallery - Images 1.html`, `Gallery - Images 2.html`
