<?php

use App\Modules\ProductStatus\Interfaces\Http\Controllers\ProductStatusController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {

    Route::get(
        'product-statuses',
        [ProductStatusController::class, 'index']
    );

    Route::post(
        'product-statuses',
        [ProductStatusController::class, 'store']
    );

    Route::get(
        'product-statuses/{productStatus}',
        [ProductStatusController::class, 'show']
    );

    Route::put(
        'product-statuses/{productStatus}',
        [ProductStatusController::class, 'update']
    );

    Route::patch(
        'product-statuses/{productStatus}',
        [ProductStatusController::class, 'update']
    );

    Route::delete(
        'product-statuses/{productStatus}',
        [ProductStatusController::class, 'destroy']
    );
});
