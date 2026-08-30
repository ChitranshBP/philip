<?php
/**
 * Dental, Vision & Hearing — the cover Original Medicare leaves out.
 *
 * Photography: Unsplash (free licence).
 *   dentist.jpg   Filip Rankovic Grobgaard
 *   glasses.jpg   David Travis
 *   optician.jpg  Claudio Schwarz
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/inc/faqs.php';

$pageTitle = 'Dental, Vision & Hearing Cover — ' . $SITE['company'];
$pageDesc  = 'Original Medicare does not pay for routine dental, glasses or hearing aids. '
           . $SITE['agent_name'] . ' compares standalone dental, vision and hearing plans against '
           . 'Medicare Advantage extras for families in ' . $SITE['service_area'] . '.';

/* The three, and what a plan typically pays toward. */
$cover = [
    [
        'icon'  => 'sparkles',
        'name'  => 'Dental',
        'lead'  => 'The one people miss until a crown is quoted.',
        'items' => [
            'Cleanings, exams and X-rays, usually twice a year',
            'Fillings and extractions',
            'Crowns, bridges, root canals and dentures',
            'Some plans include implants at a higher tier',
        ],
    ],
    [
        'icon'  => 'eye',
        'name'  => 'Vision',
        'lead'  => 'Routine eye care, and the glasses that follow it.',
        'items' => [
            'An annual routine eye exam',
            'An allowance toward frames and lenses',
            'Contact lenses in place of glasses',
            'Discounts on upgrades and anti-glare coatings',
        ],
    ],
    [
        'icon'  => 'chat',
        'name'  => 'Hearing',
        'lead'  => 'Where the sticker shock is largest.',
        'items' => [
            'A hearing exam and fitting',
            'An allowance toward hearing aids, often per ear',
            'Follow-up adjustments and cleanings',
            'Batteries or charging kit on some plans',
        ],
    ],
];

/* Original Medicare does cover a few things people assume it does not. */
$exceptions = [
    ['Cataract surgery', 'Part B covers the surgery, and one pair of corrective glasses or contacts afterwards.'],
    ['Glaucoma and diabetic eye tests', 'Covered annually if you are considered high risk or you have diabetes.'],
    ['Dental in hospital', 'Covered only in narrow cases — for example an exam required before certain surgeries, or a jaw injury.'],
    ['Cochlear implants', 'Covered as a prosthetic device. Ordinary hearing aids are not.'],
];

/* What actually decides whether a plan is good value. */
$checks = [
    ['calendar', 'Waiting periods',   'Major work — crowns, bridges, dentures — often waits six to twelve months from your start date. Cleanings usually do not.'],
    ['wallet',   'The annual maximum','Most dental plans cap what they pay in a year. A low premium with a low cap can be worse value than the reverse.'],
    ['search',   'Your dentist',      'In-network costs less, and out-of-network sometimes costs everything. I check your dentist before you sign.'],
    ['warning',  'Missing-tooth clauses','Some plans will not pay toward replacing a tooth you had already lost when the policy started. Worth knowing up front.'],
];

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="bg-brand-mist pb-14 pt-[9rem] lg:pb-20 lg:pt-[11rem]">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:px-8">
    <div>
      <p class="eyebrow text-brand-ocean">Dental, vision &amp; hearing</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.4rem]">
        The three things<br class="hidden sm:block"> Medicare <span class="text-brand-ocean">leaves out.</span>
      </h1>
      <p class="mt-6 max-w-xl text-[1.15rem] leading-relaxed text-brand-slate">
        Original Medicare does not pay for a cleaning, a pair of glasses or a hearing aid. For most
        people those are the bills that actually arrive each year &mdash; so let us cover them
        properly rather than hope.
      </p>
      <a href="tel:<?= e($SITE['phone_raw']) ?>" class="mt-8 inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
        <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
      </a>
    </div>

    <div class="relative">
      <div aria-hidden="true" class="absolute -inset-4 -rotate-2 rounded-[2.5rem] bg-brand-foam"></div>
      <img src="assets/img/dental/dentist.jpg" width="1400" height="2100" fetchpriority="high" decoding="async"
           alt="A dentist examining a patient during a routine check-up"
           class="relative aspect-[4/3] w-full rounded-[2rem] object-cover shadow-lift">
    </div>
  </div>
</section>

<!-- ═════════════════ THE THREE ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="grid items-end gap-8 lg:grid-cols-[1.1fr_.9fr]">
      <h2 class="font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.5rem]">
        What a good plan actually pays for.
      </h2>
      <p class="text-[1.05rem] leading-relaxed text-brand-slate">
        Every carrier words it differently. These are the benefits worth looking for, and the ones
        I check line by line before I recommend anything.
      </p>
    </div>

    <div class="mt-10 grid gap-5 lg:grid-cols-3">
      <?php foreach ($cover as $c): ?>
        <article class="flex flex-col rounded-[1.6rem] border border-brand-line bg-brand-mist p-7 transition hover:-translate-y-1 hover:shadow-soft">
          <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-ocean text-white">
            <?= icon($c['icon'], 'h-6 w-6', 1.7) ?>
          </span>
          <h3 class="mt-5 font-display text-[1.5rem] font-bold leading-snug text-brand-navy"><?= e($c['name']) ?></h3>
          <p class="mt-1.5 font-semibold text-brand-ocean"><?= e($c['lead']) ?></p>
          <ul class="mt-5 space-y-3">
            <?php foreach ($c['items'] as $it): ?>
              <li class="flex gap-3 text-[0.99rem] leading-relaxed text-brand-slate">
                <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-aqua text-brand-ocean"><?= icon('check', 'h-3.5 w-3.5', 3.2) ?></span>
                <?= e($it) ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ TWO WAYS TO GET IT ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <h2 class="max-w-3xl font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.5rem]">
      Two ways to get it &mdash; and they are not equal.
    </h2>

    <div class="mt-9 grid gap-5 md:grid-cols-2">
      <div class="rounded-[1.6rem] border-2 border-brand-ocean bg-white p-8">
        <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-ocean">Option one</p>
        <h3 class="mt-2 font-display text-[1.5rem] font-bold leading-snug text-brand-navy">A standalone dental, vision &amp; hearing plan</h3>
        <p class="mt-4 leading-relaxed text-brand-slate">
          Bought separately and kept whatever happens to your Medicare. Higher annual maximums, a
          wider choice of dentists, and it does not vanish if you change Medicare plans in the
          autumn. You pay a monthly premium for it.
        </p>
        <p class="mt-5 font-semibold text-brand-ocean">Best if you have a dentist you intend to keep.</p>
      </div>

      <div class="rounded-[1.6rem] border border-brand-line bg-white p-8">
        <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate">Option two</p>
        <h3 class="mt-2 font-display text-[1.5rem] font-bold leading-snug text-brand-navy">The extras inside a Medicare Advantage plan</h3>
        <p class="mt-4 leading-relaxed text-brand-slate">
          Many Advantage plans fold in a dental, vision and hearing allowance at no extra premium.
          Genuinely useful &mdash; but the allowance is usually capped, the network is the plan's
          own, and it can be re-drawn every January along with the rest of the plan.
        </p>
        <p class="mt-5 font-semibold text-brand-ocean">Best if the allowance covers what you actually use.</p>
      </div>
    </div>

    <p class="mt-6 rounded-[1.4rem] border border-brand-ocean/20 bg-brand-aqua/50 p-6 leading-relaxed text-brand-ink">
      <strong class="font-semibold text-brand-navy">The honest answer:</strong> for someone who has
      two cleanings a year and nothing else, the Advantage extras are usually plenty. For someone
      facing a crown, a bridge or hearing aids, a standalone plan almost always wins. I will price
      both against what you actually expect to need.
    </p>
  </div>
</section>

<!-- ═════════════════ WHAT MEDICARE DOES COVER ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[.9fr_1.1fr] lg:gap-16 lg:px-8">
    <div>
      <img src="assets/img/dental/glasses.jpg" width="1400" height="933" loading="lazy" decoding="async"
           alt="A pair of glasses held up against an eye chart"
           class="aspect-[4/3] w-full rounded-[1.75rem] object-cover shadow-lift">
    </div>

    <div>
      <p class="eyebrow text-brand-ocean">The exceptions</p>
      <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
        Four things Medicare <span class="mark-sun">does</span> cover.
      </h2>
      <p class="mt-4 leading-relaxed text-brand-slate">
        People assume none of it is covered, then pay out of pocket for something they were entitled
        to. These are the exceptions worth knowing.
      </p>

      <dl class="mt-7 divide-y divide-brand-line border-y border-brand-line">
        <?php foreach ($exceptions as $x): ?>
          <div class="grid gap-1 py-5 sm:grid-cols-[13rem_1fr] sm:gap-6">
            <dt class="font-display text-[1.08rem] font-bold leading-snug text-brand-navy"><?= e($x[0]) ?></dt>
            <dd class="leading-relaxed text-brand-slate"><?= e($x[1]) ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </div>
  </div>
</section>

<!-- ═════════════════ WHAT TO CHECK ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <h2 class="max-w-3xl font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.5rem]">
      Four things I check before I let you sign.
    </h2>

    <div class="mt-9 grid gap-5 sm:grid-cols-2">
      <?php foreach ($checks as $c): ?>
        <article class="rounded-[1.5rem] bg-white p-7 shadow-soft">
          <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-aqua text-brand-ocean">
            <?= icon($c[0], 'h-5 w-5', 1.7) ?>
          </span>
          <h3 class="mt-4 font-display text-[1.2rem] font-bold leading-snug text-brand-navy"><?= e($c[1]) ?></h3>
          <p class="mt-2 leading-relaxed text-brand-slate"><?= e($c[2]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═════════════════ FAQ ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto grid max-w-content gap-10 px-5 lg:grid-cols-[.8fr_1.2fr] lg:gap-16 lg:px-8">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <p class="eyebrow text-brand-ocean">Common questions</p>
      <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
        What people ask me about dental and vision.
      </h2>
      <p class="mt-5 leading-relaxed text-brand-slate">
        The short answers. If yours is not here, ring me &mdash; no question is too small.
      </p>
      <a href="faq.php" class="group mt-6 inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
        Every question, in one place
        <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
          <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
        </span>
      </a>
    </div>

    <div class="space-y-3">
      <?php foreach ($faqGroups['Dental, vision & hearing'] as $i => $f): ?>
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
  <div class="mx-auto grid max-w-content items-center gap-10 px-5 lg:grid-cols-[1fr_.75fr] lg:gap-16 lg:px-8">
    <div>
      <h2 class="font-display text-[1.8rem] font-bold leading-[1.12] tracking-tight text-brand-navy sm:text-[2.3rem]">
        Bring me the dentist you want to keep.
      </h2>
      <p class="mt-5 text-[1.08rem] leading-relaxed text-brand-slate">
        Tell me who you see, what work you expect, and whether you wear glasses or hearing aids.
        I will come back with what each route would actually cost you across a year &mdash; and if
        your Advantage plan already covers it, I will tell you that too.
      </p>
      <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-4">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
        </a>
        <a href="medicare-101.php" class="group inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
          How Medicare fits around it
          <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
            <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
          </span>
        </a>
      </div>
    </div>
    <img src="assets/img/dental/optician.jpg" width="1400" height="933" loading="lazy" decoding="async"
         alt="Frames on display in an optician's shop"
         class="aspect-[4/3] w-full rounded-[1.75rem] object-cover shadow-lift">
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
