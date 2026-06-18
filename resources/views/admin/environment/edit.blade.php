@extends('admin.layout')

@section('title', 'Kelola Data Lingkungan - ' . $destination->name)

@section('content')
    <div class="card" style="max-width: 600px;">
        <p style="color: #64748b; margin-bottom: 1.5rem;">Perbarui data ekosistem untuk <strong>{{ $destination->name }}</strong> ({{ ucfirst($destination->category) }}).</p>
        
        <form action="{{ route('admin.environment.update', $destination->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 1.5rem; background: #f0f9ff; padding: 1rem; border-radius: 8px; border: 1px solid #bae6fd;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:600; color: #0369a1;"><i class="fa-solid fa-water"></i> Persentase Tutupan Terumbu Karang</label>
                <input type="number" step="any" name="coral_coverage_pct" value="{{ $destination->biotaData->coral_coverage_pct ?? '' }}" placeholder="0 - 100" style="width:100%; padding:0.8rem; border:1px solid #7dd3fc; border-radius:6px;">
                <small style="color: #0284c7; display: block; margin-top: 0.5rem;">Kosongkan jika tidak relevan dengan destinasi darat.</small>
            </div>

            <div style="margin-bottom: 1.5rem; background: #f0fdf4; padding: 1rem; border-radius: 8px; border: 1px solid #bbf7d0;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:600; color: #15803d;"><i class="fa-solid fa-tree"></i> Persentase Tutupan Hutan / Daratan</label>
                <input type="number" step="any" name="forest_cover_pct" value="{{ $destination->biotaData->forest_cover_pct ?? '' }}" placeholder="0 - 100" style="width:100%; padding:0.8rem; border:1px solid #86efac; border-radius:6px;">
                <small style="color: #16a34a; display: block; margin-top: 0.5rem;">Kosongkan jika tidak relevan dengan destinasi laut.</small>
            </div>

            <button type="submit" class="btn" style="width: 100%; padding: 1rem; font-size: 1.1rem;"><i class="fa-solid fa-save"></i> Simpan Data Lingkungan</button>
            <div style="text-align: center; margin-top: 1rem;">
                <a href="{{ route('admin.environment.index') }}" style="color: #64748b; text-decoration: none;">Batal</a>
            </div>
        </form>
    </div>
@endsection
