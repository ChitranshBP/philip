<?php
/**
 * Where both Netlify forms land after a successful submission.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';

$pageTitle = 'Thank you — ' . $SITE['company'];
$pageDesc  = 'Your message reached ' . $SITE['agent_name'] . '. He will be in touch shortly.';

require __DIR__ . '/inc/header.php';
?>

<section class="flex min-h-[70vh] items-center bg-brand-mist pb-16 pt-[9rem] lg:pt-[11rem]">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-2xl rounded-[1.75rem] bg-white p-9 shadow-lift sm:p-12">
      <span class="grid h-14 w-14 place-items-center rounded-2xl bg-brand-aqua text-brand-ocean">
        <?= icon('check', 'h-7 w-7', 2.4) ?>
      </span>

      <h1 class="mt-6 font-display text-[2rem] font-bold leading-[1.1] tracking-tight text-brand-navy sm:text-[2.6rem]">
        Got it. Thank you.
      </h1>
      <p class="mt-5 text-[1.12rem] leading-relaxed text-brand-slate">
        Your note is with me and I will be in touch shortly &mdash; usually the same day, and
        always within one working day. If it is urgent, ring me instead and I will pick up if
        I am not with a client.
      </p>

      <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="inline-flex items-center gap-3 rounded-full bg-brand-ocean px-7 py-4 font-bold text-white shadow-blue transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-5 w-5') ?> <?= e($SITE['phone']) ?>
        </a>
        <a href="index.php" class="group inline-flex items-center gap-2 font-bold text-brand-ocean transition hover:text-brand-navy">
          Back to the home page
          <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-ocean/12 transition group-hover:bg-brand-ocean group-hover:text-white">
            <?= icon('arrow', 'h-3.5 w-3.5', 2.4) ?>
          </span>
        </a>
      </div>

      <p class="mt-8 border-t border-brand-line pt-6 font-display text-[1.15rem] font-bold text-brand-navy">
        <?= e($SITE['tagline']) ?>
      </p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
