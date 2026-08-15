<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTH
Route::prefix('auth')->group(function () {

    // PUBLIC
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // AUTHENTICATED
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// USER
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ADMIN TEST
Route::prefix('admin')
    ->middleware(['auth:sanctum', 'role:ADMIN'])
    ->group(function () {

        Route::get('/test', function (Request $request) {
            return response()->json([
                'message' => 'Admin API hoạt động',
                'user' => $request->user(),
            ]);
        });
    });
