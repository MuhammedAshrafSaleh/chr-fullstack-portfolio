    <!--================================================= Plans Section -->
    {{-- <section class="plans">
        <div class="plans__container">
            <header class="plans__header">
                <span class="plans__label">Floor Plans</span>
                <h2 class="plans__title">Floors and Spaces</h2>
            </header>

            <div class="swiper plans__slider" id="plans-gallery">
                <div class="swiper-wrapper">
                    @foreach ($project->plans as $plan)
                        <div class="swiper-slide plans__item">
                            <a href="{{ asset('storage/' . $plan->image) }}" data-pswp-width="1200"
                                data-pswp-height="1500" class="plans__image-box">
                                <img src="{{ asset('storage/' . $plan->image) }}"
                                    alt="{{ $plan->getTranslation('title', app()->getLocale()) }}">
                            </a>
                            <h3 class="plans__floor-name">{{ $plan->getTranslation('title', app()->getLocale()) }}</h3>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination plans__pagination"></div>
            </div>
        </div>
    </section> --}}
    <!--================================================= Plans Section -->
    <section class="plans">
        <div class="plans__container">

            <header class="plans__header">
                <span class="plans__label" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="0">
                    {{ $heading?->getTranslation('plans_heading', app()->getLocale()) }}
                </span>
                <h2 class="plans__title" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="150">
                    {{ $heading?->getTranslation('plans_subheading', app()->getLocale()) }}
                </h2>
            </header>

            {{-- Swiper cards are NOT animated with AOS — Swiper controls visibility, not scroll --}}
            <div class="swiper plans__slider" data-aos="zoom-in data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="300" id="plans-gallery">
                <div class="swiper-wrapper">
                    @foreach ($project->plans as $plan)
                        <div class="swiper-slide plans__item">
                            <a href="{{ asset('storage/' . $plan->image) }}" data-pswp-width="1200"
                                data-pswp-height="1500" class="plans__image-box">
                                <img src="{{ asset('storage/' . $plan->image) }}"
                                    alt="{{ $plan->getTranslation('title', app()->getLocale()) }}">
                            </a>
                            <h3 class="plans__floor-name">{{ $plan->getTranslation('title', app()->getLocale()) }}</h3>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination plans__pagination"></div>
            </div>

        </div>
    </section>
