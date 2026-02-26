<!--============================================= States Section -->
<section class="stats" id="stats-section">
    <div class="stats__container">
        {{-- <div class="stats__content">
            <h2 class="stats__title">Our Impressive Growth: A Deep Dive into Our Key Stats and Milestones</h2>
            <p class="stats__description">
                Our stats at a glance provide a snapshot of our success, highlighting important metrics like
                portfolio value and market reach.
            </p>
        </div> --}}
        <div class="stats__content">
            <h2 class="stats__title">{{ $aboutHeading->about_numbers_title }}</h2>
            <p class="stats__description">{{ $aboutHeading->about_numbers_subtitle }}</p>
        </div>
        <div class="stats__list">
            @foreach ($aboutNumbers as $item)
                <div class="stats__card">
                    <span class="stats__number">{{ $item->number }}</span>
                    <h3 class="stats__label">{{ $item->getTranslation('title', app()->getLocale()) }}</h3>
                    <p class="stats__text">{{ $item->getTranslation('subtitle', app()->getLocale()) }}</p>
                </div>
            @endforeach
        </div>
        {{-- <div class="stats__list">
            <div class="stats__card">
                <span class="stats__number">260+</span>
                <h3 class="stats__label">Expert Consultants</h3>
                <p class="stats__text">Specialized professionals with extensive real estate experience.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">$1.2B+</span>
                <h3 class="stats__label">Portfolio Value</h3>
                <p class="stats__text">Total value of active residential and commercial developments.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">724+</span>
                <h3 class="stats__label">Projects Delivered</h3>
                <p class="stats__text">Successful completion and handover of premium luxury initiatives.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">15+</span>
                <h3 class="stats__label">Years Experience</h3>
                <p class="stats__text">A legacy of excellence in the Egyptian and international markets.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">45k+</span>
                <h3 class="stats__label">Happy Homeowners</h3>
                <p class="stats__text">Families who have found their dream homes in our communities.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">12</span>
                <h3 class="stats__label">Global Awards</h3>
                <h3 class="stats__label">Global Awards</h3>
                <p class="stats__text">Recognition for architecture, innovation, and design leadership.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">4</span>
                <h3 class="stats__label">Countries Reached</h3>
                <p class="stats__text">Spanning prime locations in Egypt, Dubai, Spain, and Greece.</p>
            </div>
            <div class="stats__card">
                <span class="stats__number">98%</span>
                <h3 class="stats__label">Retention Rate</h3>
                <p class="stats__text">Consistent trust from our investors and recurring clients.</p>
            </div>
        </div> --}}
    </div>
</section>