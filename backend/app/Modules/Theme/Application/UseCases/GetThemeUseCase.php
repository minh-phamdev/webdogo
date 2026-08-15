<?php

namespace App\Modules\Theme\Application\UseCases;

use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;

class GetThemeUseCase
{
    public function __construct(
        private ThemeRepositoryInterface $repository
    ) {}

    public function execute(int $id): ?ThemeModel
    {
        return $this->repository->find($id);
    }
}
