# Toggle Button Not Working - Troubleshooting Guide

## Quick Fix Steps

### 1. Clear All Caches (MOST IMPORTANT)

**WordPress Cache**:
```
- If using a caching plugin (WP Super Cache, W3 Total Cache, etc.):
  - Go to plugin settings
  - Click "Clear All Cache" or "Purge Cache"

- If using hosting cache (Cloudflare, SiteGround, etc.):
  - Clear from hosting control panel
```

**Browser Cache** (CRITICAL):
```
Chrome/Edge: Ctrl + Shift + R (Windows) or Cmd + Shift + R (Mac)
Firefox: Ctrl + Shift + Delete, select "Cached Web Content", click Clear
Safari: Cmd + Option + E
```

### 2. Verify JavaScript is Loading

**Check in Browser DevTools**:

1. **Open DevTools**: Press F12 or right-click > Inspect
2. **Go to Network tab**
3. **Filter by JS**: Click "JS" button
4. **Reload page**: Press F5
5. **Look for**: `view.js` in the list

**Expected**:
```
✅ view.js (loaded, status 200)
Size: ~405 bytes
```

**If NOT loading**:
```
❌ view.js missing from Network tab
→ Continue to Step 3
```

### 3. Check Script is Enqueued

**View Page Source** (Right-click page > View Page Source):

**Search for** (Ctrl+F): `query-filter-container`

**You should see**:
```html
<script src='http://yoursite.com/wp-content/themes/renalinfolk/blocks/query-filter-container/build/view.js?ver=2.0' id='renalinfolk-query-filter-view-js'></script>
```

**If NOT found**:
- WordPress is not enqueuing the script
- Check functions.php line 548-564

### 4. Test JavaScript Manually

**Open Browser Console** (F12 > Console tab):

**Type this**:
```javascript
document.querySelectorAll('.query-filter-toggle').length
```

**Expected Result**:
```
1 (or however many filter blocks on page)
```

**If 0**:
- The HTML is not rendering
- Check render.php is being used

**Manual Test Toggle**:
```javascript
// Find the button
const btn = document.querySelector('.query-filter-toggle');
console.log('Button found:', btn);

// Click it manually
if(btn) {
    btn.click();
    console.log('aria-expanded:', btn.getAttribute('aria-expanded'));
}
```

**Expected**:
```
Button found: <button class="query-filter-toggle">
aria-expanded: true
```

### 5. Check for JavaScript Errors

**Console Tab** (F12 > Console):

**Look for RED errors**:
```
❌ Uncaught TypeError...
❌ Uncaught ReferenceError...
❌ Failed to load resource...
```

**Common Errors**:

| Error | Cause | Fix |
|-------|-------|-----|
| `Cannot read properties of undefined` | Old cached script | Clear cache |
| `view.js 404` | File not built | Run `npm run build` |
| `Syntax error` | Corrupted build | Rebuild with `npm run build` |

### 6. Force Script Re-registration

**In WordPress Admin**:

1. Go to **Appearance > Themes**
2. **Activate a different theme** (Twenty Twenty-Four)
3. **Reactivate Renalinfolk theme**
4. **Clear all caches again**

This forces WordPress to re-register all scripts.

### 7. Manual Script Injection (Emergency Fix)

**If nothing else works**, add this to `functions.php` temporarily:

```php
// TEMPORARY: Force enqueue filter toggle script
function renalinfolk_force_toggle_script() {
    if ( ! is_admin() ) {
        wp_enqueue_script(
            'renalinfolk-toggle-emergency',
            get_theme_file_uri( 'blocks/query-filter-container/build/view.js' ),
            array(),
            filemtime( get_theme_file_path( 'blocks/query-filter-container/build/view.js' ) ),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'renalinfolk_force_toggle_script', 999 );
```

Then reload page with hard refresh.

## Verification Checklist

- [ ] Cleared WordPress cache
- [ ] Cleared browser cache (hard refresh)
- [ ] `view.js` appears in Network tab
- [ ] `view.js` in page source
- [ ] No JavaScript errors in console
- [ ] Button exists in HTML (`.query-filter-toggle`)
- [ ] Drawer exists in HTML (`#query-filter-...`)

## Expected Behavior

When working correctly:

1. **Page loads**: Drawer is hidden
2. **Click button**: Drawer appears instantly
3. **Click again**: Drawer hides instantly
4. **No page reload**: Transition is smooth
5. **Console**: No errors

## Debug Information to Provide

If still not working, check these and report:

```
WordPress Version: (WP Admin > Dashboard > Updates)
Theme Version: (style.css header)
Caching Plugin: (Yes/No, which one?)
Browser: (Chrome, Firefox, Safari, etc.)
Console Errors: (Copy from F12 > Console)
Network Tab: (Is view.js loading? Screenshot)
```

## File Locations to Verify

```
✅ blocks/query-filter-container/build/view.js (405 bytes)
✅ blocks/query-filter-container/render.php (contains .query-filter-toggle)
✅ functions.php line 548-564 (block registration)
```

## Quick Test Script

**Paste in Console** (F12 > Console):

```javascript
// Complete diagnostic
console.log('=== Filter Button Diagnostic ===');
console.log('Buttons found:', document.querySelectorAll('.query-filter-toggle').length);
console.log('Drawers found:', document.querySelectorAll('.query-filter-drawer').length);

const btn = document.querySelector('.query-filter-toggle');
if (btn) {
    console.log('Button attributes:', {
        'aria-expanded': btn.getAttribute('aria-expanded'),
        'aria-controls': btn.getAttribute('aria-controls'),
        'class': btn.className
    });

    const drawerId = btn.getAttribute('aria-controls');
    const drawer = document.getElementById(drawerId);
    console.log('Drawer found:', !!drawer);

    // Test toggle
    console.log('Testing toggle...');
    btn.click();
    setTimeout(() => {
        console.log('After click - aria-expanded:', btn.getAttribute('aria-expanded'));
        console.log('After click - drawer hidden:', drawer.hasAttribute('hidden'));
    }, 100);
} else {
    console.error('❌ Button not found! Check if block is rendered.');
}
```

## Still Not Working?

Try this inline script as last resort:

Add to end of `render.php` before closing `</div>`:

```php
<script>
(function() {
    const btn = document.querySelector('.query-filter-toggle');
    const drawer = document.getElementById('<?php echo esc_js( $filter_id ); ?>');

    if (btn && drawer) {
        btn.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            drawer.hidden = isExpanded;
        });
    }
})();
</script>
```

---

**Updated**: November 26, 2025
**Files Modified**: block.json, functions.php
**Script Registration**: Now explicit with `wp_register_script()`
