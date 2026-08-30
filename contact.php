<?php
/**
 * Contact — the form Philip's leads arrive through.
 *
 * DEPLOYMENT NOTE: the site is published to Netlify as static HTML, so PHP
 * never runs in production. The form is therefore a Netlify Form
 * (data-netlify="true" + the hidden form-name input), which Netlify detects
 * when it parses the built HTML. Submissions land in the Netlify dashboard;
 * set an email notification there so Philip is told immediately.
 *
 * inc/form-handler.php is still in the repo and still works if the site is
 * ever moved to PHP hosting — remove the action and the data-netlify
 * attributes and it takes over.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';

$pageTitle = 'Contact ' . $SITE['agent_name'] . ' — ' . $SITE['company'];
$pageDesc  = 'Call ' . $SITE['phone'] . ' or send a note. ' . $SITE['agent_name']
           . ' answers his own phone, seven days a week, across ' . $SITE['service_area'] . '.';

$interests = [
    'Turning 65 for the first time',
    'Reviewing the plan I already have',
    'Medicare Advantage or Medigap',
    'Prescription drug costs',
    'Dental, vision and hearing',
    'Travel cover',
    'Life, final expense or annuities',
    'Something else',
];

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="bg-brand-mist pb-12 pt-[9rem] lg:pb-16 lg:pt-[11rem]">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-3xl">
      <p class="eyebrow text-brand-ocean">Contact</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.4rem]">
        I answer my <span class="text-brand-ocean">own phone.</span>
      </h1>
      <p class="mt-6 max-w-2xl text-[1.15rem] leading-relaxed text-brand-slate">
        Seven days a week. If I do not pick up it is because I am with another client, and I will
        call you back &mdash; that is a promise I have kept for <?= e($SITE['years']) ?> years.
      </p>
    </div>
  </div>
</section>

<!-- ═════════════════ WAYS TO REACH ME ═════════════════ -->
<section class="border-y border-brand-line bg-white py-10">
  <div class="mx-auto grid max-w-content gap-8 px-5 sm:grid-cols-3 lg:px-8">
    <a href="tel:<?= e($SITE['phone_raw']) ?>" class="group flex items-start gap-4">
      <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-ocean text-white transition group-hover:scale-105"><?= icon('phone', 'h-5 w-5') ?></span>
      <span>
        <span class="block text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate">Call, best of all</span>
        <span class="mt-1 block font-display text-[1.3rem] font-bold text-brand-navy"><?= e($SITE['phone']) ?></span>
        <span class="mt-0.5 block text-[0.95rem] text-brand-slate"><?= e($SITE['hours']) ?></span>
      </span>
    </a>

    <a href="mailto:<?= e($SITE['email']) ?>" class="group flex items-start gap-4">
      <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-aqua text-brand-ocean transition group-hover:scale-105"><?= icon('mail', 'h-5 w-5') ?></span>
      <span class="min-w-0">
        <span class="block text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate">Email</span>
        <span class="mt-1 block break-all font-semibold text-brand-navy"><?= e($SITE['email']) ?></span>
        <span class="mt-0.5 block text-[0.95rem] text-brand-slate">A reply within a day</span>
      </span>
    </a>

    <div class="flex items-start gap-4">
      <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-foam text-brand-ink"><?= icon('pin', 'h-5 w-5') ?></span>
      <span>
        <span class="block text-[0.75rem] font-bold uppercase tracking-[0.16em] text-brand-slate">Where I work</span>
        <span class="mt-1 block font-semibold text-brand-navy"><?= e($SITE['address']['city']) ?>, <?= e($SITE['address']['state']) ?></span>
        <span class="mt-0.5 block text-[0.95rem] leading-snug text-brand-slate"><?= e($SITE['service_area']) ?></span>
      </span>
    </div>
  </div>
</section>

<!-- ═════════════════ THE FORM ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[.85fr_1.15fr] lg:gap-16 lg:px-8">

    <div class="lg:sticky lg:top-32 lg:self-start">
      <h2 class="font-display text-[1.9rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.2rem]">
        Or leave me the details and I will ring you.
      </h2>
      <p class="mt-5 leading-relaxed text-brand-slate">
        Nothing here commits you to anything. No cost, no obligation to switch, and your details go
        to the carrier you choose and nowhere else &mdash; I do not sell or trade lead lists.
      </p>
      <img src="assets/img/about/sarasota-coast.jpg" width="1600" height="899" loading="lazy" decoding="async"
           alt="The Ringling Bridge over Sarasota Bay"
           class="mt-8 hidden aspect-[16/10] w-full rounded-[1.75rem] object-cover shadow-lift lg:block">
    </div>

    <form name="contact" method="POST" action="/thank-you.html" data-netlify="true" netlify-honeypot="company"
          class="rounded-[1.75rem] bg-white p-7 shadow-soft sm:p-9">
      <input type="hidden" name="form-name" value="contact">
      <p class="hidden">
        <label>Leave this empty: <input name="company" tabindex="-1" autocomplete="off"></label>
      </p>

      <div class="grid gap-5 sm:grid-cols-2">
        <div>
          <label for="f-name" class="block font-semibold text-brand-navy">Your name</label>
          <input id="f-name" name="name" type="text" autocomplete="name" required class="field mt-2">
        </div>
        <div>
          <label for="f-phone" class="block font-semibold text-brand-navy">Phone</label>
          <input id="f-phone" name="phone" type="tel" autocomplete="tel" required class="field mt-2">
        </div>
        <div>
          <label for="f-email" class="block font-semibold text-brand-navy">Email <span class="font-normal text-brand-slate">(optional)</span></label>
          <input id="f-email" name="email" type="email" autocomplete="email" class="field mt-2">
        </div>
        <div>
          <label for="f-zip" class="block font-semibold text-brand-navy">ZIP code</label>
          <input id="f-zip" name="zip" type="text" inputmode="numeric" autocomplete="postal-code" required class="field mt-2">
          <p class="mt-1.5 text-[0.9rem] text-brand-slate">Plans differ county by county, so this one matters.</p>
        </div>
      </div>

      <div class="mt-5">
        <label for="f-interest" class="block font-semibold text-brand-navy">What is on your mind?</label>
        <select id="f-interest" name="interest" class="field mt-2">
          <?php foreach ($interests as $i): ?>
            <option><?= e($i) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mt-5">
        <label for="f-time" class="block font-semibold text-brand-navy">Best time to call</label>
        <select id="f-time" name="best_time" class="field mt-2">
          <option>Any time</option>
          <option>Morning</option>
          <option>Afternoon</option>
          <option>Evening</option>
          <option>Weekend</option>
        </select>
      </div>

      <div class="mt-5">
        <label for="f-message" class="block font-semibold text-brand-navy">Anything else <span class="font-normal text-brand-slate">(optional)</span></label>
        <textarea id="f-message" name="message" rows="4" class="field mt-2" placeholder="Your doctors, your prescriptions, or the letter that confused you."></textarea>
      </div>

      <button type="submit" class="mt-7 inline-flex w-full items-center justify-center gap-3 rounded-full bg-brand-ocean px-8 py-4 text-[1.05rem] font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky sm:w-auto">
        <?= icon('arrow', 'h-5 w-5') ?> Send it to Philip
      </button>

      <p class="mt-5 text-[0.92rem] leading-relaxed text-brand-slate">
        By submitting, you agree that a licensed agent may contact you about Medicare plan options.
        Your details are never sold or shared.
      </p>
    </form>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
