# Change: Redesign Meet Our Team Pattern

## Why

The current "Meet Our Team" pattern uses a traditional 4-column grid with contained photos and separated text, resulting in low visual impact and dated aesthetics that don't align with modern medical website design standards.
The current "Meet Our Team" pattern (`renalinfolk/section-meet-team`) uses a traditional 4-column grid layout with standard card designs. This design lacks visual impact and doesn't align with modern medical website aesthetics that emphasize visual hierarchy, engaging photography, and dynamic layouts.

Current issues:
- 4 equal columns create monotonous visual rhythm
- Photos are contained within cards, reducing visual impact
- White cards with minimal styling lack personality
- No visual hierarchy to guide user attention
- Standard button placement doesn't encourage interaction

## Proposed Solution
Redesign the "Meet Our Team" pattern to feature:

1. **3-Column Layout**: More spacious, allows larger photos (down from 4 columns)
2. **Circular Photo Cutouts**: Modern, friendly aesthetic appropriate for medical context
3. **Full-Background Photos with Dark Overlay**: Photos fill entire card area with gradient overlay
4. **Text Overlaid on Photos**: White text over dark gradient for better contrast and visual integration
5. **Staggered/Zigzag Heights**: Alternating card heights create dynamic visual rhythm
6. **Integrated Design**: Content seamlessly overlays photos rather than separate sections
7. **Reduce to 3 Team Members**: Remove 4th column to match 3-column layout

## Impact

**Affected specs:**
- team-pattern-ui (MODIFIED layout, ADDED cover block usage, REMOVED card backgrounds)

**Affected code:**
- `patterns/meet-our-team.php` (complete block markup restructure)

**Breaking changes:**
- None (pattern remains editable via Site Editor)

**Success criteria:**
- Pattern renders correctly in Site Editor and frontend
- WCAG AA contrast maintained (4.5:1 for text on overlay)
- Responsive design works on mobile, tablet, desktop
- All translatable strings preserved
- Pattern validates without errors
- Design matches reference (mod.jpg)
- WordPress 6.7+ with Full Site Editing
- Existing theme.json color palette (green-blue, base, contrast, text-dark)
- Existing Lexend font family
- CSS custom properties from theme.json

## Risks & Mitigations
**Risk**: Dark overlay may reduce photo clarity
- *Mitigation*: Use semi-transparent gradient overlay (not solid black)

**Risk**: Text on images may have contrast issues
- *Mitigation*: Ensure gradient provides sufficient darkness; validate with WCAG checker

**Risk**: Staggered heights may cause layout issues on mobile
- *Mitigation*: Use responsive spacing and test across viewports

**Risk**: Circular cutouts may not be achievable with core blocks alone
- *Mitigation*: Use border-radius 50% on images with aspect-ratio 1:1

## Open Questions
None - design requirements are clear from reference image.

## Related Changes
None - this is a standalone pattern redesign.

## Implementation Notes
- Use `core/cover` blocks for photo backgrounds with overlay
- Apply border-radius via block styles for circular effect
- Use margin-top variations for staggered effect
- Maintain all existing translatable strings
- Keep 4 doctor profiles (as in current version)
- Validate JSON syntax and block markup after changes
