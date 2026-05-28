<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\MapLayer;

class DestinationController extends Controller
{
    public function index()
    {
        $mapLayers = \App\Models\MapLayer::with('destination')->where('is_visible', true)->get();
        
        // FR08: Rekomendasi Destinasi Ramah Lingkungan
        // Mengambil destinasi dengan ekosistem terbaik (tutupan hutan tinggi atau karang sangat baik)
        $recommendations = Destination::with('biotaData')
            ->whereHas('biotaData', function ($query) {
                $query->where('forest_cover_pct', '>=', 70)
                      ->orWhereIn('coral_reef_status', ['sangat_baik', 'baik']);
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('landing', compact('mapLayers', 'recommendations'));
    }

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
        $destination = Destination::with(['mapLayers', 'biotaData', 'reviews.user'])->findOrFail($id);

        // FR05: Integrasi Data Iklim (BMKG API)
        $bmkgCode = $destination->bmkg_adm4 ?? '31.71.03.1001'; // Fallback ke Kemayoran jika kosong
        $weatherData = null;
        try {
            $response = \Illuminate\Support\Facades\Http::timeout(5)->get('https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4=' . $bmkgCode);
            if ($response->successful()) {
                $weatherData = $response->json();
            }
        } catch (\Exception $e) {
            // Fallback gracefully on timeout or error
        }

        // FR07: Analisis Kelayakan Destinasi
        $score = 0; // 0: Aman, 1: Waspada, 2: Bahaya
        $reasons = [];

        if (isset($weatherData['data'][0]['cuaca'][0][0])) {
            $cuaca = $weatherData['data'][0]['cuaca'][0][0];
            $badWeather = ['Hujan Sedang', 'Hujan Lebat', 'Hujan Petir', 'Angin Kencang'];
            if (in_array($cuaca['weather_desc'], $badWeather) || $cuaca['ws'] > 30) {
                $score += 2;
                $reasons[] = "Cuaca diprakirakan " . strtolower($cuaca['weather_desc']) . " atau angin kencang.";
            } elseif (str_contains($cuaca['weather_desc'], 'Hujan')) {
                $score += 1;
                $reasons[] = "Cuaca diprakirakan berpotensi hujan.";
            }
        }

        if ($destination->biotaData) {
            $biota = $destination->biotaData;
            if (in_array($biota->coral_reef_status, ['kritis', 'rusak'])) {
                $score += 1;
                $reasons[] = "Ekosistem laut/terumbu karang sedang dalam kondisi rentan.";
            }
            if ($biota->forest_cover_pct !== null && $biota->forest_cover_pct < 30) {
                $score += 1;
                $reasons[] = "Tutupan hutan rendah, rawan terjadi erosi/longsor jika hujan.";
            }
            if ($biota->invasive_species !== null) {
                $score += 1;
                $reasons[] = "Terdeteksi adanya spesies invasif di area ekosistem.";
            }
        }

        $kelayakanStatus = 'Aman';
        $kelayakanClass = 'status-aman';
        if ($score >= 2) {
            $kelayakanStatus = 'Bahaya';
            $kelayakanClass = 'status-bahaya';
        } elseif ($score == 1) {
            $kelayakanStatus = 'Waspada';
            $kelayakanClass = 'status-waspada';
        }
        
        $kelayakan = [
            'status' => $kelayakanStatus,
            'class' => $kelayakanClass,
            'reasons' => $reasons
        ];

        $isBookmarked = false;
        if (auth()->check()) {
            $isBookmarked = \App\Models\Bookmark::where('user_id', auth()->id())
                                ->where('destination_id', $destination->id)
                                ->exists();
        }

        return view('destinations.show', compact('destination', 'weatherData', 'kelayakan', 'isBookmarked'));
    }
}
