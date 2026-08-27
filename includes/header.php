<?php
/**
 * Shared site head + top bar + primary navigation.
 * A page sets these before including this file:
 *   $title       — full <title> text (required)
 *   $head        — page-unique <head> markup: description, canonical,
 *                  hreflang, Open Graph/Twitter tags and JSON-LD (required)
 *   $nav_active  — active top-nav key: home|about|services|brands|blog|contact
 *   $brand_slug  — active brand slug inside the Brands dropdown (brand pages)
 *
 * $BRANDS is the single source of truth for the brand list, reused by the
 * navigation dropdown and the brand sidebar so it is never duplicated.
 */
$BRANDS = [
  'philips'          => 'Philips',
  'panasonic'        => 'Panasonic',
  'midea'            => 'Midea',
  'geepas'           => 'Geepas',
  'nikai'            => 'Nikai',
  'super-general'    => 'Super General',
  'crownline'        => 'Crownline',
  'lg'               => 'LG',
  'samsung'          => 'Samsung',
  'electrolux'       => 'Electrolux',
  'hisense'          => 'Hisense',
  'westpoint'        => 'Westpoint',
  'aftron'           => 'Aftron',
  'krypton'          => 'Krypton',
  'crystal-mountain' => 'Crystal Mountain',
];
$na    = $nav_active ?? '';
$bslug = $brand_slug ?? '';
$cur   = fn($k) => $na === $k ? ' class="active"' : '';
?><!DOCTYPE html>
<html lang="en-AE">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
<?= $head ?>

  <meta name="theme-color" content="#0c1c2c">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png?v=9">
  <link rel="apple-touch-icon" href="/assets/img/favicon.png?v=9">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css?v=9">
  <script src="https://analytics.ahrefs.com/analytics.js" data-key="i6041B/dwASsMY+57MH5lw" async></script>
</head>
<body>

  <div class="topbar">
    <div class="container">
      <div class="topbar__info">
        <a href="tel:+971501590802"><i><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg></i> +971 50 159 0802</a>
        <a href="mailto:info@waterdispenserrepair.ae"><i><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></i> info@waterdispenserrepair.ae</a>
        <span class="hide-sm"><i><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-5.5-7-11a7 7 0 0 1 14 0c0 5.5-7 11-7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></i> Serving all Emirates</span>
      </div>
      <div class="topbar__social">
        <a href="#" aria-label="Facebook"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-7h2.3l.4-2.7h-2.7V9.6c0-.8.2-1.3 1.3-1.3h1.4V5.9c-.3 0-1.1-.1-2-.1-2 0-3.4 1.2-3.4 3.5v1.9H8.3V14h2.5v7h2.7Z"/></svg></a><a href="#" aria-label="Instagram"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="3.8"/><circle cx="17" cy="7" r="1.1" fill="currentColor" stroke="none"/></svg></a><a href="https://wa.me/971501590802" aria-label="WhatsApp"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.8-1.5A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1 1 12 20Zm4.4-5.6c-.2-.1-1.4-.7-1.7-.8-.2-.1-.4-.1-.5.1l-.7.9c-.1.2-.3.2-.5.1-.7-.3-1.4-.6-2-1.4-.4-.6 0-.6.4-1.3.1-.2 0-.4 0-.5l-.8-1.8c-.2-.5-.4-.4-.5-.4h-.5c-.2 0-.5.1-.7.3-.7.7-.9 1.7-.6 2.8.4 1.4 1.3 2.6 2.6 3.6 1.8 1.3 3.2 1.5 4 1.2.5-.2 1.4-.9 1.6-1.4.2-.5.2-1 .1-1.1Z"/></svg></a>
      </div>
    </div>
  </div>

  <header class="header">
    <div class="container nav">
      <a href="/" class="brand" aria-label="Water Dispenser Repair — home">
        <img src="/assets/img/logo.png?v=9" alt="Water Dispenser Repair — UAE" class="brand__logo-img" width="150" height="56">
      </a>
      <nav class="nav__menu" aria-label="Main navigation">
        <a href="/"<?= $cur('home') ?>>Home</a>
        <a href="/about/"<?= $cur('about') ?>>About</a>
        <a href="/services/"<?= $cur('services') ?>>Services</a>
        <div class="nav__item has-dropdown">
          <a href="/brands/" class="nav__droplink<?= $na === 'brands' ? ' active' : '' ?>">Brands <span class="caret"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></span></a>
          <div class="nav__sub">
<?php foreach ($BRANDS as $slug => $name): ?>
            <a href="/brands/<?= $slug ?>/"<?= $slug === $bslug ? ' class="active"' : '' ?>><?= $name ?></a>
<?php endforeach; ?>
          </div>
        </div>
        <div class="nav__item has-dropdown">
          <a href="#" class="nav__droplink">Locations <span class="caret"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></span></a>
          <div class="nav__sub nav__sub--sm">
            <a href="/">Dubai</a>
            <a href="/water-dispenser-repair-abu-dhabi/">Abu Dhabi</a>
            <a href="/water-dispenser-repair-sharjah/">Sharjah</a>
            <a href="/water-dispenser-repair-ajman/">Ajman</a>
          </div>
        </div>
        <a href="/blog/"<?= $cur('blog') ?>>Blog</a>
        <a href="/contact/"<?= $cur('contact') ?>>Contact</a>
      </nav>
      <div class="nav__actions">
        <a href="tel:+971501590802" class="nav__phone">
          <span class="ic" aria-hidden="true"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg></span>
          <span><small>Call us 24/7</small><strong>+971 50 159 0802</strong></span>
        </a>
        <a href="/contact/" class="btn btn--primary">Get a Quote</a>
      </div>
      <button class="nav__toggle" aria-label="Toggle menu" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </header>
  <div class="nav-overlay"></div>
