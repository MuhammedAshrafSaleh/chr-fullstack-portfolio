@extends('frontend.layout.layouts')

@section('content')
    <section class="updates">
        <div class="updates__container">
            <div class="updates__left">
                <header class="updates__header">
                    <span class="updates__label">Progress Tracking</span>
                    <h2 class="updates__title">New Cairo <br>Updates</h2>
                    <p class="updates__description">
                        Follow the real-time evolution of our architectural landmarks in New Cairo.
                    </p>
                </header>
            </div>

            <div class="updates__right">
                <div class="updates__timeline-line"></div>

                <article class="updates__item">
                    <div class="updates__marker">
                        <div class="updates__circle"></div>
                    </div>
                    <div class="updates__content">
                        <time class="updates__date">February 2026</time>
                        <p class="updates__subtext">Foundation and basement structural work completed.</p>
                        <div class="construction__video-wrapper" data-video-src="media/cu (2).mp4"">
                            <video autoplay muted loop playsinline class=" construction__thumbnail">
                                <source src="media/cu (2).mp4"" type=" video/mp4">
                            </video>
                            <div class="construction__play-btn">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="updates__item">
                    <div class="updates__marker">
                        <div class="updates__circle"></div>
                    </div>
                    <div class="updates__content">
                        <time class="updates__date">January 2026</time>
                        <p class="updates__subtext">Exterior facade installation for the first three floors.</p>

                        <div class="updates__media-wrapper">
                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=1200"
                                alt="Update Image" class="updates__image">
                        </div>
                    </div>
                </article>
                <article class="updates__item">
                    <div class="updates__marker">
                        <div class="updates__circle"></div>
                    </div>
                    <div class="updates__content">
                        <time class="updates__date">February 2026</time>
                        <p class="updates__subtext">Foundation and basement structural work completed.</p>
                        <div class="construction__video-wrapper" data-video-src="media/cu (3).mp4"">
                            <video autoplay muted loop playsinline class=" construction__thumbnail">
                                <source src="media/cu (3).mp4"" type=" video/mp4">
                            </video>
                            <div class="construction__play-btn">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="video-modal" id="videoModal">
            <span class="video-modal__close">&times;</span>
            <video controls autoplay class="video-modal__content" id="modalVideo"></video>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('videoModal');
            const modalVideo = document.getElementById('modalVideo');
            const closeBtn = document.querySelector('.video-modal__close');
            const wrappers = document.querySelectorAll('.construction__video-wrapper');

            wrappers.forEach(wrapper => {
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
                modalVideo.src = "";
            };

            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
        });
    </script>
@endsection
