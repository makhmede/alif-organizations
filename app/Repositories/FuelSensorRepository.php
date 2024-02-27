<?php

namespace App\Repositories;

use App\Contracts\IFuelSensorRepository;
use App\DTO\FuelSensorDTO;
use App\DTO\VehicleDTO;
use App\Models\FuelSensor;
use App\Models\User;
use App\Models\Vehicle;

class FuelSensorRepository implements IFuelSensorRepository
{
    public function getFuelSensorById(int $fuelSensorId): ?FuelSensor
    {
        /** @var \App\Models\FuelSensor /null $user */
        // TODO: Implement getFuelSensorById() method.
        $fuelSensor = FuelSensor::query()->find($fuelSensorId);

        return $fuelSensor;
    }
    public function create(FuelSensorDTO $fuelSensorDTO): FuelSensor
    {
        $fuelSensor = new FuelSensor();
        $fuelSensor->name = $fuelSensorDTO->getName();
        $fuelSensor->save();

        return $fuelSensor;
    }

    public function update($id, array $data)
    {
        $fuelSensor = FuelSensor::find($id);
        $fuelSensor->update($data);
        return $fuelSensor;
    }

    public function destroy($id)
    {
        return FuelSensor::destroy($id);
    }

}
