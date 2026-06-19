<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Saya - GreenTour Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
            padding: 3rem 5%;
            max-width: 1300px;
            margin: 0 auto;
            width: 100%;
        }

        .header {
            margin-bottom: 2.5rem;
            animation: fadeIn 0.8s ease;
        }

        .header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-main);
        }

        .header h1 i {
            color: var(--primary);
        }

        .header p {
            color: var(--text-muted);
            font-size: 1.05rem;
        }

        /* Success Message styling */
        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 1px solid #bbf7d0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            animation: slideDown 0.4s ease;
        }

        /* Dest Grid */
        .dest-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            animation: fadeIn 1s ease;
        }

        .dest-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .dest-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }

        .dest-img-container {
            position: relative;
            height: 200px;
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

        /* Bookmark Remove Button */
        .remove-bookmark-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--danger);
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            z-index: 10;
        }

        .remove-bookmark-btn:hover {
            background: var(--danger);
            color: white;
            transform: scale(1.1);
        }

        .dest-info {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 0.8rem;
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

        .dest-title {
            font-size: 1.25rem;
            font-weight: 750;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .dest-location {
            color: var(--text-muted);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-bottom: 1.2rem;
        }

        .card-actions {
            margin-top: auto;
            display: flex;
            gap: 10px;
        }

        .btn-outline {
            flex: 1;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 0.65rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .btn-danger-outline {
            border: 2px solid #ef4444;
            color: #ef4444;
            background: transparent;
            padding: 0.65rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .btn-danger-outline:hover {
            background: #ef4444;
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
            max-width: 600px;
            margin: 2rem auto;
            animation: fadeIn 1s ease;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1.5rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-main);
        }

        .empty-state p {
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.5;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            background: #166534;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(21, 128, 61, 0.2);
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 2.5rem 5%;
            text-align: center;
            border-top: 1px solid #1e293b;
            margin-top: auto;
        }

        footer p {
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        
        footer .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            color: white;
            font-size: 1.25rem;
            font-weight: 800;
            text-decoration: none;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 640px) {
            .container { padding: 2rem 5%; }
            .dest-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <div class="container">
        <div class="header">
            <h1><i class="fa-solid fa-bookmark"></i> Bookmark Saya</h1>
            <p>Daftar destinasi wisata berkelanjutan favorit yang telah Anda simpan.</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($bookmarks->count() > 0)
            <div class="dest-grid">
                @foreach($bookmarks as $bookmark)
                    @php
                        $dest = $bookmark->destination;
                    @endphp
                    @if($dest)
                        <div class="dest-card">
                            <div class="dest-img-container">
                                <img src="{{ $dest->image_url ?: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $dest->name }}" class="dest-img">
                                <form action="{{ route('bookmarks.toggle', $dest->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="remove-bookmark-btn" title="Hapus dari Bookmark">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="dest-info">
                                <div class="tags">
                                    @if($dest->environment_status === 'aman' || $dest->environment_status === 'ramah_lingkungan')
                                        <span class="tag safe"><i class="fa-solid fa-circle-check"></i> Aman</span>
                                    @elseif($dest->environment_status === 'waspada')
                                        <span class="tag warning"><i class="fa-solid fa-triangle-exclamation"></i> Waspada</span>
                                    @else
                                        <span class="tag danger"><i class="fa-solid fa-triangle-exclamation"></i> Bahaya</span>
                                    @endif
                                    
                                    @if($dest->category)
                                        <span class="tag category"><i class="fa-solid fa-leaf"></i> {{ ucwords($dest->category) }}</span>
                                    @endif
                                </div>
                                
                                <h3 class="dest-title">{{ $dest->name }}</h3>
                                <div class="dest-location">
                                    <i class="fa-solid fa-location-dot"></i> {{ $dest->location }}
                                </div>
                                
                                <div class="card-actions">
                                    <a href="{{ route('destinations.detail', $dest->id) }}" class="btn-outline">Detail Lokasi</a>
                                    <form action="{{ route('bookmarks.toggle', $dest->id) }}" method="POST" style="flex: 1; display: flex;">
                                        @csrf
                                        <button type="submit" class="btn-danger-outline" style="width: 100%;">
                                            <i class="fa-solid fa-trash-can"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fa-regular fa-folder-open"></i>
                <h3>Belum ada destinasi favorit</h3>
                <p>Jelajahi berbagai destinasi wisata ramah lingkungan di Indonesia dan simpan ke daftar favorit Anda dengan menekan tombol simpan.</p>
                <a href="/" class="btn-primary">
                    <i class="fa-solid fa-compass"></i> Eksplorasi Destinasi
                </a>
            </div>
        @endif
    </div>

    <footer>
        <a href="/" class="logo"><i class="fa-solid fa-leaf"></i> GreenTour Indonesia</a>
        <p>&copy; 2026 GreenTour Indonesia. Aplikasi pemetaan pariwisata yang mendukung Sustainable Development Goals.</p>
    </footer>

</body>
</html>
