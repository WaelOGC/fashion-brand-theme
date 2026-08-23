# Development Rules

## 1. Core Principle

This project is a long-term custom WordPress/WooCommerce fashion platform.

Do not treat it as a temporary website, generic template, or quick dropshipping project.

Every implementation decision should prioritize:

- Maintainability
- Scalability
- Performance
- Security
- Accessibility
- SEO
- Clean architecture
- Reusability

---

## 2. Source of Truth

Before making significant changes, review:

`/docs/PROJECT_OVERVIEW.md`

Additional documents inside `/docs` may define more specific rules.

If two documents appear to conflict, stop and identify the conflict instead of silently choosing one.

---

## 3. Brand Restrictions

The final brand name has not been selected.

Do NOT:

- Invent a final brand name
- Hard-code a temporary brand name into architecture
- Create permanent branding around "BRAND DEMO"
- Assume temporary colors or typography are final
- Create irreversible brand-specific dependencies

Use neutral placeholders until the Brand Identity is officially approved.

---

## 4. WordPress Architecture

The project uses WordPress and WooCommerce.

Build a custom theme.

Do NOT modify WordPress core files.

Do NOT modify WooCommerce plugin core files.

Theme functionality must remain inside the theme or appropriate custom functionality layer.

Avoid unnecessary dependencies.

Do not install or recommend plugins without a clear functional reason.

---

## 5. Code Quality

Write clean, readable and maintainable code.

Prefer:

- Small reusable components
- Clear naming
- Logical file organization
- Separation of concerns
- Minimal duplication
- WordPress coding standards
- Semantic HTML

Avoid:

- Spaghetti code
- Excessive inline CSS
- Excessive inline JavaScript
- Duplicated logic
- Hard-coded content where dynamic data is appropriate
- Unnecessary abstractions

---

## 6. Design System

The visual system must eventually be centralized.

Colors, typography, spacing, buttons, cards and reusable UI patterns should not be scattered throughout individual files.

Use CSS variables/design tokens where appropriate.

The final Brand Identity will define the official:

- Colors
- Typography
- Logo
- Spacing system
- Visual language

Until then, use neutral temporary values.

---

## 7. Responsive Design

Every major interface must work across:

- Desktop
- Tablet
- Mobile

Mobile is not an afterthought.

Do not create desktop-only components unless explicitly required.

---

## 8. Performance

Performance is a first-class requirement.

Prioritize:

- Optimized images
- Minimal JavaScript
- Efficient CSS
- Lazy loading where appropriate
- Avoiding unnecessary libraries
- Efficient WordPress queries
- Good Core Web Vitals

Do not sacrifice performance for unnecessary visual effects.

---

## 9. Accessibility

Use semantic HTML and accessible interaction patterns.

Consider:

- Keyboard navigation
- Focus states
- Sufficient contrast
- Alt text
- Accessible forms
- Proper headings
- ARIA only when necessary

Accessibility should be integrated during development, not added at the end.

---

## 10. SEO

SEO must be considered during architecture and implementation.

The project will use WordPress SEO tooling, currently planned around Yoast SEO.

Do not create HTML structures that unnecessarily interfere with:

- Search engine crawling
- Semantic structure
- Internal linking
- Metadata
- Structured product information

SEO must support the user experience rather than compromise it.

---

## 11. WooCommerce

WooCommerce compatibility is mandatory.

Do not build custom product interfaces that unnecessarily bypass WooCommerce functionality.

Products, categories, pricing, cart, checkout and customer-related functionality should remain compatible with WooCommerce.

---

## 12. AI Features

An AI Fashion Assistant is a future feature.

Do not implement it prematurely.

The architecture should allow future integration without forcing unnecessary complexity into the MVP.

---

## 13. Content

Do not invent permanent business claims.

In particular, do not make unsupported claims about:

- Sustainability
- Materials
- Manufacturing
- Supply chains
- Certifications
- Product quality
- Environmental impact

Temporary placeholder content may be used during development but must be clearly identifiable as placeholder content.

---

## 14. Change Management

Before making a major architectural change:

1. Explain what will change.
2. Explain why it is needed.
3. Identify affected files or systems.
4. Consider simpler alternatives.
5. Obtain approval before implementing irreversible changes.

Do not perform large refactors without a clear reason.

---

## 15. Development Workflow

Preferred workflow:

Understand → Plan → Implement → Test → Review → Document.

Do not immediately start coding when a request is ambiguous.

Ask for clarification when a decision could materially affect architecture, security, data integrity, performance or the future scalability of the project.

---

## 16. Temporary vs Final Decisions

Clearly distinguish between:

- Temporary prototype decisions
- Approved project decisions
- Final brand decisions
- Experimental implementations

Never treat an experiment as an approved permanent architecture.

---

## 17. Security

Follow WordPress security best practices.

Pay attention to:

- Input validation
- Sanitization
- Escaping
- Nonces
- Capability checks
- Secure database queries
- Authentication and authorization

Never expose secrets, credentials, API keys or private configuration in source code.

---

## 18. Rule of Simplicity

When two solutions provide similar results, prefer the simpler solution.

Do not introduce complexity merely because it is technically possible.

The goal is a powerful system that remains understandable and maintainable.

---

## 19. Final Rule

Build for the company we intend to become, while implementing only what the current stage requires.

Do not over-engineer the MVP.

Do not under-engineer the foundation.