@extends('admin.layout')

@section('title', 'Edit Destinasi')

@section('content')
    <!-- Load Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    
    <!-- Load Leaflet Draw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 2rem; max-width: 1200px;">
        <div class="card">
            @if ($errors->any())
                <div style="margin-bottom: 1rem; padding: 1rem; background-color: #fee2e2; color: #991b1b; border: 1px solid #fecaca; border-radius: 6px;">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" id="destForm">
                @csrf
                @method('PUT')
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Nama Destinasi</label>
                    <input type="text" name="name" value="{{ $destination->name }}" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Deskripsi Singkat</label>
                    <textarea name="description" required rows="3" style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">{{ $destination->description }}</textarea>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Lokasi (Kota/Provinsi)</label>
                        <input type="text" name="location" value="{{ $destination->location }}" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Kategori Ekosistem</label>
                        <select name="category" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                            <option value="darat" {{ $destination->category == 'darat' ? 'selected' : '' }}>Darat (Hutan, Gunung, dll)</option>
                            <option value="laut" {{ $destination->category == 'laut' ? 'selected' : '' }}>Laut (Pantai, Pulau, dll)</option>
                        </select>
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Status Lingkungan</label>
                        <select name="environment_status" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                            <option value="ramah_lingkungan" {{ $destination->environment_status == 'ramah_lingkungan' ? 'selected' : '' }}>🟢 Aman / Ramah Lingkungan</option>
                            <option value="waspada" {{ $destination->environment_status == 'waspada' ? 'selected' : '' }}>🟡 Waspada</option>
                            <option value="bahaya" {{ $destination->environment_status == 'bahaya' ? 'selected' : '' }}>🔴 Bahaya</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Kode BMKG (Opsional)</label>
                        <input type="text" name="bmkg_adm4" value="{{ $destination->bmkg_adm4 }}" placeholder="Misal: 31.71.03.1001" style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                    </div>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">URL Gambar Poster (Opsional)</label>
                    <input type="url" name="image_url" value="{{ $destination->image_url }}" placeholder="https://..." style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>

                <!-- Hidden inputs for mapping -->
                <input type="hidden" name="map_layers_data" id="map_layers_data_input" value="{{ $destination->map_layers_data }}">

                <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0;">
                    <button type="submit" class="btn"><i class="fa-solid fa-save"></i> Perbarui Destinasi</button>
                    <a href="{{ route('admin.destinations.index') }}" class="btn" style="background:#64748b; margin-left:10px;">Batal</a>
                </div>
            </form>
        </div>

        <div class="card" style="padding: 1rem;">
            <h3 style="margin-top: 0; margin-bottom: 10px; font-size: 1.1rem; color: #334155;"><i class="fa-solid fa-draw-polygon"></i> Area & Titik Lokasi Peta</h3>
            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 15px;">Gunakan alat di sebelah kiri peta untuk menggambar area (Polygon) DAN/ATAU menaruh Titik Lokasi (Marker). Anda bisa menambahkan lebih dari satu!</p>
            
            <div id="map" style="width: 100%; height: 350px; border-radius: 8px; border: 2px solid #e2e8f0; z-index: 1;"></div>
            
            <div style="margin-top: 15px;">
                <label style="font-size: 0.8rem; color: #64748b;">Jumlah Lapisan (Bentuk) yang Tergambar</label>
                <div id="layer_display" style="background: #f1f5f9; padding: 8px; border-radius: 4px; font-weight: bold; font-size: 0.9rem; color: #0f172a;">Belum ada gambar</div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-2.5489, 118.0149], 5);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            var drawControl = new L.Control.Draw({
                draw: {
                    polygon: { allowIntersection: false, showArea: true, shapeOptions: { color: '#3388ff' } },
                    polyline: false, rectangle: false, circle: false, circlemarker: false, marker: true
                },
                edit: { featureGroup: drawnItems, remove: true }
            });
            map.addControl(drawControl);

            function updateMapData() {
                var layersData = [];
                drawnItems.eachLayer(function(layer) {
                    if (layer instanceof L.Marker) {
                        layersData.push({
                            type: 'marker',
                            coordinates: { lat: layer.getLatLng().lat, lng: layer.getLatLng().lng }
                        });
                    } else if (layer instanceof L.Polygon) {
                        layersData.push({
                            type: 'polygon',
                            coordinates: layer.getLatLngs()[0].map(function(pt) { return { lat: pt.lat, lng: pt.lng }; })
                        });
                    }
                });
                
                document.getElementById('map_layers_data_input').value = JSON.stringify(layersData);
                if (layersData.length > 0) {
                    document.getElementById('layer_display').innerText = layersData.length + " bentuk tergambar (Aman!)";
                    document.getElementById('layer_display').style.color = '#15803d';
                } else {
                    document.getElementById('layer_display').innerText = 'Belum ada gambar';
                    document.getElementById('layer_display').style.color = '#0f172a';
                }
            }

            // Pre-load existing data
            var existingLayersStr = document.getElementById('map_layers_data_input').value;
            if (existingLayersStr) {
                try {
                    var existingLayers = JSON.parse(existingLayersStr);
                    var bounds = [];
                    existingLayers.forEach(function(lData) {
                        if (lData.type === 'marker' && lData.coordinates.lat) {
                            L.marker([lData.coordinates.lat, lData.coordinates.lng]).addTo(drawnItems);
                            bounds.push([lData.coordinates.lat, lData.coordinates.lng]);
                        } else if (lData.type === 'polygon' && Array.isArray(lData.coordinates)) {
                            var latlngs = lData.coordinates.map(function(pt) { return [pt.lat, pt.lng]; });
                            var polygon = L.polygon(latlngs, { color: '#3388ff' }).addTo(drawnItems);
                            bounds.push(...latlngs);
                        }
                    });
                    if (bounds.length > 0) {
                        map.fitBounds(bounds);
                    }
                    updateMapData();
                } catch (e) { console.error("Invalid coordinate data:", e); }
            }

            map.on(L.Draw.Event.CREATED, function (e) {
                drawnItems.addLayer(e.layer);
                updateMapData();
            });

            map.on('draw:edited', function (e) {
                updateMapData();
            });

            map.on('draw:deleted', function (e) {
                updateMapData();
            });
        });
    </script>
@endsection
