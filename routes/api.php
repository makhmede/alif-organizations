<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware(\App\Http\Middleware\CheckClientApiToken::class)
    ->group(function () {
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
        Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
        Route::post('users', [\App\Http\Controllers\UserController::class, 'store']);
        Route::match(['put', 'patch'], 'users/{id}', [\App\Http\Controllers\UserController::class, 'update']);

        Route::get('organizations', [\App\Http\Controllers\OrganizationController::class, 'index']);
        Route::get('organization/{id}', [\App\Http\Controllers\OrganizationController::class, 'show']);
        Route::post('organizations', [\App\Http\Controllers\OrganizationController::class, 'store']);
        Route::match(['put', 'patch'], 'organizations/{id}', [\App\Http\Controllers\OrganizationController::class, 'update']);

        Route::get('fuelsensors', [\App\Http\Controllers\FuelSensorController::class, 'index']);
        Route::get('fuelsensors/{id}', [\App\Http\Controllers\FuelSensorController::class, 'show']);
        Route::post('fuelsensors', [\App\Http\Controllers\FuelSensorController::class, 'store']);
        Route::match(['put', 'patch'], 'fuelsensors/{id}', [\App\Http\Controllers\FuelSensorController::class, 'update']);

        Route::get('vehicles', [\App\Http\Controllers\VehicleController::class, 'index']);
        Route::get('vehicles/{id}', [\App\Http\Controllers\VehicleController::class, 'show']);
        Route::post('vehicles', [\App\Http\Controllers\VehicleController::class, 'store']);
        Route::match(['put', 'patch'], 'vehicles/{id}', [\App\Http\Controllers\VehicleController::class, 'update']);
    }
);

