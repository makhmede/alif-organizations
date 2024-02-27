<?php

namespace App\Contracts;

use App\Models\Organization;
use App\Models\Vehicle;

interface IVehicleRepository
{
    public function getVehicleById(int $vehicleId): ?Vehicle;
}
