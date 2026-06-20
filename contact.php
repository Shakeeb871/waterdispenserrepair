<?php require __DIR__ . '/includes/mailer.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Book a Water Dispenser Repair in UAE</title>
  <meta name="description" content="Contact Water Dispenser Repair for fast water dispenser & cooler repair. Call, WhatsApp or fill the form to book a same-day appointment anywhere in the UAE.">
  <meta name="keywords" content="contact water dispenser repair, book repair UAE, water cooler service Dubai">
  <link rel="canonical" href="https://waterdispenserrepair.ae/contact.php">
  <meta property="og:title" content="Contact Us | Water Dispenser Repair">
  <meta property="og:description" content="Book a water dispenser repair anywhere in the UAE — call, WhatsApp or fill the form.">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#0277bd">
  <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
  <link rel="manifest" href="site.webmanifest">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- TOP BAR -->
  <div class="topbar">
    <div class="container">
      <div class="topbar__info">
        <a href="tel:+971501590802">📞 +971 50 159 0802</a>
        <span>🕒 Mon – Sun: 8:00 AM – 10:00 PM</span>
        <span>📍 Serving all UAE</span>
      </div>
      <div class="topbar__social">
        <a href="#" aria-label="Facebook">Facebook</a>
        <a href="#" aria-label="Instagram">Instagram</a>
      </div>
    </div>
  </div>

  <!-- HEADER -->
  <header class="header">
    <div class="container nav">
      <a href="index.html" class="brand" aria-label="Water Dispenser Repair home">
        <span class="brand__logo" aria-hidden="true"><svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c-.3 0-.6.13-.79.37C9.4 4.84 5 10.6 5 14.5 5 18.64 8.13 22 12 22s7-3.36 7-7.5c0-3.9-4.4-9.66-6.21-12.13A1 1 0 0 0 12 2z"/></svg></span>
        <span class="brand__name">Water Dispenser<span> Repair</span><span class="brand__tag">UAE • Same-Day Service</span></span>
      </a>
      <nav class="nav__menu" aria-label="Main navigation">
        <a href="index.html">Home</a>
        <a href="services.html">Services</a>
        <a href="about.html">About</a>
        <a href="contact.php" class="active">Contact</a>
        <a href="contact.php" class="btn btn--primary nav__cta">Book a Repair</a>
      </nav>
      <button class="nav__toggle" aria-label="Toggle menu" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </header>
  <div class="nav-overlay"></div>

  <!-- PAGE HERO -->
  <section class="page-hero">
    <div class="container">
      <h1>Contact &amp; Book a Repair</h1>
      <p class="breadcrumb"><a href="index.html">Home</a> / Contact</p>
    </div>
  </section>

  <!-- CONTACT -->
  <section class="section">
    <div class="container">
      <div class="contact-grid">

        <!-- INFO -->
        <div class="reveal">
          <h2 style="margin-bottom:8px;">Get In Touch</h2>
          <p style="color:var(--color-muted);margin-bottom:20px;">Reach us any way you like — we respond fast, 7 days a week.</p>

          <div class="contact-info__item">
            <span class="contact-info__ic">📞</span>
            <div><strong>Call Us</strong><a href="tel:+971501590802">+971 50 159 0802</a></div>
          </div>
          <div class="contact-info__item">
            <span class="contact-info__ic">💬</span>
            <div><strong>WhatsApp</strong><a href="https://wa.me/971501590802">+971 50 159 0802</a></div>
          </div>
          <div class="contact-info__item">
            <span class="contact-info__ic">✉️</span>
            <div><strong>Email</strong><a href="mailto:info@waterdispenserrepair.ae">info@waterdispenserrepair.ae</a></div>
          </div>
          <div class="contact-info__item">
            <span class="contact-info__ic">📍</span>
            <div><strong>Our Branches</strong><span>Dubai • Sharjah • Abu Dhabi — serving across the UAE</span></div>
          </div>
          <div class="contact-info__item">
            <span class="contact-info__ic">🕒</span>
            <div><strong>Working Hours</strong><span>Mon – Sun: 8:00 AM – 10:00 PM</span></div>
          </div>
        </div>

        <!-- FORM -->
        <div class="reveal">
          <div class="form-card">
            <h2 style="margin-bottom:6px;">Request a Repair</h2>
            <p style="color:var(--color-muted);margin-bottom:22px;">Fill in the details and we'll get back to you shortly.</p>

            <?php if ($formStatus === 'success'): ?>
              <div class="alert alert--success">✅ Thank you! Your request has been sent. We'll contact you very soon.</div>
            <?php elseif ($formStatus === 'error' && empty($formErrors)): ?>
              <div class="alert alert--error">⚠️ Sorry, something went wrong sending your message. Please call or WhatsApp us instead.</div>
            <?php elseif ($formStatus === 'error'): ?>
              <div class="alert alert--error">⚠️ Please correct the highlighted fields and try again.</div>
            <?php endif; ?>

            <form id="contactForm" action="contact.php#book" method="POST" novalidate>
              <!-- Honeypot (hidden from users) -->
              <div style="position:absolute;left:-9999px;" aria-hidden="true">
                <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
              </div>

              <div class="form-row">
                <div class="form-group <?php echo isset($formErrors['name']) ? 'has-error' : ''; ?>">
                  <label for="name">Full Name <span class="req">*</span></label>
                  <input type="text" id="name" name="name" data-validate="text" required value="<?php echo e($old['name']); ?>" placeholder="e.g. Ahmed Khan">
                  <span class="field-error"><?php echo e($formErrors['name'] ?? 'This field is required.'); ?></span>
                </div>
                <div class="form-group <?php echo isset($formErrors['phone']) ? 'has-error' : ''; ?>">
                  <label for="phone">Phone <span class="req">*</span></label>
                  <input type="tel" id="phone" name="phone" data-validate="phone" required value="<?php echo e($old['phone']); ?>" placeholder="+971 5X XXX XXXX">
                  <span class="field-error"><?php echo e($formErrors['phone'] ?? 'Please enter a valid phone number.'); ?></span>
                </div>
              </div>

              <div class="form-group <?php echo isset($formErrors['email']) ? 'has-error' : ''; ?>">
                <label for="email">Email <span class="req">*</span></label>
                <input type="email" id="email" name="email" data-validate="email" required value="<?php echo e($old['email']); ?>" placeholder="you@example.com">
                <span class="field-error"><?php echo e($formErrors['email'] ?? 'Please enter a valid email address.'); ?></span>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="area">Area / Emirate</label>
                  <select id="area" name="area">
                    <?php
                      $areas = ['', 'Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al Khaimah', 'Fujairah', 'Umm Al Quwain'];
                      foreach ($areas as $a) {
                        $label = $a === '' ? 'Select your area' : $a;
                        $sel = ($old['area'] === $a && $a !== '') ? ' selected' : '';
                        echo '<option value="' . e($a) . '"' . $sel . '>' . e($label) . "</option>\n";
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="service">Service Needed</label>
                  <select id="service" name="service">
                    <?php
                      $services = ['', 'Cooling / Compressor Repair', 'Heating Element Repair', 'Gas Refilling', 'Leak Fixing', 'Electrical Repair', 'Spare Parts Replacement', 'Cleaning & Sanitizing', 'Installation', 'Maintenance Contract', 'Other'];
                      foreach ($services as $s) {
                        $label = $s === '' ? 'Select a service' : $s;
                        $sel = ($old['service'] === $s && $s !== '') ? ' selected' : '';
                        echo '<option value="' . e($s) . '"' . $sel . '>' . e($label) . "</option>\n";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group <?php echo isset($formErrors['message']) ? 'has-error' : ''; ?>">
                <label for="message">Describe the Issue <span class="req">*</span></label>
                <textarea id="message" name="message" data-validate="text" required placeholder="e.g. The cold water tap is not cooling and the unit makes a buzzing noise."><?php echo e($old['message']); ?></textarea>
                <span class="field-error"><?php echo e($formErrors['message'] ?? 'This field is required.'); ?></span>
              </div>

              <button type="submit" class="btn btn--primary btn--lg" style="width:100%;">Send Request</button>
              <p class="form-note">We'll never share your details. You can also call us at <a href="tel:+971501590802">+971 50 159 0802</a>.</p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- BRANCHES -->
  <section class="section section--alt" id="book">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Our Locations</span>
        <h2>Three Branches Across the UAE</h2>
        <p>Visit us or call your nearest branch — we serve Dubai, Sharjah, Abu Dhabi and beyond.</p>
      </div>
      <div class="grid grid--3">
        <article class="card reveal">
          <div class="card__icon">📍</div>
          <h3>Dubai</h3>
          <p>Al Furjan, Jebel Ali Village,<br>Dubai, United Arab Emirates</p>
          <a href="https://www.google.com/maps/search/?api=1&amp;query=Al+Furjan+Jebel+Ali+Village+Dubai" target="_blank" rel="noopener" class="card__link">Get directions</a>
        </article>
        <article class="card reveal">
          <div class="card__icon">📍</div>
          <h3>Sharjah</h3>
          <p>8CH7+HVR, Industrial Area,<br>Sharjah, United Arab Emirates</p>
          <a href="https://www.google.com/maps/search/?api=1&amp;query=8CH7%2BHVR+Industrial+Area+Sharjah" target="_blank" rel="noopener" class="card__link">Get directions</a>
        </article>
        <article class="card reveal">
          <div class="card__icon">📍</div>
          <h3>Abu Dhabi</h3>
          <p>M7, مصفح 7, Musaffah,<br>Abu Dhabi, United Arab Emirates</p>
          <a href="https://www.google.com/maps/search/?api=1&amp;query=Musaffah+M7+Abu+Dhabi" target="_blank" rel="noopener" class="card__link">Get directions</a>
        </article>
      </div>
      <div class="map-wrap reveal" style="margin-top:36px;">
        <iframe
          title="Service area map — United Arab Emirates"
          src="https://www.openstreetmap.org/export/embed.html?bbox=51.0%2C22.6%2C56.5%2C26.1&amp;layer=mapnik"
          loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer__grid">
        <div>
          <div class="footer__brand"><span class="brand__logo" aria-hidden="true"><svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c-.3 0-.6.13-.79.37C9.4 4.84 5 10.6 5 14.5 5 18.64 8.13 22 12 22s7-3.36 7-7.5c0-3.9-4.4-9.66-6.21-12.13A1 1 0 0 0 12 2z"/></svg></span>Water Dispenser Repair</div>
          <p>Professional water dispenser and cooler repair, installation and maintenance across the United Arab Emirates.</p>
          <div class="footer__social"><a href="#" aria-label="Facebook">f</a><a href="#" aria-label="Instagram">ig</a><a href="https://wa.me/971501590802" aria-label="WhatsApp">wa</a></div>
        </div>
        <div>
          <h4>Quick Links</h4>
          <ul class="footer__links"><li><a href="index.html">Home</a></li><li><a href="services.html">Services</a></li><li><a href="about.html">About Us</a></li><li><a href="contact.php">Contact</a></li></ul>
        </div>
        <div>
          <h4>Services</h4>
          <ul class="footer__links"><li><a href="services.html">Cooling Repair</a></li><li><a href="services.html">Heating Repair</a></li><li><a href="services.html">Leak Fixing</a></li><li><a href="services.html">Maintenance</a></li></ul>
        </div>
        <div>
          <h4>Get In Touch</h4>
          <ul class="footer__contact"><li><span class="ic">📞</span> <a href="tel:+971501590802">+971 50 159 0802</a></li><li><span class="ic">✉️</span> <a href="mailto:info@waterdispenserrepair.ae">info@waterdispenserrepair.ae</a></li><li><span class="ic">📍</span> Dubai • Sharjah • Abu Dhabi</li><li><span class="ic">🕒</span> Mon – Sun: 8 AM – 10 PM</li></ul>
        </div>
      </div>
      <div class="footer__bottom">
        <span>&copy; <span id="year">2026</span> Water Dispenser Repair. All rights reserved.</span>
        <span>Serving Dubai • Abu Dhabi • Sharjah • Ajman • RAK • Fujairah • UAQ</span>
      </div>
    </div>
  </footer>

  <div class="floating">
    <a href="https://wa.me/971501590802" class="wa" aria-label="WhatsApp">💬</a>
    <a href="tel:+971501590802" class="call" aria-label="Call">📞</a>
  </div>

  <script src="assets/js/main.js"></script>
</body>
</html>
