@extends('frontend.layout.layouts')

@section('content')
    <section class="updates">
        <div class="updates__container">

            <div class="updates__left">
                <header class="updates__header">
                    <span class="updates__label" data-aos="fade-right" data-aos-duration="700" data-aos-offset="150"
                        data-aos-delay="0">
                        {{ __('app.progress_tracking') }}
                    </span>
                    <h2 class="updates__title" data-aos="fade-right" data-aos-duration="700" data-aos-offset="150"
                        data-aos-delay="150">
                        {{ $constructionUpdate->getTranslation('title', app()->getLocale()) }}
                    </h2>
                    <p class="updates__description" data-aos="fade-right" data-aos-duration="700" data-aos-offset="150"
                        data-aos-delay="150">
                        {{ $constructionUpdate->getTranslation('subtitle', app()->getLocale()) }}
                    </p>
                </header>
            </div>

            <div class="updates__right">
                <div class="updates__timeline-line"></div>

                @foreach ($projects as $project)
                    <article class="updates__item" data-aos="fade-left" data-aos-duration="700" data-aos-offset="150"
                        data-aos-delay="{{ $loop->index * 150 }}">
                        <div class="updates__marker">
                            <div class="updates__circle"></div>
                        </div>
                        <div class="updates__content">
                            <time class="updates__date">{{ $project->getTranslation('head', app()->getLocale()) }}</time>
                            <p class="updates__subtext">{{ $project->getTranslation('subhead', app()->getLocale()) }}</p>

                            @if ($project->youtube_link && $project->media)
                                {{--
                                    YouTube poster: show the image with a play icon overlay.
                                    Clicking hides the poster and loads the YouTube iframe.
                                --}}
                                <div class="updates__media-wrapper updates__youtube-poster"
                                    data-youtube="{{ $project->youtube_link }}">
                                    <img src="{{ asset('storage/' . $project->media) }}"
                                        alt="{{ $project->getTranslation('head', app()->getLocale()) }}"
                                        class="updates__image">
                                    <div class="updates__play-overlay">
                                        <div class="updates__play-btn">
                                            <i class="fab fa-youtube"></i>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($project->youtube_link && !$project->media)
                                {{--
                                    YouTube link but no image: show a plain clickable YouTube thumbnail
                                    fetched from YouTube's CDN as the poster.
                                --}}
                                @php
                                    preg_match(
                                        '/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                        $project->youtube_link,
                                        $ytMatch,
                                    );
                                    $ytId = $ytMatch[1] ?? null;
                                @endphp
                                @if ($ytId)
                                    <div class="updates__media-wrapper updates__youtube-poster"
                                        data-youtube="{{ $project->youtube_link }}">
                                        <img src="https://img.youtube.com/vi/{{ $ytId }}/maxresdefault.jpg"
                                            alt="{{ $project->getTranslation('head', app()->getLocale()) }}"
                                            class="updates__image">
                                        <div class="updates__play-overlay">
                                            <div class="updates__play-btn">
                                                <i class="fab fa-youtube"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif ($project->media)
                                {{-- No YouTube link — just show the image/video normally --}}
                                @php $ext = pathinfo($project->media, PATHINFO_EXTENSION); @endphp

                                @if (in_array($ext, ['mp4', 'mov', 'avi']))
                                    <div class="updates__media-wrapper construction__video-wrapper"
                                        data-video-src="{{ asset('storage/' . $project->media) }}">
                                        <video autoplay muted loop playsinline class="construction__thumbnail">
                                            <source src="{{ asset('storage/' . $project->media) }}" type="video/mp4">
                                        </video>
                                        <div class="construction__play-btn">
                                            <i class="fas fa-expand"></i>
                                        </div>
                                    </div>
                                @else
                                    <div class="updates__media-wrapper">
                                        <img src="{{ asset('storage/' . $project->media) }}"
                                            alt="{{ $project->getTranslation('head', app()->getLocale()) }}"
                                            class="updates__image">
                                    </div>
                                @endif
                            @endif

                        </div>
                    </article>
                @endforeach

            </div>

        </div>

        {{-- Video modal (kept for uploaded video files) --}}
        <div class="video-modal" id="videoModal">
            <span class="video-modal__close">&times;</span>
            <video controls autoplay class="video-modal__content" id="modalVideo"></video>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // ── Uploaded video modal (existing behaviour) ──────────────────
            const modal = document.getElementById('videoModal');
            const modalVideo = document.getElementById('modalVideo');
            const closeBtn = document.querySelector('.video-modal__close');

            document.querySelectorAll('.construction__video-wrapper').forEach(wrapper => {
                wrapper.addEventListener('click', () => {
                    const source = wrapper.getAttribute('data-video-src');
                    modalVideo.src = source;
                    modal.classList.add('active');
                    modalVideo.play();
                });
            });

            const closeModal = () => {
                modal.classList.remove('active');
                modalVideo.pause();
                modalVideo.src = '';
            };

            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (modal) modal.addEventListener('click', e => {
                if (e.target === modal) closeModal();
            });


            // ── YouTube poster → iframe swap ───────────────────────────────
            document.querySelectorAll('.updates__youtube-poster').forEach(poster => {
                poster.addEventListener('click', () => {
                    const youtubeUrl = poster.getAttribute('data-youtube');

                    const match = youtubeUrl.match(/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
                    if (!match) return;

                    const videoId = match[1];
                    const embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;

                    // Fix: set explicit height before clearing content
                    poster.style.height = poster.offsetHeight + 'px';

                    poster.innerHTML = `<iframe
                    src="${embedUrl}"
                    style="width:100%;height:100%;border:0;display:block;"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    ></iframe>`;

                    poster.classList.remove('updates__youtube-poster');
                    poster.style.cursor = 'default';
                });
            });

        });
    </script>
@endpush
