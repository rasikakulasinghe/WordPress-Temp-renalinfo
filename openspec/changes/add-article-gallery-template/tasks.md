# Tasks: Add Article Gallery Template

**Change ID:** `add-article-gallery-template`

## Implementation Tasks

### 1. Create Template File Structure
- [ ] Create `templates/page-article-gallery.html`
- [ ] Add theme header comment with template metadata
- [ ] Include header template part reference
- [ ] Include footer template part reference

### 2. Implement Page Title Section
- [ ] Add page title group block
- [ ] Style with `text-4xl font-black` equivalent from theme.json
- [ ] Add responsive padding using theme spacing scale

### 3. Build Search & Filter Controls
- [ ] Create search input with icon using core/search block
- [ ] Add sort dropdown using core/group with styled select appearance
- [ ] Style inputs with rounded borders and theme colors
- [ ] Ensure proper mobile responsive layout (stack on mobile)

### 4. Implement Category Filter Pills
- [ ] Create category button group using core/buttons
- [ ] Add buttons: All, Condition, Treatment, Research, For Families
- [ ] Style active state with `primary-dark` or `green-blue` background
- [ ] Add Clear filters button with icon
- [ ] Apply rounded-full styling and hover effects

### 5. Build Article Cards Grid
- [ ] Create core/query block for post loop
- [ ] Configure 3-column grid layout using core/post-template
- [ ] Add core/post-featured-image with aspect-video ratio
- [ ] Add core/post-title with appropriate heading level
- [ ] Add core/post-excerpt with character limit
- [ ] Add core/post-date with formatted output
- [ ] Apply card styling: background, rounded corners, shadow
- [ ] Add hover effects: lift (translateY) and shadow increase

### 6. Implement Pagination
- [ ] Add core/query-pagination block
- [ ] Configure Previous/Next buttons with chevron icons
- [ ] Style page numbers with active state indicator
- [ ] Center pagination controls
- [ ] Apply theme colors and hover states

### 7. Apply Theme Styling
- [ ] Use CSS custom properties from theme.json (--wp--preset--color-*)
- [ ] Apply spacing scale for consistent padding/margins
- [ ] Ensure typography uses Lexend font family
- [ ] Verify color contrast ratios meet WCAG AA

### 8. Testing & Validation
- [ ] Validate block markup syntax
- [ ] Test template in WordPress Site Editor
- [ ] Verify responsive behavior (mobile, tablet, desktop)
- [ ] Check accessibility with keyboard navigation
- [ ] Test with sample article content
- [ ] Verify pagination works with multiple pages

### 9. Documentation
- [ ] Update README or documentation if needed
- [ ] Add template to theme's template list
- [ ] Document any new block style variations used

## Validation Commands

```bash
# Test in Site Editor
# Navigate to: Appearance > Editor > Templates > Add New

# Validate WordPress block markup
wp eval 'echo "Block markup valid\n";'

# Check for PHP/HTML syntax errors
php -l templates/page-article-gallery.html
```

## Dependencies

- Existing header template part (`parts/header.html`)
- Existing footer template part (`parts/footer.html`)
- theme.json color palette and spacing scale
- WordPress 6.7+ with Query Loop block support

## Acceptance Criteria

- Template appears in Template dropdown for pages
- Layout matches reference design (excluding header/footer)
- Grid is responsive (1/2/3 columns)
- All interactions use semantic HTML
- Colors and spacing use theme.json tokens
- No JavaScript errors in console
- Passes WCAG AA color contrast requirements
