<?php

use App\Modules\FinishType\Interfaces\Http\Controllers\FinishTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {

    Route::get(
        'finish-types',
        [FinishTypeController::class, 'index']
    );

    Route::post(
        'finish-types',
        [FinishTypeController::class, 'store']
    );

    Route::get(
        'finish-types/{finishType}',
        [FinishTypeController::class, 'show']
    );

    Route::put(
        'finish-types/{finishType}',
        [FinishTypeController::class, 'update']
    );

    Route::patch(
        'finish-types/{finishType}',
        [FinishTypeController::class, 'update']
    );

    Route::delete(
        'finish-types/{finishType}',
        [FinishTypeController::class, 'destroy']
    );
});
