<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Destination;
use App\Models\Review;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::where('role', 'wisatawan')->count(),
            'total_destinations' => Destination::count(),
            'total_reviews' => Review::count(),
        ];

        // Chart Data: Kategori (Darat vs Laut)
        $chartCategory = [
            'darat' => Destination::where('category', 'darat')->count(),
            'laut' => Destination::where('category', 'laut')->count(),
        ];

        // Chart Data: Status Lingkungan
        $chartStatus = [
            'ramah' => Destination::where('environment_status', 'ramah_lingkungan')->count(),
            'waspada' => Destination::where('environment_status', 'waspada')->count(),
            'bahaya' => Destination::where('environment_status', 'bahaya')->count(),
        ];

        return view('admin.dashboard', compact('stats', 'chartCategory', 'chartStatus'));
    }
}
