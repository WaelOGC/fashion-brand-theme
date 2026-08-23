# Visual Concept

## Purpose

This document translates the strategic direction in `BRAND_IDENTITY.md` into a concrete visual concept for the **WREN WOLD** digital experience.

It is a **concept bridge** between brand strategy and future implementation in the custom WordPress theme. It does **not** implement design, select final fonts, define hex values, or create production logo files.

**Mandatory sources of truth:**

- `PROJECT_OVERVIEW.md`
- `CONTENT_ARCHITECTURE.md`
- `DESIGN_SYSTEM.md`
- `TECHNICAL_ARCHITECTURE.md`
- `BRAND_IDENTITY.md`
- `VISUAL_IDENTITY.md`
- `LOGO_GUIDELINES.md`

The current homepage and theme may still use placeholders. They are **not** the final visual reference for brand identity.

---

## Document Status

| Item | Status |
|------|--------|
| Brand name | Finalized — WREN WOLD |
| Logo direction | Approved (see `LOGO_GUIDELINES.md`) |
| Production logo files | Not supplied |
| Final fonts | TBD |
| Final color palette | TBD |
| Photography assets | TBD |
| Homepage implementation | In progress / prototype stages |

---

# 1. Core Visual Idea

## The Composed Threshold

**The central visual idea:** The website is experienced as a sequence of **composed thresholds** — deliberate transitions between editorial atmosphere and commerce clarity — held together by **calibrated visual tension** between type, image, and space.

Each major moment on the site (homepage chapter, collection entry, category browse, product focus, guide interlude) is not a reusable “section block.” It is a **threshold**: a composed field where typography, photography, and whitespace negotiate for attention within a shared spatial logic. The visitor moves through the site the way they might move through a well-art-directed lookbook that occasionally opens into a clear, trustworthy shop.

### Why it fits the brand

The project targets modern women in the Netherlands who value **quality, intentionality, and versatility** — not loud promotion. The business must earn trust as a new supplier-based brand while building toward a recognizable European fashion identity. A threshold-based experience communicates:

- **Considered curation** — nothing arrives by accident
- **Editorial intelligence** — the brand has taste
- **Accessible premium** — elevated, but never inaccessible
- **Commerce confidence** — when it is time to shop, the site becomes direct

This aligns with the approved content architecture: Shop, Collections, Guides, About, Contact as primary destinations — with editorial content supporting, not obstructing, purchase paths.

### How it creates recognition

Visitors remember sites that have **behavior**, not just decoration. Recognition comes from:

1. **Repeated spatial grammar** — type anchored to one edge, imagery breaking another, consistent offset relationships
2. **Mode shifts they can feel** — editorial spreads loosen; shop surfaces tighten
3. **Typography rhythm** — display and body type in a recognizable proportional relationship (once fonts are chosen)
4. **Motion that marks thresholds** — brief, directional transitions when crossing from story to shop

A return visitor should think: *“This site always moves from atmosphere to clarity in the same distinctive way.”*

### How it avoids template energy

Generic fashion templates repeat identical hero + three-column grid + testimonial + newsletter patterns. This concept rejects block repetition in favor of:

- **Compositional grammar** shared across pages, not identical layouts
- **Photography that participates in layout** rather than filling uniform cards
- **Commerce surfaces that simplify** rather than decorate
- **One strong idea per viewport** — no competing promotional zones

The placeholder homepage’s centered copy, symmetric sections, and neutral card patterns are explicitly **not** carried forward.

---

# 2. Visual Tension

Visual tension here means **controlled imbalance** — the eye is guided through deliberate contrast, not chaos.

## Scale

- Display type may dominate one edge of the viewport while product information stays modest and precise
- A single image may occupy 60–80% of a section’s visual mass while copy occupies a narrow column — or the inverse
- Product grids use consistent card scale; editorial sections vary scale dramatically between chapters
- **Avoid:** everything at “medium” size — the template default

## Spacing

- Tight clusters (product name + price + variant) contrast with expansive editorial pauses
- Vertical gaps between homepage chapters vary — short punctuations vs long immersive sequences
- Horizontal inset creates “margin as material” on wide screens — content does not always fill available width
- **Avoid:** equal padding around every section

## Typography

- Display lines may be cropped by viewport edge or overlap image boundaries
- Body copy stays in comfortable measure (roughly 45–75 characters per line for reading)
- Category labels, guide eyebrows, and collection titles use distinct scale steps — not one “heading” size reused everywhere
- **Avoid:** oversized serif display on every hero with identical subheading pattern

## Image placement

- Images anchor to edges, bleed off-canvas, or sit inset with deliberate offset — rarely centered in a symmetric box
- Product imagery on commerce pages aligns to a stable grid; editorial imagery breaks it
- Sequential images (two or three crops of the same scene) may appear as a rhythm device in collections
- **Avoid:** identical aspect-ratio cards in every section

## Asymmetry

- Default compositional bias: **offset balance** — visual weight on one side, type or space on the other
- Symmetry reserved for product comparison, cart summary, and checkout — contexts requiring scan efficiency
- Navigation and utility elements may align to unconventional grid lines (e.g., inset from edge rather than flush container)
- **Avoid:** mirrored “text left / image right” alternating sections

## Cropping

- Editorial crops may hide part of a figure or environment to create intrigue — garment detail remains legible
- Dynamic viewport crops follow **composition anchors** (face, hem, shoulder line) — never random center-crop
- Product thumbnails use consistent crop logic; hero and collection crops vary per art direction
- **Avoid:** full-body centered in every frame

## Alignment

- Mixed alignment is intentional: flush-left headlines with offset image blocks; ragged-right display type in editorial moments
- Commerce metadata (price, size, SKU area) stays strictly aligned for scannability
- **Avoid:** everything center-aligned because it feels “clean”

## Movement

- Scroll reveals stagger slightly — image first, then type, then action — reinforcing hierarchy
- Hover shifts image position within frame (not zoom explosion)
- Section transitions use directional motion (vertical lift, horizontal slide) consistent with reading direction
- **Avoid:** parallax layers moving at unrelated speeds; bouncing elements

### Tension budget

Every page has a **tension budget**. Editorial pages spend more; cart and checkout spend none. If a page feels chaotic, tension has exceeded budget — simplify commerce zones first.

---

# 3. Composition System

This is a **system of compositional modes**, not a single homepage layout.

## Underlying grid

- A 12-column underlying grid (conceptual — exact column count finalized at implementation)
- Content max-width contained on large displays; grid extends full viewport for bleed moments
- Gutters widen on large screens — space is part of the composition

## Compositional modes

| Mode | Use | Character |
|------|-----|-----------|
| **Field** | Hero, collection intro, brand story | Full or near-full bleed image; type overlaid or pinned to edge |
| **Offset pair** | Philosophy, guide features, about | Type column + image mass in deliberate imbalance |
| **Sequence** | Homepage chapters, collection narrative | 2–4 related frames in horizontal or vertical rhythm |
| **Inset grid** | Shop, category archives, related products | Stable, scannable product matrix |
| **Threshold strip** | Editorial-to-commerce transitions | Narrow band: label, brief copy, single CTA — signals mode change |
| **Utility dense** | Cart, checkout, account, filters | Minimal editorial ambition; maximum clarity |

Pages combine modes. The homepage might flow: **Field → Offset pair → Threshold strip → Inset grid → Sequence → Threshold strip → Field**.

## Asymmetric opportunities

- Type column at 4/12 width, image at 8/12 — offset upward or downward
- Image bleeds left; type sits in right margin on wide screens
- Two images stacked with unequal heights; copy wraps into resulting negative space
- Collection title spans full width; imagery sits below at 70% width, left-aligned

## Editorial compositions

Editorial spreads prioritize **pacing and prose** over immediate conversion — but always include a visible path forward (text link, subtle CTA, or navigation).

- Guide articles use reading-width columns with full-bleed image interruptions
- Pull quotes break column width — creating tension within longform content
- Captions and eyebrows use smaller scale with generous letter-spacing or weight contrast (behavior TBD with fonts)

## Full-bleed moments

Used sparingly for impact:

- Homepage opening field
- Collection landing hero
- Seasonal campaign entry points
- Guide feature image

Full-bleed does not mean full-viewport on every scroll stop — it is a **punctuation**, not the default.

## Overlapping elements

- Display headline overlaps image lower third (with contrast scrim or placement on calm image area)
- Product card metadata overlaps image bottom edge on hover (fine pointer) or always visible (touch)
- Section labels sit partially outside their content block — marking chapter boundaries
- **Rule:** overlaps must preserve readability and never hide price or primary CTA

## Negative space

- Active design element — not leftover area
- Wide margins on desktop signal confidence and premium positioning
- Mobile: space compresses but does not disappear — maintain breathing room between chapters

## Edge relationships

Elements relate to **viewport edges** intentionally:

- Flush to left edge vs inset 8% from left
- Image breaks top edge of section while type sits lower in viewport
- Bottom of section leaves “open” space — next chapter begins with contrast

## Breaking the grid

Allowed when composition serves hierarchy:

- Image extends 1–2 columns beyond its “logical” container
- Headline spans columns that body text does not
- Product in editorial spread breaks inset grid for emphasis

**Constraint:** breaking the grid must follow repeatable rules — otherwise the system collapses into randomness. Document break patterns when the design system is locked.

## Anti-pattern

Do not convert every section into a card grid with rounded corners. Product grids use **inset grid mode**; editorial sections use other modes.

---

# 4. Typography as Identity

Final fonts remain **TBD**. This section defines character, scale relationships, and behavior.

## Display typography

**Character:** Confident, contemporary, European editorial — not vintage luxury serif by default.

**Behavior:**

- Large scale with tight or expressive line breaks — headlines may stack across 2–4 lines deliberately
- Line length short (often 4–8 words per line at largest sizes)
- May align to left edge or hang into margin; rarely centered except in specific campaign moments
- Letter-spacing and weight used as composition tools once typeface is selected

**Recognition role:** Display type is the first non-logo identifier — the “voice” visible in hero and collection moments.

## Body typography

**Character:** Neutral, intelligent, highly readable — supports long guide content and product descriptions equally.

**Behavior:**

- Comfortable size on mobile (never sacrificed for aesthetic)
- Line height generous for guides (approx. 1.5–1.7 relative measure)
- Product descriptions may use slightly tighter leading for density
- Links distinguished by underline or weight shift — not color alone

## Navigation typography

**Character:** Functional, integrated, quiet — does not compete with display moments.

**Behavior:**

- Consistent size across primary and utility nav
- Case treatment (uppercase vs sentence case) chosen once and applied with discipline
- Active state clear through weight, underline, or offset marker — not decorative animation
- Shop submenu labels visually subordinate to primary items

## Product typography

**Character:** Scan-first, commerce-clear.

**Hierarchy (strict):**

1. Product name
2. Price
3. Variant / color indicator
4. Supporting metadata (category, brief descriptor)

**Behavior:**

- Name and price never obscured by editorial styling
- Sale pricing (if ever used) clear and honest — no visual tricks
- No display typefaces in cart or checkout line items

## Editorial typography

**Character:** More expressive than product — allows pull quotes, section labels, captions with personality.

**Behavior:**

- Guide eyebrows orient the reader (“Fabric”, “Wardrobe”, “Care”)
- Pull quotes at larger scale break reading column
- Captions sit close to images — small size, optional italic or weight contrast
- Lists and steps in guides use clear indentation — shopping-adjacent education, not magazine filler

## Scale relationships

Conceptual modular scale (exact values TBD at implementation):

```text
Display XL   — homepage hero, collection title
Display L    — section chapters, guide titles
Heading      — product group labels, subsection titles
Body L       — intro paragraphs, lead copy
Body         — default reading, product descriptions
Label        — navigation, metadata, captions
Price        — distinct scale/weight from product name — instantly findable
```

Jump sizes should be **noticeable** — flat hierarchies feel template-like.

## Line-height behavior

| Context | Direction |
|---------|-----------|
| Display | Tight (headlines feel graphic) |
| Body / guides | Generous (reading comfort) |
| Product metadata | Compact (scan efficiency) |
| Navigation | Standard (single-line clarity) |

## Alignment behavior

| Context | Direction |
|---------|-----------|
| Editorial display | Often flush-left; occasional ragged-right for emphasis |
| Body copy | Flush-left, consistent |
| Product grid | Left-aligned text blocks within cards |
| Cart / checkout | Left-aligned labels; right-aligned numbers where convention helps scanning |

## Recognizability

Typography becomes signature when:

- The **ratio** between display and body size repeats across pages
- **Spacing before/after** headlines follows consistent rhythm
- **Case and weight rules** are never broken for convenience
- Product and editorial modes use the same family system but different expressive range

---

# 5. Image Language

Imagery is the primary emotional carrier — but must serve both editorial and commerce goals.

## Photography style

- **Natural light** or natural-feeling studio light
- **European urban and domestic environments** — Amsterdam/Rotterdam/Utrecht sensibility: canals, brick, bikes, cafés, trams, modern interiors
- **Wearable styling** — clothes styled for work, weekend, evening — mirroring customer lifestyle arcs from `PROJECT_OVERVIEW.md`
- **Consistent grading direction** per season (warm-neutral, cool-neutral, or muted expressive — aligned to eventual palette)
- **Human ease** — movement, laughter, adjustment of collar, walking — not frozen mannequin poses

## Framing

| Frame type | Use |
|------------|-----|
| Environmental wide | Collection mood, homepage fields |
| Three-quarter figure | Hero, collection covers |
| Detail / texture | Fabric, construction, buttons, drape |
| Contextual mid-shot | Guides, “how to wear” |
| Isolated product (limited) | Quick-scan category pages, search results — paired with lifestyleelsewhere |

## Crop behavior

- **Anchor points:** face, garment detail, hem line — protected across responsive crops
- **Aggressive crops** allowed in editorial; conservative crops on product thumbnails
- **Sequential crops:** same outfit, different framings — creates rhythm in collection reveals
- Viewport crop may shift horizontally on mobile to preserve subject

## Aspect ratios

Use a **family of ratios**, not one universal box:

| Ratio | Typical use |
|-------|-------------|
| Tall portrait (approx. 3:4 – 2:3) | Hero fields, collection covers |
| Standard portrait (4:5) | Product cards, guide features |
| Landscape (16:9 – 3:2) | Environmental sequences |
| Ultra-wide strip | Threshold strips, chapter dividers |
| Square (1:1) | Category entry tiles — used sparingly |

Ratio variety prevents “grid of identical boxes” monotony.

## Negative space within frames

- Sky, wall, blurred background, or open pavement as compositional breathing room
- Allows type overlay without heavy scrims when planned in photography direction
- Not every image fills the frame edge-to-edge with subject matter

## Environmental context

Clothing must read as part of a life — commuting, working, dining, walking, traveling within Europe. Context supports the **versatility** brand personality: pieces work across lifestyle moments.

## Model positioning

- Positioned within environment — leaning, walking, seated, interacting
- Eye line may leave frame — not always direct-to-camera fashion stare
- Diverse representation appropriate to European market expansion
- Age presentation aligned with 20–40 target — natural, not aspirational fantasy

## Clothing visibility

- Garment silhouette, key detail, or color must be legible in every commerce-critical image
- Editorial images may partially obscure for mood — but product page galleries always include clear full-garment views
- Layering shown where relevant — customer understands how piece fits wardrobe

## Editorial vs commerce imagery

| Editorial | Commerce |
|-----------|----------|
| Mood, context, story | Clarity, comparison, decision |
| Multiple crops, sequences | Consistent thumbnail logic |
| May prioritize atmosphere | Must prioritize garment legibility |
| Used in homepage, collections, guides | Used in shop grid, product page, cart thumbnail |

**Rule:** editorial images attract; commerce images convert. Both required.

## Image transitions

- **Load:** placeholder tone (from future palette) → soft opacity or clip reveal
- **Hover (fine pointer):** secondary image or horizontal shift within frame — not zoom-to-200%
- **Gallery:** horizontal slide with touch swipe support
- **Chapter change:** outgoing image holds briefly while incoming image arrives — directional, <400ms perceived

Unlike ordinary e-commerce photography (white background, identical angle, catalog consistency only), this system treats images as **layout material** — cropped, sequenced, overlapped, and paced — while maintaining product clarity where purchase decisions happen.

---

# 6. Color Atmosphere

Final hex values remain **TBD**. Three possible territories for evaluation during identity lock-in.

## Territory A — Warm Mineral Ground

**Emotional character:** Calm, grounded, human, quietly confident. Feels like linen, stone, soft daylight, natural materials.

**Perceived position:** Accessible premium contemporary — approachable European lifestyle.

**Strengths:**

- Supports trust for a new brand — warm neutrals feel honest, not cold or corporate
- Works across editorial photography with natural grading
- Commerce UI remains clear on light ground tones
- Differentiates from cold “tech minimal” and beige “Scandi clone” when paired with sharp accent discipline

**Risks:**

- Can drift into generic warm minimal if accent and composition are weak
- Must avoid “all beige” dropshipping aesthetic through typography and tension, not color alone

**Ecommerce + editorial:** Light ground for shop grids; deeper mineral tone for editorial chapter backgrounds; accent for interactive states only.

---

## Territory B — Soft Contrast Field

**Emotional character:** Contemporary, slightly graphic, intelligent. Light ground with deep text/contrast elements and one controlled accent.

**Perceived position:** Editorial-forward accessible fashion — more design-literate, slightly bolder.

**Strengths:**

- Strong typographic identity — high text/ground contrast supports display type as signature
- Clear commerce hierarchy — prices and CTAs read instantly
- Feels authored and modern — less “soft lifestyle blog”

**Risks:**

- Can feel stark if photography does not add warmth
- Accent overuse could feel startup-aggressive — discipline required

**Ecommerce + editorial:** Editorial sections may invert (dark ground, light type) for chapter punctuation; shop remains light, scannable, stable.

---

## Territory C — Muted Expressive Accent

**Emotional character:** Distinctive, memorable, contemporary European with a recurring color note — dusty rose, oxidized green, deep clay, or muted cobalt (exact hue TBD).

**Perceived position:** Most distinctive of the three — brand with a recognizable “color gesture.”

**Strengths:**

- Strongest recognition potential without logo
- Accent can mark thresholds, interactive states, and seasonal campaigns
- Photographic grading can harmonize with accent direction

**Risks:**

- Accent can feel trendy or cheap if chosen poorly
- Must meet WCAG contrast requirements for text and focus states
- Higher discipline required — accent must repeat consistently, not appear randomly

**Ecommerce + editorial:** Base remains neutral; accent appears in eyebrows, active nav, CTA moments, and collection-specific campaign strips — never as full-page background wallpaper.

---

### Palette decision note

Final palette selection should combine one territory’s base logic with photography grading tests across shop, collection, and guide page mockups. **No territory is locked by this document.**

---

# 7. Motion Language

Motion expresses **threshold crossings** and **hierarchy** — fast enough for commerce, refined enough for premium editorial.

## Timing principles

| Category | Direction |
|----------|-----------|
| Micro-interactions (hover, toggle) | 150–250ms |
| Section reveals | 250–400ms |
| Page/threshold transitions | 300–450ms — never block interaction |
| Reduced motion | Instant state change or simple opacity — no transform |

Easing: ease-out for entrances, ease-in for exits — avoid elastic/bounce on functional UI.

## Page entrance

- Initial load: hero image resolves from placeholder tone; headline arrives one beat later (stagger ~80–120ms)
- Subsequent navigations: content crossfades or slides vertically — subtle, directional
- Shop pages: minimal entrance animation — products available immediately

## Image reveal

- Clip-path or opacity reveal from bottom or reading direction
- Lazy-loaded images: reserved aspect-ratio space prevents layout shift
- Editorial sequences: staggered reveal (frame 1 → frame 2 → frame 3)

## Typography reveal

- Display headlines: line-by-line or word-group stagger — only in editorial moments
- Body copy: appears as single block — never word-by-word (too slow)
- Product names: no reveal animation — instant for scannability

## Navigation

- Mobile menu: panel slides from edge with backdrop dim — spatial, not fade-only
- Shop submenu: vertical expand with opacity — fast, no accordion delay stacking
- Header on scroll: recedes minimally or compacts — Navigation Presence signature (see §8)
- Active page indicator: smooth underline or marker transition

## Product hover

**Fine pointer:**

- Image shifts horizontally to alternate view OR subtle overlay with second crop
- Product name underline or opacity shift
- Add-to-cart appears or strengthens — never hidden until hover as only path

**Coarse pointer:**

- No hover dependency — secondary image visible in swipe gallery on product page; card shows primary image only with clear tap target

## Collection transitions

- Entering collection: hero field resolves → title pins → products rise into inset grid
- Leaving collection: compress hero, grid scrolls to top — orientation preserved

## Scroll behavior

- Section chapters: optional subtle opacity/translate as sections enter viewport — once per section, not continuous parallax
- No scroll-jacking
- Guide longform: minimal scroll-linked effects — reading flow priority
- `prefers-reduced-motion: reduce`: disable transforms; optional instant opacity only

## Mobile interaction

- Touch targets minimum 44×44 CSS pixels
- Swipe galleries on product and collection sequences
- Lighter motion than desktop — fewer stagger steps
- Navigation always reachable — no hidden gestures required for core paths

---

# 8. Signature Digital Moments

Development of the five concepts from `BRAND_IDENTITY.md`. **Concepts only — not implementation.**

## 8.1 Editorial Threshold

**Purpose:** Signal the shift from story-driven content to shopping mode without disorienting the visitor.

**Visual behavior:**

- A horizontal **threshold strip** appears between editorial and commerce zones: muted ground shift, small label (“Shop the edit”, “View pieces”), single line of copy, one CTA
- Typography scale drops from display to label/body
- Motion: editorial content holds; strip slides in; commerce grid resolves upward into place
- Navigation remains stable — anchor during mode change

**Emotional effect:** *“I’m moving from inspiration to action — deliberately.”*

**Implementation direction:** Reusable compositional mode (Threshold strip) in theme templates; homepage, collection landing, and guide-to-shop paths. WordPress template parts — not page builder blocks.

**Risk of overuse:** If every section begins with a threshold strip, pacing fatigues. Use at **true mode boundaries** only — editorial→shop, story→category grid, guide→related products.

---

## 8.2 Collection Reveal

**Purpose:** Collections feel like entering a lookbook chapter, not clicking a category filter.

**Visual behavior:**

- Collection landing opens with **Field mode**: large environmental or styled image, collection title at display scale, brief narrative copy
- 2–3 **sequence frames** before product grid — different crops, same world
- Each collection may vary proportion (tall hero vs wide strip vs offset pair) — shared grammar, not identical layout
- Product grid appears only after narrative beat — Threshold strip optional

**Emotional effect:** *“This is a curated world, not a SKU list.”*

**Implementation direction:** Collection page template with configurable hero mode per collection (future CMS phase); photography direction per collection season.

**Risk of overuse:** Long reveals delay purchase for returning customers. Offer **skip to products** link above the fold for accessibility and efficiency — visible, not hidden.

---

## 8.3 Product Entrance

**Purpose:** Products feel authored when entering viewport — associating motion with this brand.

**Visual behavior:**

- In grids: image resolves first (clip or opacity), name and price follow within 100ms stagger
- Stagger cascades diagonally across grid — not row-by-row waterfall (too template-like)
- In product page: hero image immediate (LCP priority); thumbnails and metadata stable — no theatrical entrance blocking add-to-cart

**Emotional effect:** *“Products arrive with care — but I can still shop quickly.”*

**Implementation direction:** Intersection Observer with reduced-motion fallback; CSS transforms only on grid items below fold.

**Risk of overuse:** Animating every product on dense category pages feels sluggish. Limit stagger to first visible row; below-fold items resolve in simpler batch or instantly.

---

## 8.4 Navigation Presence

**Purpose:** Navigation feels spatially considered — not a default sticky bar.

**Visual behavior:**

- Header compacts on scroll: reduced vertical padding, logo scales slightly, background gains subtle opacity or border
- Shop opens distinctive panel: categories listed with optional thumbnail sliver — not plain text dropdown
- Mobile: full-height menu with primary items large enough for touch; utility separated visually
- Scroll up: header returns smoothly; scroll down: header may recede partially — always recoverable

**Emotional effect:** *“The site respects my scroll context — navigation is present but not aggressive.”*

**Implementation direction:** Header component in theme with scroll behavior in `main.js`; respects `prefers-reduced-motion` (instant compact state, no animated hide/show).

**Risk of overuse:** Hiding header entirely frustrates checkout returns. Never fully hide navigation on commerce paths; cart and account always reachable.

---

## 8.5 Guide Interlude

**Purpose:** Editorial guides appear inside the shopping journey — integrated, not siloed in a blog corner.

**Visual behavior:**

- After category browse or mid-homepage: **Inset editorial card** — portrait crop, guide title at Heading scale, one-line promise, text link
- Layout uses Offset pair mode — distinct from product cards (no price, no “add to cart”)
- Contextual relevance when possible (e.g., fabric guide near knits category — future content logic)
- Typography more expressive than product metadata

**Emotional effect:** *“This brand helps me choose — shopping feels informed, not pushed.”*

**Implementation direction:** Template part inserted in category archive and optionally homepage; links to WordPress post content under Guides — compatible with `CONTENT_ARCHITECTURE.md`.

**Risk of overuse:** Too many interludes interrupt purchase flow. Maximum one interlude per category view; dismissible or below first product row.

---

# 9. Homepage Concept Directions

Three substantially different directions. **Not for implementation.** Each respects approved homepage sections (Hero, Philosophy, Categories, Featured Collection, Guides, Closing CTA) from content architecture — but composes them differently.

---

## Direction A — **The Offset Field**

### Core idea

Homepage as a series of **offset visual fields** — every chapter places typographic mass against image mass in deliberate imbalance. The visitor feels they are moving through composed spreads.

### Hero composition

Full-bleed environmental image anchored to right two-thirds; display headline flush-left in margin, overlapping image edge slightly. Single primary CTA below headline — no button pair. Eyebrow label small, above headline.

### Typography behavior

Display type dominant; body copy minimal in hero. Philosophy section uses large pull-quote scale with small supporting paragraph — not two equal body blocks.

### Image behavior

Hero: wide environmental. Philosophy: no image or small detail inset. Categories: tall portrait tiles in **offset stagger** (not equal grid). Collection: one large hero product-in-context + three smaller offsets.

### Section rhythm

Long → short → medium → long → short → medium. Alternating breathing and compression.

### Product presentation

Categories as visual tiles with name at bottom edge — image does the work. Featured collection: one anchor piece large, others satellite — not four equal cards.

### Editorial integration

Philosophy and Guides feel like magazine margins — text-forward with one visual accent.

### Motion character

Headline lines stagger; images clip-reveal from edge; sections slide slightly on entry.

### Mobile adaptation

Offset collapses to vertical stack but **maintains left alignment** and varied image heights — not uniform stacked cards.

### Why distinctive

Rejecting centered hero + equal grid instantly separates from placeholder and Shopify templates. Typographic pinning to margin creates signature.

### Main risk

Can feel too editorial for first-time shoppers seeking quick category access. Mitigation: categories visible within first two scrolls; utility nav always present.

---

## Direction B — **Threshold Sequence**

### Core idea

Homepage as **explicit chapters** separated by threshold strips — each section is a different compositional mode; transitions between them are part of the experience.

### Hero composition

**Field mode** — full viewport immersion. Title bottom-left; eyebrow above. Scroll indicator subtle. No above-fold product grid.

### Typography behavior

Chapter titles use Display L at section open — “Philosophy”, “Categories”, “The Edit”, “Guides” — creating readable sequence even when scanning.

### Image behavior

Hero full-bleed → Philosophy text-only or ultra-wide strip → Categories inset grid → Collection **sequence** (3 frames) → Guides offset pair → CTA field.

### Section rhythm

Punctuated by threshold strips: thin bands with ground tone shift, chapter label, optional single sentence.

### Product presentation

Categories in inset grid mode — clearest commerce moment on homepage. Collection as sequence leading to link — products shown in context, not card grid on homepage.

### Editorial integration

Guides section is full Offset pair — photography + two teaser titles. Philosophy is text chapter with threshold entry/exit.

### Motion character

Threshold strips slide in; chapter content fades up; mode shifts feel deliberate.

### Mobile adaptation

Threshold strips become horizontal dividers with label; sequences stack vertically with maintained crop variety.

### Why distinctive

The homepage **feels authored as a sequence** — visitors remember the chapter structure, not a stack of blocks.

### Main risk

Threshold strips add vertical height — could push categories below fold on small phones. Mitigation: first threshold after hero is short; categories appear early.

---

## Direction C — **Embedded Lookbook**

### Core idea

Homepage as a **single lookbook narrative** — products and categories emerge **inside** lifestyle compositions rather than as separate commerce blocks.

### Hero composition

Wide scene with model in environment; product callouts annotated in layout (line or label pointing to garment) — commerce embedded in editorial world.

### Typography behavior

Smaller display relative to Directions A/B; captions and labels carry more weight. Feels intimate, journal-like.

### Image behavior

Dominant — most sections are image-led with type as caption. Categories shown as **detail crops within larger lifestyle mosaic**, not standalone category cards.

### Section rhythm

Continuous visual flow — fewer hard section breaks; subtle ground shifts instead of threshold strips.

### Product presentation

Featured collection appears as **outfit composition** — multiple products in one scene with individual links. Category discovery through visual mosaic tap targets.

### Editorial integration

Philosophy woven into caption copy beneath hero sequence — not separate text section. Guides as inline journal entries.

### Motion character

Horizontal scroll or horizontal snap sequence for hero and collection — vertical scroll for rest. Motion feels like paging through spreads.

### Mobile adaptation

Horizontal sequences become swipeable carousels with snap; mosaic simplifies to 2-column mixed-height grid.

### Why distinctive

Most radical — blurs editorial/commerce boundary more than typical fashion e-commerce. Strong “I haven’t seen this before” potential.

### Main risk

**Commerce clarity** — customers may not immediately recognize what is shoppable. Mitigation hardest of the three; requires careful labeling, prices on hover/tap, and clear Shop path in navigation. Higher implementation complexity.

---

# 10. Commerce Experience

How each direction supports the purchase journey. Commerce clarity is non-negotiable per `BRAND_IDENTITY.md` and `TECHNICAL_ARCHITECTURE.md`.

## Journey map

```text
Discovery → Interest → Product exploration → Product decision → Cart → Checkout
```

## By direction

| Stage | Direction A (Offset Field) | Direction B (Threshold Sequence) | Direction C (Embedded Lookbook) |
|-------|---------------------------|----------------------------------|--------------------------------|
| **Discovery** | Hero atmosphere + offset categories | Hero field + early category chapter | Hero mosaic + annotated products |
| **Interest** | Philosophy quote + collection anchor | Threshold into collection sequence | Caption narrative + outfit scene |
| **Exploration** | Shop via category tiles / nav | Clear inset grid chapter + nav | Tap shoppable markers → product |
| **Decision** | Standard product page — clarity mode | Standard product page — clarity mode | Standard product page — must simplify |
| **Cart** | Utility dense — no editorial | Utility dense — no editorial | Utility dense — no editorial |
| **Checkout** | WooCommerce standard — zero experiment | Same | Same |

## Universal commerce rules (all directions)

- Price visible on product card and product page without interaction
- Add-to-cart always visible on product page — no scroll hunt
- Cart icon in utility nav with count — always reachable
- Checkout: no motion experiments, no editorial layout, no hidden costs
- Search returns products and guides — clear result typing
- Account and order paths standard WooCommerce behavior when plugin active

**Direction C** requires the strongest **mode snap** at product page — editorial homepage must not predict product page layout. Product page is clarity-first across all directions.

---

# 11. Responsive Concept

One visual language, adaptive behavior — not device-brand-specific designs.

## Viewport tiers

| Tier | Composition adaptation |
|------|------------------------|
| **Smartphone** | Single column; offset becomes vertical stagger; display type scales down 30–40%; full-bleed heroes remain but crop anchors protect subject |
| **Tablet** | Mixed — portrait: phone-like; landscape: partial two-column offset returns |
| **Laptop** | Full compositional system active; hover states available |
| **Desktop** | Margins as material; max-width on reading content; grid may show 3–4 product columns |
| **Large desktop** | Content container capped; side margins become intentional void — not stretched layouts |

## Capability-based behavior

| Capability | Behavior |
|------------|----------|
| `pointer: coarse` | No hover-only information; larger targets; swipe galleries |
| `pointer: fine` | Hover image shift; denser metadata optional |
| `hover: none` | All states visible or tap-triggered |
| `prefers-reduced-motion: reduce` | Static layout; instant state changes |

## Apple / Samsung / Android

Implementation must be tested on iOS Safari, Chrome on Android, and common desktop browsers. Touch momentum scrolling, safe-area insets, and viewport units handled in CSS — not separate designs.

## What must not happen on mobile

- Every section collapsing to identical centered stack
- Display type becoming unreadably small
- Navigation requiring hidden gestures
- Product grids forcing horizontal scroll only (vertical scroll primary)
- Motion stagger blocking first interaction

---

# 12. Accessibility & Performance

Visual rules that constrain concept execution.

## Contrast

- Text and interactive elements: WCAG 2.1 AA minimum when palette locked
- Text over photography: scrim, placement on calm areas, or separate text ground — tested per hero mockup
- Price and sale states: never color-only distinction

## Readable type

- Body text minimum ~16px equivalent on mobile
- Line length capped for guides
- Display type scales with `clamp()` — readable down to smallest supported viewport

## Focus states

- Visible focus ring on all interactive elements — styled on-brand once colors exist
- Focus order matches visual order
- Skip link to main content

## Touch targets

- Minimum 44×44 CSS pixels for coarse pointers
- Adequate spacing between adjacent tappable elements

## Reduced motion

- All signature moments have static equivalents
- Product grid stagger disabled under `prefers-reduced-motion`
- Navigation panel appears instantly — no slide animation

## Image loading

- LCP image prioritized on hero and product page
- Responsive `srcset` / `sizes` — per `TECHNICAL_ARCHITECTURE.md` performance expectations
- Placeholder tone matches future neutral ground — prevents flash
- Lazy load below fold

## Layout stability

- Aspect-ratio boxes reserve space before image load
- No content jump when fonts load — subset fonts, size-adjust strategy at implementation
- Cart updates must not shift layout unexpectedly

---

# 13. Recommended Direction

## Recommendation: **Direction B — Threshold Sequence**

### Why it best fits the brand

Direction B most directly expresses the **core visual idea (The Composed Threshold)** and the brand personality traits **Considered**, **Editorial**, **Confident**, and **Accessible Premium**. It creates editorial atmosphere without sacrificing a clearly defined commerce chapter on the homepage — categories appear in **inset grid mode**, the most scannable compositional mode in the system.

It aligns with the Netherlands-first customer who values **intelligent choice and clarity** — she gets atmosphere *and* an obvious path to shop.

### Why it is most distinctive

Direction A (Offset Field) is strong but risks feeling “design portfolio” if commerce chapters are weak. Direction C (Embedded Lookbook) is memorable but dangerously blurs shoppability for a pre-launch brand building trust.

Direction B’s **chapter + threshold** structure is recognizable, repeatable across collections/guides/campaigns, and unlike standard WordPress fashion themes — without betting the business on experimental shoppable mosaics.

### Why it is commercially viable

- Category grid appears early and reads instantly
- Navigation Presence and Editorial Threshold signatures integrate naturally
- Product page, cart, and checkout remain clarity-first — mode snap is explicit
- Returning customers can skip collection reveals via skip link — efficiency respected

### Why it scales

| Future surface | How Threshold Sequence extends |
|----------------|-------------------------------|
| Collections | Collection Reveal signature — each collection is a chapter sequence |
| Products | Product Entrance in grids; product page in utility-dense clarity mode |
| Guides | Guide Interlude between editorial and related products |
| Campaigns | New chapters + threshold strips — same grammar, new content |
| Seasonal updates | Photography and accent shift; compositional modes unchanged |

### What must NOT carry over from placeholder homepage

- Centered symmetric hero with generic eyebrow/heading/supporting text/button pattern
- Equal-weight section blocks with identical spacing rhythm
- Category cards as uniform generic tiles without compositional offset
- Featured collection as four identical placeholder product blocks
- Guides as plain list without offset editorial layout
- Closing CTA as centered dual-button block without field composition
- Neutral “template calm” that could belong to any fashion theme
- System fonts used without typographic hierarchy ambition

The placeholder proves information architecture and theme settings — not visual identity.

---

# 14. Design DNA

Rules for designers and developers building future pages without losing identity.

1. **Every page is a sequence of modes — not a stack of blocks.** Choose Field, Offset pair, Sequence, Inset grid, Threshold strip, or Utility dense deliberately.

2. **Visual tension is calibrated — never decorative chaos.** If a layout feels busy, simplify commerce zones first.

3. **Typography creates recognition through ratio and rhythm — not one oversized headline style everywhere.**

4. **Photography is layout material.** Crop, bleed, overlap, and sequence — do not only fill identical cards.

5. **Crossing from editorial to commerce requires a felt threshold.** Use ground shift, scale drop, and motion — or an explicit threshold strip.

6. **Product clarity is sacred.** Name, price, variant, and add-to-cart never hide behind aesthetic ambition.

7. **One strong idea per viewport.** Each screen region communicates one primary message or action.

8. **Motion marks hierarchy and threshold — it does not decorate.** Honor `prefers-reduced-motion`. Keep interactions fast.

9. **Symmetry is for shopping; asymmetry is for story.** Do not use the same compositional bias on shop and editorial pages.

10. **Whitespace is confidence.** Dense pages signal insecurity — especially on a premium-positioned brand.

11. **Consistency comes from shared grammar, not repeated layouts.** Sections should feel related through rules, not duplication.

12. **If it could be a Shopify fashion theme demo, reject it.** Test every major layout against that filter.

---

## Relationship to Other Documentation

| Document | Relationship |
|----------|--------------|
| `BRAND_IDENTITY.md` | Strategic source — WREN WOLD name, personality, promise, Quiet Character |
| `VISUAL_IDENTITY.md` | Consolidated visual pillars |
| `LOGO_GUIDELINES.md` | Logo system and asset status |
| `VISUAL_CONCEPT.md` (this document) | Concept bridge — visual idea, composition, experience directions |
| `DESIGN_SYSTEM.md` | Tokens, components, exact scales (when production values lock) |
| `TECHNICAL_ARCHITECTURE.md` | Implementation boundary — theme settings vs code-controlled design |
| `CONTENT_ARCHITECTURE.md` | Page and navigation structure this concept must respect |

### Next phase workflow

1. Approve or refine recommended direction (Threshold Sequence)
2. Select color territory and test with photography direction
3. Select typefaces matching §4 character definitions
4. Produce key page mockups: homepage, collection, category, product, guide
5. Lock decisions into `DESIGN_SYSTEM.md`
6. Implement in WordPress theme via design tokens and template updates — code phase, not this document

---

*This document defines visual direction. It does not implement design.*
