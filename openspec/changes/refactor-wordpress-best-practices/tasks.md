# Implementation Tasks: Refactor WordPress Best Practices

## Overview

This document provides a sequential, actionable task list for implementing the WordPress best practices refactoring. Tasks are organized by priority phase and include validation steps.

**Status Legend:**
- [ ] Not started
- [x] Completed

---

## Phase 1: Critical Fixes (MUST FIX)

### Task 1.1: Self-Host Material Symbols Font
**Priority:** CRITICAL
**Estimated Time:** 1 hour
**Impact:** Resolves GDPR violation, improves performance

- [ ] Download Material Symbols Outlined font from Google Fonts
  - URL: https://fonts.google.com/icons
  - Download WOFF2 format for optimal performance
- [ ] Create directory `assets/fonts/material-symbols/`
- [ ] Place font file in directory as `MaterialSymbolsOutlined-VariableFont.woff2`
- [ ] Add font-face declaration to theme.json or style.css
- [ ] Update functions.php to remove Google CDN enqueue (lines 59-68)
- [ ] Test icon display in browser
- [ ] Validate no external requests to fonts.googleapis.com

**Files Modified:**
- `functions.php` (remove lines 59-68 or replace with local enqueue)
- `theme.json` or `style.css` (add font-face declaration)
- New directory: `assets/fonts/material-symbols/`

**Validation:**
```bash
# Check no external font requests
rg "fonts.googleapis.com" functions.php  # Should return nothing

# Verify font file exists
ls assets/fonts/material-symbols/MaterialSymbolsOutlined-VariableFont.woff2
```

---

### Task 1.2: Create Missing Core Template Files
**Priority:** CRITICAL
**Estimated Time:** 1 hour
**Impact:** Enables proper WordPress template hierarchy

#### Subtask 1.2.1: Create single.html
- [ ] Create `templates/single.html`
- [ ] Add minimal block markup with:
  - Template part: header
  - Post content area (post-title, post-featured-image, post-content)
  - Post metadata (post-date, post-author, post-terms)
  - Comments section
  - Template part: footer
- [ ] Register in theme.json if needed
- [ ] Test with sample blog post

**Example Structure:**
```html
<!-- wp:template-part {"slug":"header"} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
  <!-- wp:post-title /-->
  <!-- wp:post-featured-image /-->
  <!-- wp:post-content /-->
  <!-- wp:post-date /-->
  <!-- wp:post-terms {"term":"category"} /-->
  <!-- wp:comments /-->
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer"} /-->
```

#### Subtask 1.2.2: Create search.html
- [ ] Create `templates/search.html`
- [ ] Add search results query loop
- [ ] Add "No results found" message
- [ ] Include search form for retry
- [ ] Test with search query

**Example Structure:**
```html
<!-- wp:template-part {"slug":"header"} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
  <!-- wp:query-title {"type":"search"} /-->
  <!-- wp:search /-->
  <!-- wp:query {"queryId":1} -->
    <!-- wp:post-template -->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-excerpt /-->
    <!-- /wp:post-template -->
    <!-- wp:query-no-results -->
      <!-- wp:paragraph -->No results found.<!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
  <!-- /wp:query -->
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer"} /-->
```

#### Subtask 1.2.3: Create page-no-title.html
- [ ] Create `templates/page-no-title.html`
- [ ] Add page content without title block
- [ ] Ensure already registered in theme.json (line 811)
- [ ] Test with sample page

**Example Structure:**
```html
<!-- wp:template-part {"slug":"header"} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
  <!-- wp:post-content /-->
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer"} /-->
```

**Files Created:**
- `templates/single.html`
- `templates/search.html`
- `templates/page-no-title.html`

**Validation:**
```bash
# Verify all templates exist
ls templates/single.html templates/search.html templates/page-no-title.html

# Validate HTML structure (visual check in Site Editor)
# Load Appearance > Editor and verify no errors
```

---

### Task 1.3: Register Missing Pattern Categories
**Priority:** CRITICAL
**Estimated Time:** 15 minutes
**Impact:** Makes patterns visible in editor

- [ ] Open `functions.php`
- [ ] Add registration for `renalinfolk_post-format` category
- [ ] Add after existing category registrations (after line 138)
- [ ] Update function documentation if needed

**Code to Add:**
```php
register_block_pattern_category(
	'renalinfolk_post-format',
	array(
		'label'       => __( 'Post Formats', 'renalinfolk' ),
		'description' => __( 'Patterns for different post format types (audio, link, etc.).', 'renalinfolk' ),
	)
);
```

**Files Modified:**
- `functions.php` (add ~8 lines after line 138)

**Validation:**
```bash
# Verify category registration syntax
php -l functions.php

# Check patterns using this category
rg "renalinfolk_post-format" patterns/
# Should return: binding-format.php, format-link.php, format-audio.php
```

---

## Phase 2: High Priority Fixes

### Task 2.1: Fix Pattern Categorization (renalinfolk_page)
**Priority:** HIGH
**Estimated Time:** 30 minutes
**Impact:** Improves pattern organization

**Decision Required:** Choose one approach:

**Option A: Register new category**
- [ ] Add `renalinfolk_page` category registration to functions.php
- [ ] Use label "Full Pages" and appropriate description
- [ ] Test pattern visibility

**Option B: Rename in patterns (Recommended)**
- [ ] Update 6 pattern files to use `renalinfolk_medical_pages` instead
- [ ] Files to update:
  - `patterns/page-business-home.php` (line 5)
  - `patterns/page-cv-bio.php` (line 5)
  - `patterns/page-coming-soon.php` (line 5)
  - `patterns/page-landing-event.php` (line 5)
  - `patterns/page-landing-book.php` (line 5)
  - `patterns/page-portfolio-home.php` (line 5)
- [ ] Change `Categories: renalinfolk_page` to `Categories: renalinfolk_medical_pages`
- [ ] Test pattern visibility in editor

**Files Modified:**
- 6 pattern files OR
- `functions.php` (if choosing Option A)

**Validation:**
```bash
# Verify no unregistered categories remain
rg "Categories:.*renalinfolk_page" patterns/  # Should return nothing (Option B)

# Test in Site Editor
# Open pattern inserter and verify all patterns visible
```

---

### Task 2.2: Remove Unused Font Families
**Priority:** HIGH
**Estimated Time:** 15 minutes
**Impact:** Reduces theme package size by 1-3MB

- [ ] Keep only Lexend and Fira Code font directories
- [ ] Delete unused font directories:
  - `assets/fonts/beiruti/`
  - `assets/fonts/fira-sans/`
  - `assets/fonts/literata/`
  - `assets/fonts/manrope/`
  - `assets/fonts/platypi/`
  - `assets/fonts/roboto-slab/`
  - `assets/fonts/vollkorn/`
  - `assets/fonts/ysabeau-office/`
  - (Plus any other unused directories found)
- [ ] Verify theme.json only references Lexend and Fira Code
- [ ] Test theme editor to ensure fonts load correctly

**Files Deleted:**
- 8-10 font directories under `assets/fonts/`

**Validation:**
```bash
# Check only 2 font directories remain
ls assets/fonts/  # Should show only: lexend, fira-code, material-symbols

# Verify theme.json fontFamilies
rg "fontFamily" theme.json  # Should only show Lexend and Fira Code

# Check theme package size
du -sh .  # Should be significantly smaller
```

---

### Task 2.3: Resolve Color Documentation Discrepancy
**Priority:** HIGH
**Estimated Time:** 30 minutes
**Impact:** Aligns documentation with implementation

**Decision Required:** Choose primary blue color:

**Option A: Use #359EFF (Current Implementation) - RECOMMENDED**
- [ ] Update `readme.txt` line 38 to use #359EFF
- [ ] Update `CLAUDE.md` to use #359EFF
- [ ] Update `styles/02-dark.json` if using #135bec
- [ ] Verify WCAG AA contrast ratio (4.5:1 on white)
- [ ] Document contrast ratio in CLAUDE.md

**Option B: Use #135bec (Current Documentation)**
- [ ] Update `theme.json` line 22 to use #135bec
- [ ] Update all patterns using `accent-1` color if affected
- [ ] Verify WCAG AA contrast ratio
- [ ] Test across all templates

**Files Modified:**
- `readme.txt`
- `CLAUDE.md`
- Possibly `styles/02-dark.json`
OR
- `theme.json`
- Multiple pattern files

**Validation:**
```bash
# Verify single color used consistently
rg "#135bec|#359EFF" . --type md --type json

# Check WCAG contrast ratio
# Use: https://webaim.org/resources/contrastchecker/
# Primary Blue on white: minimum 4.5:1 required
```

---

### Task 2.4: Replace Hardcoded Background Colors
**Priority:** HIGH
**Estimated Time:** 45 minutes
**Impact:** Enables proper theme customization via Global Styles

#### Subtask 2.4.1: Fix theme.json global background
- [ ] Open `theme.json`
- [ ] Line 255: Change `"background": "#f6f6f8"` to use palette reference
- [ ] Determine if #f6f6f8 should be:
  - `var:preset|color|background-light` (#f5f7f8 - very close), OR
  - Added as new palette color "body-background"
- [ ] Update to use CSS custom property

**Before:**
```json
"color": {
    "background": "#f6f6f8",
    "text": "var:preset|color|contrast"
}
```

**After (Option 1 - Use existing):**
```json
"color": {
    "background": "var:preset|color|background-light",
    "text": "var:preset|color|contrast"
}
```

**After (Option 2 - Add new color):**
1. Add to palette:
```json
{
    "color": "#f6f6f8",
    "name": "Body Background",
    "slug": "body-background"
}
```
2. Reference it:
```json
"color": {
    "background": "var:preset|color|body-background",
    "text": "var:preset|color|contrast"
}
```

#### Subtask 2.4.2: Fix templates/home.html
- [ ] Open `templates/home.html`
- [ ] Line 8: Replace `background-color:#BDE0FE33` with palette reference
- [ ] Note: #BDE0FE33 is `secondary` color with 20% opacity (33 hex = ~20%)
- [ ] Use: `background-color:var(--wp--preset--color--secondary);opacity:0.2`
  OR define as new palette color "secondary-light"

**Files Modified:**
- `templates/home.html`

#### Subtask 2.4.3: Fix templates/page-contact.html
- [ ] Open `templates/page-contact.html`
- [ ] Find all instances of `background-color:#f5f7f8` (5 occurrences)
- [ ] Lines: 7-8, 36-37, 57-58, 78-79, 99-100
- [ ] Replace with `background-color:var(--wp--preset--color--background-light)`

**Files Modified:**
- `templates/page-contact.html`

**Files Modified Total:**
- `theme.json`
- `templates/home.html`
- `templates/page-contact.html`

**Validation:**
```bash
# Check for remaining hardcoded background colors
rg 'background-color:#[0-9a-fA-F]{3,8}' templates/ --type html

# Verify palette completeness
rg '"slug":' theme.json | grep color

# Test in Site Editor
# Change colors in Global Styles and verify templates update
```

---

## Phase 3: Medium Priority Enhancements

### Task 3.1: Add Comprehensive ARIA Attributes
**Priority:** MEDIUM
**Estimated Time:** 1.5 hours
**Impact:** Improves accessibility for screen readers

#### Subtask 3.1.1: Add ARIA to Navigation
- [ ] Open header template parts:
  - `parts/header.html`
  - `parts/vertical-header.html`
  - `parts/header-large-title.html`
- [ ] Add `aria-label` to navigation blocks
- [ ] Example: `<!-- wp:navigation {"ariaLabel":"<?php esc_attr_e( 'Main Navigation', 'renalinfolk' ); ?>"} /-->`

#### Subtask 3.1.2: Add ARIA to Search Forms
- [ ] Find all search blocks in templates and patterns
- [ ] Add `aria-label` to search inputs
- [ ] Add `aria-describedby` for search hints if present
- [ ] Files likely affected:
  - `templates/search.html` (if search form included)
  - `patterns/cta-heading-search.php`
  - Any patterns with search blocks

#### Subtask 3.1.3: Add ARIA to Form Inputs
- [ ] Review patterns with forms:
  - `patterns/cta-newsletter.php`
  - `patterns/footer-newsletter.html`
  - Contact forms in patterns
- [ ] Add `aria-label` to input fields
- [ ] Add `aria-required="true"` for required fields
- [ ] Add `aria-describedby` for field descriptions

#### Subtask 3.1.4: Add Role Attributes
- [ ] Add `role="main"` to main content areas in templates
- [ ] Add `role="complementary"` to sidebar
- [ ] Add `role="contentinfo"` to footer (if not already implied)
- [ ] Add `role="navigation"` to nav blocks (usually automatic)

**Files Modified:**
- 3 header template parts
- 1-2 templates (search.html)
- 5-10 pattern files with forms/search
- `parts/sidebar.html`
- 3 footer template parts

**Validation:**
```bash
# Count ARIA attributes after implementation
rg "aria-label|aria-describedby|aria-required|role=" . --type html | wc -l
# Should be significantly higher than 49 (current count)

# Test with screen reader
# Use NVDA (Windows) or VoiceOver (Mac) to navigate theme
# Verify all interactive elements are announced

# Run axe DevTools
# Install browser extension
# Scan homepage, single post, archive page
# Target: 0 critical/serious accessibility issues
```

---

### Task 3.2: Update Placeholder Links
**Priority:** MEDIUM
**Estimated Time:** 1 hour
**Impact:** Better user experience, clearer that links need updating

**Decision Required:** Choose approach:

**Option A: Use example.com (Recommended)**
- [ ] Replace `href="#"` with `href="https://example.com"`
- [ ] Add HTML comment above: `<!-- TODO: Replace with your URL -->`
- [ ] More semantic (actually goes somewhere)

**Option B: Keep # with better documentation**
- [ ] Keep `href="#"`
- [ ] Add HTML comment: `<!-- PLACEHOLDER: Replace # with your actual URL -->`
- [ ] Maintains current structure

**Files to Update (33 occurrences across 12 files):**
- [ ] `patterns/cta-book-locations.php` (8 instances)
- [ ] `patterns/event-schedule.php` (8 instances)
- [ ] `patterns/event-3-col.php` (3 instances)
- [ ] `patterns/hero-overlapped-book-cover-with-links.php` (5 instances)
- [ ] `patterns/footer.php` (multiple instances)
- [ ] `patterns/footer-centered.php`
- [ ] `patterns/footer-social.php`
- [ ] `patterns/footer-columns.php`
- [ ] `patterns/footer-newsletter.php`
- [ ] Plus 3 more pattern files

**Files Modified:**
- 12 pattern files

**Validation:**
```bash
# Count remaining href="#" after update
rg 'href="#"' patterns/ | wc -l

# If Option A chosen, verify example.com usage
rg 'href="https://example.com"' patterns/ | wc -l  # Should match old count

# Visual check: Open patterns in Site Editor and verify links
```

---

### Task 3.3: Remove or Relocate Reference File
**Priority:** MEDIUM
**Estimated Time:** 10 minutes
**Impact:** Cleaner theme structure, no external dependencies in reference

**Decision Required:** Choose one:

**Option A: Remove entirely (Recommended for production)**
- [ ] Delete `referances/Home.html`
- [ ] Delete `referances/` directory if empty

**Option B: Relocate to development folder**
- [ ] Create `.dev/` or `docs/references/` directory
- [ ] Move `referances/Home.html` to new location
- [ ] Add `.dev/` to `.gitignore` if not distributing

**Option C: Clean external references**
- [ ] Keep file but remove Google CDN links
- [ ] Replace Google image URLs with local placeholders
- [ ] Document as "design reference"

**Files Modified/Deleted:**
- `referances/Home.html` (delete or move)

**Validation:**
```bash
# If deleted:
ls referances/  # Should not exist or be empty

# If relocated:
ls .dev/references/Home.html  # Should exist

# Verify no external references in theme root
rg "googleapis.com|googleusercontent.com" . --type html --exclude-dir=.dev
```

---

### Task 3.4: Update Documentation Accuracy
**Priority:** MEDIUM
**Estimated Time:** 30 minutes
**Impact:** Developer clarity, accurate theme information

#### Subtask 3.4.1: Update Pattern Count
- [ ] Open `CLAUDE.md`
- [ ] Count actual patterns: `ls patterns/*.php | wc -l`
- [ ] Update all references from "98 patterns" to actual count
- [ ] Locations in CLAUDE.md:
  - Line 24: "Block Pattern Library: 98+ customizable patterns"
  - Line 98: "98 existing patterns (avoid duplicates)"
  - Line 96: "Updated 98 patterns with renalinfolk namespace" (readme.txt)

**Files Modified:**
- `CLAUDE.md` (multiple lines)
- `readme.txt` (line 96 in changelog)

#### Subtask 3.4.2: Clarify Archive Directory Documentation
- [ ] Verify `patterns/archive/` and `styles/archive/` existence
- [ ] If they don't exist, update CLAUDE.md to remove references
- [ ] Lines to check in CLAUDE.md:
  - Line 167: "NEVER modify archived patterns - Files in `patterns/archive/` are deprecated"
  - Line 30: "Archived/unused patterns (do not modify)"

**Decision:**
- If directories don't exist: Remove documentation references
- If directories should exist: Create them and document their purpose

**Files Modified:**
- `CLAUDE.md`

#### Subtask 3.4.3: Document Color Contrast Ratios
- [ ] Test all major color combinations with WebAIM Contrast Checker
- [ ] Document ratios in CLAUDE.md accessibility section
- [ ] Combinations to test:
  - Primary (#359EFF or #135bec) on white
  - CTA Yellow (#FFC300) on Footer Dark (#1C2541)
  - Green-Blue (#006D77) on white
  - Text Light (#4A4A4A) on white
  - Text Dark (#E0E0E0) on Background Dark (#0f1923)
- [ ] Verify all meet WCAG AA (4.5:1 for text, 3:1 for UI)

**Files Modified:**
- `CLAUDE.md` (accessibility section)

**Validation:**
```bash
# Verify pattern count accuracy
PATTERN_COUNT=$(ls patterns/*.php 2>/dev/null | wc -l)
rg "98|$PATTERN_COUNT" CLAUDE.md readme.txt

# Check documentation completeness
rg "TODO|FIXME|XXX" CLAUDE.md readme.txt

# Verify color contrast documentation
rg "contrast ratio|WCAG" CLAUDE.md
```

---

## Phase 4: Validation & Testing

### Task 4.1: Run All Validation Commands
**Priority:** CRITICAL
**Estimated Time:** 30 minutes
**Impact:** Ensures code quality and standards compliance

#### Subtask 4.1.1: Validate JSON Files
- [ ] Validate theme.json
  ```bash
  node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"
  ```
- [ ] Validate style variations
  ```bash
  node -e "JSON.parse(require('fs').readFileSync('styles/01-evening.json', 'utf8'))"
  node -e "JSON.parse(require('fs').readFileSync('styles/02-dark.json', 'utf8'))"
  ```
- [ ] All commands should return nothing (success)

#### Subtask 4.1.2: Validate PHP Syntax
- [ ] Validate functions.php
  ```bash
  php -l functions.php
  ```
- [ ] Validate all pattern files
  ```bash
  for file in patterns/*.php; do php -l "$file"; done
  ```
- [ ] All should return "No syntax errors detected"

#### Subtask 4.1.3: Validate OpenSpec
- [ ] Run OpenSpec validation
  ```bash
  openspec validate refactor-wordpress-best-practices --strict
  ```
- [ ] Resolve any validation errors
- [ ] Ensure all specs have scenarios

#### Subtask 4.1.4: Check for Regressions
- [ ] No `twentytwentyfive` prefix in code
  ```bash
  rg "twentytwentyfive" . --type php --type md
  # Should return: CLAUDE.md, readme.txt (documentation only)
  ```
- [ ] Text domain consistency
  ```bash
  rg "text domain|Text Domain" . | rg -v "renalinfolk"
  # Should return nothing
  ```
- [ ] No external CDN requests
  ```bash
  rg "fonts.googleapis.com|googleusercontent.com" . --type php --type html
  # Should return nothing (except .dev/ or docs/ if kept)
  ```

**Validation Results:**
- [ ] All JSON files valid
- [ ] All PHP files valid
- [ ] OpenSpec validation passed
- [ ] No regressions detected

---

### Task 4.2: Site Editor Testing
**Priority:** CRITICAL
**Estimated Time:** 30 minutes
**Impact:** Ensures theme works in WordPress editor

- [ ] Load WordPress admin dashboard
- [ ] Navigate to Appearance > Editor
- [ ] Verify no PHP errors or warnings
- [ ] Test template editing:
  - [ ] Edit index.html
  - [ ] Edit single.html (new)
  - [ ] Edit search.html (new)
  - [ ] Edit page-no-title.html (new)
- [ ] Test pattern insertion:
  - [ ] Open pattern inserter (+)
  - [ ] Verify all categories visible
  - [ ] Insert pattern from each category
  - [ ] Verify patterns render correctly
- [ ] Test Global Styles:
  - [ ] Open Styles panel
  - [ ] Change primary color
  - [ ] Verify templates update
  - [ ] Revert color change
- [ ] Save changes and preview

**Issues to Watch:**
- PHP warnings/errors in error log
- Patterns not appearing in inserter
- Colors not updating via Global Styles
- Templates causing layout breaks

---

### Task 4.3: Accessibility Testing
**Priority:** HIGH
**Estimated Time:** 45 minutes
**Impact:** Ensures WCAG AA compliance

#### Subtask 4.3.1: Automated Testing (axe DevTools)
- [ ] Install axe DevTools browser extension
- [ ] Test homepage
  - [ ] Run axe scan
  - [ ] Target: 0 critical issues, 0 serious issues
  - [ ] Document any warnings
- [ ] Test single post page
  - [ ] Run axe scan
  - [ ] Verify post content accessibility
- [ ] Test archive page
  - [ ] Run axe scan
  - [ ] Verify query loop accessibility
- [ ] Test search results
  - [ ] Run axe scan
  - [ ] Verify search form accessibility

#### Subtask 4.3.2: Keyboard Navigation Testing
- [ ] Test tab navigation through header
- [ ] Test tab navigation through main content
- [ ] Test tab navigation through footer
- [ ] Verify focus indicators visible (2px outline)
- [ ] Test skip-to-content link (if present)
- [ ] Test dropdown menus with keyboard

#### Subtask 4.3.3: Screen Reader Testing
- [ ] Test with NVDA (Windows) or VoiceOver (Mac)
- [ ] Verify page structure announced correctly
- [ ] Verify links have meaningful text
- [ ] Verify form inputs have labels
- [ ] Verify images have alt text
- [ ] Verify headings form logical hierarchy

**Acceptance Criteria:**
- [ ] axe DevTools: 0 critical/serious issues
- [ ] All interactive elements keyboard accessible
- [ ] All content screen reader accessible
- [ ] Lighthouse Accessibility score: 95+

---

### Task 4.4: Performance Testing
**Priority:** HIGH
**Estimated Time:** 30 minutes
**Impact:** Verifies performance improvements

#### Subtask 4.4.1: Lighthouse Audit
- [ ] Open Chrome DevTools > Lighthouse
- [ ] Test homepage
  - [ ] Run performance audit
  - [ ] Target: Performance >90
  - [ ] Target: Accessibility >95
  - [ ] Document First Contentful Paint time
- [ ] Test single post page
  - [ ] Run performance audit
  - [ ] Compare to baseline (if available)
- [ ] Test archive page
  - [ ] Run performance audit
  - [ ] Verify query loop performance

#### Subtask 4.4.2: Network Analysis
- [ ] Open Chrome DevTools > Network tab
- [ ] Reload homepage
- [ ] Verify:
  - [ ] No requests to fonts.googleapis.com
  - [ ] No requests to googleusercontent.com
  - [ ] Material Symbols font loads locally
  - [ ] Lexend font loads locally
  - [ ] Fira Code font loads locally
- [ ] Document total page load time
- [ ] Compare to pre-refactor baseline

#### Subtask 4.4.3: Theme Package Size
- [ ] Check theme directory size
  ```bash
  du -sh .
  ```
- [ ] Expected: 4-5MB (down from 6-8MB)
- [ ] Verify font directories: only 3 (lexend, fira-code, material-symbols)

**Performance Targets:**
- [ ] Lighthouse Performance: >90
- [ ] First Contentful Paint: <1.5s
- [ ] Zero external requests
- [ ] Theme package: <5MB

---

### Task 4.5: Cross-Browser Testing
**Priority:** MEDIUM
**Estimated Time:** 45 minutes
**Impact:** Ensures compatibility across browsers

#### Test Matrix
Test on: Chrome, Firefox, Safari, Edge

For each browser:
- [ ] Homepage renders correctly
- [ ] Fonts load correctly (Lexend, Fira Code, Material Symbols)
- [ ] Navigation gradient displays
- [ ] Rounded buttons render (9999px border-radius)
- [ ] Post card hover effects work
- [ ] Search input rounded borders display
- [ ] Color-mix() functions work or fallback gracefully

#### Browser-Specific Checks
- [ ] **Chrome:** Baseline - all features should work
- [ ] **Firefox:** Test color-mix() support (Firefox 88+)
- [ ] **Safari:** Test text-wrap: pretty (Safari 16.4+)
- [ ] **Edge:** Test overall compatibility (Chromium-based)

**Acceptance Criteria:**
- [ ] All core functionality works in all browsers
- [ ] Progressive enhancement features degrade gracefully
- [ ] No console errors in any browser

---

### Task 4.6: Responsive Testing
**Priority:** MEDIUM
**Estimated Time:** 30 minutes
**Impact:** Ensures mobile-friendly design

#### Test Breakpoints
- [ ] **Mobile (375px)** - iPhone SE
  - [ ] Navigation collapses appropriately
  - [ ] Text scales with fluid typography
  - [ ] Images responsive
  - [ ] Buttons touch-friendly
- [ ] **Tablet (768px)** - iPad
  - [ ] Two-column layouts render
  - [ ] Spacing adjusts with clamp()
  - [ ] Navigation adapts
- [ ] **Desktop (1440px)** - Standard desktop
  - [ ] Full layout displays
  - [ ] Wide width (1340px) respected
  - [ ] Navigation full width

#### Responsive Features to Verify
- [ ] Fluid typography (clamp() values)
- [ ] Responsive spacing (clamp() spacing scale)
- [ ] Image scaling
- [ ] Button sizing
- [ ] Navigation responsiveness

**Testing Tools:**
- Chrome DevTools Device Toolbar
- Firefox Responsive Design Mode
- Physical devices (if available)

**Acceptance Criteria:**
- [ ] Theme usable at all breakpoints
- [ ] No horizontal scrolling
- [ ] Touch targets minimum 44x44px on mobile

---

## Post-Implementation Checklist

### Final Validation
- [ ] All Phase 1 tasks completed ✓
- [ ] All Phase 2 tasks completed ✓
- [ ] All Phase 3 tasks completed ✓
- [ ] All Phase 4 tasks completed ✓
- [ ] All validation tests passed ✓
- [ ] No regressions introduced ✓

### Documentation Updates
- [ ] Update theme version in style.css to 2.1
- [ ] Update changelog in readme.txt
- [ ] Update CLAUDE.md with any architectural changes
- [ ] Document new templates in CLAUDE.md
- [ ] Update test results in documentation

### Code Quality
- [ ] No PHP errors or warnings
- [ ] No JavaScript console errors
- [ ] All JSON files valid
- [ ] All files use proper text domain
- [ ] All functions properly prefixed
- [ ] Code follows WordPress Coding Standards

### WordPress Theme Review Readiness
- [ ] Zero external dependencies ✓
- [ ] All template files present ✓
- [ ] Proper escaping/sanitization ✓
- [ ] Accessibility ready (WCAG AA) ✓
- [ ] GPL-compatible licensing ✓
- [ ] No security vulnerabilities ✓
- [ ] Theme review documentation updated ✓

### Deployment Preparation
- [ ] Create git commit with detailed message
- [ ] Tag release as v2.1
- [ ] Create theme ZIP file
- [ ] Test ZIP installation on fresh WordPress
- [ ] Prepare release notes
- [ ] Update WordPress.org listing (if applicable)

---

## Notes & Decisions Log

**Decision 1: Material Symbols Font**
- Date: [TBD]
- Decision: [Keep and self-host OR Remove entirely]
- Rationale: [To be filled during implementation]

**Decision 2: Primary Blue Color**
- Date: [TBD]
- Decision: [#359EFF OR #135bec]
- Rationale: [To be filled during implementation]
- WCAG Contrast Ratio: [To be tested]

**Decision 3: Pattern Placeholder Links**
- Date: [TBD]
- Decision: [Use example.com OR Keep # with comments]
- Rationale: [To be filled during implementation]

**Decision 4: renalinfolk_page Category**
- Date: [TBD]
- Decision: [Register new OR Rename to medical_pages]
- Rationale: [To be filled during implementation]

**Decision 5: Reference File**
- Date: [TBD]
- Decision: [Delete OR Relocate OR Clean]
- Rationale: [To be filled during implementation]

---

## Estimated Time Summary

- **Phase 1 (Critical):** 2.25 hours
- **Phase 2 (High Priority):** 2.5 hours
- **Phase 3 (Medium Priority):** 3.1 hours
- **Phase 4 (Validation):** 3.5 hours

**Total Estimated Time:** 11.35 hours (~1.5 work days)

---

## Success Criteria

All tasks must be completed and validated before marking this change as complete:

✅ **Critical Issues Fixed (3/3)**
- [ ] Material Symbols font self-hosted
- [ ] All core templates created
- [ ] Pattern categories registered

✅ **High Priority Issues Fixed (4/4)**
- [ ] Pattern categorization corrected
- [ ] Unused fonts removed
- [ ] Color documentation aligned
- [ ] Hardcoded colors replaced

✅ **Medium Priority Enhancements (4/4)**
- [ ] ARIA attributes comprehensive
- [ ] Placeholder links improved
- [ ] Reference file handled
- [ ] Documentation accurate

✅ **Validation Passing (6/6)**
- [ ] JSON validation passed
- [ ] PHP validation passed
- [ ] OpenSpec validation passed
- [ ] Site Editor test passed
- [ ] Accessibility test passed (95+ score)
- [ ] Performance test passed (90+ score)

✅ **Cross-Platform Testing (4/4)**
- [ ] Cross-browser tested (Chrome, Firefox, Safari, Edge)
- [ ] Responsive tested (Mobile, Tablet, Desktop)
- [ ] Keyboard navigation tested
- [ ] Screen reader tested

---

**Task List Status:** 🟡 Not Started

**Ready to Begin:** Pending proposal approval
