<?php

use App\Modules\StatueTheme\Interfaces\Http\Controllers\StatueThemeController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/statue-themes')->group(function () {

    // PUBLIC
    Route::get('/', [
        StatueThemeController::class,
        'index',
    ]);

    Route::get('/{statueTheme}', [
        StatueThemeController::class,
        'show',
    ]);

    // ADMIN
    Route::middleware([
        'auth:sanctum',
        'role:ADMIN',
    ])->group(function () {

        Route::post('/', [
            StatueThemeController::class,
            'store',
        ]);

        Route::put('/{statueTheme}', [
            StatueThemeController::class,
            'update',
        ]);

        Route::delete('/{statueTheme}', [
            StatueThemeController::class,
            'destroy',
        ]);
    });
});
