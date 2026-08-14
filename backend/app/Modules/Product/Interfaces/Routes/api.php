<?php

use App\Modules\Product\Interfaces\Http\Controllers\ProductController;
use App\Modules\Product\Interfaces\Http\Controllers\ProductMediaController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    Route::get(
        'products',
        [ProductController::class, 'index']
    );

    Route::post(
        'products',
        [ProductController::class, 'store']
    );

    Route::get(
        'products/{product}',
        [ProductController::class, 'show']
    );

    Route::put(
        'products/{product}',
        [ProductController::class, 'update']
    );

    Route::patch(
        'products/{product}',
        [ProductController::class, 'update']
    );

    Route::delete(
        'products/{product}',
        [ProductController::class, 'destroy']
    );


    /*
    |--------------------------------------------------------------------------
    | Product Media
    |--------------------------------------------------------------------------
    */

    Route::get(
        'products/{product}/media',
        [ProductMediaController::class, 'index']
    );

    Route::post(
        'products/{product}/media',
        [ProductMediaController::class, 'store']
    );

    Route::delete(
        'products/{product}/media/{media}',
        [ProductMediaController::class, 'destroy']
    );

    Route::put(
    '/products/{product}/media/{media}',
    [ProductMediaController::class, 'update']
);

Route::patch(
    '/products/{product}/media/{media}',
    [ProductMediaController::class, 'update']
);
});
