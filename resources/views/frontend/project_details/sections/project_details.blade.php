    {{-- <!--================================================= Project Details -->
    <section class="project-details">
        <div class="project-details__container">
            <aside class="project-details__info">
                <span class="project-details__label">Project Specification</span>
                <h2 class="project-details__title">Technical Overview</h2>
                <div class="project-details__table">
                    @foreach ($project->details as $detail)
                        <div class="project-details__row">
                            <span>{{ $detail->getTranslation('title', app()->getLocale()) }}</span>
                            <span>{{ $detail->getTranslation('subtitle', app()->getLocale()) }}</span>
                        </div>
                    @endforeach
                </div>
            </aside>
            <div class="project-details__gallery">
                @foreach ($project->images as $image)
                    <div class="project-details__image-wrapper">
                        <img src="{{ asset('storage/' . $image->image) }}"
                            alt="{{ $image->getTranslation('title', app()->getLocale()) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <!--================================================= Project Details -->
    <section class="project-details">
        <div class="project-details__container">

            <aside class="project-details__info">
                <span class="project-details__label" data-aos="fade-right" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="0">
                    {{ $heading?->getTranslation('details_heading', app()->getLocale()) }}
                </span>
                <h2 class="project-details__title" data-aos="fade-right" data-aos-duration="700" data-aos-offset="300"
                    data-aos-delay="150">
                    {{ $heading?->getTranslation('details_subheading', app()->getLocale()) }}
                </h2>
                <div class="project-details__table">
                    @foreach ($project->details as $detail)
                        <div class="project-details__row" data-aos="fade-right" data-aos-duration="700"
                            data-aos-delay="{{ 200 + $loop->index * 100 }}">
                            <span>{{ $detail->getTranslation('title', app()->getLocale()) }}</span>
                            <span>{{ $detail->getTranslation('subtitle', app()->getLocale()) }}</span>
                        </div>
                    @endforeach
                </div>
            </aside>

            <div class="project-details__gallery">
                @foreach ($project->images as $image)
                    <div class="project-details__image-wrapper" data-aos="zoom-in" data-aos-duration="700"
                        data-aos-offset="100" data-aos-delay="{{ $loop->index * 150 }}">
                        <img src="{{ asset('storage/' . $image->image) }}"
                            alt="{{ $image->getTranslation('title', app()->getLocale()) }}">
                    </div>
                @endforeach
            </div>

        </div>
    </section>
