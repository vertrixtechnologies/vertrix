<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>@yield('title', 'Vertrix Technologies — Next-Gen Managed IT & Cloud Solutions')</title>
  <meta name="description" content="@yield('meta_description', 'Vertrix Technologies delivers enterprise-grade cybersecurity, cloud migration, proactive network management, and 24/7 dedicated IT support for high-growth businesses.')">
  <meta name="keywords" content="Vertrix Technologies, Managed IT Services, Cloud Migration, Cybersecurity, IT Consulting, 24/7 IT Support, Network Management, Laravel">
  <meta name="author" content="Vertrix Technologies">
  
  <!-- Open Graph / Meta -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Vertrix Technologies — Your Business, Moving. Your Technology, Handled.">
  <meta property="og:description" content="Secure systems. Connected teams. Support that shows up. Enterprise IT peace of mind for modern scaling companies.">
  <meta property="og:image" content="{{ asset('images/hero-city.jpg') }}">
  
  <!-- Google Fonts: Cormorant Garamond + Plus Jakarta Sans + JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  
  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><polygon points='16,2 30,26 23,26 16,14 9,26 2,26' fill='%2360a5fa'/><polygon points='16,18 21,26 11,26' fill='%2393c5fd'/></svg>">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  @stack('styles')
</head>
<body>

  <!-- Top Announcement Bar -->
  @include('partials.announcement')

  <!-- Main Navigation Header -->
  @include('partials.header')

  <!-- Main Page Content -->
  <main id="main-content">
    @yield('content')
  </main>

  <!-- Site Footer -->
  @include('partials.footer')

  <!-- Service Detail Modal Drawer -->
  @include('partials.modal')

  <!-- Toast Notification Container -->
  <div class="toast-container" id="toast-container" aria-live="polite"></div>

  <!-- Main Application JavaScript -->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>
