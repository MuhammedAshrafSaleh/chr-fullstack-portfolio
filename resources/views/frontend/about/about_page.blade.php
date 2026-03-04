@extends('frontend.layout.layouts')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@section('content')
    @include('frontend.about.sections.chr_about')
    @include('frontend.about.sections.states')
    @include('frontend.about.sections.testimonials')
    @include('frontend.about.sections.ceo_message')
    @include('frontend.about.sections.features')
    @include('frontend.about.sections.team')
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const swiper = new Swiper('.testimonials__slider', {
                slidesPerView: 1,
                spaceBetween: 24,
                centeredSlides: true,
                loop: true,
                loopedSlides: 4,
                loopPreventsSliding: false,
                autoplay: {
                    delay: 1500, // 3 seconds between slides
                    disableOnInteraction: false, // Continue autoplay after user drag/click
                    pauseOnMouseEnter: true, // Pause when user hovers mouse over slider
                },
                pagination: {
                    el: '.testimonials__pagination',
                    clickable: true,
                },
                breakpoints: {
                    // Mobile (your $breakpoint-mobile)
                    480: {
                        slidesPerView: 1.2,
                    },
                    // Tablet (your $breakpoint-tablet)
                    768: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    // Desktop (your $breakpoint-desktop)
                    1024: {
                        slidesPerView: 3,
                        centeredSlides: true,
                    }
                }
            });
        });


        document.addEventListener('DOMContentLoaded', () => {
            const teamSwiper = new Swiper('.team__slider', {
                slidesPerView: 1.2,
                spaceBetween: 24,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.team__nav-btn--next',
                    prevEl: '.team__nav-btn--prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 2.2
                    },
                }
            });
        });
    </script>
@endpush
