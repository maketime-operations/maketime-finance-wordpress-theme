# Make Time Finance — theme dev guide for Claude

A WordPress 6.5+ block (FSE) theme for https://maketime.finance/ — a small
finance consultancy. Cream + emerald palette, Noto Serif Georgian.

The site is hosted on Hetzner Webhosting S. Production deploys are
pulled from `main` on this repo by the **Deployer for Git** plugin
(WordPress side) when its webhook is hit.

## Repo layout

```
templates/         Top-level page templates (front-page, page, single, archive…)
parts/             Reusable header/footer parts — STATIC HTML, no PHP
patterns/          PHP block patterns — execute PHP, can use get_theme_file_uri()
assets/theme.css   All theme-level CSS that doesn't fit in theme.json
assets/img/        Logo + service icons + cert badges
theme.json         Tokens (colors, type scale, layout sizes, element styles)
functions.php      Asset enqueue, version meta, [mt_theme_version] shortcode
demo-content.xml   Sample pages + posts for local dev
scripts/dev-setup.sh   One-shot local WP install
```

## Local dev loop

The repo is designed to work inside a local WordPress install at `/tmp/wp/`,
with this folder symlinked in as the active theme. The setup script handles
everything.

```bash
bash scripts/dev-setup.sh
cd /tmp/wp && php -d error_reporting='E_ALL & ~E_DEPRECATED' \
  -S 127.0.0.1:8080 router.php &
curl -sSL http://127.0.0.1:8080/  # smoke-test
```

After editing theme files, flush the WP cache (`cd /tmp/wp && wp cache flush
--allow-root`) and re-fetch. For visual diffs, use Playwright via
`/tmp/screenshot.mjs` (write one if missing — see prior session transcripts).

## Deploying to production

**Always ask the user before deploying** — every deploy is a visible
production change and the webhook secret is not stored in this repo.

Workflow:

1. Make changes locally, verify they render correctly.
2. Bump `Version:` in `style.css` (e.g. `1.0.3` → `1.0.4`). The version
   appears in `<meta name="generator">` and in the footer compliance
   line — both are how we verify a deploy actually landed.
3. Commit + push to `main`.
4. **Prompt the user**: *"Ready to deploy v1.0.X to maketime.finance?
   Paste the Deployer-for-Git webhook URL when you're ready."* The URL
   pattern is:
   ```
   https://maketime.finance/wp-json/dfg/v1/package_update?secret=<REDACTED>&type=theme&package=maketime-finance-wordpress-theme
   ```
5. After the user pastes the URL, `curl` it and confirm a non-error response.
6. Verify deploy:
   ```bash
   curl -s https://maketime.finance/ | grep maketime-finance
   # → <meta name="generator" content="maketime-finance 1.0.X">
   ```
   If the version is wrong, the deploy is stale (browser/edge/page cache
   or webhook didn't fire).

`maketime.finance` is allowlisted in `.claude/settings.json` for sandbox
network access — you can hit the live site directly from any new session.

## Architecture gotchas

These bit a previous session. Don't repeat:

- **`parts/*.html` and `templates/*.html` do NOT execute PHP.** If you
  need a dynamic asset URL (e.g. `get_theme_file_uri()`), put the markup
  in a `patterns/*.php` file and reference it from the part with
  `<!-- wp:pattern {"slug":"maketime-finance/your-pattern"} /-->`.
  See `patterns/header-logo.php` and `patterns/footer-certs.php` for
  the canonical examples.
- **Never hardcode `/wp-content/themes/maketime-finance/...`** in static
  HTML. The theme is installed at `/wp-content/themes/maketime-finance-wordpress-theme/`
  on production (the GitHub repo name) — hardcoded paths to the slug
  will 404 there. Always go through `get_theme_file_uri()` in a pattern.
- **`tagName` collisions.** `wp:template-part {"tagName":"header"}` already
  wraps the part in `<header>`. The inner `wp:group` inside the part must
  NOT also set `tagName:"header"` — that produces nested `<header><header>`.
  Same for footer.
- **Empty `wp:navigation` falls back to `wp:page-list`.** That lists every
  published page, including auto-imported WP defaults like "Sample Page".
  Use a curated `wp:list` of nav links instead (see `parts/header.html`).
- **CSS targeting non-existent selectors.** The original theme.css had
  `.mt-hero .mt-container { display:grid… }` and
  `.mt-testimonial { display:grid; grid-template-columns:200px 1fr }`
  but the rendered block markup didn't contain `.mt-container`, and
  `.mt-testimonial`'s only direct child was a `wp-block-columns` flex
  container. Result: the testimonial collapsed text to one character per
  line. When writing CSS, render and inspect the actual DOM, don't assume
  it matches the class names you wrote in patterns.
- **SVG well-formedness.** `assets/img/logo.svg` originally had duplicate
  `xmlns:inkscape` attributes; Chromium silently rejected it. If an SVG
  isn't rendering, validate with `xmllint --noout file.svg`.

## Other notes

- WP cache plugins on production may delay visible changes. Bumping the
  theme `Version` is the simplest way to bust browser cache for
  `theme.css?ver=…`.
- The `[mt_theme_version]` shortcode is registered in `functions.php` and
  is what the footer line uses. Keep `style.css`'s `Version:` as the
  single source of truth.
- Demo content is intentionally minimal. The `About` page expects
  featured images for team members; production may set those via the
  WP media library rather than the theme.
