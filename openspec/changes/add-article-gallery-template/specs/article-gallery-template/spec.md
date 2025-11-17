# Spec: Article Gallery Template

**Capability:** Article Gallery Template  
**Type:** New Capability  
**Status:** Draft

## Overview

This capability provides a WordPress block theme template for displaying educational articles in a searchable, filterable gallery format suitable for medical and healthcare content presentation.

## ADDED Requirements

### Requirement: Template File Creation

The theme MUST include a page template file for article gallery displays.

**Details:**
- Template file: `templates/page-article-gallery.html`
- Template name: "Article Gallery"
- Uses existing header and footer template parts
- Built with WordPress core blocks (no custom blocks required)

#### Scenario: User Creates Article Gallery Page

**Given** a WordPress site administrator  
**When** they create a new page in the WordPress admin  
**And** they open the Template dropdown in the page settings  
**Then** they SHOULD see "Article Gallery" as a template option  
**And** selecting it SHOULD apply the article gallery layout to the page

---

### Requirement: Search and Filter UI

The template MUST provide visual search and filtering controls.

**Details:**
- Full-width search input with search icon
- Sort dropdown with options: Most Recent, Most Popular, Alphabetical
- Category filter buttons: All, Condition, Treatment, Research, For Families
- Clear filters button
- Responsive layout: stacks vertically on mobile, horizontal on desktop

#### Scenario: Display Search Controls

**Given** a page using the Article Gallery template  
**When** a visitor views the page  
**Then** they SHOULD see a search input field with icon  
**And** they SHOULD see a sort dropdown selector  
**And** they SHOULD see category filter buttons in a horizontal row (desktop) or wrapped layout (mobile)

**Note:** Search/filter functionality is visual only; backend implementation is out of scope.

---

### Requirement: Article Cards Grid

The template MUST display articles in a responsive card-based grid layout.

**Details:**
- Uses WordPress Query Loop block (`core/query`)
- Grid layout: 1 column (mobile), 2 columns (tablet), 3 columns (desktop)
- Each card displays: featured image (16:9 aspect ratio), title, excerpt, publication date
- Card styling: white background, rounded corners, subtle shadow, hover lift effect
- Uses theme.json colors: `base` (background), `contrast` (text), `primary-dark` or `green-blue` (accents)

#### Scenario: Display Article Cards

**Given** a page using the Article Gallery template  
**When** the page has published posts/articles  
**Then** each article SHOULD be displayed as a card  
**And** each card SHOULD show the featured image at 16:9 aspect ratio  
**And** each card SHOULD display the post title, excerpt (truncated), and date  
**And** hovering over a card SHOULD trigger a lift animation (translateY)

#### Scenario: Responsive Grid Behavior

**Given** a page using the Article Gallery template  
**When** viewed on a mobile device (< 640px)  
**Then** cards SHOULD display in a single column  
**When** viewed on a tablet device (640px - 1024px)  
**Then** cards SHOULD display in a 2-column grid  
**When** viewed on a desktop device (> 1024px)  
**Then** cards SHOULD display in a 3-column grid

---

### Requirement: Pagination Controls

The template MUST provide pagination navigation for article listings.

**Details:**
- Uses WordPress Query Pagination block (`core/query-pagination`)
- Displays Previous/Next buttons with chevron icons
- Shows page numbers with active state indicator
- Centered layout
- Styled with theme colors

#### Scenario: Navigate Article Pages

**Given** a page using the Article Gallery template  
**When** there are more articles than fit on one page  
**Then** pagination controls SHOULD be displayed  
**And** the current page number SHOULD be visually highlighted  
**And** clicking Previous/Next SHOULD navigate between pages  
**And** clicking a page number SHOULD jump to that page

---

### Requirement: Theme Consistency

The template MUST use existing theme design tokens from theme.json.

**Details:**
- Colors: Use CSS custom properties from theme.json palette
- Typography: Lexend font family, defined font sizes
- Spacing: Use theme spacing scale (--wp--preset--spacing-*)
- No hardcoded color values or custom CSS classes
- Maintains WCAG AA contrast ratios

#### Scenario: Apply Theme Styling

**Given** a page using the Article Gallery template  
**When** rendered in a browser  
**Then** all colors SHOULD reference theme.json CSS variables (--wp--preset--color-*)  
**And** all spacing SHOULD use theme spacing scale  
**And** text SHOULD use Lexend font family  
**And** color contrast SHOULD meet WCAG AA requirements (4.5:1 for normal text, 3:1 for large text)

---

### Requirement: Accessibility

The template MUST meet WCAG AA accessibility standards.

**Details:**
- Semantic HTML structure
- Keyboard navigation support
- ARIA labels where appropriate
- Sufficient color contrast ratios
- Focus indicators visible

#### Scenario: Keyboard Navigation

**Given** a page using the Article Gallery template  
**When** a user navigates with keyboard only  
**Then** they SHOULD be able to tab through all interactive elements (search, filters, cards, pagination)  
**And** focus states SHOULD be clearly visible  
**And** they SHOULD be able to activate buttons and links with Enter/Space keys

## Implementation Notes

- Template uses WordPress core blocks exclusively (no custom blocks)
- Search/filter UI is presentational; JavaScript can be added later for functionality
- Query Loop block handles post fetching and pagination automatically
- Theme.json spacing and color scales provide consistent styling
- Existing header/footer template parts are reused

## Related Capabilities

- Theme Templates (existing: archive, single, page, search, etc.)
- Theme Template Parts (existing: header, footer variations)
- Block Patterns (existing: medical content patterns)

## Cross-References

- See `templates/archive.html` for similar post listing implementation
- See `theme.json` lines 10-90 for color palette definitions
- See `theme.json` lines 200-300 for spacing scale definitions
- See `.github/copilot-instructions.md` for block theme architecture guidelines
