/* =====================================================================
   Water Dispenser Repair UAE — main.js
   Mobile nav · sticky header · FAQ · scroll reveal · animated counters
   · scroll-to-top · footer year · contact form validation
   ===================================================================== */
(function () {
  "use strict";

  /* ---------- Mobile navigation ---------- */
  var toggle = document.querySelector(".nav__toggle");
  var menu = document.querySelector(".nav__menu");
  var overlay = document.querySelector(".nav-overlay");

  function closeMenu() {
    if (!menu) return;
    menu.classList.remove("is-open");
    if (toggle) toggle.classList.remove("is-open");
    if (overlay) overlay.classList.remove("is-open");
    document.body.style.overflow = "";
  }
  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      var open = menu.classList.toggle("is-open");
      toggle.classList.toggle("is-open", open);
      if (overlay) overlay.classList.toggle("is-open", open);
      document.body.style.overflow = open ? "hidden" : "";
    });
    menu.querySelectorAll("a").forEach(function (l) { l.addEventListener("click", closeMenu); });
  }
  if (overlay) overlay.addEventListener("click", closeMenu);

  /* ---------- Sticky header shadow + scroll-to-top ---------- */
  var header = document.querySelector(".header");
  var toTop = document.querySelector(".floating .top");
  function onScroll() {
    var y = window.pageYOffset;
    if (header) header.classList.toggle("is-stuck", y > 10);
    if (toTop) toTop.classList.toggle("show", y > 600);
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();
  if (toTop) toTop.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  /* ---------- FAQ accordion ---------- */
  document.querySelectorAll(".faq__q").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var item = btn.closest(".faq__item");
      var ans = item.querySelector(".faq__a");
      var open = item.classList.toggle("is-open");
      btn.setAttribute("aria-expanded", open ? "true" : "false");
      ans.style.maxHeight = open ? ans.scrollHeight + "px" : null;
    });
  });

  /* ---------- Scroll reveal ---------- */
  var reveals = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && reveals.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add("is-visible"); io.unobserve(en.target); }
      });
    }, { threshold: 0.12 });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add("is-visible"); });
  }

  /* ---------- Animated counters ---------- */
  var counters = document.querySelectorAll("[data-count]");
  if ("IntersectionObserver" in window && counters.length) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        var el = en.target;
        var target = parseInt(el.getAttribute("data-count"), 10);
        var dur = 1600, start = null;
        function tick(ts) {
          if (!start) start = ts;
          var p = Math.min((ts - start) / dur, 1);
          el.textContent = Math.floor(p * target).toLocaleString();
          if (p < 1) requestAnimationFrame(tick);
          else el.textContent = target.toLocaleString();
        }
        requestAnimationFrame(tick);
        cio.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach(function (el) { cio.observe(el); });
  }

  /* ---------- Footer year ---------- */
  var yearEl = document.getElementById("year");
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* ---------- Contact form validation ---------- */
  var form = document.getElementById("contactForm");
  if (form) {
    var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRe = /^[+\d][\d\s\-()]{6,}$/;
    function setErr(g, m) { g.classList.add("has-error"); var e = g.querySelector(".field-error"); if (e && m) e.textContent = m; }

    form.addEventListener("submit", function (ev) {
      var ok = true;
      form.querySelectorAll("[data-validate]").forEach(function (f) {
        var g = f.closest(".form-group"); if (!g) return;
        var v = f.value.trim(), t = f.getAttribute("data-validate");
        g.classList.remove("has-error");
        if (f.hasAttribute("required") && !v) { setErr(g, "This field is required."); ok = false; return; }
        if (t === "email" && v && !emailRe.test(v)) { setErr(g, "Please enter a valid email address."); ok = false; }
        if (t === "phone" && v && !phoneRe.test(v)) { setErr(g, "Please enter a valid phone number."); ok = false; }
      });
      var honey = form.querySelector('[name="website"]');
      if (honey && honey.value !== "") { ev.preventDefault(); return; }
      if (!ok) {
        ev.preventDefault();
        var first = form.querySelector(".has-error");
        if (first) first.scrollIntoView({ behavior: "smooth", block: "center" });
      }
    });
    form.querySelectorAll("[data-validate]").forEach(function (f) {
      f.addEventListener("input", function () { var g = f.closest(".form-group"); if (g) g.classList.remove("has-error"); });
    });
  }
})();
