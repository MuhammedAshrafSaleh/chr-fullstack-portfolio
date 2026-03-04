{{-- <section class="about" id="about">
    <div class="about__container">
        <!-- Left Content -->
        <div class="about__content">
            <span class="about__label">{{ $aboutHome->section_label }}</span>
            <h2 class="about__title">{{ $aboutHome->title }}</h2>
            <p class="about__description">
                {{ $aboutHome->description }}
            </p>

            <!-- Stats Grid -->
            <div class="about__stats">
                <div class="about__stat">
                    <h3 class="about__stat-number">{{ $aboutHome->years_count }}</h3>
                    <p class="about__stat-label">{{ $aboutHome->years_label }}</p>
                </div>
                <div class="about__stat">
                    <h3 class="about__stat-number">{{ $aboutHome->projects_count }}+</h3>
                    <p class="about__stat-label">{{ $aboutHome->projects_label }}</p>
                </div>
                <div class="about__stat">
                    <h3 class="about__stat-number">{{ $aboutHome->workers_count }}</h3>
                    <p class="about__stat-label">{{ $aboutHome->workers_label }}</p>
                </div>
            </div>

            <!-- Bottom Image - WITH LAZY LOADING -->
            <div class="about__image about__image--bottom">
                <img src="{{ $aboutHome->image_left ? asset('storage/' . $aboutHome->image_left) : asset('frontend/assets/media/construction-building.jpg') }}"
                    alt="Construction building" class="about__image-img" width="600" height="400" loading="lazy">
                <div class="about__image-overlay"></div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="about__media">
            <!-- Top Image - WITH LAZY LOADING -->
            <div class="about__image about__image--top">
                <img src="{{ $aboutHome->image_right ? asset('storage/' . $aboutHome->image_right) : asset('frontend/assets/media/construction-cranes.jpg') }}"
                    alt="Construction cranes" class="about__image-img" width="600" height="400" loading="lazy">
                <div class="about__image-overlay"></div>
            </div>

            <!-- Features List -->
            <div class="about__features">
                <div class="about__feature">
                    <div class="about__feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <p class="about__feature-text">{{ $aboutHome->feature_one }}</p>
                </div>

                <div class="about__feature">
                    <div class="about__feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <p class="about__feature-text">{{ $aboutHome->feature_two }}</p>
                </div>

                <div class="about__feature">
                    <div class="about__feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <p class="about__feature-text">{{ $aboutHome->feature_three }}</p>
                </div>

                @if ($aboutHome->feature_four)
                    <div class="about__feature">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">{{ $aboutHome->feature_four }}</p>
                    </div>
                @endif

                @if ($aboutHome->feature_five)
                    <div class="about__feature">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">{{ $aboutHome->feature_five }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section> --}}

<section class="about" id="about">
    <div class="about__container">

        <!-- Left Content -->
        <div class="about__content">
            <span class="about__label" data-aos="fade-right" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="0">
                {{ $aboutHome->section_label }}
            </span>

            <h2 class="about__title" data-aos="fade-right" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="100">
                {{ $aboutHome->title }}
            </h2>

            <p class="about__description" data-aos="fade-right" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="200">
                {{ $aboutHome->description }}
            </p>

            <!-- Stats Grid -->
            <div class="about__stats">
                <div class="about__stat" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="100">
                    <h3 class="about__stat-number">{{ $aboutHome->years_count }}</h3>
                    <p class="about__stat-label">{{ $aboutHome->years_label }}</p>
                </div>
                <div class="about__stat" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="250">
                    <h3 class="about__stat-number">{{ $aboutHome->projects_count }}+</h3>
                    <p class="about__stat-label">{{ $aboutHome->projects_label }}</p>
                </div>
                <div class="about__stat" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="400">
                    <h3 class="about__stat-number">{{ $aboutHome->workers_count }}</h3>
                    <p class="about__stat-label">{{ $aboutHome->workers_label }}</p>
                </div>
            </div>

            <!-- Bottom Image -->
            <div class="about__image about__image--bottom" data-aos="zoom-in" data-aos-duration="700"
                data-aos-offset="200" data-aos-delay="200">
                <img src="{{ $aboutHome->image_left ? asset('storage/' . $aboutHome->image_left) : asset('frontend/assets/media/construction-building.jpg') }}"
                    alt="Construction building" class="about__image-img" width="600" height="400" loading="lazy">
                <div class="about__image-overlay"></div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="about__media">

            <!-- Top Image -->
            <div class="about__image about__image--top" data-aos="zoom-in" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="0">
                <img src="{{ $aboutHome->image_right ? asset('storage/' . $aboutHome->image_right) : asset('frontend/assets/media/construction-cranes.jpg') }}"
                    alt="Construction cranes" class="about__image-img" width="600" height="400" loading="lazy">
                <div class="about__image-overlay"></div>
            </div>

            <!-- Features List -->
            <div class="about__features">
                <div class="about__feature" data-aos="fade-left" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="100">
                    <div class="about__feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <p class="about__feature-text">{{ $aboutHome->feature_one }}</p>
                </div>

                <div class="about__feature" data-aos="fade-left" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="200">
                    <div class="about__feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <p class="about__feature-text">{{ $aboutHome->feature_two }}</p>
                </div>

                <div class="about__feature" data-aos="fade-left" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="300">
                    <div class="about__feature-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <p class="about__feature-text">{{ $aboutHome->feature_three }}</p>
                </div>

                @if ($aboutHome->feature_four)
                    <div class="about__feature" data-aos="fade-left" data-aos-duration="700" data-aos-offset="200"
                        data-aos-delay="400">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">{{ $aboutHome->feature_four }}</p>
                    </div>
                @endif

                @if ($aboutHome->feature_five)
                    <div class="about__feature" data-aos="fade-left" data-aos-duration="700" data-aos-offset="200"
                        data-aos-delay="500">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">{{ $aboutHome->feature_five }}</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>
