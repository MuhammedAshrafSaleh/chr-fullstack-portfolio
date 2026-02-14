@extends('frontend.layout.layouts')

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
                <div class="construction__card">
                    <a href="construction_updates_project.html" class="construction__link" style="text-decoration: none;">
                        <div class="construction__video-wrapper" data-video-src="media/cu (1).mp4">
                            <video autoplay muted loop playsinline class="construction__thumbnail">
                                <source src="media/cu (1).mp4" type="video/mp4">
                            </video>
                            <span class="construction__tooltip">See full project</span>
                            <div class="construction__play-btn">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>

                        <h3 class="construction__project-name">The Corporate Axis</h3>
                    </a>
                </div>

                <div class="construction__card">
                    <a href="construction_updates_project.html" class="construction__link" style="text-decoration: none;">
                        <div class="construction__video-wrapper" data-video-src="media/cu (2).mp4"">
                            <video autoplay muted loop playsinline class=" construction__thumbnail">
                                <source src="media/cu (2).mp4"" type=" video/mp4">
                            </video>
                            <span class="construction__tooltip">See full project</span>
                            <div class="construction__play-btn">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>
                        <h3 class="construction__project-name">New Cairo Complex</h3>
                    </a>
                </div>

                <div class="construction__card">
                    <a href="construction_updates_project.html" class="construction__link" style="text-decoration: none;">
                        <div class="construction__video-wrapper" data-video-src="media/cu (3).mp4"">
                            <video autoplay muted loop playsinline class=" construction__thumbnail">
                                <source src="media/cu (3).mp4"" type=" video/mp4">
                            </video>
                            <span class="construction__tooltip">See full project</span>
                            <div class="construction__play-btn">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>
                        <h3 class="construction__project-name">Euphoria Heights</h3>
                    </a>
                </div>
            </div>
        </div>

        <div class="video-modal" id="videoModal">
            <span class="video-modal__close">&times;</span>
            <video controls autoplay class="video-modal__content" id="modalVideo"></video>
        </div>
    </section>
@endsection
