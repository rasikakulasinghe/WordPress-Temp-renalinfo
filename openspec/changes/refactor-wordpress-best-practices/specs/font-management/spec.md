# Spec: Font Management

## Overview

This spec defines requirements for self-hosting all font files in the Renalinfolk WordPress theme, eliminating external CDN dependencies while maintaining design integrity and improving performance.

---

## ADDED Requirements

### Requirement: Self-Host Material Symbols Font

**ID:** FM-001
**Priority:** Critical
**Status:** New

The theme MUST self-host the Material Symbols Outlined font instead of loading from Google Fonts CDN.

**Rationale:**
- GDPR compliance (no third-party tracking)
- Performance (eliminate 300-500ms external request latency)
- Security (control over font file source)
- WordPress Theme Review requirement (no external dependencies)

#### Scenario: Font Files Downloaded and Stored Locally

**Given** the Material Symbols Outlined font is currently loaded from `fonts.googleapis.com`
**When** the theme is refactored
**Then** the font file MUST be downloaded and placed in `assets/fonts/material-symbols/`
**And** the font file MUST be in WOFF2 format for optimal compression
**And** the font file MUST be named `MaterialSymbolsOutlined-VariableFont.woff2`

#### Scenario: Font Face Declaration in theme.json

**Given** the Material Symbols font file is stored locally
**When** the theme loads
**Then** `theme.json` MUST include a `fontFace` declaration for Material Symbols
**And** the `src` property MUST use the WordPress `file:` protocol
**And** the path MUST be `file:./assets/fonts/material-symbols/MaterialSymbolsOutlined-VariableFont.woff2`
**And** the `fontFamily` property MUST be `"Material Symbols Outlined"`

**Example:**
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

#### Scenario: Google CDN Enqueue Removed

**Given** `functions.php` currently enqueues Material Symbols from Google CDN (lines 59-68)
**When** the refactoring is complete
**Then** the `wp_enqueue_style()` call for `material-symbols-outlined` from Google CDN MUST be removed
**And** NO external font CDN URLs MUST remain in `functions.php`
**And** the TODO comment (lines 60-62) MUST be removed as resolved

#### Scenario: Icon Display Verification

**Given** the font is now self-hosted
**When** a page with Material Symbols icons is loaded
**Then** all icons MUST display correctly
**And** the browser Network tab MUST show zero requests to `fonts.googleapis.com`
**And** the font MUST load from local path (`/wp-content/themes/renalinfolk/assets/fonts/...`)

---

### Requirement: Remove Unused Font Families

**ID:** FM-002
**Priority:** High
**Status:** New

The theme MUST contain only fonts declared in `theme.json` to reduce package size and eliminate clutter.

**Rationale:**
- Reduces theme package by 1-3MB
- Faster theme installation and updates
- Cleaner codebase
- Easier maintenance

#### Scenario: Font Directory Cleanup

**Given** the theme contains 10+ unused font families
**When** the refactoring is complete
**Then** only the following font directories MUST exist under `assets/fonts/`:
  - `lexend/` (primary font, used in theme.json)
  - `fira-code/` (monospace font, used in theme.json)
  - `material-symbols/` (icon font, after self-hosting)
**And** all other font directories MUST be deleted:
  - `beiruti/`
  - `fira-sans/`
  - `literata/`
  - `manrope/`
  - `platypi/`
  - `roboto-slab/`
  - `vollkorn/`
  - `ysabeau-office/`
  - Any other unused directories

#### Scenario: Theme Package Size Reduction

**Given** the current theme package is approximately 6-8MB
**When** unused fonts are removed
**Then** the theme package size MUST be less than 5MB
**And** the `assets/fonts/` directory MUST be approximately 450KB (3 font families)

#### Scenario: Font Reference Verification

**Given** unused fonts have been removed
**When** validating the theme
**Then** `theme.json` MUST reference only Lexend and Fira Code in `fontFamilies` array
**And** no template or pattern files MUST reference removed fonts
**And** the WordPress Site Editor MUST load without font errors

**Validation Command:**
```bash
# Verify only 3 font directories
ls assets/fonts/ | wc -l  # Should output: 3

# Verify theme.json font references
rg "fontFamily" theme.json  # Should show only Lexend, Fira Code, Material Symbols
```

---

## MODIFIED Requirements

### Requirement: Font Loading Performance

**ID:** FM-003 (Modified from implicit requirement)
**Priority:** High
**Status:** Modified

The theme MUST load all fonts from local sources with optimized performance.

**Changes:**
- **Before:** Material Symbols loaded from external CDN (slow, blocking)
- **After:** All fonts loaded from local files (fast, non-blocking)

#### Scenario: Zero External Font Requests

**Given** the theme is loaded on a page
**When** analyzing network requests in browser DevTools
**Then** there MUST be zero requests to any external font CDN domains:
  - `fonts.googleapis.com`
  - `fonts.gstatic.com`
  - `use.typekit.net`
  - Any other external font provider
**And** all font requests MUST be to local theme URLs:
  - `/wp-content/themes/renalinfolk/assets/fonts/lexend/...`
  - `/wp-content/themes/renalinfolk/assets/fonts/fira-code/...`
  - `/wp-content/themes/renalinfolk/assets/fonts/material-symbols/...`

#### Scenario: Page Load Performance Improvement

**Given** baseline page load time with external CDN font
**When** fonts are self-hosted
**Then** the First Contentful Paint (FCP) MUST improve by at least 200ms
**And** the page load time MUST improve by at least 300ms
**And** the Lighthouse Performance score MUST be >90

---

## Acceptance Criteria

**All requirements met when:**

1. ✅ **Material Symbols self-hosted:**
   - Font file exists at `assets/fonts/material-symbols/MaterialSymbolsOutlined-VariableFont.woff2`
   - theme.json includes fontFace declaration
   - Google CDN enqueue removed from functions.php
   - Icons display correctly in browser

2. ✅ **Unused fonts removed:**
   - Only 3 font directories exist: lexend, fira-code, material-symbols
   - Theme package size <5MB
   - No broken font references

3. ✅ **Performance improved:**
   - Zero external font requests
   - FCP improved by 200ms+
   - Lighthouse Performance >90

4. ✅ **Validation passing:**
   ```bash
   # No external CDN references
   rg "fonts.googleapis.com" . --type php
   # Output: (empty)

   # Correct font count
   ls assets/fonts/ | wc -l
   # Output: 3

   # Theme.json valid
   node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8'))"
   # Output: (no error)
   ```

---

## Related Specs

- **Performance Optimization** (performance/spec.md) - Overall theme performance
- **Code Quality** (code-quality/spec.md) - WordPress coding standards

---

**Spec Version:** 1.0
**Last Updated:** 2025-11-17
**Status:** 🟢 READY FOR IMPLEMENTATION
