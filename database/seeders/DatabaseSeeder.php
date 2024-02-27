<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FuelSensorsSeeder::class);
        $this->call(OrganizationsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(VehiclesSeeder::class);
    }
}
