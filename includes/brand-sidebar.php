<?php
/**
 * Sticky sidebar for brand pages.
 * Expects (set by the page before include):
 *   $brand_slug — current brand slug, marked active in the brand list
 *   $brand_name — display name, used in the quote-form copy
 * Reuses $BRANDS defined in header.php as the single brand source.
 */
$bslug = $brand_slug ?? '';
$bname = $brand_name ?? '';
?>
        <aside class="brandlayout__aside">
          <div class="widget reveal">
            <h3 class="widget__title">Water Dispenser Brands We Repair</h3>
            <nav class="widget-list" aria-label="Brands we repair">
<?php foreach ($BRANDS as $slug => $name): ?>
              <a href="/brands/<?= $slug ?>/"<?= $slug === $bslug ? ' class="is-active"' : '' ?>><?= $name ?> Water Dispenser Repair</a>
<?php endforeach; ?>
            </nav>
          </div>
          <div class="widget reveal">
            <h3 class="widget__title">Our Service Areas</h3>
            <nav class="widget-list" aria-label="Service areas">
              <a href="/">Water Dispenser Repair Dubai</a>
              <a href="/water-dispenser-repair-abu-dhabi/">Water Dispenser Repair Abu Dhabi</a>
              <a href="/water-dispenser-repair-sharjah/">Water Dispenser Repair Sharjah</a>
              <a href="/water-dispenser-repair-ajman/">Water Dispenser Repair Ajman</a>
            </nav>
          </div>
          <div class="widget widget--form reveal">
            <h3 class="widget__title">Book a Free Quote</h3>
            <p class="widget__note">Tell us your <?= $bname ?> dispenser issue and we&rsquo;ll call you back with a same-day slot.</p>
            <form class="widget-form" action="mailto:info@waterdispenserrepair.ae" method="post" enctype="text/plain">
              <input type="text" name="name" placeholder="Your name" required>
              <input type="tel" name="phone" placeholder="Phone number" required>
              <textarea name="message" placeholder="Describe your <?= $bname ?> dispenser problem"></textarea>
              <button type="submit" class="btn btn--primary">Request a Call Back</button>
            </form>
            <div class="widget-cta">
              <a href="tel:+971501590802" class="btn btn--light">Call Now</a>
              <a href="https://wa.me/971501590802" class="btn btn--outline">WhatsApp</a>
            </div>
          </div>
        </aside>
