<?php

use App\Modules\Artisan\Interfaces\Http\Controllers\ArtisanController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/artisans')->group(function () {

    // PUBLIC
    Route::get('/', [
        ArtisanController::class,
        'index'
    ]);

    Route::get('/{artisan}', [
        ArtisanController::class,
        'show'
    ]);

    // ADMIN
    Route::middleware([
        'auth:sanctum',
        'role:ADMIN'
    ])->group(function () {

        Route::post('/', [
            ArtisanController::class,
            'store'
        ]);

        Route::put('/{artisan}', [
            ArtisanController::class,
            'update'
        ]);

        Route::delete('/{artisan}', [
            ArtisanController::class,
            'destroy'
        ]);
    });
});
