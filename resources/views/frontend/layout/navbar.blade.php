<nav class="navbar">
    <div class="navbar__container">
        <div class="navbar__left">
            <button class="navbar__toggle" id="menuToggle" aria-label="Open Menu">
                <span class="navbar__toggle-line"></span>
                <span class="navbar__toggle-line"></span>
            </button>
            <a href="/" class="navbar__logo">
                <img src="{{ asset('frontend/assets/media/Logos/CHR_V1.png') }}" alt="CHR Developments"
                    class="navbar__logo-img" height="100" loading="eager">
            </a>
        </div>

        <ul class="navbar__links">
            <li class="navbar__item">
                <span class="navbar__item-num">01</span>
                <a href="about.html" class="navbar__link">About</a>
            </li>
            <li class="navbar__item">
                <span class="navbar__item-num">02</span>
                <a href="current_projects.html" class="navbar__link">Projects</a>
            </li>
            <li class="navbar__item">
                <span class="navbar__item-num">03</span>
                <a href="blogs.html" class="navbar__link">Blog</a>
            </li>
            <li class="navbar__item">
                <span class="navbar__item-num">04</span>
                <a href="contact_us.html" class="navbar__link">Contact us</a>
            </li>
        </ul>

        <div class="navbar__right">
            <a href="tel:15722" class="navbar__phone">
                <span class="navbar__phone-icon">📞</span> 15722
            </a>
        </div>
    </div>
</nav>

<div class="menu-overlay" id="menuOverlay">
    <button class="menu-overlay__close" id="menuClose" aria-label="Close Menu">&times;</button>

    <div class="menu-overlay__content">
        <ul class="menu-overlay__list">
            <li class="menu-overlay__item">
                <span class="menu-overlay__index">01</span>
                <a href="about.html" class="menu-overlay__link menu-overlay__link--active">About</a>
            </li>
            <li class="menu-overlay__item">
                <span class="menu-overlay__index">02</span>
                <a href="current_projects.html" class="menu-overlay__link">Projects</a>
            </li>
            <li class="menu-overlay__item">
                <span class="menu-overlay__index">03</span>
                <a href="{{ route('frontend.blogs') }}" class="menu-overlay__link">Blog</a>
            </li>
            <li class="menu-overlay__item">
                <span class="menu-overlay__index">04</span>
                <a href="contact_us.html" class="menu-overlay__link">Contact us</a>
            </li>
            <li class="menu-overlay__item">
                <span class="menu-overlay__index">05</span>
                <a href="construction_updates.html" class="menu-overlay__link">Construction Update</a>
            </li>
            <li class="menu-overlay__item">
                <span class="menu-overlay__index">06</span>
                <a href="{{ route('frontend.previous_projects') }}" class="menu-overlay__link">Previous
                    Projects</a>
            </li>
        </ul>
    </div>
</div>