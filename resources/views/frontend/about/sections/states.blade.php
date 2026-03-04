<!--============================================= States Section -->
<section class="stats" id="stats-section">
    <div class="stats__container">

        <div class="stats__content">
            <h2 class="stats__title" data-aos="fade-right" data-aos-duration="700" data-aos-offset="300" data-aos-delay="0">
                {{ $aboutHeading->about_numbers_title }}
            </h2>
            <p class="stats__description" data-aos="fade-right" data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="150">
                {{ $aboutHeading->about_numbers_subtitle }}
            </p>
        </div>

        <div class="stats__list">
            @foreach ($aboutNumbers as $item)
                <div class="stats__card" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="{{ $loop->index * 150 }}">
                    <span class="stats__number">{{ $item->number }}</span>
                    <h3 class="stats__label">{{ $item->getTranslation('title', app()->getLocale()) }}</h3>
                    <p class="stats__text">{{ $item->getTranslation('subtitle', app()->getLocale()) }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
