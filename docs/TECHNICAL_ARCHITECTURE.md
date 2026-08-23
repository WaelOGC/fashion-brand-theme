# Technical Architecture

## 1. Purpose

This document defines the technical architecture of the custom WordPress/WooCommerce theme for **WREN WOLD**.

The architecture must remain clean, modular, maintainable and scalable.

The project is developed locally using Local and Cursor, then prepared for deployment to a production WordPress environment.

Brand identity (name, logo direction, Quiet Character): see `BRAND_IDENTITY.md`, `LOGO_GUIDELINES.md`, `VISUAL_IDENTITY.md`.

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

The custom theme lives inside the WordPress installation at:

`app/public/wp-content/themes/`

Current theme directory (technical slug):

`app/public/wp-content/themes/fashion-brand-theme/`

**Brand name:** WREN WOLD (finalized).

The theme directory slug may be renamed later in a controlled technical migration. Brand identity documentation is the source of truth for the public brand name.

---

## 4. Theme Architecture

```text
fashion-brand-theme/
│
├── style.css
├── functions.php
├── front-page.php
├── header.php
├── footer.php
│
├── assets/
│   ├── css/
│   │   ├── tokens/
│   │   ├── base/
│   │   ├── components/
│   │   └── admin/
│   └── js/
│
├── inc/
│   ├── setup.php
│   ├── enqueue.php
│   ├── navigation.php
│   ├── homepage.php
│   ├── woocommerce.php
│   └── admin/
│       ├── settings.php
│       ├── settings-fields.php
│       ├── theme-settings.php
│       ├── customizer.php
│       └── admin.php
│
├── template-parts/
│   ├── global/
│   ├── header/
│   ├── footer/
│   └── homepage/
│
└── woocommerce/
```

### Site Information Architecture

Primary navigation (code-controlled; assignable via **Appearance → Menus** using the **Primary Navigation** location):

| Item | Type | Placeholder path |
|------|------|------------------|
| Shop | Top-level + submenu | `/shop/` |
| Collections | Top-level | `/collections/` |
| Guides | Top-level | `/guides/` |
| About | Top-level | `/about/` |
| Contact | Top-level | `/contact/` |

Utility navigation (header template; not primary menu):

| Item | Resolution |
|------|------------|
| Search | WordPress search (`get_search_link()`) |
| Account | WooCommerce My Account page, or `/my-account/` placeholder |
| Cart | WooCommerce Cart page, or `/cart/` placeholder |

Approved shop category slugs (nested under Shop):

| Label | Slug | Placeholder path |
|-------|------|------------------|
| T-Shirts | `t-shirts` | `/product-category/t-shirts/` |
| Hoodies | `hoodies` | `/product-category/hoodies/` |
| Tops | `tops` | `/product-category/tops/` |
| Dresses | `dresses` | `/product-category/dresses/` |
| Pants | `pants` | `/product-category/pants/` |
| Everyday Essentials | `everyday-essentials` | `/product-category/everyday-essentials/` |
| Occasion / Evening Wear | `occasion-evening-wear` | `/product-category/occasion-evening-wear/` |

The Shop submenu also includes **All Products**, which resolves to the shop URL rather than a category archive.

### URL helpers (`inc/navigation.php`)

All theme destinations must use centralized helpers — templates must not hardcode paths.

| Helper | Purpose |
|--------|---------|
| `fashion_brand_theme_get_theme_page_slugs()` | Canonical page slug registry |
| `fashion_brand_theme_get_product_category_slugs()` | Canonical category slug registry |
| `fashion_brand_theme_get_shop_url()` | Shop archive (WooCommerce page or `/shop/` placeholder) |
| `fashion_brand_theme_get_page_url( $slug )` | Theme page (published page permalink or placeholder) |
| `fashion_brand_theme_get_product_category_url( $slug )` | Category archive (term link or placeholder) |
| `fashion_brand_theme_get_account_url()` | Account page (WooCommerce or placeholder) |
| `fashion_brand_theme_get_cart_url()` | Cart page (WooCommerce or placeholder) |
| `fashion_brand_theme_get_search_url()` | WordPress search URL |

When real WordPress pages are published with matching slugs, helpers automatically resolve to permalinks. The theme does not create pages automatically.

### Template hierarchy

| Context | Template | Notes |
|---------|----------|-------|
| Front page | `front-page.php` | Homepage sections via settings helpers |
| Pages | `page.php` | Standard page output |
| Single posts | `single.php` | Uses `template-parts/components/content` |
| Archives | `archive.php` | Generic archive fallback |
| Search | `search.php` | Search form + results |
| 404 | `404.php` | Theme 404; no redirects |
| Fallback | `index.php` | Last resort template |

Invalid URLs continue to use the theme `404.php` template. No automatic redirects are implemented.

---

## 5. Theme Control Matrix

The theme uses a strict boundary between WordPress Core, Theme Settings, Customizer, WooCommerce, and code-controlled architecture.

| Area | WordPress Core | Theme Settings | Customizer | WooCommerce | Code / Cursor |
|------|----------------|----------------|------------|-------------|---------------|
| Site title / tagline | ✓ | | | | |
| Site icon / custom logo | ✓ | | ✓ (core Site Identity) | | |
| Users / roles | ✓ | | | | |
| Menus (structure & links) | ✓ | | | | Theme registers locations |
| Reading settings / permalinks | ✓ | | | | |
| Media library | ✓ | | | | |
| Announcement bar | | ✓ | partial | | Markup/styles in code |
| Display label fallback | | ✓ | ✓ | | |
| Header utility toggles | | ✓ | | | Layout in code |
| Header sticky / scroll shadow | | ✓ | | | Implementation in code |
| Primary navigation structure | | | | | ✓ |
| Homepage section order | | | | | ✓ |
| Homepage section visibility | | ✓ | | | |
| Hero / closing CTA copy | | ✓ | | | |
| Homepage layout / design | | | | | ✓ |
| Footer copyright / visibility | | ✓ | | | |
| Footer menu visibility | | ✓ | | | Uses WP menus |
| Social URLs / behavior | | ✓ | | | |
| Shop grid / product presentation | | ✓ | | | Applied via theme filters |
| Products / prices / inventory | | | | ✓ | |
| Cart / checkout / payments | | | | ✓ | |
| Design tokens / typography / colors | | | | | ✓ |
| Responsive behavior / breakpoints | | | | | ✓ |
| Component templates / animations | | | | | ✓ |
| SEO metadata / schema / sitemaps | | | | | SEO plugin + semantic templates |

---

## 6. Theme Settings Architecture

### Storage

All theme settings are stored in one centralized option:

- `fashion_brand_theme_settings`

Settings are grouped logically:

- `general`
- `header`
- `footer`
- `homepage`
- `shop`
- `social`

### Admin menu

WordPress Dashboard:

```text
Fashion Brand
└── Theme Settings
    ├── General
    ├── Header & Footer
    ├── Homepage
    ├── Shop Presentation
    └── Social & Integrations
```

Note: The public brand name is **WREN WOLD**. The WordPress admin menu label above reflects the current theme implementation and may be renamed in a later admin-label update. Brand identity docs are the source of truth for the public name.

### Module files

- `inc/admin/settings.php` — defaults, getters, sanitization, front-end helpers
- `inc/admin/settings-fields.php` — Settings API field registration
- `inc/admin/theme-settings.php` — admin menu and settings page UI
- `inc/admin/customizer.php` — lightweight Customizer integration
- `inc/admin/admin.php` — admin bootstrap

### Capability

- Theme Settings page: `manage_options`
- Customizer controls: `edit_theme_options`

---

## 7. WordPress Admin — Theme Settings

### General

- Display label fallback
- Enable announcement bar
- Announcement text
- Enable announcement link
- Announcement link label
- Announcement link URL

### Header

- Show search
- Show account link
- Show cart link
- Enable search panel
- Enable mobile menu
- Enable sticky header (default: off)
- Enable header shadow on scroll (default: off)

### Footer

- Show footer
- Show copyright
- Footer copyright text
- Show social links
- Show footer menu

Footer menus are assigned under **Appearance → Menus** using the **Footer Menu** location.

### Homepage

Section visibility toggles:

- Hero
- Philosophy
- Categories
- Featured Collection
- Guides
- Closing CTA

Limited content controls:

- Hero eyebrow, heading, supporting text, primary CTA label/URL
- Closing CTA heading, supporting text, primary/secondary CTA labels/URLs

Homepage section order is intentionally code-controlled:

```text
Hero → Philosophy → Categories → Featured Collection → Guides → Closing CTA
```

### Shop Presentation

Presentation-only settings (applied when WooCommerce is installed):

- Product grid columns
- Products per page
- Show product price
- Show product excerpt
- Show product category
- Show product badges

When WooCommerce is not installed, values are stored but safely ignored.

### Social & Integrations

- Enable social links
- Open social links in a new tab
- Instagram, Facebook, Pinterest, TikTok, LinkedIn, YouTube URLs

---

## 8. WordPress Customizer Boundary

The Customizer remains lightweight and exposes only presentation controls that benefit from live preview:

- Display label fallback
- Enable announcement bar
- Announcement text

The Customizer does **not** replace Theme Settings.

WordPress Core **Site Identity** remains responsible for:

- Site title
- Site tagline
- Site icon
- Custom logo

---

## 9. WordPress Core Boundary

The theme does not duplicate:

- Site title
- Site tagline
- Site icon
- Users
- Reading settings
- Permalinks
- Privacy settings
- Media settings
- Menu management (theme registers locations only)

---

## 10. WooCommerce Boundary

WooCommerce owns:

- Products
- Categories (commerce data)
- Product prices
- Inventory
- Orders
- Customers
- Coupons
- Taxes
- Shipping
- Payments
- Cart configuration
- Checkout configuration
- Account functionality

The theme only controls visual presentation and template integration through filters and future template overrides.

---

## 11. Code / Cursor Boundary

The following remain code-controlled:

- Design system and tokens
- Typography system
- Color architecture
- Breakpoints and responsive strategy
- Header/footer/homepage composition
- Navigation information architecture
- Homepage section order
- Component markup
- Animations and JavaScript behavior
- Template selection
- WooCommerce template overrides
- Performance, accessibility, and SEO template structure

---

## 12. Collections, Guides, and Editorial Content

### Collections

Collections are part of the approved site architecture but do not yet have a custom management system.

The homepage featured collection uses placeholder theme data.

Future collection management may use WordPress pages, categories, or a dedicated content model in a later phase.

### Guides

Guides remain compatible with normal WordPress content architecture.

No custom editorial CMS or page builder is implemented in the theme admin.

---

## 13. SEO Boundary

The theme does not implement SEO settings.

SEO metadata, canonical URLs, sitemaps, Open Graph, and schema configuration belong to an SEO plugin such as Yoast SEO.

The theme remains SEO-friendly through semantic HTML and template structure.

---

## 14. Security Model

- WordPress Settings API registration
- Nonce protection via `settings_fields()`
- Sanitization on save (`sanitize_text_field`, `sanitize_textarea_field`, `esc_url_raw`, checkbox normalization)
- Escaping on output (`esc_html`, `esc_attr`, `esc_url`)
- Capability checks (`manage_options`, `edit_theme_options`)

---

## 15. Intentionally Deferred Controls

- Homepage section reordering
- Homepage visual/layout controls
- Collection CMS / custom post types
- Guides editorial field system
- Brand colors / typography admin controls
- Header spacing / color controls
- Sticky announcement behavior variants
- SEO plugin configuration
- WooCommerce checkout/cart admin overrides
- AI assistant configuration
- Product merchandising picker in admin

These may be added only when there is a clear operational requirement.

---

## 16. Backward Compatibility

Existing settings stored in `fashion_brand_theme_settings` remain valid.

New settings use safe defaults that preserve current front-end behavior unless an administrator explicitly changes them.

Examples:

- Sticky header: default off
- Header scroll shadow: default off
- Homepage sections: default on
- Header utility links: default on
