<?php
/**
 * Shared page chrome — </main>, the footer, the mobile call bar and the
 * site JavaScript. Pair with inc/header.php.
 */
$year = date('Y');
?>
</main>

<!-- ═════════════════ FOOTER ═════════════════ -->
<footer class="border-t border-brand-line bg-brand-mist text-brand-slate">
  <div class="mx-auto max-w-content px-5 py-16 lg:px-8">

    <div class="grid gap-12 lg:grid-cols-[1.4fr_1fr_1fr]">
      <div>
        <img src="<?= e($SITE['logo']) ?>" alt="<?= e($SITE['logo_alt']) ?>" width="1080" height="280"
             loading="lazy" class="site-logo h-11 w-auto">
        <p class="mt-5 font-display text-[1.35rem] font-bold leading-snug text-brand-navy">
          <?= e($SITE['tagline']) ?>
        </p>
        <p class="mt-3 max-w-sm leading-relaxed text-brand-slate">
          Independent, licensed Medicare guidance for <?= e($SITE['service_area']) ?>. Free help, honest answers, and someone who still picks up the phone in February.
        </p>
        <p class="mt-5 text-[0.95rem] text-brand-slate"><?= e($SITE['license']) ?></p>
      </div>

      <nav aria-label="Footer">
        <h2 class="font-display text-[1.15rem] font-semibold text-brand-navy">Explore</h2>
        <ul class="mt-4 space-y-2.5 text-brand-slate">
          <?php foreach ($nav as $href => $label): ?>
            <li><a href="<?= e($href) ?>" class="hover:text-brand-ocean"><?= e($label) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <div>
        <h2 class="font-display text-[1.15rem] font-semibold text-brand-navy">Get in touch</h2>
        <ul class="mt-4 space-y-3 text-brand-slate">
          <li class="flex items-start gap-3"><?= icon('phone', 'mt-1 h-5 w-5 shrink-0 text-brand-ocean') ?><a href="tel:<?= e($SITE['phone_raw']) ?>" class="font-bold text-brand-navy hover:text-brand-ocean"><?= e($SITE['phone']) ?></a></li>
          <li class="flex items-start gap-3"><?= icon('mail', 'mt-1 h-5 w-5 shrink-0 text-brand-ocean') ?><a href="mailto:<?= e($SITE['email']) ?>" class="break-all hover:text-brand-ocean"><?= e($SITE['email']) ?></a></li>
          <li class="flex items-start gap-3"><?= icon('pin', 'mt-1 h-5 w-5 shrink-0 text-brand-ocean') ?><span><?= e($SITE['address_line']) ?></span></li>
          <li class="flex items-start gap-3"><?= icon('clock', 'mt-1 h-5 w-5 shrink-0 text-brand-ocean') ?><span><?= e($SITE['hours']) ?></span></li>
        </ul>
      </div>
    </div>

    <!-- Medicare marketing disclaimers -->
    <div class="mt-14 space-y-3 border-t border-brand-line pt-8 text-[0.92rem] leading-relaxed text-brand-slate">
      <p>We do not offer every plan available in your area. Any information we provide is limited to those plans we do offer in your area. Please contact <a href="https://www.medicare.gov" class="underline hover:text-brand-ocean">Medicare.gov</a> or 1-800-MEDICARE (TTY 1-877-486-2048), 24 hours a day / 7 days a week, to get information on all of your options.</p>
      <p>Not connected with or endorsed by the United States government or the federal Medicare program. This is a solicitation for insurance. A licensed insurance agent may contact you.</p>
      <p>Enrollment in a plan may be limited to certain times of the year unless you qualify for a Special Enrollment Period.</p>
    </div>

    <div class="mt-8 flex flex-col gap-5 border-t border-brand-line pt-8 text-[0.92rem] text-brand-slate lg:flex-row lg:items-center lg:justify-between">
      <p>&copy; <?= $year ?> <?= e($SITE['company']) ?>. All rights reserved.</p>

      <?php /* The A A A control. The JS below remembers the choice. */ ?>
      <div class="no-print flex items-center gap-2">
        <span class="font-semibold">Text size</span>
        <div class="flex items-center gap-1 rounded-full bg-white p-1" role="group" aria-label="Adjust text size">
          <button type="button" data-fs=""      class="rounded-full px-3 py-1 text-[0.85rem] font-bold transition hover:bg-brand-foam" aria-label="Normal text size">A</button>
          <button type="button" data-fs="fs-lg" class="rounded-full px-3 py-1 text-[1rem] font-bold transition hover:bg-brand-foam"    aria-label="Large text size">A</button>
          <button type="button" data-fs="fs-xl" class="rounded-full px-3 py-1 text-[1.15rem] font-bold transition hover:bg-brand-foam" aria-label="Extra large text size">A</button>
        </div>
      </div>

      <p class="flex gap-5">
        <a href="privacy-policy.php" class="hover:text-brand-ocean">Privacy Policy</a>
        <a href="accessibility.php" class="hover:text-brand-ocean">Accessibility</a>
      </p>
    </div>
  </div>
</footer>

<!-- Sticky call bar for phones -->
<div class="no-print fixed inset-x-0 bottom-0 z-50 grid grid-cols-2 gap-2 border-t border-brand-line bg-white/95 p-2.5 backdrop-blur md:hidden">
  <a href="tel:<?= e($SITE['phone_raw']) ?>" class="flex items-center justify-center gap-2 rounded-full bg-brand-ocean px-4 py-3.5 font-bold text-white">
    <?= icon('phone', 'h-5 w-5') ?> Call now
  </a>
  <a href="contact.php" class="flex items-center justify-center gap-2 rounded-full bg-brand-burn px-4 py-3.5 font-bold text-white">Free review</a>
</div>
<div class="h-[4.5rem] md:hidden" aria-hidden="true"></div>

<script>
(function () {
  'use strict';
  var reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Mobile navigation ---------- */
  var toggle = document.getElementById('navToggle'),
      menu   = document.getElementById('mobileNav'),
      iOpen  = document.getElementById('navIconOpen'),
      iClose = document.getElementById('navIconClose');

  /* ---------- Header: transparent on the hero, solid after it ---------- */
  var siteTop = document.getElementById('siteTop'), navOpen = false;

  function paintHeader() {
    var alwaysSolid = siteTop.dataset.solid === '1';
    siteTop.classList.toggle('is-solid', alwaysSolid || navOpen || window.scrollY > 80);
  }
  addEventListener('scroll', paintHeader, { passive: true });
  paintHeader();

  function setNav(open) {
    navOpen = open;
    menu.classList.toggle('hidden', !open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    iOpen.classList.toggle('hidden', open);
    iClose.classList.toggle('hidden', !open);
    paintHeader();
  }
  toggle.addEventListener('click', function () { setNav(menu.classList.contains('hidden')); });
  menu.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', function () { setNav(false); }); });

  /* ---------- Testimonial slider ---------- */
  var track = document.getElementById('reviewTrack'),
      revNav = document.getElementById('reviewNav');

  if (track && revNav) {
    var revBtns = revNav.querySelectorAll('[data-slide]');

    function step() {
      var card = track.firstElementChild;
      return card ? card.getBoundingClientRect().width + 24 : track.clientWidth;
    }

    function paintSlider() {
      // Nothing to scroll (three cards on a wide screen) — hide the arrows.
      // Inline style, because the utility class on the wrapper sets display.
      var overflow = track.scrollWidth - track.clientWidth;
      revNav.style.display = overflow < 8 ? 'none' : 'flex';

      var atStart = track.scrollLeft < 8,
          atEnd   = track.scrollLeft >= overflow - 8;
      revBtns.forEach(function (b) {
        b.disabled = b.dataset.slide === 'prev' ? atStart : atEnd;
      });
    }

    revBtns.forEach(function (b) {
      b.addEventListener('click', function () {
        track.scrollBy({ left: b.dataset.slide === 'prev' ? -step() : step(), behavior: reduce ? 'auto' : 'smooth' });
      });
    });

    track.addEventListener('scroll', paintSlider, { passive: true });
    addEventListener('resize', paintSlider);
    paintSlider();
  }

  /* ---------- Text size preference ---------- */
  var SIZES = ['', 'fs-lg', 'fs-xl'], fsBtns = document.querySelectorAll('[data-fs]');
  function applyFs(size) {
    SIZES.forEach(function (s) { if (s) document.documentElement.classList.remove(s); });
    if (size) document.documentElement.classList.add(size);
    fsBtns.forEach(function (b) {
      var on = b.dataset.fs === size;
      b.classList.toggle('bg-brand-ocean', on);
      b.classList.toggle('text-white', on);
      b.setAttribute('aria-pressed', String(on));
    });
    try { localStorage.setItem('fs', size); } catch (e) {}
  }
  fsBtns.forEach(function (b) { b.addEventListener('click', function () { applyFs(b.dataset.fs); }); });
  var savedFs = ''; try { savedFs = localStorage.getItem('fs') || ''; } catch (e) {}
  applyFs(SIZES.indexOf(savedFs) > -1 ? savedFs : '');

  /* ---------- Gentle reveal on scroll ---------- */
  if ('IntersectionObserver' in window && !reduce) {
    var rio = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('rise'); rio.unobserve(en.target); }
      });
    }, { rootMargin: '0px 0px -10% 0px' });
    document.querySelectorAll('section article, section ol > li, section figure').forEach(function (el, i) {
      el.style.animationDelay = (i % 4) * 0.07 + 's';
      rio.observe(el);
    });
  }

})();
</script>
</body>
</html>
