<section class="contact">
    <div class="contact__container">

        <!-- Left Side - Locations -->
        <div class="contact__info">

            <!-- Headquarter -->
            <div class="location-card" data-aos="fade-right" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="0">
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
                    <a href="{{ $contactLocations->location_one_navigate_url }}" target="_blank"
                        rel="noopener noreferrer" class="location-card__button" style="text-decoration: none">
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
            <div class="location-card" data-aos="fade-right" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="200">
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
                    <a href="{{ $contactLocations->location_two_navigate_url }}" target="_blank"
                        rel="noopener noreferrer" class="location-card__button" style="text-decoration: none">
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
            <div class="hotline" data-aos="fade-right" data-aos-duration="700" data-aos-offset="200"
                data-aos-delay="400">
                <svg class="hotline__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                <span class="hotline__number">{{ $contactLocations->phone }}</span>
            </div>

        </div>

        <!-- Right Side - Contact Form -->
        <div class="contact__form-wrapper" data-aos="fade-left" data-aos-duration="700" data-aos-offset="200"
            data-aos-delay="0">
            <h2 class="contact__title">{{ __('app.request_a_call') }}</h2>

            {{-- Success / Error messages (hidden by default, shown via JS) --}}
            <div id="formSuccess" style="display:none; color: green; margin-bottom: 12px;"></div>
            <div id="formError" style="display:none; color: red;   margin-bottom: 12px;"></div>

            <form class="contact-form" id="contactForm" action="{{ route('frontend.clients-requests.store') }}"
                method="POST">

                @csrf

                <!-- Row 1: Name & Email -->
                <div class="contact-form__row" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="100">
                    <div class="form-group">
                        <label for="fullName" class="form-group__label">{{ __('app.full_name') }}</label>
                        <input type="text" id="fullName" name="full_name" class="form-group__input"
                            placeholder="{{ __('app.full_name_placeholder') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-group__label">{{ __('app.email') }}</label>
                        <input type="email" id="email" name="email" class="form-group__input"
                            placeholder="{{ __('app.email_placeholder') }}" required>
                    </div>
                </div>

                <!-- Row 2: Telephone & Company -->
                <div class="contact-form__row" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="200">
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
                <div class="form-group" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="200">
                    <label for="subject" class="form-group__label">{{ __('app.subject') }}</label>
                    <input type="text" id="subject" name="subject" class="form-group__input"
                        placeholder="{{ __('app.subject_placeholder') }}" required>
                </div>

                <!-- Date Field -->
                <div class="form-group" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="400">
                    <label for="date" class="form-group__label">{{ __('app.preferred_date') }}</label>
                    <input type="date" id="date" name="preferred_date" class="form-group__input" required>
                </div>

                <!-- Role Field -->
                <div class="form-group" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="500">
                    <label for="role" class="form-group__label">{{ __('app.your_role') }}</label>
                    <select id="role" name="role" class="form-group__select" required>
                        <option value="" disabled selected>{{ __('app.role_placeholder') }}</option>
                        <option value="CEO">CEO</option>
                        <option value="Manager">Project Manager</option>
                        <option value="Developer">Senior Engineer</option>
                        <option value="Designer">Engineer</option>
                        <option value="Other">Investor</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Time Field -->
                <div class="form-group" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200"
                    data-aos-delay="600">
                    <label for="time" class="form-group__label">{{ __('app.preferred_time') }}</label>
                    <input type="time" id="time" name="preferred_time" class="form-group__input" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="project-info__cta" id="submitBtn" data-aos="fade-up"
                    data-aos-duration="700" data-aos-offset="200" data-aos-delay="700">
                    <span class="project-info__cta-icon">+</span>
                    <span class="project-info__cta-text">{{ __('app.submit') }}</span>
                </button>

            </form>
        </div>

    </div>
</section>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const submitBtn = document.getElementById('submitBtn');
            const errorBox = document.getElementById('formError');

            errorBox.style.display = 'none';
            submitBtn.disabled = true;

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                    },
                    body: new FormData(form),
                })
                .then(response => response.json().then(data => ({
                    status: response.status,
                    data
                })))
                .then(({
                    status,
                    data
                }) => {
                    if (status === 200 || status === 201) {
                        form.reset();

                        Swal.fire({
                            icon: 'success',
                            title: '{{ __('app.form_success_title') }}',
                            text: data.message ?? '{{ __('app.form_success') }}',
                            confirmButtonText: 'OK',
                        });

                    } else {
                        if (data.errors) {
                            const messages = Object.values(data.errors).flat().join(' | ');
                            errorBox.textContent = messages;
                        } else {
                            errorBox.textContent = data.message ?? '{{ __('app.form_error') }}';
                        }
                        errorBox.style.display = 'block';
                    }
                })
                .catch(() => {
                    errorBox.textContent = '{{ __('app.form_error') }}';
                    errorBox.style.display = 'block';
                })
                .finally(() => {
                    submitBtn.disabled = false;
                });
        });
    </script>
@endpush
