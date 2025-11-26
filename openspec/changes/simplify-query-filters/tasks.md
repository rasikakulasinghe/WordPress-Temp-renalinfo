# Implementation Tasks

## 1. Update Block Attributes
- [x] 1.1 Remove `showSearch` attribute from `block.json`
- [x] 1.2 Remove `targetTaxonomy` attribute from `block.json`
- [x] 1.3 Remove `showAuthor` attribute from `block.json`
- [x] 1.4 Validate `block.json` syntax

## 2. Update Block Editor (edit.js)
- [x] 2.1 Remove search toggle control from InspectorControls
- [x] 2.2 Remove taxonomy selector dropdown from InspectorControls
- [x] 2.3 Remove author toggle control from InspectorControls
- [x] 2.4 Update preview display to remove removed filters
- [x] 2.5 Update activeFilters logic to reflect removed options

## 3. Update Frontend Rendering (render.php)
- [x] 3.1 Remove search input section
- [x] 3.2 Remove author dropdown section
- [x] 3.3 Hardcode taxonomy to `post_tag` instead of using `$target_taxonomy` variable
- [x] 3.4 Update taxonomy label to always say "Tags"
- [x] 3.5 Keep multi-select functionality for tags
- [x] 3.6 Validate PHP syntax with `C:/xampp/php/php.exe -l blocks/query-filter-container/render.php`

## 4. Update Frontend JavaScript (view.js)
- [x] 4.1 Keep form cleanup logic for date inputs
- [x] 4.2 Keep form cleanup logic for select dropdowns
- [x] 4.3 Keep form cleanup logic for multi-selects

## 5. Build Custom Block
- [x] 5.1 Install dependencies with `npm install --legacy-peer-deps` (if not already installed)
- [x] 5.2 Run production build with `npm run build`
- [x] 5.3 Verify build artifacts are generated in `build/` directory

## 6. Update Documentation
- [x] 6.1 Update CLAUDE.md Custom Blocks section to reflect simplified filters
- [x] 6.2 Update block attributes documentation
- [x] 6.3 Update usage examples to show only available filters

## 7. Testing
- [ ] 7.1 Test block in Site Editor - verify only sort, date, and tags show in InspectorControls
- [ ] 7.2 Test frontend rendering - verify only sort, date, and tags filters display
- [ ] 7.3 Test multi-select tag functionality
- [ ] 7.4 Test form submission with various filter combinations
- [ ] 7.5 Test reset button functionality
- [ ] 7.6 Test keyboard navigation (Tab through inputs, Enter/Space to toggle)
- [ ] 7.7 Test mobile responsive layout
