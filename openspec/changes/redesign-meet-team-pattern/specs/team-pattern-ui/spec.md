# Team Pattern UI Capability

## MODIFIED Requirements

### Requirement: Team pattern layout shall use 3-column grid

The "Meet Our Team" pattern (`renalinfolk/section-meet-team`) SHALL display team members in a 3-column grid layout instead of the previous 4-column layout to provide better visual balance and larger photo display areas.

#### Scenario: Display three team members in grid

**Given** a user inserts the "Meet Our Team" pattern in the Site Editor  
**When** the pattern renders  
**Then** exactly 3 columns of team member cards are displayed  
**And** columns have equal width  
**And** gap between columns is 30px-40px  

#### Scenario: Responsive behavior on mobile

**Given** the pattern is viewed on a mobile device (<768px width)  
**When** the viewport is narrow  
**Then** columns stack vertically into single column layout  
**And** each card maintains full width  

---

### Requirement: Team cards shall display photos as circular full-background images with overlay

Each team member card SHALL use the member's photo as a full-background image with circular border treatment and a dark gradient overlay to create visual impact and support overlaid text.

#### Scenario: Photo fills card background

**Given** a team member card is rendered  
**When** the card displays  
**Then** the doctor's photo fills the entire card background  
**And** the photo uses `object-fit: cover` to prevent distortion  
**And** a dark gradient overlay is applied from top (transparent) to bottom (dark)  

#### Scenario: Circular photo treatment

**Given** a team member card is rendered  
**When** styling is applied  
**Then** the card has border-radius creating circular or near-circular shape  
**And** aspect ratio is maintained at 1:1 or 4:5  
**And** photo edges are clipped to follow the border radius  

---

### Requirement: Team cards shall use staggered heights for visual rhythm

The middle column SHALL be offset vertically to create a zigzag/staggered visual effect that adds dynamism to the layout while maintaining readability.

#### Scenario: Middle column offset creates zigzag

**Given** three team member cards are displayed in columns  
**When** the layout renders on desktop/tablet  
**Then** column 1 (left) has margin-top of 0  
**And** column 2 (middle) has margin-top of 50px-60px  
**And** column 3 (right) has margin-top of 0  
**And** the offset creates a visible staggered effect  

#### Scenario: Stagger removed on mobile

**Given** the pattern is viewed on mobile (<768px width)  
**When** columns stack vertically  
**Then** all stagger offsets are removed  
**And** cards align with consistent spacing  

---

### Requirement: Text content shall overlay photos with light/white colors

All text content (doctor names, specialties, bios) SHALL be positioned over the photo background with light/white colors to ensure readability against the dark overlay.

#### Scenario: Text displays over dark overlay

**Given** a team member card with photo background  
**When** content is rendered  
**Then** doctor name displays in white or light color (#FFFFFF or #E0E0E0)  
**And** specialty title displays in white or light color  
**And** bio description displays in white or light color  
**And** all text is positioned at the bottom of the card  
**And** text is center-aligned  

#### Scenario: Text contrast meets WCAG AA

**Given** text content overlaid on photo background  
**When** contrast is measured  
**Then** doctor name (large text, ≥18px bold) has minimum 3:1 contrast ratio  
**And** specialty and bio text (normal size) has minimum 4.5:1 contrast ratio  
**And** the dark gradient overlay ensures sufficient contrast  

---

### Requirement: Pattern shall display only three team members

The pattern SHALL be updated to show 3 team members instead of 4 to align with the 3-column layout, removing the 4th doctor profile.

#### Scenario: Three doctors displayed

**Given** the "Meet Our Team" pattern is inserted  
**When** the pattern renders  
**Then** exactly 3 doctor profiles are shown  
**And** doctors are: Dr. Sarah Jenkins, Dr. James Wilson, Dr. Emily Chen  
**And** Dr. Michael Ross (4th doctor) is removed  
**And** all existing content for the 3 doctors is preserved  

---

## ADDED Requirements

### Requirement: Team cards shall use WordPress Cover blocks for photo backgrounds

Each team member card SHALL use the core `wp:cover` block instead of `wp:image` blocks to support background images with overlays and nested content.

#### Scenario: Cover block with background image

**Given** a team member card is rendered  
**When** the block markup is parsed  
**Then** the card uses a `wp:cover` block  
**And** the doctor's photo URL is set as the cover background  
**And** the cover block has a dark gradient overlay configured  
**And** text content is nested inside the cover block  

#### Scenario: Cover block supports content nesting

**Given** a cover block with photo background  
**When** text content is added  
**Then** doctor name, specialty, title, bio are nested as child blocks  
**And** content is positioned at the bottom of the cover  
**And** content inherits proper spacing and padding  

---

### Requirement: Pattern styling shall use theme.json color tokens

All colors in the pattern SHALL reference theme.json color palette via CSS custom properties to maintain design system consistency.

#### Scenario: Text colors use theme tokens

**Given** text content is styled  
**When** color values are applied  
**Then** white/light text uses `base` (#FFFFFF) or `text-dark` (#E0E0E0) color slugs  
**And** overlay uses `background-dark` or rgba values  
**And** section background uses `background-light` or `base`  
**And** no hardcoded hex colors are used outside theme palette  

---

## REMOVED Requirements

### Requirement: Team cards shall use white backgrounds with borders

**Removed**: Team cards no longer use white card backgrounds with borders. Cards now use full-background photos with overlays.

---

### Requirement: Team pattern shall display four team members in grid

**Removed**: Pattern no longer displays 4 team members. Updated to 3-column layout with 3 team members.

---

### Requirement: Photos shall be contained within card sections

**Removed**: Photos are no longer contained in separate image blocks. They now serve as full-background images using cover blocks.

---

### Requirement: Text content shall be separated from photos

**Removed**: Text is no longer in a separate section below photos. Text is now overlaid on photos at the bottom of cards.
