# Trucare Insurance — Philip Smith

Marketing site for **Trucare Insurance Agency**, Sarasota FL. Licensed Medicare
agent Philip Smith. PHP templates → static HTML, deployed on Netlify.

---

## The client, in his own words

Everything on this site comes from Philip's brief
(`docs/client-brief.pdf`) — his bio, the Q&A
copy, and two sites he pointed at as references. Read that PDF before writing new
copy; it is the source of truth for tone.

| | |
|---|---|
| **Business** | Trucare Insurance Agency, Sarasota, Florida |
| **Agent** | Philip Smith, owner, licensed insurance broker |
| **Experience** | 15 years in Medicare |
| **Tagline** | *No Jargon. No Pressure. Just Trucare.* |
| **Phone** | (941) 400-0109 — available seven days a week |
| **Email** | philipsmiththankyou@gmail.com *(confirm — a @trucare domain would look stronger)* |
| **Products** | Medicare Advantage, Medicare Supplements (Medigap), Part D, Special Needs Plans, indemnity, cancer plans, dental/vision/hearing, life & final expense, fixed annuities, travel |

**His story, which drives the whole tone:** Philip came to the US from South
Africa in 2000 with no qualifications and no safety net. He knows what being lost
feels like, which is why he refuses to hand people a brochure. Most new clients
come from referrals. He answers his own phone.

### Reference sites he named

- **https://grueninghealthwealth.com** — *"I like the content on this site and want
  to include most of it and want to offer the same."* Their nav is Home / About /
  Medicare / **Retirement** / **Major exposures** / Contact. Retirement and Major
  Exposures are the two sections we have not built yet.
- **https://faithinsurancesolutions.com** — he liked how their **Q&A is laid out**.
  That drove the structure of `faq.php`. Note their name appears in his pasted
  copy; it has been stripped from ours.

---

## Brand

Five colours. Nothing else. Defined once in the Tailwind block at the top of
`inc/header.php`, aliased so old class names still resolve.

| Role | Hex | Used for |
|---|---|---|
| Accent | `#DD4541` | Buttons, links, active nav, rules, numerals |
| Ground | `#FFFAE3` | Page background (cream) |
| Ink | `#14110F` | All headings and body text (black) |
| Card | `#FFFFFF` | Cards and panels sitting on the cream |
| Line | `#E7DFC4` | Hairlines and borders |

`#C3352F` is the one exception: a deeper red for small bold text (eyebrows), where
`#DD4541` on cream only reaches 3.5:1 contrast. Sections alternate white and cream
only — no third background.

**Type:** Inter throughout, standing in for **Aptos**, which the brief names but
which is not licensed for web use. If Trucare buys an Aptos webfont licence, drop
the `.woff2` files in `assets/fonts/` and swap the `fontFamily` block. Caveat is
used once, for Philip's signature.

**Logo:** `assets/logo/truecare-logo.png` — black artwork on transparency. CSS
flips it white over the hero photo and leaves it black on light backgrounds.

---

## Structure

```
index.php          Home
about.php          Philip's full story
faq.php            Medicare Q&A + glossary
inc/config.php     $SITE settings, $nav, $glossary  ← edit business details here
inc/header.php     <!doctype> → <main>, shared by every page
inc/footer.php     </main> → </html>, incl. the site JavaScript
inc/functions.php  e(), icon(), photo(), avatar(), slug(), star()
inc/form-handler.php  Contact form POST handler (no form on the site right now)
inc/data.php       Long-form Medicare content parked for the Medicare 101 page
build.php          Renders every page to dist/ as static HTML
netlify.toml       Netlify build command + headers
```

### Pages still to build

Every one is already registered in `build.php` and linked in the nav, so they
compile the moment the file exists.

| File | Nav label | Notes |
|---|---|---|
| `medicare-101.php` | (linked from home) | Long-form guide. Content waiting in `inc/data.php`. |
| `dental-vision.php` | Dental & Vision | |
| `travel.php` | Travel | |
| `newsletter.php` | Newsletter | Needs a mailing-list provider decision. |
| `contact.php` | — | `inc/form-handler.php` is wired and waiting. |

Until they exist those nav links 404. Building a page is ~10 lines: require
config + functions, set `$pageTitle` / `$pageDesc`, require the header, write
sections, require the footer. Copy `about.php` as the pattern. Pages with a
photographic hero set `$transparentHeader = true` before the header require.

---

## Run and deploy

```bash
php -S localhost:8000        # local preview
php build.php                # render everything to dist/
```

Netlify reads `netlify.toml`: build command `php build.php`, publish `dist`.
`build.php` rewrites internal `.php` links to `.html`, copies `assets/`, and
reports any page that does not exist yet. Note PHP is present in Netlify's build
image but is not a supported runtime — if a deploy fails with *php: command not
found*, build locally and commit `dist/`.

---

## Before it goes live

- [ ] **Licence number** — `FL License #W000000` is a placeholder and appears
      directly under Philip's signature.
- [ ] **Street address** — `123 Main Street` is a placeholder.
- [ ] **Confirm the email**, and ideally move off gmail to the domain.
- [ ] **Testimonials** — the three in `index.php` are invented. Replace with real,
      permissioned reviews. Same for the `clients` (1,200) and `carriers` (30)
      figures in config.
- [ ] **Carrier logos** — `assets/img/carriers/` came off another agency's CDN.
      Get official assets and written permission; CMS marketing rules are strict
      about implying endorsement.
- [ ] **Canonical URL** — still `https://example.com/` in the header partial.
- [ ] **Medicare disclaimers** — present in the footer; have a compliance officer
      confirm the wording for the plan year.

### One correction we made to the brief

Philip's source text is from 2021 and recommends **Plan F**. Plan F and Plan C are
**closed to anyone who became Medicare-eligible on or after 1 January 2020**. The
site leads with Plan G, positions Plan N as the cheaper option, and states F's
cut-off. Do not revert this.

We also deliberately publish **no dollar figures** — premiums, deductibles and the
Part D cap are reset by CMS every year, and a stale number is worse than none.
Philip quotes live figures on the call.

### Ideas from the brief not yet built

- **IEP Calculator** — his source mentions one ("determine the dates of your exact
  Initial Enrollment Period"). A small date-picker computing the 7-month window
  would be genuinely useful and easy to build.
- **Retirement** and **Major Exposures** pages, per the Gruening site he liked.
- **"Connect with Trucare"** — a social/contact block he sketched.

---

## Photography

- `assets/bg-hero/` — hero photograph and Philip's portrait (client supplied;
  he noted the portrait will change).
- `assets/img/about/` — Unsplash, free licence. Credits in the header comment of
  `about.php`: Esther Ann, Hector Reyes, Josiah Gibbs (the Sarasota shot is the
  real Ringling Bridge).
- `assets/img/` — client-supplied photos for the Medicare and FAQ sections.
