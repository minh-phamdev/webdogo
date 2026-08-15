<?php

namespace App\Modules\Category;

use App\Modules\Category\Domain\Repositories\CategoryRepositoryInterface;
use App\Modules\Category\Infrastructure\Persistence\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/Interfaces/Routes/api.php'
        );
    }
}
