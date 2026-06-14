/* ============================================================
   HOME PAGE SCRIPT — Smart Expos & Events Morocco
   Sections:
     1. Hero Video Slider
     2. About Counter Animation
     3. Generic Slider (Gallery + Blog)
     4. Service Card Flip (mobile tap)
     5. Testimonials Video Modal
   ============================================================ */

'use strict';

/* ============================================================
   1. HERO VIDEO SLIDER
   Rotates between hero-slide elements every 10 seconds.
   Syncs the hero-dot buttons and supports manual dot navigation.
   ============================================================ */
(function HeroSlider() {
  const slides = Array.from(document.querySelectorAll('.hero-slide'));
  const videos = Array.from(document.querySelectorAll('.hero-video'));
  const dots   = Array.from(document.querySelectorAll('.hero-dot'));
  if (!slides.length) return;

  const INTERVAL = 10_000;
  let current = 0;
  let timer   = null;

  function goTo(index) {
    const prev = current;
    current    = index;

    slides[prev].classList.remove('is-active');
    videos[prev].pause();

    videos[current].currentTime = 0;
    slides[current].classList.add('is-active');
    videos[current].play();

    dots.forEach((d, i) => {
      d.classList.toggle('is-active', i === current);
      d.setAttribute('aria-selected', i === current ? 'true' : 'false');
    });
  }

  function next() {
    goTo((current + 1) % slides.length);
  }

  function startTimer() {
    timer = setInterval(next, INTERVAL);
  }

  function resetTimer() {
    clearInterval(timer);
    startTimer();
  }

  // Initialise la première slide
  slides.forEach((slide, i) => {
    slide.classList.toggle('is-active', i === 0);
    if (i !== 0) { videos[i].pause(); videos[i].currentTime = 0; }
  });

  // Navigation manuelle via les dots
  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => { goTo(i); resetTimer(); });
  });

  startTimer();
})();


/* ============================================================
   2. ABOUT COUNTER ANIMATION
   Animates elements with [data-target] when they scroll into
   view. Uses easeOutQuart for a smooth deceleration effect.
   ============================================================ */
(function CounterAnimation() {
  const counters = document.querySelectorAll('.counter[data-target]');
  if (!counters.length) return;

  /**
   * Animate a single counter element from 0 → data-target.
   * @param {HTMLElement} el
   */
  function animateCounter(el) {
    const target   = parseInt(el.dataset.target, 10);
    const duration = 2000; // ms
    const start    = performance.now();

    // Ease-out quartic: fast start, slow finish
    const easeOutQuart = (t) => 1 - Math.pow(1 - t, 4);

    function step(now) {
      const progress = Math.min((now - start) / duration, 1);
      el.textContent = `+${Math.floor(target * easeOutQuart(progress))}`;
      if (progress < 1) requestAnimationFrame(step);
      else              el.textContent = `+${target}`;
    }

    requestAnimationFrame(step);
  }

  // Trigger animation once when the badge enters the viewport
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        setTimeout(() => animateCounter(entry.target), 300);
        observer.unobserve(entry.target);
      });
    },
    { threshold: 0.5 }
  );

  counters.forEach((el) => observer.observe(el));
})();


/* ============================================================
   GENERIC SLIDER — v2
   Works with:
     [data-slider]
       .se-slider__track-wrap   (optional, for edge-fade effect)
         .se-slider__track      — flex row of items
       [data-prev]
       [data-next]
       .se-slider__dots
   ============================================================ */
(function Sliders() {

  function cardsPerView(type) {
    const w = window.innerWidth;
    if (w < 480)  return 1;
    if (w < 900)  return 2;
    if (w < 1024 && type === 'blog') return 2;
    return 3;
  }

  function initSlider(wrapper, type) {
    // Support optional .se-slider__track-wrap
    const trackWrap = wrapper.querySelector('.se-slider__track-wrap');
    const track     = wrapper.querySelector('.se-slider__track');
    const prevBtn   = wrapper.querySelector('[data-prev]');
    const nextBtn   = wrapper.querySelector('[data-next]');
    const dotsWrap  = wrapper.querySelector('.se-slider__dots');
    const items     = Array.from(track.children);
    if (!items.length) return;

    // If no wrap element, apply overflow:hidden directly to wrapper
    if (!trackWrap) wrapper.style.overflow = 'hidden';

    let index   = 0;
    let perView = cardsPerView(type);
    let autoplay = null;

    /* ── Dots ── */
    function buildDots() {
      dotsWrap.innerHTML = '';
      const pages = Math.ceil(items.length / perView);
      for (let i = 0; i < pages; i++) {
        const btn = document.createElement('button');
        btn.setAttribute('role', 'tab');
        btn.setAttribute('aria-label', `Page ${i + 1}`);
        btn.addEventListener('click', () => { goTo(i * perView); resetAutoplay(); });
        dotsWrap.appendChild(btn);
      }
      syncDots();
    }

    function syncDots() {
      const currentPage = Math.floor(index / perView);
      Array.from(dotsWrap.children).forEach((btn, i) => {
        btn.classList.toggle('is-active', i === currentPage);
        btn.setAttribute('aria-selected', i === currentPage ? 'true' : 'false');
      });
    }

    /* ── Navigation ── */
    function goTo(newIndex) {
      const maxIndex = Math.max(0, items.length - perView);
      index = Math.max(0, Math.min(newIndex, maxIndex));

      const itemWidth = items[0].offsetWidth;
      const gap       = parseFloat(getComputedStyle(track).gap) || 20;
      track.style.transform = `translateX(${-(index * (itemWidth + gap))}px)`;

      if (prevBtn) prevBtn.disabled = index === 0;
      if (nextBtn) nextBtn.disabled = index >= maxIndex;
      syncDots();
    }

    function advance() {
      const maxIndex = Math.max(0, items.length - perView);
      goTo(index < maxIndex ? index + 1 : 0);
    }

    /* ── Autoplay ── */
    function startAutoplay() { autoplay = setInterval(advance, 5000); }
    function stopAutoplay()  { clearInterval(autoplay); autoplay = null; }
    function resetAutoplay() { stopAutoplay(); startAutoplay(); }

    /* ── Touch / Swipe ── */
    let touchStartX = 0;

    track.addEventListener('touchstart', (e) => {
      touchStartX = e.touches[0].clientX;
      stopAutoplay();
    }, { passive: true });

    track.addEventListener('touchend', (e) => {
      const diff = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) goTo(diff > 0 ? index + 1 : index - 1);
      resetAutoplay();
    }, { passive: true });

    /* ── Responsive ── */
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        const newPer = cardsPerView(type);
        if (newPer !== perView) {
          perView = newPer;
          index   = 0;
          buildDots();
          goTo(0);
        } else {
          // Recalculate position (item widths may have changed)
          goTo(index);
        }
      }, 150);
    });

    /* ── Buttons ── */
    if (prevBtn) prevBtn.addEventListener('click', () => { goTo(index - 1); resetAutoplay(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { goTo(index + 1); resetAutoplay(); });

    /* ── Pause on hover ── */
    wrapper.addEventListener('mouseenter', stopAutoplay);
    wrapper.addEventListener('mouseleave', startAutoplay);

    /* ── Init ── */
    buildDots();
    goTo(0);
    startAutoplay();
  }

  document.querySelectorAll('.se-gallery [data-slider]').forEach((el) => initSlider(el, 'gallery'));
  document.querySelectorAll('.se-blog [data-slider]').forEach((el)    => initSlider(el, 'blog'));

  /* Stop shimmer once each gallery image has loaded */
  document.querySelectorAll('.se-gallery__item img').forEach(function (img) {
    if (img.complete) {
      img.closest('.se-gallery__item').style.animation = 'none';
      img.closest('.se-gallery__item').style.background = 'none';
    } else {
      img.addEventListener('load', function () {
        var item = img.closest('.se-gallery__item');
        if (item) { item.style.animation = 'none'; item.style.background = 'none'; }
      });
    }
  });

})();


/* ============================================================
   4. SERVICE CARD FLIP — mobile tap
   On small screens CSS :hover doesn't work reliably with flip
   cards, so we toggle the .is-flipped class on tap instead.
   ============================================================ */
(function MobileCardFlip() {
  if (window.innerWidth > 768) return;

  const cards = document.querySelectorAll('.se-service-card');
  cards.forEach((card) => {
    card.addEventListener('click', function () {
      // Close any other open card first
      cards.forEach((c) => { if (c !== this) c.classList.remove('is-flipped'); });
      this.classList.toggle('is-flipped');
    });
  });
})();


/* ============================================================
   5. QUOTE MODAL
   Opens on "Request Quote" button click, injects the service
   name, submits via AJAX, shows success state on completion.
   ============================================================ */
(function QuoteModal() {
  const modal      = document.getElementById('quoteModal');
  if (!modal) return;

  const form        = document.getElementById('quoteForm');
  const closeBtn    = document.getElementById('quoteClose');
  const serviceEl   = document.getElementById('quoteServiceName');
  const serviceInput= document.getElementById('quoteServiceInput');
  const submitBtn   = document.getElementById('quoteSubmit');
  const submitText  = submitBtn.querySelector('.sq-form__submit-text');
  const successEl   = document.getElementById('quoteSuccess');
  const successClose= document.getElementById('quoteSuccessClose');
  const triggers    = document.querySelectorAll('.se-quote-trigger');

  function openModal(serviceName) {
    serviceEl.textContent    = serviceName;
    serviceInput.value       = serviceName;
    form.hidden              = false;
    successEl.hidden         = true;
    form.reset();
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    setTimeout(() => closeBtn.focus(), 100);
  }

  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  triggers.forEach(btn => {
    btn.addEventListener('click', () => {
      const service = btn.getAttribute('data-service')
        .replace(/&amp;/g, '&');
      openModal(service);
    });
  });

  closeBtn.addEventListener('click', closeModal);
  successClose.addEventListener('click', closeModal);
  modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    // Validation basique côté client
    let valid = true;
    ['qf-name', 'qf-company', 'qf-email', 'qf-message'].forEach(id => {
      const el = document.getElementById(id);
      if (!el.value.trim()) {
        el.classList.add('is-error');
        valid = false;
      } else {
        el.classList.remove('is-error');
      }
    });
    if (!valid) return;

    // Loading state
    submitBtn.disabled = true;
    submitText.textContent = 'Envoi en cours…';

    try {
      const data = new FormData(form);

      // Si "Autre pays" : injecter les valeurs libres dans FormData
      if (countrySelect.value === 'OTHER') {
        data.set('country', countryOther.value.trim());
        data.set('city',    cityOther.value.trim());
      }

      const res  = await fetch(form.action, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest',
                   'Accept': 'application/json' },
        body: data,
      });

      if (res.ok || res.status === 302) {
        form.hidden     = true;
        successEl.hidden = false;
        setTimeout(() => document.getElementById('quoteSuccessClose').focus(), 100);
      } else {
        submitText.textContent = 'Envoyer la demande';
        submitBtn.disabled = false;
      }
    } catch {
      submitText.textContent = 'Envoyer la demande';
      submitBtn.disabled = false;
    }
  });

  // Retirer la classe d'erreur à la saisie
  form.querySelectorAll('input, textarea').forEach(el => {
    el.addEventListener('input', () => el.classList.remove('is-error'));
  });

  // Formatage automatique du numéro de téléphone
  const phoneInput = document.getElementById('qf-phone');
  phoneInput.addEventListener('input', function () {
    let digits = this.value.replace(/\D/g, '');
    let formatted = '';
    if (digits.startsWith('212')) {
      // Format: +212 6 00 00 00 00
      const local = digits.slice(3);
      formatted = '+212';
      if (local.length > 0) formatted += ' ' + local.slice(0, 1);
      if (local.length > 1) formatted += ' ' + local.slice(1, 3);
      if (local.length > 3) formatted += ' ' + local.slice(3, 5);
      if (local.length > 5) formatted += ' ' + local.slice(5, 7);
      if (local.length > 7) formatted += ' ' + local.slice(7, 9);
    } else if (digits.startsWith('0')) {
      // Format: 06 00 00 00 00
      formatted = digits.slice(0, 2);
      if (digits.length > 2) formatted += ' ' + digits.slice(2, 4);
      if (digits.length > 4) formatted += ' ' + digits.slice(4, 6);
      if (digits.length > 6) formatted += ' ' + digits.slice(6, 8);
      if (digits.length > 8) formatted += ' ' + digits.slice(8, 10);
    } else {
      formatted = this.value.replace(/[^\d\s\+\-]/g, '');
    }
    this.value = formatted;
  });

  // Indicatifs téléphoniques par pays
  const DIALCODES = {
    MA: '+212', FR: '+33',  DZ: '+213', TN: '+216', EG: '+20',
    SN: '+221', CI: '+225', CM: '+237', GH: '+233', NG: '+234',
    ZA: '+27',  AE: '+971', SA: '+966', QA: '+974', ES: '+34',
    DE: '+49',  IT: '+39',  GB: '+44',  US: '+1',   OTHER: '+',
  };

  // Pays → Villes
  const CITIES = {
    MA: [
      { name: 'Casablanca'  },
      { name: 'Rabat'       },
      { name: 'Marrakech'   },
      { name: 'Fès'         },
      { name: 'Tanger'      },
      { name: 'Agadir'      },
      { name: 'Meknès'      },
      { name: 'Oujda'       },
      { name: 'Kenitra'     },
      { name: 'Tétouan'     },
      { name: 'El Jadida'   },
      { name: 'Safi'        },
      { name: 'Mohammedia'  },
      { name: 'Khouribga'   },
      { name: 'Béni Mellal' },
      { name: 'Nador'       },
      { name: 'Settat'      },
      { name: 'Laâyoune'    },
    ],
    FR: [
      { name: 'Paris'       },
      { name: 'Lyon'        },
      { name: 'Marseille'   },
      { name: 'Toulouse'    },
      { name: 'Nice'        },
      { name: 'Nantes'      },
      { name: 'Strasbourg'  },
      { name: 'Bordeaux'    },
      { name: 'Lille'       },
      { name: 'Rennes'      },
    ],
    DZ: [
      { name: 'Alger'       },
      { name: 'Oran'        },
      { name: 'Constantine' },
      { name: 'Annaba'      },
      { name: 'Blida'       },
      { name: 'Tlemcen'     },
      { name: 'Sétif'       },
      { name: 'Batna'       },
    ],
    TN: [
      { name: 'Tunis'       },
      { name: 'Sfax'        },
      { name: 'Sousse'      },
      { name: 'Bizerte'     },
      { name: 'Gabès'       },
      { name: 'Kairouan'    },
    ],
    EG: [
      { name: 'Le Caire'        },
      { name: 'Alexandrie'      },
      { name: 'Gizeh'           },
      { name: 'Charm el-Cheikh' },
      { name: 'Louxor'          },
    ],
    AE: [
      { name: 'Dubaï'    },
      { name: 'Abu Dhabi'},
      { name: 'Sharjah'  },
      { name: 'Ajman'    },
    ],
    SA: [
      { name: 'Riyad'    },
      { name: 'Djeddah'  },
      { name: 'La Mecque'},
      { name: 'Médine'   },
      { name: 'Dammam'   },
    ],
    QA: [
      { name: 'Doha'      },
      { name: 'Al Wakrah' },
    ],
    SN: [
      { name: 'Dakar'      },
      { name: 'Thiès'      },
      { name: 'Ziguinchor' },
    ],
    CI: [
      { name: 'Abidjan'      },
      { name: 'Yamoussoukro' },
      { name: 'Bouaké'       },
    ],
    CM: [
      { name: 'Yaoundé' },
      { name: 'Douala'  },
    ],
    GH: [
      { name: 'Accra'  },
      { name: 'Kumasi' },
    ],
    NG: [
      { name: 'Lagos'  },
      { name: 'Abuja'  },
      { name: 'Kano'   },
    ],
    ZA: [
      { name: 'Johannesburg' },
      { name: 'Le Cap'       },
      { name: 'Durban'       },
      { name: 'Pretoria'     },
    ],
    ES: [
      { name: 'Madrid'    },
      { name: 'Barcelone' },
      { name: 'Séville'   },
      { name: 'Valence'   },
    ],
    DE: [
      { name: 'Berlin'    },
      { name: 'Munich'    },
      { name: 'Hambourg'  },
      { name: 'Francfort' },
    ],
    IT: [
      { name: 'Rome'   },
      { name: 'Milan'  },
      { name: 'Naples' },
    ],
    GB: [
      { name: 'Londres'     },
      { name: 'Manchester'  },
      { name: 'Birmingham'  },
    ],
    US: [
      { name: 'New York'    },
      { name: 'Los Angeles' },
      { name: 'Chicago'     },
      { name: 'Houston'     },
      { name: 'Miami'       },
    ],
    OTHER: [
      { name: 'Autre ville' },
    ],
  };

  const countrySelect  = document.getElementById('qf-country');
  const countryOther   = document.getElementById('qf-country-other');
  const citySelect     = document.getElementById('qf-city');
  const cityOther      = document.getElementById('qf-city-other');

  countrySelect.addEventListener('change', function () {
    const code    = this.value;
    const cities  = CITIES[code] || [];
    const dial    = DIALCODES[code] || '';
    const isOther = code === 'OTHER';

    // Pays "Autre" → afficher input texte libre
    countryOther.style.display = isOther ? 'block' : 'none';
    if (isOther) setTimeout(() => countryOther.focus(), 50);

    // Ville : select liste ou input libre
    if (isOther) {
      citySelect.style.display = 'none';
      cityOther.style.display  = 'block';
    } else {
      citySelect.style.display = '';
      cityOther.style.display  = 'none';
      cityOther.value          = '';
      citySelect.innerHTML = '<option value="" disabled selected>Sélectionner une ville</option>';
      cities.forEach(c => {
        const opt = document.createElement('option');
        opt.value = opt.textContent = c.name;
        citySelect.appendChild(opt);
      });
      citySelect.disabled = false;
    }

    // Pré-remplir indicatif téléphonique
    if (dial && dial !== '+' && !phoneInput.value.trim()) {
      phoneInput.value       = dial + ' ';
      phoneInput.placeholder = dial + ' 6 00 00 00 00';
    }
  });
})();


/* ============================================================
   6b. TESTIMONIALS SLIDER + AUTO-PLAY
   ============================================================ */
(function TestiSlider() {
  const viewport = document.getElementById('testiViewport');
  const track    = document.getElementById('testiTrack');
  const dotsWrap = document.getElementById('testiDots');
  if (!track || !viewport) return;

  const cards = Array.from(track.querySelectorAll('.se-testi'));
  const GAP   = 24;
  let current = 0;
  let perView = getPerView();
  let total   = Math.max(0, cards.length - perView);
  let dots    = [];

  function getPerView() {
    const vw = window.innerWidth;
    if (vw < 480)  return 1;
    if (vw < 768)  return 2;
    if (vw < 1100) return 3;
    return 4;
  }

  function cardWidth() {
    return (viewport.clientWidth - GAP * (perView - 1)) / perView;
  }

  function setSizes() {
    const w = cardWidth();
    cards.forEach(c => { c.style.minWidth = w + 'px'; c.style.width = w + 'px'; });
  }

  function buildDots() {
    dotsWrap.innerHTML = '';
    dots = [];
    for (let i = 0; i <= total; i++) {
      const d = document.createElement('button');
      d.className = 'se-testi-slider__dots-dot' + (i === 0 ? ' is-active' : '');
      d.setAttribute('aria-label', 'Slide ' + (i + 1));
      d.addEventListener('click', () => { goTo(i); clearInterval(timer); });
      dotsWrap.appendChild(d);
      dots.push(d);
    }
  }

  function goTo(idx) {
    current = Math.max(0, Math.min(idx, total));
    const offset = current * (cardWidth() + GAP);
    track.style.transform = 'translateX(-' + offset + 'px)';
    dots.forEach((d, i) => d.classList.toggle('is-active', i === current));
  }

  function init() {
    perView = getPerView();
    total   = Math.max(0, cards.length - perView);
    setSizes();
    buildDots();
    goTo(current > total ? total : current);
  }

  init();
  window.addEventListener('resize', init);

  let timer = setInterval(() => goTo(current >= total ? 0 : current + 1), 3500);

  let touchStartX = 0;
  viewport.addEventListener('touchstart', e => {
    touchStartX = e.touches[0].clientX;
    // Reset swipe flag on all cards
    cards.forEach(c => c.dataset.swiping = 'false');
  }, { passive: true });
  viewport.addEventListener('touchmove', e => {
    if (Math.abs(e.touches[0].clientX - touchStartX) > 10) {
      cards.forEach(c => c.dataset.swiping = 'true');
    }
  }, { passive: true });
  viewport.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 40) { goTo(dx < 0 ? current + 1 : current - 1); clearInterval(timer); }
  });
})();

/* ============================================================
   7. TESTIMONIALS VIDEO MODAL
   Opens a video in a fullscreen modal when a .se-testi card
   is clicked. Closes on ✕ button, backdrop click, or Escape.
   ============================================================ */
(function TestimonialsModal() {
  const modal    = document.getElementById('videoModal');
  if (!modal) return;

  const videoEl  = modal.querySelector('#modalVideo');
  const closeBtn = modal.querySelector('[data-close]');

  function open(src) {
    videoEl.src = src;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    videoEl.play().catch(() => {});
    closeBtn.focus();
  }

  function close() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    videoEl.pause();
    videoEl.src = '';
    document.body.style.overflow = '';
  }

  // Click on the card or the play icon → open modal
  document.querySelectorAll('.se-testi[data-video]').forEach(function(card) {
    card.addEventListener('click', function(e) {
      // Don't open if user was swiping
      if (card.dataset.swiping === 'true') return;
      open(card.dataset.video);
    });
  });

  closeBtn.addEventListener('click', close);
  modal.addEventListener('click', function(e) { if (e.target === modal) close(); });
  document.addEventListener('keydown', function(e) { if (e.key === 'Escape') close(); });
})();

/* ============================================================
   6. PARTNERS SLIDER + FLIP CARDS + VIDEO LIGHTBOX
   ============================================================ */
(function PartnersSlider() {
  const track    = document.getElementById('pSliderTrack');
  const viewport = track && track.closest('.se-partners__viewport');
  const btnPrev  = document.getElementById('pSliderPrev');
  const btnNext  = document.getElementById('pSliderNext');
  const dotsWrap = document.getElementById('pSliderDots');
  const vbox     = document.getElementById('partnerVideoBox');
  const vboxVid  = document.getElementById('partnerVideo');
  const vboxTitle= document.getElementById('partnerVideoTitle');
  const vboxClose= document.getElementById('partnerVideoClose');

  if (!track || !vbox) return;

  const cards    = Array.from(track.querySelectorAll('.se-pcard'));
  const GAP      = 24;
  let current    = 0;
  let perView    = getPerView();
  let total      = Math.max(0, cards.length - perView);
  let dots       = [];

  /* ── how many cards visible at once ── */
  function getPerView() {
    const vw = window.innerWidth;
    if (vw < 480)  return 1;
    if (vw < 768)  return 2;
    if (vw < 1024) return 3;
    return 4;
  }

  /* ── card width (viewport / perView minus gap share) ── */
  function cardWidth() {
    return (viewport.clientWidth - GAP * (perView - 1)) / perView;
  }

  /* ── set each card's flex width ── */
  function setSizes() {
    const w = cardWidth();
    cards.forEach(c => { c.style.minWidth = w + 'px'; c.style.width = w + 'px'; });
  }

  /* ── build dots ── */
  function buildDots() {
    dotsWrap.innerHTML = '';
    dots = [];
    for (let i = 0; i <= total; i++) {
      const d = document.createElement('button');
      d.className = 'se-partners__dot' + (i === 0 ? ' is-active' : '');
      d.setAttribute('aria-label', 'Slide ' + (i + 1));
      d.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(d);
      dots.push(d);
    }
  }

  /* ── go to index ── */
  function goTo(idx) {
    current = Math.max(0, Math.min(idx, total));
    const offset = current * (cardWidth() + GAP);
    track.style.transform = 'translateX(-' + offset + 'px)';
    btnPrev.disabled = current === 0;
    btnNext.disabled = current === total;
    dots.forEach((d, i) => d.classList.toggle('is-active', i === current));
  }

  /* ── init ── */
  function init() {
    perView = getPerView();
    total   = Math.max(0, cards.length - perView);
    setSizes();
    buildDots();
    goTo(current > total ? total : current);
  }

  init();
  window.addEventListener('resize', init);

  /* ── Auto-play ── */
  let autoTimer = setInterval(() => {
    goTo(current >= total ? 0 : current + 1);
  }, 3500);

  [btnPrev, btnNext].forEach(btn => btn.addEventListener('click', () => {
    clearInterval(autoTimer);
  }));
  viewport.addEventListener('touchstart', () => clearInterval(autoTimer), { passive: true });

  btnPrev.addEventListener('click', () => goTo(current - 1));
  btnNext.addEventListener('click', () => goTo(current + 1));

  /* ── Touch / swipe ── */
  let touchStartX = 0;
  viewport.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
  viewport.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 40) goTo(dx < 0 ? current + 1 : current - 1);
  });

  /* ── Video lightbox ── */
  function openVideo(src, name) {
    vboxVid.src = src;
    vboxTitle.textContent = name;
    vbox.classList.add('is-open');
    vbox.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    vboxVid.play().catch(() => {});
    vboxClose.focus();
  }

  function closeVideo() {
    vbox.classList.remove('is-open');
    vbox.setAttribute('aria-hidden', 'true');
    vboxVid.pause();
    vboxVid.src = '';
    document.body.style.overflow = '';
  }

  /* ── Flip cards + play ── */
  const isTouchDevice = () => window.matchMedia('(hover: none)').matches;

  cards.forEach(function (card) {
    const playBtn  = card.querySelector('.se-pcard__play');
    const videoSrc = card.dataset.video;
    const name     = card.dataset.name;

    card.addEventListener('click', function (e) {
      if (isTouchDevice()) {
        if (!card.classList.contains('is-flipped')) {
          cards.forEach(c => c.classList.remove('is-flipped'));
          card.classList.add('is-flipped');
          return;
        }
      }
      if (e.target.closest('.se-pcard__play') && videoSrc) {
        openVideo(videoSrc, name);
      }
    });

    if (playBtn) {
      playBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        if (videoSrc) openVideo(videoSrc, name);
      });
    }
  });

  vboxClose.addEventListener('click', closeVideo);
  vbox.querySelector('.se-vbox__backdrop').addEventListener('click', closeVideo);
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && vbox.classList.contains('is-open')) closeVideo();
  });
})();

/* ============================================================
   LAZY BACKGROUND IMAGES — data-bg="url"
   Loads heavy background images only when element enters viewport.
   ============================================================ */
(function LazyBg() {
  const els = document.querySelectorAll('[data-bg]');
  if (!els.length) return;

  if ('IntersectionObserver' in window) {
    const obs = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          const el = entry.target;
          el.style.backgroundImage = 'url(' + el.dataset.bg + ')';
          obs.unobserve(el);
        }
      });
    }, { rootMargin: '200px' });

    els.forEach(function(el) { obs.observe(el); });
  } else {
    els.forEach(function(el) {
      el.style.backgroundImage = 'url(' + el.dataset.bg + ')';
    });
  }
})();
