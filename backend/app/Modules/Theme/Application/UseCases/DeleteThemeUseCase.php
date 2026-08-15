<?php

namespace App\Modules\Theme\Application\UseCases;

use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;

class DeleteThemeUseCase
{
    public function __construct(
        private ThemeRepositoryInterface $repository
    ) {}

    public function execute(
        ThemeModel $theme
    ): bool {
        return $this->repository->delete($theme);
    }
}
