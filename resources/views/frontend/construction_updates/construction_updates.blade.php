{{-- @extends('frontend.layout.layouts')

@section('content')
    <!--================================================= Construction Section -->
    <section class="construction">
        <div class="construction__container">
            <header class="construction__header">
                <span class="construction__label">Project Progress</span>
                <h2 class="construction__title">Construction Updates</h2>
                <p class="construction__subtitle">Check the latest updates for our projects.</p>
            </header>
            <div class="construction__grid">
                @foreach ($constructionUpdates as $update)
                    <div class="construction__card">
                        <a href="{{ $update->projects ? route('frontend.construction-updates', $update->id) : '#' }}"
                            class="construction__link" style="text-decoration: none;">

                            <div class="construction__video-wrapper" data-video-src="{{ asset('storage/' . $update->video) }}">
                                <video autoplay muted loop playsinline class="construction__thumbnail">
                                    <source src="{{ asset('storage/' . $update->video) }}" type="video/mp4">
                                </video>
                                <span class="construction__tooltip">See full project</span>
                                <div class="construction__play-btn">
                                    <i class="fas fa-expand"></i>
                                </div>
                            </div>
                            <h3 class="construction__project-name">{{ $update->getTranslation('title', app()->getLocale()) }}
                            </h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="video-modal" id="videoModal">
            <span class="video-modal__close">&times;</span>
            <video controls autoplay class="video-modal__content" id="modalVideo"></video>
        </div>
    </section>
@endsection --}}

@extends('frontend.layout.layouts')
@push('css')
    <style>
        :lang(ar) .construction__header {
            direction: rtl;
            text-align: right;
        }

        :lang(ar) .construction__label {
            direction: rtl;
            text-align: right;
            font-family: 'Noto Sans Arabic', 'Cairo', sans-serif;
            /* Arabic-friendly font */
            letter-spacing: 0;
            /* Arabic doesn't use letter-spacing */
        }

        :lang(ar) .construction__title {
            direction: rtl;
            text-align: right;
            font-family: 'Noto Sans Arabic', 'Cairo', sans-serif;
            letter-spacing: 0;
            word-spacing: 0;
        }

        :lang(ar) .construction__subtitle {
            direction: rtl;
            text-align: right;
            font-family: 'Noto Sans Arabic', 'Cairo', sans-serif;
            letter-spacing: 0;
        }
    </style>
@endpush
@section('content')
    <!--================================================= Construction Section -->
    <section class="construction">
        <div class="construction__container">
            <header class="construction__header">
                <span class="construction__label" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="0">
                    {{ __('app.construction_label') }}
                </span>
                <h2 class="construction__title" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="150">
                    {{ __('app.construction_title') }}
                </h2>
                <p class="construction__subtitle" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="300">
                    {{ __('app.construction_subtitle') }}
                </p>
            </header>

            <div class="construction__grid">
                @foreach ($constructionUpdates as $update)
                    <div class="construction__card" data-aos="fade-up" data-aos-duration="700" data-aos-offset="300"
                        data-aos-delay="{{ $loop->index * 150 }}">
                        <a href="{{ $update->projects ? route('frontend.construction-updates', $update->id) : '#' }}"
                            class="construction__link" style="text-decoration: none;">

                            <div class="construction__video-wrapper"
                                data-video-src="{{ asset('storage/' . $update->video) }}">
                                <video autoplay muted loop playsinline class="construction__thumbnail">
                                    <source src="{{ asset('storage/' . $update->video) }}" type="video/mp4">
                                </video>
                                <span class="construction__tooltip">{{ __('app.construction_tooltip') }}</span>

                                <div class="construction__play-btn">
                                    <i class="fas fa-expand"></i>
                                </div>
                            </div>
                            <h3 class="construction__project-name">
                                {{ $update->getTranslation('title', app()->getLocale()) }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="video-modal" id="videoModal">
            <span class="video-modal__close">&times;</span>
            <video controls autoplay class="video-modal__content" id="modalVideo"></video>
        </div>
    </section>
@endsection
