# Change: Update Single Post Template Layout

## Why
The current `single.html` template uses a basic vertical layout with post metadata at the top and bottom navigation. The reference design (Article - View 6) provides a more professional, medical resource-focused layout with a sidebar containing resource details and sharing options, improving user engagement and content discoverability.

## What Changes
- Replace vertical layout with two-column layout (sidebar + main content)
- Move post metadata (author, date, reading time) to sidebar "Resource Details" card
- Add "Share This Article" card to sidebar with social media sharing buttons
- Add "Back to Resources" link above post title
- Add post excerpt/description below title
- Remove post navigation (previous/next links)
- Remove categories/tags from bottom of post
- Add collapsible comments section with toggle button
- Add "Related Resources" section at the bottom of the post
- Update spacing and styling to match reference design

## Impact
- **Affected specs**: `single-post-template` (new spec)
- **Affected code**: `templates/single.html` (complete rewrite of layout structure)
- **Breaking changes**: None - this is a visual/layout change only, no data structure changes
- **Compatibility**: Maintains WordPress block theme standards, all WordPress core blocks
