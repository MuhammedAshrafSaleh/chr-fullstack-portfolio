<section class="contact">
    <div class="contact__container">

        <!-- Left Side - Locations -->
        {{-- <div class="contact__info">

            <!-- Headquarter -->
            <div class="location-card">
                <h3 class="location-card__title">HEADQUARTER</h3>
                <div class="location-card__divider"></div>

                <address class="location-card__address">
                    <p class="location-card__text">4 Nasr St, Golden Square,</p>
                    <p class="location-card__text">New Cairo,</p>
                    <p class="location-card__text">Cairo, Egypt</p>
                </address>

                <button class="location-card__button">
                    <i data-lucide="navigation" class="location-card__icon"></i>
                    {{ __('app.navigate') }}
                </button>
            </div>

            <!-- Sheikh Zayed -->
            <div class="location-card">
                <h3 class="location-card__title">SHEIKH ZAYED</h3>
                <div class="location-card__divider"></div>

                <address class="location-card__address">
                    <p class="location-card__text">F3-5-3 Arkan Extension</p>
                    <p class="location-card__text">Sheikh Zayed</p>
                    <p class="location-card__text">Giza, Egypt</p>
                </address>

                <button class="location-card__button">
                    <i data-lucide="navigation" class="location-card__icon"></i>
                    {{ __('app.navigate') }}
                </button>
            </div>

            <!-- Hotline -->
            <div class="hotline">
                <svg class="hotline__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                <span class="hotline__number">15722</span>
            </div>

        </div> --}}


        <!-- Left Side - Locations -->
        <div class="contact__info">

            <!-- Headquarter -->
            <div class="location-card">
                <h3 class="location-card__title">
                    {{ $contactLocations->getTranslation('location_one_title', app()->getLocale()) }}
                </h3>
                <div class="location-card__divider"></div>

                <address class="location-card__address">
                    <p class="location-card__text">
                        {{ $contactLocations->getTranslation('location_one_address_one', app()->getLocale()) }}
                    </p>
                    @if ($contactLocations->getTranslation('location_one_address_two', app()->getLocale()))
                        <p class="location-card__text">
                            {{ $contactLocations->getTranslation('location_one_address_two', app()->getLocale()) }}
                        </p>
                    @endif
                    @if ($contactLocations->getTranslation('location_one_address_three', app()->getLocale()))
                        <p class="location-card__text">
                            {{ $contactLocations->getTranslation('location_one_address_three', app()->getLocale()) }}
                        </p>
                    @endif
                </address>

                @if ($contactLocations->location_one_navigate_url)
                    <a href="{{ $contactLocations->location_one_navigate_url }}" target="_blank" rel="noopener noreferrer"
                        class="location-card__button" style="text-decoration: none">
                        <i data-lucide="navigation" class="location-card__icon"></i>
                        {{ __('app.navigate') }}
                    </a>
                @else
                    <button class="location-card__button" disabled>
                        <i data-lucide="navigation" class="location-card__icon"></i>
                        {{ __('app.navigate') }}
                    </button>
                @endif
            </div>

            <!-- Sheikh Zayed -->
            <div class="location-card">
                <h3 class="location-card__title">
                    {{ $contactLocations->getTranslation('location_two_title', app()->getLocale()) }}
                </h3>
                <div class="location-card__divider"></div>

                <address class="location-card__address">
                    <p class="location-card__text">
                        {{ $contactLocations->getTranslation('location_two_address_one', app()->getLocale()) }}
                    </p>
                    @if ($contactLocations->getTranslation('location_two_address_two', app()->getLocale()))
                        <p class="location-card__text">
                            {{ $contactLocations->getTranslation('location_two_address_two', app()->getLocale()) }}
                        </p>
                    @endif
                    @if ($contactLocations->getTranslation('location_two_address_three', app()->getLocale()))
                        <p class="location-card__text">
                            {{ $contactLocations->getTranslation('location_two_address_three', app()->getLocale()) }}
                        </p>
                    @endif
                </address>

                @if ($contactLocations->location_two_navigate_url)
                    <a href="{{ $contactLocations->location_two_navigate_url }}" target="_blank" rel="noopener noreferrer"
                        class="location-card__button" style="text-decoration: none">
                        <i data-lucide="navigation" class="location-card__icon"></i>
                        {{ __('app.navigate') }}
                    </a>
                @else
                    <button class="location-card__button" disabled>
                        <i data-lucide="navigation" class="location-card__icon"></i>
                        {{ __('app.navigate') }}
                    </button>
                @endif
            </div>

            <!-- Hotline -->
            <div class="hotline">
                <svg class="hotline__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                <span class="hotline__number">{{ $contactLocations->phone }}</span>
            </div>

        </div>

        <!-- Right Side - Contact Form -->
        <div class="contact__form-wrapper">
            <h2 class="contact__title">{{ __('app.request_a_call') }}</h2>

            <form class="contact-form" id="contactForm">

                <!-- Row 1: Name & Email -->
                <div class="contact-form__row">
                    <div class="form-group">
                        <label for="fullName" class="form-group__label">{{ __('app.full_name') }}</label>
                        <input type="text" id="fullName" name="fullName" class="form-group__input"
                            placeholder="{{ __('app.full_name_placeholder') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-group__label">{{ __('app.email') }}</label>
                        <input type="email" id="email" name="email" class="form-group__input"
                            placeholder="{{ __('app.email_placeholder') }}" required>
                    </div>
                </div>

                <!-- Row 2: Telephone & Company -->
                <div class="contact-form__row">
                    <div class="form-group">
                        <label for="telephone" class="form-group__label">{{ __('app.telephone') }}</label>
                        <input type="tel" id="telephone" name="telephone" class="form-group__input"
                            placeholder="{{ __('app.telephone_placeholder') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="company" class="form-group__label">{{ __('app.company') }}</label>
                        <input type="text" id="company" name="company" class="form-group__input"
                            placeholder="{{ __('app.company_placeholder') }}">
                    </div>
                </div>

                <!-- Row 3: Subject -->
                <div class="form-group">
                    <label for="subject" class="form-group__label">{{ __('app.subject') }}</label>
                    <input type="text" id="subject" name="subject" class="form-group__input"
                        placeholder="{{ __('app.subject_placeholder') }}" required>
                </div>

                <!-- Date Field -->
                <div class="form-group">
                    <label for="date" class="form-group__label">{{ __('app.preferred_date') }}</label>
                    <input type="date" id="date" name="date" class="form-group__input" required>
                </div>

                <!-- Role Field -->
                <div class="form-group">
                    <label for="role" class="form-group__label">{{ __('app.your_role') }}</label>
                    <select id="role" name="role" class="form-group__select" required>
                        <option value="" disabled selected>{{ __('app.role_placeholder') }}</option>
                        <option value="ceo">CEO</option>
                        <option value="project-manager">Project Manager</option>
                        <option value="senior-engineer">Senior Engineer</option>
                        <option value="engineer">Engineer</option>
                        <option value="investor">Investor</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Time Field -->
                <div class="form-group">
                    <label for="time" class="form-group__label">{{ __('app.preferred_time') }}</label>
                    <input type="time" id="time" name="time" class="form-group__input" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="project-info__cta">
                    <span class="project-info__cta-icon">+</span>
                    <span class="project-info__cta-text">{{ __('app.submit') }}</span>
                </button>

            </form>
        </div>
        {{-- <div class="contact__form-wrapper">
            <h2 class="contact__title">REQUEST A CALL</h2>

            <form class="contact-form" id="contactForm">

                <!-- Row 1: Name & Email -->
                <div class="contact-form__row">
                    <div class="form-group">
                        <label for="fullName" class="form-group__label">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="form-group__input"
                            placeholder="Enter your name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-group__label">Email</label>
                        <input type="email" id="email" name="email" class="form-group__input"
                            placeholder="Your work email" required>
                    </div>
                </div>

                <!-- Row 2: Telephone & Company -->
                <div class="contact-form__row">
                    <div class="form-group">
                        <label for="telephone" class="form-group__label">Telephone</label>
                        <input type="tel" id="telephone" name="telephone" class="form-group__input"
                            placeholder="Your direct number" required>
                    </div>

                    <div class="form-group">
                        <label for="company" class="form-group__label">Company</label>
                        <input type="text" id="company" name="company" class="form-group__input"
                            placeholder="Your company name">
                    </div>
                </div>

                <!-- Row 3: Subject -->
                <div class="form-group">
                    <label for="subject" class="form-group__label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-group__input"
                        placeholder="Message subject" required>
                </div>

                <!-- Date Field -->
                <div class="form-group">
                    <label for="date" class="form-group__label">Preferred Date</label>
                    <input type="date" id="date" name="date" class="form-group__input" required>
                </div>

                <!-- Role Field -->
                <div class="form-group">
                    <label for="role" class="form-group__label">Your Role</label>
                    <select id="role" name="role" class="form-group__select" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="ceo">CEO</option>
                        <option value="project-manager">Project Manager</option>
                        <option value="senior-engineer">Senior Engineer</option>
                        <option value="engineer">Engineer</option>
                        <option value="investor">Investor</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Time Field -->
                <div class="form-group">
                    <label for="time" class="form-group__label">Preferred Time</label>
                    <input type="time" id="time" name="time" class="form-group__input" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="project-info__cta">
                    <span class="project-info__cta-icon">+</span>
                    <span class="project-info__cta-text">Submit</span>
                </button>

            </form>
        </div> --}}

    </div>
</section>