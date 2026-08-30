<?php
/**
 * Medicare 101 — the long-form guide the home page links into.
 *
 * Anchors #part-a … #part-d are linked from the home page cards; do not
 * rename them. Content lives in inc/medicare.php so the teaser and this
 * page can never drift apart.
 *
 * Photography: Unsplash (free licence).
 *   consult.jpg   Vitaly Gariev
 *   care.jpg      Vitaly Gariev
 *   pharmacy.jpg  Towfiqu barbhuiya
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/inc/medicare.php';

$pageTitle = 'Medicare 101 — Parts A, B, C and D explained | ' . $SITE['company'];
$pageDesc  = 'Parts A, B, C and D in plain English: what each covers, what you pay, when to '
           . 'enrol, and the two roads you can take. From ' . $SITE['agent_name'] . ', a licensed '
           . 'agent in ' . $SITE['address']['city'] . '.';

/* The sticky rail. Keys are anchors, values are labels. */
$rail = [
    'part-a'   => 'Part A · Hospital',
    'part-b'   => 'Part B · Medical',
    'part-c'   => 'Part C · Advantage',
    'part-d'   => 'Part D · Drugs',
    'roads'    => 'The two roads',
    'drug-year'=> 'A year of prescriptions',
    'gaps'     => 'What is not covered',
    'compare'  => 'Advantage vs Medigap',
    'medigap'  => 'Which Medigap letter',
];

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="bg-brand-mist pb-14 pt-[9rem] lg:pb-20 lg:pt-[11rem]">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:px-8">
    <div>
      <p class="eyebrow text-brand-ocean">Medicare 101</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.4rem]">
        Four letters.<br class="hidden sm:block"> <span class="text-brand-ocean">Ninety seconds each.</span>
      </h1>
      <p class="mt-6 max-w-xl text-[1.15rem] leading-relaxed text-brand-slate">
        Everyone starts with Original Medicare &mdash; Parts A and B. From there you take one road,
        and that single choice shapes every cost that follows. Here is the whole thing, without
        the jargon.
      </p>

      <div class="mt-8 flex flex-wrap gap-2">
        <?php foreach ($parts as $p): ?>
          <a href="#part-<?= e(strtolower($p['letter'])) ?>"
             class="inline-flex items-center gap-2 rounded-full border border-brand-line bg-white px-4 py-2.5 font-bold text-brand-navy transition hover:border-brand-ocean hover:text-brand-ocean">
            <span class="grid h-6 w-6 place-items-center rounded-lg bg-brand-ocean text-[0.8rem] text-white"><?= e($p['letter']) ?></span>
            <?= e($p['name']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="relative">
      <div aria-hidden="true" class="absolute -inset-4 rotate-2 rounded-[2.5rem] bg-brand-foam"></div>
      <img src="assets/img/medicare/consult.jpg" width="1400" height="933" fetchpriority="high" decoding="async"
           alt="A doctor checking a patient's blood pressure during an appointment"
           class="relative aspect-[3/2] w-full rounded-[2rem] object-cover shadow-lift">
    </div>
  </div>
</section>

<!-- ═════════════════ THE GUIDE ═════════════════ -->
<section class="bg-white py-14 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[.28fr_.72fr] lg:gap-14 lg:px-8">

    <!-- Sticky rail -->
    <nav aria-label="On this page" class="lg:sticky lg:top-32 lg:self-start">
      <p class="text-[0.78rem] font-bold uppercase tracking-[0.16em] text-brand-slate">On this page</p>
      <ul class="mt-4 space-y-0.5">
        <?php foreach ($rail as $id => $label): ?>
          <li>
            <a href="#<?= e($id) ?>" class="rail-link block rounded-xl px-3 py-2 text-[0.98rem] font-semibold text-brand-slate transition hover:bg-brand-mist hover:text-brand-ocean">
              <?= e($label) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="mt-7 rounded-[1.4rem] border border-brand-ocean/20 bg-brand-aqua/50 p-6">
        <p class="font-display text-[1.1rem] font-bold leading-snug text-brand-navy">Rather just ask?</p>
        <p class="mt-2 text-[0.96rem] leading-relaxed text-brand-slate">
          Twenty minutes on the phone beats an hour of reading.
        </p>
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="mt-4 inline-flex items-center gap-2 rounded-full bg-brand-ocean px-5 py-3 font-bold text-white transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-[1.1rem] w-[1.1rem]') ?> <?= e($SITE['phone']) ?>
        </a>
      </div>
    </nav>

    <!-- Body -->
    <div class="min-w-0 space-y-16">

      <!-- The four parts -->
      <?php foreach ($parts as $p): ?>
        <article id="part-<?= e(strtolower($p['letter'])) ?>" class="scroll-mt-32">
          <div class="flex items-start gap-5">
            <span class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-brand-ocean font-display text-2xl font-bold text-white">
              <?= e($p['letter']) ?>
            </span>
            <div>
              <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-ocean">
                Part <?= e($p['letter']) ?> &middot; <?= e($p['tag']) ?>
              </p>
              <h2 class="mt-1 font-display text-[1.7rem] font-bold leading-tight tracking-tight text-brand-navy sm:text-[2.1rem]">
                <?= e($p['name']) ?>
              </h2>
            </div>
          </div>

          <p class="mt-5 font-display text-[1.25rem] font-semibold leading-snug text-brand-navy sm:text-[1.4rem]">
            <?= e($p['lead']) ?>
          </p>

          <dl class="mt-7 grid gap-x-8 gap-y-5 border-y border-brand-line py-6 sm:grid-cols-3">
            <?php foreach ($p['facts'] as $f): ?>
              <div>
                <dt class="text-[0.75rem] font-bold uppercase tracking-[0.13em] text-brand-ocean"><?= e($f[0]) ?></dt>
                <dd class="mt-1.5 text-[1rem] font-medium leading-snug text-brand-navy"><?= e($f[1]) ?></dd>
              </div>
            <?php endforeach; ?>
          </dl>

          <div class="mt-7 grid gap-8 md:grid-cols-2">
            <div>
              <h3 class="flex items-center gap-2 text-[0.82rem] font-bold uppercase tracking-[0.14em] text-brand-ocean">
                <?= icon('check', 'h-4 w-4', 3) ?> What it covers
              </h3>
              <ul class="mt-4 space-y-3">
                <?php foreach ($p['covers'] as $c): ?>
                  <li class="flex gap-3 leading-relaxed text-brand-slate">
                    <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-aqua text-brand-ocean"><?= icon('check', 'h-3.5 w-3.5', 3.2) ?></span>
                    <?= e($c) ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="rounded-[1.4rem] bg-brand-mist p-6">
              <h3 class="flex items-center gap-2 text-[0.82rem] font-bold uppercase tracking-[0.14em] text-brand-ocean">
                <?= icon('bulb', 'h-4 w-4') ?> What the brochure leaves out
              </h3>
              <p class="mt-3 leading-relaxed text-brand-ink"><?= e($p['watch']) ?></p>
            </div>
          </div>
        </article>
      <?php endforeach; ?>

      <!-- Two roads -->
      <article id="roads" class="scroll-mt-32">
        <h2 class="font-display text-[1.7rem] font-bold leading-tight tracking-tight text-brand-navy sm:text-[2.1rem]">
          Then you choose one road, <span class="mark-sun">never both.</span>
        </h2>
        <p class="mt-4 leading-relaxed text-brand-slate">
          You cannot hold a Medicare Advantage plan and a Medigap policy at the same time. This is
          the decision everything else follows from.
        </p>

        <div class="mt-7 grid gap-5 md:grid-cols-2">
          <?php foreach ($roads as $r): ?>
            <div class="rounded-[1.5rem] border border-brand-line bg-brand-mist p-7">
              <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-ocean"><?= e($r['label']) ?></p>
              <h3 class="mt-2 font-display text-[1.35rem] font-bold leading-snug text-brand-navy"><?= e($r['title']) ?></h3>
              <ul class="mt-5 space-y-3">
                <?php foreach ($r['items'] as $it): ?>
                  <li class="flex gap-3 leading-relaxed text-brand-slate">
                    <span class="mt-[.55rem] h-1.5 w-1.5 shrink-0 rounded-full bg-brand-ocean"></span><?= e($it) ?>
                  </li>
                <?php endforeach; ?>
              </ul>
              <p class="mt-5 font-semibold text-brand-ocean"><?= e($r['note']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </article>

      <!-- A year of prescriptions -->
      <article id="drug-year" class="scroll-mt-32">
        <h2 class="font-display text-[1.7rem] font-bold leading-tight tracking-tight text-brand-navy sm:text-[2.1rem]">
          What a year of prescriptions actually looks like.
        </h2>
        <p class="mt-4 leading-relaxed text-brand-slate">
          Part D does not charge you the same amount every month. It moves through stages, and
          knowing where you are explains almost every surprise at the pharmacy counter.
        </p>

        <img src="assets/img/medicare/pharmacy.jpg" width="1400" height="933" loading="lazy" decoding="async"
             alt="Prescription tablets beside an open pill bottle"
             class="mt-7 aspect-[21/9] w-full rounded-[1.5rem] object-cover">

        <ol class="mt-7 grid gap-6 md:grid-cols-3">
          <?php foreach ($drugStages as $st): ?>
            <li class="border-t-[3px] border-brand-ocean pt-5">
              <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-ocean"><?= e($st[0]) ?></p>
              <h3 class="mt-2 font-display text-[1.2rem] font-bold leading-snug text-brand-navy"><?= e($st[1]) ?></h3>
              <p class="mt-2 text-[0.99rem] leading-relaxed text-brand-slate"><?= e($st[2]) ?></p>
            </li>
          <?php endforeach; ?>
        </ol>

        <p class="mt-6 rounded-[1.4rem] bg-brand-mist p-6 leading-relaxed text-brand-ink">
          <strong class="font-semibold text-brand-navy">Worth knowing:</strong> you can ask to spread
          your drug costs evenly across the year through the Medicare Prescription Payment Plan
          rather than absorbing a large bill in January. Almost nobody is told about it. I will tell
          you whether it is worth doing in your case.
        </p>
      </article>

      <!-- Gaps -->
      <article id="gaps" class="scroll-mt-32">
        <h2 class="font-display text-[1.7rem] font-bold leading-tight tracking-tight text-brand-navy sm:text-[2.1rem]">
          Four things Medicare simply will not pay for.
        </h2>
        <div class="mt-7 grid gap-5 sm:grid-cols-2">
          <?php foreach ($gaps as $g): ?>
            <div class="rounded-[1.4rem] border border-brand-line bg-white p-6">
              <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-aqua text-brand-ocean"><?= icon($g[0], 'h-5 w-5', 1.7) ?></span>
              <h3 class="mt-4 font-display text-[1.15rem] font-bold leading-snug text-brand-navy"><?= e($g[1]) ?></h3>
              <p class="mt-2 text-[0.99rem] leading-relaxed text-brand-slate"><?= e($g[2]) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </article>

      <!-- Comparison -->
      <article id="compare" class="scroll-mt-32">
        <h2 class="font-display text-[1.7rem] font-bold leading-tight tracking-tight text-brand-navy sm:text-[2.1rem]">
          The same table I walk clients through.
        </h2>
        <div class="mt-7 overflow-x-auto rounded-[1.5rem] border border-brand-line">
          <table class="w-full min-w-[42rem] border-collapse bg-white text-left">
            <caption class="sr-only">Medicare Advantage compared with a Medicare Supplement</caption>
            <thead>
              <tr class="bg-brand-ocean text-white">
                <th scope="col" class="w-1/4 px-5 py-4">&nbsp;</th>
                <th scope="col" class="px-5 py-4 font-display text-[1.05rem] font-semibold">Medicare Advantage <span class="block text-[0.85rem] font-normal text-white/80">Part C</span></th>
                <th scope="col" class="px-5 py-4 font-display text-[1.05rem] font-semibold">Medicare Supplement <span class="block text-[0.85rem] font-normal text-white/80">Medigap</span></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($compare as $i => $row): ?>
                <tr class="<?= $i % 2 ? 'bg-brand-mist' : 'bg-white' ?> border-t border-brand-line">
                  <th scope="row" class="px-5 py-4 align-top font-semibold text-brand-navy"><?= e($row[0]) ?></th>
                  <td class="px-5 py-4 align-top text-brand-slate"><?= e($row[1]) ?></td>
                  <td class="px-5 py-4 align-top text-brand-slate"><?= e($row[2]) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </article>

      <!-- Medigap letters -->
      <article id="medigap" class="scroll-mt-32">
        <h2 class="font-display text-[1.7rem] font-bold leading-tight tracking-tight text-brand-navy sm:text-[2.1rem]">
          Which Medigap letter should you buy?
        </h2>
        <p class="mt-4 leading-relaxed text-brand-slate">
          Every Medigap of the same letter is identical whichever private carrier sells it &mdash;
          the letter sets the coverage. So the real question is who is charging least for it this
          year, and that is the part I do for you.
        </p>

        <div class="mt-7 grid gap-5 md:grid-cols-3">
          <div class="rounded-[1.4rem] border-2 border-brand-ocean bg-white p-6">
            <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-ocean">Most people</p>
            <h3 class="mt-2 font-display text-[1.6rem] font-bold text-brand-navy">Plan G</h3>
            <p class="mt-2 text-[0.99rem] leading-relaxed text-brand-slate">
              Covers everything Original Medicare leaves except the Part B deductible. The practical
              top choice today.
            </p>
          </div>
          <div class="rounded-[1.4rem] border border-brand-line bg-white p-6">
            <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate">Lower premium</p>
            <h3 class="mt-2 font-display text-[1.6rem] font-bold text-brand-navy">Plan N</h3>
            <p class="mt-2 text-[0.99rem] leading-relaxed text-brand-slate">
              Costs less each month in exchange for small copays at the point of care.
            </p>
          </div>
          <div class="rounded-[1.4rem] border border-brand-line bg-brand-mist p-6">
            <p class="text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate">Closed to new enrollees</p>
            <h3 class="mt-2 font-display text-[1.6rem] font-bold text-brand-navy">Plan F</h3>
            <p class="mt-2 text-[0.99rem] leading-relaxed text-brand-slate">
              Covers every deductible and coinsurance, but only if you became eligible for Medicare
              <strong class="font-semibold text-brand-navy">before 1 January 2020</strong>.
            </p>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ═════════════════ CLOSING ═════════════════ -->
<section class="border-t border-brand-line bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto grid max-w-content items-center gap-10 px-5 lg:grid-cols-[1fr_.8fr] lg:gap-16 lg:px-8">
    <div>
      <h2 class="font-display text-[1.8rem] font-bold leading-[1.12] tracking-tight text-brand-navy sm:text-[2.3rem]">
        Reading about it only gets you so far.
      </h2>
      <p class="mt-5 text-[1.08rem] leading-relaxed text-brand-slate">
        No two situations are the same. Bring me your doctors, your prescriptions and your budget,
        and almost every time one plan rises to the top as the clear fit.
      </p>
      <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-4">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
        </a>
        <a href="faq.php" class="group inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
          Read the questions page
          <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
            <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
          </span>
        </a>
      </div>
    </div>
    <img src="assets/img/medicare/care.jpg" width="1400" height="985" loading="lazy" decoding="async"
         alt="A doctor talking a patient through their options"
         class="aspect-[4/3] w-full rounded-[1.75rem] object-cover shadow-lift">
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
