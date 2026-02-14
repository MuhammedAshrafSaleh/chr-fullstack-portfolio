    <section class="about" id="about">
        <div class="about__container">
            <!-- Left Content -->
            <div class="about__content">
                <span class="about__label">About Us</span>
                <h2 class="about__title">Innovative construction solutions</h2>
                <p class="about__description">
                    Our open, flexible workspace encourages interaction and sparks inspiration,
                    while dedicated areas provide quiet reflection.
                </p>

                <!-- Stats Grid -->
                <div class="about__stats">
                    <div class="about__stat">
                        <h3 class="about__stat-number">20</h3>
                        <p class="about__stat-label">Year of Experience</p>
                    </div>
                    <div class="about__stat">
                        <h3 class="about__stat-number">50+</h3>
                        <p class="about__stat-label">Successful Project</p>
                    </div>
                    <div class="about__stat">
                        <h3 class="about__stat-number">94</h3>
                        <p class="about__stat-label">Trusted Workers</p>
                    </div>
                </div>

                <!-- Bottom Image - WITH LAZY LOADING -->
                <div class="about__image about__image--bottom">
                    <img src="{{ asset('frontend/assets/media/construction-building.jpg') }}"
                        alt="Construction building" class="about__image-img" width="600" height="400"
                        loading="lazy">
                    <div class="about__image-overlay"></div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="about__media">
                <!-- Top Image - WITH LAZY LOADING -->
                <div class="about__image about__image--top">
                    <img src="{{ asset('frontend/assets/media/construction-cranes.jpg') }}" alt="Construction cranes"
                        class="about__image-img" width="600" height="400" loading="lazy">
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
                        <p class="about__feature-text">Innovative Eco Power Technologies</p>
                    </div>

                    <div class="about__feature">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">Regularly Maintaining and Organizing your Tools</p>
                    </div>

                    <div class="about__feature">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">Experienced Construction Professional</p>
                    </div>

                    <div class="about__feature">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">Mattis Fringilla Ultricies</p>
                    </div>

                    <div class="about__feature">
                        <div class="about__feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <p class="about__feature-text">60 Team members are individuals</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
