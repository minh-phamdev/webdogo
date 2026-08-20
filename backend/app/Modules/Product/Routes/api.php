<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Product\Interfaces\Http\Controllers\ProductController;
use App\Modules\Product\Interfaces\Http\Controllers\ProductMediaController;

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

Route::prefix('products')->group(function () {

    // Public
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('{id}', [ProductController::class, 'show'])->name('products.show');

    // Protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::match(['put', 'patch'], '{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});


/*
|--------------------------------------------------------------------------
| Product Media
|--------------------------------------------------------------------------
*/

Route::prefix('products/{productId}/media')->group(function () {

    // Public
    Route::get('/', [ProductMediaController::class, 'index'])->name('products.media.index');

    // Protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [ProductMediaController::class, 'store'])->name('products.media.store');
        Route::match(['put', 'patch'], '{mediaId}', [ProductMediaController::class, 'update'])->name('products.media.update');
        Route::delete('{mediaId}', [ProductMediaController::class, 'destroy'])->name('products.media.destroy');
    });
});
