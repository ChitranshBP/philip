<?php
/**
 * Newsletter sign-up.
 *
 * Same deployment note as contact.php: this is a Netlify Form, because the
 * published site is static. Netlify collects the addresses; exporting them
 * into a proper mailing tool (Mailchimp, Constant Contact) is a decision for
 * Philip — see the README.
 *
 * Photography: Unsplash — couple-home.jpg, Hector Reyes.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';

$pageTitle = 'The Trucare Newsletter — ' . $SITE['company'];
$pageDesc  = 'A short letter from ' . $SITE['agent_name'] . ' a few times a year: what changes in '
           . 'January, when the enrolment windows open, and the traps worth avoiding. No selling.';

/* What actually goes in it — set expectations honestly. */
$contents = [
    ['calendar', 'The dates that matter',   'A note before the Annual Enrollment Period opens on 15 October, and again before it closes on 7 December. Miss those and you wait a year.'],
    ['warning',  'What changes in January', 'Premiums, drug tiers and networks are re-drawn every year. I write when something moves that affects people locally.'],
    ['bulb',     'The traps I keep seeing', 'The Annual Notice of Change nobody opens. The Part B penalty. The Medigap window that quietly closes after six months.'],
    ['gift',     'Programmes people miss',  'Extra Help, Medicare Savings Programs, the Prescription Payment Plan. Millions qualify and never apply because nobody told them.'],
];

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="bg-brand-mist pb-14 pt-[9rem] lg:pb-20 lg:pt-[11rem]">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:px-8">
    <div>
      <p class="eyebrow text-brand-ocean">Newsletter</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.4rem]">
        A few letters a year.<br class="hidden sm:block"> <span class="text-brand-ocean">Never a sales pitch.</span>
      </h1>
      <p class="mt-6 max-w-xl text-[1.15rem] leading-relaxed text-brand-slate">
        Medicare changes every January, and the windows to do anything about it are short. I write
        when there is something you genuinely need to know &mdash; and stay quiet the rest of the
        time.
      </p>

      <ul class="mt-8 flex flex-wrap gap-x-7 gap-y-3">
        <?php foreach (['Four or five emails a year', 'Unsubscribe in one click', 'Never sold or shared'] as $point): ?>
          <li class="inline-flex items-center gap-2.5 font-semibold text-brand-navy">
            <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-aqua text-brand-ocean"><?= icon('check', 'h-4 w-4', 3) ?></span>
            <?= e($point) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Sign-up -->
    <div class="rounded-[1.75rem] bg-white p-7 shadow-lift sm:p-9">
      <h2 class="font-display text-[1.35rem] font-bold leading-snug text-brand-navy">Put me on the list</h2>
      <p class="mt-2 leading-relaxed text-brand-slate">Your first name and an email address. That is all I need.</p>

      <form name="newsletter" method="POST" action="/thank-you.html" data-netlify="true" netlify-honeypot="company" class="mt-6">
        <input type="hidden" name="form-name" value="newsletter">
        <p class="hidden">
          <label>Leave this empty: <input name="company" tabindex="-1" autocomplete="off"></label>
        </p>

        <div class="space-y-4">
          <div>
            <label for="n-name" class="block font-semibold text-brand-navy">First name</label>
            <input id="n-name" name="name" type="text" autocomplete="given-name" required class="field mt-2">
          </div>
          <div>
            <label for="n-email" class="block font-semibold text-brand-navy">Email address</label>
            <input id="n-email" name="email" type="email" autocomplete="email" required class="field mt-2">
          </div>
          <div>
            <label for="n-zip" class="block font-semibold text-brand-navy">ZIP code <span class="font-normal text-brand-slate">(optional)</span></label>
            <input id="n-zip" name="zip" type="text" inputmode="numeric" autocomplete="postal-code" class="field mt-2">
            <p class="mt-1.5 text-[0.9rem] text-brand-slate">So I only write to you about plans that exist where you live.</p>
          </div>
        </div>

        <button type="submit" class="mt-6 inline-flex w-full items-center justify-center gap-3 rounded-full bg-brand-ocean px-8 py-4 text-[1.05rem] font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('mail', 'h-5 w-5') ?> Sign me up
        </button>

        <p class="mt-4 text-[0.9rem] leading-relaxed text-brand-slate">
          No cost, and no obligation to buy anything. Unsubscribe any time.
        </p>
      </form>
    </div>
  </div>
</section>

<!-- ═════════════════ WHAT IS IN IT ═════════════════ -->
<section class="bg-white py-16 lg:py-20">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <h2 class="max-w-3xl font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.5rem]">
      What actually goes in it.
    </h2>

    <div class="mt-10 grid gap-5 sm:grid-cols-2">
      <?php foreach ($contents as $c): ?>
        <article class="flex gap-5 rounded-[1.5rem] border border-brand-line bg-brand-mist p-7">
          <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-ocean text-white">
            <?= icon($c[0], 'h-5 w-5', 1.7) ?>
          </span>
          <div>
            <h3 class="font-display text-[1.2rem] font-bold leading-snug text-brand-navy"><?= e($c[1]) ?></h3>
            <p class="mt-2 leading-relaxed text-brand-slate"><?= e($c[2]) ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═════════════════ THE PROMISE ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto grid max-w-content items-center gap-12 px-5 lg:grid-cols-[.9fr_1.1fr] lg:gap-16 lg:px-8">
    <img src="assets/img/about/couple-home.jpg" width="1600" height="2400" loading="lazy" decoding="async"
         alt="An older couple together at home"
         class="aspect-[4/5] w-full rounded-[1.75rem] object-cover shadow-lift">

    <div>
      <p class="eyebrow text-brand-ocean">The promise</p>
      <h2 class="mt-4 font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.3rem]">
        I will not fill your inbox.
      </h2>
      <div class="mt-6 space-y-5 text-[1.08rem] leading-relaxed text-brand-slate">
        <p>
          Most of my new clients arrive through referrals, not advertising. That only works if the
          people who trust me stay glad they do &mdash; which is a strong incentive to keep this
          letter short, useful and rare.
        </p>
        <p>
          Your address goes nowhere else. I do not sell, share or trade lead lists, which is the
          reason your phone will not start ringing after you sign up.
        </p>
        <p class="font-semibold text-brand-ink"><?= e($SITE['tagline']) ?></p>
      </div>

      <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-4">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> Or just call me
        </a>
        <a href="faq.php" class="group inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
          Read the questions page
          <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
            <?= icon('arrow-ne', 'h-3.5 w-3.5', 2.4) ?>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
