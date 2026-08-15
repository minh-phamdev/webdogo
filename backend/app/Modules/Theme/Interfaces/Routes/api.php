<?php

use App\Modules\Theme\Interfaces\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::prefix('themes')->group(function () {

    Route::get('/', [
        ThemeController::class,
        'index',
    ]);

    Route::get('/{theme}', [
        ThemeController::class,
        'show',
    ]);

    Route::middleware([
        'auth:sanctum',
        'role:ADMIN',
    ])->group(function () {

        Route::post('/', [
            ThemeController::class,
            'store',
        ]);

        Route::put('/{theme}', [
            ThemeController::class,
            'update',
        ]);

        Route::delete('/{theme}', [
            ThemeController::class,
            'destroy',
        ]);
    });
});
