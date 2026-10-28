<!-- FAQ Section: "A little clarity goes a long way." -->
<section class="faq-section section-padding" id="faq">
  <div class="container faq-grid">
    
    <!-- FAQ Left Intro -->
    <div class="faq-intro">
      <span class="eyebrow-caps">FREQUENTLY ASKED QUESTIONS</span>
      <h2 class="faq-headline">
        A little clarity<br>goes a long way.
      </h2>
      <p class="faq-subtext">
        Still have a question? We’re happy to help you find the right setup.
      </p>
      <a href="#assessment" class="btn-underline-arrow">
        <span>Start a conversation</span>
        <span class="arrow">&nearr;</span>
      </a>
    </div>

    <!-- FAQ Accordion List -->
    <div class="faq-accordion" id="faq-accordion">
      @foreach($faqs as $faq)
        <div class="faq-item {{ $loop->first ? 'active' : '' }}">
          <button class="faq-trigger" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
            <span class="faq-question">{{ $faq['question'] }}</span>
            <span class="faq-icon"></span>
          </button>
          <div class="faq-content">
            <p>
              {{ $faq['answer'] }}
            </p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
