<!-- Interactive Assessment & Consultation Form Section: "Let's find your clear path forward." -->
<section class="assessment-section section-padding" id="contact">
  <span id="assessment" class="section-anchor" aria-hidden="true"></span>
  <div class="container assessment-grid">
    
    <!-- Left Column: Story & 3-Step Process -->
    <div class="assessment-left">
      <span class="eyebrow-caps">GET STARTED TODAY</span>
      <h2 class="assessment-headline">
        Let’s find your<br>
        <em>clear path forward.</em>
      </h2>
      
      <p class="assessment-lead">
        Tell us a little about your business. We’ll help you understand where your IT stands, what’s working, and what’s worth improving.
      </p>

      <!-- 3-Step Steps -->
      <div class="assessment-steps">
        <div class="step-card">
          <div class="step-num">01</div>
          <div class="step-body">
            <h4 class="step-title">We listen</h4>
            <p class="step-text">A 20-minute discovery conversation focused on your current operations and goals.</p>
          </div>
        </div>

        <div class="step-card">
          <div class="step-num">02</div>
          <div class="step-body">
            <h4 class="step-title">We take a closer look</h4>
            <p class="step-text">A thorough, non-intrusive review of your cybersecurity posture, cloud setup, and hardware.</p>
          </div>
        </div>

        <div class="step-card">
          <div class="step-num">03</div>
          <div class="step-body">
            <h4 class="step-title">You get a plan</h4>
            <p class="step-text">Clear, prioritized recommendations with estimated cost savings and zero obligation.</p>
          </div>
        </div>
      </div>

    </div>

    <!-- Right Column: Interactive Consultation Form -->
    <div class="assessment-form-card">
      @if(session('success'))
        <div class="alert alert-success" style="padding: 1rem 1.25rem; background: rgba(59, 130, 246, 0.15); border: 1px solid #3b82f6; border-radius: 8px; color: #93c5fd; margin-bottom: 1.5rem;">
          {{ session('success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger" style="padding: 1rem 1.25rem; background: rgba(239, 68, 68, 0.15); border: 1px solid #ef4444; border-radius: 8px; color: #fca5a5; margin-bottom: 1.5rem;">
          <ul style="margin: 0; padding-left: 1.25rem;">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="it-assessment-form" class="assessment-form" action="{{ route('assessment.store') }}" method="POST" novalidate>
        @csrf
        
        <div class="form-row">
          <div class="form-group {{ $errors->has('fullName') ? 'has-error' : '' }}">
            <label for="fullName">Full name <span class="required">*</span></label>
            <input type="text" id="fullName" name="fullName" value="{{ old('fullName') }}" placeholder="Jane Doe" required>
            <span class="form-error-msg" id="error-fullName">Please enter your full name</span>
          </div>

          <div class="form-group {{ $errors->has('workEmail') ? 'has-error' : '' }}">
            <label for="workEmail">Work email <span class="required">*</span></label>
            <input type="email" id="workEmail" name="workEmail" value="{{ old('workEmail') }}" placeholder="jane@company.com" required>
            <span class="form-error-msg" id="error-workEmail">Please enter a valid work email</span>
          </div>
        </div>

        <div class="form-group {{ $errors->has('companyName') ? 'has-error' : '' }}">
          <label for="companyName">Company name <span class="required">*</span></label>
          <input type="text" id="companyName" name="companyName" value="{{ old('companyName') }}" placeholder="Your business name" required>
          <span class="form-error-msg" id="error-companyName">Please enter your company name</span>
        </div>

        <div class="form-row">
          <div class="form-group {{ $errors->has('teamSize') ? 'has-error' : '' }}">
            <label for="teamSize">Team size <span class="required">*</span></label>
            <div class="select-wrapper">
              <select id="teamSize" name="teamSize" required>
                <option value="" disabled {{ old('teamSize') ? '' : 'selected' }}>Select team size</option>
                <option value="1-15" {{ old('teamSize') == '1-15' ? 'selected' : '' }}>1 – 15 employees (Early Stage)</option>
                <option value="16-50" {{ old('teamSize') == '16-50' ? 'selected' : '' }}>16 – 50 employees (Growth)</option>
                <option value="51-200" {{ old('teamSize') == '51-200' ? 'selected' : '' }}>51 – 200 employees (Scaling)</option>
                <option value="200+" {{ old('teamSize') == '200+' ? 'selected' : '' }}>200+ employees (Enterprise)</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="interestedIn">Primary interest</label>
            <div class="select-wrapper">
              <select id="interestedIn" name="interestedIn">
                <option value="saas" {{ old('interestedIn') == 'saas' ? 'selected' : '' }}>SaaS Platform Development</option>
                <option value="cybersecurity" {{ old('interestedIn') == 'cybersecurity' ? 'selected' : '' }}>Cybersecurity (SOC &amp; VAPT)</option>
                <option value="webdev" {{ old('interestedIn') == 'webdev' ? 'selected' : '' }}>Full-Stack Web Development</option>
                <option value="ai" {{ old('interestedIn') == 'ai' ? 'selected' : '' }}>AI Integration &amp; Machine Learning</option>
                <option value="cloud" {{ old('interestedIn') == 'cloud' ? 'selected' : '' }}>Cloud Architecture &amp; DevOps</option>
                <option value="complete" {{ old('interestedIn') == 'complete' ? 'selected' : '' }}>Complete Tech Partnership</option>
                <option value="assessment" {{ old('interestedIn') == 'assessment' ? 'selected' : '' }}>Free Architecture &amp; Security Audit</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="wishlist">What’s on your IT wish list? <span class="optional">(optional)</span></label>
          <textarea id="wishlist" name="wishlist" rows="3" placeholder="Tell us about your biggest technology challenges, upcoming projects, or goals...">{{ old('wishlist') }}</textarea>
        </div>

        <div class="form-checkbox-group {{ $errors->has('privacyConsent') ? 'has-error' : '' }}">
          <label class="custom-checkbox">
            <input type="checkbox" id="privacyConsent" name="privacyConsent" value="1" required {{ old('privacyConsent') ? 'checked' : '' }}>
            <span class="checkbox-indicator"></span>
            <span class="checkbox-label">
              I agree to be contacted regarding my assessment and understand the <a href="#" class="inline-link" id="view-privacy-link">privacy policy</a>.
            </span>
          </label>
          <span class="form-error-msg" id="error-privacyConsent">You must agree to the privacy notice</span>
        </div>

        <button type="submit" class="btn-submit-assessment" id="submit-btn">
          <span class="btn-text">Get my free assessment</span>
          <span class="btn-arrow">&nearr;</span>
          <span class="btn-spinner" aria-hidden="true"></span>
        </button>
      </form>

      <!-- Form Success State (Revealed after submission) -->
      <div class="form-success-state" id="form-success" style="display: none;">
        <div class="success-icon">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h3 class="success-title">Assessment Request Received!</h3>
        <p class="success-desc">
          Thank you, <span id="success-client-name">there</span>. One of our Senior IT Architects will review your company details and reach out within 2 business hours with your audit schedule.
        </p>
        <button class="btn-outline-glass btn-reset-form" id="reset-form-btn">
          Submit another inquiry
        </button>
      </div>

    </div>

  </div>
</section>
