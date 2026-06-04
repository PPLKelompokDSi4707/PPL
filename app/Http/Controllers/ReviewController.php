<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $destination_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000'
        ]);

        $badWords = ['bodoh', 'jelek', 'goblok', 'spam', 'anjing', 'babi'];
        $comment = strtolower($request->comment);
        
        foreach ($badWords as $word) {
            if (strpos($comment, $word) !== false) {
                return back()->with('error', 'Ulasan Anda mengandung kata-kata yang tidak pantas dan gagal disimpan.');
            }
        }

        Review::create([
            'user_id' => Auth::id(),
            'destination_id' => $destination_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Ulasan Anda berhasil ditambahkan!');
    }
}
