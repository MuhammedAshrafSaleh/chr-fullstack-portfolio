    <!--================================================= Project services -->

    <section class="services">
        <div class="services__header">
            <span class="services__label">
                {{ $heading?->getTranslation('services_heading', app()->getLocale()) }}
            </span>
            <h2 class="services__title">
                {{ $heading?->getTranslation('services_subheading', app()->getLocale()) }}
            </h2>
        </div>
        @php
            $extra = $project->services->slice(10)->chunk(5);
            $directions = ['left', 'right'];
        @endphp

        @foreach ($extra as $chunkIndex => $chunk)
            @php
                $direction = $directions[($chunkIndex + 2) % 2];
            @endphp

            <div class="services__slider" dir="ltr">
                <div class="services__track services__track--{{ $direction }}">

                    {{-- First pass --}}
                    @foreach ($chunk as $service)
                        <div class="services__card">
                            <i class="{{ $service->icon }} services__icon"></i>
                            <h3 class="services__name">{{ $service->getTranslation('title', app()->getLocale()) }}</h3>
                        </div>
                    @endforeach

                    {{-- Duplicate pass — required for seamless infinite scroll --}}
                    @foreach ($chunk as $service)
                        <div class="services__card">
                            <i class="{{ $service->icon }} services__icon"></i>
                            <h3 class="services__name">{{ $service->getTranslation('title', app()->getLocale()) }}</h3>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach
    </section>


    {{-- <div class="services__slider">
            <div class="services__track services__track--left">
                <div class="services__card"><i class="fas fa-clinic-medical services__icon"></i>
                    <h3 class="services__name">Fully Finished Serviced Clinics</h3>
                </div>
                <div class="services__card"><i class="fas fa-recycle services__icon"></i>
                    <h3 class="services__name">Eco Friendly Waste Management</h3>
                </div>
                <div class="services__card"><i class="fas fa-leaf services__icon"></i>
                    <h3 class="services__name">Onsite Healing Garden</h3>
                </div>
                <div class="services__card"><i class="fas fa-microchip services__icon"></i>
                    <h3 class="services__name">Smart Building Automation</h3>
                </div>
                <div class="services__card"><i class="fas fa-shield-alt services__icon"></i>
                    <h3 class="services__name">24/7 Advanced Security</h3>
                </div>

                <div class="services__card"><i class="fas fa-clinic-medical services__icon"></i>
                    <h3 class="services__name">Fully Finished Serviced Clinics</h3>
                </div>
                <div class="services__card"><i class="fas fa-recycle services__icon"></i>
                    <h3 class="services__name">Eco Friendly Waste Management</h3>
                </div>
                <div class="services__card"><i class="fas fa-leaf services__icon"></i>
                    <h3 class="services__name">Onsite Healing Garden</h3>
                </div>
                <div class="services__card"><i class="fas fa-microchip services__icon"></i>
                    <h3 class="services__name">Smart Building Automation</h3>
                </div>
                <div class="services__card"><i class="fas fa-shield-alt services__icon"></i>
                    <h3 class="services__name">24/7 Advanced Security</h3>
                </div>
            </div>
        </div>

        <div class="services__slider">
            <div class="services__track services__track--right">
                <div class="services__card"><i class="fas fa-briefcase-medical services__icon"></i>
                    <h3 class="services__name">Reusable Medical Supplies</h3>
                </div>
                <div class="services__card"><i class="fas fa-tree services__icon"></i>
                    <h3 class="services__name">Outdoor Relaxation Spaces</h3>
                </div>
                <div class="services__card"><i class="fas fa-charging-station services__icon"></i>
                    <h3 class="services__name">Electric Vehicle Stations</h3>
                </div>
                <div class="services__card"><i class="fas fa-handshake services__icon"></i>
                    <h3 class="services__name">Premium Executive Lounges</h3>
                </div>
                <div class="services__card"><i class="fas fa-parking services__icon"></i>
                    <h3 class="services__name">Underground Parking</h3>
                </div>

                <div class="services__card"><i class="fas fa-briefcase-medical services__icon"></i>
                    <h3 class="services__name">Reusable Medical Supplies</h3>
                </div>
                <div class="services__card"><i class="fas fa-tree services__icon"></i>
                    <h3 class="services__name">Outdoor Relaxation Spaces</h3>
                </div>
                <div class="services__card"><i class="fas fa-charging-station services__icon"></i>
                    <h3 class="services__name">Electric Vehicle Stations</h3>
                </div>
                <div class="services__card"><i class="fas fa-handshake services__icon"></i>
                    <h3 class="services__name">Premium Executive Lounges</h3>
                </div>
                <div class="services__card"><i class="fas fa-parking services__icon"></i>
                    <h3 class="services__name">Underground Parking</h3>
                </div>
            </div>
        </div>
        <div class="services__slider">
            <div class="services__track services__track--left">
                <div class="services__card">
                    <i class="fas fa-charging-station services__icon"></i>
                    <h3 class="services__name">Electric Vehicle Charging</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-parking services__icon"></i>
                    <h3 class="services__name">Triple-Level Secure Parking</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-handshake services__icon"></i>
                    <h3 class="services__name">Premium Executive Lounges</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-wind services__icon"></i>
                    <h3 class="services__name">Hospital-Grade Air Filtration</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-tools services__icon"></i>
                    <h3 class="services__name">24/7 Facility Management</h3>
                </div>

                <div class="services__card">
                    <i class="fas fa-charging-station services__icon"></i>
                    <h3 class="services__name">Electric Vehicle Charging</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-parking services__icon"></i>
                    <h3 class="services__name">Triple-Level Secure Parking</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-handshake services__icon"></i>
                    <h3 class="services__name">Premium Executive Lounges</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-wind services__icon"></i>
                    <h3 class="services__name">Hospital-Grade Air Filtration</h3>
                </div>
                <div class="services__card">
                    <i class="fas fa-tools services__icon"></i>
                    <h3 class="services__name">24/7 Facility Management</h3>
                </div>
            </div>
        </div> --}}
