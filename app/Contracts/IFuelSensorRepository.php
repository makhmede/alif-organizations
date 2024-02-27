<?php

namespace App\Contracts;

use App\Models\FuelSensor;

interface IFuelSensorRepository
{
    public function getFuelSensorById(int $fuelSensorId): ?FuelSensor;
}
