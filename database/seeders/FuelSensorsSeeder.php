<?php

namespace Database\Seeders;

use App\Http\Resources\FuelSensorResource;
use App\Models\FuelSensor;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelSensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FuelSensor::factory()
            ->count(500)
            ->create();
    }
}
