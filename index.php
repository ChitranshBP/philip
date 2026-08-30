<?php
/**
 * Philip Smith — Medicare & Senior Benefits
 * Bright coastal single-page site. Tailwind CSS (CDN) + a thin custom layer.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/inc/form-handler.php';
require_once __DIR__ . '/inc/medicare.php';

/* The contact form section is gone; inc/form-handler.php stays wired up so a
   dedicated contact page can reuse it. These helpers go with it. */
$old = static function (string $k) use ($form): string { return e($form['old'][$k] ?? ''); };
$err = static function (string $k) use ($form): ?string { return $form['errors'][$k] ?? null; };

/* Hero background — first file that exists wins. */
$heroBg = null;
foreach (['assets/bg-hero/philips-hero.png', 'assets/img/hero-bg.jpg'] as $candidate) {
    if (is_file(__DIR__ . '/' . $candidate)) { $heroBg = $candidate; break; }
}

/* Dedicated pages — targets of the "Read more" / "full story" links.
   Neither is built yet; set the value to '' in inc/config.php to hide them. */
$learnUrl = $SITE['learn_url'] ?? '';
$aboutUrl = $SITE['about_url'] ?? '';

/* Philip's portrait for the story section; falls back to the placeholder. */
$portrait = is_file(__DIR__ . '/assets/bg-hero/philip.png') ? 'assets/bg-hero/philip.png' : null;

/* ================================================================= *
 * CONTENT
 * ================================================================= */


/* ---- Concierge promises ---------------------------------------- */
$concierge = [
    ['compass', 'A guide, not a switchboard', 'You get my mobile number on day one. The person who explains your plan is the person who answers when you call in March with a question about a bill.'],
    ['search',  'Your doctors and drugs come first', 'Before I mention a single plan name I check your physicians against each network and price your exact prescriptions against each formulary. Then we talk.'],
    ['clipboard','I do the paperwork', 'Applications, effective dates, disenrolment letters, Social Security forms. You sign; I chase everything else and confirm it landed.'],
    ['shield',  'Claims and billing advocacy', 'A statement that looks wrong is my problem, not yours. I call the carrier, sit through the hold music and come back to you with an answer.'],
    ['calendar','A proper review every autumn', 'Premiums, drug tiers and networks change every single year. Each October I re-run your numbers against the new options — free, whether you move or stay.'],
    ['users',   'Your family is welcome', 'Spouses, adult children calling from three states away, a neighbour who needs the same conversation. Bring them all. Nobody gets rushed.'],
];

/* ---- Carrier logos ----------------------------------------------- *
 * Files live in assets/img/carriers. Drop a new .webp in and add a row.
 * TODO: replace with logo files supplied by each carrier's marketing kit. */
$carriers = [
    ['aetna.webp',              'Aetna'],
    ['anthem.webp',             'Anthem'],
    ['cigna.webp',              'Cigna'],
    ['devoted.webp',            'Devoted'],
    ['heartland-national.webp', 'Heartland National'],
    ['humana.webp',             'Humana'],
    ['wellcare.webp',           'WellCare'],
];

/* ---- Coverage grid ----------------------------------------------- *
 * The four people actually come here for. The wider list — hospital
 * indemnity, life & final expense, annuities, under-65 and small
 * business — is kept in inc/data.php for a services page later.        */
$services = [
    ['Medicare Advantage (Part C)',    'HMO, PPO and Special Needs Plans, often at a $0 monthly premium.',      'medicare-101.php#part-c'],
    ['Medicare Supplements (Medigap)', 'Plans A through N. Keep Original Medicare and close the gaps it leaves.','medicare-101.php#medigap'],
    ['Part D Prescription Drugs',      'Your exact medication list priced against every formulary in your ZIP.', 'medicare-101.php#part-d'],
    ['Dental, Vision & Hearing',       'The cleanings, glasses and hearing aids Medicare will not pay for.',     'dental-vision.php'],
];



/* ---- Costly mistakes --------------------------------------------- */
$mistakes = [
    ['Choosing on premium alone',        'The cheapest monthly figure is regularly the most expensive plan by December once copays, tiers and deductibles are counted.'],
    ['Assuming your doctor is in-network','Networks are re-drawn every January. The specialist you have seen for a decade can quietly drop off on the first of the month.'],
    ['Letting the Medigap window lapse', 'For six months you cannot be asked a single health question. After that, a Supplement carrier can decline you outright.'],
    ['Auto-renewing without reading',    'Your plan is allowed to change its costs and drug list each year. The Annual Notice of Change lands in September and almost nobody opens it.'],
    ['Not checking Extra Help',          'Millions who qualify for prescription and premium assistance never apply, because nobody told them the programme exists.'],
];

/* ---- Steps -------------------------------------------------------- */
$steps = [
    ['01', 'A conversation, not a pitch', 'Twenty unhurried minutes over coffee, at your table or on video. Your doctors, your prescriptions, your budget, your travel. Nothing is sold and nothing is signed.'],
    ['02', 'A comparison you can read',   'I come back with a plain-English, side-by-side sheet showing what each realistic option costs across a full year — not just the headline premium.'],
    ['03', 'Enrol, then never be alone',  'I file the paperwork with you and then stay on as your agent: ID cards, claims, prescription snags, and a free review every October.'],
];

/* NOTE: sample testimonials — replace with real, permissioned reviews. */
$reviews = [
    ['Philip sat at our kitchen table and worked through every option until my husband and I actually understood it. No rush, no pressure. We have sent three neighbours his way since.', 'Margaret D.', 'Bradenton', 'Medicare Supplement'],
    ['I was paying for a plan that did not even cover my heart medication. Philip found one that did and saved me close to ninety dollars a month.', 'Ronald H.', 'Sarasota', 'Part D review'],
    ['He answers his own phone. After a year of being passed around call centres, that alone was worth everything.', 'Dolores M.', 'Lakewood Ranch', 'Medicare Advantage'],
];


$faqs = [
    ['Am I eligible for Medicare?',
     'Most people qualify at 65 if they are a US citizen or have been a lawful resident for five years. If you or your spouse paid Medicare taxes for 40+ working quarters — roughly ten years — Part A costs you no premium. You can also qualify before 65: after 24 months on Social Security Disability, immediately with ALS, or from the fourth month of dialysis with end-stage renal disease. Marriage and work history can change the answer, so ring me and we will work out your exact position.'],

    ['When exactly should I sign up?',
     'Your Initial Enrollment Period is a seven-month window: the three months before your 65th birthday month, the month itself, and the three months after. If you are already drawing Social Security or SSDI you are enrolled automatically. If you are not, nobody does it for you. Miss the window and you wait for the General Enrollment Period, 1 January to 31 March — which is not the same thing as the Annual Enrollment Period in the autumn, when you change Advantage and drug plans.'],

    ['What is a late-enrolment penalty, really?',
     'It is a permanent surcharge for missing a window you were eligible for. Two catch people out. Skip Part B without creditable employer coverage and the penalty rides on your premium for as long as you have Medicare. Skip a Part D drug plan — which is never automatic — and the same thing happens there. Neither penalty goes away, which is why one short conversation before your birthday is worth having.'],

    ['Do I have to take Medicare at 65?',
     'No. If you have genuinely creditable coverage, usually from a large employer, you can delay Part B without a penalty and pick it up later through a Special Enrollment Period. Whether your coverage counts depends on how many people your employer covers and how good the drug benefit is. Getting that judgement wrong creates a lifelong penalty, so call me about three months out and we will check it properly.'],

    ['How do I actually enrol?',
     'Parts A and B come from Social Security — their online application takes under ten minutes, and you do not have to be claiming income benefits to apply. That is the government half. Choosing what sits on top of it, an Advantage plan or a Medigap policy plus a drug plan, is where I come in, and there is no charge for that help.'],

    ['What does your help cost me?',
     'Nothing — not a dollar. I am paid by whichever carrier you choose, and your premium is identical whether you enrol through me, online, or on the phone with the company. What you get at no charge is somebody who reads the fine print beside you and picks up when you call in March.'],

    ['Advantage or Medigap — which is right for me?',
     'That is the real question, and it depends on your doctors, your prescriptions, your travel and your appetite for surprises. An Advantage plan usually costs little each month and caps your worst year, but care runs through a network. A Medigap costs a set premium and leaves almost nothing to pay at the counter, anywhere in the country that takes Medicare. I explain both honestly and let you decide.'],

    ['Which Medigap letter should I buy?',
     'The letter sets the coverage, not the company — a Plan G is a Plan G whichever carrier sells it, so the sensible question is who is charging least for it this year. Plan G is the practical top choice for most people today: it covers everything except the Part B deductible. Plan N costs less in exchange for small copays. Plan F is richer still, but it is closed to anyone who became eligible for Medicare on or after 1 January 2020.'],

    ['Do I have to change what I already have?',
     'No, and plenty of my reviews end with me saying stay exactly where you are. If what you hold is genuinely the best fit, my job is to tell you so. Each October I re-check your plan against the coming year anyway — free, whether you move or stay.'],
];

$year = date('Y');

/* The home page hero is a photograph, so the bar starts transparent. */
$transparentHeader = true;

require __DIR__ . '/inc/header.php';
?>
<!-- ═════════════════ HERO ═════════════════ -->
<section id="top" class="hero-dark relative isolate flex min-h-[44rem] items-center overflow-hidden lg:min-h-[50rem]">

  <!-- Background photograph (assets/bg-hero/philips-hero.png, or assets/img/hero-bg.jpg) -->
  <div class="absolute inset-0 -z-20 bg-brand-mist">
    <?php if ($heroBg): ?>
      <img src="<?= e($heroBg) ?>" alt="" aria-hidden="true" fetchpriority="high" decoding="async"
           class="h-full w-full object-cover object-[45%_center]">
    <?php else: ?>
      <div class="h-full w-full bg-brand-sky"></div>
    <?php endif; ?>
  </div>

  <div class="relative mx-auto w-full max-w-content px-5 pb-28 pt-[8rem] lg:px-8 lg:pb-32 lg:pt-[9rem]">

    <div class="max-w-3xl rise">

      <p class="text-[0.92rem] font-bold uppercase tracking-[0.2em] text-white/85">
        <?= e($SITE['company_short']) ?>
      </p>

      <h1 class="mt-5 font-display text-[2.4rem] font-bold leading-[1.08] tracking-tight text-white sm:text-[3rem] lg:text-[3.5rem]">
        Real Guidance.<br class="hidden sm:block">
        Real People.<br class="hidden sm:block">
        <span class="text-brand-sun">Real Peace of Mind.</span>
      </h1>

      <p class="mt-6 max-w-2xl text-[1.08rem] leading-relaxed text-white/90 sm:text-[1.15rem]">
        Medicare, Life, Health, Dental, Vision, Annuities &amp; Travel Insurance &mdash; all under one roof, with personalised guidance from a local agent who puts you and your family first.
      </p>

      <div class="mt-8">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center justify-center gap-3 rounded-full bg-brand-ocean px-8 py-[1.1rem] text-[1.1rem] font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-[1.35rem] w-[1.35rem]') ?> Call <?= e($SITE['phone']) ?>
        </a>
      </div>

    </div>
  </div>

  <!-- Floating trust strip straddling the hero edge -->
  <!-- <div class="absolute inset-x-0 bottom-0 z-10 translate-y-1/2 px-5 lg:px-8">
    <div class="mx-auto hidden max-w-content sm:block">
      <div class="grid grid-cols-3 divide-x divide-brand-line rounded-3xl border border-brand-line bg-white shadow-lift">
        <div class="flex items-center justify-center gap-3 px-5 py-6 text-center">
          <span class="text-brand-sun"><?= str_repeat(star('inline h-5 w-5'), 5) ?></span>
          <span class="font-bold text-brand-navy">Loved by local families</span>
        </div>
        <div class="flex items-center justify-center gap-3 px-5 py-6 text-center">
          <?= icon('badge', 'h-7 w-7 shrink-0 text-brand-ocean') ?>
          <span class="font-bold text-brand-navy"><?= e($SITE['carriers']) ?>+ carriers compared</span>
        </div>
        <div class="flex items-center justify-center gap-3 px-5 py-6 text-center">
          <?= icon('heart', 'h-7 w-7 shrink-0 text-brand-ocean') ?>
          <span class="whitespace-nowrap font-bold text-brand-navy">Never a hard sell</span>
        </div>
      </div>
    </div>
  </div> -->

</section>

<!-- ═════════════════ CARRIER STRIP ═════════════════ -->
<section aria-labelledby="carriers-heading" class="border-b border-brand-line bg-white py-7">
  <div class="mx-auto flex max-w-content flex-col gap-5 px-5 lg:flex-row lg:items-center lg:gap-9 lg:px-8">

    <h2 id="carriers-heading" class="shrink-0 text-[0.78rem] font-bold uppercase tracking-[0.16em] text-brand-slate lg:max-w-[11rem] lg:border-r lg:border-brand-line lg:pr-9">
      Appointed with <span class="text-brand-ocean"><?= e($SITE['carriers']) ?>+ carriers</span>, including
    </h2>

    <div class="marquee min-w-0 flex-1">
      <ul class="marquee__track" role="list">
        <?php for ($pass = 0; $pass < 3; $pass++): ?>
          <?php foreach ($carriers as $c): ?>
            <li<?= $pass ? ' aria-hidden="true"' : '' ?>>
              <img src="assets/img/carriers/<?= e($c[0]) ?>" alt="<?= $pass ? '' : e($c[1]) ?>"
                   width="224" height="64" loading="lazy" decoding="async" class="carrier-logo">
            </li>
          <?php endforeach; ?>
        <?php endfor; ?>
      </ul>
    </div>
  </div>
</section>

<!-- ═════════════════ MEET PHILIP ═════════════════ -->
<section class="relative overflow-hidden bg-brand-mist py-16 lg:py-24">

  <div class="relative mx-auto grid max-w-content items-center gap-14 px-5 lg:grid-cols-[.9fr_1.1fr] lg:gap-20 lg:px-8">

    <div class="relative">
      <div aria-hidden="true" class="absolute -inset-5 rotate-3 rounded-[2.75rem] bg-brand-foam"></div>
      <?php if ($portrait): ?>
        <img src="<?= e($portrait) ?>" width="1080" height="1350" loading="lazy" decoding="async"
             alt="Philip Smith, licensed insurance agent and owner of <?= e($SITE['company']) ?>"
             class="relative aspect-[4/5] w-full rounded-[2.25rem] bg-brand-foam object-cover object-top shadow-lift">
      <?php else: ?>
        <?= photo('philip-portrait.jpg', 'Professional portrait of Philip Smith, licensed insurance agent', 'relative aspect-[4/5] w-full rounded-[2.25rem] object-cover shadow-lift', 'Professional portrait of Philip') ?>
      <?php endif; ?>
      <span class="absolute -bottom-5 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-full bg-brand-burn px-6 py-2.5 font-bold text-white shadow-sun">
        <?= e($SITE['agent_title']) ?>
      </span>
    </div>

    <div>
      <p class="eyebrow text-brand-ocean">In Philip's own words</p>
      <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.2rem]">
        A real person, <span class="mark-sun">not a brochure.</span>
      </h2>

      <div class="mt-7 space-y-5 text-[1.1rem] leading-relaxed text-brand-slate">
        <p>I got into this work because I know what it feels like to be lost. I came to the United States from South Africa in 2000 with no formal qualifications and no safety net &mdash; so when someone feels overwhelmed by their Medicare choices, I understand that from the inside.</p>
        <p class="font-semibold text-brand-ink">I am not going to hand you a brochure and wish you well. I will sit with you, ask the right questions, and make sure the plan we land on actually fits your life.</p>
      </div>

      <blockquote class="mt-8 border-l-[3px] border-brand-sun pl-6 font-display text-[1.35rem] font-semibold leading-snug text-brand-navy">
        &ldquo;My clients tell me I make Medicare feel manageable for the first time. That is the goal, every single time.&rdquo;
      </blockquote>

      <div class="mt-8 grid gap-6 border-t border-brand-navy/12 pt-7 sm:grid-cols-3">
        <?php
        $personal = [
            ['globe',    'South Africa to Sarasota', 'I arrived in 2000 with no qualifications and no safety net. I remember what lost feels like.'],
            ['badge',    'Fifteen years in Medicare', 'Advantage, Supplements, Part D, Special Needs, indemnity, cancer plans and fixed annuities.'],
            ['calendar', 'Seven days a week',         'If I do not pick up, I am with another client. I will call you back — I always have.'],
        ];
        foreach ($personal as $p): ?>
          <div>
            <span class="text-brand-ocean"><?= icon($p[0], 'h-6 w-6', 1.5) ?></span>
            <p class="mt-2.5 font-bold text-brand-navy"><?= e($p[1]) ?></p>
            <p class="mt-1 text-[0.98rem] leading-snug text-brand-slate"><?= e($p[2]) ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <p class="mt-8 font-hand text-[2.5rem] leading-none text-brand-ocean"><?= e($SITE['agent_name']) ?></p>
      <p class="mt-1 text-[0.95rem] font-semibold text-brand-slate">Owner, <?= e($SITE['company']) ?> &nbsp;•&nbsp; <?= e($SITE['license']) ?></p>

      <div class="mt-7 flex flex-wrap items-center gap-x-7 gap-y-4">
        <p class="font-display text-[1.25rem] font-bold text-brand-navy"><?= e($SITE['tagline']) ?></p>
        <?php if ($aboutUrl !== ''): ?>
          <a href="<?= e($aboutUrl) ?>" class="group inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
            Read Philip's full story
            <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
              <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
            </span>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ═════════════════ CONCIERGE ═════════════════ -->
<section id="concierge" class="bg-white py-16 lg:py-24">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[.8fr_1.2fr] lg:gap-20 lg:px-8">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <p class="eyebrow text-brand-ocean">The concierge difference</p>
      <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.1rem]">
        Most agents disappear after the signature. <span class="text-tide">I don't.</span>
      </h2>
      <p class="mt-6 text-[1.12rem] leading-relaxed text-brand-slate">
        Choosing the plan is one afternoon. Living with it is the next twelve months. Six things you get from me every year, for as long as you would like to keep me.
      </p>
      <a href="contact.php" class="mt-7 inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white transition hover:-translate-y-0.5 hover:bg-brand-sky">
        Start with a conversation <?= icon('arrow', 'h-5 w-5') ?>
      </a>
    </div>

    <dl class="divide-y divide-brand-line border-y border-brand-line">
      <?php foreach ($concierge as $i => $c): ?>
        <div class="flex gap-6 py-8">
          <span class="mt-1 shrink-0 text-brand-ocean"><?= icon($c[0], 'h-8 w-8', 1.5) ?></span>
          <div>
            <dt class="font-display text-[1.4rem] font-semibold leading-snug text-brand-navy"><?= e($c[1]) ?></dt>
            <dd class="mt-2 leading-relaxed text-brand-slate"><?= e($c[2]) ?></dd>
          </div>
        </div>
      <?php endforeach; ?>
    </dl>
  </div>
</section>

<!-- ═════════════════ COVERAGE ═════════════════ -->
<section id="coverage" class="relative overflow-hidden bg-brand-sand py-16 lg:py-24">

  <div class="relative mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-3xl">
      <p class="eyebrow text-brand-burn">What I can help with</p>
      <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.2rem]">
        One agent. <span class="mark-sun">Every option</span> on the table.
      </h2>
      <p class="mt-6 text-[1.15rem] leading-relaxed text-brand-slate">
        Because I am independent, I am not quietly steering you toward one company's product. I compare what is genuinely available in your ZIP code and tell you what I would tell my own family.
      </p>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-2">
      <?php foreach ($services as $s): ?>
        <article class="group relative rounded-[1.75rem] bg-white p-8 shadow-soft transition hover:-translate-y-1 hover:shadow-lift sm:p-11">
          <div class="flex items-start justify-between gap-6">
            <h3 class="font-display text-[1.5rem] font-bold leading-[1.14] tracking-tight text-brand-navy sm:text-[1.8rem]"><?= e($s[0]) ?></h3>
            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full border border-brand-line text-brand-ocean transition group-hover:border-brand-ocean group-hover:bg-brand-ocean group-hover:text-white">
              <?= icon('arrow-ne', 'h-5 w-5', 2) ?>
            </span>
          </div>
          <p class="mt-6 text-[1.05rem] leading-relaxed text-brand-slate"><?= e($s[1]) ?></p>
          <a href="<?= e($s[2]) ?>" aria-label="Read about <?= e($s[0]) ?>"
             class="absolute inset-0 rounded-[1.75rem] focus-visible:ring-2 focus-visible:ring-brand-ocean focus-visible:ring-offset-2"></a>
        </article>
      <?php endforeach; ?>

      <article class="flex flex-col justify-center gap-5 rounded-[1.75rem] border border-brand-ocean/20 bg-brand-aqua/50 p-8 sm:flex-row sm:items-center sm:justify-between md:col-span-2 sm:p-9">
        <div>
          <p class="font-display text-[1.3rem] font-bold leading-snug text-brand-navy">Not sure which of these you actually need?</p>
          <p class="mt-2 leading-relaxed text-brand-slate">That is exactly what the first conversation is for &mdash; and it costs you nothing.</p>
        </div>
        <a href="contact.php" class="inline-flex shrink-0 items-center gap-2 rounded-full bg-brand-ocean px-6 py-3.5 font-bold text-white transition hover:-translate-y-0.5 hover:bg-brand-sky">
          Ask me <?= icon('arrow', 'h-5 w-5') ?>
        </a>
      </article>
    </div>
  </div>
</section>

<!-- ═════════════════ MEDICARE 101 (SHORT — a full guide gets its own page later) ═════════════════ -->
<section id="learn" class="relative overflow-hidden bg-white py-14 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">

    <div class="grid items-center gap-10 lg:grid-cols-[1.1fr_.9fr] lg:gap-14">
      <div>
        <p class="eyebrow text-brand-ocean">Medicare 101</p>
        <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.2rem]">
          Four letters. <span class="text-tide">Ninety seconds each.</span>
        </h2>
        <p class="mt-6 text-[1.15rem] leading-relaxed text-brand-slate">
          Everyone starts with Original Medicare &mdash; Parts A and B. From there you take one road, and that single choice shapes every cost that follows. Here is the short version.
        </p>
      </div>
      <?= photo('medicare-101.jpg', 'Happy senior couple enjoying peace of mind with their Medicare coverage',
                'aspect-[16/10] w-full rounded-[1.75rem] object-cover shadow-lift', 'Medicare Coverage Peace of Mind') ?>
    </div>

    <!-- The four parts, one line each -->
    <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($parts as $p): ?>
        <article class="flex flex-col rounded-[1.5rem] border border-brand-line bg-brand-mist p-6 transition hover:border-brand-sky hover:shadow-soft">
          <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-ocean font-display text-2xl font-bold text-white"><?= e($p['letter']) ?></span>
          <p class="mt-5 text-[0.72rem] font-bold uppercase tracking-[0.16em] text-brand-ocean">Part <?= e($p['letter']) ?> &middot; <?= e($p['tag']) ?></p>
          <h3 class="mt-1.5 font-display text-[1.3rem] font-bold leading-snug text-brand-navy"><?= e($p['name']) ?></h3>
          <p class="mt-2.5 leading-relaxed text-brand-slate"><?= e($p['lead']) ?></p>

          <?php if ($learnUrl !== ''): ?>
            <a href="<?= e($learnUrl) ?>#part-<?= e(strtolower($p['letter'])) ?>"
               class="group mt-auto inline-flex items-center gap-2 pt-5 text-[0.9rem] font-bold text-brand-ocean transition hover:text-brand-navy">
              Read more<span class="sr-only"> about Part <?= e($p['letter']) ?>, <?= e($p['name']) ?></span>
              <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 text-brand-ocean transition group-hover:translate-x-0.5 group-hover:bg-brand-ocean group-hover:text-white">
                <?= icon('arrow', 'h-3.5 w-3.5', 2.4) ?>
              </span>
            </a>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Then one road, never both -->
    <div class="mt-5 rounded-[1.5rem] border border-brand-line bg-brand-foam p-7 sm:p-9">
      <p class="flex items-center gap-3 text-[0.8rem] font-bold uppercase tracking-[0.16em] text-brand-burn">
        <span aria-hidden="true" class="h-px w-8 bg-brand-burn"></span> Then one road, never both
      </p>
      <div class="mt-6 grid gap-7 md:grid-cols-2 md:gap-12">
        <?php foreach ($roads as $r): ?>
          <div class="border-t-[3px] border-brand-navy pt-5">
            <p class="eyebrow text-brand-burn"><?= e($r['label']) ?></p>
            <h3 class="mt-2 font-display text-[1.45rem] font-bold leading-snug text-brand-navy"><?= e($r['title']) ?></h3>
            <p class="mt-2 leading-relaxed text-brand-slate"><?= e($r['note']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="mt-5 flex flex-col items-start gap-5 rounded-[1.5rem] border border-brand-ocean/20 bg-brand-aqua/50 p-8 sm:flex-row sm:items-center sm:justify-between">
      <p class="max-w-2xl text-[1.2rem] font-semibold leading-snug text-brand-navy">
        Want the whole thing in plain English? I'll post you a free Medicare 101 booklet &mdash; no salesperson attached to it.
      </p>
      <a href="contact.php" class="inline-flex shrink-0 items-center gap-2 rounded-full bg-brand-ocean px-7 py-3.5 font-bold text-white transition hover:-translate-y-0.5 hover:bg-brand-sky">
        Send me the booklet <?= icon('arrow', 'h-5 w-5') ?>
      </a>
    </div>
  </div>
</section>

<!-- ═════════════════ COSTLY MISTAKES ═════════════════ -->
<section id="mistakes" class="relative overflow-hidden bg-brand-foam py-16 lg:py-24">

  <div class="relative mx-auto max-w-content px-5 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1fr_1.15fr] lg:items-center">
      <div>
        <p class="eyebrow text-brand-ocean">Worth avoiding</p>
        <h2 class="mt-4 font-display text-[2.1rem] font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[2.7rem]">
          Five mistakes that quietly <span class="mark-sun">cost people money.</span>
        </h2>
        <p class="mt-5 text-[1.1rem] leading-relaxed text-brand-slate">
          I see the same handful every single year. None of them are anybody's fault &mdash; the system is genuinely confusing. All five are avoidable with one conversation.
        </p>
        <a href="contact.php" class="mt-7 inline-flex items-center gap-3 rounded-full bg-brand-burn px-7 py-4 font-bold text-white shadow-sun transition hover:-translate-y-0.5 hover:bg-brand-coral">
          Have me check yours <?= icon('arrow', 'h-5 w-5') ?>
        </a>
      </div>

      <ol class="divide-y divide-brand-navy/12 border-y border-brand-navy/12">
        <?php foreach ($mistakes as $i => $m): ?>
          <li class="flex gap-5 py-6">
            <span class="font-display text-[1.6rem] font-bold leading-none text-brand-burn"><?= $i + 1 ?></span>
            <div>
              <p class="font-display text-[1.2rem] font-semibold leading-snug text-brand-navy"><?= e($m[0]) ?></p>
              <p class="mt-1.5 leading-relaxed text-brand-slate"><?= e($m[1]) ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
</section>

<section class="relative overflow-hidden bg-brand-mist py-12 lg:py-16">

  <div class="relative mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-3xl">
      <p class="eyebrow text-brand-ocean">How it works</p>
      <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.2rem]">
        Three easy steps.<br class="hidden sm:block"> Then it's genuinely done.
      </h2>
    </div>

    <ol class="mt-8 grid gap-8 lg:grid-cols-3">
      <?php foreach ($steps as $s): ?>
        <li class="border-t-2 border-brand-ocean/30 pt-5">
          <span class="font-display text-[2.6rem] font-bold leading-none text-brand-ocean"><?= e($s[0]) ?></span>
          <h3 class="mt-2 font-display text-[1.4rem] font-semibold leading-snug text-brand-navy"><?= e($s[1]) ?></h3>
          <p class="mt-2 leading-relaxed text-brand-slate"><?= e($s[2]) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ═════════════════ TESTIMONIALS ═════════════════ -->
<section class="relative overflow-hidden bg-brand-sand py-12 lg:py-16">

  <div class="relative mx-auto max-w-content px-5 lg:px-8">

    <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
      <div class="max-w-2xl">
        <p class="eyebrow text-brand-burn">Kind words</p>
        <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.2rem]">
          Neighbours who finally <span class="mark-sun">understood their plan.</span>
        </h2>
      </div>

      <div class="flex shrink-0 items-center gap-5">
        <div class="hidden items-center gap-3 rounded-full border border-brand-navy/10 bg-white px-5 py-3 shadow-soft sm:flex">
          <span class="flex gap-0.5 text-brand-sun"><?= str_repeat(star('h-5 w-5'), 5) ?></span>
          <span class="text-[0.98rem] font-bold leading-tight text-brand-navy">
            Most new clients<span class="block font-medium text-brand-slate">arrive by referral</span>
          </span>
        </div>

        <div id="reviewNav" class="flex shrink-0 items-center gap-2">
          <button type="button" data-slide="prev" aria-label="Previous testimonials"
                  class="slider-btn grid h-12 w-12 place-items-center rounded-full border border-brand-navy/15 bg-white text-brand-ocean transition hover:border-brand-ocean hover:bg-brand-ocean hover:text-white">
            <?= icon('arrow', 'h-5 w-5 rotate-180') ?>
          </button>
          <button type="button" data-slide="next" aria-label="More testimonials"
                  class="slider-btn grid h-12 w-12 place-items-center rounded-full border border-brand-navy/15 bg-white text-brand-ocean transition hover:border-brand-ocean hover:bg-brand-ocean hover:text-white">
            <?= icon('arrow', 'h-5 w-5') ?>
          </button>
        </div>
      </div>
    </div>

    <!-- TODO: replace with real, permissioned reviews before launch -->
    <div id="reviewTrack" class="slider-track mt-8 flex snap-x snap-mandatory gap-6 overflow-x-auto pb-2"
         tabindex="0" role="group" aria-label="Client testimonials, scrollable">
      <?php foreach ($reviews as $ri => $r): ?>
        <figure class="group relative flex w-[85%] shrink-0 snap-start flex-col rounded-[1.6rem] bg-white p-6 shadow-soft transition duration-300 hover:-translate-y-1 hover:shadow-lift sm:w-[calc((100%-1.5rem)/2)] sm:p-7 lg:w-[calc((100%-3rem)/3)]">

          <span aria-hidden="true" class="pointer-events-none absolute bottom-2 right-5 font-display text-[4rem] leading-none text-brand-aqua/25 transition duration-300 group-hover:text-brand-aqua/40">&rdquo;</span>

          <div class="flex flex-wrap items-center justify-between gap-3">
            <span class="flex gap-0.5 text-brand-sun"><?= str_repeat(star('h-[1.15rem] w-[1.15rem]'), 5) ?></span>
            <span class="rounded-full bg-brand-foam px-3 py-1.5 text-[0.76rem] font-bold uppercase tracking-[0.08em] text-brand-ocean">
              <?= e($r[3]) ?>
            </span>
          </div>

          <blockquote class="relative mt-4 font-display text-[1.08rem] font-medium leading-relaxed text-brand-navy">
            <?= e($r[0]) ?>
          </blockquote>

          <figcaption class="relative mt-auto flex items-center gap-3 pt-5">
            <?= avatar('review-' . ($ri + 1) . '.jpg', $r[1], 'h-11 w-11') ?>
            <span class="text-[1rem] leading-snug">
              <span class="block whitespace-nowrap font-bold text-brand-navy"><?= e($r[1]) ?></span>
              <span class="block text-[0.95rem] text-brand-slate"><?= e($r[2]) ?></span>
            </span>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ FAQ + GLOSSARY ═════════════════ -->
<section id="faq" class="bg-white py-16 lg:py-24">
  <div class="mx-auto grid max-w-content gap-14 px-5 lg:grid-cols-[.85fr_1.15fr] lg:gap-16 lg:px-8">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <p class="eyebrow text-brand-ocean">Good questions</p>
      <h2 class="mt-4 font-display text-4xl font-bold leading-[1.08] tracking-tight text-brand-navy sm:text-[3.2rem]">
        The things people ask me <span class="mark-sun">every day.</span>
      </h2>
      <p class="mt-6 text-[1.1rem] leading-relaxed text-brand-slate">
        Not finding yours? That is exactly what the phone is for &mdash; and no question is too small or too late.
      </p>
      <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-4">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> Ask me directly
        </a>
        <a href="faq.php" class="group inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
          See all questions
          <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
            <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
          </span>
        </a>
      </div>
      <?= photo('other/insurance-faq.jpg', 'Medicare insurance consultation with a client reviewing options',
                'mt-8 block aspect-[16/10] w-full rounded-[1.75rem] object-cover shadow-lift', 'Medicare Consultation') ?>
    </div>

    <div>
      <div class="space-y-3">
        <?php foreach (array_slice($faqs, 0, 6) as $i => $f): ?>
          <details class="faq rounded-2xl border border-brand-line bg-brand-mist px-6 py-1 transition hover:border-brand-sky open:bg-white"<?= $i === 0 ? ' open' : '' ?>>
            <summary class="flex items-center justify-between gap-5 py-5 font-display text-[1.22rem] font-semibold leading-snug text-brand-navy">
              <span><?= e($f[0]) ?></span>
              <span class="faq-chevron grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-ocean text-white"><?= icon('chevron', 'h-5 w-5', 2.4) ?></span>
            </summary>
            <div class="pb-6 pr-10 leading-relaxed text-brand-slate"><?= e($f[1]) ?></div>
          </details>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
