<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin GreenTour</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #15803d; --bg: #f1f5f9; --text: #334155; --sidebar: #0f172a; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { display: flex; min-height: 100vh; background-color: var(--bg); color: var(--text); }
        .sidebar { width: 250px; background: var(--sidebar); color: white; padding: 1.5rem 1rem; display: flex; flex-direction: column; }
        .sidebar .logo { font-size: 1.5rem; font-weight: 800; color: #22c55e; margin-bottom: 2rem; text-align: center; }
        .sidebar a { color: #cbd5e1; text-decoration: none; padding: 0.8rem 1rem; border-radius: 8px; margin-bottom: 0.5rem; display: block; transition: 0.2s; font-weight: 500; }
        .sidebar a:hover, .sidebar a.active { background: #1e293b; color: white; }
        .sidebar a i { width: 25px; }
        .content { flex: 1; padding: 2rem; overflow-y: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; background: white; padding: 1rem 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .card { background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); margin-bottom: 1.5rem; }
        .btn { background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; border: none; cursor: pointer; font-weight: 500; }
        .btn-danger { background: #ef4444; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { text-align: left; padding: 1rem; border-bottom: 1px solid #e2e8f0; }
        th { background: #f8fafc; font-weight: 600; color: #475569; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo"><i class="fa-solid fa-leaf"></i> AdminTour</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
        <a href="{{ route('admin.destinations.index') }}" class="{{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}"><i class="fa-solid fa-map-location-dot"></i> Kelola Destinasi</a>
        <a href="{{ route('admin.environment.index') }}" class="{{ request()->routeIs('admin.environment.*') ? 'active' : '' }}"><i class="fa-solid fa-leaf"></i> Data Lingkungan</a>
        <a href="/" style="margin-top: auto;"><i class="fa-solid fa-arrow-left"></i> Kembali ke Web</a>
    </div>
    
    <div class="content">
        <div class="header">
            <h2>@yield('title')</h2>
            <div>
                <span style="margin-right: 15px; font-weight: 500;">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:#ef4444; font-weight:600; cursor:pointer;">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
