<!--================================================= Side Actions -->
<aside class="side-actions">
    <button class="side-actions__btn" id="themeToggle" title="Switch Theme">
        <span class="side-actions__icon">🌓</span>
    </button>
    <a href="{{ route('lang.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" class="side-actions__btn"
        title="Switch Language">
        <span class="side-actions__lang">
            {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
        </span>
    </a>

    <a href="{{ $fixedLinks->whatsapp_link }}" class="side-actions__btn side-actions__btn--whatsapp" target="_blank"
        rel="noopener">
        <img src="{{ asset('storage/' . $fixedLinks->whatsapp_image) }}" alt="WhatsApp"
            style="width: 20px; height: 20px; object-fit: contain;">
    </a>

    <a href="{{ $fixedLinks->location_link }}" class="side-actions__btn" target="_blank" rel="noopener">
        <img src="{{ asset('storage/' . $fixedLinks->location_image) }}" alt="Location"
            style="width: 20px; height: 20px; object-fit: contain;">
    </a>

    {{-- <a href="https://wa.me/yournumber" class="side-actions__btn side-actions__btn--whatsapp" target="_blank"
        rel="noopener">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="https://goo.gl/maps/yourlink" class="side-actions__btn" target="_blank" rel="noopener">
        <i class="fas fa-map-marker-alt"></i>
    </a> --}}

    <div class="side-actions__social-group">
        <button class="side-actions__btn side-actions__trigger">
            <i class="fas fa-share-alt"></i>
        </button>
        <div class="side-actions__sub-menu">
            @foreach ($socialMediaLinks as $social)
                <a href="{{ $social->link }}" class="side-actions__btn side-actions__btn--sub" target="_blank"
                    rel="noopener">
                    <img src="{{ asset('storage/' . $social->image) }}"
                        alt="{{ $social->getTranslation('title', app()->getLocale()) }}"
                        style="width: 20px; height: 20px; object-fit: contain;">
                </a>
            @endforeach
        </div>
        {{-- <div class="side-actions__sub-menu">
            <a href="#" class="side-actions__btn side-actions__btn--sub"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="side-actions__btn side-actions__btn--sub"><i class="fab fa-instagram"></i></a>
            <a href="#" class="side-actions__btn side-actions__btn--sub"><i class="fab fa-linkedin-in"></i></a>
        </div> --}}
    </div>
</aside>
