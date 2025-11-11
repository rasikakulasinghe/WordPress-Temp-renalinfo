# Contract: theme.json Structure

**Feature Branch**: `001-wordpress-block-theme`
**Date**: 2025-11-11
**Schema Version**: WordPress 6.8 (version 3)

## Overview

This document defines the complete structure of `theme.json`, the central configuration file for the RenalInfoLK Web WordPress block theme. All styling, layout, and theme configuration is centralized in this file per WordPress block theme standards.

**Schema Reference**: https://schemas.wp.org/wp/6.8/theme.json

---

## 1. Schema Validation

### Required Top-Level Properties

```json
{
  "$schema": "https://schemas.wp.org/wp/6.8/theme.json",
  "version": 3
}
```

**Critical Requirements**:
- `$schema`: MUST reference WordPress 6.8 schema URL exactly
- `version`: MUST be integer `3` (NOT string `"3"`)
- Schema validation ensures WordPress can parse and apply settings

### Allowed Top-Level Properties

Per WordPress 6.8 schema, ONLY these top-level properties are valid:

| Property | Type | Required | Description |
|----------|------|----------|-------------|
| `$schema` | String | Yes | Schema URL for validation |
| `version` | Integer | Yes | theme.json version (must be `3`) |
| `title` | String | No | Theme display title |
| `slug` | String | No | Theme slug identifier |
| `description` | String | No | Theme description |
| `settings` | Object | No | Global theme settings |
| `styles` | Object | No | Global theme styles |
| `customTemplates` | Array | No | Custom template definitions |
| `templateParts` | Array | No | Template part registrations |
| `patterns` | Array | No | Block pattern registrations |
| `blockTypes` | Array | No | Block type customizations |

**NEVER add properties outside this list** - WordPress will reject invalid files.

---

## 2. Settings Section

The `settings` object defines theme capabilities and design tokens.

### 2.1 Color Settings

```json
{
  "settings": {
    "color": {
      "defaultPalette": false,
      "defaultGradients": false,
      "defaultDuotone": false,
      "custom": true,
      "customGradient": true,
      "customDuotone": true,
      "link": true,
      "palette": [
        {
          "slug": "primary",
          "color": "#359EFF",
          "name": "Primary"
        },
        {
          "slug": "primary-dark",
          "color": "#2E4F64",
          "name": "Primary Dark"
        },
        {
          "slug": "secondary",
          "color": "#BDE0FE",
          "name": "Secondary"
        },
        {
          "slug": "green-blue",
          "color": "#006D77",
          "name": "Green Blue"
        },
        {
          "slug": "cta-yellow",
          "color": "#FFC300",
          "name": "CTA Yellow"
        },
        {
          "slug": "accent",
          "color": "#FFD28E",
          "name": "Accent"
        },
        {
          "slug": "accent-dark",
          "color": "#1d2c33",
          "name": "Accent Dark"
        },
        {
          "slug": "accent-text",
          "color": "#332A1C",
          "name": "Accent Text"
        },
        {
          "slug": "background-light",
          "color": "#f5f7f8",
          "name": "Background Light"
        },
        {
          "slug": "background-dark",
          "color": "#0f1923",
          "name": "Background Dark"
        },
        {
          "slug": "text-light",
          "color": "#4A4A4A",
          "name": "Text Light"
        },
        {
          "slug": "text-dark",
          "color": "#E0E0E0",
          "name": "Text Dark"
        },
        {
          "slug": "footer-dark",
          "color": "#1C2541",
          "name": "Footer Dark"
        }
      ],
      "gradients": [
        {
          "slug": "header-gradient",
          "gradient": "linear-gradient(90deg, #006D77 0%, #1C2541 100%)",
          "name": "Header Gradient"
        }
      ]
    }
  }
}
```

**Color Palette Structure**:
- **Total Colors**: 13 colors
- **Slug Format**: kebab-case (e.g., `primary-dark`, not `primaryDark`)
- **Hex Values**: 6-digit hex with `#` prefix
- **Name**: Human-readable label displayed in Site Editor

**Color Usage**:
- `primary`: Links, interactive elements (#359EFF)
- `primary-dark`: Headings, dark text (#2E4F64)
- `secondary`: Hero backgrounds, accents (#BDE0FE)
- `green-blue`: Header gradient start (#006D77)
- `cta-yellow`: Primary CTA buttons (#FFC300)
- `accent`: Light mode announcement backgrounds (#FFD28E)
- `accent-dark`: Dark mode card backgrounds (#1d2c33)
- `accent-text`: Text on accent backgrounds (#332A1C)
- `background-light`: Light mode page background (#f5f7f8)
- `background-dark`: Dark mode page background (#0f1923)
- `text-light`: Light mode body text (#4A4A4A)
- `text-dark`: Dark mode body text (#E0E0E0)
- `footer-dark`: Footer background, header gradient end (#1C2541)

**Gradient Definition**:
- `header-gradient`: Green-blue to Footer-dark (90deg horizontal)

**Boolean Flags**:
- `defaultPalette: false`: Hides WordPress default colors
- `custom: true`: Allows custom color picker
- `link: true`: Enables link color customization

---

### 2.2 Typography Settings

```json
{
  "settings": {
    "typography": {
      "customFontSize": true,
      "fontStyle": true,
      "fontWeight": true,
      "letterSpacing": true,
      "lineHeight": true,
      "textDecoration": true,
      "textTransform": true,
      "dropCap": true,
      "fluid": true,
      "fontFamilies": [
        {
          "fontFamily": "Lexend, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif",
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
      ],
      "fontSizes": [
        {
          "slug": "x-small",
          "size": "0.75rem",
          "name": "Extra Small",
          "fluid": false
        },
        {
          "slug": "small",
          "size": "0.875rem",
          "name": "Small",
          "fluid": false
        },
        {
          "slug": "base",
          "size": "1rem",
          "name": "Base",
          "fluid": false
        },
        {
          "slug": "medium",
          "size": "1rem",
          "name": "Medium",
          "fluid": {
            "min": "1rem",
            "max": "1.125rem"
          }
        },
        {
          "slug": "large",
          "size": "1.5rem",
          "name": "Large",
          "fluid": {
            "min": "1.25rem",
            "max": "1.75rem"
          }
        },
        {
          "slug": "x-large",
          "size": "2rem",
          "name": "Extra Large",
          "fluid": {
            "min": "1.5rem",
            "max": "2.25rem"
          }
        },
        {
          "slug": "xx-large",
          "size": "3rem",
          "name": "2X Large",
          "fluid": {
            "min": "2rem",
            "max": "3.5rem"
          }
        },
        {
          "slug": "xxx-large",
          "size": "4rem",
          "name": "3X Large",
          "fluid": {
            "min": "2.5rem",
            "max": "4.5rem"
          }
        }
      ]
    }
  }
}
```

**Font Family Structure**:
- **Primary Font**: Lexend (self-hosted variable font)
- **Fallback Chain**: System fonts for instant rendering
- **Font Weights**: 400-900 (variable font supports all weights)
- **Font Format**: WOFF2 (best compression, 98% browser support)
- **Font Display**: `swap` (show fallback immediately, swap when loaded)

**Font Size Scale**:
- **x-small**: 12px static (labels, meta text)
- **small**: 14px static (captions, small body text)
- **base**: 16px static (standard body text)
- **medium**: 16-18px fluid (large body text)
- **large**: 20-28px fluid (section headings, H3)
- **x-large**: 24-36px fluid (page headings, H2)
- **xx-large**: 32-56px fluid (hero headings, H1)
- **xxx-large**: 40-72px fluid (large hero headings)

**Fluid Typography**:
- `fluid: true` (global): Enables fluid scaling for font sizes
- Per-size `fluid` object: Defines min/max bounds
- WordPress generates `clamp()` CSS automatically
- Formula: `clamp(min, preferred, max)` where preferred scales with viewport

**Typography Capabilities Enabled**:
- `customFontSize`: Allow custom size input
- `fontStyle`: Enable italic toggle
- `fontWeight`: Enable weight selection (400-900)
- `letterSpacing`: Allow spacing adjustment
- `lineHeight`: Enable line height control
- `textDecoration`: Enable underline, strikethrough
- `textTransform`: Enable uppercase, lowercase, capitalize
- `dropCap`: Enable drop cap first letter style

---

### 2.3 Spacing Settings

```json
{
  "settings": {
    "spacing": {
      "blockGap": true,
      "margin": true,
      "padding": true,
      "units": ["px", "em", "rem", "%", "vh", "vw"],
      "customSpacingSize": true,
      "spacingSizes": [
        {
          "slug": "10",
          "size": "0.25rem",
          "name": "Tiny"
        },
        {
          "slug": "20",
          "size": "0.5rem",
          "name": "X-Small"
        },
        {
          "slug": "30",
          "size": "0.75rem",
          "name": "Small"
        },
        {
          "slug": "40",
          "size": "1rem",
          "name": "Regular"
        },
        {
          "slug": "50",
          "size": "clamp(1rem, 2vw, 1.5rem)",
          "name": "Medium"
        },
        {
          "slug": "60",
          "size": "clamp(1.5rem, 3vw, 2rem)",
          "name": "Large"
        },
        {
          "slug": "70",
          "size": "clamp(2rem, 4vw, 3rem)",
          "name": "X-Large"
        },
        {
          "slug": "80",
          "size": "clamp(3rem, 5vw, 4rem)",
          "name": "XX-Large"
        }
      ]
    }
  }
}
```

**Spacing Scale**:
- **10**: 4px (tiny gaps, icon spacing)
- **20**: 8px (small gaps, compact layouts)
- **30**: 12px (default gaps in tight components)
- **40**: 16px (standard spacing, padding)
- **50**: 16-24px fluid (medium spacing, section padding)
- **60**: 24-32px fluid (large spacing, section gaps)
- **70**: 32-48px fluid (extra-large spacing, section padding)
- **80**: 48-64px fluid (section dividers, hero padding)

**Fluid Spacing**:
- Presets 50-80 use `clamp()` for responsive adaptation
- Scales based on viewport width (2-5vw)
- Ensures consistent spacing rhythm across devices

**Spacing Capabilities**:
- `blockGap`: Enable gap between blocks
- `margin`: Enable margin controls
- `padding`: Enable padding controls
- `customSpacingSize`: Allow custom spacing values
- `units`: Supported CSS units for spacing

---

### 2.4 Layout Settings

```json
{
  "settings": {
    "layout": {
      "contentSize": "1200px",
      "wideSize": "1440px"
    },
    "useRootPaddingAwareAlignments": true
  }
}
```

**Layout Constraints**:
- **contentSize**: Maximum width for standard content (1200px)
- **wideSize**: Maximum width for wide-aligned blocks (1440px)
- **Root Padding**: Aware alignments respect container padding

**Usage**:
- Default blocks constrained to `contentSize`
- Wide-aligned blocks (`alignwide`) expand to `wideSize`
- Full-aligned blocks (`alignfull`) span entire viewport
- Container padding maintained at edges

---

### 2.5 Additional Settings

```json
{
  "settings": {
    "appearanceTools": true,
    "border": {
      "color": true,
      "radius": true,
      "style": true,
      "width": true
    },
    "shadow": {
      "defaultPresets": true,
      "presets": [
        {
          "slug": "sm",
          "shadow": "0 1px 2px 0 rgb(0 0 0 / 0.05)",
          "name": "Small"
        },
        {
          "slug": "md",
          "shadow": "0 4px 6px -1px rgb(0 0 0 / 0.1)",
          "name": "Medium"
        },
        {
          "slug": "lg",
          "shadow": "0 10px 15px -3px rgb(0 0 0 / 0.1)",
          "name": "Large"
        },
        {
          "slug": "xl",
          "shadow": "0 20px 25px -5px rgb(0 0 0 / 0.1)",
          "name": "Extra Large"
        }
      ]
    }
  }
}
```

**Appearance Tools**: Enables additional block controls (border, dimensions, position)

**Border Settings**: Full control over border properties

**Shadow Presets**: Pre-defined box shadows for elevation
- **sm**: Subtle card elevation
- **md**: Header, sticky elements
- **lg**: Cards, interactive elements
- **xl**: Modals, elevated content

---

## 3. Styles Section

The `styles` object defines default styling applied globally.

### 3.1 Global Styles

```json
{
  "styles": {
    "color": {
      "background": "var:preset|color|background-light",
      "text": "var:preset|color|text-light"
    },
    "typography": {
      "fontFamily": "var:preset|font-family|primary",
      "fontSize": "var:preset|font-size|base",
      "fontWeight": "400",
      "lineHeight": "1.6"
    },
    "spacing": {
      "padding": {
        "top": "0",
        "right": "var:preset|spacing|40",
        "bottom": "0",
        "left": "var:preset|spacing|40"
      },
      "blockGap": "var:preset|spacing|50"
    }
  }
}
```

**Global Color**: Light background, dark text (default/light mode)

**Global Typography**: Lexend font, 16px base, regular weight, 1.6 line height

**Global Spacing**: Horizontal padding 16px, block gap 24px

**Preset Reference Format**: `var:preset|category|slug`
- Category: `color`, `font-size`, `spacing`, `font-family`
- Slug: Defined in settings.{category}.palette/fontSizes/spacingSizes

---

### 3.2 Element Styles

```json
{
  "styles": {
    "elements": {
      "button": {
        "color": {
          "background": "var:preset|color|cta-yellow",
          "text": "var:preset|color|accent-text"
        },
        "typography": {
          "fontSize": "var:preset|font-size|base",
          "fontWeight": "700"
        },
        "spacing": {
          "padding": {
            "top": "0.875rem",
            "right": "2rem",
            "bottom": "0.875rem",
            "left": "2rem"
          }
        },
        "border": {
          "radius": "0.75rem"
        },
        ":hover": {
          "color": {
            "background": "#e6af00"
          }
        }
      },
      "link": {
        "color": {
          "text": "var:preset|color|primary"
        },
        "typography": {
          "textDecoration": "none"
        },
        ":hover": {
          "typography": {
            "textDecoration": "underline"
          }
        }
      },
      "h1": {
        "typography": {
          "fontSize": "var:preset|font-size|xx-large",
          "fontWeight": "900",
          "lineHeight": "1.2"
        },
        "color": {
          "text": "var:preset|color|primary-dark"
        }
      },
      "h2": {
        "typography": {
          "fontSize": "var:preset|font-size|x-large",
          "fontWeight": "700",
          "lineHeight": "1.3"
        },
        "color": {
          "text": "var:preset|color|primary-dark"
        }
      },
      "h3": {
        "typography": {
          "fontSize": "var:preset|font-size|large",
          "fontWeight": "700",
          "lineHeight": "1.4"
        },
        "color": {
          "text": "var:preset|color|primary-dark"
        }
      },
      "h4": {
        "typography": {
          "fontSize": "var:preset|font-size|medium",
          "fontWeight": "600",
          "lineHeight": "1.5"
        }
      },
      "h5": {
        "typography": {
          "fontSize": "var:preset|font-size|base",
          "fontWeight": "600",
          "lineHeight": "1.5"
        }
      },
      "h6": {
        "typography": {
          "fontSize": "var:preset|font-size|small",
          "fontWeight": "600",
          "lineHeight": "1.5",
          "textTransform": "uppercase",
          "letterSpacing": "0.05em"
        }
      }
    }
  }
}
```

**Button Element**: Yellow CTA buttons with rounded corners, bold text, hover darkening

**Link Element**: Primary blue links, no underline, underline on hover

**Heading Elements**: Progressive size decrease (H1 largest → H6 smallest), consistent dark color, varying weights

---

### 3.3 Block Styles

```json
{
  "styles": {
    "blocks": {
      "core/button": {
        "border": {
          "radius": "0.75rem"
        },
        "variations": {
          "outline": {
            "color": {
              "background": "transparent",
              "text": "var:preset|color|primary"
            },
            "border": {
              "width": "2px",
              "style": "solid",
              "color": "var:preset|color|primary"
            }
          }
        }
      },
      "core/navigation": {
        "typography": {
          "fontSize": "var:preset|font-size|base",
          "fontWeight": "500"
        },
        "spacing": {
          "blockGap": "2rem"
        },
        "elements": {
          "link": {
            "color": {
              "text": "var:preset|color|text-dark"
            },
            ":hover": {
              "color": {
                "text": "var:preset|color|primary"
              }
            }
          }
        }
      },
      "core/post-template": {
        "spacing": {
          "blockGap": "2rem"
        },
        "css": "grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));"
      },
      "core/query-pagination": {
        "typography": {
          "fontSize": "var:preset|font-size|base",
          "fontWeight": "600"
        },
        "elements": {
          "link": {
            "color": {
              "text": "var:preset|color|primary"
            }
          }
        }
      },
      "core/group": {
        "spacing": {
          "padding": {
            "top": "var:preset|spacing|60",
            "bottom": "var:preset|spacing|60"
          },
          "blockGap": "var:preset|spacing|50"
        }
      },
      "core/columns": {
        "spacing": {
          "blockGap": "var:preset|spacing|50"
        }
      }
    }
  }
}
```

**Button Block**: Rounded corners (12px), outline variation defined

**Navigation Block**: Medium weight text, 32px gap between items, hover color change

**Post Template Block**: Responsive CSS Grid with auto-fill (1-4 columns), 32px gap

**Query Pagination Block**: Semi-bold primary blue links

**Group Block**: Large vertical padding (48-64px), medium internal gap (24px)

**Columns Block**: Medium gap between columns (24px)

---

## 4. Template Parts Registration

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
    },
    {
      "name": "sidebar",
      "title": "Sidebar",
      "area": "uncategorized"
    }
  ]
}
```

**Template Part Structure**:
- `name`: File slug (matches `/parts/{name}.html`)
- `title`: Display name in Site Editor
- `area`: Semantic area (`header`, `footer`, `uncategorized`)

**Usage**: Template parts referenced in templates via:
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->
```

---

## 5. Custom Templates Registration

```json
{
  "customTemplates": [
    {
      "name": "page-no-title",
      "title": "Page (No Title)",
      "postTypes": ["page"]
    }
  ]
}
```

**Custom Template Structure**:
- `name`: Template file slug (matches `/templates/{name}.html`)
- `title`: Display name in Page/Post Editor template selector
- `postTypes`: Array of post types this template applies to

**Usage**: Users select custom template from Page Editor → Template dropdown

---

## 6. CSS Custom Properties

WordPress auto-generates CSS custom properties from theme.json:

```css
/* Example generated CSS */
:root {
  --wp--preset--color--primary: #359EFF;
  --wp--preset--color--primary-dark: #2E4F64;
  --wp--preset--font-size--base: 1rem;
  --wp--preset--font-size--x-large: clamp(1.5rem, 4vw, 2.25rem);
  --wp--preset--spacing--40: 1rem;
  --wp--preset--spacing--50: clamp(1rem, 2vw, 1.5rem);
}
```

**Usage in CSS**:
```css
.my-element {
  color: var(--wp--preset--color--primary);
  font-size: var(--wp--preset--font-size--large);
  padding: var(--wp--preset--spacing--50);
}
```

**Usage in theme.json**:
```json
"color": {
  "text": "var:preset|color|primary"
}
```

---

## 7. Validation Checklist

Before deployment, verify:

- [ ] Schema reference correct: `https://schemas.wp.org/wp/6.8/theme.json`
- [ ] Version is integer `3`, not string `"3"`
- [ ] All color slugs are kebab-case (no underscores or camelCase)
- [ ] All hex colors are 6 digits with `#` prefix
- [ ] Font sizes use valid CSS units (rem, px, clamp)
- [ ] Spacing slugs are numeric strings ("10"-"80")
- [ ] Block references use format: `core/block-name`
- [ ] Preset references use format: `var:preset|category|slug`
- [ ] JSON syntax valid (no trailing commas, proper quotes)
- [ ] File saved with UTF-8 encoding (no BOM)

**Validation Tools**:
1. JSON Schema Validator: https://www.jsonschemavalidator.net/
2. WordPress Theme Check Plugin
3. Site Editor test: Appearance → Editor (should open without errors)

---

## 8. Complete theme.json Template

Full annotated template available at: `/theme.json` (800-1000 lines)

Structure overview:
```
{
  "$schema": "...",
  "version": 3,
  "settings": {
    "color": { ... },        // 13 colors, 1 gradient
    "typography": { ... },   // 8 font sizes, 1 font family (Lexend)
    "spacing": { ... },      // 8 spacing presets (10-80)
    "layout": { ... },       // contentSize, wideSize
    "border": { ... },       // Border controls
    "shadow": { ... }        // 4 shadow presets
  },
  "styles": {
    "color": { ... },        // Global background, text
    "typography": { ... },   // Global font family, size
    "spacing": { ... },      // Global padding, blockGap
    "elements": {
      "button": { ... },     // Button element styles
      "link": { ... },       // Link element styles
      "h1": { ... },         // Heading styles (h1-h6)
      ...
    },
    "blocks": {
      "core/button": { ... },      // Button block
      "core/navigation": { ... },  // Navigation block
      "core/post-template": { ... }, // Post grid
      ...
    }
  },
  "templateParts": [ ... ],  // Header, footer, sidebar
  "customTemplates": [ ... ] // Page (No Title)
}
```

---

**End of theme.json Structure Contract**

This contract defines all valid properties, values, and structures for the theme.json configuration file. All theme styling MUST be implemented through this file per WordPress block theme standards.
