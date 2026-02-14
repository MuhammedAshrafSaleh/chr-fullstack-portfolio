@extends('frontend.layout.layouts')

@section('content')
    <!--================================================= Blog Section -->

    <section class="blog-section">
        <div class="container">
            <h2 class="blog-section__title">Lastes Blogs</h2>
            <div class="blog-section__grid">
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&q=80&w=800"
                                alt="Digital Learning" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">The Rise of Digital Classrooms: How EdTech is Shaping the
                                Future</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By Sarah M.</span>
                                <span class="blog-card__date">1 year ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800"
                                alt="AI Tech" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">Artificial Intelligence: The New Frontier in Modern Fintech
                                Strategies</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By David L.</span>
                                <span class="blog-card__date">6 months ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1464938050520-ef2270bb8ce8?auto=format&fit=crop&q=80&w=800"
                                alt="Green Finance" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">Green Finance: Why Sustainable Investing is More Than Just a
                                Trend</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By Emma W.</span>
                                <span class="blog-card__date">3 months ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80&w=800"
                                alt="Coding" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">Democratizing Code: The Global Movement to Teach Programming
                                Skills</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By James K.</span>
                                <span class="blog-card__date">1 year ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&q=80&w=800"
                                alt="Mobile Banking" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">Pocket Banks: Navigating the Rapid Evolution of Mobile Fintech
                                Apps</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By Robert P.</span>
                                <span class="blog-card__date">2 months ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1586769852044-692d6e3703f0?auto=format&fit=crop&q=80&w=800"
                                alt="Remote Office" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">The Hybrid Office: Technology’s Role in Sustaining Remote
                                Collaboration</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By Linda G.</span>
                                <span class="blog-card__date">9 months ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <a href="blog.html" class="blog-card-link" style="text-decoration: none;">
                    <article class="blog-card">
                        <div class="blog-card__image-wrapper">
                            <img src="https://images.unsplash.com/photo-1478416272538-5f7e51dc5400?auto=format&fit=crop&q=80&w=800"
                                alt="VR EdTech" class="blog-card__image">
                        </div>
                        <div class="blog-card__content">
                            <h3 class="blog-card__title">Immersive Learning: How VR is Revolutionizing the Student
                                Experience</h3>
                            <div class="blog-card__footer">
                                <span class="blog-card__author">By Chris T.</span>
                                <span class="blog-card__date">1 month ago</span>
                            </div>
                        </div>
                    </article>
                </a>
                <article class="blog-card">
                    <div class="blog-card__image-wrapper">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800"
                            alt="Cybersecurity" class="blog-card__image">
                    </div>
                    <div class="blog-card__content">
                        <h3 class="blog-card__title">From Classroom to Cyberspace: The Growing Influence of EdTech</h3>
                        <div class="blog-card__footer">
                            <span class="blog-card__author">By John D.</span>
                            <span class="blog-card__date">2 year ago</span>
                        </div>
                    </div>
                </article>

                <article class="blog-card">
                    <div class="blog-card__image-wrapper">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=800"
                            alt="Financial Ledger" class="blog-card__image">
                    </div>
                    <div class="blog-card__content">
                        <h3 class="blog-card__title">Fintech Solutions for Student Loans: Easing the Burden</h3>
                        <div class="blog-card__footer">
                            <span class="blog-card__author">By Alexa H.</span>
                            <span class="blog-card__date">2 year ago</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="blog_button">
                <button class="project-info__cta">
                    <span class="project-info__cta-icon">+</span>
                    <span class="project-info__cta-text">More Blogs</span>
                </button>
            </div>
        </div>
    </section>
@endsection
