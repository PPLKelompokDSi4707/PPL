<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\BiotaData;
use Illuminate\Http\Request;

class AdminEnvironmentController extends Controller
{
    public function index()
    {
        // Load destinations with their biota data
        $destinations = Destination::with('biotaData')->latest()->get();
        return view('admin.environment.index', compact('destinations'));
    }

    public function edit(Destination $destination)
    {
        $destination->load('biotaData');
        return view('admin.environment.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'coral_coverage_pct' => 'nullable|numeric|min:0|max:100',
            'forest_cover_pct' => 'nullable|numeric|min:0|max:100',
        ]);

        // BiotaData is normally 1-to-1 with Destination. 
        if ($destination->biotaData) {
            $destination->biotaData->update($validated);
        } else {
            $destination->biotaData()->create($validated);
        }

        return redirect()->route('admin.environment.index')->with('success', 'Data lingkungan berhasil diperbarui!');
    }
}
