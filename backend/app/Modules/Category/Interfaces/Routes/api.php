<?php

use App\Modules\Category\Interfaces\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/categories')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Public
    |--------------------------------------------------------------------------
    */

    Route::get('/', [
        CategoryController::class,
        'index',
    ]);

    Route::get('/{category}', [
        CategoryController::class,
        'show',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/', [
            CategoryController::class,
            'store',
        ]);

        Route::put('/{category}', [
            CategoryController::class,
            'update',
        ]);

        Route::delete('/{category}', [
            CategoryController::class,
            'destroy',
        ]);
    });
});
