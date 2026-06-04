@extends('admin.layout')

@section('title', 'Dashboard Monitoring (FR14)')

@section('content')
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 2rem;">
        <div class="card" style="border-left: 4px solid #3b82f6;">
            <h3 style="color: #64748b; font-size: 0.9rem; margin-bottom: 0.5rem;">Total Wisatawan</h3>
            <div style="font-size: 2rem; font-weight: 700; color: #0f172a;">{{ $stats['total_users'] }}</div>
        </div>
        <div class="card" style="border-left: 4px solid #22c55e;">
            <h3 style="color: #64748b; font-size: 0.9rem; margin-bottom: 0.5rem;">Total Destinasi Wisata</h3>
            <div style="font-size: 2rem; font-weight: 700; color: #0f172a;">{{ $stats['total_destinations'] }}</div>
        </div>
        <div class="card" style="border-left: 4px solid #f59e0b;">
            <h3 style="color: #64748b; font-size: 0.9rem; margin-bottom: 0.5rem;">Total Ulasan Masuk</h3>
            <div style="font-size: 2rem; font-weight: 700; color: #0f172a;">{{ $stats['total_reviews'] }}</div>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 1rem;">Selamat Datang di Panel Admin GreenTour</h3>
        <p style="color: #475569; line-height: 1.6;">
            Dari panel ini, Anda dapat memantau statistik platform (FR14), serta mengelola seluruh data destinasi wisata (FR12) dan manajemen data lingkungan terkait. Gunakan menu di sebelah kiri untuk menavigasi modul yang tersedia.
        </p>
    </div>

    <!-- Grafik / Chart Area -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1.5rem;">
        <div class="card">
            <h3 style="margin-bottom: 1rem; color: #334155; font-size: 1.1rem; text-align: center;">Distribusi Kategori Destinasi</h3>
            <canvas id="categoryChart" style="max-height: 300px;"></canvas>
        </div>
        <div class="card">
            <h3 style="margin-bottom: 1rem; color: #334155; font-size: 1.1rem; text-align: center;">Status Keamanan Ekosistem</h3>
            <canvas id="statusChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart Kategori
        const ctxCat = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctxCat, {
            type: 'doughnut',
            data: {
                labels: ['Darat (Hutan/Gunung)', 'Laut (Pantai/Pulau)'],
                datasets: [{
                    data: [{{ $chartCategory['darat'] }}, {{ $chartCategory['laut'] }}],
                    backgroundColor: ['#16a34a', '#0284c7'],
                    hoverOffset: 4
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Chart Status
        const ctxStatus = document.getElementById('statusChart').getContext('2d');
        new Chart(ctxStatus, {
            type: 'pie',
            data: {
                labels: ['Ramah Lingkungan', 'Waspada', 'Bahaya'],
                datasets: [{
                    data: [{{ $chartStatus['ramah'] }}, {{ $chartStatus['waspada'] }}, {{ $chartStatus['bahaya'] }}],
                    backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                    hoverOffset: 4
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    </script>
@endsection
