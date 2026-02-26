{{-- <!--============================================= CHR-ABOUR Section -->
<section class="chr-about">
    <div class="chr-about__container">

        <div class="chr-about__content">
            <span class="chr-about__label">TRUE TO YOU</span>
            <h2 class="chr-about__title">ABOUT CHR</h2>
            <div class="chr-about__description">
                <p>
                    Crafting transformative residential and commercial experiences has been LMD's
                    dedicated pursuit since 2007. An ever-evolving journey of exceptional innovation with
                    the future in mind. Our signature is larger-than-life destinations that set the benchmark
                    in quality integration & progressive design.
                </p>
                <p>
                    We inspire limitless possibilities that empower communities to live, connect and thrive —
                    a combination that truly sets us apart. Our journey resulted in a significant portfolio
                    of iconic mixed-use developments. Spanning the best locations in Egypt, Dubai, Spain, and
                    Greece.
                    We offer community-centric experiences powered by a holistic vision of seamless living —
                    forever transforming the conventional norms of real estate.
                </p>
            </div>
        </div>

        <div class="chr-about__visual">
            <div class="chr-about__image-wrapper">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80"
                    alt="LMD Lifestyle" class="chr-about__img">
            </div>
        </div>

    </div>
</section> --}}

<!--============================================= CHR-ABOUR Section -->
<section class="chr-about">
    <div class="chr-about__container">

        <div class="chr-about__content">
            <span class="chr-about__label">{{ $chrAbout->getTranslation('eyebrow', app()->getLocale()) }}</span>
            <h2 class="chr-about__title">{{ $chrAbout->getTranslation('title', app()->getLocale()) }}</h2>
            <div class="chr-about__description">
                <p>
                    {{ $chrAbout->getTranslation('paragraph_one', app()->getLocale()) }}
                </p>
                @if($chrAbout->getTranslation('paragraph_two', app()->getLocale()))
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
</section>