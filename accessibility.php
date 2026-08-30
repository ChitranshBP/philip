<?php
/**
 * Accessibility statement.
 *
 * Everything claimed here is genuinely implemented — check before adding to
 * it. The known-limitations section is deliberately honest; an accessibility
 * statement that overclaims is worse than none.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';

$pageTitle = 'Accessibility — ' . $SITE['company'];
$pageDesc  = 'How this site is built to work for people with low vision, limited dexterity, '
           . 'or anyone using a keyboard or screen reader — and how to tell us when it does not.';
$updated   = 'August 2026';   // TODO: update whenever this page changes

/* What is actually built in. Do not add a row that is not true. */
$features = [
    ['sun',      'Bigger text on request',   'The A A A control at the foot of every page steps the whole site up two sizes. Your choice is remembered on your next visit. Your browser\'s own zoom works normally too.'],
    ['eye',      'Readable contrast',        'Body text is near-black on cream. Small bold text in our brand red uses a deeper shade so it clears the WCAG AA contrast ratio rather than sitting just under it.'],
    ['hand',     'Keyboard friendly',        'Every link, button, accordion and form field can be reached and operated with the Tab and arrow keys, and a high-contrast outline shows where you are. A "Skip to main content" link comes first on every page.'],
    ['chat',     'Works with screen readers','Pages use real headings in order, landmarks, labelled form fields, alt text on meaningful images, and aria-current on the navigation so you know which page you are on.'],
    ['clock',    'Respects reduced motion',  'If your device is set to reduce motion, the logo marquee stops, the slider stops sliding smoothly, and animations are switched off.'],
    ['clipboard','Works without JavaScript',  'The questions accordions are native HTML details elements, and the testimonial slider is native scroll-snap. Turn JavaScript off and the content is all still there.'],
];

/* Honest limitations. */
$limits = [
    'The carrier logo strip scrolls automatically. It pauses when you hover or focus it, and stops entirely under reduced-motion settings, but it does not yet have a stop button.',
    'The Advantage-versus-Medigap comparison table scrolls sideways on a narrow screen. It is a real table with proper headers, but side-scrolling can be awkward on a phone.',
    'Some documents we send by email, and some carrier websites we link you to, are outside our control and may be less accessible than this site.',
];

require __DIR__ . '/inc/header.php';
?>

<section class="bg-brand-mist pb-12 pt-[9rem] lg:pb-16 lg:pt-[11rem]">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-3xl">
      <p class="eyebrow text-brand-ocean">Accessibility</p>
      <h1 class="mt-4 font-display text-[2.3rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[2.9rem]">
        Built to be read by <span class="text-brand-ocean">everyone.</span>
      </h1>
      <p class="mt-5 text-[1.1rem] leading-relaxed text-brand-slate">
        Most of the people I work with are over 65. A good many have trouble with small print, a
        mouse, or a screen. That is not an edge case here &mdash; it is the audience, and this site
        is built accordingly.
      </p>
      <p class="mt-4 text-[0.95rem] font-semibold text-brand-slate">Last updated <?= e($updated) ?></p>
    </div>
  </div>
</section>

<!-- What is built in -->
<section class="bg-white py-14 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <h2 class="max-w-3xl font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
      What is built in.
    </h2>
    <div class="mt-9 grid gap-5 sm:grid-cols-2">
      <?php foreach ($features as $f): ?>
        <article class="flex gap-5 rounded-[1.5rem] border border-brand-line bg-brand-mist p-7">
          <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-ocean text-white">
            <?= icon($f[0], 'h-5 w-5', 1.7) ?>
          </span>
          <div>
            <h3 class="font-display text-[1.18rem] font-bold leading-snug text-brand-navy"><?= e($f[1]) ?></h3>
            <p class="mt-2 leading-relaxed text-brand-slate"><?= e($f[2]) ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Standard, limits, feedback -->
<section class="bg-brand-mist py-14 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-2 lg:gap-16 lg:px-8">

    <div class="prose-trucare">
      <h2>The standard we aim at</h2>
      <p>
        We build against the Web Content Accessibility Guidelines (WCAG) 2.1 at level AA. We test
        with a keyboard, with the browser zoomed, and with the operating system's own text-size and
        reduced-motion settings turned on. We do not claim a formal audit or certification &mdash;
        if we ever have one, it will be named here.
      </p>

      <h2 class="!mt-10">Where we fall short</h2>
      <p>Honestly, these are the parts we know could be better:</p>
      <ul>
        <?php foreach ($limits as $l): ?>
          <li><?= e($l) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="rounded-[1.75rem] bg-white p-8 shadow-soft sm:p-10 lg:sticky lg:top-32 lg:self-start">
      <h2 class="font-display text-[1.5rem] font-bold leading-snug text-brand-navy">
        If something here does not work for you
      </h2>
      <p class="mt-4 leading-relaxed text-brand-slate">
        Tell me and I will fix it. That is not a form letter &mdash; a page nobody can read is a
        page that is not doing its job, and I would rather hear about it than not.
      </p>
      <p class="mt-4 leading-relaxed text-brand-slate">
        And if the website is simply not how you would like to do this: ring me. Everything on this
        site I will happily go through with you on the phone, or at your kitchen table, in as much
        time as you need.
      </p>

      <div class="mt-7 space-y-3">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="flex items-center justify-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> <?= e($SITE['phone']) ?>
        </a>
        <a href="mailto:<?= e($SITE['email']) ?>" class="flex items-center justify-center gap-3 rounded-full border-2 border-brand-line px-7 py-4 font-bold text-brand-navy transition hover:border-brand-ocean hover:text-brand-ocean">
          <?= icon('mail', 'h-5 w-5') ?> Email me
        </a>
      </div>

      <p class="mt-6 text-[0.95rem] leading-relaxed text-brand-slate">
        Medicare's own helpline is available too: 1-800-MEDICARE, TTY 1-877-486-2048, 24 hours a
        day, 7 days a week.
      </p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
