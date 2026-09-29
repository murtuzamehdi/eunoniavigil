<?php
$reqPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$activePage = !empty($reqPath) ? explode('/', $reqPath)[0] : 'home';
if ($activePage === 'index' || $activePage === 'index.php') {
    $activePage = 'home';
}
?>
  <!-- Top Operational Status Bar -->
  <div class="top-status-bar">
    <div class="container-wide top-status-content">
      <div class="live-indicator">
        <span class="pulse-dot"></span>
        <span>Operations Center Active: Monitoring Feeds Nationwide 24/7/365</span>
      </div>
      <div class="top-links">
        <span class="top-link-item">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          24/7 Desk: (800) 555-CCTV
        </span>
        <button class="top-link-item open-chat-modal" style="background: none; border: none; cursor: pointer; color: #34d399; font-weight: 600; display: inline-flex; align-items: center; gap: 0.4rem;">
          <span class="pulse-dot" style="width: 7px; height: 7px;"></span>
          Live Chat with Operations &rarr;
        </button>
      </div>
    </div>
  </div>

  <!-- Header & Navigation -->
  <header class="site-header">
    <div class="container-wide header-container">
      <a href="/" class="brand-logo">
        <div class="brand-logo-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
        </div>
        <div>Vigil<span>Guard</span></div>
      </a>

      <nav class="nav-menu">
        <a href="/" class="nav-link <?= ($activePage === 'home') ? 'active' : '' ?>">Home</a>
        <a href="services/" class="nav-link <?= ($activePage === 'services') ? 'active' : '' ?>">Service</a>
        <a href="clients/" class="nav-link <?= ($activePage === 'clients') ? 'active' : '' ?>">Our Clients</a>
        <a href="about/" class="nav-link <?= ($activePage === 'about') ? 'active' : '' ?>">About Us</a>
        <a href="contact/" class="nav-link <?= ($activePage === 'contact') ? 'active' : '' ?>">Contact Us</a>
      </nav>

      <div class="header-actions">
        <a href="tel:18005552288" class="btn btn-primary btn-sm">
          <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          Call Us Now
        </a>
        <button class="btn btn-secondary btn-sm open-chat-modal">
          <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
          Live Chat
        </button>
      </div>

      <button class="mobile-toggle" aria-label="Toggle Navigation">
        <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </header>
