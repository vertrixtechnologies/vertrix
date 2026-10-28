# Vertrix Technologies — Enterprise Managed IT & Cloud Solutions

A full-stack **Laravel 12 / PHP 8.2+** web application crafted for **Vertrix Technologies**, modeled with pixel-precision after the Hostinger BlueRidge Tech template.

Featuring high-contrast dark midnight-navy aesthetics (`#060e17`, `#0b1723`), ice-blue accents (`#c5e2f0`, `#38bdf8`), elegant serif display typography (`Cormorant Garamond`), clean modern sans-serif typography (`Plus Jakarta Sans`), interactive service specification modals, testimonial carousels, responsive FAQ accordions, and an Eloquent-backed interactive consultation assessment workflow.

---

## 🚀 Quick Start

### Prerequisites
- **PHP >= 8.2** (`php -v`)
- **Composer >= 2.0** (`composer -v`)
- **SQLite3** or MySQL / PostgreSQL

### 1. Installation
```bash
# Clone or navigate to the repository
cd Vertrix

# Install PHP dependencies
composer install

# Copy environment file and generate key (already prepared)
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate
```

### 2. Run Local Development Server
```bash
php artisan serve
```
Open **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your browser.

### 3. Run Automated Tests
```bash
php artisan test
```
Runs the full PHPUnit test suite including:
- Homepage rendering with Vertrix branding and services
- JSON API / AJAX assessment submissions with validation
- Standard HTML POST assessment submissions with flash redirect
- Error handling and database assertions

---

## 🏛️ Application Architecture

```
Vertrix/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php         # Supplies services, plans, testimonials, FAQs
│   │       └── AssessmentController.php   # Validates & persists assessment requests
│   └── Models/
│       └── Assessment.php                 # Eloquent model with fillable schema
├── bootstrap/
│   └── app.php                            # Laravel 12 application & middleware bootstrap
├── database/
│   ├── database.sqlite                    # SQLite persistence database
│   └── migrations/
│       └── 2026_10_22_000003_create_assessments_table.php
├── public/
│   ├── css/
│   │   └── styles.css                     # Pure Vanilla CSS design system & tokens
│   ├── js/
│   │   └── app.js                         # Carousel, modal drawers, FAQ accordion, AJAX
│   └── images/
│       ├── hero-city.jpg                  # High-res nighttime skyscraper skyline
│       └── team-collab.jpg                # Modern engineering squad collaboration photo
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Master layout with SEO & Open Graph meta
│       ├── partials/
│       │   ├── announcement.blade.php     # Top guarantee ribbon
│       │   ├── header.blade.php           # Sticky glassmorphic header & mobile drawer
│       │   ├── hero.blade.php             # Hero section with value strip
│       │   ├── partners.blade.php         # Microsoft, AWS, Cisco CCNA, CompTIA badges
│       │   ├── services.blade.php         # 4-tier enterprise services grid
│       │   ├── difference.blade.php       # The Vertrix Difference culture & story
│       │   ├── plans.blade.php            # Essential, Complete (Growth-Ready), Strategic
│       │   ├── testimonials.blade.php     # Testimonial carousel with counter
│       │   ├── faq.blade.php              # Expandable FAQ accordion
│       │   ├── assessment.blade.php       # Interactive assessment form with CSRF
│       │   ├── footer.blade.php           # 3-column footer and copyright
│       │   └── modal.blade.php            # Dynamic service specification drawer
│       └── home.blade.php                 # Master assembled landing page
├── routes/
│   └── web.php                            # GET / and POST /assessment
└── tests/
    └── Feature/
        ├── AssessmentTest.php             # Comprehensive feature tests
        └── ExampleTest.php
```

---

## ⚡ Key Features

1. **Hostinger BlueRidge Tech Aesthetic**:
   - Dark midnight-navy color palette with subtle borders and glassmorphism.
   - Dual-font system: `Cormorant Garamond` serif for editorial prestige and `Plus Jakarta Sans` for crisp UI legibility.
2. **Interactive Service Drawer**:
   - Dynamic slide-in drawer revealing full technical specifications and deliverables for Cybersecurity, Cloud Migration, Network Management, and 24/7 Help Desk.
3. **Interactive Testimonial Carousel**:
   - Auto-rotating client perspectives with manual next/prev controls, pause-on-hover, and slide indicator (`01 / 03`).
4. **Single-Open FAQ Accordion**:
   - Clean keyboard-accessible accordion with smooth maxHeight transition and active states.
5. **Interactive Assessment Engine**:
   - Multi-step timeline ("We listen", "We take a closer look", "You get a plan").
   - Dual-mode form: accepts standard HTML form POST with flash messages OR client-side AJAX with animated loading spinner, toast notifications, and database persistence.
6. **Built-in Eloquent Model & Migration**:
   - Captures `full_name`, `work_email`, `company_name`, `team_size`, `interested_in`, `wishlist`, `status`, and `ip_address`.
