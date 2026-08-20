<?php

namespace App\Modules\Product;

use App\Modules\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
