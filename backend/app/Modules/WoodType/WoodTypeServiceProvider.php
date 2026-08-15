<?php

namespace App\Modules\WoodType;

use App\Modules\WoodType\Domain\Repositories\WoodTypeRepositoryInterface;
use App\Modules\WoodType\Infrastructure\Persistence\Repositories\WoodTypeRepository;
use Illuminate\Support\ServiceProvider;

class WoodTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            WoodTypeRepositoryInterface::class,
            WoodTypeRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
