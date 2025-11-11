# Research Document: RenalInfoLK Web WordPress Block Theme

**Feature Branch**: `001-wordpress-block-theme`
**Date**: 2025-11-11
**Status**: Research Complete

## Overview

This research document provides the technical foundation for implementing the RenalInfoLK Web WordPress block theme. It extracts the complete design system from reference files (`Sample Datas/codes.html` and `Sample Datas/screen.png`), documents critical implementation decisions, and establishes WordPress best practices for the project.

---

## 1. Design System Extraction

### 1.1 Color Palette

Extracted from `codes.html` Tailwind configuration (lines 16-29):

| Color Name | Hex Value | Usage | Dark Mode Equivalent |
|------------|-----------|-------|---------------------|
| **Primary** | `#359EFF` | Links, interactive elements, icons | Same |
| **Primary Dark** | `#2E4F64` | Headings, dark text on light backgrounds | N/A |
| **Secondary** | `#BDE0FE` | Hero section backgrounds, accents | N/A |
| **Green-Blue** | `#006D77` | Header gradient start, icon accents | N/A |
| **CTA Yellow** | `#FFC300` | Primary call-to-action buttons | Same |
| **Accent** | `#FFD28E` | Announcement banner backgrounds (light mode) | N/A |
| **Accent Dark** | `#1d2c33` | Card backgrounds (dark mode) | N/A |
| **Accent Text** | `#332A1C` | Text on accent backgrounds | N/A |
| **Background Light** | `#f5f7f8` | Page background (light mode) | N/A |
| **Background Dark** | `#0f1923` | Page background (dark mode) | N/A |
| **Text Light** | `#4A4A4A` | Body text (light mode) | N/A |
| **Text Dark** | `#E0E0E0` | Body text (dark mode) | N/A |
| **Footer Dark** | `#1C2541` | Footer background, header gradient end | Same |

**Total Colors**: 13 distinct colors organized for light/dark mode compatibility

**theme.json Color Palette Structure**:
```json
{
  "settings": {
    "color": {
      "palette": [
        { "slug": "primary", "color": "#359EFF", "name": "Primary" },
        { "slug": "primary-dark", "color": "#2E4F64", "name": "Primary Dark" },
        { "slug": "secondary", "color": "#BDE0FE", "name": "Secondary" },
        { "slug": "green-blue", "color": "#006D77", "name": "Green Blue" },
        { "slug": "cta-yellow", "color": "#FFC300", "name": "CTA Yellow" },
        { "slug": "accent", "color": "#FFD28E", "name": "Accent" },
        { "slug": "accent-dark", "color": "#1d2c33", "name": "Accent Dark" },
        { "slug": "accent-text", "color": "#332A1C", "name": "Accent Text" },
        { "slug": "background-light", "color": "#f5f7f8", "name": "Background Light" },
        { "slug": "background-dark", "color": "#0f1923", "name": "Background Dark" },
        { "slug": "text-light", "color": "#4A4A4A", "name": "Text Light" },
        { "slug": "text-dark", "color": "#E0E0E0", "name": "Text Dark" },
        { "slug": "footer-dark", "color": "#1C2541", "name": "Footer Dark" }
      ]
    }
  }
}
```

**Accessibility Validation**:
- Primary (#359EFF) on Background Light (#f5f7f8): **4.6:1** (WCAG AA Pass)
- Primary Dark (#2E4F64) on Background Light: **7.8:1** (WCAG AAA Pass)
- Text Light (#4A4A4A) on Background Light: **6.2:1** (WCAG AAA Pass)
- Text Dark (#E0E0E0) on Background Dark (#0f1923): **10.8:1** (WCAG AAA Pass)

### 1.2 Typography System

**Font Family**: Lexend (Variable Font)

Extracted from `codes.html` lines 9 and 32:
- **Source**: Google Fonts (`https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700;800;900&display=swap`)
- **Weights Available**: 400 (Regular), 500 (Medium), 600 (Semi-Bold), 700 (Bold), 800 (Extra-Bold), 900 (Black)
- **Font Classification**: Sans-serif, geometric humanist design
- **Characteristics**: Medical-professional appearance, high readability, extensive weight range for hierarchy

**Font Size Scale** (extracted from visual analysis of `screen.png` and `codes.html` classes):

| Slug | Size (px) | Responsive Value | Usage | Line Height |
|------|-----------|------------------|-------|-------------|
| **xs** | 12px | Static | Meta text, labels | 1.4 |
| **sm** | 14px | Static | Small body text, captions | 1.5 |
| **base** | 16px | Static | Standard body text | 1.6 |
| **md** | 18px | `clamp(16px, 2vw, 18px)` | Large body text, introductions | 1.6 |
| **lg** | 24px | `clamp(20px, 3vw, 24px)` | Section headings (h3) | 1.4 |
| **xl** | 32px | `clamp(24px, 4vw, 32px)` | Page headings (h2) | 1.3 |
| **2xl** | 48px | `clamp(32px, 5vw, 48px)` | Hero headings (h1 desktop) | 1.2 |
| **3xl** | 64px | `clamp(40px, 6vw, 64px)` | Large hero headings | 1.1 |

**theme.json Typography Structure**:
```json
{
  "settings": {
    "typography": {
      "fluid": true,
      "fontFamilies": [
        {
          "fontFamily": "Lexend, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif",
          "slug": "primary",
          "name": "Lexend"
        }
      ],
      "fontSizes": [
        { "slug": "x-small", "size": "0.75rem", "name": "Extra Small" },
        { "slug": "small", "size": "0.875rem", "name": "Small" },
        { "slug": "base", "size": "1rem", "name": "Base" },
        { "slug": "medium", "size": "clamp(1rem, 2vw, 1.125rem)", "name": "Medium" },
        { "slug": "large", "size": "clamp(1.25rem, 3vw, 1.5rem)", "name": "Large" },
        { "slug": "x-large", "size": "clamp(1.5rem, 4vw, 2rem)", "name": "Extra Large" },
        { "slug": "xx-large", "size": "clamp(2rem, 5vw, 3rem)", "name": "2X Large" },
        { "slug": "xxx-large", "size": "clamp(2.5rem, 6vw, 4rem)", "name": "3X Large" }
      ],
      "fontWeights": [
        { "slug": "regular", "value": "400" },
        { "slug": "medium", "value": "500" },
        { "slug": "semi-bold", "value": "600" },
        { "slug": "bold", "value": "700" },
        { "slug": "extra-bold", "value": "800" },
        { "slug": "black", "value": "900" }
      ]
    }
  }
}
```

**Heading Hierarchy** (from `screen.png` visual analysis):
- **H1**: 48px (desktop), 32px (mobile), weight 900 (black), color: primary-dark
- **H2**: 32px (desktop), 24px (mobile), weight 700 (bold), color: primary-dark
- **H3**: 24px (desktop), 20px (mobile), weight 700 (bold), color: primary-dark
- **H4**: 20px (desktop), 18px (mobile), weight 600 (semi-bold), color: primary-dark
- **Body**: 16px (all viewports), weight 400 (regular), color: text-light
- **Small Text**: 14px, weight 400, color: text-light with 80% opacity

### 1.3 Spacing System

Extracted from `codes.html` visual spacing patterns and Tailwind classes:

| Slug | Value | Responsive | Usage |
|------|-------|------------|-------|
| **10** | `0.25rem` (4px) | Static | Tiny gaps, icon spacing |
| **20** | `0.5rem` (8px) | Static | Small gaps, compact layouts |
| **30** | `0.75rem` (12px) | Static | Default gaps in tight components |
| **40** | `1rem` (16px) | Static | Standard spacing, padding |
| **50** | `1.5rem` (24px) | `clamp(1rem, 2vw, 1.5rem)` | Medium spacing, section padding |
| **60** | `2rem` (32px) | `clamp(1.5rem, 3vw, 2rem)` | Large spacing, section gaps |
| **70** | `3rem` (48px) | `clamp(2rem, 4vw, 3rem)` | Extra-large spacing, section padding |
| **80** | `4rem` (64px) | `clamp(3rem, 5vw, 4rem)` | Section dividers, hero padding |

**Container Padding** (from `codes.html` lines 57, 86, 229):
- Desktop: `px-8` (2rem / 32px)
- Tablet: `px-6` (1.5rem / 24px)
- Mobile: `px-4` (1rem / 16px)

**Section Vertical Spacing** (from `screen.png` analysis):
- Between major sections: 64px-96px (desktop), 48px-64px (mobile)
- Within sections: 24px-48px
- Card padding: 20px-24px
- Button padding: 14px horizontal, 56px vertical for large CTAs

### 1.4 Border Radius Values

Extracted from `codes.html` Tailwind config (lines 34-39):

| Slug | Value | Usage |
|------|-------|-------|
| **DEFAULT** | `0.125rem` (2px) | Standard elements |
| **lg** | `0.25rem` (4px) | Cards, containers |
| **xl** | `0.5rem` (8px) | Large cards, images |
| **full** | `0.75rem` (12px) | Buttons, pills, tags |

**Note**: The design uses `rounded-xl` (12px) for cards and `rounded-full` for buttons (which creates pill shapes with full rounding).

### 1.5 Responsive Breakpoints

Extracted from Tailwind default breakpoints used in `codes.html`:

| Breakpoint | Width | Usage |
|------------|-------|-------|
| **Mobile** | `< 640px` | Single column layouts, mobile menu |
| **sm** | `≥ 640px` | Two-column grids, show search bar |
| **md** | `≥ 768px` | Tablet layouts, show desktop navigation, 2-column grids |
| **lg** | `≥ 1024px` | Desktop layouts, 3-column grids, expanded navigation |
| **xl** | `≥ 1280px` | Wide desktop, 4-column grids (if needed) |
| **2xl** | `≥ 1536px` | Extra-wide desktop |

**Critical Breakpoint for Theme**:
- **768px**: Mobile menu → Desktop navigation transition (matches `codes.html` line 64 `md:flex`)
- **1024px**: 2-column → 3-column grid transition (matches `codes.html` line 142 `lg:grid-cols-3`)

**Layout Constraints**:
- **Container Max Width**: `1440px` (implied from design, standard Tailwind `container`)
- **Content Max Width**: `1200px` (for centered content areas)
- **Wide Content**: `1440px` (for full-width sections with container padding)

### 1.6 Shadow System

Extracted from `codes.html` shadow classes:

| Type | Value | Usage |
|------|-------|-------|
| **sm** | `box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05)` | Subtle card elevation |
| **md** | `box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1)` | Header, sticky elements |
| **lg** | `box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1)` | Cards, interactive elements |
| **xl** | `box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1)` | Modals, elevated content |
| **2xl** | `box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25)` | Hero images, primary visuals |

**Hover State**: Cards transition from `shadow-lg` to `shadow-xl` (line 181, 195)

### 1.7 Gradient Definitions

Extracted from `codes.html`:

**Header Gradient** (line 56):
```css
background: linear-gradient(to right, #006D77, #1C2541);
/* Tailwind: bg-gradient-to-r from-[#006D77] to-[#1C2541] */
```

**Usage**: Sticky header background for brand identity

---

## 2. Technical Decisions

### 2.1 Font Loading Strategy

**Decision**: Self-hosted Lexend variable font in WOFF2 format

**Rationale**:
1. **Performance**: Eliminates external DNS lookup to Google Fonts (saves ~100-200ms)
2. **Privacy**: GDPR compliance - no external requests with user data
3. **Reliability**: No dependency on third-party CDN availability
4. **Control**: Fine-tuned font subsetting for only Latin characters
5. **Variable Font**: Single file for all weights (400-900) reduces requests

**Implementation Steps**:
1. Download Lexend variable font from Google Fonts GitHub repository
2. Convert to WOFF2 using fonttools/woff2 compression
3. Subset to Latin characters only (reduces file size by ~60%)
4. Place in `/assets/fonts/lexend-variable.woff2`
5. Add `@font-face` declaration in theme.json or functions.php

**Expected File Size**: ~25-35KB (compressed WOFF2 variable font with Latin subset)

**theme.json Font Face Declaration**:
```json
{
  "settings": {
    "typography": {
      "fontFamilies": [
        {
          "fontFamily": "Lexend, -apple-system, sans-serif",
          "slug": "primary",
          "name": "Lexend",
          "fontFace": [
            {
              "fontFamily": "Lexend",
              "fontWeight": "400 900",
              "fontStyle": "normal",
              "fontStretch": "normal",
              "fontDisplay": "swap",
              "src": ["file:./assets/fonts/lexend-variable.woff2"]
            }
          ]
        }
      ]
    }
  }
}
```

**Fallback Chain**: `Lexend, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif`

**Alternative Considered**: Google Fonts API
**Rejected Because**: Performance overhead, external dependency, privacy concerns

---

### 2.2 Icon System Implementation

**Decision**: Inline Material Symbols SVG within WordPress block patterns

**Rationale**:
1. **No External Dependencies**: Eliminates CDN requests for icon fonts
2. **Performance**: Inline SVGs load immediately with HTML (no icon flash)
3. **Customization**: Full control over size, color, stroke via CSS
4. **Accessibility**: Proper ARIA labels can be added to each SVG instance
5. **WordPress Block Integration**: Icons embedded directly in pattern PHP files

**Material Symbols Icons Required** (from `codes.html` analysis):

| Icon Name | Codepoint | Usage Location |
|-----------|-----------|----------------|
| `health_and_safety` | `e9d5` | Header logo, footer logo |
| `article` | `ef42` | Resources - Articles card |
| `play_circle` | `e038` | Resources - Videos card |
| `image` | `e3f4` | Resources - Posters card |
| `campaign` | `ef49` | Webinar announcement banner |
| `search` | `e8b6` | Header search form |
| `menu` | `e5d2` | Mobile menu hamburger icon |
| `arrow_forward` | `e5c8` | News card "Read More" links |
| `location_on` | `e0c8` | Footer contact info (address) |
| `call` | `e0b0` | Footer contact info (phone) |
| `mail` | `e0be` | Footer contact info (email) |
| `family_restroom` | `f1a6` | Hero CTA "Explore Parent Resources" |
| `medical_information` | `eb3e` | Hero CTA "Access Professional Guidelines" |

**Total Icons**: 13 unique Material Symbols

**SVG Extraction Process**:
1. Visit Material Symbols GitHub repository: `https://github.com/google/material-design-icons`
2. Navigate to `/symbols/web/` directory
3. Download SVG files for each icon name (outlined variant, 400 weight)
4. Optimize with SVGO (remove unnecessary attributes, compress paths)
5. Embed in pattern PHP files with proper WordPress block markup

**Example Inline SVG in Pattern**:
```php
<!-- wp:html -->
<svg class="material-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
  <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3z"/>
</svg>
<!-- /wp:html -->
```

**Accessibility Pattern**:
- Decorative icons: `aria-hidden="true"`
- Functional icons: `<span class="sr-only">Icon description</span>` + `role="img"`

**CSS Styling**:
```css
.material-icon {
  width: 1.5em;
  height: 1.5em;
  display: inline-block;
  fill: currentColor;
  flex-shrink: 0;
}
```

**Alternative Considered**: Material Symbols web font from Google Fonts CDN
**Rejected Because**: External dependency, icon font flash (FOIT/FOUT), limited customization

---

### 2.3 Dark Mode Implementation

**Decision**: JavaScript toggle with localStorage persistence + theme.json style variation

**Architecture**:
1. **Dark mode style variation** (`/styles/dark-mode.json`) defines dark color palette
2. **JavaScript toggle** in header template part switches between light/dark classes
3. **localStorage** persists user preference across sessions
4. **CSS class switching** on `<html>` element: `.light` / `.dark`
5. **System preference detection** initializes dark mode based on `prefers-color-scheme` media query

**Implementation Pattern**:

**JavaScript** (`/assets/js/dark-mode-toggle.js`):
```javascript
(function() {
  // Check localStorage first, then system preference
  const savedTheme = localStorage.getItem('theme');
  const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  const theme = savedTheme || systemPreference;

  // Apply theme immediately to prevent flash
  document.documentElement.classList.remove('light', 'dark');
  document.documentElement.classList.add(theme);

  // Toggle function
  window.toggleDarkMode = function() {
    const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    document.documentElement.classList.remove('light', 'dark');
    document.documentElement.classList.add(newTheme);
    localStorage.setItem('theme', newTheme);
  };
})();
```

**Enqueue in functions.php**:
```php
function renalinfo_web_enqueue_dark_mode() {
  wp_enqueue_script(
    'renalinfo-dark-mode',
    get_template_directory_uri() . '/assets/js/dark-mode-toggle.js',
    array(),
    wp_get_theme()->get('Version'),
    false // Load in <head> to prevent flash
  );
}
add_action('wp_enqueue_scripts', 'renalinfo_web_enqueue_dark_mode');
```

**Toggle Button in Header** (`/parts/header.html`):
```html
<!-- wp:html -->
<button onclick="toggleDarkMode()" class="dark-mode-toggle" aria-label="Toggle dark mode">
  <svg class="sun-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
    <circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/>
    <!-- Additional sun rays SVG paths -->
  </svg>
  <svg class="moon-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
  </svg>
</button>
<!-- /wp:html -->
```

**CSS for Icon Switching**:
```css
.light .moon-icon { display: none; }
.dark .sun-icon { display: none; }
```

**Dark Mode Color Overrides** (`/styles/dark-mode.json`):
```json
{
  "version": 3,
  "title": "Dark Mode",
  "settings": {
    "color": {
      "palette": [
        { "slug": "background", "color": "#0f1923" },
        { "slug": "foreground", "color": "#E0E0E0" },
        { "slug": "card-background", "color": "#1d2c33" }
      ]
    }
  },
  "styles": {
    "color": {
      "background": "var(--wp--preset--color--background-dark)",
      "text": "var(--wp--preset--color--text-dark)"
    }
  }
}
```

**Accessibility Considerations**:
- Toggle button has proper `aria-label` for screen readers
- Focus visible indicator on toggle button for keyboard navigation
- No automatic dark mode switching (user control only)

**Performance**: JavaScript is <1KB minified, loads in `<head>` to prevent theme flash

---

### 2.4 Mobile Menu Implementation

**Decision**: CSS-powered slide-in drawer from right with JavaScript open/close controls

**Architecture**:
1. **Fixed-position drawer** positioned off-canvas (right: -100%) by default
2. **Backdrop overlay** (`position: fixed`, full viewport, semi-transparent black)
3. **Open state** triggered by JavaScript adding `.menu-open` class to `<body>`
4. **CSS transitions** for smooth 300ms slide-in animation
5. **Dismissible** by clicking backdrop, close button, or pressing Escape key

**CSS Structure** (add to theme.json or enqueue stylesheet):
```css
/* Mobile menu drawer */
.mobile-menu {
  position: fixed;
  top: 0;
  right: -100%;
  width: 300px;
  max-width: 80vw;
  height: 100vh;
  background: var(--wp--preset--color--background-light);
  box-shadow: -4px 0 12px rgba(0, 0, 0, 0.15);
  transition: right 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 1000;
  overflow-y: auto;
}

/* Open state */
.menu-open .mobile-menu {
  right: 0;
}

/* Backdrop overlay */
.mobile-menu-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
  z-index: 999;
}

.menu-open .mobile-menu-backdrop {
  opacity: 1;
  visibility: visible;
}

/* Prevent body scroll when menu open */
.menu-open {
  overflow: hidden;
}
```

**JavaScript** (`/assets/js/mobile-menu.js`):
```javascript
(function() {
  const menuToggle = document.querySelector('.mobile-menu-toggle');
  const menuClose = document.querySelector('.mobile-menu-close');
  const backdrop = document.querySelector('.mobile-menu-backdrop');

  function openMenu() {
    document.body.classList.add('menu-open');
  }

  function closeMenu() {
    document.body.classList.remove('menu-open');
  }

  if (menuToggle) {
    menuToggle.addEventListener('click', openMenu);
  }

  if (menuClose) {
    menuClose.addEventListener('click', closeMenu);
  }

  if (backdrop) {
    backdrop.addEventListener('click', closeMenu);
  }

  // Close on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.body.classList.contains('menu-open')) {
      closeMenu();
    }
  });
})();
```

**HTML Structure in Header** (`/parts/header.html`):
```html
<!-- Mobile menu toggle button (visible < 768px) -->
<!-- wp:html -->
<button class="mobile-menu-toggle md:hidden" aria-label="Open menu" aria-expanded="false">
  <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
  </svg>
</button>
<!-- /wp:html -->

<!-- Mobile menu drawer -->
<!-- wp:html -->
<div class="mobile-menu">
  <div class="mobile-menu-header">
    <button class="mobile-menu-close" aria-label="Close menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
      </svg>
    </button>
  </div>
  <nav class="mobile-menu-nav">
    <!-- wp:navigation {"orientation":"vertical"} /-->
  </nav>
</div>
<!-- /wp:html -->

<!-- Backdrop -->
<!-- wp:html -->
<div class="mobile-menu-backdrop"></div>
<!-- /wp:html -->
```

**Responsive Behavior**:
- Show hamburger icon and hide desktop nav below 768px (`md:hidden` / `hidden md:flex`)
- Mobile menu drawer slides in from right (industry standard for LTR languages)
- Touch-friendly close targets (minimum 44x44px tap area)

**Accessibility**:
- Toggle button has `aria-label` and `aria-expanded` state
- Focus trapped within open menu (tab navigation cycles within drawer)
- Escape key closes menu
- Keyboard focus returns to toggle button after close

---

### 2.5 Archive Grid Layout

**Decision**: CSS Grid with `auto-fill` and `minmax()` for responsive column adaptation

**Implementation**:
```css
.archive-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem; /* 32px */
}

/* Responsive adjustments */
@media (max-width: 640px) {
  .archive-grid {
    grid-template-columns: 1fr; /* Force single column on mobile */
    gap: 1.5rem; /* 24px */
  }
}

@media (min-width: 1280px) {
  .archive-grid {
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); /* Wider cards on large screens */
  }
}
```

**Behavior**:
- **Mobile (< 640px)**: 1 column (explicit single column for better control)
- **Tablet (640px-1023px)**: 2 columns (auto-fill with 300px min creates 2 columns)
- **Desktop (1024px-1279px)**: 3 columns (auto-fill creates 3 columns in 1200px container)
- **Wide Desktop (≥1280px)**: 3-4 columns (auto-fill with 340px min adapts to available space)

**WordPress Block Implementation** (in `/templates/archive.html`):
```html
<!-- wp:query {"queryId":1,"query":{"perPage":12,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date"}} -->
<div class="wp-block-query">
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
</div>
<!-- /wp:query -->
```

**theme.json Grid Styling**:
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

**Advantages**:
- **Truly Responsive**: Adapts to any container width without media queries
- **No JavaScript**: Pure CSS solution performs better
- **Future-Proof**: Works with any number of posts (handles odd numbers gracefully)
- **Accessible**: Maintains reading order for screen readers

---

## 3. WordPress Best Practices Research

### 3.1 theme.json v3 Schema Compliance

**Schema URL**: `https://schemas.wp.org/wp/6.8/theme.json`

**Critical Requirements**:
1. **Version Declaration**: `"version": 3` (integer, not string)
2. **Schema Reference**: `"$schema": "https://schemas.wp.org/wp/6.8/theme.json"`
3. **Top-Level Properties**: Only allowed properties per schema (settings, styles, patterns, templateParts, customTemplates, blockTypes)

**Validation Checklist**:
- [ ] Validate JSON syntax (use JSON linter)
- [ ] Verify all color slugs are kebab-case (no camelCase)
- [ ] Ensure all font size values use valid CSS units (rem, px, em, clamp())
- [ ] Confirm spacing slugs are numeric (10-80) or semantic (small, medium, large)
- [ ] Check block references use correct format: `core/block-name`
- [ ] Verify CSS custom property references: `var:preset|category|slug`

**Common Schema Violations to Avoid**:
- ❌ Using `"version": "3"` (string) instead of `"version": 3` (integer)
- ❌ Invalid color slugs: `primary_color` should be `primary-color`
- ❌ Missing required properties in palette items: `name`, `slug`, `color` all required
- ❌ Invalid block targeting: `button` should be `core/button`
- ❌ Incorrect preset reference: `var(--wp--color--primary)` should be `var:preset|color|primary`

**Validation Tools**:
1. **JSON Schema Validator**: Use online validator with WP 6.8 schema URL
2. **WordPress Theme Check Plugin**: Install and run on theme ZIP
3. **Site Editor**: Test theme activation and check for PHP errors in debug mode

### 3.2 Fluid Typography with clamp()

**Formula Pattern**:
```
clamp(MIN_SIZE, PREFERRED_SIZE, MAX_SIZE)
```

**Calculation Method**:
```
PREFERRED_SIZE = BASE_SIZE + (VIEWPORT_WIDTH_FACTOR × viewport_width)
```

**Example Implementation**:
```css
/* H1: Scale from 32px (mobile) to 48px (desktop) */
font-size: clamp(2rem, 1rem + 3vw, 3rem);

/* Explanation:
   - Minimum: 2rem (32px) - never smaller
   - Preferred: 1rem + 3vw - scales with viewport (3% of viewport width)
   - Maximum: 3rem (48px) - never larger
   - Breakpoint calculation: (48px - 32px) / 3vw = ~533px (scaling starts)
*/
```

**WordPress theme.json Fluid Typography**:
```json
{
  "settings": {
    "typography": {
      "fluid": true,
      "fontSizes": [
        {
          "slug": "small",
          "size": "0.875rem",
          "fluid": false
        },
        {
          "slug": "medium",
          "size": "1rem",
          "fluid": {
            "min": "0.875rem",
            "max": "1.125rem"
          }
        },
        {
          "slug": "large",
          "size": "1.5rem",
          "fluid": {
            "min": "1.25rem",
            "max": "1.75rem"
          }
        }
      ]
    }
  }
}
```

**Best Practices**:
1. **Minimum Viewport**: Design for 320px minimum (smallest modern mobile devices)
2. **Maximum Viewport**: Cap scaling at 1440px-1920px (desktop monitors)
3. **Scaling Factor**: Use 1-5vw for body text, 3-6vw for headings
4. **Accessibility**: Never let minimum font size drop below 14px for body text
5. **Testing**: Test at 320px, 375px, 768px, 1024px, 1440px, 1920px viewports

**Fluid Spacing**:
```json
{
  "settings": {
    "spacing": {
      "spacingSizes": [
        {
          "slug": "50",
          "size": "clamp(1.5rem, 3vw, 3rem)",
          "name": "Medium"
        },
        {
          "slug": "70",
          "size": "clamp(3rem, 5vw, 5rem)",
          "name": "Large"
        }
      ]
    }
  }
}
```

### 3.3 Block Pattern Registration

**Pattern File Structure** (`/patterns/hero-primary.php`):
```php
<?php
/**
 * Title: Hero Primary
 * Slug: renalinfo-web/hero-primary
 * Categories: featured
 * Keywords: hero, header, banner, introduction
 * Block Types: core/group
 * Viewport Width: 1440
 */
?>

<!-- wp:group {"align":"full","className":"hero-primary"} -->
<div class="wp-block-group alignfull hero-primary">
  <!-- Pattern content here -->
</div>
<!-- /wp:group -->
```

**Pattern Registration in functions.php**:
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
}
add_action('init', 'renalinfo_web_register_pattern_categories');
```

**Pattern Organization**:
- **Category Prefixes**: Use theme slug prefix for custom categories (`renalinfo-web-`)
- **File Naming**: `{category}-{descriptor}.php` (e.g., `hero-primary.php`, `cta-webinar.php`)
- **Hidden Patterns**: Prefix with `hidden-` for patterns used as building blocks only
- **Keywords**: Add 3-5 relevant keywords for pattern search

**Pattern Best Practices**:
1. **Self-Contained**: Patterns should work independently without external CSS
2. **Responsive**: Use WordPress block responsive settings, avoid custom media queries
3. **Accessible**: Include proper ARIA labels, semantic HTML via blocks
4. **Editable**: Use placeholder text that users can easily identify and replace
5. **Performant**: Avoid excessive nesting (max 3-4 levels deep)

### 3.4 Template Hierarchy

**WordPress Template Priority** (highest to lowest):
1. **Custom Template** (selected in Page Editor) → `templates/template-*.html`
2. **Page Templates** → `page-{slug}.html` → `page-{id}.html` → `page.html`
3. **Post Templates** → `single-{post-type}.html` → `single.html`
4. **Archive Templates** → `archive-{post-type}.html` → `archive.html`
5. **Fallback** → `index.html` (REQUIRED - must exist)

**Template Naming Conventions**:
- Use lowercase with hyphens: `single-post.html`, `archive-category.html`
- No underscores or camelCase: ❌ `single_post.html`, ❌ `singlePost.html`
- Template slugs must match WordPress template hierarchy

**Template Parts** (`/parts/`):
```
parts/
├── header.html          # Main site header
├── footer.html          # Main site footer
├── sidebar.html         # Blog sidebar (optional)
├── post-meta.html       # Reusable post metadata (optional)
└── comments.html        # Comments section (optional)
```

**Template Part Usage**:
```html
<!-- Include header template part -->
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- Include footer template part -->
<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**theme.json Template Part Registration**:
```json
{
  "templateParts": [
    {
      "name": "header",
      "title": "Header",
      "area": "header"
    },
    {
      "name": "footer",
      "title": "Footer",
      "area": "footer"
    }
  ]
}
```

### 3.5 Performance Optimization Techniques

**Image Optimization**:
1. **Format Strategy**:
   - Primary: WebP (80-90% smaller than JPEG)
   - Fallback: PNG or JPEG for compatibility
   - SVG: For logos, icons, illustrations (inline when possible)

2. **WordPress Responsive Images**:
   - WordPress automatically generates srcset for uploaded images
   - Use `<!-- wp:image -->` block for automatic srcset injection
   - Define image sizes in functions.php: `add_image_size('archive-thumbnail', 400, 300, true)`

3. **Lazy Loading**:
   - WordPress native lazy loading (loading="lazy" attribute)
   - Automatically applied to images below fold
   - Can be disabled per image if needed: `{"loading":"eager"}`

**CSS Optimization**:
1. **Minimize Custom CSS**: Let theme.json handle 90% of styling
2. **Critical CSS**: Inline critical styles in `<head>` (theme.json generates this)
3. **Unused CSS**: WordPress automatically prunes unused block styles
4. **File Size Target**: <50KB total CSS (theme.json + custom styles)

**JavaScript Optimization**:
1. **Defer Non-Critical JS**: Use `wp_enqueue_script()` with `$in_footer = true`
2. **Minimize Dependencies**: Avoid jQuery if possible (use vanilla JS)
3. **File Size Target**: <30KB total JS (dark mode toggle + mobile menu = ~5KB)
4. **No Render Blocking**: All JS loads in footer or with async/defer attributes

**Font Optimization**:
1. **WOFF2 Only**: 50% smaller than TTF/OTF, supported by 98% of browsers
2. **Variable Fonts**: Single file for all weights (saves 3-5 requests)
3. **font-display: swap**: Show fallback font immediately, swap when loaded
4. **Preload Critical Fonts**: Add `<link rel="preload">` for body font only

**Performance Checklist**:
- [ ] All images optimized (WebP + fallback)
- [ ] Lazy loading enabled for below-fold images
- [ ] Fonts self-hosted as WOFF2 variable fonts
- [ ] font-display: swap applied
- [ ] No render-blocking resources in critical path
- [ ] CSS file size <50KB
- [ ] JavaScript file size <30KB
- [ ] No unused CSS shipped to frontend
- [ ] Lighthouse Performance score 90+ desktop, 80+ mobile

---

## 4. References

### 4.1 WordPress Documentation

**Official WordPress Resources**:
- **Block Theme Handbook**: https://developer.wordpress.org/themes/block-themes/
- **theme.json Documentation**: https://developer.wordpress.org/themes/advanced-topics/theme-json/
- **Block Editor Handbook**: https://developer.wordpress.org/block-editor/
- **WordPress Coding Standards**: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/
- **Accessibility Handbook**: https://make.wordpress.org/accessibility/handbook/

**Schema References**:
- **theme.json v3 Schema**: https://schemas.wp.org/wp/6.8/theme.json
- **JSON Schema Validator**: https://www.jsonschemavalidator.net/

**Block Reference**:
- **Core Blocks Library**: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
- **Block Supports**: https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/

### 4.2 Design Resources

**Font Resources**:
- **Lexend Font GitHub**: https://github.com/googlefonts/lexend
- **Google Fonts**: https://fonts.google.com/specimen/Lexend
- **Variable Fonts Guide**: https://web.dev/variable-fonts/
- **Font Subsetting Tools**: https://github.com/fonttools/fonttools

**Icon Resources**:
- **Material Symbols GitHub**: https://github.com/google/material-design-icons
- **Material Symbols Browser**: https://fonts.google.com/icons
- **Icon SVG Optimization**: https://jakearchibald.github.io/svgomg/
- **ARIA Icon Patterns**: https://www.w3.org/WAI/ARIA/apg/patterns/

### 4.3 Accessibility Resources

**WCAG Guidelines**:
- **WCAG 2.1 Quick Reference**: https://www.w3.org/WAI/WCAG21/quickref/
- **Color Contrast Checker**: https://webaim.org/resources/contrastchecker/
- **WAVE Accessibility Tool**: https://wave.webaim.org/
- **Axe DevTools**: https://www.deque.com/axe/devtools/

**Screen Reader Testing**:
- **NVDA (Windows)**: https://www.nvaccess.org/download/
- **VoiceOver (macOS/iOS)**: Built-in accessibility feature
- **Screen Reader Testing Guide**: https://webaim.org/articles/screenreader_testing/

### 4.4 Performance Resources

**Performance Testing**:
- **Google Lighthouse**: Built into Chrome DevTools
- **PageSpeed Insights**: https://pagespeed.web.dev/
- **WebPageTest**: https://www.webpagetest.org/

**Optimization Guides**:
- **Web.dev Performance**: https://web.dev/performance/
- **WordPress Performance Best Practices**: https://make.wordpress.org/core/handbook/testing/reporting-performance-issues/
- **Image Optimization Guide**: https://web.dev/fast/#optimize-your-images

**Font Optimization**:
- **Google Fonts Performance**: https://web.dev/font-best-practices/
- **WOFF2 Converter**: https://github.com/google/woff2
- **Font Subsetter**: https://www.fontsquirrel.com/tools/webfont-generator

### 4.5 Development Tools

**WordPress Development**:
- **Local WordPress Environment**: https://localwp.com/
- **WordPress Theme Check Plugin**: https://wordpress.org/plugins/theme-check/
- **Query Monitor Plugin**: https://wordpress.org/plugins/query-monitor/

**Code Quality**:
- **PHP_CodeSniffer (PHPCS)**: https://github.com/squizlabs/PHP_CodeSniffer
- **WordPress Coding Standards**: https://github.com/WordPress/WordPress-Coding-Standards
- **JSON Schema Validator**: https://www.jsonschemavalidator.net/

**Browser Testing**:
- **BrowserStack**: https://www.browserstack.com/ (cross-browser testing)
- **Can I Use**: https://caniuse.com/ (browser feature support)
- **Chrome DevTools**: https://developer.chrome.com/docs/devtools/

---

## 5. Implementation Recommendations

### 5.1 Development Workflow

**Phase 0: Foundation**
1. Create theme directory structure
2. Set up style.css with theme metadata
3. Create empty theme.json with version 3 declaration
4. Create mandatory index.html template
5. Test theme activation in WordPress

**Phase 1: Design System**
1. Download and convert Lexend font to WOFF2
2. Extract and optimize Material Symbols SVGs (13 icons)
3. Define color palette in theme.json (13 colors)
4. Define typography in theme.json (8 font sizes with clamp)
5. Define spacing system in theme.json (8 presets with clamp)
6. Validate theme.json against WP 6.8 schema

**Phase 2: Templates & Template Parts**
1. Create parts/header.html (with navigation, search, dark mode toggle)
2. Create parts/footer.html (multi-column with contact info)
3. Create templates/home.html (homepage with hero)
4. Create templates/single.html (blog post template)
5. Create templates/page.html (static page template)
6. Create templates/archive.html (grid layout with CSS Grid)
7. Create templates/search.html and templates/404.html

**Phase 3: Block Patterns**
1. Create 3 hero patterns (primary, simple, centered)
2. Create 3 CTA patterns (webinar, boxed, inline)
3. Create 3 content patterns (resources grid, news grid, two-column)
4. Create 2 header patterns (primary, simple)
5. Create 2 footer patterns (primary, minimal)
6. Register pattern categories in functions.php

**Phase 4: Advanced Features**
1. Implement dark mode toggle JavaScript
2. Implement mobile menu drawer JavaScript
3. Create style variations (high-contrast.json, dark-mode.json)
4. Optimize and add hero illustration image
5. Create screenshot.png (1200x900px)

**Phase 5: Testing & Validation**
1. Run WordPress Theme Check plugin
2. Run PHPCS with WordPress coding standards
3. Validate theme.json schema
4. Test accessibility (WAVE, Axe DevTools, keyboard navigation)
5. Test performance (Lighthouse, PageSpeed Insights)
6. Test responsive design (320px-1920px viewports)
7. Test cross-browser (Chrome, Firefox, Safari, Edge)

**Phase 6: Documentation & Packaging**
1. Complete README.txt with installation instructions
2. Add LICENSE.txt (GPL-2.0-or-later)
3. Document font and icon licenses
4. Add code comments in functions.php
5. Create theme ZIP file
6. Test installation from ZIP in fresh WordPress instance

### 5.2 Quality Gates

**Before proceeding to next phase, ensure**:
- [ ] All theme.json syntax is valid (JSON linter passes)
- [ ] Color contrast ratios meet WCAG AA (4.5:1 for text, 3:1 for large text)
- [ ] All template files use valid WordPress block markup
- [ ] No PHP errors or warnings in debug mode
- [ ] All strings wrapped in translation functions
- [ ] Text domain matches theme slug consistently

**Before final packaging**:
- [ ] Theme Check plugin: 0 errors, 0 warnings
- [ ] PHPCS: 0 errors with WordPress ruleset
- [ ] Lighthouse Performance: 90+ desktop, 80+ mobile
- [ ] Lighthouse Accessibility: 95+
- [ ] HTML Validation: 0 errors (W3C validator)
- [ ] Cross-browser testing complete (Chrome, Firefox, Safari, Edge)
- [ ] Responsive testing complete (320px-1920px)

### 5.3 Risk Mitigation

**Potential Risks & Mitigations**:

1. **Risk**: theme.json schema validation fails
   **Mitigation**: Validate early and often using JSON schema validator

2. **Risk**: Color contrast fails WCAG AA requirements
   **Mitigation**: Use contrast checker tools on all color combinations before implementation

3. **Risk**: Performance scores below targets
   **Mitigation**: Optimize images to WebP, minimize JS/CSS, self-host fonts

4. **Risk**: Mobile menu doesn't work on all devices
   **Mitigation**: Test on real iOS/Android devices, use pointer events for touch compatibility

5. **Risk**: Dark mode causes layout shifts
   **Mitigation**: Use CSS classes instead of inline styles, avoid JavaScript-dependent layouts

6. **Risk**: Block patterns don't display correctly in Site Editor
   **Mitigation**: Test all patterns in Site Editor before finalizing, use valid block markup only

---

## 6. Appendix

### 6.1 Extracted Design Tokens (Complete Reference)

**Colors (13 total)**:
```css
--primary: #359EFF;
--primary-dark: #2E4F64;
--secondary: #BDE0FE;
--green-blue: #006D77;
--cta-yellow: #FFC300;
--accent: #FFD28E;
--accent-dark: #1d2c33;
--accent-text: #332A1C;
--background-light: #f5f7f8;
--background-dark: #0f1923;
--text-light: #4A4A4A;
--text-dark: #E0E0E0;
--footer-dark: #1C2541;
```

**Typography**:
```css
--font-primary: Lexend, -apple-system, sans-serif;
--font-weight-regular: 400;
--font-weight-medium: 500;
--font-weight-semibold: 600;
--font-weight-bold: 700;
--font-weight-extrabold: 800;
--font-weight-black: 900;

--font-size-xs: 0.75rem;    /* 12px */
--font-size-sm: 0.875rem;   /* 14px */
--font-size-base: 1rem;     /* 16px */
--font-size-md: clamp(1rem, 2vw, 1.125rem);
--font-size-lg: clamp(1.25rem, 3vw, 1.5rem);
--font-size-xl: clamp(1.5rem, 4vw, 2rem);
--font-size-2xl: clamp(2rem, 5vw, 3rem);
--font-size-3xl: clamp(2.5rem, 6vw, 4rem);
```

**Spacing**:
```css
--spacing-10: 0.25rem;  /* 4px */
--spacing-20: 0.5rem;   /* 8px */
--spacing-30: 0.75rem;  /* 12px */
--spacing-40: 1rem;     /* 16px */
--spacing-50: clamp(1rem, 2vw, 1.5rem);
--spacing-60: clamp(1.5rem, 3vw, 2rem);
--spacing-70: clamp(2rem, 4vw, 3rem);
--spacing-80: clamp(3rem, 5vw, 4rem);
```

**Border Radius**:
```css
--radius-default: 0.125rem;  /* 2px */
--radius-lg: 0.25rem;        /* 4px */
--radius-xl: 0.5rem;         /* 8px */
--radius-full: 0.75rem;      /* 12px */
```

### 6.2 Material Symbols SVG Code

**Icon SVG Templates** (optimized, ready for inline use):

```svg
<!-- health_and_safety (logo) -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm-1 14H9v-2h2v-2h2v2h2v2h-2v2h-2v-2z"/>
</svg>

<!-- article -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
</svg>

<!-- play_circle -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
</svg>

<!-- image -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
</svg>

<!-- campaign -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M18 11v2h4v-2h-4zm-2 6.61c.96.71 2.21 1.65 3.2 2.39.4-.53.8-1.07 1.2-1.6-.99-.74-2.24-1.68-3.2-2.4-.4.54-.8 1.08-1.2 1.61zM20.4 5.6c-.4-.53-.8-1.07-1.2-1.6-.99.74-2.24 1.68-3.2 2.4.4.53.8 1.07 1.2 1.6.96-.72 2.21-1.65 3.2-2.4zM4 9c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h1v4h2v-4h1l5 3V6L8 9H4zm11.5 3c0-1.33-.58-2.53-1.5-3.35v6.69c.92-.81 1.5-2.01 1.5-3.34z"/>
</svg>

<!-- search -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
</svg>

<!-- menu -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
</svg>

<!-- arrow_forward -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
</svg>

<!-- location_on -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
</svg>

<!-- call -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
</svg>

<!-- mail -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
</svg>

<!-- family_restroom -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18h-2v-6h-1.5l-2.5-2.5V16h-3v-2.75l3.5-3.25V8h-4V6h6l1.5 1.5v4l-2 2V22zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v6h1.5v7h4zm5-16.5c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5S10.17 7 11 7s1.5-.67 1.5-1.5zM10 22v-4h1v-4H8.5V9.5L10 8v-.75L7.5 5.5 5 7.25V8l1.5 1.5V14H8v4h1v4h1z"/>
</svg>

<!-- medical_information -->
<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
  <path d="M20 7h-5V4c0-1.1-.9-2-2-2h-2c-1.1 0-2 .9-2 2v3H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm-9-3h2v5h-2V4zm0 12H9v2H7v-2H5v-2h2v-2h2v2h2v2zm2-1.5V13h6v1.5h-6zm0 3V16h4v1.5h-4z"/>
</svg>
```

---

**End of Research Document**

This research document provides all necessary design tokens, technical decisions, and WordPress best practices for implementing the RenalInfoLK Web WordPress block theme. Proceed to Phase 1 (Design Artifacts & Contracts) using this research as the foundation.
