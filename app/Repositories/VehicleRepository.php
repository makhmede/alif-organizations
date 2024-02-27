<?php

namespace App\Repositories;

use App\Contracts\IVehicleRepository;
use App\DTO\OrganizationDTO;
use App\DTO\VehicleDTO;
use App\Models\Organization;
use App\Models\User;
use App\Models\Vehicle;

class VehicleRepository implements IVehicleRepository
{
    public function getVehicleById(int $vehicleId): ?Vehicle
    {
        /** @var \App\Models\Vehicle /null $user */
        // TODO: Implement getVehicleById() method.
        $vehicle = Vehicle::query()->find($vehicleId);

        return $vehicle;
    }


    public function create(VehicleDTO $vehicleDTO): Vehicle
    {
        $vehicle = new Vehicle();
        $vehicle->name = $vehicleDTO->getName();
        $vehicle->save();

        return $vehicle;
    }

    public function update($id, array $data)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->update($data);
        return $vehicle;
    }

    public function destroy($id)
    {
        return Vehicle::destroy($id);
    }

}
