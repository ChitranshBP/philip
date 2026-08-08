# Philip Smith — Medicare & Senior Benefits

A bright, coastal, single-page marketing site for a licensed Medicare agent.
PHP + Tailwind CSS. No build step, no database, no dependencies to install.

---

## Run it

```bash
cd /Users/boss/Desktop/Philip
php -S localhost:8000
```

Then open <http://localhost:8000>.

For production, drop the whole folder on any PHP 7.4+ host (shared hosting,
cPanel, DigitalOcean, whatever) and point the domain at it.

---

## Files

| Path | What it is |
|---|---|
| `index.php` | The entire page — content arrays at the top, markup below, JS at the bottom |
| `inc/config.php` | **Start here.** Name, phone, email, address, licence, hours |
| `inc/functions.php` | Escaping, inline SVG icon set, photo-with-fallback helper |
| `inc/form-handler.php` | Contact form: validation, spam traps, email, CSV backup |
| `assets/css/custom.css` | The thin hand-written layer over Tailwind |
| `assets/img/` | Drop photos here — see `assets/img/README.txt` |
| `storage/leads.csv` | Auto-created backup of every submission |

---

## Before it goes live

Everything below is marked `TODO` in the code.

1. **`inc/config.php`** — replace phone, email, address, licence number, years,
   client count, carrier count, service area, and the two form email addresses.
   *The current phone numbers and email are placeholders and must not ship.*
2. **Photos** — add `assets/img/hero-bg.jpg` and `assets/img/philip-portrait.jpg`.
   Until they exist the page shows a designed placeholder, so nothing breaks.
   The portrait needs to be professionally shot; read `assets/img/README.txt`
   for the framing notes (the hero headline sits over the left of that image).
3. **Testimonials** — the three reviews in `$reviews` (top of `index.php`) are
   sample copy. Swap them for real, permissioned quotes before launch.
4. **Personality block** — the three details in `$personal` ("On the water by
   six", etc.) are invented. Replace with things that are actually true of Philip.
5. **Canonical URL and OG tags** — set the real domain in the `<head>`.
6. **Privacy Policy / Accessibility** — the two footer links are `#` stubs.
7. **Compliance** — the CMS-style disclaimers are in the footer. Have Philip's
   compliance contact review the wording against his carrier requirements.

---

## Editing content

All copy lives in PHP arrays at the top of `index.php` — no hunting through
markup:

`$nav` · `$concierge` · `$services` · `$parts` · `$gaps` · `$costs` ·
`$mistakes` · `$compare` · `$steps` · `$reviews` · `$glossary` · `$faqs`

Add a row to any array and the section grows. Nothing else to touch.

---

## The contact form

- Validates name and phone; email and ZIP are optional but checked if given.
- Two spam traps: a hidden honeypot field and a minimum time-to-submit.
- Post/redirect/get, so a refresh never resubmits.
- Every lead is appended to `storage/leads.csv` **before** the email is sent,
  so a mail failure never loses a lead. `storage/.htaccess` blocks web access
  to that file on Apache — **on nginx you must block `/storage/` yourself.**
- Sending uses PHP `mail()`. Many hosts do not have this configured. If mail
  does not arrive, swap the `mail()` call in `inc/form-handler.php` for SMTP
  (PHPMailer or Symfony Mailer) using the host's credentials.

---

## Design notes

**Palette** — bright coastal, no dark or muted fills, no gradients anywhere.

| Token | Hex | Used for |
|---|---|---|
| `brand-navy` | `#0F3E58` | Headlines |
| `brand-ocean` | `#0E7FA8` | Primary blue, links, footer |
| `brand-sky` | `#2BA9D8` | Hover state, hero fallback |
| `brand-aqua` | `#4FD1CE` | Ticks, small accents |
| `brand-foam` / `brand-mist` | `#E6F6FB` / `#F4FBFD` | Pale section washes |
| `brand-sand` / `brand-shell` | `#FDF4E6` / `#FFFAF3` | Warm section washes |
| `brand-burn` / `brand-coral` | `#DE4F2C` / `#FF7A59` | CTAs and accents |
| `brand-sun` | `#FFC24B` | Stars, highlight bands |

**Type** — Plus Jakarta Sans (headlines, tight negative tracking) and Inter
(body), with Caveat for the signature.

**Senior-friendly by default** — 17px base, A / A+ / A++ text-size control in
the top bar that remembers the choice, thick visible focus rings, large touch
targets, a sticky call bar on phones, and `prefers-reduced-motion` respected.

**Interactive** — keyboard-accessible Medicare 101 tabs (arrow keys, Home/End),
native `<details>` FAQ accordion, scroll reveals, animated nav underlines.

**Accessibility** — skip link, landmarks, labelled form fields with inline
errors, `aria-live` on form feedback, no horizontal scroll at any width.

---

## Known trade-offs

- **Tailwind is loaded from the CDN.** Fine for handoff and fast to edit, but it
  ships the compiler to the browser. Before launch, run the Tailwind CLI once
  and link a compiled stylesheet instead — cuts roughly 300 KB and stops the
  brief unstyled flash on slow connections.
- **Google Fonts are external.** Self-host them if Philip needs the site to work
  offline or wants stricter privacy.
