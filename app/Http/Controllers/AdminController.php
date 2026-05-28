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

        return view('admin.dashboard', compact('stats'));
    }
}
