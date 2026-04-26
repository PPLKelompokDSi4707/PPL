<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    // GET semua data
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Destination::all()
        ]);
    }

    // GET 1 data
    public function show($id)
    {
        $data = Destination::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    // POST (tambah data)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $destination = Destination::create($data);

        return response()->json($destination, 201);
    }

    // PUT (update)
    public function update(Request $request, $id)
    {
        $data = Destination::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $data = Destination::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}