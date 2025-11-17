# Spec: Template System

## Overview

This spec defines requirements for completing the WordPress template hierarchy with missing core template files, ensuring proper template coverage for all content types.

---

## ADDED Requirements

### Requirement: Single Post Template

**ID:** TS-001
**Priority:** Critical
**Status:** New

The theme MUST provide a dedicated template for single post views instead of falling back to index.html.

**Rationale:**
- WordPress template hierarchy expects single.html for single post pages
- Allows specialized layout for article/blog content
- Enables better single-post-specific styling and metadata display
- Required for complete theme functionality

#### Scenario: Template File Exists

**Given** the theme follows WordPress block theme standards
**When** a user views a single post
**Then** a file named `single.html` MUST exist in the `templates/` directory
**And** the template MUST use WordPress block markup (not PHP)
**And** the template MUST follow WordPress serialized block comment syntax

#### Scenario: Template Structure for Single Posts

**Given** the single.html template is created
**When** the template is loaded
**Then** the template MUST include the following blocks in order:
  1. Template Part: header (via `<!-- wp:template-part {"slug":"header"} /-->`)
  2. Main content group with `role="main"` landmark
  3. Post Title block (h1 semantic heading)
  4. Post Featured Image block (if image is set)
  5. Post Date block with author metadata
  6. Post Content block (user-generated content)
  7. Post Terms blocks (categories and tags)
  8. Post Navigation block (previous/next links)
  9. Comments block (with comment form)
  10. Template Part: footer

**Minimum Valid Structure:**
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","metadata":{"name":"main"},"align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" role="main">

  <!-- wp:post-title {"level":1} /-->

  <!-- wp:post-featured-image /-->

  <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
  <div class="wp-block-group">
    <!-- wp:post-date /-->
    <!-- wp:post-author {"showAvatar":false} /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:post-content {"layout":{"type":"constrained"}} /-->

  <!-- wp:post-terms {"term":"category"} /-->
  <!-- wp:post-terms {"term":"post_tag"} /-->

  <!-- wp:post-navigation-link {"type":"previous"} /-->
  <!-- wp:post-navigation-link {"type":"next"} /-->

  <!-- wp:comments /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

#### Scenario: Template Renders Without Errors

**Given** the single.html template exists
**When** a user navigates to a single post URL
**Then** the template MUST render without PHP errors
**And** the template MUST render without JavaScript errors in browser console
**And** the WordPress Site Editor MUST load the template without warnings

---

### Requirement: Search Results Template

**ID:** TS-002
**Priority:** Critical
**Status:** New

The theme MUST provide a dedicated template for search results instead of falling back to index.html.

**Rationale:**
- Search results require different layout than homepage
- Needs search form for query refinement
- Requires "no results" messaging
- Better user experience for search functionality

#### Scenario: Template File Exists

**Given** the theme supports WordPress search functionality
**When** a user performs a search
**Then** a file named `search.html` MUST exist in the `templates/` directory
**And** the template MUST use WordPress block markup

#### Scenario: Template Structure for Search Results

**Given** the search.html template is created
**When** the template is loaded
**Then** the template MUST include:
  1. Template Part: header
  2. Main content group with `role="main"` landmark
  3. Query Title block (displays "Search results for: [term]")
  4. Search Form block (for query refinement)
  5. Query Loop block with:
     - Post Template (repeating structure)
     - Query No Results block with helpful message
  6. Query Pagination block
  7. Template Part: footer

**Minimum Valid Structure:**
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" role="main">

  <!-- wp:query-title {"type":"search","textAlign":"center"} /-->

  <!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'renalinfolk' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Search...', 'renalinfolk' ); ?>","buttonText":"<?php esc_attr_e( 'Search', 'renalinfolk' ); ?>"} /-->

  <!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
  <div class="wp-block-query">

    <!-- wp:post-template {"layout":{"type":"default"}} -->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-excerpt /-->
      <!-- wp:post-date /-->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
      <!-- wp:paragraph {"align":"center"} -->
      <p class="has-text-align-center"><?php esc_html_e( 'No results found. Try a different search term.', 'renalinfolk' ); ?></p>
      <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

  </div>
  <!-- /wp:query -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

#### Scenario: Search Form Accessibility

**Given** the search.html template includes a search form
**When** a screen reader user navigates the page
**Then** the search form MUST have an `aria-label` attribute
**And** the search button MUST have descriptive text
**And** the search input MUST be keyboard accessible

---

### Requirement: Page No Title Template

**ID:** TS-003
**Priority:** Critical
**Status:** New

The theme MUST provide a template for pages without title display, as registered in theme.json.

**Rationale:**
- theme.json declares "page-no-title" custom template (line 811)
- Template file must exist for registration to work
- Useful for landing pages, splash pages, custom layouts
- Prevents WordPress errors when template selected but missing

#### Scenario: Template File Exists and Registered

**Given** theme.json declares a custom template "page-no-title"
**When** the theme is activated
**Then** a file named `page-no-title.html` MUST exist in the `templates/` directory
**And** the template MUST be registered in theme.json under `customTemplates`
**And** the registration MUST specify `postTypes: ["page"]`

**theme.json Registration (already exists - verify):**
```json
{
  "customTemplates": [
    {
      "name": "page-no-title",
      "postTypes": ["page"],
      "title": "Page No Title"
    }
  ]
}
```

#### Scenario: Template Structure Without Title

**Given** the page-no-title.html template is created
**When** the template is loaded
**Then** the template MUST include:
  1. Template Part: header
  2. Main content group with `role="main"` landmark
  3. Post Content block ONLY (no post-title block)
  4. Template Part: footer
**And** the template MUST NOT include a Post Title block
**And** the template MUST NOT include post metadata blocks (date, author, etc.)

**Minimum Valid Structure:**
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" role="main">

  <!-- wp:post-content {"layout":{"type":"constrained"}} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

#### Scenario: Template Selectable in Page Editor

**Given** the page-no-title.html template exists and is registered
**When** a user edits a page in the WordPress editor
**Then** the template MUST appear in the Template dropdown
**And** selecting the template MUST hide the page title on frontend
**And** the page content MUST display without errors

---

## MODIFIED Requirements

### Requirement: Template Hierarchy Completeness

**ID:** TS-004
**Priority:** High
**Status:** Modified

The theme MUST provide complete template coverage for all standard WordPress content types.

**Changes:**
- **Before:** Missing single.html, search.html, page-no-title.html (fell back to index.html)
- **After:** All standard templates exist, proper template hierarchy followed

#### Scenario: Complete Template Inventory

**Given** the theme follows WordPress template hierarchy
**When** validating template completeness
**Then** the following template files MUST exist in `templates/` directory:
  - ✅ `index.html` (already exists - main fallback)
  - ✅ `home.html` (already exists - blog listing)
  - ✅ `archive.html` (already exists - category/tag archives)
  - ✅ `single.html` (NEW - single post view)
  - ✅ `page.html` (already exists - default page)
  - ✅ `page-about.html` (already exists - about page custom template)
  - ✅ `page-contact.html` (already exists - contact page custom template)
  - ✅ `page-no-title.html` (NEW - page without title)
  - ✅ `404.html` (already exists - error page)
  - ✅ `search.html` (NEW - search results)

**Total Template Count:** 10 templates

#### Scenario: Template Hierarchy Fallback Logic

**Given** all templates exist
**When** WordPress determines which template to use for a request
**Then** the template hierarchy MUST be respected:
  - Single post: single.html → index.html
  - Page: page-[slug].html → page-[id].html → page.html → index.html
  - Search: search.html → index.html
  - Archive: archive-[post-type].html → archive.html → index.html
  - 404: 404.html → index.html
**And** custom templates MUST only apply when explicitly selected by user

---

## Acceptance Criteria

**All requirements met when:**

1. ✅ **All three templates created:**
   ```bash
   ls templates/single.html templates/search.html templates/page-no-title.html
   # All three files exist
   ```

2. ✅ **Templates use valid block markup:**
   - All templates load in WordPress Site Editor without errors
   - All templates use `<!-- wp:block-name -->` syntax
   - No PHP template code (classic theme style) used

3. ✅ **Templates render correctly:**
   - Single post displays properly with metadata, content, comments
   - Search results show query, results loop, pagination
   - Page no title shows content without title block

4. ✅ **Template registration valid:**
   - page-no-title appears in Template dropdown for Pages
   - theme.json customTemplates registration matches file existence

5. ✅ **Accessibility standards met:**
   - All templates include `role="main"` landmark
   - Search form has aria-label
   - Heading hierarchy is logical (h1 for title, h2+ for sections)

6. ✅ **Template count verified:**
   ```bash
   ls templates/*.html | wc -l
   # Output: 10 (up from 7)
   ```

---

## Validation Tests

### Test 1: Template File Existence

```bash
# Verify all three new templates exist
test -f templates/single.html && echo "✅ single.html exists"
test -f templates/search.html && echo "✅ search.html exists"
test -f templates/page-no-title.html && echo "✅ page-no-title.html exists"
```

### Test 2: Block Markup Validity

**Manual Test:**
1. Open WordPress admin > Appearance > Editor
2. Navigate to Templates section
3. Open each new template (single, search, page-no-title)
4. Verify no errors in Code Editor view
5. Verify blocks render in visual editor

### Test 3: Template Rendering

**Manual Test:**
1. **Single Post:**
   - Navigate to any single blog post
   - Verify title, featured image, content, comments display
   - Verify prev/next navigation works

2. **Search Results:**
   - Use search form to search for a term
   - Verify search results display in list
   - Try search with no results - verify "no results" message
   - Test pagination if many results

3. **Page No Title:**
   - Create new page in WordPress
   - Select "Page No Title" template from Template dropdown
   - Add content to page
   - Publish and view frontend
   - Verify title does NOT appear, only content

### Test 4: Accessibility Validation

```bash
# Run axe DevTools on each template's frontend
# Target: 0 critical/serious accessibility issues

# Single Post Page
- Navigate to single post
- Run axe scan
- Verify <main> landmark exists
- Verify heading hierarchy (h1 → h2+)

# Search Results Page
- Perform search
- Run axe scan
- Verify search form has accessible label
- Verify results list is semantic

# Page No Title
- View page with template applied
- Run axe scan
- Verify <main> landmark exists
```

---

## Related Specs

- **Pattern Organization** (pattern-organization/spec.md) - Template parts usage
- **Accessibility** (accessibility/spec.md) - ARIA attributes, semantic HTML
- **Code Quality** (code-quality/spec.md) - Block markup standards

---

**Spec Version:** 1.0
**Last Updated:** 2025-11-17
**Status:** 🟢 READY FOR IMPLEMENTATION
