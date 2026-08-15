<?php

use App\Modules\ThemeGroup\Interfaces\Http\Controllers\ThemeGroupController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/theme-groups')->group(function () {

    // PUBLIC
    Route::get('/', [
        ThemeGroupController::class,
        'index'
    ]);

    Route::get('/{themeGroup}', [
        ThemeGroupController::class,
        'show'
    ]);

    // ADMIN
    Route::middleware([
        'auth:sanctum',
        'role:ADMIN'
    ])->group(function () {

        Route::post('/', [
            ThemeGroupController::class,
            'store'
        ]);

        Route::put('/{themeGroup}', [
            ThemeGroupController::class,
            'update'
        ]);

        Route::delete('/{themeGroup}', [
            ThemeGroupController::class,
            'destroy'
        ]);
    });
});
