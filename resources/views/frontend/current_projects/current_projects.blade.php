@extends('frontend.layout.layouts')

@push('css')
    <style>
        .footer {
            display: none;
        }
    </style>
@endpush

@section('content')
    <!--================================================= projects -->
    <div class="project-showcase">
        <nav class="project-nav">
            <ul class="project-nav__list">
                @foreach ($currentProjects as $project)
                    <li class="project-nav__item">
                        <a href="#project-{{ $project->id }}"
                            class="project-nav__link {{ $loop->first ? 'project-nav__link--active' : '' }}"
                            title="{{ $project->getTranslation('title', app()->getLocale()) }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        @foreach ($currentProjects as $project)
            <section class="project-item" id="project-{{ $project->id }}">
                <div class="project-item__container {{ $loop->even ? 'project-item__container--reverse' : '' }}">

                    <div class="project-item__visual">
                        {{-- <a href="{{ route('current_projects.show', $project->id) }}" style="text-decoration: none;"> --}}
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->getTranslation('title', app()->getLocale()) }}" class="project-item__img">
                            @else
                                <img src="{{ asset('images/placeholder.jpg') }}"
                                    alt="{{ $project->getTranslation('title', app()->getLocale()) }}" class="project-item__img">
                            @endif
                            <span class="tooltip">See full project</span>
                            {{-- </a> --}}
                    </div>

                    <div class="project-item__content">
                        <span class="project-item__label">
                            {{ $project->getTranslation('subtitle', app()->getLocale()) }}
                        </span>
                        <h2 class="project-item__title">
                            {{ $project->getTranslation('title', app()->getLocale()) }}
                        </h2>
                        <p class="project-item__description">
                            {{ $project->getTranslation('description', app()->getLocale()) }}
                        </p>
                        <div class="project__footer">
                            <ul class="project-item__specs">
                                <li>
                                    <strong>{{ app()->getLocale() === 'ar' ? 'الموقع' : 'Location' }}:</strong>
                                    {{ $project->getTranslation('location', app()->getLocale()) }}
                                </li>
                                <li>
                                    <strong>{{ app()->getLocale() === 'ar' ? 'المساحة' : 'Area' }}:</strong>
                                    {{ $project->getTranslation('size', app()->getLocale()) }}
                                </li>
                                <li>
                                    <strong>{{ app()->getLocale() === 'ar' ? 'الحالة' : 'Status' }}:</strong>
                                    {{ $project->getTranslation('status', app()->getLocale()) }}
                                </li>
                            </ul>
                            {{-- <a href="{{ route('current_projects.show', $project->id) }}" style="text-decoration: none;">
                                <button class="project-info__cta">
                                    <span class="project-info__cta-icon">+</span>
                                    <span class="project-info__cta-text">
                                        {{ app()->getLocale() === 'ar' ? 'عرض المشروع' : 'View Project' }}
                                    </span>
                                </button>
                            </a> --}}
                        </div>
                    </div>

                </div>
            </section>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        const container = document.querySelector('.project-showcase');
        const sections = document.querySelectorAll('.project-item');
        const navLinks = document.querySelectorAll('.project-nav__link');
        let isScrolling = false;

        // 1. MOUSE WHEEL SLIDE LOGIC
        container.addEventListener('wheel', (e) => {
            const direction = e.deltaY > 0 ? 1 : -1;
            const scrollPos = container.scrollTop;
            const maxScroll = container.scrollHeight - container.clientHeight;

            // Boundary Detection: Exit the slider if scrolling up at top or down at bottom
            if ((scrollPos <= 0 && direction === -1) || (scrollPos >= maxScroll - 1 && direction === 1)) {
                return;
            }

            e.preventDefault();

            if (isScrolling) return;

            isScrolling = true;
            const windowHeight = window.innerHeight;
            const currentIndex = Math.round(scrollPos / windowHeight);
            const nextTarget = currentIndex + direction;

            if (nextTarget >= 0 && nextTarget < sections.length) {
                container.scrollTo({
                    top: nextTarget * windowHeight,
                    behavior: 'smooth'
                });
            }

            setTimeout(() => {
                isScrolling = false;
            }, 1000);
        }, {
            passive: false
        });

        // 2. DOTS HIGHLIGHTING (Intersection Observer)
        const observerOptions = {
            threshold: 0.5,
            root: container
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    navLinks.forEach(link => {
                        link.classList.remove('project-nav__link--active');
                        if (link.getAttribute('href') === `#${id}`) {
                            link.classList.add('project-nav__link--active');
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach(section => observer.observe(section));

        // 3. CLICK NAVIGATION (Dot Links)
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                isScrolling = true; // Lock wheel while moving to target
                container.scrollTo({
                    top: targetSection.offsetTop,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    isScrolling = false;
                }, 1000);
            });
        });
    </script>
@endpush