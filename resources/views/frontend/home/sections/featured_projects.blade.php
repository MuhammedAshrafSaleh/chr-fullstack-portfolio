<section class="projects-horizontal">
    <div class="projects-horizontal__wrapper">
        <div class="projects-horizontal__track">

            @foreach ($currentProjects as $project)
                <div class="project-slide">
                    <div class="project-slide__content">
                        <div class="project-info">

                            <div class="project-info__location" data-aos="fade-right" data-aos-duration="700"
                                data-aos-offset="100" data-aos-delay="0">
                                <svg class="project-info__icon" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span class="project-info__location-text">
                                    {{ strtoupper($project->getTranslation('location', app()->getLocale())) }}
                                </span>
                            </div>

                            <h2 class="project-info__title" data-aos="fade-right" data-aos-duration="700"
                                data-aos-offset="100" data-aos-delay="150">
                                {{ strtoupper($project->getTranslation('title', app()->getLocale())) }}
                            </h2>

                            <p class="project-info__description" data-aos="fade-right" data-aos-duration="700"
                                data-aos-offset="100" data-aos-delay="300">
                                {{ $project->getTranslation('description', app()->getLocale()) }}
                            </p>
                            @if ($project->project)
                                <a href="{{ route('frontend.current_projects.show', $project->project->id) }}"
                                    style="text-decoration: none;">
                                    <button class="project-info__cta" data-aos="fade-up" data-aos-duration="700"
                                        data-aos-offset="100" data-aos-delay="450">
                                        <span class="project-info__cta-icon">+</span>
                                        <span class="project-info__cta-text">
                                            {{ app()->getLocale() === 'ar' ? 'اعرف المزيد' : 'LEARN MORE' }}
                                        </span>
                                    </button>
                                </a>
                            @endif

                        </div>
                    </div>

                    <div class="project-slide__image" data-aos="zoom-in" data-aos-duration="700" data-aos-offset="100"
                        data-aos-delay="150">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->getTranslation('title', app()->getLocale()) }}"
                                class="project-slide__img" width="800" height="600" loading="lazy">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}"
                                alt="{{ $project->getTranslation('title', app()->getLocale()) }}"
                                class="project-slide__img" width="800" height="600" loading="lazy">
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
