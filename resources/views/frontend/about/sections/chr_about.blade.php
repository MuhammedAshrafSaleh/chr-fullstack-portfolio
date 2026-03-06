<!--============================================= CHR-ABOUR Section -->
{{-- <section class="chr-about">
    <div class="chr-about__container">

        <div class="chr-about__content">
            <span class="chr-about__label">{{ $chrAbout->getTranslation('eyebrow', app()->getLocale()) }}</span>
            <h2 class="chr-about__title">{{ $chrAbout->getTranslation('title', app()->getLocale()) }}</h2>
            <div class="chr-about__description">
                <p>
                    {{ $chrAbout->getTranslation('paragraph_one', app()->getLocale()) }}
                </p>
                @if ($chrAbout->getTranslation('paragraph_two', app()->getLocale()))
                    <p>
                        {{ $chrAbout->getTranslation('paragraph_two', app()->getLocale()) }}
                    </p>
                @endif
            </div>
        </div>

        <div class="chr-about__visual">
            <div class="chr-about__image-wrapper">
                <img src="{{ $chrAbout->image ? asset('storage/' . $chrAbout->image) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80' }}"
                    alt="{{ $chrAbout->getTranslation('title', app()->getLocale()) }}" class="chr-about__img">
            </div>
        </div>

    </div>
</section> --}}

<section class="chr-about">
    <div class="chr-about__container">

        <div class="chr-about__content">
            <span class="chr-about__label" data-aos="fade-right" data-aos-duration="700" data-aos-offset="100"
                data-aos-delay="0">
                {{ $chrAbout->getTranslation('eyebrow', app()->getLocale()) }}
            </span>

            <h2 class="chr-about__title" data-aos="fade-right" data-aos-duration="700" data-aos-offset="100"
                data-aos-delay="150">
                {{ $chrAbout->getTranslation('title', app()->getLocale()) }}
            </h2>

            <div class="chr-about__description" data-aos="fade-right" data-aos-duration="700" data-aos-offset="100"
                data-aos-delay="300">
                <p>
                    {{ $chrAbout->getTranslation('paragraph_one', app()->getLocale()) }}
                </p>
                @if ($chrAbout->getTranslation('paragraph_two', app()->getLocale()))
                    <p>
                        {{ $chrAbout->getTranslation('paragraph_two', app()->getLocale()) }}
                    </p>
                @endif
            </div>
        </div>

        <div class="chr-about__visual" data-aos="fade-left" data-aos-duration="700" data-aos-offset="100"
            data-aos-delay="150">
            <div class="chr-about__image-wrapper">
                <img src="{{ $chrAbout->image ? asset('storage/' . $chrAbout->image) : 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80' }}"
                    alt="{{ $chrAbout->getTranslation('title', app()->getLocale()) }}" class="chr-about__img">
            </div>
        </div>

    </div>
</section>
