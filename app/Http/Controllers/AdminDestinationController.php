<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class AdminDestinationController extends Controller
{
    public function index()
    {
        return view('admin.destinations.index');
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|in:darat,laut',
            'status' => 'required|in:ramah_lingkungan,waspada,bahaya',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'bmkg_adm4' => 'nullable|string|max:50',
            'image_url' => 'nullable|url'
        ]);

        Destination::create($validated);
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|in:darat,laut',
            'status' => 'required|in:ramah_lingkungan,waspada,bahaya',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'bmkg_adm4' => 'nullable|string|max:50',
            'image_url' => 'nullable|url'
        ]);

        $destination->update($validated);
        return redirect()->route('admin.destinations.index')->with('success', 'Data destinasi berhasil diperbarui!');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}
