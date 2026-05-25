<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTour Indonesia - Wisata Berkelanjutan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Load FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Load Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        :root {
            --primary: #15803d; /* dark green */
            --primary-light: #22c55e; /* light green */
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --safe: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.2rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary) !important;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: var(--primary);
            color: white !important;
        }

        .btn-primary {
            background: var(--primary);
            color: white !important;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            background: #166534;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.3);
        }

        /* Hero Section */
        .hero {
            padding: 10rem 5% 5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: linear-gradient(rgba(248, 250, 252, 0.9), rgba(248, 250, 252, 0.9)), url('https://images.unsplash.com/photo-1518182170546-076616fd46bc?q=80&w=2560&auto=format&fit=crop') center/cover no-repeat;
            min-height: 85vh;
            justify-content: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: var(--text-main);
            max-width: 900px;
            line-height: 1.2;
            animation: slideUp 0.8s ease;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--text-muted);
            max-width: 700px;
            margin-bottom: 3rem;
            animation: slideUp 1s ease;
        }

        /* Search & Filter Box */
        .search-box {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 1000px;
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            animation: slideUp 1.2s ease;
        }

        .search-group {
            flex: 1;
            min-width: 200px;
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .search-group label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        .search-input {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .search-input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(21, 128, 61, 0.1);
        }

        .search-box .btn-primary {
            min-width: 150px;
            align-self: flex-end;
            height: 50px;
            font-size: 1.05rem;
        }

        /* Interactive Map Section Placeholder */
        .map-section {
            padding: 5rem 5%;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .section-header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-main);
        }
        
        .section-header p {
            color: var(--text-muted);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .map-container {
            width: 100%;
            height: 550px;
            background: #e2e8f0;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 4px solid white;
        }

        #map {
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Recommendations Section */
        .recommendations {
            padding: 5rem 5%;
            background: white;
        }

        .dest-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 1rem;
        }

        .dest-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            border: 1px solid #f1f5f9;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .dest-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .dest-img-container {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .dest-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .dest-card:hover .dest-img {
            transform: scale(1.05);
        }

        .bookmark-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255,255,255,0.9);
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            z-index: 10;
        }
        .bookmark-btn:hover {
            color: var(--primary);
            transform: scale(1.1);
        }

        .dest-info {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .dest-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.8rem;
        }

        .dest-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .dest-rating {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            color: #f59e0b;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .dest-location {
            color: var(--text-muted);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.2rem;
        }

        .tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tag {
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .tag.safe { background: #dcfce7; color: #166534; }
        .tag.warning { background: #fef3c7; color: #92400e; }
        .tag.danger { background: #fee2e2; color: #991b1b; }
        .tag.category { background: #e0f2fe; color: #075985; }

        .env-status {
            background: #f8fafc;
            padding: 1.2rem;
            border-radius: 10px;
            margin-top: auto;
            border-left: 4px solid var(--safe);
        }
        
        .env-status.warning-status { border-left-color: var(--warning); }

        .env-status p {
            font-size: 0.9rem;
            color: var(--text-main);
            margin: 0.4rem 0;
            display: flex;
            justify-content: space-between;
        }

        /* Features/Keunggulan */
        .features {
            padding: 5rem 5%;
            background: var(--bg-color);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2.5rem;
        }

        .feature-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-8px);
        }

        .feature-icon-wrapper {
            width: 80px;
            height: 80px;
            background: #dcfce7;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
            transition: all 0.3s ease;
        }

        .feature-item:hover .feature-icon-wrapper {
            background: var(--primary);
            color: white;
        }

        .feature-item h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
            color: var(--text-main);
        }
        
        .feature-item p {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 3rem 5%;
            text-align: center;
            border-top: 1px solid #1e293b;
        }
        
        footer p {
            margin-top: 1.5rem;
        }
        
        footer .logo {
            justify-content: center;
            color: white;
            margin-bottom: 1rem;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .search-box { flex-direction: column; }
            .nav-links { display: none; }
            .hero { padding-top: 8rem; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="#" class="logo"><i class="fa-solid fa-leaf"></i> GreenTour</a>
        <div class="nav-links">
            <a href="#peta">Peta Wisata</a>
            <a href="#rekomendasi">Rekomendasi Destinasi</a>
            <a href="#fitur">Fitur Sistem</a>
            <a href="#" class="btn-outline">Masuk</a>
            <a href="#" class="btn-primary">Daftar</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Jelajahi Wisata <span>Ramah Lingkungan</span> di Indonesia</h1>
        <p>Temukan destinasi wisata dengan informasi iklim dan ekosistem real-time untuk keputusan perjalanan yang lebih aman dan berkelanjutan sesuai nilai SDGs.</p>
        
        <form action="/search" method="GET" class="search-box">
            <div class="search-group">
                <label>Lokasi atau Nama Destinasi</label>
                <input type="text" name="keyword" class="search-input" placeholder="Contoh: Raja Ampat, Bali...">
            </div>
            <div class="search-group">
                <label>Kategori Ekosistem</label>
                <select class="search-input">
                    <option value="">Semua Kategori</option>
                    <option value="darat">Wisata Darat</option>
                    <option value="laut">Wisata Laut / Pantai</option>
                </select>
            </div>
            <div class="search-group">
                <label>Status Lingkungan</label>
                <select class="search-input">
                    <option value="">Semua Status</option>
                    <option value="aman">🟢 Aman</option>
                    <option value="waspada">🟡 Waspada</option>
                </select>
            </div>
            <button type="submit" class="btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
        </form>
    </section>

    <!-- Interactive Map Section (MOCKUP) -->
    <section class="map-section" id="peta">
        <div class="section-header">
            <h2>Peta Interaktif Destinasi GIS</h2>
            <p>Eksplorasi titik lokasi wisata di seluruh Indonesia terintegrasi dengan pemetaan Geographic Information System (GIS).</p>
        </div>
<<<<<<< HEAD

    <!-- FR08: Rekomendasi Destinasi -->
    @if(isset($recommendations) && $recommendations->count() > 0)
    <div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
        <h2 style="color: var(--primary); font-size: 2rem; margin-bottom: 10px; text-align: center;"><i class="fa-solid fa-medal"></i> Rekomendasi Ramah Lingkungan</h2>
        <p style="text-align: center; color: var(--text-muted); margin-bottom: 30px;">Destinasi pilihan dengan kualitas ekosistem terbaik dan terjaga untuk pengalaman wisata alam yang maksimal.</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            @foreach($recommendations as $rec)
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #e2e8f0; display: flex; flex-direction: column;">
                <div style="height: 150px; background: linear-gradient(45deg, #10b981, #3b82f6); position: relative;">
                    <div style="position: absolute; bottom: 10px; right: 10px; background: rgba(255,255,255,0.9); padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: bold; color: #059669;">
                        ⭐ EKOSISTEM UNGGULAN
                    </div>
                </div>
                <div style="padding: 15px; flex: 1; display: flex; flex-direction: column;">
                    <h3 style="margin: 0 0 5px 0; font-size: 1.2rem;">{{ $rec->name }}</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0 0 15px 0;"><i class="fa-solid fa-location-dot"></i> {{ $rec->location }}</p>
                    <div style="flex: 1;"></div>
                    <a href="{{ route('destinations.detail', $rec->id) }}" style="display: block; text-align: center; background: var(--primary); color: white; text-decoration: none; padding: 8px; border-radius: 6px; font-weight: 600; font-size: 0.9rem;">Jelajahi &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

=======
>>>>>>> a83da3b2d672c4393570a0365afc83a1ab6fcbfc
        <div class="map-container">
            <div id="map"></div>
        </div>
    </section>

    <!-- Recommendations Section -->
    <section class="recommendations" id="rekomendasi">
        <div class="section-header">
            <h2>Rekomendasi Destinasi Pintar</h2>
            <p>Sistem kami merekomendasikan destinasi wisata dengan skor kelayakan lingkungan terbaik berdasarkan data API Eksternal (Iklim & Ekosistem).</p>
        </div>
        
        <div class="dest-grid">
            <!-- Card 1 -->
            <div class="dest-card">
                <div class="dest-img-container">
                    <img src="https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b?q=80&w=800&auto=format&fit=crop" alt="Taman Nasional Komodo" class="dest-img">
                    <button class="bookmark-btn" title="Simpan ke Favorit"><i class="fa-regular fa-bookmark"></i></button>
                </div>
                <div class="dest-info">
                    <div class="tags">
                        <span class="tag safe"><i class="fa-solid fa-circle-check"></i> Aman</span>
                        <span class="tag category"><i class="fa-solid fa-mountain"></i> Darat</span>
                    </div>
                    <div class="dest-header">
                        <h3 class="dest-title">Taman Nasional Komodo</h3>
                        <div class="dest-rating">
                            <i class="fa-solid fa-star"></i> 4.8 (120)
                        </div>
                    </div>
                    <div class="dest-location">
                        <i class="fa-solid fa-location-dot"></i> Manggarai Barat, NTT
                    </div>
                    
                    <div class="env-status">
                        <p><strong>Status Iklim:</strong> <span>Cerah, 28°C <i class="fa-solid fa-sun" style="color: #f59e0b"></i></span></p>
                        <p><strong>Kondisi Ekosistem:</strong> <span style="color:var(--primary); font-weight: 600;">Terjaga Baik</span></p>
                    </div>
                    
                    <a href="#" class="btn-outline" style="width: 100%; text-align: center; display: block; margin-top: 1.5rem;">Detail Lokasi</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="dest-card">
                <div class="dest-img-container">
                    <img src="https://images.unsplash.com/photo-1516690553959-71a414d6b9b6?q=80&w=800&auto=format&fit=crop" alt="Raja Ampat" class="dest-img">
                    <button class="bookmark-btn" title="Simpan ke Favorit"><i class="fa-regular fa-bookmark"></i></button>
                </div>
                <div class="dest-info">
                    <div class="tags">
                        <span class="tag safe"><i class="fa-solid fa-circle-check"></i> Aman</span>
                        <span class="tag category"><i class="fa-solid fa-water"></i> Laut</span>
                    </div>
                    <div class="dest-header">
                        <h3 class="dest-title">Kepulauan Raja Ampat</h3>
                        <div class="dest-rating">
                            <i class="fa-solid fa-star"></i> 4.9 (340)
                        </div>
                    </div>
                    <div class="dest-location">
                        <i class="fa-solid fa-location-dot"></i> Papua Barat Daya
                    </div>
                    
                    <div class="env-status">
                        <p><strong>Status Iklim:</strong> <span>Berawan, 26°C <i class="fa-solid fa-cloud" style="color: #64748b"></i></span></p>
                        <p><strong>Kondisi Ekosistem:</strong> <span style="color:var(--primary); font-weight: 600;">Terumbu Karang Sehat</span></p>
                    </div>
                    
                    <a href="#" class="btn-outline" style="width: 100%; text-align: center; display: block; margin-top: 1.5rem;">Detail Lokasi</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="dest-card">
                <div class="dest-img-container">
                    <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?q=80&w=800&auto=format&fit=crop" alt="Gunung Bromo" class="dest-img">
                    <button class="bookmark-btn" title="Simpan ke Favorit"><i class="fa-regular fa-bookmark"></i></button>
                </div>
                <div class="dest-info">
                    <div class="tags">
                        <span class="tag warning"><i class="fa-solid fa-triangle-exclamation"></i> Waspada</span>
                        <span class="tag category"><i class="fa-solid fa-mountain"></i> Darat</span>
                    </div>
                    <div class="dest-header">
                        <h3 class="dest-title">Gunung Bromo</h3>
                        <div class="dest-rating">
                            <i class="fa-solid fa-star"></i> 4.7 (500+)
                        </div>
                    </div>
                    <div class="dest-location">
                        <i class="fa-solid fa-location-dot"></i> Probolinggo, Jawa Timur
                    </div>
                    
                    <div class="env-status warning-status">
                        <p><strong>Status Iklim:</strong> <span>Hujan Ringan, 18°C <i class="fa-solid fa-cloud-rain" style="color: #3b82f6"></i></span></p>
                        <p><strong>Kondisi Ekosistem:</strong> <span style="color:var(--warning); font-weight: 600;">Aktivitas Vulkanik</span></p>
                    </div>
                    
                    <a href="#" class="btn-outline" style="width: 100%; text-align: center; display: block; margin-top: 1.5rem;">Cari Alternatif</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Sistem -->
    <section class="features" id="fitur">
        <div class="section-header">
            <h2>Mendukung Pariwisata Berkelanjutan</h2>
            <p>Fitur cerdas untuk memastikan perjalanan wisata Anda aman dan selaras dengan tujuan SDG 13, 14, dan 15.</p>
        </div>
        <div class="feature-grid">
            <div class="feature-item">
                <div class="feature-icon-wrapper"><i class="fa-solid fa-cloud-sun-rain"></i></div>
                <h3>Integrasi Data Iklim</h3>
                <p>Memproses data cuaca real-time dari API (seperti BMKG) untuk memastikan destinasi aman dari kondisi ekstrem (SDG 13).</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon-wrapper"><i class="fa-solid fa-fish-fins"></i></div>
                <h3>Pengecekan Ekosistem</h3>
                <p>Menganalisis status terkini ekosistem darat dan laut untuk menghindari daerah yang sedang rentan terhadap kerusakan lingkungan.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon-wrapper"><i class="fa-solid fa-signs-post"></i></div>
                <h3>Rekomendasi Cerdas</h3>
                <p>Sistem analitik yang secara otomatis memberikan alternatif wisata berkelanjutan jika tempat tujuan utama sedang berisiko.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon-wrapper"><i class="fa-solid fa-leaf"></i></div>
                <h3>Ulasan Ramah Lingkungan</h3>
                <p>Wisatawan dapat memberikan rating pada destinasi wisata berdasarkan seberapa baik destinasi tersebut menjaga keberlanjutan alam.</p>
            </div>
        </div>
    </section>

    <footer>
        <a href="#" class="logo" style="justify-content: center; color: white;"><i class="fa-solid fa-leaf"></i> GreenTour Indonesia</a>
        <p>&copy; 2026 GreenTour Indonesia. Aplikasi pemetaan pariwisata yang mendukung Sustainable Development Goals.</p>
    </footer>

    <!-- Load Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the map centered on Indonesia
            var map = L.map('map').setView([-2.5489, 118.0149], 5);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Dynamic data from database
            var dbMapLayers = @json($mapLayers);
            
            if (dbMapLayers && dbMapLayers.length > 0) {
                // Parse dynamic data
                dbMapLayers.forEach(function(layer) {
                    if (layer.layer_type === 'marker') {
                        var coords = layer.coordinates; // assuming json {"lat": ..., "lng": ...}
                        if(typeof coords === 'string') coords = JSON.parse(coords);
                        
                        var marker = L.marker([coords.lat, coords.lng]).addTo(map);
                        var popupContent = `
                            <div style="font-family: 'Inter', sans-serif;">
                                <h4 style="margin: 0 0 5px 0; font-weight: 700;">${layer.name}</h4>
                                <p style="margin: 0 0 10px 0; font-size: 0.9rem;">
                                    Tipe Area: <strong>${layer.area_type ? layer.area_type.replace('_', ' ') : 'Kawasan Wisata'}</strong>
                                </p>
                                <a href="/destinations/${layer.destination_id}" style="color: var(--primary); text-decoration: none; font-size: 0.9rem; font-weight: 600;">Lihat Detail &rarr;</a>
                            </div>
                        `;
                        marker.bindPopup(popupContent);
                    } else if (layer.layer_type === 'polygon' || layer.layer_type === 'polyline') {
                        var coordsList = layer.coordinates;
                        if(typeof coordsList === 'string') coordsList = JSON.parse(coordsList);
                        var latlngs = coordsList.map(c => [c.lat, c.lng]);
                        
                        var shapeOptions = {
                            color: layer.color || '#3388ff',
                            weight: layer.stroke_weight || 3,
                            fillColor: layer.fill_color || '#3388ff',
                            fillOpacity: layer.fill_opacity || 0.2
                        };
                        
                        var shape = layer.layer_type === 'polygon' 
                            ? L.polygon(latlngs, shapeOptions).addTo(map)
                            : L.polyline(latlngs, shapeOptions).addTo(map);
                            
                        shape.bindPopup(`<strong>${layer.name}</strong><br>${layer.description || ''}`);
                    }
                });
            } else {
                // Fallback to dummy data if DB is empty
                var destinations = [
                    { name: "Taman Nasional Komodo", lat: -8.5397, lng: 119.4806, status: "Aman" },
                    { name: "Kepulauan Raja Ampat", lat: -0.2306, lng: 130.5186, status: "Aman" },
                    { name: "Gunung Bromo", lat: -7.9425, lng: 112.9530, status: "Waspada" }
                ];

                destinations.forEach(function(dest) {
                    var marker = L.marker([dest.lat, dest.lng]).addTo(map);
                    var statusColor = dest.status === 'Aman' ? '#10b981' : (dest.status === 'Waspada' ? '#f59e0b' : '#ef4444');
                    var popupContent = `
                        <div style="font-family: 'Inter', sans-serif;">
                            <h4 style="margin: 0 0 5px 0; font-weight: 700;">${dest.name}</h4>
                            <p style="margin: 0; font-size: 0.9rem;">
                                Status Lingkungan: <strong style="color: ${statusColor};">${dest.status}</strong>
                            </p>
                        </div>
                    `;
                    marker.bindPopup(popupContent);
                });
            }
        });
    </script>
</body>
</html>
