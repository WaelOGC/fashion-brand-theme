# Design System

## 1. Purpose

This document defines the visual and UX principles for the custom WordPress/WooCommerce theme for **WREN WOLD**.

The design system must create a coherent, premium and scalable digital experience for the brand.

**Brand identity is finalized at the strategic level** (name, personality, promise, tone, Quiet Character, logo direction). See:

- `BRAND_IDENTITY.md`
- `LOGO_GUIDELINES.md`
- `VISUAL_IDENTITY.md`

**Locked in this design system:** typefaces (Fraunces + Source Sans 3) and mineral color palette (see Typography and Color sections).

**Still pending:** production logo geometry/files, packaging, photography library, and motion timing refinements.

---

## 2. Core Design Objective

The website should communicate:

QUALITY + SIMPLICITY + ELEGANCE + SUSTAINABILITY + INTELLIGENT CHOICE

The experience should feel like a carefully curated European fashion brand rather than a generic online store.

---

## 3. Visual Personality

Aligned with WREN WOLD:

- Quiet
- Intelligent
- Natural
- Modern
- Confident
- Human
- Independent
- Refined

Core idea: **Quiet Character** — distinctive without trying too hard.

The design should feel confident without being loud, and sophisticated without becoming excessively luxurious.

See `VISUAL_IDENTITY.md` for consolidated visual pillars.

---

## 4. Design Direction

Preferred direction:

Editorial + Modern European + Minimal + Organic

The design may take inspiration from contemporary European and Scandinavian aesthetics, but it must not become a copy of another brand.

The goal is to establish an original visual language.

---

## 5. Layout Principles

Use:

- Generous whitespace
- Strong visual hierarchy
- Clear content grouping
- Balanced proportions
- Clean grids
- Consistent alignment
- Large, high-quality imagery
- Comfortable reading widths

Avoid:

- Crowded interfaces
- Excessive decorative elements
- Unnecessary borders
- Excessive shadows
- Visual noise
- Overuse of animations
- Aggressive promotional blocks

---

## 6. Typography

### Typefaces

| Role | Typeface | Source | License |
|------|----------|--------|---------|
| Display | **Fraunces** | Undercase Type / Google Fonts | SIL OFL 1.1 |
| Body / UI | **Source Sans 3** | Adobe / Google Fonts | SIL OFL 1.1 |

Self-hosted as WOFF2 under `assets/fonts/`. Loaded via `assets/css/base/fonts.css`.

**Why Fraunces:** Soft editorial serif with contemporary European character. Distinctive at large sizes without luxury Playfair/Didot clichés. Supports Quiet Character — refined presence, not spectacle.

**Why Source Sans 3:** Designed for UI and reading. Excellent commerce clarity (prices, nav, product meta). Strong contrast with Fraunces while remaining related in proportion and neutrality.

### Hierarchy

| Token | Family | Size | Weight | Line height | Letter spacing |
|-------|--------|------|--------|-------------|----------------|
| Display XL | Fraunces | `clamp(2.75rem … 4.75rem)` | 400 | 1.15 | -0.025em |
| Display | Fraunces | `clamp(2.125rem … 3.5rem)` | 400 | 1.15 | -0.025em |
| H1 | Fraunces | `clamp(1.75rem … 2.5rem)` | 400 | 1.15 | -0.015em |
| H2 | Fraunces | `clamp(1.375rem … 1.875rem)` | 400 | 1.3 | -0.015em |
| H3 | Source Sans 3 | `clamp(1.125rem … 1.375rem)` | 500 | 1.3 | default |
| Body Large | Source Sans 3 | `clamp(1.0625rem … 1.1875rem)` | 400 | 1.75 | 0 |
| Body | Source Sans 3 | `1rem` | 400 | 1.6 | 0 |
| Small | Source Sans 3 | `0.875rem` | 400 | 1.6 | 0 |
| Caption | Source Sans 3 | `0.8125rem` | 400 | 1.6 | 0 |
| Label | Source Sans 3 | `0.75rem` | 500 | 1.3 | 0.06em (uppercase) |
| Navigation | Source Sans 3 | `0.9375rem` | 500 | 1.3 | 0.02em |
| Button | Source Sans 3 | `0.9375rem` | 500 | 1.3 | 0.02em |
| Price | Source Sans 3 | `1rem` | 500 | 1.3 | default |
| Product name | Source Sans 3 | `1rem` | 500 | 1.3 | default |

Chapter / statement composites remain available for homepage editorial use (`--font-chapter`, `--font-statement`).

### Responsive behavior

- Display sizes use `clamp()` for fluid scaling from smartphone to large desktop.
- At ≤360px (`22.5rem`), display and chapter sizes compress further to prevent overflow.
- Body stays at `1rem` minimum for readability on all viewports.
- Product name and price stay Source Sans 3 — scannable in commerce contexts.

### Usage principles

- Fraunces for brand voice: heroes, collection titles, editorial statements, H1/H2.
- Source Sans 3 for interface and commerce: body, nav, buttons, prices, product names, labels.
- Do not use Fraunces for dense product grids or cart line items.
- Prefer regular (400) for display; reserve 500/600 for emphasis in UI.

---

## 7. Color System

### Palette direction

Natural · mineral · muted · editorial · restrained · contemporary European.

Avoids generic luxury black/gold and overly warm beige “Pinterest fashion” treatments.

Accent is **oxidized moss** — landscape association with WOLD, quiet rather than loud.

### Neutral scale

| Token | HEX | Role |
|-------|-----|------|
| `--color-neutral-50` | `#F3F2EF` | Primary background |
| `--color-neutral-100` | `#E9E7E2` | Secondary / chapter surface |
| `--color-neutral-200` | `#D6D2CB` | Borders, soft fills |
| `--color-neutral-300` | `#B8B3A9` | Strong borders |
| `--color-neutral-400` | `#8C877E` | Subtle text |
| `--color-neutral-500` | `#5A564F` | Secondary text |
| `--color-neutral-600` | `#4A4742` | Deep muted |
| `--color-neutral-700` | `#35332F` | Strong text support |
| `--color-neutral-800` | `#242321` | Primary text / dark surface |
| `--color-neutral-900` | `#161514` | Deepest ink |

### Semantic colors

| Token | HEX / mapping | Use |
|-------|---------------|-----|
| `--color-background` | `#F3F2EF` | Page background |
| `--color-surface` | `#FAFAF8` | Cards, elevated surfaces |
| `--color-surface-muted` | `#E9E7E2` | Muted panels |
| `--color-surface-collection` | `#242321` | Inverse / dark editorial bands |
| `--color-text` | `#242321` | Primary text |
| `--color-text-muted` | `#5A564F` | Secondary text |
| `--color-text-subtle` | `#8C877E` | Captions, decorative indices |
| `--color-text-inverse` | `#F3F2EF` | Text on dark surfaces |
| `--color-accent` | `#3F5348` | Primary interactive / CTA |
| `--color-accent-hover` | `#33443B` | Hover / active |
| `--color-border` | `#D6D2CB` | Default borders |
| `--color-border-strong` | `#B8B3A9` | Emphasized borders |
| `--color-focus` | `#3F5348` | Focus rings |
| `--color-success` | `#3D5C4A` | Success UI |
| `--color-warning` | `#7A6235` | Warning UI |
| `--color-error` | `#8B4A42` | Error UI |

### Accessibility (WCAG 2.1 AA)

| Pair | Contrast | Result |
|------|----------|--------|
| Primary text on background | ~14.0:1 | Pass (AAA) |
| Muted text on background | ~6.5:1 | Pass (AA) |
| Inverse text on dark surface | ~14.0:1 | Pass (AAA) |
| Button text on accent | ~7.9:1 | Pass (AA) |
| Accent text on background | ~7.4:1 | Pass (AA) |
| Error on background | ~5.9:1 | Pass (AA) |

All colors are centralized in `assets/css/tokens/colors.css`.

---

## 8. Imagery

Photography is a major component of the brand experience.

Preferred imagery:

- Natural lighting
- Editorial composition
- Authentic environments
- Modern European lifestyle
- Calm styling
- High-quality product photography
- Natural textures
- Minimal backgrounds

Avoid:

- Cheap-looking stock photography
- Overly artificial imagery
- Excessive visual effects
- Generic marketplace product photos
- Visually inconsistent photography

Product photography should remain the primary visual focus on commerce pages.

---

## 9. Product Presentation

Products should feel curated rather than mass-produced.

Product cards should prioritize:

- Product image
- Product name
- Price
- Relevant variant information
- Clear interaction
- Consistent proportions

Avoid excessive information directly inside product cards.

Product pages should provide deeper information including:

- Product imagery
- Description
- Materials
- Fit
- Size information
- Care instructions
- Sustainability information where verified
- Recommended products

---

## 10. Navigation

Navigation should be simple and predictable.

Approved primary navigation:

- Shop
- Collections
- Guides
- About
- Contact

Shop categories are nested under Shop. Categories must NOT appear as a separate top-level navigation item.

Utility navigation includes:

- Search
- Cart
- My Account

Primary and utility navigation are defined in `/docs/CONTENT_ARCHITECTURE.md`.

Avoid unnecessary menu complexity.

---

## 11. Buttons and Calls to Action

Primary actions should be visually clear without being aggressive.

Examples:

- Shop Collection
- View Product
- Add to Cart
- Explore
- Discover
- Find My Style

Buttons should have:

- Consistent sizing
- Clear contrast
- Accessible focus states
- Predictable hover behavior
- Consistent typography

---

## 12. AI Fashion Assistant

The future AI Fashion Assistant should feel like a natural part of the shopping experience.

It should not feel like a generic customer-service chatbot.

The intended experience is conversational product discovery.

Example:

Customer:

"I need something elegant for work that I can also wear to dinner."

The assistant should recommend relevant products from the actual store catalogue.

The visual integration of this feature must remain lightweight and non-intrusive.

Implementation is planned for a later phase.

---

## 13. Digital Guides

The brand may offer digital style guides and educational resources.

These should feel like premium editorial resources rather than a conventional blog.

Potential areas:

- Capsule Wardrobe
- Outfit Coordination
- Fabric Knowledge
- Wardrobe Planning
- Better Clothing Choices

The design should integrate these resources naturally into the commerce experience.

---

## 14. Responsive Design

The design must be responsive across:

- Desktop
- Tablet
- Mobile

Mobile layouts must be intentionally designed rather than simply scaled down from desktop.

Important mobile priorities:

- Easy navigation
- Fast product discovery
- Readable typography
- Touch-friendly controls
- Efficient product browsing
- Simple checkout interaction

---

## 15. Motion and Interaction

Animations should be subtle and purposeful.

Preferred:

- Soft transitions
- Gentle hover states
- Smooth image interactions
- Minimal entrance animations

Avoid:

- Excessive motion
- Distracting effects
- Long loading animations
- Animation that negatively affects performance

Motion must support the experience, not compete with the products.

---

## 16. Accessibility

Accessibility is part of the design system.

The interface should consider:

- Sufficient contrast
- Keyboard navigation
- Visible focus states
- Semantic structure
- Accessible forms
- Descriptive labels
- Appropriate image alt text
- Touch target sizes

Accessibility must not be treated as a final-stage task.

---

## 17. Design Tokens

The final implementation should centralize reusable design values.

Potential token groups:

- Colors
- Typography
- Font sizes
- Spacing
- Border radius
- Shadows
- Transitions
- Container widths
- Breakpoints

Avoid scattering these values throughout individual components.

---

## 18. Brand Identity Dependency

**Finalized:**

- Brand name — WREN WOLD
- Personality, promise, tone, Quiet Character
- Logo direction (W monogram + wordmark system)
- Display + body typefaces (Fraunces + Source Sans 3)
- Mineral color palette and semantic tokens

**Still pending:**

- Production logo SVG / vector files and favicon set (`assets/brand/`)
- Packaging identity
- Photography production library
- Exact motion timing refinements beyond current tokens

Logo usage: `LOGO_GUIDELINES.md`  
Visual pillars: `VISUAL_IDENTITY.md`

---

## 19. Design Quality Standard

Every page should answer three questions:

1. Does it feel like a serious European fashion brand?
2. Is the interface simple and intuitive?
3. Does the design make the customer feel confident about the product?

If a design element does not improve clarity, trust, usability or brand perception, it should be questioned before being added.

---

## 20. Final Principle

The website should feel:

Quiet, intentional, intelligent and beautifully simple.

The goal is not to impress the user with the interface.

The goal is to make the user trust the brand, understand the products and enjoy the experience.