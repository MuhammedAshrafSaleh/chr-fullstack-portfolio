    <!--================================================= Project Hero -->
    <section class="project-hero">
        <div class="project-hero__bg">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80"
                alt="New Cairo Project Overview">
            <div class="project-hero__overlay"></div>
        </div>
        <div class="project-hero__container">
            <nav class="project-hero__breadcrumbs">
                <a href="{{ route('frontend.home') }}" class="project-hero__crumb">
                    <i class="fas fa-home"></i> {{ __('app.breadcrumb_home') }}
                </a>
                <span class="project-hero__separator">/</span>
                <a href="{{ route('frontend.current_projects') }}" class="project-hero__crumb">
                    {{ __('app.breadcrumb_projects') }}
                </a>
                <span class="project-hero__separator">/</span>
                <span class="project-hero__crumb project-hero__crumb--active">
                    {{ $project->getTranslation('title', app()->getLocale()) }}
                </span>
            </nav>

            <h1 class="project-hero__title">
                {{ $project->getTranslation('title', app()->getLocale()) }}
            </h1>

            <div class="project-hero__scroll">
                <div class="project-hero__scroll-dot"></div>
            </div>
        </div>
        {{-- 
        <div class="project-hero__container">
            <nav class="project-hero__breadcrumbs">
                <a href="index.html" class="project-hero__crumb">
                    <i class="fas fa-home"></i> Home
                </a>
                <span class="project-hero__separator">/</span>
                <a href="projects.html" class="project-hero__crumb">Projects</a>
                <span class="project-hero__separator">/</span>
                <span class="project-hero__crumb project-hero__crumb--active">New Cairo</span>
            </nav>

            <h1 class="project-hero__title">New Cairo</h1>

            <div class="project-hero__scroll">
                <div class="project-hero__scroll-dot"></div>
            </div>
        </div> 
        --}}
    </section>
