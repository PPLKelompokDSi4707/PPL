@extends('admin.layout')

@section('title', 'Manajemen Destinasi (FR12)')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3 style="margin: 0;">Daftar Destinasi Wisata</h3>
            <a href="{{ route('admin.destinations.create') }}" class="btn"><i class="fa-solid fa-plus"></i> Tambah Destinasi Baru</a>
        </div>
        
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Destinasi</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Destination::latest()->get() as $dest)
                <tr>
                    <td>#{{ $dest->id }}</td>
                    <td style="font-weight: 600;">{{ $dest->name }}</td>
                    <td><span style="background: #e2e8f0; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">{{ ucfirst($dest->category) }}</span></td>
                    <td>{{ $dest->location }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('destinations.detail', $dest->id) }}" target="_blank" class="btn" style="background: #3b82f6; font-size: 0.85rem; text-decoration:none;"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.destinations.edit', $dest->id) }}" class="btn" style="background: #f59e0b; font-size: 0.85rem; text-decoration:none;"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.destinations.destroy', $dest->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus destinasi ini?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="font-size: 0.85rem;"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
