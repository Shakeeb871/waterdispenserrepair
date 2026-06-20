/* =====================================================================
   AquaFix UAE — main.js
   Handles: mobile nav, FAQ accordion, scroll reveal, footer year,
            client-side contact form validation.
   ===================================================================== */
(function () {
  "use strict";

  /* ---------- Mobile navigation ---------- */
  const toggle = document.querySelector(".nav__toggle");
  const menu = document.querySelector(".nav__menu");
  const overlay = document.querySelector(".nav-overlay");

  function closeMenu() {
    if (!menu) return;
    menu.classList.remove("is-open");
    if (toggle) toggle.classList.remove("is-open");
    if (overlay) overlay.classList.remove("is-open");
    document.body.style.overflow = "";
  }

  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      const open = menu.classList.toggle("is-open");
      toggle.classList.toggle("is-open", open);
      if (overlay) overlay.classList.toggle("is-open", open);
      document.body.style.overflow = open ? "hidden" : "";
    });
    menu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", closeMenu);
    });
  }
  if (overlay) overlay.addEventListener("click", closeMenu);

  /* ---------- FAQ accordion ---------- */
  document.querySelectorAll(".faq__q").forEach(function (btn) {
    btn.addEventListener("click", function () {
      const item = btn.closest(".faq__item");
      const answer = item.querySelector(".faq__a");
      const isOpen = item.classList.toggle("is-open");
      btn.setAttribute("aria-expanded", isOpen ? "true" : "false");
      answer.style.maxHeight = isOpen ? answer.scrollHeight + "px" : null;
    });
  });

  /* ---------- Scroll reveal ---------- */
  const revealEls = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && revealEls.length) {
    const io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );
    revealEls.forEach(function (el) {
      io.observe(el);
    });
  } else {
    revealEls.forEach(function (el) {
      el.classList.add("is-visible");
    });
  }

  /* ---------- Footer year ---------- */
  const yearEl = document.getElementById("year");
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* ---------- Contact form: client-side validation ---------- */
  const form = document.getElementById("contactForm");
  if (form) {
    const showError = function (group, msg) {
      group.classList.add("has-error");
      const err = group.querySelector(".field-error");
      if (err && msg) err.textContent = msg;
    };
    const clearError = function (group) {
      group.classList.remove("has-error");
    };

    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRe = /^[+\d][\d\s\-()]{6,}$/;

    form.addEventListener("submit", function (e) {
      let valid = true;
      const fields = form.querySelectorAll("[data-validate]");

      fields.forEach(function (field) {
        const group = field.closest(".form-group");
        if (!group) return;
        const val = field.value.trim();
        const type = field.getAttribute("data-validate");

        clearError(group);

        if (field.hasAttribute("required") && !val) {
          showError(group, "This field is required.");
          valid = false;
          return;
        }
        if (type === "email" && val && !emailRe.test(val)) {
          showError(group, "Please enter a valid email address.");
          valid = false;
        }
        if (type === "phone" && val && !phoneRe.test(val)) {
          showError(group, "Please enter a valid phone number.");
          valid = false;
        }
      });

      // Honeypot — if filled, silently block (bot).
      const honey = form.querySelector('[name="website"]');
      if (honey && honey.value !== "") {
        e.preventDefault();
        return;
      }

      if (!valid) {
        e.preventDefault();
        const firstErr = form.querySelector(".has-error");
        if (firstErr) firstErr.scrollIntoView({ behavior: "smooth", block: "center" });
      }
    });

    // Clear error as the user types
    form.querySelectorAll("[data-validate]").forEach(function (field) {
      field.addEventListener("input", function () {
        const group = field.closest(".form-group");
        if (group) group.classList.remove("has-error");
      });
    });
  }
})();
