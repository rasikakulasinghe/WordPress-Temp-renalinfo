# Performance Optimization Checklist

## Target: 90+ Lighthouse Score

### Lighthouse Audit Testing

#### Test Pages
- [ ] Homepage (index.html)
- [ ] Blog archive page (archive.html)
- [ ] Single post (single.html)
- [ ] Static page (page.html)
- [ ] Run tests in Incognito mode
- [ ] Test on mobile and desktop

#### Lighthouse Scores to Achieve
- [ ] Performance: 90+
- [ ] Accessibility: 95+
- [ ] Best Practices: 95+
- [ ] SEO: 95+

### Font Loading Optimization

#### Lexend Variable Font
- [x] WOFF2 format (smallest file size)
- [x] `font-display: swap` configured in theme.json
- [x] Preloaded in functions.php (if needed)
- [ ] Verify no FOIT (Flash of Invisible Text)
- [ ] Verify no FOUT (Flash of Unstyled Text)
- [ ] Test on slow 3G connection

#### Font Preloading (Optional Enhancement)
```php
// Add to functions.php if font loading is slow
function renalinfo_web_preload_fonts() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/lexend-variable.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'renalinfo_web_preload_fonts', 1);
```

### CSS Optimization

#### Mobile Menu CSS
- [x] Separate file for better caching (mobile-menu.css)
- [x] Critical CSS inlined? (No - acceptable for block theme)
- [ ] Verify no unused CSS rules
- [ ] Check CSS file size (<50KB recommended)
- [ ] Test mobile menu animation performance

#### Editor Styles CSS
- [x] Only loads in block editor (editor-style.css)
- [x] Does not affect frontend performance
- [ ] Verify file size (<100KB)

### JavaScript Optimization

#### Mobile Menu Script
- [x] Loaded in footer (defer by default)
- [x] No jQuery dependency
- [x] Vanilla JS for performance
- [x] Event delegation where applicable
- [ ] Verify no render-blocking JS
- [ ] Test with JS disabled (graceful degradation)

#### Script Loading Strategy
```php
// Verify this configuration in functions.php
wp_enqueue_script(
    'renalinfo-web-mobile-menu-js',
    get_template_directory_uri() . '/assets/js/mobile-menu.js',
    array(),
    $theme_version,
    true // Load in footer
);
```

### Image Optimization

#### Responsive Images
- [x] Mobile image sizes registered (mobile-hero, mobile-content, mobile-thumbnail)
- [x] aspectRatio set on all post-featured-image blocks
- [ ] Verify srcset is generated for all images
- [ ] Test images on mobile devices
- [ ] Check no oversized images loading

#### Image Formats
- [ ] WebP format for all raster images (recommended)
- [ ] SVG for icons and logos
- [ ] Verify no uncompressed PNG/JPG files
- [ ] Check image sizes: hero <200KB, content <100KB, thumbnails <50KB

#### Lazy Loading
- [x] WordPress native lazy loading enabled by default
- [ ] Verify loading="lazy" attribute on images below fold
- [ ] Check hero/featured images NOT lazy loaded
- [ ] Test with DevTools Network throttling

### Caching and Headers

#### Browser Caching
Add to .htaccess (Apache) or nginx config:

**Apache (.htaccess)**
```apache
<IfModule mod_expires.c>
  ExpiresActive On
  
  # Images
  ExpiresByType image/jpg "access plus 1 year"
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/gif "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType image/svg+xml "access plus 1 year"
  
  # Fonts
  ExpiresByType font/woff2 "access plus 1 year"
  ExpiresByType application/font-woff2 "access plus 1 year"
  
  # CSS and JavaScript
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

**Nginx (server block)**
```nginx
location ~* \.(jpg|jpeg|png|gif|webp|svg|woff|woff2)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}

location ~* \.(css|js)$ {
    expires 1M;
    add_header Cache-Control "public";
}
```

#### Caching Checklist
- [ ] Verify static assets have cache headers
- [ ] Test cache-control headers with DevTools
- [ ] Check versioning on CSS/JS files (using theme version)
- [ ] Verify theme updates bust cache properly

### WordPress Performance Optimization

#### Recommended Plugins
- **WP Rocket** (Premium) - Comprehensive caching
- **W3 Total Cache** (Free) - Page caching, minification
- **Autoptimize** (Free) - CSS/JS optimization
- **ShortPixel** (Free tier) - Automatic image compression

#### Plugin Configuration
- [ ] Enable page caching
- [ ] Enable Gzip compression
- [ ] Minify CSS files
- [ ] Minify JavaScript files
- [ ] Defer non-critical JavaScript
- [ ] Enable lazy loading for images/iframes

### Database Optimization

#### Query Performance
- [ ] Install Query Monitor plugin
- [ ] Check for slow database queries
- [ ] Verify no N+1 query problems
- [ ] Test archive page query performance (12 posts query)

#### Database Maintenance
- [ ] Remove post revisions (limit to 3)
- [ ] Delete spam comments
- [ ] Optimize database tables
- [ ] Remove unused plugins/themes

### Third-Party Resources

#### External Resources Audit
- [x] No external font loading (Lexend is local)
- [x] No CDN icon fonts (Material Symbols are inline SVG)
- [ ] Verify no external tracking scripts slow down site
- [ ] Check Google Analytics loads asynchronously
- [ ] Test with third-party blocking enabled

### Hosting Optimization

#### Server Requirements
- [ ] PHP 8.0+ recommended (7.2 minimum)
- [ ] MySQL 5.7+ or MariaDB 10.3+
- [ ] HTTPS enabled (SSL certificate)
- [ ] HTTP/2 support
- [ ] Gzip/Brotli compression enabled

#### Recommended Hosting
- **WordPress.com** (Managed WordPress)
- **WP Engine** (Premium managed hosting)
- **SiteGround** (WordPress optimized)
- **Cloudways** (Managed cloud hosting)

### Mobile Performance

#### Mobile Lighthouse Testing
- [ ] Test on mobile device (real device, not emulator)
- [ ] Verify mobile score 90+
- [ ] Check First Contentful Paint <2s
- [ ] Check Largest Contentful Paint <2.5s
- [ ] Check Cumulative Layout Shift <0.1
- [ ] Check Time to Interactive <3.8s

#### Mobile Menu Performance
- [ ] Test menu open/close animation smoothness
- [ ] Verify no jank on low-end devices
- [ ] Check backdrop overlay transition
- [ ] Test focus trap performance

### Core Web Vitals

#### LCP (Largest Contentful Paint) - Target <2.5s
- [ ] Hero image optimized and properly sized
- [ ] Critical CSS delivered inline (if needed)
- [ ] Fonts load with swap
- [ ] Server response time <600ms

#### FID (First Input Delay) - Target <100ms
- [ ] JavaScript execution time minimized
- [ ] No long-running scripts blocking main thread
- [ ] Event handlers are lightweight

#### CLS (Cumulative Layout Shift) - Target <0.1
- [x] Width and height set on all images (aspectRatio)
- [x] No ads or dynamic content pushing layout
- [ ] Fonts loaded with font-display: swap
- [ ] No layout shifts during page load

### Testing Tools

#### Performance Testing Tools
- **Lighthouse** (Chrome DevTools) - Overall performance
- **WebPageTest** - Detailed waterfall analysis
- **GTmetrix** - Performance grades and recommendations
- **PageSpeed Insights** - Google's performance analysis
- **Pingdom** - Speed test from multiple locations

#### Testing Checklist
- [ ] Lighthouse desktop: 90+ on all pages
- [ ] Lighthouse mobile: 90+ on all pages
- [ ] WebPageTest: Grade A for key metrics
- [ ] GTmetrix: Grade A performance
- [ ] PageSpeed Insights: Good for all Core Web Vitals

### Performance Budget

#### File Size Limits
- CSS (total): <100KB
- JavaScript (total): <100KB
- Images (per page): <500KB total
- Fonts: <100KB (WOFF2 variable font)
- Total page weight: <1MB

#### Current Theme Assets
- style.css: ~15KB
- mobile-menu.css: ~5KB
- editor-style.css: ~8KB
- mobile-menu.js: ~3KB
- lexend-variable.woff2: ~100KB
- **Total: ~131KB** (excellent!)

### Performance Monitoring

#### Ongoing Monitoring
- [ ] Set up performance monitoring (e.g., Pingdom, UptimeRobot)
- [ ] Monitor Core Web Vitals in Google Search Console
- [ ] Set up alerts for performance degradation
- [ ] Review Lighthouse scores monthly
- [ ] Test after theme/plugin updates

### Performance Test Results Template

```markdown
## Performance Test Results

**Date:** [YYYY-MM-DD]
**Tester:** [Name]
**Tools Used:** Lighthouse, WebPageTest, GTmetrix

### Lighthouse Scores

#### Homepage (Desktop)
- Performance: [Score]/100
- Accessibility: [Score]/100
- Best Practices: [Score]/100
- SEO: [Score]/100

#### Homepage (Mobile)
- Performance: [Score]/100
- Accessibility: [Score]/100
- Best Practices: [Score]/100
- SEO: [Score]/100

### Core Web Vitals
- LCP: [X.X]s (Target: <2.5s)
- FID: [X]ms (Target: <100ms)
- CLS: [0.XX] (Target: <0.1)

### Page Load Metrics
- First Contentful Paint: [X.X]s
- Time to Interactive: [X.X]s
- Total Blocking Time: [X]ms
- Speed Index: [X.X]s

### File Sizes
- CSS: [XX]KB
- JavaScript: [XX]KB
- Images: [XX]KB
- Fonts: [XX]KB
- Total: [XX]KB

### Issues Found
1. [Description]
   - Severity: [High/Medium/Low]
   - Fix: [Solution]
   - Status: [Fixed/In Progress]

### Recommendations
1. [Recommendation]
2. [Recommendation]
```

## Performance Optimization Completed

- [x] Font loading optimized (WOFF2, font-display: swap)
- [x] Mobile menu CSS/JS separate files
- [x] Responsive image sizes registered
- [x] No external dependencies
- [x] Minimal asset footprint (<150KB total)
- [ ] Lighthouse tests passed (90+)
- [ ] Cache headers configured
- [ ] WebP images implemented (recommended)
