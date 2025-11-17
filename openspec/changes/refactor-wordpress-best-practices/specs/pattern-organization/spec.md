# Spec: Pattern Organization

## Overview

This spec defines requirements for properly registering and organizing block patterns to ensure all patterns are visible and correctly categorized in the WordPress Site Editor.

---

## ADDED Requirements

### Requirement: Register Post Format Category

**ID:** PO-001
**Priority:** Critical
**Status:** New

The theme MUST register the `renalinfolk_post-format` pattern category to make post format patterns visible.

**Rationale:**
- 3 patterns use `renalinfolk_post-format` category (binding-format.php, format-link.php, format-audio.php)
- Category is not registered in functions.php
- Unregistered categories cause patterns to be hidden in Site Editor

#### Scenario: Category Registration in functions.php

**Given** the theme has post format patterns
**When** functions.php is loaded
**Then** the `renalinfolk_post-format` category MUST be registered via `register_block_pattern_category()`
**And** the registration MUST include a `label` property
**And** the registration MUST include a `description` property
**And** the registration MUST use the `renalinfolk` text domain for translation

**Implementation:**
```php
register_block_pattern_category(
    'renalinfolk_post-format',
    array(
        'label'       => __( 'Post Formats', 'renalinfolk' ),
        'description' => __( 'Patterns for different post format types (audio, link, etc.).', 'renalinfolk' ),
    )
);
```

#### Scenario: Post Format Patterns Visible in Editor

**Given** the category is registered
**When** a user opens the pattern inserter in the WordPress editor
**Then** a "Post Formats" category MUST be visible
**And** the category MUST contain 3 patterns:
  - Format: Audio
  - Format: Link
  - Binding Format
**And** all patterns MUST be insertable without errors

---

## MODIFIED Requirements

### Requirement: Pattern Category Consistency

**ID:** PO-002
**Priority:** High
**Status:** Modified

All pattern categories MUST be registered in functions.php before being used in pattern files.

**Changes:**
- **Before:** Some patterns use unregistered categories (`renalinfolk_page`)
- **After:** All patterns use only registered categories

#### Scenario: Renalinfolk Page Category Resolution

**Given** 6 patterns currently use the `renalinfolk_page` category
**When** the refactoring is complete
**Then** these patterns MUST be recategorized to use `renalinfolk_medical_pages` (already registered):
  - `patterns/page-business-home.php`
  - `patterns/page-cv-bio.php`
  - `patterns/page-coming-soon.php`
  - `patterns/page-landing-event.php`
  - `patterns/page-landing-book.php`
  - `patterns/page-portfolio-home.php`
**And** the pattern header MUST change from:
  ```php
  * Categories: renalinfolk_page
  ```
**To:**
  ```php
  * Categories: renalinfolk_medical_pages
  ```

#### Scenario: No Unregistered Categories Remain

**Given** all patterns have been updated
**When** validating pattern categories
**Then** running `rg "Categories:.*renalinfolk" patterns/` MUST only return these registered categories:
  - `renalinfolk_medical_pages`
  - `renalinfolk_medical_content`
  - `renalinfolk_post-format`
**And** no patterns MUST use unregistered categories
**And** all patterns MUST be visible in the Site Editor pattern inserter

**Validation:**
```bash
# Find all pattern categories
rg "Categories:" patterns/*.php

# Verify only registered categories
rg "Categories:.*renalinfolk_page" patterns/  # Should return nothing
```

---

### Requirement: Complete Category Registration

**ID:** PO-003
**Priority:** High
**Status:** Modified

The theme MUST register exactly 3 pattern categories in functions.php.

**Changes:**
- **Before:** 2 registered categories (medical_pages, medical_content)
- **After:** 3 registered categories (add post-format)

#### Scenario: All Three Categories Registered

**Given** pattern categories are being registered
**When** the theme loads
**Then** the following categories MUST be registered in functions.php:

1. **renalinfolk_medical_pages:**
   - Label: "Medical Pages"
   - Description: "Full page layouts for medical departments, services, and resources."

2. **renalinfolk_medical_content:**
   - Label: "Medical Content"
   - Description: "Content sections for articles, publications, and patient resources."

3. **renalinfolk_post-format:** (NEW)
   - Label: "Post Formats"
   - Description: "Patterns for different post format types (audio, link, etc.)."

**And** all registrations MUST occur in the `renalinfolk_pattern_categories()` function
**And** the function MUST be hooked to the `init` action

---

## Acceptance Criteria

**All requirements met when:**

1. ✅ **Post format category registered:**
   ```bash
   rg "renalinfolk_post-format" functions.php
   # Returns: register_block_pattern_category registration
   ```

2. ✅ **No unregistered categories in use:**
   ```bash
   rg "Categories:.*renalinfolk_page" patterns/
   # Returns: (empty)
   ```

3. ✅ **All patterns visible in editor:**
   - Open WordPress admin > Appearance > Editor
   - Open pattern inserter (+)
   - Verify 3 categories: Medical Pages, Medical Content, Post Formats
   - Verify all 80 patterns are visible

4. ✅ **Category registration validated:**
   ```bash
   # Count category registrations in functions.php
   rg "register_block_pattern_category" functions.php | wc -l
   # Output: 3
   ```

5. ✅ **Pattern categorization validated:**
   ```bash
   # Extract all unique categories used
   rg "Categories: (.*)" patterns/ -or '$1' | sort -u
   # Should return only: renalinfolk_medical_pages, renalinfolk_medical_content, renalinfolk_post-format
   # (Plus WordPress core categories like 'featured', 'buttons', etc. if used)
   ```

---

## Validation Tests

### Test 1: Category Registration

```php
// In WordPress admin, run this in a PHP console or snippet:
$categories = WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
foreach ($categories as $category) {
    if (strpos($category['name'], 'renalinfolk') !== false) {
        echo $category['name'] . ': ' . $category['label'] . "\n";
    }
}

// Expected output:
// renalinfolk_medical_pages: Medical Pages
// renalinfolk_medical_content: Medical Content
// renalinfolk_post-format: Post Formats
```

### Test 2: Pattern Visibility

**Manual Test:**
1. Open WordPress admin
2. Create new post or page
3. Click + to open block inserter
4. Click "Patterns" tab
5. Verify categories appear:
   - Medical Pages (with ~6+ patterns)
   - Medical Content (with ~60+ patterns)
   - Post Formats (with 3 patterns)
6. Insert one pattern from each category
7. Verify patterns render without errors

### Test 3: Pattern File Validation

```bash
# Check all pattern files for proper category usage
for file in patterns/*.php; do
  echo "Checking $file..."

  # Extract category line
  category=$(grep "Categories:" "$file" | head -1)

  # Check if uses unregistered category
  if echo "$category" | grep -q "renalinfolk_page"; then
    echo "❌ FAIL: $file uses unregistered category 'renalinfolk_page'"
  else
    echo "✅ PASS: $file uses valid category"
  fi
done
```

---

## Related Specs

- **Template System** (template-system/spec.md) - Template parts used in patterns
- **Code Quality** (code-quality/spec.md) - Pattern file standards

---

**Spec Version:** 1.0
**Last Updated:** 2025-11-17
**Status:** 🟢 READY FOR IMPLEMENTATION
