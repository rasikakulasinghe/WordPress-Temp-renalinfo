# RenalInfoLK Web Theme - User Guide

## Table of Contents
1. [Getting Started](#getting-started)
2. [Theme Installation](#theme-installation)
3. [Site Editor Basics](#site-editor-basics)
4. [Customizing Colors](#customizing-colors)
5. [Using Block Patterns](#using-block-patterns)
6. [Creating Pages](#creating-pages)
7. [Creating Blog Posts](#creating-blog-posts)
8. [Mobile Menu](#mobile-menu)
9. [SEO Configuration](#seo-configuration)
10. [Troubleshooting](#troubleshooting)

---

## Getting Started

### What is a Block Theme?
RenalInfoLK Web is a "block theme" that uses WordPress's Full Site Editing (FSE). This means you can customize every part of your site using blocks - no coding required!

### Requirements
- WordPress 6.7 or higher
- PHP 7.2 or higher
- Modern web browser (Chrome, Firefox, Safari, or Edge)

### What You Can Customize
- **Colors**: Change the entire color scheme
- **Typography**: Adjust font sizes and spacing
- **Headers & Footers**: Design your site structure
- **Page Layouts**: Use pre-designed patterns
- **Blog Archives**: Customize how posts are displayed
- **Individual Posts**: Control post templates

---

## Theme Installation

### Method 1: Via WordPress Admin (Recommended)

1. **Download the theme ZIP file**
   - Save `renalinfo-web.zip` to your computer

2. **Go to WordPress Admin**
   - Log in to your WordPress site
   - Navigate to **Appearance → Themes**

3. **Upload Theme**
   - Click **Add New** at the top
   - Click **Upload Theme**
   - Click **Choose File** and select `renalinfo-web.zip`
   - Click **Install Now**

4. **Activate Theme**
   - Once installed, click **Activate**
   - Your site now uses RenalInfoLK Web!

### Method 2: Via FTP

1. **Extract ZIP file** on your computer
2. **Connect via FTP** to your web server
3. **Upload folder** to `/wp-content/themes/`
4. **Go to WordPress Admin** → Appearance → Themes
5. **Activate** RenalInfoLK Web

---

## Site Editor Basics

### Accessing the Site Editor

1. Go to **Appearance → Editor**
2. You'll see your homepage with editing options

### Site Editor Interface

```
┌─────────────────────────────────────────┐
│  [←] Templates | Patterns | Styles      │ ← Top Bar
├─────────────────────────────────────────┤
│  Sidebar                 Preview        │
│  ┌──────────┐    ┌──────────────────┐  │
│  │Templates │    │                  │  │
│  │Patterns  │    │   Your Site      │  │
│  │Styles    │    │   Preview        │  │
│  └──────────┘    └──────────────────┘  │
└─────────────────────────────────────────┘
```

### Key Site Editor Areas

**Templates** (left sidebar)
- Index (homepage)
- Single Post
- Page
- Archive
- 404 Error

**Patterns** (Insert menu)
- Heroes (large headers)
- CTAs (call-to-actions)
- Content sections

**Styles** (right panel)
- Colors
- Typography
- Spacing
- Browse style variations

---

## Customizing Colors

### Using the Color Palette

1. **Open Site Editor**
   - Go to **Appearance → Editor**

2. **Access Styles Panel**
   - Click **Styles** (paintbrush icon) in top-right
   - Click **Colors**

3. **Edit Color Palette**
   - Click on any color swatch
   - Choose a new color using the picker
   - Or enter a hex code (e.g., `#359EFF`)

### Theme Colors Explained

| Color Name | Default | Usage |
|------------|---------|-------|
| **Primary Blue** | #359EFF | Main brand color, links |
| **Primary Dark** | #2E4F64 | Headings, dark text |
| **Secondary Light Blue** | #BDE0FE | Backgrounds, accents |
| **Green Blue** | #006D77 | Medical accent |
| **CTA Yellow** | #FFC300 | Call-to-action buttons |
| **Accent Peach** | #FFD28E | Highlights, banners |
| **Background Light** | #F5F7F8 | Page background |
| **Text Light** | #4A4A4A | Body text |

### Color Accessibility Tips

⚠️ **Important**: Maintain WCAG AA contrast ratios (4.5:1 for text)

✅ **Safe Combinations:**
- Primary Dark text on Background Light ✓
- Text Light on Background Light ✓
- White text on Primary Blue ✓
- Accent Text on CTA Yellow ✓

❌ **Avoid:**
- Secondary Light Blue text on Background Light (too low contrast)
- CTA Yellow text on Background Light (insufficient contrast)

### Using Style Variations

1. **Open Styles Panel**
   - Appearance → Editor → Styles

2. **Browse Styles**
   - Click **Browse styles** at the bottom

3. **Choose Variation**
   - **Default**: Standard medical theme
   - **Dark Mode**: Dark background theme
   - **High Contrast**: Enhanced accessibility (7:1 ratios)

4. **Apply**
   - Click variation to preview
   - Click **Save** to apply

---

## Using Block Patterns

### What are Block Patterns?
Pre-designed layouts you can insert with one click. No need to build from scratch!

### Hero Patterns (Large Headers)

#### Hero - Simple
- **Usage**: Text-only page headers
- **Best for**: About page, service pages
- **Insert**: Add block → Patterns → "Hero - Simple"

#### Hero - Centered
- **Usage**: Full-width centered hero with dual CTAs
- **Best for**: Homepage, landing pages
- **Includes**: Large heading, description, 2 buttons

### CTA Patterns (Call-to-Actions)

#### CTA - Webinar
- **Usage**: Event/webinar announcements
- **Best for**: Upcoming events, workshops
- **Includes**: Icon, date/time, register button

#### CTA - Boxed
- **Usage**: Prominent call-to-action with border
- **Best for**: Consultation requests, key conversions
- **Includes**: Centered content, primary button

#### CTA - Inline
- **Usage**: Subtle CTAs within content
- **Best for**: Downloads, guides, resources
- **Includes**: Text + button (no background)

#### CTA - Contact
- **Usage**: Contact information with form
- **Best for**: Contact pages
- **Includes**: Address/phone/email icons, form area

#### CTA - Newsletter
- **Usage**: Email newsletter signup
- **Best for**: Building email list
- **Includes**: Mail icon, form placeholder, privacy text

### Content Patterns

#### Content - Two Column
- **Usage**: Text alongside image
- **Best for**: Feature descriptions, services
- **Layout**: 50/50 split

#### Content - Resources Grid
- **Usage**: Showcase 3 types of resources
- **Best for**: Homepage, resources page
- **Includes**: Articles, Videos, Posters with icons

#### Content - News Grid
- **Usage**: Display 3 recent blog posts
- **Best for**: Homepage blog section
- **Automatically pulls**: Latest posts

### How to Insert Patterns

1. **Edit a Page or Template**
   - Pages → Add New or Edit existing
   - Or Appearance → Editor (for templates)

2. **Click (+) Button**
   - Click blue (+) in top-left or within content

3. **Search for Pattern**
   - Click **Patterns** tab
   - Type pattern name (e.g., "hero")
   - Or browse **RenalInfo Heroes**, **RenalInfo CTAs**, **RenalInfo Content**

4. **Insert Pattern**
   - Click pattern to insert
   - Customize text, colors, buttons

5. **Save**
   - Click **Update** (pages) or **Save** (templates)

---

## Creating Pages

### Creating a New Page

1. **Go to Pages**
   - WordPress Admin → **Pages → Add New**

2. **Add Page Title**
   - Type your page title (e.g., "About Us")

3. **Add Content Using Patterns**
   - Click (+) → Patterns → Choose a hero pattern
   - Add content sections
   - Add CTA pattern at the bottom

4. **Example Page Structure**
   ```
   Hero - Centered (intro)
   ↓
   Content - Two Column (features)
   ↓
   Content - Resources Grid (resources)
   ↓
   CTA - Contact (contact info)
   ```

5. **Publish**
   - Click **Publish** in top-right

### Recommended Page Layouts

**Homepage:**
- Hero - Centered
- Content - Resources Grid
- Content - News Grid
- CTA - Newsletter

**About Page:**
- Hero - Simple
- Content - Two Column (mission)
- Content - Two Column (team)
- CTA - Contact

**Contact Page:**
- Hero - Simple
- CTA - Contact (with form)

**Services Page:**
- Hero - Simple
- Multiple Content - Two Column sections
- CTA - Boxed (consultation)

---

## Creating Blog Posts

### Writing a New Post

1. **Go to Posts**
   - WordPress Admin → **Posts → Add New**

2. **Add Post Title**
   - Type a descriptive title
   - Example: "Managing Pediatric Kidney Disease"

3. **Set Featured Image**
   - Click **Set featured image** in right sidebar
   - Upload or select an image
   - **Important**: Add descriptive alt text for accessibility

4. **Write Content**
   - Use paragraph blocks for body text
   - Use heading blocks (H2, H3) for sections
   - Add images with captions

5. **Add Categories**
   - Right sidebar → Categories
   - Check existing or create new

6. **Add Tags**
   - Right sidebar → Tags
   - Type relevant medical keywords

7. **SEO (if using Yoast/Rank Math)**
   - Scroll down to SEO section
   - Add focus keyword
   - Write meta description (150-160 characters)
   - Review content analysis

8. **Publish**
   - Click **Publish** button

### Post Formatting Tips

**Use Headings Hierarchy:**
```
H1: Post Title (automatic)
├─ H2: Main Section
│  ├─ H3: Subsection
│  └─ H3: Subsection
└─ H2: Another Main Section
   └─ H3: Subsection
```

**Add Visual Interest:**
- Featured image at top (16:9 ratio recommended)
- Break up text with subheadings
- Use lists for easy scanning
- Add relevant images throughout

**Medical Content Best Practices:**
- Cite sources
- Add medical disclaimer if needed
- Include author credentials
- Use patient-friendly language
- Link to related articles

---

## Mobile Menu

### How It Works

On mobile devices (<768px), the main navigation automatically becomes a slide-in drawer menu.

### Mobile Menu Features

- **Hamburger Icon**: Tap to open menu
- **Slide-in Drawer**: Menu slides from right
- **Backdrop**: Dark overlay behind menu
- **Close Button**: X icon to close
- **Keyboard Accessible**: Tab navigation, Escape to close

### Testing Mobile Menu

1. **Resize Browser**
   - Make window narrower than 768px
   - Hamburger icon should appear

2. **Click Menu Icon**
   - Menu slides in from right
   - Page content is locked (no scrolling)

3. **Close Menu**
   - Click X button
   - Or click backdrop
   - Or press Escape key

### Customizing Mobile Menu

1. **Edit Header**
   - Appearance → Editor → Template Parts → Header

2. **Edit Navigation Block**
   - Click on Navigation block
   - Modify menu items

3. **Save**
   - Click Save button

---

## SEO Configuration

### Step 1: Install SEO Plugin

**Recommended: Yoast SEO**

1. **Go to Plugins → Add New**
2. **Search** for "Yoast SEO"
3. **Install** and **Activate**
4. **Run configuration wizard**

### Step 2: Configure Permalinks

1. **Go to Settings → Permalinks**
2. **Select** "Post name"
3. **Save Changes**

**Result:** Clean URLs like `yoursite.com/pediatric-kidney-disease/`

### Step 3: XML Sitemap

**WordPress has built-in sitemap at:**
`https://yoursite.com/wp-sitemap.xml`

**Submit to Google:**
1. Go to [Google Search Console](https://search.google.com/search-console)
2. Add your site
3. Go to Sitemaps
4. Enter `wp-sitemap.xml`
5. Submit

### Step 4: Optimize Each Post

**For Every Blog Post:**
- ✅ Add focus keyword to title
- ✅ Write unique meta description
- ✅ Add alt text to all images
- ✅ Use headings (H2, H3) properly
- ✅ Add internal links to related posts
- ✅ Choose appropriate categories/tags

### Step 5: Medical Content SEO

**E-A-T (Expertise, Authoritativeness, Trustworthiness):**
- Display author credentials (MD, RN, etc.)
- Link to reputable medical sources
- Add medical review dates
- Include disclaimers where needed

**Example Author Bio:**
```
Dr. Jane Smith, MD
Pediatric Nephrologist with 15 years of experience
Board Certified by American Board of Pediatrics
Reviewed: November 12, 2025
```

---

## Troubleshooting

### Common Issues

#### Issue: "Theme looks broken after activation"

**Solution:**
1. Go to Appearance → Editor
2. Click on your logo/site title
3. If missing, add logo: Settings → General
4. Clear browser cache (Ctrl+Shift+R)

#### Issue: "Mobile menu not working"

**Check:**
1. Are you on mobile width? (<768px)
2. Check browser console for JavaScript errors
3. Try disabling other plugins temporarily
4. Clear cache

#### Issue: "Colors don't match what I set"

**Solutions:**
1. Clear caching plugin cache
2. Clear browser cache
3. Check if style variation is applied (Styles → Browse styles)
4. Ensure you clicked Save in Site Editor

#### Issue: "Patterns don't appear in editor"

**Solutions:**
1. Refresh the page editor
2. Ensure theme is activated
3. Check WordPress version (must be 6.7+)
4. Try switching to default theme and back

#### Issue: "Featured images not showing"

**Check:**
1. Is featured image set on post?
2. Is image size appropriate? (recommended: 1200x675px)
3. Check file size (<500KB recommended)
4. Regenerate thumbnails: Plugin "Regenerate Thumbnails"

#### Issue: "Site is slow"

**Quick Fixes:**
1. Install caching plugin (WP Rocket, W3 Total Cache)
2. Optimize images (compress before upload)
3. Remove unused plugins
4. Check hosting performance
5. Enable Gzip compression

### Getting Help

**Before Asking for Help:**
1. ✅ Check this user guide
2. ✅ Search WordPress support forums
3. ✅ Disable plugins temporarily to test
4. ✅ Switch to default theme temporarily

**When Reporting Issues:**
Include:
- WordPress version
- PHP version
- Active plugins list
- Screenshot of issue
- Browser/device information
- Steps to reproduce

**Support Resources:**
- WordPress Support Forums
- Theme documentation (README.txt)
- Developer Guide (docs/DEVELOPER-GUIDE.md)

---

## Tips and Best Practices

### Content Strategy

**Homepage:**
- Clear hero with value proposition
- 3-4 main sections maximum
- Strong call-to-action
- Recent blog posts

**Blog Posts:**
- Write 1000+ words for SEO
- Use images every 300-400 words
- Add internal links to 2-3 related posts
- Update posts when medical information changes

**Navigation:**
- Keep main menu to 5-7 items
- Use descriptive labels
- Group related pages in submenus

### Performance Tips

1. **Image Optimization**
   - Use WebP format when possible
   - Resize before upload (don't upload 5MB images!)
   - Recommended sizes:
     - Hero images: 1920x1080px
     - Content images: 1200x800px
     - Thumbnails: 400x300px

2. **Keep It Clean**
   - Remove unused themes
   - Remove unused plugins
   - Delete spam comments regularly
   - Limit post revisions (3-5 max)

3. **Caching**
   - Use a caching plugin
   - Enable browser caching
   - Use CDN if available

### Accessibility

**Always:**
- ✅ Add alt text to images
- ✅ Use proper heading hierarchy
- ✅ Test with keyboard navigation
- ✅ Maintain color contrast
- ✅ Use descriptive link text (not "click here")

**Never:**
- ❌ Use images of text
- ❌ Rely only on color to convey information
- ❌ Use auto-playing videos
- ❌ Create tiny touch targets (<44px)

### Security

**Basic Security:**
1. Keep WordPress updated
2. Keep theme updated
3. Keep plugins updated
4. Use strong passwords
5. Limit login attempts
6. Use HTTPS (SSL certificate)
7. Regular backups

**Recommended Security Plugins:**
- Wordfence Security
- Sucuri Security
- iThemes Security

---

## Quick Reference Card

### Keyboard Shortcuts

**Site Editor:**
- `Ctrl+S` (Windows) / `Cmd+S` (Mac) - Save
- `Ctrl+Z` / `Cmd+Z` - Undo
- `Ctrl+Shift+Z` / `Cmd+Shift+Z` - Redo
- `/` - Quick insert block

**Post Editor:**
- `Ctrl+B` / `Cmd+B` - Bold
- `Ctrl+I` / `Cmd+I` - Italic
- `Ctrl+K` / `Cmd+K` - Insert link
- `Alt+Shift+H` - Toggle heading

### Common Admin URLs

- Dashboard: `/wp-admin/`
- Pages: `/wp-admin/edit.php?post_type=page`
- Posts: `/wp-admin/edit.php`
- Media: `/wp-admin/upload.php`
- Themes: `/wp-admin/themes.php`
- Plugins: `/wp-admin/plugins.php`
- Settings: `/wp-admin/options-general.php`
- Site Editor: `/wp-admin/site-editor.php`

---

## Conclusion

You now have everything you need to manage your RenalInfoLK Web site!

**Remember:**
- Take it step by step
- Experiment in the Site Editor
- Use block patterns to save time
- Focus on quality content
- Keep accessibility in mind

**Need more help?**
- Check README.txt for technical details
- Review docs/DEVELOPER-GUIDE.md for advanced customization
- Visit WordPress support forums

**Happy publishing! 🎉**
