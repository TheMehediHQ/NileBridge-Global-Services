@extends('layouts.app')

@section('content')
    <!-- 1. Global Talent Hero -->
    @include('landing.hero')

    <!-- 2. Stats Bar -->
    @include('landing.stats-bar')

    <!-- 3. Core Services Grid -->
    @include('landing.services-grid')

    <!-- 4. Deployment Timeline -->
    @include('landing.process-timeline')

    <!-- 5. Performance Bar Charts & Benchmarks -->
    @include('landing.performance-charts')

    <!-- 6. Traditional vs NileBridge Comparison Matrix -->
    @include('landing.comparison-matrix')

    <!-- 7. Interactive Savings/ROI Calculator -->
    @include('landing.roi-calculator')

    <!-- 8. Enterprise Lead Capture Form -->
    @include('landing.lead-form')

    <!-- 9. Multi-Column Institutional Footer -->
    @include('landing.footer')
@endsection
