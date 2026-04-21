<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Models\Destination;
use Illuminate\Http\JsonResponse;

class DestinationController extends Controller
{
    /**
     * Display a listing of all destinations.
     */
    public function index(): JsonResponse
    {
        $destinations = Destination::latest()->get();

        return response()->json([
            'status'  => 'success',
            'message' => 'Destinations retrieved successfully.',
            'data'    => [
                'destinations' => $destinations,
            ],
        ]);
    }

    /**
     * Store a newly created destination in storage.
     */
    public function store(StoreDestinationRequest $request): JsonResponse
    {
        $destination = Destination::create($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Destination created successfully.',
            'data'    => [
                'destination' => $destination,
            ],
        ], 201);
    }

    /**
     * Display the specified destination.
     */
    public function show(Destination $destination): JsonResponse
    {
        return response()->json([
            'status'  => 'success',
            'message' => 'Destination retrieved successfully.',
            'data'    => [
                'destination' => $destination,
            ],
        ]);
    }

    /**
     * Update the specified destination in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination): JsonResponse
    {
        $destination->update($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Destination updated successfully.',
            'data'    => [
                'destination' => $destination,
            ],
        ]);
    }

    /**
     * Remove the specified destination from storage.
     */
    public function destroy(Destination $destination): JsonResponse
    {
        $destination->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Destination deleted successfully.',
            'data'    => [],
        ]);
    }
}
