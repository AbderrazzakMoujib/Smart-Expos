(function () {
  'use strict';

  /* ── Counter animation ── */
  function easeOutQuart(t) {
    return 1 - Math.pow(1 - t, 4);
  }

  function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const duration = 1800;
    const start = performance.now();

    function tick(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      el.textContent = Math.floor(easeOutQuart(progress) * target);
      if (progress < 1) requestAnimationFrame(tick);
      else el.textContent = target;
    }

    requestAnimationFrame(tick);
  }

  /* ── Scroll-reveal for .sa-reveal elements ── */
  function initReveal() {
    const items = document.querySelectorAll('.sa-reveal');
    if (!items.length) return;

    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry, i) {
          if (entry.isIntersecting) {
            setTimeout(function () {
              entry.target.classList.add('is-visible');
            }, i * 120);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    items.forEach(function (el) { observer.observe(el); });
  }

  /* ── Counter trigger via IntersectionObserver ── */
  function initCounters() {
    const counters = document.querySelectorAll('.sa-counter');
    if (!counters.length) return;

    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.4 }
    );

    counters.forEach(function (el) { observer.observe(el); });
  }

  /* ── Orbit static placement + center panel on click ── */
  function initOrbit() {
    const orbit = document.querySelector('.sa-orbit');
    if (!orbit) return;

    const nodes = Array.from(orbit.querySelectorAll('.sa-orbit__node'));
    if (!nodes.length) return;

    const center      = orbit.querySelector('.sa-orbit__center');
    const centerIcon  = orbit.querySelector('.sa-orbit__center-icon');
    const centerTitle = orbit.querySelector('.sa-orbit__center-title');
    const centerText  = orbit.querySelector('.sa-orbit__center-text');

    /* angles : top=270°, right=0°, bottom=90°, left=180° */
    const ANGLES = [270, 0, 90, 180];

    function place() {
      const cx = orbit.offsetWidth  / 2;
      const cy = orbit.offsetHeight / 2;
      const r  = orbit.offsetWidth  * 0.415;

      nodes.forEach(function(node, i) {
        const rad = ANGLES[i] * Math.PI / 180;
        node.style.left = (cx + r * Math.cos(rad)) + 'px';
        node.style.top  = (cy + r * Math.sin(rad)) + 'px';
      });
    }

    function openNode(node) {
      const icon  = node.querySelector('.sa-orbit__icon')  ? node.querySelector('.sa-orbit__icon').textContent  : '';
      const title = node.querySelector('.sa-orbit__title') ? node.querySelector('.sa-orbit__title').textContent : '';
      const text  = node.querySelector('.sa-orbit__text')  ? node.querySelector('.sa-orbit__text').textContent  : '';

      centerIcon.textContent  = icon;
      centerTitle.textContent = title;
      centerText.textContent  = text;

      nodes.forEach(function(n) { n.classList.remove('is-active'); });
      node.classList.add('is-active');
      center.classList.add('has-active');
    }

    function closeAll() {
      nodes.forEach(function(n) { n.classList.remove('is-active'); });
      center.classList.remove('has-active');
    }

    nodes.forEach(function(node) {
      const btn = node.querySelector('.sa-orbit__dot');
      if (!btn) return;
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        if (node.classList.contains('is-active')) {
          closeAll();
        } else {
          openNode(node);
        }
      });
    });

    /* click outside orbit → close */
    document.addEventListener('click', function(e) {
      if (!orbit.contains(e.target)) closeAll();
    });

    place();
    window.addEventListener('resize', place);
  }

  /* ── Init ── */
  document.addEventListener('DOMContentLoaded', function () {
    initReveal();
    initCounters();
    initOrbit();
  });
})();
