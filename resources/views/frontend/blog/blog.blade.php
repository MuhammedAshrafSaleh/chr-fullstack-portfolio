@extends('frontend.layout.layouts')

{{-- @section('content')
    <article class="blog-post">

        <header class="blog-post__header">
            <div class="container container--narrow">
                <h1 class="blog-post__title">
                    {{ $blog->getTranslation('title', app()->getLocale()) }}
                </h1>
                <div class="blog-post__meta">
                    <span>Published {{ $blog->published_at->format('Y') }}</span>
                    @if ($blog->getTranslation('author_name', app()->getLocale()))
                        • <span>By {{ $blog->getTranslation('author_name', app()->getLocale()) }}</span>
                    @endif
                </div>
            </div>
        </header>

        <div class="container container--narrow">
            <div class="blog-post__hero-wrapper">
                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=1200' }}"
                    alt="{{ $blog->getTranslation('title', app()->getLocale()) }}" class="blog-post__hero-image">
            </div>

            <div class="blog-post__content">
                {!! $blog->getTranslation('content', app()->getLocale()) !!}
            </div>
        </div>

    </article>
@endsection --}}
@section('content')
    <div class="page-wrapper">
        <article class="blog-post">

            <header class="blog-post__header">
                <div class="container container--narrow">
                    <h1 class="blog-post__title" data-aos="fade-up" data-aos-duration="700" data-aos-offset="100"
                        data-aos-delay="0">
                        {{ $blog->getTranslation('title', app()->getLocale()) }}
                    </h1>
                    <div class="blog-post__meta" data-aos="fade-up" data-aos-duration="700" data-aos-offset="100"
                        data-aos-delay="150">
                        <span>Published {{ $blog->published_at->format('Y') }}</span>
                        @if ($blog->getTranslation('author_name', app()->getLocale()))
                            • <span>By {{ $blog->getTranslation('author_name', app()->getLocale()) }}</span>
                        @endif
                    </div>
                </div>
            </header>

            <div class="container container--narrow">
                <div class="blog-post__hero-wrapper" data-aos="zoom-in" data-aos-duration="700" data-aos-offset="100"
                    data-aos-delay="300">
                    <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=1200' }}"
                        alt="{{ $blog->getTranslation('title', app()->getLocale()) }}" class="blog-post__hero-image">
                </div>

                <div class="blog-post__content">
                    {!! $blog->getTranslation('content', app()->getLocale()) !!}
                </div>
            </div>

        </article>
    </div>
@endsection
@push('css')
    <style>
        .blog-post__content p {
            font-size: 1.25rem;
            line-height: 1.8;
            color: var(--color-text-light);
            margin-bottom: 2rem;
            font-family: 'Georgia', serif;
        }

        /* .blog-post__content p:first-child::first-letter {
                                                                float: left;
                                                                font-size: 4.5rem;
                                                                line-height: 1;
                                                                font-weight: bold;
                                                                margin-right: 12px;
                                                                color: var(--color-primary);
                                                            } */

        .blog-post__content h2 {
            font-size: 2rem;
            margin: 4rem 0 1.5rem;
            color: var(--color-text-white);
        }

        .blog-post__content h3 {
            font-size: 1.5rem;
            margin: 3rem 0 1rem;
            color: var(--color-text-white);
        }

        .blog-post__content h4 {
            font-size: 1.25rem;
            margin: 2rem 0 1rem;
            color: var(--color-text-white);
        }

        .blog-post__content blockquote {
            margin: 3rem 0;
            padding: 20px 40px;
            border-left: 4px solid var(--color-primary);
            background-color: var(--color-background-card);
            font-style: italic;
            font-size: 1.5rem;
            color: var(--color-text-white);
        }

        .blog-post__content ul,
        .blog-post__content ol {
            margin: 0 0 2rem 1.5rem;
            color: var(--color-text-light);
            font-size: 1.1rem;
            line-height: 2;
        }

        .blog-post__content li {
            margin-bottom: 0.5rem;
            margin-right: 1rem;
        }

        .blog-post__content strong {
            color: var(--color-text-white);
        }

        .blog-post__content a {
            color: var(--color-primary);
            text-decoration: underline;
        }

        .blog-post__content p,
        .blog-post__content h1,
        .blog-post__content h2,
        .blog-post__content h3,
        .blog-post__content h4,
        .blog-post__content h5,
        .blog-post__content h6,
        .blog-post__content img,
        .blog-post__content ul,
        .blog-post__content ol,
        .blog-post__content blockquote,
        .blog-post__content table {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .blog-post__content .in-view {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll(`
            .blog-post__content p,
            .blog-post__content h1,
            .blog-post__content h2,
            .blog-post__content h3,
            .blog-post__content h4,
            .blog-post__content h5,
            .blog-post__content h6,
            .blog-post__content img,
            .blog-post__content ul,
            .blog-post__content ol,
            .blog-post__content blockquote,
            .blog-post__content table
        `);

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    } else {
                        entry.target.classList.remove('in-view'); // replay on scroll back
                    }
                });
            }, {
                threshold: 0.1
            });

            elements.forEach(el => observer.observe(el));
        });
    </script>
    </script>
@endpush
