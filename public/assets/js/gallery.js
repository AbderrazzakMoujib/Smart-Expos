/* ============================================================
   GALLERY PAGE — Smart Expos & Events Morocco
   ============================================================ */

(function () {
  'use strict';

  var cards      = Array.from(document.querySelectorAll('.sg-logo-card'));
  var lightbox   = document.getElementById('sgLightbox');
  var lbImg      = document.getElementById('sgLbImg');
  var lbTitle    = document.getElementById('sgLbTitle');
  var lbCounter  = document.getElementById('sgLbCounter');
  var lbThumbs   = document.getElementById('sgLbThumbs');
  var lbPrev     = document.getElementById('sgLbPrev');
  var lbNext     = document.getElementById('sgLbNext');
  var lbClose    = document.getElementById('sgLbClose');
  var lbBackdrop = document.getElementById('sgLbBackdrop');

  var currentPhotos = [];
  var currentIdx    = 0;

  /* ── Scroll reveal ── */
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry, i) {
        if (entry.isIntersecting) {
          var el = entry.target;
          setTimeout(function () { el.classList.add('is-visible'); }, i * 90);
          io.unobserve(el);
        }
      });
    }, { threshold: 0.08 });
    cards.forEach(function (el) { io.observe(el); });
  } else {
    cards.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ── Flip card ── */
  cards.forEach(function (card) {
    if (!card.classList.contains('has-photos')) return;

    /* click on front → flip */
    var front = card.querySelector('.sg-logo-card__front');
    front.addEventListener('click', function () {
      card.classList.add('is-flipped');
    });

    /* close button on back → flip back */
    var closeBtn = card.querySelector('.sg-logo-card__back-close');
    if (closeBtn) {
      closeBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        card.classList.remove('is-flipped');
      });
    }

    /* click on a photo thumb → open lightbox */
    var thumbs = card.querySelectorAll('.sg-photo-thumb');
    thumbs.forEach(function (thumb, idx) {
      thumb.addEventListener('click', function (e) {
        e.stopPropagation();
        var raw = card.dataset.photos || '[]';
        var photos;
        try { photos = JSON.parse(raw); } catch (_) { photos = []; }
        openLightbox(photos, card.dataset.title || '', idx);
      });
    });
  });

  /* ── Lightbox: build thumbnails ── */
  function buildThumbs() {
    lbThumbs.innerHTML = '';
    currentPhotos.forEach(function (src, i) {
      var t   = document.createElement('div');
      t.className = 'sg-lb-thumb' + (i === currentIdx ? ' is-active' : '');
      var img = document.createElement('img');
      img.src     = src;
      img.alt     = '';
      img.loading = 'lazy';
      t.appendChild(img);
      t.addEventListener('click', function () { goTo(i); });
      lbThumbs.appendChild(t);
    });
  }

  function syncThumbs() {
    var els = lbThumbs.querySelectorAll('.sg-lb-thumb');
    els.forEach(function (t, i) { t.classList.toggle('is-active', i === currentIdx); });
    if (els[currentIdx]) {
      els[currentIdx].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
    }
  }

  /* ── Lightbox: navigate with 3D flip ── */
  function goTo(idx) {
    var direction = idx > currentIdx ? 1 : -1;
    currentIdx = (idx + currentPhotos.length) % currentPhotos.length;

    /* exit current */
    lbImg.classList.add(direction > 0 ? 'is-exit' : 'is-enter');
    lbImg.style.transform = direction > 0
      ? 'perspective(800px) rotateY(-25deg) scale(0.88) translateX(-30px)'
      : 'perspective(800px) rotateY(25deg) scale(0.88) translateX(30px)';

    setTimeout(function () {
      lbImg.classList.remove('is-exit', 'is-enter');
      /* enter from opposite side */
      var enterClass = direction > 0 ? 'is-enter' : 'is-exit';
      lbImg.classList.add(enterClass);
      lbImg.src = currentPhotos[currentIdx];
      lbCounter.textContent = (currentIdx + 1) + ' / ' + currentPhotos.length;
      syncThumbs();

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          lbImg.classList.remove(enterClass);
          lbImg.style.transform = '';
        });
      });
    }, 300);
  }

  /* ── Lightbox: open with dramatic entry ── */
  function openLightbox(photos, title, startIdx) {
    if (!photos || photos.length === 0) return;
    currentPhotos = photos;
    currentIdx    = startIdx || 0;
    lbTitle.textContent = title;
    buildThumbs();

    lbImg.src = '';
    lbImg.classList.add('is-loading');
    lbImg.src = currentPhotos[currentIdx];
    lbImg.onload = function () { lbImg.classList.remove('is-loading'); };

    lbCounter.textContent = (currentIdx + 1) + ' / ' + currentPhotos.length;
    lbPrev.style.display = currentPhotos.length > 1 ? '' : 'none';
    lbNext.style.display = currentPhotos.length > 1 ? '' : 'none';

    lightbox.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  /* ── Lightbox: close ── */
  function closeLightbox() {
    lightbox.classList.remove('is-open');
    document.body.style.overflow = '';
    setTimeout(function () {
      lbImg.src = '';
      lbThumbs.innerHTML = '';
    }, 300);
  }

  /* ── Controls ── */
  lbPrev.addEventListener('click', function () { goTo(currentIdx - 1); });
  lbNext.addEventListener('click', function () { goTo(currentIdx + 1); });
  lbClose.addEventListener('click', closeLightbox);
  lbBackdrop.addEventListener('click', closeLightbox);

  /* ── Keyboard ── */
  document.addEventListener('keydown', function (e) {
    if (!lightbox.classList.contains('is-open')) return;
    if (e.key === 'Escape')     closeLightbox();
    if (e.key === 'ArrowLeft')  goTo(currentIdx - 1);
    if (e.key === 'ArrowRight') goTo(currentIdx + 1);
  });

  /* ── Touch swipe on lightbox image ── */
  var touchX = 0;
  lbImg.addEventListener('touchstart', function (e) {
    touchX = e.changedTouches[0].clientX;
  }, { passive: true });
  lbImg.addEventListener('touchend', function (e) {
    var dx = e.changedTouches[0].clientX - touchX;
    if (Math.abs(dx) > 40) goTo(currentIdx + (dx < 0 ? 1 : -1));
  });


})();
