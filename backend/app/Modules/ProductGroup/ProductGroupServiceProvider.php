<?php

namespace App\Modules\ProductGroup;

use App\Modules\ProductGroup\Domain\Repositories\ProductGroupRepositoryInterface;
use App\Modules\ProductGroup\Infrastructure\Persistence\Repositories\ProductGroupRepository;
use Illuminate\Support\ServiceProvider;

class ProductGroupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProductGroupRepositoryInterface::class,
            ProductGroupRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
