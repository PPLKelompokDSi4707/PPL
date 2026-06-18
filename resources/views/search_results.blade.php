<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - GreenTour Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        :root {
            --primary: #15803d;
            --primary-light: #22c55e;
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --safe: #10b981;
            --warning: #f59e0b;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); }
        
        nav {
            background: white; padding: 1rem 5%; display: flex; justify-content: space-between;
            align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .logo { font-size: 1.5rem; font-weight: 800; color: var(--primary); text-decoration: none; }
        .btn-outline { border: 2px solid var(--primary); color: var(--primary); padding: 0.5rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
        
        .container { padding: 3rem 5%; }
        .header { margin-bottom: 2rem; }
        .header h1 { font-size: 2rem; margin-bottom: 0.5rem; }
        .header p { color: var(--text-muted); }

        .search-bar { display: flex; gap: 1rem; margin-bottom: 3rem; background: white; padding: 1rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); max-width: 600px;}
        .search-bar input { flex: 1; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; }
        .search-bar button { background: var(--primary); color: white; border: none; padding: 0 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; }
        
        .content-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
        @media (max-width: 900px) { .content-grid { grid-template-columns: 1fr; } }
        
        .map-container { height: 600px; background: #e2e8f0; border-radius: 16px; border: 4px solid white; box-shadow: 0 10px 20px rgba(0,0,0,0.05); overflow: hidden; position: sticky; top: 20px;}
        #map { width: 100%; height: 100%; z-index: 1;}
        
        .dest-list { display: flex; flex-direction: column; gap: 1.5rem; }
        .dest-card { background: white; border-radius: 16px; padding: 1.5rem; display: flex; gap: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.04); border: 1px solid #f1f5f9; }
        .dest-img { width: 150px; height: 150px; border-radius: 12px; object-fit: cover; background: #e2e8f0; }
        .dest-info { flex: 1; display: flex; flex-direction: column; justify-content: center; }
        .dest-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem; }
        .dest-location { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1rem; }
        .empty-state { text-align: center; padding: 4rem; background: white; border-radius: 16px; color: var(--text-muted); }
    </style>
</head>
<body>

<<<<<<< HEAD
    <nav>
        <a href="/" class="logo"><i class="fa-solid fa-leaf"></i> GreenTour</a>
        <div style="display: flex; gap: 15px; align-items: center;">
            <a href="/" class="btn-outline">Kembali</a>
            @auth
                <span style="font-weight: 500; margin-right: 10px;">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:var(--primary); font-weight:600; cursor:pointer;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="text-decoration:none; color:var(--text-main); font-weight:500;">Masuk</a>
                <a href="{{ route('register') }}" style="background:var(--primary); color:white; padding:8px 16px; border-radius:8px; text-decoration:none; font-weight:600;">Daftar</a>
            @endauth
        </div>
    </nav>
=======
    @include('partials.navbar')
>>>>>>> alvi

    <div class="container">
        <div class="header">
            <h1>Hasil Pencarian Destinasi</h1>
            <p>Menampilkan hasil pencarian untuk: <strong>"{{ $keyword ?? 'Semua Destinasi' }}"</strong></p>
        </div>

        <form action="/search" method="GET" class="search-bar" style="max-width: 800px;">
            <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="Cari destinasi lain...">
            
            <select name="kategori" style="padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; background: white;">
                <option value="">Semua Kategori</option>
                <option value="darat" {{ (isset($kategori) && $kategori == 'darat') ? 'selected' : '' }}>Wisata Darat</option>
                <option value="laut" {{ (isset($kategori) && $kategori == 'laut') ? 'selected' : '' }}>Wisata Laut / Pantai</option>
            </select>

            <select name="status" style="padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; background: white;">
                <option value="">Semua Status</option>
                <option value="aman" {{ (isset($status) && $status == 'aman') ? 'selected' : '' }}>🟢 Aman</option>
                <option value="waspada" {{ (isset($status) && $status == 'waspada') ? 'selected' : '' }}>🟡 Waspada/Bahaya</option>
            </select>

            <button type="submit"><i class="fa-solid fa-search"></i> Filter</button>
        </form>

        <div class="content-grid">
            <div class="dest-list">
                @forelse($destinations as $dest)
                <div class="dest-card">
                    <img src="{{ $dest->image_url ?: 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $dest->name }}" class="dest-img">
                    <div class="dest-info">
                        <h3 class="dest-title">{{ $dest->name }}</h3>
                        <p class="dest-location"><i class="fa-solid fa-location-dot"></i> {{ $dest->location }}</p>
                        <a href="{{ route('destinations.detail', $dest->id) }}" style="color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.9rem;">Lihat Detail &rarr;</a>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fa-solid fa-map-location-dot" style="font-size: 3rem; margin-bottom: 1rem; color: #cbd5e1;"></i>
                    <h3>Destinasi tidak ditemukan</h3>
                    <p>Coba gunakan kata kunci pencarian yang lain.</p>
                </div>
                @endforelse
            </div>

            <div class="map-container">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-2.5489, 118.0149], 5);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            var dbMapLayers = @json($mapLayers);
            
            if (dbMapLayers && dbMapLayers.length > 0) {
                var bounds = [];
                dbMapLayers.forEach(function(layer) {
                    if (layer.layer_type === 'marker') {
                        var coords = typeof layer.coordinates === 'string' ? JSON.parse(layer.coordinates) : layer.coordinates;
                        var marker = L.marker([coords.lat, coords.lng]).addTo(map);
                        marker.bindPopup(`
                            <div style="font-family: 'Inter', sans-serif;">
                                <strong style="font-size: 1.1rem; display: block; margin-bottom: 5px;">${layer.name}</strong>
                                <a href="/destinations/${layer.destination_id}" style="color: var(--primary); text-decoration: none; font-size: 0.9rem; font-weight: 600;">Lihat Detail &rarr;</a>
                            </div>
                        `);
                        bounds.push([coords.lat, coords.lng]);
                    }
                });
                if(bounds.length > 0) {
                    map.fitBounds(bounds);
                }
            } else {
                // If no matching layers, leave it on default view
                map.setView([-2.5489, 118.0149], 5);
            }
        });
    </script>
</body>
</html>
