/* ============================================================
   SALONS PAGE — Smart Expos & Events Morocco
   ============================================================ */

(function () {
  'use strict';

  var cards = Array.from(document.querySelectorAll('.ss-card'));

  /* ── Scroll reveal with stagger ── */
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry, i) {
        if (entry.isIntersecting) {
          var el = entry.target;
          setTimeout(function () { el.classList.add('is-visible'); }, i * 100);
          io.unobserve(el);
        }
      });
    }, { threshold: 0.08 });
    cards.forEach(function (el) { io.observe(el); });
  } else {
    cards.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ── 3D tilt on hover (desktop only) ── */
  if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    cards.forEach(function (card) {
      card.addEventListener('mousemove', function (e) {
        var rect  = card.getBoundingClientRect();
        var x     = e.clientX - rect.left;
        var y     = e.clientY - rect.top;
        var cx    = rect.width  / 2;
        var cy    = rect.height / 2;
        var tiltX = ((y - cy) / cy) * 6;
        var tiltY = ((x - cx) / cx) * -6;
        card.style.transform = 'perspective(900px) rotateX(' + tiltX + 'deg) rotateY(' + tiltY + 'deg) translateY(-4px)';
      });

      card.addEventListener('mouseleave', function () {
        card.style.transform = '';
      });
    });
  }

})();
