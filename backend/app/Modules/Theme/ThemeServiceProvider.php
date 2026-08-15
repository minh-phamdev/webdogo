<?php

namespace App\Modules\Theme;

use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use App\Modules\Theme\Infrastructure\Persistence\Repositories\ThemeRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ThemeRepositoryInterface::class,
            ThemeRepository::class
        );
    }

    public function boot(): void
    {
        Route::prefix('api')->group(function () {
            require __DIR__ . '/Interfaces/Routes/api.php';
        });
    }
}
