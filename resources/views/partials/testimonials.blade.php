<!-- Client Perspectives / Testimonials Carousel -->
<section class="testimonials-section section-padding" id="clients">
  <!-- Faint background watermark -->
  <div class="testimonials-watermark" aria-hidden="true">Confidence</div>
  
  <div class="container testimonials-grid">
    
    <!-- Left Column -->
    <div class="testimonials-info">
      <span class="eyebrow-caps">THE HUMAN SIDE OF IT</span>
      <h2 class="testimonials-headline">
        Good technology.<br>
        <em>Even better people.</em>
      </h2>
      <p class="testimonials-subtext">
        The kind of true engineering partnership modern businesses should expect.
      </p>
      <span class="tag-perspectives">CLIENT PERSPECTIVES</span>
    </div>

    <!-- Right Column: Interactive Carousel -->
    <div class="testimonials-carousel-wrapper">
      <div class="carousel-container" id="testimonial-carousel">
        @foreach($testimonials as $index => $item)
          <div class="testimonial-slide {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}">
            <div class="quote-mark">&ldquo;</div>
            <p class="quote-text">
              {{ $item['quote'] }}
            </p>
            <div class="client-info">
              <div class="client-avatar">{{ $item['avatar'] }}</div>
              <div class="client-details">
                <span class="client-name">{{ $item['name'] }}</span>
                <span class="client-role">{{ $item['role'] }} &middot; {{ $item['company'] }}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Carousel Navigation Controls -->
      <div class="carousel-controls">
        <div class="carousel-counter" id="carousel-counter">
          <span class="counter-current">01</span> / <span class="counter-total">{{ sprintf('%02d', count($testimonials)) }}</span>
        </div>
        <div class="carousel-buttons">
          <button class="carousel-btn prev-btn" id="prev-testimonial" aria-label="Previous testimonial">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
          </button>
          <button class="carousel-btn next-btn" id="next-testimonial" aria-label="Next testimonial">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </button>
        </div>
      </div>
    </div>

  </div>
</section>
