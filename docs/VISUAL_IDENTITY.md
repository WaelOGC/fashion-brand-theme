# Visual Identity

## Purpose

This document consolidates the approved visual identity direction for **WREN WOLD**.

It bridges:

- `BRAND_IDENTITY.md` — brand meaning, personality, promise, tone, logo direction
- `VISUAL_CONCEPT.md` — experience concepts and homepage exploration
- `DESIGN_SYSTEM.md` — token and component implementation

Production logo geometry remains TBD. Typefaces and color palette are locked in `DESIGN_SYSTEM.md`.

---

## 1. Core Idea

**Quiet Character**

The visual identity should feel distinctive without trying too hard.

Presence comes from composition, photography, typography, and restraint — not from spectacle, luxury codes, or template decoration.

---

## 2. Brand Atmosphere

WREN WOLD should feel:

- Editorial
- Natural / human
- Accessible premium
- Quietly confident
- Contemporary European
- Commerce-clear

Avoid:

- Generic dropshipping aesthetics
- Shopify fashion template energy
- Beige-minimal Scandi clones without identity
- Black-and-gold luxury cliché
- Loud, trend-driven visual noise

---

## 3. Visual Pillars

### Quiet Character

Distinctive through restraint. Every element earns its place.

### Editorial composition

Layouts behave like composed spreads and chapters — not stacked marketing blocks.

### Natural / mineral atmosphere

Lived-in, human, and grounded. Mineral mist backgrounds with charcoal text and oxidized moss accent. Locked palette in `DESIGN_SYSTEM.md`.

### Typography as recognition

**Fraunces** (display) + **Source Sans 3** (body/UI). Soft editorial serif for voice; clean sans for commerce clarity.

### Photography as layout material

Images participate in composition — crop, bleed, sequence, and overlap with purpose. Not only catalog cards on white.

### Intentional whitespace

Space is an active design material. Dense pages signal insecurity.

### Controlled asymmetry

Offset balance by default for editorial moments. Symmetry reserved for commerce clarity (compare, cart, checkout).

### Purposeful motion

Motion communicates hierarchy, threshold, or feedback. Never decoration alone. Respect `prefers-reduced-motion`.

### Restrained color

Mineral neutrals + moss accent used with discipline. No gold, no terracotta-dominant beige systems.

### Commerce clarity

Editorial attracts; commerce converts. Prices, paths to product, cart, and checkout remain clear — Source Sans 3 for product/price/UI.

### European contemporary character

Netherlands-first, Europe-aware. Confident and cultural without performing “luxury European” clichés.

---

## 4. Composition Principles

- One strong idea per viewport
- Consistency through shared behavior, not repeated identical layouts
- Grid as scaffolding — intentional breaks allowed when composition demands
- Full-bleed moments as punctuation, not the only mode
- Vary image-to-text relationships; do not default to text-left / image-right everywhere

See `VISUAL_CONCEPT.md` for compositional modes and homepage concept directions.

---

## 5. Typography (locked)

| Role | Typeface | License |
|------|----------|---------|
| Display | Fraunces (Undercase Type) | SIL OFL 1.1 |
| Body / UI | Source Sans 3 (Adobe) | SIL OFL 1.1 |

### Intended usage

| Context | Typeface |
|---------|----------|
| Heroes, collection titles, editorial H1/H2, statements | Fraunces |
| Body copy, guides, navigation, buttons | Source Sans 3 |
| Product names, prices, labels, captions | Source Sans 3 |

Full hierarchy, sizes, weights, and responsive rules: `DESIGN_SYSTEM.md` § Typography.

---

## 6. Color (locked)

| Role | HEX |
|------|-----|
| Primary background | `#F3F2EF` |
| Surface | `#FAFAF8` |
| Primary text | `#242321` |
| Secondary text | `#5A564F` |
| Border | `#D6D2CB` |
| Accent (oxidized moss) | `#3F5348` |
| Accent hover | `#33443B` |
| Inverse / dark surface | `#242321` |
| Inverse text | `#F3F2EF` |

Direction: natural, mineral, muted, editorial, restrained.

Full scale, status colors, and WCAG contrast results: `DESIGN_SYSTEM.md` § Color System.

---

## 7. Photography Direction

- Natural or natural-feeling light
- European urban and domestic contexts
- Wearable styling across work → everyday → social → weekend
- Human ease in pose and movement
- Mix of environmental, figure, and detail frames
- Commerce imagery must keep the garment legible
- Editorial imagery may be more atmospheric, but still support the product story

---

## 8. Motion Direction

- Fast, intentional, premium
- Marks hierarchy and mode change
- No scroll-jacking, no decorative parallax excess
- Hover never the only path to critical information
- Cart and checkout: clarity first — minimal experimental motion

---

## 9. Logo in the Visual System

Logo direction and usage: `LOGO_GUIDELINES.md`.

The logo amplifies recognition. It must not be the only recognizable element.

Visual identity should still read as WREN WOLD through composition, type (Fraunces), photography, and mineral color when the wordmark is small or absent.

---

## 10. Relationship to Design System

`DESIGN_SYSTEM.md` is the implementation layer for:

- Tokens (color, type, space, layout, effects)
- Components
- Responsive rules
- Accessibility standards

Typefaces and colors are implemented in theme tokens. Production logo files still pending in `assets/brand/`.

---

## 11. Still TBD

- Production logo SVG / vector set
- Packaging identity
- Photography production library
- Motion timing refinements (beyond current effect tokens)

---

*Quiet Character — distinctive without trying too hard.*
