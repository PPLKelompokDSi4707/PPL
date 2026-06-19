<nav style="display: flex; justify-content: space-between; align-items: center; background: white; padding: 15px 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 100;">
    <a href="/" class="logo" style="font-size: 1.5rem; font-weight: 800; color: var(--primary); text-decoration: none;"><i class="fa-solid fa-leaf"></i> GreenTour</a>
    
    <div style="display: flex; gap: 15px; align-items: center;">
        @if(!request()->routeIs('landing'))
            <a href="{{ request()->routeIs('destinations.show') ? 'javascript:history.back()' : '/' }}" style="border: 1px solid var(--primary); color: var(--primary); padding: 6px 12px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.9rem;">Kembali</a>
        @endif

        @auth
            @php
                // Logika FR15: Notifikasi Lingkungan
                // Mengambil destinasi favorit pengguna yang sedang dalam status Waspada / Bahaya
                $alerts = \App\Models\Bookmark::where('user_id', Auth::id())
                    ->with('destination')
                    ->whereHas('destination', function($q) {
                        $q->whereIn('environment_status', ['waspada', 'bahaya']);
                    })->get();
            @endphp

            @if($alerts->count() > 0)
                <div style="position: relative; margin-right: 15px; cursor: pointer;" onclick="document.getElementById('notifDropdown').style.display = document.getElementById('notifDropdown').style.display === 'block' ? 'none' : 'block'">
                    <i class="fa-solid fa-bell" style="font-size: 1.2rem; color: #64748b;"></i>
                    <span style="position: absolute; top: -5px; right: -8px; background: #ef4444; color: white; border-radius: 50%; font-size: 0.7rem; padding: 2px 6px; font-weight: bold;">{{ $alerts->count() }}</span>
                    
                    <!-- Dropdown Notifikasi -->
                    <div id="notifDropdown" style="display: none; position: absolute; right: 0; top: 35px; width: 300px; background: white; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); padding: 1rem; z-index: 200;">
                        <h4 style="margin-bottom: 0.8rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 0.5rem; color: #334155;"><i class="fa-solid fa-triangle-exclamation" style="color: #f59e0b;"></i> Peringatan Lingkungan</h4>
                        @foreach($alerts as $alert)
                            <div style="margin-bottom: 0.8rem; font-size: 0.85rem; line-height: 1.4;">
                                <strong style="color: #0f172a;">{{ $alert->destination->name }}</strong>
                                <span style="display:inline-block; padding:2px 6px; border-radius:4px; font-size:0.7rem; font-weight:bold; color:white; background: {{ $alert->destination->environment_status === 'bahaya' ? '#ef4444' : '#f59e0b' }};">
                                    {{ strtoupper($alert->destination->environment_status) }}
                                </span>
                                <div style="color: #64748b; margin-top: 3px;">Kondisi lingkungan saat ini kurang ideal untuk dikunjungi.</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div style="position: relative; margin-right: 15px; cursor: pointer;">
                    <i class="fa-regular fa-bell" style="font-size: 1.2rem; color: #94a3b8;"></i>
                </div>
            @endif

            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin')
                <a href="{{ route('admin.dashboard') }}" style="background:var(--primary); color:white; padding:6px 12px; border-radius:6px; text-decoration:none; font-weight:600; font-size: 0.9rem; margin-right: 10px;"><i class="fa-solid fa-gauge"></i> Panel Admin</a>
            @endif
            <a href="{{ route('bookmarks.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 600; margin-right: 15px; display: inline-flex; align-items: center; gap: 5px;">
                <i class="fa-solid fa-bookmark"></i> Bookmark
            </a>
            <span style="font-weight: 500; margin-right: 10px;">Halo, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:var(--primary); font-weight:600; cursor:pointer;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="color: var(--primary); text-decoration: none; font-weight: 600; margin-right: 10px;">Masuk</a>
            <a href="{{ route('register') }}" style="background: var(--primary); color: white; padding: 8px 15px; border-radius: 8px; text-decoration: none; font-weight: 600;">Daftar</a>
        @endauth
    </div>
</nav>
