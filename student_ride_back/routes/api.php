<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::prefix('/v1/auth')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:api');
});

Route::middleware('auth:api')->prefix('/v1/conducteurs')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\ConducteurController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\ConducteurController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\Api\ConducteurController::class, 'show']);
});

Route::middleware('auth:api')->prefix('/v1/vehicules')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\VehiculeController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\VehiculeController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\Api\VehiculeController::class, 'show']);
    Route::put('/{id}', [App\Http\Controllers\Api\VehiculeController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\Api\VehiculeController::class, 'destroy']);
});

Route::middleware('auth:api')->prefix('/v1/passagers')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\PassagerController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\PassagerController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\Api\PassagerController::class, 'show']);
});

Route::middleware('auth:api')->prefix('/v1/users')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\UserController::class, 'index']);
    Route::get('/{id}', [App\Http\Controllers\Api\UserController::class, 'show']);
    Route::put('/{id}', [App\Http\Controllers\Api\UserController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\Api\UserController::class, 'destroy']);
});
