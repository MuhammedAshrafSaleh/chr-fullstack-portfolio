{{-- <!--============================================= ceo-message Section -->
<section class="ceo-message">
    <div class="ceo-message__container">

        <div class="ceo-message__visual">
            <div class="ceo-message__image-wrapper">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80"
                    alt="Eng. Amr Sultan" class="ceo-message__img">
            </div>
        </div>

        <div class="ceo-message__content">
            <header class="ceo-message__header">
                <h2 class="ceo-message__title">OUR CEO MESSAGE</h2>
            </header>

            <div class="ceo-message__body">
                <p>OUR SUCCESS IS ROOTED IN A LEGACY OF EVOLVING KNOWLEDGE AND LASTING PARTNERSHIPS. GENERATIONS OF
                    CLIENTS HAVE SHAPED OUR JOURNEY AND CONTINUE TO DRIVE US FORWARD.</p>

                <p>WITH DEEP INSIGHTS, WE'VE DELIVERED DOZENS OF DEVELOPMENTS ACROSS EGYPT, COMMITTED TO MAKING
                    ASPIRATIONS ATTAINABLE BY CREATING COMMUNITIES WHERE EVERY HOMEOWNER FEELS VALUED.</p>

                <p>WE AIM TO BUILD NOT JUST EXCEPTIONAL DEVELOPMENTS, BUT FULLY INTEGRATED COMMUNITIES —
                    MASTERPIECES OF ARCHITECTURE THAT REFLECT 21ST-CENTURY ASPIRATIONS AND INSPIRE FUTURE
                    GENERATIONS TO LIVE, CONNECT, AND THRIVE.</p>
            </div>

            <footer class="ceo-message__signature">
                <h4 class="ceo-message__name">ENG. AMR SULTAN</h4>
                <p class="ceo-message__role">FOUNDER & CEO</p>
            </footer>
        </div>

    </div>
</section>

--}}


<!--============================================= ceo-message Section -->
<section class="ceo-message">
    <div class="ceo-message__container">

        <div class="ceo-message__visual">
            <div class="ceo-message__image-wrapper">
                <img src="{{ $aboutCeo->image ? asset('storage/' . $aboutCeo->image) : asset('assets/images/placeholder-ceo.jpg') }}"
                    alt="{{ $aboutCeo->ceo_name }}" class="ceo-message__img">
            </div>
        </div>

        <div class="ceo-message__content">
            <header class="ceo-message__header">
                <h2 class="ceo-message__title">{{ $aboutCeo->title }}</h2>
            </header>

            <div class="ceo-message__body">
                <p>{{ $aboutCeo->paragraph_one }}</p>

                @if($aboutCeo->paragraph_two)
                    <p>{{ $aboutCeo->paragraph_two }}</p>
                @endif

                @if($aboutCeo->paragraph_three)
                    <p>{{ $aboutCeo->paragraph_three }}</p>
                @endif
            </div>

            <footer class="ceo-message__signature">
                <h4 class="ceo-message__name">{{ $aboutCeo->ceo_name }}</h4>
                <p class="ceo-message__role">{{ $aboutCeo->ceo_title }}</p>
            </footer>
        </div>

    </div>
</section>