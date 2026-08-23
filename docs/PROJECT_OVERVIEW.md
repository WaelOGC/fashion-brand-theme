    # Project Overview

## 1. Project Identity

Project Name: WREN WOLD
Project Status: Pre-launch / Development
Primary Market: Netherlands
Future Market: Europe and international markets
Platform: WordPress + WooCommerce
Development Environment: Local
Theme: Custom WordPress Theme (`fashion-brand-theme` slug until a controlled rename)

The finalized brand name is **WREN WOLD**.

Brand identity documentation: `docs/BRAND_IDENTITY.md`, `docs/LOGO_GUIDELINES.md`, `docs/VISUAL_IDENTITY.md`.

Production logo files, final colors, and final typography remain to be supplied; the theme may still use temporary placeholders until those assets are integrated.

---

## 2. Project Vision

We are building a long-term European fashion brand, not a generic online clothing store.

The initial business model is supplier-based / dropshipping. We do not initially hold significant inventory or manufacture our own products.

The long-term objective is to develop the business from a lean startup into a recognizable international fashion brand.

The website must therefore be designed as a real brand foundation, not as a temporary dropshipping template.

---

## 3. Target Customer

Primary audience:

Modern women approximately 20–40 years old living in the Netherlands.

They may be professionals, business women, freelancers, creatives, or internationally oriented residents.

They value:

- Quality
- Elegance
- Simplicity
- Practicality
- Sustainability
- Good design
- Curated choices
- Value for money

The clothing should work across different parts of their lifestyle:

Work → Everyday → Social → Dinner → Weekend.

---

## 4. Brand Direction

**Core idea:** Quiet Character — distinctive without trying too hard.

**Brand promise:** “Thoughtfully made fashion for a life well lived.”

**Personality:** Quiet, Intelligent, Natural, Modern, Confident, Human, Independent, Refined.

The brand should feel premium without becoming inaccessible or overly luxurious.

It should not look like a typical fast-fashion or dropshipping store.

Full identity: `docs/BRAND_IDENTITY.md`.

---

## 5. Product Philosophy

Quality over quantity.

We intentionally prefer a curated product selection instead of hundreds of undifferentiated products.

Initial categories may include:

- T-Shirts
- Hoodies
- Tops
- Dresses
- Pants
- Everyday Essentials
- Occasion / Evening Wear

These categories are nested under Shop and are not separate top-level navigation items.

Products will be selected according to quality, design, relevance to the target customer, supplier reliability and market demand.

---

## 6. Website Philosophy

The website should communicate:

QUALITY + SIMPLICITY + ELEGANCE + SUSTAINABILITY + INTELLIGENT CHOICE

The experience should feel editorial, calm and carefully curated.

Primary navigation is intentionally simple: Shop, Collections, Guides, About, and Contact. Cart, Account, and Search belong to utility navigation.

Avoid:

- Crowded layouts
- Excessive product volume
- Aggressive discount messaging
- Loud visual design
- Generic dropshipping aesthetics
- Unnecessary complexity

---

## 7. Future Differentiators

The website is designed to eventually support:

### AI Fashion Assistant

Customers will be able to describe what they need naturally.

Example:

"I need something elegant for work that I can also wear to dinner."

The AI should then search the store's product data and recommend relevant products.

This feature is planned for a later development phase and must not unnecessarily complicate the initial implementation.

### Digital Style Guides

The brand may offer downloadable digital resources covering subjects such as:

- Capsule wardrobes
- Outfit coordination
- Clothing selection
- Fabric knowledge
- Wardrobe planning

Email collection may be integrated into this ecosystem for future marketing.

---

## 8. Development Principles

Build the website as a scalable custom WordPress/WooCommerce system.

Priorities:

1. Clean architecture
2. Performance
3. Responsive design
4. Accessibility
5. SEO readiness
6. Maintainability
7. Scalability
8. Security
9. Reusable components
10. Minimal unnecessary dependencies

The theme must be custom-built rather than based on a generic visual template.

---

## 9. SEO

SEO is part of the architecture from the beginning.

The project will use WordPress SEO tooling, currently planned around Yoast SEO.

Content should be structured with:

- Clear semantic HTML
- Proper heading hierarchy
- Descriptive metadata
- Optimized URLs
- Internal linking
- Structured product information
- Search-friendly category architecture

SEO decisions must not compromise the user experience.

---

## 10. Current Brand Status

**Finalized:**

- Brand name — WREN WOLD
- Brand personality, promise, tone of voice, and core concept (Quiet Character)
- Logo direction (custom W monogram + wordmark system)
- Display typeface — Fraunces (SIL OFL 1.1)
- Body/UI typeface — Source Sans 3 (SIL OFL 1.1)
- Mineral color palette (see `DESIGN_SYSTEM.md`)

**Not yet finalized / not yet supplied:**

- Domain
- Production logo SVG / vector files and favicon set
- Packaging identity
- Photography production library

Do not invent production logo vectors in theme architecture.

---

## 11. Development Rule

Before implementing a major feature, understand the project context and existing architecture.

Do not introduce unnecessary libraries, plugins, frameworks or architectural changes without a clear reason.

Prefer simple, maintainable solutions.

The website should be capable of evolving from an MVP into a serious international e-commerce platform.

---

## 12. Source of Truth

This document provides the high-level technical and business context for the project.

Additional documents inside `/docs` define:

- Brand Identity (`BRAND_IDENTITY.md`)
- Logo Guidelines (`LOGO_GUIDELINES.md`)
- Visual Identity (`VISUAL_IDENTITY.md`)
- Visual Concept (`VISUAL_CONCEPT.md`)
- Design System
- Content Strategy
- SEO Strategy
- Technical Architecture
- Development Rules
- WooCommerce Strategy
- AI Assistant Specification
- Business Operating System

When documents conflict, do not silently choose one. Identify the conflict before implementation.