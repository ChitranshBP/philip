<?php
/**
 * Travel cover — what happens to your Medicare once you leave the country.
 *
 * Figures here (the 80% / $250 / $50,000 foreign travel emergency benefit) are
 * fixed in the standardised Medigap plan design rather than reset annually by
 * CMS, which is why this page carries numbers when the others deliberately do
 * not. Still worth checking a carrier's current outline of coverage.
 *
 * Photography: Unsplash (free licence).
 *   couple-travel.jpg  Matt Bennett
 *   passport.jpg       Katarzyna Grabowska
 *   cruise.jpg         Sam Williams
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/inc/faqs.php';

$pageTitle = 'Travel Cover & Medicare Abroad — ' . $SITE['company'];
$pageDesc  = 'Original Medicare rarely travels with you. What each part does abroad, the Medigap '
           . 'foreign travel emergency benefit, the cruise rule, and the cover worth buying before '
           . 'you go. From ' . $SITE['agent_name'] . ' in ' . $SITE['address']['city'] . '.';

/* What each route actually does once you leave the country. */
$abroad = [
    [
        'tag'   => 'Original Medicare',
        'name'  => 'Parts A and B',
        'verdict' => 'Almost never pays',
        'tone'  => 'stop',
        'body'  => 'Medicare rarely covers care outside the United States. There are a handful of narrow exceptions, but you should plan on the answer being no.',
    ],
    [
        'tag'   => 'Part C',
        'name'  => 'Medicare Advantage',
        'verdict' => 'Sometimes, for emergencies',
        'tone'  => 'maybe',
        'body'  => 'A good many Advantage plans add worldwide emergency and urgent care cover. Routine care abroad is not included, and the detail differs plan by plan — it is written in the Evidence of Coverage, and I will read it with you.',
    ],
    [
        'tag'   => 'Medigap',
        'name'  => 'Foreign travel emergency',
        'verdict' => 'Yes, on most letters',
        'tone'  => 'yes',
        'body'  => 'Plans C, D, F, G, M and N include a foreign travel emergency benefit: 80% of billed charges for medically necessary emergency care in the first 60 days of a trip, after a $250 deductible, up to a $50,000 lifetime maximum.',
    ],
];

/* What a travel policy adds that health cover does not. */
$products = [
    ['shield',  'Travel medical',        'Pays for treatment abroad from the first dollar, without the Medigap lifetime cap. The core product if you travel more than occasionally.'],
    ['plane',   'Emergency evacuation',  'Getting you to adequate care, or home. An air ambulance across an ocean routinely runs past six figures, and no health plan pays it.'],
    ['calendar','Trip cancellation',     'Refunds the deposits you lose when illness, a death in the family or a hospital admission stops you travelling.'],
    ['clock',   'Trip interruption &amp; delay', 'Covers the cost of getting home early, or the hotel and meals when a connection strands you overnight.'],
];

/* The questions that decide which policy is right. */
$before = [
    'How long is the trip? The Medigap benefit only runs for the first 60 days.',
    'Are you going more than once this year? An annual multi-trip policy is often cheaper than two singles.',
    'Any condition treated or changed in the last six months? That is what a pre-existing waiver hangs on, and the waiver usually has to be bought within days of your first deposit.',
    'Is it a cruise, and where does it sail? Time in international waters is time outside Medicare.',
];

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="bg-brand-mist pb-14 pt-[9rem] lg:pb-20 lg:pt-[11rem]">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:px-8">
    <div>
      <p class="eyebrow text-brand-ocean">Travel cover</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.4rem]">
        Your Medicare stops<br class="hidden sm:block"> at the <span class="text-brand-ocean">border.</span>
      </h1>
      <p class="mt-6 max-w-xl text-[1.15rem] leading-relaxed text-brand-slate">
        You spent your working life earning this trip. It would be a shame for a fall in Lisbon or
        a chest pain at sea to cost you the rest of your savings &mdash; and Original Medicare will
        not stop that from happening.
      </p>
      <a href="tel:<?= e($SITE['phone_raw']) ?>" class="mt-8 inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
        <?= icon('phone', 'h-5 w-5') ?> Call before you book
      </a>
    </div>

    <div class="relative">
      <div aria-hidden="true" class="absolute -inset-4 rotate-2 rounded-[2.5rem] bg-brand-foam"></div>
      <img src="assets/img/travel/couple-travel.jpg" width="1400" height="933" fetchpriority="high" decoding="async"
           alt="An older couple sitting on a bench looking out over the water"
           class="relative aspect-[3/2] w-full rounded-[2rem] object-cover shadow-lift">
    </div>
  </div>
</section>

<!-- ═════════════════ WHAT TRAVELS WITH YOU ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="grid items-end gap-8 lg:grid-cols-[1.1fr_.9fr]">
      <h2 class="font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.5rem]">
        What actually travels with you.
      </h2>
      <p class="text-[1.05rem] leading-relaxed text-brand-slate">
        Three different answers depending on what you hold. Most people assume the first one is
        better than it is.
      </p>
    </div>

    <div class="mt-10 grid gap-5 lg:grid-cols-3">
      <?php foreach ($abroad as $a): ?>
        <article class="flex flex-col rounded-[1.6rem] border <?= $a['tone'] === 'yes' ? 'border-2 border-brand-ocean' : 'border-brand-line' ?> bg-white p-7 shadow-soft">
          <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate"><?= e($a['tag']) ?></p>
          <h3 class="mt-2 font-display text-[1.4rem] font-bold leading-snug text-brand-navy"><?= e($a['name']) ?></h3>

          <p class="mt-4 inline-flex w-fit items-center gap-2 rounded-full px-3.5 py-1.5 text-[0.85rem] font-bold
                    <?= $a['tone'] === 'yes'   ? 'bg-brand-aqua text-brand-ocean' : '' ?>
                    <?= $a['tone'] === 'maybe' ? 'bg-brand-foam text-brand-ink'   : '' ?>
                    <?= $a['tone'] === 'stop'  ? 'bg-brand-ocean text-white'      : '' ?>">
            <?= icon($a['tone'] === 'stop' ? 'warning' : 'check', 'h-4 w-4', 2.4) ?>
            <?= e($a['verdict']) ?>
          </p>

          <p class="mt-4 leading-relaxed text-brand-slate"><?= e($a['body']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ THE CRUISE RULE ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[.95fr_1.05fr] lg:gap-16 lg:px-8">
    <img src="assets/img/travel/cruise.jpg" width="1400" height="933" loading="lazy" decoding="async"
         alt="A couple walking along a seafront promenade"
         class="aspect-[4/3] w-full rounded-[1.75rem] object-cover shadow-lift">

    <div>
      <p class="eyebrow text-brand-ocean">If you cruise</p>
      <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
        The six-hour rule nobody mentions at the travel agent.
      </h2>
      <p class="mt-5 text-[1.08rem] leading-relaxed text-brand-slate">
        Medicare may cover medically necessary care in a ship's infirmary while you are in United
        States territorial waters &mdash; broadly, when the ship is within six hours of a US port.
        Sail beyond that and you are on your own.
      </p>
      <p class="mt-4 text-[1.08rem] leading-relaxed text-brand-slate">
        The Caribbean itineraries most of my clients book spend a great deal of the week well past
        that line. It is the single most common gap I find, and the cheapest one to close.
      </p>
      <p class="mt-6 rounded-[1.4rem] border border-brand-ocean/20 bg-brand-aqua/50 p-6 leading-relaxed text-brand-ink">
        <strong class="font-semibold text-brand-navy">Worth doing:</strong> if you hold a Medigap
        Plan G or N, you already have some foreign emergency cover. Ring me before you sail and we
        will work out whether it is enough for that particular trip, or whether a short travel
        medical policy is worth the small cost.
      </p>
    </div>
  </div>
</section>

<!-- ═════════════════ WHAT TRAVEL COVER ADDS ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <h2 class="max-w-3xl font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.5rem]">
      What a travel policy adds.
    </h2>
    <p class="mt-4 max-w-2xl text-[1.05rem] leading-relaxed text-brand-slate">
      These are four separate things, sold together and often confused. The one that bankrupts
      people is the second.
    </p>

    <div class="mt-10 grid gap-5 sm:grid-cols-2">
      <?php foreach ($products as $p): ?>
        <article class="flex gap-5 rounded-[1.5rem] border border-brand-line bg-brand-mist p-7">
          <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-ocean text-white">
            <?= icon($p[0], 'h-5 w-5', 1.7) ?>
          </span>
          <div>
            <h3 class="font-display text-[1.2rem] font-bold leading-snug text-brand-navy"><?= $p[1] ?></h3>
            <p class="mt-2 leading-relaxed text-brand-slate"><?= e($p[2]) ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ BEFORE YOU BOOK ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:px-8">
    <div>
      <p class="eyebrow text-brand-ocean">Before you book</p>
      <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
        Four questions that decide the policy.
      </h2>
      <ol class="mt-8 space-y-5">
        <?php foreach ($before as $i => $q): ?>
          <li class="flex gap-4">
            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-ocean font-display text-[0.95rem] font-bold text-white"><?= $i + 1 ?></span>
            <p class="pt-1 leading-relaxed text-brand-slate"><?= e($q) ?></p>
          </li>
        <?php endforeach; ?>
      </ol>
      <p class="mt-7 font-semibold text-brand-ink">
        Timing matters more than price here. Ring me when the deposit goes down, not the week
        you fly.
      </p>
    </div>

    <img src="assets/img/travel/passport.jpg" width="1400" height="933" loading="lazy" decoding="async"
         alt="A passport and travel documents ready for a trip"
         class="aspect-[4/3] w-full rounded-[1.75rem] object-cover shadow-lift lg:sticky lg:top-32 lg:self-start">
  </div>
</section>


<!-- ═════════════════ FAQ ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto grid max-w-content gap-10 px-5 lg:grid-cols-[.8fr_1.2fr] lg:gap-16 lg:px-8">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <p class="eyebrow text-brand-ocean">Common questions</p>
      <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
        What people ask me before they travel.
      </h2>
      <p class="mt-5 leading-relaxed text-brand-slate">
        The questions that come up once the trip is booked &mdash; and one that is better asked before.
      </p>
      <a href="faq.php" class="group mt-6 inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
        Every question, in one place
        <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
          <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
        </span>
      </a>
    </div>

    <div class="space-y-3">
      <?php foreach ($faqGroups['Travel'] as $i => $f): ?>
        <details class="faq rounded-2xl border border-brand-line bg-brand-mist px-6 py-1 transition hover:border-brand-ocean/40 open:bg-white"<?= $i === 0 ? ' open' : '' ?>>
          <summary class="flex items-center justify-between gap-5 py-5 font-display text-[1.14rem] font-semibold leading-snug text-brand-navy">
            <span><?= e($f[0]) ?></span>
            <span class="faq-chevron grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-ocean text-white"><?= icon('chevron', 'h-5 w-5', 2.4) ?></span>
          </summary>
          <div class="pb-6 pr-10 leading-relaxed text-brand-slate"><?= e($f[1]) ?></div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ CLOSING ═════════════════ -->
<section class="border-t border-brand-line bg-white py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="flex flex-col items-start gap-7 rounded-[1.75rem] border border-brand-ocean/20 bg-brand-aqua/50 p-9 sm:flex-row sm:items-center sm:justify-between sm:p-11">
      <div>
        <h2 class="font-display text-[1.6rem] font-bold leading-snug text-brand-navy sm:text-[2rem]">
          Tell me where you are going.
        </h2>
        <p class="mt-3 max-w-xl leading-relaxed text-brand-slate">
          Dates, destination and what you already hold. Ten minutes on the phone and you will know
          exactly what is covered and what is not &mdash; before the deposit is spent.
        </p>
      </div>
      <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex shrink-0 items-center gap-3 rounded-full bg-brand-ocean px-8 py-4 text-[1.05rem] font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
        <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
      </a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
