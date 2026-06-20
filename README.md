# Water Dispenser Repair — Water Dispenser Repair Website

A fast, responsive, SEO-ready marketing website for a water dispenser & cooler
repair business in the UAE. Built as **static HTML/CSS/JS with a PHP contact
form**, so it deploys directly to any **cPanel / shared hosting** account — no
build step, no framework, no database required.

---

## 📁 Project structure

```
waterdispenserrepair/
├── index.html            # Home page
├── services.html         # Services page
├── about.html            # About page
├── contact.php           # Contact page + PHP form handler (self-posting)
├── 404.html              # Custom error page
├── .htaccess             # Apache config (security, caching, gzip, error pages)
├── robots.txt            # Search engine rules
├── sitemap.xml           # XML sitemap
├── site.webmanifest      # PWA manifest
├── includes/
│   ├── config.php        # ⭐ Central business details (edit this first!)
│   └── mailer.php        # Form validation + email sending logic
└── assets/
    ├── css/style.css     # All styles (design tokens + components + responsive)
    ├── js/main.js        # Nav, FAQ, scroll-reveal, form validation
    └── img/favicon.svg   # Brand favicon
```

---

## ⚙️ Before going live — customize these

All business details live in **one place**: [`includes/config.php`](includes/config.php).
Update them, then do a find-and-replace across the HTML files for the same values
(phone, email, brand name) since the static pages have them inline for SEO.

| What | Where | Current placeholder |
|------|-------|---------------------|
| Phone number | `config.php` + all pages (`+971501590802`) | `+971 50 159 0802` |
| WhatsApp number | all pages (`wa.me/971501590802`) | `971501590802` |
| Email | `config.php` + all pages | `info@waterdispenserrepair.ae` |
| Business name | all pages | `Water Dispenser Repair` |
| Domain | `config.php`, `sitemap.xml`, `robots.txt`, meta tags | `waterdispenserrepair.ae` |
| Social links | header / footer (`href="#"`) | `#` |
| Reviews & stats | `index.html`, `about.html` | sample content |

> 💡 Tip: a quick way to swap the phone everywhere is a project-wide
> find & replace of `+971501590802` and `971501590802`.

---

## 🚀 Deploying to cPanel

1. **Upload files**
   - cPanel → *File Manager* → open `public_html` (or your domain's docroot).
   - Upload everything in this repo (or zip it, upload, then *Extract*).
   - Make sure `index.html` sits at the root of `public_html`.

2. **Set the email address**
   - In `includes/config.php`, set `email_to` to a real inbox on your domain
     (e.g. `info@yourdomain.ae`). The PHP `mail()` function on cPanel delivers
     most reliably when the *From* address is on the same domain (already
     configured in `mailer.php`).

3. **Enable HTTPS**
   - cPanel → *SSL/TLS Status* → run **AutoSSL** (free Let's Encrypt).
   - Then open `.htaccess` and **uncomment** the "Force HTTPS" block.

4. **Test the contact form**
   - Visit `https://yourdomain/contact.php`, submit a test enquiry, and confirm
     the email arrives. If it doesn't, see *Troubleshooting* below.

That's it — the site is live. No database or Node.js needed.

---

## 🧪 Testing locally

You need PHP only for the contact form; the rest is plain HTML.

```bash
# From the project root, start PHP's built-in server:
php -S localhost:8000

# Then open:
#   http://localhost:8000/            (home)
#   http://localhost:8000/contact.php (form)
```

> Note: PHP's built-in server / local machines usually can't send real email.
> The form will validate and show the success message, but delivery only works
> on a real mail-capable host like cPanel.

---

## ✅ What's included (standards)

- **Responsive** mobile-first layout (works on phone, tablet, desktop)
- **SEO**: unique titles & meta descriptions, canonical URLs, Open Graph tags,
  `robots.txt`, `sitemap.xml`, and **Schema.org LocalBusiness** structured data
- **Performance**: gzip + browser caching via `.htaccess`, no external JS/CSS
  frameworks, lazy-loaded map
- **Security**: form honeypot + server-side validation, email-header-injection
  protection, security headers, protected `includes/` directory
- **Accessibility**: semantic HTML, ARIA labels, keyboard-friendly nav,
  `prefers-reduced-motion` support
- **PWA-ready**: web manifest + theme color

---

## 🔌 Troubleshooting the contact form

- **No email arrives** → confirm `email_to` in `config.php` is a mailbox that
  exists in cPanel → *Email Accounts*. Check the spam folder.
- **Still nothing** → some hosts disable PHP `mail()`. Switch to SMTP using
  PHPMailer with your cPanel email account credentials (ask and this can be
  added).
- **Want a copy of submissions** → set `email_to` to a forwarder, or add a
  second recipient in `mailer.php`.

---

## 📄 License

Proprietary — built for the Water Dispenser Repair business. All rights reserved.
