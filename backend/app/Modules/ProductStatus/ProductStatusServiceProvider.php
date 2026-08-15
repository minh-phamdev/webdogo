<?php

namespace App\Modules\ProductStatus;

use App\Modules\ProductStatus\Domain\Repositories\ProductStatusRepositoryInterface;
use App\Modules\ProductStatus\Infrastructure\Persistence\Repositories\ProductStatusRepository;
use Illuminate\Support\ServiceProvider;

class ProductStatusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProductStatusRepositoryInterface::class,
            ProductStatusRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
