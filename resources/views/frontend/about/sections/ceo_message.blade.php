<!--============================================= ceo-message Section -->
{{-- <section class="ceo-message">
    <div class="ceo-message__container">

        <div class="ceo-message__visual">
            <div class="ceo-message__image-wrapper">
                <img src="{{ $aboutCeo->image ? asset('storage/' . $aboutCeo->image) : asset('assets/images/placeholder-ceo.jpg') }}"
                    alt="{{ $aboutCeo->ceo_name }}" class="ceo-message__img">
            </div>
        </div>

        <div class="ceo-message__content">
            <header class="ceo-message__header">
                <h2 class="ceo-message__title">{{ $aboutCeo->title }}</h2>
            </header>

            <div class="ceo-message__body">
                <p>{{ $aboutCeo->paragraph_one }}</p>

                @if ($aboutCeo->paragraph_two)
                    <p>{{ $aboutCeo->paragraph_two }}</p>
                @endif

                @if ($aboutCeo->paragraph_three)
                    <p>{{ $aboutCeo->paragraph_three }}</p>
                @endif
            </div>

            <footer class="ceo-message__signature">
                <h4 class="ceo-message__name">{{ $aboutCeo->ceo_name }}</h4>
                <p class="ceo-message__role">{{ $aboutCeo->ceo_title }}</p>
            </footer>
        </div>

    </div>
</section> --}}
<!--============================================= ceo-message Section -->
<section class="ceo-message">
    <div class="ceo-message__container">

        <div class="ceo-message__visual" data-aos="fade-right" data-aos-duration="700" data-aos-offset="300"
            data-aos-delay="0">
            <div class="ceo-message__image-wrapper">
                <img src="{{ $aboutCeo->image ? asset('storage/' . $aboutCeo->image) : asset('assets/images/placeholder-ceo.jpg') }}"
                    alt="{{ $aboutCeo->ceo_name }}" class="ceo-message__img">
            </div>
        </div>

        <div class="ceo-message__content">
            <header class="ceo-message__header" data-aos="fade-left" data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="0">
                <h2 class="ceo-message__title">{{ $aboutCeo->title }}</h2>
            </header>

            <div class="ceo-message__body" data-aos="fade-left" data-aos-duration="700" data-aos-offset="300"
                data-aos-delay="150">
                <p>{{ $aboutCeo->paragraph_one }}</p>

                @if ($aboutCeo->paragraph_two)
                    <p>{{ $aboutCeo->paragraph_two }}</p>
                @endif

                @if ($aboutCeo->paragraph_three)
                    <p>{{ $aboutCeo->paragraph_three }}</p>
                @endif
            </div>

            <footer class="ceo-message__signature" data-aos="fade-up" data-aos-duration="700" data-aos-offset="100"
                data-aos-delay="300">
                <h4 class="ceo-message__name">{{ $aboutCeo->ceo_name }}</h4>
                <p class="ceo-message__role">{{ $aboutCeo->ceo_title }}</p>
            </footer>
        </div>

    </div>
</section>
