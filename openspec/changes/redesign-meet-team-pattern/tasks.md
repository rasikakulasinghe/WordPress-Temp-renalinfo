# Implementation Tasks

## Task Checklist

- [ ] **Task 1: Update section wrapper styling**
  - Change background from `background-light` to maintain or adjust based on design
  - Adjust padding for better spacing with new layout
  - Update layout constraint to accommodate 3 columns

- [ ] **Task 2: Convert 4-column layout to 3-column layout**
  - Change columns block from 4 columns to 3 columns
  - Adjust gap spacing between columns for visual balance
  - Remove 4th doctor column (Dr. Michael Ross)

- [ ] **Task 3: Implement staggered/zigzag layout**
  - Add margin-top variations to columns for alternating heights
  - Column 1: standard position (margin-top: 0)
  - Column 2: offset down (margin-top: 40-60px)
  - Column 3: standard position (margin-top: 0)
  - Ensure responsive behavior

- [ ] **Task 4: Replace image blocks with cover blocks**
  - Convert each `wp:image` block to `wp:cover` block
  - Set doctor photos as background images
  - Configure cover blocks with:
    - Full height (minHeight or fixed height)
    - Circular border-radius (50% or near-circular via styles)
    - Dark gradient overlay (bottom-to-top, rgba(0,0,0,0.2) to rgba(0,0,0,0.7))
    - Aspect ratio maintained (1:1 or adjust for height variation)

- [ ] **Task 5: Restructure content layout within cards**
  - Move text content inside cover blocks (overlaid on photos)
  - Remove separate group blocks for content
  - Remove white background and borders from columns
  - Position content at bottom of cover blocks

- [ ] **Task 6: Update typography for overlay context**
  - Change text colors to white/light variants:
    - Doctor names: `text-dark` (#E0E0E0) or `base` (#FFFFFF)
    - Titles/specialties: `text-dark` or light variant of `green-blue`
    - Bio text: `text-dark` with reduced opacity if needed
  - Ensure font weights remain readable on dark backgrounds
  - Maintain font sizes or adjust for better hierarchy

- [ ] **Task 7: Redesign or remove buttons**
  - Replace outline buttons with solid style or remove if overlay design doesn't accommodate
  - If keeping: use white/light button with appropriate styling
  - Position at bottom of cover block overlay
  - Ensure button contrast meets WCAG AA (3:1 for UI components)

- [ ] **Task 8: Adjust section heading and subtitle**
  - Keep existing heading structure (subtitle + main title + separator)
  - Verify color scheme works with any background changes
  - Maintain center alignment

- [ ] **Task 9: Update spacing and padding**
  - Adjust column padding to remove old card padding
  - Add appropriate padding inside cover blocks for text
  - Adjust gaps between elements within each card
  - Ensure spacer blocks match new design rhythm

- [ ] **Task 10: Validate and test**
  - Validate JSON syntax: `node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"`
  - Validate PHP syntax: `php -l patterns/meet-our-team.php`
  - Test pattern insertion in Site Editor
  - Check responsive behavior (mobile, tablet, desktop)
  - Verify WCAG AA contrast ratios for text on overlay
  - Ensure all translatable strings preserved
  - Test with different photo URLs/dimensions

## Implementation Order
Tasks should be completed in order 1-10, as each builds on the previous changes.

## Validation Commands
```powershell
# Validate PHP syntax
php -l patterns/meet-our-team.php

# Test in WordPress Site Editor
# 1. Open Appearance > Editor > Patterns
# 2. Search for "Meet Our Team"
# 3. Insert pattern and verify rendering
# 4. Check Inspector for any block errors

# Visual inspection checklist
# - [ ] 3 columns display correctly
# - [ ] Photos fill card backgrounds
# - [ ] Dark overlay visible over photos
# - [ ] Text is white/light colored and readable
# - [ ] Staggered heights create zigzag effect
# - [ ] Circular/rounded photo treatment visible
# - [ ] Responsive layout works on mobile
# - [ ] Contrast ratios meet WCAG AA
```

## Notes
- Keep all existing doctor names, titles, and bio content
- Preserve all translation strings with `renalinfolk` text domain
- Maintain pattern metadata (Title, Slug, Categories, Description)
- Use only core WordPress blocks (no custom blocks required)
- Leverage theme.json colors via CSS custom properties
