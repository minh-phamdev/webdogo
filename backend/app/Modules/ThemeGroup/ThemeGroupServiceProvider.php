<?php

namespace App\Modules\ThemeGroup;

use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Repositories\ThemeGroupRepository;
use Illuminate\Support\ServiceProvider;

class ThemeGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ThemeGroupRepositoryInterface::class,
            ThemeGroupRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
