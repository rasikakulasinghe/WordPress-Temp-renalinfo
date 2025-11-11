# Contract: Block Pattern Specifications

**Feature Branch**: `001-wordpress-block-theme`
**Date**: 2025-11-11
**Total Patterns**: 15

## Overview

This document defines the structure, properties, and usage for all 15 block patterns in the RenalInfoLK Web WordPress block theme. Each pattern is a reusable pre-designed layout composed of WordPress core blocks.

**Pattern File Location**: `/patterns/`
**File Format**: PHP files with WordPress block markup
**Naming Convention**: `{category}-{descriptor}.php` (kebab-case)

---

## 1. Pattern Registration Structure

### 1.1 Pattern File Header

All pattern files MUST include this header structure:

```php
<?php
/**
 * Title: Pattern Display Name
 * Slug: renalinfo-web/pattern-slug
 * Categories: category-name
 * Keywords: keyword1, keyword2, keyword3
 * Block Types: core/group, core/heading
 * Viewport Width: 1440
 * Inserter: yes/no
 */
?>
```

**Header Properties**:
- `Title`: Human-readable name displayed in pattern inserter
- `Slug`: Unique identifier (format: `theme-slug/pattern-name`)
- `Categories`: Comma-separated category slugs (registered in functions.php)
- `Keywords`: Search terms for pattern discovery
- `Block Types`: Core blocks used (helps WordPress suggest relevant patterns)
- `Viewport Width`: Preview width in pattern inserter (1440px for desktop, 360px for mobile-specific)
- `Inserter`: Set to `no` for hidden patterns (reusable components)

### 1.2 Pattern Content Structure

```php
<!-- wp:group {"align":"full","className":"pattern-class-name"} -->
<div class="wp-block-group alignfull pattern-class-name">
  <!-- Inner blocks here -->
</div>
<!-- /wp:group -->
```

**Best Practices**:
- Wrap pattern in `<!-- wp:group -->` for consistent spacing
- Use `"align":"full"` for full-width patterns
- Add custom `className` for pattern-specific styling
- Use semantic block nesting (max 3-4 levels deep)

---

## 2. Pattern Categories

### 2.1 Custom Category Registration

Categories registered in `functions.php`:

```php
function renalinfo_web_register_pattern_categories() {
  register_block_pattern_category(
    'renalinfo-web-heroes',
    array(
      'label' => __('Heroes', 'renalinfo-web'),
      'description' => __('Large hero sections for page headers', 'renalinfo-web')
    )
  );

  register_block_pattern_category(
    'renalinfo-web-cta',
    array(
      'label' => __('Call to Action', 'renalinfo-web'),
      'description' => __('Promotional banners and call-to-action blocks', 'renalinfo-web')
    )
  );

  register_block_pattern_category(
    'renalinfo-web-content',
    array(
      'label' => __('Content Sections', 'renalinfo-web'),
      'description' => __('Pre-designed content layouts with grids and columns', 'renalinfo-web')
    )
  );

  register_block_pattern_category(
    'renalinfo-web-headers',
    array(
      'label' => __('Headers', 'renalinfo-web'),
      'description' => __('Site header variations', 'renalinfo-web')
    )
  );

  register_block_pattern_category(
    'renalinfo-web-footers',
    array(
      'label' => __('Footers', 'renalinfo-web'),
      'description' => __('Site footer variations', 'renalinfo-web')
    )
  );
}
add_action('init', 'renalinfo_web_register_pattern_categories');
```

---

## 3. Hero Patterns (3 patterns)

### 3.1 Hero Primary

**File**: `patterns/hero-primary.php`

**Purpose**: Main homepage hero section with two-column layout, text content, and illustration image

**Structure**:
```php
/**
 * Title: Hero Primary
 * Slug: renalinfo-web/hero-primary
 * Categories: renalinfo-web-heroes
 * Keywords: hero, header, banner, homepage, illustration
 * Block Types: core/group, core/columns
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"full","backgroundColor":"secondary"} -->
  <!-- wp:columns {"verticalAlignment":"center"} -->
    <!-- wp:column (left - text content) -->
      <!-- wp:heading {"level":1} -->
      <!-- wp:paragraph -->
      <!-- wp:buttons -->
        <!-- wp:button (CTA Yellow) -->
        <!-- wp:button (Outline) -->
    <!-- wp:column (right - illustration) -->
      <!-- wp:image (hero illustration) -->
  <!-- /wp:columns -->
<!-- /wp:group -->
```

**Props**:
- H1 Heading (editable text)
- Paragraph description (editable text)
- Primary CTA button (text + link)
- Secondary CTA button (text + link)
- Hero illustration image (replaceable)
- Background color: Secondary (#BDE0FE)

**Blocks Used**:
- `core/group` (container)
- `core/columns` (2-column layout)
- `core/column` (left/right columns)
- `core/heading` (H1)
- `core/paragraph` (description)
- `core/buttons` (button group)
- `core/button` (individual buttons)
- `core/image` (hero illustration)

**Usage**: Homepage top section, landing pages

**Responsive Behavior**:
- Desktop (≥1024px): Two-column layout, 50/50 split
- Tablet (768px-1023px): Two-column layout, 40/60 split
- Mobile (<768px): Stack columns vertically, text on top

---

### 3.2 Hero Simple

**File**: `patterns/hero-simple.php`

**Purpose**: Text-only hero section with centered content (no image)

**Structure**:
```php
/**
 * Title: Hero Simple
 * Slug: renalinfo-web/hero-simple
 * Categories: renalinfo-web-heroes
 * Keywords: hero, simple, text, centered
 * Block Types: core/group
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"full","backgroundColor":"background-light"} -->
  <!-- wp:heading {"level":1,"textAlign":"center"} -->
  <!-- wp:paragraph {"align":"center"} -->
  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:button -->
<!-- /wp:group -->
```

**Props**:
- H1 Heading (editable, centered)
- Paragraph description (editable, centered)
- Single CTA button (text + link)
- Background color: Background Light (#f5f7f8)

**Blocks Used**:
- `core/group`
- `core/heading`
- `core/paragraph`
- `core/buttons`
- `core/button`

**Usage**: About page, Contact page, static page headers

**Responsive Behavior**: Fully responsive (centered text scales naturally)

---

### 3.3 Hero Centered

**File**: `patterns/hero-centered.php`

**Purpose**: Centered hero with large heading, short description, and dual CTA buttons

**Structure**:
```php
/**
 * Title: Hero Centered
 * Slug: renalinfo-web/hero-centered
 * Categories: renalinfo-web-heroes
 * Keywords: hero, centered, large, cta
 * Block Types: core/group
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"full","backgroundColor":"secondary"} -->
  <!-- wp:spacer {"height":"60px"} -->
  <!-- wp:heading {"level":1,"textAlign":"center","fontSize":"xxx-large"} -->
  <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:button (Primary CTA) -->
    <!-- wp:button (Secondary CTA) -->
  <!-- wp:spacer {"height":"60px"} -->
<!-- /wp:group -->
```

**Props**:
- H1 Heading (extra-large size, centered)
- Paragraph description (large size, centered)
- Two CTA buttons (text + links)
- Vertical spacers (60px top/bottom)
- Background color: Secondary (#BDE0FE)

**Blocks Used**:
- `core/group`
- `core/spacer`
- `core/heading`
- `core/paragraph`
- `core/buttons`
- `core/button` (×2)

**Usage**: Service landing pages, campaign pages

**Responsive Behavior**: Text scales fluidly, buttons stack vertically on mobile

---

## 4. Call-to-Action Patterns (3 patterns)

### 4.1 CTA Webinar

**File**: `patterns/cta-webinar.php`

**Purpose**: Announcement banner for webinars, events, or urgent updates

**Structure**:
```php
/**
 * Title: CTA Webinar Announcement
 * Slug: renalinfo-web/cta-webinar
 * Categories: renalinfo-web-cta
 * Keywords: webinar, announcement, banner, event
 * Block Types: core/group
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"full","backgroundColor":"accent"} -->
  <!-- wp:columns {"verticalAlignment":"center"} -->
    <!-- wp:column {"width":"10%"} -->
      <!-- wp:html (Material Symbol: campaign icon) -->
    <!-- wp:column {"width":"70%"} -->
      <!-- wp:heading {"level":3} -->
      <!-- wp:paragraph (date/time info) -->
    <!-- wp:column {"width":"20%"} -->
      <!-- wp:buttons -->
        <!-- wp:button -->
<!-- /wp:group -->
```

**Props**:
- Campaign icon (inline SVG, Material Symbol)
- H3 Heading (event title)
- Paragraph (date, time, or description)
- CTA button (text + registration link)
- Background color: Accent (#FFD28E)

**Blocks Used**:
- `core/group`
- `core/columns`
- `core/column` (×3, custom widths)
- `core/html` (inline SVG icon)
- `core/heading`
- `core/paragraph`
- `core/buttons`
- `core/button`

**Usage**: Homepage announcement section, event promotion

**Responsive Behavior**: Columns stack vertically on mobile, icon remains on left

---

### 4.2 CTA Boxed

**File**: `patterns/cta-boxed.php`

**Purpose**: Boxed call-to-action section with colored background and centered content

**Structure**:
```php
/**
 * Title: CTA Boxed
 * Slug: renalinfo-web/cta-boxed
 * Categories: renalinfo-web-cta
 * Keywords: cta, boxed, button, action
 * Block Types: core/group
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"wide","backgroundColor":"primary","textColor":"white"} -->
  <!-- wp:heading {"level":2,"textAlign":"center","textColor":"white"} -->
  <!-- wp:paragraph {"align":"center","textColor":"white"} -->
  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:button {"backgroundColor":"cta-yellow"} -->
<!-- /wp:group -->
```

**Props**:
- H2 Heading (editable, white text)
- Paragraph description (editable, white text)
- CTA button (yellow, text + link)
- Background color: Primary (#359EFF)
- Text color: White

**Blocks Used**:
- `core/group`
- `core/heading`
- `core/paragraph`
- `core/buttons`
- `core/button`

**Usage**: Mid-page call-to-action, newsletter signup, appointment request

**Responsive Behavior**: Full-width container scales, text remains centered

---

### 4.3 CTA Inline

**File**: `patterns/cta-inline.php`

**Purpose**: Minimal inline call-to-action for blog posts or content sections

**Structure**:
```php
/**
 * Title: CTA Inline
 * Slug: renalinfo-web/cta-inline
 * Categories: renalinfo-web-cta
 * Keywords: cta, inline, minimal, simple
 * Block Types: core/group
 * Viewport Width: 1440
 */

<!-- wp:group {"backgroundColor":"background-light"} -->
  <!-- wp:heading {"level":3} -->
  <!-- wp:paragraph -->
  <!-- wp:buttons -->
    <!-- wp:button -->
<!-- /wp:group -->
```

**Props**:
- H3 Heading (editable)
- Paragraph description (editable)
- CTA button (text + link)
- Background color: Background Light (#f5f7f8)

**Blocks Used**:
- `core/group`
- `core/heading`
- `core/paragraph`
- `core/buttons`
- `core/button`

**Usage**: End of blog posts, sidebar CTAs, related content sections

**Responsive Behavior**: Constrained to content width, fully responsive

---

## 5. Content Section Patterns (3 patterns)

### 5.1 Content Resources Grid

**File**: `patterns/content-resources-grid.php`

**Purpose**: Three-column grid showcasing resource types (Articles, Videos, Posters)

**Structure**:
```php
/**
 * Title: Resources Grid
 * Slug: renalinfo-web/content-resources-grid
 * Categories: renalinfo-web-content
 * Keywords: resources, grid, three-column, icons
 * Block Types: core/columns
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"full"} -->
  <!-- wp:heading {"level":2,"textAlign":"center"} -->
  <!-- wp:columns -->
    <!-- wp:column (Articles) -->
      <!-- wp:html (Material Symbol: article icon) -->
      <!-- wp:heading {"level":3,"textAlign":"center"} -->
      <!-- wp:paragraph {"align":"center"} -->
      <!-- wp:buttons {"layout":{"justifyContent":"center"}} -->
        <!-- wp:button {"className":"is-style-outline"} -->
    <!-- wp:column (Videos) -->
      <!-- wp:html (Material Symbol: play_circle icon) -->
      <!-- wp:heading {"level":3,"textAlign":"center"} -->
      <!-- wp:paragraph {"align":"center"} -->
      <!-- wp:buttons {"layout":{"justifyContent":"center"}} -->
        <!-- wp:button {"className":"is-style-outline"} -->
    <!-- wp:column (Posters) -->
      <!-- wp:html (Material Symbol: image icon) -->
      <!-- wp:heading {"level":3,"textAlign":"center"} -->
      <!-- wp:paragraph {"align":"center"} -->
      <!-- wp:buttons {"layout":{"justifyContent":"center"}} -->
        <!-- wp:button {"className":"is-style-outline"} -->
<!-- /wp:group -->
```

**Props**:
- Section H2 heading (editable)
- 3 columns with icons (inline SVG Material Symbols)
- 3 H3 headings (resource types)
- 3 descriptions (editable paragraphs)
- 3 CTA buttons (outline style, links)

**Blocks Used**:
- `core/group`
- `core/heading` (×4: 1 H2, 3 H3)
- `core/columns`
- `core/column` (×3)
- `core/html` (×3 for inline SVG icons)
- `core/paragraph` (×3)
- `core/buttons` (×3)
- `core/button` (×3, outline style)

**Usage**: Homepage resources section, resource landing page

**Responsive Behavior**:
- Desktop (≥1024px): 3 columns
- Tablet (768px-1023px): 2 columns, 3rd wraps below
- Mobile (<768px): 1 column, stacked vertically

---

### 5.2 Content News Grid

**File**: `patterns/content-news-grid.php`

**Purpose**: Three-column grid for latest news/blog posts with featured images

**Structure**:
```php
/**
 * Title: News Grid
 * Slug: renalinfo-web/content-news-grid
 * Categories: renalinfo-web-content
 * Keywords: news, blog, grid, three-column, images
 * Block Types: core/columns
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"full"} -->
  <!-- wp:heading {"level":2,"textAlign":"center"} -->
  <!-- wp:columns -->
    <!-- wp:column (News Item 1) -->
      <!-- wp:image {"aspectRatio":"16/9"} -->
      <!-- wp:paragraph {"fontSize":"small"} (Date) -->
      <!-- wp:heading {"level":3} -->
      <!-- wp:paragraph (Excerpt) -->
      <!-- wp:paragraph (Read More link with arrow icon) -->
    <!-- wp:column (News Item 2) -->
      <!-- (Same structure) -->
    <!-- wp:column (News Item 3) -->
      <!-- (Same structure) -->
<!-- /wp:group -->
```

**Props**:
- Section H2 heading (editable)
- 3 featured images (replaceable, 16:9 aspect ratio)
- 3 dates (editable, small font size)
- 3 H3 headings (article titles)
- 3 excerpts (editable paragraphs)
- 3 "Read More →" links (editable URLs)

**Blocks Used**:
- `core/group`
- `core/heading` (×4: 1 H2, 3 H3)
- `core/columns`
- `core/column` (×3)
- `core/image` (×3, with aspect ratio)
- `core/paragraph` (×9: dates, excerpts, links)

**Usage**: Homepage latest news section, blog archive highlight

**Responsive Behavior**:
- Desktop (≥1024px): 3 columns
- Tablet (768px-1023px): 2 columns
- Mobile (<768px): 1 column

---

### 5.3 Content Two-Column

**File**: `patterns/content-two-column.php`

**Purpose**: Flexible two-column layout with text on one side, image on the other

**Structure**:
```php
/**
 * Title: Two-Column Content
 * Slug: renalinfo-web/content-two-column
 * Categories: renalinfo-web-content
 * Keywords: two-column, text, image, layout
 * Block Types: core/columns
 * Viewport Width: 1440
 */

<!-- wp:group {"align":"wide"} -->
  <!-- wp:columns {"verticalAlignment":"center"} -->
    <!-- wp:column (Text content) -->
      <!-- wp:heading {"level":2} -->
      <!-- wp:paragraph -->
      <!-- wp:paragraph -->
      <!-- wp:buttons -->
        <!-- wp:button -->
    <!-- wp:column (Image) -->
      <!-- wp:image {"aspectRatio":"4/3"} -->
<!-- /wp:group -->
```

**Props**:
- H2 Heading (editable)
- 2 paragraphs (editable text content)
- CTA button (text + link)
- Image (replaceable, 4:3 aspect ratio)
- Column order reversible (swap columns for image-first layout)

**Blocks Used**:
- `core/group`
- `core/columns`
- `core/column` (×2)
- `core/heading`
- `core/paragraph` (×2)
- `core/buttons`
- `core/button`
- `core/image`

**Usage**: About page sections, service descriptions, mission statements

**Responsive Behavior**: Columns stack vertically on mobile (<768px)

---

## 6. Header Patterns (2 patterns)

### 6.1 Header Primary

**File**: `patterns/header-primary.php`

**Purpose**: Main site header with logo, navigation, search, and dark mode toggle

**Structure**:
```php
/**
 * Title: Header Primary
 * Slug: renalinfo-web/header-primary
 * Categories: renalinfo-web-headers
 * Keywords: header, navigation, logo, search, dark-mode
 * Block Types: core/group
 * Viewport Width: 1440
 * Inserter: no
 */

<!-- wp:group {"align":"full","style":{"background":"linear-gradient(90deg, #006D77, #1C2541)"}} -->
  <!-- wp:group (inner container with max-width) -->
    <!-- wp:columns {"verticalAlignment":"center"} -->
      <!-- wp:column {"width":"20%"} (Logo) -->
        <!-- wp:site-logo -->
      <!-- wp:column {"width":"60%"} (Navigation) -->
        <!-- wp:navigation {"layout":{"type":"flex","justifyContent":"center"}} -->
      <!-- wp:column {"width":"20%"} (Search + Dark Mode) -->
        <!-- wp:search {"buttonUseIcon":true} -->
        <!-- wp:html (Dark mode toggle button with sun/moon icons) -->
<!-- /wp:group -->
```

**Props**:
- Site logo (uploaded via Site Editor)
- Navigation menu (Primary menu)
- Search form (standard WordPress search)
- Dark mode toggle (custom HTML with JavaScript)
- Background gradient: Green-blue (#006D77) to Footer-dark (#1C2541)

**Blocks Used**:
- `core/group` (×2)
- `core/columns`
- `core/column` (×3, custom widths)
- `core/site-logo`
- `core/navigation`
- `core/search`
- `core/html` (dark mode toggle)

**Usage**: `parts/header.html` template part

**Responsive Behavior**:
- Desktop (≥768px): Horizontal layout, navigation visible
- Mobile (<768px): Logo + hamburger icon, navigation hidden (opens mobile drawer)

---

### 6.2 Header Simple

**File**: `patterns/header-simple.php`

**Purpose**: Minimal header without gradient background (for alternate layouts)

**Structure**:
```php
/**
 * Title: Header Simple
 * Slug: renalinfo-web/header-simple
 * Categories: renalinfo-web-headers
 * Keywords: header, simple, minimal
 * Block Types: core/group
 * Viewport Width: 1440
 * Inserter: no
 */

<!-- wp:group {"align":"full","backgroundColor":"white"} -->
  <!-- wp:group (inner container) -->
    <!-- wp:columns {"verticalAlignment":"center"} -->
      <!-- wp:column (Logo + Site Title) -->
        <!-- wp:site-logo -->
        <!-- wp:site-title -->
      <!-- wp:column (Navigation) -->
        <!-- wp:navigation {"layout":{"justifyContent":"right"}} -->
<!-- /wp:group -->
```

**Props**:
- Site logo (uploaded)
- Site title (from Settings → General)
- Navigation menu (Primary menu, right-aligned)
- Background color: White

**Blocks Used**:
- `core/group` (×2)
- `core/columns`
- `core/column` (×2)
- `core/site-logo`
- `core/site-title`
- `core/navigation`

**Usage**: Alternative header for print-focused pages or minimalist designs

**Responsive Behavior**: Same as Header Primary (mobile drawer)

---

## 7. Footer Patterns (2 patterns)

### 7.1 Footer Primary

**File**: `patterns/footer-primary.php`

**Purpose**: Multi-column footer with Quick Links, Resources, Contact Info

**Structure**:
```php
/**
 * Title: Footer Primary
 * Slug: renalinfo-web/footer-primary
 * Categories: renalinfo-web-footers
 * Keywords: footer, multi-column, links, contact
 * Block Types: core/group
 * Viewport Width: 1440
 * Inserter: no
 */

<!-- wp:group {"align":"full","backgroundColor":"footer-dark","textColor":"text-dark"} -->
  <!-- wp:group (inner container) -->
    <!-- wp:columns -->
      <!-- wp:column (Quick Links) -->
        <!-- wp:heading {"level":4,"textColor":"white"} -->
        <!-- wp:list (navigation links) -->
      <!-- wp:column (Resources) -->
        <!-- wp:heading {"level":4,"textColor":"white"} -->
        <!-- wp:list (resource links) -->
      <!-- wp:column (Contact Info) -->
        <!-- wp:heading {"level":4,"textColor":"white"} -->
        <!-- wp:paragraph (Address with location icon) -->
        <!-- wp:paragraph (Phone with call icon) -->
        <!-- wp:paragraph (Email with mail icon) -->
      <!-- wp:column (Social Media) -->
        <!-- wp:heading {"level":4,"textColor":"white"} -->
        <!-- wp:social-links -->
    <!-- wp:separator -->
    <!-- wp:paragraph {"align":"center"} (Copyright) -->
<!-- /wp:group -->
```

**Props**:
- 4 column headings (Quick Links, Resources, Contact Info, Connect)
- Navigation link lists (editable)
- Address, phone, email (with Material Symbol icons)
- Social media links (Facebook, Twitter, LinkedIn)
- Copyright text (editable)
- Background color: Footer Dark (#1C2541)
- Text color: Text Dark (#E0E0E0)

**Blocks Used**:
- `core/group` (×2)
- `core/columns`
- `core/column` (×4)
- `core/heading` (×4 H4)
- `core/list` (×2)
- `core/paragraph` (×4: address, phone, email, copyright)
- `core/html` (×3 for inline SVG icons)
- `core/social-links`
- `core/separator`

**Usage**: `parts/footer.html` template part

**Responsive Behavior**:
- Desktop (≥1024px): 4 columns
- Tablet (768px-1023px): 2 columns, wrapped
- Mobile (<768px): 1 column, stacked vertically

---

### 7.2 Footer Minimal

**File**: `patterns/footer-minimal.php`

**Purpose**: Single-row minimal footer with copyright and social links

**Structure**:
```php
/**
 * Title: Footer Minimal
 * Slug: renalinfo-web/footer-minimal
 * Categories: renalinfo-web-footers
 * Keywords: footer, minimal, simple
 * Block Types: core/group
 * Viewport Width: 1440
 * Inserter: no
 */

<!-- wp:group {"align":"full","backgroundColor":"footer-dark","textColor":"text-dark"} -->
  <!-- wp:columns {"verticalAlignment":"center"} -->
    <!-- wp:column (Copyright) -->
      <!-- wp:paragraph (Copyright text) -->
    <!-- wp:column (Social Links) -->
      <!-- wp:social-links {"layout":{"justifyContent":"right"}} -->
<!-- /wp:group -->
```

**Props**:
- Copyright text (editable)
- Social media links (right-aligned)
- Background color: Footer Dark (#1C2541)
- Text color: Text Dark (#E0E0E0)

**Blocks Used**:
- `core/group`
- `core/columns`
- `core/column` (×2)
- `core/paragraph`
- `core/social-links`

**Usage**: Alternative footer for landing pages or simple sites

**Responsive Behavior**: Columns stack on mobile, text center-aligned

---

## 8. Hidden Patterns (2 patterns)

### 8.1 Hidden Post Meta

**File**: `patterns/hidden-post-meta.php`

**Purpose**: Reusable post metadata component (date, author, categories, tags)

**Structure**:
```php
/**
 * Title: Post Meta
 * Slug: renalinfo-web/hidden-post-meta
 * Categories: renalinfo-web-content
 * Keywords: post, meta, date, author, categories
 * Block Types: core/group
 * Inserter: no
 */

<!-- wp:group {"className":"post-meta"} -->
  <!-- wp:post-date -->
  <!-- wp:post-author -->
  <!-- wp:post-terms {"term":"category"} -->
  <!-- wp:post-terms {"term":"post_tag"} -->
<!-- /wp:group -->
```

**Props**:
- Post date (auto-generated)
- Post author (auto-generated)
- Category list (auto-generated)
- Tag list (auto-generated)

**Blocks Used**:
- `core/group`
- `core/post-date`
- `core/post-author`
- `core/post-terms` (×2)

**Usage**: Inserted in `single.html` template, referenced in other patterns

**Responsive Behavior**: Inline flex layout, wraps naturally

---

### 8.2 Hidden Search Form

**File**: `patterns/hidden-search-form.php`

**Purpose**: Reusable search form component with custom styling

**Structure**:
```php
/**
 * Title: Search Form
 * Slug: renalinfo-web/hidden-search-form
 * Categories: renalinfo-web-content
 * Keywords: search, form
 * Block Types: core/search
 * Inserter: no
 */

<!-- wp:search {"label":"Search","buttonText":"Search","buttonUseIcon":true} -->
```

**Props**:
- Search label (hidden or visible)
- Search input placeholder
- Submit button (icon or text)

**Blocks Used**:
- `core/search`

**Usage**: Inserted in header pattern, 404 page, search template

**Responsive Behavior**: Input width expands to fill container

---

## 9. Pattern Usage Matrix

| Pattern | Homepage | About | Services | Blog | Contact | Archive | 404 |
|---------|----------|-------|----------|------|---------|---------|-----|
| Hero Primary | ✓ | | ✓ | | | | |
| Hero Simple | | ✓ | | | ✓ | | |
| Hero Centered | | | ✓ | | | | |
| CTA Webinar | ✓ | | | | | | |
| CTA Boxed | ✓ | ✓ | ✓ | | ✓ | | |
| CTA Inline | | | | ✓ | | | |
| Resources Grid | ✓ | | ✓ | | | | |
| News Grid | ✓ | | | | | | |
| Two-Column | | ✓ | ✓ | | | | |
| Header Primary | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| Header Simple | | | | | | | |
| Footer Primary | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| Footer Minimal | | | | | | | |
| Post Meta | | | | ✓ | | ✓ | |
| Search Form | ✓ | | | | | | ✓ |

---

## 10. Pattern Customization Guidelines

### 10.1 Text Editing

- Click any text to edit inline
- Maintain similar text length for optimal layout
- Use sentence case for body text, title case for headings
- Keep button text short (1-3 words: "Learn More", "Get Started", "Contact Us")

### 10.2 Image Replacement

1. Click image block
2. Click **Replace** button in toolbar
3. Upload new image or select from Media Library
4. Add **Alt Text** for accessibility
5. Adjust aspect ratio if needed (16:9, 4:3, 1:1)

### 10.3 Color Customization

- Click block → Sidebar → Colors
- Choose from theme palette or use custom color
- Verify contrast ratio meets WCAG AA (4.5:1 for text)

### 10.4 Spacing Adjustments

- Click block → Sidebar → Dimensions
- Adjust padding/margin using spacing presets (10-80)
- Use consistent spacing scale for visual harmony

---

## 11. Pattern Accessibility Requirements

All patterns MUST meet WCAG 2.1 Level AA:

- **Color Contrast**: 4.5:1 for normal text, 3:1 for large text (24px+)
- **Heading Hierarchy**: Proper H1→H2→H3 nesting (no skipped levels)
- **Alt Text**: All images have descriptive alt text (decorative images: alt="")
- **Link Text**: Descriptive link text (not "click here" or "read more" without context)
- **Keyboard Navigation**: All interactive elements reachable via Tab key
- **Focus Indicators**: Visible focus outline on all focusable elements
- **ARIA Labels**: Screen reader labels for icon-only buttons
- **Touch Targets**: Minimum 44x44px tap area on mobile

---

## 12. Validation Checklist

Before deploying patterns, verify:

- [ ] Pattern header complete (Title, Slug, Categories, Keywords)
- [ ] Slug format: `renalinfo-web/{pattern-name}`
- [ ] Categories registered in functions.php
- [ ] Block markup valid (test in Site Editor)
- [ ] All text is translatable (wrapped in `__()` if dynamic)
- [ ] Images have alt text
- [ ] Colors from theme palette (not hardcoded hex)
- [ ] Spacing uses theme presets (not arbitrary px values)
- [ ] Responsive behavior tested (320px-1920px viewports)
- [ ] Accessibility requirements met (contrast, headings, ARIA)

---

**End of Pattern Contracts Document**

This contract defines all 15 block patterns with their structure, properties, and usage guidelines. All patterns MUST conform to these specifications for consistency and maintainability.
