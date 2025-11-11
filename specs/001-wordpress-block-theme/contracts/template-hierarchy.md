# Contract: WordPress Template Hierarchy

**Feature Branch**: `001-wordpress-block-theme`
**Date**: 2025-11-11
**WordPress Version**: 6.7+

## Overview

This document defines the WordPress template hierarchy for the RenalInfoLK Web block theme, specifying how WordPress selects templates for different page types and how templates integrate with template parts and block patterns.

**Template Location**: `/templates/`
**File Format**: HTML files with WordPress block markup
**Template Parts Location**: `/parts/`

---

## 1. WordPress Template Hierarchy Flow

### 1.1 Template Selection Process

WordPress searches for templates in this order (highest priority first):

```
User Request → WordPress Query → Template Hierarchy Check → Template File Selection
```

**Selection Rules**:
1. WordPress identifies request type (single post, page, archive, etc.)
2. WordPress searches for most specific template first
3. If specific template not found, falls back to next most specific
4. If no matching template found, uses `index.html` (REQUIRED fallback)

### 1.2 Template Hierarchy Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                     WordPress Request                        │
└────────────────────────┬────────────────────────────────────┘
                         │
        ┌────────────────┼────────────────┐
        │                │                │
        ▼                ▼                ▼
    Homepage        Single Post         Page
        │                │                │
        ├─ front-page.html   ├─ single-{post-type}-{slug}.html    ├─ page-{slug}.html
        ├─ home.html         ├─ single-{post-type}.html           ├─ page-{id}.html
        └─ index.html        ├─ single.html                        ├─ page.html
                             └─ index.html                          └─ index.html

        ▼                ▼                ▼
    Archive         Search           404 Error
        │                │                │
        ├─ archive-{post-type}.html      ├─ search.html           ├─ 404.html
        ├─ archive.html                  └─ index.html            └─ index.html
        └─ index.html
```

---

## 2. RenalInfoLK Web Theme Templates

### 2.1 Template Inventory

| Template File | Purpose | Priority | Fallback |
|---------------|---------|----------|----------|
| `index.html` | Universal fallback | REQUIRED | None |
| `home.html` | Blog homepage | High | index.html |
| `single.html` | Individual post view | High | index.html |
| `page.html` | Static pages | High | index.html |
| `archive.html` | Category/tag/date archives | Medium | index.html |
| `search.html` | Search results | Medium | index.html |
| `404.html` | Page not found error | Medium | index.html |

**Total Templates**: 7 core templates

---

## 3. Template Specifications

### 3.1 index.html (Universal Fallback)

**Purpose**: Fallback template for all page types when no specific template exists

**Priority**: Lowest (used only when no other template matches)

**Required**: YES (WordPress will not function without this file)

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
  <!-- wp:query {"queryId":1,"query":{"perPage":10}} -->
  <div class="wp-block-query">
    <!-- wp:post-template -->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-date /-->
      <!-- wp:post-excerpt /-->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Query loop (displays posts)
- Post template (title, date, excerpt)
- Pagination controls
- Footer template part

**When Used**:
- No specific template matches request
- New custom post types without dedicated templates
- Edge cases and fallback scenarios

**Pattern Insertion**: None (generic layout)

---

### 3.2 home.html (Blog Homepage)

**Purpose**: Displays blog homepage with featured content and post listings

**Priority**: High (used for blog homepage)

**Fallback**: index.html

**WordPress Setting**: Settings → Reading → "Your homepage displays" → "A static page" → Posts page selection

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:pattern {"slug":"renalinfo-web/hero-primary"} /-->

<!-- wp:pattern {"slug":"renalinfo-web/cta-webinar"} /-->

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
  <!-- wp:heading {"level":2,"textAlign":"center"} -->
  Latest News & Updates
  <!-- /wp:heading -->

  <!-- wp:query {"queryId":2,"query":{"perPage":6}} -->
    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
      <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
      <!-- wp:post-date /-->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-excerpt {"moreText":"Read More →"} /-->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
  <!-- /wp:query -->
<!-- /wp:group -->

<!-- wp:pattern {"slug":"renalinfo-web/content-resources-grid"} /-->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Hero Primary pattern
- CTA Webinar pattern (announcement)
- Latest posts grid (3 columns)
- Resources Grid pattern
- Footer template part

**Pattern Insertion**:
- `renalinfo-web/hero-primary`: Homepage hero
- `renalinfo-web/cta-webinar`: Announcement banner
- `renalinfo-web/content-resources-grid`: Featured resources

**When Used**:
- User navigates to designated Posts page (set in Settings → Reading)
- Blog homepage displays recent posts

**Responsive Behavior**:
- Desktop (≥1024px): 3-column post grid
- Tablet (768px-1023px): 2-column post grid
- Mobile (<768px): 1-column post list

---

### 3.3 single.html (Individual Post View)

**Purpose**: Displays individual blog post with full content and metadata

**Priority**: High (used for all single posts)

**Fallback**: index.html

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
  <!-- wp:post-featured-image {"align":"wide"} /-->

  <!-- wp:post-title {"level":1} /-->

  <!-- wp:pattern {"slug":"renalinfo-web/hidden-post-meta"} /-->

  <!-- wp:post-content {"layout":{"type":"constrained"}} /-->

  <!-- wp:group {"className":"post-footer"} -->
    <!-- wp:post-terms {"term":"category"} /-->
    <!-- wp:post-terms {"term":"post_tag"} /-->
  <!-- /wp:group -->

  <!-- wp:separator /-->

  <!-- wp:post-navigation-link {"type":"previous"} /-->
  <!-- wp:post-navigation-link {"type":"next"} /-->

  <!-- wp:separator /-->

  <!-- wp:pattern {"slug":"renalinfo-web/cta-inline"} /-->

  <!-- wp:post-comments /-->
  <!-- wp:post-comments-form /-->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"sidebar","tagName":"aside"} /-->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Featured image (wide alignment)
- Post title (H1)
- Post metadata (date, author, categories)
- Post content (blocks added by editor)
- Category and tag lists
- Previous/Next post navigation
- Inline CTA pattern
- Comments section
- Comment form
- Sidebar template part (optional)
- Footer template part

**Pattern Insertion**:
- `renalinfo-web/hidden-post-meta`: Date, author, categories
- `renalinfo-web/cta-inline`: End-of-article CTA

**When Used**:
- User clicks blog post title or featured image
- Direct URL access to post permalink (e.g., `/understanding-kidney-disease/`)

**SEO Elements**:
- H1 heading (post title)
- Featured image with alt text
- Semantic `<article>` wrapper (generated by WordPress)
- Post date for recency
- Author for authorship
- Categories/tags for topical context

**Accessibility**:
- Proper heading hierarchy (H1 title, H2-H6 in content)
- Alt text on featured image
- Skip links for keyboard navigation
- ARIA landmarks (article, aside, footer)

---

### 3.4 page.html (Static Pages)

**Purpose**: Displays static pages (About, Contact, Services, etc.)

**Priority**: High (used for all pages)

**Fallback**: index.html

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
  <!-- wp:post-title {"level":1} /-->

  <!-- wp:post-content {"layout":{"type":"constrained"}} /-->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Page title (H1)
- Page content (blocks added by editor - FLEXIBLE)
- Footer template part

**Pattern Insertion**: User-controlled via Site Editor
- Editors insert patterns as needed (heroes, CTAs, content sections)
- No pre-defined patterns (maximum flexibility)

**When Used**:
- User navigates to static page (About, Contact, Services)
- Homepage (if set as static page in Settings → Reading)

**Flexibility**:
- Minimal structure by design
- Editors add patterns via pattern inserter
- Each page can have unique layout

**Example Page Layouts**:

**About Page**:
```
Header
Hero Simple pattern
Two-Column pattern (mission statement)
CTA Boxed pattern (join team)
Footer
```

**Contact Page**:
```
Header
Hero Simple pattern
Contact information (manual blocks)
Contact form (via plugin shortcode or pattern)
Footer
```

**Services Page**:
```
Header
Hero Primary pattern
Resources Grid pattern (service categories)
CTA Boxed pattern (schedule consultation)
Footer
```

---

### 3.5 archive.html (Category, Tag, Date Archives)

**Purpose**: Displays archive listings for categories, tags, and date-based archives

**Priority**: Medium (used for all archive types)

**Fallback**: index.html

**When Used**:
- Category archives: `/category/kidney-conditions/`
- Tag archives: `/tag/pediatric-nephrology/`
- Date archives: `/2025/01/` (year), `/2025/01/15/` (day)
- Author archives: `/author/dr-smith/`
- Custom post type archives (if added later)

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
  <!-- wp:query-title {"type":"archive","textAlign":"center"} /-->

  <!-- wp:term-description {"textAlign":"center"} /-->

  <!-- wp:separator /-->

  <!-- wp:query {"queryId":3,"query":{"perPage":12}} -->
  <div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
      <!-- wp:group {"className":"archive-card"} -->
        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

        <!-- wp:group {"className":"card-content"} -->
          <!-- wp:post-date {"fontSize":"small"} /-->

          <!-- wp:post-title {"isLink":true,"level":3} /-->

          <!-- wp:post-excerpt {"moreText":"Read More →","excerptLength":20} /-->

          <!-- wp:post-terms {"term":"category","separator":" • "} /-->
        <!-- /wp:group -->
      <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
      <!-- wp:paragraph {"align":"center"} -->
      No posts found in this category. Try browsing other categories or use the search form.
      <!-- /wp:paragraph -->

      <!-- wp:pattern {"slug":"renalinfo-web/hidden-search-form"} /-->
    <!-- /wp:query-no-results -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Archive title (auto-generated: "Category: Kidney Conditions")
- Term description (if added in category/tag settings)
- Post grid (3 columns, 12 posts per page)
- Post cards with:
  - Featured image (16:9 aspect ratio)
  - Date (small font)
  - Post title (H3, linked)
  - Excerpt (20 words, "Read More →" link)
  - Category tags (separated by bullets)
- No results message (if no posts found)
- Search form (if no posts found)
- Pagination controls (previous, numbers, next)
- Footer template part

**Pattern Insertion**:
- `renalinfo-web/hidden-search-form`: Zero results state

**Responsive Grid Behavior**:
- Desktop (≥1024px): 3 columns, 300px min card width
- Tablet (768px-1023px): 2 columns
- Mobile (<768px): 1 column

**CSS Grid Implementation** (from theme.json):
```json
{
  "styles": {
    "blocks": {
      "core/post-template": {
        "spacing": {
          "blockGap": "2rem"
        },
        "css": "grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));"
      }
    }
  }
}
```

**SEO Elements**:
- H1 archive title (e.g., "Category: Kidney Conditions")
- Category/tag description (meta description source)
- Semantic `<main>` wrapper
- Pagination with proper prev/next links

---

### 3.6 search.html (Search Results)

**Purpose**: Displays search results with query term and result count

**Priority**: Medium (used for search results)

**Fallback**: index.html

**When Used**:
- User submits search form
- URL parameter: `?s={query}`

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
  <!-- wp:query-title {"type":"search","textAlign":"center","level":1} /-->
  <!-- Displays: "Search results for: [query]" -->

  <!-- wp:separator /-->

  <!-- wp:query {"queryId":4,"query":{"perPage":10,"search":true}} -->
  <div class="wp-block-query">
    <!-- wp:post-template -->
      <!-- wp:group {"className":"search-result"} -->
        <!-- wp:post-title {"isLink":true,"level":2} /-->

        <!-- wp:group {"className":"search-meta"} -->
          <!-- wp:post-date /-->
          <!-- wp:post-terms {"term":"category","separator":" • "} /-->
        <!-- /wp:group -->

        <!-- wp:post-excerpt {"moreText":"Read More →","excerptLength":40} /-->

        <!-- wp:separator {"className":"result-divider"} /-->
      <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-no-results -->
      <!-- wp:heading {"level":2,"textAlign":"center"} -->
      No results found
      <!-- /wp:heading -->

      <!-- wp:paragraph {"align":"center"} -->
      Sorry, no content matched your search criteria. Try different keywords or browse our categories below.
      <!-- /wp:paragraph -->

      <!-- wp:pattern {"slug":"renalinfo-web/hidden-search-form"} /-->

      <!-- wp:heading {"level":3} -->
      Browse by Category
      <!-- /wp:heading -->

      <!-- wp:categories {"showHierarchy":true} /-->
    <!-- /wp:query-no-results -->

    <!-- wp:query-pagination -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Search query title (H1: "Search results for: [query]")
- Result list (10 per page):
  - Post title (H2, linked)
  - Date and category metadata
  - Excerpt (40 words)
  - Separator between results
- Zero results state:
  - "No results found" heading
  - Helpful message with search tips
  - Search form (try again)
  - Category list (browse instead)
- Pagination controls
- Footer template part

**Pattern Insertion**:
- `renalinfo-web/hidden-search-form`: Zero results state

**Search Behavior**:
- WordPress native search (no plugin required)
- Searches post titles and content
- Searches page titles and content
- Does NOT search custom fields by default
- Case-insensitive matching
- Partial word matching

**Search Enhancements** (optional, via plugins):
- Relevance ranking (Relevanssi plugin)
- Custom field search (SearchWP plugin)
- Fuzzy matching (Jetpack Search)
- Filters by category/date (FacetWP plugin)

**SEO Elements**:
- H1 search query title
- Result count in title
- Proper heading hierarchy (H1 → H2 for results)
- Pagination with rel="prev/next"

---

### 3.7 404.html (Page Not Found Error)

**Purpose**: Displays helpful error page when URL not found

**Priority**: Medium (used for 404 errors)

**Fallback**: index.html

**When Used**:
- User navigates to non-existent URL
- Broken link clicked
- Deleted page accessed

**Structure**:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
  <!-- wp:spacer {"height":"80px"} /-->

  <!-- wp:heading {"level":1,"textAlign":"center","fontSize":"xxx-large"} -->
  404
  <!-- /wp:heading -->

  <!-- wp:heading {"level":2,"textAlign":"center"} -->
  Page Not Found
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
  The page you're looking for doesn't exist or has been moved.
  <!-- /wp:paragraph -->

  <!-- wp:separator /-->

  <!-- wp:heading {"level":3,"textAlign":"center"} -->
  Try Searching
  <!-- /wp:heading -->

  <!-- wp:pattern {"slug":"renalinfo-web/hidden-search-form"} /-->

  <!-- wp:separator /-->

  <!-- wp:heading {"level":3,"textAlign":"center"} -->
  Or Browse Our Content
  <!-- /wp:heading -->

  <!-- wp:columns -->
    <!-- wp:column -->
      <!-- wp:heading {"level":4} -->
      Quick Links
      <!-- /wp:heading -->

      <!-- wp:list -->
        <li><a href="/">Home</a></li>
        <li><a href="/about/">About Us</a></li>
        <li><a href="/services/">Services</a></li>
        <li><a href="/resources/">Resources</a></li>
        <li><a href="/blog/">Blog</a></li>
        <li><a href="/contact/">Contact</a></li>
      <!-- /wp:list -->
    <!-- /wp:column -->

    <!-- wp:column -->
      <!-- wp:heading {"level":4} -->
      Browse by Category
      <!-- /wp:heading -->

      <!-- wp:categories {"showHierarchy":true,"showPostCounts":true} /-->
    <!-- /wp:column -->

    <!-- wp:column -->
      <!-- wp:heading {"level":4} -->
      Recent Posts
      <!-- /wp:heading -->

      <!-- wp:latest-posts {"postsToShow":5,"displayPostDate":true,"excerptLength":15} /-->
    <!-- /wp:column -->
  <!-- /wp:columns -->

  <!-- wp:spacer {"height":"80px"} /-->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Content Blocks**:
- Header template part
- Large "404" heading (H1, extra-large size)
- "Page Not Found" subheading (H2)
- Explanatory message
- Search form (try searching)
- Three-column navigation:
  - Quick Links (main pages)
  - Browse by Category (category list)
  - Recent Posts (5 latest posts with dates)
- Footer template part

**Pattern Insertion**:
- `renalinfo-web/hidden-search-form`: Help users find content

**Best Practices**:
- Friendly, helpful tone (not technical error message)
- Multiple navigation options (search, links, categories, recent posts)
- Avoid "Error" or technical jargon
- Maintain site branding and navigation (header/footer)
- Log 404 errors for fixing broken links (via plugin)

**SEO Considerations**:
- HTTP 404 status code (automatic)
- No meta robots "noindex" tag (404 pages should be indexed sparingly)
- Internal links to help search engines discover valid pages
- Monitor 404 errors in Google Search Console

---

## 4. Template Parts

### 4.1 parts/header.html

**Purpose**: Site header with logo, navigation, search, dark mode toggle

**Area**: header

**Registered in theme.json**:
```json
{
  "templateParts": [
    {
      "name": "header",
      "title": "Header",
      "area": "header"
    }
  ]
}
```

**Usage**: Included in all templates via:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->
```

**Pattern Reference**: Uses `renalinfo-web/header-primary` pattern

**Sticky Behavior**: CSS `position: sticky` for header scroll persistence

**Responsive Behavior**:
- Desktop (≥768px): Full horizontal navigation
- Mobile (<768px): Logo + hamburger icon, slide-in drawer menu

---

### 4.2 parts/footer.html

**Purpose**: Site footer with links, contact info, copyright

**Area**: footer

**Registered in theme.json**:
```json
{
  "templateParts": [
    {
      "name": "footer",
      "title": "Footer",
      "area": "footer"
    }
  ]
}
```

**Usage**: Included in all templates via:
```html
<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Pattern Reference**: Uses `renalinfo-web/footer-primary` pattern

**Responsive Behavior**:
- Desktop (≥1024px): 4-column layout
- Tablet (768px-1023px): 2-column layout
- Mobile (<768px): 1-column stacked layout

---

### 4.3 parts/sidebar.html

**Purpose**: Optional sidebar for blog posts (widgets or blocks)

**Area**: uncategorized

**Registered in theme.json**:
```json
{
  "templateParts": [
    {
      "name": "sidebar",
      "title": "Sidebar",
      "area": "uncategorized"
    }
  ]
}
```

**Usage**: Optionally included in `single.html` template:
```html
<!-- wp:template-part {"slug":"sidebar","tagName":"aside"} /-->
```

**Content**:
- Recent posts widget
- Categories widget
- Tag cloud widget
- Search form
- Custom call-to-action

**Responsive Behavior**:
- Desktop (≥1024px): Right sidebar, 30% width
- Tablet/Mobile (<1024px): Sidebar moves below content (full width)

---

## 5. Template Customization

### 5.1 Editing Templates in Site Editor

1. Go to **Appearance → Editor**
2. Click **Templates** in sidebar
3. Select template to edit (e.g., "Single Post")
4. Edit blocks directly in visual editor
5. Click **Save** to update template

**Changes Apply To**:
- All pages using that template
- Future content created with that template

### 5.2 Creating Custom Templates

1. In Site Editor, click **Templates**
2. Click **Add New Template**
3. Choose template type (e.g., "Page")
4. Name template (e.g., "Landing Page")
5. Design template using blocks and patterns
6. Save template

**Assigning Custom Templates**:
- Edit page → Page Settings (sidebar) → Template dropdown
- Select custom template from list

### 5.3 Resetting Templates

1. In Site Editor, click **Templates**
2. Hover over template → Click **⋮** (three dots)
3. Select **Clear customizations**
4. Confirm reset to theme default

---

## 6. Template Hierarchy Reference Tables

### 6.1 Post Type Templates

| Request Type | Template Hierarchy (Priority Order) | RenalInfoLK Web |
|--------------|-------------------------------------|-----------------|
| Homepage (static) | front-page.html → page.html → index.html | page.html |
| Homepage (blog) | home.html → index.html | home.html |
| Single Post | single-post-{slug}.html → single-post.html → single.html → index.html | single.html |
| Page | page-{slug}.html → page-{id}.html → page.html → index.html | page.html |
| Attachment | attachment-{mime-type}.html → attachment.html → single.html → index.html | single.html |

### 6.2 Archive Templates

| Archive Type | Template Hierarchy | RenalInfoLK Web |
|--------------|-------------------|-----------------|
| Category | archive-category-{slug}.html → archive-category.html → archive.html → index.html | archive.html |
| Tag | archive-tag-{slug}.html → archive-tag.html → archive.html → index.html | archive.html |
| Date | archive-date.html → archive.html → index.html | archive.html |
| Author | archive-author-{nicename}.html → archive-author.html → archive.html → index.html | archive.html |
| Custom Post Type | archive-{post-type}.html → archive.html → index.html | archive.html |

### 6.3 Special Templates

| Request Type | Template Hierarchy | RenalInfoLK Web |
|--------------|-------------------|-----------------|
| Search Results | search.html → index.html | search.html |
| 404 Not Found | 404.html → index.html | 404.html |

---

## 7. Template Part Inclusion Matrix

| Template | Header | Footer | Sidebar |
|----------|--------|--------|---------|
| index.html | ✓ | ✓ | |
| home.html | ✓ | ✓ | |
| single.html | ✓ | ✓ | ✓ (optional) |
| page.html | ✓ | ✓ | |
| archive.html | ✓ | ✓ | |
| search.html | ✓ | ✓ | |
| 404.html | ✓ | ✓ | |

---

## 8. Template Block Usage

### Common Blocks Across Templates

**Navigation & Structure**:
- `core/template-part`: Include header/footer
- `core/group`: Section containers
- `core/columns`: Multi-column layouts
- `core/spacer`: Vertical spacing

**Content Display**:
- `core/post-title`: Display post/page title
- `core/post-content`: Display post/page content
- `core/post-featured-image`: Display featured image
- `core/post-date`: Display publication date
- `core/post-author`: Display author name
- `core/post-excerpt`: Display excerpt

**Lists & Archives**:
- `core/query`: Define post query
- `core/post-template`: Display post loop
- `core/query-pagination`: Pagination controls
- `core/query-title`: Archive/search title
- `core/term-description`: Category/tag description

**Interactivity**:
- `core/search`: Search form
- `core/post-comments`: Comments list
- `core/post-comments-form`: Comment submission form
- `core/post-navigation-link`: Previous/next post links

**Widgets**:
- `core/categories`: Category list
- `core/latest-posts`: Recent posts widget
- `core/tag-cloud`: Tag cloud widget

---

## 9. SEO & Semantic HTML

### 9.1 Semantic Elements

WordPress automatically wraps blocks in semantic HTML5 elements:

| Block | HTML Element | Purpose |
|-------|-------------|---------|
| Template Part (header) | `<header>` | Site header landmark |
| Template Part (footer) | `<footer>` | Site footer landmark |
| Template Part (sidebar) | `<aside>` | Complementary content |
| Post Content Area | `<main>` | Primary page content |
| Post Template | `<article>` | Individual post |
| Navigation | `<nav>` | Navigation landmark |

### 9.2 Heading Hierarchy

**Critical Rule**: Each template MUST have one H1 heading only

| Template | H1 Source | Block |
|----------|-----------|-------|
| home.html | Hero heading | Manual heading in pattern |
| single.html | Post title | `core/post-title {"level":1}` |
| page.html | Page title | `core/post-title {"level":1}` |
| archive.html | Archive title | `core/query-title {"level":1}` |
| search.html | Search title | `core/query-title {"level":1}` |
| 404.html | "404" or "Page Not Found" | Manual `core/heading {"level":1}` |

**Subheading Hierarchy**:
- H1: Page/post title (one per page)
- H2: Major sections (multiple allowed)
- H3: Subsections within H2 sections
- H4-H6: Further nested subheadings

---

## 10. Validation Checklist

Before deploying templates, verify:

- [ ] All templates exist in `/templates/` directory
- [ ] `index.html` exists (REQUIRED)
- [ ] All templates use valid WordPress block markup
- [ ] All template files are UTF-8 encoded (no BOM)
- [ ] Header and footer template parts included in all templates
- [ ] Each template has exactly one H1 heading
- [ ] Pattern slugs match registered patterns
- [ ] Template parts registered in theme.json
- [ ] Custom templates registered in theme.json (if applicable)
- [ ] All templates tested in Site Editor (no errors)
- [ ] Responsive behavior verified (320px-1920px viewports)
- [ ] SEO elements present (title, headings, meta)
- [ ] Accessibility requirements met (ARIA, semantic HTML)

---

**End of Template Hierarchy Contract**

This contract defines the complete template structure for the RenalInfoLK Web WordPress block theme, ensuring proper implementation of the WordPress template hierarchy and consistent integration of template parts and block patterns.
