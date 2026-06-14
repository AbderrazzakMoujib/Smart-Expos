/**
 * ===============================================
 * SMART EVENTS - NAVBAR INTERACTIVE PREMIUM
 * Fichier: public/js/navbar.js
 * Version: 2.2 FIXED FULL VERSION
 * Author: Smart Events Morocco ✨
 * ===============================================
 */

(function () {
  "use strict";

  // ===== VARIABLES =====
  const navbar = document.querySelector(".navbar");
  const dropdowns = document.querySelectorAll(".dropdown");
  const mobileToggle = document.getElementById("mobileToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const mobileClose = document.getElementById("mobileClose");
  const overlay = document.getElementById("overlay");
  const mobileLinks = document.querySelectorAll(
    ".mobile-menu-list a, .mobile-dropdown a"
  );

  if (!navbar) return;

  // ===== SCROLL EFFECT =====
  function handleScroll() {
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  }
  window.addEventListener("scroll", handleScroll, { passive: true });
  handleScroll();

  // ===== DROPDOWNS FIXED =====
  function closeAllDropdowns() {
    dropdowns.forEach((dropdown) => {
      const menu = dropdown.querySelector(".dropdown-menu");
      const btn = dropdown.querySelector(".dropdown-btn");
      if (menu) menu.classList.remove("active");
      if (btn) btn.setAttribute("aria-expanded", "false");
      dropdown.classList.remove("active");
    });
  }

  dropdowns.forEach((dropdown) => {
    const btn = dropdown.querySelector(".dropdown-btn");
    const menu = dropdown.querySelector(".dropdown-menu");

    if (btn && menu) {
      btn.addEventListener("click", (e) => {
        e.stopPropagation();

        // fermer les autres
        dropdowns.forEach((d) => {
          if (d !== dropdown) {
            d.querySelector(".dropdown-menu")?.classList.remove("active");
            d.classList.remove("active");
          }
        });

        // toggle actuel
        const isActive = menu.classList.contains("active");
        if (isActive) {
          menu.classList.remove("active");
          dropdown.classList.remove("active");
          btn.setAttribute("aria-expanded", "false");
        } else {
          menu.classList.add("active");
          dropdown.classList.add("active");
          btn.setAttribute("aria-expanded", "true");
        }
      });

      // Empêcher la fermeture instantanée
      menu.addEventListener("click", (e) => e.stopPropagation());
    }
  });

  // fermer dropdowns quand clique ailleurs
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".dropdown")) {
      closeAllDropdowns();
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeAllDropdowns();
  });

  // ===== MOBILE MENU =====
  function openMobileMenu() {
    mobileMenu?.classList.add("active");
    overlay?.classList.add("active");
    document.body.style.overflow = "hidden";
    mobileToggle?.setAttribute("aria-expanded", "true");
    setTimeout(() => mobileClose?.focus(), 300);
  }

  function closeMobileMenu() {
    mobileMenu?.classList.remove("active");
    overlay?.classList.remove("active");
    document.body.style.overflow = "";
    mobileToggle?.setAttribute("aria-expanded", "false");
  }

  mobileToggle?.addEventListener("click", (e) => {
    e.stopPropagation();
    openMobileMenu();
  });

  mobileClose?.addEventListener("click", (e) => {
    e.stopPropagation();
    closeMobileMenu();
  });

  overlay?.addEventListener("click", closeMobileMenu);

  mobileLinks.forEach((link) => {
    link.addEventListener("click", () => setTimeout(closeMobileMenu, 200));
  });

  // ===== RESIZE =====
  let resizeTimeout;
  window.addEventListener("resize", function () {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function () {
      if (window.innerWidth > 768) closeMobileMenu();
      closeAllDropdowns();
    }, 250);
  });

  // ===== SMOOTH SCROLL =====
  const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
  smoothScrollLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const targetId = this.getAttribute("href");
      if (targetId === "#" || targetId === "#!") {
        e.preventDefault();
        return;
      }
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        closeMobileMenu();
        const navbarHeight = navbar.offsetHeight;
        const targetPosition = targetElement.offsetTop - navbarHeight - 20;
        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  });

  // ===== ANIMATION AU CHARGEMENT =====
  function initAnimations() {
    const logo = navbar.querySelector(".navbar-logo");
    if (logo) {
      logo.style.opacity = "0";
      logo.style.transform = "translateY(-20px)";
      setTimeout(() => {
        logo.style.transition =
          "all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)";
        logo.style.opacity = "1";
        logo.style.transform = "translateY(0)";
      }, 100);
    }

    const menuItems = navbar.querySelectorAll(".navbar-menu li");
    menuItems.forEach((item, index) => {
      item.style.opacity = "0";
      item.style.transform = "translateY(-20px)";
      setTimeout(() => {
        item.style.transition =
          "all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)";
        item.style.opacity = "1";
        item.style.transform = "translateY(0)";
      }, 150 + index * 60);
    });

    const actionBtns = navbar.querySelectorAll(".navbar-actions > *");
    actionBtns.forEach((btn, index) => {
      btn.style.opacity = "0";
      btn.style.transform = "translateY(-20px)";
      setTimeout(() => {
        btn.style.transition =
          "all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)";
        btn.style.opacity = "1";
        btn.style.transform = "translateY(0)";
      }, 300 + index * 100);
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAnimations);
  } else {
    initAnimations();
  }

})();
