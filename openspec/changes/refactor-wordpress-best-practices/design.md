# Design Document: WordPress Best Practices Refactoring

## Overview

This document captures architectural decisions, technical approaches, and trade-off analysis for refactoring the Renalinfolk WordPress block theme to comply with WordPress best practices, improve performance, and achieve production-ready status.

---

## Architecture Decisions

### AD-001: Font Loading Strategy

**Context:**
Material Symbols Outlined font is currently loaded from Google Fonts CDN, creating:
- GDPR compliance issues (third-party tracking)
- Performance bottleneck (external HTTP request, 300-500ms latency)
- Security risk (no Subresource Integrity protection)

**Decision:**
Self-host Material Symbols Outlined font using WordPress @font-face declaration in theme.json.

**Rationale:**

| Approach | Pros | Cons | Decision |
|----------|------|------|----------|
| **Keep Google CDN** | • Easy maintenance<br>• Auto-updates<br>• Global CDN caching | • GDPR violation<br>• External dependency<br>• Performance hit<br>• Theme Review rejection | ❌ Rejected |
| **Self-host in theme.json** | • GDPR compliant<br>• No external requests<br>• Faster load times<br>• WordPress standard | • Manual updates needed<br>• Slightly larger theme package | ✅ **Selected** |
| **Remove entirely** | • Smallest package<br>• No maintenance | • Breaks icon usage<br>• May break patterns<br>• Feature loss | ❌ Rejected |

**Implementation:**
```json
{
  "settings": {
    "typography": {
      "fontFamilies": [
        {
          "name": "Material Symbols Outlined",
          "slug": "material-symbols",
          "fontFamily": "\"Material Symbols Outlined\", sans-serif",
          "fontFace": [
            {
              "src": ["file:./assets/fonts/material-symbols/MaterialSymbolsOutlined-VariableFont.woff2"],
              "fontWeight": "100 700",
              "fontStyle": "normal",
              "fontFamily": "\"Material Symbols Outlined\""
            }
          ]
        }
      ]
    }
  }
}
```

**Consequences:**
- **Positive:** 300-500ms faster page load, GDPR compliant, passes WordPress Theme Review
- **Negative:** Theme package increases by ~100-200KB, manual font updates required
- **Mitigation:** Font updates rare for Material Symbols; package size increase acceptable vs. benefits

---

### AD-002: Template File Creation Strategy

**Context:**
Three core WordPress templates are missing:
- `single.html` - Single post view
- `search.html` - Search results
- `page-no-title.html` - Page without title

WordPress falls back to `index.html` for all, causing suboptimal user experience.

**Decision:**
Create minimal, semantic templates using core WordPress blocks only.

**Template Design Principles:**
1. **Minimal Markup:** Use only essential blocks to enable customization
2. **Semantic Structure:** Follow WordPress block template best practices
3. **Accessibility First:** Include proper ARIA attributes and heading hierarchy
4. **Mobile Responsive:** Leverage theme.json responsive settings
5. **No Custom CSS:** Rely entirely on theme.json styling

**single.html Architecture:**
```
Header Template Part
├── Main Content Group (role="main")
│   ├── Post Title (h1, semantic heading)
│   ├── Post Meta Group
│   │   ├── Post Date
│   │   ├── Post Author
│   │   └── Post Categories
│   ├── Post Featured Image (if set)
│   ├── Post Content (user-generated)
│   ├── Post Tags
│   ├── Post Navigation (prev/next)
│   └── Comments Section
└── Footer Template Part
```

**search.html Architecture:**
```
Header Template Part
├── Main Content Group (role="main")
│   ├── Search Query Title (e.g., "Search Results for: keyword")
│   ├── Search Form (for query refinement)
│   ├── Query Loop
│   │   ├── Post Template (repeating)
│   │   │   ├── Post Title (linked)
│   │   │   ├── Post Excerpt
│   │   │   └── Read More link
│   │   └── Query No Results
│   │       └── Helpful message + search form
│   └── Query Pagination
└── Footer Template Part
```

**page-no-title.html Architecture:**
```
Header Template Part
├── Main Content Group (role="main")
│   └── Post Content ONLY (no title block)
└── Footer Template Part
```

**Rationale:**
- **Minimal Markup:** Easier for users to customize in Site Editor
- **Core Blocks Only:** Ensures maximum compatibility and performance
- **Template Parts:** Reuses existing header/footer for consistency
- **Accessibility:** Each template includes semantic landmarks (role="main")

**Alternative Approaches Considered:**

| Approach | Pros | Cons | Decision |
|----------|------|------|----------|
| **Copy from Twenty Twenty-Five** | • Proven design<br>• Feature-rich | • Bloated markup<br>• May not match theme style | ❌ Rejected |
| **Minimal templates (chosen)** | • Easy customization<br>• Clean code<br>• Fast rendering | • Less featured out-of-box | ✅ **Selected** |
| **Complex templates** | • Rich features<br>• Impressive demo | • Hard to customize<br>• Maintenance burden | ❌ Rejected |

**Consequences:**
- **Positive:** Users can easily customize templates, clean codebase, fast rendering
- **Negative:** Less "wow factor" in initial demo; requires users to add features
- **Mitigation:** Provide pattern library for common layouts users can insert

---

### AD-003: Pattern Category Organization

**Context:**
Two unregistered pattern categories found in use:
- `renalinfolk_post-format` (3 patterns)
- `renalinfolk_page` (6 patterns)

These patterns are invisible in the Site Editor, breaking user experience.

**Decision:**
1. **Register `renalinfolk_post-format`** - Legitimate category for post format patterns
2. **Rename `renalinfolk_page` to `renalinfolk_medical_pages`** - Use existing category

**Category Taxonomy:**

```
renalinfolk_medical_pages (Full Page Layouts)
├── Business homepage
├── CV/Bio page
├── Coming soon page
├── Event landing page
├── Book landing page
└── Portfolio homepage

renalinfolk_medical_content (Content Sections)
├── Services sections
├── Team bios
├── Testimonials
├── FAQs
└── Medical content blocks

renalinfolk_post-format (NEW - Post Format Templates)
├── Audio post format
├── Link post format
└── Format binding pattern
```

**Rationale:**

| Category | Action | Rationale |
|----------|--------|-----------|
| `renalinfolk_post-format` | ✅ Register new | • Distinct purpose (post formats)<br>• Only 3 patterns, but specific use case<br>• WordPress supports post formats natively |
| `renalinfolk_page` | ❌ Rename to `medical_pages` | • Avoids category proliferation<br>• 6 patterns fit medical_pages scope<br>• Simpler category structure |

**Alternative Considered:**
Register both categories as-is.

**Rejected Because:**
- Category proliferation makes pattern discovery harder
- `renalinfolk_page` is too generic (what kind of pages?)
- `medical_pages` is more descriptive and already exists

**Consequences:**
- **Positive:** All patterns visible, logical categorization, fewer total categories
- **Negative:** Need to update 6 pattern files
- **Mitigation:** Simple find-replace in pattern headers (5 minutes)

---

### AD-004: Hardcoded Color Resolution Strategy

**Context:**
Multiple hardcoded color values found:
- `theme.json`: `#f6f6f8` (body background)
- `templates/home.html`: `#BDE0FE33` (secondary with opacity)
- `templates/page-contact.html`: `#f5f7f8` (background-light) × 5 instances

These bypass the Global Styles customization system.

**Decision:**
Map all hardcoded colors to existing palette colors or create new palette entries.

**Color Mapping Strategy:**

| Hardcoded Value | Closest Palette Color | Exact Match? | Action |
|-----------------|----------------------|--------------|--------|
| `#f6f6f8` | `background-light` (#f5f7f8) | ❌ Close (1 value off) | Use `background-light` |
| `#f5f7f8` | `background-light` (#f5f7f8) | ✅ Exact | Replace with `var(--wp--preset--color--background-light)` |
| `#BDE0FE33` | `secondary` (#BDE0FE) @ 20% opacity | ✅ Base color match | Use `secondary` with CSS opacity OR define `secondary-light` |

**Implementation Approach:**

**Option A: Use existing colors + CSS opacity (Selected)**
```html
<!-- Before -->
<div style="background-color:#BDE0FE33">

<!-- After -->
<div style="background-color:var(--wp--preset--color--secondary);opacity:0.2">
```

**Pros:**
- No new palette entries
- Simpler theme.json
- Flexible opacity control

**Cons:**
- Opacity affects all child elements
- Less semantic

**Option B: Define new palette colors**
```json
{
  "color": "#E5F2FE",
  "name": "Secondary Light",
  "slug": "secondary-light"
}
```

**Pros:**
- More semantic
- Opacity doesn't affect children
- Easier to customize in Global Styles

**Cons:**
- More palette entries (cognitive load)
- Harder to maintain consistency

**Decision:** Use **Option A** for now; can add palette colors in future if user feedback indicates need.

**Consequences:**
- **Positive:** All colors customizable via Global Styles, cleaner templates
- **Negative:** Opacity approach may need adjustment if child elements affected
- **Mitigation:** Test opacity inheritance; switch to Option B if issues found

---

### AD-005: Accessibility Enhancement Strategy

**Context:**
Only 49 ARIA attributes found theme-wide. WordPress Accessibility Ready themes should have comprehensive ARIA coverage.

**Decision:**
Add ARIA attributes in 4 tiers based on impact:

**Tier 1: Navigation (Highest Impact)**
- `aria-label` on all navigation blocks
- Descriptive labels ("Main Navigation", "Footer Navigation", etc.)
- **Impact:** Screen reader users understand site structure

**Tier 2: Forms (High Impact)**
- `aria-label` on search inputs
- `aria-required` on required fields
- `aria-describedby` for field hints
- **Impact:** Form completion rates for screen reader users

**Tier 3: Landmarks (Medium Impact)**
- `role="main"` on main content
- `role="complementary"` on sidebar
- `role="contentinfo"` on footer (if not semantic <footer>)
- **Impact:** Skip navigation, page structure understanding

**Tier 4: Interactive Elements (Medium Impact)**
- `aria-label` on icon-only buttons
- `aria-expanded` on dropdowns/accordions
- `aria-current` on active navigation items
- **Impact:** Clearer interactive element purpose

**Implementation Guidelines:**

```html
<!-- Navigation Example -->
<!-- wp:navigation {"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'renalinfolk' ); ?>"} /-->

<!-- Search Example -->
<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'renalinfolk' ); ?>","buttonText":"<?php esc_attr_e( 'Search', 'renalinfolk' ); ?>"} /-->

<!-- Landmark Example -->
<!-- wp:group {"tagName":"main","metadata":{"name":"main"},"align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" role="main">
  <!-- content -->
</main>
<!-- /wp:group -->
```

**Testing Strategy:**
1. Automated: axe DevTools scan (target: 0 critical/serious issues)
2. Manual: NVDA/VoiceOver navigation testing
3. Validation: Lighthouse Accessibility score >95

**Consequences:**
- **Positive:** Achieves WordPress Accessibility Ready designation, better UX for screen readers
- **Negative:** Slightly more verbose template markup
- **Mitigation:** WordPress Site Editor abstracts ARIA complexity from end users

---

### AD-006: Performance Optimization Strategy

**Context:**
Theme package contains 10 unused font families (~1-3MB waste) plus external CDN dependency.

**Decision:**
Remove all unused fonts; keep only:
- Lexend (primary font)
- Fira Code (monospace)
- Material Symbols (icons - after self-hosting)

**Storage Impact Analysis:**

| Font Family | Size (est.) | Used in theme.json? | Action |
|-------------|-------------|---------------------|--------|
| Lexend | ~150KB | ✅ Yes | ✅ **Keep** |
| Fira Code | ~100KB | ✅ Yes | ✅ **Keep** |
| Material Symbols | ~200KB | ❌ No (CDN) | ✅ **Self-host & Keep** |
| Beiruti | ~120KB | ❌ No | ❌ **Delete** |
| Fira Sans | ~100KB | ❌ No | ❌ **Delete** |
| Literata | ~180KB | ❌ No | ❌ **Delete** |
| Manrope | ~90KB | ❌ No | ❌ **Delete** |
| Platypi | ~110KB | ❌ No | ❌ **Delete** |
| Roboto Slab | ~130KB | ❌ No | ❌ **Delete** |
| Vollkorn | ~140KB | ❌ No | ❌ **Delete** |
| Ysabeau Office | ~100KB | ❌ No | ❌ **Delete** |
| (Others) | ~200KB | ❌ No | ❌ **Delete** |

**Total Savings:** ~1.3MB

**Additional Performance Wins:**
- Eliminate Google Fonts CDN request: ~300-500ms page load improvement
- Reduce theme package size: Faster uploads, installs, updates
- Fewer font files: Faster theme ZIP creation

**Validation:**
```bash
# Before
du -sh assets/fonts/
# Output: ~3-4MB

# After
du -sh assets/fonts/
# Expected: ~450KB (3 font families only)
```

**Consequences:**
- **Positive:** 1.3MB smaller package, no external requests, faster page loads
- **Negative:** Users can't easily switch to removed fonts without adding them back
- **Mitigation:** Document font removal in changelog; users rarely need 10+ font choices

---

## Technical Considerations

### WordPress Block Theme Constraints

**Block Markup Immutability:**
- Block comments must follow exact WordPress serialized format
- Attributes must be valid JSON
- Block names must use `core/` or custom namespace prefix
- Self-closing blocks: `<!-- wp:block /-->`
- Container blocks: `<!-- wp:block -->content<!-- /wp:block -->`

**Theme.json Schema Version 3:**
- Must validate against https://schemas.wp.org/wp/6.7/theme.json
- Color values: hex, RGB, CSS variables (via `var:preset|color|slug` syntax)
- Spacing values: px, em, rem, %, clamp() supported
- Font families: Must include fontFace with src array

**Template Hierarchy:**
WordPress processes templates in this order:
1. Custom template (if assigned)
2. Specific template (single-post.html, archive-category.html)
3. General template (single.html, archive.html)
4. Fallback (index.html)

**Pattern Registration Requirements:**
- PHP file in `patterns/` directory
- Must have header comment with Title, Slug, Categories
- Slug format: `namespace/pattern-name`
- Categories must be registered via `register_block_pattern_category()`

### Browser Compatibility Targets

**Modern CSS Features (Progressive Enhancement):**
- `text-wrap: pretty` - Safari 16.4+, Chrome 117+, Firefox 128+
- `color-mix()` - Safari 16.2+, Chrome 111+, Firefox 88+
- CSS `clamp()` - All modern browsers (2020+)
- CSS Custom Properties - All modern browsers (2016+)

**Fallback Strategy:**
- text-wrap: Degrades gracefully (no widows/orphans prevention, but readable)
- color-mix(): Provide fallback hex values before color-mix()
- clamp(): Required feature (supported since IE 11 death in 2022)

**Testing Matrix:**
- Chrome 90+ (primary)
- Firefox 88+ (secondary)
- Safari 16+ (secondary)
- Edge 90+ (Chromium-based, usually matches Chrome)

### Accessibility Standards

**WCAG 2.1 Level AA Requirements:**
- Color contrast: 4.5:1 for normal text, 3:1 for large text (18px+)
- Focus indicators: Visible 2px outline on all interactive elements
- Keyboard navigation: All functionality accessible via keyboard
- ARIA: Proper landmarks, labels, and roles
- Semantic HTML: Use appropriate HTML5 elements

**WordPress Accessibility Coding Standards:**
- Skip links: Allow skipping to main content
- Heading hierarchy: Logical h1-h6 progression (no skipped levels)
- Alt text: All images must have descriptive alt attributes
- Form labels: All inputs must have associated <label> or aria-label
- Link text: Descriptive (avoid "click here", "read more" without context)

**Testing Tools:**
1. **Automated:** axe DevTools, Lighthouse
2. **Manual:** NVDA (Windows), VoiceOver (Mac), keyboard navigation
3. **Validation:** WAVE, tota11y

### Performance Budgets

**Lighthouse Targets:**
- Performance Score: >90
- Accessibility Score: >95 (required for Accessibility Ready tag)
- Best Practices Score: >90
- SEO Score: >90

**Core Web Vitals:**
- Largest Contentful Paint (LCP): <2.5s
- First Input Delay (FID): <100ms
- Cumulative Layout Shift (CLS): <0.1
- First Contentful Paint (FCP): <1.8s

**Theme-Specific Metrics:**
- Theme package size: <5MB
- External requests: 0 (all assets local)
- Font files: ≤3 families
- Template load time: <500ms (server-side)

---

## Risk Analysis

### Risk Matrix

| Risk | Probability | Impact | Severity | Mitigation |
|------|-------------|--------|----------|------------|
| Font self-hosting breaks icons | Medium | High | **HIGH** | Test thoroughly; keep CDN code commented for emergency rollback |
| New templates conflict with user content | Low | Medium | **MEDIUM** | Use minimal markup; test with sample content |
| Pattern category changes break sites | Very Low | Low | **LOW** | Only metadata changes; patterns still work |
| Color variable changes affect custom styles | Low | Low | **LOW** | Use existing palette colors; no new slugs |
| ARIA additions cause validation errors | Low | Medium | **MEDIUM** | Validate each template with axe DevTools |
| Performance regression | Very Low | High | **MEDIUM** | Benchmark before/after with Lighthouse |

### Rollback Procedures

**Full Rollback (Nuclear Option):**
```bash
git revert HEAD~1  # Revert last commit
git push origin main --force  # If already deployed
```

**Partial Rollback (Targeted):**

**If font loading breaks:**
```php
// Temporarily restore Google CDN in functions.php
wp_enqueue_style(
    'material-symbols-outlined',
    'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined...',
    array(),
    null
);
```

**If template causes errors:**
```bash
# Remove problematic template file (falls back to index.html)
rm templates/single.html
git commit -m "Temporarily remove single.html due to issue"
```

**If patterns invisible:**
```php
// Emergency re-register category in functions.php
register_block_pattern_category('renalinfolk_page', array('label' => 'Pages'));
```

---

## Future Considerations

### Phase 2 Enhancements (Post-Refactoring)

**Not in Scope for This Change (Future Work):**

1. **Advanced Accessibility:**
   - Skip-to-content links in all templates
   - ARIA live regions for dynamic content
   - Focus management for modals/overlays

2. **Performance Optimizations:**
   - Image lazy loading (WordPress 5.5+ native, but verify)
   - Async/defer JavaScript loading
   - Critical CSS inlining

3. **Advanced Patterns:**
   - Interactive patterns (accordions, tabs)
   - Animation-enhanced patterns
   - Advanced layout patterns (masonry, grid)

4. **Developer Experience:**
   - Pattern preview images
   - Comprehensive pattern documentation
   - Starter content configuration

5. **WordPress Theme Review Preparation:**
   - Theme check plugin testing
   - Security audit
   - Translation readiness
   - RTL testing

### Extensibility Points

**Areas Designed for Future Extension:**

1. **Color Palette:**
   - Current: 21 colors
   - Extensible: Add `secondary-light`, `primary-lighter`, etc.
   - No breaking changes if colors added

2. **Font Families:**
   - Current: 2 fonts (Lexend, Fira Code)
   - Extensible: Additional fonts via child theme or theme.json merge
   - Self-hosting pattern established

3. **Template Parts:**
   - Current: 7 template parts
   - Extensible: Additional header/footer variations
   - Pattern established for registration

4. **Pattern Categories:**
   - Current: 3 categories
   - Extensible: Add categories for new pattern types
   - Registration pattern established

---

## Validation Criteria

### Pre-Implementation Validation

- [ ] All affected files identified
- [ ] Backup created (theme.json, functions.php)
- [ ] Test environment prepared
- [ ] Validation tools available (node, php, axe DevTools)

### Implementation Validation

**Per Phase:**
- [ ] JSON syntax validation passes
- [ ] PHP syntax validation passes
- [ ] No WordPress errors in debug log
- [ ] Site Editor loads without errors
- [ ] Patterns insert successfully

**Final Validation:**
- [ ] All 30 identified issues resolved
- [ ] Zero external CDN requests
- [ ] All templates exist and render
- [ ] All patterns visible in correct categories
- [ ] Theme package <5MB
- [ ] Lighthouse scores meet targets
- [ ] axe DevTools reports no critical issues
- [ ] Cross-browser testing passed
- [ ] Responsive testing passed

### Post-Implementation Validation

- [ ] WordPress Theme Check plugin passes (if available)
- [ ] User acceptance testing completed
- [ ] Documentation updated
- [ ] Changelog accurate
- [ ] Git tagged with version number

---

## Open Architectural Questions

### Question 1: Material Symbols Usage Audit

**Status:** ⚠️ OPEN

**Question:**
Are Material Symbols icons actually used anywhere in the theme's patterns or templates?

**Investigation Required:**
```bash
# Search for Material Symbols CSS class
rg "material-symbols-outlined" . --type html --type php

# Search for icon references in patterns
rg "span.*icon|material.*icon" patterns/
```

**Possible Outcomes:**
1. **Icons used extensively:** Self-host font (as planned)
2. **Icons used minimally:** Self-host but document removal option
3. **Icons not used at all:** Remove font entirely, remove enqueue

**Impact:**
- If unused: Save 200KB package size, remove unnecessary code
- If used: Proceed as planned with self-hosting

**Decision Deadline:** Before Task 1.1 implementation

---

### Question 2: Color Opacity Implementation

**Status:** ⚠️ OPEN

**Question:**
For `#BDE0FE33` (secondary @ 20% opacity), should we use:
- **Option A:** CSS opacity property
- **Option B:** New palette color "secondary-light"

**Testing Required:**
1. Apply opacity to container with text children
2. Verify text doesn't become semi-transparent
3. Check if opacity affects nested elements

**Evaluation Criteria:**
- Does opacity affect child elements? (If yes, use Option B)
- Do users need to customize this specific shade? (If yes, use Option B)
- Is simplicity more important? (If yes, use Option A)

**Decision Deadline:** Before Task 2.4.2 implementation

---

### Question 3: Archive Directory Strategy

**Status:** ⚠️ OPEN

**Question:**
CLAUDE.md references `patterns/archive/` and `styles/archive/` but they don't exist. Should we:
- **Option A:** Remove documentation references (directories never existed)
- **Option B:** Create directories (prepare for future deprecations)
- **Option C:** Move truly unused patterns to archive now

**Investigation Required:**
```bash
# Check git history for archive directories
git log --all --full-history -- "patterns/archive/*"
git log --all --full-history -- "styles/archive/*"
```

**Decision Criteria:**
- If git shows deleted directories: Restore or document removal
- If never existed: Remove documentation
- If ambiguous: Create for future use

**Decision Deadline:** Before Task 3.4.2 implementation

---

## Conclusion

This refactoring addresses 30 identified issues across critical, high, medium, and low priorities. The design emphasizes:

1. **WordPress Standards Compliance:** All changes align with WordPress Coding Standards and Theme Review requirements
2. **Performance First:** Eliminate external dependencies, reduce package size, optimize assets
3. **Accessibility Ready:** Comprehensive ARIA attributes, WCAG AA compliance
4. **Backward Compatibility:** No breaking changes to existing theme installations
5. **User Customizability:** Replace hardcoded values with Global Styles variables

**Estimated Implementation Time:** 11.35 hours
**Expected Performance Gain:** 300-500ms page load, 1.3MB package reduction
**WordPress Theme Review Ready:** Yes (after implementation)

**Next Steps:**
1. Resolve open architectural questions
2. Get proposal approval
3. Begin Phase 1 implementation
4. Validate continuously throughout implementation

---

**Document Version:** 1.0
**Last Updated:** 2025-11-17
**Status:** 🟡 DRAFT - Awaiting architectural question resolution
