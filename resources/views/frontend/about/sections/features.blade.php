<!--============================================= Features Section -->
{{-- <section class="features">
    <div class="features__container">
        <header class="features__header">
            <h2 class="features__title">{{ $aboutHeading->features_title }}</h2>
            <p class="features__subtitle">{{ $aboutHeading->features_subtitle }}</p>
        </header>

        <div class="features__grid">
            @foreach ($features as $feature)
                <div class="features__item">
                    <div class="features__icon-wrapper">
                        @if ($feature->image)
                            <img src="{{ asset('storage/' . $feature->image) }}" class="features__icon"
                                alt="{{ $feature->title }}">
                        @endif
                    </div>
                    <h3 class="features__item-title">{{ $feature->title }}</h3>
                    <p class="features__item-text">{{ $feature->desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!--============================================= Features Section -->
{{-- @push('css')
    <style>
        :lang(ar) .features__item:not(:nth-child(2n)) {
            border-right: unset;
            border-left: none;
        }
    </style>
@endpush --}}
<section class="features">
    <div class="features__container">

        <header class="features__header">
            <h2 class="features__title" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300" data-aos-delay="0">
                {{ $aboutHeading->features_title }}
            </h2>
            <p class="features__subtitle" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="150">
                {{ $aboutHeading->features_subtitle }}
            </p>
        </header>

        <div class="features__grid">
            @foreach ($features as $feature)
                <div class="features__item" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="{{ $loop->index * 150 }}">
                    <div class="features__icon-wrapper">
                        @if ($feature->image)
                            <img src="{{ asset('storage/' . $feature->image) }}" class="features__icon"
                                alt="{{ $feature->title }}">
                        @endif
                    </div>
                    <h3 class="features__item-title">{{ $feature->title }}</h3>
                    <p class="features__item-text">{{ $feature->desc }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
