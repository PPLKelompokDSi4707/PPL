@extends('admin.layout')

@section('title', 'Manajemen Data Lingkungan (FR13)')

@section('content')
    <div class="card">
        <h3 style="margin-bottom: 1rem;">Status Ekosistem Destinasi</h3>
        <p style="color: #64748b; margin-bottom: 1.5rem;">Pilih destinasi untuk mengelola data lingkungan seperti Tutupan Terumbu Karang atau Luas Hutan (dalam bentuk persentase). Data ini akan divisualisasikan kepada wisatawan.</p>
        
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>Destinasi</th>
                    <th>Kategori</th>
                    <th>Tutupan Karang (%)</th>
                    <th>Tutupan Hutan (%)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destinations as $dest)
                <tr>
                    <td style="font-weight: 600;">{{ $dest->name }}</td>
                    <td><span style="background: #e2e8f0; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">{{ ucfirst($dest->category) }}</span></td>
                    <td>
                        @if($dest->biotaData && $dest->biotaData->coral_coverage_pct !== null)
                            <span style="color: #0284c7; font-weight: 600;">{{ $dest->biotaData->coral_coverage_pct }}%</span>
                        @else
                            <span style="color: #94a3b8;">-</span>
                        @endif
                    </td>
                    <td>
                        @if($dest->biotaData && $dest->biotaData->forest_cover_pct !== null)
                            <span style="color: #16a34a; font-weight: 600;">{{ $dest->biotaData->forest_cover_pct }}%</span>
                        @else
                            <span style="color: #94a3b8;">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.environment.edit', $dest->id) }}" class="btn" style="background: #3b82f6; font-size: 0.85rem; text-decoration:none;"><i class="fa-solid fa-pen"></i> Kelola Data</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
