<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use App\Repositories\VehicleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(): JsonResponse
    {
        $vehicle = Vehicle::all();
        return response()->json([
                'data' => $vehicle
            ]
        );
    }


    public function show(int $id): VehicleResource
    {
        $repository = new VehicleRepository();
        $vehicle = $repository;
        return new VehicleResource($vehicle);
    }


    public function destroy(int $id): JsonResponse
    {
        $vehicle = Vehicle::query()->find($id);
        if ($vehicle === null) {
            return response()->json([
                'message' => 'Запись не найдена'
            ]);
        }
        $vehicle->delete();

        return response()->json([
            'message' => 'Запись удалена'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $vehicle = Vehicle::query()->create($validated);
        return new VehicleResource($vehicle);


    }

    public function update(Request $request, VehicleResource $vehicle): VehicleResource
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $vehicle = Vehicle::query()->update($validated);
        return new VehicleResource($vehicle);
    }
}

