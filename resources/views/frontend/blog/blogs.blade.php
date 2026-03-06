{{-- @extends('frontend.layout.layouts')

@section('content')
    <!--================================================= Blog Section -->

    <section class="blog-section">
        <div class="container">
            <h2 class="blog-section__title">Lastes Blogs</h2>
            <div class="blog-section__grid">
                @foreach ($blogs as $blog)
                    <a href="{{ route('frontend.blog.single', $blog->id) }}" class="blog-card-link"
                        style="text-decoration: none;">
                        <article class="blog-card">
                            <div class="blog-card__image-wrapper">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&q=80&w=800' }}"
                                    alt="{{ $blog->getTranslation('title', app()->getLocale()) }}" class="blog-card__image">
                            </div>
                            <div class="blog-card__content">
                                <h3 class="blog-card__title">
                                    {{ $blog->getTranslation('title', app()->getLocale()) }}
                                </h3>
                                <div class="blog-card__footer">
                                    <span class="blog-card__author">
                                        By {{ $blog->getTranslation('author_name', app()->getLocale()) }}
                                    </span>
                                    <span class="blog-card__date">{{ $blog->published_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </article>

                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection --}}

@extends('frontend.layout.layouts')

@section('content')
    <!--================================================= Blog Section -->
    <section class="blog-section">
        <div class="container">

            <h2 class="blog-section__title"
                data-aos="fade-up"
                data-aos-duration="700"
                data-aos-offset="100"
                data-aos-delay="0">
                Lastes Blogs
            </h2>

            <div class="blog-section__grid">
                @foreach ($blogs as $blog)
                    <a href="{{ route('frontend.blog.single', $blog->id) }}" class="blog-card-link"
                        style="text-decoration: none;"
                        data-aos="fade-up"
                        data-aos-duration="700"
                        data-aos-offset="100"
                        data-aos-delay="{{ $loop->index * 150 }}">
                        <article class="blog-card">
                            <div class="blog-card__image-wrapper">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&q=80&w=800' }}"
                                    alt="{{ $blog->getTranslation('title', app()->getLocale()) }}" class="blog-card__image">
                            </div>
                            <div class="blog-card__content">
                                <h3 class="blog-card__title">
                                    {{ $blog->getTranslation('title', app()->getLocale()) }}
                                </h3>
                                <div class="blog-card__footer">
                                    <span class="blog-card__author">
                                        By {{ $blog->getTranslation('author_name', app()->getLocale()) }}
                                    </span>
                                    <span class="blog-card__date">{{ $blog->published_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>

        </div>
    </section>
@endsection