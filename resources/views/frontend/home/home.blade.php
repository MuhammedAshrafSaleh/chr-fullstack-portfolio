@extends('frontend.layout.layouts')

@section('title')
    CHR Development - Crafting Landmark Properties
@endsection

@push('css')
    {{-- <script>
        document.documentElement.style.visibility = 'hidden';
    </script> --}}
@endpush

@section('content')
    {{-- <span class="loader"></span> --}}
    <!--================================================= Hero Section -->
    @include('frontend.home.sections.hero')

    <!--================================================= About Section -->
    @include('frontend.home.sections.about')

    <!--=================================================  Featured Projects Section -->
    @include('frontend.home.sections.featured_projects')

    <!--================================================= Blog Section -->
    @include('frontend.home.sections.blog')

    <!--================================================= Contact Section -->
    @include('frontend.home.sections.contact')
@endsection

@push('scripts')
    <script src="{{ asset('frontend/assets/js/featured_projects.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/js/counter_animation.js') }}" defer></script>
@endpush
