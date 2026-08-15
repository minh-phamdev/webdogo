<?php

namespace App\Modules\StatueTheme;

use App\Modules\StatueTheme\Domain\Repositories\StatueThemeRepositoryInterface;
use App\Modules\StatueTheme\Infrastructure\Persistence\Repositories\StatueThemeRepository;
use Illuminate\Support\ServiceProvider;

class StatueThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            StatueThemeRepositoryInterface::class,
            StatueThemeRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
