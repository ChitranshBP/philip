<?php
/**
 * Shared page chrome — everything from <!doctype> down to <main>.
 * Set these before requiring it (all optional):
 *   $pageTitle  <title> and og:title
 *   $pageDesc   meta description
 * Requires inc/config.php and inc/functions.php to be loaded already.
 */
if (!isset($SITE)) { require_once __DIR__ . '/config.php'; }
if (!function_exists('e')) { require_once __DIR__ . '/functions.php'; }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle ?? $SITE['company'] . ' — ' . $SITE['tagline'] . ' | ' . $SITE['address']['city'] . ', ' . $SITE['address']['state']) ?></title>
<meta name="description" content="<?= e($pageDesc ?? $SITE['tagline'] . ' Philip Smith is a licensed Medicare agent serving ' . $SITE['service_area'] . '. No-cost help comparing Medicare Advantage, Supplement and Part D plans. Call ' . $SITE['phone'] . '.') ?>">
<link rel="canonical" href="https://example.com/"><!-- TODO: real domain -->

<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($pageTitle ?? $SITE['company'] . ' — ' . $SITE['tagline']) ?>">
<meta property="og:description" content="Concierge Medicare guidance from a licensed local agent. Compare every option in one unhurried sitting.">
<meta name="theme-color" content="#DD4541">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com?plugins=forms"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        /* TRUCARE BRAND
           Red   #DD4541  accent — buttons, links, active states, rules
           Cream #FFFAE3  the page ground
           Black #14110F  all text
           Plus white for cards and one hairline. Nothing else.
           The old names (navy, ocean, sun, sand…) are kept as aliases so
           the markup did not need rewriting — they all resolve into these. */
        brand: {
          navy:   '#14110F',   // black — headings
          ink:    '#14110F',   // black — body emphasis
          slate:  '#5C554E',   // warm grey — muted body text
          line:   '#E7DFC4',   // hairline on cream
          ocean:  '#DD4541',   // THE accent
          sky:    '#C3352F',   // accent, hover only
          aqua:   '#F7DFDA',   // accent tint — soft fills
          foam:   '#F6EFD2',   // cream, one step down — chips
          mist:   '#FFFAE3',   // cream — the ground
          sand:   '#FFFAE3',   // cream (alias)
          shell:  '#FFFFFF',   // white — cards
          coral:  '#C3352F',   // alias -> accent hover
          burn:   '#DD4541',   // alias -> accent
          sun:    '#DD4541',   // alias -> accent
        },
      },
      fontFamily: {
        display: ['Inter', 'system-ui', 'sans-serif'],
        sans:    ['Inter', 'system-ui', 'sans-serif'],
        hand:    ['Caveat', 'cursive'],
      },
      boxShadow: {
        soft: '0 2px 6px rgba(40,30,20,.04), 0 14px 34px -14px rgba(40,30,20,.14)',
        lift: '0 4px 12px rgba(40,30,20,.05), 0 30px 60px -24px rgba(40,30,20,.22)',
        sun:  '0 14px 30px -14px rgba(40,30,20,.30)',   // alias -> neutral
        blue: '0 14px 30px -14px rgba(40,30,20,.30)',   // alias -> neutral
      },
      maxWidth: { content: '80rem' },
    },
  },
};
</script>
<link rel="stylesheet" href="assets/css/custom.css">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "InsuranceAgency",
  "name": "<?= e($SITE['brand'] . ' — ' . $SITE['brand_sub']) ?>",
  "description": "Licensed Medicare insurance agent providing concierge-level help comparing Medicare Advantage, Medicare Supplement and Part D plans.",
  "slogan": "<?= e($SITE['tagline']) ?>",
  "telephone": "<?= e($SITE['phone']) ?>",
  "email": "<?= e($SITE['email']) ?>",
  "areaServed": "<?= e($SITE['service_area']) ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?= e($SITE['address']['street']) ?>",
    "addressLocality": "<?= e($SITE['address']['city']) ?>",
    "addressRegion": "<?= e($SITE['address']['state']) ?>",
    "postalCode": "<?= e($SITE['address']['zip']) ?>",
    "addressCountry": "US"
  },
  "openingHours": "Mo-Fr 09:00-17:00"
}
</script>
</head>

<body class="bg-brand-mist font-sans text-[1.0625rem] leading-relaxed text-brand-ink antialiased">

<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[100] focus:rounded-lg focus:bg-brand-ocean focus:px-5 focus:py-3 focus:font-semibold focus:text-white">Skip to main content</a>

<!-- ═════════════════ HEADER (transparent over the hero) ═════════════════ -->
<?php /* Pages with a photographic hero set $transparentHeader = true before
   requiring this file; everywhere else the bar starts solid so the nav is
   readable against the page background. */ ?>
<div id="siteTop" data-solid="<?= empty($transparentHeader) ? '1' : '0' ?>"
     class="no-print fixed inset-x-0 top-0 z-50 px-3 pt-3 sm:px-5 sm:pt-4 lg:px-8<?= empty($transparentHeader) ? ' is-solid' : '' ?>">
<header class="headerbar mx-auto max-w-content px-3 sm:px-4">
  <div class="flex items-center justify-between gap-4 py-2.5">

    <a href="index.php" class="brand flex items-center rounded-2xl py-1 pr-2" aria-label="<?= e($SITE['logo_alt']) ?> — home">
      <img src="<?= e($SITE['logo']) ?>" alt="<?= e($SITE['logo_alt']) ?>" width="1080" height="280"
           class="site-logo h-9 w-auto sm:h-10">
    </a>

    <nav class="nav-pill hidden items-center gap-1 rounded-full p-1 xl:flex" aria-label="Main">
      <?php
      /* Mark the page we are on. basename() so it works whether the link is
         .php locally or rewritten to .html by build.php. */
      $here = basename($currentPage ?? $_SERVER['SCRIPT_NAME'] ?? 'index.php', '.php');
      foreach ($nav as $href => $label):
          $isHere = basename($href, '.php') === $here;
      ?>
        <a href="<?= e($href) ?>"<?= $isHere ? ' aria-current="page"' : '' ?>
           class="nav-link<?= $isHere ? ' is-active' : '' ?> whitespace-nowrap rounded-full px-4 py-2 text-[0.97rem] font-semibold transition"><?= e($label) ?></a>
      <?php endforeach; ?>
    </nav>

    <div class="flex items-center gap-2">
      <a href="tel:<?= e($SITE['phone_raw']) ?>" class="phone-chip hidden items-center gap-2 whitespace-nowrap rounded-full px-4 py-2.5 text-[0.97rem] font-bold transition lg:inline-flex">
        <?= icon('phone', 'h-[1.1rem] w-[1.1rem]') ?><?= e($SITE['phone']) ?>
      </a>
      <a href="contact.php" class="hidden items-center gap-2 whitespace-nowrap rounded-full bg-brand-burn px-5 py-2.5 font-bold text-white shadow-sun transition hover:-translate-y-0.5 hover:bg-brand-coral sm:inline-flex">
        Free Plan Review <?= icon('arrow', 'h-[1.15rem] w-[1.15rem]') ?>
      </a>
      <button type="button" id="navToggle" class="menu-btn grid h-11 w-11 place-items-center rounded-full border xl:hidden" aria-expanded="false" aria-controls="mobileNav" aria-label="Open menu">
        <span id="navIconOpen"><?= icon('menu', 'h-6 w-6') ?></span>
        <span id="navIconClose" class="hidden"><?= icon('close', 'h-6 w-6') ?></span>
      </button>
    </div>
  </div>

  <nav id="mobileNav" class="mobile-sheet hidden xl:hidden" aria-label="Mobile">
    <?php foreach ($nav as $href => $label): ?>
      <a href="<?= e($href) ?>"<?= basename($href, '.php') === $here ? ' aria-current="page"' : '' ?>
         class="flex items-center justify-between rounded-2xl px-4 py-3.5 text-lg font-semibold text-brand-navy transition hover:bg-brand-foam">
        <?= e($label) ?><?= icon('arrow', 'h-5 w-5 text-brand-ocean') ?>
      </a>
    <?php endforeach; ?>
    <a href="tel:<?= e($SITE['phone_raw']) ?>" class="mt-2 flex items-center justify-center gap-2 rounded-full bg-brand-ocean px-6 py-4 text-lg font-bold text-white">
      <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
    </a>
  </nav>
</header>
</div><!-- /#siteTop -->

<main id="main">
<?php
/* Consume the per-page variables so they cannot leak into the next page
   when several are rendered in one process (see build.php). */
unset($transparentHeader, $pageTitle, $pageDesc);
?>
