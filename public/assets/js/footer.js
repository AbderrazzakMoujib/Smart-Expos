'use strict';

/* ── Scroll-to-top button ── */
(function ScrollToTop() {
  const btn = document.getElementById('backToTop');
  if (!btn) return;

  window.addEventListener('scroll', () => {
    btn.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });

  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
})();

/* ── Animate footer columns on scroll into view ── */
(function FooterReveal() {
  const cols = document.querySelectorAll('.sf-footer__col, .sf-footer__bottom');
  if (!cols.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (!entry.isIntersecting) return;
      setTimeout(() => {
        entry.target.style.opacity    = '1';
        entry.target.style.transform  = 'translateY(0)';
      }, i * 100);
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.15 });

  cols.forEach(col => {
    col.style.opacity   = '0';
    col.style.transform = 'translateY(28px)';
    col.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(col);
  });
})();
