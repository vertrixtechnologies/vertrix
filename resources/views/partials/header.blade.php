<!-- Main Navigation Header -->
<header class="site-header" id="main-header">
  <div class="header-inner container">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-logo" aria-label="Vertrix Technologies Home">
      <div class="logo-mark">
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 4L36 32H28L20 18L12 32H4L20 4Z" fill="url(#logo-grad-primary)"/>
          <path d="M20 22L25 32H15L20 22Z" fill="url(#logo-grad-accent)"/>
          <circle cx="20" cy="4" r="2.5" fill="#93c5fd"/>
          <defs>
            <linearGradient id="logo-grad-primary" x1="4" y1="4" x2="36" y2="32" gradientUnits="userSpaceOnUse">
              <stop stop-color="#ffffff"/>
              <stop offset="0.6" stop-color="#93c5fd"/>
              <stop offset="1" stop-color="#3b82f6"/>
            </linearGradient>
            <linearGradient id="logo-grad-accent" x1="15" y1="22" x2="25" y2="32" gradientUnits="userSpaceOnUse">
              <stop stop-color="#60a5fa"/>
              <stop offset="1" stop-color="#1d4ed8"/>
            </linearGradient>
          </defs>
        </svg>
      </div>
      <div class="logo-text-group">
        <span class="logo-title">Vertrix<span class="logo-highlight">Tech</span></span>
        <span class="logo-subtitle">YOUR STRATEGIC IT PARTNER</span>
      </div>
    </a>

    <!-- Desktop Navigation Menu -->
    <nav class="desktop-nav" aria-label="Primary Navigation">
      <ul class="nav-links">
        <li><a href="#hero" class="nav-link active">Home</a></li>
        <li><a href="#services" class="nav-link">Services</a></li>
        <li><a href="#about" class="nav-link">About</a></li>
        <li><a href="#contact" class="nav-link">Contact</a></li>
      </ul>
    </nav>

    <!-- Action Button & Mobile Toggle -->
    <div class="header-actions">
      <a href="#contact" class="btn-primary-pill btn-header-cta" id="header-assessment-btn">
        <span>Get Free Quote</span>
        <span class="btn-icon">&rarr;</span>
      </a>
      <button class="mobile-menu-btn" id="mobile-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </button>
    </div>
  </div>

  <!-- Mobile Navigation Drawer -->
  <div class="mobile-drawer" id="mobile-drawer">
    <ul class="mobile-nav-links">
      <li><a href="#hero" class="mobile-nav-link active">Home</a></li>
      <li><a href="#services" class="mobile-nav-link">Services</a></li>
      <li><a href="#about" class="mobile-nav-link">About</a></li>
      <li><a href="#contact" class="mobile-nav-link">Contact</a></li>
      <li><a href="#contact" class="mobile-nav-link highlight">Get Free Quote &rarr;</a></li>
    </ul>
  </div>
</header>
