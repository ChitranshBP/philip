<?php
/**
 * Medicare questions and answers.
 *
 * The client asked for a Q&A laid out like faithinsurancesolutions.com.
 * Questions and answers come from $faqs / $glossary in inc/data.php-style
 * arrays below, rewritten in Philip's voice from his own brief.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';

$pageTitle = 'Medicare Questions & Answers — ' . $SITE['company'];
$pageDesc  = 'Plain-English answers on Medicare eligibility, enrolment windows, late-enrolment '
           . 'penalties, Advantage plans, Medigap letters and Part D — from ' . $SITE['agent_name']
           . ', a licensed agent in ' . $SITE['address']['city'] . '.';

require __DIR__ . '/inc/faqs.php';
$groups = $faqGroups;

require __DIR__ . '/inc/header.php';
?>

<!-- ═════════════════ PAGE HERO ═════════════════ -->
<section class="bg-brand-mist pb-14 pt-[9rem] lg:pb-20 lg:pt-[11rem]">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-3xl">
      <p class="eyebrow text-brand-ocean">Questions &amp; answers</p>
      <h1 class="mt-4 font-display text-[2.4rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[3rem] lg:text-[3.4rem]">
        Medicare, answered<br class="hidden sm:block"> in <span class="text-brand-ocean">plain English.</span>
      </h1>
      <p class="mt-6 max-w-2xl text-[1.15rem] leading-relaxed text-brand-slate">
        The questions I am asked most, answered the way I would answer them at your kitchen table.
        Not finding yours? That is exactly what the phone is for.
      </p>
    </div>
  </div>
</section>

<!-- ═════════════════ PHILIP'S NOTE ═════════════════ -->
<section class="border-y border-brand-line bg-white py-14 lg:py-16">
  <div class="mx-auto grid max-w-content gap-10 px-5 lg:grid-cols-[1fr_1fr] lg:gap-16 lg:px-8">
    <div>
      <h2 class="font-display text-[1.8rem] font-bold leading-[1.12] tracking-tight text-brand-navy sm:text-[2.2rem]">
        A NASA rocket scientist, a plumber and a kindergarten teacher walk into Medicare.
      </h2>
      <p class="mt-5 text-[1.08rem] leading-relaxed text-brand-slate">
        It would confuse every single one of them. And I get it, I really do. When people first sit
        down with me, the most common thing I hear is &ldquo;Philip, I just want someone to tell me
        what to pick.&rdquo;
      </p>
    </div>
    <div class="space-y-5 text-[1.08rem] leading-relaxed text-brand-slate">
      <p>
        I wish it were that simple. The honest truth is that the right plan depends entirely on your
        situation, and no two situations are the same. There are hundreds of plans out there. What
        works beautifully for your neighbour may be completely wrong for you.
      </p>
      <p>
        When I sit down with a client I am looking at your doctors, your prescriptions, your budget,
        and what matters most in your day-to-day life. Almost every time, one plan rises to the top
        as the clear fit. But getting there takes a real conversation, not a guess.
      </p>
      <p class="font-semibold text-brand-ink"><?= e($SITE['tagline']) ?></p>
    </div>
  </div>
</section>

<!-- ═════════════════ THE Q&A ═════════════════ -->
<section class="bg-brand-mist py-16 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[.32fr_.68fr] lg:gap-16 lg:px-8">

    <nav aria-label="Jump to a topic" class="lg:sticky lg:top-32 lg:self-start">
      <p class="text-[0.78rem] font-bold uppercase tracking-[0.16em] text-brand-slate">On this page</p>
      <ul class="mt-4 space-y-1">
        <?php foreach (array_keys($groups) as $g): ?>
          <li>
            <a href="#<?= e(slug($g)) ?>" class="block rounded-xl px-3 py-2 font-semibold text-brand-navy transition hover:bg-white hover:text-brand-ocean">
              <?= e($g) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="mt-8 rounded-[1.4rem] border border-brand-ocean/20 bg-brand-aqua/50 p-6">
        <p class="font-display text-[1.15rem] font-bold leading-snug text-brand-navy">Still not sure?</p>
        <p class="mt-2 text-[0.98rem] leading-relaxed text-brand-slate">
          Ring me and ask. No question is too small or too late.
        </p>
        <a href="tel:<?= e($SITE['phone_raw']) ?>" class="mt-4 inline-flex items-center gap-2 rounded-full bg-brand-ocean px-5 py-3 font-bold text-white transition hover:-translate-y-0.5 hover:bg-brand-sky">
          <?= icon('phone', 'h-[1.1rem] w-[1.1rem]') ?> <?= e($SITE['phone']) ?>
        </a>
      </div>
    </nav>

    <div class="space-y-12">
      <?php foreach ($groups as $group => $items): ?>
        <div id="<?= e(slug($group)) ?>" class="scroll-mt-32">
          <h2 class="font-display text-[1.5rem] font-bold leading-snug tracking-tight text-brand-navy sm:text-[1.8rem]">
            <?= e($group) ?>
          </h2>

          <div class="mt-5 space-y-3">
            <?php foreach ($items as $i => $f): ?>
              <details class="faq rounded-2xl border border-brand-line bg-white px-6 py-1 transition hover:border-brand-ocean/40"<?= $i === 0 ? ' open' : '' ?>>
                <summary class="flex items-center justify-between gap-5 py-5 font-display text-[1.14rem] font-semibold leading-snug text-brand-navy">
                  <span><?= e($f[0]) ?></span>
                  <span class="faq-chevron grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-ocean text-white"><?= icon('chevron', 'h-5 w-5', 2.4) ?></span>
                </summary>
                <div class="pb-6 pr-10 leading-relaxed text-brand-slate"><?= e($f[1]) ?></div>
              </details>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- Glossary -->
      <div id="glossary" class="scroll-mt-32 border-t-2 border-brand-navy/12 pt-10">
        <h2 class="font-display text-[1.5rem] font-bold leading-snug tracking-tight text-brand-navy sm:text-[1.8rem]">
          Plain-English glossary
        </h2>
        <dl class="mt-6 grid gap-x-10 gap-y-5 sm:grid-cols-2">
          <?php foreach ($glossary as $g): ?>
            <div>
              <dt class="font-bold text-brand-ocean"><?= e($g[0]) ?></dt>
              <dd class="mt-0.5 leading-snug text-brand-slate"><?= e($g[1]) ?></dd>
            </div>
          <?php endforeach; ?>
        </dl>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
