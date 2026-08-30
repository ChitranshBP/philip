<?php
/**
 * Privacy Policy.
 *
 * IMPORTANT: this is a careful, honest starting draft written from how the
 * site actually behaves — it is not legal advice. Before launch it needs a
 * review by someone who knows Medicare marketing rules (CMS), TCPA consent
 * and Florida insurance regulation. If analytics, a chat widget or an email
 * platform are added later, this page must be updated to match.
 */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/functions.php';

$pageTitle  = 'Privacy Policy — ' . $SITE['company'];
$pageDesc   = 'What ' . $SITE['company'] . ' collects, why, who it is shared with, and how to '
            . 'have it removed.';
$updated    = 'August 2026';   // TODO: update whenever this page changes

/* Sections render into both the rail and the body. */
$sections = [
    'who-we-are' => 'Who we are',
    'what-we-collect' => 'What we collect',
    'why' => 'Why we collect it',
    'sharing' => 'Who we share it with',
    'third-parties' => 'Services this site relies on',
    'keeping' => 'How long we keep it',
    'your-choices' => 'Your choices',
    'calls' => 'Calls, texts and email',
    'security' => 'Security',
    'children' => 'Children',
    'changes' => 'Changes to this policy',
    'contact-us' => 'How to reach us',
];

require __DIR__ . '/inc/header.php';
?>

<section class="bg-brand-mist pb-12 pt-[9rem] lg:pb-16 lg:pt-[11rem]">
  <div class="mx-auto max-w-content px-5 lg:px-8">
    <div class="max-w-3xl">
      <p class="eyebrow text-brand-ocean">Legal</p>
      <h1 class="mt-4 font-display text-[2.3rem] font-bold leading-[1.06] tracking-tight text-brand-navy sm:text-[2.9rem]">
        Privacy Policy
      </h1>
      <p class="mt-5 text-[1.1rem] leading-relaxed text-brand-slate">
        The short version: I collect only what I need to help you, I do not sell or trade lead
        lists, and your details go to the carrier you choose and nowhere else.
      </p>
      <p class="mt-4 text-[0.95rem] font-semibold text-brand-slate">Last updated <?= e($updated) ?></p>
    </div>
  </div>
</section>

<section class="bg-white py-14 lg:py-20">
  <div class="mx-auto grid max-w-content gap-12 px-5 lg:grid-cols-[.3fr_.7fr] lg:gap-16 lg:px-8">

    <nav aria-label="On this page" class="lg:sticky lg:top-32 lg:self-start">
      <p class="text-[0.78rem] font-bold uppercase tracking-[0.16em] text-brand-slate">On this page</p>
      <ul class="mt-4 space-y-0.5">
        <?php foreach ($sections as $id => $label): ?>
          <li><a href="#<?= e($id) ?>" class="block rounded-xl px-3 py-2 text-[0.97rem] font-semibold text-brand-slate transition hover:bg-brand-mist hover:text-brand-ocean"><?= e($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="prose-trucare min-w-0 space-y-10">

      <div id="who-we-are" class="scroll-mt-32">
        <h2>Who we are</h2>
        <p>
          This site belongs to <?= e($SITE['company']) ?>, an independent insurance agency owned by
          <?= e($SITE['agent_name']) ?>, a licensed insurance agent based in
          <?= e($SITE['address']['city']) ?>, <?= e($SITE['address']['state']) ?>. When this policy
          says &ldquo;we&rdquo; or &ldquo;I&rdquo;, that is who it means.
        </p>
      </div>

      <div id="what-we-collect" class="scroll-mt-32">
        <h2>What we collect</h2>
        <p>Only what you give us. There is no account to create and no login.</p>
        <ul>
          <li><strong>From the contact form:</strong> your name, phone number, ZIP code, and optionally your email address, what you would like help with, when it suits you to talk, and anything you write in the message box.</li>
          <li><strong>From the newsletter form:</strong> your first name, email address, and optionally your ZIP code.</li>
          <li><strong>When we speak:</strong> if you decide to go further, I will ask about your doctors, your prescriptions and your budget so that I can compare plans properly. That information is used to advise you and to complete an application if you choose one.</li>
        </ul>
        <p>
          We do not run advertising trackers or analytics on this site, and we do not build a
          profile of what you read here.
        </p>
      </div>

      <div id="why" class="scroll-mt-32">
        <h2>Why we collect it</h2>
        <ul>
          <li>To reply to you, and to call you back when you have asked us to.</li>
          <li>To compare the plans genuinely available where you live against the doctors and prescriptions you want to keep.</li>
          <li>To submit an application to the carrier you choose, if you choose one.</li>
          <li>To stay your agent afterwards &mdash; ID cards, claims questions, and the free review each autumn.</li>
          <li>To send the newsletter, if you asked for it.</li>
        </ul>
      </div>

      <div id="sharing" class="scroll-mt-32">
        <h2>Who we share it with</h2>
        <p>
          <strong>We do not sell, rent or trade your information, and we do not supply lead
          lists.</strong> That is the reason your phone will not start ringing after you contact us.
        </p>
        <p>Your details are shared only:</p>
        <ul>
          <li>with the insurance carrier whose plan you decide to apply for;</li>
          <li>with the service providers listed below, who process data on our behalf;</li>
          <li>where the law requires it, or a regulator with authority over insurance business asks for it.</li>
        </ul>
      </div>

      <div id="third-parties" class="scroll-mt-32">
        <h2>Services this site relies on</h2>
        <p>
          Being straight with you about what loads in your browser and where form submissions go:
        </p>
        <ul>
          <li><strong>Netlify</strong> hosts this website and receives what you type into the contact and newsletter forms. Their servers also record standard technical information, such as your IP address, whenever a page is requested.</li>
          <li><strong>Google Fonts</strong> serves the typeface. Loading it means your browser makes a request to Google, which reveals your IP address to them.</li>
          <li><strong>Tailwind CSS (jsDelivr/CDN)</strong> serves the styling framework, in the same way.</li>
        </ul>
        <p>
          Each of these has its own privacy policy, and none of them is given your form details for
          their own marketing.
        </p>
      </div>

      <div id="keeping" class="scroll-mt-32">
        <h2>How long we keep it</h2>
        <p>
          Enquiries that do not lead anywhere are kept only as long as they are useful, and are
          then deleted. Records connected to a policy we placed for you are kept for as long as
          insurance and tax rules require, which is generally several years after the policy ends.
          Newsletter addresses are kept until you unsubscribe.
        </p>
      </div>

      <div id="your-choices" class="scroll-mt-32">
        <h2>Your choices</h2>
        <ul>
          <li><strong>See it or correct it.</strong> Ask, and I will tell you what I hold and fix anything wrong.</li>
          <li><strong>Have it deleted.</strong> Ask, and I will delete it, except anything I am legally required to retain.</li>
          <li><strong>Stop the newsletter.</strong> One click at the bottom of any issue, or just tell me.</li>
          <li><strong>Stop the calls.</strong> Say so once and it stops. No argument, no retention script.</li>
        </ul>
        <p>Call <a href="tel:<?= e($SITE['phone_raw']) ?>"><?= e($SITE['phone']) ?></a> or email <a href="mailto:<?= e($SITE['email']) ?>"><?= e($SITE['email']) ?></a>.</p>
      </div>

      <div id="calls" class="scroll-mt-32">
        <h2>Calls, texts and email</h2>
        <p>
          When you submit the contact form you are asking a licensed insurance agent to contact you
          about Medicare plan options, and you are agreeing that we may do so by phone, text or
          email at the details you gave. Standard message and data rates may apply to texts. You
          can withdraw that permission at any time, and we will stop.
        </p>
      </div>

      <div id="security" class="scroll-mt-32">
        <h2>Security</h2>
        <p>
          This site is served over an encrypted connection, and form submissions are transmitted
          encrypted. No system is perfectly secure, so please do not send Social Security numbers,
          Medicare numbers, bank details or medical records through the website forms or by plain
          email &mdash; when that information is genuinely needed, we will collect it a safer way.
        </p>
      </div>

      <div id="children" class="scroll-mt-32">
        <h2>Children</h2>
        <p>
          This site is intended for adults making insurance decisions. We do not knowingly collect
          information from children.
        </p>
      </div>

      <div id="changes" class="scroll-mt-32">
        <h2>Changes to this policy</h2>
        <p>
          If what we collect or how we use it changes, this page changes with it and the date at
          the top is updated. Material changes will be flagged clearly rather than slipped in.
        </p>
      </div>

      <div id="contact-us" class="scroll-mt-32">
        <h2>How to reach us</h2>
        <p>
          <strong><?= e($SITE['company']) ?></strong><br>
          <?= e($SITE['agent_name']) ?>, <?= e($SITE['agent_title']) ?><br>
          <?= e($SITE['address_line']) ?><br>
          <a href="tel:<?= e($SITE['phone_raw']) ?>"><?= e($SITE['phone']) ?></a> &middot;
          <a href="mailto:<?= e($SITE['email']) ?>"><?= e($SITE['email']) ?></a>
        </p>
      </div>

      <div class="rounded-[1.4rem] border border-brand-ocean/20 bg-brand-aqua/50 p-6">
        <p class="leading-relaxed text-brand-ink">
          We do not offer every plan available in your area. Any information we provide is limited
          to those plans we do offer in your area. Please contact
          <a href="https://www.medicare.gov" class="underline">Medicare.gov</a> or
          1-800-MEDICARE (TTY 1-877-486-2048), 24 hours a day, 7 days a week, to get information
          on all of your options.
        </p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php';
