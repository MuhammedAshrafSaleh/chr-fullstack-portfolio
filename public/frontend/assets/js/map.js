// // New Cairo Coordinates
// const newCairoCoords = [30.0074, 31.4913];

// // Initialize Map
// const map = L.map('map', {
//     zoomControl: false // Disable default buttons to use our BEM buttons
// }).setView(newCairoCoords, 13);

// // Add OpenStreetMap Tiles
// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 18,
// }).addTo(map);

// // Add a marker at the center
// const marker = L.marker(newCairoCoords).addTo(map);
// marker.bindPopup("<b>New Cairo</b><br>Egypt").openPopup();

// // Connect Custom BEM Buttons
// document.querySelector('.map-card__btn--zoom-in').addEventListener('click', () => {
//     map.zoomIn();
// });

// document.querySelector('.map-card__btn--zoom-out').addEventListener('click', () => {
//     map.zoomOut();
// });
document.addEventListener('DOMContentLoaded', () => {
    // 1. Fix Leaflet Marker Icon 404s
    delete L.Icon.Default.prototype._getIconUrl;
    L.Icon.Default.mergeOptions({
        iconRetinaUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon-2x.png',
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
    });

    // 2. Initialize Map
    const coords = [30.0074, 31.4913]; // New Cairo
    const map = L.map('map', { 
        zoomControl: false,
        scrollWheelZoom: false 
    }).setView(coords, 14);

    // 3. Add Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // 4. Add Marker with Gold-styled Popup
    const marker = L.marker(coords).addTo(map);
    marker.bindPopup("<b style='color:#c5a059;'>New Cairo Project</b><br>Luxury Development").openPopup();

    // 5. Force Map to recalculate its width for edge-to-edge display
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