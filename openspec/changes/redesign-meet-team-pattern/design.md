# Design Document: Meet Our Team Pattern Redesign

## Overview
This document outlines the technical approach for redesigning the "Meet Our Team" block pattern to feature a modern, visually engaging layout with circular photo treatments, overlaid text, and staggered card heights.

## Design Goals
1. Create visual hierarchy through staggered layout
2. Maximize photo impact by using full-background treatment
3. Maintain accessibility standards (WCAG AA)
4. Use only core WordPress blocks (no custom development)
5. Leverage existing theme.json design system

## Technical Architecture

### Layout Structure
```
wp:group (full-width section wrapper)
└── wp:group (constrained content area)
    ├── wp:heading (subtitle: "World-Class Care")
    ├── wp:heading (main title: "Meet Our Specialists")
    ├── wp:separator (decorative line)
    ├── wp:spacer
    └── wp:columns (3 columns with gaps)
        ├── wp:column (Doctor 1 - standard height)
        │   └── wp:cover (photo background with overlay)
        │       └── wp:group (text content at bottom)
        │           ├── wp:heading (doctor name)
        │           ├── wp:paragraph (specialty)
        │           ├── wp:paragraph (bio)
        │           └── wp:buttons (optional)
        ├── wp:column (Doctor 2 - offset down)
        │   └── wp:cover
        │       └── wp:group
        └── wp:column (Doctor 3 - standard height)
            └── wp:cover
                └── wp:group
```

### Block Selection Rationale

**`wp:cover` instead of `wp:image`**
- Cover blocks support background images with overlays
- Built-in overlay opacity and color controls
- Can contain nested content (text, buttons)
- Supports minHeight and aspect ratio
- Native WordPress FSE pattern

**`wp:group` for text overlay**
- Provides flex layout control for vertical positioning
- Maintains semantic HTML structure
- Allows easy styling via block supports
- Keeps content grouped logically

### Visual Design Specifications

#### Column Layout
- **Count**: 3 columns (down from 4)
- **Gap**: 30px - 40px between columns
- **Width**: Equal-width columns with constrained max-width (~1200px)

#### Staggered Heights
- **Column 1**: margin-top: 0 (baseline)
- **Column 2**: margin-top: var(--wp--preset--spacing--50) or 50px-60px
- **Column 3**: margin-top: 0 (baseline)
- Creates zigzag visual rhythm while maintaining readability

#### Photo Treatment
- **Shape**: Circular or near-circular using border-radius
  - Option A: border-radius: 50% (perfect circle, requires 1:1 aspect ratio)
  - Option B: border-radius: 24px-32px (rounded rectangle, more flexible)
- **Aspect Ratio**: 1:1 (square) or 4:5 (portrait) depending on photo availability
- **Object Fit**: cover (ensures photos fill space without distortion)
- **Overlay**: Linear gradient from transparent to dark
  - Gradient: `linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.75) 100%)`
  - Alternative: Solid overlay with 0.5-0.6 opacity using theme colors

#### Typography on Overlay
- **Doctor Name**: 
  - Color: `base` (#FFFFFF) or `text-dark` (#E0E0E0)
  - Font size: 1.25rem (maintain current)
  - Font weight: 700-800 (bold)
- **Specialty Title**:
  - Color: `text-dark` (#E0E0E0) or light variant
  - Font size: 0.9rem
  - Font weight: 600
- **Bio Description**:
  - Color: `text-dark` (#E0E0E0)
  - Font size: 0.85rem-0.9rem (slightly smaller for readability)
  - Line height: 1.5-1.6
  - Optional: opacity 0.9 for subtle hierarchy

#### Content Positioning
- **Vertical Alignment**: Bottom of cover block
- **Horizontal Alignment**: Center
- **Padding**: 24px-32px inside cover block for text breathing room
- **Text Alignment**: Center-aligned for symmetry

#### Button Treatment (if included)
- **Style**: Solid button or high-contrast outline
- **Color**: White button with theme color on hover, or theme `cta-yellow`
- **Size**: Small-medium for proportional fit
- **Position**: Bottom of text group, centered
- **Border Radius**: 50px (pill shape, matches theme)

### Color Palette Usage

From theme.json (relevant colors):
- **Overlay Background**: `rgba(0,0,0,0.7)` or `background-dark` (#0f1923) with opacity
- **Text on Overlay**: `base` (#FFFFFF), `text-dark` (#E0E0E0)
- **Accent (if needed)**: `green-blue` (#006D77) for specialty titles (lightened)
- **Section Background**: `background-light` (#f5f7f8) or `base` (#FFFFFF)
- **Button**: `cta-yellow` (#FFC300) or `primary` (#359EFF)

### Accessibility Considerations

#### Contrast Ratios (WCAG AA Requirements)
- **Text (normal size)**: 4.5:1 minimum
- **Text (large, 18px+)**: 3:1 minimum
- **UI components (buttons)**: 3:1 minimum

**Contrast Validation**:
- White text (#FFFFFF) on dark overlay (rgba(0,0,0,0.75) over varied photos)
  - Worst case: Ensure overlay darkness provides at least 4.5:1
  - Recommendation: Use gradient with 75%+ opacity at bottom where text sits

#### Focus Indicators
- Maintain 2px visible focus outline on interactive elements (buttons)
- Ensure focus is visible against dark overlay backgrounds

#### Semantic HTML
- Cover blocks use semantic `<div>` with ARIA attributes
- Headings maintain proper hierarchy (h3 for doctor names)
- Buttons remain accessible with proper link/button semantics

### Responsive Behavior

#### Desktop (1024px+)
- 3 columns side by side
- Full staggered effect visible
- Photos at maximum size with circular treatment

#### Tablet (768px-1023px)
- 3 columns maintained, slightly narrower
- Reduce gap between columns (20px)
- Maintain staggered effect

#### Mobile (<768px)
- Stack to single column
- Remove stagger offset (all cards same margin-top)
- Reduce card height if needed
- Maintain circular photo treatment
- Ensure text remains readable

### Technical Constraints

#### WordPress Block Theme Limitations
- No custom CSS files (use theme.json and inline styles only)
- Block markup must validate in Site Editor
- Must use core blocks or theme-registered blocks only
- Patterns stored as PHP files with serialized block syntax

#### Browser Support
- Modern browsers supporting CSS Grid and Flexbox
- Border-radius 50% for circular shapes (widely supported)
- CSS custom properties from theme.json (IE11 not required)
- Gradient overlays (widely supported)

### Implementation Approach

#### Phase 1: Structure
1. Change columns block from 4 to 3 columns
2. Remove 4th doctor (Dr. Michael Ross)
3. Add margin-top to middle column for stagger

#### Phase 2: Visual Treatment
4. Replace `wp:image` with `wp:cover` blocks
5. Configure cover blocks with background images
6. Add gradient overlays to cover blocks
7. Apply border-radius for circular effect

#### Phase 3: Content Integration
8. Move text content inside cover blocks
9. Update text colors to white/light variants
10. Adjust padding and spacing
11. Position content at bottom of cards

#### Phase 4: Polish
12. Update or redesign buttons for overlay context
13. Fine-tune spacing and gaps
14. Test responsive behavior
15. Validate contrast and accessibility

### Testing Strategy

#### Functional Testing
- Pattern inserts correctly in Site Editor
- No block validation errors
- Content editable in editor
- Preview matches frontend rendering

#### Visual Testing
- Staggered layout creates zigzag effect
- Photos fill backgrounds properly
- Overlay darkness is consistent
- Text is readable over all photos
- Circular treatment renders correctly

#### Accessibility Testing
- Run axe DevTools or WAVE
- Validate contrast ratios with WebAIM checker
- Test keyboard navigation
- Test with screen reader (NVDA/JAWS)

#### Responsive Testing
- Chrome DevTools device emulation
- Test on actual mobile device
- Verify breakpoint behavior
- Ensure touch targets are adequate (44px minimum)

### Maintenance Considerations

- Pattern remains editable via Site Editor
- No custom CSS to maintain separately
- Uses theme.json design tokens (future-proof)
- Standard WordPress block markup (version-stable)
- Translatable strings preserved with proper text domain

## Alternative Approaches Considered

### Alternative 1: Custom Block Registration
**Rejected**: Requires JavaScript development, increases complexity, not necessary for this design

### Alternative 2: Four Columns Maintained
**Rejected**: Reference design clearly shows 3 columns for better visual impact

### Alternative 3: Square Cards Instead of Circular
**Rejected**: Reference design specifies circular photo treatment

### Alternative 4: Text Below Photos (Not Overlaid)
**Rejected**: Reference design shows text overlaid on photos with dark background

## Success Metrics

- Pattern validates in Site Editor without errors
- Contrast ratios pass WCAG AA (verified with checker)
- Visual design matches reference (mod.jpg)
- Responsive layout works across breakpoints
- All existing content and translations preserved
- Implementation uses only core blocks and theme.json colors

## References

- WordPress Cover Block: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#cover
- theme.json Schema: https://schemas.wp.org/wp/6.7/theme.json
- WCAG Contrast Checker: https://webaim.org/resources/contrastchecker/
- Renalinfolk theme.json color palette
- Current meet-our-team.php pattern file
