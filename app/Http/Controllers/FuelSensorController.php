<?php

namespace App\Http\Controllers;

use App\Http\Resources\FuelSensorResource;
use App\Models\FuelSensor;
use App\Repositories\FuelSensorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuelSensorController extends Controller
{
    public function index(): JsonResponse
    {
        $fuel_sensor = FuelSensor::all();
        return response()->json([
                'data' => $fuel_sensor
            ]
        );
    }


    public function show(int $id): FuelSensorResource
    {
        $repository = new FuelSensorRepository();
        $fuel_sensor = $repository;
        return new FuelSensorResource($fuel_sensor);
    }


    public function destroy(int $id): JsonResponse
    {
        $fuel_sensor = FuelSensor::query()->find($id);
        if ($fuel_sensor === null) {
            return response()->json([
                'message' => 'Запись не найдена'
            ]);
        }
        $fuel_sensor->delete();

        return response()->json([
            'message' => 'Запись удалена'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $fuel_sensor = FuelSensor::query()->create($validated);
        return new FuelSensorResource($fuel_sensor);


    }

    public function update(Request $request, FuelSensorResource $fuel_sensor): FuelSensorResource
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $fuel_sensor = FuelSensor::query()->update($validated);
        return new FuelSensorResource($fuel_sensor);
    }
}

