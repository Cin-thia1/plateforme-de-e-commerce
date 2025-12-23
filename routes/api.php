<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// NOTE: consider protecting these routes with auth:sanctum or other middleware
Route::get('couriers/available', [App\Http\Controllers\Api\CourierApiController::class, 'available']);
Route::post('couriers/{courier}/assign', [App\Http\Controllers\Api\CourierApiController::class, 'assign']);
Route::apiResource('couriers', App\Http\Controllers\Api\CourierApiController::class);
