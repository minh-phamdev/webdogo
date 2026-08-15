<?php

namespace App\Modules\FinishType;

use App\Modules\FinishType\Domain\Repositories\FinishTypeRepositoryInterface;
use App\Modules\FinishType\Infrastructure\Persistence\Repositories\FinishTypeRepository;
use Illuminate\Support\ServiceProvider;

class FinishTypeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            FinishTypeRepositoryInterface::class,
            FinishTypeRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
