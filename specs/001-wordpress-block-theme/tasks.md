# Tasks: RenalInfoLK Web WordPress Block Theme

**Feature Branch**: `001-wordpress-block-theme`
**Date**: 2025-11-11
**Input**: Design documents from `/specs/001-wordpress-block-theme/`
**Prerequisites**: spec.md, plan.md, research.md, data-model.md, quickstart.md

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (e.g., US1, US2, US3)
- Include exact file paths in descriptions

## Task Summary

**Total Tasks**: 135
**Critical Path**: Phase 1 (5 tasks) → Phase 2 (14 tasks) → User Story Phases
**Estimated Effort**: 40-60 hours total
**MVP**: US1 only (21 tasks after foundational setup)

**Tasks by Phase**:
- Phase 1 - Setup: 5 tasks
- Phase 2 - Foundational: 14 tasks (BLOCKS all user stories)
- Phase 3 - US1 Theme Installation: 21 tasks
- Phase 4 - US2 Content Creation: 18 tasks
- Phase 5 - US3 Mobile Experience: 15 tasks
- Phase 6 - US4 Archive Browsing: 12 tasks
- Phase 7 - US5 Color Customization: 8 tasks
- Phase 8 - US6 CTA Patterns: 9 tasks
- Phase 9 - US7 SEO Configuration: 11 tasks
- Phase 10 - Polish & Validation: 22 tasks

**Parallel Opportunities**: 48 tasks marked [P] (can run simultaneously within their phase)

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: WordPress block theme initialization and basic structure
**Effort**: ~2 hours
**Dependencies**: None - can start immediately

- [X] T001 Create WordPress block theme directory structure at repository root (templates/, parts/, patterns/, styles/, assets/css/, assets/fonts/, assets/images/)
- [X] T002 [P] Create mandatory index.html template in /templates/ (WordPress requires this file - fallback template for all views)
- [X] T003 [P] Create style.css with theme metadata (Name: RenalInfoLK Web, Version: 1.0.0, Requires at least: 6.7, Tested up to: 6.8, Requires PHP: 7.2, License: GPL-2.0-or-later, Text Domain: renalinfo-web)
- [X] T004 [P] Create functions.php with basic file header and opening PHP tag (minimal setup file)
- [X] T005 [P] Create README.txt with WordPress theme directory format (installation, features, changelog sections)

**Checkpoint**: Directory structure created, mandatory files exist

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Core theme configuration that MUST be complete before ANY user story can be implemented
**Effort**: ~6-8 hours
**Dependencies**: Phase 1 complete

**⚠️ CRITICAL**: No pattern/template work can begin until this phase is complete

- [X] T006 Initialize theme.json at repository root with version 3 and $schema reference (https://schemas.wp.org/wp/6.8/theme.json)
- [X] T007 [P] Define color palette in theme.json settings.color.palette (13 colors: primary #359EFF, primary-dark #2E4F64, secondary #BDE0FE, green-blue #006D77, cta-yellow #FFC300, accent #FFD28E, accent-dark #1d2c33, accent-text #332A1C, background-light #f5f7f8, background-dark #0f1923, text-light #4A4A4A, text-dark #E0E0E0, footer-dark #1C2541)
- [X] T008 [P] Download Lexend variable font from Google Fonts GitHub, convert to WOFF2 with Latin subset, save to /assets/fonts/lexend-variable.woff2 (~25-35KB expected)
- [X] T008-A [P] Configure font-display: swap in theme.json fontFace declarations for Lexend variable font to prevent FOIT/FOUT (Flash of Invisible Text/Flash of Unstyled Text)
- [X] T009 [P] Define typography system in theme.json settings.typography (fontFamilies: Lexend with fontFace declaration for variable font, fontSizes: 8 sizes with clamp() values, fontWeights: 400-900, fluid: true)
- [X] T010 [P] Define spacing scale in theme.json settings.spacing.spacingSizes (8 presets: 10=0.25rem, 20=0.5rem, 30=0.75rem, 40=1rem, 50=clamp(1rem,2vw,1.5rem), 60=clamp(1.5rem,3vw,2rem), 70=clamp(2rem,4vw,3rem), 80=clamp(3rem,5vw,4rem))
- [X] T011 [P] Configure layout constraints in theme.json settings.layout (contentSize: 1200px, wideSize: 1440px, useRootPaddingAwareAlignments: true)
- [X] T012 [P] Define border radius values in theme.json (default: 0.125rem, lg: 0.25rem, xl: 0.5rem, full: 0.75rem)
- [X] T013 [P] Configure theme.json styles.color (background: background-light, text: text-light)
- [X] T014 [P] Configure theme.json styles.elements.button (border-radius: full, padding, hover states with CTA yellow background)
- [X] T015 [P] Configure theme.json styles.elements.link (color: primary, hover color: primary-dark)
- [X] T016 [P] Configure theme.json styles.elements.heading (font-weight: 700-900, color: primary-dark, line-height: 1.1-1.4)
- [X] T017 Register template parts in theme.json templateParts (header with area: header, footer with area: footer, sidebar with area: uncategorized)
- [X] T018 Validate theme.json against WordPress 6.8 schema using JSON schema validator (ensure version is integer 3, all slugs are kebab-case, all required properties present)
- [X] T019 Add GPL-2.0-or-later LICENSE.txt file to repository root with full license text

**Checkpoint**: Foundation ready - theme.json validated, fonts loaded, all presets defined. Pattern and template implementation can now begin in parallel.

---

## Phase 3: User Story 1 - Site Administrator Theme Installation (Priority: P1) 🎯 MVP

**Goal**: Enable site administrators to install and activate the theme successfully, establishing the visual identity and structure for the medical platform

**Independent Test**: Upload theme ZIP via Appearance → Themes → Add New, activate, confirm site displays without errors and Site Editor opens successfully

**Effort**: ~8-10 hours
**Dependencies**: Phase 2 complete

### Core Templates for US1

- [X] T020 [P] [US1] Create home.html template in /templates/ (blog homepage: template-part header, hero pattern, featured posts grid with query loop, template-part footer)
- [X] T021 [P] [US1] Create single.html template in /templates/ (blog post view: template-part header, post-title, post-featured-image, post-content, post-meta, post-comments, template-part footer)
- [X] T022 [P] [US1] Create page.html template in /templates/ (static pages: template-part header, page content area with full-width support, template-part footer)
- [X] T023 [P] [US1] Create archive.html template in /templates/ (blog archive: template-part header, archive-title, query loop with post-template grid layout, query-pagination, template-part footer)
- [X] T024 [P] [US1] Create search.html template in /templates/ (search results: template-part header, search query display, query loop for results, zero-results message, template-part footer)
- [X] T025 [P] [US1] Create 404.html template in /templates/ (error page: template-part header, friendly error message, search form, links to main sections, template-part footer)

### Template Parts for US1

- [X] T026 [US1] Create header.html in /parts/ (site header: group with gradient background #006D77 to #1C2541, site-logo, navigation block, search block, dark mode toggle HTML button)
- [X] T027 [US1] Create footer.html in /parts/ (site footer: group with footer-dark background, columns for Quick Links/Resources/Contact Info, copyright text, social media links)
- [X] T028 [P] [US1] Create sidebar.html in /parts/ (blog sidebar: recent posts, categories list, search form - optional for single.html)

### Essential Patterns for US1

- [X] T029 [P] [US1] Create hero-primary.php in /patterns/ (main hero: two-column group with heading h1, paragraph, buttons group, image with hero illustration, background secondary color)
- [X] T030 [P] [US1] Create header-primary.php in /patterns/ (primary header: gradient background, site-logo, navigation with menu items, search form, dark mode toggle)
- [X] T031 [P] [US1] Create footer-primary.php in /patterns/ (multi-column footer: 3 columns with headings and list items, contact info with Material Symbol SVGs for location_on/call/mail, copyright paragraph)

### Icon Assets for US1

- [X] T032 [P] [US1] Extract and optimize 13 Material Symbols SVG icons from Google Material Design Icons GitHub (health_and_safety, article, play_circle, image, campaign, search, menu, arrow_forward, location_on, call, mail, family_restroom, medical_information)
- [X] T033 [US1] Embed inline SVG icons in header-primary.php pattern (health_and_safety for logo, search icon, menu icon for mobile)
- [X] T034 [US1] Embed inline SVG icons in footer-primary.php pattern (location_on for address, call for phone, mail for email)

### Theme Assets for US1

- [X] T035 [P] [US1] Create or obtain hero illustration image, optimize to WebP format (<300KB), save to /assets/images/hero-illustration.webp with PNG fallback hero-illustration.png
- [X] T036 [P] [US1] Create screenshot.png at repository root (1200x900px showing homepage design for WordPress themes directory)
- [X] T037 [P] [US1] Create /assets/fonts/LICENSE-fonts.txt with Lexend font SIL OFL 1.1 license text and attribution

### Theme Functions for US1

- [X] T038 [US1] Register theme setup in functions.php (renalinfo_web_setup function with add_theme_support for block-templates, post-thumbnails, custom-logo, responsive-embeds, html5, editor-styles)
- [X] T039 [US1] Enqueue theme stylesheet in functions.php (renalinfo_web_enqueue_styles function loading style.css with theme version, hooked to wp_enqueue_scripts)
- [X] T040 [US1] Register pattern categories in functions.php (renalinfo_web_pattern_categories function: renalinfo-web-heroes, renalinfo-web-cta, renalinfo-web-content, hooked to init)

**Checkpoint**: At this point, User Story 1 should be fully functional - theme can be uploaded, activated, Site Editor opens, all templates render correctly, basic patterns available

---

## Phase 4: User Story 2 - Content Editor Creates Medical Content Pages (Priority: P1)

**Goal**: Enable content editors to create and customize pages about pediatric nephrology topics using the Full Site Editing interface without writing code

**Independent Test**: Create new page in Site Editor, add medical content blocks (headings, paragraphs, images, lists), customize colors/typography via interface, publish - page displays with professional styling

**Effort**: ~6-8 hours
**Dependencies**: Phase 3 (US1) complete

### Additional Block Patterns for Content Creation

- [ ] T041 [P] [US2] Create hero-simple.php in /patterns/ (text-only hero: centered group with h1, paragraph, single CTA button, background-light background)
- [ ] T042 [P] [US2] Create hero-centered.php in /patterns/ (centered hero: full-width group with centered text, large h1 heading, paragraph, buttons group with 2 CTAs)
- [ ] T043 [P] [US2] Create content-two-column.php in /patterns/ (two-column section: columns block with 50/50 split, column 1 has heading h2 + paragraphs, column 2 has image with caption)
- [ ] T044 [P] [US2] Create content-resources-grid.php in /patterns/ (3-column grid: columns block with 3 equal columns, each has Material Symbol SVG icon, heading h3, paragraph, link - Articles/Videos/Posters)
- [ ] T045 [P] [US2] Create content-news-grid.php in /patterns/ (3-column news grid: query loop with 3 posts, each shows featured image, date, title, excerpt, "Read More" link with arrow_forward icon)

### Block Styling Customization

- [ ] T046 [US2] Configure theme.json styles.blocks.core/heading (responsive font sizes per heading level: h1=xx-large, h2=x-large, h3=large, h4=medium, font-weight by level)
- [ ] T047 [US2] Configure theme.json styles.blocks.core/paragraph (font-size: base, line-height: 1.6, color: text-light, spacing)
- [ ] T048 [US2] Configure theme.json styles.blocks.core/image (border-radius: xl, aspect-ratio support, spacing around images)
- [ ] T049 [US2] Configure theme.json styles.blocks.core/list (list-style customization, spacing between items, color inheritance)
- [ ] T050 [US2] Configure theme.json styles.blocks.core/button (multiple style variations: primary with cta-yellow, secondary with primary color, outline variant)
- [ ] T051 [US2] Configure theme.json styles.blocks.core/columns (gap: var(--wp--preset--spacing--50), responsive breakpoints for mobile stacking)

### Site Editor Enhancements

- [ ] T052 [P] [US2] Create /assets/css/editor-style.css with Site Editor specific styles (editor canvas improvements, pattern preview styling)
- [ ] T053 [US2] Enqueue editor stylesheet in functions.php (renalinfo_web_editor_styles function loading editor-style.css, hooked to enqueue_block_editor_assets)
- [ ] T054 [US2] Register custom block styles in functions.php for core/list block (checkmark style using Material Symbol SVG, medical-list style with custom icon)

### Pattern Documentation

- [ ] T055 [P] [US2] Add pattern header comments to all patterns (Title, Slug, Categories, Keywords, Block Types, Viewport Width for proper Site Editor display and searchability)
- [ ] T056 [US2] Test all content patterns in Site Editor (verify they insert correctly, are editable, maintain layout when text changes, responsive behavior works)

### Color Palette Accessibility

- [ ] T057 [US2] Validate all color combinations in theme.json palette for WCAG AA contrast (use WebAIM Contrast Checker: primary on background-light ≥4.5:1, primary-dark on background-light ≥4.5:1, text-light on background-light ≥4.5:1)
- [ ] T058 [US2] Document color usage guidelines in README.txt (which color pairs are safe, recommended background/foreground combinations for user customization)

**Checkpoint**: Content editors can now create rich medical content pages using patterns and blocks, customize appearance via Site Editor, and publish professional-looking pages

---

## Phase 5: User Story 3 - Patient Visitor Accesses Medical Information on Mobile (Priority: P1)

**Goal**: Enable patients/parents to access pediatric nephrology information on mobile devices with clear readable content and easy navigation

**Independent Test**: Access site on mobile devices (320px-768px viewports), navigate between pages, read content - verify no horizontal scrolling, readable text (≥16px), touch-friendly navigation (≥44x44px)

**Effort**: ~6-8 hours
**Dependencies**: Phase 3 (US1) complete

### Mobile Menu Implementation

- [ ] T059 [P] [US3] Create /assets/css/mobile-menu.css with mobile menu drawer styles (fixed position drawer right: -100%, width: 300px, backdrop overlay, transitions, media queries for <768px)
- [ ] T060 [P] [US3] Create /assets/js/mobile-menu.js with drawer functionality (open/close functions, backdrop click dismiss, Escape key dismiss, body scroll lock when open, ~2KB expected)
- [ ] T061 [US3] Enqueue mobile menu CSS and JS in functions.php (renalinfo_web_enqueue_mobile_menu function, CSS in header, JS in footer, hooked to wp_enqueue_scripts)
- [ ] T061-A [P] [US3] Add @media (prefers-reduced-motion: reduce) media query to mobile-menu.css setting all transition durations to 0.01s and backdrop opacity transitions to instant (transition: none) for users with motion reduction preferences
- [ ] T062 [US3] Update header.html template part to include mobile menu markup (hamburger button with menu icon SVG visible <768px, drawer container with close button, navigation block inside drawer, backdrop div)
- [ ] T063 [US3] Add mobile menu toggle button to header-primary.php pattern (button with aria-label="Open menu", aria-expanded="false", menu Material Symbol SVG, class="mobile-menu-toggle md:hidden")

### Responsive Typography

- [ ] T064 [US3] Configure theme.json fluid typography settings (ensure all fontSizes use clamp() for smooth scaling: xs/sm/base static, md and above use clamp with min 320px viewport, max 1920px viewport)
- [ ] T065 [US3] Set minimum font sizes in theme.json (body text minimum 16px, small text minimum 14px, ensure readability on smallest mobile devices)
- [ ] T066 [US3] Test typography responsive behavior across viewports (320px, 375px, 414px, 768px, 1024px, 1440px, 1920px - verify smooth scaling, no layout breaks)

### Touch Target Optimization

- [ ] T067 [US3] Configure theme.json styles.blocks.core/button with minimum dimensions (min-height: 44px via padding, min-width consideration via padding-left/right)
- [ ] T068 [US3] Configure theme.json styles.blocks.core/navigation with touch-friendly sizing (navigation items padding for ≥44x44px tap area, submenu items adequate spacing)
- [ ] T069 [US3] Add CSS for mobile touch targets in mobile-menu.css (mobile menu items min-height 44px, adequate horizontal padding, comfortable spacing between items)

### Responsive Images

- [ ] T070 [US3] Configure theme.json settings.useRootPaddingAwareAlignments: true (ensures proper image alignment on mobile)
- [ ] T071 [US3] Configure responsive image sizes in functions.php (add_image_size for mobile-optimized variants: mobile-hero 800x450, mobile-content 600x400, mobile-thumbnail 400x300)
- [ ] T072 [US3] Update image blocks in patterns to use responsive attributes (aspectRatio: 16/9, sizeSlug: large, add sizes and srcset attributes for mobile optimization)

### Mobile Testing

- [ ] T073 [US3] Test mobile menu functionality on real devices (iOS Safari, Android Chrome - verify drawer slides in smoothly, backdrop dismisses menu, Escape key works on tablet with keyboard)

**Checkpoint**: Mobile visitors can now navigate the site easily with touch-friendly menus, read content with clear typography, and view images that adapt to screen size

---

## Phase 6: User Story 4 - Healthcare Professional Browses Articles Archive (Priority: P2)

**Goal**: Enable healthcare professionals to find specific pediatric nephrology articles through a well-organized archive with efficient filtering and grid layout

**Independent Test**: Publish multiple blog posts with categories/tags, visit blog archive page, verify responsive CSS Grid layout (1-4 columns dynamically), filter by category, click through to articles

**Effort**: ~4-6 hours
**Dependencies**: Phase 3 (US1) complete

### Archive Template Enhancement

- [ ] T074 [US4] Configure theme.json styles.blocks.core/post-template with CSS Grid auto-fill layout (grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)), gap: 2rem, responsive adjustments)
- [ ] T075 [US4] Update archive.html template with enhanced query loop (query: {perPage: 12, pages: 0, postType: post, order: desc, orderBy: date}, post-template layout: grid)
- [ ] T076 [US4] Add archive post card structure to archive.html post-template (post-featured-image with aspectRatio 16/9 and isLink true, post-date, post-title with isLink true, post-excerpt with moreText "Read More →")
- [ ] T077 [US4] Configure archive grid responsive behavior in theme.json (mobile <640px: 1 column via media query override, tablet 640-1023px: 2 columns auto-fill, desktop ≥1024px: 3-4 columns auto-fill)

### Category & Tag Display

- [ ] T078 [P] [US4] Create hidden-post-meta.php pattern in /patterns/ (reusable post metadata component: post-date, post-categories with comma separation, post-tags with styling, hidden prefix indicates not in pattern inserter)
- [ ] T079 [US4] Include post-meta pattern in single.html template (insert after post-title, before post-content for article metadata display)
- [ ] T080 [US4] Configure theme.json styles.blocks.core/post-terms (category and tag styling: font-size small, color primary for links, spacing between terms, hover states)

### Pagination Styling

- [ ] T081 [US4] Configure theme.json styles.blocks.core/query-pagination (pagination styling: spacing between previous/numbers/next, active page highlighting, button-like appearance for pagination links)
- [ ] T082 [US4] Add pagination controls to archive.html template (query-pagination block with query-pagination-previous, query-pagination-numbers, query-pagination-next)

### Archive Grid Testing

- [ ] T083 [US4] Create sample category structure for testing (Kidney Conditions parent with 3 children, Treatment Options parent with 3 children, Patient Resources parent with 3 children)
- [ ] T084 [US4] Test archive grid layout with varying post counts (test with 1, 3, 7, 12, 20 posts to verify grid adapts gracefully, handles odd numbers, pagination works)
- [ ] T085 [US4] Test category filtering in archive (click category link, verify archive displays only posts in that category, category name appears in archive title)

**Checkpoint**: Healthcare professionals can now browse the medical article archive with a clear grid layout, filter by medical topics, and navigate through paginated results efficiently

---

## Phase 7: User Story 5 - Site Administrator Customizes Brand Colors (Priority: P2)

**Goal**: Enable site administrators to customize theme colors to match organizational branding while maintaining medical professionalism and accessibility

**Independent Test**: Access Site Editor → Styles → Colors, modify primary color, verify changes apply globally in real-time preview and on frontend after saving

**Effort**: ~3-4 hours
**Dependencies**: Phase 2 complete

### Style Variations

- [ ] T086 [P] [US5] Create /styles/high-contrast.json style variation (increase contrast ratios: primary to #0066CC darker, background to pure white #FFFFFF, text to darker #333333, maintain WCAG AAA 7:1+ ratios)
- [ ] T087 [P] [US5] Create /styles/dark-mode.json style variation (dark color palette: background #0f1923, text #E0E0E0, accent-dark #1d2c33 for cards, primary stays #359EFF for contrast)
- [ ] T088 [US5] Configure style variation metadata (title, description fields in JSON files for proper Site Editor display and user understanding)

### Color Customization Interface

- [ ] T089 [US5] Verify theme.json settings.color.palette has proper name/slug/color structure (all 13 colors have user-friendly names: "Primary Blue" not just "primary", clear descriptions)
- [ ] T090 [US5] Enable color customization in theme.json settings.color (duotone: true, custom: true, customDuotone: true, customGradient: true, gradients: [], link: true for full customization options)
- [ ] T091 [US5] Document color customization in README.txt (which colors control what elements, safe color combinations, how to validate contrast ratios, how to reset to defaults)

### Color Validation

- [ ] T092 [US5] Test color customization workflow in Site Editor (change primary color, verify buttons/links/headings update, change background color, verify overall site appearance updates, test preview vs saved state)
- [ ] T093 [US5] Validate high-contrast style variation meets WCAG AAA (all text/background combinations ≥7:1 contrast ratio using WebAIM Contrast Checker)

**Checkpoint**: Site administrators can now customize brand colors through Site Editor interface, apply pre-designed style variations, and maintain accessibility standards

---

## Phase 8: User Story 6 - Content Editor Adds Call-to-Action Patterns (Priority: P3)

**Goal**: Enable content editors to add pre-designed call-to-action sections (appointment booking, newsletter signup, contact forms) to pages without building from scratch

**Independent Test**: Open pattern inserter, browse CTA patterns, insert one into page, customize text/buttons, publish - pattern displays responsively with professional styling

**Effort**: ~3-4 hours
**Dependencies**: Phase 4 (US2) complete

### CTA Pattern Creation

- [ ] T094 [P] [US6] Create cta-webinar.php in /patterns/ (announcement banner: full-width group with accent background, campaign Material Symbol SVG icon, heading h3, date/time paragraph, "Register Now" button with cta-yellow)
- [ ] T095 [P] [US6] Create cta-boxed.php in /patterns/ (boxed CTA: group with border and padding, centered content, heading h2, paragraph description, button group with primary button, background-light)
- [ ] T096 [P] [US6] Create cta-inline.php in /patterns/ (inline CTA: minimal styling, left-aligned text, paragraph with strong emphasis, single button aligned left, no background color)
- [ ] T097 [P] [US6] Create cta-contact.php in /patterns/ (contact CTA: two-column layout, left column has heading and contact info with Material Symbol SVGs, right column placeholder for contact form shortcode)
- [ ] T098 [P] [US6] Create cta-newsletter.php in /patterns/ (newsletter signup: centered content, mail Material Symbol SVG, heading "Stay Updated", paragraph description, placeholder for newsletter form shortcode)

### CTA Pattern Styling

- [ ] T099 [US6] Configure CTA button variations in theme.json styles.blocks.core/button (primary: cta-yellow background, secondary: primary color outline, large size variant with increased padding)
- [ ] T100 [US6] Add CTA pattern category icon and description in functions.php pattern registration (clear category description: "Promotional banners and call-to-action blocks for conversions")

### CTA Pattern Documentation

- [ ] T101 [P] [US6] Document CTA pattern usage in README.txt (when to use each pattern, how to integrate with form plugins like Contact Form 7/Gravity Forms, customization tips)
- [ ] T102 [US6] Test CTA patterns in Site Editor and frontend (insert each pattern, customize text and buttons, verify responsive behavior on mobile/tablet/desktop, test button click targets)

**Checkpoint**: Content editors can now rapidly add professional call-to-action sections to pages, customize them easily, and drive user engagement without coding

---

## Phase 9: User Story 7 - Site Administrator Configures SEO-Friendly Templates (Priority: P3)

**Goal**: Ensure all page types output proper semantic HTML and structured data for search engines, improving discoverability of medical content

**Independent Test**: Publish pages, run through HTML validator and Lighthouse SEO audit, verify proper semantic elements (article, section, header, footer, nav) and meta tags

**Effort**: ~4-5 hours
**Dependencies**: Phase 3 (US1) complete

### Semantic HTML Structure

- [ ] T103 [US7] Update all templates to use semantic HTML5 elements via block tagName attribute (header.html uses tagName: header, footer.html uses tagName: footer, navigation uses tagName: nav, single.html main content uses tagName: main)
- [ ] T104 [US7] Configure theme.json styles.elements with proper semantic targeting (header element, footer element, main element, article element, section element, nav element)
- [ ] T105 [US7] Add skip-to-content link in header.html template part (hidden link at top of header with "Skip to main content" text, links to #main anchor, visible on keyboard focus, positioned absolute)

### Meta Tags & Document Structure

- [ ] T106 [US7] Configure theme.json settings.custom.meta for OpenGraph and Twitter Card support (add custom settings that SEO plugins can hook into)
- [ ] T107 [US7] Ensure all templates have proper heading hierarchy (single h1 per template, logical h2→h3→h4 nesting, verify with WAVE accessibility tool)
- [ ] T108 [US7] Add proper ARIA landmarks in templates (header part has role="banner", footer part has role="contentinfo", navigation has role="navigation", main content has role="main")

### SEO Plugin Compatibility

- [ ] T109 [US7] Test theme with Yoast SEO plugin (install plugin, verify breadcrumbs render correctly, meta description fields work, schema output doesn't conflict, focus keyword highlighting works in editor, verify Open Graph meta tags present: og:title, og:description, og:image, og:type)
- [ ] T110 [US7] Test theme with Rank Math plugin (install plugin, verify SEO score appears, schema templates apply, social media previews work, redirects function, verify Twitter Card meta tags: twitter:card, twitter:title, twitter:description, twitter:image)
- [ ] T111 [US7] Document SEO plugin compatibility in README.txt (recommended plugins: Yoast SEO, Rank Math, where structured data should come from - plugins not theme)

### Structured Data Preparation

- [ ] T112 [US7] Add schema.org metadata hooks in functions.php (filters for plugins to add Article schema, MedicalWebPage schema, Organization schema without theme hardcoding values)
- [ ] T113 [US7] Validate HTML output with W3C validator (run homepage, single post, archive page through validator.w3.org, ensure zero errors, fix any validation issues)
- [ ] T113-A [P] [US7] Verify Open Graph meta tags output in single.html and page.html templates (og:title, og:description, og:image, og:type=article) using Facebook Sharing Debugger and Twitter Card Validator

**Checkpoint**: Site templates now output semantic HTML that search engines can properly index, SEO plugins integrate seamlessly, and structured data can be added via plugins

---

## Phase 10: Polish & Validation (Cross-Cutting Concerns)

**Purpose**: Final quality checks, performance optimization, accessibility validation, standards compliance, and deployment preparation
**Effort**: ~6-8 hours
**Dependencies**: All desired user stories complete

### Accessibility Testing

- [ ] T114 [P] Test color contrast with WAVE accessibility tool (run all templates through wave.webaim.org, verify all text/background combinations ≥4.5:1 for normal text, ≥3:1 for large text, zero contrast errors)
- [ ] T115 [P] Test keyboard navigation (Tab through entire site, verify all interactive elements reachable, focus indicators visible on all focusable elements, no keyboard traps, logical tab order)
- [ ] T116 [P] Test screen reader with NVDA (Windows) or VoiceOver (Mac) (navigate site with screen reader, verify headings announced correctly, landmarks identified, image alt text read, forms labeled properly)
- [ ] T117 [US7] Verify heading hierarchy with HeadingsMap browser extension (ensure single h1 per page, no skipped heading levels, logical outline structure)
- [ ] T118 [P] Validate ARIA labels on all interactive elements (navigation has aria-label, buttons have aria-label when icon-only, modals have aria-modal, drawers have aria-hidden when closed)
- [ ] T119 Test skip-to-content link functionality (press Tab on any page, verify skip link appears and is visually obvious, press Enter, focus moves to main content)

### Performance Testing

- [ ] T120 [P] Run Lighthouse performance audit on homepage (target: 90+ desktop, 80+ mobile, check First Contentful Paint <1.5s, Largest Contentful Paint <2.5s desktop/<3.5s mobile, Cumulative Layout Shift <0.1)
- [ ] T121 [P] Optimize all theme images (hero-illustration, screenshot, placeholder images - compress to WebP with 80-85% quality, ensure <300KB per image, provide PNG fallbacks)
- [ ] T122 Test lazy loading on images (verify loading="lazy" attribute on below-fold images, hero images use loading="eager", test with Network throttling in DevTools)
- [ ] T123 Verify font loading performance (check Lexend variable font loads with font-display: swap, preload critical font if needed, verify no FOUT/FOIT flash)
- [ ] T124 Check CSS and JavaScript file sizes (combined CSS <50KB, combined JS <30KB before gzip, minify if needed, no unused CSS)
- [ ] T125 Test on 3G throttled connection (Chrome DevTools Network tab → Slow 3G, verify critical content loads within 3 seconds, progressive enhancement works)

### WordPress Standards Validation

- [ ] T126 [P] Run WordPress Theme Check plugin (install Theme Check plugin, run scan on theme, verify zero errors and zero warnings, fix any flagged issues)
- [ ] T127 [P] Run PHPCS with WordPress coding standards (install PHP_CodeSniffer, run with WordPress rulesets: phpcs --standard=WordPress, fix coding standard violations)
- [ ] T128 Verify text domain consistency (search all PHP files for translation functions, ensure all use 'renalinfo-web' text domain, no hard-coded English strings outside translation functions)
- [ ] T129 Verify function prefix consistency (all theme functions must start with renalinfo_web_ prefix, search functions.php and pattern files, rename any unprefixed functions)
- [ ] T130 Validate theme.json schema compliance (run theme.json through JSON schema validator with https://schemas.wp.org/wp/6.8/theme.json, fix any schema violations, verify version is integer 3)
- [ ] T131 Test internationalization (install .pot file generator plugin, generate translation template, verify all translatable strings captured, test with language switching)

### Cross-Browser & Responsive Testing

- [ ] T132 [P] Test in Chrome/Edge latest 2 versions (verify layout, styles, functionality, dark mode toggle, mobile menu, all patterns render correctly)
- [ ] T133 [P] Test in Firefox latest 2 versions (verify CSS Grid layouts, custom properties, font rendering, interactive features)
- [ ] T134 [P] Test in Safari macOS/iOS latest 2 versions (verify WebP images display with PNG fallback, CSS clamp() functions, touch events on iOS)
- [ ] T135 [P] Test progressive enhancement with JavaScript disabled (disable JavaScript in browser, verify core content accessible, navigation menu usable, critical functionality works, graceful degradation)

### Documentation & Deployment

- [ ] T136 [P] Complete README.txt with all sections (description, installation instructions, changelog with version 1.0.0 entry, credits for Lexend font and Material Symbols, license information)
- [ ] T137 [P] Add font and icon licensing files (/assets/fonts/LICENSE-fonts.txt with SIL OFL 1.1 for Lexend, README.txt credits section with Apache 2.0 for Material Symbols, list all 13 icons used)
- [ ] T138 [P] Create theme screenshot.png (1200x900px PNG showing homepage with hero, navigation, content sections - represents theme in WordPress theme directory)
- [ ] T139 Add code comments in functions.php (document each function purpose, parameters, return values, hook usage, follow WordPress inline documentation standards)
- [ ] T140 Update quickstart.md with final installation steps (verify all instructions accurate, add troubleshooting section, include plugin recommendations)

### Final Packaging

- [ ] T141 Create theme ZIP file (compress theme directory: zip -r renalinfolkweb.zip renalinfolkweb/ excluding .git, node_modules, .DS_Store, .env files)
- [ ] T142 Verify ZIP structure (extract ZIP, verify root directory is renalinfolkweb/, all necessary files present: theme.json, style.css, functions.php, templates/, parts/, patterns/, assets/, README.txt, LICENSE.txt)
- [ ] T143 Test installation from ZIP in fresh WordPress instance (create clean WordPress 6.7+ install, upload ZIP via Appearance → Themes → Add New → Upload, activate theme, verify no PHP errors/warnings)
- [ ] T144 Verify Site Editor opens successfully after activation (go to Appearance → Editor, verify all templates visible, template parts editable, patterns appear in inserter, styles customizable)
- [ ] T145 Test theme with default WordPress content (Twenty Twenty-Five sample content, verify default posts display, sample pages render, comments work if enabled, widgets/menus function)

**Final Checkpoint**: Theme passes all quality gates, is production-ready, ZIP file installs cleanly, all user stories function independently, documentation complete

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies - can start immediately
- **Foundational (Phase 2)**: Depends on Setup completion - **BLOCKS all user stories**
- **User Story 1 (Phase 3)**: Depends on Foundational complete - MVP milestone
- **User Story 2 (Phase 4)**: Depends on US1 complete (needs templates and patterns from US1)
- **User Story 3 (Phase 5)**: Depends on US1 complete (needs header template for mobile menu)
- **User Story 4 (Phase 6)**: Depends on US1 complete (needs archive template)
- **User Story 5 (Phase 7)**: Depends on Foundational complete (works independently with theme.json)
- **User Story 6 (Phase 8)**: Depends on US2 complete (builds on content patterns)
- **User Story 7 (Phase 9)**: Depends on US1 complete (enhances existing templates)
- **Polish (Phase 10)**: Depends on all desired user stories being complete

### User Story Dependencies

- **US1 (P1 - Theme Installation)**: Foundation → US1 ✓ **MVP STOP POINT**
- **US2 (P1 - Content Creation)**: Foundation → US1 → US2 ✓
- **US3 (P1 - Mobile Experience)**: Foundation → US1 → US3 ✓
- **US4 (P2 - Archive Browsing)**: Foundation → US1 → US4 ✓
- **US5 (P2 - Color Customization)**: Foundation → US5 ✓ (independent)
- **US6 (P3 - CTA Patterns)**: Foundation → US1 → US2 → US6 ✓
- **US7 (P3 - SEO Configuration)**: Foundation → US1 → US7 ✓

### Critical Path (Minimum for MVP)

1. **Phase 1: Setup** (5 tasks, ~2 hours)
2. **Phase 2: Foundational** (14 tasks, ~6-8 hours) ⚠️ BLOCKING
3. **Phase 3: US1 - Theme Installation** (21 tasks, ~8-10 hours) 🎯 MVP COMPLETE

**Total MVP Effort**: 40 tasks, ~16-20 hours

### Within Each User Story

- Tasks marked [P] can run in parallel (different files, no dependencies)
- Pattern creation tasks are highly parallelizable (different .php files)
- Template tasks can be parallelized within template type
- Configuration tasks must be sequential (same theme.json file)
- Testing tasks should run after implementation complete

### Parallel Opportunities

**Phase 1 Setup**: 4 of 5 tasks parallel (T002-T005)
**Phase 2 Foundational**: 13 of 14 tasks parallel (T007-T016 after T006)
**Phase 3 US1**: 13 of 21 tasks parallel (templates, patterns, assets)
**Phase 4 US2**: 10 of 18 tasks parallel (patterns, configurations)
**Phase 5 US3**: 8 of 15 tasks parallel (CSS, JS, images)
**Phase 6 US4**: 2 of 12 tasks parallel (pattern and category creation)
**Phase 7 US5**: 2 of 8 tasks parallel (style variations)
**Phase 8 US6**: 6 of 9 tasks parallel (5 CTA patterns, 1 doc)
**Phase 9 US7**: 1 of 11 tasks parallel (testing)
**Phase 10 Polish**: 18 of 22 tasks parallel (cross-browser, accessibility, perf tests)

**Total Parallel Tasks**: 77 of 145 tasks (53%) can run simultaneously with adequate team size

---

## Implementation Strategy

### MVP First (Recommended - US1 Only)

**Goal**: Deliver working theme as fast as possible

1. ✅ **Phase 1: Setup** (2 hours) → Foundation files created
2. ✅ **Phase 2: Foundational** (6-8 hours) → theme.json complete, fonts loaded
3. ✅ **Phase 3: US1 - Theme Installation** (8-10 hours) → MVP COMPLETE
4. 🛑 **STOP and VALIDATE**:
   - Upload ZIP to fresh WordPress install
   - Activate theme without errors
   - Site Editor opens successfully
   - All templates render correctly
   - Basic patterns available in inserter
   - Site displays professionally on desktop
5. 🚀 **Deploy/Demo** if ready

**Total Time**: 16-20 hours for working theme

### Incremental Delivery (Recommended - High Business Value)

**Goal**: Add features in priority order with validation gates

1. **Foundation** (Phase 1 + 2): 8-10 hours → Base ready
2. **US1 - Theme Installation** (Phase 3): 8-10 hours → **Deploy MVP** 🎯
3. **US2 - Content Creation** (Phase 4): 6-8 hours → Test independently → **Deploy v1.1**
4. **US3 - Mobile Experience** (Phase 5): 6-8 hours → Test independently → **Deploy v1.2**
5. **US4 - Archive Browsing** (Phase 6): 4-6 hours → Test independently → **Deploy v1.3**
6. **US5 - Color Customization** (Phase 7): 3-4 hours → Test independently → **Deploy v1.4**
7. **US6 - CTA Patterns** (Phase 8): 3-4 hours → Test independently → **Deploy v1.5**
8. **US7 - SEO Configuration** (Phase 9): 4-5 hours → Test independently → **Deploy v1.6**
9. **Polish & Validation** (Phase 10): 6-8 hours → **Deploy v2.0** 🏆

**Each deployment adds value without breaking previous features**

### Parallel Team Strategy (If 3+ Developers Available)

**Goal**: Maximize throughput with multiple team members

**Week 1**:
- **All Developers**: Phase 1 + Phase 2 together (10 hours)
- Once Foundational complete, split:
  - **Developer A**: US1 - Theme Installation (10 hours)
  - **Developer B**: US5 - Color Customization (4 hours) → US7 - SEO (5 hours)
  - **Developer C**: Documentation, asset optimization

**Week 2**:
- **Developer A**: US2 - Content Creation (8 hours)
- **Developer B**: US3 - Mobile Experience (8 hours)
- **Developer C**: US4 - Archive Browsing (6 hours)

**Week 3**:
- **Developer A**: US6 - CTA Patterns (4 hours)
- **All Developers**: Phase 10 - Polish & Validation together (8 hours)
- **Integration Testing**: All stories together

**Total Calendar Time**: ~3 weeks with 3 developers vs ~6-8 weeks solo

---

## Notes

- **[P] Marker**: Tasks with [P] can run in parallel (different files, no dependencies within phase)
- **[Story] Label**: Maps task to specific user story for traceability and independent testing
- **File Paths**: All paths are absolute from repository root (WordPress block theme standard)
- **Validation Gates**: Test each user story independently before marking complete
- **Version Control**: Commit after each task or logical group (e.g., commit all templates together)
- **Quality First**: Run theme.json validation after every theme.json edit
- **Accessibility Always**: Test color contrast when adding/changing colors
- **Mobile First**: Test mobile viewports for every visual change
- **Performance Aware**: Optimize images before committing, check file sizes regularly
- **Documentation Continuous**: Update README.txt as features are added, not at the end

### Avoid

- ❌ Vague tasks without specific file paths
- ❌ Same file conflicts (two tasks editing theme.json simultaneously)
- ❌ Cross-story dependencies that break independence
- ❌ Testing before implementation (verify tests fail first in TDD)
- ❌ Skipping validation steps to "save time"
- ❌ Working on multiple user stories simultaneously (finish one first)

---

**End of Tasks Document**

**Next Action**: Execute Phase 1 (Setup) to create directory structure and initialize theme files
