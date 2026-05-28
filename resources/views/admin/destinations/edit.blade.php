@extends('admin.layout')

@section('title', 'Edit Destinasi')

@section('content')
    <div class="card" style="max-width: 800px;">
        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 1rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Nama Destinasi</label>
                <input type="text" name="name" value="{{ $destination->name }}" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
            </div>
            <div style="margin-bottom: 1rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Deskripsi</label>
                <textarea name="description" required rows="4" style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">{{ $destination->description }}</textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Lokasi (Kota/Kabupaten)</label>
                    <input type="text" name="location" value="{{ $destination->location }}" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Kategori Ekosistem</label>
                    <select name="category" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                        <option value="darat" {{ $destination->category == 'darat' ? 'selected' : '' }}>Darat (Hutan, Gunung, dll)</option>
                        <option value="laut" {{ $destination->category == 'laut' ? 'selected' : '' }}>Laut (Pantai, Pulau, dll)</option>
                    </select>
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Latitude</label>
                    <input type="number" step="any" name="lat" value="{{ $destination->lat }}" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Longitude</label>
                    <input type="number" step="any" name="lng" value="{{ $destination->lng }}" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Kode BMKG ADM4</label>
                    <input type="text" name="bmkg_adm4" value="{{ $destination->bmkg_adm4 }}" placeholder="Contoh: 31.71.03.1001" style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Status Default</label>
                    <select name="status" required style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
                        <option value="ramah_lingkungan" {{ $destination->status == 'ramah_lingkungan' ? 'selected' : '' }}>Ramah Lingkungan</option>
                        <option value="waspada" {{ $destination->status == 'waspada' ? 'selected' : '' }}>Waspada</option>
                        <option value="bahaya" {{ $destination->status == 'bahaya' ? 'selected' : '' }}>Bahaya</option>
                    </select>
                </div>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label style="display:block; margin-bottom:0.5rem; font-weight:600;">URL Gambar</label>
                <input type="url" name="image_url" value="{{ $destination->image_url }}" placeholder="https://..." style="width:100%; padding:0.8rem; border:1px solid #cbd5e1; border-radius:6px;">
            </div>
            <button type="submit" class="btn"><i class="fa-solid fa-save"></i> Perbarui Destinasi</button>
            <a href="{{ route('admin.destinations.index') }}" class="btn" style="background:#64748b; margin-left:10px;">Batal</a>
        </form>
    </div>
@endsection
