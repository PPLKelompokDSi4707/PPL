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

        // Pencarian (FR02)
        $query = Destination::query();

        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('location', 'LIKE', "%{$keyword}%");
            });
        }

        $destinations = $query->get();

        // Kita juga mem-passing data mapLayers terkait destinasi yang dicari agar peta bisa terupdate
        $destinationIds = $destinations->pluck('id')->toArray();
        $mapLayers = MapLayer::whereIn('destination_id', $destinationIds)
                        ->where('is_visible', true)
                        ->get();

        return view('search_results', compact('destinations', 'keyword', 'mapLayers'));
    }
}
