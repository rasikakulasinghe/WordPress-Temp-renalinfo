# Project Context

## Purpose
A WordPress block theme (based on Twenty Twenty-Five) emphasizing simplicity, adaptability, and accessibility. The theme supports flexible design options for personal blogs, professional portfolios, online magazines, and business websites. It provides extensive block patterns for various page types including services, landing pages, portfolios, podcasts, events, and e-commerce.

## Tech Stack
- **WordPress**: 6.7+ (Full Site Editing / Block Theme)
- **PHP**: 7.2+
- **HTML**: Block-based HTML templates in `templates/` and `parts/` directories
- **CSS**: Custom CSS in `style.css` with focus styles, link styles, and progressive enhancements
- **theme.json**: Schema version 3 for global styles and settings
- **JavaScript**: Minimal (WordPress block editor handles most interactivity)

## Project Conventions

### Code Style
- **PHP Standards**: Follow WordPress Coding Standards (WPCS)
- **Function Naming**: Prefix all functions with `twentytwentyfive_` to avoid conflicts
- **Function Documentation**: Use PHPDoc blocks with `@since`, `@return`, and `@param` tags
- **Text Domain**: `twentytwentyfive` for all translatable strings
- **Escaping**: Always use WordPress escaping functions (`esc_html__()`, `esc_attr__()`, etc.)
- **Conditional Function Loading**: Wrap functions in `if ( ! function_exists() )` checks
- **Hook Priority**: Use standard WordPress action/filter priority conventions
- **Indentation**: Tabs for PHP, as per WordPress standards
- **File Organization**:
  - Core functionality in `functions.php`
  - Block patterns in `patterns/` directory (PHP files)
  - HTML templates in `templates/` and `parts/` directories
  - Assets in `assets/` directory

### Architecture Patterns
- **Full Site Editing (FSE)**: Leverages WordPress block theme architecture
- **Template Hierarchy**: Uses WordPress template hierarchy with HTML templates
- **Template Parts**: Reusable components in `parts/` (header, footer, sidebar, etc.)
- **Block Patterns**: Pre-designed layouts organized by category (pages, post formats, heroes, CTAs, etc.)
- **Block Styles**: Custom block variations registered via PHP
- **Block Bindings**: Custom data sources for dynamic content (e.g., post format names)
- **theme.json Schema**: Centralized design system configuration (colors, spacing, typography, layout)
- **Pattern Categories**: Custom pattern organization (`twentytwentyfive_page`, `twentytwentyfive_post-format`)
- **Post Formats**: Support for aside, audio, chat, gallery, image, link, quote, status, video
- **Progressive Enhancement**: CSS features that enhance experience without breaking fallbacks

### Design System (theme.json)
- **Color Palette**: Base, Contrast, 6 Accent colors (including color-mix support)
- **Spacing Scale**: 7 sizes from Tiny (10px) to XX-Large (clamp-based responsive)
- **Layout**: Content width 645px, Wide width 1340px
- **Typography**: International typography support with multiple font families
- **Responsive Design**: Uses CSS clamp() for fluid spacing and typography
- **Accessibility**: WCAG-compliant focus styles, semantic HTML, RTL language support

### Testing Strategy
- **Manual Testing**: Test in WordPress 6.7+ environments
- **Browser Testing**: Cross-browser compatibility (modern browsers)
- **Responsive Testing**: Mobile, tablet, desktop viewports
- **Accessibility Testing**: Screen readers, keyboard navigation, color contrast
- **RTL Testing**: Right-to-left language support verification
- **Block Editor Testing**: Verify patterns and blocks render correctly in editor and frontend

### Git Workflow
- Standard WordPress theme development workflow
- Version tracking in `style.css` header (currently 1.3)
- Follow semantic versioning for releases
- Test changes in local WordPress environment before committing

## Domain Context

### WordPress Block Theme Concepts
- **Block Patterns**: Reusable pre-designed block compositions stored as PHP files in `patterns/`
- **Template Parts**: Reusable sections (header, footer) stored in `parts/` as HTML files
- **Templates**: Full page templates in `templates/` directory (HTML files)
- **Global Styles**: Design tokens and presets defined in `theme.json`
- **Block Styles**: Custom styling variations for core blocks
- **Block Bindings**: Dynamic data sources that can be bound to block attributes

### Pattern Categories
- **Pages**: Full page layouts (business, portfolio, shop, link-in-bio, landing pages)
- **Post Formats**: Templates for different post types (audio, link, binding-format)
- **Blog Styles**: News blog, photo blog, text blog, vertical header blog variants
- **Headers/Footers**: Multiple header and footer variations
- **Heroes/Banners**: Large intro sections with various layouts
- **CTAs**: Call-to-action sections (newsletter, events, products, search)
- **Content Sections**: Services, pricing, testimonials, FAQs, team photos
- **Media**: Instagram grids, video grids, overlapped images
- **Contact**: Location info, social links, centered layouts
- **Hidden Patterns**: Utility patterns (404, search, sidebar, comments)

### Template Variants
- Standard templates (single, page, archive, home, 404, search)
- Blog style variants (news, photo, text, vertical-header, offset)
- Query loop templates for different blog layouts

## Important Constraints

### WordPress Requirements
- **Minimum WordPress**: 6.7
- **Minimum PHP**: 7.2
- **Block Editor**: Must use FSE/Gutenberg (no classic editor support)
- **No jQuery**: Avoid jQuery dependencies; use vanilla JS if needed
- **Performance**: Minimize HTTP requests, optimize assets

### Theme Standards
- **i18n Ready**: All strings must be translatable
- **Accessibility Ready**: Must meet WordPress accessibility requirements
- **No Plugin Dependencies**: Theme must work without additional plugins
- **Child Theme Safe**: Functions wrapped in `function_exists()` checks
- **GPL Licensed**: All code must be GPL v2+ compatible

### File Structure Constraints
- Block patterns must be PHP files in `patterns/` directory
- Templates must be HTML files in `templates/` directory
- Template parts must be HTML files in `parts/` directory
- `theme.json` must validate against WordPress schema
- `style.css` header must contain required theme metadata

## External Dependencies

### WordPress Core
- **Block Editor (Gutenberg)**: Core block library
- **Full Site Editing API**: Template editing, global styles
- **Theme JSON API**: Design system configuration
- **Block Patterns API**: Pattern registration and rendering
- **Block Styles API**: Custom block style variations
- **Block Bindings API**: Dynamic data binding (WP 6.5+)

### Browser Features
- **CSS Custom Properties**: For design tokens
- **CSS Grid/Flexbox**: For layouts
- **CSS Clamp**: For responsive sizing
- **CSS color-mix()**: For dynamic color generation
- **text-wrap: pretty**: Progressive enhancement for typography

### WordPress Functions Used
- `add_theme_support()`: Feature enablement
- `register_block_style()`: Custom block styles
- `register_block_pattern_category()`: Pattern organization
- `register_block_bindings_source()`: Custom data sources
- `wp_enqueue_style()`: Asset loading
- `add_editor_style()`: Editor stylesheet
- Theme template hierarchy functions
