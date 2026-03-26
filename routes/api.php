<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;

// İşte Laravel'in bulamadığı o meşhur kapı burası!
Route::apiResource('events', EventController::class)->only(['index', 'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');