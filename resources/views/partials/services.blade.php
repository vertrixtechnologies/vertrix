<!-- Services Section: "Everything you need. Nothing in your way." -->
<section class="services-section section-padding" id="services">
  <div class="container services-container">
    
    <!-- Section Header -->
    <div class="services-header-row">
      <div class="services-header-left">
        <span class="eyebrow-caps">LESS FRICTION. UNCOMPROMISING SCALE.</span>
        <h2 class="section-display-title">
          Engineered for digital excellence.<br>
          <em>Built for modern scale.</em>
        </h2>
      </div>
      <div class="services-header-right">
        <p class="section-lead-text">
          From full-lifecycle SaaS platforms and high-assurance cybersecurity to custom AI workflows and multi-cloud DevOps, Vertrix delivers specialized engineering that accelerates your market momentum.
        </p>
      </div>
    </div>

    <!-- Vertrix Core Services Grid -->
    <div class="services-grid services-grid-5">
      @foreach($services as $service)
        <article class="service-card" data-service="{{ $service['id'] }}" style="--card-index: {{ $loop->index }};">
          <div class="service-card-top">
            <div class="service-card-meta">
              <span class="service-num">{{ $service['num'] }}</span>
              @if(!empty($service['badge']))
                <span class="service-category-badge">{{ $service['badge'] }}</span>
              @endif
            </div>

            <div class="service-icon-wrap">
              @if($service['icon'] === 'Rocket')
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 9V4s3.03.55 4 2c1.08 1.62 0 5 0 5"/></svg>
              @elseif($service['icon'] === 'ShieldCheck')
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
              @elseif($service['icon'] === 'Code2')
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 16 4-4-4-4"/><path d="m6 8-4 4 4 4"/><path d="m14.5 4-5 16"/></svg>
              @elseif($service['icon'] === 'BrainCircuit')
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/><path d="M9 13a4.5 4.5 0 0 0 3-4"/><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/><path d="M3.477 10.896a4 4 0 0 1 .585-.396"/><path d="M6 18a4 4 0 0 1-1.967-.518"/><path d="M12 13h4"/><path d="M12 18h6a2 2 0 0 1 2 2v1"/><path d="M12 8h8"/><path d="M20.5 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/><path d="M16.5 13a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/><path d="M20.5 21a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/></svg>
              @else
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"/></svg>
              @endif
            </div>

            <h3 class="service-card-title">{{ $service['title'] }}</h3>
            <p class="service-card-desc">
              {{ $service['description'] }}
            </p>
          </div>

          <div class="service-features-list">
            @foreach($service['tags'] as $tag)
              <span class="service-pill">{{ $tag }}</span>
            @endforeach
          </div>

          <div class="service-card-bottom">
            <button class="service-explore-btn" data-modal="{{ $service['id'] }}" aria-label="Explore {{ $service['title'] }} Service">
              <span>Explore service</span>
              <span class="plus-icon-badge"><span class="plus-icon">+</span></span>
            </button>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
