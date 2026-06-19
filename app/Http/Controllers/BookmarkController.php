<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())
            ->with(['destination.biotaData'])
            ->latest()
            ->get();

        return view('bookmarks.index', compact('bookmarks'));
    }

    public function toggle($id)
    {
        $destination = Destination::findOrFail($id);
        $user = Auth::user();

        $bookmark = Bookmark::where('user_id', $user->id)
                            ->where('destination_id', $destination->id)
                            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return back()->with('success', 'Destinasi dihapus dari bookmark.');
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'destination_id' => $destination->id
            ]);
            return back()->with('success', 'Destinasi berhasil disimpan ke bookmark.');
        }
    }
}
