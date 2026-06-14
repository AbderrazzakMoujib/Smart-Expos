/* ============================================================
   CONTACT PAGE — Smart Expos & Events Morocco
   ============================================================ */

(function () {
  'use strict';

  /* ── Scroll reveal for info cards ── */
  var infoCards = Array.from(document.querySelectorAll('.sc-info-card'));
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry, i) {
        if (entry.isIntersecting) {
          setTimeout(function () { entry.target.classList.add('is-visible'); }, i * 120);
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    infoCards.forEach(function (el) { io.observe(el); });
  } else {
    infoCards.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ── Form validation + AJAX submit ── */
  var form     = document.getElementById('scContactForm');
  var success  = document.getElementById('scSuccess');
  if (!form) return;

  function showError(input, msg) {
    var field = input.closest('.sc-field');
    field.classList.add('has-error');
    input.classList.add('is-error');
    var err = field.querySelector('.sc-field__error');
    if (err) err.textContent = msg;
  }

  function clearError(input) {
    var field = input.closest('.sc-field');
    field.classList.remove('has-error');
    input.classList.remove('is-error');
  }

  /* clear on input */
  form.querySelectorAll('input, textarea, select').forEach(function (el) {
    el.addEventListener('input', function () { clearError(el); });
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var valid = true;

    var name    = form.querySelector('[name="name"]');
    var email   = form.querySelector('[name="email"]');
    var message = form.querySelector('[name="message"]');

    if (!name.value.trim()) {
      showError(name, 'Le nom est requis.');
      valid = false;
    }

    if (!email.value.trim()) {
      showError(email, 'L\'email est requis.');
      valid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
      showError(email, 'Format email invalide.');
      valid = false;
    }

    if (!message.value.trim()) {
      showError(message, 'Le message est requis.');
      valid = false;
    }

    if (!valid) return;

    /* send */
    var btn = form.querySelector('.sc-form__submit');
    form.classList.add('is-sending');
    btn.disabled = true;

    var data = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: data,
    })
    .then(function (res) { return res.json(); })
    .then(function (json) {
      if (json.success) {
        form.style.display = 'none';
        success.classList.add('is-visible');
      } else {
        form.classList.remove('is-sending');
        btn.disabled = false;
      }
    })
    .catch(function () {
      form.classList.remove('is-sending');
      btn.disabled = false;
    });
  });

})();
