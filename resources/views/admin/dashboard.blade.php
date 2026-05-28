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
        <h3>Selamat Datang di Panel Admin GreenTour</h3>
        <p style="margin-top: 1rem; color: #475569; line-height: 1.6;">
            Dari panel ini, Anda dapat memantau statistik platform (FR14), serta mengelola seluruh data destinasi wisata (FR12) dan manajemen data lingkungan terkait. Gunakan menu di sebelah kiri untuk menavigasi modul yang tersedia.
        </p>
    </div>
@endsection
