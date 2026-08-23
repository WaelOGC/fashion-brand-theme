# Logo Guidelines

## Purpose

This document defines the logo system for **WREN WOLD**.

It covers concept, wordmark, monogram, meaning, production assets, usage principles, and file inventory.

---

## 1. Logo Concept

The approved logo direction is a **custom W monogram**.

The monogram combines:

- The letter **W**
- The initials of **WREN WOLD**
- A subtle abstract wing / movement gesture inspired by the wren

The visual principle is:

**“Recognizable through restraint.”**

### Must not become

- A literal bird illustration
- A complicated emblem
- A decorative luxury crest
- An overly detailed symbol

---

## 2. Wordmark

**WREN WOLD**

The wordmark is the full brand name set as a typographic lockup in all-caps serif with generous tracking, matching the approved reference artwork.

Do not substitute display or UI typefaces for the production wordmark geometry.

---

## 3. Monogram

The **W monogram** is the primary symbolic mark.

It must remain:

- Simple
- Scalable
- Readable at small sizes
- Distinctive without ornament

### Internal symbolism

The **W** also represents the founder’s first initial, **W**.

This meaning is **internal only** and does not need to appear in public brand copy or customer-facing storytelling.

---

## 4. Meaning

| Element | Meaning |
|---------|---------|
| WREN | Small presence, character, lightness, movement without spectacle |
| WOLD | Open / elevated landscape; a wider world |
| Combined | “A small presence in a wide world” (conceptual interpretation) |
| Monogram gesture | Abstract wing / movement — not a literal bird |

Do not claim historical combined-phrase origins for WREN WOLD.

---

## 5. Logo System

| Role | Form | Typical use |
|------|------|-------------|
| **Primary** | W monogram + WREN WOLD wordmark | Website header (when space allows), packaging, primary brand applications |
| **Secondary** | W monogram alone | Compact headers, social avatar, favicon, app icons, garment labels |
| **Wordmark** | WREN WOLD alone | Text-forward contexts, editorial titles, legal / footer contexts where monogram is redundant |
| **Utility** | Monogram (small-size optimized) | Favicon, buttons, tags, small labels, embroidery, constrained UI |

### Required color variants

1. **Primary dark** — `#242321` on light backgrounds
2. **Reversed / light** — `#F3F2EF` on dark or photographic backgrounds
3. **Monogram only** — standalone mark (dark and reversed)
4. **Favicon set** — monogram-only exports at standard platform sizes

Do not introduce logo colors outside the approved palette pair above.

---

## 6. Usage Principles

- Prefer the primary lockup when space and clarity allow
- Prefer the monogram alone when space is constrained
- Keep the mark clear of competing decorative elements
- Maintain consistent alignment and proportion from approved artwork
- Do not redraw, stretch, or stylize the mark ad hoc

---

## 7. Clear-Space Principle

Maintain clear space around the logo equal to at least the height of the monogram’s primary stroke (reference sheet: **1×** clear-space unit).

No text, imagery, or UI chrome should intrude into that clear space.

---

## 8. Minimum-Size Principle

| Asset | Minimum |
|-------|---------|
| Monogram height | **24px** |
| Wordmark width | **120px** |
| Favicon | Use supplied 16 / 32 / 48 exports; do not downscale the full lockup |

When the wordmark fails at small sizes, switch to **monogram only**.

---

## 9. Background Usage

| Background | Guidance |
|------------|----------|
| Light / off-white (`#F3F2EF`) | Primary dark (`#242321`) |
| Dark / charcoal (`#242321`) | Reversed / light (`#F3F2EF`) |
| Photography | Use the variant with sufficient contrast; add a quiet scrim if needed for accessibility |
| Busy patterns | Avoid; prefer solid or calm photographic areas |

Never place the logo where contrast fails WCAG expectations for brand UI contexts that also serve as interactive controls.

---

## 10. Incorrect Use

Do not:

- Recreate the logo from memory or approximate shapes
- Add outlines, shadows, gradients, or glow effects
- Rotate, skew, or distort the mark
- Change the relative scale of monogram to wordmark
- Place the mark inside arbitrary shapes that alter its character
- Combine with unrelated icons or crests
- Use a literal bird illustration as a substitute
- Use low-contrast color on photographic backgrounds
- Embed the reference PNG inside SVG files
- Use the concept reference sheet as a production web asset

---

## 11. Production Asset Inventory

Approved production files live under `assets/brand/`.

### Repository structure

```text
assets/brand/
├── logo/          # Primary and reversed horizontal lockups
├── monogram/      # Monogram-only
├── favicon/       # Favicon and app icon exports
└── reference/     # Art-direction reference only (not production)
```

### Logo — `assets/brand/logo/`

| File | Intended use |
|------|----------------|
| `wren-wold-logo-primary.svg` | Primary horizontal lockup (vector), dark on light |
| `wren-wold-logo-primary.png` | Primary lockup raster (transparent) |
| `wren-wold-logo-white.svg` | Reversed horizontal lockup (vector) |
| `wren-wold-logo-white.png` | Reversed lockup raster (transparent) |

### Monogram — `assets/brand/monogram/`

| File | Intended use |
|------|----------------|
| `wren-wold-monogram.svg` | Standalone W (vector), dark |
| `wren-wold-monogram.png` | Standalone W raster (transparent) |
| `wren-wold-monogram-white.svg` | Standalone W (vector), reversed |
| `wren-wold-monogram-white.png` | Standalone W raster, reversed |

### Favicon — `assets/brand/favicon/`

| File | Intended use |
|------|----------------|
| `wren-wold-favicon.ico` | Multi-size ICO (16 / 32 / 48) |
| `wren-wold-favicon-16.png` | 16×16 tab icon |
| `wren-wold-favicon-32.png` | 32×32 favicon |
| `wren-wold-favicon-48.png` | 48×48 favicon |
| `wren-wold-favicon-180.png` | Apple touch icon |
| `wren-wold-favicon-192.png` | Android / PWA |
| `wren-wold-favicon-512.png` | High-res PWA / store icon |

### Reference — `assets/brand/reference/`

| File | Role |
|------|------|
| `wren-wold-logo-reference.png` | Approved concept / production-direction sheet only |

See also folder READMEs in `logo/`, `monogram/`, and `favicon/`.

---

*Recognizable through restraint.*
