<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="CHR Developments - Crafting landmark properties that redefine luxury. Excellence in real estate development across Egypt.">
    <title>@yield('title')</title>

    <!-- Preconnect to external domains for faster loading -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://images.unsplash.com">

    <!-- DNS Prefetch for faster domain resolution -->
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://unpkg.com">

    <!-- Critical CSS - Load immediately -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/app.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('frontend/assets/media/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('frontend/assets/media/favicon_io/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/media/favicon_io/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('frontend/assets/media/favicon_io/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('frontend/assets/media/favicon_io/site.webmanifest') }}">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome - Load with defer to not block rendering -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </noscript>
    @stack('css')
</head>


<body>
    <!--================================================= Fixed Actions -->
    <div class="scroll-progress"></div>
    <div class="custom-cursor"></div>
    <div class="cursor-dot"></div>

    @include('frontend.layout.side_actions')

    @include('frontend.layout.navbar')

    @yield('content')

    @include('frontend.layout.footer')

    <!-- JavaScript Files - ALL WITH DEFER for non-blocking load -->
    <script src="https://unpkg.com/lenis@1.3.17/dist/lenis.min.js" defer></script>
    <script src="{{ asset('frontend/assets/js/theme_toggle.js') }}" defer></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
    @stack('scripts')

</body>

</html>
