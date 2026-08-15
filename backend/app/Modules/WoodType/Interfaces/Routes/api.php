<?php

use App\Modules\WoodType\Interfaces\Http\Controllers\WoodTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {

    Route::get(
        'wood-types',
        [WoodTypeController::class, 'index']
    );

    Route::post(
        'wood-types',
        [WoodTypeController::class, 'store']
    );

    Route::get(
        'wood-types/{woodType}',
        [WoodTypeController::class, 'show']
    );

    Route::put(
        'wood-types/{woodType}',
        [WoodTypeController::class, 'update']
    );

    Route::patch(
        'wood-types/{woodType}',
        [WoodTypeController::class, 'update']
    );

    Route::delete(
        'wood-types/{woodType}',
        [WoodTypeController::class, 'destroy']
    );
});
