# Design: Query Filter Container Block

## Context

The Renalinfolk theme is a WordPress block theme (Full Site Editing) that currently has four gallery templates (Articles, Images, Publications, Videos) using static Query Loop blocks. Users cannot filter or search content on the frontend. The goal is to add a dynamic filtering system that:

1. Works as a reusable custom block compatible with core Query Loop
2. Maintains block theme architecture (no classic PHP templating)
3. Integrates with existing medical design system (theme.json colors, spacing, typography)
4. Follows WordPress Block API conventions and accessibility standards

**Constraints:**
- WordPress 6.7+ block theme (FSE)
- Must use `renalinfolk_` function prefix and `renalinfolk` text domain
- Theme has minimal JavaScript (video-embed.js, video-meta-editor.js)
- No jQuery dependencies
- WCAG AA accessibility compliance required

**Stakeholders:**
- Site visitors (pediatric nephrology patients/families) - need easy content discovery
- Site admins - need flexible configuration per gallery page
- Theme developers - need maintainable, documented code

## Goals / Non-Goals

**Goals:**
- ✅ Create a single reusable block for all gallery types
- ✅ Support URL parameter-based filtering compatible with core Query Loop
- ✅ Provide admin controls to show/hide specific filters per instance
- ✅ Implement collapsible filter UI to save vertical space
- ✅ Ensure mobile-responsive design (stacked filters)
- ✅ Maintain theme design system consistency (Lexend font, medical palette)

**Non-Goals:**
- ❌ AJAX-based filtering (URL parameters ensure shareability and SEO)
- ❌ Advanced query builder UI (keep filters simple: search, date, taxonomy, author, sort)
- ❌ Custom post type support beyond standard posts (focus on existing gallery templates)
- ❌ Filter persistence across sessions (browser history handles this via URL)
- ❌ Real-time filter preview (Apply button triggers navigation)

## Decisions

### Decision 1: Custom Block vs Pattern
**Choice:** Custom dynamic block with `block.json` + React components

**Why:**
- Patterns are static HTML; we need dynamic admin controls (InspectorControls)
- Block attributes allow per-instance configuration (show/hide filters)
- React components provide better maintainability than vanilla JS
- WordPress Block API provides built-in editor integration

**Alternatives considered:**
- ❌ Block pattern with inline JS - No admin UI, harder to maintain
- ❌ Shortcode - Not block theme compatible, breaks FSE workflow

### Decision 2: URL Parameters vs AJAX Filtering
**Choice:** URL parameter-based filtering (`?s=keyword&category=research&orderby=date`)

**Why:**
- Shareable URLs (users can bookmark filtered views)
- SEO-friendly (crawlers can index filtered pages)
- Browser back/forward navigation works naturally
- Compatible with core Query Loop (WP already parses URL params)
- No REST API endpoints needed (simpler implementation)

**Alternatives considered:**
- ❌ AJAX with `wp.apiFetch()` - Better UX but requires custom REST endpoints, no shareable links
- ❌ Client-side filtering - Doesn't scale with large post counts, breaks pagination

### Decision 3: State Management - Interactivity API vs React useState
**Choice:** Hybrid approach
- **UI toggle state** (show/hide filters): WordPress Interactivity API (`data-wp-interactive`)
- **Form state** (input values): Controlled React components in editor, standard HTML forms on frontend

**Why:**
- Interactivity API handles show/hide toggle without React hydration overhead
- Form submission uses native browser navigation (no client-side routing)
- Simpler mental model: Interactivity API for simple interactions, React only in editor

**Alternatives considered:**
- ❌ Full React hydration - Overkill for simple form, increases bundle size
- ❌ Vanilla JS - Harder to maintain, no editor component reuse

### Decision 4: Block Structure
**Choice:** Container block with `InnerBlocks` support (optional for future)

**Implementation:**
```
<!-- wp:renalinfolk/query-filter-container {
  "showSearch": true,
  "showDate": false,
  "showTaxonomy": true,
  "targetTaxonomy": "category",
  "showAuthor": false,
  "showSortOrder": true,
  "toggleLabel": "Filter & Sort"
} -->
  [Dynamic filter toolbar renders here]
<!-- /wp:renalinfolk/query-filter-container -->

<!-- wp:query {...} -->
  [Query Loop posts display here]
<!-- /wp:query -->
```

**Why:**
- Decoupled from Query Loop (more flexible placement)
- Admins can insert multiple filter blocks if needed
- Attributes control visibility without editing code

**Alternatives considered:**
- ❌ Extend core Query Loop - Risky (core updates could break), harder to maintain
- ❌ Template part - Not configurable per instance

### Decision 5: Taxonomy Selection
**Choice:** Admin selects single taxonomy per filter instance (`targetTaxonomy` attribute)

**Why:**
- Most galleries filter by one taxonomy (e.g., Articles by category, Images by tag)
- Simpler UI - one multi-select dropdown instead of multiple
- Aligns with existing gallery template structure (each gallery has primary taxonomy)

**Alternatives considered:**
- ❌ Multi-taxonomy filter - Complex UI, unclear which taxonomy takes precedence
- ❌ Auto-detect from Query Loop - Requires context inheritance, breaks standalone usage

### Decision 6: Build Tooling
**Choice:** `@wordpress/scripts` (official WordPress build tooling)

**Why:**
- Official WordPress standard for block development
- Handles JSX, SCSS, minification, and i18n automatically
- Generates `block.json` for automatic asset enqueuing
- Zero configuration needed

**Alternatives considered:**
- ❌ Custom webpack config - Maintenance burden, reinventing the wheel
- ❌ No build step (vanilla JS) - Can't use JSX, harder to organize components

## Technical Architecture

### File Structure
```
blocks/query-filter-container/
├── block.json          # Block metadata, attributes, script/style handles
├── edit.js             # Editor component with InspectorControls
├── save.js             # Returns null (dynamic block renders in PHP)
├── view.js             # Frontend Interactivity API directives
├── render.php          # PHP template for frontend rendering
├── style.scss          # Frontend + Editor styles
└── editor.scss         # Editor-only styles
```

### Data Flow
1. **Admin configures block** → Attributes saved to post_content
2. **Frontend render** → `render.php` reads attributes, outputs filter form HTML
3. **User interacts** → Interactivity API toggles filter visibility
4. **User clicks Apply** → Browser navigates to `?param=value` URL
5. **WordPress Query Loop** → Reads URL parameters, filters posts automatically

### PHP Integration (functions.php)
```php
function renalinfolk_register_query_filter_block() {
    register_block_type( __DIR__ . '/blocks/query-filter-container' );
}
add_action( 'init', 'renalinfolk_register_query_filter_block' );
```

### CSS Architecture
- **theme.json variables** for colors, spacing, typography
- **style.scss** for component structure (Flex layout, responsive breakpoints)
- **Utility classes** from WordPress (`.wp-block-*`, `.has-*-color`)

## Risks / Trade-offs

### Risk 1: Query Loop Compatibility
**Risk:** Core Query Loop might not respect all URL parameters

**Mitigation:**
- Test with `pre_get_posts` filter to ensure parameter parsing
- Document supported parameters (s, category, tag, author, orderby, order, year, monthnum)
- Add filter hooks for custom parameter handling if needed

### Risk 2: Performance with Large Taxonomies
**Risk:** Dropdown with 100+ categories could be slow to render

**Mitigation:**
- Use lazy-loaded select components (e.g., `react-select` or native `<select>` with groups)
- Add `max_items` parameter to limit taxonomy term fetching
- Consider search-as-you-type for large taxonomies (future enhancement)

### Risk 3: Accessibility of Custom Datepicker
**Risk:** Native `<input type="date">` has poor accessibility on some browsers

**Mitigation:**
- Use native datepicker initially (best mobile UX)
- Add ARIA labels and keyboard navigation hints
- Consider `@wordpress/components` DatePicker for editor (future enhancement)

### Risk 4: Build Tooling Adds Complexity
**Risk:** Theme currently has no build process; adding `@wordpress/scripts` requires Node.js

**Mitigation:**
- Document setup in README: `npm install && npm run build`
- Commit built assets to repo (optional for deployment without Node.js)
- Keep build config minimal (rely on defaults)

## Migration Plan

**Phase 1: Development (Week 1)**
1. Set up `@wordpress/scripts` build tooling
2. Create block structure (`block.json`, components)
3. Implement admin UI (InspectorControls)
4. Build frontend filter form with Interactivity API

**Phase 2: Integration (Week 2)**
5. Test with existing gallery templates
6. Update `page-gallery-article.html` template to include block
7. Validate accessibility (keyboard nav, screen readers, WCAG contrast)
8. Write user documentation for admins

**Phase 3: Rollout (Week 3)**
9. Deploy to staging, gather feedback
10. Add to remaining gallery templates (Images, Publications, Videos)
11. Production deployment

**Rollback:**
- Remove block registration from `functions.php`
- Remove block directory (`blocks/query-filter-container/`)
- Revert gallery template changes
- No database changes needed (block attributes stored in post_content)

## Open Questions

1. **Should we support multiple taxonomy filters simultaneously?**
   - Current design: Single taxonomy per block instance
   - Alternative: Multi-taxonomy with AND/OR logic
   - **Decision needed:** Validate with user testing on gallery pages

2. **Should "Reset" button use History API or full page reload?**
   - Option A: `window.history.pushState()` + manual form reset (no page reload)
   - Option B: Navigate to base URL (triggers full reload, simpler)
   - **Leaning toward:** Option B for simplicity (aligns with URL parameter approach)

3. **Should we add filter presets (e.g., "Latest Research", "Patient Resources")?**
   - Could be useful for common filter combinations
   - Adds complexity to admin UI
   - **Decision deferred:** Start with manual filters, add presets if requested

4. **How should we handle Query Loop context inheritance?**
   - Should block automatically detect parent Query Loop's post type?
   - Or rely on manual configuration?
   - **Leaning toward:** Manual configuration (simpler, more predictable)

## Validation Criteria

**Before marking design complete:**
- [ ] All decisions documented with rationale
- [ ] File structure matches WordPress block standards
- [ ] No conflicts with theme.json or existing JavaScript
- [ ] Accessibility approach defined (ARIA labels, keyboard nav)
- [ ] Migration plan includes rollback steps
- [ ] Open questions identified for user feedback

**Post-implementation validation:**
- [ ] Block appears in Site Editor under "Renalinfolk" category
- [ ] All InspectorControls update attributes correctly
- [ ] Filter form renders with correct theme.json styles
- [ ] URL parameters update on "Apply" click
- [ ] Query Loop filters posts based on parameters
- [ ] "Reset" clears URL and form inputs
- [ ] Responsive layout works on mobile (320px width)
- [ ] WCAG AA contrast ratios pass (4.5:1 text, 3:1 UI)
- [ ] Keyboard navigation works (Tab, Enter, Esc to close)
- [ ] Screen reader announces filter state changes
