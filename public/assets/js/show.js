/* ============================================================
   SHOW (EVENT DETAIL) PAGE — Smart Expos & Events Morocco
   ============================================================ */

(function () {
  'use strict';

  /* ── Lightbox ── */
  var lightbox = document.getElementById('svLightbox');
  var lbImg    = document.getElementById('svLbImg');
  var lbClose  = document.getElementById('svLbClose');

  document.querySelectorAll('.sv-gallery__item').forEach(function (item) {
    item.addEventListener('click', function () {
      var src = item.dataset.src;
      lbImg.src = '';
      lbImg.src = src;
      lightbox.classList.add('is-open');
      document.body.style.overflow = 'hidden';
    });
  });

  function closeLb() {
    lightbox.classList.remove('is-open');
    document.body.style.overflow = '';
    setTimeout(function () { lbImg.src = ''; }, 400);
  }

  lbClose.addEventListener('click', closeLb);
  lightbox.querySelector('.sv-lightbox__backdrop').addEventListener('click', closeLb);
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeLb();
  });

  /* ── Hero parallax (image only, not video) ── */
  var heroImg = document.querySelector('.sv-hero__img:not(.sv-hero__video)');
  if (heroImg) {
    window.addEventListener('scroll', function () {
      var scrollY = window.scrollY;
      if (scrollY < 600) {
        heroImg.style.transform = 'translateY(' + (scrollY * 0.25) + 'px)';
      }
    }, { passive: true });
  }

})();
