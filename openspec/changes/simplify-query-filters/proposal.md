# Change: Simplify Query Filter Container Block

## Why
The current Query Filter Container block has too many filter options (search, sort, date range, taxonomy, author) which creates a cluttered UI and overwhelming user experience. Users need a streamlined filtering interface focused on the most commonly used filters: sort order, date range, and tags.

## What Changes
- Remove search input field option (`showSearch` attribute)
- Remove author dropdown option (`showAuthor` attribute)
- Remove taxonomy type selector - fix to tags only (remove `targetTaxonomy` attribute)
- Keep sort order dropdown (`showSortOrder` attribute)
- Keep date range inputs (`showDate` attribute)
- Update taxonomy filter to always display tags with multi-select capability (keep `showTaxonomy` attribute but hardcode to `post_tag`)

## Impact
- Affected specs: `query-filter-block`
- Affected code:
  - `blocks/query-filter-container/block.json` - Remove attributes
  - `blocks/query-filter-container/src/edit.js` - Remove UI controls
  - `blocks/query-filter-container/render.php` - Remove filter sections
  - `blocks/query-filter-container/src/view.js` - Update form cleanup logic
  - `functions.php` - Update query filtering logic (if needed)
  - Documentation in `CLAUDE.md` - Update block documentation
