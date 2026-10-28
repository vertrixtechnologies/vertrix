@extends('layouts.app')

@section('title', 'Vertrix Technologies — Next-Gen Managed IT & Cloud Solutions')
@section('meta_description', 'Vertrix Technologies delivers enterprise-grade cybersecurity, cloud migration, proactive network management, and 24/7 dedicated IT support for high-growth businesses.')

@section('content')
  {{-- Hero Section --}}
  @include('partials.hero')

  {{-- Partners & Certifications Ecosystem Bar --}}
  @include('partials.partners')

  {{-- 5 Core Enterprise Services --}}
  @include('partials.services')

  {{-- About Vertrix, Mission, Vision, Core Values & Visionaries --}}
  @include('partials.about')

  {{-- Testimonials Carousel (The Human Side of IT) --}}
  @include('partials.testimonials')

  {{-- FAQ Accordion --}}
  @include('partials.faq')

  {{-- Interactive Assessment & Consultation Form --}}
  @include('partials.assessment')
@endsection
