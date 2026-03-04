<!--============================================= Team Section -->
{{-- <section class="team">
    <div class="team__container">

        <div class="team__header">
            <h2 class="team__title">{{ $aboutHeading->team_title }}</h2>
            <p class="team__subtitle">{{ $aboutHeading->team_subtitle }}</p>

            <div class="team__navigation">
                <button class="team__nav-btn team__nav-btn--prev">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="team__nav-btn team__nav-btn--next">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="team__slider swiper">
            <div class="swiper-wrapper">
                @foreach ($team as $member)
                    <article class="swiper-slide team__card">
                        <div class="team__image-wrapper">
                            <img src="{{ $member->image ? asset('storage/' . $member->image) : 'https://via.placeholder.com/600' }}"
                                alt="{{ $member->title }}" class="team__img">
                        </div>
                        <h3 class="team__name">{{ $member->title }}</h3>
                        <p class="team__role">{{ $member->subtitle }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}

<!--============================================= Team Section -->
<section class="team">
    <div class="team__container">

        <div class="team__header">
            <h2 class="team__title" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300" data-aos-delay="0">
                {{ $aboutHeading->team_title }}
            </h2>
            <p class="team__subtitle" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="150">
                {{ $aboutHeading->team_subtitle }}
            </p>

            <div class="team__navigation" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="300">
                <button class="team__nav-btn team__nav-btn--prev">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="team__nav-btn team__nav-btn--next">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Swiper cards are NOT animated with AOS — Swiper controls visibility, not scroll --}}
        <div class="team__slider swiper" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
            data-aos-delay="400">
            <div class="swiper-wrapper">
                @foreach ($team as $member)
                    <article class="swiper-slide team__card">
                        <div class="team__image-wrapper">
                            <img src="{{ $member->image ? asset('storage/' . $member->image) : 'https://via.placeholder.com/600' }}"
                                alt="{{ $member->title }}" class="team__img">
                        </div>
                        <h3 class="team__name">{{ $member->title }}</h3>
                        <p class="team__role">{{ $member->subtitle }}</p>
                    </article>
                @endforeach
            </div>
        </div>

    </div>
</section>
