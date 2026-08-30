<?php
/**
 * About Trucare — Philip's full story.
 *
 * Photography: Unsplash (free licence, attribution appreciated).
 *   couple-park.jpg     Esther Ann        unsplash.com/photos/…-efa173293080
 *   couple-home.jpg     Hector Reyes      unsplash.com/photos/…-0a7b0cdf3d5d
 *   sarasota-coast.jpg  Josiah Gibbs      unsplash.com/photos/…-ac68f8fbb40b
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/inc/faqs.php';

$pageTitle = 'About ' . $SITE['company'] . ' — ' . $SITE['tagline'];
$pageDesc  = 'Philip Smith came to the United States from South Africa in 2000 with no safety net. '
           . 'Fifteen years later he runs ' . $SITE['company'] . ' in ' . $SITE['address']['city']
           . ', helping families through Medicare without jargon or pressure.';

/* Numbers that appear in the facts strip. */
$facts = [
    [$SITE['years'] . '+',        'Years guiding families through Medicare'],
    [$SITE['carriers'] . '+',     'Carriers compared, so nobody steers you'],
    ['7',                         'Days a week you can reach me'],
    ['$0',                        'What my help costs you, ever'],
];

/* What Philip actually handles — the full list, not the home page four. */
$lines = [
    ['shield',   'Medicare Advantage & Supplements', 'Part C, Medigap letters A through N, and an honest comparison of both roads.'],
    ['pills',    'Prescription Drug Plans',          'Your exact medication list priced against every formulary in your ZIP.'],
    ['sparkles', 'Dental, Vision & Hearing',         'The cleanings, glasses and hearing aids Original Medicare will not pay for.'],
    ['heart',    'Life & Final Expense',             'Term, whole and guaranteed-issue cover, including no-medical-exam options.'],
    ['badge',    'Annuities & Retirement Income',    'Fixed, immediate and deferred — a paycheck that does not run out.'],
    ['plane',    'Travel & Indemnity',               'Cover that travels with you, plus hospital indemnity and cancer plans.'],
];

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="relative overflow-hidden bg-brand-mist pb-16 pt-[9rem] lg:pb-24 lg:pt-[11rem]">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:px-8">

    <div>
      <p class="eyebrow text-brand-ocean">About us</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.5rem]">
        I know what it feels like<br class="hidden sm:block"> to be <span class="text-brand-ocean">lost.</span>
      </h1>
      <p class="mt-6 max-w-xl text-[1.15rem] leading-relaxed text-brand-slate">
        That is not the usual opening line from an insurance broker. It is the reason
        <?= e($SITE['company']) ?> exists, and the reason nobody here will ever hand you a
        brochure and wish you well.
      </p>

      <div class="mt-8 flex flex-wrap items-center gap-4">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
        </a>
        <p class="text-[0.95rem] font-semibold text-brand-slate">
          <?= e($SITE['hours']) ?> &middot; <?= e($SITE['hours_note']) ?>
        </p>
      </div>
    </div>

    <div class="relative">
      <div aria-hidden="true" class="absolute -inset-4 -rotate-2 rounded-[2.5rem] bg-brand-foam"></div>
      <img src="assets/img/about/couple-park.jpg" width="1600" height="1064" fetchpriority="high" decoding="async"
           alt="An older couple together on the shoreline"
           class="relative aspect-[4/3] w-full rounded-[2rem] object-cover shadow-lift">
    </div>
  </div>
</section>

<!-- ═════════════════ FACTS ═════════════════ -->
<section class="border-y border-brand-line bg-white py-10">
  <dl class="mx-auto grid max-w-content grid-cols-2 gap-x-8 gap-y-9 px-5 lg:grid-cols-4 lg:px-8">
    <?php foreach ($facts as $f): ?>
      <div>
        <dt class="font-display text-[2.6rem] font-bold leading-none tracking-tight text-brand-ocean"><?= e($f[0]) ?></dt>
        <dd class="mt-2.5 text-[0.98rem] leading-snug text-brand-slate"><?= e($f[1]) ?></dd>
      </div>
    <?php endforeach; ?>
  </dl>
</section>

<!-- ═════════════════ THE STORY ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-24">
  <div class="mx-auto max-w-content px-5 lg:px-8">

    <div class="grid gap-12 lg:grid-cols-[.85fr_1.15fr] lg:gap-16">

      <div class="lg:sticky lg:top-32 lg:self-start">
        <img src="<?= e($portraitAbout ?? 'assets/bg-hero/philip.png') ?>" width="1080" height="1350" loading="lazy" decoding="async"
             alt="Philip Smith, owner of <?= e($SITE['company']) ?>"
             class="w-full rounded-[2rem] bg-white object-cover object-top shadow-lift">
        <p class="mt-6 font-hand text-[2.4rem] leading-none text-brand-ocean"><?= e($SITE['agent_name']) ?></p>
        <p class="mt-1 text-[0.95rem] font-semibold text-brand-slate">
          Owner, <?= e($SITE['company']) ?><br><?= e($SITE['license']) ?>
        </p>
      </div>

      <div>
        <p class="eyebrow text-brand-ocean">In Philip's own words</p>
        <h2 class="mt-4 font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.6rem]">
          A real person, <span class="mark-sun">not a brochure.</span>
        </h2>

        <div class="mt-8 space-y-6 text-[1.1rem] leading-relaxed text-brand-slate">
          <p>
            I want to start with something that might surprise you coming from an insurance broker:
            I got into this work because I know what it feels like to be lost.
          </p>
          <p>
            I came to the United States from South Africa in the year 2000 with no formal
            qualifications and no safety net. I had to figure everything out on my own, in a country
            I was still learning. That experience never left me. So when I sit across from a senior
            who feels confused and a little overwhelmed about their Medicare choices, I understand
            that feeling from the inside. That is why I do this work, and why I do it the way I do.
          </p>
          <p>
            My name is <strong class="font-semibold text-brand-navy"><?= e($SITE['agent_name']) ?></strong>,
            and I own <?= e($SITE['company']) ?>, based in <?= e($SITE['address']['city']) ?>, Florida.
            I have been helping people navigate Medicare for <?= e($SITE['years']) ?> years. In that
            time I have helped clients choose between Medicare Advantage plans, Medicare Supplements,
            Prescription Drug Plans, Special Needs Plans, indemnity plans, cancer plans and fixed
            annuities. The product list is long. But the real work is always the same: helping a
            person feel confident about a decision that matters to their health and their future.
          </p>
        </div>

        <figure class="my-10 rounded-[1.6rem] border-l-[4px] border-brand-ocean bg-white p-7 shadow-soft sm:p-9">
          <blockquote class="font-display text-[1.35rem] font-semibold leading-snug text-brand-navy sm:text-[1.55rem]">
            &ldquo;One thing my clients tell me often is that I make Medicare feel manageable for the
            first time. That is the goal every single time.&rdquo;
          </blockquote>
        </figure>

        <div class="space-y-6 text-[1.1rem] leading-relaxed text-brand-slate">
          <p>
            Medicare is not simple. The rules change every year. The plans change. What was right for
            you last year may not be the right fit today. My job is to stay on top of all of that so
            you do not have to. When you call me, I am not going to hand you a brochure and wish you
            well. I am going to sit with you, ask the right questions, and make sure the plan we land
            on actually fits your life.
          </p>
          <p>
            I am available seven days a week. A call is always the best way to reach me, and if I do
            not pick up, it is because I am with another client. I will get back to you. That is a
            promise I have kept for <?= e($SITE['years']) ?> years, and I intend to keep it.
          </p>
          <p>
            Most of my new clients come to me through referrals. Someone who trusted me told someone
            they care about to call me. That is the highest compliment I know. It tells me the people
            I serve feel good enough about their experience to put their name behind it. I do not
            take that lightly.
          </p>
          <p class="font-semibold text-brand-ink">
            If you are coming onto Medicare for the first time, or you are wondering whether your
            current plan is still the right one, give me a call. No jargon. No pressure. Just a real
            conversation with someone who genuinely wants to help.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═════════════════ WHAT I HANDLE ═════════════════ -->
<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto max-w-content px-5 lg:px-8">

    <div class="grid items-end gap-8 lg:grid-cols-[1.1fr_.9fr]">
      <div>
        <p class="eyebrow text-brand-ocean">All under one roof</p>
        <h2 class="mt-4 font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.6rem]">
          One agent for the whole picture.
        </h2>
      </div>
      <p class="text-[1.08rem] leading-relaxed text-brand-slate">
        Because I am independent, I am not quietly steering you toward one company's product.
        I compare what is genuinely available where you live and tell you what I would tell
        my own family.
      </p>
    </div>

    <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($lines as $l): ?>
        <article class="rounded-[1.5rem] border border-brand-line bg-brand-mist p-6 transition hover:-translate-y-1 hover:shadow-soft">
          <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-ocean text-white">
            <?= icon($l[0], 'h-5 w-5', 1.7) ?>
          </span>
          <h3 class="mt-5 font-display text-[1.16rem] font-bold leading-snug text-brand-navy"><?= e($l[1]) ?></h3>
          <p class="mt-2 text-[0.99rem] leading-relaxed text-brand-slate"><?= e($l[2]) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ WHERE I WORK ═════════════════ -->
<section class="relative isolate flex min-h-[24rem] items-end overflow-hidden lg:min-h-[30rem]">
  <img src="assets/img/about/sarasota-coast.jpg" width="1600" height="899" loading="lazy" decoding="async"
       alt="The Ringling Bridge over Sarasota Bay"
       class="absolute inset-0 -z-10 h-full w-full object-cover">

  <div class="mx-auto w-full max-w-content px-5 pb-10 pt-24 lg:px-8 lg:pb-14">
    <div class="max-w-xl rounded-[1.75rem] bg-white p-8 shadow-lift sm:p-10">
      <p class="eyebrow text-brand-ocean">Where I work</p>
      <p class="mt-4 font-display text-[1.6rem] font-bold leading-tight text-brand-navy sm:text-[1.95rem]">
        <?= e($SITE['address']['city']) ?> and the Suncoast &mdash; at your table, or on the phone.
      </p>
      <p class="mt-4 leading-relaxed text-brand-slate">
        I serve <?= e($SITE['service_area']) ?>. Home, my office, phone or video, whichever
        suits you. Bring your spouse, your daughter, and every letter you have been sent.
      </p>
    </div>
  </div>
</section>

<!-- ═════════════════ WORKING WITH PHILIP — FAQ ═════════════════ -->
<section class="bg-white py-16 lg:py-24">
  <div class="mx-auto grid max-w-content gap-10 px-5 lg:grid-cols-[.8fr_1.2fr] lg:gap-16 lg:px-8">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <p class="eyebrow text-brand-ocean">Before you call</p>
      <h2 class="mt-4 font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.4rem]">
        What working with me <span class="mark-sun">looks like.</span>
      </h2>
      <p class="mt-5 text-[1.08rem] leading-relaxed text-brand-slate">
        The questions people ask before they pick up the phone. The Medicare
        mechanics &mdash; eligibility, enrolment windows, penalties, Medigap letters
        &mdash; all live on the questions page.
      </p>
      <a href="faq.php" class="group mt-6 inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
        Read every question
        <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
          <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
        </span>
      </a>
    </div>

    <div class="space-y-3">
      <?php foreach ($faqGroups['Working with me'] as $i => $f): ?>
        <details class="faq rounded-2xl border border-brand-line bg-brand-mist px-6 py-1 transition hover:border-brand-ocean/40 open:bg-white"<?= $i === 0 ? ' open' : '' ?>>
          <summary class="flex items-center justify-between gap-5 py-5 font-display text-[1.14rem] font-semibold leading-snug text-brand-navy">
            <span><?= e($f[0]) ?></span>
            <span class="faq-chevron grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-ocean text-white"><?= icon('chevron', 'h-5 w-5', 2.4) ?></span>
          </summary>
          <div class="pb-6 pr-10 leading-relaxed text-brand-slate"><?= e($f[1]) ?></div>
        </details>
      <?php endforeach; ?>

      <?php /* Two from elsewhere that people ask about Philip, not about Medicare. */ ?>
      <?php foreach ([$faqGroups['Getting started'][3], $faqGroups['Choosing a plan'][0]] as $f): ?>
        <details class="faq rounded-2xl border border-brand-line bg-brand-mist px-6 py-1 transition hover:border-brand-ocean/40 open:bg-white">
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

<!-- ═════════════════ CLOSING CTA ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-24">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="flex flex-col items-start gap-7 rounded-[1.75rem] border border-brand-ocean/20 bg-brand-aqua/50 p-9 sm:flex-row sm:items-center sm:justify-between sm:p-11">
      <div>
        <h2 class="font-display text-[1.6rem] font-bold leading-snug text-brand-navy sm:text-[2rem]">
          <?= e($SITE['tagline']) ?>
        </h2>
        <p class="mt-3 max-w-xl leading-relaxed text-brand-slate">
          One unhurried conversation, no cost and no obligation. If what you already hold is the
          best fit, I will tell you so.
        </p>
      </div>
      <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex shrink-0 items-center gap-3 rounded-full bg-brand-ocean px-8 py-4 text-[1.05rem] font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
        <?= icon('phone', 'h-5 w-5') ?> Call <?= e($SITE['phone']) ?>
      </a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
