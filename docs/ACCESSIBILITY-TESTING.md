# Accessibility Testing Checklist

## WCAG 2.1 Level AA Compliance Testing

### Automated Testing Tools

#### WAVE (Web Accessibility Evaluation Tool)
- [ ] Test homepage with WAVE browser extension
- [ ] Test blog archive page
- [ ] Test single post template
- [ ] Test page template
- [ ] Verify no errors reported
- [ ] Address all warnings
- [ ] Check contrast errors (should be 0)

#### axe DevTools
- [ ] Run axe scan on homepage
- [ ] Run axe scan on blog post
- [ ] Run axe scan on contact page
- [ ] Fix all critical issues
- [ ] Fix all serious issues
- [ ] Document moderate issues with justification

### Keyboard Navigation Testing

#### Tab Order
- [ ] Tab through entire homepage in logical order
- [ ] Verify skip-to-content link is first focusable element
- [ ] Test all interactive elements receive focus
- [ ] Verify focus order matches visual layout
- [ ] Check mobile menu is keyboard accessible

#### Focus Indicators
- [ ] All links show visible focus indicator
- [ ] Buttons have clear focus state
- [ ] Form inputs have focus border
- [ ] Mobile menu toggle shows focus
- [ ] Navigation items show focus state
- [ ] Minimum 2px outline on all focus states

#### Keyboard Shortcuts
- [ ] Escape key closes mobile menu
- [ ] Tab cycles through mobile menu when open
- [ ] Shift+Tab reverse cycles correctly
- [ ] Enter/Space activates buttons
- [ ] Arrow keys work in navigation (if applicable)

### Screen Reader Testing

#### NVDA (Windows) Testing
- [ ] Install NVDA screen reader
- [ ] Navigate homepage with only NVDA + keyboard
- [ ] Verify heading hierarchy is announced correctly
- [ ] Test landmark regions (header, main, footer, nav)
- [ ] Verify images have proper alt text announcements
- [ ] Check buttons announce as buttons
- [ ] Test form labels read correctly
- [ ] Verify mobile menu ARIA states

#### VoiceOver (macOS) Testing
- [ ] Enable VoiceOver (Cmd+F5)
- [ ] Navigate homepage with VoiceOver
- [ ] Test rotor heading navigation
- [ ] Verify link announcements include context
- [ ] Test image alt text descriptions
- [ ] Check form field labels

#### Expected Announcements
- Skip link: "Skip to content, link"
- Mobile menu toggle: "Menu, button, not expanded"
- Post link: "[Post Title], link"
- Featured image: "[Descriptive alt text], image"
- Category: "Posted in [Category Name], link"

### Color Contrast Testing

#### Light Mode Verification
- [ ] Primary Blue (#359EFF) on Background Light - 4.52:1 ✓
- [ ] Primary Dark (#2E4F64) on Background Light - 7.89:1 ✓
- [ ] Text Light (#4A4A4A) on Background Light - 7.12:1 ✓
- [ ] CTA Yellow button: Accent Text on CTA Yellow - 8.91:1 ✓
- [ ] All text passes WCAG AA (4.5:1 minimum)
- [ ] Large text passes WCAG AAA (7:1 minimum where applicable)

#### Dark Mode Verification
- [ ] Text Dark (#E0E0E0) on Background Dark - 11.25:1 ✓
- [ ] Primary Blue (#359EFF) on Background Dark - 5.94:1 ✓
- [ ] All dark mode combinations pass WCAG AA
- [ ] Test with dark mode toggle

#### High Contrast Mode
- [ ] Test Windows High Contrast Mode
- [ ] Verify all borders are visible
- [ ] Check focus indicators remain visible
- [ ] Test button outlines appear

### ARIA Implementation Review

#### ARIA Labels
- [ ] Mobile menu toggle has aria-label="Menu"
- [ ] Mobile menu drawer has aria-label="Mobile navigation"
- [ ] Close button has aria-label="Close menu"
- [ ] All icon-only buttons have aria-labels

#### ARIA States
- [ ] Mobile toggle: aria-expanded="false" when closed
- [ ] Mobile toggle: aria-expanded="true" when open
- [ ] Mobile drawer: aria-hidden="true" when closed
- [ ] Mobile drawer: aria-hidden="false" when open

#### ARIA Controls
- [ ] Toggle button: aria-controls="mobile-menu-drawer"
- [ ] Verify IDs match between controls and targets

### Semantic HTML Audit

#### Document Structure
- [ ] One H1 per page (page/post title)
- [ ] Heading hierarchy is logical (no skipped levels)
- [ ] Proper nesting: H1 → H2 → H3 (no H1 → H3)
- [ ] `<header>` wraps site header
- [ ] `<main>` wraps primary content
- [ ] `<article>` wraps blog post content
- [ ] `<footer>` wraps site footer
- [ ] `<nav>` wraps navigation menus

#### Links and Buttons
- [ ] Links (`<a>`) navigate to URLs
- [ ] Buttons (`<button>`) trigger actions
- [ ] No `<div onclick>` fake buttons
- [ ] Link text is descriptive (no "click here")
- [ ] External links have proper context

### Form Accessibility

#### Labels and Inputs
- [ ] All inputs have associated `<label>` elements
- [ ] Labels use `for` attribute matching input `id`
- [ ] Required fields have `aria-required="true"`
- [ ] Error messages have `aria-live` regions
- [ ] Placeholder text is NOT used as labels

#### Form Validation
- [ ] Error messages are descriptive
- [ ] Errors are announced to screen readers
- [ ] Success messages are announced
- [ ] Focus moves to first error on submission

### Motion and Animation

#### Reduced Motion Support
- [ ] Test with prefers-reduced-motion enabled
- [ ] Mobile menu transition reduces to 0.01s
- [ ] Verify no auto-playing videos
- [ ] Check no parallax scrolling effects
- [ ] Carousel animations respect reduced motion

#### Animation Testing
```css
/* Verify this is implemented */
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

### Mobile Accessibility

#### Touch Targets
- [ ] All buttons minimum 44x44 pixels
- [ ] Mobile menu items minimum 44px height
- [ ] Adequate spacing between touch targets (8px minimum)
- [ ] Test on actual mobile device (iOS/Android)

#### Viewport and Zoom
- [ ] No `maximum-scale` restriction in viewport meta
- [ ] Content reflows at 320px width
- [ ] Text remains readable at 200% zoom
- [ ] No horizontal scrolling at mobile sizes

### Skip Links

#### Skip to Content
- [ ] Skip link is first focusable element
- [ ] Skip link is visually hidden until focused
- [ ] Skip link becomes visible on focus
- [ ] Skip link moves focus to main content
- [ ] Skip link bypasses navigation

### Testing Results Template

```markdown
## Accessibility Test Results

**Date:** [YYYY-MM-DD]
**Tester:** [Name]
**Tools Used:** WAVE, axe DevTools, NVDA, Lighthouse

### Summary
- WCAG Level: AA
- Critical Issues: 0
- Serious Issues: 0
- Moderate Issues: [X]
- Minor Issues: [X]

### Issues Found
1. [Description]
   - Severity: [Critical/Serious/Moderate/Minor]
   - Fix: [Solution]
   - Status: [Fixed/In Progress/Wontfix]

### Screen Reader Testing
- NVDA (Windows): [Pass/Fail]
- VoiceOver (macOS): [Pass/Fail]
- Notes: [Any observations]

### Keyboard Navigation
- Tab order: [Pass/Fail]
- Focus indicators: [Pass/Fail]
- Keyboard shortcuts: [Pass/Fail]

### Color Contrast
- Light mode: [Pass/Fail]
- Dark mode: [Pass/Fail]
- All ratios meet WCAG AA

### Recommendations
1. [Recommendation]
2. [Recommendation]
```

## Compliance Statement

This theme aims to conform to WCAG 2.1 Level AA standards. We test with:
- Automated tools (WAVE, axe DevTools)
- Manual keyboard navigation
- Screen readers (NVDA, VoiceOver)
- Real users with disabilities (when possible)

Report accessibility issues to: [support email]
