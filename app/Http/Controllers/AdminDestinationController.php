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
            'environment_status' => 'required|in:ramah_lingkungan,waspada,bahaya',
            'map_layers_data' => 'nullable|string',
            'bmkg_adm4' => 'nullable|string|max:50',
            'image_url' => 'nullable|url'
        ]);

        $dest = Destination::create([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'category' => $validated['category'],
            'environment_status' => $validated['environment_status'],
            'bmkg_adm4' => $validated['bmkg_adm4'] ?? null,
            'image_url' => $validated['image_url'] ?? null,
        ]);

        if (!empty($validated['map_layers_data'])) {
            $layers = json_decode($validated['map_layers_data'], true);
            if (is_array($layers)) {
                foreach ($layers as $layerData) {
                    \App\Models\MapLayer::create([
                        'destination_id' => $dest->id,
                        'name' => $validated['name'],
                        'description' => $validated['description'],
                        'layer_type' => $layerData['type'] ?? 'marker',
                        'coordinates' => is_array($layerData['coordinates']) ? json_encode($layerData['coordinates']) : $layerData['coordinates'],
                        'is_visible' => true,
                        'created_by' => auth()->id() ?? 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit(Destination $destination)
    {
        $mapLayers = \App\Models\MapLayer::where('destination_id', $destination->id)->get();
        if ($mapLayers->count() > 0) {
            $destination->description = $mapLayers->first()->description;
            $destination->map_layers_data = $mapLayers->map(function($layer) {
                return [
                    'type' => $layer->layer_type,
                    'coordinates' => is_string($layer->coordinates) ? json_decode($layer->coordinates, true) : $layer->coordinates
                ];
            })->toJson();
        } else {
            $destination->map_layers_data = '[]';
        }
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|in:darat,laut',
            'environment_status' => 'required|in:ramah_lingkungan,waspada,bahaya',
            'map_layers_data' => 'nullable|string',
            'bmkg_adm4' => 'nullable|string|max:50',
            'image_url' => 'nullable|url'
        ]);

        $destination->update([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'category' => $validated['category'],
            'environment_status' => $validated['environment_status'],
            'bmkg_adm4' => $validated['bmkg_adm4'] ?? null,
            'image_url' => $validated['image_url'] ?? null,
        ]);

        if (!empty($validated['map_layers_data'])) {
            \App\Models\MapLayer::where('destination_id', $destination->id)->delete();
            $layers = json_decode($validated['map_layers_data'], true);
            if (is_array($layers)) {
                foreach ($layers as $layerData) {
                    \App\Models\MapLayer::create([
                        'destination_id' => $destination->id,
                        'name' => $validated['name'],
                        'description' => $validated['description'],
                        'layer_type' => $layerData['type'] ?? 'marker',
                        'coordinates' => is_array($layerData['coordinates']) ? json_encode($layerData['coordinates']) : $layerData['coordinates'],
                        'is_visible' => true,
                        'created_by' => auth()->id() ?? 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.destinations.index')->with('success', 'Data destinasi berhasil diperbarui!');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}
