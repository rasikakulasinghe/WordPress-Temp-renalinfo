# Implementation Plan: [FEATURE]

**Branch**: `[###-feature-name]` | **Date**: [DATE] | **Spec**: [link]
**Input**: Feature specification from `/specs/[###-feature-name]/spec.md`

**Note**: This template is filled in by the `/speckit.plan` command. See `.specify/templates/commands/plan.md` for the execution workflow.

## Summary

[Extract from feature spec: primary requirement + technical approach from research]

## Technical Context

<!--
  ACTION REQUIRED: Replace the content in this section with the technical details
  for the project. The structure here is presented in advisory capacity to guide
  the iteration process.
-->

**WordPress Version**: 6.7+ (required), tested up to 6.8
**PHP Version**: 7.2+ (minimum)
**Theme Type**: Block Theme (Full Site Editing)
**Schema Version**: theme.json v3 (WP 6.8 schema)
**Primary Files**: theme.json, templates/*.html, patterns/*.php, functions.php
**Testing**: WordPress Site Editor, style variations, responsive viewports, accessibility
**Text Domain**: [theme text domain, e.g., twentytwentyfive]
**Build Process**: None (pure block theme - no compilation required)
**Performance Goals**: Fluid typography (clamp), optimized images (WebP), minimal CSS
**Constraints**: WCAG 2.1 Level AA, GPL v2+, WordPress coding standards
**Scale/Scope**: [e.g., 8 style variations, 50+ patterns, 10 template parts]

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

**WordPress Block Theme Principles Compliance:**

- [ ] **Schema Compliance**: Does theme.json validate against WP 6.8 schema?
- [ ] **Block Markup Exclusivity**: Are templates/patterns using block markup only?
- [ ] **theme.json as Source of Truth**: Is styling centralized (no hardcoded values)?
- [ ] **Minimal PHP Logic**: Is functions.php limited to WordPress hooks only?
- [ ] **Template Hierarchy**: Do templates follow WordPress naming conventions?
- [ ] **Accessibility (WCAG 2.1 AA)**: Are color contrast and keyboard nav verified?
- [ ] **Pattern-Based Composition**: Are reusable structures implemented as patterns?

**Violations** (if any - must be justified in Complexity Tracking section):
- None expected for standard WordPress block theme features

## Project Structure

### Documentation (this feature)

```text
specs/[###-feature]/
├── plan.md              # This file (/speckit.plan command output)
├── research.md          # Phase 0 output (/speckit.plan command)
├── data-model.md        # Phase 1 output (/speckit.plan command)
├── quickstart.md        # Phase 1 output (/speckit.plan command)
├── contracts/           # Phase 1 output (/speckit.plan command)
└── tasks.md             # Phase 2 output (/speckit.tasks command - NOT created by /speckit.plan)
```

### Source Code (repository root)
<!--
  ACTION REQUIRED: Replace the placeholder tree below with the concrete layout
  for this feature. Delete unused options and expand the chosen structure with
  real paths (e.g., apps/admin, packages/something). The delivered plan must
  not include Option labels.
-->

```text
# WordPress Block Theme Structure (STANDARD)
/
├── assets/
│   ├── css/              # Editor styles
│   ├── fonts/            # Variable fonts (.woff2)
│   └── images/           # Theme images (CC0 licensed)
├── parts/                # Template parts (.html)
│   ├── header.html
│   ├── footer.html
│   └── sidebar.html
├── patterns/             # Block patterns (.php)
│   ├── template-*.php    # Full page patterns
│   ├── hidden-*.php      # Component patterns
│   └── [feature]-*.php   # Feature patterns
├── styles/               # Style variations (.json)
│   ├── [variation].json  # Complete theme variations
│   ├── blocks/           # Block-specific styles
│   ├── colors/           # Color palette variations
│   ├── sections/         # Section variations
│   └── typography/       # Typography presets
├── templates/            # Block templates (.html - REQUIRED)
│   ├── index.html        # MANDATORY
│   ├── single.html
│   ├── page.html
│   ├── archive.html
│   ├── search.html
│   └── 404.html
├── functions.php         # Theme setup (minimal PHP)
├── style.css             # Theme metadata + minimal CSS
├── theme.json            # Global configuration (PRIMARY)
└── README.txt            # Theme documentation
```

**Structure Decision**: [Document the selected structure and reference the real
directories captured above]

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| [e.g., 4th project] | [current need] | [why 3 projects insufficient] |
| [e.g., Repository pattern] | [specific problem] | [why direct DB access insufficient] |
