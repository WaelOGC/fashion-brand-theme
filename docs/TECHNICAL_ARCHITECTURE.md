# Technical Architecture

## 1. Purpose

This document defines the technical architecture of the custom WordPress/WooCommerce theme.

The architecture must remain clean, modular, maintainable and scalable.

The project is developed locally using Local and Cursor, then prepared for deployment to a production WordPress environment.

---

## 2. Technology Stack

Primary stack:

- WordPress
- WooCommerce
- PHP
- HTML5
- CSS3
- JavaScript
- MySQL
- Nginx
- Local development environment
- Cursor IDE

The theme should use WordPress-native functionality wherever practical.

Avoid unnecessary frameworks unless a clear technical requirement exists.

---

## 3. Project Location

The custom theme will live inside the WordPress installation at:

`app/public/wp-content/themes/`

The final theme directory will use a neutral theme slug until the final brand name is approved.

Example:

`app/public/wp-content/themes/fashion-brand-theme/`

The theme slug may be changed later after the final brand identity is established.

---

## 4. Theme Architecture

The custom theme should be organized into logical layers.

Initial structure:

```text
fashion-brand-theme/
│
├── style.css
├── functions.php
├── index.php
├── front-page.php
├── page.php
├── single.php
├── archive.php
├── search.php
├── 404.php
│
├── header.php
├── footer.php
├── sidebar.php
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
│
├── inc/
│   ├── setup.php
│   ├── enqueue.php
│   ├── template-functions.php
│   ├── template-hooks.php
│   ├── accessibility.php
│   ├── woocommerce.php
│   ├── navigation.php
│   ├── homepage.php
│   └── admin/
│       ├── settings.php
│       ├── theme-settings.php
│       ├── customizer.php
│       └── admin.php
│
├── template-parts/
│   ├── global/
│   ├── header/
│   ├── footer/
│   ├── homepage/
│   ├── product/
│   ├── archive/
│   └── components/
│
└── woocommerce/
    └── [only required WooCommerce template overrides]
```

---

## 5. Theme Settings Architecture

The theme uses a two-level control model.

### A. WordPress Admin — Fashion Brand → Theme Settings

Used for simple operational and content-related settings that a site owner may change after deployment without editing code.

Stored in a single option:

- `fashion_brand_theme_settings`

Current admin sections:

**General**

- Display label fallback (used when no custom logo is set)
- Announcement bar enable/disable
- Announcement text

**Header**

- Enable/disable search
- Enable/disable account link
- Enable/disable cart link

**Footer**

- Footer copyright text override
- Footer visibility

**Social / External Links**

- Instagram URL
- Facebook URL
- Pinterest URL
- TikTok URL

Implementation:

- `inc/admin/settings.php` — defaults, getters, sanitization, front-end helpers
- `inc/admin/theme-settings.php` — Settings API registration and admin page
- `inc/admin/admin.php` — admin bootstrap

Capability required:

- `manage_options`

### B. WordPress Customizer — Fashion Brand Theme section

Used only for lightweight presentation controls that benefit from live preview.

Current Customizer controls:

- Display label fallback
- Announcement bar enable/disable
- Announcement text

Implementation:

- `inc/admin/customizer.php`

Capability required:

- `edit_theme_options`

The Customizer is intentionally small. It does not replace Theme Settings.

### C. Cursor / Codebase

Remains the source of truth for:

- Design system and tokens
- Component architecture
- Homepage section structure
- Header layout and responsive behavior
- Navigation information architecture
- Template structure
- WooCommerce template overrides
- Performance, accessibility, and SEO implementation
- Animations and interaction patterns
- Major layout or visual redesign

### D. WooCommerce Admin

When WooCommerce is installed, the following remain WooCommerce responsibilities:

- Products and categories (data model)
- Inventory
- Payments
- Shipping
- Tax
- Cart and checkout configuration
- Customer account system configuration
- Order management

The theme must not duplicate WooCommerce operational settings.

### E. WordPress Core

The theme must not duplicate WordPress core settings such as:

- Site title
- Site tagline
- Site URL
- Reading settings
- Permalinks
- User management

Custom logo continues to use the WordPress core Customizer / Site Identity control.

---

## 6. Settings Security Model

- Settings are registered through the WordPress Settings API.
- All saved values are sanitized before storage.
- All output is escaped at render time.
- Admin access requires `manage_options`.
- Customizer access requires `edit_theme_options`.
- Admin forms use WordPress nonces via `settings_fields()`.

---

## 7. Front-End Settings Integration

Theme settings currently affect:

- Site branding display label fallback
- Announcement bar output
- Header utility navigation visibility
- Header search panel visibility
- Footer visibility
- Footer copyright text
- Footer social link output when URLs are configured

Settings do not alter design tokens, responsive breakpoints, or component layout architecture.

---

## 8. Future Settings (Intentionally Deferred)

The following are not part of the current Theme Settings foundation:

- Homepage section content management
- Product or collection merchandising controls
- Header navigation structure editing
- Sticky header behavior
- Footer menu/widget architecture
- SEO plugin configuration
- WooCommerce presentation overrides
- Brand color / typography controls (awaiting Brand Identity approval)
- AI assistant configuration

These may be added later if there is a clear operational need.
