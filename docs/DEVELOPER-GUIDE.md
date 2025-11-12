# Developer Documentation

## Theme Architecture

### Overview
RenalInfoLK Web is a WordPress 6.7+ block theme built with full site editing (FSE) capabilities. The theme follows WordPress coding standards and best practices for maintainability and extensibility.

### Technology Stack
- **WordPress**: 6.7+ (Block Theme API)
- **theme.json**: v3 schema
- **PHP**: 7.2+ (tested up to 8.2)
- **CSS**: Modern CSS with CSS Grid, Flexbox, Custom Properties
- **JavaScript**: Vanilla ES6+ (no dependencies)
- **Font**: Lexend Variable (WOFF2)
- **Icons**: Material Symbols (inline SVG)

## Directory Structure

```
renalinfo-web/
├── assets/
│   ├── css/
│   │   ├── editor-style.css         # Block editor enhancements
│   │   └── mobile-menu.css          # Mobile navigation styles
│   ├── fonts/
│   │   └── lexend-variable.woff2    # Primary font file
│   ├── images/
│   │   └── hero-illustration.webp   # Placeholder images
│   └── js/
│       └── mobile-menu.js           # Mobile menu interactions
├── docs/
│   ├── ACCESSIBILITY-TESTING.md     # Accessibility test checklist
│   ├── COLOR-ACCESSIBILITY.md       # Color contrast guide
│   └── PERFORMANCE-OPTIMIZATION.md  # Performance checklist
├── parts/
│   ├── footer.html                  # Footer template part
│   ├── header.html                  # Header with mobile menu
│   └── sidebar.html                 # Sidebar template part
├── patterns/
│   ├── hero-simple.php              # Text-only hero
│   ├── hero-centered.php            # Full-width centered hero
│   ├── content-two-column.php       # 50/50 content layout
│   ├── content-resources-grid.php   # 3-column resources
│   ├── content-news-grid.php        # Blog post grid
│   ├── cta-webinar.php              # Event announcement CTA
│   ├── cta-boxed.php                # Boxed CTA with border
│   ├── cta-inline.php               # Minimal inline CTA
│   ├── cta-contact.php              # Contact form CTA
│   ├── cta-newsletter.php           # Newsletter signup CTA
│   └── hidden-post-meta.php         # Reusable post metadata
├── styles/
│   ├── dark-mode.json               # Dark theme variation
│   └── high-contrast.json           # High contrast variation
├── templates/
│   ├── index.html                   # Default blog template
│   ├── single.html                  # Single post template
│   ├── page.html                    # Static page template
│   ├── archive.html                 # Archive/category template
│   ├── search.html                  # Search results template
│   └── 404.html                     # Error page template
├── functions.php                    # Theme functions
├── style.css                        # Theme stylesheet (metadata only)
├── theme.json                       # Theme configuration
├── README.txt                       # Theme documentation
└── LICENSE.txt                      # GPL v2 license
```

## Key Files

### theme.json
**Purpose:** Central configuration for theme settings, styles, and patterns.

**Key Sections:**
- `settings.color.palette` - 13-color medical palette
- `settings.spacing.spacingScale` - 8-step spacing system (20-80)
- `settings.typography.fontSizes` - Fluid typography (xs-3xl)
- `settings.typography.fontFamilies` - Lexend variable font
- `styles.blocks` - Block-specific styling overrides

**Customization:**
```json
{
  "settings": {
    "color": {
      "palette": [
        {
          "slug": "primary",
          "color": "#359EFF",
          "name": "Primary Blue"
        }
      ]
    }
  }
}
```

### functions.php
**Purpose:** Theme setup, asset enqueuing, and custom functionality.

**Key Functions:**
- `renalinfo_web_setup()` - Theme support features
- `renalinfo_web_enqueue_styles()` - Main stylesheet
- `renalinfo_web_enqueue_mobile_menu()` - Mobile menu assets
- `renalinfo_web_editor_styles()` - Editor stylesheet
- `renalinfo_web_pattern_categories()` - Register pattern categories
- `renalinfo_web_register_block_styles()` - Custom block styles

**Adding Custom Functions:**
```php
function renalinfo_web_custom_function() {
    // Your code here
}
add_action('init', 'renalinfo_web_custom_function');
```

### Mobile Menu System

#### mobile-menu.css
**CSS Variables:**
```css
:root {
    --mobile-menu-width: 300px;
    --mobile-menu-transition: 0.3s ease-in-out;
}
```

**Key Classes:**
- `.mobile-menu-toggle` - Hamburger button
- `.mobile-menu-drawer` - Slide-in menu container
- `.mobile-menu-backdrop` - Overlay background
- `.is-open` - Active state for body/menu

#### mobile-menu.js
**Functions:**
- `initMobileMenu()` - Initialize all listeners
- `openMenu()` - Open drawer with ARIA updates
- `closeMenu()` - Close drawer and return focus
- `trapFocus()` - Keep focus within menu when open

**Event Listeners:**
- Toggle button click
- Backdrop click
- Escape key press
- Window resize
- Menu link clicks (auto-close)

**Extending:**
```javascript
// Add custom behavior after menu opens
function openMenu() {
    // Existing code...
    
    // Custom enhancement
    document.dispatchEvent(new CustomEvent('menuOpened'));
}
```

## Block Pattern Development

### Pattern File Structure
```php
<?php
/**
 * Title: Pattern Display Name
 * Slug: renalinfo-web/pattern-slug
 * Categories: renalinfo-web-heroes|renalinfo-web-cta|renalinfo-web-content
 * Keywords: keyword1, keyword2, keyword3
 * Block Types: core/group
 * Viewport Width: 1440
 */
?>
<!-- Block markup here -->
```

### Creating a New Pattern

1. **Create PHP file** in `/patterns/` directory
2. **Add header comment** with metadata
3. **Add block markup** using HTML comments
4. **Test in Site Editor** → Patterns panel

**Example:**
```php
<?php
/**
 * Title: Medical Alert Banner
 * Slug: renalinfo-web/medical-alert
 * Categories: renalinfo-web-cta
 * Keywords: alert, banner, medical, urgent
 * Block Types: core/group
 * Viewport Width: 1440
 */
?>
<!-- wp:group {"backgroundColor":"accent","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-group has-accent-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
    <!-- wp:heading {"level":3,"textColor":"primary-dark"} -->
    <h3 class="wp-block-heading has-primary-dark-color has-text-color">Important Medical Notice</h3>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph -->
    <p>This is an alert message for important medical information.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
```

### Pattern Categories

**Registering Custom Category:**
```php
function renalinfo_web_pattern_categories() {
    register_block_pattern_category(
        'renalinfo-web-custom',
        array(
            'label'       => __( 'Custom Category', 'renalinfo-web' ),
            'description' => __( 'Custom patterns', 'renalinfo-web' ),
        )
    );
}
add_action( 'init', 'renalinfo_web_pattern_categories' );
```

## Block Customization

### Registering Block Styles

**In functions.php:**
```php
function renalinfo_web_register_block_styles() {
    register_block_style(
        'core/button',
        array(
            'name'  => 'medical-cta',
            'label' => __( 'Medical CTA', 'renalinfo-web' ),
        )
    );
}
add_action( 'init', 'renalinfo_web_register_block_styles' );
```

**Styling in style.css or theme.json:**
```css
.wp-block-button.is-style-medical-cta .wp-block-button__link {
    background: var(--wp--preset--color--green-blue);
    color: var(--wp--preset--color--background-light);
    border-radius: var(--wp--custom--border-radius--full);
    padding: 1rem 2rem;
}
```

### Block Styling in theme.json

**Per-block configuration:**
```json
{
  "styles": {
    "blocks": {
      "core/button": {
        "border": {
          "radius": "var(--wp--preset--border--radius--full)"
        },
        "spacing": {
          "padding": {
            "top": "0.75rem",
            "bottom": "0.75rem",
            "left": "1.5rem",
            "right": "1.5rem"
          }
        },
        "variations": {
          "outline": {
            "border": {
              "width": "2px",
              "style": "solid",
              "color": "var(--wp--preset--color--primary)"
            },
            "color": {
              "background": "transparent",
              "text": "var(--wp--preset--color--primary)"
            }
          }
        }
      }
    }
  }
}
```

## Style Variations

### Creating a Style Variation

1. **Create JSON file** in `/styles/` directory
2. **Define color overrides**
3. **Test in Site Editor** → Styles → Browse styles

**Example: Medical Green Theme**
```json
{
  "version": 3,
  "title": "Medical Green",
  "settings": {
    "color": {
      "palette": [
        {
          "slug": "primary",
          "color": "#006D77",
          "name": "Primary"
        },
        {
          "slug": "secondary",
          "color": "#83C5BE",
          "name": "Secondary"
        }
      ]
    }
  }
}
```

## Custom Block Development

### Registering a Custom Block

**Create block.json:**
```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 3,
  "name": "renalinfo-web/medical-card",
  "title": "Medical Card",
  "category": "widgets",
  "icon": "heart",
  "description": "Display medical information in a card layout",
  "attributes": {
    "title": {
      "type": "string",
      "default": ""
    }
  },
  "supports": {
    "color": {
      "background": true,
      "text": true
    }
  },
  "textdomain": "renalinfo-web",
  "editorScript": "file:./block.js",
  "style": "file:./style.css"
}
```

**Register in functions.php:**
```php
function renalinfo_web_register_blocks() {
    register_block_type( __DIR__ . '/blocks/medical-card' );
}
add_action( 'init', 'renalinfo_web_register_blocks' );
```

## Hooks and Filters

### Available Hooks

**Theme Setup:**
```php
// Modify theme support features
add_action('after_setup_theme', 'custom_theme_setup', 11);
function custom_theme_setup() {
    // Add custom image size
    add_image_size('custom-size', 800, 600, true);
}
```

**Enqueue Assets:**
```php
// Add custom stylesheet
add_action('wp_enqueue_scripts', 'custom_enqueue_assets');
function custom_enqueue_assets() {
    wp_enqueue_style(
        'custom-styles',
        get_stylesheet_directory_uri() . '/custom.css',
        array('renalinfo-web-style'),
        '1.0.0'
    );
}
```

**Modify Block Patterns:**
```php
// Filter pattern content before registration
add_filter('renalinfo_web_pattern_content', 'modify_pattern_content');
function modify_pattern_content($content) {
    // Modify pattern markup
    return $content;
}
```

### Common Filters

**Document Title:**
```php
add_filter('wp_title', 'custom_document_title', 10, 2);
function custom_document_title($title, $sep) {
    return $title . ' | Medical Knowledge Platform';
}
```

**Body Class:**
```php
add_filter('body_class', 'custom_body_class');
function custom_body_class($classes) {
    if (is_page('about')) {
        $classes[] = 'about-page';
    }
    return $classes;
}
```

## Child Theme Development

### Creating a Child Theme

**1. Create directory:** `renalinfo-web-child/`

**2. Create style.css:**
```css
/*
Theme Name:   RenalInfoLK Web Child
Theme URI:    https://renalinfo.lk
Description:  Child theme for RenalInfoLK Web
Author:       Your Name
Template:     renalinfo-web
Version:      1.0.0
*/
```

**3. Create functions.php:**
```php
<?php
function renalinfo_web_child_enqueue_styles() {
    wp_enqueue_style(
        'renalinfo-web-parent-style',
        get_template_directory_uri() . '/style.css'
    );
    
    wp_enqueue_style(
        'renalinfo-web-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('renalinfo-web-parent-style')
    );
}
add_action('wp_enqueue_scripts', 'renalinfo_web_child_enqueue_styles');
```

**4. Override theme.json (optional):**
Create `theme.json` in child theme to override parent settings.

## Testing and Debugging

### Debug Mode

**Enable in wp-config.php:**
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', true); // Use unminified JS
```

### Common Debugging

**Check for PHP errors:**
```php
// functions.php
error_log('Debug message: ' . print_r($variable, true));
```

**Browser Console:**
```javascript
// mobile-menu.js
console.log('Menu opened:', menuState);
```

**Theme Check Plugin:**
```bash
# Install Theme Check plugin
wp plugin install theme-check --activate

# Scan theme for issues
# Visit Tools → Theme Check in admin
```

### Testing Checklist

- [ ] PHP errors in debug.log
- [ ] JavaScript console errors
- [ ] Lighthouse accessibility scan
- [ ] Keyboard navigation test
- [ ] Screen reader test (NVDA/VoiceOver)
- [ ] Mobile device testing
- [ ] Cross-browser testing (Chrome, Firefox, Safari, Edge)
- [ ] Theme Check plugin validation
- [ ] PHPCS WordPress coding standards

## Performance Optimization

### Asset Loading

**Conditional Loading:**
```php
function renalinfo_web_conditional_assets() {
    // Only load mobile menu on pages with navigation
    if (has_nav_menu('primary')) {
        wp_enqueue_script('renalinfo-web-mobile-menu-js');
    }
}
add_action('wp_enqueue_scripts', 'renalinfo_web_conditional_assets', 11);
```

**Defer/Async Scripts:**
```php
function renalinfo_web_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('renalinfo-web-mobile-menu-js');
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'renalinfo_web_defer_scripts', 10, 3);
```

### Database Optimization

**Limit Post Revisions:**
```php
// wp-config.php
define('WP_POST_REVISIONS', 3);
define('AUTOSAVE_INTERVAL', 300); // 5 minutes
```

**Optimize Queries:**
```php
// Use transients for expensive queries
$posts = get_transient('renalinfo_featured_posts');
if (false === $posts) {
    $posts = get_posts(array(/* args */));
    set_transient('renalinfo_featured_posts', $posts, HOUR_IN_SECONDS);
}
```

## Deployment

### Pre-Deployment Checklist

- [ ] Remove development files (.git, node_modules)
- [ ] Test on staging environment
- [ ] Run Theme Check plugin
- [ ] Validate theme.json schema
- [ ] Test all templates and patterns
- [ ] Verify accessibility compliance
- [ ] Run performance audits
- [ ] Update version numbers
- [ ] Update README.txt changelog
- [ ] Create theme ZIP file

### Creating Distribution ZIP

```bash
# From parent directory
zip -r renalinfo-web.zip renalinfo-web/ \
  -x "*.git*" \
  -x "*node_modules*" \
  -x "*.DS_Store" \
  -x "*__MACOSX*"
```

### Version Control

**Semantic Versioning:**
- Major: 1.0.0 (breaking changes)
- Minor: 1.1.0 (new features, backward compatible)
- Patch: 1.0.1 (bug fixes)

**Update Locations:**
1. style.css header (Version: 1.0.1)
2. README.txt (Stable tag: 1.0.1)
3. Changelog in README.txt

## Support and Resources

### WordPress Resources
- [Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [Theme Handbook](https://developer.wordpress.org/themes/)
- [theme.json Reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/)
- [Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)

### Tools
- [Theme Check Plugin](https://wordpress.org/plugins/theme-check/)
- [Query Monitor](https://wordpress.org/plugins/query-monitor/)
- [Debug Bar](https://wordpress.org/plugins/debug-bar/)
- [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)

### Community
- [WordPress Support Forums](https://wordpress.org/support/forums/)
- [WordPress Stack Exchange](https://wordpress.stackexchange.com/)
- [Make WordPress Themes](https://make.wordpress.org/themes/)

## License

This theme is licensed under GPL v2 or later.
Copyright (C) 2025 RenalInfoLK
