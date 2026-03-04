<!--================================================= Footer Section -->
<footer class="footer">
    <div class="footer__container">
        <div class="footer__content">
            <!-- Brand Section -->
            <div class="footer__brand">
                <a href="{{ $fixedLinks->logo_link }}" class="footer__logo-link">
                    <img src="{{ asset('storage/' . $fixedLinks->logo_image) }}" alt="CHR Developments"
                        class="footer__logo--img" height="150" loading="lazy">
                </a>
                <p class="footer__tagline">
                    {{ $footerSection->getTranslation('message', app()->getLocale()) }}
                </p>
            </div>

            <!-- Contact Section -->
            <div class="footer__section">
                <h3 class="footer__heading">CONTACT</h3>
                <ul class="footer__list">
                    @foreach ($contacts as $contact)
                        <li class="footer__list-item">
                            <a href="{{ $contact->link }}" class="footer__link">
                                {{ $contact->getTranslation('title', app()->getLocale()) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Social Section -->
            <div class="footer__section">
                <h3 class="footer__heading">SOCIAL</h3>
                <ul class="footer__list">
                    @foreach ($socialMediaLinks as $social)
                        <li class="footer__list-item">
                            <a href="{{ $social->link }}" class="footer__link" target="_blank" rel="noopener">
                                {{ $social->getTranslation('title', app()->getLocale()) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer__bottom">
            <p class="footer__copyright">
                {{ $footerSection->getTranslation('rights', app()->getLocale()) }}
            </p>
            <div class="footer__legal">
                <a href="{{ $footerSection->policy_link }}" class="footer__link">
                    {{ $footerSection->getTranslation('policy_title', app()->getLocale()) }}
                </a>
                <a href="{{ $footerSection->terms_link }}" class="footer__link">
                    {{ $footerSection->getTranslation('terms_title', app()->getLocale()) }}
                </a>
            </div>
        </div>
    </div>
</footer>
