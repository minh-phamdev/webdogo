<?php

use App\Http\Controllers\ProductMediaController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinishTypeController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\WoodTypeController;
use App\Http\Controllers\ThemeGroupController;


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


// CATEGORIES
Route::prefix('categories')->group(function () {

    // PUBLIC
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{category}', [CategoryController::class, 'show']);

    // ADMIN
    Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{category}', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'destroy']);
    });
});


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


// PRODUCTS
Route::prefix('products')->group(function () {

    // PUBLIC
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);

    // ADMIN
    Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{product}', [ProductController::class, 'update']);
        Route::delete('/{product}', [ProductController::class, 'destroy']);
    });

    // PRODUCT MEDIA
    Route::prefix('{product}/media')
        ->middleware(['auth:sanctum', 'role:ADMIN'])
        ->group(function () {

            Route::get('/', [ProductMediaController::class, 'index']);
            Route::post('/', [ProductMediaController::class, 'store']);
            Route::delete('/{media}', [ProductMediaController::class, 'destroy']);
        });
});


// PRODUCT GROUPS
Route::prefix('product-groups')->group(function () {

    // PUBLIC
    Route::get('/', [ProductGroupController::class, 'index']);
    Route::get('/{productGroup}', [ProductGroupController::class, 'show']);

    // ADMIN
    Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
        Route::post('/', [ProductGroupController::class, 'store']);
        Route::put('/{productGroup}', [ProductGroupController::class, 'update']);
        Route::delete('/{productGroup}', [ProductGroupController::class, 'destroy']);
    });
});


// THEMES
Route::prefix('themes')->group(function () {

    // PUBLIC
    Route::get('/', [ThemeController::class, 'index']);
    Route::get('/{theme}', [ThemeController::class, 'show']);

    // ADMIN
    Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
        Route::post('/', [ThemeController::class, 'store']);
        Route::put('/{theme}', [ThemeController::class, 'update']);
        Route::delete('/{theme}', [ThemeController::class, 'destroy']);
    });
});


// THEME GROUPS
Route::prefix('theme-groups')->group(function () {

    // PUBLIC
    Route::get('/', [ThemeGroupController::class, 'index']);
    Route::get('/{themeGroup}', [ThemeGroupController::class, 'show']);

    // ADMIN
    Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
        Route::post('/', [ThemeGroupController::class, 'store']);
        Route::put('/{themeGroup}', [ThemeGroupController::class, 'update']);
        Route::delete('/{themeGroup}', [ThemeGroupController::class, 'destroy']);
    });
});


// WOOD TYPES
Route::prefix('wood-types')->group(function () {

    // PUBLIC
    Route::get('/', [WoodTypeController::class, 'index']);
    Route::get('/{woodType}', [WoodTypeController::class, 'show']);

    // ADMIN
    Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
        Route::post('/', [WoodTypeController::class, 'store']);
        Route::put('/{woodType}', [WoodTypeController::class, 'update']);
        Route::delete('/{woodType}', [WoodTypeController::class, 'destroy']);
    });
});

// FINISH TYPES

Route::prefix('finish-types')->group(function () {

    // PUBLIC

    Route::get('/', [
        FinishTypeController::class,
        'index'
    ]);

    Route::get('/{finishType}', [
        FinishTypeController::class,
        'show'
    ]);


    // ADMIN

    Route::middleware([
        'auth:sanctum',
        'role:ADMIN'
    ])->group(function () {

        Route::post('/', [
            FinishTypeController::class,
            'store'
        ]);

        Route::put('/{finishType}', [
            FinishTypeController::class,
            'update'
        ]);

        Route::delete('/{finishType}', [
            FinishTypeController::class,
            'destroy'
        ]);
    });

});

// ARTISANS

Route::prefix('artisans')->group(function () {

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
