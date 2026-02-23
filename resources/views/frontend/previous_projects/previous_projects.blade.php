@extends('frontend.layout.layouts')

@section('css')
    <style>
        .footer {
            display: none;
        }
    </style>
@endsection

{{-- @section('content')
<!--================================================= prev projects -->
<div class="project-showcase">
    <!-- <header class="project-intro">
                        <h1 class="project-intro__title">Previous Projects</h1>
                        <p class="project-intro__subtitle">A curated showcase of our architectural legacy, featuring landmarks that
                            redefine luxury and innovation in every detail.</p>
                    </header> -->
    <nav class="project-nav">
        <ul class="project-nav__list">
            <li class="project-nav__item"><a href="#project-1" class="project-nav__link project-nav__link--active"
                    title="The Obsidian Tower"></a></li>
            <li class="project-nav__item"><a href="#project-2" class="project-nav__link" title="Palm Riviera"></a>
            </li>
            <li class="project-nav__item"><a href="#project-3" class="project-nav__link" title="The Grand Marquee"></a>
            </li>
            <li class="project-nav__item"><a href="#project-4" class="project-nav__link"
                    title="Skyline Business Park"></a></li>
            <li class="project-nav__item"><a href="#project-5" class="project-nav__link" title="Azure Bay"></a></li>
            <li class="project-nav__item"><a href="#project-6" class="project-nav__link" title="Amber Gardens"></a>
            </li>
            <li class="project-nav__item"><a href="#project-7" class="project-nav__link" title="The Corporate Axis"></a>
            </li>
            <li class="project-nav__item"><a href="#project-8" class="project-nav__link" title="Harbor Walk"></a>
            </li>
        </ul>
    </nav>

    <section class="project-item" id="project-1">
        <div class="project-item__container">
            <div class="project-item__visual">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80"
                    alt="Obsidian Tower" class="project-item__img">
            </div>
            <div class="project-item__content">
                <span class="project-item__label">Commercial Hub</span>
                <h2 class="project-item__title">The Obsidian Tower</h2>
                <p class="project-item__description">A 45-story smart commercial tower in Sheikh Zayed featuring
                    state-of-the-art office spaces and luxury retail outlets.</p>
                <div class="project__footer">
                    <ul class="project-item__specs">
                        <li><strong>Location:</strong> Sheikh Zayed City</li>
                        <li><strong>Area:</strong> 25,000 SQM</li>
                        <li><strong>Delivery:</strong> Completed 2024</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="project-item" id="project-2">
        <div class="project-item__container project-item__container--reverse">
            <div class="project-item__visual">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80"
                    alt="Palm Riviera" class="project-item__img">
            </div>
            <div class="project-item__content">
                <span class="project-item__label">Coastal Luxury</span>
                <h2 class="project-item__title">Palm Riviera</h2>
                <p class="project-item__description">Boutique waterfront villas on the North Coast with private
                    lagoons and eco-conscious architectural design.</p>
                <div class="project__footer">
                    <ul class="project-item__specs">
                        <li><strong>Location:</strong> Hacienda, North Coast</li>
                        <li><strong>Units:</strong> 42 Private Villas</li>
                        <li><strong>Status:</strong> Sold Out</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection --}}

@section('content')
    <div class="project-showcase">

        {{-- Navigation Dots --}}
        <nav class="project-nav">
            <ul class="project-nav__list">
                @foreach ($projects as $index => $project)
                    <li class="project-nav__item">
                        <a href="#project-{{ $project->id }}"
                            class="project-nav__link {{ $index === 0 ? 'project-nav__link--active' : '' }}"
                            title="{{ $project->getTranslation('title', app()->getLocale()) }}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        {{-- Projects --}}
        @foreach ($projects as $index => $project)
            <section class="project-item" id="project-{{ $project->id }}">
                <div class="project-item__container {{ $index % 2 !== 0 ? 'project-item__container--reverse' : '' }}">

                    {{-- Image --}}
                    <div class="project-item__visual">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->getTranslation('title', app()->getLocale()) }}" class="project-item__img">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No image" class="project-item__img">
                        @endif
                    </div>

                    {{-- Content --}}
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
                        </div>
                    </div>

                </div>
            </section>
        @endforeach

        {{-- لو مفيش مشاريع --}}
        @if ($projects->isEmpty())
            <div class="text-center py-5">
                <p>{{ app()->getLocale() === 'ar' ? 'لا توجد مشاريع حالياً' : 'No projects available yet.' }}</p>
            </div>
        @endif

    </div>
@endsection

@section('scripts')
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
@endsection