# Make Time Finance — WordPress Theme

A block theme (Full Site Editing) for **Make Time Finance**, a small finance
consultancy that untangles clients' books and migrates them to Xero or
QuickBooks.

## What's inside

```
maketime-finance/
├─ style.css              ← WordPress theme header
├─ theme.json             ← design tokens: colors, typography, spacing
├─ functions.php          ← theme supports, enqueues, pattern categories
├─ index.php              ← placeholder (block themes don't use it)
├─ assets/
│  ├─ theme.css           ← shared CSS (hero, cards, buttons, etc.)
│  └─ img/                ← logo, service illustrations, certs, people
├─ parts/
│  ├─ header.html         ← site header template part
│  └─ footer.html         ← site footer template part
├─ templates/
│  ├─ index.html          ← blog index (Tips)
│  ├─ front-page.html     ← home page
│  ├─ page.html           ← generic page
│  ├─ page-services.html  ← slug = services
│  ├─ page-about.html     ← slug = about
│  ├─ page-contact.html   ← slug = contact
│  ├─ single.html         ← single Tip
│  ├─ archive.html        ← archive view
│  ├─ search.html         ← search results
│  └─ 404.html            ← not found
└─ patterns/              ← block patterns used in the home template
   ├─ hero.php
   ├─ privacy-band.php
   ├─ services-cards.php
   ├─ tips-split.php
   ├─ testimonial.php
   └─ newsletter.php
```

## Install

1. Upload `maketime-finance.zip` at **Appearance → Themes → Add New → Upload**.
2. Activate **Make Time Finance**.
3. Set **Settings → Reading** → *Your homepage displays* → **A static page** and
   pick (or create) a page called "Home" to pick up `front-page.html`, plus a
   "Tips" posts page.
4. Create pages with slugs `services`, `about`, `contact`, `privacy-policy`,
   `cookie-policy`, `terms-of-service` to pick up their dedicated templates.
5. (Optional) Open **Appearance → Editor** to tweak anything — every template
   and template part is editable in the Site Editor.

## Design tokens

Colors, font sizes, spacing scale and button styles all live in `theme.json`
and are exposed to the block editor — so the site owner can recolour sections
or swap fonts without touching code.

| Token | Value |
|-------|-------|
| Background | `#f5f0e8` |
| Background alt | `#ebe3d4` |
| Ink / Brand | `#8d6e63` |
| Accent | `#10b981` |
| Deep brown | `#5a4a43` |
| Font | Noto Serif Georgian |
