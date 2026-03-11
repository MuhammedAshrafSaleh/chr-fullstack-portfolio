<nav class="navbar">
    <div class="navbar__container">
        <div class="navbar__left">
            <button class="navbar__toggle" id="menuToggle" aria-label="Open Menu">
                <span class="navbar__toggle-line"></span>
                <span class="navbar__toggle-line"></span>
            </button>
            <a href="{{ $fixedLinks->logo_link }}" class="navbar__logo">
                <img src="{{ asset('storage/' . $fixedLinks->logo_image) }}" alt="CHR Developments"
                    class="navbar__logo-img" height="100" loading="eager" fetchpriority="high">
            </a>
        </div>

        <ul class="navbar__links">
            @foreach ($navItems as $index => $item)
                <li class="navbar__item">
                    {{-- <span class="navbar__item-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span> --}}
                    <a href="{{ url($item->link) }}"
                        class="navbar__link">{{ $item->getTranslation('title', app()->getLocale()) }}</a>
                </li>
            @endforeach
        </ul>

        <div class="navbar__right">
            <a href="{{ $contactLocations->phone }}" class="navbar__phone">
                <span class="navbar__phone-icon">📞</span> {{ $contactLocations->phone }}
            </a>
        </div>
        {{-- <div class="navbar__right">
            <a href="{{ $fixedLink->hotline_link }}" class="navbar__phone">
                <img src="{{ asset('storage/' . $fixedLink->hotline_image) }}" alt="Hotline"
                    style="width: 20px; height: 20px; object-fit: contain;"> {{ $fixedLink->hotline_link }}
            </a>
        </div> --}}
    </div>
</nav>

<div class="menu-overlay" id="menuOverlay">
    <button class="menu-overlay__close" id="menuClose" aria-label="Close Menu">&times;</button>

    <div class="menu-overlay__content">
        <ul class="menu-overlay__list">
            @foreach ($navItems as $index => $item)
                <li class="menu-overlay__item">
                    <span class="menu-overlay__index">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <a href="{{ url($item->link) }}"
                        class="menu-overlay__link">{{ $item->getTranslation('title', app()->getLocale()) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
