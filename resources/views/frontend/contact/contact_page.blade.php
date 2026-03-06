@extends('frontend.layout.layouts')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@section('content')
    @include('frontend.contact.contact_us_map')
    @include('frontend.home.sections.contact')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dbLat = @json($coordinate->lat ?? 30.0074);
            const dbLng = @json($coordinate->lang ?? 31.4913);
            const coords = [dbLat, dbLng];

            // 1. Fix Leaflet Marker Icon 404s
            delete L.Icon.Default.prototype._getIconUrl;
            L.Icon.Default.mergeOptions({
                iconRetinaUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon-2x.png',
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
            });

            // 2. Initialize Map (استخدام متغير coords الجديد)
            const map = L.map('map', {
                zoomControl: false,
                scrollWheelZoom: false
            }).setView(coords, 14);

            // 3. Add Tile Layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // 4. Add Marker
            const marker = L.marker(coords).addTo(map);
            marker.bindPopup("<b style='color:#c5a059;'>Our Location</b><br>Visit us today!").openPopup();

            // 5. Force Map recalculate
            setTimeout(() => {
                map.invalidateSize();
            }, 400);

            // 6. Interactive Controls logic
            const zoomIn = document.querySelector('.map-card__btn--zoom-in');
            const zoomOut = document.querySelector('.map-card__btn--zoom-out');
            const dirBtn = document.querySelector('.map-card__directions-btn');

            if (zoomIn) zoomIn.onclick = () => map.zoomIn();
            if (zoomOut) zoomOut.onclick = () => map.zoomOut();

            if (dirBtn) {
                dirBtn.onclick = () => {
                    const url = `https://www.google.com/maps/dir/?api=1&destination=${coords[0]},${coords[1]}`;
                    window.open(url, '_blank');
                };
            }
        });
    </script>
@endpush
