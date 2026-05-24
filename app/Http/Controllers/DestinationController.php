<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\MapLayer;

class DestinationController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $kategori = $request->input('kategori');
        $status = $request->input('status');

        // Pencarian (FR02)
        $query = Destination::query();

        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('location', 'LIKE', "%{$keyword}%");
            });
        }

        // Filter Lingkungan (FR03)
        if (!empty($status)) {
            if ($status === 'aman') {
                $query->whereDoesntHave('mapLayers', function($q) {
                    $q->where('area_type', 'zona_bahaya');
                });
            } elseif ($status === 'waspada' || $status === 'bahaya') {
                $query->whereHas('mapLayers', function($q) {
                    $q->where('area_type', 'zona_bahaya');
                });
            }
        }

        if (!empty($kategori)) {
            if ($kategori === 'laut') {
                $query->where(function($q) {
                    $q->where('name', 'LIKE', "%Pantai%")
                      ->orWhere('name', 'LIKE', "%Pulau%")
                      ->orWhere('name', 'LIKE', "%Laut%");
                });
            } elseif ($kategori === 'darat') {
                $query->where(function($q) {
                    $q->where('name', 'LIKE', "%Gunung%")
                      ->orWhere('name', 'LIKE', "%Taman Nasional%")
                      ->orWhere('name', 'LIKE', "%Bukit%");
                });
            }
        }

        $destinations = $query->get();

        // Kita juga mem-passing data mapLayers terkait destinasi yang dicari agar peta bisa terupdate
        $destinationIds = $destinations->pluck('id')->toArray();
        $mapLayers = MapLayer::whereIn('destination_id', $destinationIds)
                        ->where('is_visible', true)
                        ->get();

        return view('search_results', compact('destinations', 'keyword', 'kategori', 'status', 'mapLayers'));
    }

    public function show($id)
    {
        // FR04: Detail Informasi Destinasi
        $destination = Destination::with('mapLayers')->findOrFail($id);
        return view('destinations.show', compact('destination'));
    }
}
