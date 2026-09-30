# Eunoia Vigil — 24/7 Remote Video Monitoring & Surveillance Operations

[![Website Status](https://img.shields.io/badge/Status-Operational-brightgreen)](#)
[![PHP Architecture](https://img.shields.io/badge/Architecture-Novamedex%20PHP%20Router-blue)](#)
[![Operations](https://img.shields.io/badge/SOC%20Desk-24%2F7%2F365-orange)](#)

> **Eunoia Vigil** provides 24/7/365 active remote video monitoring and proactive surveillance operations using your existing camera infrastructure. No new camera investment or hardware replacement required.

---

## 🏢 Operating Company & Contact

* **Operating Entity:** Connectwise Consulting Inc
* **Toll-Free Operations Desk:** `(844) 246-9291`
* **Direct Operations Inquiries:** `desk@eunoiavigil.com`
* **Corporate Office & Dispatch:** `25722 Kingsland Blvd Suite 114, Katy, TX 77494`

---

## 🏗️ Project Architecture (Novamedex Structure)

The website follows a clean modular PHP router architecture:

```
├── .htaccess             # Apache rewrite rules for clean URLs
├── .gitignore            # Git exclusions
├── index.php             # Front controller & clean URL router
├── send-mail.php         # SMTP lead notification handler (sales@eunoiavigil.com)
├── includes/
│   ├── head.php          # Meta tags, favicons, fonts, CSS stylesheets, CSRF token
│   ├── header.php        # Top status bar, brand logo, navigation menu, CTAs
│   ├── footer.php        # Legal disclosure, brand info, sitemap, contact links, modals
│   └── token.php         # CSRF session protection
├── views/
│   ├── home.php          # Homepage (Hero, Core Difference, Hardware, Proof)
│   ├── services.php      # 5-step operational workflow, protocol breakdown
│   ├── clients.php       # Industry playbooks (Retail, Gas Stations, Warehouses)
│   ├── about.php         # SOC infrastructure, response protocols, company info
│   ├── contact.php       # Contact form, assessment calculator, office details
│   ├── thank-you.php     # Lead confirmation & next steps view
│   └── 404.php           # Error fallback page
└── assets/
    ├── css/style.css     # Clean CSS design system
    ├── js/main.js        # Interactive modals, live chat simulation, assessment wizard
    └── images/           # Brand logo, icons, deterrence photography, diagrams
```

---

## 🚀 Deployment Instructions

### 1. Clone to Web Server or cPanel
```bash
git clone https://github.com/murtuzamehdi/eunoniavigil.git public_html
```

### 2. Apache / cPanel Requirements
* **PHP:** Version 7.4 or 8.x
* **Apache Modules:** `mod_rewrite` enabled (handles clean routing via `.htaccess`)
* **AllowOverride:** `All` in Apache virtual host configuration

---

## ⚖️ Legal Operational Notice
Eunoia Vigil remote video monitoring services provided by Connectwise Consulting Inc provide an additional layer of human vigilance, proactive verification, and emergency alert escalation. Video monitoring services do not promise or guarantee that monitoring prevents crime, stops criminal acts from occurring, or guarantees police or emergency response times, which are subject to local municipal police policies and dispatch availability.

---

© 2026 Connectwise Consulting Inc / Eunoia Vigil. All rights reserved.
