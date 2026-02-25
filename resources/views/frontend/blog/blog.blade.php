{{-- @extends('frontend.layout.layouts')

@section('content')
<article class="blog-post">

    <header class="blog-post__header">
        <div class="container container--narrow">
            <h1 class="blog-post__title">The Future of Fintech: A Deep Dive into Electronic Ecosystems</h1>
            <div class="blog-post__meta">
                <span>Published 2026</span> • <span>12 Min Read</span>
            </div>
        </div>
    </header>

    <div class="container container--narrow">
        <div class="blog-post__hero-wrapper">
            <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=1200"
                alt="Electronic Payments Concept" class="blog-post__hero-image">
        </div>

        <div class="blog-post__content">
            <p class="blog-post__paragraph blog-post__paragraph--dropcap">
                The evolution of financial technology has reached a critical tipping point. In the early days of the
                digital revolution, fintech was often viewed as a secondary layer—a convenient addition to
                traditional banking structures. However, as we move further into 2026, the script has flipped
                entirely.
            </p>

            <p class="blog-post__paragraph">
                Electronic payments have transitioned from being a mere alternative to cash into the very foundation
                of global commerce. This shift is driven by the rapid decentralization of credit and the rise of
                autonomous payment gateways. We are seeing a world where transaction friction is approaching zero.
            </p>

            <h2 class="blog-post__subtitle">The Infrastructure of Invisible Finance</h2>

            <p class="blog-post__paragraph">
                Behind every "swipe" or "tap" lies a complex web of APIs and cloud-native databases. The modern
                consumer rarely considers the millisecond-fast handshake between the merchant's terminal and the
                global payment network. Yet, this invisible infrastructure is what allows for the scalability of
                EdTech and other digital-first industries.
            </p>

            <p class="blog-post__paragraph">
                One must also consider the environmental impact of such systems. As data centers expand to house
                these growing financial ledgers, the industry is pivoting toward "Green Fintech." This involves
                optimizing algorithms to reduce the computational energy required for transaction verification.
            </p>

            <blockquote class="blog-post__quote">
                "Innovation in fintech is not just about moving money faster; it's about making the movement of
                value accessible to everyone, everywhere."
            </blockquote>

            <p class="blog-post__paragraph">
                Furthermore, the integration of student loan management into these apps has proven revolutionary. By
                automating micro-payments and leveraging rounding-up features, students are now paying off debt 15%
                faster than they were a decade ago. It is a testament to how design-led engineering can solve
                real-world problems.
            </p>


            <p class="blog-post__paragraph">
                Behind every "swipe" or "tap" lies a complex web of APIs and cloud-native databases. The modern
                consumer rarely considers the millisecond-fast handshake between the merchant's terminal and the
                global payment network. Yet, this invisible infrastructure is what allows for the scalability of
                EdTech and other digital-first industries.
            </p>

        </div>
    </div>
</article>
@endsection --}}


@extends('frontend.layout.layouts')

@section('content')
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
        }

        .blog-post__content strong {
            color: var(--color-text-white);
        }

        .blog-post__content a {
            color: var(--color-primary);
            text-decoration: underline;
        }
    </style>
@endpush