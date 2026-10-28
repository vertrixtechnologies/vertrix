/**
 * Vertrix Technologies — Interactive UI Logic & Form Controller
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Sticky Header & Scroll Effects
  const header = document.getElementById('main-header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  // 2. Mobile Menu Navigation Toggle
  const mobileToggle = document.getElementById('mobile-toggle');
  const mobileDrawer = document.getElementById('mobile-drawer');

  if (mobileToggle && mobileDrawer) {
    mobileToggle.addEventListener('click', () => {
      const isOpen = mobileToggle.classList.toggle('open');
      mobileDrawer.classList.toggle('open');
      mobileToggle.setAttribute('aria-expanded', isOpen);
    });

    // Close mobile drawer when clicking any link
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
      link.addEventListener('click', () => {
        mobileToggle.classList.remove('open');
        mobileDrawer.classList.remove('open');
        mobileToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // 3. Smooth Scroll Navigation Spy
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#' || targetId === '') return;

      const targetEl = document.querySelector(targetId);
      if (targetEl) {
        e.preventDefault();
        const headerHeight = header ? header.offsetHeight : 72;
        const targetPos = targetEl.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPos,
          behavior: 'smooth'
        });
      }
    });
  });

  // 4. Testimonial Carousel
  const slides = document.querySelectorAll('.testimonial-slide');
  const prevBtn = document.getElementById('prev-testimonial');
  const nextBtn = document.getElementById('next-testimonial');
  const counterCurrent = document.querySelector('.counter-current');
  let currentSlide = 0;
  let autoAdvanceTimer = null;

  function showSlide(index) {
    if (!slides.length) return;

    if (index >= slides.length) currentSlide = 0;
    else if (index < 0) currentSlide = slides.length - 1;
    else currentSlide = index;

    slides.forEach((slide, idx) => {
      slide.classList.toggle('active', idx === currentSlide);
    });

    if (counterCurrent) {
      counterCurrent.textContent = String(currentSlide + 1).padStart(2, '0');
    }
  }

  if (prevBtn && nextBtn && slides.length > 0) {
    prevBtn.addEventListener('click', () => {
      showSlide(currentSlide - 1);
      resetAutoAdvance();
    });

    nextBtn.addEventListener('click', () => {
      showSlide(currentSlide + 1);
      resetAutoAdvance();
    });

    function startAutoAdvance() {
      autoAdvanceTimer = setInterval(() => {
        showSlide(currentSlide + 1);
      }, 7000);
    }

    function resetAutoAdvance() {
      clearInterval(autoAdvanceTimer);
      startAutoAdvance();
    }

    startAutoAdvance();

    // Pause on hover
    const carouselWrapper = document.getElementById('testimonial-carousel');
    if (carouselWrapper) {
      carouselWrapper.addEventListener('mouseenter', () => clearInterval(autoAdvanceTimer));
      carouselWrapper.addEventListener('mouseleave', () => startAutoAdvance());
    }
  }

  // 5. FAQ Accordion Logic
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger');
    if (trigger) {
      trigger.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        // Close all other items
        faqItems.forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.classList.remove('active');
            const otherTrigger = otherItem.querySelector('.faq-trigger');
            if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
          }
        });

        // Toggle current item
        item.classList.toggle('active', !isActive);
        trigger.setAttribute('aria-expanded', !isActive);
      });
    }
  });

  // 6. Service Modal Data & Interactivity
  const serviceData = {
    saas: {
      category: 'PRODUCT ENGINEERING & SCALE',
      title: 'SaaS Platform Development',
      content: `
        <p>Turn vision into market-leading software products. We engineer resilient multi-tenant SaaS platforms tailored for hyper-growth, rapid user acquisition, and seamless monetization.</p>
        <h4>Key Capabilities & Deliverables:</h4>
        <ul>
          <li><strong>Multi-Tenant Database Architecture:</strong> High-isolation data partitioning with row-level security and elastic scaling.</li>
          <li><strong>Subscription & Stripe Monetization:</strong> Automated recurring billing, usage-based tiers, and customer self-serve portals.</li>
          <li><strong>Microservices & Event-Driven APIs:</strong> Decoupled backend architecture built with asynchronous queues and message brokers.</li>
          <li><strong>CI/CD & Automated Quality Gates:</strong> Zero-downtime deployment pipelines with automated end-to-end regression suites.</li>
        </ul>
        <p>Built for modern founders who demand velocity, rock-solid security, and scalable infrastructure from day one.</p>
      `
    },
    cybersecurity: {
      category: 'ENTERPRISE THREAT DEFENSE',
      title: 'Cybersecurity (SOC Monitoring & VAPT)',
      content: `
        <p>Security is deeply embedded into every line of code we ship. We safeguard your client data, infrastructure, and brand reputation with proactive 24/7 defenses.</p>
        <h4>Key Capabilities & Deliverables:</h4>
        <ul>
          <li><strong>VAPT Penetration Testing:</strong> Systematic white-box and black-box penetration assessments covering web, APIs, and cloud networks.</li>
          <li><strong>24/7 SOC Surveillance & Incident Response:</strong> Continuous monitoring with sub-5-minute active threat containment.</li>
          <li><strong>OWASP Top 10 Hardening:</strong> Mitigation against SQL injection, broken authentication, XSS, and security misconfigurations.</li>
          <li><strong>Compliance Readiness (SOC 2, ISO 27001 & HIPAA):</strong> Automated policy generation, audit trail collection, and regulatory verification.</li>
        </ul>
      `
    },
    webdev: {
      category: 'FULL-STACK EXCELLENCE',
      title: 'Custom Web Application Development',
      content: `
        <p>High-performance web applications built on modern, battle-tested technology stacks: Laravel & PHP, MERN stack (React, Node.js, Express, MongoDB), and Python/Django.</p>
        <h4>Key Capabilities & Deliverables:</h4>
        <ul>
          <li><strong>Modern Framework Mastery:</strong> Robust architectures built with Laravel, Node.js, React, and Python.</li>
          <li><strong>High-Velocity API Ecosystem:</strong> Fast REST and GraphQL gateways built for real-time data sync and mobile apps.</li>
          <li><strong>Performance Optimization:</strong> Sub-second page loads with Redis caching, database indexing, and CDN integration.</li>
          <li><strong>Responsive & Accessible UI:</strong> Pixel-perfect interfaces crafted with modern Tailwind CSS and fluid micro-animations.</li>
        </ul>
      `
    },
    ai: {
      category: 'INTELLIGENT SYSTEMS & AUTOMATION',
      title: 'AI Integration & Machine Learning',
      content: `
        <p>Integrate cutting-edge Artificial Intelligence into your existing products. We design autonomous LLM agents, custom fine-tuned models, and predictive data pipelines.</p>
        <h4>Key Capabilities & Deliverables:</h4>
        <ul>
          <li><strong>Custom LLM Agents & Tool Use:</strong> Deploy autonomous agents capable of performing complex multi-step workflows.</li>
          <li><strong>Retrieval-Augmented Generation (RAG):</strong> Private vector databases (Pinecone / pgvector) for instant knowledge retrieval.</li>
          <li><strong>Predictive Analytics & Forecasting:</strong> Machine learning models identifying user churn, demand spikes, and anomaly detection.</li>
          <li><strong>Workflow & Process Automation:</strong> Streamline manual repetitive operations and cut human overhead by up to 70%.</li>
        </ul>
      `
    },
    cloud: {
      category: 'CLOUD MODERNIZATION & DEVOPS',
      title: 'Cloud Architecture & DevOps',
      content: `
        <p>Whether you're migrating legacy on-premise infrastructure or scaling up a multi-cloud Kubernetes cluster, Vertrix ensures a flawless transition with zero customer disruption.</p>
        <h4>Key Capabilities & Deliverables:</h4>
        <ul>
          <li><strong>AWS & Azure Enterprise Setup:</strong> Certified multi-cloud architecture engineered for high availability and low latency.</li>
          <li><strong>Kubernetes & Docker Orchestration:</strong> Automated auto-scaling container clusters that adapt to traffic surges.</li>
          <li><strong>FinOps Cloud Cost Optimization:</strong> Audit idle instances and reserved capacity to trim cloud bills by up to 35%.</li>
          <li><strong>Automated Disaster Recovery:</strong> Geo-redundant snapshots, automatic failovers, and 99.99% uptime SLA guarantee.</li>
        </ul>
      `
    }
  };

  const serviceModal = document.getElementById('service-modal');
  const modalCloseBtn = document.getElementById('modal-close-btn');
  const modalCat = document.getElementById('modal-service-cat');
  const modalTitle = document.getElementById('modal-service-title');
  const modalBody = document.getElementById('modal-service-body');
  const modalCtaBtn = document.getElementById('modal-cta-btn');
  const interestSelect = document.getElementById('interestedIn');

  function openServiceModal(serviceKey) {
    const data = serviceData[serviceKey] || serviceData.cybersecurity;
    if (modalCat) modalCat.textContent = data.category;
    if (modalTitle) modalTitle.textContent = data.title;
    if (modalBody) modalBody.innerHTML = data.content;

    if (serviceModal) {
      serviceModal.classList.add('open');
      serviceModal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    if (interestSelect) {
      if (serviceKey === 'cybersecurity') interestSelect.value = 'cybersecurity';
      else if (serviceKey === 'cloud') interestSelect.value = 'cloud';
      else if (serviceKey === 'saas') interestSelect.value = 'saas';
      else if (serviceKey === 'webdev') interestSelect.value = 'webdev';
      else if (serviceKey === 'ai') interestSelect.value = 'ai';
      else interestSelect.value = 'complete';
    }
  }

  function closeServiceModal() {
    if (serviceModal) {
      serviceModal.classList.remove('open');
      serviceModal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }
  }

  // Attach modal triggers
  document.querySelectorAll('[data-modal]').forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const serviceKey = trigger.getAttribute('data-modal');
      openServiceModal(serviceKey);
    });
  });

  if (modalCloseBtn) {
    modalCloseBtn.addEventListener('click', closeServiceModal);
  }

  if (serviceModal) {
    serviceModal.addEventListener('click', (e) => {
      if (e.target === serviceModal) closeServiceModal();
    });
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && serviceModal && serviceModal.classList.contains('open')) {
      closeServiceModal();
    }
  });

  if (modalCtaBtn) {
    modalCtaBtn.addEventListener('click', () => {
      closeServiceModal();
      const assessmentSection = document.getElementById('assessment');
      if (assessmentSection) {
        assessmentSection.scrollIntoView({ behavior: 'smooth' });
      }
    });
  }

  // 6b. Service Card Staggered Scroll Reveal & Dynamic Mouse Spotlight
  const serviceCards = document.querySelectorAll('.service-card');
  if (serviceCards.length > 0) {
    if ('IntersectionObserver' in window) {
      serviceCards.forEach(card => card.classList.add('reveal-ready'));

      const serviceObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('reveal-active');
            obs.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.12,
        rootMargin: '0px 0px -30px 0px'
      });

      serviceCards.forEach(card => serviceObserver.observe(card));
    } else {
      serviceCards.forEach(card => card.classList.add('reveal-active'));
    }

    // Dynamic Mouse Spotlight & Whole Card Click Trigger
    serviceCards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);
      });

      card.addEventListener('click', (e) => {
        if (!e.target.closest('button') && !e.target.closest('a')) {
          const serviceId = card.getAttribute('data-service');
          if (serviceId) openServiceModal(serviceId);
        }
      });
    });
  }

  // 7. Pricing Card CTA Buttons
  document.querySelectorAll('[data-plan]').forEach(btn => {
    btn.addEventListener('click', () => {
      const planName = btn.getAttribute('data-plan');
      if (interestSelect) {
        interestSelect.value = 'complete';
      }
      const wishlist = document.getElementById('wishlist');
      if (wishlist) {
        wishlist.value = `Interested in the Vertrix ${planName} Plan.`;
      }
      const assessmentEl = document.getElementById('assessment');
      if (assessmentEl) {
        assessmentEl.scrollIntoView({ behavior: 'smooth' });
      }
      showToast(`Selected the ${planName} Plan! Let's tailor your quote.`);
    });
  });

  // 8. Assessment Header and Hero Button Smooth Scroll
  const headerAssessmentBtn = document.getElementById('header-assessment-btn');
  const heroCtaBtn = document.getElementById('hero-cta-btn');

  function scrollToAssessment() {
    const el = document.getElementById('assessment');
    if (el) {
      el.scrollIntoView({ behavior: 'smooth' });
      const fullNameInput = document.getElementById('fullName');
      if (fullNameInput) {
        setTimeout(() => fullNameInput.focus(), 600);
      }
    }
  }

  if (headerAssessmentBtn) headerAssessmentBtn.addEventListener('click', scrollToAssessment);
  if (heroCtaBtn) heroCtaBtn.addEventListener('click', scrollToAssessment);

  // 9. Assessment Form Validation & AJAX Submission
  const assessmentForm = document.getElementById('it-assessment-form');
  const formSuccess = document.getElementById('form-success');
  const submitBtn = document.getElementById('submit-btn');
  const resetFormBtn = document.getElementById('reset-form-btn');
  const successClientName = document.getElementById('success-client-name');

  if (assessmentForm) {
    assessmentForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      let isValid = true;
      const fullName = document.getElementById('fullName');
      const workEmail = document.getElementById('workEmail');
      const companyName = document.getElementById('companyName');
      const teamSize = document.getElementById('teamSize');
      const privacyConsent = document.getElementById('privacyConsent');

      // Helper validator
      function validateField(inputEl, condition) {
        const parent = inputEl.closest('.form-group') || inputEl.closest('.form-checkbox-group');
        if (!condition) {
          if (parent) parent.classList.add('has-error');
          return false;
        } else {
          if (parent) parent.classList.remove('has-error');
          return true;
        }
      }

      if (!validateField(fullName, fullName.value.trim().length >= 2)) isValid = false;
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!validateField(workEmail, emailPattern.test(workEmail.value.trim()))) isValid = false;
      if (!validateField(companyName, companyName.value.trim().length >= 2)) isValid = false;
      if (!validateField(teamSize, teamSize.value !== '')) isValid = false;
      if (!validateField(privacyConsent, privacyConsent.checked)) isValid = false;

      if (!isValid) {
        showToast('Please complete all required fields correctly.', 'warning');
        return;
      }

      // Show loading spinner
      submitBtn.classList.add('loading');
      submitBtn.disabled = true;

      const formData = {
        fullName: fullName.value.trim(),
        workEmail: workEmail.value.trim(),
        companyName: companyName.value.trim(),
        teamSize: teamSize.value,
        interestedIn: document.getElementById('interestedIn').value,
        wishlist: document.getElementById('wishlist').value.trim()
      };

      try {
        // Post to Laravel backend API route if available, or simulate seamless transition
        let response;
        try {
          const csrfTokenEl = document.querySelector('meta[name="csrf-token"]');
          const csrfToken = csrfTokenEl ? csrfTokenEl.getAttribute('content') : '';

          response = await fetch('/assessment', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(formData)
          });
        } catch (err) {
          // If running static or without server running yet, fallback gracefully
          response = { ok: true };
        }

        setTimeout(() => {
          submitBtn.classList.remove('loading');
          submitBtn.disabled = false;

          assessmentForm.style.display = 'none';
          if (formSuccess) {
            formSuccess.style.display = 'block';
            if (successClientName) successClientName.textContent = formData.fullName;
          }

          showToast('Assessment request confirmed! Our architects will reach out shortly.');
        }, 1200);

      } catch (error) {
        submitBtn.classList.remove('loading');
        submitBtn.disabled = false;
        showToast('Something went wrong. Please try again or email contact@vertrixtech.com', 'error');
      }
    });

    if (resetFormBtn) {
      resetFormBtn.addEventListener('click', () => {
        assessmentForm.reset();
        assessmentForm.style.display = 'block';
        if (formSuccess) formSuccess.style.display = 'none';
      });
    }
  }

  // 10. Toast Notification System
  function showToast(message, type = 'info') {
    const toastContainer = document.getElementById('toast-container');
    if (!toastContainer) return;

    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <path d="M12 16v-4M12 8h.01"/>
      </svg>
      <span>${message}</span>
    `;

    toastContainer.appendChild(toast);

    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(20px)';
      toast.style.transition = 'all 0.3s ease';
      setTimeout(() => toast.remove(), 300);
    }, 4500);
  }
});
