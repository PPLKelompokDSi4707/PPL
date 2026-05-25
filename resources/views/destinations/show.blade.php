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
        .status-waspada { background: #fef08a; color: #854d0e; }
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
                <h2><i class="fa-solid fa-shield-halved"></i> Analisis Kelayakan Lingkungan (FR07)</h2>
                <p class="desc-text">Algoritma otomatis kami menganalisis data iklim terkini dan metrik ekosistem untuk menentukan tingkat kelayakan/keamanan kunjungan wisata Anda.</p>
                
                <div style="margin-top: 1.5rem; padding: 1.5rem; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0; display: flex; align-items: flex-start; gap: 1.5rem;">
                    <div class="status-badge {{ $kelayakan['class'] }}" style="margin: 0; font-size: 1.1rem; padding: 0.8rem 1.5rem; text-align: center; white-space: nowrap;">
                        @if($kelayakan['status'] == 'Aman') 🟢
                        @elseif($kelayakan['status'] == 'Waspada') 🟡
                        @else 🔴
                        @endif
                        <br>{{ strtoupper($kelayakan['status']) }} UNTUK<br>DIKUNJUNGI
                    </div>
                    
                    <div style="flex: 1;">
                        @if(count($kelayakan['reasons']) > 0)
                            <h4 style="margin-bottom: 0.5rem; color: #475569;">Alasan Analisis:</h4>
                            <ul style="padding-left: 1.2rem; color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                                @foreach($kelayakan['reasons'] as $reason)
                                    <li>{{ $reason }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p style="color: #64748b; font-size: 0.95rem;">Kondisi cuaca bersahabat dan seluruh metrik ekosistem di area ini mendukung aktivitas wisata Anda.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="card">
                <h2><i class="fa-solid fa-list-check"></i> Info Singkat</h2>
                
                <div class="info-item">
                    <i class="fa-solid fa-map" style="font-size: 1.5rem;"></i>
                    <div style="flex: 1;">
                        <h4>Lokasi Terdaftar</h4>
                        <p>{{ $destination->location }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-cloud-sun" style="font-size: 1.5rem;"></i>
                    <div style="flex: 1;">
                        <h4>Prakiraan Cuaca (BMKG)</h4>
                        @if(isset($weatherData['data'][0]['cuaca'][0][0]))
                            @php
                                $cuaca = $weatherData['data'][0]['cuaca'][0][0];
                            @endphp
                            <div style="display: flex; align-items: center; gap: 10px; margin-top: 8px; background: white; padding: 10px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                <img src="{{ $cuaca['image'] }}" alt="cuaca" width="40" style="filter: drop-shadow(0 2px 3px rgba(0,0,0,0.1));">
                                <div>
                                    <p style="font-weight: bold; color: var(--text-main); margin-bottom: 2px;">{{ $cuaca['weather_desc'] }}</p>
                                    <p style="font-size: 0.85rem; color: #475569;">Suhu: <strong>{{ $cuaca['t'] }}&deg;C</strong> &nbsp;|&nbsp; Angin: <strong>{{ $cuaca['ws'] }} km/h</strong></p>
                                </div>
                            </div>
                        @else
                            <p style="margin-top: 5px;">Data cuaca BMKG tidak tersedia.</p>
                        @endif
                    </div>
                </div>

                <div class="info-item">
                    <i class="fa-solid fa-fish-fins" style="font-size: 1.5rem;"></i>
                    <div style="flex: 1;">
                        <h4>Kondisi Ekosistem & Biota (FR06)</h4>
                        @if($destination->biotaData)
                            <div style="margin-top: 8px; background: white; padding: 10px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 0.85rem; color: #475569;">
                                @if($destination->biotaData->coral_reef_status)
                                    <p style="margin-bottom: 4px;"><strong><i class="fa-solid fa-water"></i> Terumbu Karang:</strong> {{ str_replace('_', ' ', ucwords($destination->biotaData->coral_reef_status)) }} ({{ $destination->biotaData->coral_coverage_pct }}%)</p>
                                    <p style="margin-bottom: 4px;"><strong><i class="fa-solid fa-fish"></i> Ikan:</strong> Diversitas {{ ucwords($destination->biotaData->fish_diversity) }}</p>
                                @endif
                                
                                @if($destination->biotaData->forest_cover_pct)
                                    <p style="margin-bottom: 4px;"><strong><i class="fa-solid fa-tree"></i> Tutupan Hutan:</strong> {{ $destination->biotaData->forest_cover_pct }}%</p>
                                    <p style="margin-bottom: 4px;"><strong><i class="fa-solid fa-paw"></i> Biodiversitas:</strong> Indeks {{ ucwords($destination->biotaData->biodiversity_index) }}</p>
                                @endif
                                
                                <p style="margin-bottom: 4px;"><strong>Flora Khas:</strong> {{ ucwords($destination->biotaData->flora_highlight) }}</p>
                                <p style="margin-bottom: 4px;"><strong>Fauna Khas:</strong> {{ ucwords($destination->biotaData->fauna_highlight) }}</p>
                                <p style="font-size: 0.75rem; color: #94a3b8; margin-top: 8px; border-top: 1px solid #e2e8f0; padding-top: 5px;">Sumber: Data Internal Database</p>
                            </div>
                        @else
                            <p style="margin-top: 5px;">Data ekosistem belum direkam untuk lokasi ini.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
