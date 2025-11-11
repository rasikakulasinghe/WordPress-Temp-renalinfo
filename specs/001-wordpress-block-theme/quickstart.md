# Quickstart Guide: RenalInfoLK Web WordPress Block Theme

**Version**: 1.0.0
**Last Updated**: 2025-11-11
**WordPress Version Required**: 6.7+
**PHP Version Required**: 7.2+

## Table of Contents

1. [Installation](#1-installation)
2. [Initial Setup](#2-initial-setup)
3. [Customizing Your Theme](#3-customizing-your-theme)
4. [Creating Content](#4-creating-content)
5. [Using Block Patterns](#5-using-block-patterns)
6. [Navigation Menus](#6-navigation-menus)
7. [Dark Mode](#7-dark-mode)
8. [Troubleshooting](#8-troubleshooting)
9. [Credits & Licensing](#9-credits--licensing)

---

## 1. Installation

### Option A: Upload via WordPress Admin (Recommended)

1. **Download the Theme**
   - Obtain the `renalinfolkweb.zip` file from your source

2. **Access WordPress Admin**
   - Log in to your WordPress site: `https://your-site.com/wp-admin`
   - Navigate to **Appearance → Themes**

3. **Upload Theme**
   - Click **Add New** button at the top
   - Click **Upload Theme** button
   - Click **Choose File** and select `renalinfolkweb.zip`
   - Click **Install Now**

4. **Activate Theme**
   - After installation completes, click **Activate**
   - Your site will immediately switch to the RenalInfoLK Web theme

5. **Verify Installation**
   - Visit your site's homepage to confirm the theme is active
   - Check for any error messages (there should be none)

### Option B: Manual Installation via FTP

1. **Extract Theme Files**
   - Unzip `renalinfolkweb.zip` on your computer
   - You should see a folder named `renalinfolkweb/`

2. **Upload via FTP**
   - Connect to your web host via FTP client (FileZilla, Cyberduck, etc.)
   - Navigate to `/wp-content/themes/`
   - Upload the entire `renalinfolkweb/` folder

3. **Activate Theme**
   - Go to WordPress Admin → **Appearance → Themes**
   - Find "RenalInfoLK Web" and click **Activate**

### System Requirements Verification

Before installation, verify your hosting environment meets these requirements:

- WordPress 6.7 or higher
- PHP 7.2 or higher (PHP 8.0+ recommended)
- MySQL 5.7+ or MariaDB 10.3+
- HTTPS enabled (for security and performance)
- Memory limit: 128MB minimum (256MB recommended)

**Check Your Environment**:
1. Go to **Tools → Site Health** in WordPress Admin
2. Click **Info** tab
3. Verify WordPress version, PHP version, and server configuration

---

## 2. Initial Setup

### Step 1: Access the Site Editor

1. Go to **Appearance → Editor** in WordPress Admin
2. The Full Site Editor will open showing your homepage
3. You can edit any template or template part from here

### Step 2: Set Homepage & Blog Page

1. **Create Pages**:
   - Go to **Pages → Add New**
   - Create a page titled "Home" (leave blank for now)
   - Create another page titled "Blog"

2. **Configure Reading Settings**:
   - Go to **Settings → Reading**
   - Under "Your homepage displays":
     - Select **A static page**
     - Choose "Home" for **Homepage**
     - Choose "Blog" for **Posts page**
   - Click **Save Changes**

### Step 3: Configure Permalinks

1. Go to **Settings → Permalinks**
2. Select **Post name** structure: `https://yoursite.com/sample-post/`
3. Click **Save Changes**

This creates SEO-friendly URLs for your medical content.

### Step 4: Set Site Identity

1. Go to **Appearance → Editor**
2. Click the **WordPress logo** (site icon) in the top-left
3. Click **Styles** (the brush icon)
4. Scroll down and click **Site Logo**
5. Upload your organization's logo (recommended: 300x100px PNG or SVG)

**Site Tagline**:
1. Go to **Settings → General**
2. Update **Tagline** (e.g., "Pediatric Nephrology Excellence")
3. Click **Save Changes**

---

## 3. Customizing Your Theme

### Color Customization

1. **Access Styles Panel**:
   - Go to **Appearance → Editor**
   - Click **Styles** (brush icon in top toolbar)
   - Click **Colors** in the sidebar

2. **Modify Color Palette**:
   - **Primary**: Click the color to open picker, select new color
   - **Primary Dark**: Darker shade for headings
   - **Secondary**: Light blue accents
   - **CTA Yellow**: Call-to-action buttons
   - **Background Light**: Page background
   - **Text Light**: Body text color

3. **Verify Contrast**:
   - After changing colors, verify text remains readable
   - Use WebAIM Contrast Checker: https://webaim.org/resources/contrastchecker/
   - Aim for 4.5:1 ratio for normal text, 3:1 for large text

4. **Save Changes**:
   - Click **Save** button in top-right corner
   - Changes apply immediately across entire site

### Typography Customization

1. **Access Typography Settings**:
   - Go to **Appearance → Editor → Styles**
   - Click **Typography**

2. **Adjust Font Sizes**:
   - **Body Text**: Default is 16px (base)
   - **Headings**: Adjust H1 through H6 sizes
   - **Small Text**: Captions and meta text

3. **Font Weight Options**:
   - Regular (400): Body text
   - Medium (500): Emphasized text
   - Semi-Bold (600): Subheadings
   - Bold (700): Headings
   - Extra-Bold (800): Large headings
   - Black (900): Hero headings

4. **Line Height & Letter Spacing**:
   - Adjust for readability (default: 1.6 for body text)
   - Increase line height for long-form medical articles

### Spacing & Layout Customization

1. **Access Layout Settings**:
   - Go to **Appearance → Editor → Styles**
   - Click **Layout**

2. **Adjust Content Width**:
   - **Content Width**: Default 1200px (optimal reading width)
   - **Wide Width**: Default 1440px (for full-width sections)

3. **Global Padding**:
   - Adjust padding around content blocks
   - Default spacing scale: 10 (4px) to 80 (64px)

4. **Section Spacing**:
   - Increase spacing between major sections (recommended: 60-80)
   - Tighter spacing within sections (recommended: 40-50)

### Style Variations

The theme includes pre-designed style variations:

1. **Default (Medical Professional)**:
   - Blue and white color scheme
   - Professional, trustworthy appearance

2. **High Contrast**:
   - Increased contrast for better accessibility
   - Darker text, brighter accents
   - Recommended for vision-impaired users

3. **Dark Mode**:
   - Dark background, light text
   - Automatically activates when user toggles dark mode
   - (See [Dark Mode section](#7-dark-mode) below)

**Switching Style Variations**:
1. Go to **Appearance → Editor → Styles**
2. Click **Browse Styles**
3. Click a variation to preview
4. Click **Save** to apply

---

## 4. Creating Content

### Creating a New Page

1. **Access Pages**:
   - Go to **Pages → Add New**

2. **Add Page Title**:
   - Enter title (e.g., "About Us", "Contact", "Services")

3. **Insert Block Patterns**:
   - Click the **+** icon in the editor
   - Select **Patterns** tab
   - Browse categories: Heroes, Call to Action, Content
   - Click a pattern to insert

4. **Edit Pattern Content**:
   - Click text to edit inline
   - Click images to replace with your own
   - Click buttons to change text and links

5. **Publish Page**:
   - Click **Publish** button (top-right)
   - Choose visibility: Public, Private, Password Protected
   - Click **Publish** again to confirm

### Creating a Blog Post

1. **Access Posts**:
   - Go to **Posts → Add New**

2. **Add Post Title**:
   - Enter article headline (e.g., "Understanding Chronic Kidney Disease in Children")

3. **Write Content**:
   - Use the block editor to add:
     - Paragraphs (press Enter to create new block)
     - Headings (type `/heading` and press Enter)
     - Images (type `/image` and press Enter)
     - Lists (type `/list` and press Enter)
     - Quotes (type `/quote` and press Enter)

4. **Add Featured Image**:
   - Click **Set featured image** in right sidebar
   - Upload or select image (recommended: 1200x675px, WebP format)
   - Add **Alt Text** for accessibility (describe the image)
   - Click **Set featured image**

5. **Assign Categories**:
   - In right sidebar, find **Categories**
   - Check relevant categories (e.g., "Kidney Conditions")
   - Create new category if needed: Type name, click **Add New Category**

6. **Add Tags**:
   - In right sidebar, find **Tags**
   - Type tags separated by commas (e.g., "pediatric nephrology, CKD, for parents")
   - Press Enter to add

7. **Write Excerpt**:
   - In right sidebar, click **Post** tab
   - Scroll to **Excerpt**
   - Write 1-2 sentence summary (150-200 characters)
   - This appears in archive listings and search results

8. **Publish Post**:
   - Click **Publish** button
   - Set publication date (Publish immediately or schedule for future)
   - Click **Publish** to confirm

### Content Writing Best Practices

**For Medical Content**:
- Use clear, accessible language (avoid excessive medical jargon)
- Include glossary for technical terms
- Break long articles into sections with subheadings
- Use bullet points and numbered lists for readability
- Add images, diagrams, and infographics
- Include sources and references for medical claims
- Add disclaimer: "This information is educational and not medical advice. Consult your healthcare provider."

**For Accessibility**:
- Use proper heading hierarchy (H1 → H2 → H3, don't skip levels)
- Write descriptive alt text for all images
- Use descriptive link text (not "click here" or "read more")
- Ensure text contrast meets WCAG AA standards
- Add captions to videos and transcripts to audio

---

## 5. Using Block Patterns

Block patterns are pre-designed layouts you can insert into pages and posts.

### Available Pattern Categories

**Heroes** (3 patterns):
- **Hero Primary**: Two-column layout with text + illustration
- **Hero Simple**: Text-only hero with centered content
- **Hero Centered**: Centered hero with large heading and CTA buttons

**Call to Action** (3 patterns):
- **CTA Webinar**: Announcement banner with icon and date
- **CTA Boxed**: Boxed section with background color and button
- **CTA Inline**: Inline call-to-action with minimal styling

**Content Sections** (3 patterns):
- **Resources Grid**: 3-column grid with icons (Articles, Videos, Posters)
- **News Grid**: 3-column grid with images and "Read More" links
- **Two-Column**: Text + image side-by-side layout

**Headers** (2 patterns):
- **Header Primary**: Gradient header with logo, navigation, search, dark mode toggle
- **Header Simple**: Minimal header without gradient

**Footers** (2 patterns):
- **Footer Primary**: Multi-column footer with Quick Links, Resources, Contact Info
- **Footer Minimal**: Single-row footer with copyright and social links

### Inserting a Pattern

1. **Open Editor**:
   - Edit any page or post, or open Site Editor

2. **Open Pattern Inserter**:
   - Click the **+** icon (top-left toolbar)
   - Click **Patterns** tab
   - Browse categories or search by keyword

3. **Preview Pattern**:
   - Hover over pattern to see preview
   - Click pattern name to see full preview

4. **Insert Pattern**:
   - Click pattern to insert at cursor position
   - Pattern appears as editable blocks

5. **Customize Pattern**:
   - Click text to edit
   - Click images to replace: Click image → **Replace** → Upload or select from Media Library
   - Click buttons to change: Edit text, change link URL, adjust color

6. **Save Changes**:
   - Click **Update** or **Publish** button

### Pattern Use Cases

**Homepage**:
- Hero Primary (top of page)
- Resources Grid (featured content)
- CTA Webinar (announcement banner)
- News Grid (latest articles)

**About Page**:
- Hero Simple (page introduction)
- Two-Column (mission statement with team photo)
- CTA Boxed (call to action for contact or services)

**Services Page**:
- Hero Centered (services overview)
- Resources Grid (service categories)
- CTA Inline (appointment request)

**Blog Post**:
- CTA Inline at end of article (related content or newsletter signup)

---

## 6. Navigation Menus

### Creating the Primary Menu (Header)

1. **Access Navigation**:
   - Go to **Appearance → Menus**
   - Or use **Appearance → Editor → Navigation** in Site Editor

2. **Create New Menu**:
   - Click **Create a new menu**
   - Name it "Primary Menu"
   - Click **Create Menu**

3. **Add Menu Items**:
   - **Pages**: Check pages to add (Home, About, Services, Blog, Contact)
   - **Custom Links**: Add external links or specific URLs
   - **Categories**: Add category archive links (e.g., "Kidney Conditions")
   - Click **Add to Menu** for each item

4. **Organize Menu**:
   - Drag items to reorder
   - Drag right to create submenus (dropdown menus)
   - Maximum 2 levels deep recommended for usability

5. **Menu Settings**:
   - Under **Display location**, check **Primary**
   - Click **Save Menu**

**Example Primary Menu Structure**:
```
Home
About
├── Our Mission
├── Medical Team
└── Facilities
Services
├── Outpatient Services
├── Dialysis Program
└── Research Initiatives
Resources
├── Patient Resources
├── Parent Guides
└── Professional Guidelines
Blog
Contact
```

### Creating the Footer Menu

1. **Create New Menu**:
   - Go to **Appearance → Menus**
   - Click **Create a new menu**
   - Name it "Footer Menu"
   - Click **Create Menu**

2. **Add Footer Links**:
   - Privacy Policy
   - Terms of Use
   - Accessibility Statement
   - Sitemap
   - Contact

3. **Assign to Footer Location**:
   - Under **Display location**, check **Footer**
   - Click **Save Menu**

### Mobile Menu Behavior

The theme automatically adapts navigation for mobile devices:

- **Desktop (≥768px)**: Horizontal navigation bar with dropdown submenus
- **Mobile (<768px)**: Hamburger icon (☰) opens slide-in drawer from right
- **Drawer Features**:
  - Backdrop overlay (semi-transparent black)
  - Close button (X icon)
  - Vertical navigation list
  - Dismissible by tapping outside drawer or pressing Escape key

**No additional setup required** - mobile menu works automatically with your Primary Menu.

---

## 7. Dark Mode

### How Dark Mode Works

The theme includes a built-in dark mode toggle that:
- Saves user preference in browser (localStorage)
- Applies dark color scheme (dark background, light text)
- Persists across page loads and sessions
- Respects system preference on first visit (`prefers-color-scheme: dark`)

### Activating Dark Mode (User Side)

1. **Locate Toggle**:
   - Look for sun/moon icon in site header (top-right)

2. **Toggle Dark Mode**:
   - Click icon to switch between light and dark modes
   - Sun icon = light mode active
   - Moon icon = dark mode active

3. **Preference Saved**:
   - Browser remembers your choice
   - Dark mode stays active on return visits
   - Clear browser data resets to system preference

### Customizing Dark Mode Colors

1. **Access Dark Mode Style**:
   - Go to **Appearance → Editor → Styles**
   - Click **Browse Styles**
   - Select **Dark Mode** variation

2. **Edit Dark Colors**:
   - Click **Edit** (pencil icon)
   - Modify dark mode colors:
     - Background Dark: `#0f1923` (default)
     - Text Dark: `#E0E0E0` (default)
     - Accent Dark: `#1d2c33` (card backgrounds)
   - Click **Save**

3. **Test Dark Mode**:
   - Activate dark mode via toggle
   - Check all pages for proper contrast
   - Verify images and icons remain visible

### Dark Mode Best Practices

- **Contrast**: Ensure text has 4.5:1 contrast ratio on dark backgrounds
- **Images**: Use images with transparent backgrounds or provide dark versions
- **Colors**: Avoid pure black (#000000) - use dark gray (#0f1923) for less eye strain
- **Icons**: Icons automatically inherit text color (currentColor)

---

## 8. Troubleshooting

### Theme Not Activating

**Problem**: Error message when activating theme

**Solution**:
1. Check WordPress version: Requires 6.7+
2. Check PHP version: Requires 7.2+
3. Go to **Tools → Site Health** to verify requirements
4. If version too old, contact hosting provider to upgrade

---

### Site Editor Not Opening

**Problem**: "Something went wrong" when opening Appearance → Editor

**Solution**:
1. Deactivate all plugins temporarily
2. Try opening Site Editor again
3. If it works, reactivate plugins one by one to find conflict
4. Update conflicting plugin or contact plugin author

---

### Colors Not Changing

**Problem**: Color changes in Site Editor don't apply to site

**Solution**:
1. Clear browser cache: Ctrl+Shift+Delete (Windows) or Cmd+Shift+Delete (Mac)
2. Clear WordPress cache (if using caching plugin)
3. Ensure you clicked **Save** button in Site Editor
4. Try in incognito/private browsing window

---

### Dark Mode Toggle Not Working

**Problem**: Clicking dark mode toggle does nothing

**Solution**:
1. Clear browser cache and cookies
2. Check browser console for JavaScript errors: F12 → Console tab
3. Ensure JavaScript is enabled in browser
4. Try different browser to isolate issue
5. If issue persists, contact theme support

---

### Images Not Displaying

**Problem**: Placeholder boxes instead of images

**Solution**:
1. Check image file size: Should be <5MB (optimize if larger)
2. Verify image format: Use WebP, JPEG, or PNG
3. Check file permissions: Images should be in `/wp-content/uploads/`
4. Regenerate thumbnails: Install "Regenerate Thumbnails" plugin and run

---

### Mobile Menu Not Opening

**Problem**: Hamburger icon doesn't open menu on mobile

**Solution**:
1. Clear browser cache
2. Check JavaScript console for errors (F12)
3. Verify Primary Menu is assigned: **Appearance → Menus**
4. Test on real mobile device (not just browser resize)

---

### Patterns Not Appearing

**Problem**: Pattern categories empty in pattern inserter

**Solution**:
1. Verify theme is fully activated
2. Check `/patterns/` directory contains `.php` files
3. Clear WordPress transients: Install "Transients Manager" plugin
4. Reactivate theme: Switch to another theme, then back to RenalInfoLK Web

---

### Performance Issues (Slow Loading)

**Problem**: Site loads slowly

**Solution**:
1. **Optimize Images**:
   - Install "Smush" or "Imagify" plugin
   - Compress images to <200KB
   - Convert to WebP format

2. **Enable Caching**:
   - Install "WP Super Cache" or "W3 Total Cache" plugin
   - Configure caching settings

3. **Use CDN**:
   - Sign up for Cloudflare (free plan available)
   - Connect Cloudflare to your site

4. **Check Hosting**:
   - Upgrade to faster hosting plan if needed
   - Consider managed WordPress hosting (WP Engine, Kinsta, Flywheel)

5. **Minimize Plugins**:
   - Deactivate unused plugins
   - Delete unused themes

---

### Accessibility Errors

**Problem**: Accessibility audit shows errors

**Solution**:
1. **Check Color Contrast**:
   - Use WebAIM Contrast Checker: https://webaim.org/resources/contrastchecker/
   - Adjust colors to meet 4.5:1 ratio

2. **Add Alt Text**:
   - Edit each image in Media Library
   - Add descriptive alt text
   - Decorative images: Use empty alt text (alt="")

3. **Fix Heading Hierarchy**:
   - Ensure only one H1 per page
   - Don't skip heading levels (H1 → H2 → H3, not H1 → H3)

4. **Test Keyboard Navigation**:
   - Press Tab key to navigate site
   - Ensure focus indicators are visible
   - All interactive elements should be reachable

---

### Still Need Help?

**Documentation**:
- WordPress Support: https://wordpress.org/support/
- WordPress Theme Handbook: https://developer.wordpress.org/themes/

**Community Support**:
- WordPress Forums: https://wordpress.org/support/forums/
- WordPress Stack Exchange: https://wordpress.stackexchange.com/

**Professional Support**:
- Hire WordPress developer: https://www.codeable.io/
- Contact theme author (if purchased from marketplace)

---

## 9. Credits & Licensing

### Theme License

**RenalInfoLK Web WordPress Block Theme**
- Version: 1.0.0
- License: GPL-2.0-or-later
- License URI: https://www.gnu.org/licenses/gpl-2.0.html

This theme is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

This theme is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

### Third-Party Resources

**Lexend Font**
- Author: Nadine Chahine, Thomas Jockin
- Source: Google Fonts (https://fonts.google.com/specimen/Lexend)
- License: SIL Open Font License 1.1
- License URI: https://scripts.sil.org/OFL

**Material Symbols Icons**
- Author: Google
- Source: https://github.com/google/material-design-icons
- License: Apache License 2.0
- License URI: https://www.apache.org/licenses/LICENSE-2.0

Icons used in this theme:
- health_and_safety, article, play_circle, image, campaign, search, menu, arrow_forward, location_on, call, mail, family_restroom, medical_information

**WordPress Core**
- The theme is built on WordPress
- WordPress is licensed under the GPL v2 or later
- https://wordpress.org/

### Image Attribution

**Sample Images** (if included in theme demo):
- Placeholder images are from Unsplash (https://unsplash.com/)
- License: Unsplash License (free for commercial and non-commercial use)
- Attribution not required but appreciated

**User-Uploaded Images**:
- Users are responsible for ensuring they have rights to images they upload
- Recommended free image sources:
  - Unsplash: https://unsplash.com/
  - Pexels: https://pexels.com/
  - Pixabay: https://pixabay.com/

### Development Credits

**Theme Author**: [Your Name/Organization]
**Theme URI**: [Your Website]
**Description**: WordPress block theme for pediatric nephrology medical platform
**Version**: 1.0.0
**Requires at least**: WordPress 6.7
**Tested up to**: WordPress 6.8
**Requires PHP**: 7.2
**Text Domain**: renalinfo-web

### Accessibility Statement

This theme aims to meet WCAG 2.1 Level AA accessibility standards:
- Color contrast ratios of 4.5:1 for normal text, 3:1 for large text
- Keyboard navigation support
- Screen reader compatibility
- Semantic HTML5 markup
- Focus indicators on interactive elements
- Responsive design for mobile devices

If you encounter accessibility issues, please report them to the theme author.

### Privacy & Data Collection

This theme does not collect or store any user data. Features like dark mode toggle use localStorage (stored locally in user's browser only).

For site-wide privacy compliance (GDPR, CCPA), install a privacy plugin like:
- WP GDPR Compliance
- Cookie Notice & Compliance
- Complianz

### Changelog

**Version 1.0.0 (2025-11-11)**
- Initial release
- Full Site Editing (FSE) support
- 15+ block patterns (heroes, CTAs, content sections)
- Dark mode toggle with localStorage persistence
- Responsive CSS Grid layouts
- Mobile slide-in drawer menu
- WCAG 2.1 Level AA accessibility compliance
- WordPress 6.7+ compatibility
- theme.json v3 support

---

### Support & Contributions

**Bug Reports**: [GitHub Issues URL or Support Email]
**Feature Requests**: [GitHub Issues URL or Support Email]
**Contributions**: Pull requests welcome at [GitHub Repository URL]

---

**Thank you for using RenalInfoLK Web WordPress Block Theme!**

We hope this theme helps you build a professional, accessible, and user-friendly medical knowledge-sharing platform. For questions or feedback, please contact [support email or website].

---

**End of Quickstart Guide**
