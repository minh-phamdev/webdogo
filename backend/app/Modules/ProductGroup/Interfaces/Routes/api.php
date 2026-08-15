<?php

use App\Modules\ProductGroup\Interfaces\Http\Controllers\ProductGroupController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/product-groups')->group(function () {

    // PUBLIC
    Route::get('/', [
        ProductGroupController::class,
        'index'
    ]);

    Route::get('/{productGroup}', [
        ProductGroupController::class,
        'show'
    ]);

    // ADMIN
    Route::middleware([
        'auth:sanctum',
        'role:ADMIN'
    ])->group(function () {

        Route::post('/', [
            ProductGroupController::class,
            'store'
        ]);

        Route::put('/{productGroup}', [
            ProductGroupController::class,
            'update'
        ]);

        Route::delete('/{productGroup}', [
            ProductGroupController::class,
            'destroy'
        ]);
    });
});
