{{-- <!--============================================= testimonials Section -->
<section class="testimonials">
    <div class="testimonials__container">
        <header class="testimonials__header">
            <span class="testimonials__subtitle">{{ $aboutHeading->testimonials_subtitle }}</span>
            <h2 class="testimonials__title">{{ $aboutHeading->testimonials_title }}</h2>
        </header>

        <div class="testimonials__slider swiper">
            <div class="swiper-wrapper">

                @foreach ($testimonials as $testimonial)
                    <article class="testimonials__card swiper-slide">
                        <div class="testimonials__rating">
                            <span class="testimonials__star">★</span>
                            <span class="testimonials__score">{{ $testimonial->rate }}</span>
                        </div>
                        <p class="testimonials__text">
                            {{ $testimonial->review }}
                        </p>
                        <footer class="testimonials__user">
                            @if ($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
                                    class="testimonials__avatar">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->name) }}&background=random"
                                    alt="{{ $testimonial->name }}" class="testimonials__avatar">
                            @endif
                            <div class="testimonials__meta">
                                <h4 class="testimonials__name">{{ $testimonial->name }}</h4>
                                <p class="testimonials__role">{{ $testimonial->title }}</p>
                            </div>
                        </footer>
                    </article>
                @endforeach

            </div>
        </div>

        <div class="testimonials__pagination">
            @foreach ($testimonials as $loop_item)
                <span class="testimonials__dot {{ $loop->first ? 'testimonials__dot--active' : '' }}"></span>
            @endforeach
        </div>

    </div>
</section> --}}

<!--============================================= testimonials Section -->
<section class="testimonials">
    <div class="testimonials__container">

        <header class="testimonials__header">
            <span class="testimonials__subtitle" data-aos="fade-up" data-aos-duration="700" data-aos-offset="100"
                data-aos-delay="0">
                {{ $aboutHeading->testimonials_subtitle }}
            </span>
            <h2 class="testimonials__title" data-aos="fade-up" data-aos-duration="700" data-aos-offset="100"
                data-aos-delay="150">
                {{ $aboutHeading->testimonials_title }}
            </h2>
        </header>

        {{-- Swiper cards are NOT animated with AOS — Swiper controls visibility, not scroll --}}
        <div class="testimonials__slider swiper" data-aos="fade-up" data-aos-duration="700" data-aos-offset="100"
            data-aos-delay="300">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <article class="testimonials__card swiper-slide">
                        <div class="testimonials__rating">
                            <span class="testimonials__star">★</span>
                            <span class="testimonials__score">{{ $testimonial->rate }}</span>
                        </div>
                        <p class="testimonials__text">
                            {{ $testimonial->review }}
                        </p>
                        <footer class="testimonials__user">
                            @if ($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
                                    class="testimonials__avatar">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->name) }}&background=random"
                                    alt="{{ $testimonial->name }}" class="testimonials__avatar">
                            @endif
                            <div class="testimonials__meta">
                                <h4 class="testimonials__name">{{ $testimonial->name }}</h4>
                                <p class="testimonials__role">{{ $testimonial->title }}</p>
                            </div>
                        </footer>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="testimonials__pagination" data-aos="fade-up" data-aos-duration="700"
            data-aos-delay="450">
            @foreach ($testimonials as $loop_item)
                <span class="testimonials__dot {{ $loop->first ? 'testimonials__dot--active' : '' }}"></span>
            @endforeach
        </div>

    </div>
</section>
