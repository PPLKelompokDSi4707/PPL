<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - GreenTour</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .star-rating { display: flex; flex-direction: row-reverse; justify-content: flex-end; gap: 0.2rem; }
        .star-rating input[type="radio"] { display: none; }
        .star-rating label { font-size: 2rem; color: #cbd5e1; cursor: pointer; transition: color 0.2s; margin: 0; }
        .star-rating label:hover, .star-rating label:hover ~ label { color: #fcd34d !important; }
        .star-rating input[type="radio"]:checked ~ label, .star-rating input[type="radio"]:checked + label { color: #fbbf24; }
    </style>
    
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
        
        .hero { width: 100%; height: 400px; position: relative; }
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

    @include('partials.navbar')

    <div class="hero" style="background: url('{{ $destination->image_url ?: 'https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=2000&auto=format&fit=crop' }}') center/cover;">
        <div class="hero-overlay">
            <div class="hero-content" style="width: 100%; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <h1>{{ $destination->name }}</h1>
                    <p><i class="fa-solid fa-location-dot"></i> {{ $destination->location }}</p>
                </div>
                
                <div>
                    @auth
                    <form action="{{ route('bookmarks.toggle', $destination->id) }}" method="POST">
                        @csrf
                        <button type="submit" style="background: {{ $isBookmarked ? 'var(--primary)' : 'rgba(255,255,255,0.2)' }}; color: white; border: 2px solid {{ $isBookmarked ? 'var(--primary)' : 'white' }}; padding: 10px 20px; border-radius: 50px; cursor: pointer; font-size: 1rem; font-weight: 600; display: flex; align-items: center; gap: 8px; transition: all 0.3s; backdrop-filter: blur(5px);">
                            <i class="{{ $isBookmarked ? 'fa-solid' : 'fa-regular' }} fa-bookmark"></i>
                            {{ $isBookmarked ? 'Tersimpan' : 'Simpan Destinasi' }}
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" style="text-decoration: none; background: rgba(255,255,255,0.2); color: white; border: 2px solid white; padding: 10px 20px; border-radius: 50px; display: inline-flex; align-items: center; gap: 8px; font-size: 1rem; font-weight: 600; backdrop-filter: blur(5px); transition: all 0.3s;">
                        <i class="fa-regular fa-bookmark"></i>
                        Simpan Destinasi
                    </a>
                    @endauth
                </div>
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

            <!-- FR09: Visualisasi Data Lingkungan -->
            <div class="card">
                <h2><i class="fa-solid fa-chart-column"></i> Visualisasi Data Lingkungan (FR09)</h2>
                <p class="desc-text">Representasi grafis dari metrik iklim dan tutupan ekosistem di lokasi ini.</p>
                
                <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    @if($destination->biotaData && $destination->biotaData->forest_cover_pct)
                    <div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-weight: 600; color: #475569; font-size: 0.95rem;">
                            <span><i class="fa-solid fa-tree" style="color: #16a34a;"></i> Tutupan Hutan (Forest Cover)</span>
                            <span>{{ $destination->biotaData->forest_cover_pct }}%</span>
                        </div>
                        <div style="width: 100%; background-color: #e2e8f0; border-radius: 50px; height: 16px; overflow: hidden;">
                            <div style="width: {{ $destination->biotaData->forest_cover_pct }}%; background-color: #22c55e; height: 100%; border-radius: 50px; transition: width 1s ease-in-out;"></div>
                        </div>
                    </div>
                    @endif

                    @if($destination->biotaData && $destination->biotaData->coral_coverage_pct)
                    <div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-weight: 600; color: #475569; font-size: 0.95rem;">
                            <span><i class="fa-solid fa-water" style="color: #0284c7;"></i> Tutupan Terumbu Karang (Coral Cover)</span>
                            <span>{{ $destination->biotaData->coral_coverage_pct }}%</span>
                        </div>
                        <div style="width: 100%; background-color: #e2e8f0; border-radius: 50px; height: 16px; overflow: hidden;">
                            <div style="width: {{ $destination->biotaData->coral_coverage_pct }}%; background-color: #38bdf8; height: 100%; border-radius: 50px; transition: width 1s ease-in-out;"></div>
                        </div>
                    </div>
                    @endif

                    @if(isset($weatherData['data'][0]['cuaca'][0][0]))
                    <div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-weight: 600; color: #475569; font-size: 0.95rem;">
                            <span><i class="fa-solid fa-droplet" style="color: #6366f1;"></i> Kelembapan Udara (RH)</span>
                            <span>{{ $weatherData['data'][0]['cuaca'][0][0]['hu'] }}%</span>
                        </div>
                        <div style="width: 100%; background-color: #e2e8f0; border-radius: 50px; height: 16px; overflow: hidden;">
                            <div style="width: {{ $weatherData['data'][0]['cuaca'][0][0]['hu'] }}%; background-color: #818cf8; height: 100%; border-radius: 50px; transition: width 1s ease-in-out;"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if((!$destination->biotaData || (!$destination->biotaData->forest_cover_pct && !$destination->biotaData->coral_coverage_pct)) && !isset($weatherData['data'][0]['cuaca'][0][0]))
                        <p style="color: #64748b; font-size: 0.95rem; text-align: center; padding: 1rem 0;">Belum ada metrik lingkungan yang bisa divisualisasikan.</p>
                    @endif
                    
                </div>
            </div>

            <!-- FR11: Sistem Review dan Rating -->
            <div class="card" style="margin-top: 2rem;">
                <h2><i class="fa-solid fa-star" style="color: #fbbf24;"></i> Ulasan & Penilaian (FR11)</h2>
                <p class="desc-text">Bagaimana pengalaman Anda atau orang lain tentang wisata ini?</p>

                <!-- Menampilkan Pesan Error/Sukses -->
                @if(session('success'))
                    <div style="background-color: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-top: 1rem; border: 1px solid #bbf7d0;">
                        <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-top: 1rem; border: 1px solid #fecaca;">
                        <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
                    </div>
                @endif
                @error('rating')
                    <div style="color: #e11d48; margin-top: 0.5rem; font-size: 0.9rem;">{{ $message }}</div>
                @enderror
                @error('comment')
                    <div style="color: #e11d48; margin-top: 0.5rem; font-size: 0.9rem;">{{ $message }}</div>
                @enderror

                <!-- Form Tambah Ulasan -->
                <div style="margin-top: 1.5rem; background-color: #f8fafc; padding: 1.5rem; border-radius: 12px; border: 1px solid #e2e8f0;">
                    @auth
                        <form action="{{ route('reviews.store', $destination->id) }}" method="POST">
                            @csrf
                            <div style="margin-bottom: 1rem;">
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #475569;">Beri Penilaian (1-5 Bintang)</label>
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5" required />
                                    <label for="star5" title="5 Bintang"><i class="fa-solid fa-star"></i></label>
                                    
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="4 Bintang"><i class="fa-solid fa-star"></i></label>
                                    
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="3 Bintang"><i class="fa-solid fa-star"></i></label>
                                    
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="2 Bintang"><i class="fa-solid fa-star"></i></label>
                                    
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="1 Bintang"><i class="fa-solid fa-star"></i></label>
                                </div>
                            </div>
                            <div style="margin-bottom: 1rem;">
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #475569;">Tulis Ulasan</label>
                                <textarea name="comment" required rows="4" placeholder="Bagaimana kondisi lingkungan dan fasilitas di sini?" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid #cbd5e1; resize: vertical;"></textarea>
                            </div>
                            <button type="submit" style="background: var(--primary); color: white; padding: 0.8rem 1.5rem; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.2s;">Kirim Ulasan</button>
                        </form>
                    @else
                        <div style="text-align: center; padding: 1rem 0;">
                            <p style="color: #64748b; margin-bottom: 1rem;">Anda harus masuk ke akun untuk memberikan ulasan.</p>
                            <a href="{{ route('login') }}" style="background: var(--primary); color: white; padding: 0.8rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Masuk untuk Mengulas</a>
                        </div>
                    @endauth
                </div>

                <!-- Daftar Ulasan -->
                <div style="margin-top: 2rem;">
                    <h3 style="color: #334155; font-size: 1.1rem; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">Ulasan Wisatawan ({{ $destination->reviews->count() }})</h3>
                    
                    @if($destination->reviews->count() > 0)
                        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                            @foreach($destination->reviews()->latest()->get() as $review)
                                <div style="border-bottom: 1px solid #f1f5f9; padding-bottom: 1.5rem;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
                                        <div style="font-weight: 600; color: #0f172a;">{{ $review->user->name }}</div>
                                        <div style="color: #fbbf24; font-size: 0.9rem;">
                                            @for($i = 0; $i < $review->rating; $i++)
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                            @for($i = $review->rating; $i < 5; $i++)
                                                <i class="fa-regular fa-star" style="color: #cbd5e1;"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div style="color: #64748b; font-size: 0.85rem; margin-bottom: 0.5rem;">{{ $review->created_at->diffForHumans() }}</div>
                                    <p style="color: #475569; line-height: 1.6;">{{ $review->comment }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: #94a3b8; text-align: center; padding: 2rem 0; font-style: italic;">Belum ada ulasan untuk destinasi ini. Jadilah yang pertama!</p>
                    @endif
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
