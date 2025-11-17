# Single Post Template Specification

## ADDED Requirements

### Requirement: Two-Column Layout with Sidebar
The single post template SHALL display content in a two-column layout with a sidebar on the left and main content area on the right.

#### Scenario: Desktop layout
- **WHEN** viewing a single post on desktop viewport (≥1024px)
- **THEN** the sidebar SHALL be displayed on the left with fixed width (~264px)
- **AND** the main content area SHALL be displayed on the right with flexible width
- **AND** both columns SHALL have appropriate spacing between them

#### Scenario: Mobile layout
- **WHEN** viewing a single post on mobile viewport (<1024px)
- **THEN** the sidebar SHALL stack above the main content
- **AND** both sections SHALL use full width

### Requirement: Sidebar Resource Details Card
The sidebar SHALL display a "Resource Details" card containing post metadata.

#### Scenario: Resource details display
- **WHEN** viewing a single post
- **THEN** the sidebar SHALL display a white card with rounded corners and shadow
- **AND** the card SHALL show resource type with icon
- **AND** the card SHALL show post author name with icon
- **AND** the card SHALL show publication date with icon
- **AND** the card SHALL show reading time estimate with icon (if available)

### Requirement: Sidebar Share Card
The sidebar SHALL display a "Share This Article" card with social media sharing options.

#### Scenario: Social sharing options
- **WHEN** viewing a single post
- **THEN** the sidebar SHALL display a white share card below the resource details card
- **AND** the card SHALL include sharing buttons for Facebook, Twitter, LinkedIn, WhatsApp
- **AND** the card SHALL include a "Copy Link" button
- **AND** each button SHALL display the appropriate icon
- **AND** buttons SHALL have hover effects

### Requirement: Main Content Back Link
The main content area SHALL display a "Back to Resources" navigation link above the post title.

#### Scenario: Back navigation
- **WHEN** viewing a single post
- **THEN** a "Back to Resources" link SHALL be displayed above the post title
- **AND** the link SHALL include a back arrow icon
- **AND** the link SHALL navigate to the resources archive page

### Requirement: Post Title and Excerpt
The main content area SHALL display the post title and excerpt/description.

#### Scenario: Title and excerpt display
- **WHEN** viewing a single post
- **THEN** the post title SHALL be displayed as a large heading (H1)
- **AND** the post excerpt SHALL be displayed below the title
- **AND** the excerpt SHALL use larger font size and lighter color for visual hierarchy

### Requirement: Post Content Display
The main content area SHALL display the post featured image and content.

#### Scenario: Content rendering
- **WHEN** viewing a single post
- **THEN** the post featured image SHALL be displayed (if set)
- **AND** the full post content SHALL be displayed below the featured image
- **AND** the content SHALL support all WordPress block types

### Requirement: No Post Navigation
The single post template SHALL NOT display previous/next post navigation links.

#### Scenario: Navigation omission
- **WHEN** viewing a single post
- **THEN** no previous/next post navigation links SHALL be displayed

### Requirement: No Taxonomy Display
The single post template SHALL NOT display categories or tags below the post content.

#### Scenario: Taxonomy omission
- **WHEN** viewing a single post
- **THEN** no category links SHALL be displayed
- **AND** no tag links SHALL be displayed

### Requirement: Collapsible Comments Section
The single post template SHALL display comments in a collapsible section with a toggle button.

#### Scenario: Comments toggle
- **WHEN** viewing a single post with comments enabled
- **THEN** a toggle button SHALL be displayed showing "View Comments (N)" where N is the comment count
- **AND** clicking the toggle button SHALL expand/collapse the comments section
- **AND** the toggle button SHALL include an expand/collapse icon that rotates on state change

#### Scenario: Comments form and list
- **WHEN** the comments section is expanded
- **THEN** a comment form SHALL be displayed for logged-in users
- **AND** existing comments SHALL be displayed below the form
- **AND** each comment SHALL show commenter name, date, and comment text

### Requirement: Related Resources Section
The single post template SHALL display a "Related Resources" section at the bottom.

#### Scenario: Related posts display
- **WHEN** viewing a single post
- **THEN** a "Related Resources" section SHALL be displayed after the comments
- **AND** the section SHALL have a heading with top border separator
- **AND** related posts SHALL be displayed in a 3-column grid on desktop
- **AND** the grid SHALL be responsive (2 columns on tablet, 1 column on mobile)

#### Scenario: Related post card styling
- **WHEN** viewing related resource cards
- **THEN** each card SHALL display an icon indicating resource type
- **AND** each card SHALL display the post title as a link
- **AND** each card SHALL display a short excerpt
- **AND** each card SHALL display a "Read Article →" link
- **AND** cards SHALL have white background, rounded corners, and shadow
- **AND** cards SHALL have hover effects (shadow increase)

### Requirement: Main Content Area Styling
The main content area SHALL be styled as a prominent white card.

#### Scenario: Content container styling
- **WHEN** viewing a single post
- **THEN** the main content SHALL be contained in a white card
- **AND** the card SHALL have rounded corners
- **AND** the card SHALL have shadow for depth
- **AND** the card SHALL have appropriate padding

### Requirement: Responsive Design
The single post template SHALL be fully responsive across all viewport sizes.

#### Scenario: Breakpoint behavior
- **WHEN** viewport width is ≥1024px
- **THEN** sidebar and main content SHALL display side-by-side
- **WHEN** viewport width is <1024px
- **THEN** sidebar SHALL stack above main content
- **WHEN** viewport width is <768px
- **THEN** related resources grid SHALL display 1 column

### Requirement: Accessibility Compliance
The single post template SHALL meet WCAG AA accessibility standards.

#### Scenario: Keyboard navigation
- **WHEN** navigating the template using keyboard only
- **THEN** all interactive elements SHALL be keyboard accessible
- **AND** focus indicators SHALL be clearly visible
- **AND** tab order SHALL be logical

#### Scenario: Screen reader support
- **WHEN** using a screen reader
- **THEN** all content SHALL be properly announced
- **AND** semantic HTML landmarks SHALL be used (main, aside, article)
- **AND** all icons SHALL have appropriate ARIA labels
