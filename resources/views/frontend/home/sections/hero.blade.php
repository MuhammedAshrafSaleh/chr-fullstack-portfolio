{{-- <section class="hero">
    <!-- Video Background - Optimized with preload and poster -->
    <video class="hero__video" autoplay muted loop playsinline preload="metadata" poster="media/video-poster.jpg">
        <source src="{{ asset('frontend/assets/media/chr.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="hero__overlay"></div>

    <!-- Content -->
    <div class="content">
        <h1 class="content__title">
            Crafting Landmark Properties</h1>

        <p class="content__description">
            At CHR Developments, we transform visionary concepts into architectural masterpieces. With an unwavering
            commitment to excellence, sustainability, and innovation, we create exceptional spaces that elevate
            lifestyles and set new standards in real estate development across the region.
        </p>

        <div class="content__buttons">
            <button class="project-info__cta">
                <span class="project-info__cta-icon">+</span>
                <span class="project-info__cta-text">LEARN MORE</span>
            </button>
        </div>
    </div>
</section> --}}

<section class="hero">
    <!-- Video Background - Optimized with preload and poster -->
    <video class="hero__video" autoplay muted loop playsinline preload="metadata" poster="media/video-poster.jpg">
        @if($hero && $hero->video)
            <source src="{{ asset('storage/' . $hero->video) }}" type="video/mp4">
        @else
            <source src="{{ asset('frontend/assets/media/chr.mp4') }}" type="video/mp4">
        @endif
        Your browser does not support the video tag.
    </video>

    <div class="hero__overlay"></div>

    <!-- Content -->
    <div class="content">
        <h1 class="content__title">
            {{ $hero?->title ?? 'Crafting Landmark Properties' }}
        </h1>

        <p class="content__description">
            {{ $hero?->description ?? 'At CHR Developments, we transform visionary concepts into architectural masterpieces. With an unwavering commitment to excellence, sustainability, and innovation, we create exceptional spaces that elevate lifestyles and set new standards in real estate development across the region.' }}
        </p>

        <div class="content__buttons">
            <button class="project-info__cta">
                <span class="project-info__cta-icon">+</span>
                <span class="project-info__cta-text">LEARN MORE</span>
            </button>
        </div>
    </div>
</section>