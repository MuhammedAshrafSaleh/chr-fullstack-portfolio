@extends('frontend.layout.layouts')

@section('content')
    @include('frontend.project_details.sections.project_hero')
    @include('frontend.project_details.sections.project_details')
    @include('frontend.project_details.sections.services')
    @include('frontend.project_details.sections.plans')
    @include('frontend.project_details.sections.project_location')

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="js/map.js" defer></script>
@endsection

@section('scripts')
    <script type="module">
        // Import PhotoSwipe as a module
        import PhotoSwipeLightbox from 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe-lightbox.esm.min.js';

        // 1. Initialize Swiper first
        const plansSwiper = new Swiper('.plans__slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: false,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 4, // Show 4 per row like your reference
                    spaceBetween: 30,
                }
            }
        });

        // 2. Initialize PhotoSwipe Lightbox
        const lightbox = new PhotoSwipeLightbox({
            gallery: '#plans-gallery',
            children: 'a.plans__image-box',
            // This is the critical part for modular loading
            pswpModule: () => import(
                'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe.esm.min.js')
        });

        lightbox.init();
    </script>
@endsection
