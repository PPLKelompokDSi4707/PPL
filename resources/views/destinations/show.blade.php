<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - GreenTour</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #15803d;
            --primary-light: #22c55e;
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); }
        
        nav { background: white; padding: 1rem 5%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .logo { font-size: 1.5rem; font-weight: 800; color: var(--primary); text-decoration: none; }
        .btn-outline { border: 2px solid var(--primary); color: var(--primary); padding: 0.5rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
        
        .hero { width: 100%; height: 400px; background: url('https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=2000&auto=format&fit=crop') center/cover; position: relative; }
        .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(15,23,42,0.8), transparent); display: flex; align-items: flex-end; padding: 3rem 5%; color: white; }
        .hero-content h1 { font-size: 3rem; margin-bottom: 0.5rem; }
        .hero-content p { font-size: 1.2rem; display: flex; align-items: center; gap: 0.5rem; }
        
        .container { padding: 3rem 5%; display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; }
        @media (max-width: 900px) { .container { grid-template-columns: 1fr; } }
        
        .card { background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); margin-bottom: 2rem; }
        .card h2 { margin-bottom: 1rem; color: var(--primary); font-size: 1.5rem; display: flex; align-items: center; gap: 0.5rem; }
        
        .status-badge { display: inline-block; padding: 0.5rem 1rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem; margin-top: 1rem; }
        .status-aman { background: #dcfce7; color: #166534; }
        .status-bahaya { background: #fee2e2; color: #991b1b; }
        .status-konservasi { background: #e0f2fe; color: #075985; }

        .desc-text { line-height: 1.8; color: #475569; font-size: 1.1rem; }
        
        .sidebar .card { background: #f0fdf4; border: 1px solid #bbf7d0; }
        .info-item { margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start; }
        .info-item i { color: var(--primary); font-size: 1.2rem; margin-top: 0.2rem; }
        .info-item h4 { margin-bottom: 0.2rem; }
        .info-item p { color: var(--text-muted); font-size: 0.9rem; }
    </style>
</head>
<body>

    <nav>
        <a href="/" class="logo"><i class="fa-solid fa-leaf"></i> GreenTour</a>
        <a href="javascript:history.back()" class="btn-outline">Kembali</a>
    </nav>

    <div class="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>{{ $destination->name }}</h1>
                <p><i class="fa-solid fa-location-dot"></i> {{ $destination->location }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main-content">
            <div class="card">
                <h2><i class="fa-solid fa-circle-info"></i> Tentang Destinasi</h2>
                @if($destination->mapLayers->count() > 0)
                    <p class="desc-text">{{ $destination->mapLayers->first()->description }}</p>
                @else
                    <p class="desc-text">Deskripsi untuk destinasi {{ $destination->name }} belum tersedia saat ini.</p>
                @endif
            </div>
            
            <div class="card">
                <h2><i class="fa-solid fa-leaf"></i> Kondisi Ekosistem & Lingkungan</h2>
                <p class="desc-text">Berikut adalah gambaran ringkas tentang kondisi lingkungan wisata ini agar Anda dapat merencanakan perjalanan yang ramah lingkungan.</p>
                
                @if($destination->mapLayers->count() > 0)
                    @php
                        $area = $destination->mapLayers->first()->area_type;
                        $statusClass = $area == 'zona_bahaya' ? 'status-bahaya' : ($area == 'kawasan_konservasi' ? 'status-konservasi' : 'status-aman');
                        $statusText = str_replace('_', ' ', strtoupper($area));
                    @endphp
                    <div class="status-badge {{ $statusClass }}">
                        @if($area == 'zona_bahaya') ⚠️ @else 🌿 @endif {{ $statusText }}
                    </div>
                @else
                    <div class="status-badge status-aman">🌿 KAWASAN WISATA UMUM</div>
                @endif
            </div>
        </div>

        <div class="sidebar">
            <div class="card">
                <h2><i class="fa-solid fa-list-check"></i> Info Singkat</h2>
                <div class="info-item">
                    <i class="fa-solid fa-map"></i>
                    <div>
                        <h4>Lokasi Terdaftar</h4>
                        <p>{{ $destination->location }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-cloud-sun" style="font-size: 1.5rem;"></i>
                    <div style="flex: 1;">
                        <h4>Prakiraan Cuaca Terkini (BMKG)</h4>
                        @if(isset($weatherData['data'][0]['cuaca'][0][0]))
                            @php
                                $cuaca = $weatherData['data'][0]['cuaca'][0][0];
                            @endphp
                            <div style="display: flex; align-items: center; gap: 10px; margin-top: 8px; background: white; padding: 10px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                <img src="{{ $cuaca['image'] }}" alt="cuaca" width="40" style="filter: drop-shadow(0 2px 3px rgba(0,0,0,0.1));">
                                <div>
                                    <p style="font-weight: bold; color: var(--text-main); margin-bottom: 2px;">{{ $cuaca['weather_desc'] }}</p>
                                    <p style="font-size: 0.85rem; color: #475569;">Suhu: <strong>{{ $cuaca['t'] }}&deg;C</strong> &nbsp;|&nbsp; RH: <strong>{{ $cuaca['hu'] }}%</strong> &nbsp;|&nbsp; Angin: <strong>{{ $cuaca['ws'] }} km/h</strong></p>
                                </div>
                            </div>
                        @else
                            <p style="margin-top: 5px;">Data cuaca BMKG tidak tersedia saat ini.</p>
                        @endif
                    </div>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-fish-fins"></i>
                    <div>
                        <h4>Kondisi Biota (FR06)</h4>
                        <p>Akan diintegrasikan pada Sprint berikutnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
