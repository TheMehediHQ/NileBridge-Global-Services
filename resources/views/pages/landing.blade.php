@extends('layouts.app')

@section('content')
    <!-- 1. Global Talent Hero with Glowing 3D Earth Globe & Floating Badges -->
    @include('landing.hero')

    <!-- 2. Clean 4-Column Stats Bar -->
    @include('landing.stats-bar')

    <!-- 3. Our Services: Tailored Solutions for a Global Workforce -->
    @include('landing.services-grid')

    <!-- 4. How It Works: Simple Process. Powerful Results. -->
    @include('landing.process-timeline')

    <!-- 5. Why Choose Us: Built in Uganda, Designed for the World. -->
    @include('landing.uganda-hub')

    <!-- 6. Our Solutions: Comprehensive Services for Modern Businesses -->
    @include('landing.solutions-cards')

    <!-- 7. Testimonials: What Our Clients Say -->
    @include('landing.testimonials')

    <!-- 8. Pricing: Flexible Plans for Every Stage -->
    @include('landing.pricing')

    <!-- 8.5 Enterprise Benchmarks, Comparison & Value Calculator -->
    <div id="enterprise-analysis">
        @include('landing.comparison-matrix')
        @include('landing.roi-calculator')
    </div>

    <!-- 9. Ready to Get Started? Let's Build Your Team. -->
    @include('landing.cta-banner')

    <!-- 10. Frequently Asked Questions & Talk to an Expert Lead Capture -->
    @include('landing.lead-form')

    <!-- 11. Multi-Column Institutional Footer -->
    @include('landing.footer')
@endsection
