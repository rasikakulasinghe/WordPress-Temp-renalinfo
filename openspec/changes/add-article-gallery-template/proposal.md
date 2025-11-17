# Proposal: Add Article Gallery Template

**Change ID:** `add-article-gallery-template`  
**Status:** Draft  
**Created:** 2025-11-18  
**Author:** AI Assistant

## Problem Statement

The Renalinfolk theme currently lacks a dedicated template for displaying educational articles in a filterable, searchable gallery format. Healthcare organizations need an organized way to present medical articles with:
- Search functionality to find articles by keyword
- Category filters (Condition, Treatment, Research, For Families)
- Sortable views (Most Recent, Most Popular, Alphabetical)
- Responsive card-based layout with featured images
- Pagination for large article collections

## Proposed Solution

Add a new WordPress block theme template `page-article-gallery.html` that provides:

1. **Search & Filters Section**
   - Full-width search input with icon
   - Dropdown for sort order selection
   - Category filter pills (All, Condition, Treatment, Research, For Families)
   - Clear filters button

2. **Article Cards Grid**
   - 3-column responsive grid (1 column mobile, 2 tablet, 3 desktop)
   - Each card displays: featured image, title, excerpt, date
   - Hover effects with lift animation
   - Rounded corners and subtle shadows

3. **Pagination**
   - Centered navigation with Previous/Next buttons
   - Page number buttons
   - Active state indicator

The template will use existing theme colors, typography, and spacing from `theme.json` to maintain design consistency.

## Scope

**In Scope:**
- Create `templates/page-article-gallery.html` template
- Use existing header/footer template parts
- Implement search, filter, and card components using core blocks
- Apply theme styles via theme.json color and spacing tokens
- Add pagination navigation

**Out of Scope:**
- Header/footer modifications (using existing parts)
- Backend functionality for search/filter logic (client-side only)
- Custom JavaScript for dynamic filtering
- New color palette additions
- Custom post types or taxonomies

## Benefits

- **User Experience**: Visitors can easily browse and find relevant medical articles
- **Content Organization**: Clear categorization and filtering improves discoverability
- **Professional Design**: Polished gallery layout matches medical institution standards
- **Maintainability**: Uses WordPress core blocks and theme.json styling
- **Accessibility**: Built with semantic HTML and WCAG AA compliance

## Risks & Mitigation

**Risk:** Search/filter UI is non-functional without JavaScript  
**Mitigation:** Template provides visual structure; site can add JavaScript later or use WordPress search

**Risk:** Large article collections may have performance issues  
**Mitigation:** Pagination limits displayed items; WordPress handles query optimization

## Alternatives Considered

1. **Use existing archive template** - Rejected: lacks dedicated search/filter UI
2. **Create custom post type archive** - Rejected: adds complexity, standard posts suffice
3. **Build as reusable pattern** - Considered: template provides better page-level control

## Dependencies

- WordPress 6.7+ (Full Site Editing support)
- Existing theme.json color palette and spacing scale
- Existing header/footer template parts

## Testing Strategy

1. Validate HTML template syntax with WordPress block parser
2. Test in WordPress Site Editor (Appearance > Editor)
3. Verify responsive behavior at mobile, tablet, desktop breakpoints
4. Check color contrast ratios for accessibility (WCAG AA)
5. Ensure no JavaScript errors in browser console

## Success Criteria

- [ ] Template loads without errors in Site Editor
- [ ] Layout matches reference design (excluding header/footer)
- [ ] Responsive grid adapts to mobile, tablet, desktop
- [ ] All colors use theme.json CSS custom properties
- [ ] Accessible markup with proper ARIA labels where needed
- [ ] Template can be assigned to pages via Template dropdown
